# Science Festival Website

A PHP-based website for showcasing science projects from the Nikola Tesla Science Fair Festival at Paradis College, featuring a modern frontend design with project display, news, and voting functionality.

## Features

- **Modern Frontend Design**: Responsive design with slideshow, image gallery, and interactive elements
- **Static Pages**: News/newsletters, About Us, and STEM Community values pages
- **Project Display**: Browse and search science projects with modern card-based layout
- **User Authentication**: Login system for teachers and students
- **Project Upload**: Teachers can upload projects in Markdown format
- **Voting System**: Users can vote for their favorite projects
- **Comments System**: Engage with projects through comments
- **PDF Viewer**: View festival newsletters and magazines
- **Role-based Access**: Different permissions for teachers, students, and admins

## New Pages

- **Home** (`index.php`) - Featured slideshow and image gallery
- **News** (`news.php`) - Festival newsletters with PDF viewer
- **About Us** (`about.php`) - Mission, vision, and festival information
- **Community** (`community.php`) - STEM values and philosophy
- **Projects** (`projects.php`) - All student projects with filtering

## Requirements

- PHP 7.4 or higher
- SQLite 3 (included) or MySQL 5.7+ (optional)
- Web server (Apache/Nginx)

## Quick Start

### Using PHP Built-in Server

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd festival
   ```

2. **Start the development server**
   ```bash
   php -S localhost:8000
   ```

3. **Access the website**
   - Open browser to `http://localhost:8000`
   - Database is created automatically (SQLite)

### Using Apache/Nginx

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd festival
   ```

2. **Set Permissions**
   ```bash
   chmod 755 uploads/
   chmod 666 festival.db  # If using SQLite
   ```

3. **Access the Website**
   - Place files in your web server document root
   - Access via web browser (e.g., `http://localhost/festival`)

## Demo Accounts

The system comes with pre-configured demo accounts:

- **Admin**: username `admin`, password `admin123`
- **Teacher**: username `teacher1`, password `admin123`
- **Student**: username `student1`, password `admin123`

**⚠️ Important**: Change these passwords in production!

## Project Structure

```
festival/
├── assets/
│   ├── css/
│   │   ├── style.css          # Original Bootstrap styles
│   │   └── frontend.css       # New frontend design styles
│   ├── js/
│   │   ├── script.js          # Original JavaScript
│   │   └── frontend.js        # Frontend interactions (slideshow, lightbox, PDF viewer)
│   ├── images/                # Festival photos and images (40 files)
│   └── pdfs/                  # Newsletter PDFs (5 files)
├── config/
│   ├── database.php           # Database configuration (SQLite default)
│   └── init.sql              # Database initialization
├── includes/
│   ├── functions.php         # Core PHP functions
│   ├── header.php           # Common header with navigation
│   └── footer.php           # Common footer
├── uploads/                  # User-uploaded project files
├── index.php                # Homepage with slideshow and gallery
├── news.php                 # News and newsletters (NEW)
├── about.php                # About Us page (NEW)
├── community.php            # STEM Community values (NEW)
├── projects.php             # All projects listing (UPDATED)
├── project.php              # Individual project detail view
├── login.php                # User login
├── register.php             # User registration
├── upload.php               # Project upload (teachers only)
├── vote.php                 # Voting handler
├── comment.php              # Comment handler
├── edit.php                 # Edit project
├── delete.php               # Delete project
├── logout.php               # Logout handler
├── FRONTEND_INTEGRATION.md  # Frontend integration docs (NEW)
└── DEVELOPER_GUIDE.md       # Developer guide
```

## New Features

### Frontend Integration
- **Modern Design**: Clean, responsive frontend with professional styling
- **Slideshow**: Homepage features 5 slides highlighting main sections
- **Image Gallery**: Interactive 4-column gallery with lightbox viewer
- **PDF Viewer**: Modal viewer for newsletter PDFs with zoom controls
- **Sticky Navigation**: Easy access menu that stays visible while scrolling

### New Pages
1. **News** (`news.php`) - Festival newsletters with embedded PDFs
2. **About Us** (`about.php`) - Mission, vision, and festival information
3. **Community** (`community.php`) - STEM values with interactive cards

### Updated Pages
1. **Homepage** (`index.php`) - New slideshow and gallery layout
2. **Projects** (`projects.php`) - Modern card-based presentation layout

## Usage

### For Teachers
1. Login with teacher credentials
2. Click "Upload Project" to add new science projects
3. Upload Markdown files or type content directly
4. Manage your projects (edit/delete)

### For Students/Users
1. Register for a new account or login
2. Browse projects by year or popularity
3. Vote for projects you find interesting
4. View detailed project content and leave comments

### For Admins
- All teacher permissions
- Manage all projects (edit/delete any project)
- User management capabilities

## Documentation

- **README.md** - This file, overview and quick start guide
- **FRONTEND_INTEGRATION.md** - Detailed frontend integration documentation
- **DEVELOPER_GUIDE.md** - Guide for developers and students

## Technology Stack

- **Backend**: PHP 7.4+ with SQLite 3
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **CSS Framework**: Bootstrap 5 + Custom Frontend CSS
- **Icons**: Font Awesome 6
- **Markdown**: Parsedown for project content

## Security Features

- Password hashing using PHP's `password_hash()`
- SQL injection prevention with prepared statements (PDO)
- Session-based authentication
- Role-based access control (Student, Teacher, Admin)
- Input validation and sanitization
- CSRF protection on forms

## Customization

### Styling
- Modify `assets/css/frontend.css` for frontend design changes
- Modify `assets/css/style.css` for backend/admin styling
- Colors, fonts, and spacing can be adjusted via CSS variables

### Database
- Default: SQLite (zero configuration)
- Alternative: Update `config/database.php` for MySQL/PostgreSQL

### Content
- Replace images in `assets/images/` with your own
- Add PDFs to `assets/pdfs/` and update `news.php`
- Modify static page content in `about.php`, `community.php`, etc.

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## License

MIT License - see LICENSE file for details

## Credits

**Nikola Tesla Science Fair Festival** - Paradis College

Frontend design and backend integration completed for the 2025 festival season.

## Support

For questions, issues, or contributions:
- Review `DEVELOPER_GUIDE.md` for development help
- Check `FRONTEND_INTEGRATION.md` for integration details
- Contact festival organizers for content updates
