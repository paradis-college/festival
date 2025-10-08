# International Science Festival - Developer Guide for Students

## Welcome! 🎓

This guide will help you understand the code structure of the International Science Festival website. The code is organized to be easy to read and modify.

## Color Scheme 🎨

The website uses a **green and blue** color palette representing an international college:

- **Primary Green**: `#28a745` - Used for main buttons and accents
- **Secondary Blue**: `#17a2b8` - Used for complementary elements
- **Dark Green**: `#1e7e34` - Used for headers and footer
- **Light Background**: `#f0f7f4` - Soft green tint for page background

## File Structure 📁

```
festival/
├── index.php              # Homepage - shows featured projects
├── projects.php           # All projects page - with filtering
├── project.php            # Single project view - with comments
├── login.php             # Login page
├── register.php          # Registration page
├── upload.php            # Upload new project (teachers only)
├── comment.php           # Handles comment submissions
├── vote.php              # Handles voting
├── includes/
│   ├── header.php        # Top navigation and page setup
│   ├── footer.php        # Bottom footer
│   └── functions.php     # Core PHP functions
├── assets/
│   ├── css/
│   │   └── style.css     # ALL STYLING - modify colors here!
│   └── js/
│       └── script.js     # JavaScript for interactions
└── config/
    ├── database.php      # Database connection
    └── init.sql          # Database structure
```

## How to Change Colors 🖌️

Open `assets/css/style.css` and look for these sections:

### 1. Navigation Bar Colors
```css
.navbar-dark.bg-primary {
    background: linear-gradient(90deg, #28a745 0%, #17a2b8 100%) !important;
}
```
Change `#28a745` (green) and `#17a2b8` (blue) to your preferred colors.

### 2. Hero Section (Top Banner)
```css
.hero-section {
    background: linear-gradient(135deg, #28a745 0%, #1e7e34 50%, #17a2b8 100%);
}
```

### 3. Buttons
```css
.btn-primary {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}
```

### 4. Project Cards Border
```css
.project-card {
    border-left: 4px solid #28a745;
}
```

## Key Features Explained 🔑

### 1. **Homepage** (`index.php`)
- Shows statistics (total projects, years, votes)
- Displays 6 featured projects
- Has a year filter dropdown
- All projects link to their detail page

### 2. **Projects Page** (`projects.php`)
- Shows ALL projects
- Filter by year
- Sort by: votes, date, or title
- Each project card shows: title, author, description, vote count

### 3. **Project Detail Page** (`project.php`)
- Full project content
- Voting button
- Comments section with pre-written positive comments
- Quick comment buttons - click to auto-fill
- Related projects sidebar

### 4. **Comments System** (NEW!)
Pre-written positive comments make it easy to leave feedback:
- "Excellent work! Very innovative approach."
- "This is a fantastic project! Well done!"
- "Amazing research and presentation!"
- And 12 more options!

## HTML Structure Tips 💡

### Cards Pattern
Every project uses this structure:
```html
<div class="card project-card">
    <div class="card-body">
        <!-- Top: Year badge and votes -->
        <div class="d-flex justify-content-between">
            <span class="badge bg-success">2024</span>
            <div class="vote-display">❤️ 42</div>
        </div>
        
        <!-- Title -->
        <h5 class="card-title">Project Name</h5>
        
        <!-- Author -->
        <p class="text-muted">by Author Name</p>
        
        <!-- Description -->
        <p>Short description...</p>
        
        <!-- Buttons -->
        <a class="btn btn-outline-success">Read More</a>
        <button class="btn vote-btn">Vote</button>
    </div>
</div>
```

### Forms Pattern
All forms follow this structure:
```html
<form method="POST">
    <div class="mb-3">
        <label for="fieldname" class="form-label">
            <i class="fas fa-icon"></i>Field Name
        </label>
        <input type="text" class="form-control" 
               id="fieldname" name="fieldname" 
               placeholder="Help text" required>
    </div>
    
    <button type="submit" class="btn btn-primary">
        Submit
    </button>
</form>
```

## Icons 🎯

We use Font Awesome icons. Add them like this:
```html
<i class="fas fa-home"></i>      <!-- Home icon -->
<i class="fas fa-heart"></i>     <!-- Heart icon -->
<i class="fas fa-user"></i>      <!-- User icon -->
<i class="fas fa-graduation-cap"></i> <!-- Graduation cap -->
```

Find more icons at: https://fontawesome.com/icons

## Bootstrap Classes We Use 📚

- `container` - Centers content with margins
- `row` - Creates a row for grid layout
- `col-md-6` - Takes half width on medium+ screens
- `mb-3` - Adds margin bottom (spacing)
- `btn btn-primary` - Primary styled button
- `card` - Card container for content
- `text-muted` - Gray text color
- `d-flex` - Flexbox container
- `justify-content-between` - Spaces items apart

## Common Tasks 🛠️

### Add a New Navigation Link
Edit `includes/header.php`:
```html
<li class="nav-item">
    <a class="nav-link" href="newpage.php">
        <i class="fas fa-icon me-1"></i>New Page
    </a>
</li>
```

### Change Site Name
Edit `includes/header.php`:
```html
<a class="navbar-brand" href="index.php">
    <i class="fas fa-graduation-cap me-2"></i>YOUR NEW NAME
</a>
```

### Add More Pre-written Comments
Edit `includes/functions.php`, find `getPrewrittenComments()` function:
```php
return [
    "Excellent work! Very innovative approach.",
    "YOUR NEW COMMENT HERE",
    // Add more...
];
```

### Change Footer Text
Edit `includes/footer.php`:
```html
<p class="mb-1">YOUR FOOTER TEXT</p>
```

## Testing Your Changes ✅

1. Save your file
2. Refresh the browser (F5 or Ctrl+R)
3. Check if it looks good on mobile (right-click → Inspect → Toggle device toolbar)
4. Test all buttons and links

## Need Help? 🆘

- **CSS not working?** Clear browser cache (Ctrl+Shift+Delete)
- **Page blank?** Check for PHP errors in console
- **Styling broken?** Make sure you didn't remove any closing braces `}`
- **Database issues?** Check `config/database.php` settings

## Best Practices 👍

1. **Always test on mobile** - Many users will access on phones
2. **Keep colors consistent** - Use the defined green/blue palette
3. **Add comments to your code** - Help others understand
4. **Save backups** - Before making big changes
5. **Small changes first** - Test one thing at a time

## Quick Reference 📝

### Main Color Variables
- Green: `#28a745`
- Blue: `#17a2b8`
- Dark Green: `#1e7e34`
- Light Green: `#20c997`

### Important Files to Edit
- Colors & Styling: `assets/css/style.css`
- Top Navigation: `includes/header.php`
- Footer: `includes/footer.php`
- Pre-written Comments: `includes/functions.php`

---

**Remember:** The code is well-commented to help you learn. Don't be afraid to experiment! You can always undo changes in Git.

Happy coding! 🚀
