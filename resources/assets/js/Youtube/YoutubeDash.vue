<template>
    <div class="YoutubeDash__wrapper">
        YoutubeDash
    </div>
</template>

<script>
    import Search from './Search';
    export default {
        created(){
          Search({
              apiKey : 'asdf',
              term: 'laravel repository'
          });
        },
        name: "YoutubeDash"
    }
</script>

<style scoped>

</style>