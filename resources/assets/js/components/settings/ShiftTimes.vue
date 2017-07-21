<template>
  <div class="m-b-10">
    <p>{{ $t("SETTINGS.SHIFT_TIMES.DESCRIPTION") }}</p>

    <shift-time v-for="(shiftTime, index) in shiftTimes"
                v-if="!shiftTime.is_delete"
                :key="shiftTime.id"
                :index="index"
                :errors="errors"
                :shift-time="shiftTime"
                :remove="removeShiftTime"></shift-time>

    <button type="button" class="btn btn-primary waves-effect w-md waves-light" @click="addShiftTime">
      {{ $t("SETTINGS.SHIFT_TIMES.BUTTON_ADD_SHIFT_TIME") }}
    </button>
  </div>
</template>

<script>
  import ShiftTime from './ShiftTime.vue';
  import { maxValueOfRandomID } from './../../constants';

  export default {
    components: {
      'shift-time': ShiftTime
    },
    props: ['shiftTimes', 'errors'],
    methods: {
      addShiftTime: function () {
        this.shiftTimes.push({
          id: Math.random(),
          start: null,
          end: null
        });
      },
      removeShiftTime: function (id) {
        let shiftTimeIndex = this.shiftTimes.findIndex((shiftTime) => {
          return shiftTime.id === id;
        });

        if (id < maxValueOfRandomID) {
          this.shiftTimes.splice(shiftTimeIndex, 1);
        } else {
          this.shiftTimes.splice(shiftTimeIndex, 1, Object.assign({}, this.shiftTimes[shiftTimeIndex], {is_delete: true}));
        }
      }
    }
  }
</script>
