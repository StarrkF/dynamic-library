<script setup>

import ImageCard from '../Components/ImageCard.vue';

</script>

<template>
    <div class="container-md">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-evenly">
                <h1>Kütüphane</h1>
            </div>

            <div class="card-body py-5">
                <div class="row g-4">
                    <div class="col-md-6">
                        <RouterLink to="/books/3">
                            <ImageCard title="Annem" />
                        </RouterLink>
                    </div>

                    <div class="col-md-6">
                        <RouterLink to="/books/1">
                            <ImageCard title="Kitaplarım" />
                        </RouterLink>
                    </div>
                    <div class="col-md-6">
                        <RouterLink to="/books/2">
                            <ImageCard title="Alınacak" />
                        </RouterLink>
                    </div>
                    <div class="col-md-6">
                        <RouterLink to="/books">
                            <ImageCard title="Tümü" />
                        </RouterLink>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
