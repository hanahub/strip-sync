<template>
    <div class="form-group m-l-10">
      <div class="checkbox checkbox-primary">
        <input :id="'role_' + role.id" type="checkbox" v-model="role.is_enabled">
        <label :for="'role_' + role.id">
          {{ role.title }}
        </label>
      </div>
    </div>
</template>

<script>
  export default {
    props: ['role']
  }
</script>
