<template>
  <div class="" style="display: inline-block;">
    <button
      v-if="!isLiked"
      class="m-btn" btn-type="favorite" @click="postFavorite()">
      <span class="fa-star-yellow"></span>気になる! {{ likesCount }}
    </button>
    <button
      v-if="isLiked"
      class="m-btn isLiked" btn-type="favorite" @click="deleteFavorite()">
      <span class="fa-star-yellow"></span>気になる! {{ likesCount }}
    </button>
  </div>
</template>

<script>
import * as api from '../../services/api'
export default {
  props: {
    jobId: {required: true, type: Number},
    userId: {required: true, type: Number},
    defaultIsFavorited: {required: true, type: Boolean},
    defaultFavoriteCount: {required: true, type: Number},
  },
  data (){
    return {
      likesCount: 0,
      isLiked: false,
    }
  },
  created () {
    this.isLiked    = this.defaultIsFavorited
    this.likesCount = this.defaultFavoriteCount
  },

  methods: {
    async postFavorite() {
        let response = await api.postFavorite( { job_id: this.jobId, user_id: this.userId} )

        if (response['status'] === 'success') {
          this.likesCount = response['likesCount']
          this.isLiked    = response['isLiked']

          this.$toasted.show('この求人をお気に入りに追加しました', {type : 'success'})
        }
    },

    async deleteFavorite() {
        let response = await api.deleteFavorite( { job_id: this.jobId, user_id: this.userId} )

        if (response['status'] === 'success') {
          this.likesCount = response['likesCount']
          this.isLiked    = response['isLiked']

          this.$toasted.show('この求人をお気に入りから削除しました', {type : 'success'})
        }

        // if (response['status'] === 'fail') {
        // }
    },
  }
}

</script>
<style lang="scss" scoped>
.isLiked {
  background-color: #19bfbf;
  color: #fff;
}
</style>
