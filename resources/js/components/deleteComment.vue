<template>
    <button @click="deleteComment">Supprimer</button>
</template>

<script>
export default {
    methods: {
        deleteComment() {
            // Envoyer une requête AJAX vers la route de suppression de commentaire
            // Utiliser l'ID du commentaire pour identifier le commentaire à supprimer
            axios.delete(`/comments/${this.commentId}`)
                .then(response => {
                    // Le commentaire a été supprimé avec succès
                    // Mettre à jour la liste des commentaires dans le composant parent si nécessaire
                })
                .catch(error => {
                    // Gérer les erreurs lors de la suppression du commentaire
                });
        }
    },
    props: ['commentId']
}
</script>
