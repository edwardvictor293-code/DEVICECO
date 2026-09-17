import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const body = document.body;
const nav = document.querySelector('[data-nav]');
const menuToggle = document.querySelector('[data-menu-toggle]');
const mobileMenu = document.querySelector('[data-mobile-menu]');
const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
let loader = document.querySelector('[data-loader]');
let navigating = false;

if (!loader) {
	loader = document.createElement('div');
	loader.className = 'page-loader';
	loader.dataset.loader = '';
	loader.setAttribute('aria-hidden', 'true');
	loader.innerHTML = '<div class="loader-mark">D</div><span class="loader-rule"><i></i></span><small>DEVICECO / 2026</small>';
	body.prepend(loader);
}

const setScrollLocked = (locked) => body.classList.toggle('is-scroll-locked', locked);
const closeMenu = () => {
	nav?.classList.remove('menu-open');
	menuToggle?.setAttribute('aria-expanded', 'false');
	mobileMenu?.setAttribute('aria-hidden', 'true');
	if (!document.querySelector('[data-loader]:not(.is-done)')) setScrollLocked(false);
};
const finishLoader = () => {
	loader?.classList.add('is-done');
	loader?.classList.remove('is-transitioning');
	if (!body.classList.contains('is-transitioning')) setScrollLocked(false);
};
setScrollLocked(true);
window.addEventListener('load', () => window.setTimeout(finishLoader, 650), { once: true });
window.setTimeout(finishLoader, 2200);

const progressRail = document.createElement('div');
progressRail.className = 'scroll-progress';
progressRail.setAttribute('aria-hidden', 'true');
progressRail.innerHTML = '<i></i>';
body.append(progressRail);
const progressBar = progressRail.querySelector('i');
const syncViewportState = () => {
	nav?.classList.toggle('scrolled', window.scrollY > 30);
	const range = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
	progressBar.style.transform = `scaleY(${Math.min(1, window.scrollY / range)})`;
};
window.addEventListener('scroll', syncViewportState, { passive: true });
syncViewportState();
menuToggle?.addEventListener('click', () => {
	const open = nav?.classList.toggle('menu-open');
	menuToggle.setAttribute('aria-expanded', String(open));
	mobileMenu?.setAttribute('aria-hidden', String(!open));
	setScrollLocked(Boolean(open));
});
mobileMenu?.addEventListener('click', (event) => { if (event.target === mobileMenu) closeMenu(); });

document.addEventListener('click', (event) => {
	const link = event.target.closest('a[href]');
	if (!link || event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
	if (link.target && link.target !== '_self' || link.hasAttribute('download')) return;
	const destination = new URL(link.href, window.location.href);
	if (destination.origin !== window.location.origin || destination.pathname === window.location.pathname && destination.search === window.location.search && destination.hash) return;
	if (destination.pathname === window.location.pathname && destination.search === window.location.search) return;
	if (navigating) { event.preventDefault(); return; }
	navigating = true;
	event.preventDefault();
	closeMenu();
	body.classList.add('is-transitioning');
	setScrollLocked(true);
	loader?.classList.remove('is-done');
	loader?.classList.add('is-transitioning');
	window.setTimeout(() => window.location.assign(destination.href), 260);
});

window.addEventListener('pageshow', () => {
	navigating = false;
	body.classList.remove('is-transitioning');
	finishLoader();
});

const observer = new IntersectionObserver((entries) => entries.forEach((entry) => {
	if (entry.isIntersecting) { entry.target.classList.add('visible'); observer.unobserve(entry.target); }
}), { threshold: 0.12 });
document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));
window.setTimeout(() => document.querySelectorAll('.reveal').forEach((element) => {
	if (element.getBoundingClientRect().top < window.innerHeight * 1.2) element.classList.add('visible');
}), 120);

if (!reducedMotion.matches && window.matchMedia('(pointer: fine)').matches) {
	document.addEventListener('pointermove', (event) => {
		body.style.setProperty('--pointer-x', `${event.clientX}px`);
		body.style.setProperty('--pointer-y', `${event.clientY}px`);
	}, { passive: true });
	document.querySelectorAll('[data-tilt]').forEach((card) => {
		card.addEventListener('pointermove', (event) => {
			const bounds = card.getBoundingClientRect();
			const rotateX = ((event.clientY - bounds.top) / bounds.height - 0.5) * -3;
			const rotateY = ((event.clientX - bounds.left) / bounds.width - 0.5) * 3;
			card.style.setProperty('--tilt-transform', `perspective(900px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-4px)`);
		});
		card.addEventListener('pointerleave', () => card.style.removeProperty('--tilt-transform'));
	});
}

const telemetry = document.querySelector('.hero-readout');
const speedReadout = telemetry?.querySelector('span:nth-child(2)');
let telemetryFrame = 0;
const animateTelemetry = () => {
	if (!speedReadout || reducedMotion.matches) return;
	const seconds = performance.now() / 1000;
	const speed = (20 + Math.sin(seconds * 0.9) * 8 + Math.sin(seconds * 0.23) * 3).toFixed(2);
	speedReadout.textContent = `0.00 — ${speed} KM/H`;
	telemetryFrame = window.requestAnimationFrame(animateTelemetry);
};
if (telemetry) {
	telemetry.classList.add('is-live');
	animateTelemetry();
}
window.addEventListener('pagehide', () => window.cancelAnimationFrame(telemetryFrame), { once: true });

const chapters = [
	{ label: '01 / FRAME', title: 'Strength<br>without<br><em>weight.</em>', description: 'Precision carbon architecture engineered to disappear beneath you.', position: 'center' },
	{ label: '02 / DRIVETRAIN', title: 'Power<br>without<br><em>noise.</em>', description: 'Responsive transfer designed for controlled acceleration and long days.', position: '58% 52%' },
	{ label: '03 / BRAKING', title: 'Control<br>when it<br><em>counts.</em>', description: 'Confident stopping performance, tuned for the moments that matter.', position: '42% 48%' },
	{ label: '04 / WHEELS', title: 'Hold the<br><em>line.</em>', description: 'A stable, efficient contact patch for a ride that stays composed.', position: 'center bottom' },
	{ label: '05 / AERODYNAMICS', title: 'Let the<br>air move<br><em>around.</em>', description: 'Airflow-aware geometry that turns speed into a quieter conversation.', position: '60% 40%' },
	{ label: '06 / PERFORMANCE', title: 'Everything<br>in<br><em>balance.</em>', description: 'The complete Aero One. Nothing added. Nothing asking to be noticed.', position: 'center' },
];
const story = document.querySelector('.story-engine');
const copy = document.querySelector('[data-chapter-copy]');
const number = document.querySelector('[data-chapter-number]');
const bike = document.querySelector('[data-story-bike]');
const steps = [...document.querySelectorAll('.story-steps span')];
let chapterIndex = 0;
const renderChapter = (index) => {
	chapterIndex = Math.max(0, Math.min(chapters.length - 1, index));
	const chapter = chapters[chapterIndex];
	if (copy) copy.innerHTML = `<p class="chapter-label">${chapter.label}</p><h2 class="display-v2">${chapter.title}</h2><p class="chapter-description">${chapter.description}</p>`;
	if (number) number.textContent = String(chapterIndex + 1).padStart(2, '0');
	if (bike) { bike.style.backgroundPosition = chapter.position; bike.style.transform = `scale(${1 + chapterIndex * .035}) rotate(${chapterIndex % 2 ? 1 : 0}deg)`; }
	steps.forEach((step, stepIndex) => step.classList.toggle('active', stepIndex === chapterIndex));
};
const syncStory = () => {
	if (!story || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
	const progress = Math.max(0, Math.min(0.999, (window.scrollY - story.offsetTop) / Math.max(1, story.offsetHeight - window.innerHeight)));
	renderChapter(Math.floor(progress * chapters.length));
};
window.addEventListener('scroll', syncStory, { passive: true });
document.querySelector('[data-story-prev]')?.addEventListener('click', () => renderChapter(chapterIndex - 1));
document.querySelector('[data-story-next]')?.addEventListener('click', () => renderChapter(chapterIndex + 1));
steps.forEach((step, index) => step.addEventListener('click', () => renderChapter(index)));
document.querySelectorAll('[data-hotspot]').forEach((hotspot) => hotspot.addEventListener('click', () => {
	const index = { frame: 0, drivetrain: 1, braking: 2, wheels: 3 }[hotspot.dataset.hotspot];
	if (index !== undefined) renderChapter(index);
}));
renderChapter(0);
