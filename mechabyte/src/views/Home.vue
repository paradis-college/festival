<template>
  <div class="page-container">
    <div class="hero">
      <h1>{{ t.homeTitle }}</h1>
      <p class="subtitle">{{ t.homeSubtitle }}</p>
    </div>

    <div class="content">
      <section class="mission">
        <p class="mission-text">{{ t.homeMission }}</p>
      </section>

      <section class="about">
        <h2>{{ t.homeAboutTitle }}</h2>
        <p v-for="(paragraph, index) in t.homeAboutParagraphs" :key="index" class="paragraph">
          {{ paragraph }}
        </p>
      </section>

      <section class="activities">
        <h2>{{ t.homeActivitiesTitle }}</h2>
        <ul class="activities-list">
          <li v-for="(activity, index) in t.homeActivities" :key="index">
            {{ activity }}
          </li>
        </ul>
      </section>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import { translations } from '../i18n/translations'

const props = defineProps<{
  lang: 'en' | 'ro'
}>()

const t = computed(() => translations[props.lang])
</script>

<style scoped>
.page-container {
  min-height: calc(100vh - 60px);
}

.hero {
  background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 100%);
  color: white;
  padding: 4rem 2rem;
  text-align: center;
}

.hero h1 {
  font-size: 3rem;
  margin-bottom: 1rem;
  font-weight: 700;
}

.subtitle {
  font-size: 1.5rem;
  opacity: 0.9;
  font-weight: 300;
}

.content {
  max-width: 1000px;
  margin: 0 auto;
  padding: 3rem 2rem;
}

.mission {
  background-color: #e94560;
  color: white;
  padding: 2rem;
  border-radius: 8px;
  margin-bottom: 3rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.mission-text {
  font-size: 1.2rem;
  line-height: 1.8;
  text-align: center;
}

.about,
.activities {
  margin-bottom: 3rem;
}

h2 {
  color: #1a1a2e;
  font-size: 2rem;
  margin-bottom: 1.5rem;
  border-bottom: 3px solid #e94560;
  padding-bottom: 0.5rem;
}

.paragraph {
  margin-bottom: 1.5rem;
  font-size: 1.05rem;
  line-height: 1.8;
  text-align: justify;
}

.activities-list {
  list-style: none;
  padding: 0;
}

.activities-list li {
  background-color: white;
  padding: 1rem 1.5rem;
  margin-bottom: 0.75rem;
  border-radius: 6px;
  border-left: 4px solid #0f3460;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  font-size: 1.05rem;
  transition: transform 0.2s ease;
}

.activities-list li:hover {
  transform: translateX(5px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

@media (max-width: 768px) {
  .hero h1 {
    font-size: 2rem;
  }

  .subtitle {
    font-size: 1.2rem;
  }

  .content {
    padding: 2rem 1rem;
  }

  h2 {
    font-size: 1.5rem;
  }

  .paragraph {
    text-align: left;
  }
}
</style>
