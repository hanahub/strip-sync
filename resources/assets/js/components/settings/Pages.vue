<template>
  <div>
    <p>{{ $t("SETTINGS.VIEWS.DESCRIPTION") }}</p>

    <div class="row">
      <div class="col-3" v-for="chunkPages in pages.chunk(4)">
        <page v-for="page in chunkPages" :key="page.id" :page="page"></page>
      </div>
    </div>
  </div>
</template>

<script>
  import Page from './Page.vue';

  export default {
    components: {
      'page': Page
    },
    props: ['pages']
  }
</script>
