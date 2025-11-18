<template>
  <nav class="navbar">
    <div class="nav-container">
      <div class="nav-links">
        <router-link to="/" :class="{ active: $route.path === '/' }">
          {{ translations[lang].navHome }}
        </router-link>
        <router-link to="/values" :class="{ active: $route.path === '/values' }">
          {{ translations[lang].navValues }}
        </router-link>
        <router-link to="/achievements" :class="{ active: $route.path === '/achievements' }">
          {{ translations[lang].navAchievements }}
        </router-link>
        <router-link to="/team" :class="{ active: $route.path === '/team' }">
          {{ translations[lang].navTeam }}
        </router-link>
        <router-link to="/sponsors" :class="{ active: $route.path === '/sponsors' }">
          {{ translations[lang].navSponsors }}
        </router-link>
        <router-link to="/support" :class="{ active: $route.path === '/support' }">
          {{ translations[lang].navSupport }}
        </router-link>
        <router-link to="/contact" :class="{ active: $route.path === '/contact' }">
          {{ translations[lang].navContact }}
        </router-link>
      </div>
      <div class="language-toggle">
        <button @click="$emit('change-lang', 'en')" :class="{ active: lang === 'en' }">
          EN
        </button>
        <button @click="$emit('change-lang', 'ro')" :class="{ active: lang === 'ro' }">
          RO
        </button>
      </div>
    </div>
  </nav>
</template>

<script setup lang="ts">
import { translations } from '../i18n/translations';

defineProps<{
  lang: 'en' | 'ro';
}>();

defineEmits<{
  (e: 'change-lang', lang: 'en' | 'ro'): void;
}>();
</script>

<style scoped>
.navbar {
  background-color: #1a1a2e;
  padding: 1rem 0;
  position: sticky;
  top: 0;
  z-index: 1000;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.nav-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 1rem;
}

.nav-links {
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
  align-items: center;
}

.nav-links a {
  color: #e0e0e0;
  text-decoration: none;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  transition: all 0.3s ease;
  font-weight: 500;
  font-size: 0.95rem;
}

.nav-links a:hover {
  background-color: #16213e;
  color: #ffffff;
}

.nav-links a.active,
.nav-links a.router-link-active {
  background-color: #0f3460;
  color: #ffffff;
}

.language-toggle {
  display: flex;
  gap: 0.5rem;
  background-color: #16213e;
  border-radius: 4px;
  padding: 0.25rem;
}

.language-toggle button {
  background-color: transparent;
  border: none;
  color: #e0e0e0;
  padding: 0.4rem 0.8rem;
  cursor: pointer;
  border-radius: 3px;
  transition: all 0.3s ease;
  font-weight: 600;
  font-size: 0.9rem;
}

.language-toggle button:hover {
  background-color: #0f3460;
  color: #ffffff;
}

.language-toggle button.active {
  background-color: #e94560;
  color: #ffffff;
}

@media (max-width: 768px) {
  .nav-container {
    flex-direction: column;
    padding: 0 1rem;
  }

  .nav-links {
    width: 100%;
    justify-content: center;
  }

  .nav-links a {
    font-size: 0.85rem;
    padding: 0.4rem 0.8rem;
  }

  .language-toggle {
    width: 100%;
    justify-content: center;
  }
}

@media (max-width: 600px) {
  .nav-links {
    flex-direction: column;
    width: 100%;
  }

  .nav-links a {
    width: 100%;
    text-align: center;
  }
}
</style>
