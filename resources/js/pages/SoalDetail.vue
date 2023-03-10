<template>
    <div>
        {{ id }}
        <label for="">Nama :</label>
        <p>{{this.soal.nama}}</p>
        <label for="">Kelas :</label>
        <p>{{this.soal.kelas}}</p>
        <label for="">No Induk :</label>
        <p>{{this.soal.noinduk}}</p>
        <div>

        </div>
    </div>
</template>
<script>
import axios from 'axios';


export default {
    props:['id'],
    data() {
        return {
            soal:{
                nama:"",
                noinduk:"",
                kelas:""
            }
        }
    },
    mounted() {
        this.load()
    },
    methods: {
        load() {
            axios.get('/api/soal/getplayer/' + this.id)
            .then((res)=>{
                this.soal.nama = res.data[0].nama
                this.soal.noinduk = res.data[0].noinduk
                this.soal.kelas = res.data[0].kelas
            })
        },
    },
    computed: {

    }
}
</script>
