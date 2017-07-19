<template>
  <span class="help is-danger" v-if="errors.has(propertyName)" v-text="errors.get(propertyName)"></span>
</template>

<script>
  export default {
    props: ['errors', 'propertyName']
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
