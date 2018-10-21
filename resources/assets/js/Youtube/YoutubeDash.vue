<template>
    <div class="YoutubeDash__wrapper">
        <video-group :videos="videos"></video-group>
    </div>
</template>
<script>
    import VideoGroup from './VideoGroup';
    import Search from './Search';

    export default {
        components: {
            VideoGroup
        },
        created() {
            Search({
                apiKey: 'AIzaSyDAnYDf-Tgdkgy83OHBiFAN4G_CQUewTSs',
                term: 'x men',
                items: 10
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