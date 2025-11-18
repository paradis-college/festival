export interface Translation {
  // NavBar
  navHome: string;
  navValues: string;
  navAchievements: string;
  navTeam: string;
  navSponsors: string;
  navSupport: string;
  navContact: string;

  // Home Page
  homeTitle: string;
  homeSubtitle: string;
  homeMission: string;
  homeAboutTitle: string;
  homeAboutParagraphs: string[];
  homeActivitiesTitle: string;
  homeActivities: string[];

  // Values Page
  valuesTitle: string;
  valuesIntro: string;
  valuesList: Array<{ title: string; description: string }>;
  ambassadorStatement: string;
  valuesImplementationTitle: string;
  valuesImplementationText: string[];

  // Achievements Page
  achievementsTitle: string;
  achievementsIntro: string;
  achievementsTimeline: Array<{ year: string; title: string; description: string }>;

  // Team Page
  teamTitle: string;
  teamIntro: string;
  currentMembersTitle: string;
  currentMembers: Array<{ name: string; role: string }>;
  mentorsTitle: string;
  mentors: Array<{ name: string; role: string }>;
  alumniTitle: string;
  alumniText: string[];
  teamCultureTitle: string;
  teamCultureText: string[];

  // Sponsors Page
  sponsorsTitle: string;
  sponsorsIntro: string;
  currentSponsorsTitle: string;
  currentSponsors: string[];
  sponsorshipBenefitsTitle: string;
  sponsorshipBenefits: string[];
  whySponsorTitle: string;
  whySponsorText: string[];

  // Support Page
  supportTitle: string;
  supportIntro: string;
  whySupportTitle: string;
  whySupportText: string[];
  howToSupportTitle: string;
  supportOptions: Array<{ title: string; description: string }>;
  benefitsTitle: string;
  benefits: string[];
  taxRedirectionTitle: string;
  taxRedirectionText: string;

  // Contact Page
  contactTitle: string;
  contactIntro: string;
  contactDetailsTitle: string;
  contactEmail: string;
  contactPhone: string;
  contactAddress: string;
  socialMediaTitle: string;
  visitUsTitle: string;
  visitUsText: string[];
}

export const translations: { en: Translation; ro: Translation } = {
  en: {
    // NavBar
    navHome: 'Home',
    navValues: 'Values',
    navAchievements: 'Achievements',
    navTeam: 'Team',
    navSponsors: 'Sponsors',
    navSupport: 'Support',
    navContact: 'Contact',

    // Home Page
    homeTitle: 'Welcome to Mechabyte',
    homeSubtitle: 'Paradis College Robotics Team',
    homeMission:
      'Mechabyte is the robotics team of Paradis College, dedicated to fostering innovation, technical excellence, and teamwork through competitive robotics and STEM education.',
    homeAboutTitle: 'About Our Team',
    homeAboutParagraphs: [
      'Founded in 2018, Mechabyte represents Paradis College in national and international robotics competitions. Our team brings together passionate students who share a love for technology, engineering, and problem-solving.',
      'We participate in the FIRST Tech Challenge (FTC), where we design, build, and program robots to compete in challenging game scenarios. Through this experience, our members develop critical skills in mechanical design, programming, electronics, and project management.',
      'Beyond competitions, Mechabyte is committed to promoting STEM education in our community. We organize workshops, demonstrations, and outreach programs to inspire younger students to explore careers in science and technology.',
      'Our team operates under the values of professionalism, innovation, collaboration, and continuous learning. Every member contributes unique skills and perspectives, creating a diverse and dynamic team environment.',
      'Supported by mentors, sponsors, and the educational institution, we work year-round to prepare for competitions, develop new technologies, and engage with the robotics community both locally and internationally.',
    ],
    homeActivitiesTitle: 'What We Do',
    homeActivities: [
      'Design and build competitive robots for FIRST Tech Challenge',
      'Develop programming solutions using Java and Android Studio',
      'Participate in regional, national, and international robotics competitions',
      'Conduct STEM outreach programs in schools and communities',
      'Collaborate with industry partners and technical mentors',
      'Host robotics workshops and training sessions',
      'Document our journey through social media and technical portfolios',
      'Continuously improve our skills through research and experimentation',
    ],

    // Values Page
    valuesTitle: 'Our Core Values',
    valuesIntro:
      'At Mechabyte, our values guide every decision we make and every action we take. These principles define who we are as a team and how we represent our school and the Nație prin Educație programme.',
    valuesList: [
      {
        title: 'Innovation',
        description:
          'We embrace creativity and innovative thinking in solving complex technical challenges. Our team constantly explores new technologies, methodologies, and approaches to stay at the forefront of robotics.',
      },
      {
        title: 'Collaboration',
        description:
          'Success in robotics requires effective teamwork. We value open communication, mutual respect, and the diverse perspectives each team member brings to our collective efforts.',
      },
      {
        title: 'Excellence',
        description:
          'We strive for excellence in everything we do, from robot design to community outreach. Our commitment to quality and continuous improvement drives us to achieve outstanding results.',
      },
      {
        title: 'Integrity',
        description:
          'Honesty, ethical behavior, and gracious professionalism are fundamental to our team culture. We compete with integrity and treat all teams, judges, and partners with respect.',
      },
      {
        title: 'Learning',
        description:
          'We view every challenge as a learning opportunity. Whether we succeed or face setbacks, we analyze our experiences and use them to grow stronger and more capable.',
      },
      {
        title: 'Community',
        description:
          'Giving back to our community is essential. We dedicate time to inspire the next generation of engineers and scientists through demonstrations, workshops, and mentorship programs.',
      },
    ],
    ambassadorStatement:
      'Members represent not only the team but also the educational organisation and the Nație prin Educație programme, acting as ambassadors for STEM education and youth development.',
    valuesImplementationTitle: 'Living Our Values',
    valuesImplementationText: [
      'Our values are not just words on a page—they are the foundation of our daily operations. During the design phase, we encourage every team member to propose ideas and challenge assumptions, fostering innovation and collaboration.',
      'In competitions, we demonstrate integrity by following all rules, helping other teams when possible, and showing gracious professionalism even under pressure. Excellence is reflected in our meticulous attention to detail and thorough testing procedures.',
      'We dedicate several hours each month to community outreach, sharing our passion for robotics with younger students. This commitment to community engagement reinforces our belief that knowledge should be shared and accessible to all.',
      'Regular team meetings include reflections on our performance, both technical and interpersonal. This emphasis on learning ensures that we continuously evolve and improve, transforming mistakes into valuable lessons.',
    ],

    // Achievements Page
    achievementsTitle: 'Our Achievements',
    achievementsIntro:
      'Since our inception, Mechabyte has achieved numerous milestones in robotics competitions, community engagement, and technical innovation. Here is our journey:',
    achievementsTimeline: [
      {
        year: '2018',
        title: 'Team Founded',
        description:
          'Mechabyte was established at Paradis College with 12 founding members passionate about robotics and technology.',
      },
      {
        year: '2019',
        title: 'First FTC Competition',
        description:
          'Participated in our first FIRST Tech Challenge regional competition, learning valuable lessons about robot design and competition strategy.',
      },
      {
        year: '2020',
        title: 'Regional Quarterfinalists',
        description:
          'Advanced to the quarterfinals at the regional championship, showcasing significant improvement in both robot performance and team coordination.',
      },
      {
        year: '2021',
        title: 'Innovation Award',
        description:
          'Received the Innovation Award for our unique approach to autonomous programming using computer vision and machine learning.',
      },
      {
        year: '2022',
        title: 'National Competition',
        description:
          'Qualified for the national championship for the first time, competing against the top teams in the country.',
      },
      {
        year: '2023',
        title: 'Community Outreach Recognition',
        description:
          'Awarded the Community Outreach Award for organizing STEM workshops that reached over 500 students in local schools.',
      },
      {
        year: '2024',
        title: 'International Qualifier',
        description:
          'Qualified for an international robotics event, representing Romania on the global stage and finishing in the top 20.',
      },
      {
        year: '2025',
        title: 'Excellence in Engineering',
        description:
          'Received the Excellence in Engineering Award for our comprehensive documentation, innovative design solutions, and consistent performance throughout the season.',
      },
      {
        year: '2025',
        title: 'STEM Fair Participation',
        description:
          'Participated in multiple local STEM fairs, demonstrating our robot and inspiring hundreds of students to explore robotics and engineering.',
      },
      {
        year: '2025',
        title: 'Robotics Workshop Series',
        description:
          'Launched a series of robotics workshops for middle-school students, teaching basic programming, mechanics, and problem-solving skills.',
      },
      {
        year: '2025',
        title: 'Partnership with Local University',
        description:
          'Established a mentorship partnership with the engineering department of a local university, gaining access to advanced equipment and expertise.',
      },
    ],

    // Team Page
    teamTitle: 'Meet Our Team',
    teamIntro:
      'Mechabyte is composed of talented and dedicated students from Paradis College, supported by experienced mentors and a strong alumni network.',
    currentMembersTitle: 'Current Members',
    currentMembers: [
      { name: 'Alexandru Popescu', role: 'Team Captain & Mechanical Lead' },
      { name: 'Maria Ionescu', role: 'Software Lead & Autonomous Programming' },
      { name: 'Andrei Dumitrescu', role: 'Electronics & Control Systems' },
      { name: 'Elena Georgescu', role: 'CAD Design & 3D Modeling' },
      { name: 'Mihai Stanescu', role: 'Strategy & Game Analysis' },
      { name: 'Ana Radu', role: 'Outreach Coordinator' },
      { name: 'Cristian Marin', role: 'Build Team & Fabrication' },
      { name: 'Ioana Popa', role: 'Documentation & Portfolio' },
      { name: 'Gabriel Vasile', role: 'Driver & Operator' },
      { name: 'Sofia Preda', role: 'Business Development' },
      { name: 'Vlad Constantin', role: 'Programming & Sensors' },
      { name: 'Diana Moldovan', role: 'Social Media Manager' },
    ],
    mentorsTitle: 'Mentors',
    mentors: [
      { name: 'Prof. Adrian Nicolescu', role: 'Faculty Advisor & Technical Mentor' },
      { name: 'Eng. Daniela Apostol', role: 'Mechanical Engineering Mentor' },
      { name: 'Eng. Radu Florescu', role: 'Software & Programming Mentor' },
    ],
    alumniTitle: 'Alumni Network',
    alumniText: [
      'Our alumni continue to support the team and serve as role models for current members. Many have gone on to study engineering, computer science, and related fields at prestigious universities.',
      'Former members regularly return to share their experiences and provide guidance on both technical challenges and career development. They have pursued diverse paths, including software engineering, mechanical design, project management, and entrepreneurship.',
      'The alumni network also helps with fundraising, mentorship, and connecting the team with industry professionals. Their ongoing involvement demonstrates the lasting impact of the Mechabyte experience.',
    ],
    teamCultureTitle: 'Our Team Culture',
    teamCultureText: [
      'Mechabyte fosters an inclusive environment where every member feels valued and empowered to contribute. We believe that diversity of thought and experience leads to better solutions and more innovative robots.',
      'New members receive comprehensive training in robotics fundamentals, safety protocols, and team procedures. Senior members mentor newcomers, ensuring knowledge transfer and continuity.',
      'We emphasize work-life balance and academic success. Team activities are scheduled to accommodate schoolwork, and members support each other during exam periods.',
      'Regular team-building activities strengthen bonds beyond the technical work. We celebrate successes together and support each other through challenges, creating lasting friendships.',
      'Leadership opportunities are available to all members. We rotate responsibilities and encourage everyone to develop project management, communication, and technical skills.',
    ],

    // Sponsors Page
    sponsorsTitle: 'Our Sponsors & Partners',
    sponsorsIntro:
      'Mechabyte would not be possible without the generous support of our sponsors and partners. Their contributions enable us to purchase materials, attend competitions, and conduct outreach programs.',
    currentSponsorsTitle: 'Current Sponsors',
    currentSponsors: [
      'Paradis College',
      'Nație prin Educație Programme',
      'TechCorp Solutions',
      'RoboticsParts Supplier',
      'Local Engineering Association',
      'Community Foundation for STEM Education',
      'Innovation Hub Bucharest',
      'AlumniCorp Network',
    ],
    sponsorshipBenefitsTitle: 'Benefits of Sponsoring Mechabyte',
    sponsorshipBenefits: [
      'Brand visibility at competitions and community events',
      'Recognition on our website, social media, and team materials',
      'Opportunities to engage with talented future engineers',
      'Demonstration of corporate social responsibility',
      'Tax benefits for eligible contributions',
      'Access to team members for internships and recruitment',
      'Participation in educational initiatives and STEM advocacy',
    ],
    whySponsorTitle: 'Why Sponsor Us?',
    whySponsorText: [
      'By sponsoring Mechabyte, you invest in the future of Romanian engineering and technology. Our team members are tomorrow\'s innovators, and your support helps them develop skills that will drive economic growth and technological advancement.',
      'Sponsorship funds are used for essential equipment, competition fees, travel expenses, and outreach materials. Every contribution directly impacts our ability to compete at the highest level and inspire more students to pursue STEM careers.',
      'Sponsors gain visibility within the robotics community and among families committed to education. Your logo appears on our robot, team uniforms, and promotional materials at competitions attended by hundreds of people.',
      'We offer flexible sponsorship levels to accommodate different budgets. Whether you provide financial support, donate materials, or offer technical expertise, your contribution is valued and recognized.',
      'Building relationships with educational teams demonstrates your commitment to developing local talent. Many sponsors find value in identifying promising students for future internships and employment opportunities.',
    ],

    // Support Page
    supportTitle: 'Support Us',
    supportIntro:
      'There are many ways to support Mechabyte and help us achieve our goals. Whether through financial contributions, material donations, or volunteering your time and expertise, every form of support makes a difference.',
    whySupportTitle: 'Why Support Us?',
    whySupportText: [
      'Supporting Mechabyte means investing in education, innovation, and community development. Our team provides students with hands-on experience in engineering, programming, and project management—skills essential for success in the 21st century.',
      'Through robotics, students learn to think critically, solve complex problems, and work effectively in teams. These experiences build confidence and prepare them for higher education and professional careers in STEM fields.',
      'Our outreach programs extend the benefits beyond team members. We conduct workshops and demonstrations that introduce robotics to students who might not otherwise have access to such opportunities, helping to close the STEM education gap.',
      'By supporting us, you contribute to creating a stronger culture of innovation in Romania. Every robot we build, every competition we attend, and every student we inspire represents progress toward a more technologically advanced society.',
    ],
    howToSupportTitle: 'How to Support',
    supportOptions: [
      {
        title: 'Financial Donations',
        description:
          'Monetary contributions help us purchase parts, pay competition fees, and cover travel expenses. All donations are used directly for team activities.',
      },
      {
        title: 'Material Donations',
        description:
          'We welcome donations of tools, electronics, materials, and equipment. Items like motors, sensors, and fabrication supplies are always needed.',
      },
      {
        title: 'Technical Mentorship',
        description:
          'Engineers, programmers, and other professionals can volunteer as mentors, sharing expertise and guiding students through technical challenges.',
      },
      {
        title: 'Facility Access',
        description:
          'Access to workshops, testing spaces, and specialized equipment allows us to work more efficiently and explore advanced techniques.',
      },
      {
        title: 'Professional Services',
        description:
          'Companies can donate services such as machining, 3D printing, laser cutting, or software licenses that support our design and fabrication process.',
      },
      {
        title: 'Volunteer Time',
        description:
          'Help with logistics, event organization, outreach activities, or administrative tasks. Every hour contributed supports our mission.',
      },
    ],
    benefitsTitle: 'Benefits of Supporting',
    benefits: [
      'Recognition on our website and social media platforms',
      'Logo placement on robot and team materials',
      'Invitation to exclusive team events and demonstrations',
      'Direct impact on student development and education',
      'Positive community reputation and social responsibility',
      'Potential tax deductions for eligible contributions',
      'Networking opportunities with other supporters and partners',
      'Regular updates on team progress and achievements',
    ],
    taxRedirectionTitle: 'Tax Redirection for Romanian Citizens',
    taxRedirectionText:
      'Romanian taxpayers can redirect 3.5% of their income tax to support Mechabyte through our partner organization. This costs you nothing extra but provides crucial funding for our activities. Contact us for details on how to redirect your tax.',

    // Contact Page
    contactTitle: 'Get in Touch',
    contactIntro:
      'We welcome inquiries from potential sponsors, community partners, students interested in joining, and anyone passionate about robotics and STEM education.',
    contactDetailsTitle: 'Contact Information',
    contactEmail: 'mechabyte@paradiscollege.ro',
    contactPhone: '+40 123 456 789',
    contactAddress: 'Paradis College, Strada Exemplu 123, București, Romania',
    socialMediaTitle: 'Follow Us on Social Media',
    visitUsTitle: 'Visit Us',
    visitUsText: [
      'We welcome visitors to our workspace during team meetings. If you\'re interested in seeing our robot in action, learning about our projects, or discussing potential collaboration, please contact us to schedule a visit.',
      'School groups and organizations interested in robotics demonstrations can request a presentation. We love sharing our passion for technology and inspiring others to explore STEM fields.',
      'For media inquiries, sponsorship discussions, or general questions, please email us directly. We typically respond within 48 hours.',
    ],
  },
  ro: {
    // NavBar
    navHome: 'Acasă',
    navValues: 'Valori',
    navAchievements: 'Realizări',
    navTeam: 'Echipa',
    navSponsors: 'Sponsori',
    navSupport: 'Sprijină-ne',
    navContact: 'Contact',

    // Home Page
    homeTitle: 'Bine ați venit la Mechabyte',
    homeSubtitle: 'Echipa de Robotică a Colegiului Paradis',
    homeMission:
      'Mechabyte este echipa de robotică a Colegiului Paradis, dedicată promovării inovației, excelenței tehnice și a muncii în echipă prin intermediul roboticii competitive și educației STEM.',
    homeAboutTitle: 'Despre Echipa Noastră',
    homeAboutParagraphs: [
      'Fondată în 2018, Mechabyte reprezintă Colegiul Paradis la competiții de robotică naționale și internaționale. Echipa noastră reunește studenți pasionați care împărtășesc dragostea pentru tehnologie, inginerie și rezolvarea problemelor.',
      'Participăm la FIRST Tech Challenge (FTC), unde proiectăm, construim și programăm roboți pentru a concura în scenarii de joc provocatoare. Prin această experiență, membrii noștri dezvoltă abilități critice în design mecanic, programare, electronică și management de proiect.',
      'Dincolo de competiții, Mechabyte este dedicată promovării educației STEM în comunitatea noastră. Organizăm workshop-uri, demonstrații și programe de informare pentru a inspira elevii mai tineri să exploreze cariere în știință și tehnologie.',
      'Echipa noastră operează sub valorile profesionalismului, inovației, colaborării și învățării continue. Fiecare membru contribuie cu abilități și perspective unice, creând un mediu de echipă divers și dinamic.',
      'Susținuți de mentori, sponsori și instituția educațională, lucrăm tot anul pentru a ne pregăti pentru competiții, a dezvolta noi tehnologii și a ne implica în comunitatea de robotică atât local, cât și internațional.',
    ],
    homeActivitiesTitle: 'Ce Facem',
    homeActivities: [
      'Proiectăm și construim roboți competitivi pentru FIRST Tech Challenge',
      'Dezvoltăm soluții de programare folosind Java și Android Studio',
      'Participăm la competiții de robotică regionale, naționale și internaționale',
      'Organizăm programe de informare STEM în școli și comunități',
      'Colaborăm cu parteneri din industrie și mentori tehnici',
      'Găzduim workshop-uri și sesiuni de training în robotică',
      'Documentăm călătoria noastră prin social media și portofolii tehnice',
      'Ne îmbunătățim continuu abilitățile prin cercetare și experimentare',
    ],

    // Values Page
    valuesTitle: 'Valorile Noastre Fundamentale',
    valuesIntro:
      'La Mechabyte, valorile noastre ghidează fiecare decizie pe care o luăm și fiecare acțiune pe care o întreprindem. Aceste principii definesc cine suntem ca echipă și cum ne reprezentăm școala și programul Nație prin Educație.',
    valuesList: [
      {
        title: 'Inovație',
        description:
          'Îmbrățișăm creativitatea și gândirea inovatoare în rezolvarea provocărilor tehnice complexe. Echipa noastră explorează constant noi tehnologii, metodologii și abordări pentru a rămâne în fruntea roboticii.',
      },
      {
        title: 'Colaborare',
        description:
          'Succesul în robotică necesită muncă în echipă eficientă. Apreciem comunicarea deschisă, respectul reciproc și perspectivele diverse pe care fiecare membru al echipei le aduce eforturilor noastre colective.',
      },
      {
        title: 'Excelență',
        description:
          'Ne străduim pentru excelență în tot ce facem, de la designul robotului până la activitățile comunitare. Angajamentul nostru față de calitate și îmbunătățire continuă ne determină să obținem rezultate remarcabile.',
      },
      {
        title: 'Integritate',
        description:
          'Onestitatea, comportamentul etic și profesionalismul gracios sunt fundamentale pentru cultura echipei noastre. Concurăm cu integritate și tratăm toate echipele, jurații și partenerii cu respect.',
      },
      {
        title: 'Învățare',
        description:
          'Considerăm fiecare provocare ca o oportunitate de învățare. Fie că reușim sau ne confruntăm cu obstacole, analizăm experiențele noastre și le folosim pentru a deveni mai puternici și mai capabili.',
      },
      {
        title: 'Comunitate',
        description:
          'A reda comunității este esențial. Dedicăm timp pentru a inspira următoarea generație de ingineri și oameni de știință prin demonstrații, workshop-uri și programe de mentorat.',
      },
    ],
    ambassadorStatement:
      'Membrii reprezintă nu doar echipa, ci și organizația educațională și programul Nație prin Educație, acționând ca ambasadori pentru educația STEM și dezvoltarea tinerilor.',
    valuesImplementationTitle: 'Trăind Valorile Noastre',
    valuesImplementationText: [
      'Valorile noastre nu sunt doar cuvinte pe o pagină—sunt fundația operațiunilor noastre zilnice. În timpul fazei de design, încurajăm fiecare membru al echipei să propună idei și să conteste presupunerile, promovând inovația și colaborarea.',
      'În competiții, demonstrăm integritate urmând toate regulile, ajutând alte echipe când este posibil și arătând profesionalism gracios chiar și sub presiune. Excelența se reflectă în atenția noastră meticuloasă la detalii și procedurile de testare riguroase.',
      'Dedicăm câteva ore în fiecare lună pentru activități comunitare, împărtășind pasiunea noastră pentru robotică cu elevii mai tineri. Acest angajament față de implicarea în comunitate întărește convingerea noastră că cunoștințele ar trebui să fie împărtășite și accesibile tuturor.',
      'Întâlnirile regulate ale echipei includ reflecții asupra performanței noastre, atât tehnică, cât și interpersonală. Această emphasă pe învățare asigură că evoluăm și ne îmbunătățim continuu, transformând greșelile în lecții valoroase.',
    ],

    // Achievements Page
    achievementsTitle: 'Realizările Noastre',
    achievementsIntro:
      'De la înființare, Mechabyte a atins numeroase jaloane în competiții de robotică, implicare comunitară și inovație tehnică. Iată călătoria noastră:',
    achievementsTimeline: [
      {
        year: '2018',
        title: 'Fondarea Echipei',
        description:
          'Mechabyte a fost înființată la Colegiul Paradis cu 12 membri fondatori pasionați de robotică și tehnologie.',
      },
      {
        year: '2019',
        title: 'Prima Competiție FTC',
        description:
          'Am participat la prima noastră competiție regională FIRST Tech Challenge, învățând lecții valoroase despre designul robotului și strategia de competiție.',
      },
      {
        year: '2020',
        title: 'Sferturi de Finală Regionale',
        description:
          'Am avansat în sferturile de finală la campionatul regional, demonstrând îmbunătățiri semnificative atât în performanța robotului, cât și în coordonarea echipei.',
      },
      {
        year: '2021',
        title: 'Premiul pentru Inovație',
        description:
          'Am primit Premiul pentru Inovație pentru abordarea noastră unică a programării autonome folosind viziunea computerizată și învățarea automată.',
      },
      {
        year: '2022',
        title: 'Competiție Națională',
        description:
          'Ne-am calificat pentru campionatul național pentru prima dată, concurând împotriva celor mai bune echipe din țară.',
      },
      {
        year: '2023',
        title: 'Recunoaștere pentru Implicare Comunitară',
        description:
          'Am fost premiați cu Premiul pentru Implicare Comunitară pentru organizarea de workshop-uri STEM care au ajuns la peste 500 de elevi în școlile locale.',
      },
      {
        year: '2024',
        title: 'Calificare Internațională',
        description:
          'Ne-am calificat pentru un eveniment internațional de robotică, reprezentând România pe scena globală și terminând în top 20.',
      },
      {
        year: '2025',
        title: 'Excelență în Inginerie',
        description:
          'Am primit Premiul pentru Excelență în Inginerie pentru documentația noastră cuprinzătoare, soluțiile inovatoare de design și performanța constantă pe parcursul sezonului.',
      },
      {
        year: '2025',
        title: 'Participare la Târgul STEM',
        description:
          'Am participat la multiple târguri STEM locale, demonstrând robotul nostru și inspirând sute de elevi să exploreze robotica și ingineria.',
      },
      {
        year: '2025',
        title: 'Serie de Workshop-uri de Robotică',
        description:
          'Am lansat o serie de workshop-uri de robotică pentru elevi de gimnaziu, predând programare de bază, mecanică și abilități de rezolvare a problemelor.',
      },
      {
        year: '2025',
        title: 'Parteneriat cu Universitatea Locală',
        description:
          'Am stabilit un parteneriat de mentorat cu departamentul de inginerie al unei universități locale, obținând acces la echipamente avansate și expertiză.',
      },
    ],

    // Team Page
    teamTitle: 'Cunoaște Echipa Noastră',
    teamIntro:
      'Mechabyte este compusă din studenți talentați și dedicați de la Colegiul Paradis, susținuți de mentori experimentați și o rețea puternică de alumni.',
    currentMembersTitle: 'Membri Actuali',
    currentMembers: [
      { name: 'Alexandru Popescu', role: 'Căpitan de Echipă și Responsabil Mecanic' },
      { name: 'Maria Ionescu', role: 'Responsabil Software și Programare Autonomă' },
      { name: 'Andrei Dumitrescu', role: 'Electronică și Sisteme de Control' },
      { name: 'Elena Georgescu', role: 'Design CAD și Modelare 3D' },
      { name: 'Mihai Stanescu', role: 'Strategie și Analiză de Joc' },
      { name: 'Ana Radu', role: 'Coordonator Activități Comunitare' },
      { name: 'Cristian Marin', role: 'Echipa de Construcție și Fabricare' },
      { name: 'Ioana Popa', role: 'Documentare și Portofoliu' },
      { name: 'Gabriel Vasile', role: 'Pilot și Operator' },
      { name: 'Sofia Preda', role: 'Dezvoltare Afaceri' },
      { name: 'Vlad Constantin', role: 'Programare și Senzori' },
      { name: 'Diana Moldovan', role: 'Manager Social Media' },
    ],
    mentorsTitle: 'Mentori',
    mentors: [
      { name: 'Prof. Adrian Nicolescu', role: 'Consilier Facultate și Mentor Tehnic' },
      { name: 'Ing. Daniela Apostol', role: 'Mentor Inginerie Mecanică' },
      { name: 'Ing. Radu Florescu', role: 'Mentor Software și Programare' },
    ],
    alumniTitle: 'Rețeaua de Alumni',
    alumniText: [
      'Alumni noștri continuă să susțină echipa și servesc ca modele pentru membrii actuali. Mulți au continuat să studieze inginerie, informatică și domenii conexe la universități prestigioase.',
      'Foști membri revin regulat pentru a-și împărtăși experiențele și a oferi îndrumări atât pentru provocări tehnice, cât și pentru dezvoltarea carierei. Aceștia au urmat căi diverse, inclusiv inginerie software, design mecanic, management de proiect și antreprenoriat.',
      'Rețeaua de alumni ajută, de asemenea, cu strângerea de fonduri, mentorat și conectarea echipei cu profesioniști din industrie. Implicarea lor continuă demonstrează impactul de durată al experienței Mechabyte.',
    ],
    teamCultureTitle: 'Cultura Echipei Noastre',
    teamCultureText: [
      'Mechabyte promovează un mediu incluziv în care fiecare membru se simte valorizat și împuternicit să contribuie. Credem că diversitatea de gândire și experiență duce la soluții mai bune și roboți mai inovativi.',
      'Noii membri primesc training cuprinzător în fundamentele roboticii, protocoale de siguranță și proceduri ale echipei. Membrii seniori îndrumă noii veniți, asigurând transferul de cunoștințe și continuitatea.',
      'Emphasăm echilibrul între viață și muncă și succesul academic. Activitățile echipei sunt programate pentru a se potrivi cu munca școlară, iar membrii se sprijină reciproc în perioadele de examene.',
      'Activitățile regulate de team-building întăresc legăturile dincolo de munca tehnică. Sărbătorim succesele împreună și ne sprijinim reciproc prin provocări, creând prietenii de durată.',
      'Oportunități de leadership sunt disponibile pentru toți membrii. Rotăm responsabilitățile și încurajăm pe toată lumea să dezvolte abilități de management de proiect, comunicare și tehnice.',
    ],

    // Sponsors Page
    sponsorsTitle: 'Sponsorii și Partenerii Noștri',
    sponsorsIntro:
      'Mechabyte nu ar fi posibilă fără sprijinul generos al sponsorilor și partenerilor noștri. Contribuțiile lor ne permit să achiziționăm materiale, să participăm la competiții și să desfășurăm programe de informare.',
    currentSponsorsTitle: 'Sponsori Actuali',
    currentSponsors: [
      'Colegiul Paradis',
      'Programul Nație prin Educație',
      'TechCorp Solutions',
      'Furnizor de Piese pentru Robotică',
      'Asociația Locală de Ingineri',
      'Fundația Comunitară pentru Educația STEM',
      'Innovation Hub București',
      'Rețeaua AlumniCorp',
    ],
    sponsorshipBenefitsTitle: 'Beneficiile Sponsorizării Mechabyte',
    sponsorshipBenefits: [
      'Vizibilitate a brandului la competiții și evenimente comunitare',
      'Recunoaștere pe site-ul nostru, social media și materialele echipei',
      'Oportunități de a interacționa cu viitori ingineri talentați',
      'Demonstrarea responsabilității sociale corporative',
      'Beneficii fiscale pentru contribuții eligibile',
      'Acces la membrii echipei pentru stagii și recrutare',
      'Participare la inițiative educaționale și advocacy STEM',
    ],
    whySponsorTitle: 'De Ce Să Ne Sponsorizați?',
    whySponsorText: [
      'Sponsorizând Mechabyte, investiți în viitorul ingineriei și tehnologiei românești. Membrii echipei noastre sunt inovatorii de mâine, iar sprijinul dumneavoastră îi ajută să dezvolte abilități care vor stimula creșterea economică și avansul tehnologic.',
      'Fondurile de sponsorizare sunt folosite pentru echipament esențial, taxe de competiție, cheltuieli de călătorie și materiale pentru activități comunitare. Fiecare contribuție impactează direct capacitatea noastră de a concura la cel mai înalt nivel și de a inspira mai mulți studenți să urmeze cariere STEM.',
      'Sponsorii câștigă vizibilitate în cadrul comunității de robotică și printre familiile dedicate educației. Logo-ul dumneavoastră apare pe robotul nostru, uniformele echipei și materialele promoționale la competiții frecventate de sute de persoane.',
      'Oferim niveluri flexibile de sponsorizare pentru a se potrivi diferitelor bugete. Fie că oferiți sprijin financiar, donați materiale sau oferiți expertiză tehnică, contribuția dumneavoastră este apreciată și recunoscută.',
      'Construirea de relații cu echipe educaționale demonstrează angajamentul dumneavoastră față de dezvoltarea talentului local. Mulți sponsori găsesc valoare în identificarea studenților promițători pentru viitoare stagii și oportunități de angajare.',
    ],

    // Support Page
    supportTitle: 'Sprijină-ne',
    supportIntro:
      'Există multe modalități de a sprijini Mechabyte și de a ne ajuta să ne atingem obiectivele. Fie prin contribuții financiare, donații de materiale sau oferind timpul și expertiza dumneavoastră, fiecare formă de sprijin face diferența.',
    whySupportTitle: 'De Ce Să Ne Sprijiniți?',
    whySupportText: [
      'Sprijinirea Mechabyte înseamnă investiție în educație, inovație și dezvoltare comunitară. Echipa noastră oferă studenților experiență practică în inginerie, programare și management de proiect—abilități esențiale pentru succes în secolul 21.',
      'Prin robotică, studenții învață să gândească critic, să rezolve probleme complexe și să lucreze eficient în echipă. Aceste experiențe construiesc încredere și îi pregătesc pentru educație superioară și cariere profesionale în domenii STEM.',
      'Programele noastre comunitare extind beneficiile dincolo de membrii echipei. Desfășurăm workshop-uri și demonstrații care introduc robotica la studenți care altfel nu ar avea acces la astfel de oportunități, ajutând la reducerea decalajului în educația STEM.',
      'Sprijinindu-ne, contribuiți la crearea unei culturi mai puternice a inovației în România. Fiecare robot pe care îl construim, fiecare competiție la care participăm și fiecare student pe care îl inspirăm reprezintă progres către o societate mai avansată tehnologic.',
    ],
    howToSupportTitle: 'Cum Să Sprijiniți',
    supportOptions: [
      {
        title: 'Donații Financiare',
        description:
          'Contribuțiile monetare ne ajută să achiziționăm piese, să plătim taxe de competiție și să acoperim cheltuieli de călătorie. Toate donațiile sunt folosite direct pentru activități ale echipei.',
      },
      {
        title: 'Donații de Materiale',
        description:
          'Primim cu plăcere donații de unelte, electronică, materiale și echipamente. Articole precum motoare, senzori și consumabile de fabricare sunt întotdeauna necesare.',
      },
      {
        title: 'Mentorat Tehnic',
        description:
          'Ingineri, programatori și alți profesioniști pot deveni voluntari ca mentori, împărtășind expertiză și ghidând studenții prin provocări tehnice.',
      },
      {
        title: 'Acces la Facilități',
        description:
          'Accesul la ateliere, spații de testare și echipamente specializate ne permite să lucrăm mai eficient și să explorăm tehnici avansate.',
      },
      {
        title: 'Servicii Profesionale',
        description:
          'Companiile pot dona servicii precum prelucrarea mecanică, imprimarea 3D, tăierea cu laser sau licențe software care sprijină procesul nostru de design și fabricare.',
      },
      {
        title: 'Timp Voluntar',
        description:
          'Ajutor cu logistică, organizare de evenimente, activități comunitare sau sarcini administrative. Fiecare oră contribuită sprijină misiunea noastră.',
      },
    ],
    benefitsTitle: 'Beneficiile Sprijinului',
    benefits: [
      'Recunoaștere pe site-ul nostru și pe platformele de social media',
      'Plasarea logo-ului pe robot și materialele echipei',
      'Invitație la evenimente exclusive ale echipei și demonstrații',
      'Impact direct asupra dezvoltării și educației studenților',
      'Reputație comunitară pozitivă și responsabilitate socială',
      'Potențiale deduceri fiscale pentru contribuții eligibile',
      'Oportunități de networking cu alți susținători și parteneri',
      'Actualizări regulate despre progresul și realizările echipei',
    ],
    taxRedirectionTitle: 'Redirecționare Fiscală pentru Cetățenii Români',
    taxRedirectionText:
      'Contribuabilii români pot redirecționa 3,5% din impozitul pe venit pentru a sprijini Mechabyte prin organizația noastră parteneră. Aceasta nu vă costă nimic în plus, dar oferă finanțare crucială pentru activitățile noastre. Contactați-ne pentru detalii despre cum să vă redirecționați impozitul.',

    // Contact Page
    contactTitle: 'Contactați-ne',
    contactIntro:
      'Primim cu plăcere întrebări de la potențiali sponsori, parteneri comunitari, studenți interesați să se alăture și oricine este pasionat de robotică și educația STEM.',
    contactDetailsTitle: 'Informații de Contact',
    contactEmail: 'mechabyte@paradiscollege.ro',
    contactPhone: '+40 123 456 789',
    contactAddress: 'Colegiul Paradis, Strada Exemplu 123, București, România',
    socialMediaTitle: 'Urmăriți-ne pe Social Media',
    visitUsTitle: 'Vizitați-ne',
    visitUsText: [
      'Primim cu plăcere vizitatori în spațiul nostru de lucru în timpul întâlnirilor echipei. Dacă sunteți interesat să vedeți robotul nostru în acțiune, să aflați despre proiectele noastre sau să discutați despre o potențială colaborare, vă rugăm să ne contactați pentru a programa o vizită.',
      'Grupurile școlare și organizațiile interesate de demonstrații de robotică pot solicita o prezentare. Ne place să împărtășim pasiunea noastră pentru tehnologie și să inspirăm pe alții să exploreze domeniile STEM.',
      'Pentru întrebări media, discuții despre sponsorizare sau întrebări generale, vă rugăm să ne trimiteți un email direct. De obicei, răspundem în 48 de ore.',
    ],
  },
};
