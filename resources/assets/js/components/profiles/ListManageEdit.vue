<template>
  <span><a :href="`/profiles/${data.id}/edit`">Edit</a></span>
</template>
<script>
  export default {
    props: ['data']
  }
</script>