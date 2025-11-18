<template>
  <div class="page-container">
    <div class="hero">
      <h1>{{ t.teamTitle }}</h1>
    </div>

    <div class="content">
      <section class="intro">
        <p class="intro-text">{{ t.teamIntro }}</p>
      </section>

      <section class="members-section">
        <h2>{{ t.currentMembersTitle }}</h2>
        <div class="members-grid">
          <div v-for="(member, index) in t.currentMembers" :key="index" class="member-card">
            <div class="member-avatar">{{ getInitials(member.name) }}</div>
            <h3>{{ member.name }}</h3>
            <p>{{ member.role }}</p>
          </div>
        </div>
      </section>

      <section class="mentors-section">
        <h2>{{ t.mentorsTitle }}</h2>
        <div class="mentors-grid">
          <div v-for="(mentor, index) in t.mentors" :key="index" class="mentor-card">
            <div class="mentor-avatar">{{ getInitials(mentor.name) }}</div>
            <h3>{{ mentor.name }}</h3>
            <p>{{ mentor.role }}</p>
          </div>
        </div>
      </section>

      <section class="alumni-section">
        <h2>{{ t.alumniTitle }}</h2>
        <p v-for="(text, index) in t.alumniText" :key="index" class="paragraph">
          {{ text }}
        </p>
      </section>

      <section class="culture-section">
        <h2>{{ t.teamCultureTitle }}</h2>
        <p v-for="(text, index) in t.teamCultureText" :key="index" class="paragraph">
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
  const firstPart = parts[0]
  return firstPart && firstPart.length > 0 ? firstPart.charAt(0) : 'M'
}
</script>

<style scoped>
.page-container {
  min-height: calc(100vh - 60px);
}

.hero {
  background: linear-gradient(135deg, #333333 0%, #1a1a1a 100%);
  color: white;
  padding: 3rem 2rem;
  text-align: center;
}

.hero h1 {
  font-size: 2.5rem;
  font-weight: 700;
}

.content {
  max-width: 1200px;
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

.members-section,
.mentors-section,
.alumni-section,
.culture-section {
  margin-bottom: 4rem;
}

h2 {
  color: #1a1a1a;
  font-size: 2rem;
  margin-bottom: 2rem;
  border-bottom: 3px solid #00FF00;
  padding-bottom: 0.5rem;
}

.members-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 2rem;
}

.member-card {
  background-color: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.member-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

.member-avatar {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background: linear-gradient(135deg, #333333 0%, #00FF00 100%);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.8rem;
  font-weight: 700;
  margin: 0 auto 1rem;
}

.member-card h3 {
  color: #1a1a1a;
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
}

.member-card p {
  color: #666;
  font-size: 0.95rem;
  line-height: 1.5;
}

.mentors-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 2rem;
}

.mentor-card {
  background-color: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
  border-top: 4px solid #00FF00;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.mentor-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

.mentor-avatar {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: linear-gradient(135deg, #00FF00 0%, #333333 100%);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  font-weight: 700;
  margin: 0 auto 1rem;
}

.mentor-card h3 {
  color: #1a1a1a;
  font-size: 1.3rem;
  margin-bottom: 0.5rem;
}

.mentor-card p {
  color: #666;
  font-size: 1rem;
  line-height: 1.5;
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

  .members-grid,
  .mentors-grid {
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
