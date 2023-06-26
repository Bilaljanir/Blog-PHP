<template>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="searchcanvas" aria-labelledby="searchcanvaslabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="searchcanvaslabel">{{ placeholder }}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <input type="text"
                   v-model="data.term"
                   :placeholder="props.placeholder"
                   @change="getPostsByTerm"
                   class="form-control search-input">
            <div v-if="data.posts.length" class="search-results">
                <ul class="list-group">
                    <li class="list-group-item" v-for="post in data.posts" :key="post.id">
                        <a :href="`http://127.0.0.1:8000/posts/${post.slug}`" class="search-result-link">
                            {{ placeholder === 'Search' ? post.title_en : post.title_fr }}
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="list-group" v-if="data.message">
                <li class="list-group-item error-message">
                    {{ data.message }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { reactive } from "vue";

const data = reactive({
    posts: [],
    term: '',
    message: '',
    errorMessageClass: ''
});

const props = defineProps({
    placeholder: {
        type: String,
        required: true
    }
})

const getPostsByTerm = async () => {
    clearResults();
    if (data.term.length >= 3) {
        try {
            const response = await axios.post('/api/search', {
                term: data.term
            });
            if (response.data.length) {
                data.posts = response.data;
            } else {
                data.message = 'Nothing found!';
                data.errorMessageClass = 'error-message';
            }
        } catch (error) {
            console.log(error);
        }
    }
}

const clearResults = () => {
    data.posts = [];
    data.message = '';
}

</script>

<style>
.offcanvas {
    width: 350px;
}

.offcanvas-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.offcanvas-title {
    color: #343a40;
}

.search-input {
    border-radius: 0;
}

.search-results {
    margin-top: 10px;
}

.search-result-link {
    color: #007bff;
    transition: color 0.3s ease;
}

.search-result-link:hover {
    color: #0056b3;
}

.error-message {
    color: #dc3545;
    font-weight: bold;
    margin-top: 10px;
}
</style>
