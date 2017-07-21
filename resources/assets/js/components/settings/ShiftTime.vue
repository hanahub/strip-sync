<template>
  <div class="form-group row">
    <div class="col-3">
      <div class="form-group">
        <label>{{ $t("SETTINGS.SHIFT_TIMES.START_TIME") }}</label>
        <input type="time" class="form-control" v-model="shiftTime.start">

        <validation-message :errors="errors" :property-name="`shiftTimes.${index}.start`"></validation-message>
      </div>
    </div>
    <div class="col-3">
      <div class="form-group">
        <label>{{ $t("SETTINGS.SHIFT_TIMES.END_TIME") }}</label>
        <input type="time" class="form-control" v-model="shiftTime.end">

        <validation-message :errors="errors" :property-name="`shiftTimes.${index}.end`"></validation-message>
      </div>
    </div>
    <div class="col-1">
      <div class="form-group">
        <i class="mdi mdi-close font-24 m-t-35" @click="remove(shiftTime.id)"></i>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['shiftTime', 'remove', 'index', 'errors'],
  }
</script>

<style>
  .font-24 {
    font-size: 24px !important;
  }

  .m-t-35 {
    margin-top: 35px !important;
  }
</style>
