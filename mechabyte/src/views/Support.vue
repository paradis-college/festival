<template>
  <div class="page-container">
    <div class="hero">
      <h1>{{ t.supportTitle }}</h1>
    </div>

    <div class="content">
      <section class="intro">
        <p class="intro-text">{{ t.supportIntro }}</p>
      </section>

      <section class="why-support">
        <h2>{{ t.whySupportTitle }}</h2>
        <p v-for="(text, index) in t.whySupportText" :key="index" class="paragraph">
          {{ text }}
        </p>
      </section>

      <section class="how-to-support">
        <h2>{{ t.howToSupportTitle }}</h2>
        <div class="support-options">
          <div v-for="(option, index) in t.supportOptions" :key="index" class="option-card">
            <h3>{{ option.title }}</h3>
            <p>{{ option.description }}</p>
          </div>
        </div>
      </section>

      <section class="benefits">
        <h2>{{ t.benefitsTitle }}</h2>
        <ul class="benefits-list">
          <li v-for="(benefit, index) in t.benefits" :key="index">
            {{ benefit }}
          </li>
        </ul>
      </section>

      <section class="tax-redirection">
        <div class="tax-box">
          <h2>{{ t.taxRedirectionTitle }}</h2>
          <p>{{ t.taxRedirectionText }}</p>
        </div>
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
  background: linear-gradient(135deg, #2a2a2a 0%, #1E1E1E 100%);
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

.why-support,
.how-to-support,
.benefits,
.tax-redirection {
  margin-bottom: 4rem;
}

h2 {
  color: #1E1E1E;
  font-size: 2rem;
  margin-bottom: 2rem;
  border-bottom: 3px solid #FF6A13;
  padding-bottom: 0.5rem;
}

.paragraph {
  margin-bottom: 1.5rem;
  font-size: 1.05rem;
  line-height: 1.8;
  text-align: justify;
  color: #555;
}

.support-options {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 2rem;
}

.option-card {
  background-color: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-top: 4px solid #2a2a2a;
}

.option-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

.option-card h3 {
  color: #FF6A13;
  font-size: 1.4rem;
  margin-bottom: 1rem;
}

.option-card p {
  color: #666;
  line-height: 1.7;
  font-size: 1rem;
}

.benefits-list {
  list-style: none;
  padding: 0;
}

.benefits-list li {
  background-color: white;
  padding: 1rem 1.5rem;
  margin-bottom: 0.75rem;
  border-radius: 6px;
  border-left: 4px solid #FF6A13;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  font-size: 1.05rem;
  transition: transform 0.2s ease;
  color: #555;
}

.benefits-list li:hover {
  transform: translateX(5px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.tax-box {
  background: linear-gradient(135deg, #FF6A13 0%, #E55A00 100%);
  color: white;
  padding: 2.5rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.tax-box h2 {
  color: white;
  border-bottom: 3px solid white;
  margin-bottom: 1.5rem;
}

.tax-box p {
  font-size: 1.1rem;
  line-height: 1.8;
}

@media (max-width: 768px) {
  .hero h1 {
    font-size: 2rem;
  }

  .content {
    padding: 2rem 1rem;
  }

  .support-options {
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
