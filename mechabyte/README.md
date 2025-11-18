# Mechabyte - Multi-Page Vue Application

A professional multi-page website for the Mechabyte robotics team at Paradis College, built with Vue 3, TypeScript, and Vite.

## Features

- **Multi-Page Navigation**: 7 fully functional pages (Home, Values, Achievements, Team, Sponsors, Support, Contact)
- **Bilingual Support**: Complete English and Romanian translations with seamless language switching
- **Responsive Design**: Mobile-friendly navigation and layouts that work on all devices
- **Modern Tech Stack**: Vue 3 with Composition API, TypeScript, and Vue Router
- **Professional Styling**: Consistent design with gradient backgrounds, cards, and smooth animations

## Pages

1. **Home** - Introduction to Mechabyte with mission statement and activities
2. **Values** - Core team values with detailed descriptions
3. **Achievements** - Timeline of competitions and milestones
4. **Team** - Current members, mentors, and alumni information
5. **Sponsors** - Recognition of sponsors and sponsorship benefits
6. **Support** - Ways to support the team (donations, mentorship, volunteering)
7. **Contact** - Contact information and social media links

## Project Setup

### Prerequisites

- Node.js 20.19.0 or higher (or 22.12.0+)
- npm or yarn

### Installation

```sh
npm install
```

### Development

Run the development server with hot-reload:

```sh
npm run dev
```

The application will be available at `http://localhost:5173/`

### Build for Production

Type-check, compile and minify for production:

```sh
npm run build
```

The built files will be in the `dist/` directory.

### Preview Production Build

Preview the production build locally:

```sh
npm run preview
```

### Type-Check Only

Run TypeScript type checking without building:

```sh
npm run type-check
```

## Project Structure

```
mechabyte/
├── src/
│   ├── components/
│   │   └── NavBar.vue          # Navigation bar with language toggle
│   ├── i18n/
│   │   └── translations.ts      # Centralized translations (EN/RO)
│   ├── router/
│   │   └── index.ts             # Vue Router configuration
│   ├── views/
│   │   ├── Home.vue
│   │   ├── Values.vue
│   │   ├── Achievements.vue
│   │   ├── Team.vue
│   │   ├── Sponsors.vue
│   │   ├── Support.vue
│   │   └── Contact.vue
│   ├── App.vue                  # Main app component
│   └── main.ts                  # Application entry point
├── public/
│   └── favicon.ico
├── index.html
├── package.json
├── tsconfig.json
└── vite.config.ts
```

## Technology Stack

- **Vue 3** - Progressive JavaScript framework
- **TypeScript** - Type-safe JavaScript
- **Vue Router 4** - Official routing library for Vue
- **Vite** - Next-generation frontend tooling
- **CSS3** - Modern styling with flexbox and grid

## Language Support

The application supports two languages:
- English (EN)
- Romanian (RO)

Switch between languages using the language toggle in the navigation bar. All content, including navigation labels, page titles, and body text, updates instantly.

## Recommended IDE Setup

- [VS Code](https://code.visualstudio.com/)
- [Vue (Official)](https://marketplace.visualstudio.com/items?itemName=Vue.volar) extension (disable Vetur if installed)

## License

This project is part of the Paradis College festival repository.
