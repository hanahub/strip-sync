<template>
  <div>
    <form novalidate @submit.prevent="save" @keydown="form.errors.clear($event.target.name)">
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
          <!--<music-preferences :form="this.form"></music-preferences>-->
        </div>
        <div class="tab-pane" id="contract">
          <!--<pages :pages="form.pages"></pages>-->
        </div>
      </div>

      <button type="submit" :disabled="form.errors.any()" class="btn btn-success waves-effect w-md waves-light">
        {{ $t("PROFILES.BUTTON_SAVE") }}
      </button>
    </form>
  </div>
</template>

<script>
  import Form from './../../Form';
  import GeneralInfo from './GeneralInfo.vue';
  import DetailedInfo from './DetailedInfo.vue';
  import PhysicalAppearance from './PhysicalAppearance.vue';

  export default {
    components: {
      'general-info': GeneralInfo,
      'detailed-info': DetailedInfo,
      'physical-appearance': PhysicalAppearance,
    },
    props: ['user', 'roles', 'nationalities', 'eyeColors', 'hairColors'],
    data() {
      return {
        form: new Form(Object.assign(this.user, {
          is_working_visa: false,
          is_convicted: false,
          height: 0
        })),
      };
    },
  }
</script>