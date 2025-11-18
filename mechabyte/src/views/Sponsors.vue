<template>
  <div class="page-container">
    <div class="hero">
      <h1>{{ t.sponsorsTitle }}</h1>
    </div>

    <div class="content">
      <section class="intro">
        <p class="intro-text">{{ t.sponsorsIntro }}</p>
      </section>

      <section class="current-sponsors">
        <h2>{{ t.currentSponsorsTitle }}</h2>
        <div class="sponsors-grid">
          <div v-for="(sponsor, index) in t.currentSponsors" :key="index" class="sponsor-card">
            <div class="sponsor-logo">{{ getInitials(sponsor) }}</div>
            <h3>{{ sponsor }}</h3>
          </div>
        </div>
      </section>

      <section class="benefits-section">
        <h2>{{ t.sponsorshipBenefitsTitle }}</h2>
        <ul class="benefits-list">
          <li v-for="(benefit, index) in t.sponsorshipBenefits" :key="index">
            {{ benefit }}
          </li>
        </ul>
      </section>

      <section class="why-sponsor">
        <h2>{{ t.whySponsorTitle }}</h2>
        <p v-for="(text, index) in t.whySponsorText" :key="index" class="paragraph">
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

const getInitials = (name: string): string => {
  const parts = name.split(' ').filter(p => p.length > 0)
  if (parts.length >= 2) {
    const first = parts[0]
    const second = parts[1]
    if (first && first.length > 0 && second && second.length > 0) {
      return first.charAt(0) + second.charAt(0)
    }
  }
  const firstPart = parts[0] || ''
  if (firstPart.length >= 2) {
    return firstPart.charAt(0) + firstPart.charAt(1)
  }
  return firstPart.length > 0 ? firstPart.charAt(0) : 'S'
}
</script>

<style scoped>
.page-container {
  min-height: calc(100vh - 60px);
}

.hero {
  background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 100%);
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

.current-sponsors,
.benefits-section,
.why-sponsor {
  margin-bottom: 4rem;
}

h2 {
  color: #1a1a2e;
  font-size: 2rem;
  margin-bottom: 2rem;
  border-bottom: 3px solid #e94560;
  padding-bottom: 0.5rem;
}

.sponsors-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 2rem;
}

.sponsor-card {
  background-color: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-top: 4px solid #0f3460;
}

.sponsor-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

.sponsor-logo {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: linear-gradient(135deg, #e94560 0%, #0f3460 100%);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.5rem;
  font-weight: 700;
  margin: 0 auto 1rem;
}

.sponsor-card h3 {
  color: #1a1a2e;
  font-size: 1.1rem;
  line-height: 1.4;
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
  border-left: 4px solid #e94560;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  font-size: 1.05rem;
  transition: transform 0.2s ease;
  color: #555;
}

.benefits-list li:hover {
  transform: translateX(5px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
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

  .sponsors-grid {
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 1.5rem;
  }

  .sponsor-logo {
    width: 80px;
    height: 80px;
    font-size: 2rem;
  }

  h2 {
    font-size: 1.5rem;
  }

  .paragraph {
    text-align: left;
  }
}
</style>
