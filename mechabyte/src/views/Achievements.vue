<template>
  <div class="page-container">
    <div class="hero">
      <h1>{{ t.achievementsTitle }}</h1>
    </div>

    <div class="content">
      <section class="intro">
        <p class="intro-text">{{ t.achievementsIntro }}</p>
      </section>

      <section class="timeline">
        <div
          v-for="(achievement, index) in t.achievementsTimeline"
          :key="index"
          class="timeline-item"
          :class="{ 'timeline-item-left': index % 2 === 0, 'timeline-item-right': index % 2 !== 0 }"
        >
          <div class="timeline-marker">
            <div class="timeline-year">{{ achievement.year }}</div>
          </div>
          <div class="timeline-content">
            <h3>{{ achievement.title }}</h3>
            <p>{{ achievement.description }}</p>
          </div>
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

.timeline {
  position: relative;
  padding: 2rem 0;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 50%;
  top: 0;
  bottom: 0;
  width: 4px;
  background: linear-gradient(180deg, #e94560 0%, #0f3460 100%);
  transform: translateX(-50%);
}

.timeline-item {
  position: relative;
  margin-bottom: 3rem;
  display: flex;
  align-items: center;
}

.timeline-item-left {
  justify-content: flex-end;
}

.timeline-item-right {
  justify-content: flex-start;
}

.timeline-marker {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  z-index: 10;
}

.timeline-year {
  background-color: #e94560;
  color: white;
  padding: 0.75rem 1.5rem;
  border-radius: 50px;
  font-weight: 700;
  font-size: 1.1rem;
  box-shadow: 0 4px 8px rgba(233, 69, 96, 0.3);
}

.timeline-content {
  width: 45%;
  background-color: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.timeline-item-left .timeline-content {
  margin-right: auto;
  text-align: right;
  border-right: 4px solid #0f3460;
}

.timeline-item-right .timeline-content {
  margin-left: auto;
  text-align: left;
  border-left: 4px solid #0f3460;
}

.timeline-content:hover {
  transform: scale(1.02);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

.timeline-content h3 {
  color: #1a1a2e;
  font-size: 1.5rem;
  margin-bottom: 0.75rem;
}

.timeline-content p {
  color: #666;
  line-height: 1.7;
  font-size: 1rem;
}

@media (max-width: 768px) {
  .hero h1 {
    font-size: 2rem;
  }

  .content {
    padding: 2rem 1rem;
  }

  .timeline::before {
    left: 30px;
  }

  .timeline-item {
    justify-content: flex-start !important;
    padding-left: 60px;
  }

  .timeline-marker {
    left: 30px;
  }

  .timeline-content {
    width: 100%;
    text-align: left !important;
    border-left: 4px solid #0f3460 !important;
    border-right: none !important;
  }

  .timeline-item-left .timeline-content {
    margin-right: 0;
  }
}
</style>
