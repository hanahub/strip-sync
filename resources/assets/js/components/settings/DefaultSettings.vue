<template>
  <div>

    <div class="form-group row">
      <label class="col-2 col-form-label">House fee</label>
      <div class="col-10">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-usd"></i></span>
          <input type="number" class="form-control" v-model="form.house_fee">
        </div>

        <validation-message :errors="form.errors" :property-name="'house_fee'"></validation-message>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-2 col-form-label">Stage fee</label>
      <div class="col-10">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-usd"></i></span>
          <input type="number" class="form-control" v-model="form.stage_fee">
        </div>

        <validation-message :errors="form.errors" :property-name="'stage_fee'"></validation-message>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-2 col-form-label">Standard cover cost</label>
      <div class="col-10">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-usd"></i></span>
          <input type="number" class="form-control" v-model="form.standard_cover_cost">
        </div>

        <validation-message :errors="form.errors" :property-name="'standard_cover_cost'"></validation-message>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-2 col-form-label">Simultaneous performers</label>
      <div class="col-10">
        <input type="number" class="form-control" v-model="form.simultaneous_performers">

        <validation-message :errors="form.errors" :property-name="'simultaneous_performers'"></validation-message>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-2 col-form-label">Default song duration</label>
      <div class="col-10">
        <div class="input-group">
          <input type="number" class="form-control" v-model="form.default_song_duration">
          <span class="input-group-addon">mins</span>
        </div>

        <validation-message :errors="form.errors" :property-name="'default_song_duration'"></validation-message>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-2 col-form-label">Default dance price</label>
      <div class="col-10">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-usd"></i></span>
          <input type="number" class="form-control" v-model="form.default_dance_price">
        </div>

        <validation-message :errors="form.errors" :property-name="'default_dance_price'"></validation-message>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['form'],
  }
</script>
