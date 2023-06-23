<template>
    <button @click="addToFavorites">Ajouter aux favoris</button>
</template>



<script>
export default {
        addToFavorites() {
            axios.post('/api/addToFavorites', { articleId: 123 })
                .then(response => {
                    this.$emit('add-favorites');
                })
                .catch(error => {
                    console.error(error);
                });
        }
};
</script>

<style scoped>
</style>
