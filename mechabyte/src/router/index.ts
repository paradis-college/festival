import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Values from '../views/Values.vue'
import Achievements from '../views/Achievements.vue'
import Team from '../views/Team.vue'
import Sponsors from '../views/Sponsors.vue'
import Support from '../views/Support.vue'
import Contact from '../views/Contact.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/values', component: Values },
  { path: '/achievements', component: Achievements },
  { path: '/team', component: Team },
  { path: '/sponsors', component: Sponsors },
  { path: '/support', component: Support },
  { path: '/contact', component: Contact },
]

export default createRouter({
  history: createWebHistory(),
  routes,
})
