<template>
  <div class="row">
    <div class="col-12">

      <div class="form-group col-3">
        <select class="form-control" name="contract">
          <option v-for="contract in contracts" :value="contract.content">{{ contract.title }}
          </option>
        </select>
      </div>

      <div class="form-group">
        <textarea class="form-control" v-model="form.contract" name="contract"></textarea>
        <validation-message :errors="form.errors" :property-name="'contract'"></validation-message>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['contracts', 'form']
  }
</script>