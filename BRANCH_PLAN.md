# Media and Carousel Stabilization

## Implemented

- Reworked slideshow state management so one valid slide always remains visible.
- Added image-load fallbacks instead of leaving an empty or black frame.
- Paused autoplay while the browser tab is hidden, while the carousel is hovered or focused, and while the festival video is playing.
- Added accessible carousel controls, slide state attributes and descriptive image text.
- Corrected the gallery lightbox selectors and keyboard behavior.
- Added a conditional local-video section titled **Our Festival in a Few Minutes**.
- Added responsive styling for local video, fallback states and reduced-motion preferences.
- Retained YouTube URL validation for uploaded student projects.

## Expected media paths

```text
assets/videos/festival-2025.mp4
assets/images/festival-video-poster.jpg
```

The homepage checks whether these files exist. Until the MP4 is uploaded, it shows a temporary source-folder link rather than a broken video player.

## Local video requirements

- Container: MP4
- Video: H.264
- Audio: AAC
- Pixel format: yuv420p
- Web optimization: `-movflags +faststart`

## Still to verify

- Test the compressed MP4 after upload.
- Confirm playback in Chrome, Edge, Firefox, Safari and a mobile browser.
- Run the carousel for at least two full cycles with the final production images.
- Rebase or merge the latest `main` before final review if `main` changes during implementation.
