<template>
    <div class="Search__wrapper">
        <div class="container">
            <form v-on:submit.prevent="handleFormSubmit">
                <input
                        v-bind:placeholder="placeholder"
                        v-model="searchString"
                        type="text"
                        class="form-control"/>
            </form>
        </div>
    </div>
</template>

<script>
    import Search from './Search';
    import LocalDB from './../LocalDB';

    export default {
        created(){
            if (this.localDB.get('search')) {
                this.setPlaceholderText(this.localDB.get('search'));
            }
        },
        data() {
            return {
                localDB : new LocalDB(),
                searchString: '',
                placeholder: '',
            }
        },
        methods: {
            handleFormSubmit() {
                window.eventBus.$emit('searchForYoutubeStarted', this.searchString);

                Search({
                    apiKey: 'AIzaSyDAnYDf-Tgdkgy83OHBiFAN4G_CQUewTSs',
                    term: this.searchString,
                    items: 10
                }, data => {
                    window.eventBus.$emit('searchResultFromYoutube', data);
                    this.setPlaceholderText(this.searchString);
                    this.searchString = '';
                });
            },

            setPlaceholderText(string){
              this.placeholder = "Search result for "+string;
            },
        }

    }
</script>

<style lang="scss">
    .Search__wrapper {
        margin-bottom: 10px;
    }
</style>