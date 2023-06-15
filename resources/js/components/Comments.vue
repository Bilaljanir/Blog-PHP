<template>
    <div class="d-flex flex-column">
        <div
            class="flex"
            v-for="comment in store.getComments.slice(0, data.commentToShow)"
            :key="comment.id"
        >
            <div class="d-flex align-items-center">
                <i class="fas fa-user me-1"></i>
                <span class="fw-bold">{{ comment.user.name }}</span>
                <span class="text-muted ms-2">
          <i>{{ comment.created_at }}</i>
        </span>
                <button @click="deleteComment(comment.id)" class="btn btn-sm btn-danger ms-auto">
                    Supprimer
                </button>
            </div>
            <div class="flex-lg-grow-1 ms-"></div>
            <p>{{ comment.body }}</p>
        </div>
        <button
            v-if="data.commentToShow < store.getComments.length"
            @click="loadMoreComments"
            class="btn btn-sm btn-link text-decoration-none text-dark"
        >
            Load more
        </button>
    </div>
</template>

<script setup>
import { useCommentsStore } from '@/stores/useCommentsStore';
import { onMounted, reactive } from 'vue';

const store = useCommentsStore();
const data = reactive({
    commentToShow: 4
});

const props = defineProps({
    post_id: {
        type: Number,
        required: true
    }
});

const loadMoreComments = () => {
    if (data.commentToShow >= store.getComments.length) {
        return;
    } else {
        data.commentToShow = data.commentToShow + 3;
    }
};

const deleteComment = async (commentId) => {
    try {
        await store.deleteComment(commentId);
    } catch (error) {
        console.log(error);
    }
};

onMounted(() => store.fetchComments(props.post_id));
</script>

<style scoped>
</style>
