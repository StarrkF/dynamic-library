<script setup>
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



</script>

<template>
    <div class="custom-card shadow-lg">
        <div class="custom-card-overlay"></div>
        <img :src="image"
            class="card-img-top" :alt="title">
        <h3 class="custom-card-title text-center">{{ title }}</h3>
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
