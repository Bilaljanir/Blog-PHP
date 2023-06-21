<template>
    <button @click="addToFavorites">Ajouter aux favoris</button>
</template>



<script>
export default {
    methods: {
        addToFavorites() {
            axios.post('/api/addToFavorites', { articleId: 123 })
                .then(response => {
                    this.$emit('add-favorites');
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>

<style scoped>
/* Ajoutez ici les styles spécifiques au composant AddToFavorites.vue */
</style>
