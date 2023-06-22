<template>
    <div>
        <!-- Boucle pour afficher tous les commentaires -->
        <div v-for="comment in comments" :key="comment.id">
            <comment :comment-id="comment.id" @comment-deleted="handleCommentDeleted" />
        </div>
    </div>
</template>

<script>
import Comment from './Comments.vue';

export default {
    components: {
        Comment
    },
    data() {
        return {
            comments: [] // Votre liste de commentaires
        };
    },
    methods: {
        handleCommentDeleted() {
            // Mettre à jour la liste des commentaires après la suppression d'un commentaire
            // Vous pouvez charger à nouveau la liste des commentaires depuis le serveur ou effectuer une mise à jour locale si vous le souhaitez
        }
    }
};
</script>
