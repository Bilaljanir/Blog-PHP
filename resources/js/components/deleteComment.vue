<template>
    <!-- Votre contenu de template ici -->
</template>

<script setup>
import { useCommentsStore } from '@/stores/useCommentsStore';
import { onMounted, defineProps } from 'vue';

const store = useCommentsStore();

const props = defineProps({
    post_id: {
        type: Number,
        required: true
    }
});

const deleteComment = async (commentId) => {
    try {
        await store.deleteComment(commentId);
        // Suppression réussie, afficher une alerte
        window.alert('Commentaire supprimé avec succès.');
    } catch (error) {
        console.log(error);
        // Erreur lors de la suppression, afficher une alerte d'erreur
        window.alert("Une erreur s'est produite lors de la suppression du commentaire.");
    }
};

onMounted(() => {
    store.fetchComments(props.post_id);
});
</script>

<style scoped>
/* Vos styles CSS ici */
</style>
