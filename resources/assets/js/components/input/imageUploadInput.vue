<template>
    <div class="c-imgup-input">
        <p v-if="showImage">
            <img :src="imageUrl">
        </p>
        <p>
            <button class="m-btn" type="button" @click="selectImage">編集</button>
            <input :id="inputId" type="file" v-on:change="fileSelected" style="display: none;">
        </p>
    </div>
</template>

<script>
    import * as api from '../../services/api'
    export default {
        props: {
            defaultCoverUrlFull: {required: false, type: String},
        },
        data: function(){
            return {
                inputId: 'image-input',
                imageUrl : '',
                showImage : false,
                uploadedImage : '',
            }
        },
        created() {
            this.imageUrl = this.defaultCoverUrlFull
            if (this.imageUrl) {
                this.showImage = true
            }
        },
        methods:{
            selectImage (){
              const input = document.querySelector(`#${this.inputId}`);
              input.click()
            },
            async fileSelected(event){
                const formData = new FormData()
                this.uploadedImage = event.target.files[0]
                formData.append('file', this.uploadedImage)

                try {
                    let res = await api.postImages(formData)
                    this.imageUrl = res.data.imageUrl
                    this.showImage = true

                  } catch (error) {
                    console.log(error)
                  }
            }
        }
    }
</script>

<style lang="scss" scoped>
.c-imgup-input {
    text-align: center;
    img {
        border-radius: 80px;
        width: 80px;
        height: 80px;
    }
}
</style>
