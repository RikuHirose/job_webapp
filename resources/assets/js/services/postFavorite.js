
export function postFavorite(formData) {

  return new Promise((resolve, reject) => {
      axios.post('/api/spot-likes/like', formData)
        .then(res => {
          resolve(res.data)
        })
        .catch(error => {
            reject(error)
        })
  })
}