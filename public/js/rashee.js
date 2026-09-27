/*
 * Rashee Enterprises — page behaviour (jQuery + Bootstrap 5).
 * Every page renders complete on the server; this file only adds the
 * interactions from the Claude Design prototypes.
 */
(function ($) {
    'use strict';

    var ICON_X = '<svg class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>';

    function setPressed($btn, on) {
        $btn.attr('aria-pressed', on ? 'true' : 'false');
    }

    /* ------------------------------------------------------------
     * Header: the mobile search button opens the menu and focuses search
     * ------------------------------------------------------------ */
    var focusSearch = false;
    $(document).on('click', '[data-focus-search]', function () { focusSearch = true; });
    $('#site-menu').on('shown.bs.offcanvas', function () {
        if (focusSearch) {
            $(this).find('input[type="search"]').trigger('focus');
            focusSearch = false;
        }
    });

    /* ------------------------------------------------------------
     * Homepage: product family tabs
     * ------------------------------------------------------------ */
    $('[data-family-tabs]').each(function () {
        var $section = $(this);
        var $cards = $section.find('[data-family]');
        var total = $cards.length;

        $section.on('click', '[data-tab]', function () {
            var key = $(this).data('tab');
            $section.find('[data-tab]').each(function () { setPressed($(this), $(this).data('tab') === key); });
            var shown = 0;
            $cards.each(function () {
                var match = key === 'All' || $(this).data('family') === key;
                $(this).prop('hidden', !match);
                if (match) { shown++; }
            });
            $section.find('[data-carousel-hint]').text(shown + ' of ' + total + ' lines · swipe for more');
        });
    });

    /* ------------------------------------------------------------
     * Catalog: filters, search, sort
     * ------------------------------------------------------------ */
    $('[data-catalog]').each(function () {
        var $root = $(this);
        var $grid = $root.find('[data-results]');
        var $cards = $grid.children('[data-card]');
        var total = $cards.length;
        var keys = ['category', 'thickness', 'width', 'colour', 'application'];
        var state = { q: '' };
        var timer = null;

        keys.forEach(function (k) { state[k] = []; });

        // Initial state from the URL (?category=…&q=…), e.g. links from the footer or Industries.
        var params = new URLSearchParams(window.location.search);
        keys.forEach(function (k) {
            params.getAll(k).concat(params.getAll(k + '[]')).forEach(function (v) {
                if (v && state[k].indexOf(v) === -1) { state[k].push(v); }
            });
        });
        state.q = (params.get('q') || '').trim();

        function list(el, attr) {
            var raw = String($(el).data(attr) || '');
            return raw === '' ? [] : raw.split('|');
        }

        function matches(el) {
            var $el = $(el);
            if (state.category.length && state.category.indexOf($el.data('category')) === -1) { return false; }
            if (state.application.length && state.application.indexOf($el.data('application')) === -1) { return false; }
            var colours = list(el, 'colours');
            if (state.colour.length && !state.colour.some(function (c) { return colours.indexOf(c) !== -1; })) { return false; }
            var microns = list(el, 'micron').map(Number);
            if (state.thickness.length) {
                var hit = state.thickness.some(function (band) {
                    return microns.some(function (m) {
                        if (band === '38–42µ') { return m >= 38 && m <= 42; }
                        if (band === '45–50µ') { return m >= 45 && m <= 50; }
                        if (band === '50µ and above') { return m >= 50; }
                        return false;
                    });
                });
                if (!hit) { return false; }
            }
            var widths = list(el, 'width').map(Number);
            if (state.width.length && !state.width.some(function (w) { return widths.indexOf(parseInt(w, 10)) !== -1; })) { return false; }
            if (state.q) {
                var hay = String($el.data('search'));
                var ok = state.q.toLowerCase().split(/\s+/).every(function (t) { return hay.indexOf(t.replace(/micron/, 'µ')) !== -1 || hay.indexOf(t) !== -1; });
                if (!ok) { return false; }
            }
            return true;
        }

        function sortKey(el, how) {
            var min = function (vals) { return vals.length ? Math.min.apply(null, vals) : 9999; };
            if (how === 'price') { return Number($(el).data('price')); }
            if (how === 'thickness') { return min(list(el, 'micron').map(Number)); }
            if (how === 'width') { return min(list(el, 'width').map(Number)); }
            return Number($(el).data('order'));
        }

        function activePills() {
            var pills = [];
            keys.forEach(function (k) {
                state[k].forEach(function (v) { pills.push({ key: k, value: v, label: v }); });
            });
            if (state.q) { pills.push({ key: 'q', value: state.q, label: '“' + state.q + '”' }); }
            return pills;
        }

        function syncUrl() {
            var p = new URLSearchParams();
            keys.forEach(function (k) { state[k].forEach(function (v) { p.append(k, v); }); });
            if (state.q) { p.set('q', state.q); }
            var qs = p.toString();
            window.history.replaceState(null, '', window.location.pathname + (qs ? '?' + qs : ''));
        }

        function render(animate) {
            var shown = 0;
            $cards.each(function () {
                var ok = matches(this);
                $(this).prop('hidden', !ok);
                if (ok) { shown++; }
            });

            var pills = activePills();
            var n = pills.length;
            var line = shown + ' of ' + total + ' stock lines' + (n ? ' · ' + n + ' filter' + (n > 1 ? 's' : '') + ' applied' : ' · every line printable from 1 box');

            $root.find('[data-filter]').each(function () {
                var $b = $(this);
                setPressed($b, state[$b.data('filter')].indexOf(String($b.data('value'))) !== -1);
            });
            $root.find('[data-active-pills]').html(pills.map(function (p) {
                return '<button type="button" class="apill" data-remove="' + p.key + '" data-value="' + $('<i>').text(p.value).html() + '" aria-label="Remove filter ' + $('<i>').text(p.label).html() + '">' + $('<i>').text(p.label).html() + ICON_X + '</button>';
            }).join(''));
            $root.find('[data-active-count]').text(n || '');
            $root.find('[data-apply]').text('Show ' + shown + ' line' + (shown === 1 ? '' : 's'));
            $root.find('[data-empty]').prop('hidden', shown !== 0);
            $grid.prop('hidden', shown === 0);

            if (animate) {
                $root.addClass('is-updating');
                $root.find('[data-result-line]').text('Updating results…');
                clearTimeout(timer);
                timer = setTimeout(function () {
                    $root.removeClass('is-updating');
                    $root.find('[data-result-line]').text(line);
                }, 620);
            } else {
                $root.find('[data-result-line]').text(line);
            }
        }

        $root.on('click', '[data-filter]', function () {
            var k = $(this).data('filter');
            var v = String($(this).data('value'));
            var i = state[k].indexOf(v);
            if (i === -1) { state[k].push(v); } else { state[k].splice(i, 1); }
            syncUrl();
            render(true);
        });

        $root.on('click', '[data-remove]', function () {
            var k = $(this).data('remove');
            var v = String($(this).data('value'));
            if (k === 'q') { state.q = ''; } else { state[k] = state[k].filter(function (x) { return x !== v; }); }
            syncUrl();
            render(true);
        });

        $root.on('click', '[data-clear]', function () {
            keys.forEach(function (k) { state[k] = []; });
            state.q = '';
            syncUrl();
            render(true);
        });

        $root.on('change', '[data-sort]', function () {
            var how = $(this).val();
            $root.find('[data-sort]').val(how);
            var sorted = $cards.get().sort(function (a, b) { return sortKey(a, how) - sortKey(b, how); });
            $grid.append(sorted);
            render(true);
        });

        // The catalog-empty enquiry carries the filter combination as its spec.
        $root.on('click', '[data-spec-from-filters]', function () {
            $(this).attr('data-spec', activePills().map(function (p) { return p.label; }).join(' · '));
        });

        render(false);
    });

    /* ------------------------------------------------------------
     * Product page: spec chips, pack sizes, gallery
     * ------------------------------------------------------------ */
    $('[data-pdp]').each(function () {
        var cfg = $(this).data('pdp');
        var state = $.extend({}, cfg.defaults);
        var pack = cfg.pack;
        var axes = Object.keys(cfg.defaults);

        function hasStock() {
            if (cfg.custom || pack === 'Bulk Pallet' || $.isEmptyObject(cfg.stock)) { return false; }
            return axes.every(function (a) { return !cfg.stock[a] || cfg.stock[a].indexOf(state[a]) !== -1; });
        }

        function skuCode() {
            var nums = axes.map(function (a) { return String(state[a]).replace(/[^\d]/g, ''); }).filter(Boolean);
            var body = nums.length >= 2 ? nums[0] + nums[1] + (nums.length > 2 ? '-' + nums.slice(2).join('-') : '') : nums.join('-');
            return 'RS-' + cfg.skuCode + '-' + body + (state.Colour ? '-' + state.Colour.slice(0, 2).toUpperCase() : '');
        }

        function update() {
            var inStock = hasStock();
            var sku = cfg.skuName + ' ' + axes.map(function (a) { return state[a]; }).join(' · ') + ' · ' + pack;

            $('[data-sku]').text(sku);
            $('[data-sku-code]').text(skuCode());
            $('[data-price]').text(inStock ? cfg.price : 'Priced to spec');
            $('[data-price-note]').text(inStock ? cfg.priceNote : 'Made to order. Quoted on spec, artwork and quantity — usually within one working day.');
            $('[data-avail]').toggleClass('avail--order', !inStock);
            $('[data-avail-title]').text(inStock ? 'In stock — dispatches in 24 hours' : 'Available to order — made to your spec');
            $('[data-avail-body]').text(inStock
                ? 'Held at the Mumbai plant. The marketplace links below carry this exact variant.'
                : (cfg.custom
                    ? 'Every printed run is produced for your artwork, so this is made to order. Typical lead time is 5–7 working days after proof approval.'
                    : 'This combination is not held in stock, so we produce it for you. Enquire for lead time and pricing — typically 5–7 working days.'));

            $('[data-template]').each(function () {
                var tpl = String($(this).data('template'));
                $(this).text(tpl.replace(/\{([^}]+)\}/g, function (m, key) {
                    if (key === 'rolls') { return state.Width === '24mm' ? '72' : '36'; }
                    return state[key] || '';
                }));
            });
            $('[data-spec-caption]').text(axes.filter(function (a) { return a !== 'Colour'; }).map(function (a) { return state[a]; }).join(' · '));

            $('[data-bands]').each(function () {
                $(this).toggleClass('is-on', String($(this).data('bands')).split('|').indexOf(state.Micron) !== -1);
            });

            var wa = $('[data-whatsapp]').first().attr('href') || '';
            if (wa.indexOf('wa.me') !== -1) {
                $('[data-whatsapp]').attr('href', wa.split('?')[0] + '?text=' + encodeURIComponent('Hello Rashee, I would like a quote for ' + cfg.name + ': ' + sku + '.'));
            }
        }

        $(document).on('click', '[data-axis]', function () {
            var axis = $(this).data('axis');
            state[axis] = String($(this).data('value'));
            $('[data-axis="' + axis + '"]').each(function () { setPressed($(this), String($(this).data('value')) === state[axis]); });
            update();
        });

        $(document).on('click', '[data-pack]', function () {
            pack = String($(this).data('pack'));
            $('[data-pack]').each(function () { setPressed($(this), String($(this).data('pack')) === pack); });
            update();
        });

        $(document).on('click', '[data-view]', function () {
            var $t = $(this);
            var $main = $('[data-gallery-main]');
            $main.removeClass('view-0 view-1 view-2 view-3').addClass('view-' + $t.data('view')).attr('aria-label', $t.data('alt'));
            $('[data-gallery-shot]').text($t.data('shot'));
            $('[data-gallery-alt]').text($t.data('alt'));
            $('[data-view]').each(function () { setPressed($(this), this === $t[0]); });
        });
    });

    /* ------------------------------------------------------------
     * Industries: sector tabs and tiles
     * ------------------------------------------------------------ */
    $('[data-sectors]').each(function () {
        var $section = $(this);

        function select(slug, scroll) {
            var $panel = $('#' + slug + '.sector');
            if (!$panel.length) { return; }
            $section.find('.sector').prop('hidden', true);
            $panel.prop('hidden', false);
            $section.find('[data-sector]').each(function () {
                var on = $(this).data('sector') === slug;
                setPressed($(this), on);
                $(this).attr('aria-selected', on ? 'true' : 'false');
            });
            $('[data-sector-tile]').each(function () { $(this).toggleClass('is-selected', $(this).data('sector-tile') === slug); });
            if (scroll) { $section[0].scrollIntoView({ behavior: 'smooth', block: 'start' }); }
        }

        $section.on('click', '[data-sector]', function () {
            select($(this).data('sector'), false);
            window.history.replaceState(null, '', '#' + $(this).data('sector'));
        });

        $(document).on('click', '[data-sector-tile]', function (e) {
            e.preventDefault();
            var slug = $(this).data('sector-tile');
            window.history.replaceState(null, '', '#' + slug);
            select(slug, true);
        });

        var hash = window.location.hash.replace('#', '');
        select(hash && $('#' + hash + '.sector').length ? hash : $section.find('.sector').first().attr('id'), !!hash);
    });

    /* ------------------------------------------------------------
     * Enquiries: modal context, AJAX submit, WhatsApp hand-off
     * ------------------------------------------------------------ */
    var $modal = $('#enquiry');
    var defaultAbout = $modal.find('[data-about-product]').text();
    var defaultSpec = $modal.find('[data-about-spec]').text();

    function setState($scope, s) {
        $scope.attr('data-state', s);
    }

    function clearErrors($form) {
        $form.find('.field').removeClass('has-error');
        $form.find('[data-error]').text('');
        $form.find('[data-alert]').prop('hidden', true);
    }

    function whatsappText($form) {
        var get = function (n) { return $.trim($form.find('[name="' + n + '"]').val() || ''); };
        var parts = ['Hello Rashee, I would like a quote.'];
        if (get('product')) { parts.push('Product: ' + get('product')); }
        if (get('spec')) { parts.push('Spec: ' + get('spec')); }
        if (get('quantity')) { parts.push('Quantity: ' + get('quantity')); }
        if (get('box_weight')) { parts.push('Box weight: ' + get('box_weight')); }
        if (get('message')) { parts.push('Notes: ' + get('message')); }
        return parts.join('\n');
    }

    function refreshWhatsapp($form) {
        $form.find('[data-whatsapp-enquiry]').each(function () {
            var href = $(this).attr('href');
            if (href.indexOf('wa.me') !== -1) {
                $(this).attr('href', href.split('?')[0] + '?text=' + encodeURIComponent(whatsappText($form)));
            }
        });
    }

    function refreshSteps($form) {
        var filled = function (n) { return $.trim($form.find('[name="' + n + '"]').val() || '') !== ''; };
        var step = filled('email') || filled('message') ? 3 : (filled('quantity') || filled('box_weight') ? 2 : 1);
        $form.find('[data-step]').each(function () {
            var n = Number($(this).data('step'));
            $(this).toggleClass('is-current', n === step).toggleClass('is-done', n < step);
        });
    }

    $(document).on('click', '[data-enquire]', function () {
        var $t = $(this);
        var $form = $modal.find('form');
        var product = $t.data('product') || '';
        var spec = $t.data('spec') || '';

        if ($t.is('[data-spec-from-page]') && $('[data-sku]').length) {
            spec = $('[data-sku]').first().text();
        }

        setState($modal.find('.modal-content'), 'form');
        clearErrors($form);
        $form.find('[name="product"]').val(product);
        $form.find('[name="spec"]').val(spec);
        if ($t.data('note')) { $form.find('[name="message"]').val($t.data('note')); }
        $modal.find('[data-about-product]').text(product || defaultAbout);
        $modal.find('[data-about-spec]').text(spec ? spec + '. Loaded from your selection — edit anything below.' : defaultSpec);
        refreshSteps($form);
        refreshWhatsapp($form);

        bootstrap.Modal.getOrCreateInstance($modal[0]).show();
    });

    $modal.on('shown.bs.modal', function () {
        $modal.find('[name="quantity"]').trigger('focus');
    });

    $(document).on('input change', '[data-enquiry-form] :input', function () {
        var $form = $(this).closest('form');
        refreshSteps($form);
        refreshWhatsapp($form);
        $(this).closest('.field').removeClass('has-error').find('[data-error]').text('');
    });

    // Contact page topic chips write into the hidden product field.
    $(document).on('click', '[data-topic]', function () {
        var topic = String($(this).data('topic'));
        $('[data-topic]').each(function () { setPressed($(this), String($(this).data('topic')) === topic); });
        $('[data-topic-input]').val(topic).trigger('change');
    });

    $(document).on('submit', '[data-enquiry-form]', function (e) {
        e.preventDefault();
        var $form = $(this);
        var $scope = $form.closest('[data-state]');
        var $submit = $form.find('[type="submit"]');

        clearErrors($form);
        $submit.prop('disabled', true);

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: $form.serialize(),
            headers: { Accept: 'application/json' }
        }).done(function (res) {
            $scope.find('[data-ref]').text(res.reference);
            $scope.find('[data-summary]').text(res.summary || $form.find('[name="product"]').val() || 'Your enquiry');
            refreshWhatsapp($form);
            setState($scope, 'success');
            if (!$form.is('[data-inline]')) {
                $form.find('input:not([type=hidden]), textarea').val('');
            }
        }).fail(function (xhr) {
            var errors = (xhr.responseJSON && xhr.responseJSON.errors) || {};
            var names = Object.keys(errors);
            names.forEach(function (name) {
                var $input = $form.find('[name="' + name + '"]');
                $input.closest('.field').addClass('has-error');
                $form.find('[data-error="' + name + '"]').text(errors[name][0]);
            });
            $form.find('[data-alert-text]').text(names.length
                ? (names.length === 1 ? 'One field needs' : (names.length === 2 ? 'Two fields need' : 'Some fields need')) + ' attention before we can route this to the right specialist.'
                : 'We could not send that just now. Please try again, or reach us on WhatsApp or email.');
            $form.find('[data-alert]').prop('hidden', false);
            if (names.length) { $form.find('[name="' + names[0] + '"]').trigger('focus'); }
        }).always(function () {
            $submit.prop('disabled', false);
        });
    });

    // "Send another enquiry" on the contact page resets in place.
    $(document).on('click', '[data-reset]', function (e) {
        var $scope = $(this).closest('[data-state]');
        if (!$scope.length) { return; }
        e.preventDefault();
        var $form = $scope.find('form');
        $form.find('input:not([type=hidden]), textarea').val('');
        clearErrors($form);
        setState($scope, 'form');
    });
})(jQuery);
