<template>
    <div class="YoutubeDash__wrapper">
        YoutubeDash
    </div>
</template>

<script>
    import Search from './Search';

    export default {
        created() {
            Search({
                apiKey: 'AIzaSyDAnYDf-Tgdkgy83OHBiFAN4G_CQUewTSs',
                term: 'laravel repository'
            }, response => this.videos = response);
        },
        data() {
            return {
                videos: null
            }
        },

    }
</script>

<style scoped>

</style>