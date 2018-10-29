<template>
    <li class="list-group-item" @click="saveToPlaylist">{{item.name}}</li>
</template>

<script>
    export default {
        name: "PlaylistItem",
        props: ['item'],
        methods: {
            saveToPlaylist() {
                let postData = {
                    videoId: this.$route.params.id,
                    playlistId: this.item.id
                }
                axios.post('/api/playlist-entry', postData)
                    .then(response => {
                        console.info(response);
                        window.eventBus.$emit('successPlaylistItemAdd', 'The video is added to playlist')
                    })
                    .catch(error => {
                        console.error(error.response);
                        window.eventBus.$emit('errorPlaylistItemNotAdd', error.response.data.message)
                    })
            }
        },
    }
</script>

<style scoped>

</style>