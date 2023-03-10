<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Welcome <b>{{user.name}}</b></p>
                    </div>
                    <div class="mx-2 my-2">
                        <router-link :to="{name:'add'}"><button class="btn btn-primary">Add</button></router-link >
                        <router-link :to="{name:'managesoal'}"><button class="btn btn-primary">manajemen soal</button></router-link >

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"dashboard",
    data(){
        return {
            user:this.$store.state.auth.user
        }
    }
}
</script>
