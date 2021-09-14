require('./bootstrap');

const Vue = require('vue');

import HelloWorld from './components/HelloWorld';

const app = Vue.createApp({});
app.component('HelloWorld', HelloWorld);
app.mount('#app');
