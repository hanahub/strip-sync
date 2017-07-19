<template>
  <div>

    <div class="form-group row">
      <label class="col-2 col-form-label">{{ $t("SETTINGS.VENUE_INFO.LEGAL_BUSINESS_NAME") }}</label>
      <div class="col-10">
        <input type="text" class="form-control" v-model="form.legal_business_name" name="legal_business_name">

        <validation-message :errors="form.errors" :property-name="'legal_business_name'"></validation-message>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-2 col-form-label">{{ $t("SETTINGS.VENUE_INFO.PRESIDENT_NAME") }}</label>
      <div class="col-10">
        <input type="text" class="form-control" v-model="form.president_name" name="president_name">

        <validation-message :errors="form.errors" :property-name="'president_name'"></validation-message>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-2 col-form-label">{{ $t("SETTINGS.VENUE_INFO.LEGAL_BUSINESS_ADDRESS") }}</label>
      <div class="col-10">
        <textarea class="form-control" rows="5" v-model="form.legal_business_address"
                  name="legal_business_address"></textarea>

        <validation-message :errors="form.errors" :property-name="'legal_business_address'"></validation-message>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-2 col-form-label">{{ $t("SETTINGS.VENUE_INFO.PHYSICAL_VENUE_ADDRESS") }}</label>
      <div class="col-10">
        <textarea class="form-control" rows="5" v-model="form.physical_venue_address"
                  name="physical_venue_address"></textarea>

        <validation-message :errors="form.errors" :property-name="'physical_venue_address'"></validation-message>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-2 col-form-label">{{ $t("SETTINGS.VENUE_INFO.OPERATING_HOURS_TYPE") }}</label>
      <div class="col-10">
        <select class="form-control" v-model="form.operating_hours_type" name="operating_hours_type">
          <option v-for="operatingType in operatingTypes" :value="operatingType.value">{{ operatingType.title }}
          </option>
        </select>

        <validation-message :errors="form.errors" :property-name="'operating_hours_type'"></validation-message>
      </div>
    </div>

    <div class="form-group row" v-if="isSpecificOperatingTime">
      <label class="col-2 col-form-label">{{ $t("SETTINGS.VENUE_INFO.OPERATING_HOURS_OPEN") }}</label>
      <div class="col-10">
        <input type="time" class="form-control" v-model="form.operating_hours_open" name="operating_hours_open">

        <validation-message :errors="form.errors" :property-name="'operating_hours_open'"></validation-message>
      </div>
    </div>

    <div class="form-group row" v-if="isSpecificOperatingTime">
      <label class="col-2 col-form-label">{{ $t("SETTINGS.VENUE_INFO.OPERATING_HOURS_CLOSE") }}</label>
      <div class="col-10">
        <input type="time" class="form-control" v-model="form.operating_hours_close" name="operating_hours_close">

        <validation-message :errors="form.errors" :property-name="'operating_hours_close'"></validation-message>
      </div>
    </div>
  </div>
</template>

<script>
  const operatingTypeValues = {
    specific: 'specific',
    hours24: "24_hours"
  };

  export default {
    props: ['form'],
    data() {
      return {
        operatingTypes: [
          {
            title: this.$i18n.t(`SETTINGS.VENUE_INFO.OPERATING_HOURS_TYPES.${operatingTypeValues.hours24}`),
            value: operatingTypeValues.hours24,
          },
          {
            title: this.$i18n.t(`SETTINGS.VENUE_INFO.OPERATING_HOURS_TYPES.${operatingTypeValues.specific}`),
            value: operatingTypeValues.specific
          }
        ]
      }
    },
    computed: {
      isSpecificOperatingTime() {
        return this.form.operating_hours_type === operatingTypeValues.specific;
      }
    }
  }
</script>