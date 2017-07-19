<template>
    <div class="form-group m-l-10">
      <div class="checkbox checkbox-primary">
        <input :id="'page_' + page.id" type="checkbox" v-model="page.is_enabled">
        <label :for="'page_' + page.id">
          {{ $t(`SETTINGS.VIEWS.${page.slug}`) }}
        </label>
      </div>
    </div>
</template>

<script>
  export default {
    props: ['page']
  }
</script>
