<template>
    <div class="container">
        <h1>Add here</h1>
        <input v-model="lg.title" class="form-control" type="text" placeholder="Title">
        <input v-model="lg.artist" class="form-control my-2" type="text" placeholder="Artist">
        <textarea v-model="lg.lyric" class="form-control px-2 my-2 " rows="20"  type="text" placeholder="Lyric"></textarea>
        <div>
            <button class="btn btn-primary mx-2 my-2" @click="insert">Save</button>
        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    data(){
        return {
            lg:{
                title:"",
                artist:"",
                lyric:""
            }
        }
    },
    mounted(){

    },
    methods: {
        insert(){
            axios.post('/api/books/add', this.lg)
            .then(()=> {
                alert('saved')
            })
        }
    },
}
</script>
