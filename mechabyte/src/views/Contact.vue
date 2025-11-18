<template>
  <div class="page-container">
    <div class="hero">
      <h1>{{ t.contactTitle }}</h1>
    </div>

    <div class="content">
      <section class="intro">
        <p class="intro-text">{{ t.contactIntro }}</p>
      </section>

      <section class="contact-details">
        <h2>{{ t.contactDetailsTitle }}</h2>
        <div class="details-grid">
          <div class="detail-card">
            <div class="detail-icon">✉️</div>
            <h3>Email</h3>
            <p>{{ t.contactEmail }}</p>
          </div>
          <div class="detail-card">
            <div class="detail-icon">📞</div>
            <h3>{{ lang === 'en' ? 'Phone' : 'Telefon' }}</h3>
            <p>{{ t.contactPhone }}</p>
          </div>
          <div class="detail-card">
            <div class="detail-icon">📍</div>
            <h3>{{ lang === 'en' ? 'Address' : 'Adresă' }}</h3>
            <p>{{ t.contactAddress }}</p>
          </div>
        </div>
      </section>

      <section class="social-media">
        <h2>{{ t.socialMediaTitle }}</h2>
        <div class="social-links">
          <a href="https://facebook.com" target="_blank" class="social-link facebook">
            <span class="social-icon">f</span>
            <span>Facebook</span>
          </a>
          <a href="https://instagram.com" target="_blank" class="social-link instagram">
            <span class="social-icon">📷</span>
            <span>Instagram</span>
          </a>
          <a href="https://youtube.com" target="_blank" class="social-link youtube">
            <span class="social-icon">▶️</span>
            <span>YouTube</span>
          </a>
          <a href="https://twitter.com" target="_blank" class="social-link twitter">
            <span class="social-icon">🐦</span>
            <span>Twitter</span>
          </a>
        </div>
      </section>

      <section class="visit-us">
        <h2>{{ t.visitUsTitle }}</h2>
        <p v-for="(text, index) in t.visitUsText" :key="index" class="paragraph">
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
  background: linear-gradient(135deg, #1a1a1a 0%, #333333 100%);
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

.contact-details,
.social-media,
.visit-us {
  margin-bottom: 4rem;
}

h2 {
  color: #1a1a1a;
  font-size: 2rem;
  margin-bottom: 2rem;
  border-bottom: 3px solid #00FF00;
  padding-bottom: 0.5rem;
}

.details-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
}

.detail-card {
  background-color: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-top: 4px solid #333333;
}

.detail-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

.detail-icon {
  font-size: 3rem;
  margin-bottom: 1rem;
}

.detail-card h3 {
  color: #1a1a1a;
  font-size: 1.3rem;
  margin-bottom: 0.75rem;
}

.detail-card p {
  color: #666;
  font-size: 1rem;
  line-height: 1.6;
}

.social-links {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1.5rem;
}

.social-link {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  padding: 1.5rem;
  border-radius: 8px;
  text-decoration: none;
  color: white;
  font-weight: 600;
  font-size: 1.1rem;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.social-link:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

.social-icon {
  font-size: 1.5rem;
}

.facebook {
  background: linear-gradient(135deg, #1877f2 0%, #0e5ec2 100%);
}

.instagram {
  background: linear-gradient(135deg, #e1306c 0%, #c13584 100%);
}

.youtube {
  background: linear-gradient(135deg, #ff0000 0%, #cc0000 100%);
}

.twitter {
  background: linear-gradient(135deg, #1da1f2 0%, #0d8bd9 100%);
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

  .details-grid,
  .social-links {
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
