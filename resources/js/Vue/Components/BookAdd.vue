<script setup>
import BaseInput from './BaseInput.vue';
import BaseSelect from './BaseSelect.vue';
import { ref, onMounted } from 'vue'
import useConfig from '../../config';
const { index } = useConfig();
const props = defineProps({
    title: {
        type: String,
        default: ""
    },
    image: {
        type: String,
        default: "https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80"
    }
})

const book = ref({})
const selectbox = ref({})

const GetSelects = () => {

    index('type').then((response) => {
        selectbox.value.types = response
        console.log(response)
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
    <div>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#bookAdd" role="button">
            Kitap Ekle
        </a>
        <div class="collapse my-2" id="bookAdd">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">

                        <div class="mb-4 col-md-6">
                            <BaseInput label="Kitap Adı" v-model="book.name" is_required/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <BaseInput label="Yazar Adı" v-model="book.author" is_required/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <BaseInput label="Yayın Evi" v-model="book.publisher"/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <BaseInput type="number" label="Sayfa Sayısı" v-model="book.page_count"/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <BaseInput type="date" label="Satın Alma Tarihi" v-model="book.buy_date"/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <BaseInput type="date" label="Okunma Tarihi" v-model="book.read_date"/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <BaseSelect :options="selectbox.types" label="Kitap Türü"/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <BaseSelect :options="selectbox.list_types" label="Listeleneceği Yer"/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <BaseSelect :options="selectbox.status" label="Durum"/>
                        </div>

                        <div class="mb-4 col-md-6">
                            <BaseSelect :options="selectbox.libraries" label="Kütüphanede"/>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>

                        <!--
<div class="mb-4 col-md-6">
<label for="type_id">Kitap Türü <span class="text-danger">*</span></label>
<select name="type_id" id="type_id" required class="form-select" >
<option value="">Seçim Yap</option>
@foreach ($types as $type)
    <option value="{{ $type->id }}">{{ $type->name }}</option>
@endforeach
</select>
</div>

<div class="mb-4 col-md-6">
<label for="list_type_id">Listeleneceği Yer</label>
<select name="list_type_id" id="list_type_id" class="form-select" >
<option value="">Seçim Yap</option>
@foreach ($list_types as $key => $list)
    <option value="{{ $key }}">{{ $list }}</option>
@endforeach
</select>
</div>

<div class="mb-4 col-md-6">
<label for="status">Durum</label>
<select name="status" id="status" class="form-select" >
<option value="">Seçim Yap</option>
@foreach ($statuses as $key => $status)
    <option value="{{ $key }}">{{ $status }}</option>
@endforeach
</select>
</div>

<div class="mb-4 col-md-6">
<label for="in_library">Kütüphanede</label>
<select name="in_library" id="in_library" class="form-select" >
<option value="">Seçim Yap</option>
@foreach ($libraries as $key => $library)
    <option value="{{ $key }}">{{ $library }}</option>
@endforeach
</select>
</div> -->

                    </div>
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
