/*
    Anvil — the interaction layer.

    Everything here is a progressive enhancement. Without JavaScript nothing is
    hidden, every link works, and the ledger simply sits still with its rows
    and its count in place. With it the page gains the phone menu, scroll
    reveals, and the ledger's beat. Reduced motion turns the beat off.

    setUp(root) owns everything inside <main>. It runs once on load and again
    after every instant navigation for the swapped-in <main>, stopping the old
    page's timers first. The header binds once — it persists across pages.
*/

document.documentElement.classList.add('js');

var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// Timers the current page owns, cleared before the next one sets up.
var timers = [];
var revealObserver = null;
var revealWatched = [];
var darkSections = [];

mobileMenu();
headerTheme();
setUp(document);

document.addEventListener('instant:navigated', function (event) {
    closeMobileMenu();
    setUp(event.detail.main);
});

function setUp(root) {
    tearDown();

    reveals(root);
    rails(root);
    ledger(root);
    darkSections = Array.prototype.slice.call(document.querySelectorAll('[data-dark]'));
    paintHeader();
}

function tearDown() {
    timers.forEach(function (stop) { stop(); });
    timers = [];

    if (revealObserver) {
        revealWatched = revealWatched.filter(function (el) {
            if (el.isConnected && !el.classList.contains('is-visible')) {
                return true;
            }
            revealObserver.unobserve(el);
            return false;
        });
    }
}

/* Runs fn every ms while the element is on screen and the tab is visible; returns a stop function. */
function whileVisible(el, ms, fn) {
    if (reduceMotion || !('IntersectionObserver' in window)) {
        return;
    }

    var onScreen = false;
    var handle = null;

    function start() {
        if (handle || !onScreen || document.hidden) {
            return;
        }
        handle = setInterval(fn, ms);
    }

    function stop() {
        if (handle) {
            clearInterval(handle);
            handle = null;
        }
    }

    var observer = new IntersectionObserver(function (entries) {
        onScreen = entries[0].isIntersecting;
        onScreen ? start() : stop();
    }, { threshold: 0.2 });

    function onVisibility() {
        document.hidden ? stop() : start();
    }

    observer.observe(el);
    document.addEventListener('visibilitychange', onVisibility);

    timers.push(function () {
        stop();
        observer.disconnect();
        document.removeEventListener('visibilitychange', onVisibility);
    });
}

function mobileMenu() {
    var header = document.getElementById('header');
    var toggle = header && header.querySelector('[data-menu-toggle]');

    if (!toggle) {
        return;
    }

    toggle.addEventListener('click', function () {
        var open = header.toggleAttribute('data-menu-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && header.hasAttribute('data-menu-open')) {
            closeMobileMenu();
            toggle.focus();
        }
    });

    window.matchMedia('(min-width: 64rem)').addEventListener('change', closeMobileMenu);
}

/*
    The header floats over gray, white and black in turn. Whenever a section
    marked data-dark is crossing the line the header sits on, the wordmark and
    the button swap grounds — nothing else about the header moves.
*/
function headerTheme() {
    var pending = false;

    function onScroll() {
        if (pending) {
            return;
        }

        pending = true;

        requestAnimationFrame(function () {
            pending = false;
            paintHeader();
        });
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);
}

function paintHeader() {
    var header = document.getElementById('header');

    if (!header) {
        return;
    }

    var line = header.getBoundingClientRect().top + header.getBoundingClientRect().height / 2;

    var over = darkSections.some(function (el) {
        var box = el.getBoundingClientRect();

        return box.top <= line && box.bottom >= line;
    });

    header.toggleAttribute('data-over-dark', over);
}

function closeMobileMenu() {
    var header = document.getElementById('header');
    var toggle = header && header.querySelector('[data-menu-toggle]');

    if (header) {
        header.removeAttribute('data-menu-open');
    }

    if (toggle) {
        toggle.setAttribute('aria-expanded', 'false');
    }
}

/* Elements marked data-reveal fade and rise once as they scroll into view. */
function reveals(root) {
    var targets = Array.prototype.slice.call(root.querySelectorAll('[data-reveal]'));

    if (reduceMotion || !('IntersectionObserver' in window)) {
        targets.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }

    if (!revealObserver) {
        revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.1 });
    }

    targets.forEach(function (el) {
        revealObserver.observe(el);
        revealWatched.push(el);
    });
}

/*
    The run rail. The two buttons page it by one card, and disable themselves
    at each end. Swiping and keyboard scrolling work with or without them.
*/
function rails(root) {
    root.querySelectorAll('[data-rail]').forEach(function (wrap) {
        var rail = wrap.querySelector('.rail');
        var prev = wrap.querySelector('[data-rail-prev]');
        var next = wrap.querySelector('[data-rail-next]');
        var card = rail && rail.firstElementChild;

        if (!rail || !prev || !next || !card) {
            return;
        }

        function step() {
            return card.getBoundingClientRect().width + 24;
        }

        function page(direction) {
            rail.scrollBy({ left: direction * step(), behavior: reduceMotion ? 'auto' : 'smooth' });
        }

        function paint() {
            prev.disabled = rail.scrollLeft < 8;
            next.disabled = rail.scrollLeft > rail.scrollWidth - rail.clientWidth - 8;
        }

        prev.addEventListener('click', function () { page(-1); });
        next.addEventListener('click', function () { page(1); });
        rail.addEventListener('scroll', paint, { passive: true });
        paint();
    });
}

/*
    The strike ledger. On every beat the top queued row is struck through and
    stamped, then moved across to the cleared column while a copy rejoins the
    back of the queue and the counter ticks up. The cleared column keeps the
    four most recent rows. Nothing here runs under reduced motion — the markup
    already renders a full, legible ledger on its own.
*/
function ledger(root) {
    root.querySelectorAll('[data-ledger]').forEach(function (el) {
        var queue = el.querySelector('[data-ledger-queue]');
        var cleared = el.querySelector('[data-ledger-cleared]');
        var count = el.querySelector('[data-ledger-count]');
        var total = count ? parseInt(count.getAttribute('data-start') || '0', 10) : 0;

        if (!queue || !cleared || queue.children.length < 2) {
            return;
        }

        whileVisible(el, 2600, function () {
            var row = queue.firstElementChild;

            if (!row) {
                return;
            }

            var copy = row.cloneNode(true);
            row.setAttribute('data-done', '');

            setTimeout(function () {
                row.setAttribute('data-state', 'leaving');

                setTimeout(function () {
                    queue.appendChild(copy);
                    row.removeAttribute('data-state');
                    cleared.prepend(row);
                    row.setAttribute('data-state', 'entering');

                    requestAnimationFrame(function () {
                        requestAnimationFrame(function () {
                            row.removeAttribute('data-state');
                        });
                    });

                    while (cleared.children.length > 4) {
                        cleared.lastElementChild.remove();
                    }

                    if (count) {
                        total += 1;
                        count.textContent = total.toLocaleString('en-US');
                    }
                }, 450);
            }, 700);
        });
    });
}
