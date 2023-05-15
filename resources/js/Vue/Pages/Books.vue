<script setup>
import useConfig from '../../config';
import { useRouter, useRoute } from 'vue-router'
import { ref, onMounted, watchEffect } from 'vue';
import Filters from '../Components/Filters.vue'
import BookAdd from '../Components/BookAdd.vue';
import Pagination from '../Components/Pagination.vue';
import Draw from '../Components/Draw.vue';

const books = ref(null)
const book = ref({})
const filterParams = ref({})
const loading = ref(false)
const bookAddComp = ref()
const pageInfo = ref({})
const tableHead = {
    id: 'ID',
    name: 'Kitap',
    type: 'Tür',
    author: 'Yazar',
    publisher: 'Yayıncı',
    page_count: 'Sayfa',
    buy_date: 'Satın Alma',
    read_date: 'Okunma',
    list_type: 'Listelenecek Yer',
    status: 'Durum',
    in_library: 'Kütüphanede'
}

const orderBy = ref({
    row: 'id',
    type: 'asc',
})

const { index, show, destroy } = useConfig();
const route = useRoute()


const getBooks = () => {
    loading.value = true

    const params = {
        page: pageInfo.value.currentPage,
        byPage: filterParams.value.byPage,
        byType: filterParams.value.byType,
        byListType: filterParams.value.byListType,
        byStatus: filterParams.value.byStatus,
        byLibrary: filterParams.value.byLibrary,
        search: filterParams.value.search,
        orderBy: orderBy.value.row,
        orderType: orderBy.value.type
    }
    index('books', params)
        .then((response) => {
            books.value = response.data
            loading.value = false
            pageInfo.value = response.meta
        })
}

const setPage = (page) => {
    pageInfo.value.currentPage = page
    getBooks()
}

const setOrder = (row) => {
    orderBy.value = {
        row: row,
        type: orderBy.value.type == 'asc' ? 'desc' : 'asc'
    }
    getBooks()
}

const showBook = (id) => {
    show('books', id).then((response) => {
        let book = response.data
        const parsedBook = {
            ...book,
            status: book.status?.id,
            list_type_id: book.list_type.id,
            in_library: book.in_library?.id,
            type_id: book.list_type.id,
            edit: true
        }
        bookAddComp.value.book = parsedBook
        window.scrollTo(0, 0)
    })
}

const deleteBook = (id) => {
    if (confirm('Silmek istediğine emin misin?')) {
        destroy('books', id).then((response) => {
            if(response) {
                getBooks()
            }
        })
    }
}

onMounted(() => {
    route.params.id ? filterParams.value.byListType = route.params.id : ''
    getBooks()
})

</script>

<template>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="d-flex gap-2 mb-4">
                <a class="btn btn-outline-info px-5" data-bs-toggle="collapse" href="#bookAdd" role="button">
                    Kitap Ekle
                </a>

                <router-link to="/types">
                    <button class="btn btn-outline-warning px-5">Kitap Türleri</button>
                </router-link>

                <a class="btn btn-outline-success px-5" data-bs-toggle="collapse" href="#getDraw" role="button">
                    Kura
                </a>

                <router-link to="/chart">
                    <button class="btn btn-outline-primary px-5">Veriler</button>
                </router-link>

            </div>
            <book-add :get-books="getBooks" ref="bookAddComp" :edit-book="book"></book-add>
            <Draw/>
            <filters :get-books="getBooks" :filter-params="filterParams"></filters>

            <div class="mt-3">
                <small><strong>Toplam Kayıt:</strong>  {{ pageInfo.total }}</small>
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

                            <th  v-for="(value, key) in tableHead" :key="key" scope="col" @click="setOrder(key)" role="button">
                                <div class="d-flex gap-1">
                                    <span><i role="button" class="fa-solid fa-sort fa-xs"></i></span>
                                    <span>{{ value }}</span>
                                </div>
                            </th>
                            <th scope="col" class="text-center">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="book in books">
                            <th>{{ book.id }}</th>
                            <td width="300">{{ book.name }}</td>
                            <td width="250">{{ book.type?.name }}</td>
                            <td width="200">{{ book.author }}</td>
                            <td>{{ book.publisher }}</td>
                            <td>{{ book.page_count }}</td>
                            <td>{{ book.buy_date }}</td>
                            <td>{{ book.read_date }}</td>
                            <td>{{ book.list_type?.name }}</td>
                            <td>{{ book.status?.name }}</td>
                            <td>{{ book.in_library?.name }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-outline-dark" @click="showBook(book.id)">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" @click="deleteBook(book.id)">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <Pagination :page-info="pageInfo" :get-data="setPage"/>
        </div>
    </div>
</template>

<style scoped>

.table-responsive {
    max-height: 60vh;
    overflow-y: auto;
}

thead {
    position: sticky;
    top: 0;
    background-color: white;
}

</style>
