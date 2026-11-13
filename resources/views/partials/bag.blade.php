{{-- Standing cement bag illustration. Vars (all optional): body, panel, ink, accent, brand, weight, class --}}
@php
    $body   = $body   ?? '#c9a574';
    $panel  = $panel  ?? '#f2f4f6';
    $ink    = $ink    ?? '#043444';
    $accent = $accent ?? '#3aa4c8';
    $brand  = $brand  ?? 'SANDSTORM';
    $weight = $weight ?? '50 KG';
@endphp
<svg viewBox="0 0 120 170" class="{{ $class ?? 'w-full h-full' }}" role="img" aria-label="{{ $brand }} cement bag">
    <ellipse cx="60" cy="164" rx="46" ry="4" fill="#043444" opacity=".15"/>
    <path d="M20 18 Q60 6 100 18 L109 42 L109 138 L100 156 Q60 166 20 156 L11 138 L11 42 Z" fill="{{ $body }}"/>
    <path d="M20 18 Q60 6 100 18 L109 42 L11 42 Z" fill="#000" opacity=".08"/>
    <path d="M20 156 Q60 166 100 156 L109 138 L11 138 Z" fill="#000" opacity=".08"/>
    <path d="M24 27 H96" stroke="{{ $ink }}" stroke-width="1.2" stroke-dasharray="3 3" opacity=".5"/>
    <path d="M96 20 L109 42 L88 42 Z" fill="#000" opacity=".18"/>
    <path d="M30 44 Q34 92 30 138" stroke="#fff" opacity=".2" stroke-width="3" fill="none"/>
    <rect x="22" y="56" width="76" height="66" rx="3" fill="{{ $panel }}"/>
    <rect x="22" y="56" width="76" height="6" rx="3" fill="{{ $accent }}"/>
    <text x="60" y="82" text-anchor="middle" font-size="8.5" font-weight="700" fill="{{ $ink }}" letter-spacing="1.5" font-family="Space Grotesk, sans-serif">{{ $brand }}</text>
    <rect x="36" y="88" width="48" height="1.6" fill="{{ $accent }}"/>
    <text x="60" y="112" text-anchor="middle" font-size="19" font-weight="700" fill="{{ $ink }}" font-family="JetBrains Mono, monospace">{{ $weight }}</text>
</svg>
