
export function postImages(formData) {
  let config = {
      headers: {
          'content-type': 'multipart/form-data'
      }
  }

  return new Promise((resolve, reject) => {
      axios.post('/api/v1/images/', formData, config)   // eslint-disable-line
        .then(res => {
          resolve(res.data)
        })
        .catch(error => {
            reject(error)
        })
  })
}