import Form from './../../Form';
import { maxValueOfRandomID } from './../../constants';

export default class SettingsForm extends Form {
  /**
   * Fetch all relevant data for the form.
   */
  data() {
    let data = super.data();

    for (let i = 0, shiftTime; (shiftTime = data['shiftTimes'][i++]);) {

      // We check below
      if (shiftTime.id < maxValueOfRandomID) {
        delete shiftTime.id;
      }
    }

    return data;
  }
}
