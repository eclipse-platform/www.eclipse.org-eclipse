# Eclipse Project New & Noteworthy (N&N)

## Project Overview
This repository contains the public-facing website content for the Eclipse Platform, SWT, JDT, PDE, and Equinox projects, hosted at [eclipse.org/eclipse](https://www.eclipse.org/eclipse/). 
It primarily serves as the home for **New & Noteworthy (N&N)** documentation for each Eclipse release.

The website is a **static site with dynamic client-side rendering**. It uses `project.js` to parse custom HTML attributes and render Markdown content into the common Eclipse website template.

## Key Technologies
- **Languages:** HTML, CSS, JavaScript, Markdown, Bash
- **Rendering:** Custom JavaScript (`project.js`) for template injection and Markdown rendering.
- **Automation:** Bash and Perl scripts for release management and validation.
- **CI/CD:** GitHub Actions for contributor acknowledgement management.

## Project Structure
- `news/`: **Main content area.** Contains release-specific folders (e.g., `4.37/`, `4.38/`).
  - `<version>/index.md`: Release overview.
  - `<version>/{platform,jdt,pde,platform_isv}.md`: Component-specific N&N entries.
  - `<version>/images/`: Screenshots (PNG only).
  - `4.x-template/`: Template used to initialize new release folders.
  - `scripts/`: Automation for release initialization (`applyTemplate.sh`) and validation.
- `project.js`: Core logic for dynamic rendering and template consistency.
- `development/`: Historical plans, release notes, and acknowledgements.
- `swt/`: SWT-specific documentation and community pages.
- `templates/`: HTML templates for page generation.

## Workflows

### 1. New & Noteworthy (N&N) Authoring
N&N entries are authored in **Markdown** (CommonMark or GFM).
- **Location:** `news/<version>/<component>.md`.
- **Images:** PNG format only, stored in `news/<version>/images/`.
- **Template:** Each entry follows a specific structure:
  ```markdown
  ### Feature Title in Title Case
  <details><summary>Contributors</summary>
  - [Name](https://github.com/username)
  </details>
  Feature description using active voice ("you").
  ![Alt text](images/feature-image.png)
  ```

### 2. Creating a New Release Folder
To initialize the folder for a new release (e.g., 4.40):
```bash
cd news/scripts
./applyTemplate.sh 4.40 2025-12
```
This script copies `4.x-template` and replaces placeholders.

### 3. Local Preview
Since the site is static with JS rendering, any HTTP server works:
- **Eclipse IDE:** Run `Eclipse-website-local-server` launch configuration.
- **Command Line:** Use any static server, e.g., `npx serve .` or `python3 -m http.server`.
- **Important:** Refresh with `Ctrl+F5` to see changes to `project.js` or CSS.

## Development Conventions
- **N&N Style:** 
  - Titles: **Title Case**, no trailing punctuation.
  - Body: Complete sentences, active voice ("you", not "the user").
  - UI Elements: Use `backticks` for commands, shortcuts, and preference paths (e.g., `Preferences > General > Keys`).
  - Emphasis: Prefer **bold** over *italics*.
- **Images:** 
  - All lowercase, hyphen-separated names (e.g., `new-feature.png`).
  - PNG format only.
- **Acknowledgements:** Do not manually edit `acknowledgements.md` unless fixing errors; it is managed by GitHub Actions.

## Key Files
- `README.md`: Basic project intro.
- `news/instructions.md`: **Crucial** detailed guide for N&N contributors.
- `project.js`: The heart of the site's dynamic rendering.
- `AGENTS.md`: Technical instructions for AI agentss
