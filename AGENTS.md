# Agent Instructions for www.eclipse.org-eclipse

## Repository Overview

This is the **Eclipse Project Website and New & Noteworthy (N&N) Repository**. It contains the public-facing website content for the Eclipse Platform, SWT, JDT, PDE, and Equinox projects, hosted at https://www.eclipse.org/eclipse/.

**Repository Statistics:**
- Size: ~318MB, 3,856 files, 352 directories
- Primary Content: 475 HTML files, 32 Markdown files, 8 shell/Perl scripts
- Languages: Markdown, HTML, JavaScript, CSS, PHP, Bash, Perl
- No build tools required (static website with dynamic JS rendering)

**GitHub Repository:** https://github.com/eclipse-platform/www.eclipse.org-eclipse

## Critical: Trust These Instructions

**Always trust and follow these instructions first.** Only search the codebase if information here is incomplete or appears incorrect. The instructions below have been validated and will save significant exploration time.

## Repository Structure

### Root Directory Files
- `README.md` - Basic repository overview and contribution instructions
- `index.html` - Main Eclipse project landing page
- `project.js` - JavaScript for dynamic page generation and markdown rendering
- `project.css`, `default_style.css` - Styling for the website
- `eclipse.svg` - Eclipse logo
- `Eclipse-website-local-server.launch` - Eclipse launch configuration for local preview

### Key Directories

**`news/`** - New and Noteworthy content (MOST IMPORTANT for contributions)
- `news/4.x-template/` - Template for new releases (DO NOT modify directly)
- `news/4.36/`, `news/4.37/`, `news/4.38/`, `news/4.39/` - Release-specific N&N content
- `news/instructions.md` - Detailed authoring guidelines for N&N entries
- `news/scripts/` - Automation scripts for N&N management

Each release folder (e.g., `news/4.37/`) contains:
- `index.md` - Overview with links to component pages
- `platform.md` - Platform and Equinox news
- `jdt.md` - Java Development Tools news
- `pde.md` - Plug-in Development Environment news
- `platform_isv.md` - New APIs for Platform/SWT/Equinox
- `acknowledgements.md` - Contributors list (auto-generated)
- `images/` - Screenshots and diagrams (PNG format)

**`development/`** - Historical plans, release notes, acknowledgements (20,480 files)
- Mostly legacy HTML/PHP files for older releases
- `development/scripts/readme/` - Scripts for generating README files

**`swt/`** - SWT (Standard Widget Toolkit) documentation
- FAQ, examples, tools, and community pages

**`templates/`** - HTML templates for page generation

**`markdown/`** - Markdown rendering infrastructure

**`.github/workflows/`** - CI/CD automation (see Validation section)

## Content Types and Workflows

### New & Noteworthy (N&N) Entries

**When to Edit:** Adding/modifying features for upcoming Eclipse releases

**Markdown Flavors Supported:**
- Markdown 1.0
- CommonMark 0.31
- GitHub Flavored Markdown 0.29

**File Locations:**
- Edit files in `news/<version>/` where `<version>` is like `4.37`, `4.38`, etc.
- **Never edit** `news/4.x-template/` except to update the template itself

**N&N Entry Structure (Template):**
```markdown
### Feature Title in Title Case
<!-- Optional link(s) to issues or PRs as invisible comment -->
<details>
<summary>Contributors</summary>

- [Contributor Name](https://github.com/username)
</details>

Feature description goes here.
Use active voice ("you" not "the user").
Use backticks for commands: `Quick Fix`, `Ctrl+1`, `Preferences > General > Keys`.

![Descriptive label](images/feature-image.png)
```

**Image Requirements:**
- Format: PNG only
- Location: `news/<version>/images/`
- Naming: lowercase, hyphen-separated (e.g., `terminal-console.png`)
- Size: Crop to focus on feature, avoid excessive size
- Alt text: Add meaningful description

**Style Guidelines:**
- Titles: Title Case, no trailing punctuation
- Descriptions: Complete sentences with punctuation
- Voice: Active voice, say "you" not "the user"
- Emphasis: Use `backticks` for UI elements/commands; prefer **bold** over _italics_
- Line breaks: Start each sentence on new line for easier editing

### Scripts and Automation

**Location:** `news/scripts/`

**1. applyTemplate.sh** - Initialize new release folder
```bash
cd news/scripts
./applyTemplate.sh 4.40 2025-12
```
- Creates `news/4.40/` from template
- Replaces `4.x` with `4.40` and `YYYY-MM` with `2025-12`
- **Exits with error if directory already exists**

**2. Validation Scripts** (Legacy - for HTML files)
- `w3cValidateHtmlFile.sh <file>` - Validates single HTML file via W3C service
- `validateHtmlNewsRepo.sh <news-dir>` - Validates all N&N HTML files
- `validateHtmlDocBundle.sh <doc-repo-path>` - Validates doc bundle HTML

**Note:** Current N&N uses Markdown (not HTML), so HTML validation scripts are for legacy content only.

**3. Perl Scripts** (Legacy - for copying to doc bundles)
- `copyNewsToDocBundle.pl` - Copies HTML news to eclipse.platform.common bundles
- `parseHtml.pl` - Extracts and copies images
- **Requires:** Perl with `HTML::TokeParser::Simple` module
- **Usage:** Only when syncing to separate documentation repositories

## GitHub Actions Workflows

**Location:** `.github/workflows/`

### 1. checkAcknowledgements.yml
- **Trigger:** Pull requests modifying `news/*/acknowledgements.md`
- **Purpose:** Validates contributor name consistency
- **Checks:** Each GitHub profile has only one name variant
- **Action:** Fails if multiple names found for same profile

### 2. generateAcknowledgements.yml
- **Trigger:** Manual workflow dispatch
- **Input:** Eclipse version (e.g., `4.36`)
- **Purpose:** Auto-generates contributor lists from git history
- **Process:**
  1. Queries all Eclipse TLP repositories
  2. Collects commits between release tags
  3. Excludes bot accounts
  4. Creates/updates `acknowledgements.md`
  5. Opens PR with results
- **Note:** Reuses existing names from acknowledgements file when available

### 3. updateRelease.yml
- **Trigger:** New milestone created with "Release" in description
- **Purpose:** Automatically prepares new release folder
- **Process:**
  1. Runs `applyTemplate.sh` with milestone title and date
  2. Creates PR for review
- **Example:** Milestone "4.40" due "2025-12-15" → creates `news/4.40/`

## Validation and Testing

**No traditional build or test suite exists.** This is a static website repository with client-side JavaScript rendering.

### Pre-Commit Validation Steps

1. **Markdown Syntax:** Ensure valid Markdown (all flavors supported)
2. **Image References:** Verify all `![...](images/...)` paths exist
3. **Contributor Links:** Validate GitHub profile URLs format: `https://github.com/username`
4. **Backticks for UI:** Use backticks for commands, shortcuts, preference paths

### Local Preview

Use the Eclipse launch configuration:
1. Open in Eclipse IDE
2. Run: `Run Configurations > Eclipse Applications > Eclipse-website-local-server`
3. Requires: Eclipse with Oomph HTTPServer support, Java 21
4. Opens browser to `localhost` serving website content
5. Refresh browser (Ctrl+F5) after changes

**Alternative (without Eclipse):**
- Any HTTP server serving static files works
- JavaScript in `project.js` handles markdown rendering dynamically
- No build step required

### CI Validation

Pull requests trigger:
- `checkAcknowledgements.yml` if modifying acknowledgements
- No other automated checks currently run on PRs

## Common Tasks and Commands

### Creating New Release Folder
```bash
cd news/scripts
./applyTemplate.sh 4.40 2025-12
# Creates news/4.40/ with all template files
# Replaces placeholders automatically
```

### Adding N&N Entry

1. Navigate to appropriate file:
   - Platform/Equinox features → `news/<version>/platform.md`
   - JDT features → `news/<version>/jdt.md`
   - PDE features → `news/<version>/pde.md`
   - New APIs → `news/<version>/platform_isv.md`

2. Add entry following template (see N&N Entry Structure above)

3. Add images to `news/<version>/images/` if needed

4. Uncomment section headers if adding to new section

### Validating HTML Files (Legacy)
```bash
cd news/scripts
./w3cValidateHtmlFile.sh ../4.37/index.html
# Uses W3C validator web service
# Requires curl and internet connection
```

### Checking Repository Status
```bash
git status
git diff
# Always check changes before committing
```

## File Type Reference

**Markdown Files (`.md`):**
- Current format for N&N entries (as of 4.36+)
- Rendered dynamically by `project.js`

**HTML Files (`.html`):**
- Legacy N&N entries (pre-4.36)
- Static website pages
- Generated acknowledgements (some versions)

**JavaScript (`.js`):**
- `project.js` - Core website functionality, markdown rendering

**CSS (`.css`):**
- `project.css`, `default_style.css` - Website styling

**Shell Scripts (`.sh`):**
- Automation for release management and validation

**Perl Scripts (`.pl`):**
- Legacy HTML content processing

## Environment Setup

**Required Tools:**
- Git (for version control)
- Text editor (for Markdown/HTML editing)
- Web browser (for preview)

**Optional Tools:**
- Eclipse IDE with Oomph HTTPServer (for launch configuration)
- Java 21 (for Eclipse launch)
- curl (for HTML validation scripts)
- Perl with HTML::TokeParser::Simple (for legacy doc bundle sync)

**No installation/build commands needed** - this is a static content repository.

## Important Constraints

### What NOT to Do

1. **DO NOT modify `news/4.x-template/`** unless updating template itself
2. **DO NOT commit large images** - optimize PNGs before adding
3. **DO NOT use absolute paths** - keep relative paths (e.g., `images/file.png`)
4. **DO NOT add HTML to new N&N entries** - use Markdown (except inline HTML if absolutely necessary)
5. **DO NOT manually edit `acknowledgements.md`** - auto-generated via workflow (except fixing errors)
6. **DO NOT link to GitHub issues in N&N entries** - guidelines prohibit external links

### Section Commenting

Many sections in template files are commented out:
```markdown
<!--
---
## Section Name
-->
```
**When adding first entry to section:** Remove the `<!-- -->` comment markers surrounding the section header.

## Troubleshooting

### applyTemplate.sh fails with "Directory exists"
- **Cause:** Release folder already created
- **Solution:** Choose different version number or manually modify existing folder

### Images not displaying in preview
- **Check:** Image file exists in `news/<version>/images/`
- **Check:** Filename matches exactly (case-sensitive)
- **Check:** Relative path is correct: `images/filename.png`

### Acknowledgements validation fails
- **Cause:** Same GitHub profile has different name variants
- **Solution:** Edit `acknowledgements.md` to use single consistent name

### HTML validation errors (legacy)
- **Check:** W3C validator service is accessible
- **Note:** Only relevant for old HTML files, not current Markdown content

## Key References

- **N&N Instructions:** `news/instructions.md` (comprehensive authoring guide)
- **Script Instructions:** `news/scripts/instructions.txt` (detailed script usage)
- **Contributing Guide:** https://github.com/eclipse-platform/.github/blob/main/CONTRIBUTING.md
- **Eclipse Website:** https://www.eclipse.org/eclipse/
- **Published N&N:** https://www.eclipse.org/eclipse/news/

## Summary for Quick Reference

**Repository Purpose:** Eclipse project website and New & Noteworthy documentation

**Most Common Edits:** Adding entries to `news/<version>/*.md` files

**No Build Required:** Static website with JavaScript rendering

**Validation:** Manual review + automated acknowledgements checking

**Preview:** Use Eclipse launch config or any HTTP server

**Key Principle:** Follow N&N template exactly, use Markdown, optimize images, test locally before PR
