<!-- <template>
  <button class="m-btn" btn-type="favorite" @click="postFavorite">
    <span class="fa-star-yellow"></span>気になる!
  </button>
</template> -->

<template>
  <div class="text-center">
    <div
    v-if="!isLiked"
    class="c-btn-like c-btn-like--disliked">
      <span
        @click="postFavorite()"
        class="">
        <i class="fa-thumbs-up"></i>
        行きたい {{ likesCount }}
      </span>
    </div>
    <div
    v-if="isLiked"
    class="c-btn-like c-btn-like--liked">
      <span
        @click="postDisFavorite()">
        <i class="fa-thumbs-up"></i>
        行きたい {{ likesCount }}
      </span>
    </div>
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
        }

        if (response['status'] === 'fail') {
          this.showShareModal()
        }
    },

    async postDisFavorite() {
        let response = await api.postDisFavorite( { job_id: this.jobId, user_id: this.userId} )
        console.log(response)
        if (response['status'] === 'success') {
          this.likesCount = response['likesCount']
          this.isLiked    = response['isLiked']
        }

        if (response['status'] === 'fail') {
          this.showShareModal()
        }
    },

    showShareModal () {
      this.$modal.show(ShareModal, {
      }, {
        height: 'auto',
        width: '320'
      })
    },
  }
}

</script>
<style lang="scss" scoped>
.c-btn-like {
    max-width: 130px;
    min-width: 130px;
    border: 1px solid #19bfbf;
    box-sizing: border-box;
    height: 30px;
    cursor: pointer;
    transition-property: all;
    transition-duration: .25s;
    transition-timing-function: cubic-bezier(.215,.61,.355,1);
    border-radius: 6px;

    &:hover {
      opacity: .8;
    }

    &--liked {
      background: #19bfbf;
      color: #fff;
    }

    &--disliked {
      background: #fff;
      color: #19bfbf;
    }
}
</style>
