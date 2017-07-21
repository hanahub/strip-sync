<template>
  <div>
    <form novalidate @submit.prevent="save" @keydown="form.errors.clear($event.target.name)">
      <ul class="nav nav-tabs tabs-bordered nav-justified">
        <li class="nav-item">
          <a href="#venue-info" data-toggle="tab" aria-expanded="false" class="nav-link active">
            {{ $t("SETTINGS.VENUE_INFO.TITLE") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#default-settings" data-toggle="tab" aria-expanded="true" class="nav-link">
            {{ $t("SETTINGS.DEFAULT_SETTINGS.TITLE") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#shifts" data-toggle="tab" aria-expanded="false" class="nav-link">
            {{ $t("SETTINGS.SHIFT_TIMES.TITLE") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#working-environment" data-toggle="tab" aria-expanded="false" class="nav-link">
            {{ $t("SETTINGS.WORKING_ENVIRONMENT.TITLE") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#views-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
            {{ $t("SETTINGS.VIEWS.TITLE") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#roles-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
            {{ $t("SETTINGS.ROLES.TITLE") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#contacts-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
            {{ $t("SETTINGS.CONTRACTS.TITLE") }}
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="venue-info">
          <venue-info :form="form"></venue-info>
        </div>
        <div class="tab-pane" id="default-settings">
          <default-settings :form="form"></default-settings>
        </div>
        <div class="tab-pane" id="shifts">
          <shift-times :shift-times="form.shiftTimes" :errors="form.errors"></shift-times>
        </div>
        <div class="tab-pane" id="working-environment">
          <working-environment :form="form"></working-environment>
        </div>
        <div class="tab-pane" id="views-b2">
          <pages :pages="form.pages"></pages>
        </div>
        <div class="tab-pane" id="roles-b2">
          <roles :roles="form.roles"></roles>
        </div>
        <div class="tab-pane" id="contacts-b2">
          <contracts :contracts="form.contracts"></contracts>
        </div>
      </div>

      <button type="submit" :disabled="form.errors.any()" class="btn btn-success waves-effect w-md waves-light">
        {{ $t("SETTINGS.BUTTON_SAVE") }}
      </button>
    </form>
  </div>
</template>

<script>
  import Form from './Form.js';
  import VenueInfo from './VenueInfo.vue';
  import DefaultSettings from './DefaultSettings.vue';
  import ShiftTimes from './ShiftTimes.vue';
  import WorkingEnvironment from './WorkingEnvironment.vue';
  import Pages from './Pages.vue';
  import Roles from './Roles.vue';
  import Contracts from './Contracts.vue';

  Object.defineProperty(Array.prototype, 'chunk', {
    value: function (chunkSize) {
      let R = [];
      for (let i = 0; i < this.length; i += chunkSize)
        R.push(this.slice(i, i + chunkSize));
      return R;
    }
  });

  export default {
    components: {
      'venue-info': VenueInfo,
      'default-settings': DefaultSettings,
      'shift-times': ShiftTimes,
      'working-environment': WorkingEnvironment,
      'pages': Pages,
      'roles': Roles,
      'contracts': Contracts,
    },
    props: ['url', 'venue', 'shiftTimes', 'pages', 'roles', 'contracts'],
    data() {
      return {
        form: new Form(Object.assign({}, this.venue, {
          shiftTimes: this.shiftTimes,
          pages: this.pages,
          roles: this.roles,
          contracts: this.contracts,
        }), {
          roles: ['id', 'is_enabled'],
          pages: ['id', 'is_enabled'],
          shiftTimes: ['id', 'start', 'end', 'is_delete']
        })
      }
    },
    methods: {
      save() {
        this.form.put(this.url)
          .then(() => {
            swal(
              {
                title: this.$i18n.t('ALERTS.HEADERS.SUCCESS'),
                text: this.$i18n.t('SETTINGS.MESSAGE_UPDATE_SUCCESS'),
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