# Science Festival Website

A PHP-based website for showcasing science projects from the past 5 years with voting functionality.

## Features

- **Project Display**: Browse science projects from the last 5 years
- **User Authentication**: Login system for teachers and students
- **Project Upload**: Teachers can upload projects in Markdown format
- **Voting System**: Users can vote for their favorite projects
- **Responsive Design**: Modern Bootstrap-based UI
- **Role-based Access**: Different permissions for teachers, students, and admins

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd festival
   ```

2. **Database Setup**
   - Create a MySQL database named `festival_db`
   - Import the database schema and sample data:
   ```bash
   mysql -u root -p festival_db < config/init.sql
   ```

3. **Configure Database Connection**
   - Edit `config/database.php` to match your database credentials
   - Default settings:
     - Host: localhost
     - Database: festival_db
     - Username: root
     - Password: (empty)

4. **Set Permissions**
   ```bash
   chmod 755 uploads/
   ```

5. **Access the Website**
   - Place files in your web server document root
   - Access via web browser (e.g., `http://localhost/festival`)

## Demo Accounts

The system comes with pre-configured demo accounts:

- **Admin**: username `admin`, password `admin123`
- **Teacher**: username `teacher1`, password `admin123`
- **Student**: username `student1`, password `admin123`

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
4. View detailed project content

### For Admins
- All teacher permissions
- Manage all projects (edit/delete any project)
- User management capabilities

## File Structure

```
festival/
├── assets/
│   ├── css/style.css          # Custom styles
│   └── js/script.js           # JavaScript functionality
├── config/
│   ├── database.php           # Database configuration
│   └── init.sql              # Database initialization
├── includes/
│   ├── functions.php         # Core functions
│   ├── header.php           # Common header
│   └── footer.php           # Common footer
├── uploads/                  # File upload directory
├── index.php                # Homepage
├── login.php                # Login page
├── register.php             # Registration page
├── projects.php             # All projects listing
├── project.php              # Individual project view
├── upload.php               # Project upload (teachers only)
├── vote.php                 # Voting handler
├── edit.php                 # Edit project (authors/admins)
├── delete.php               # Delete project (authors/admins)
└── logout.php               # Logout handler
```

## Security Features

- Password hashing using PHP's `password_hash()`
- SQL injection prevention with prepared statements
- Session-based authentication
- Role-based access control
- Input validation and sanitization

## Customization

- Modify `assets/css/style.css` for styling changes
- Update `config/database.php` for different database settings
- Extend `includes/functions.php` for additional functionality

## License

MIT License - see LICENSE file for details
