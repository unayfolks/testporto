<template>
    <div class="container">
        <router-link :to="{name : 'tambahsoal'}"><button class="btn btn-primary mx-2">Tambah Soal</button></router-link>
        <button class="btn btn-secondary">Lihat Soal</button>
    </div>
</template>
<script >
import axios from 'axios'
export default {
    data() {
        return {

        }
    },
    methods: {

    },
}
</script>
