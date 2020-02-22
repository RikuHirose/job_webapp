<template>
  <div class="m-modal">

    <div class="m-modal__content">
      <h4 class="m-modal__content--head">{{ title }}</h4>
        <div class="text-center mt-3 mb-3">
          <button
            v-if="!isApplied"
            class="m-btn" btn-type="apply" @click="postApplications()">
              応募する
          </button>
          <button
            v-if="isApplied"
            class="m-btn" btn-type="apply">
              すでに応募済です
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
    defaultIsApplied: {required: true, type: Boolean},
    formData: {required: true, type: Object},
  },
  data (){
    return {
      isApplied: true
    }
  },
  created () {
    this.isApplied = this.defaultIsApplied
  },

  methods: {
    async postApplications() {
        let response = await api.postApplications( this.formData )

        if (response['status'] === 'success') {
          this.isApplied = true
          this.$toasted.show('この求人に応募しました', {type : 'success'})
        }

        if (response['status'] === 'fail') {
          this.$toasted.show('この求人は既に応募済みです', {type : 'error'})
        }
    },
  }
}
</script>
<style lang="scss" scoped>

</style>
