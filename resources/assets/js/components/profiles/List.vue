<template>
  <div>

    <a href="/profiles/create" class="btn btn-primary waves-effect w-md waves-light">
      Add new
    </a>
  </div>
</template>

<script>
  export default {
    props: ['users'],
    data() {
      return {}
    },
    mounted() {
      console.log(this.users);
    }
  }
</script>