<template>
  <div>
    <p>{{ $t("SETTINGS.ROLES.DESCRIPTION") }}</p>

    <div class="row">
      <div class="col-3" v-for="chunkRoles in roles.chunk(4)">
        <role v-for="role in chunkRoles" :key="role.id" :role="role"></role>
      </div>
    </div>
  </div>
</template>

<script>
  import Role from './role.vue';

  export default {
    components: {
      'role': Role
    },
    props: ['roles']
  }
</script>
