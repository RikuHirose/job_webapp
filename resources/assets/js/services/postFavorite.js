
export function postFavorite(formData) {

  return new Promise((resolve, reject) => {
      axios.post('/api/v1/favorites', formData)  // eslint-disable-line
        .then(res => {
          resolve(res.data)
        })
        .catch(error => {
            reject(error)
        })
  })
}