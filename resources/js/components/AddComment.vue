<template>
    <form @submit.prevent="addComment">
    <div class="mb-2">
        <textarea
            placeholder="start typing..."
            v-model="data.body"
            :required="true"
            class="form-control" cols="30" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            Add
        </button>
    </form>
</template>

<script setup>
import { reactive } from "vue";

const data = reactive({
    body: ''
});

const props = defineProps({
    user_id: {
        type: Number,
        required: true
    },
    post_id: {
        type: Number,
        required: true
    }
});
const addComment = async () => {
    try {
        const response = await axios.post('/api/add/comment',{
            user_id: props.user_id,
            post_id: props.post_id,
            body: data.body
        })
        console.log(response.data);
        data.body ='';
    }
    catch (error){
        console.log(error);
    }
}


</script>
<style>


</style>
