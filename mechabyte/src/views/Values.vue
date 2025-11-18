<template>
  <div class="page-container">
    <div class="hero">
      <h1>{{ t.valuesTitle }}</h1>
    </div>

    <div class="content">
      <section class="intro">
        <p class="intro-text">{{ t.valuesIntro }}</p>
      </section>

      <section class="values-list">
        <div v-for="(value, index) in t.valuesList" :key="index" class="value-card">
          <h3>{{ value.title }}</h3>
          <p>{{ value.description }}</p>
        </div>
      </section>

      <section class="ambassador">
        <div class="ambassador-box">
          <h3>Ambassador Role</h3>
          <p>{{ t.ambassadorStatement }}</p>
        </div>
      </section>

      <section class="implementation">
        <h2>{{ t.valuesImplementationTitle }}</h2>
        <p v-for="(text, index) in t.valuesImplementationText" :key="index" class="paragraph">
          {{ text }}
        </p>
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
  background: linear-gradient(135deg, #0f3460 0%, #1a1a2e 100%);
  color: white;
  padding: 3rem 2rem;
  text-align: center;
}

.hero h1 {
  font-size: 2.5rem;
  font-weight: 700;
}

.content {
  max-width: 1000px;
  margin: 0 auto;
  padding: 3rem 2rem;
}

.intro {
  margin-bottom: 3rem;
}

.intro-text {
  font-size: 1.2rem;
  line-height: 1.8;
  text-align: center;
  color: #555;
}

.values-list {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  margin-bottom: 3rem;
}

.value-card {
  background-color: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-top: 4px solid #e94560;
}

.value-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

.value-card h3 {
  color: #1a1a2e;
  font-size: 1.5rem;
  margin-bottom: 1rem;
}

.value-card p {
  color: #666;
  line-height: 1.7;
  font-size: 1rem;
}

.ambassador {
  margin-bottom: 3rem;
}

.ambassador-box {
  background: linear-gradient(135deg, #e94560 0%, #d63450 100%);
  color: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.ambassador-box h3 {
  font-size: 1.8rem;
  margin-bottom: 1rem;
}

.ambassador-box p {
  font-size: 1.1rem;
  line-height: 1.8;
}

.implementation {
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
  color: #555;
}

@media (max-width: 768px) {
  .hero h1 {
    font-size: 2rem;
  }

  .content {
    padding: 2rem 1rem;
  }

  .values-list {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }

  h2 {
    font-size: 1.5rem;
  }

  .paragraph {
    text-align: left;
  }
}
</style>
