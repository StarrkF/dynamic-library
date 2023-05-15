<script setup>
import BaseSelect from './BaseSelect.vue';
import { ref, onMounted } from 'vue'
import useConfig from '../../config';
const { index } = useConfig();


const draw = ref({})
const selectbox = ref({})
const loading = ref(false)
const drawResult = ref({})

const getDraw = () => {
    loading.value = true
    index('draw', draw.value).then((response) => {
        if (response) {
            drawResult.value = response.data
            loading.value = false
        }
    })
}

const resetDraw = () => {
    draw.value = {}
    drawResult.value = {}
    loading.value = false
}

const GetSelects = () => {

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
    GetSelects()
})

</script>

<template>
    <div class="collapse my-2" id="getDraw">
        <div class="card">
            <div class="card-header text-center">
                <h1>Kura Yapmak istediklerini seç</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-4">
                            <BaseSelect :options="selectbox.types" v-model="draw.byType" label="Kitap Türü" />
                        </div>

                        <div class="mb-4">
                            <BaseSelect :options="selectbox.list_types" v-model="draw.byListType" label="Listeleneceği Yer" />
                        </div>

                        <div class="mb-4">
                            <BaseSelect :options="selectbox.status" v-model="draw.byStatus" label="Durum" />
                        </div>

                        <div class="mb-4">
                            <BaseSelect :options="selectbox.libraries" v-model="draw.byLibrary" label="Kütüphanede" />
                        </div>
                            <button class="btn btn-dark py-2 my-1 col-12" @click="getDraw">Kura Çek</button>
                            <button v-if="loading" class="btn btn-danger py-2 my-1 col-12" @click="resetDraw">Sıfırla</button>
                    </div>
                    <div class="col-8">
                        <div v-if="loading || drawResult.name" class="card">
                            <div class="card-header">
                                <h3 class="text-center">Seçilen Kitap</h3>
                            </div>
                            <div class="card-body">

                                <div v-if="loading" class="d-flex justify-content-center align-items-center"
                                    style="height: 30vh;">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>

                                <div v-else class="text-center">
                                    <h1>{{ drawResult.name }}</h1>
                                    <h3>{{ drawResult.author }}</h3>
                                    <h5>{{ drawResult.type.name }} - {{ drawResult.list_type?.name }} - {{ drawResult.status?.name }}</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div></template>
