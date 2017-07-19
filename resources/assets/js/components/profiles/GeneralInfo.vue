<template>
  <div class="row">
    <div class="col-3">

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.ROLE") }}</label>

        <select class="form-control" v-model="form.role_id" name="role_id">
          <option v-for="role in roles" :value="role.id">{{ $t(`ROLES.${role.slug}`) }}
          </option>
        </select>

        <validation-message :errors="form.errors" :property-name="'role_id'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.FIRST_NAME") }}</label>
        <input type="text" class="form-control" v-model="form.first_name" name="first_name">
        <validation-message :errors="form.errors" :property-name="'first_name'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.LAST_NAME") }}</label>
        <input type="text" class="form-control" v-model="form.last_name" name="last_name">
        <validation-message :errors="form.errors" :property-name="'last_name'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.STAGE_NAME") }}</label>
        <input type="text" class="form-control" v-model="form.stage_name" name="stage_name">
        <validation-message :errors="form.errors" :property-name="'stage_name'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.EMAIL") }}</label>
        <input type="email" class="form-control" v-model="form.email" name="email">
        <validation-message :errors="form.errors" :property-name="'email'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.PASSWORD") }}</label>
        <input type="password" class="form-control" v-model="form.password" name="password">
        <validation-message :errors="form.errors" :property-name="'password'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.PASSWORD_CONFIRMATION") }}</label>
        <input type="password" class="form-control" v-model="form.password_confirmation" name="password_confirmation">
        <validation-message :errors="form.errors" :property-name="'password_confirmation'"></validation-message>
      </div>

    </div>

    <div class="col-3">

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.PIN") }}</label>
        <input type="text" class="form-control" v-model="form.pin_code" name="pin_code">
        <validation-message :errors="form.errors" :property-name="'pin_code'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.AVATAR") }}</label>
        <input type="text" class="form-control" v-model="form.avatar" name="avatar">
        <validation-message :errors="form.errors" :property-name="'avatar'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.PHONE") }}</label>
        <input type="text" class="form-control" v-model="form.phone" name="phone">
        <validation-message :errors="form.errors" :property-name="'phone'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.ADDRESS_STREET") }}</label>
        <input type="text" class="form-control" v-model="form.address_street" name="address_street">
        <validation-message :errors="form.errors" :property-name="'address_street'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.ADDRESS_CITY") }}</label>
        <input type="text" class="form-control" v-model="form.address_city" name="address_city">
        <validation-message :errors="form.errors" :property-name="'address_city'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.ADDRESS_STATE") }}</label>
        <input type="text" class="form-control" v-model="form.address_state" name="address_state">
        <validation-message :errors="form.errors" :property-name="'address_state'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.ADDRESS_ZIP") }}</label>
        <input type="text" class="form-control" v-model="form.address_zip" name="address_zip">
        <validation-message :errors="form.errors" :property-name="'address_zip'"></validation-message>
      </div>

    </div>

    <div class="col-3">

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.NATIONALITY") }}</label>
        <select class="form-control" v-model="form.nationality_id" name="nationality_id">
          <option v-for="nationality in nationalities" :value="nationality.id">{{ nationality.title }}
          </option>
        </select>
        <validation-message :errors="form.errors" :property-name="'nationality_id'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.EMERGENCY_CONTACT_NAME") }}</label>
        <input type="text" class="form-control" v-model="form.emergency_contact_name" name="emergency_contact_name">
        <validation-message :errors="form.errors" :property-name="'emergency_contact_name'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.EMERGENCY_CONTACT_RELATIONSHIP") }}</label>
        <input type="text" class="form-control" v-model="form.emergency_contact_relationship"
               name="emergency_contact_relationship">
        <validation-message :errors="form.errors"
                            :property-name="'emergency_contact_relationship'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.EMERGENCY_CONTACT_TEL_NO") }}</label>
        <input type="text" class="form-control" v-model="form.emergency_contact_tel_no" name="emergency_contact_tel_no">
        <validation-message :errors="form.errors" :property-name="'emergency_contact_tel_no'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.GENERAL_INFO.EMERGENCY_CONTACT_CELL_NO") }}</label>
        <input type="text" class="form-control" v-model="form.emergency_contact_cell_no"
               name="emergency_contact_cell_no">
        <validation-message :errors="form.errors" :property-name="'emergency_contact_cell_no'"></validation-message>
      </div>

    </div>

    <div class="col-3">

      <div class="form-group">
        <div class="checkbox checkbox-primary">
          <input id="is_working_visa" type="checkbox" v-model="form.is_working_visa" name="is_working_visa">
          <label for="is_working_visa">
            {{ $t("PROFILES.GENERAL_INFO.IS_WORKING_VISA") }}
          </label>
        </div>

        <validation-message :errors="form.errors" :property-name="'is_working_visa'"></validation-message>
      </div>

      <div class="form-group" v-if="form.is_working_visa">
        <label>{{ $t("PROFILES.GENERAL_INFO.WORKING_VISA_EXPIRY") }}</label>
        <input type="date" class="form-control" v-model="form.working_visa_expiry_date" name="working_visa_expiry_date">
        <validation-message :errors="form.errors" :property-name="'working_visa_expiry_date'"></validation-message>
      </div>

      <div class="form-group">
        <div class="checkbox checkbox-primary">
          <input id="is_convicted" type="checkbox" v-model="form.is_convicted" name="is_convicted">
          <label for="is_convicted">
            {{ $t("PROFILES.GENERAL_INFO.IS_CONVICTED") }}
          </label>
        </div>

        <validation-message :errors="form.errors" :property-name="'is_convicted'"></validation-message>
      </div>

      <div class="form-group" v-if="form.is_convicted">
        <label>{{ $t("PROFILES.GENERAL_INFO.CONVICTED_DETAILS") }}</label>
        <textarea class="form-control" v-model="form.convicted_details" name="convicted_details"></textarea>
        <validation-message :errors="form.errors" :property-name="'convicted_details'"></validation-message>
      </div>

    </div>
  </div>
</template>

<script>
  export default {
    props: ['form', 'roles', 'nationalities'],
    data() {
      return {}
    },
    computed: {
      isConvicted() {
        return this.form.is_convicted;
      }
    }
  }
</script>