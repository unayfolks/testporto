<template>
    <div class="container">
        <router-link :to="{ name: 'managesoal' }"><button class="btn btn-primary">back</button></router-link>
        <h1>Tambah Soal</h1>
        <div class="row">
            <div class="col-lg-12">
                <label for="">Kode soal</label>
                <input v-model="s.kodesoal" type="text" class="form-control">
            </div>
            <div class="col-lg-4">
                <label for="">Nama soal</label>
                <input v-model="s.namasoal" type="text" class="form-control">
            </div>
            <div class="col-lg-4">
                <label for="">Kelas</label>
                <input v-model="s.kelas" type="text" class="form-control">
            </div>
            <div class="col-lg-4">
                <label for="">Pelajaran</label>
                <input v-model="s.pelajaran" type="text" class="form-control">
            </div>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" v-model="option1" @change="pilih4">
            <label class="form-check-label" for="inlineRadio1">4 pilihan</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" v-model="option2" @change="pilih5">
            <label class="form-check-label" for="inlineRadio2">5 pilihan</label>
        </div>
        <div>
            <label for="">Pertanyaan</label>
        </div>
        <!-- pilihan 5 -->
        <div v-show="showpilihan">
            <div>
                <label for="">masukan gambar(optional)</label>
            </div>
            <input type="file" ref="gambarsoal" @change="cekdata" accept="image/*" class="form-control-file">
            <div>
                <img :src="previewimage" height="200">
            </div>
            <textarea rows="4" v-model="q.pertanyaan" type="text" class="form-control"
                placeholder="isi pertanyaan"></textarea>
            <div class="row container">
                <div class="col my-2">
                    <input v-model="q.jwb1" type="text" placeholder="jawaban 1" class="form-control my-2">
                    <input v-model="q.jwb2" type="text" placeholder="jawaban 2" class="form-control my-2">
                </div>
                <div class="col-sm-6 my-2">
                    <input v-model="q.jwb3" type="text" placeholder="jawaban 3" class="form-control my-2">
                    <input v-model="q.jwb4" type="text" placeholder="jawaban 4" class="form-control my-2">
                    <div>
                        <button class="btn btn-danger" @click="tambah">Tambah</button>
                        <button class="btn btn-secondary mx-2" @click="save">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- pilihan 4 -->
        <div v-show="!showpilihan">
            <div>
                <label for="">masukan gambar(optional)</label>
            </div>
            <input type="file" ref="gambarsoal" @change="cekdata" accept="image/*" class="form-control-file">
            <div>
                <img :src="previewimage" height="200">
            </div>
            <textarea rows="4" v-model="q.pertanyaan" type="text" class="form-control"
                placeholder="isi pertanyaan"></textarea>
            <div class="row container">
                <div class="col my-2">
                    <input v-model="q.jwb1" type="text" placeholder="jawaban 1" class="form-control my-2">
                    <input v-model="q.jwb2" type="text" placeholder="jawaban 2" class="form-control my-2">
                    <input v-model="q.jwb3" type="text" placeholder="jawaban 3" class="form-control my-2">
                </div>
                <div class="col-sm-6 my-2">
                    <input v-model="q.jwb4" type="text" placeholder="jawaban 4" class="form-control my-2">
                    <input v-model="q.jwb5" type="text" placeholder="jawaban 5" class="form-control my-2">
                    <div>
                        <button class="btn btn-danger" @click="tambah">Tambah</button>
                        <button class="btn btn-secondary mx-2" @click="save">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div v-for="(sl, i) in soal" :key="sl">
            <div>
                <div>
                    <div>
                        <p>{{ i + 1 }}.</p>
                    </div>
                    <img :src="sl.gambarprev" alt="">
                    <div>
                        <textarea class="form-control" type="text" v-model="sl.pertanyaan"></textarea>
                    </div>
                </div>
                <ol type="A">
                    <li>{{ sl.jwb1 }}</li>
                    <li>{{ sl.jwb2 }}</li>
                    <li>{{ sl.jwb3 }}</li>
                    <li>{{ sl.jwb4 }}</li>
                    <li>{{ sl.jwb5 }}</li>
                </ol>
                <button class="btn btn-info">hapus</button>
                <button class="btn btn-danger">edit</button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            soal: [],
            q: {
                kodesoal: "",
                pertanyaan: "",
                gambar: "",
                jwb1: "",
                jwb2: "",
                jwb3: "",
                jwb4: "",
                jwb5: ""
            },
            s: {
                kodesoal: "",
                namasoal: "",
                kelas: "",
                pelajaran: ""
            },
            showpilihan: true,
            option1: "",
            option2: "",
            previewimage: "",
            gambar:""
        }
    },
    mounted() {
        this.kode();
    },
    methods: {
        cekdata() {
            this.gambar = event.target.files[0]
            console.log(this.gambar)
            this.previewimage = URL.createObjectURL(this.gambar)
        },
        kode() {
            axios.get('/api/tambahsoal/generatecode')
                .then((res) => {
                    this.s.kodesoal = res.data
                })
        },
        save() {
            alert('awda')
            // let gb = new FormData();
            // gb.append('')
            let object = {
                data1: this.s,
                data2: this.soal
            }
            let hasil = "";
            axios.post('/api/tambahsoal/tambah', object)
                .then(function (data) {
                    hasil = data.status
                    if (hasil === 200) {
                        alert('saved')
                    } else {
                        alert('failed')
                    }
                }).catch((res)=>{
                    console.log(res)
                })
        },
        tambah() {
            if (this.q.pertanyaan == "") {
                alert('belum ada soal')
            } else if (this.q.pertanyaan != "") {
                var my_object = {
                    kodesoal: this.s.kodesoal,
                    pertanyaan: this.q.pertanyaan,
                    gambar: this.gambar,
                    gambarprev: URL.createObjectURL(this.gambar),
                    jwb1: this.q.jwb1,
                    jwb2: this.q.jwb2,
                    jwb3: this.q.jwb3,
                    jwb4: this.q.jwb4,
                    jwb5: this.q.jwb5,
                };
                this.soal.push(my_object)
                this.clearfield();
            }
        },
        clearfield() {
            this.q.pertanyaan = ""
            this.q.jwb1 = ""
            this.q.jwb2 = ""
            this.q.jwb3 = ""
            this.q.jwb4 = ""
            this.q.jwb5 = ""
        },
        pilih4() {
            this.showpilihan = true
        },
        pilih5() {
            this.showpilihan = false
        }
    },
}

</script>
