var eclipse_org_common = { "settings": { "cookies_class": { "name": "eclipse_settings", "enabled": 1 } } };

window.onscroll = function() {
	const footer = document.querySelector("#footer>div>a");
	footer.style.display = document.documentElement.scrollTop > 100 ? 'inline' : 'none';
};

const scriptBase = new URL(".", document.currentScript.src).href
const apiGitHub = 'https://api.github.com/repos/eclipse-platform/www.eclipse.org-eclipse/contents/';
const markdownBase = `${scriptBase}markdown/?file=`;
const selfHostedMarkdownBase = `${scriptBase}markdown/?f=`;
const newsBase = `${scriptBase}news/news.html?file=`;

let meta = toElements(`
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="https://eclipseide.org/favicon.ico"/>
`);

let defaultHeader = toElements(`
	<a href="https://www.eclipse.org/downloads/packages/">Eclipse IDE</a>
	<a href="https://eclipseide.org/working-group/">Working Group</a>
	<a href="https://eclipseide.org/release/noteworthy/">New &amp; Noteworthy</a>
	<a href="https://marketplace.eclipse.org/">Marketplace</a>
`);

let defaultBreadcrumb = toElements(`
	<a href="https://eclipseide.org/">Home</a>
	<a href="https://eclipseide.org/projects/">Projects</a>
`);

let defaultNav = toElements(`
<a class="fa-download" href="https://download.eclipse.org/eclipse/downloads/"
	title="Download: Distribution Sites">
	Download<p>Distribution Sites</p>
</a>
<a class="fa-book" href="https://help.eclipse.org/" title="Documentation: help.eclipse.org">
	Documentation<p>help.eclipse.org</p>
</a>
<a class="fa-users" href="${markdownBase}eclipse-ide/.github/main/CONTRIBUTING.md"
	title="Contribution: Environment Setup">
	Contribution<p>Environment Setup</p>
</a>
<a class="fa-support" href="https://github.com/eclipse-platform/.github/discussions"
	title="Support: Discussions">
	Support<p>Discussions</p>
</a>
<a class="fa-newspaper-o" href="${scriptBase}news/"
	title="News: Noteworthy">
	News<p>Noteworthy</p>
</a>
`);


let projectAside = `
<a class="separator" href="https://projects.eclipse.org/projects/eclipse"><i class='fa fa-cube'></i> Eclipse Project</a>
<a href="https://projects.eclipse.org/projects/eclipse.equinox">Equinox</a>
<a href="https://projects.eclipse.org/projects/eclipse.platform">Platform</a>
<a href="${scriptBase}swt">&nbsp;&nbsp;&bullet;&nbsp;SWT</a>
<a href="https://projects.eclipse.org/projects/eclipse.jdt">Java Development Tools</a>
<a href="https://projects.eclipse.org/projects/eclipse.pde">Plug-in Development Environment</a>
`;

let githubAside = `
<span class="separator"><i class='fa fa-github'></i> GitHub</span>
<a href="https://github.com/eclipse-equinox/">Equinox</a>
<a href="https://github.com/eclipse-platform/">Platform</a>
<a href="https://github.com/eclipse-jdt/">Java Development Tools</a>
<a href="https://github.com/eclipse-pde/">Plug-in Development Environment</a>
`;

let markdownAside = `
<span class="separator"><i class='fa fa-edit'></i> Markdown</span>
<a href="${markdownBase}eclipse-platform/eclipse.platform/master/docs">Platform</a>
<a href="${markdownBase}eclipse-platform/eclipse.platform.ui/master/docs">Platform UI</a>
<a href="${markdownBase}eclipse-pde/eclipse.pde/master/docs">PDE</a>
<a href="${markdownBase}eclipse-equinox/p2/master/docs">Equinox p2</a>
<a href="${markdownBase}eclipse-ide/.github/main/">Eclipse IDE</a>
<a href="${markdownBase}eclipse-simrel/.github/main/profile/README.md">Eclipse SimRel</a>
`;

let defaultAside = toElements(`
${projectAside}
${githubAside}
${markdownAside}
`);

let tableOfContentsAside = '';

let selfContent = document.documentElement.outerHTML;

function redirect(href) {
	const location = href != null ?
		`${href}${window.location.search}${window.location.hash}` :
		new URL(`${selfHostedMarkdownBase}${window.location.pathname.replace(/^\/eclipse\//, '').replace(/\/$/, '/index.html').replace(/\.html$/, '.md')}`);
	const body = document.querySelector('body')
	replaceChildren(body, "body", ...toElements(`<div style="display: none">If you are not redirected automatically, 	follow this <a href='${location}'>link</a>.</div>`));
	window.location = location;
}

function generate() {
	selfContent = document.documentElement.innerHTML;
	try {
		const head = document.head;
		var referenceNode = head.querySelector('script');
		for (const element of [...meta]) {
			head.insertBefore(element, referenceNode.nextElementSibling)
			referenceNode = element;
		}

		const generators = document.querySelectorAll('[data-generate]');
		for (const element of generators) {
			const generator = element.getAttribute('data-generate');
			const generate = new Function(generator);
			generate.call(element, element);
		}

		const generatedBody = generateBody();
		document.body.replaceChildren(...generatedBody);
	} catch (exception) {
		document.body.prepend(...toElements(`<span>Failed to generate content: <span><b style="color: FireBrick">${exception.message}</b><br/>`));
		console.log(exception);
	}
}

function generateDefaults(element, id) {
	if (id != null && getQueryParameter(id) != null) {
		return;
	}

	const parts = [];
	if (!hasElement('header')) {
		parts.push(generateDefaultHeader(document.createElement('div')));
	}
	if (!hasElement('breadcrumb')) {
		parts.push(generateDefaultBreadcrumb(document.createElement('div')));
	}
	if (!hasElement('aside')) {
		parts.push(generateDefaultAside(document.createElement('div')));
	}
	if (!hasElement('nav')) {
		parts.push(generateDefaultNav(document.createElement('div')));
	}
	element.prepend(...parts);
}

function generateBody() {
	const col = document.getElementById('aside') ? 'col-md-18' : ' col-md-24';
	return toElements(`
<div>
	${generateHeader()}
	<main id="content">
		<div class="novaContent container" id="novaContent">
			<div class="row">
				<div class="${col} main-col-content">
					<div class="novaContent" id="novaContent">
						<div class="row">
							${generateBreadcrumb()}
						</div>
						<div class=" main-col-content">
							${generateNav()}
							<div id="midcolumn">
							${generateMainContent()}
							</div>
						</div>
					</div>
				</div>
				${generateAside()}
				${tableOfContentsAside}
			</div>
		</div>
	</main>
	<footer id="footer">
		<div class="container">
			<div class="footer-sections row equal-height-md font-bold">
				<div id="footer-eclipse-foundation" class="footer-section col-md-5 col-sm-8">
					<div class="menu-heading">Eclipse Foundation</div>
					<ul class="nav">
						<ul class="nav">
							<li><a href="http://www.eclipse.org/org/">About</a></li>
							<li><a href="https://projects.eclipse.org/">Projects</a></li>
							<li><a href="http://www.eclipse.org/collaborations/">Collaborations</a></li>
							<li><a href="http://www.eclipse.org/membership/">Membership</a></li>
							<li><a href="http://www.eclipse.org/sponsor/">Sponsor</a></li>
						</ul>
					</ul>
				</div>
				<div id="footer-legal" class="footer-section col-md-5 col-sm-8">
					<div class="menu-heading">Legal</div>
					<ul class="nav">
						<ul class="nav">
							<li><a href="http://www.eclipse.org/legal/privacy.php">Privacy Policy</a></li>
							<li><a href="http://www.eclipse.org/legal/termsofuse.php">Terms of Use</a></li>
							<li><a href="http://www.eclipse.org/legal/compliance/">Compliance</a></li>
							<li><a href="http://www.eclipse.org/org/documents/Community_Code_of_Conduct.php">Code of
									Conduct</a></li>
							<li><a href="http://www.eclipse.org/legal/">Legal Resources</a></li>
						</ul>
					</ul>
				</div>
				<div id="footer-more" class="footer-section col-md-5 col-sm-8">
					<div class="menu-heading">More</div>
					<ul class="nav">
						<ul class="nav">
							<li><a href="http://www.eclipse.org/security/">Report a Vulnerability</a></li>
							<li><a href="https://www.eclipsestatus.io/">Service Status</a></li>
							<li><a href="http://www.eclipse.org/org/foundation/contact.php">Contact</a></li>
							<li><a href="http://www.eclipse.org//projects/support/">Support</a></li>
						</ul>
					</ul>
				</div>
			</div>
			<div class="col-sm-24">
				<div class="row">
					<div id="copyright" class="col-md-16">
						<p id="copyright-text">Copyright © Eclipse Foundation AISBL. All Rights Reserved.</p>
					</div>
				</div>
			</div>
			<a href="#" class="scrollup" onclick="scrollToTop()">Back to the top</a>
		</div>
	</footer>
</div>
`);
}

function generateMainContent() {
	const main = document.body.querySelector('main')
	if (main != null) {
		return main.outerHTML
	}
	return `
<main>The body specifies no content.</main>
`;
}

function generateDefaultHeader(element) {
	return prependChildren(element, 'header', ...defaultHeader);
}

function generateHeader() {
	const elements = document.querySelectorAll('#header>a');
	const items = Array.from(elements).map(link => {
		link.classList.add('link-unstyled');
		return `
<li class="navbar-nav-links-item">
	${link.outerHTML}
</li>
`;
	});
	const mobileItems = Array.from(elements).map(link => {
		link.className = 'mobile-menu-item mobile-menu-dropdown-toggle';
		return `
<li class="mobile-menu-dropdown">
	${link.outerHTML}
</li>
`;
	});

	return `
<header class="header-wrapper" id="header">
	<div class="header-navbar-wrapper">
		<div class="container">
			<div class="header-navbar">
				<a class="header-navbar-brand" href="https://eclipseide.org/">
					<div class="logo-wrapper">
						<img src="https://eclipse.dev/eclipse.org-common/themes/solstice/public/images/logo/eclipse-ide/eclipse_logo.svg" alt="Eclipse Project" width="150"/>
					</div>
				</a>
				<nav class="header-navbar-nav">
					<ul class="header-navbar-nav-links">
						${items.join('\n')}
					</ul>
				</nav>
				<div class="header-navbar-end">
					<div class="float-right hidden-xs" id="btn-call-for-action">
						<a href="https://www.eclipse.org/sponsor/ide/" class="btn btn-huge btn-warning">
							<i class="fa fa-star"></i> Sponsor
						</a>
					</div>
					<button class="mobile-menu-btn" onclick="toggleMenu()">
						<i class="fa fa-bars fa-xl"/></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	<nav id="mobile-menu" class="mobile-menu hidden" aria-expanded="false">
		<ul>
			${mobileItems.join('\n')}
		</ul>
	</nav>
</header>
`;
}

function generateDefaultBreadcrumb(element) {
	return prependChildren(element, 'breadcrumb', ...defaultBreadcrumb);
}

function generateBreadcrumb() {
	const breadcumbs = document.getElementById('breadcrumb')
	if (breadcumbs == null) {
		return '';
	}

	const elements = breadcumbs.children;
	const items = Array.from(elements).map(link => `<li>${link.outerHTML}</li>`);

	const extraBreachcrumb = generateExtraBreadcrumb();
	if (extraBreachcrumb != null) {
		items.push(`<li>${extraBreachcrumb}</li>`);
	}

	return `
<section class="default-breadcrumbs hidden-print breadcrumbs-default-margin"
	id="breadcrumb">
	<div class="container">
		<h3 class="sr-only">Breadcrumbs</h3>
		<div class="row">
			<div class="col-sm-24">
				<ol class="breadcrumb">
					${items.join('\n')}
				</ol>
			</div>
		</div>
	</div>
</section>
`;
}

function generateExtraBreadcrumb() {
	const location = new URL(window.location);
	const crumb = getQueryParameter('crumb');
	if (crumb) {
		return `<span>${crumb}</span>`;
	} else {
		const file = getQueryParameter('file');
		if (file != null) {
			const match = file.match(/[^\/]+/g);
			if (match.length == 1) {
				return `<span>${match[0]}</span>`;
			} else if (match.length == 2 && match[0] != 'plans') {
				location.search = `file=${match[0]}`;
				return `<a href="${location.href}">${match[0]}</a>`;
			}
		}
	}
}

function generateDefaultNav(element) {
	return prependChildren(element, 'nav', ...defaultNav);
}

function generateNav() {
	const elements = document.body.querySelectorAll('#nav>a');
	if (elements.length == 0) {
		return '';
	}

	const items = Array.from(elements).map(element => {
		const href = element.getAttribute('href')
		const target = element.getAttribute('target') ?? "_self";
		const title = element.getAttribute('title') ?? '';
		const className = element.className ?? '';
		const content = element.innerHTML;
		return `
<li class="col-xs-24 col-md-12">
	<a class="row" href="${href}" title="${title}"
		target="${target}">
		<i class="col-xs-3 col-md-6 fa ${className}"></i>
		<span class="col-xs-21 c col-md-17">${content}
		</span>
	</a>
</li>
`;
	});

	return `
<div class="header_nav">
	<div class="col-xs-24 col-md-10 vcenter">
		<a href="${scriptBase}">
			<img src="${scriptBase}eclipse.svg" alt="The Main Index Page" xwidth="50%" xheight="auto" class="img-responsive header_nav_logo"/>
		</a>
	</div><!-- NO SPACES
 --><div class="col-xs-24 col-md-14 vcenter">
		<ul class="clearfix">
			${items.join('\n')}
		</ul>
	</div>
</div>
`;
}

function generateDefaultAside(element) {
	return prependChildren(element, 'aside', ...defaultAside);
}

function generateAside() {
	const elements = document.body.querySelectorAll('aside>*,#aside>*');
	if (elements.length == 0) {
		return '';
	}

	const items = Array.from(elements).map(element => {
		const main = element.classList.contains('separator')
		element.classList.add('link-unstyled');
		if (main) {
			element.classList.add('main-sidebar-heading');
			return `
<li class="main-sidebar-main-item main-sidebar-item-indented separator">
	${element.outerHTML}
</li>
`
		} else {
			return `
<li class="main-sidebar-item main-sidebar-item-indented">
	${element.outerHTML}
</li>
`
		}
	});

	return `
<div class="col-md-6 main-col-sidebar-nav">
	<aside class="main-sidebar-default-margin" id="main-sidebar">
		<ul class="ul-left-nav" id="leftnav" role="tablist" aria-multiselectable="true">
			${items.join('\n')}
	</aside>
</div>
`;
}

function generateFileProtocolFailure(location) {
	return toElements(`
<div>
	<h2>
		Cross-Origin Request Blocked 
	</h2>
	The Same Origin Policy disallows reading the following remote resource: 
	<p>
		<code>
			<a href="${location}">${location}</a> 
		</code>
	</p>
		Reason: CORS request not http:
	<p>
	[<a class="xlink-unstyled" href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Guides/CORS/Errors/CORSRequestNotHttp">Learn More</a>]
	<hr/>
	<h3>
		Use an Http Server
	</h3>
	</p>
		To test the inclusion functionality you must serve the URI of the containing page from an <a href="https://httpd.apache.org/">http server</a>.
	</div>
`);
}

function getXSLT(document) {
	for (const node of document.childNodes) {
		if (node.nodeName == 'xml-stylesheet') {
			const match = /href=['"]([^'"]+)['"']/.exec(node.textContent);
			if (match.length == 2) {
				return match[1];
			}
		}
	}
}

function sendRequest(location, handler) {
	var request = new XMLHttpRequest();
	request.open('GET', location);
	request.onloadend = function() {
		handler(request);
	};
	request.send();
}

function getHTMLText(request) {
	if (request.responseURL.endsWith('.php')) {
		const response = JSON.parse(request.responseText);
		return blobToText(response.content);
	}

	const html = request.responseText;
	return html;
}

function blobToText(blob) {
	const binary = window.atob(blob);
	const bytes = new Uint8Array(binary.length);
	for (var i = 0; i < binary.length; i++) {
		bytes[i] = binary.charCodeAt(i);
	}
	const decoder = new TextDecoder();
	const realText = decoder.decode(bytes);
	return realText;
}

function parseHTML(request, handler) {
	const location = request.responseURL;
	const xml = request.responseXML;
	if (xml != null) {
		const xslt = getXSLT(xml);
		if (xslt) {
			sendRequest(new URL(xslt, location), request => {
				const xsl = request.responseXML;
				const htmlDocument = document.implementation.createHTMLDocument();
				addBase(htmlDocument, location);
				const xsltProcessor = new XSLTProcessor();
				xsltProcessor.importStylesheet(xsl);
				const resultDocument = xsltProcessor.transformToFragment(xml, htmlDocument);
				handler(resultDocument);
			});
			return;
		}
	}

	const html = getHTMLText(request);
	const htmlDocument = new DOMParser().parseFromString(html, 'text/html');
	addBase(htmlDocument, location);
	handler(htmlDocument);
}

const newAndNoteworthySubjects = {
	platform: {
		label: 'New features in the Platform and Equinox.'
	},
	jdt: {
		label: 'New features for Java developers.'
	},
	platform_isv: {
		label: 'New APIs in the Platform and Equinox.'
	},
	pde: {
		label: 'New features for Plug-in developers'
	},
	acknowledgements: {
		label: 'Contributor acknowledgements'
	}
};

function generateNewAndNoteworthy(element) {
	const id = 'new-and-noteworthy-target';
	element.id = id;
	getFileList(apiGitHub + 'news/', /4\.([0-9]+)/, files => {
		const items = files.slice(0, 12).map(file => {
			const match = file.match;
			const version = `4.${match[1]}`;
			const minorVersionNumber = Number(match[1]);
			const offset = minorVersionNumber - 11;
			const year = 2019 + Math.floor(offset / 4);
			let quarter;
			switch (offset % 4) {
				case 0:
					{
						quarter = "03";
						break;
					}
				case 1:
					{
						quarter = "06";
						break;
					}
				case 2:
					{
						quarter = "09";
						break;
					}
				default:
					{
						quarter = "12";
						break;
					}
			}
			const alias = year + "-" + quarter;
			const verisonId = `${id}-${version}-a`;

			/*
				getFileList(apiGitHub + `news/${version}`, /.*(?:\.md|\.html)$/, subjects => {
					const properSubjects = new Map();
					for (const subject of subjects) {
						const subjectMatch = /(?<name>pde|jdt|platform|platform_isv)\.(?<extension>md|html)/.exec(subject.name);
						if (subjectMatch != null) {
							const name = subjectMatch.groups.name
							const url = `${selfHostedMarkdownBase}news/${version}/${subject.name}`;
							if (subjectMatch.groups.extension == 'html') {
								if (!properSubjects.has(name)) {
									properSubjects.set(name, url);
								}
							} else {
								properSubjects.set(name, url);
							}
						}
					}

					const children = Object.entries(newAndNoteworthySubjects).map(entry => {
						const url = properSubjects.get(entry[0]);
						if (url == null) {
							return '';
						}
						return `<li><a href="${url}">${entry[1].label}</a></li>`;
					});

					const subjectTarget = document.getElementById(verisonId);
					subjectTarget.replaceChildren(...toElements(children));
				});
			}
			*/

			const defaultFileExtension = minorVersionNumber >= 36 ? '.md' : '.html';
			const defaultBaseURL = minorVersionNumber >= 36 ? `${selfHostedMarkdownBase}news/${version}/` : `${newsBase}${version}/`;
			const defaultChildren = Object.entries(newAndNoteworthySubjects).map(entry => {
				return `<li><a href="${defaultBaseURL}${entry[0]}${defaultFileExtension}">${entry[1].label}</a></li>`;
			});

			return `
<p><a id='${verisonId}-a' href="${defaultBaseURL}index${defaultFileExtension}">${alias} (4.${match[1]}) release:</a></p>
	<blockquote>
	<ul id='${verisonId}'>
		${defaultChildren.join('\n')}
	</ul>
	</blockquote>
`;
		});

		const target = document.getElementById(id);
		target.replaceChildren(...toElements(`
<h1>Eclipse - New and Noteworthy</h1>
<p>
This page links to the recent new and noteworthy changes in the Eclipse SDK project.
</p>
<ul>
	${items.join('\n')}
</ul>
	` ));
	},
		request => {
			const target = document.getElementById(id);
			target.replaceChildren(...toElements(`<pre>Problem: ${request.responseText}</pre>`));
		});
}

function load(location) {
	const baseURI = document.baseURI;
	const effectiveLocation = location ?? getQueryParameter('file') ?? 'index.html';
	const resolvedLocation = new URL(effectiveLocation, baseURI);
	sendRequest(resolvedLocation, request => {
		if (request.status >= 400) {
			const main = document.getElementById('midcolumn');
			if (window.location.protocol == 'file:') {
				main.append(...generateFileProtocolFailure(resolvedLocation));
			}
		} else {
			parseHTML(request, includedDocument => {
				const location = new URL(".", baseURI).toString();
				const anchors = includedDocument.querySelectorAll("a[href]");
				for (const anchor of anchors) {
					const resolvedHref = anchor.href;
					if (resolvedHref.startsWith(location)) {
						const hrefURL = new URL(resolvedHref);
						const hash = hrefURL.hash;
						hrefURL.hash = '';
						let relative = hrefURL.href.replace(location, '').replace('.php', '.html');
						if (relative.endsWith('/')) {
							relative = '?file=' + relative + 'index.html';
						} else if (relative.endsWith('.html') || relative.endsWith('.php') || relative.endsWith('.xml')) {
							relative = '?file=' + relative;
						}
						const url = new URL(relative, baseURI);
						url.hash = hash;
						anchor.href = url;
					} else {
						anchor.href = resolvedHref;
					}
				}

				const imgs = includedDocument.querySelectorAll("img[src]");
				for (const img of imgs) {
					img.src = img.src;
				}

				const main = document.getElementById('midcolumn');
				if (includedDocument instanceof DocumentFragment) {
					main.replaceChildren(...includedDocument.children);
				} else {
					main.replaceChildren(...includedDocument.body.children);
				}
			});
		}
	});
}

function getFileList(location, pattern, handler, errorHandler) {
	sendRequest(location, request => {
		const map = new Map();
		if (request.status >= 400) {
			if (errorHandler != null) {
				errorHandler(request);
			}
			return;
		}
		const files = JSON.parse(request.responseText);
		let count = 0;
		for (const file of files) {
			const match = pattern.exec(file.name);
			if (match) {
				if (match.length > 1) {
					file.match = match;
					let ordinal = 0.0;
					for (let index = 1; index < match.length; ++index) {
						const x = 100000000;
						const segment = match[index];
						ordinal = ordinal * x + Number(segment ?? '0');
					}
					const existingValue = map.get(ordinal);
					if (existingValue == null || existingValue.name.endsWith('.php')) {
						map.set(ordinal, file);
					}
				} else {
					map.set(count++, file);
				}
			}
		}

		const entries = [...map].sort((a, b) => {
			return b[0] - a[0]
		}).map(entry => entry[1]);

		handler(entries);
	});
}

function generateProjectPlans() {
	getFileList(apiGitHub + 'development/plans', /eclipse_project_plan_([0-9]+)[-_.]([0-9]+)(?:[-_.]([0-9]+))?\.xml/, files => {
		const items = files.map(file => {
			const match = file.match;
			const version = `${match[1]}.${match[2]}${match[3] ? '.' + match[3] : ''}`;
			return `
<li>
	<a href="?file=plans/${file.name}&amp;crumb=${version}">${version}</a>
</li>
`;
		});

		const main = document.getElementById('midcolumn');
		main.replaceChildren(...toElements(`
<h2><span class="fa fa-briefcase"> Plans</span></h2>
<ul>
	${items.join('\n')}
</ul>
` ));
	});
}

function loadPojectPlan() {
	const file = getQueryParameter('file');
	if (file) {
		load();
	} else {
		generateProjectPlans();
	}
}

function generateProjectReleaseNotes() {
	getFileList(apiGitHub + 'development', /readme_eclipse_([0-9]+)[-_.]([0-9]+)(?:[-_.]([0-9]+))?\.html/, files => {
		const items = files.map(file => {
			const match = file.match;
			const version = `${match[1]}.${match[2]}${match[3] ? '.' + match[3] : ''}`;
			return `
<li>
	<a href="?file=${file.name}&amp;crumb=${version}">${version}</a>
</li>
`;
		});

		const main = document.getElementById('midcolumn');
		main.replaceChildren(...toElements(`
<h2><span class="fa fa-file-text-o"> Release Notes</span></h2>
<ul>
	${items.join('\n')}
</ul>
` ));
	});
}

function loadProjectReleaseNotes() {
	const file = getQueryParameter('file');
	if (file) {
		load();
	} else {
		generateProjectReleaseNotes();
	}
}

function generateProjectAcknowledgements() {
	// acknowledgements_3_2.html
	getFileList(apiGitHub + 'development', /acknowledgements_([0-9]+)[-_.]([0-9]+)(?:[-_.]([0-9]+))?\.(?:html|php)/, files => {
		const items = files.map(file => {
			const match = file.match;
			const version = `${match[1]}.${match[2]}${match[3] ? '.' + match[3] : ''}`;
			const url = file.name.endsWith('.html') ? file.name : `${apiGitHub}development/${file.name}`;
			return `
<li>
	<a href="?file=${url}&amp;crumb=${version}">${version}</a>
</li>
`;
		});

		const main = document.getElementById('midcolumn');
		main.replaceChildren(...toElements(`
<h2><span class="fa fa-address-book-o"> Acknowlegements</span></h2>
<ul>
	${items.join('\n')}
</ul>
` ));
	});
}

function loadProjectAcknowledgements() {
	const file = getQueryParameter('file');
	if (file) {
		load();
	} else {
		generateProjectAcknowledgements();
	}
}

function generateProjectPortingGuides() {
	getFileList(apiGitHub + 'development/porting', /eclipse_([0-9]+)[-_.]([0-9]+)(?:[-_.]([0-9]+))?_porting_guide\.(?:html|php)/, files => {
		const items = files.map(file => {
			const match = file.match;
			const version = `${match[1]}.${match[2]}${match[3] ? '.' + match[3] : ''}`;
			const url = file.name.endsWith('.html') ? 'porting/' + file.name : `${apiGitHub}development/porting/${file.name}`;
			return `
<li>
	<a href="?file=${url}&amp;crumb=${version}">${version}</a>
</li>
`;
		});

		const main = document.getElementById('midcolumn');
		main.replaceChildren(...toElements(`
<h2><span class="fa fa-ship"> Porting Guides</span></h2>
<ul>
	${items.join('\n')}
</ul>
` ));
	});
}

function loadProjectPortingGuides() {
	const file = getQueryParameter('file');
	if (file) {
		load();
	} else {
		generateProjectPortingGuides();
	}
}

function generateSelf(element) {
	element.innerText = selfContent.replace(/\t/g, '    ').replace(/\n\n\n+/g, '\n\n').replace(/<\/script><\/body>/, '</script>\n</body>');
}

function hasElement(id) {
	return document.getElementById(id) != null;
}

function toElements(text) {
	const wrapper = document.createElement('div');
	wrapper.innerHTML = text;
	return wrapper.children
}

function replaceChildren(element, id, ...children) {
	element.id = id;
	element.replaceChildren(...children);
	return element;
}

function prependChildren(element, id, ...children) {
	element.id = id;
	element.prepend(...children);
	return element;
}

function addBase(htmlDocument, location) {
	const base = htmlDocument.createElement('base');
	base.href = location;
	htmlDocument.head.appendChild(base);
}

function getQueryParameter(id) {
	const location = new URL(window.location);
	const search = new URLSearchParams(location.search);
	return search.get(id);
}

function toggleMenu() {
	const mobileMenu = document.getElementById('mobile-menu')
	if (mobileMenu.classList.contains('hidden')) {
		mobileMenu.classList.remove('hidden');
	} else {
		mobileMenu.classList.add('hidden');
	}
}

function scrollToTop() {
	window.scrollTo({ top: 0, behavior: 'smooth' });
}
