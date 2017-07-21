<template>
  <div class="m-b-10">
    <music-preference v-for="(musicPreference, index) in musicPreferences"
                      v-if="!musicPreference.is_delete"
                      :key="musicPreference.id"
                      :index="index"
                      :errors="errors"
                      :music-preference="musicPreference"
                      :remove="removeMusicPreference"></music-preference>

    <button type="button" class="btn btn-primary waves-effect w-md waves-light" @click="addMusicPreference">
      {{ $t("PROFILES.MUSIC_PREFERENCES.BUTTON_ADD_MUSIC_PREFERENCE") }}
    </button>
  </div>
</template>

<script>
  import MusicPreference from './MusicPreference.vue';
  import { maxValueOfRandomID } from './../../constants';

  export default {
    components: {
      'music-preference': MusicPreference,
    },
    props: ['musicPreferences', 'errors'],
    methods: {
      addMusicPreference() {
        this.musicPreferences.push({
          id: Math.random(),
          artist: null,
          song_title: null,
        });
      },
      removeMusicPreference(id) {
        let musicPreferenceIndex = this.musicPreferences.findIndex((musicPreference) => {
          return musicPreference.id === id;
        });

        if (id < maxValueOfRandomID) {
          this.musicPreferences.splice(musicPreferenceIndex, 1);
        } else {
          this.musicPreferences.splice(musicPreferenceIndex, 1, Object.assign({}, this.musicPreferences[musicPreferenceIndex], {is_delete: true}));
        }
      }
    }
  }
</script>
