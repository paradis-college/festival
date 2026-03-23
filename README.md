# Science Festival Website

A comprehensive PHP-based website for showcasing science projects from the Nikola Tesla Science Fair Festival at Paradis College, featuring modern responsive design, YouTube video embedding, and interactive project management.

## Features

- **Modern Frontend Design**: Responsive design with slideshow, image gallery, and interactive elements
- **Project Management**: Browse, search, upload, and vote on science projects
- **YouTube Integration**: Embed YouTube videos directly in project pages with enhanced validation
- **User Authentication**: Role-based login system for teachers, students, and admins
- **Voting System**: Interactive voting with ripple effects and real-time feedback
- **Comments System**: Engage with projects through comments with quick-select options
- **PDF Viewer**: View festival newsletters and magazines with modal viewer
- **Static Pages**: News/newsletters, About Us, and STEM Community values pages

## Quick Start

### Using PHP Built-in Server (Recommended for Development)

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

### Using Apache/Nginx (Production)

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

## Technology Stack

- **Backend**: PHP 7.4+ with SQLite 3 (default) or MySQL 5.7+
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **CSS Framework**: Bootstrap 5 + Custom Unified CSS
- **Icons**: Font Awesome 6
- **Markdown**: Parsedown for project content
- **Database**: SQLite (zero configuration) or MySQL/PostgreSQL

## Project Structure (Optimized)

```
festival/
├── assets/
│   ├── css/main.css         # Unified stylesheet (replaces style.css + frontend.css)
│   ├── js/main.js          # Unified JavaScript (replaces script.js + frontend.js)
│   ├── images/             # Festival photos and images
│   └── pdfs/               # Newsletter PDFs
├── config/
│   ├── database.php        # Database configuration
│   └── init.sql           # Database schema
├── includes/
│   ├── functions.php      # Core PHP functions
│   ├── header.php        # Common header with navigation
│   └── footer.php        # Common footer
├── uploads/               # User-uploaded project files
├── Core Pages:
│   ├── index.php         # Homepage with slideshow and gallery
│   ├── projects.php      # All projects listing with filtering
│   ├── project.php       # Individual project detail view
│   ├── upload.php        # Project upload (teachers only)
│   ├── edit.php          # Edit project
│   ├── news.php          # News and newsletters
│   ├── about.php         # About Us page
│   ├── community.php     # STEM Community values
│   ├── login.php         # User login
│   ├── register.php      # User registration
│   └── actions.php       # Unified action handler (vote/comment/delete/logout)
└── Documentation:
    └── YOUTUBE_EMBEDDING_GUIDE.md  # YouTube integration guide
```

## Usage Guide

### For Teachers
1. Login with teacher credentials
2. Click "Upload Project" to add new science projects
3. Upload Markdown files or type content directly
4. **NEW**: Add YouTube video URLs for enhanced presentations
5. Manage your projects (edit/delete)

### For Students/Users
1. Register for a new account or login
2. Browse projects by year or popularity
3. Vote for projects you find interesting
4. View detailed project content with embedded videos
5. Leave comments and engage with other students

### For Admins
- All teacher permissions
- Manage all projects (edit/delete any project)
- User management capabilities

## YouTube Video Embedding

### Supported URL Formats
The system supports all major YouTube URL formats:
- **Standard**: `https://www.youtube.com/watch?v=dQw4w9WgXcQ`
- **Short link**: `https://youtu.be/dQw4w9WgXcQ`
- **Embed**: `https://www.youtube.com/embed/dQw4w9WgXcQ`
- **Shorts**: `https://www.youtube.com/shorts/dQw4w9WgXcQ`
- **Mobile**: `https://m.youtube.com/watch?v=dQw4w9WgXcQ`
- **Live**: `https://www.youtube.com/live/dQw4w9WgXcQ`

### Features
- **Real-time validation** with visual feedback
- **Thumbnail preview** during upload/edit
- **Enhanced accessibility** with proper ARIA labels
- **Responsive embedding** with 16:9 aspect ratio
- **Error handling** for invalid URLs

## Security Features

- Password hashing using PHP's `password_hash()`
- SQL injection prevention with prepared statements (PDO)
- Session-based authentication
- Role-based access control (Student, Teacher, Admin)
- Input validation and sanitization
- XSS protection on all user inputs
- YouTube URL validation for video embedding

## Performance Optimizations

The codebase has been optimized for performance:
- **Reduced HTTP requests**: Single CSS and JS files instead of multiple
- **Lazy loading**: YouTube iframes load on demand
- **Optimized queries**: Prepared statements with proper indexing
- **Responsive images**: CSS handles different screen sizes
- **File consolidation**: Reduced from 27 files to 18 files (33% reduction)

## File Count Reduction

**Before Optimization**: 27 files
**After Optimization**: 18 files (-33%)

**Consolidated Files**:
- `style.css` + `frontend.css` → `main.css`
- `script.js` + `frontend.js` → `main.js`
- `vote.php` + `comment.php` + `delete.php` + `logout.php` → `actions.php`
- Multiple documentation files → Unified README

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## License

MIT License - see LICENSE file for details

## Credits

**Nikola Tesla Science Fair Festival** - Paradis College

Frontend design and backend integration completed for the 2025 festival season with optimized file structure and enhanced YouTube integration.

## Support

For questions, issues, or contributions:
- Review this documentation for development help
- Contact festival organizers for content updates
- Check the YouTube embedding guide for video-related questions
