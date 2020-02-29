
export function deleteFavorite(formData) {
  // https://qiita.com/yfujii1127/items/991ae9ff29b478a55b1c
  return new Promise((resolve, reject) => {
      axios.delete('/api/v1/favorites', { data: formData })  // eslint-disable-line
        .then(res => {
          resolve(res.data)
        })
        .catch(error => {
            reject(error)
        })
  })
}