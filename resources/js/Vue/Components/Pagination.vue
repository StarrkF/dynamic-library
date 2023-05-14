<script setup>
const props = defineProps({
    pageInfo: {
        type: Object
    },
    getData: {
        type: Function
    }
})
props.pageInfo.current_page = props.pageInfo.current_page  ?? 1
</script>

<template>
<nav aria-label="Page navigation" class="d-flex gap-2 align-items-baseline mt-3">
    <ul class="pagination">
        <li class="page-item" :class="{ disabled: pageInfo.current_page === 1 }">
            <a role="button" class="page-link" @click="getData((pageInfo.current_page - 1))"> <i class="fa-solid fa-angle-left"></i> </a>
        </li>
        <li class="page-item" v-for="page in pageInfo.last_page" :key="page" :class="{ active: page === pageInfo.current_page }">
            <a role="button" class="page-link" @click="getData(page)">{{ page }}</a>
        </li>
        <li class="page-item" :class="{ disabled: pageInfo.current_page === pageInfo.last_page }">
            <a role="button" class="page-link" @click="getData(pageInfo.current_page + 1)"><i class="fa-solid fa-angle-right"></i></a>
        </li>
    </ul>
    <small><strong>Toplam Kayıt:</strong>  {{ pageInfo.total }}</small>
</nav>

</template>

<style scoped>

.page-link {
    color:black;
}
.page-link.active, .active > .page-link {
    color: white;
    background-color: black;
    border-color: black;
}
</style>
