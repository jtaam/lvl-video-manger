<template>
    <p>Detail of the video</p>
</template>

<script>
    export default {
        created(){
            if (this.$route.params.video === undefined){
                this.$router.push({name:'youtube-dashboard'});
            }
        }
    }
</script>

<style scoped>

</style>