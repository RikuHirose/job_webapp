<template>
  <div class="m-search">
    <div class="m-search--wrap">
      <div
        class="m-search__input">
        <input
          v-model="freeWord"
          type="text"
          placeholder="フリーワードで検索">
      </div>
      <div>
        <button
          type="button"
          class="m-btn"
          btn-type="search-obsessed"
          @click="openObsessedBar()">
          <span class="mr-3">こだわり条件</span>
        </button>
      </div>
      <div>
        <button
          type="button"
          class="m-btn"
          @click="searchJobs()">
          {{ searchButtonTitle }}
        </button>
      </div>
    </div>

    <div
      v-if="isOpenObsessedBar"
      class="m-search__suggest">
      <p
        v-if="!isInputed"
        class="m-search__suggest--caution">
        カテゴリ・利用シーン・店名・キーワードを選択してください
      </p>
      <table class="m-search__suggest__table">

        <tr>
          <th class="">
            スキル
          </th>
          <td class="budget-type td">
            <div>
              <label>
                <select
                  v-model="skill_id"
                  class="form-control">
                  <option
                    disabled
                    value="">未選択</option>
                  <option
                    v-for="(skill, index) in skills"
                    :key="index"
                    :value="skill.id">{{ skill.name }}</option>
                </select>
              </label>
            </div>
          </td>
        </tr>

        <tr>
          <th class="">
            職種
          </th>
          <td class="budget-type td">
            <div>
              <label>
                <select
                  v-model="occupation_id"
                  class="form-control">
                  <option
                    disabled
                    value="">未選択</option>
                  <option
                    v-for="(occupation, index) in occupations"
                    :key="index"
                    :value="occupation.id">{{ occupation.name }}</option>
                </select>
              </label>
            </div>
          </td>
        </tr>

        <tr>
          <th class="">
            オフィス出社頻度
          </th>
          <td class="budget-type td">
            <div>
              <label>
                <select
                  v-model="office_time"
                  class="form-control">
                  <option
                    disabled
                    value="">未選択</option>
                  <option
                    v-for="(v, index) in officeTime"
                    :key="index"
                    :value="index">{{ v }}</option>
                </select>
              </label>
            </div>
          </td>
        </tr>

        <tr>
          <th class="">
            稼働
          </th>
          <td class="budget-type td">
            <div>
              <label>
                <select
                  v-model="work_time"
                  class="form-control">
                  <option
                    disabled
                    value="">未選択</option>
                  <option
                    v-for="(v, index) in workTime"
                    :key="index"
                    :value="index">{{ v }}</option>
                </select>
              </label>
            </div>
          </td>
        </tr>
      </table>

      <div class="clearObsesed--wrap">
        <button
          class="clearObsesed__btn"
          @click="clearObsesed()">
          こだわり条件をクリアする
        </button>
      </div>
    </div>
    
    <div
      v-if="isOpenObsessedBar"
      class="m-search__suggest-overlay"
      @click.self="closeObsessedBar()" />
  </div>
</template>
<script>
// import FileUpload from 'vue-upload-component'
export default {
  // components: {
  //   FileUpload,
  // },
  props: {
    skills: {required: true, type: Array},
    occupations: {required: true, type: Array},
    parameters: {required: true, type: Object},
    officeTime: {required: true, type: Array},
    workTime: {required: true, type: Array},
    searchButtonTitle: {required: true, type: String},
  },
  data (){
    return {
      freeWord: '',
      isInputed: false,
      isOpenObsessedBar: false,
      occupation_id: '',
      skill_id: '',
      office_time: '',
      work_time: '',
    }
  },
  created () {
    this.assigningInitialParameters()
  },
  methods: {
    openObsessedBar (){
      this.isOpenObsessedBar = true
    },
    closeObsessedBar (){
      this.isOpenObsessedBar = false
    },
    clearObsesed (){
      this.occupation_id = ''
      this.skill_id = ''
      this.work_time = ''
      this.office_time = ''
    },
    assigningInitialParameters () {
      if (this.parameters['word']) {
        this.freeWord = this.parameters['word']
      }
      if (this.parameters['occupation_id']) { this.occupation_id = this.parameters['occupation_id'] }
      if (this.parameters['skill_id']) { this.skill_id = this.parameters['skill_id'] }
      if (this.parameters['work_time']) { this.work_time = this.parameters['work_time'] }
      if (this.parameters['office_time']) { this.office_time = this.parameters['office_time'] }
    },
    searchJobs () {
      let url = `/jobs?word=${this.freeWord}&occupation_id=${this.occupation_id}&skill_id=${this.skill_id}&work_time=${this.work_time}&office_time=${this.office_time}`

      window.location.href = url
    }
  }
}
</script>
<style lang="scss" scoped>
.m-search {
  box-shadow: 0 1px 2px 0 rgba(0,0,0,.2);
  border-radius: 2px;
  width: 656px;
  margin: 0 auto;
  &--wrap {
    display: flex;
    width: 100%;
  }
  &__suggest {
    background: #fff;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.5);
    padding: 16px;
    width: 100%;
    min-height: 200px;
    box-sizing: border-box;
    border-top: 1px solid #d5d5d8;
    position: relative;
    z-index: 31;

    &--top {
      display: flex;
      flex-wrap: wrap;
      margin: 0 auto;
    }

    &--bottom {
      padding-top: 8px;
      margin-top: 8px;
      border-top: 1px dotted #d5d5d8;
    }

    &--top, &--bottom {
      span {
        &::before {
          font-size: 5px;
          padding-bottom: 5px;
        }
      }
    }

    &__table {
      width: 100%;
      border-spacing: 16px;
    }

    &--caution {
      color: #ff5714;
    }

    &-overlay {
      display: flex;
      align-items: center;
      justify-content: left;
      position: fixed;
      z-index: 30;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    &__list {
      flex: 1 0 0%;
      width: 50%;
    }
    &__category-list {
      padding-right: 8px;
      border-right: 1px dotted #d5d5d8;
    }
    &__situation-list {
      padding-left: 8px;
    }
  }

  &__input {
    position: relative;
    width: 56%;
    i {
      transition: 0.3s;
      color: #aaaaaa;
    }
  }
  &__input input[type='text'] {
    font: 15px/24px sans-serif;
    box-sizing: border-box;
    width: 100%;
    padding: 0.3em;
    padding-left: 16px;
    letter-spacing: 1px;
    border: 0;
    border-radius: 4px;
    &:focus {
      outline: none;
    }
  }

  .td {
    display: flex;
  }
  .budget-type {
    &--switch {
      input {
        display: none;

        &[type="radio"]:checked + .switch-on {
          background-color: yellow;
          color: #fff;
        }
        &[type="radio"]:checked + .switch-off {
          background-color: #fff;
          color: #fff;
        }
      }
      label{
        display: block;
        float: left;
        cursor: pointer;
        width: 48px;
        margin: 0;
        padding: 10px;
        background: #bdc3c7;
        color: #869198;
        font-size: 16px;
        text-align: center;
        line-height: 1;
        transition: .2s;

        &:first-of-type{
          border-radius: 3px 0 0 3px;
        }
        &:last-of-type{
          border-radius: 0 3px 3px 0;
        }
      }
    }
  }

  .clearObsesed {
    &--wrap {
      width: 100%;
      text-align:center;
    }
    &__btn {
      width: 72%;
      height: 32px !important;
      border: 1px solid #d5d5d8;
      background: #fff;

    }
  }

 }
</style>