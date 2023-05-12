<script setup>
import useConfig from '../../config';
import { useRouter, useRoute } from 'vue-router'
import { ref, onMounted, watchEffect } from 'vue';
import Filters from '../Components/Filters.vue'
import BookAdd from '../Components/BookAdd.vue';

const books = ref(null)
const book = ref({})
const filterParams = ref({})
const loading = ref(false)
const bookAddComp = ref()

const { index, show, destroy } = useConfig();
const route = useRoute()


const getBooks = () => {
    loading.value = true
    index('books',
        filterParams.value.byType,
        filterParams.value.byListType,
        filterParams.value.byStatus,
        filterParams.value.byLibrary,
        filterParams.value.search)
        .then((response) => {
            books.value = response.data
            loading.value = false
        })
}

const showBook = (id) => {
    show('books', id).then((response) => {
        const parsedBook = {
            ...response.data,
            status: response.data.status.id,
            list_type_id: response.data.list_type.id,
            in_library: response.data.in_library.id,
            type_id: response.data.list_type.id,
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
            <div class="d-flex justify-content-between mb-4">
                <book-add :get-books="getBooks" ref="bookAddComp" :edit-book="book"></book-add>
            </div>

            <filters :get-books="getBooks" :filter-params="filterParams"></filters>

            <div v-if="loading" class="d-flex justify-content-center align-items-center" style="height: 70vh;">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div v-else class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">
                                <i role="button" id="asc" class="orderBy fa-solid fa-arrow-up fa-xs"></i>
                                <i role="button" id="desc" class="orderBy fa-solid fa-arrow-down fa-xs"></i>
                                ID
                            </th>
                            <th scope="col">Kitap</th>
                            <th scope="col">Yazar</th>
                            <th scope="col">Yayıncı</th>
                            <th scope="col">Sayfa</th>
                            <th scope="col">Tür</th>
                            <th scope="col">Satın Alma</th>
                            <th scope="col">Okunma</th>
                            <th scope="col">Listelenecek Yer</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Kütüphanede</th>
                            <th scope="col" class="text-center">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="book in books">
                            <th>{{ book.id }}</th>
                            <td>{{ book.name }}</td>
                            <td>
                                <a>{{ book.author }}</a>
                            </td>
                            <td>{{ book.publisher }}</td>
                            <td>{{ book.page_count }}</td>
                            <td>{{ book.type?.name }}</td>
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
        </div>
    </div>
</template>
