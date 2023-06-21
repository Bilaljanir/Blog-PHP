<template>
    <div>
        <span className="badge bg-secondary text-danger">{{ count }}</span>
    </div>
</template>

<script>
export default {

    props: {
        count: {
            type: Number,
            required: true
        }
    }
};
</script>
