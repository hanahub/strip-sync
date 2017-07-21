<template>
  <div>
    <form novalidate @submit.prevent="save" @keydown="form.errors.clear($event.target.name)" @change="form.errors.clear($event.target.name)">
      <ul class="nav nav-tabs tabs-bordered nav-justified">
        <li class="nav-item">
          <a href="#general-info" data-toggle="tab" aria-expanded="false" class="nav-link active">
            {{ $t("PROFILES.GENERAL_INFO.TITLE") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#detailed-info" data-toggle="tab" aria-expanded="true" class="nav-link">
            {{ $t("PROFILES.DETAILED_INFO.TITLE") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#physical-appearance" data-toggle="tab" aria-expanded="false" class="nav-link">
            {{ $t("PROFILES.PHYSICAL_APPEARANCE.TITLE") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#music-preferences" data-toggle="tab" aria-expanded="false" class="nav-link">
            {{ $t("PROFILES.MUSIC_PREFERENCES.TITLE") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#contract" data-toggle="tab" aria-expanded="false" class="nav-link">
            {{ $t("PROFILES.CONTRACT.TITLE") }}
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="general-info">
          <general-info :form="form" :roles="roles" :nationalities="nationalities"></general-info>
        </div>
        <div class="tab-pane" id="detailed-info">
          <detailed-info :form="form"></detailed-info>
        </div>
        <div class="tab-pane" id="physical-appearance">
          <physical-appearance :form="form" :eye-colors="eyeColors" :hair-colors="hairColors"></physical-appearance>
        </div>
        <div class="tab-pane" id="music-preferences">
          <music-preferences :music-preferences="form.music_preferences" :errors="form.errors"></music-preferences>
        </div>
        <div class="tab-pane" id="contract">
          <contract :form="form" :contracts="contracts"></contract>
        </div>
      </div>

      <button type="submit" :disabled="form.errors.any()" class="btn btn-success waves-effect w-md waves-light">
        {{ $t("PROFILES.BUTTON_SAVE") }}
      </button>
    </form>
  </div>
</template>

<script>
  import Form from './Form';
  import GeneralInfo from './GeneralInfo.vue';
  import DetailedInfo from './DetailedInfo.vue';
  import PhysicalAppearance from './PhysicalAppearance.vue';
  import MusicPreferences from './MusicPreferences.vue';
  import Contract from './Contract.vue';

  export default {
    components: {
      'general-info': GeneralInfo,
      'detailed-info': DetailedInfo,
      'physical-appearance': PhysicalAppearance,
      'music-preferences': MusicPreferences,
      'contract': Contract,
    },
    props: ['user', 'roles', 'nationalities', 'eyeColors', 'hairColors', 'contracts','url', 'method'],
    data() {
      return {
        form: new Form(Object.assign({
          role_id: null,
          first_name: null,
          last_name: null,
          email: null,
          password: null,
          password_confirmation: null,
          phone: null,
          pin_code: null,
          stage_name: null,
          address_street: null,
          address_city: null,
          address_state: null,
          address_zip: null,
          address_country: null,
          nationality_id: null,
          emergency_contact_name: null,
          emergency_contact_relationship: null,
          emergency_contact_tel_no: null,
          emergency_contact_cell_no: null,
          is_working_visa: false,
          working_visa_expiry_date: null,
          is_convicted: false,
          convicted_details: null,
          height: 0,
          weight: null,
          bust_size: null,
          waist_size: null,
          eye_color_id: null,
          hair_color_id: null,
          music_preferences: [],
          contract: null,
        }, this.user), {
          music_preferences: ['id', 'artist', 'song_title', 'is_delete']
        }),
      };
    },
    methods: {
      save() {
        this.form.submit(this.method,  this.url)
          .then(() => {
            swal(
              {
                title: this.$i18n.t('ALERTS.HEADERS.SUCCESS'),
                text: this.$i18n.t('PROFILES.' + (this.user.id ? 'MESSAGE_UPDATE_SUCCESS' : 'MESSAGE_CREATE_SUCCESS')),
                type: 'success',
              }
            );
          })
          .catch((response) => {
            if (response.status === 422) return;

            swal(
              this.$i18n.t('ALERTS.HEADERS.ERROR'),
              response.data,
              'error'
            )
          });
      }
    }
  }
</script>