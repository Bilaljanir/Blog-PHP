import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';
import { createPinia } from 'pinia';
import AddComment from './components/AddComment.vue';
import CommentsCount from './components/CommentsCount.vue';
import Comments from './components/Comments.vue';

const app = createApp({});
const pinia = createPinia();

app.component('comments-component', Comments);
app.component('add-comment', AddComment);
app.component('comments-count', CommentsCount);


app.use(pinia);
app.mount("#app");
