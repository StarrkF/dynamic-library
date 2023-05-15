<script setup>
const props = defineProps({
    type: {
        type: String,
        default: "danger"
    },
    message: {
        type: [Object, Array, String]
    },
})
console.log(props.message)
console.log(typeof props.message === 'string')

</script>

<template>
    <div class="alert alert-dismissible fade show" :class="'alert-' + type" role="alert">
            <p v-if="(typeof props.message === 'string')">
                {{ message }}
            </p>
            <ul v-else v-for="errors in message">
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</template>
