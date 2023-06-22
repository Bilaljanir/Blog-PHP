<template>
    <div class="d-flex flex-column">
        <div v-for="comment in store.getComments.slice(0, data.commentToShow)" :key="comment.id" class="mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user me-1"></i>
                            <small class="me-2">{{ comment.user.name }}</small>
                        </div>
                        <button v-if="can_delete" @click="deleteComment(comment.id)" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <p>{{ comment.body }}</p>
                </div>
            </div>
        </div>
        <button v-if="data.commentToShow < store.getComments.length" @click="loadMoreComments" class="btn btn-sm btn-link text-decoration-none text-dark">
            Load more
        </button>
    </div>
</template>

<script setup>
import { useCommentsStore } from '@/stores/useCommentsStore';
import { onMounted, reactive } from 'vue';
import { defineProps } from 'vue';
import { computed } from 'vue';

const store = useCommentsStore();
const data = reactive({
    commentToShow: 4
});

const props = defineProps({
    post_id: {
        type: Number,
        required: true
    },
    can_delete: {
        type: Boolean,
        default: false
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
    try {
        await store.deleteComment(commentId);
        // Suppression réussie, afficher une alerte
        window.alert('Commentaire supprimé avec succès.');
    } catch (error) {
        console.log(error);
        // Erreur lors de la suppression, afficher une alerte d'erreur
        window.alert('Une erreur s\'est produite lors de la suppression du commentaire.');
    }

};

onMounted(() => store.fetchComments(props.post_id));
</script>

<style scoped>
</style>
