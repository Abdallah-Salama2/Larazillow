import axios from 'axios'
import 'bootstrap'

// Set base URL for Axios requests if needed
axios.defaults.baseURL = '/'

// Include CSRF token in Axios requests
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
const csrfToken = document.head.querySelector('meta[name="csrf-token"]')
if (csrfToken) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

window.axios = axios
