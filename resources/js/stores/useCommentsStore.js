import axios from 'axios';
import { defineStore } from 'pinia';

export const useCommentsStore = defineStore('comments', {
    state: () => ({
        comments: []
    }),
    getters: {
        getComments: (state) => state.comments
    },
    actions: {
        async fetchComments(post_id) {
            try {
                const response = await axios.get(`/api/comments/${post_id}`);
                this.comments = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async storeComment(user_id, post_id, body) {
            try {
                const response = await axios.post('/api/add/comment', {
                    user_id,
                    post_id,
                    body
                });

                // Ajoute le commentaire à la liste des commentaires existants
                this.comments.push(response.data);

                // Mettre à jour les commentaires dans la base de données
                await axios.put(`/api/comments/${post_id}`, this.comments);
            } catch (error) {
                console.log(error);
            }
        },
        async deleteComment(commentId) {
            try {
                // Supprime le commentaire de la liste des commentaires
                this.comments = this.comments.filter(comment => comment.id !== commentId);

                // Mettre à jour les commentaires dans la base de données
                await axios.put(`/api/comments/${post_id}`, this.comments);
            } catch (error) {
                console.log(error);
            }
        }
    },
});
