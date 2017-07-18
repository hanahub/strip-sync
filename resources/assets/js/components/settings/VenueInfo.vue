<template>
  <div>

    <div class="form-group row">
      <label class="col-2 col-form-label">Legal Business Name</label>
      <div class="col-10">
        <input type="text" class="form-control" v-model="form.legal_business_name" name="legal_business_name">

        <validation-message :errors="form.errors" :property-name="'legal_business_name'"></validation-message>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-2 col-form-label">President name</label>
      <div class="col-10">
        <input type="text" class="form-control" v-model="form.president_name" name="president_name">

        <validation-message :errors="form.errors" :property-name="'president_name'"></validation-message>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-2 col-form-label">Legal business address</label>
      <div class="col-10">
        <textarea class="form-control" rows="5" v-model="form.legal_business_address" name="legal_business_address"></textarea>

        <validation-message :errors="form.errors" :property-name="'legal_business_address'"></validation-message>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-2 col-form-label">Physical venue address</label>
      <div class="col-10">
        <textarea class="form-control" rows="5" v-model="form.physical_venue_address" name="physical_venue_address"></textarea>

        <validation-message :errors="form.errors" :property-name="'physical_venue_address'"></validation-message>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-2 col-form-label">Operating hours type</label>
      <div class="col-10">
        <select class="form-control" v-model="form.operating_hours_type" name="operating_hours_type">
          <option v-for="operatingType in operatingTypes" :value="operatingType.value">{{ operatingType.title }}</option>
        </select>

        <validation-message :errors="form.errors" :property-name="'operating_hours_type'"></validation-message>
      </div>
    </div>

    <div class="form-group row" v-if="isSpecificOperatingTime()">
      <label class="col-2 col-form-label">Operating hours open</label>
      <div class="col-10">
        <input type="time" class="form-control" v-model="form.operating_hours_open" name="operating_hours_open">

        <validation-message :errors="form.errors" :property-name="'operating_hours_open'"></validation-message>
      </div>
    </div>

    <div class="form-group row" v-if="isSpecificOperatingTime()">
      <label class="col-2 col-form-label">Operating hours close</label>
      <div class="col-10">
        <input type="time" class="form-control" v-model="form.operating_hours_close" name="operating_hours_close">

        <validation-message :errors="form.errors" :property-name="'operating_hours_close'"></validation-message>
      </div>
    </div>
  </div>
</template>

<script>
  const specificOperatingTypeValue = 'specific';

  export default {
    props: ['form'],
    data: () => {
      return {
        operatingTypes: [
          {
            title: '24 hours',
            value: '24 hours',
          },
          {
            title: 'Specific',
            value: specificOperatingTypeValue
          }
        ]
      }
    },
    methods: {
      isSpecificOperatingTime() {
        return this.form.operating_hours_type === specificOperatingTypeValue;
      }
    }
  }
</script>

<style>
  .help {
    display: block;
    font-size: 11px;
    margin-top: 5px;
  }


  .help.is-danger {
    color: #ff3860;
  }
</style>