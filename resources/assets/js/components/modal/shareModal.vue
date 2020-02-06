<template>
  <div class="m-modal">

    <div class="m-modal__content">
      <h4 class="m-modal__content--head">{{ title }}</h4>
        <div class="text-center mt-3 mb-3">
          <button
            v-if="!defaultIsApplied"
            class="m-btn" btn-type="apply" @click="postApplications()">
              応募する
          </button>
        </div>
    </div>
  </div>
</template>
<script>
import * as api from '../../services/api'
export default {
  props: {
    title: {required: true, type: String},
    description: {required: true, type: String},
    defaultIsApplied: {required: true, type: Boolean},
    formData: {required: true, type: Object},
  },
  data (){
    return {
    }
  },
  created () {
  },

  methods: {
    async postApplications() {
        let response = await api.postApplications( this.formData )

        if (response['status'] === 'success') {
          console.log(1)
        }
    },
  }
}
</script>
<style lang="scss" scoped>

</style>
