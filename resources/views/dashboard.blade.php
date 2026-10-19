<!DOCTYPE html>
<html lang="id">
 <head>
  <!--ATAN SI TATANEN — CABAI / ESP32-S3 | Satu HTML dengan Tailwind utilities, CSS khusus animasi, dan JS terstruktur. Grafik Chart.js dan font diakses dari CDN saat internet tersedia.-->
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta content="#132d26" name="theme-color"/>
  <title>
   ATAN si TATANEN &middot; Smart Greenhouse Cabai
  </title>
  <link href="https://fonts.googleapis.com" rel="preconnect"/>
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&amp;family=Outfit:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
  <!-- Tailwind CSS utilities; CSS asli tetap menjaga identitas Living Greenhouse. -->
   <script src="https://cdn.tailwindcss.com"></script>
<script>
 tailwind.config = { corePlugins: { preflight: false }, theme: { extend: {
  colors: { forest:'#123D34', sage:'#819D87', ivory:'#F8F7F0', lime:'#D5EBAB', clay:'#D89977' },
  fontFamily: { sans:['DM Sans','sans-serif'], display:['Outfit','sans-serif'] }
 }}};
</script>
<style>
:root{--ink:#163d34;--muted:#73877c;--line:#e3eae0;--paper:#fffefa;--mist:#f0f6eb}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:#f8f7f0;color:var(--ink);font-family:'DM Sans',sans-serif;overflow-x:hidden}
h1,h2,h3,h4{font-family:Outfit,sans-serif}button,input{font:inherit}button{cursor:pointer}a{text-decoration:none;color:inherit}.wrap{max-width:1440px;padding:0 clamp(16px,4vw,70px);margin:auto}.screen{display:none}.screen.active{display:block}
.eyebrow{font:800 10px 'DM Sans';letter-spacing:2.6px;text-transform:uppercase;color:#699878}.dashboard-top{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:34px 0 20px}.dashboard-top h1{font-size:clamp(36px,4.8vw,65px);line-height:1.05;letter-spacing:-2px;margin:10px 0}.dashboard-top p{font-size:13px;color:#708578}.dashboard-top>div:last-child{display:flex;gap:10px;flex-wrap:wrap}
.panel{background:var(--paper);border:1px solid var(--line);border-radius:25px;padding:clamp(18px,2.2vw,28px);box-shadow:0 14px 45px #244d3210;min-width:0;transition:box-shadow .3s,transform .3s}.panel:hover{box-shadow:0 18px 48px #244d3219}.panel h3{font-family:Outfit;font-size:22px;letter-spacing:-.6px;margin:5px 0}.sub{font-size:12px;color:#7b8c80;line-height:1.8;margin:8px 0 16px}.sectionhead{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:14px 0}.sectionhead h3{margin:0}
.metrics{display:grid;grid-template-columns:repeat(6,minmax(0,1fr));gap:13px;margin:10px 0 20px}.metric{min-width:0;background:var(--paper);border:1px solid var(--line);border-radius:22px;padding:19px 16px;box-shadow:0 8px 30px #244d320a;transition:transform .25s,border-color .25s}.metric:hover{transform:translateY(-5px);border-color:#9ebca4}.metric .symbol{height:36px;display:flex;align-items:center;font-size:22px}.metric label{display:block;font-size:11px;color:#738878;margin:13px 0 7px}.metric strong{font:800 clamp(17px,2vw,26px) Outfit;word-break:break-word}.metric small{font-size:10px;color:#719681;display:block;margin-top:9px;font-weight:700}
.sensor-status-panel{display:flex;align-items:center;justify-content:space-between;gap:16px;margin:0 0 18px;background:linear-gradient(115deg,#edf4e7,#fffdf7)}.sensor-status-panel strong{display:block;margin:9px 0;font:700 18px Outfit}.sensor-status-panel .sub{margin:0}.pill{display:inline-flex;align-items:center;border-radius:50px;background:#e9f2e6;color:#416e52;padding:7px 13px;font-size:10px;font-weight:800}.tag{border-radius:50px;background:#fff1e7;color:#9e705a;padding:10px 14px;font-size:11px;font-weight:800}
.two-col{display:grid;grid-template-columns:minmax(0,1.4fr) minmax(0,.86fr);gap:18px;margin:18px 0}.reading{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:13px 0;border-bottom:1px solid #ebf0e8;font-size:12px}.reading strong{font-weight:800;color:#244e39;text-align:right}.forecast{background:linear-gradient(130deg,#183f35,#315c43);padding:24px;border-radius:20px;color:white;margin-top:16px}.forecast h3{color:#fff}.forecast p{color:#d4e5d6;line-height:1.8;font-size:12px}
.diagram{position:relative;isolation:isolate;background:radial-gradient(ellipse at 50% 0%,#fcfff7,#eaf3e5 85%);border:1px solid #dae7d6;border-radius:22px;min-height:315px;padding:27px 20px;overflow:hidden}.diagram:before{content:'';position:absolute;inset:0;z-index:-1;background-image:linear-gradient(#aac9a31e 1px,transparent 1px),linear-gradient(90deg,#aac9a31e 1px,transparent 1px);background-size:29px 29px}.diagram-row{display:flex;justify-content:center;align-items:center;gap:7px;flex-wrap:wrap}.tank{width:95px;height:122px;border:3px solid #6199a0;border-top-width:8px;border-radius:16px 16px 25px 25px;background:linear-gradient(to top,#90d4e0 60%,#edf8f6 60%);display:grid;place-items:center;text-align:center;font-size:11px;font-weight:800;color:#396a75;box-shadow:0 12px 20px #34718b14;transition:transform .4s}.tank:hover{transform:translateY(-5px)}.tank.orange{border-color:#c5a46f;background:linear-gradient(to top,#f0d39f 50%,#fffaf0 50%);color:#856127}.tank.green{border-color:#8aa574;background:linear-gradient(to top,#aed49e 61%,#f3f9ed 61%);color:#466a38}.pipe{height:7px;min-width:15px;max-width:65px;flex:1;border-radius:30px;background:repeating-linear-gradient(90deg,#2699b4 0 14px,#a0dcf0 14px 27px);background-size:54px 100%;animation:waterflow 1.1s linear infinite}.pipe.off{background:#c7d7d1;animation:none}.mixer{width:106px;height:105px;border:3px solid #8db2a5;border-radius:22px;background:linear-gradient(to top,#b5e4d7 60%,#fafffc 60%);display:grid;place-items:center;position:relative;font-size:11px;font-weight:800}.mixer:after{content:'↻';font-size:36px;position:absolute;bottom:14px;color:#468d7e;animation:rotate 5s linear infinite}.water{text-align:center;margin:18px 0;color:#5797ae;font-size:11px;font-weight:700}.diagram-bottom,.zones{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px}.plant-node,.zone{border:1px solid #d2e4cd;background:#fffefaeb;border-radius:17px;padding:14px 7px;text-align:center;min-width:0;color:#2a533c;font-weight:800;transition:transform .3s,border-color .3s,box-shadow .3s}.plant-node:hover,.plant-node.chosen,.zone:hover,.zone.active{transform:translateY(-3px);border-color:#74a784;box-shadow:0 10px 25px #3e7c3d1c}.zone.active{background:#1c5140;color:white}.plant-node .sprout{display:block;min-height:45px;animation:sway 4s ease-in-out infinite}.plant-node b,.plant-node small{display:block;font-size:11px}.plant-node small{color:#829688;font-size:10px;margin-top:5px}.zone span{display:block;margin:7px 0}.zone small{font-weight:700}
.btn{border:0;display:inline-flex;align-items:center;gap:9px;border-radius:13px;padding:13px 18px;font-weight:800;font-size:12px;transition:transform .22s,box-shadow .22s}.btn:hover{transform:translateY(-3px)}.btn.dark{background:#174b3b;color:white}.btn.light{background:#e8f2e7;color:#28543b}.reset-btn{border:1px solid #f0d7c9;background:#fff0e7;color:#a06c58}.graphbox{height:230px;position:relative}.grid3,.calc,.cost-breakdown{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px}.mini{padding:17px;background:#f1f6ed;border-radius:16px}.mini span,.calc span{display:block;color:#789080;font-size:11px}.mini strong,.calc strong{display:block;font:800 23px Outfit;margin:9px 0}.calc{margin:20px 0}.calc .panel{padding:16px}.estimate,.auto-age-banner,.cost-summary-head{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;border-radius:16px;padding:20px;background:#eaf2e4;margin:16px 0}.estimate strong{font:800 25px Outfit}.footnote{font-size:11px;line-height:1.7;color:#8a978c;margin:12px 0 20px}.cost-breakdown{margin:15px 0}.cost-breakdown article{border-radius:17px;padding:17px;background:#f6f9f2;border:1px solid #e3ebdf}.cost-breakdown article h4{margin:0 0 10px;font-size:13px}.cost-breakdown article strong{display:block;font:800 22px Outfit}.cost-breakdown article small{display:block;font-size:11px;color:#799184;line-height:1.65;margin-top:8px}.at-v5-cost{margin:20px 0}
.sensor-log-section{margin:23px 0}.sensor-table-wrap{overflow-x:auto;width:100%}.sensor-table{width:100%;min-width:1640px;border-collapse:collapse;font-size:11px}.sensor-table th,.sensor-table td{padding:13px 11px;text-align:left;border-bottom:1px solid #e9eee5;white-space:nowrap}.sensor-table th{background:#eef5ea;color:#28553e}.decision-card{display:flex;gap:18px;align-items:flex-start;border-radius:20px;background:linear-gradient(120deg,#183f35,#295e46);padding:24px;color:white}.decision-orb{background:#d5ebab;color:#214936;border-radius:14px;width:50px;height:50px;display:grid;place-items:center;flex-shrink:0}.decision-card b{font:800 18px Outfit}.decision-card p{color:#dbeadc;font-size:13px;line-height:1.8}.decision-card small{color:#c0d3c6;font-size:11px}
.history-section{margin:25px 0}.history-header,.history-controls,.history-entry-header{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px}.history-header h3{font-size:26px}.history-tools,.history-filters{display:flex;flex-wrap:wrap;gap:8px}.history-overview,.history-data{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px;margin:15px 0}.history-stat,.history-data div{background:#f2f7ef;padding:14px;border-radius:14px}.history-stat span,.history-data small{font-size:11px;color:#7a8b7e;display:block}.history-stat strong{font:800 23px Outfit;display:block;margin-top:6px}.history-filter{background:#edf4e9;color:#42694d;padding:9px 13px;border:1px solid #d8e7d6;border-radius:10px;font-weight:800;font-size:11px}.history-filter.active{background:#245743;color:white}.history-timeline{padding-left:24px;position:relative}.history-timeline:before{content:'';background:#d7e6d1;width:2px;position:absolute;left:8px;top:5px;bottom:4px}.history-entry{border:1px solid #dbe8d8;background:#fffefa;border-radius:16px;padding:17px;margin:12px 0;position:relative}.history-entry:before{content:'';background:#7ba985;border:3px solid #edf6e8;border-radius:50%;width:14px;height:14px;position:absolute;left:-23px;top:20px}.history-entry h4{font:800 16px Outfit;margin:6px 0}.history-entry p,.history-note,.history-count{font-size:12px;color:#798b7d;line-height:1.8}.history-data b{font-size:12px}.footer{margin-top:45px;padding:38px 20px;background:#143f34;color:#d0dfd2;text-align:center;font-size:12px}
.at-v5-modal{position:fixed;inset:0;z-index:100;display:grid;place-items:center;background:#09261caa;backdrop-filter:blur(12px);padding:20px}.at-v5-modal[hidden]{display:none}.atan-modal{max-height:90vh;overflow:auto;width:min(510px,100%);border-radius:28px;background:#fffefa;padding:32px;box-shadow:0 40px 100px #0004}.atan-modal h2{font:800 32px Outfit;letter-spacing:-1px}.atan-modal p{font-size:13px;color:#71877b;line-height:1.8}.at-v5-input{width:100%;padding:13px;border:1px solid #c6dcca;background:white;border-radius:13px;margin-top:10px}.hidden{display:none!important}
/* Artistic motion – ornamental only; pipe movement always follows device state */
.dashboard-banner{position:relative;overflow:hidden;background:linear-gradient(110deg,#113b30,#275e47 65%,#426e4f);border-radius:29px;color:white;padding:35px 40px;margin:22px 0 20px;min-height:180px;display:flex;align-items:center;justify-content:space-between;gap:25px}.dashboard-banner:before{content:'';position:absolute;width:340px;height:340px;right:0;top:-150px;border:1px solid #d5edac45;border-radius:50%;box-shadow:0 0 0 45px #ffffff08,0 0 0 95px #ffffff06;animation:halo 8s ease-in-out infinite}.banner-art{font-size:74px;position:relative;animation:levitate 5s ease-in-out infinite;filter:drop-shadow(0 15px 15px #071d1977)}.dashboard-banner h2{position:relative;font-size:clamp(27px,3vw,43px);line-height:1.09;letter-spacing:-1.3px;margin:9px 0}.dashboard-banner p{position:relative;font-size:12px;color:#d5e4d8;max-width:580px;line-height:1.75}.dashboard-banner .eyebrow{color:#d4e6af}.reveal{animation:rise .8s cubic-bezier(.2,.7,.2,1) both}.metrics .metric:nth-child(2){animation-delay:.07s}.metrics .metric:nth-child(3){animation-delay:.14s}.metrics .metric:nth-child(4){animation-delay:.21s}.metrics .metric:nth-child(5){animation-delay:.28s}.metrics .metric:nth-child(6){animation-delay:.35s}
@keyframes waterflow{to{background-position:54px 0}}@keyframes rotate{to{transform:rotate(360deg)}}@keyframes sway{50%{transform:rotate(3deg)}}@keyframes levitate{50%{transform:translateY(-13px) rotate(-3deg)}}@keyframes halo{50%{transform:scale(1.1);opacity:.6}}@keyframes rise{from{opacity:0;transform:translateY(15px)}to{opacity:1;transform:translateY(0)}}
@media(max-width:1120px){.metrics{grid-template-columns:repeat(3,1fr)}.two-col{grid-template-columns:1fr}}@media(max-width:700px){.metrics{grid-template-columns:repeat(2,1fr)}.dashboard-top{flex-direction:column;align-items:flex-start}.dashboard-banner{padding:25px;min-height:150px}.banner-art{font-size:48px}.diagram-row{gap:3px}.tank{width:68px;height:95px}.mixer{width:77px;height:87px}.pipe{min-width:7px}.diagram-bottom,.zones{grid-template-columns:repeat(2,minmax(0,1fr))}.grid3,.calc,.cost-breakdown{grid-template-columns:1fr}.history-overview,.history-data{grid-template-columns:repeat(2,1fr)}.sensor-status-panel{flex-direction:column;align-items:flex-start}}@media(max-width:410px){.banner-art{display:none}.diagram{padding:15px 9px}.tank{width:59px;font-size:9px}.mixer{width:68px}.plant-node{padding:12px 4px}}
@media(prefers-reduced-motion:reduce){*,*:before,*:after{animation-duration:.01ms!important;scroll-behavior:auto!important;transition-duration:.01ms!important}}
</style>

   <script src="https://cdn.jsdelivr.net/npm/chart.js">
  </script>
 </head>
 <body>
<main>
<section class="screen active" id="dashboard">
    <div class="wrap">
     <div class="dashboard-top">
      <div>
       <span class="eyebrow">
        03 / Smart growing intelligence
       </span>
       <h1>
        Greenhouse
        <span style="color:#4f9462">
         Overview.
        </span>
       </h1>
       <p id="dashboard-summary">
       </p>
      </div>
      <div>
       
       <button class="btn reset-btn" onclick="resetSimulation()">
        &olarr; Mulai Ulang Siklus
       </button>
       
      </div>
     </div>
     <div class="dashboard-banner reveal" aria-label="ATAN Smart Greenhouse">
 <div><span class="eyebrow">✳ ATAN SI TATANEN / SMART GREENHOUSE</span><h2>Every drop matters.<br><span style="color:#d5ebab">Every plant thrives.</span></h2><p>Pantau lingkungan, aliran nutrisi, dan perjalanan tanaman cabai dari satu ruang kendali. Pembacaan tetap menunggu perangkat ESP32-S3 yang benar-benar aktif.</p></div><div class="banner-art" aria-hidden="true">🌿</div>
</div>
<div class="metrics" id="metrics">
      </div>
      <!-- STATUS SUMBER DATA: otomatis / ESP32-S3 -->
      <div class="panel sensor-status-panel reveal">
       <div>
        <span class="eyebrow">SENSOR STREAM</span>
        <strong id="connection-status">ESP32-S3 · Belum terhubung</strong>
        <p class="sub" id="sensor-updated">Menunggu pembacaan berikutnya.</p>
       </div>
       <span class="pill" id="sensor-source">Menunggu Koneksi</span>
     </div>
     <div class="two-col reveal">
      <div class="panel">
       <div class="sectionhead" style="margin:0 0 15px">
        <div>
         <span class="eyebrow">
          Interactive system
         </span>
         <h3>
          Living Greenhouse
         </h3>
         <p class="sub">
          Klik blok untuk melihat pembacaan terbaru. Aliran hanya menyala jika status aktuator dilaporkan perangkat.
         </p>
        </div>
        <span class="pill">
         Blok greenhouse
        </span>
       </div>
       <div class="diagram">
        <div class="diagram-row">
         <div class="tank">
          💧
          <br/>
          TANGKI AIR
         </div>
         <div class="pipe" title="Status aliran">
         </div>
         <div class="tank orange">
          🧪
          <br/>
          NUTRISI
         </div>
         <div class="pipe">
         </div>
         <div class="mixer">
          <span style="position:absolute;top:12px">
           MIXER
          </span>
         </div>
         <div class="pipe">
         </div>
         <div class="tank green">
          ⚙️
          <br/>
          POMPA
         </div>
        </div>
        <div class="water">
         ▼ Air + nutrisi dialirkan menuju zona penanaman ▼
        </div>
        <div class="diagram-bottom" id="diagram-plants">
        </div>
       </div>
       <div class="sectionhead" style="margin:18px 0 12px">
        <h3 style="font-size:16px">
         Pilih Zona Tanam
        </h3>
        <span class="pill" id="zone-status">
         Zona A aktif
        </span>
       </div>
       <!-- Tambah blok: hanya melalui popup, tidak ada form permanen. -->
        <div class="flex justify-end my-3">
            <button
                type="button"
                onclick="openAddBlockModal()"
                class="btn dark"
            >
                ＋ Tambah Blok
            </button>
        </div>
        <div class="zones" id="zones">
       </div>
      </div>
      <div class="panel">
       <span class="eyebrow">
        Environmental sensors
       </span>
       <h3>
        Detail Zona
        <span id="zone-label">
         A
        </span>
       </h3>
       <p class="sub">
        Data hanya berasal dari ESP32-S3. Nilai kosong berarti belum ada pembacaan.
       </p>
       <div id="sensor-detail">
       </div>
       <div style="height:12px">
       </div>
       <span class="eyebrow">
        Nutrients &amp; automation
       </span>
       <h3 style="margin-top:7px">
        Sistem Irigasi
       </h3>
       <div class="reading">
        <span>
         Solenoid Valve
        </span>
        <strong id="valve-state">
         Menunggu
        </strong>
       </div>
       <div class="reading">
        <span>
         Pompa Air
        </span>
        <strong>
         Menunggu
        </strong>
       </div>
       <div class="reading">
        <span>
         Mixer Nutrisi
        </span>
        <strong>
         Menunggu
        </strong>
       </div>
       <div class="reading">
        <span>
         Sensor NPK Tanah
        </span>
        <strong>
         N / P / K
        </strong>
       </div>
       <p class="footnote">
        Status irigasi mengikuti pembacaan terbaru. Antarmuka ini tidak mengirim perintah aktuator ke ESP32.
       </p>
       <div class="forecast">
        <span class="eyebrow" style="color:#b3dea3">
         Digital grow assistant
        </span>
        <h3 id="insight-title">
         Perhatikan kelembapan
        </h3>
        <p id="insight-text">
        </p>
       </div>
      </div>
     </div>
     <div class="two-col reveal">
      <div class="panel">
       <span class="eyebrow">
        04 / Growth intelligence
       </span>
       <h3>
        Prediksi Fase Pertumbuhan
       </h3>
       <p class="sub">
        Umur tanaman dihitung dari tanggal tanam. Prediksi ML belum terhubung.
       </p>
               <div class="auto-age-banner">
          <span>🌱 Umur otomatis berdasarkan tanggal tanam</span>
          <strong id="automatic-age-label">Hari ke-0</strong>
        </div>
        <input id="age" type="hidden" value="0">
        <input id="quantity" type="hidden" value="30">
<div class="day-actions">
        <button class="btn dark" onclick="advanceDay()">
         ＋ Lanjut Hari Berikutnya
        </button>
        <button class="btn light" onclick="resetSimulation()">
         &olarr; Ulang dari Hari 0
        </button>
       </div>
       <div class="stage-info" style="margin:0 0 18px">
        <div>
         <span class="eyebrow" id="current-period">
         </span>
         <h3 id="current-stage">
         </h3>
         <p id="current-explanation">
         </p>
        </div>
        <div class="illustration" id="current-art">
        </div>
       </div>
       <div class="grid3" id="stage-requirement">
       </div>
      </div>
      <div class="panel">
       <span class="eyebrow">
        Forecast visualization
       </span>
       <h3>
        Kebutuhan per Fase
       </h3>
       <p class="sub">
        Grafik akan terisi setelah hasil kebutuhan tervalidasi tersedia.
       </p>
       <div class="graphbox">
        <canvas id="growthChart">
        </canvas>
       </div>
       <div class="reading">
        <span>
         Estimasi hari hingga panen
        </span>
        <strong id="days-left">
        </strong>
       </div>
       <div class="reading">
        <span>
         Fase saat ini
        </span>
        <strong id="stage-label">
        </strong>
       </div>
      </div>
     </div>
     <div class="two-col reveal">
      <div class="panel">
       <span class="eyebrow">
        05 / Farm economics
       </span>
       <h3>
        Smart Farming Cost Planner
       </h3>
       <p class="sub">
        Proyeksi biaya berdasarkan konfigurasi pupuk dan parameter operasional. Pengeluaran aktual tersedia setelah data perangkat masuk.
       </p>
               <input type="hidden" id="water-price" value="15">
        <input type="hidden" id="fert-price" value="1500">
        <div class="cost-summary-head">
          <span>Perhitungan otomatis berdasarkan kebutuhan fase,<br>
            konsumsi perangkat, dan harga pupuk terdaftar.</span>
        </div>
        <div class="cost-breakdown" id="automatic-cost-breakdown"></div>
        <!-- Ringkasan tiga periode memakai konfigurasi biaya yang sama. -->
        <div class="at-v5-cost">
            <span class="eyebrow">Rekap &amp; Proyeksi Periode</span>
            <h3 class="mt-2 mb-3">Biaya Hari Ini, Bulan Ini &amp; Bulan Depan</h3>
            <p class="sub">
                Air, pupuk, dan listrik ditampilkan terpisah.
                Nilai tersedia setelah perangkat mengirim pemakaian terukur.
            </p>
            <div
                id="cost-period-grid"
                class="grid grid-cols-1 gap-3 md:grid-cols-3"
            ></div>
        </div>
<div class="calc">
        <div class="panel">
         <span>
          Air terukur
         </span>
         <strong id="phase-water">
          &mdash;
         </strong>
         <span>
          Liter &middot; menunggu flow meter
         </span>
        </div>
        <div class="panel">
         <span>
          Pupuk terukur
         </span>
         <strong id="phase-fert">
          &mdash;
         </strong>
         <span>
          Liter &middot; menunggu flow meter
         </span>
        </div>
        <div class="panel">
         <span>
          Biaya kebutuhan hari ini
         </span>
         <strong id="phase-cost">
          &mdash;
         </strong>
         <span>
          Rp &middot; estimasi proyeksi
         </span>
        </div>
       </div>
       <div class="estimate">
        <div>
         <span class="eyebrow">
          Projection to harvest
         </span>
         <h3>
          Estimasi biaya air, pupuk, listrik · 30 hari ke depan
         </h3>
        </div>
        <strong id="total-cost">
        </strong>
       </div>
       <p class="footnote">
        Pengeluaran air, pupuk, dan listrik memerlukan data total konsumsi aktual. Proyeksi belum ditampilkan sampai tersedia data yang memadai.
       </p>
      </div>
      <div class="panel">
       <span class="eyebrow">
        Resource breakdown
       </span>
       <h3>
        Komposisi Nutrisi &amp; Biaya
       </h3>
       <p class="sub">
        Pembacaan N/P/K akan ditampilkan setelah sensor RS485 terhubung.
       </p>
       <div class="graphbox">
        <canvas id="costChart">
        </canvas>
       </div>
       <div class="reading">
        <span>
         Indeks Nitrogen (N)
        </span>
        <strong id="n-index">
        </strong>
       </div>
       <div class="reading">
        <span>
         Indeks Fosfor (P)
        </span>
        <strong id="p-index">
        </strong>
       </div>
       <div class="reading">
        <span>
         Indeks Kalium (K)
        </span>
        <strong id="k-index">
        </strong>
       </div>
      </div>
     </div>
      <!-- TIME SERIES: maksimal 200 pembacaan paling baru -->
      <section class="panel sensor-log-section" id="sensor-log-section">
       <div class="sectionhead">
        <div>
         <span class="eyebrow">TIME SERIES / SENSOR LOG</span>
         <h3>Riwayat Pembacaan Sensor</h3>
         <p class="sub">Terisi hanya dari payload ESP32-S3 yang valid. Pembacaan ke-201 menggantikan data paling lama.</p>
        </div>
        <span class="pill" id="sensor-log-count">0 / 200</span>
       </div>
       <div class="sensor-table-wrap">
        <table class="sensor-table">
         <thead>
          <tr>
           <th>Waktu</th><th>Sumber</th><th>Zona</th>
           <th>Soil %</th><th>Suhu Udara °C</th><th>RH %</th>
           <th>Suhu Air °C</th><th>pH</th><th>EC</th><th>TDS ppm</th>
           <th>N mg/kg</th><th>P mg/kg</th><th>K mg/kg</th>
           <th>Flow L/min</th><th>Valve</th><th>Pompa</th><th>Mixer</th>
          </tr>
         </thead>
         <tbody id="sensor-log-body"></tbody>
        </table>
       </div>
      </section>
           <!-- Penjelasan keputusan analitik, tanpa mengganti Living Greenhouse -->
      <section class="panel" id="decision-explanation">
        <span class="eyebrow">Decision Intelligence / Explainable Rules</span>
        <h3>Alasan Keputusan Sistem</h3>
        <p class="sub">Rekomendasi diperbarui bersama pembacaan sensor terbaru.</p>
        <div class="decision-card">
          <div class="decision-orb">✦</div>
          <div>
            <b id="decision-heading">Menganalisis kondisi tanaman...</b>
            <p id="decision-reason">Menunggu kondisi sensor.</p>
            <small id="decision-source">Aturan interpretasi sensor · belum ada model Decision Tree terlatih</small>
          </div>
        </div>
      </section>
<section class="history-section panel" id="growth-history">
      <div class="history-header">
       <div>
        <span class="eyebrow">
         06 / Plant growth journal
        </span>
        <h3>
         Riwayat Perjalanan Tanaman
        </h3>
        <p class="sub">
         Perkembangan dari hari penyemaian sampai hari proyeksi saat ini. Catatan pertumbuhan dan sensor diperbarui mengikuti sumber data yang tersedia.
        </p>
       </div>
       <div class="history-tools flex flex-wrap gap-2">
        <button class="btn light" onclick="exportHistoryCSV()" type="button">
         &darr; Export CSV
        </button>
        <button class="btn reset-btn" onclick="resetSimulation()" type="button">
         &olarr; Mulai Ulang Siklus
        </button>
       </div>
      </div>
      <div class="history-overview" id="history-overview">
      </div>
      <div class="history-controls">
       <div aria-label="Filter riwayat" class="history-filters" role="group">
        <button class="history-filter active" data-period="7" onclick="filterHistory(7)" type="button">
         7 Hari
        </button>
        <button class="history-filter" data-period="30" onclick="filterHistory(30)" type="button">
         30 Hari
        </button>
        <button class="history-filter" data-period="all" onclick="filterHistory('all')" type="button">
         Semua
        </button>
       </div>
       <span class="history-count" id="history-count">
       </span>
      </div>
      <div aria-live="polite" class="history-timeline" id="history-timeline">
      </div>
      <p class="history-note">Hanya pembacaan ESP32-S3 yang diterima akan dicatat. Riwayat dalam memori halaman maksimal 200 baris; gunakan backend/database untuk arsip permanen.</p>
     </section>
    </div>
   </section>
  
</main>
<footer class="footer">
   ✳ ATAN si TATANEN &mdash; Teknologi Adaptif Nutrisi &middot; Smart Greenhouse Cabai &middot; ESP32-S3
  </footer>
<script>
   // =======================================================
// REFERENSI FASE PERTUMBUHAN CABAI
// Bagian ini nantinya dapat dihubungkan ke data IoT / ML.
// =======================================================

// Referensi fase pertumbuhan agronomi untuk cabai
// Profil cabai merupakan referensi statis, bukan pembacaan sensor.
const plants = {
    cabai: {
        "name": "Cabai",
        "latin": "Capsicum annuum",
        "emoji": "/img/cabai2.png",
        "description": "Cabai adalah tanaman penghasil buah pedas...",
        "duration": 120,
        "stages": [
            ["Persemaian", 0, 18, "/img/persemaian.png", "Benih berkembang menjadi bibit dan daun awal.", 2, 1, 1],
            ["Vegetatif", 19, 45, "/img/vegetatif.png", "Tanaman membangun akar, batang, dan percabangan.", 5, 3, 3],
            ["Pembungaan", 46, 65, "/img/pembungaan.png", "Muncul bunga sebagai awal perkembangan buah.", 6, 5, 5],
            ["Pembuahan", 66, 95, "/img/pembuahan.png", "Buah mulai terbentuk dan berkembang.", 8, 6, 8],
            ["Panen", 96, 120, "/img/panen.png", "Buah mencapai kematangan, panen dapat berlanjut setelah fase awal.", 7, 5, 7]
        ]
    }
};
  </script>
<script>
   // =======================================================
// LOGIKA INTERAKTIF, SIMULASI, RIWAYAT DAN RESET
// Bagian ini nantinya dapat dihubungkan ke data IoT / ML.
// =======================================================

// =============================================
// STATE DAN UTILITAS
// =============================================
const crop = 'cabai';
let selectedStage = 0;
let zone = 'A';
let growthChart;
let costChart;

const $ = (id) => document.getElementById(id);
const num = (value) => Math.round(value).toLocaleString('id-ID');
const rupiah = (value) => `Rp ${num(value)}`;
const sensorText = (value, unit = '', decimals = null) => {
    if (typeof value !== 'number' || !Number.isFinite(value)) return '—';
    const text = decimals === null ? String(value) : value.toFixed(decimals);
    return text + unit;
};

// Navigasi antarlayar (pilih tanaman, profil, dashboard).
function navigate(page) {
    // Dua dokumen terpisah, gunakan navigasi browser asli.
    window.location.href = page === 'dashboard'
        ? '/dashboard'
        : '/';
}

// Tanaman sudah ditetapkan sebagai cabai; tidak ada pemilihan klasifikasi.
function renderProfile() {
    const plant = plants[crop];

    $('profile-title').textContent = `Mengenal ${plant.name}.`;
    $('profile-desc').textContent = plant.description;
    $('profile-art').textContent = plant.emoji;
    $('profile-duration').textContent =
        `Ilustrasi siklus ± ${plant.duration} hari · bervariasi menurut varietas`;

    $('stages').innerHTML = plant.stages.map((stage, index) => `
        <button class="stage ${selectedStage === index ? 'active' : ''}"
                onclick="selectStage(${index})">
            <div class="illustration">${stage[3]}</div>
            <h4>${stage[0]}</h4>
            <p>Hari ${stage[1]}–${stage[2]}</p>
        </button>
    `).join('');

    selectStage(selectedStage);
}

function selectStage(index) {
    selectedStage = index;
    const stage = plants[crop].stages[index];

    document.querySelectorAll('.stage').forEach((element, position) => {
        element.classList.toggle('active', position === index);
    });

    $('stage-period').textContent = `Tahap ${index + 1} · hari ${stage[1]}–${stage[2]}`;
    $('stage-title').textContent = stage[0];
    $('stage-desc').textContent = stage[4];
    $('stage-art').textContent = stage[3];
    animateStageArtwork();
    renderStageKnowledge();
}

// =============================================
// SENSOR ESP32-S3 — TIDAK ADA DATA BUATAN
// =============================================
const sensorSeed = {
    temp: null,
    humidity: null,
    waterTemp: null,
    ph: null,
    ec: null,
    tds: null
};

const zoneSensors = [
    { soil: null, flow: null, n: null, p: null, k: null },
    { soil: null, flow: null, n: null, p: null, k: null },
    { soil: null, flow: null, n: null, p: null, k: null }
];

// Daftar blok dinamis; A, B, C adalah blok utama prototipe.
// Blok tambahan bersifat tampilan/monitoring hingga sensor dipasang.
const DEFAULT_BLOCKS = [
    { code: 'A', name: 'Blok A' },
    { code: 'B', name: 'Blok B' },
    { code: 'C', name: 'Blok C' }
];
const BLOCK_STORAGE_KEY = 'atan_extra_blocks_v5';
let extraBlocks = [];
try {
    const stored = JSON.parse(localStorage.getItem(BLOCK_STORAGE_KEY) || '[]');
    if (Array.isArray(stored)) {
        extraBlocks = stored
            .filter((item) => item && /^[D-Z]$/.test(item.code))
            .slice(0, 23)
            .map((item) => ({
                code: item.code,
                name: String(item.name || `Blok ${item.code}`).slice(0, 32)
            }));
    }
} catch (error) {
    extraBlocks = [];
}
function getBlocks() {
    return [...DEFAULT_BLOCKS, ...extraBlocks];
}
function ensureZoneSensors() {
    while (zoneSensors.length < getBlocks().length) {
        zoneSensors.push({
            soil: null, flow: null, n: null, p: null, k: null
        });
    }
}
function findZoneIndex(code) {
    return getBlocks().findIndex((block) => block.code === code);
}
function openAddBlockModal() {
    $('add-block-error').textContent = '';
    $('new-block-name').value = '';
    $('add-block-modal').hidden = false;
    $('new-block-name').focus();
}
function closeAddBlockModal() {
    $('add-block-modal').hidden = true;
}
function addBlock(event) {
    event.preventDefault();
    const index = getBlocks().length;
    if (index >= 26) {
        $('add-block-error').textContent = 'Maksimal 26 blok (A–Z).';
        return;
    }
    const code = String.fromCharCode(65 + index);
    const name = $('new-block-name').value.trim();
    if (!name) {
        $('add-block-error').textContent = 'Nama blok wajib diisi.';
        return;
    }
    extraBlocks.push({ code, name });
    localStorage.setItem(BLOCK_STORAGE_KEY, JSON.stringify(extraBlocks));
    ensureZoneSensors();
    closeAddBlockModal();
    renderDashboard();
    selectZone(code);
}
document.addEventListener('DOMContentLoaded', () => {
    if (!$('add-block-form')) return;
    $('add-block-form').addEventListener('submit', addBlock);
    $('add-block-modal').addEventListener('click', (event) => {
        if (event.target.id === 'add-block-modal') {
            closeAddBlockModal();
        }
    });
});
ensureZoneSensors();


function renderDashboard() {
    const plant = plants[crop];
    $('age').max = plant.duration;

    // Perbaikan: gunakan innerHTML agar tag <img> di dashboard-summary dirender
    $('dashboard-summary').innerHTML =
    `<img src="${plant.emoji}" alt="${plant.name}" class="w-5 h-5 inline-block align-middle mr-1 object-contain"> ${plant.name} · ${getBlocks().length} blok · IoT & predictive insights`;

    const metrics = [
        [`<img src="/img/suhu_udara.png" alt="Suhu Udara" class="w-6 h-6 object-contain">`, 'Suhu udara', sensorText(sensorSeed.temp, '°C', 1)],
        ['💦', 'Kelembapan udara', sensorText(sensorSeed.humidity, '%')],
        [`<img src="/img/suhu_air.png" alt="Suhu Air" class="w-6 h-6 object-contain">`, 'Suhu air', sensorText(sensorSeed.waterTemp, '°C', 1)],
        [`<img src="/img/sensor_ph.png" alt="pH Larutan" class="w-6 h-6 object-contain">`, 'pH larutan', sensorText(sensorSeed.ph)],
        ['⚡', 'EC', sensorText(sensorSeed.ec, ' mS/cm')],
        [`🌱`, 'Soil Moisture (Blok ' + zone + ')', sensorText(zoneSensors[findZoneIndex(zone)]?.soil, ' %', 1)]
    ];

    $('metrics').innerHTML = metrics.map(([icon, label, value]) => `
        <div class="metric reveal">
            <div class="symbol">${icon}</div>
            <label>${label}</label>
            <strong>${value}</strong>
            <small>● ${sensorSourceLabel()}</small>
        </div>
    `).join('');

    // 1. Dihubungkan langsung ke cabai2.png untuk Diagram Blok (Atas)
    $('diagram-plants').innerHTML = getBlocks().map((block, index) => `
        <button class="plant-node ${index === 0 ? 'chosen' : ''}"
                onclick="selectZone('${block.code}')">
            <span class="sprout">
                <img src="/img/cabai2.png" alt="Cabai" class="w-10 h-10 object-contain mx-auto block">
            </span>
            <b>${escapeHtml(block.name)}</b>
            <small>Klik untuk sensor</small>
        </button>
    `).join('');

    // 2. Dihubungkan langsung ke cabai2.png untuk Tombol Pilih Zona Tanam (Bawah)
    $('zones').innerHTML = zoneSensors.map((sensor, index) => {
        const block = getBlocks()[index];
        const label = block.code;
        return `
            <button class="zone" id="zone-${label}"
                    onclick="selectZone('${label}')">
                ${escapeHtml(block.name)}
                <span>
                    <img src="/img/cabai2.png" alt="Cabai" class="w-6 h-6 object-contain mx-auto my-1 block">
                </span>
                <small>${sensorText(sensor.soil, "%")}</small>
            </button>
        `;
    }).join('');

    selectZone(zone);
    refreshForecast();
}

function selectZone(label) {
    const index = findZoneIndex(label);
    if (index < 0) return;

    zone = label;
    const soilMetric = $('metrics')?.querySelectorAll('.metric')[5];
    if (soilMetric) {
        const soilLabel = soilMetric.querySelector('label');
        const soilValue = soilMetric.querySelector('strong');
        if (soilLabel) soilLabel.textContent = 'Soil Moisture (Blok ' + zone + ')';
        if (soilValue) soilValue.textContent = sensorText(zoneSensors[index]?.soil, ' %', 1);
    }
    const sensor = zoneSensors[index];
    $('zone-label').textContent = zone;
    $('zone-status').textContent = `Zona ${zone} dipilih`;

    document.querySelectorAll('.zone').forEach((element) => {
        element.classList.toggle('active', element.id === `zone-${zone}`);
    });

    document.querySelectorAll('.plant-node').forEach((element, position) => {
        element.classList.toggle('chosen', position === index);
    });

    const readings = [
        ['Kelembapan media tanam', sensorText(sensor.soil, ' %')],
        ['Laju aliran', sensorText(sensor.flow, ' L/menit', 1)],
        ['Nitrogen (N)', sensorText(sensor.n, ' mg/kg')],
        ['Fosfor (P)', sensorText(sensor.p, ' mg/kg')],
        ['Kalium (K)', sensorText(sensor.k, ' mg/kg')],
        ['pH larutan', sensorText(sensorSeed.ph)],
        ['EC larutan', sensorText(sensorSeed.ec, ' mS/cm')]
    ];

    $('sensor-detail').innerHTML = readings.map(([label, value]) => `
        <div class="reading">
            <span>${label}</span>
            <strong>${value}</strong>
        </div>
    `).join('');

    // Indikator aktual hanya boleh berasal dari status aktuator perangkat.
    const valve = sensor.valve === true ? 'ON'
        : sensor.valve === false ? 'OFF' : '—';
    const pump = sensor.pump === true ? 'ON'
        : sensor.pump === false ? 'OFF' : '—';
    $('valve-state').textContent = valve;
    if ($('pump-state')) $('pump-state').textContent = pump;
    if ($('mixer-state')) $('mixer-state').textContent =
        sensor.mixer === true ? 'ON' : sensor.mixer === false ? 'OFF' : '—';
    document.querySelectorAll('.pipe').forEach((pipe) => {
        pipe.classList.toggle('off', !(liveSensorConnected && sensor.pump === true));
    });
    $('insight-title').textContent = liveSensorConnected
        ? 'Analisis pembacaan zona' : 'Menunggu pembacaan perangkat';
    $('insight-text').textContent = liveSensorConnected
        ? 'Data aktual Zona ' + zone + ' ditampilkan. Perintah aktuator tidak dikirim melalui halaman ini.'
        : 'Belum ada pembacaan ESP32-S3 yang valid. Keputusan irigasi tidak dijalankan.';
}

// =============================================
// PREDIKSI ASUMSI DAN ESTIMASI BIAYA
// =============================================
function stageForAge(age) {
    const stages = plants[crop].stages;
    const found = stages.findIndex((stage) => age <= stage[2]);
    return found === -1 ? stages.length - 1 : found;
}

// Referensi fase berbasis tanggal tanam, bukan hasil prediksi ML.
function refreshForecast() {
    const plant = plants[crop];
    const age = getPlantAge();
    $('age').value = age;
    const stage = plant.stages[stageForAge(age)];
    
    $('automatic-age-label').textContent =
        `Hari ke-${age} · ${stage[0]}`;
    $('current-period').textContent =
        `Hari ${age} · rentang fase ${stage[1]}–${stage[2]}`;
    $('current-stage').textContent = stage[0];$('current-explanation').textContent = stage[4];
    
    // Perbaikan rendering gambar dengan penanganan error gambar
    const imagePath = stage[3];
    $('current-art').innerHTML = `
        <img src="${imagePath}" 
             alt="${stage[0]}" 
             class="h-28 w-auto max-w-full object-contain mx-auto block"
             onerror="this.onerror=null; console.error('Gagal memuat gambar:', '${imagePath}');">
    `;
    
    $('days-left').textContent =
        `${Math.max(0, plant.duration - age)} hari (estimasi)`;
    $('stage-label').textContent = stage[0];

    $('phase-water').textContent = '—';$('phase-fert').textContent = '—';
    $('phase-cost').textContent = '—';$('total-cost').textContent = '—';
    $('n-index').textContent = '—';$('p-index').textContent = '—';
    $('k-index').textContent = '—';$('stage-requirement').innerHTML = [
        ['💧 Air', 'Menunggu', 'Total air dari flow meter'],
        ['🧪 Larutan pupuk', 'Menunggu', 'Total dosis dari aktuator'],
        ['🌱 NPK', 'Menunggu', 'Sensor RS485 N/P/K']
    ].map(([label, value, unit]) => `
        <div class="mini">
            <span>${label}</span>
            <strong>${value}</strong>
            <span>${unit}</span>
        </div>
    `).join('');
    renderCharts(plant, null, null, null);
    renderHistory();
    renderAutomaticCost();
}

// Grafik tetap tampil dengan canvas kosong sampai data valid tersedia.
function renderCharts(plant) {
    if (typeof Chart === 'undefined') return;
    if (growthChart) growthChart.destroy();
    if (costChart) costChart.destroy();
    const labels = plant.stages.map(stage => stage[0]);
    growthChart = new Chart($('growthChart'), {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Data kebutuhan belum tersedia',
                data: labels.map(() => null),
                borderColor: '#3f9cba'
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
    costChart = new Chart($('costChart'), {
        type: 'doughnut',
        data: {
            labels: ['Menunggu pemakaian air, pupuk, listrik'],
            datasets: [{ data: [1], backgroundColor: ['#e5ebe3'] }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false }, tooltip: { enabled: false } }
        }
    });
}

// Untuk data nyata, isi API_SENSOR_URL dengan endpoint HTTP
// yang mengembalikan JSON seperti:
// {
//   "temp": 27.1,
//   "humidity": 72,
//   "waterTemp": 24.5,
//   "ph": 6.0,
//   "ec": 1.7,
//   "tds": 850,
//   "zones": [
//     {"soil": 66, "flow": 1.2, "n": 110, "p": 44, "k": 172},
//     {"soil": 58, "flow": 0.8, "n": 105, "p": 40, "k": 164},
//     {"soil": 74, "flow": 1.4, "n": 120, "p": 48, "k": 181}
//   ]
// }
// API disarankan melalui backend agar CORS dan autentikasi aman.
const API_SENSOR_URL = '/api/telemetry/latest';
const API_DEVICE_STATUS_URL = '/api/device/status';
const DEVICE_STATUS_INTERVAL_MS = 5000;
let deviceOnline = false;
let lastHeartbeatAt = null;
const SENSOR_INTERVAL_MS = 5000;
const SENSOR_HISTORY_LIMIT = 200;
let liveSensorConnected = false;
let sensorRecords = [];
let lastSensorTimestamp = null;
let lastValidTelemetryAt = 0;
const SENSOR_STALE_AFTER_MS = 15000;


// Koneksi ESP32 murni berdasarkan heartbeat, tidak bergantung pada pembacaan sensor.
function renderDeviceConnection() {
    const status = $('connection-status');
    const source = $('sensor-source');
    const updated = $('sensor-updated');
    if (!status || !source || !updated) return;

    status.textContent = deviceOnline
        ? 'ESP32-S3 · Terhubung'
        : 'ESP32-S3 · Belum terhubung';
    source.textContent = deviceOnline ? 'Perangkat Online' : 'Perangkat Offline';
    source.style.background = deviceOnline ? '#e9f2e6' : '#fff1e7';
    source.style.color = deviceOnline ? '#416e52' : '#9e705a';

    if (deviceOnline && !liveSensorConnected) {
        updated.textContent = 'ESP32 aktif · sensor belum tersedia / belum ada pembacaan terbaru';
    } else if (deviceOnline && lastSensorTimestamp) {
        updated.textContent = 'Sensor diperbarui ' +
            new Date(lastSensorTimestamp).toLocaleTimeString('id-ID');
    } else if (!deviceOnline) {
        updated.textContent = 'Tidak menerima heartbeat ESP32 terbaru';
    }
}

async function updateDeviceConnection() {
    try {
        const response = await fetch(API_DEVICE_STATUS_URL, {
            cache: 'no-store',
            signal: AbortSignal.timeout(4000)
        });
        if (!response.ok) throw new Error('HTTP ' + response.status);
        const data = await response.json();
        // Hanya endpoint heartbeat Laravel yang menentukan online/offline.
        deviceOnline = data.device_id === 'ESP32-S3-ATAN' && data.online === true;
        lastHeartbeatAt = data.last_seen_at || null;
    } catch (error) {
        deviceOnline = false;
        lastHeartbeatAt = null;
        console.warn('Gagal membaca heartbeat perangkat:', error.message);
    }
    renderDeviceConnection();
}

function sensorSourceLabel() {
    return liveSensorConnected ? 'Data Aktual ESP32-S3' : (deviceOnline ? 'Sensor Belum Tersedia' : 'Perangkat Offline');
}

function isValidNumber(value) {
    return typeof value === 'number' && Number.isFinite(value);
}

// Payload yang diterima wajib berisi pengukuran nyata dari ESP32-S3.
// Tiap zona dapat memiliki code A/B/C dan status valve/pump/mixer.
function applyRealSensorData(data) {
    if (!data || !Array.isArray(data.zones)) {
        throw new Error('Payload wajib memiliki array zones.');
    }

    // Endpoint yang tersedia tidak membuktikan ESP32 masih hidup.
    // Status aktif mensyaratkan timestamp pembacaan baru dari perangkat.
    const stamp = data.timestamp;
    const parsedStamp = typeof stamp === 'number'
        ? (stamp < 1e11 ? stamp * 1000 : stamp)
        : Date.parse(stamp);

    if (!Number.isFinite(parsedStamp)) {
        throw new Error('Timestamp ESP32-S3 wajib tersedia dan valid.');
    }

    const ageMs = Date.now() - parsedStamp;
    if (ageMs > SENSOR_STALE_AFTER_MS || ageMs < -5000) {
        throw new Error('Pembacaan sensor sudah kedaluwarsa.');
    }

    // Jika backend mengulang paket lama, status tidak boleh tetap aktif.
    if (lastValidTelemetryAt && parsedStamp <= lastValidTelemetryAt) {
        throw new Error('Tidak ada pembacaan baru dari ESP32-S3.');
    }

    const keys = ['temp', 'humidity', 'waterTemp', 'ph', 'ec', 'tds'];
    for (const key of keys) {
        if (data[key] !== null && data[key] !== undefined &&
            !isValidNumber(data[key])) {
            throw new Error('Parameter tidak valid: ' + key);
        }
    }

    const byCode = new Map();
    data.zones.forEach((item, index) => {
        const code = item.code || getBlocks()[index]?.code;
        if (!code) return;
        for (const key of ['soil', 'flow', 'n', 'p', 'k']) {
            if (item[key] !== null && item[key] !== undefined &&
                !isValidNumber(item[key])) {
                throw new Error('Parameter ' + code + '.' + key + ' tidak valid');
            }
        }
        byCode.set(code, item);
    });
    if (byCode.size === 0) {
        throw new Error('Belum ada zona valid.');
    }

    const hasMeasurement =
        keys.some(key => isValidNumber(data[key])) ||
        [...byCode.values()].some(item =>
            ['soil', 'flow', 'n', 'p', 'k'].some(key =>
                isValidNumber(item[key])
            )
        );

    if (!hasMeasurement) {
        throw new Error('Belum ada nilai sensor aktual dalam payload.');
    }

    keys.forEach((key) => {
        sensorSeed[key] = isValidNumber(data[key]) ? data[key] : null;
    });
    getBlocks().forEach((block, i) => {
        const item = byCode.get(block.code);
        const empty = {
            soil: null, flow: null, n: null, p: null, k: null,
            valve: null, pump: null, mixer: null
        };
        zoneSensors[i] = { ...empty, ...item };
    });
    lastSensorTimestamp = parsedStamp;
    lastValidTelemetryAt = parsedStamp;
    return [...byCode.keys()];
}

function addSensorRecords(timestamp, receivedCodes) {
    zoneSensors.forEach((item, i) => {
        if (!receivedCodes.includes(getBlocks()[i].code)) return;
        sensorRecords.push({
            timestamp,
            source: sensorSourceLabel(),
            zone: getBlocks()[i].code,
            soil: item.soil,
            temp: sensorSeed.temp,
            humidity: sensorSeed.humidity,
            waterTemp: sensorSeed.waterTemp,
            ph: sensorSeed.ph,
            ec: sensorSeed.ec,
            tds: sensorSeed.tds,
            n: item.n, p: item.p, k: item.k,
            flow: item.flow,
            valve: item.valve === true ? 'ON' : item.valve === false ? 'OFF' : '—',
            pump: item.pump === true ? 'ON' : item.pump === false ? 'OFF' : '—',
            mixer: item.mixer === true ? 'ON' : item.mixer === false ? 'OFF' : '—'
        });
    });

    // Circular window: catatan paling tua otomatis tersingkir.
    sensorRecords = sensorRecords.slice(-SENSOR_HISTORY_LIMIT);
}

function renderSensorRecords() {
    const table = $('sensor-log-body');
    if (!table) return;

    $('sensor-log-count').textContent =
        sensorRecords.length + ' / ' + SENSOR_HISTORY_LIMIT;

    table.replaceChildren();
    const fragment = document.createDocumentFragment();

    for (const record of [...sensorRecords].reverse()) {
        const tr = document.createElement('tr');
        const values = [
            new Date(record.timestamp).toLocaleTimeString('id-ID'),
            record.source,
            record.zone,
            record.soil,
            record.temp,
            record.humidity,
            record.waterTemp,
            record.ph,
            record.ec,
            record.tds,
            record.n, record.p, record.k,
            record.flow,
            record.valve, record.pump, record.mixer
        ];
        for (const value of values) {
            const td = document.createElement('td');
            td.textContent = value === null || value === undefined || Number.isNaN(value) ? '—' : String(value);
            tr.appendChild(td);
        }
        fragment.appendChild(tr);
    }
    table.appendChild(fragment);
}

function refreshLiveSensorDisplay() {
    if (!$('metrics') || !$('dashboard').classList.contains('active')) {
        renderDeviceConnection();
        return;
    }

    // Re-render hanya nilai sensor dan zona, bukan keseluruhan dashboard.
    const metricValues = [
        sensorText(sensorSeed.temp, '°C', 1),
        sensorText(sensorSeed.humidity, '%'),
        sensorText(sensorSeed.waterTemp, '°C', 1),
        sensorText(sensorSeed.ph),
        sensorText(sensorSeed.ec, ' mS/cm'),
        sensorText(zoneSensors[findZoneIndex(zone)]?.soil, ' %', 1)
    ];

    const soilLabel = $('metrics')?.querySelectorAll('.metric')[5]?.querySelector('label');
    if (soilLabel) soilLabel.textContent = 'Soil Moisture (Blok ' + zone + ')';

    $('metrics').querySelectorAll('.metric').forEach((card, index) => {
        const value = card.querySelector('strong');
        const source = card.querySelector('small');
        if (value) value.textContent = metricValues[index];
        if (source) source.textContent = '● ' + sensorSourceLabel();
    });

    zoneSensors.forEach((item, i) => {
        const small = $('zone-' + getBlocks()[i].code)?.querySelector('small');
        if (small) small.textContent = sensorText(item.soil, '%');
    });

    selectZone(zone);
    renderDeviceConnection();
    renderSensorRecords();
    renderHistory();
    updateDecisionExplanation();
}

// Tidak ada input manual; polling berjalan setiap 5 detik.
// Polling tidak pernah menghasilkan nilai palsu ketika perangkat offline.
async function updateSensorsAutomatically() {
    liveSensorConnected = false;
    if (!API_SENSOR_URL) {
        liveSensorConnected = false;
        refreshLiveSensorDisplay();
        return;
    }

    try {
        const response = await fetch(API_SENSOR_URL, {
            cache: 'no-store',
            signal: AbortSignal.timeout(4000)
        });
        if (!response.ok) throw new Error('HTTP ' + response.status);
        const data = await response.json();
        const receivedCodes = applyRealSensorData(data);
        liveSensorConnected = true;
        addSensorRecords(lastSensorTimestamp, receivedCodes);
    } catch (error) {
        console.warn('ESP32-S3 offline / payload tidak valid:', error.message);
        liveSensorConnected = false;
        Object.keys(sensorSeed).forEach(key => { sensorSeed[key] = null; });
        zoneSensors.forEach(item => {
            ['soil', 'flow', 'n', 'p', 'k', 'valve', 'pump', 'mixer']
                .forEach(key => { item[key] = null; });
        });
    }
    refreshLiveSensorDisplay();
}

// ===========================================================
// KONFIGURASI BUDIDAYA: tersimpan pada browser
// ===========================================================
function localDateString() {
    const now = new Date();
    const offset = now.getTimezoneOffset() * 60000;
    return new Date(now.getTime() - offset)
        .toISOString()
        .slice(0, 10);
}

let plantStartDate = localStorage.getItem('atan_start_date') || localDateString();
let fertilizerProfile = JSON.parse(
    localStorage.getItem('atan_fertilizer') || 'null'
) || {
    name: 'AB Mix',
    packagePrice: 45000,
    packageVolume: 1000
};

const RESOURCE_CONFIG = {
    waterPricePerLiter: 15,
    electricityPricePerKwh: 1700,
    dailyElectricalWatts: 22,
    dailyElectricalHours: 3,
    // Konsentrat pupuk per tanaman per hari, hanya baseline
    fertilizerConcentrateMl: [1.2, 2.4, 3.3, 4.2, 2.8]
};

function getPlantAge() {
    const start = new Date(plantStartDate + 'T00:00:00');
    const today = new Date(localDateString() + 'T00:00:00');
    const elapsed = Math.floor((today - start) / 86400000);
    return Math.min(plants[crop].duration, Math.max(0, elapsed));
}

function openFertStep() {
    // Form tersedia langsung pada halaman profil.
    $('fert-step').classList.remove('hidden');
}

function saveFertilizer(event) {
    event.preventDefault();

    fertilizerProfile = {
        name: $('fert-name').value.trim(),
        packagePrice: Math.max(0, Number($('fert-package-price').value)),
        packageVolume: Math.max(1, Number($('fert-package-volume').value))
    };

    localStorage.setItem(
        'atan_fertilizer',
        JSON.stringify(fertilizerProfile)
    );

    $('fert-save-status').textContent =
        'Pengaturan pupuk berhasil disimpan.';

    // Jangan mereset tanggal tanam sewaktu harga pupuk diedit.
    if ($('dashboard')) {
        refreshForecast();
    }
}

function animateStageArtwork() {
    const el = $('stage-art');
    el.classList.remove('stage-animate');
    void el.offsetWidth;
    el.classList.add('stage-animate');
}

function initializeWelcome() {
    // Landing langsung menampilkan profil cabai dan pengaturan pupuk.
    openFertStep();
    $('fert-name').value = fertilizerProfile.name || '';
    $('fert-package-price').value = fertilizerProfile.packagePrice || '';
    $('fert-package-volume').value = fertilizerProfile.packageVolume || '';
}

// ==========================================================
// V5 — Biaya kalender: hari ini, bulan ini, bulan depan.
// "Bulan ini" = proyeksi total bulan kalender berjalan,
// bukan klaim jumlah uang yang sudah dibayarkan.
// ==========================================================
function daysBetweenLocalDates(startDate, endDate) {
    const a = Date.UTC(
        startDate.getFullYear(),
        startDate.getMonth(),
        startDate.getDate()
    );
    const b = Date.UTC(
        endDate.getFullYear(),
        endDate.getMonth(),
        endDate.getDate()
    );
    return Math.floor((b - a) / 86400000);
}
function renderPeriodCosts() {
    const target = $('cost-period-grid');
    if (!target) return;
    target.innerHTML = [
        'Hari Ini', 'Bulan Ini', 'Bulan Depan'
    ].map(label => `
        <article class="rounded-2xl border border-emerald-100 bg-[#f8faf3] p-5">
            <h4 class="font-bold text-emerald-900">${label}</h4>
            <p class="mt-2 text-xs text-slate-500">Air · Pupuk · Listrik</p>
            <strong class="mt-3 block text-xl text-emerald-950">—</strong>
            <small class="text-slate-500">Menunggu data pemakaian aktual</small>
        </article>
    `).join('');
}

function calculateDailyCosts() {
    return {
        liters: null,
        concentrateMl: null,
        electricityKwh: null,
        waterCost: null,
        fertilizerCost: null,
        electricityCost: null
    };
}

function renderAutomaticCost() {
    $('automatic-cost-breakdown').innerHTML = [
        '💧 Air', '🧪 Pupuk · ' + fertilizerProfile.name, '⚡ Listrik'
    ].map(label => `
        <article>
            <h4>${escapeHtml(label)}</h4>
            <span>Biaya hari ini</span>
            <strong>—</strong>
            <small>Menunggu pemakaian terukur</small>
            <hr class="my-3 border-t border-emerald-100">
            <span>Perkiraan 30 hari ke depan</span>
            <strong>—</strong>
        </article>
    `).join('');
    $('phase-cost').textContent = '—';
    $('total-cost').textContent = '—';
    renderPeriodCosts();
}

function escapeHtml(value) {
    return String(value).replace(/[&<>"']/g, (c) => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;',
        '"': '&quot;', "'": '&#39;'
    }[c]));
}

function updateDecisionExplanation() {
    const sensor = zoneSensors[findZoneIndex(zone)];
    if (!sensor || !liveSensorConnected ||
        !isValidNumber(sensor.soil) || !isValidNumber(sensorSeed.temp)) {
        $('decision-explanation').textContent =
            'Menunggu suhu DHT22 dan kelembapan tanah aktual dari ESP32-S3. ' +
            'Analisis keputusan belum dapat dilakukan.';
        return;
    }
    const dry = sensor.soil < 60;
    const hot = sensorSeed.temp >= 32;
    const nutrientReadings = [sensor.n, sensor.p, sensor.k];
    const npkAvailable = nutrientReadings.every(isValidNumber);
    const npkTotal = npkAvailable
        ? nutrientReadings.reduce((a, b) => a + b, 0) : null;
    const message = [
        `Suhu DHT22 ${sensorSeed.temp.toFixed(1)}°C;`,
        `kelembapan tanah Zona ${zone} ${sensor.soil}%.`,
        dry ? 'Tanah di bawah ambang pantau 60%.'
            : 'Tanah tidak di bawah ambang pantau 60%.',
        hot ? 'Suhu tinggi, periksa ventilasi.'
            : 'Suhu di bawah ambang pantau 32°C.',
        npkAvailable ? `Pembacaan N/P/K: ${sensor.n}/${sensor.p}/${sensor.k} mg/kg.`
            : 'Pembacaan NPK belum tersedia.',
        'Ini penjelasan aturan pemantauan, bukan hasil Decision Tree terlatih.',
        'Status relay aktual harus dibaca dari perangkat; tidak ada perintah otomatis.'
    ];
    $('decision-explanation').textContent = message.join(' ');
}

const botanyKnowledge = {
    cabai: {
        intro: 'Cabai (Capsicum annuum) merupakan anggota Solanaceae ' +
            'dengan pertumbuhan vegetatif, pembungaan, dan panen buah yang bisa berulang.',
        notes: [
            ['Bibit muda', 'Perkecambahan memerlukan media cukup air dan oksigen. ' +
                'Akar muda masih sensitif pada genangan.',
             'Lingkungan', 'Pastikan drainase dan suhu semai stabil.',
             'Pengamatan', 'Catat jumlah bibit hidup dan daun sejati.'],
            ['Percabangan', 'Daun, batang, dan cabang terbentuk sebagai penopang ' +
                'calon bunga dan buah.',
             'Kebutuhan', 'Nutrisi harus seimbang agar vegetatif tidak berlebihan.',
             'Pengamatan', 'Periksa jumlah cabang, warna daun, dan akar.'],
            ['Pembentukan bunga', 'Bunga muncul dan dapat gugur ketika ' +
                'tanaman mengalami stres lingkungan.',
             'Kebutuhan', 'Kelola kestabilan suhu, air, dan unsur hara.',
             'Pengamatan', 'Amati bunga terbuka dan tingkat kerontokan.'],
            ['Pengisian buah', 'Buah cabai mengalami pembesaran dan ' +
                'akumulasi senyawa khas sesuai varietas.',
             'Kebutuhan', 'Pertahankan air dan nutrisi stabil.',
             'Pengamatan', 'Amati pertumbuhan, kesehatan, dan warna buah.'],
            ['Panen berulang', 'Buah dipetik sesuai tingkat kematangan; ' +
                'tanaman dapat tetap berbunga dan berbuah setelah panen pertama.',
             'Kebutuhan', 'Sesuaikan pemeliharaan setelah setiap petik.',
             'Pengamatan', 'Catat bobot dan interval panen per blok.']
        ]
    }
};


// Materi mendalam per fase. Rekomendasi bersifat edukatif;
// dosis akhir harus divalidasi untuk varietas, media, dan iklim.
const detailedChiliStages = [
    {
        morphology: 'Benih menyerap air (imbibisi), embrio mengaktifkan proses metabolisme, radikula muncul, lalu hipokotil dan kotiledon berkembang. Daun sejati pertama menjadi tanda awal kapasitas fotosintesis yang lebih stabil.',
        roots: 'Sistem perakaran masih pendek dan rentan terhadap kurang oksigen akibat genangan. Media semai perlu porous, lembap tetapi tidak jenuh air.',
        nutrients: 'Cadangan makanan benih membantu fase awal. Pemupukan pekat terlalu dini dapat meningkatkan tekanan osmotik dan merusak akar muda. Mulai nutrisi bertahap sesuai kondisi bibit dan formulasi yang teruji.',
        environment: 'Cahaya cukup, sirkulasi udara baik, suhu tidak ekstrem, dan penyiraman halus membantu bibit tumbuh seragam. pH/EC diperiksa bila memakai fertigasi.',
        observation: 'Catat tanggal semai, persentase berkecambah, jumlah daun sejati, gejala rebah semai, warna kotiledon, serta pertumbuhan akar.',
        risks: 'Risiko umum meliputi damping-off, media terlalu basah, bibit etiolasi karena cahaya rendah, dan stres setelah pindah tanam.'
    },
    {
        morphology: 'Tanaman mengembangkan ruas batang, akar lateral, luas daun, dan percabangan. Tajuk yang sehat membentuk kapasitas fotosintesis untuk menopang fase generatif berikutnya.',
        roots: 'Akar menyebar untuk mengambil air dan hara. Tanaman pada polybag perlu ruang akar, drainase, serta penghindaran genangan berkepanjangan.',
        nutrients: 'Nitrogen mendukung pembentukan daun dan jaringan vegetatif; fosfor berperan dalam transfer energi dan pembentukan akar; kalium mendukung pengaturan air dan berbagai proses enzimatis. Proporsi harus seimbang.',
        environment: 'Jaga kelembapan media stabil, cahaya cukup, dan aerasi greenhouse. Kelebihan nitrogen dapat mendorong daun lebat tanpa keseimbangan pertumbuhan generatif.',
        observation: 'Ukur tinggi tanaman, jumlah daun dan cabang, diameter batang, intensitas hijau daun, serta perkembangan akar dan tanda hama.',
        risks: 'Waspadai serangan kutu daun, trips, tungau, gejala kekurangan hara, dan pertumbuhan terlalu rimbun akibat pemupukan tidak seimbang.'
    },
    {
        morphology: 'Titik tumbuh mulai membentuk organ reproduksi. Bakal bunga berkembang menjadi bunga; keberhasilan penyerbukan dan pembuahan menentukan jumlah calon buah.',
        roots: 'Akar harus tetap aktif menyediakan air dan unsur hara. Kekeringan atau perubahan kelembapan mendadak meningkatkan stres dan dapat memicu kerontokan bunga.',
        nutrients: 'Fosfor terkait metabolisme energi, sedangkan kalium mendukung keseimbangan air dan proses fisiologis. Unsur mikro seperti boron juga penting dalam perkembangan reproduktif, sesuai kebutuhan yang terukur.',
        environment: 'Suhu terlalu tinggi, kelembapan udara ekstrem dan sirkulasi yang buruk bisa menurunkan keberhasilan pembentukan buah. Ventilasi dan kontinuitas irigasi perlu diperhatikan.',
        observation: 'Catat tanggal bunga pertama, jumlah tandan bunga, bunga yang gugur, pembentukan bakal buah, serta kondisi mikroklimat ketika bunga muncul.',
        risks: 'Stres panas, serangan trips, defisit air, dan ketidakseimbangan nutrisi dapat menyebabkan bunga rontok atau pembentukan buah rendah.'
    },
    {
        morphology: 'Setelah pembuahan, sel-sel buah membelah lalu membesar. Buah bertambah panjang dan berat; biji serta jaringan perikarp berkembang hingga mencapai ukuran varietasnya.',
        roots: 'Kebutuhan suplai air relatif konsisten karena buah yang berkembang memerlukan transportasi hara dan tekanan turgor. Hindari perubahan kadar air terlalu drastis.',
        nutrients: 'Kalium penting bagi transportasi hasil fotosintesis dan keseimbangan osmotik. Kalsium mendukung integritas jaringan; pengaturan nutrisi harus mempertimbangkan keseluruhan larutan dan hasil pengukuran.',
        environment: 'Jaga suhu, kelembapan dan pencahayaan yang mendukung pembentukan buah. Irigasi berlebih dapat mengurangi oksigen akar, sedangkan defisit ekstrem membatasi pembesaran.',
        observation: 'Pantau panjang dan diameter buah, jumlah buah per tanaman, tanda busuk ujung buah, kondisi bunga baru, serta serangan hama pada buah.',
        risks: 'Masalah yang perlu dipantau antara lain busuk ujung buah, antraknosa, kerusakan serangga, pecah buah, dan stres kelembapan media.'
    },
    {
        morphology: 'Buah mencapai kematangan fisiologis dan warna kulit berubah sesuai varietas. Cabai dapat dipanen beberapa kali karena tanaman masih dapat menghasilkan bunga dan buah baru.',
        roots: 'Perakaran tetap membutuhkan aerasi dan pasokan air walaupun buah dipetik berulang. Pemeliharaan tidak berhenti setelah panen pertama.',
        nutrients: 'Kebutuhan unsur hara mengikuti ritme pembungaan, pembentukan buah, dan panen berikutnya. Penyesuaian pupuk dilakukan berdasarkan kondisi tanaman serta pengukuran pH, EC dan media.',
        environment: 'Pilih waktu panen dengan suhu lapang tidak terlalu tinggi; hindari luka mekanis dan kelembapan berlebih selama penanganan hasil.',
        observation: 'Catat tanggal petik, bobot panen per blok, jumlah buah layak jual, tingkat kematangan, interval panen, serta kerusakan pascapanen.',
        risks: 'Waspadai penurunan kesehatan tanaman, pembusukan buah, keterlambatan panen, dan tekanan penyakit selama fase produksi berkepanjangan.'
    }
];

function renderStageKnowledge() {
    const knowledge = botanyKnowledge[crop];
    const values = knowledge.notes[selectedStage];
    const detail = detailedChiliStages[selectedStage];

    $('learning-title').textContent =
        plants[crop].stages[selectedStage][0] +
        ' · Panduan lengkap fase cabai';

    $('learning-intro').textContent =
        knowledge.intro + ' ' +
        'Durasi tiap fase adalah ilustrasi umum dan dapat berubah ' +
        'sesuai varietas, suhu, lingkungan, dan manajemen budidaya.';

    const topics = [
        ['🌱 Proses pertumbuhan', detail.morphology],
        ['🌿 Perkembangan akar', detail.roots],
        ['🧪 Nutrisi & unsur hara', detail.nutrients],
        ['💧 Lingkungan & irigasi', detail.environment],
        ['🔬 Parameter pengamatan', detail.observation],
        ['🛡️ Risiko & pencegahan', detail.risks]
    ];

    const articleClasses = [
        'rounded-2xl',
        'border',
        'border-[#dce9d8]',
        'bg-[#f1f6ed]',
        'p-[18px]'
    ].join(' ');

    $('learning-grid').innerHTML = topics.map(([title, description]) => `
        <article class="${articleClasses}">
            <b>${title}</b>
            <p>${description}</p>
        </article>
    `).join('');
}


// =============================================
// JURNAL PEMBACAAN SENSOR AKTUAL
// =============================================
let historyPeriod = 7;
function readScenario() {
    const plant = plants[crop];
    return {
        plant,
        age: getPlantAge(),
        quantity: Math.max(1, Number($('quantity').value) || 1),
        waterPrice: Math.max(0, Number($('water-price').value) || 0),
        fertilizerPrice: Math.max(0, Number($('fert-price').value) || 0)
    };
}
// Riwayat diambil dari paket sensor yang benar-benar diterima.
// Tidak membuat catatan masa lalu atau nilai sensor tiruan.
function getDailyHistory() {
    const groups = new Map();
    sensorRecords.forEach(record => {
        const date = new Date(record.timestamp).toLocaleDateString('sv-SE');
        if (!groups.has(date)) groups.set(date, []);
        groups.get(date).push(record);
    });
    return [...groups.entries()].map(([date, rows]) => ({
        date,
        rows,
        latest: rows[rows.length - 1]
    })).sort((a, b) => a.date.localeCompare(b.date));
}

function renderHistory() {
    const list = getDailyHistory();
    const shown = historyPeriod === 'all' ? list : list.slice(-historyPeriod);
    $('history-overview').innerHTML = [
        ['🌱 Umur tanaman', 'Hari ke-' + getPlantAge()],
        ['📅 Hari tercatat', list.length],
        ['📡 Pembacaan tersimpan', sensorRecords.length],
        ['🧪 Sumber', deviceOnline ? 'ESP32-S3 Online' : 'Perangkat Offline']
    ].map(([label, value]) => `
        <div class="history-stat">
            <span>${label}</span>
            <strong>${value}</strong>
        </div>
    `).join('');
    $('history-count').textContent =
        `Menampilkan ${shown.length} dari ${list.length} hari yang tercatat`;
    $('history-timeline').innerHTML = shown.length
        ? [...shown].reverse().map(item => `
            <article class="history-entry">
                <div class="history-entry-header">
                    <div>
                        <span class="eyebrow">${item.date}</span>
                        <h4>🌶️ ${item.rows.length} pembacaan ESP32-S3</h4>
                    </div>
                    <span class="pill">Sensor aktual</span>
                </div>
                <p>Data terbaru dari blok ${escapeHtml(item.latest.zone)}.</p>
                <div class="history-data">
                    <div><small>Soil</small><b>${sensorText(item.latest.soil, '%')}</b></div>
                    <div><small>Suhu</small><b>${sensorText(item.latest.temp, '°C')}</b></div>
                    <div><small>RH</small><b>${sensorText(item.latest.humidity, '%')}</b></div>
                    <div><small>pH / EC</small><b>${sensorText(item.latest.ph)} / ${sensorText(item.latest.ec)}</b></div>
                    <div><small>Flow</small><b>${sensorText(item.latest.flow, ' L/min')}</b></div>
                    <div><small>Valve</small><b>${escapeHtml(item.latest.valve)}</b></div>
                </div>
            </article>
        `).join('')
        : '<p class="sub">Belum ada riwayat sensor dari ESP32-S3.</p>';
    document.querySelectorAll('.history-filter').forEach(button => {
        button.classList.toggle('active',
            String(historyPeriod) === button.dataset.period);
    });
}
function filterHistory(period) {
    historyPeriod = period;
    renderHistory();
}
function advanceDay() {
    const input = $('age');
    const max = plants[crop].duration;
    input.value = getPlantAge(); // otomatis dari tanggal tanam
    refreshForecast();
    $('growth-history').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
function resetSimulation() {
    // Semua state proyeksi frontend kembali ke awal.
    plantStartDate = localDateString();
    localStorage.setItem('atan_start_date', plantStartDate);
    $('age').value = 0;
    $('quantity').value = 30;
    $('water-price').value = 15;
    $('fert-price').value = 1500;
    // Arsip sensor aktual tidak dihapus saat mulai ulang siklus tanam.
    renderSensorRecords();
    zone = 'A';
    selectedStage = 0;
    historyPeriod = 7;
    selectZone('A');
    refreshForecast();
    $('dashboard').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
function exportHistoryCSV() {
    const headings = [
        'Waktu', 'Sumber', 'Blok', 'Soil (%)', 'Suhu (C)',
        'RH (%)', 'pH', 'EC (mS/cm)', 'Flow (L/min)', 'Valve'
    ];
    const rows = sensorRecords.map(item => [
        new Date(item.timestamp).toISOString(), item.source, item.zone,
        item.soil, item.temp, item.humidity, item.ph, item.ec,
        item.flow, item.valve
    ]);
    const csv = [headings, ...rows].map(row =>
        row.map(value => `"${String(value ?? '').replace(/"/g, '""')}"`)
            .join(',')
    ).join('\r\n');
    const blob = new Blob(['\uFEFF', csv], {
        type: 'text/csv;charset=utf-8'
    });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = 'riwayat-sensor-cabai.csv';
    link.click();
    URL.revokeObjectURL(url);
}

// Inisialisasi setelah semua state terdefinisi.
if ($('profile')) {
    initializeWelcome();
    renderProfile();
}
if ($('dashboard')) {
    renderDashboard();
    renderDeviceConnection();
    updateDeviceConnection();
    setInterval(updateDeviceConnection, DEVICE_STATUS_INTERVAL_MS);
    updateSensorsAutomatically();
    setInterval(updateSensorsAutomatically, SENSOR_INTERVAL_MS);
}

  </script>
<!-- =========================================================
     V5 / POPUP TAMBAH BLOK
     Data disimpan sementara di localStorage browser.
     ========================================================= -->
<div
    id="add-block-modal"
    class="at-v5-modal"
    role="dialog"
    aria-modal="true"
    aria-labelledby="add-block-title"
    hidden
>
    <div
        class="atan-modal w-full max-w-lg rounded-3xl p-6
               sm:p-9"
    >
        <div class="flex items-center justify-between gap-4">
            <span class="eyebrow">Greenhouse Management</span>
            <button
                type="button"
                onclick="closeAddBlockModal()"
                aria-label="Tutup popup"
                class="rounded-full bg-emerald-50 px-3 py-2
                       font-bold text-emerald-900"
            >×</button>
        </div>
        <h2 id="add-block-title">Tambah blok tanaman.</h2>
        <p>
            Setiap blok yang ditambahkan muncul di Living Greenhouse,
            daftar zona, dan riwayat sensor otomatis.
        </p>
        <form id="add-block-form" class="mt-6 space-y-4">
            <label class="block text-sm font-bold text-emerald-950">
                Nama blok
                <input
                    class="at-v5-input mt-2"
                    id="new-block-name"
                    maxlength="32"
                    placeholder="Contoh: Blok D / Sayuran Timur"
                    required
                >
            </label>
            <p class="text-xs text-emerald-700">
                Kode blok berikutnya dibuat otomatis (D, E, F, ...).
                Nama ini hanya sebagai label tampilan.
            </p>
            <p
                class="text-sm text-red-700"
                id="add-block-error"
                aria-live="polite"
            ></p>
            <button
                type="submit"
                class="btn dark w-full justify-center"
            >Simpan dan Tambahkan Blok →</button>
        </form>
    </div>
</div>


</body>
</html>
