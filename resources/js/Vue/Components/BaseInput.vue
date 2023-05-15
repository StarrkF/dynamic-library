<script setup>
const props = defineProps({
    modelValue: {
        type: String,
        default: ""
    },
    label: {
        type: String,
        default: ""
    },
    is_required: {
        type: Boolean,
        default: false
    }
})

</script>

<template>
    <!-- <input class="form-input" type="text" :placeholder="label" :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)" v-bind="$attrs"> -->

    <label class="text-nowrap">{{ label }}<span v-if="is_required" class="text-danger">*</span></label>
    <input type="text" class="form-control" :placeholder="label" :required="is_required" :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)" v-bind="$attrs">
</template>
