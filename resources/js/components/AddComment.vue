
<template>
    <form @submit.prevent="addComment">
        <div class="input-group mb-2">
            <textarea
                placeholder="Start typing..."
                v-model="data.body"
                :required="true"
                class="form-control"
                cols="10"
                rows="1"
                @keydown.enter="addCommentOnEnter"
            ></textarea>
            <button type="submit" class="btn btn-primary"
                    rows="1">
                
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </form>
</template>


<script setup>
import { reactive } from 'vue';
import { useCommentsStore } from "@/stores/useCommentsStore";

const data = reactive({
    body: ''
});

const store = useCommentsStore();

const props = defineProps({
    user_id: {
        type: Number,
        required: true
    },
    post_id: {
        type: Number,
        required: true
    }
})

const addComment = async () => {
    store.storeComment(props.user_id, props.post_id, data.body);data.body = '';
};

const addCommentOnEnter = (event) => {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        addComment();
    }
};
</script>

<style>

</style>
