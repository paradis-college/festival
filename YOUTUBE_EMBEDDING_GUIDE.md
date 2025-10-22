# YouTube Video Embedding Feature

## Overview
This feature allows users to embed YouTube videos directly into their project pages by simply providing a YouTube URL.

## How to Use

### For Teachers/Students Creating Projects

#### When Uploading a New Project:
1. Log in to your account
2. Click "Upload Project" in the navigation menu
3. Fill in the project details (title, description, year, content)
4. **NEW**: In the "Media URL (YouTube Video)" field, paste any YouTube video URL
5. Click "Upload Project"

#### When Editing an Existing Project:
1. Navigate to your project page
2. Click "Edit Project"
3. **NEW**: Add or update the YouTube URL in the "Media URL (YouTube Video)" field
4. Click "Save Changes"

### Supported YouTube URL Formats
All common YouTube URL formats are supported:
- **Standard**: `https://www.youtube.com/watch?v=dQw4w9WgXcQ`
- **Short link**: `https://youtu.be/dQw4w9WgXcQ`
- **Embed**: `https://www.youtube.com/embed/dQw4w9WgXcQ`
- **With timestamp**: `https://www.youtube.com/watch?v=dQw4w9WgXcQ&t=30s`

Simply copy the URL from your browser's address bar while watching the YouTube video.

### Viewing Embedded Videos

When viewing a project with an embedded video:
- The video will appear at the top of the project content
- The video player is responsive and works on all devices
- Videos maintain a 16:9 aspect ratio
- Standard YouTube player controls are available (play, pause, volume, fullscreen)

## Examples

### Example 1: Science Experiment Demonstration
```
Title: Chemical Reactions in Action
Media URL: https://www.youtube.com/watch?v=abc123def45
```

### Example 2: Project Presentation
```
Title: Solar Panel Efficiency Study
Media URL: https://youtu.be/xyz789ghi01
```

## Technical Notes

### Database Structure
- A new `media_url` TEXT column has been added to the `projects` table
- The field is optional (can be left empty)
- Existing projects are not affected

### Security
- All YouTube URLs are validated before embedding
- Only YouTube videos are allowed (other URLs are ignored)
- XSS protection is in place
- Invalid URLs are safely handled

### Backward Compatibility
- Projects created before this feature remain fully functional
- The media URL field is optional
- No data migration required for existing projects

## Troubleshooting

### Video Doesn't Appear
**Problem**: I added a YouTube URL but the video doesn't show up.

**Solutions**:
1. Check that you're using a valid YouTube URL (starts with `youtube.com` or `youtu.be`)
2. Ensure the video is not private or restricted
3. Try using a different URL format (e.g., the short `youtu.be` link)

### Video URL Field Not Showing
**Problem**: I don't see the Media URL field in the upload/edit form.

**Solutions**:
1. Ensure you're logged in as a teacher
2. Refresh the page
3. Check that you're on the latest version of the application

### Video Not Playing
**Problem**: The video player appears but won't play.

**Solutions**:
1. Check your internet connection
2. Try opening the YouTube link directly in a new tab to verify the video exists
3. Some videos may be region-restricted
4. Ensure JavaScript is enabled in your browser

## Best Practices

1. **Choose Relevant Videos**: Only embed videos that directly relate to your project
2. **Check Video Quality**: Ensure the video is high quality and clearly demonstrates your project
3. **Keep It Short**: Shorter videos (2-5 minutes) tend to have better engagement
4. **Add Context**: Use the project description to explain what viewers should look for in the video
5. **Test Before Submitting**: Always preview your project to ensure the video embeds correctly

## Privacy and Content Guidelines

- Only embed videos that you have permission to share
- Ensure video content is appropriate for an educational setting
- Do not embed copyrighted material without permission
- Videos should be relevant to your science project

## Future Enhancements

This feature currently supports YouTube only. Future updates may include:
- Vimeo support
- Google Drive video support
- Direct video file uploads
- Multiple videos per project
- Video playlists

## Support

For questions or issues:
1. Check this documentation first
2. Contact your teacher or festival organizer
3. Review the main README.md for general application help

---

**Last Updated**: October 2025
**Feature Version**: 1.0
