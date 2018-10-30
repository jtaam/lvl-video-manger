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
    import LocalDB from './../LocalDB';

    export default {
        components: {
            VideoGroup, Finder
        },

        created() {
            // console.log(this.localDB.set('search','laracon'));
            // this.localDB.set('search',[{name:'jhon doe'}]);
            var searchString = (this.localDB.get('search')) ? this.localDB.get('search') : 'laravel api';

            Search({
                apiKey: 'AIzaSyDAnYDf-Tgdkgy83OHBiFAN4G_CQUewTSs',
                term: searchString,
                items: 10
            }, response => this.handleSearchResults(response));

            window.eventBus.$on('searchForYoutubeStarted', (string) => {
                this.loading = true;
                this.localDB.set('search',string);
            });

            window.eventBus.$on('searchResultFromYoutube', videos => {
                // console.log('search result', videos);
                this.loading = false;
                this.videos = videos;
            });
        },

        data() {
            return {
                videos: null,
                loading: true,
                localDB: new LocalDB(),
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