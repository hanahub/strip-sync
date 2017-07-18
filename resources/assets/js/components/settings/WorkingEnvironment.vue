<template>
  <div>
    <p>
      Please enter the ideal number of employees required for your venues work environment per role.
      Strip Sync will indicate when you are short staffed in the Stats section.
    </p>


    <div class="row">
      <div class="col-6">
        <div class="form-group row">
          <label class="col-2 col-form-label">Entertainers</label>
          <div class="col-10">
            <input type="number" min="0" class="form-control" v-model="form.entertainers_count">

            <validation-message :errors="form.errors" :property-name="'entertainers_count'"></validation-message>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-2 col-form-label">Bartenders</label>
          <div class="col-10">
            <input type="number" min="0" class="form-control" v-model="form.bartenders_count">

            <validation-message :errors="form.errors" :property-name="'bartenders_count'"></validation-message>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-2 col-form-label">Shot Girls</label>
          <div class="col-10">
            <input type="number" min="0" class="form-control" v-model="form.shot_girls_count">

            <validation-message :errors="form.errors" :property-name="'shot_girls_count'"></validation-message>
          </div>
        </div>


        <div class="form-group row">
          <label class="col-2 col-form-label">Waitresses</label>
          <div class="col-10">
            <input type="number" min="0" class="form-control" v-model="form.waitress_count">

            <validation-message :errors="form.errors" :property-name="'waitress_count'"></validation-message>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group row">
          <label class="col-2 col-form-label">Bottle servers</label>
          <div class="col-10">
            <input type="number" min="0" class="form-control" v-model="form.bottle_servers_count">

            <validation-message :errors="form.errors" :property-name="'bottle_servers_count'"></validation-message>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-2 col-form-label">Djs</label>
          <div class="col-10">
            <input type="number" min="0" class="form-control" v-model="form.djs_count">

            <validation-message :errors="form.errors" :property-name="'djs_count'"></validation-message>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-2 col-form-label">Security</label>
          <div class="col-10">
            <input type="number" min="0" class="form-control" v-model="form.security_count">

            <validation-message :errors="form.errors" :property-name="'security_count'"></validation-message>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-2 col-form-label">Promotors</label>
          <div class="col-10">
            <input type="number" min="0" class="form-control" v-model="form.promoters_count">

            <validation-message :errors="form.errors" :property-name="'promoters_count'"></validation-message>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
  export default {
    props: ['form'],
  }
</script>
