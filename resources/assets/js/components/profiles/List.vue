<template>
  <div>

    <v-client-table :data="users" :columns="columns" :options="options"></v-client-table>

    <a href="/profiles/create" class="btn btn-primary waves-effect w-md waves-light">
      Add new
    </a>
  </div>
</template>

<script>
  import ListManageEdit from './ListManageEdit.vue';

  export default {
    props: ['users'],
    data() {
      return {
        columns: [
          'id',
          'name',
          'stage_name',
          'role',
          'phone',
          'email',
          'manage',
        ],
        options: {
          filterByColumn: false,
          sortable: [],
          templates: {
            name: function (h, row) {
              return row.first_name + ' ' + row.last_name;
            },
            role: function (h, row) {
              return this.$i18n.t(`ROLES.${row.role.slug}`);
            },
            manage: ListManageEdit
          }
        },
      }
    },
  }
</script>