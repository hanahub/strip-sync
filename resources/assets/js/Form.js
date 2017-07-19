import Errors from './Errors';

export default class Form {
  /**
   * Create a new Form instance.
   *
   * @param {object} data
   * @param exceptionObjectParams
   */
  constructor(data, exceptionObjectParams = null) {
    this.originalData = data;

    for (let field in data) {
      this[field] = data[field];
    }

    this.errors = new Errors();

    this.exceptionObjectParams = exceptionObjectParams;
  }


  /**
   * Fetch all relevant data for the form.
   */
  data() {
    let data = {};


    for (let property in this.originalData) {
      if (this.isExceptionObjectParams(property)) {
        data[property] = this.buildExceptionObjectsData(property);
      } else {
        data[property] = this[property];
      }
    }

    return data;
  }


  /**
   * Reset the form fields.
   */
  reset() {
    for (let field in this.originalData) {
      this[field] = '';
    }

    this.errors.clear();
  }


  /**
   * Send a POST request to the given URL.
   * .
   * @param {string} url
   */
  post(url) {
    return this.submit('post', url);
  }


  /**
   * Send a PUT request to the given URL.
   * .
   * @param {string} url
   */
  put(url) {
    return this.submit('put', url);
  }


  /**
   * Send a PATCH request to the given URL.
   * .
   * @param {string} url
   */
  patch(url) {
    return this.submit('patch', url);
  }


  /**
   * Send a DELETE request to the given URL.
   * .
   * @param {string} url
   */
  delete(url) {
    return this.submit('delete', url);
  }


  /**
   * Submit the form.
   *
   * @param {string} requestType
   * @param {string} url
   */
  submit(requestType, url) {
    return new Promise((resolve, reject) => {
      axios[requestType](url, this.data())
        .then(response => {
          this.onSuccess(response.data);

          resolve(response.data);
        })
        .catch(error => {
          if(error.response.status === 422) {
            this.onFail(error.response.data);
          }

          reject(error.response);
        });
    });
  }


  /**
   * Handle a successful form submission.
   *
   * @param {object} data
   */
  onSuccess(data) {
    // alert(data.message); // temporary
    // this.reset();
  }


  /**
   * Handle a failed form submission.
   *
   * @param {object} errors
   */
  onFail(errors) {
    this.errors.record(errors);
  }

  /**
   * Check that a property include to exception object params list
   *
   * @param property
   * @returns boolean
   */
  isExceptionObjectParams(property) {
    if (!this.exceptionObjectParams) return false;

    return !! Object.keys(this.exceptionObjectParams).find((key) => {
      return key === property;
    });
  }

  buildExceptionObjectsData(property) {
    let data = [];

    for (let i = 0, exceptionObject; (exceptionObject = this[property][i++]);) {
      data.push(this.buildExceptionObjectData(property, exceptionObject));
    }

    return data;
  }

  /**
   * Build all necessary params of exception object
   *
   * @param property
   * @param {object} exceptionObject
   * @returns {object}
   */
  buildExceptionObjectData(property, exceptionObject) {
    let exceptionObjectData = {};

    for (let j = 0, objectProperty; (objectProperty = this.exceptionObjectParams[property][j++]);) {
      exceptionObjectData[objectProperty] = exceptionObject[objectProperty];
    }

    return exceptionObjectData;
  }
}