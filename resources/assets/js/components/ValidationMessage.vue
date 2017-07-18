<template>
  <span class="help is-danger" v-if="errors.has(propertyName)" v-text="errors.get(propertyName)"></span>
</template>

<script>
  export default {
    props: ['errors', 'propertyName']
  }
</script>