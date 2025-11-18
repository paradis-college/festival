<script setup lang="ts">
import { ref } from 'vue'
import { RouterView } from 'vue-router'
import NavBar from './components/NavBar.vue'

const lang = ref<'en' | 'ro'>('en')

const changeLang = (newLang: 'en' | 'ro') => {
  lang.value = newLang
}
</script>

<template>
  <div id="app">
    <NavBar :lang="lang" @change-lang="changeLang" />
    <RouterView :lang="lang" />
  </div>
</template>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  line-height: 1.6;
  color: #333;
  background-color: #f5f5f5;
}

#app {
  min-height: 100vh;
}
</style>
