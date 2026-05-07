<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        use App\Models\SiteSetting;
        $seoTitle    = SiteSetting::get('seo_title', 'Prima Automotive - Bengkel Cat & Perbaikan Body Mobil Surabaya');
        $seoDesc     = SiteSetting::get('seo_description', 'Bengkel cat mobil dan perbaikan body profesional di Surabaya.');
        $seoKeywords = SiteSetting::get('seo_keywords', '');
        $seoOgImage  = SiteSetting::get('seo_og_image', '');
        $seofavicon  = SiteSetting::get('seo_favicon', '');
        $siteName    = SiteSetting::get('site_name', 'Prima Automotive');
        $waNumber    = SiteSetting::get('contact_whatsapp', '6287853722011');
    @endphp

    <title>@yield('title', $seoTitle)</title>
    <meta name="description" content="@yield('meta_description', $seoDesc)">
    @if($seoKeywords)<meta name="keywords" content="{{ $seoKeywords }}">@endif
    <meta property="og:title"       content="@yield('title', $seoTitle)">
    <meta property="og:description" content="@yield('meta_description', $seoDesc)">
    <meta property="og:type"        content="website">
    <meta property="og:site_name"   content="{{ $siteName }}">
    @if($seoOgImage)<meta property="og:image" content="{{ url($seoOgImage) }}">@endif
    <meta name="twitter:card"  content="summary_large_image">
    @if($seofavicon)<link rel="icon" href="{{ $seofavicon }}">@endif
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#e67e22','primary-dark':'#d35400',navy:'#0a1628','navy-light':'#1e3a5f'},fontFamily:{sans:['Inter','sans-serif']}}}}</script>

    <style>
        *,*::before,*::after{box-sizing:border-box}html{scroll-behavior:smooth}body{font-family:'Inter',sans-serif;overflow-x:hidden}
        @keyframes fadeInUp{from{opacity:0;transform:translateY(40px)}to{opacity:1;transform:translateY(0)}}
        @keyframes fadeInLeft{from{opacity:0;transform:translateX(-50px)}to{opacity:1;transform:translateX(0)}}
        @keyframes fadeInRight{from{opacity:0;transform:translateX(50px)}to{opacity:1;transform:translateX(0)}}
        @keyframes pulse-ring{0%{transform:scale(1);opacity:.8}70%,100%{transform:scale(1.4);opacity:0}}
        @keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
        @keyframes shimmer{0%{background-position:-200% 0}100%{background-position:200% 0}}
        @keyframes gradientShift{0%,100%{background-position:0% 50%}50%{background-position:100% 50%}}
        @keyframes particleFloat{0%{transform:translateY(100vh) rotate(0deg);opacity:0}10%,90%{opacity:1}100%{transform:translateY(-100px) rotate(720deg);opacity:0}}
        .anim-fade-left{animation:fadeInLeft .7s ease-out both}.anim-fade-right{animation:fadeInRight .7s ease-out both}.anim-fade-up{animation:fadeInUp .7s ease-out both}.anim-float{animation:float 4s ease-in-out infinite}
        .delay-100{animation-delay:.1s}.delay-200{animation-delay:.2s}.delay-300{animation-delay:.3s}.delay-400{animation-delay:.4s}.delay-500{animation-delay:.5s}.delay-600{animation-delay:.6s}
        .reveal{opacity:0;transform:translateY(40px);transition:opacity .7s ease,transform .7s ease}.reveal-left{opacity:0;transform:translateX(-50px);transition:opacity .7s ease,transform .7s ease}.reveal-right{opacity:0;transform:translateX(50px);transition:opacity .7s ease,transform .7s ease}.reveal-scale{opacity:0;transform:scale(.85);transition:opacity .6s ease,transform .6s ease}
        .reveal.visible,.reveal-left.visible,.reveal-right.visible,.reveal-scale.visible{opacity:1;transform:none}
        #navbar{transition:all .35s ease}#navbar.scrolled{box-shadow:0 4px 30px rgba(0,0,0,.1)}
        .hero-bg{background:linear-gradient(135deg,#0a1628 0%,#1e3a5f 60%,#0a2a4a 100%);background-size:300% 300%;animation:gradientShift 8s ease infinite}
        .hero-particles{position:absolute;inset:0;overflow:hidden;pointer-events:none}
        .particle{position:absolute;width:6px;height:6px;border-radius:50%;background:rgba(230,126,34,.4);animation:particleFloat linear infinite}
        .stats-card{background:rgba(255,255,255,.08);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,.15);transition:transform .3s ease,background .3s ease}
        .stats-card:hover{transform:translateY(-4px) scale(1.04);background:rgba(255,255,255,.14)}
        .btn-lift{transition:transform .2s ease,box-shadow .2s ease}.btn-lift:hover{transform:translateY(-3px);box-shadow:0 8px 25px rgba(230,126,34,.45)}.btn-lift:active{transform:translateY(-1px)}
        .phone-pulse{position:relative}.phone-pulse::before{content:'';position:absolute;inset:-4px;border-radius:8px;background:rgba(255,255,255,.3);animation:pulse-ring 2s ease-out infinite}
        .tracking-card{background:rgba(255,255,255,.97);backdrop-filter:blur(16px);border-radius:20px;box-shadow:0 25px 60px rgba(0,0,0,.25)}
        .review-card{transition:transform .3s ease,box-shadow .3s ease}.review-card:hover{transform:translateY(-6px);box-shadow:0 20px 50px rgba(0,0,0,.12)}
        .service-card{transition:transform .35s ease,box-shadow .35s ease;overflow:hidden}.service-card:hover{transform:translateY(-8px);box-shadow:0 30px 60px rgba(0,0,0,.15)}
        .service-card .service-details{max-height:0;overflow:hidden;opacity:0;transition:max-height .4s ease,opacity .4s ease}.service-card:hover .service-details,.service-card.expanded .service-details{max-height:300px;opacity:1}
        .service-icon-bg{transition:transform .5s ease}.service-card:hover .service-icon-bg{transform:scale(1.08)}
        .process-step{position:relative}.process-step::after{content:'';position:absolute;top:32px;left:calc(50% + 40px);width:calc(100% - 80px);height:2px;background:linear-gradient(90deg,#e67e22,rgba(230,126,34,.2))}.process-step:last-child::after{display:none}
        .step-number{transition:transform .3s ease,box-shadow .3s ease}.process-step:hover .step-number{transform:scale(1.15) rotate(5deg);box-shadow:0 8px 25px rgba(230,126,34,.5)}
        .about-card{background:rgba(255,255,255,.97);backdrop-filter:blur(16px);border-radius:24px;box-shadow:0 30px 80px rgba(0,0,0,.1)}
        .jatidiri-card{transition:transform .3s ease}.jatidiri-card:hover{transform:scale(1.03)}
        .value-card{transition:transform .3s ease,box-shadow .3s ease}.value-card:hover{transform:translateY(-5px);box-shadow:0 15px 40px rgba(0,0,0,.1)}
        .value-icon{transition:transform .3s ease,background .3s ease}.value-card:hover .value-icon{transform:scale(1.15) rotate(10deg);background:#e67e22}.value-card:hover .value-icon svg{color:white!important;stroke:white}
        #mobile-menu{transform:translateX(100%);transition:transform .35s cubic-bezier(.16,1,.3,1)}#mobile-menu.open{transform:translateX(0)}
        .wa-float{animation:float 3s ease-in-out infinite;box-shadow:0 8px 25px rgba(37,211,102,.45);transition:transform .2s ease,box-shadow .2s ease}.wa-float:hover{transform:scale(1.1) translateY(-4px);box-shadow:0 15px 35px rgba(37,211,102,.6)}
        .text-shimmer{background:linear-gradient(90deg,#e67e22 0%,#f39c12 30%,#fff 50%,#f39c12 70%,#e67e22 100%);background-size:200% auto;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmer 3s linear infinite}
        .scroll-indicator{animation:float 2s ease-in-out infinite}
        #scroll-progress{position:fixed;top:0;left:0;height:3px;background:linear-gradient(90deg,#e67e22,#f39c12);z-index:9999;transition:width .1s linear}
        @media(max-width:768px){.process-step::after{display:none}.hero-title{font-size:2.2rem}}
    </style>
    @stack('styles')

    {{-- ===== INJECTED SCRIPTS: HEAD (Ads, GTM, Analytics) ===== --}}
    @foreach(\App\Models\SiteScript::forPosition('head') as $script)
    {!! $script->code !!}
    @endforeach
</head>
<body class="bg-white">
{{-- GTM body start --}}
@foreach(\App\Models\SiteScript::forPosition('body_start') as $script)
{!! $script->code !!}
@endforeach
<div id="scroll-progress" style="width:0%"></div>
@include('home.partials.navbar')
@include('home.partials.mobile-menu')
@yield('content')

<a href="https://wa.me/{{ $waNumber }}?text={{ urlencode('Halo, saya ingin konsultasi mengenai perbaikan kendaraan') }}"
   target="_blank" class="wa-float fixed bottom-6 right-6 z-50 w-14 h-14 bg-green-500 rounded-full flex items-center justify-center shadow-xl">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
</a>

<script>lucide.createIcons();</script>
<script>
window.addEventListener('scroll',()=>{
    const h=document.documentElement.scrollHeight-document.documentElement.clientHeight;
    document.getElementById('scroll-progress').style.width=(document.documentElement.scrollTop/h*100)+'%';
});
document.getElementById('navbar') && window.addEventListener('scroll',()=>document.getElementById('navbar').classList.toggle('scrolled',window.scrollY>60));
const revObs=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){setTimeout(()=>e.target.classList.add('visible'),e.target.dataset.delay||0);revObs.unobserve(e.target);}});},{threshold:.12,rootMargin:'0px 0px -50px 0px'});
document.querySelectorAll('.reveal,.reveal-left,.reveal-right,.reveal-scale').forEach(el=>revObs.observe(el));
function animateCounter(el){const t=parseInt(el.dataset.target),s=el.dataset.suffix||'',step=t/(1800/16);let c=0;const ti=setInterval(()=>{c+=step;if(c>=t){el.textContent=t+s;clearInterval(ti);}else el.textContent=Math.floor(c)+s;},16);}
const cObs=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting&&!e.target.classList.contains('counted')){e.target.classList.add('counted');animateCounter(e.target);cObs.unobserve(e.target);}});},{threshold:.5});
document.querySelectorAll('[data-counter]').forEach(el=>cObs.observe(el));
const mm=document.getElementById('mobile-menu'),mmb=document.getElementById('mobile-menu-btn'),mmc=document.getElementById('mobile-menu-close');
mmb?.addEventListener('click',()=>mm.classList.add('open'));
mmc?.addEventListener('click',()=>mm.classList.remove('open'));
mm?.addEventListener('click',e=>{if(e.target===mm)mm.classList.remove('open');});
document.querySelectorAll('a[href^="#"],[data-scroll-to]').forEach(el=>{
    el.addEventListener('click',e=>{const t=el.dataset.scrollTo||el.getAttribute('href'),s=document.querySelector(t);if(s){e.preventDefault();mm.classList.remove('open');s.scrollIntoView({behavior:'smooth',block:'start'});}});
});
</script>
@stack('scripts')

{{-- ===== INJECTED SCRIPTS: BODY END (Elfsight, Custom) ===== --}}
@foreach(\App\Models\SiteScript::forPosition('body_end') as $script)
{!! $script->code !!}
@endforeach

    {{-- ===== CLICK TRACKING ===== --}}
    <script>
    const _csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

    function trackClick(event, label) {
        fetch('/analytics/click', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': _csrfToken },
            body: JSON.stringify({ event, label, page: window.location.pathname }),
            keepalive: true,
        }).catch(() => {});
    }

    document.addEventListener('DOMContentLoaded', () => {
        // WA Floating button
        document.querySelector('.wa-float')?.addEventListener('click', () => trackClick('wa_float', 'Floating WA'));

        // All WA links
        document.querySelectorAll('a[href*="wa.me"]').forEach(el => {
            el.addEventListener('click', () => {
                const isFloat = el.classList.contains('wa-float');
                if (!isFloat) trackClick('wa_chat', el.textContent.trim().substring(0,50));
            });
        });

        // Phone links
        document.querySelectorAll('a[href^="tel:"]').forEach(el => {
            el.addEventListener('click', () => trackClick('phone_call', el.textContent.trim()));
        });

        // Book appointment buttons
        document.querySelectorAll('a[href*="wa.me"]').forEach(el => {
            const text = el.textContent.trim().toLowerCase();
            if (text.includes('janji') || text.includes('book') || text.includes('appointment')) {
                el.addEventListener('click', () => trackClick('book_appointment', text.substring(0,50)));
            }
        });

        // Google Maps links
        document.querySelectorAll('a[href*="maps.google"], a[href*="goo.gl/maps"], a[href*="share.google"]').forEach(el => {
            if (!el.href.includes('review')) {
                el.addEventListener('click', () => trackClick('maps_open', 'Google Maps'));
            }
        });

        // Google Reviews link
        document.querySelectorAll('a[href*="share.google"]').forEach(el => {
            el.addEventListener('click', () => trackClick('google_review', 'Google Reviews'));
        });

        // Track vehicle form submit
        document.getElementById('tracking-form')?.addEventListener('submit', () => {
            trackClick('track_vehicle', document.getElementById('booking-id')?.value || '');
        });
    });
    </script>

</body>
</html>
