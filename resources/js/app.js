import './bootstrap';


import {createApp} from 'vue/dist/vue.esm-bundler';

import AddComment from './components/AddComment.vue';
import CommentsCount from './components/CommentsCount.vue';
import Comments from './components/Comments.vue';

const app = createApp({});

app.component('comments-component', Comments);
app.component('add-comment', AddComment);
app.component('comments-count', CommentsCount);

app.mount("#app");
