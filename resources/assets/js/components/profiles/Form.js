import Form from './../../Form';
import { maxValueOfRandomID } from './../../constants';

export default class ProfileForm extends Form {
  /**
   * Fetch all relevant data for the form.
   */
  data() {
    let data = super.data();

    for (let i = 0, musicPreference; (musicPreference = data['music_preferences'][i++]);) {

      // We check below
      if (musicPreference.id < maxValueOfRandomID) {
        delete musicPreference.id;
      }
    }

    return data;
  }
}
