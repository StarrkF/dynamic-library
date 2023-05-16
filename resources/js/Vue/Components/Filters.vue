<script setup>
import useConfig from '../../config';
import { ref, onMounted } from 'vue';

const props = defineProps({
    getBooks: {
        type: Function
    },
    filterParams: {
        type: Object
    },
});

const { index } = useConfig();
const selectbox = ref({})

const getFilters = () => {

    index('types').then((response) => {
        selectbox.value.types = response.data
    })

    index('status').then((response) => {
        selectbox.value.status = response.data
    })

    index('list_types').then((response) => {
        selectbox.value.list_types = response.data
    })

    index('libraries').then((response) => {
        selectbox.value.libraries = response.data
    })
}

onMounted(() => {
    getFilters()
})
props.filterParams.byPage = props.filterParams.byPage ?? 50
</script>

<template>
    <div class="card">
        <div class="card-header">Filtreler</div>
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row gap-4 align-items-end">
                <div class="mb-2 w-100">
                    <label>Listele</label>
                    <select class="form-select form-filter" v-model="filterParams.byPage" @change="getBooks">
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                        <option>250</option>
                    </select>
                </div>
                <div class="mb-2 w-100">
                    <label>Durum</label>
                    <select class="form-select form-filter" v-model="filterParams.byStatus" @change="getBooks">
                        <option value="">Filtreyi Temizle</option>
                        <option v-for="state in selectbox.status" :value="state.id">{{ state.name }}</option>
                    </select>
                </div>
                <div class="mb-2 w-100">
                    <label>Kitap Türü</label>
                    <select class="form-select form-filter" v-model="filterParams.byType" @change="getBooks" required>
                        <option value="">Filtreyi Temizle</option>
                        <option v-for="book_type in selectbox.types" :value="book_type.id">{{ book_type.name }}</option>
                    </select>
                </div>
                <div class="mb-2 w-100">
                    <label>Listelenecek Yer</label>
                    <select class="form-select form-filter" v-model="filterParams.byListType" @change="getBooks" required>
                        <option value="">Filtreyi Temizle</option>
                        <option v-for="list in selectbox.list_types" :value="list.id">{{ list.name }}</option>
                    </select>
                </div>
                <div class="mb-2 w-100">
                    <label>Kütüphanede</label>
                    <select class="form-select form-filter" v-model="filterParams.byLibrary" @change="getBooks" required>
                        <option value="">Filtreyi Temizle</option>
                        <option v-for="library in selectbox.libraries" :value="library.id">{{ library.name }}</option>
                    </select>
                </div>
                <div class="mb-2 w-100 input-group mb-2">
                    <input type="text" class="form-control" v-model="filterParams.search" @input="getBooks"
                        placeholder="Kitap, Yazar">
                    <button class="btn btn-outline-dark" type="button">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>
</template>
