<template>
    <div>
        <div>
            <div>
                <h1>Profile</h1>
            </div>
            <div class="pb-2">
                <input type="text" class="form-control" ref="myInput" v-model="searchsong" placeholder="Search for title..">
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Artist
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(sg, i) in lg" :key="sg.id">
                            <td>{{ i + 1 }}</td>
                            <td><router-link :to="{ name: 'song', params: { id: sg.id } }">{{ sg.title }}</router-link> </td>
                            <td>{{ sg.artist }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script >
import axios from 'axios'

export default {
    data() {
        return {
            searchsong: "",
            lg: []
        }
    },
    methods: {
        load() {
            axios.get('/api/main/get')
                .then((res) => {
                    this.lg = res.data
                })
        }
    },
    mounted() {
        this.load();
    },
    watch: {

    }
}
</script>
<style>
th {
    color: aliceblue;
}

td {
    color: aliceblue;
}
</style>
