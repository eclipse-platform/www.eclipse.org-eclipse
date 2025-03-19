var eclipse_org_common = { "settings": { "cookies_class": { "name": "eclipse_settings", "enabled": 1 } } };

window.onscroll = function() {
	const footer = document.querySelector("#footer>div>a");
	footer.style.display = document.documentElement.scrollTop > 100 ? 'inline' : 'none';
};

const scriptBase = new URL(".", document.currentScript.src).href

const meta = toElements(`
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="https://eclipseide.org/favicon.ico"/>
`);

const defaultHeader = toElements(`
	<a href="https://www.eclipse.org/downloads/packages/">Eclipse IDE</a>
	<a href="https://eclipseide.org/working-group/">Working Group</a>
	<a href="https://eclipseide.org/release/noteworthy/">New &amp; Noteworthy</a>
	<a href="https://marketplace.eclipse.org/">Marketplace</a>
`);

const defaultBreadcrumb = toElements(`
	<a href="https://eclipseide.org/">Home</a>
	<a href="https://eclipseide.org/projects/">Projects</a>
`);

const defaultNav = toElements(`
<a class="fa-download" href="https://download.eclipse.org/eclipse/downloads/"
	title="Download: Distribution Sites">
	Download<p>Distribution Sites</p>
</a>
<a class="fa-book" href="https://help.eclipse.org/" title="Documentation: Details">
	Documentation<p>Details</p>
</a>
<a class="fa-users" href="https://github.com/eclipse-ide/.github/blob/main/CONTRIBUTING.md"
	title="Contribution: Environment Setup">
	Contribution<p>Environment Setup</p>
</a>
<a class="fa-support" href="https://github.com/eclipse-platform/.github/discussions"
	title="Support: Discussions">
	Support<p>Discussions</p>
</a>
<a class="fa-newspaper-o" href="${scriptBase}news/news.html"
	title="News: Noteworthy">
	News<p>Noteworthy</p>
</a>
`);

const defaultAside = toElements(`
<a class="separator" href="https://projects.eclipse.org/projects/eclipse"><i class='fa fa-cube'></i> Eclipse Project</a>
<a href="https://projects.eclipse.org/projects/eclipse.equinox">Equinox</a>
<a href="https://projects.eclipse.org/projects/eclipse.platform">Platform</a>
<a href="https://projects.eclipse.org/projects/eclipse.jdt">Java Development Tools</a>
<a href="https://projects.eclipse.org/projects/eclipse.pde">Plug-in Development Environment</a>
<span class="separator"><i class='fa fa-github'></i> GitHub</span>
<a href="https://github.com/eclipse-equinox/">Equinox</a>
<a href="https://github.com/eclipse-platform/">Platform</a>
<a href="https://github.com/eclipse-jdt/">Java Development Tools</a>
<a href="https://github.com/eclipse-pde/">Plug-in Development Environment</a>
`);

let selfContent = document.documentElement.outerHTML;

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

function generateDefaults(element) {
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
			</div>
		</div>
	</main>
	<footer id="footer">
		<div class="container">
			<a xhref="#" class="scrollup" onclick="scrollToTop()">Back to the top</a>
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

	const newsBreachcrumb = generateNewsBreadcrumb();
	if (newsBreachcrumb != null) {
		items.push(`<li>${newsBreachcrumb}</li>`);
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

function generateNewsBreadcrumb() {
	const location = new URL(window.location);
	const file = new URLSearchParams(location.search).get('file');
	if (file != null) {
		const match = file.match(/[^\/]+/g);
		if (match.length == 1) {
			return `<span>${match[0]}</span>`;
		} else if (match.length == 2) {
			location.search = `file=${match[0]}`;
			return `<a href="${location.href}">${match[0]}</a>`;
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
		<a href="${scriptBase}index.html">
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

function parseHTML(html, location) {
	const document = new DOMParser().parseFromString(html, 'text/html');
	if (location) {
		const base = document.createElement('base');
		base.href = location;
		document.head.appendChild(base);
	}
	return document;
}

function load(location) {
	const baseURI = document.baseURI;
	const effectiveLocation = location ?? new URLSearchParams(window.location.search).get('file') ?? 'index.html';
	const resolvedLocation = new URL(effectiveLocation, baseURI);
	var request = new XMLHttpRequest();
	request.open('GET', resolvedLocation);
	request.onloadend = function() {
		const html = request.responseText;
		if (request.status != 200) {
			const main = document.getElementById('midcolumn');
			if (window.location.protocol == 'file:') {
				main.append(...generateFileProtocolFailure(resolvedLocation));
			}
		} else {
			const includedDocument = parseHTML(html, request.responseURL);
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
					} else if (relative.endsWith('.html') || relative.endsWith('.php')) {
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
			main.replaceChildren(...includedDocument.body.children)
		}
	}
	request.send();
}

function generateSelf(element) {
	element.innerText = selfContent.replace(/\t/g, '    ').replace(/\n\n\n+/g, '\n\n');
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
