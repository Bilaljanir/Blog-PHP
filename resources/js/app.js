import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';
import { createPinia } from 'pinia';
import AddComment from './components/AddComment.vue';
import CommentsCount from './components/CommentsCount.vue';
import Comments from './components/Comments.vue';
import FavoritesCount from "./components/FavoritesCount.vue";
import AddToFavorites from "./components/AddToFavorites.vue";

const app = createApp({});
const pinia = createPinia();

app.component('comments-component', Comments);
app.component('add-comment', AddComment);
app.component('comments-count', CommentsCount);
app.component('favorites-count',FavoritesCount);
app.component('add-favorites',AddToFavorites);

app.use(pinia);
app.mount("#app");
