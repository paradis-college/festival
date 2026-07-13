# Media and Carousel Stabilization

Branch: `fix/media-and-carousel`

## Scope

- Stabilize the homepage carousel and prevent blank/black states.
- Add graceful handling for missing or failed images.
- Pause automatic rotation while the page is hidden and resume cleanly.
- Add a homepage festival-video component that supports a local MP4/WebM source with a fallback link.
- Preserve the existing YouTube project-embed workflow.
- Test keyboard controls, reduced-motion behavior, mobile sizing, and 60-second autoplay.

## Video asset

The source file is currently stored in Google Drive as:

`Festivalul Științelor Nikola Tesla 2025 video final.mov`

Target web outputs:

- `festival-2025-1080p.mp4` — H.264/AAC, fast-start
- optional `festival-2025-720p.mp4` — smaller mobile fallback
- poster image extracted from the video

The video itself should not be committed until it is compressed and checked against the hosting/repository size limits.

## Facebook references queued for the content branch

- https://www.facebook.com/story.php?story_fbid=1502086351717378&id=100057480818600
- https://www.facebook.com/scoala.paradis/videos/4451248218496583/
- https://www.facebook.com/story.php?story_fbid=1485784686680878&id=100057480818600
- https://www.facebook.com/story.php?story_fbid=1485668166692530&id=100057480818600
- https://www.facebook.com/share/p/1AfoN43jca/
- https://www.facebook.com/share/v/1EPzt1poYo/
- https://www.facebook.com/share/p/18bm2z8ooj/
- https://www.facebook.com/share/p/188QFMBdAk/
