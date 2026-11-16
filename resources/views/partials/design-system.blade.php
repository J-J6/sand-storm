    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        html, body { margin: 0; padding: 0; }
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            font-feature-settings: 'liga';
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }
        body { overscroll-behavior: none; }
        a, button, input, textarea, select, summary { transition-duration: 180ms; }
        a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible, select:focus-visible, summary:focus-visible {
            outline: 3px solid rgba(12, 140, 180, 0.4);
            outline-offset: 2px;
        }
        input:not([type="radio"]), textarea, .service-picker summary {
            transition: border-color 180ms ease, box-shadow 180ms ease, background-color 180ms ease;
        }
        input:not([type="radio"]):focus, textarea:focus, .service-picker[open] summary {
            border-color: #0c8cb4;
            box-shadow: 0 0 0 3px rgba(12, 140, 180, 0.14);
        }
        .service-picker[open] fieldset { animation: picker-in 140ms ease-out; }
        @keyframes picker-in {
            from { opacity: 0; transform: translateY(-4px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; }
        }
        html { -webkit-text-size-adjust: 100%; text-size-adjust: 100%; scroll-padding-top: 5.5rem; }
        img, svg, video { max-width: 100%; }
        /* Phones zoom the page when a focused field is smaller than 16px. */
        @media (max-width: 767px) {
            input:not([type="radio"]):not([type="checkbox"]), textarea, select { font-size: 16px !important; }
        }
        main > :first-child { margin-top: 0 !important; }
        main > :last-child { margin-bottom: 0 !important; }
        ::-webkit-scrollbar { display: none; }
        [data-quick-navigation] { transition: opacity 200ms ease, visibility 200ms linear; }
        [data-quick-navigation].is-hidden { opacity: 0; visibility: hidden; pointer-events: none; }
        @media (prefers-reduced-motion: reduce) {
            [data-quick-navigation] { transition: none; }
        }

        @view-transition {
            navigation: auto;
        }

        ::view-transition-old(root) {
            animation: sandstorm-page-exit 140ms cubic-bezier(0.4, 0, 1, 1) both;
        }

        ::view-transition-new(root) {
            animation: sandstorm-page-enter 240ms cubic-bezier(0.2, 0.7, 0.25, 1) both;
        }

        @keyframes sandstorm-page-exit {
            to { opacity: 0; transform: translateY(-5px); }
        }

        @keyframes sandstorm-page-enter {
            from { opacity: 0; transform: translateY(9px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (prefers-reduced-motion: reduce) {
            ::view-transition-old(root),
            ::view-transition-new(root) {
                animation: none;
            }
        }
    </style>

    @vite('resources/css/app.css')
