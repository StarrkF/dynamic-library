<script setup>
import BaseInput from './BaseInput.vue';
import BaseSelect from './BaseSelect.vue';
import Alert from './Alert.vue';
import { ref, onMounted } from 'vue'
import useConfig from '../../config';
const { index, store, update, errors } = useConfig();

const props = defineProps({
  getBooks: {
    type: Function,
    required: true
  }
});

const book = ref({})
const selectbox = ref({})
const successAlert = ref('')

const GetSelects = () => {

    index('type').then((response) => {
        selectbox.value.types = response
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

const bookAdd = () => {
    errors.value = null
    successAlert.value = null
    store('books', book.value).then((response) => {
        if (response) {
            response ? successAlert.value = book.value.name + " Kitabı Başarıyla Eklendi!" : ''
            book.value = {};
            props.getBooks()
        }
    })
}

const bookUpdate = () => {
    update('books', book.value.id, book.value).then((response) => {
        if (response) {
            response ? successAlert.value = book.value.name + " Kitabı Başarıyla Güncellendi!" : ''
            book.value = {};
            props.getBooks()
        }
    })
}

const cancel = () => {
    book.value = {}
}

defineExpose({
    book,
})

onMounted(() => {
    GetSelects()
})

</script>

<template>
    <div>
        <a class="btn btn-outline-info px-5" data-bs-toggle="collapse" href="#bookAdd" role="button">
            Kitap Ekle
        </a>
        <div :class="['collapse mt-2', { 'show': book.edit }]" id="bookAdd">
            <alert v-if="errors" :message="errors"></alert>
            <alert v-if="successAlert" :message="successAlert" type="success"></alert>
            <div class="card shadow">
                <div class="card-body">
                    <form @submit.prevent="book.edit ? bookUpdate() : bookAdd()">
                        <div class="row">

                            <div class="mb-4 col-md-6">
                                <BaseInput label="Kitap Adı" v-model="book.name" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <BaseInput label="Yazar Adı" v-model="book.author" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <BaseInput label="Yayın Evi" v-model="book.publisher" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <BaseInput type="number" label="Sayfa Sayısı" v-model="book.page_count" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <BaseInput type="date" label="Satın Alma Tarihi" v-model="book.buy_date" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <BaseInput type="date" label="Okunma Tarihi" v-model="book.read_date" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <BaseSelect :options="selectbox.types" v-model="book.type_id" label="Kitap Türü" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <BaseSelect :options="selectbox.list_types" v-model="book.list_type_id"
                                    label="Listeleneceği Yer" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <BaseSelect :options="selectbox.status" v-model="book.status" label="Durum" />
                            </div>

                            <div class="mb-4 col-md-6">
                                <BaseSelect :options="selectbox.libraries" v-model="book.in_library" label="Kütüphanede" />
                            </div>

                            <div v-if="book.edit" class="mt-4 d-flex gap-2 justify-content-end">
                                <button @click="cancel" class="btn btn-danger">Vazgeç</button>
                                <button type="submit" class="btn btn-dark">Kaydet</button>
                            </div>

                            <div v-else class="mt-4">
                                <button type="submit" class="btn btn-primary">Ekle</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</template>

<style scoped>
.custom-card {
    position: relative;
    overflow: hidden;
    border: solid 1px black;
    border-radius: 20px;
}

.custom-card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.custom-card:hover .custom-card-overlay {
    opacity: 1;
    cursor: pointer;
}

.custom-card-title {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    color: #fff;
    font-size: 28px;
    font-weight: bold;
    font-family: 'Montserrat', sans-serif;
    text-align: center;
    width: 100%;
}
</style>
