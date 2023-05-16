import './bootstrap';


import {createApp} from 'vue/dist/vue.esm-bundler';

import Comments from './components/Comments.vue';

const app = createApp({});

app.component('app-component', Comments);

app.mount("#app");
