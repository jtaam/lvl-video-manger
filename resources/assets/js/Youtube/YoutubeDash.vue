<template>
    <div class="YoutubeDash__wrapper">
        <finder></finder>
        <div v-if="!loading">
            <video-group :videos="videos"></video-group>
        </div>
        <div v-if="loading">
            Loading...
        </div>
    </div>
</template>

<script>
    import VideoGroup from './VideoGroup';
    import Finder from './Finder';
    import Search from './Search';

    export default {
        components: {
            VideoGroup, Finder
        },

        created() {
            Search({
                apiKey: 'AIzaSyDAnYDf-Tgdkgy83OHBiFAN4G_CQUewTSs',
                term: 'x men',
                items: 10
            }, response => this.handleSearchResults(response));

            window.eventBus.$on('searchForYoutubeStarted', () => {
                this.loading = true;
            });

            window.eventBus.$on('searchResultFromYoutube', videos => {
                console.log('search result', videos);
                this.loading = false;
                this.videos = videos;
            });
        },

        data() {
            return {
                videos: null,
                loading: true
            }
        },

        methods: {
            handleSearchResults(result) {
                this.loading = false;
                this.videos = result;
            }
        }

    }
</script>


<style scoped>

</style>