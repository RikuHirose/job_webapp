
export function postDisFavorite(formData) {

  return new Promise((resolve, reject) => {
      axios.post('/api/v1/dis-favorites', formData)  // eslint-disable-line
        .then(res => {
          resolve(res.data)
        })
        .catch(error => {
            reject(error)
        })
  })
}