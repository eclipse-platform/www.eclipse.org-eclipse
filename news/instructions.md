# Eclipse New and Noteworthy Authoring

Last revised 2025-06-01.

## Instructions

### Content Organization 	

As of 4.36, New and Noteworthy is authored in markdown.
The following markdown flavors are supported:
- `Markdown 1.0`
- [`Common Mark 0.31`](https://spec.commonmark.org/0.31.2/)
- [`GitHub Flavored Markdown 0.29`](https://github.github.com/gfm/)

See also [GitHub's writing documentation](https://docs.github.com/en/get-started/writing-on-github). 

#### Markdown Preview

A launch configuration is provided, named
`Run > Run Configurations > Eclipse Applications > Eclipse-website-local-server`
that you can run in order to serve the content of the Eclipse website project's contents via `localhost`.
It will open a page in your default browser where the first link is to the root of the Eclipse website.
This allows you to preview all the changes that you make to the website locally **before** you commit them.
Sometimes it's necessary to do a deep refresh,
e.g., `Ctrl-F5`.

#### Pages

The New and Noteworthy content is contained in 4 pages
and is grouped based on the component to which they belong.
The pages are `platform.md`,`jdt.md`, `platform_isv.md`, and `pde.md`.
The `platform_isv.md` page contains the entries for new APIs in Platform, SWT and Equinox.
The `index.md` page describes the release and contains links to the component news pages.

Add a new entry to the appropriate section in the corresponding markdown document.
General standard sections are initially commented out in the markdown template.
When adding an entry to a commented out section,
remove the comment markers `<-- -->` surrounding the section.

If required,
you can add a new section to the document to highlight a feature,
but best to add a subsection.
Keep an eye on the automatically-rendered Table of Contents.

#### Template

The following is a template describing the recommended basic structure of a N&N entry:
```
### A Noteworthy New Feature 
<!-- Optional link(s) to issues or PRs as invisible comment -->
<details>
<summary>Contributors</summary>

- [John Doe](https://github.com/ghost)
</details>

Describe the change here.
See the instructions in the paragraphs below regarding style recommendation and things to consider.
You can use all markdown features and, if required and supported, inline HTML.

An image can say more than a thousand words:

![Foo View](images/foo-view.png)
```

### News Item Title and Description

The whole entry should be a blurb pitched to the Eclipse end-user community,
not just to members of the Eclipse Platform development team

The title should be short and snappy,
written in title case.
The title should not use trailing punctuation.
As markdown,
the title defines the anchor,
which is generally the lowercase equivalent with all non-alphanumberic characters replaced by `-`.
Please test your links.

In the news description,
tell users about changes they'll see in the UI.
Tell component writers about changes they'll see at the client- and server-side APIs.
Try to generate some excitement,
save the boring details for the manual,
be short,
and don't repeat yourself.
The description should be complete sentences, with trailing punctuation.

Make the entry self-contained and mention API classes.
Do not link to issues and don't promote third-party products.

Use active voice, i.e., say "you", not "the user",
and follow other advice in [Eclipse Doc Style Guide](https://github.com/eclipse-platform/eclipse.platform/blob/master/docs/Eclipse_Doc_Style_Guide.md#topic-content).

Use `backtics`,
i.e., &#96;&#96;,
for command names `Quick Fix`,
keyboard shortcuts `Ctrl+1`,
and preference page paths `Preferences > General > Keys`,
Avoid other emphasis markup,
but prefer **bold** over _emphasis_ if you must use one.

To ease editing, start each sentence a new line and break long sentences into phrases on separate lines.

See entries in published news documents for correct examples.
These published news entries have been already reviewed,
while entries in the evolving document may still contain errors.

<!--
# Adding an entry to Tips and Tricks document

 You can add eligible news items to the Tips and Tricks documents of JDT, Platform, and PDE
 present in the *.doc.user projects of
 [https://github.com/eclipse-platform/eclipse.platform.releng.aggregator/tree/master/eclipse.platform.common/bundles](https://github.com/eclipse-platform/eclipse.platform.releng.aggregator/tree/master/eclipse.platform.common/bundles).

Add the "new.png" icon using <img src="images/new.png" alt=""> before the title of your entry. These icons will be kept until the next June release of the Eclipse IDE and will be cleared after that.

Keep the entry short and relevant as a tip instead of making it descriptive as a news item.

Add "tips" tag on the "Whiteboard" field of the corresponding bug for quick querying of the added tips.

You are also encouraged to attach a small video or animated GIF to the associated bug displaying the item in action. This attachment can be used with the entry description to spread the word about it on social media platforms.

Do not link to bugs in the entry. Only add the bug number in the commit message when committing the entry.

Note: Please use the W3C XHTML Markup Validation Service to check your document's markup before submitting as an invalid document can lead to build failure.
Bug number for an entry 	Add a link to the associated bug as a comment in the entry.

This makes it easier to find the associated bug in order to get more details about the entry, add comments or report problems. Also, users will be able to find the bug number associated with an entry in the news page by viewing it's html source.
For an example, see this entry.

Note: Do not link to bugs in the entry.

Also, add the bug number in the commit message when committing the entry.
-->

### Screenshots

If a small image sheds light,
place it below the description,
in a separate paragraph,
i.e., with a blank line before and after the image in the markdown.

Crop out any extraneous stuff to focus the reader's attention on your new feature.
Use `*.png` and avoid really large images
because images will be scaled down to fit.

Name the file in a way that is appropriate and specific to the item,
e.g., `key-bindings.png`,
rather than something generic like `image.png`.
Use all lowercase letters in the image file name,
including the `.png` file extension.
As a separator,
use hyphen `-` rather than underscore or space.

Put all the images in a sibling directory named `images`.
This yields markdown like this:
```
![Foo View](images/foo-view.png)
```

Include a suitable descriptive label.
Only use the label to add information that is not accessible if the page is rendered without images.
Don't write `[Screenshot of the XY dialog]`.
Visually impaired users shouldn't have to skip useless repetitions,
but the label can be interesting unless it's already part of the description.

Use regular markdown for the image so it can be appropriately rendered and styled.

### Contributor Mentioning

The individuals that have contributed to a noteworthy change _can_ be mentioned as contributors of it.
Contributors should be mentioned below the headline, and the name of each contributor can be backed by a link to that person's GitHub profile as suggested in the [template](#template).
It's recommended to use real full names, in the spirit of an open and transparent community, but if desired, a contributor's pseudonym can be used as well.
If anybody other than the author of the N&N entry is listed, that person's consent should be obtained
(for regular contributors, who have been mentioned in other entries already, general consent can be assumed and it's sufficient to make them aware of a new entry with the possibility to object).
Every individual who made code contributions to the described change should be mentioned as contributors (if consented).

### Initialization

To automatically initialize the news folder for a new release, run the `scripts/applyTemplate.sh` script. 
Instructions to run the script can be found in `scripts/instructions.txt`.
It creates the directory and all the related content for a new release, useing the [4.x-template directory](4.x-template).
It also replaces the placeholder `4.x` with the Eclipse project's release version and `YYYY-MM` with the corresponding SimRel release name in all markdown files.
