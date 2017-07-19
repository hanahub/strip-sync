<template>
  <div class="row">
    <div class="col-3">

      <div class="form-group">
        <label>{{ $t("PROFILES.PHYSICAL_APPEARANCE.HEIGHT") }}</label>

        <span>{{ form.height }}</span>

        <input type="range" min="0" max="96" class="form-control" v-model="form.height" name="height">
        <validation-message :errors="form.errors" :property-name="'height'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.PHYSICAL_APPEARANCE.WEIGHT") }}</label>
        <div class="input-group">
          <input type="number" min="0" class="form-control" v-model="form.weight" name="weight">
          <span class="input-group-addon">lbs</span>
        </div>
        <validation-message :errors="form.errors" :property-name="'weight'"></validation-message>
      </div>

    </div>

    <div class="col-3">

      <div class="form-group">
        <label>{{ $t("PROFILES.PHYSICAL_APPEARANCE.BUST_SIZE") }}</label>
        <input type="number" min="0" class="form-control" v-model="form.bust_size" name="bust_size">
        <validation-message :errors="form.errors" :property-name="'bust_size'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.PHYSICAL_APPEARANCE.WAIST_SIZE") }}</label>
        <input type="number" min="0" class="form-control" v-model="form.waist_size" name="waist_size">
        <validation-message :errors="form.errors" :property-name="'waist_size'"></validation-message>
      </div>

    </div>

    <div class="col-3">

      <div class="form-group">
        <label>{{ $t("PROFILES.PHYSICAL_APPEARANCE.EYE_COLOR") }}</label>

        <select class="form-control" v-model="form.eye_color_id" name="eye_color_id">
          <option v-for="eyeColor in eyeColors" :value="eyeColor.id">{{ eyeColor.title }}
          </option>
        </select>

        <validation-message :errors="form.errors" :property-name="'eye_color_id'"></validation-message>
      </div>

      <div class="form-group">
        <label>{{ $t("PROFILES.PHYSICAL_APPEARANCE.HAIR_COLOR") }}</label>

        <select class="form-control" v-model="form.hair_color_id" name="hair_color_id">
          <option v-for="hairColor in hairColors" :value="hairColor.id">{{ hairColor.title }}
          </option>
        </select>

        <validation-message :errors="form.errors" :property-name="'hair_color_id'"></validation-message>
      </div>

    </div>
  </div>
</template>

<script>
  export default {
    props: ['form', 'eyeColors', 'hairColors'],
  }
</script>
