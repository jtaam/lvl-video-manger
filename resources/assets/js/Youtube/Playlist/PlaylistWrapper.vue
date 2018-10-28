<template>
    <div class="playlist-wrapper">
        <button class="btn btn-sm btn-primary" @click="playListOpen">+ Add</button>

        <div class="list-wrapper" v-if="showPlaylist">
            <div class="list">
                <div class="mb-2 clearfix">
                    <div class="float-left">My Playlists</div>
                    <button class="float-right btn btn-warning btn-sm" @click="playListOpen">X</button>
                </div>

                <div class="mb-2 clearfix">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="item in playlist" v-bind:key="item.id">{{item.name}}</li>
                    </ul>
                </div>

                <form v-on:submit.prevent="handleSavePlaylist">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <input type="text" placeholder="Create new playlist" class="form-control"
                                   v-model="playlistName">
                        </div>

                        <div class="col-sm-4">
                            <input type="checkbox" name="private" v-model="isPrivate"> Private
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PlaylistWrapper",

        data() {
            return {
                playlist: null,
                showPlaylist: false,
                playlistName: '',
                isPrivate: false,
            }
        },

        methods: {
            playListOpen() {
                this.loadUserPlaylists();
            },
            loadUserPlaylists() {
                axios.get('/api/user/playlists').then(response => {
                    setTimeout(() => {
                        console.info(response.data);
                        this.showPlaylist = !this.showPlaylist;
                        this.playlist = response.data;
                    }, 300)
                })
            },
            handleSavePlaylist() {
                let postData = {
                    name: this.playlistName,
                    isPrivate: this.isPrivate
                }

                axios.post('/api/playlist', postData)
                    .then(response => {
                        this.playlist.unshift(response.data);
                        this.playlistName = '';
                    })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .playlist-wrapper {
        position: relative;
        .list-wrapper {
            position: absolute;
            top: -135px;
            z-index: 999;
            background-color: white;
            padding: 1rem;
            border: 1px solid #efefef;
            min-width: 29rem;
            .list {
                .list-group-item {
                    padding: 0.45rem 1.25rem;
                }
            }
        }
    }
</style>