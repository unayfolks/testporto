<template>
    <main class="container">
        <h1>Welcome</h1>
        <router-link :to="{ name: 'songpages'}"><button class="btn btn-danger"> Profile </button></router-link>
        <router-link :to="{name: 'soal'}"><button class="btn btn-warning">Soal</button></router-link>
        <div class="mt-2" id="maincontent">
            <router-view></router-view>
        </div>
    </main>
</template>
<style>
main{
    background-color: black;
    color: rgb(6, 236, 6);
}
</style>
