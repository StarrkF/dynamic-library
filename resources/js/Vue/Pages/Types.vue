<script setup>
import useConfig from '../../config';
import { ref, onMounted } from 'vue';
import BaseInput from '../Components/BaseInput.vue';


const loading = ref(false)
const types = ref()
const type = ref([])

const { index, show, destroy, update, store } = useConfig();


const getTypes = () => {
    loading.value = true
    index('types').then((response) => {
        types.value = response.data
        loading.value = false
    })
}

const storeTypes = () => {
    store('types', type.value).then(getTypes())
}

const showType = (id) => {
    show('types', id).then((response) => {
        type.value = response.data
        type.value.edit = true
    })
}

const updateType = () => {
    update('types', type.value.id, type.value).then((response) => {
        if (response) {
            type.value = {};
            getTypes()
        }
    })
}

const deleteType = (id) => {
    if (confirm('Silmek istediğine emin misin?')) {
        destroy('types', id).then((response) => {
            if(response) {
                getTypes()
            }
        })
    }
}

onMounted(() => {
    getTypes()
})

</script>

<template>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="d-flex flex-column flex-sm-row justify-content-between mb-3 gap-2 align-items-center">
                <BaseInput v-model="type.name" label="Kitap Türü" is_required></BaseInput>
                <div v-if="type.edit" class="d-flex gap-1">
                    <button class="btn btn-outline-success px-5" style="width: fit-content;" @click="updateType">Kaydet</button>
                    <button class="btn btn-outline-danger px-5" @click="type = {}">Vazgeç</button>
                </div>
                <button v-else class="btn btn-outline-dark px-5" @click="storeTypes">Ekle</button>
            </div>
            <div v-if="loading" class="d-flex justify-content-center align-items-center" style="height: 70vh;">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div v-else class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Kitap Türü</th>
                            <th scope="col" class="text-center">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="book_type in types">
                            <td><RouterLink :to="{name:'book-type', params:{type:book_type.id}}"><span class="badge text-bg-dark py-2 px-4">{{ book_type.name }}</span></RouterLink></td>
                            <td>
                                <div class="d-flex justify-content-evenly gap-2">
                                    <button class="btn btn-outline-dark" @click="showType(book_type.id)">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" @click="deleteType(book_type.id)">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style scoped>

.table-responsive {
    max-height: 70vh;
    overflow-y: auto;
}

thead {
    position: sticky;
    top: 0;
    background-color: white;
}

</style>
