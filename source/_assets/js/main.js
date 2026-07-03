import Alpine from 'alpinejs';

window.Alpine = Alpine;

// --- Site exploration tracking -------------------------------------------
// Canonical top-level pages that count towards "exploration".
const SITE_PAGES = ['/', '/proyectos', '/servicios', '/seguridad', '/nosotros', '/contacto'];
const VISITED_KEY = 'jezga_visited';

function sectionFor(pathname) {
    let path = pathname;
    if (path.length > 1 && path.endsWith('/')) path = path.slice(0, -1);
    // Detail pages count toward their parent section.
    if (path.startsWith('/proyectos')) return '/proyectos';
    if (path.startsWith('/servicios')) return '/servicios';
    return path;
}

function readVisited() {
    try {
        return new Set(JSON.parse(localStorage.getItem(VISITED_KEY) || '[]'));
    } catch (e) {
        return new Set();
    }
}

// Record the current page as visited (runs on every page load).
(function recordVisit() {
    const key = sectionFor(window.location.pathname);
    if (!SITE_PAGES.includes(key)) return;
    const visited = readVisited();
    visited.add(key);
    try {
        localStorage.setItem(VISITED_KEY, JSON.stringify([...visited]));
    } catch (e) { /* storage unavailable */ }
})();

// Monitor bar: shows how much of the site the visitor has explored.
Alpine.data('siteExplorer', () => ({
    total: SITE_PAGES.length,
    visited: 0,
    shown: 0, // animated percent value (drives both bar width and number)

    init() {
        this.visited = [...readVisited()].filter((p) => SITE_PAGES.includes(p)).length;
        // Animate the bar + number from 0 up to the real value on load.
        this.$nextTick(() => setTimeout(() => this.animate(this.percent), 250));
    },

    animate(target) {
        const start = performance.now();
        const duration = 1400;
        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3); // easeOutCubic
            this.shown = target * eased;
            if (progress < 1) {
                requestAnimationFrame(tick);
            } else {
                this.shown = target;
            }
        };
        requestAnimationFrame(tick);
    },

    get percent() {
        return Math.round((this.visited / this.total) * 100);
    },

    get label() {
        return Math.round(this.shown) + '%';
    },
}));

// Animated number counter: counts up from 0 to `target` when scrolled into view.
Alpine.data('counter', (target, options = {}) => ({
    value: 0,
    started: false,
    decimals: options.decimals ?? 0,
    prefix: options.prefix ?? '',
    suffix: options.suffix ?? '',
    duration: options.duration ?? 1600,

    init() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting && !this.started) {
                    this.started = true;
                    this.run(target);
                    observer.disconnect();
                }
            });
        }, { threshold: 0.4 });
        observer.observe(this.$el);
    },

    run(target) {
        const start = performance.now();
        const tick = (now) => {
            const progress = Math.min((now - start) / this.duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3); // easeOutCubic
            this.value = target * eased;
            if (progress < 1) {
                requestAnimationFrame(tick);
            } else {
                this.value = target;
            }
        };
        requestAnimationFrame(tick);
    },

    get display() {
        return this.prefix + this.value.toFixed(this.decimals) + this.suffix;
    },
}));

// Projects listing: category filter + live search.
// Reads its data from a JSON <script> tag rendered by Jigsaw.
Alpine.data('projectsList', () => ({
    cat: 'todos',
    q: '',
    items: [],

    init() {
        const data = document.getElementById('projects-data');
        if (data) {
            this.items = JSON.parse(data.textContent);
        }
    },

    get filtered() {
        const query = this.q.trim().toLowerCase();
        return this.items.filter((item) =>
            (this.cat === 'todos' || item.filter === this.cat) &&
            item.title.toLowerCase().includes(query)
        );
    },
}));

Alpine.start();
