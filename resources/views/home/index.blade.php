@extends('layouts.app')

@section('title', 'Prima Automotive - Bengkel Cat & Perbaikan Body Mobil Surabaya')
@section('meta_description', 'Bengkel cat mobil dan perbaikan body profesional di Surabaya. Garansi 6-24 bulan, teknisi berpengalaman, hasil standar pabrik. Hubungi kami sekarang!')

@push('styles')
<style>
    :root {
        --pa-orange: #ff6b00;
        --pa-orange-soft: #fff1e7;
        --pa-ink: #111111;
        --pa-muted: #666666;
        --pa-line: #ece7df;
        --pa-cream: #fffaf4;
        --pa-paper: #ffffff;
    }

    html { scroll-padding-top: 92px; }
    body {
        background: #fff !important;
        color: var(--pa-ink);
        text-rendering: geometricPrecision;
    }

    .pa-page {
        min-height: 100vh;
        overflow: hidden;
        background:
            linear-gradient(90deg, rgba(17,17,17,.026) 1px, transparent 1px),
            linear-gradient(180deg, rgba(17,17,17,.026) 1px, transparent 1px),
            radial-gradient(circle at 88% 8%, rgba(255,107,0,.10), transparent 26rem),
            linear-gradient(180deg, #fffaf4 0%, #ffffff 34%, #fffaf4 100%);
        background-size: 76px 76px, 76px 76px, auto, auto;
    }

    .pa-container { width: min(100% - 2rem, 1320px); margin-inline: auto; }
    @media (min-width: 768px) { .pa-container { width: min(100% - 4rem, 1320px); } }

    .pa-noise {
        position: absolute;
        inset: 0;
        pointer-events: none;
        opacity: .18;
        background-image: radial-gradient(rgba(17,17,17,.13) .45px, transparent .45px);
        background-size: 11px 11px;
        mask-image: linear-gradient(to bottom, black 0%, transparent 62%);
    }

    .pa-kicker {
        display: inline-flex;
        align-items: center;
        gap: .7rem;
        color: var(--pa-ink);
        font-size: .72rem;
        font-weight: 950;
        letter-spacing: .22em;
        text-transform: uppercase;
    }
    .pa-kicker::before {
        content: '';
        width: 38px;
        height: 2px;
        background: var(--pa-orange);
        display: inline-block;
    }

    .pa-title {
        color: var(--pa-ink);
        letter-spacing: -.075em;
        text-transform: uppercase;
    }
    .pa-title span,
    .pa-accent-text { color: var(--pa-orange); }

    .pa-section { position: relative; padding-block: 5.75rem; }
    @media (min-width: 1024px) { .pa-section { padding-block: 7.75rem; } }

    .pa-section-line {
        position: absolute;
        inset-inline: 0;
        top: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255,107,0,.42), transparent);
        pointer-events: none;
    }

    .pa-accent-line {
        display: inline-block;
        width: 58px;
        height: 3px;
        background: var(--pa-orange);
        vertical-align: middle;
    }

    .pa-subtle-mark {
        position: absolute;
        pointer-events: none;
        width: 180px;
        height: 180px;
        border: 1px solid rgba(255,107,0,.16);
        border-radius: 999px;
    }
    .pa-subtle-mark::after {
        content: '';
        position: absolute;
        inset: 34px;
        border: 1px solid rgba(255,107,0,.10);
        border-radius: inherit;
    }

    .pa-btn-primary,
    .pa-btn-dark,
    .pa-btn-outline,
    .pa-btn-light {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        border-radius: 0;
        transition: transform .24s ease, box-shadow .24s ease, border-color .24s ease, color .24s ease, background .24s ease;
    }
    .pa-btn-primary::after,
    .pa-btn-dark::after,
    .pa-btn-outline::after,
    .pa-btn-light::after {
        content: '';
        position: absolute;
        inset: 0;
        z-index: -1;
        transform: translateX(-105%) skewX(-18deg);
        transition: transform .46s cubic-bezier(.16,1,.3,1);
        background: rgba(255,255,255,.24);
    }
    .pa-btn-primary:hover::after,
    .pa-btn-dark:hover::after,
    .pa-btn-outline:hover::after,
    .pa-btn-light:hover::after { transform: translateX(105%) skewX(-18deg); }
    .pa-btn-primary { background: var(--pa-orange); color: white; box-shadow: 0 18px 42px rgba(255,107,0,.22); }
    .pa-btn-primary:hover { transform: translateY(-3px); box-shadow: 0 24px 52px rgba(255,107,0,.28); }
    .pa-btn-dark { background: var(--pa-ink); color: white; box-shadow: 0 18px 44px rgba(17,17,17,.15); }
    .pa-btn-dark:hover { transform: translateY(-3px); box-shadow: 0 24px 54px rgba(17,17,17,.22); }
    .pa-btn-outline { background: white; color: var(--pa-ink); border: 1px solid var(--pa-line); }
    .pa-btn-outline:hover { transform: translateY(-3px); border-color: rgba(255,107,0,.48); color: var(--pa-orange); }
    .pa-btn-light { background: rgba(255,255,255,.82); color: var(--pa-ink); border: 1px solid var(--pa-line); backdrop-filter: blur(18px); }
    .pa-btn-light:hover { transform: translateY(-3px); border-color: rgba(255,107,0,.38); }

    .pa-panel {
        background: rgba(255,255,255,.82);
        border: 1px solid rgba(17,17,17,.08);
        box-shadow: 0 26px 76px rgba(17,17,17,.06);
        backdrop-filter: blur(18px);
    }
    .pa-panel-solid {
        background: #fff;
        border: 1px solid rgba(17,17,17,.08);
        box-shadow: 0 20px 58px rgba(17,17,17,.055);
    }
    .pa-hover { transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
    .pa-hover:hover { transform: translateY(-7px); border-color: rgba(255,107,0,.28); box-shadow: 0 30px 82px rgba(17,17,17,.085); }

    .pa-image-zoom { transform: scale(1.03); transition: transform 1.1s cubic-bezier(.16,1,.3,1); }
    .pa-model-card:hover .pa-image-zoom,
    .pa-hero-media:hover .pa-image-zoom { transform: scale(1.08); }

    .pa-image-shade {
        position: absolute;
        inset: 0;
        background:
            linear-gradient(90deg, rgba(0,0,0,.62) 0%, rgba(0,0,0,.26) 42%, rgba(0,0,0,.08) 100%),
            linear-gradient(180deg, rgba(0,0,0,.10) 0%, rgba(0,0,0,.15) 52%, rgba(0,0,0,.70) 100%);
    }
    .pa-media-panel {
        background: rgba(255,255,255,.94);
        border: 1px solid rgba(255,255,255,.58);
        color: var(--pa-ink);
        box-shadow: 0 18px 50px rgba(0,0,0,.18);
        backdrop-filter: blur(18px);
    }
    .pa-media-panel-dark {
        background: rgba(17,17,17,.72);
        border: 1px solid rgba(255,255,255,.16);
        color: #fff;
        box-shadow: 0 18px 50px rgba(0,0,0,.22);
        backdrop-filter: blur(18px);
    }

    .pa-snap-row { scrollbar-width: thin; scrollbar-color: var(--pa-orange) transparent; }
    .pa-snap-row::-webkit-scrollbar { height: 8px; }
    .pa-snap-row::-webkit-scrollbar-thumb { background: var(--pa-orange); border-radius: 999px; }

    .pa-reveal-line {
        position: relative;
        overflow: hidden;
    }
    .pa-reveal-line::after {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--pa-cream);
        transform-origin: right;
        animation: paRevealLine .85s cubic-bezier(.16,1,.3,1) .22s both;
    }

    .pa-loader {
        position: fixed;
        inset: 0;
        z-index: 10000;
        display: grid;
        place-items: center;
        background: #fffaf4;
        transition: opacity .55s ease, visibility .55s ease;
    }
    .pa-loader.is-hidden { opacity: 0; visibility: hidden; }
    .pa-loader-mark { width: min(76vw, 460px); }
    .pa-loader-line { height: 3px; background: #e7e2dc; overflow: hidden; }
    .pa-loader-line span { display: block; height: 100%; width: 42%; background: var(--pa-orange); animation: paLoadSweep 1.15s cubic-bezier(.16,1,.3,1) infinite; }

    #navbar {
        background: rgba(255,250,244,.84) !important;
        border-bottom: 1px solid rgba(17,17,17,.07) !important;
        backdrop-filter: blur(20px);
    }
    #navbar.scrolled {
        background: rgba(255,255,255,.95) !important;
        box-shadow: 0 16px 46px rgba(17,17,17,.075) !important;
    }
    #mobile-menu { transform: translateX(100%); transition: transform .44s cubic-bezier(.16,1,.3,1); }
    #mobile-menu.open { transform: translateX(0); }

    .pa-model-card { transform-style: preserve-3d; }
    .pa-model-card::before {
        content: '';
        position: absolute;
        inset: auto 0 0 0;
        height: 3px;
        background: var(--pa-orange);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .36s cubic-bezier(.16,1,.3,1);
    }
    .pa-model-card:hover::before { transform: scaleX(1); }

    @keyframes paLoadSweep { from { transform: translateX(-120%); } to { transform: translateX(260%); } }
    @keyframes paFloat { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-14px); } }
    @keyframes paScan { 0% { transform: translateX(-120%); opacity: 0; } 25% { opacity: 1; } 100% { transform: translateX(120%); opacity: 0; } }
    @keyframes paRevealLine { to { transform: scaleX(0); } }

    .pa-float { animation: paFloat 5.6s ease-in-out infinite; }
    .pa-scan { animation: paScan 3.6s ease-in-out infinite; }

    @media (prefers-reduced-motion: reduce) {
        *, *::before, *::after { animation-duration: .001ms !important; animation-iteration-count: 1 !important; scroll-behavior: auto !important; transition-duration: .001ms !important; }
    }

    @media (max-width: 767px) {
        .pa-section { padding-block: 4.25rem; }
        .hero-title { font-size: 3.05rem !important; letter-spacing: -.07em !important; }
        .pa-kicker { font-size: .66rem; letter-spacing: .16em; }
        .pa-kicker::before { width: 26px; }
    }
</style>
@endpush

@section('content')
<div id="pa-preloader" class="pa-loader">
    <div class="pa-loader-mark text-center">
        <p class="text-[11px] font-black uppercase tracking-[.36em] text-zinc-500 mb-4">Prima Automotive</p>
        <div class="pa-loader-line"><span></span></div>
        <p class="mt-4 text-4xl md:text-6xl font-black uppercase tracking-[-.08em] text-zinc-950">Refinish<span class="text-orange-500">.</span></p>
    </div>
</div>

<main class="pa-page relative">
    <div class="pa-noise"></div>
    @include('home.partials.hero')
    @include('home.partials.services')
    @include('home.partials.process')
    @include('home.partials.reviews')
    @include('home.partials.about')
    @include('home.partials.location-footer')
</main>
@endsection

@push('scripts')
<script>
window.addEventListener('load', () => {
    const loader = document.getElementById('pa-preloader');
    window.setTimeout(() => loader?.classList.add('is-hidden'), 320);
});

if (window.matchMedia('(pointer:fine)').matches) {
    document.querySelectorAll('[data-pa-tilt]').forEach(card => {
        card.addEventListener('pointermove', event => {
            const rect = card.getBoundingClientRect();
            const x = (event.clientX - rect.left) / rect.width - .5;
            const y = (event.clientY - rect.top) / rect.height - .5;
            card.style.transform = `perspective(1100px) rotateX(${(-y * 2.2).toFixed(2)}deg) rotateY(${(x * 2.2).toFixed(2)}deg) translateY(-4px)`;
        });
        card.addEventListener('pointerleave', () => card.style.transform = '');
    });
}
</script>
@endpush
