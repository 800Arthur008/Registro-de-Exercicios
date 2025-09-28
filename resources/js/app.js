import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Theme toggle (light/dark) persisting preference in localStorage
const THEME_KEY = 'themePreference';
const DARK_CLASS = 'dark';

function applyTheme(theme) {
	const html = document.documentElement;
	if (theme === 'dark') {
		html.classList.add(DARK_CLASS);
		document.body.classList.remove('bg-[#FDFDFC]');
	} else {
		html.classList.remove(DARK_CLASS);
		// ensure body has light bg utility (tailwind class on body element in Blade)
		document.body.classList.add('bg-[#FDFDFC]');
	}
	const icon = document.getElementById('theme-toggle-icon');
	if (icon) icon.textContent = theme === 'dark' ? '🌙' : '☀️';
}

function detectInitialTheme() {
	const stored = localStorage.getItem(THEME_KEY);
	if (stored === 'dark' || stored === 'light') return stored;
	// fall back to prefers-color-scheme
	const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
	return prefersDark ? 'dark' : 'light';
}

function toggleTheme() {
	const current = document.documentElement.classList.contains(DARK_CLASS) ? 'dark' : 'light';
	const next = current === 'dark' ? 'light' : 'dark';
	localStorage.setItem(THEME_KEY, next);
	applyTheme(next);
}

document.addEventListener('DOMContentLoaded', () => {
	// apply initial
	applyTheme(detectInitialTheme());

	const btn = document.getElementById('theme-toggle');
	if (btn) btn.addEventListener('click', (e) => {
		e.preventDefault();
		toggleTheme();
	});
});
