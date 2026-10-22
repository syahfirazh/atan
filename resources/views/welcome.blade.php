<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="theme-color" content="#143e35">
  <title>ATAN si TATANEN — The Art of Growing</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>tailwind.config={theme:{extend:{colors:{forest:'#143e35',ink:'#17372e',cream:'#fbfaf4',sage:'#dfe8d7',lime:'#cbe897',clay:'#d78d68',moss:'#6f9277'},fontFamily:{sans:['Manrope','sans-serif'],serif:['Playfair Display','serif']},boxShadow:{soft:'0 22px 75px rgba(24,56,41,.10)',float:'0 30px 80px rgba(8,39,28,.18)'}}}};</script>
  <style>
    :root{color-scheme:light;--welcome-nav-height:78px}html{scroll-behavior:auto;height:100%;overflow:hidden}body{font-family:Manrope,sans-serif;background:#fbfaf4;color:#17372e;height:100%;margin:0;overflow:hidden}*{box-sizing:border-box}
    .welcome-shell{position:relative;height:100dvh;width:100vw;overflow:hidden;isolation:isolate}
    .welcome-navbar{position:fixed;inset:0 0 auto;z-index:100;width:100%;display:flex;align-items:center;justify-content:space-between;gap:18px;padding:12px clamp(14px,3.2vw,52px);background:rgba(251,250,244,.9);backdrop-filter:blur(18px);border-bottom:1px solid rgba(216,228,214,.85)}
    .welcome-nav{display:flex;align-items:center;justify-content:center;gap:5px;min-width:0;flex:1}
    .welcome-nav a{white-space:nowrap;border-radius:999px;padding:10px 13px;font-size:11px;font-weight:800;color:#668071;transition:background .25s,color .25s,transform .25s}
    .welcome-nav a:hover{background:#e8f0e2;color:#17372e}
    .welcome-nav a.active{background:#143e35;color:#fff;box-shadow:0 7px 20px rgba(20,62,53,.13)}
    .welcome-track{display:flex;width:400vw;height:100dvh;transition:transform .68s cubic-bezier(.22,.78,.24,1);will-change:transform}
    .welcome-track>section{flex:0 0 100vw;width:100vw;max-width:none!important;height:100dvh;min-height:100dvh;margin:0!important;overflow-y:auto;overflow-x:hidden;overscroll-behavior:contain;padding-top:112px!important;scrollbar-width:thin;scrollbar-color:#b8cdb4 transparent}
    .welcome-track>section:first-child{padding-bottom:70px!important}
    .welcome-track>section:last-child{padding-bottom:0!important}
    .welcome-track>section>.mx-auto{width:100%}
    .welcome-track>section .reveal{transition-delay:.04s}
    .welcome-footer{margin-top:45px}
    @media(max-width:760px){:root{--welcome-nav-height:108px}.welcome-navbar{flex-wrap:wrap;gap:7px;padding:9px 14px}.welcome-navbar .welcome-brand{font-size:13px}.welcome-navbar .welcome-brand-mark{width:35px;height:35px}.welcome-nav{order:3;flex-basis:100%;justify-content:flex-start;overflow-x:auto;padding-bottom:2px;scrollbar-width:none}.welcome-nav::-webkit-scrollbar{display:none}.welcome-nav a{padding:8px 11px;font-size:10px}.welcome-dashboard-link{font-size:10px!important;padding:10px 13px!important}.welcome-track>section{padding-top:128px!important}}
    @media(prefers-reduced-motion:reduce){.welcome-track{transition:none!important}}

    .noise{background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.7' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.1'/%3E%3C/svg%3E")}

    @keyframes drift{0%,100%{transform:translateY(0) rotate(-2deg)}50%{transform:translateY(-15px) rotate(2deg)}}
    @keyframes sway{0%,100%{transform:rotate(-4deg)}50%{transform:rotate(5deg)}}
    @keyframes pour{0%,32%,100%{transform:rotate(-15deg)}44%,75%{transform:rotate(17deg)}}
    @keyframes fall{0%{transform:translate(-7px,-14px);opacity:0}22%{opacity:1}88%{opacity:.8}100%{transform:translate(28px,70px);opacity:0}}
    @keyframes emerge{from{opacity:0;transform:translateY(32px)}to{opacity:1;transform:translateY(0)}}
    @keyframes twinkle{0%,100%{opacity:.4;transform:scale(.8)}50%{opacity:1;transform:scale(1.15)}}

    .float-plant{animation:drift 7s ease-in-out infinite}.sway{transform-origin:bottom center;animation:sway 4.8s ease-in-out infinite}.water-can{transform-origin:70% 85%;animation:pour 4.1s ease-in-out infinite}.drop{animation:fall 1.5s linear infinite}.drop:nth-child(2){animation-delay:.4s}.drop:nth-child(3){animation-delay:.8s}.twinkle{animation:twinkle 3.4s ease-in-out infinite}.enter{animation:emerge .8s ease both}
    .reveal{opacity:0;transform:translateY(26px);transition:opacity .75s ease,transform .75s ease}.reveal.visible{opacity:1;transform:translateY(0)}
    .phase-button{transition:transform .3s,box-shadow .3s,border-color .3s,background .3s}.phase-button:hover{transform:translateY(-8px)}.phase-button.active{transform:translateY(-9px);box-shadow:0 18px 55px rgba(15,65,41,.14);border-color:#4e8060;background:#f0f7e9}
    .detail-swap{animation:emerge .43s ease both}.hero-glow{background:radial-gradient(ellipse at 70% 32%,#b3d3a9 0%,#7ea792 30%,#326654 63%,#183e34 100%)}
    @media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important;scroll-behavior:auto!important}.reveal{opacity:1;transform:none}}

    .atan-hero-layout,.atan-nutrient-layout{display:grid;grid-template-columns:minmax(0,1fr);gap:3rem;align-items:center}
    .atan-hero-layout>*,.atan-nutrient-layout>*{min-width:0;width:100%}
    .atan-hero-layout{width:100%;margin-inline:auto}
    .atan-nutrient-layout{width:100%;margin-inline:auto}
    .atan-nutrient-card{width:100%;max-width:100%;justify-self:stretch}
    .atan-nutrient-card input,.atan-nutrient-card select{max-width:100%;min-width:0}
    @media(min-width:1024px){
      .atan-hero-layout{grid-template-columns:minmax(0,.94fr) minmax(0,1.06fr);gap:3.5rem}
      .atan-nutrient-layout{grid-template-columns:minmax(0,.85fr) minmax(0,1.15fr);gap:4rem}
    }
    @media(max-width:1023px){
      .atan-hero-layout,.atan-nutrient-layout{grid-template-columns:minmax(0,1fr)!important}
      .atan-nutrient-card{max-width:760px;margin-inline:auto}
    }
    @media(max-width:640px){
      .atan-hero-layout,.atan-nutrient-layout{gap:2rem}
      .atan-nutrient-card{border-radius:24px;padding:20px}
    }
  </style>
</head>

<body class="overflow-x-hidden">
<div class="welcome-shell relative isolate">
  <div class="pointer-events-none absolute -left-28 top-96 h-[470px] w-[470px] rounded-full bg-[#e4ecd7] blur-[110px] opacity-70"></div>

  <header id="welcome-navbar" class="welcome-navbar">
    
<a href="{{ route('welcome') }}" class="welcome-brand group flex shrink-0 items-center gap-3">
    <img
        src="{{ asset('img/logo.png') }}"
        alt="Logo ATAN si TATANEN"
        class="welcome-brand-mark h-11 w-11 rounded-2xl object-contain transition-transform group-hover:scale-105"
    >
    <span class="text-[15px] font-extrabold tracking-[-.04em]">
        ATAN <span class="font-medium text-moss">si TATANEN</span>
    </span>
</a>

    <nav class="welcome-nav" aria-label="Navigasi section welcome">
      <a href="#welcome-home" data-welcome-slide="0" class="active" aria-current="page">Beranda</a>
      <a href="#growth" data-welcome-slide="1">Pertumbuhan</a>
      <a href="#fertilizer-section" data-welcome-slide="2">Nutrisi</a>
      <a href="#welcome-dashboard-cta" data-welcome-slide="3">Mulai</a>
    </nav>
    <a href="{{ route('dashboard') }}" class="welcome-dashboard-link shrink-0 rounded-full bg-[#e6eedf] px-5 py-3 text-xs font-extrabold text-forest transition hover:bg-lime">Dashboard <span class="ml-1">↗</span></a>
  </header>

  <main id="welcome-track" class="welcome-track">
  <section id="welcome-home" class="atan-hero-layout relative mx-auto grid max-w-[1440px] items-center gap-12 px-6 pb-24 pt-8 md:px-12 lg:grid-cols-[.94fr_1.06fr] lg:px-20 lg:pb-32 lg:pt-16">
    <div class="relative z-10 enter">
      <span class="mb-7 inline-flex items-center gap-2 rounded-full border border-[#d9e5d2] bg-white px-4 py-2 text-[10px] font-black uppercase tracking-[.21em] text-moss"><span class="text-clay">✦</span> Botanical intelligence · 01</span>
      <h1 class="max-w-[620px] font-serif text-[clamp(3.8rem,7vw,7.4rem)] leading-[.99] tracking-[-.072em] text-forest">Every seed<br>has a <span class="italic text-[#7d9d78]">story.</span></h1>
      <p class="mt-9 max-w-[490px] text-[15px] leading-[2] text-[#688077]">Dari benih kecil sampai cabai pertama dipetik. Kenali perjalanan pertumbuhan, pahami kebutuhan nutrisi, dan kelola greenhouse dengan lebih cerdas.</p>
      <div class="mt-10 flex flex-wrap items-center gap-4"><a href="#growth" class="group inline-flex items-center gap-3 rounded-full bg-forest px-7 py-4 text-[13px] font-bold text-white shadow-xl shadow-[#173e30]/15 transition hover:-translate-y-1 hover:bg-[#245746]">Jelajahi Pertumbuhan <span class="transition-transform group-hover:translate-x-1">↗</span></a><a href="#fertilizer-section" class="inline-flex items-center gap-2 px-2 py-3 text-[13px] font-bold text-[#55715f] hover:text-forest">Konfigurasi pupuk <span>→</span></a></div>
      <div class="mt-16 flex items-center gap-6 border-t border-[#dce5d8] pt-7"><div><strong class="font-serif text-3xl text-forest">04</strong><p class="mt-1 text-[10px] uppercase tracking-[.18em] text-[#7d9185]">Fase tumbuh</p></div><span class="h-10 w-px bg-[#dce5d8]"></span><div><strong class="font-serif text-3xl text-forest">120<span class="text-xl">±</span></strong><p class="mt-1 text-[10px] uppercase tracking-[.18em] text-[#7d9185]">Hari referensi</p></div><span class="h-10 w-px bg-[#dce5d8]"></span><div><strong class="font-serif text-3xl text-forest">01</strong><p class="mt-1 text-[10px] uppercase tracking-[.18em] text-[#7d9185]">Fokus: cabai</p></div></div>
    </div>
    <div class="relative mx-auto w-full max-w-[720px] enter" style="animation-delay:.12s">
      <div class="hero-glow relative aspect-[.92] overflow-hidden rounded-[42px] shadow-float sm:aspect-[1.1] lg:aspect-[.9]"><div class="noise absolute inset-0 opacity-[.19]"></div><div class="absolute -right-24 -top-28 h-[370px] w-[370px] rounded-full border border-white/15"></div><div class="absolute -right-8 -top-12 h-[270px] w-[270px] rounded-full border border-white/15"></div><span class="absolute left-8 top-8 text-[10px] font-black uppercase tracking-[.28em] text-[#e6f2df] sm:left-12 sm:top-12">Capsicum annuum / 001</span>
       <div class="absolute inset-x-[6%] bottom-[4%] top-[12%] flex items-center justify-center"><div class="absolute bottom-[6%] h-[17%] w-[65%] rounded-[50%] bg-[#0b2c22]/25 blur-xl"></div><img src="/img/cabai.png" alt="Ilustrasi tanaman cabai dari aset proyek" class="float-plant relative z-10 h-[86%] w-[90%] object-contain drop-shadow-[0_28px_25px_rgba(12,36,25,.3)]"></div>
       <div class="absolute right-[5%] top-[20%] rounded-2xl border border-white/35 bg-white/90 px-4 py-3 shadow-xl backdrop-blur-lg sm:right-[6%]"><div class="flex items-center gap-2 text-[10px] font-extrabold uppercase tracking-wide text-forest"><span class="twinkle text-lg text-clay">✦</span> Naturally better</div><p class="mt-1 text-[10px] text-[#799187]">Precision cultivation</p></div>
       <div class="absolute bottom-7 left-7 rounded-2xl border border-white/25 bg-[#153d34]/80 px-5 py-4 text-white backdrop-blur-md sm:bottom-11 sm:left-11"><p class="text-[10px] uppercase tracking-[.21em] text-[#b9d7c3]">A living journey</p><p class="mt-1 font-serif text-2xl italic">from soil to soul.</p></div>
      </div>
      <div class="absolute -bottom-6 -right-3 flex w-[177px] items-center gap-3 rounded-[22px] border border-[#e1e8d7] bg-[#fffef7] p-3 shadow-soft sm:-right-8"><div class="relative grid h-[59px] w-[62px] shrink-0 place-items-center rounded-2xl bg-[#eaf1dc]">
        <svg viewBox="0 0 96 96" width="61" height="61" aria-label="Animasi orang menyiram tanaman" role="img"><path d="M10 81H86" stroke="#9bb29b" stroke-width="3" stroke-linecap="round"/><path class="sway" d="M65 80V56M65 64Q50 61 47 51M65 69Q79 63 81 51" fill="none" stroke="#4c9872" stroke-width="4" stroke-linecap="round"/><path d="M47 52q-1-13 12-10q1 12-12 10M81 51q-12-5-10 9q13 2 10-9" fill="#7fba79"/><circle cx="32" cy="28" r="9" fill="#c98e67"/><path d="M20 24q5-18 20-4l-1 6-20 1" fill="#355b48"/><path d="M27 38l-5 21 19 2 4-21z" fill="#e9ae75"/><path d="M25 58l-8 21m21-19 7 19" fill="none" stroke="#36594f" stroke-width="7" stroke-linecap="round"/><path d="M42 45l12 4 9-8" fill="none" stroke="#c98e67" stroke-width="6" stroke-linecap="round"/><g class="water-can"><path d="M61 31h18l4 14-4 7H61l-3-15z" fill="#7a9eb1" stroke="#436e79" stroke-width="2"/><path d="M60 35q-13-4-11 9" fill="none" stroke="#436e79" stroke-width="3"/><path d="M80 38l9-5-1-5" fill="none" stroke="#436e79" stroke-width="3"/></g><g fill="#bfeafa"><circle class="drop" cx="86" cy="41" r="2.7"/><circle class="drop" cx="81" cy="43" r="2.3"/><circle class="drop" cx="89" cy="45" r="2"/></g></svg></div><div><p class="text-[11px] font-black text-forest">Growing care</p><p class="mt-1 text-[10px] leading-4 text-[#829384]">Setiap tetes<br>punya arti.</p></div></div>
    </div>
  </section>

  <section id="growth" class="relative border-y border-[#e3e8da] bg-[#f1f4e9] py-24 md:py-32"><div class="mx-auto max-w-[1360px] px-6 md:px-12 lg:px-20">
    <div class="reveal grid gap-7 lg:grid-cols-[1fr_.65fr] lg:items-end"><div><span class="text-[11px] font-black uppercase tracking-[.25em] text-[#6a987c]">02 / The growth chapters</span><h2 class="mt-5 max-w-[700px] font-serif text-[clamp(2.9rem,5vw,5.2rem)] leading-[1.07] tracking-[-.06em] text-forest">Empat fase,<br><span class="italic text-[#8da887]">satu perjalanan hidup.</span></h2></div><p class="max-w-[440px] text-[14px] leading-[2] text-[#778c7e]">Setiap fase membawa tantangan berbeda. Pilih salah satu babak untuk melihat perkembangan tanaman, kebutuhan lingkungan, serta risiko yang perlu diperhatikan.</p></div>
    <div id="phase-list" class="mt-14 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4"></div>
    <div id="phase-detail" class="reveal mt-9 overflow-hidden rounded-[34px] border border-[#d9e4d4] bg-[#fffefa] shadow-soft"><div class="grid lg:grid-cols-[.8fr_1.2fr]"><div class="relative flex min-h-[340px] flex-col items-center justify-center overflow-hidden bg-[#e4efde] p-10"><div class="absolute -right-28 -top-28 h-[390px] w-[390px] rounded-full border border-[#c7dcc5]"></div><span id="detail-chapter" class="absolute left-8 top-8 text-[11px] font-black uppercase tracking-[.2em] text-[#6a9476]"></span><img id="detail-image" src="/img/persemaian.png" alt="Ilustrasi fase pertumbuhan" class="sway relative z-10 max-h-[300px] w-full object-contain drop-shadow-xl"/><span id="detail-days" class="absolute bottom-7 rounded-full bg-white/80 px-4 py-2 text-[11px] font-bold text-[#3b6950] backdrop-blur"></span></div><div class="p-7 sm:p-10 lg:p-14"><span class="text-[10px] font-extrabold uppercase tracking-[.22em] text-clay">Inside the growing process</span><h3 id="detail-title" class="mt-4 font-serif text-4xl tracking-[-.045em] text-forest sm:text-5xl"></h3><p id="detail-description" class="mt-5 text-[14px] leading-[1.95] text-[#6e8374]"></p><div class="mt-8 flex flex-wrap gap-2" id="phase-tags"></div><div class="mt-9 flex items-center gap-3"><button id="prev-phase" type="button" class="grid h-11 w-11 place-items-center rounded-full border border-[#d8e5d5] text-forest transition hover:bg-lime" aria-label="Fase sebelumnya">←</button><button id="next-phase" type="button" class="flex items-center gap-2 rounded-full bg-forest px-6 py-3 text-xs font-extrabold text-white transition hover:-translate-y-1">Fase selanjutnya <span>→</span></button><span class="ml-auto text-[12px] font-bold text-[#8ca293]" id="phase-counter"></span></div></div></div></div>
    <div class="reveal mt-14 flex items-center justify-between gap-4"><div><span class="text-[10px] font-black uppercase tracking-[.25em] text-[#739980]">Field notes</span><h3 class="mt-2 font-serif text-3xl text-forest md:text-4xl">Kenali lebih dalam.</h3></div><span class="hidden text-xs text-[#809586] md:block">Panduan cabai · ringkasan agronomi per fase</span></div><div id="learning-grid" class="mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3"></div><p class="mt-5 text-[11px] leading-7 text-[#819487]">Rentang hari pada halaman ini merupakan referensi ilustratif. Umur dan kebutuhan aktual berubah menurut varietas, media tanam, cuaca, serta pengelolaan budidaya.</p>
  </div></section>

  <section id="fertilizer-section" class="relative overflow-hidden bg-[#143e35] py-24 text-white md:py-32"><div class="pointer-events-none absolute -right-52 -top-56 h-[680px] w-[680px] rounded-full border border-white/10"></div><div class="pointer-events-none absolute -right-20 -top-28 h-[500px] w-[500px] rounded-full border border-white/10"></div><div class="atan-nutrient-layout mx-auto grid max-w-[1360px] gap-12 px-6 md:px-12 lg:grid-cols-[.85fr_1.15fr] lg:items-center lg:gap-20 lg:px-20"><div class="reveal"><span class="text-[11px] font-extrabold uppercase tracking-[.25em] text-[#a9d6ac]">03 / Nutrient studio</span><h2 class="mt-5 font-serif text-[clamp(3rem,5.5vw,5.8rem)] leading-[1.08] tracking-[-.07em]">Good growth<br>starts <span class="italic text-[#c6e79b]">within.</span></h2><p class="mt-8 max-w-[440px] text-[14px] leading-[2] text-[#b5cdbf]">Kelola bahan Pupuk A dan B, biaya kemasan, kebutuhan setiap campuran, serta air dalam satu sistem.</p><div class="mt-10 flex items-center gap-3 text-[12px] text-[#c7dccc]"><span class="grid h-10 w-10 place-items-center rounded-full border border-[#7cab88] text-xl">✳</span><span>Kelola komposisi nutrisi dan catat biaya setiap pembuatan larutan.</span></div></div>
    <div class="atan-nutrient-card reveal relative rounded-[34px] border border-white/20 bg-[#fffcf5] p-7 text-forest shadow-[0_35px_80px_rgba(0,0,0,.2)] sm:p-10">
      <div class="mb-7 flex items-center justify-between"><div><span class="text-[10px] font-black uppercase tracking-[.22em] text-[#8ca18b]">Pengaturan nutrisi</span><h3 class="mt-2 font-serif text-3xl">Komposisi Pupuk A & B</h3></div><span class="grid h-14 w-14 place-items-center rounded-2xl bg-[#e6efd9] text-2xl">🧪</span></div>
      <p class="mb-6 text-xs leading-6 text-[#718876]">Tambahkan bahan sebanyak yang diperlukan ke kelompok A atau B. Semua harga dan pemakaian dihitung per satu batch campuran. Satuan kemasan dan pemakaian harus sama.</p>
      <form id="nutrient-form" class="space-y-6">
        <div class="space-y-3"><div class="flex items-center justify-between"><h4 class="text-lg font-extrabold">Campuran A</h4><span id="subtotal-a" class="text-sm font-extrabold text-[#508566]">Rp 0</span></div><div id="nutrient-items-a" class="space-y-3"></div><button type="button" data-add-group="A" class="rounded-xl border border-[#bad0ba] bg-[#e7f0e0] px-4 py-3 text-xs font-extrabold hover:bg-[#d8e5cd] transition">+ Tambah pupuk A</button></div>
        <div class="border-t border-[#e1e9dc] pt-5 space-y-3"><div class="flex items-center justify-between"><h4 class="text-lg font-extrabold">Campuran B</h4><span id="subtotal-b" class="text-sm font-extrabold text-[#508566]">Rp 0</span></div><div id="nutrient-items-b" class="space-y-3"></div><button type="button" data-add-group="B" class="rounded-xl border border-[#bad0ba] bg-[#e7f0e0] px-4 py-3 text-xs font-extrabold hover:bg-[#d8e5cd] transition">+ Tambah pupuk B</button></div>
        
        <div class="border-t border-[#e1e9dc] pt-5">
          <h4 class="mb-3 text-lg font-extrabold">💧 Air campuran</h4>
          <div class="grid gap-3 sm:grid-cols-2">
            <label class="block text-xs font-bold">Volume Air (Liter)
              <input id="nutrient-water-liters" type="number" min="0" step="any" class="mt-2 w-full rounded-xl border border-[#dce5d6] bg-[#f7f9f2] p-3" placeholder="Cth: 100">
            </label>
            <label class="block text-xs font-bold">Harga Air (Rp/Liter)
              <input id="nutrient-water-price" type="number" min="0" step="any" class="mt-2 w-full rounded-xl border border-[#dce5d6] bg-[#f7f9f2] p-3" placeholder="Cth: 150">
            </label>
          </div>
        </div>

        <div class="rounded-2xl bg-[#e9f0de] p-5 text-xs leading-7"><div class="flex justify-between"><span>Biaya A</span><b id="cost-a">Rp 0</b></div><div class="flex justify-between"><span>Biaya B</span><b id="cost-b">Rp 0</b></div><div class="flex justify-between"><span>Biaya air</span><b id="cost-water">Rp 0</b></div><div class="mt-2 flex justify-between border-t border-[#ccdcbf] pt-2 text-base"><b>Total biaya bahan / batch</b><b id="cost-total">Rp 0</b></div><p class="mt-2 text-[10px] text-[#6e856f]">Biaya bahan untuk satu kali pembuatan larutan, tidak termasuk energi listrik.</p></div>
        <button id="nutrient-save" type="submit" class="w-full rounded-2xl bg-forest px-6 py-4 text-[13px] font-extrabold text-white hover:bg-[#255a45] transition">Simpan Komposisi</button>
        <button id="nutrient-record" type="button" disabled class="w-full rounded-2xl border border-forest px-6 py-4 text-[13px] font-extrabold text-forest transition disabled:cursor-not-allowed disabled:opacity-40 hover:bg-[#f2f7ec]">Catat Pembuatan Larutan</button>
        <p id="nutrient-status" aria-live="polite" class="text-center text-xs font-bold text-[#548866]"></p>
      </form>
    </div>
  </div></section>

  <section id="welcome-dashboard-cta" class="relative mx-auto max-w-[1360px] px-6 py-24 text-center md:px-12 md:py-32 lg:px-20"><div class="reveal"><span class="text-[11px] font-black uppercase tracking-[.25em] text-moss">Next chapter / Live greenhouse</span><h2 class="mx-auto mt-5 max-w-[850px] font-serif text-[clamp(3.1rem,6vw,6rem)] leading-[1.09] tracking-[-.07em] text-forest">Now, let's make<br><span class="italic text-[#7fa483]">it grow.</span></h2><p class="mx-auto mt-6 max-w-[550px] text-[14px] leading-[2] text-[#74897a]">Buka dashboard untuk melihat Living Greenhouse, membaca data sensor ESP32-S3, dan memantau perjalanan budidaya cabai secara menyeluruh.</p><a href="{{ route('dashboard') }}" class="mt-10 inline-flex items-center gap-4 rounded-full bg-forest px-9 py-5 text-[13px] font-extrabold text-white shadow-xl shadow-forest/20 transition hover:-translate-y-1 hover:bg-[#245746]">Masuk ke Living Greenhouse <span>↗</span></a></div></section>

  </main>
  <footer class="welcome-footer border-t border-[#e0e8d9] bg-[#f4f5ed] px-6 py-9 text-center text-[11px] font-bold tracking-[.07em] text-[#718d79]">✳ ATAN si TATANEN <span class="mx-2 opacity-40">/</span> Teknologi Adaptif Nutrisi <span class="mx-2 opacity-40">/</span> Smart Greenhouse Cabai</footer>

</div>

<script>
(function initWelcomeSlides(){
  const track = document.getElementById('welcome-track');
  if (!track) return;
  const slides = Array.from(track.children).filter(el => el.tagName === 'SECTION');
  const navLinks = Array.from(document.querySelectorAll('[data-welcome-slide]'));
  const footer = document.querySelector('.welcome-footer');
  if (footer && slides.length) slides[slides.length - 1].appendChild(footer);
  let active = 0;
  const setSlide = (index, updateHash = false) => {
    active = Math.max(0, Math.min(slides.length - 1, index));
    track.style.transform = `translate3d(-${active * 100}vw,0,0)`;
    navLinks.forEach((link, i) => {
      const selected = i === active;
      link.classList.toggle('active', selected);
      if (selected) link.setAttribute('aria-current', 'page');
      else link.removeAttribute('aria-current');
    });
    slides.forEach((slide, i) => { if (i !== active) slide.scrollTop = 0; });
    if (updateHash && slides[active]) {
      const id = slides[active].id;
      if (id && location.hash !== `#${id}`) history.replaceState(null, '', `#${id}`);
    }
  };
  window.atanWelcomeSlide = setSlide;
  navLinks.forEach(link => link.addEventListener('click', event => {
    event.preventDefault();
    setSlide(Number(link.dataset.welcomeSlide), true);
  }));
  document.addEventListener('click', event => {
    const link = event.target.closest('a[href^="#"]');
    if (!link || link.hasAttribute('data-welcome-slide')) return;
    const target = link.getAttribute('href').slice(1);
    const targetSlide = slides.findIndex(slide => slide.id === target || slide.querySelector(`#${CSS.escape(target)}`));
    if (targetSlide >= 0) {
      event.preventDefault();
      setSlide(targetSlide, true);
      const innerTarget = slides[targetSlide].id === target ? null : slides[targetSlide].querySelector(`#${CSS.escape(target)}`);
      if (innerTarget) setTimeout(() => innerTarget.scrollIntoView({behavior:'smooth', block:'start'}), 180);
    }
  });
  let startX = 0, startY = 0;
  slides.forEach(slide => {
    slide.addEventListener('touchstart', event => {
      if (event.touches.length !== 1) return;
      startX = event.touches[0].clientX; startY = event.touches[0].clientY;
    }, {passive:true});
    slide.addEventListener('touchend', event => {
      if (!event.changedTouches.length) return;
      const dx = event.changedTouches[0].clientX - startX;
      const dy = event.changedTouches[0].clientY - startY;
      if (Math.abs(dx) > 70 && Math.abs(dx) > Math.abs(dy) * 1.25) setSlide(active + (dx < 0 ? 1 : -1), true);
    }, {passive:true});
  });
  document.addEventListener('keydown', event => {
    if (event.altKey || event.ctrlKey || event.metaKey || /INPUT|TEXTAREA|SELECT/.test(event.target.tagName)) return;
    if (event.key === 'ArrowRight') { event.preventDefault(); setSlide(active + 1, true); }
    if (event.key === 'ArrowLeft') { event.preventDefault(); setSlide(active - 1, true); }
  });
  const initial = location.hash ? slides.findIndex(slide => slide.id === location.hash.slice(1) || slide.querySelector(`#${CSS.escape(location.hash.slice(1))}`)) : 0;
  setSlide(initial >= 0 ? initial : 0, false);
})();
</script>

<script>
const stages=[
 {name:'Vegetatif Awal',start:0,end:30,img:'/img/vegetatif.png',desc:'Akar, daun dan batang awal berkembang. Pastikan fase lewat kondisi tanaman.'},
 {name:'Vegetatif Akhir',start:31,end:60,img:'/img/vegetatif.png',desc:'Pertumbuhan tajuk lanjut dan persiapan pembentukan bunga.'},
 {name:'Pembungaan',start:61,end:90,img:'/img/pembungaan.png',desc:'Pembentukan bunga dan bakal buah; perlu pengamatan nyata.'},
 {name:'Pembuahan / Panen',start:91,end:120,img:'/img/panen.png',desc:'Buah berkembang, matang dan dapat dipanen berulang.'}
];
const detailedChiliStages = stages.map((s)=>({
 morphology:s.desc,
 roots:'Pantau perkembangan akar dan aerasi media.',
 nutrients:'EC larutan perlu sensor terkalibrasi. PDF paprika mencantumkan 1,6–2,6 dS/m; bukan target otomatis untuk cabai.',
 environment:'Pantau suhu dan kelembapan; blower otomatis menggunakan suhu DHT22.',
 observation:'Validasi fase melalui morfologi tanaman, bukan umur kalender saja.',
 risks:'Waspadai perubahan lingkungan, ketidakseimbangan nutrisi, dan gangguan hama.'
}));
let active=0;

const $=id=>document.getElementById(id);

const knowledgeHeaders=[['🌱','Proses pertumbuhan','morphology'],['🌿','Perkembangan akar','roots'],['🧪','Nutrisi & unsur hara','nutrients'],['💧','Lingkungan & irigasi','environment'],['🔬','Parameter pengamatan','observation'],['🛡️','Risiko & pencegahan','risks']];

function showStage(n){active=(n+stages.length)%stages.length;const s=stages[active];$('phase-list').querySelectorAll('button').forEach((b,i)=>{b.classList.toggle('active',i===active);b.setAttribute('aria-pressed',String(i===active));});const panel=$('phase-detail');panel.classList.remove('detail-swap');void panel.offsetWidth;panel.classList.add('detail-swap');$('detail-chapter').textContent=`Chapter 0${active+1} / 04`;$('detail-image').src=s.img;$('detail-image').alt='Ilustrasi fase '+s.name;$('detail-days').textContent=`Hari ${s.start}–${s.end}`;$('detail-title').textContent=s.name;$('detail-description').textContent=s.desc;$('phase-counter').textContent=`0${active+1} / 04`;$('phase-tags').innerHTML=['Cabai','Pertumbuhan','Fase '+(active+1)].map(t=>`<span class="rounded-full bg-[#edf4e6] px-4 py-2 text-[10px] font-bold text-[#63826b]">${t}</span>`).join('');const d=detailedChiliStages[active];$('learning-grid').innerHTML=knowledgeHeaders.map(([emoji,title,key],i)=>`<article class="group rounded-[23px] border border-[#dce6d7] bg-white/90 p-6 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-[#a9c7a7] hover:shadow-soft"><div class="mb-5 flex items-center justify-between"><span class="grid h-11 w-11 place-items-center rounded-2xl bg-[#e8f1e2] text-xl">${emoji}</span><span class="text-[11px] font-bold text-[#aabbaa]">0${i+1}</span></div><h4 class="text-[13px] font-black text-forest">${title}</h4><p class="mt-3 text-[12px] leading-[1.95] text-[#758778]">${d[key]}</p></article>`).join('');}

$('phase-list').innerHTML=stages.map((s,i)=>`<button type="button" data-phase="${i}" aria-pressed="false" class="phase-button group relative flex min-h-[211px] flex-col items-center overflow-hidden rounded-[25px] border border-[#dce5d5] bg-[#fffefa] px-3 pb-6 pt-5 text-center"><span class="absolute left-4 top-4 text-[10px] font-extrabold tracking-widest text-[#abc0ae]">0${i+1}</span><img src="${s.img}" alt="${s.name}" class="mb-4 mt-3 h-24 w-full object-contain transition duration-500 group-hover:scale-110"/><strong class="text-[13px] font-black text-forest">${s.name}</strong><small class="mt-1 text-[10px] text-[#92a296]">Hari ${s.start}–${s.end}</small></button>`).join('');$('phase-list').addEventListener('click',e=>{const b=e.target.closest('[data-phase]');if(b)showStage(Number(b.dataset.phase));});$('prev-phase').onclick=()=>showStage(active-1);$('next-phase').onclick=()=>showStage(active+1);showStage(0);

// Pupuk A/B tersimpan di Laravel, bukan hanya localStorage.
const nutrientApi='/api/nutrient';
const moneyN=n=>'Rp '+Number(n).toLocaleString('id-ID',{maximumFractionDigits:4});
const finiteN=v=>{const n=Number(v);return Number.isFinite(n)&&n>=0?n:0};

// Mengubah nilai default menjadi string kosong ('') agar placeholder muncul
const nutrientTemplate={items:[{group:'A',name:'',package_price_rp:'',package_qty:'',unit:'ml',used_qty:''},{group:'B',name:'',package_price_rp:'',package_qty:'',unit:'ml',used_qty:''}],water_l:'',water_price_rp_l:''};
let nutrientState=JSON.parse(JSON.stringify(nutrientTemplate));
let savedNutrient=false;
const inputStyle='w-full rounded-xl border border-[#dce5d6] bg-[#f7f9f2] p-3 text-xs';

function escN(s){return String(s).replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]))}
function itemCostN(x){return finiteN(x.package_qty)>0?finiteN(x.package_price_rp)/finiteN(x.package_qty)*finiteN(x.used_qty):0}

function renderNutrientItems(){
  for(const g of ['A','B']){
    const el=$('nutrient-items-'+g.toLowerCase());
    el.innerHTML='';
    nutrientState.items.forEach((x,i)=>{
      if(x.group!==g)return;
      const card=document.createElement('div');
      card.className='rounded-2xl border border-[#e0e8dc] bg-white p-3';
      
      // Kata-kata diubah: "Harga per Kemasan", "Isi Total Kemasan", "Dosis 1x Campuran", dan penambahan placeholder
      card.innerHTML=`<div class="flex justify-between gap-3"><label class="block flex-1 text-[11px] font-bold">Nama Bahan<input data-index="${i}" data-field="name" maxlength="80" class="mt-1 ${inputStyle}" value="${escN(x.name)}" placeholder="Cth: AB Mix Premium"></label><button type="button" data-remove="${i}" class="self-end rounded-lg bg-[#f7e7e2] px-3 py-3 text-xs text-red-700 font-bold hover:bg-red-100 transition">Hapus</button></div>
      <div class="mt-3 grid grid-cols-2 gap-2 sm:grid-cols-4">
        <label class="text-[10px] font-bold">Harga per Kemasan (Rp)<input type="number" min="0" step="any" data-index="${i}" data-field="package_price_rp" class="mt-1 ${inputStyle}" value="${x.package_price_rp}" placeholder="Cth: 150000"></label>
        <label class="text-[10px] font-bold">Isi Total Kemasan<input type="number" min="0.000001" step="any" data-index="${i}" data-field="package_qty" class="mt-1 ${inputStyle}" value="${x.package_qty}" placeholder="Cth: 1000"></label>
        <label class="text-[10px] font-bold">Satuan (mL/g)<select data-index="${i}" data-field="unit" class="mt-1 ${inputStyle}"><option value="ml" ${x.unit==='ml'?'selected':''}>Mililiter (mL)</option><option value="g" ${x.unit==='g'?'selected':''}>Gram (g)</option></select></label>
        <label class="text-[10px] font-bold">Dosis 1x Campuran<input type="number" min="0" step="any" data-index="${i}" data-field="used_qty" class="mt-1 ${inputStyle}" value="${x.used_qty}" placeholder="Cth: 50"></label>
      </div>
      <p class="mt-2 text-right text-[11px] font-extrabold text-[#508566]" data-subtotal="${i}"></p>`;
      el.appendChild(card);
    });
  }
  refreshNutrientCosts();
}

function refreshNutrientCosts(){
  const a=nutrientState.items.filter(x=>x.group==='A').reduce((t,x)=>t+itemCostN(x),0);
  const b=nutrientState.items.filter(x=>x.group==='B').reduce((t,x)=>t+itemCostN(x),0);
  const w=finiteN(nutrientState.water_l)*finiteN(nutrientState.water_price_rp_l);
  $('subtotal-a').textContent=moneyN(a);$('subtotal-b').textContent=moneyN(b);
  $('cost-a').textContent=moneyN(a);$('cost-b').textContent=moneyN(b);
  $('cost-water').textContent=moneyN(w);$('cost-total').textContent=moneyN(a+b+w);
  document.querySelectorAll('[data-subtotal]').forEach(el=>el.textContent='Subtotal: '+moneyN(itemCostN(nutrientState.items[Number(el.dataset.subtotal)])));
}

function dirtyNutrient(){savedNutrient=false;$('nutrient-record').disabled=true;$('nutrient-status').textContent='Ada perubahan yang belum disimpan';refreshNutrientCosts()}

$('nutrient-form').addEventListener('input',e=>{
  const t=e.target;
  if(t.dataset.index!==undefined){
    const x=nutrientState.items[Number(t.dataset.index)];
    if(x) x[t.dataset.field]=['name','unit'].includes(t.dataset.field)?t.value:(t.value===''? '': finiteN(t.value));
  }
  else if(t.id==='nutrient-water-liters') nutrientState.water_l=t.value===''? '': finiteN(t.value);
  else if(t.id==='nutrient-water-price') nutrientState.water_price_rp_l=t.value===''? '': finiteN(t.value);
  dirtyNutrient();
});

$('nutrient-form').addEventListener('change',e=>{const t=e.target;if(t.dataset.field==='unit'){nutrientState.items[Number(t.dataset.index)].unit=t.value;dirtyNutrient()}});

$('nutrient-form').addEventListener('click',e=>{
  const add=e.target.closest('[data-add-group]');
  if(add){nutrientState.items.push({group:add.dataset.addGroup,name:'',package_price_rp:'',package_qty:'',unit:'ml',used_qty:''});renderNutrientItems();dirtyNutrient()}
  const remove=e.target.closest('[data-remove]');
  if(remove){nutrientState.items.splice(Number(remove.dataset.remove),1);renderNutrientItems();dirtyNutrient()}
});

function statusN(message){$('nutrient-status').textContent=message}
async function requestN(path,method='GET',body){
  const resp=await fetch(nutrientApi+path,{method,headers:{'Accept':'application/json','Content-Type':'application/json'},body:body?JSON.stringify(body):undefined});
  const json=await resp.json();if(!resp.ok)throw Error(json.message||'HTTP '+resp.status);
  return json;
}
async function loadNutrient(){try{const j=await requestN('/recipe');if(j.recipe){nutrientState={items:j.recipe.items||[],water_l:j.recipe.water_l,water_price_rp_l:j.recipe.water_price_rp_l};savedNutrient=true;$('nutrient-record').disabled=false;}$('nutrient-water-liters').value=nutrientState.water_l;$('nutrient-water-price').value=nutrientState.water_price_rp_l;renderNutrientItems();}catch(e){renderNutrientItems();statusN('Gagal memuat pengaturan nutrisi: '+e.message)}}

$('nutrient-form').addEventListener('submit',async e=>{
  e.preventDefault();
  
  // Perbaikan validasi: Pastikan nama diisi dan package_qty > 0 jika form terisi.
  if(!nutrientState.items.length || nutrientState.items.some(x=>!x.name.trim() || (finiteN(x.package_qty)<=0 && x.package_qty !== ''))){
      statusN('Isi nama dan pastikan ukuran kemasan lebih dari 0.');
      return;
  }
  
  const btn=$('nutrient-save');btn.disabled=true;
  try{await requestN('/recipe','POST',nutrientState);savedNutrient=true;$('nutrient-record').disabled=false;statusN('Komposisi nutrisi berhasil disimpan.');}
  catch(err){statusN('Gagal menyimpan: '+err.message)}finally{btn.disabled=false}
});

$('nutrient-record').addEventListener('click',async()=>{
  if(!savedNutrient)return;
  if(!confirm('Simpan biaya pembuatan larutan ini ke catatan pengeluaran?'))return;
  const btn=$('nutrient-record');btn.disabled=true;
  const id='BATCH-'+Date.now()+'-'+Math.random().toString(36).slice(2,10);
  try{const j=await requestN('/batches','POST',{batch_id:id});statusN('Pembuatan larutan berhasil dicatat: '+moneyN(j.batch.total_rp)+' (lihat dashboard).');}
  catch(err){statusN('Gagal mencatat batch: '+err.message)}finally{btn.disabled=!savedNutrient}
});
loadNutrient();

if('IntersectionObserver'in window){const obs=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('visible');obs.unobserve(e.target)}}),{threshold:.07});document.querySelectorAll('.reveal').forEach(el=>obs.observe(el));}else document.querySelectorAll('.reveal').forEach(el=>el.classList.add('visible'));

</script></body></html>