<template>
  <div class="" style="display: inline-block;">
    <button
      v-if="!defaultIsApplied"
      class="m-btn" btn-type="apply" @click="showApplyModal()">
        応募する
    </button>
    <button
      v-if="defaultIsApplied"
      class="m-btn disabled" btn-type="apply">
        すでに応募済です
    </button>
  </div>
</template>

<script>
import ApplyModal from '../modal/applyModal.vue'
export default {
  props: {
    jobId: {required: true, type: Number},
    companyId: {required: true, type: Number},
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
    showApplyModal () {
      this.$modal.show(ApplyModal, {
        title: 'この求人に応募する',
        defaultIsApplied: this.defaultIsApplied,
        formData: { job_id: this.jobId, user_id: this.userId, company_id: this.companyId, status: 0},
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
