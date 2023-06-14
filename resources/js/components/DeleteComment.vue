<template>
    <button @click="deleteComment" class="btn btn-danger">Delete</button>
</template>

<script>
import axios from 'axios';

export default {
    props: ['commentId'],
    methods: {
        deleteComment() {
            axios.delete(`/comments/${this.commentId}`)
                .then(response => {
                    // Afficher un message de succès ou effectuer une action supplémentaire
                    console.log(response.data.message);
                })
                .catch(error => {
                    // Gérer les erreurs de suppression du commentaire
                    console.error(error.response.data.message);
                });
        }
    }
}
</script>
