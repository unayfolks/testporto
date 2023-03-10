<template>
    <div>
        <h1>Soal</h1>
        <label for="">Nama</label>
        <input v-model="soal.nama" type="text" placeholder="Nama" class="form-control">
        <label for="">No Induk</label>
        <input v-model="soal.noinduk" type="text" placeholder="No Induk" class="form-control">
        <label for="">Kelas</label>
        <select v-model="soal.kelas" type="text" placeholder="Kelas" class="form-control">
            <option value="A">A</option>
            <option value="B">B</option>
        </select>
        <button class="btn btn-outline-danger" @click="submitplayer">Submit</button>
        <router-link :to="`/soal/${noid}/${nama}`"><button class="btn btn-secondary mx-2 my-2">Ready</button></router-link>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            soal: {
                nama: "",
                noinduk: "",
                kelas: ""
            },
            player: {
                kodeplayer:"",
                nama:"",
                noinduk:"",
                kelas:"",
            },
            noid:"",
            nama:""
        }
    },
    watch:{

    },
    methods: {
        submitplayer() {
            axios.post('api/soal/submit', this.soal)
            .then((res) => {
                this.$nextTick(()=>{
                    this.showplayer();
                })
            })
            .catch((res)=>{
                console.log(res)
                alert('failure')
            })
        },
        showplayer(){
            axios.get('api/soal/showplayer/' + this.soal.noinduk)
            .then((res)=>{
                console.log(res)
                if(res.data.length > 1){
                    alert('anda sudah terdaftar ')
                }else{
                    this.noid = res.data[0].id
                    this.nama = res.data[0].nama
                    let nm = res.data[0].nama
                    let no = res.data[0].noinduk
                    var pilih = confirm('apakah data dengan nama ' + nm + ' noinduk ' + no + ' sudah benar ?')
                    // if(pilih){

                    // }
                }
                // this.player.kodeplayer = res.data
            })
        },

    },
    mounted() {
        // this.showplayer();
    },
}
</script>
