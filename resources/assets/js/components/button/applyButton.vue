<template>
  <div class="" style="display: inline-block;">
    <button
      v-if="!defaultIsApplied"
      class="m-btn" btn-type="apply" @click="showShareModal()">
        応募する
    </button>
    <button
      v-if="defaultIsApplied"
      class="m-btn disabled" btn-type="apply">
        すでに応募済みです
    </button>
  </div>
</template>

<script>
import ShareModal from '../modal/shareModal.vue'
export default {
  props: {
    jobId: {required: true, type: Number},
    userId: {required: true, type: Number},
    defaultIsApplied: {required: true, type: Boolean},
  },
  data (){
    return {
    }
  },
  created () {
  },

  methods: {
    showShareModal () {
      this.$modal.show(ShareModal, {
        title: 'この求人に応募する',
        defaultIsApplied: this.defaultIsApplied,
        formData: { job_id: this.jobId, user_id: this.userId},
      }, {
        height: 'auto',
        width: '320'
      })
    },
  }
}

</script>
<style lang="scss" scoped>
</style>
