<script setup>
import useConfig from '../../config';
import { ref, onMounted, watchEffect } from 'vue';
import BaseSelect from '../Components/BaseSelect.vue';

import { Bar, Line, Pie } from 'vue-chartjs'

const { index, randomColor, setChartOptions } = useConfig();


const loaded = ref(false)
const chartData = ref({})
const charType = ref([
 {id: 'bar', name: 'Sütun'},
 {id: 'line', name: 'Çizgi'},
 {id: 'pie', name: 'Pasta'},
])

const selectedType = ref({id: 'bar', name: 'Sütun'})
const chartOptions = setChartOptions(selectedType.value)

const getlabels = () => {
  index('types').then((response) => {
    if(response) {
      let backgroundColors = randomColor(response.data.length);
      chartData.value.labels = response.data.map(item => item.name)
      chartData.value.datasets = [{
      label: "Tür / Kitap Sayısı",
      data: response.data.map(item => item.books_count),
      backgroundColor: backgroundColors,
      borderColor: '#000',
      borderWidth: 1
    }];
      loaded.value = true
    }
  })
}

onMounted(() => {
    getlabels()
})


</script>

<template>
    <div>
        <BaseSelect class="mb-4" label="Grafik Türü" :options="charType" :emptyOption="false" v-model="selectedType.id" />

        <div>
            <Bar v-if="loaded && selectedType.id == 'bar'" :data="chartData" :options="chartOptions" style="height: 75vh;"></Bar>
            <Line v-if="loaded && selectedType.id == 'line'" :data="chartData" :options="chartOptions" style="height: 75vh;"></Line>
            <Pie v-if="loaded && selectedType.id == 'pie'" :data="chartData" :options="chartOptions" style="height: 75vh;"></Pie>
        </div>

    </div>

</template>
