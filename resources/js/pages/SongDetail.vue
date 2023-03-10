<template>
    <div>
        <h1>detail here</h1>
        <div>

        </div>
    </div>
</template>
<script >
export default {
    props: ['id'],
    data() {
        return {

        }
    },
    mounted() {
        this.load()
    },
    methods: {
        load() {

        },
        changekey() {
            console.log(this.chd)
        },
    },
    computed: {

    }
}
</script>
