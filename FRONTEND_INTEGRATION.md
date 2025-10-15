# Frontend Integration Documentation

This document describes the integration of the new frontend design into the Nikola Tesla Festival PHP application.

## Overview

The frontend from the `frontend/` folder has been integrated into the existing PHP application. The integration preserves all backend functionality (projects, voting, comments, authentication) while applying the new frontend design and layout.

## Changes Made

### 1. Assets Structure
- **CSS**: Frontend styles copied to `assets/css/frontend.css`
- **JavaScript**: Frontend scripts copied to `assets/js/frontend.js`
- **Images**: All images moved to `assets/images/`
- **PDFs**: Newsletter PDFs moved to `assets/pdfs/`

### 2. Static Pages Created
- **news.php** - Displays newsletters and festival news with PDF viewer
- **about.php** - About Us page with mission, vision, and festival information
- **community.php** - STEM Values page with interactive cards

### 3. Pages Updated

#### Homepage (`index.php`)
- Added slideshow with 5 featured slides linking to main sections
- Added hero section with call-to-action buttons
- Added responsive image gallery (4 columns)
- Integrated lightbox for image viewing
- Preserved backend project functionality (kept for future use)

#### Projects Page (`projects.php`)
- Updated to use new presentation card layout (`pres-card`)
- Maintained filtering by year
- Maintained sorting (by votes, date, title)
- Projects display with title, description, year, vote count, and author
- Dynamic project cards link to detail pages

#### Header (`includes/header.php`)
- Added frontend sticky navbar with all navigation links
- Integrated site header with logo and tagline
- Included both frontend.css and existing style.css
- Preserved PHP authentication (login/logout/register links)
- Added frontend JavaScript

### 4. Navigation Structure
The new navigation includes:
- **Home** - Homepage with slideshow and gallery
- **News** - Festival newsletters and updates
- **Projects** - All student projects
- **About Us** - Mission and vision
- **Community** - STEM values and philosophy
- **Login/Register** - User authentication (when not logged in)
- **Upload Project** - For teachers/admins only
- **Logout** - For logged-in users

## Asset Locations

### CSS Files
- `assets/css/style.css` - Original Bootstrap-based styles (preserved)
- `assets/css/frontend.css` - New frontend styles

### JavaScript Files
- `assets/js/script.js` - Original JavaScript (preserved)
- `assets/js/frontend.js` - Frontend slideshow, lightbox, PDF viewer

### Images
All images are in `assets/images/`:
- Festival photos (IMG_*.jpg, PHOTO-*.jpg)
- Logo: `download paradis college.png`
- Background images for various sections

### PDFs
Newsletter PDFs in `assets/pdfs/`:
- Newsletter- DAY 1.pdf
- Newsletter- DAY 2.pdf
- Newsletter- DAY 3.pdf
- Newsletter- DAY 4.pdf
- MyHome.pdf

## Backend Features Preserved

All existing backend functionality remains intact:
- **Authentication**: Login, register, logout, role-based access
- **Projects**: Upload, view, edit, delete (for authorized users)
- **Voting**: Users can vote on projects, vote counts tracked
- **Comments**: Users can comment on projects
- **Database**: SQLite database with all original tables

## Styling Approach

The integration uses a layered approach:
1. Bootstrap 5 for base components and grid system
2. Font Awesome for icons
3. Original `style.css` for backend-specific styling
4. `frontend.css` for new frontend design elements

Both stylesheets are loaded to ensure compatibility, with frontend styles taking precedence for pages using the new design.

## Pages Using New Frontend Design

- ✅ `index.php` - Homepage
- ✅ `news.php` - News/Newsletters
- ✅ `about.php` - About Us
- ✅ `community.php` - STEM Values
- ✅ `projects.php` - All Projects listing
- ⚠️ `project.php` - Detail page (uses original styling with new header)
- ⚠️ `login.php` - Login (uses original styling with new header)
- ⚠️ `register.php` - Register (uses original styling with new header)
- ⚠️ `upload.php` - Upload project (uses original styling with new header)

## Testing Checklist

- [x] Homepage loads with slideshow
- [x] Image gallery works with lightbox
- [x] Navigation links work correctly
- [x] Static pages (news, about, community) render properly
- [ ] Projects page shows actual projects
- [ ] Project detail pages work
- [ ] Voting functionality works
- [ ] Comments functionality works
- [ ] Authentication (login/register/logout) works
- [ ] File upload works for teachers
- [ ] PDF viewer works on news page
- [ ] Responsive design on mobile devices

## Future Enhancements

1. **Project Detail Page**: Update `project.php` to use frontend card-based layout
2. **Login/Register Pages**: Apply frontend styling to authentication forms
3. **Upload Page**: Modernize the project upload interface
4. **Search Functionality**: Implement the search box in the navbar
5. **Mobile Optimization**: Further optimize for mobile devices
6. **Accessibility**: Add ARIA labels and improve keyboard navigation

## Deployment Notes

1. Ensure PHP 7.4+ is installed
2. SQLite extension must be enabled
3. `uploads/` directory must be writable
4. All asset paths are relative to the root directory
5. No additional configuration needed - works out of the box

## Troubleshooting

### Images not displaying
- Check that images are in `assets/images/`
- Verify image paths use relative URLs from root

### Styles not applying
- Clear browser cache
- Check both CSS files are loaded in header
- Verify CSS paths in `assets/css/`

### PDFs not loading in news page
- Check PDFs are in `assets/pdfs/`
- Verify browser supports PDF embedding
- Try downloading PDF if embed fails

### Slideshow not working
- Ensure `assets/js/frontend.js` is loaded
- Check browser console for JavaScript errors
- Verify jQuery is not conflicting

## Credits

- **Original Frontend Design**: Created for Nikola Tesla Festival - Paradis College
- **Integration**: Merged frontend design with existing PHP application
- **Backend**: Festival project management system

---

For questions or issues, refer to the main README.md or DEVELOPER_GUIDE.md.
