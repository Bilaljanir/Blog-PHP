<template>
<div class="d-flex flex-column">
    <div class="flex">
        <div class="flex-shrink-0">

            <span class="fw-bold">
                Bilal Janir
            </span>
        </div>
        <div class="flex-lg-grow-1 ms-"></div>
        <span class="text-muted">
            <i>5 hours ago</i>
        </span>
        <p>
        Hello all
        </p>
    </div>

</div>
</template>

<script setup>
import { useCommentsStore } from '@/stores/useCommentsStore';
import {onMounted} from "vue";

const store = useCommentsStore();

const props = defineProps({
    post_id: {
        type: Number,
        required: true
    }
});

onMounted(() => store.fethComments(props.post_id));

</script>

<style>

</style>
