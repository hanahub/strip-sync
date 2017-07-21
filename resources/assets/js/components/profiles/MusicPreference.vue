<template>
  <div class="form-group row">
    <div class="col-3">
      <div class="form-group">
        <label>{{ $t("PROFILES.MUSIC_PREFERENCES.ARTIST") }}</label>
        <input type="text" class="form-control" v-model="musicPreference.artist">

        <validation-message :errors="errors" :property-name="`musicPreferences.${index}.artist`"></validation-message>
      </div>
    </div>
    <div class="col-3">
      <div class="form-group">
        <label>{{ $t("PROFILES.MUSIC_PREFERENCES.SONG_TITLE") }}</label>
        <input type="text" class="form-control" v-model="musicPreference.song_title">

        <validation-message :errors="errors" :property-name="`musicPreferences.${index}.song_title`"></validation-message>
      </div>
    </div>
    <div class="col-1">
      <div class="form-group">
        <i class="mdi mdi-close font-24 m-t-35" @click="remove(musicPreference.id)"></i>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['musicPreference', 'errors', 'index', 'remove'],
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
