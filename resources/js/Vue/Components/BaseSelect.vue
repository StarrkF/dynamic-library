<script setup>
const props = defineProps({
    modelValue: {
        type: [String, Number, Boolean, Object, Array],
        default: null
    },
    label: {
        type: String,
        default: ''
    },
    is_required: {
        type: Boolean,
        default: false
    },
    options: {
        type: Array,
        default: () => []
    }
})
</script>

<template>
    <div>
        <label>{{ label }}<span v-if="is_required" class="text-danger">*</span></label>
        <select :value="modelValue" class="form-select" @change="$emit('update:modelValue',$event.target.value)">
            <option :value="null">Filtreyi Temizle</option>
            <option v-for="option in options" :value="option.id">{{ option.name }}</option>
        </select>
    </div>
</template>
