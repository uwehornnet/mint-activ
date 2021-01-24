import React from 'react'
import ReactDOM from 'react-dom'
import App from './App'

const elem = document.getElementById('post-player')

if (elem) {
    ReactDOM.render(<App {...elem.dataset} />, elem)
}
