// https://stackoverflow.com/questions/51374367/axios-is-not-defined-in-vue-js-cli
export function postDisFavorite(formData) {

  return new Promise((resolve, reject) => {
      axios.post('/api/spot-likes/dislike', formData)
        .then(res => {
          resolve(res.data)
        })
        .catch(error => {
            reject(error)
        })
  })
}