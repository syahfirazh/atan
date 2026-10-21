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
.atan-sensor-actions{display:flex;align-items:center;justify-content:flex-end;gap:10px;flex-wrap:wrap}
.atan-sensor-actions .btn{white-space:nowrap;padding:11px 16px}
@media(max-width:700px){.sensor-log-section .sectionhead{align-items:flex-start;flex-direction:column}.atan-sensor-actions{width:100%;justify-content:space-between}}
</style>

   <script src="https://cdn.jsdelivr.net/npm/chart.js">
  </script>
 </head>
 <body>
<main>
<section class="screen active" id="dashboard">
    <div class="wrap">
     <div class="dashboard-top">
<div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap"><button id="atan-monitor-toggle" type="button" class="btn dark" aria-pressed="true">Monitoring: ON</button><span id="atan-monitor-note" style="font-size:11px;color:#63826b">Mengatur refresh dashboard, bukan daya ESP32</span></div>
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
           <section class="panel" style="margin:12px 0 18px" aria-label="Diagnostik sensor mentah">
        <span class="eyebrow">DIAGNOSTIK / PEMBACAAN MENTAH</span>
        <h3>ADC Sensor &amp; NPK Global</h3>
        <p class="sub">Pembacaan mentah ESP32, bukan persentase Soil atau nilai pH/TDS terkalibrasi. NPK ditampilkan global, bukan diasumsikan per zona.</p>
        <div class="grid3" id="atan-raw-diagnostic"><div class="mini">Menunggu telemetry diagnostik...</div></div>
      </section>
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
        <strong id="pump-state">
         Menunggu
        </strong>
       </div>
       <div class="reading">
        <span>
         Mixer Nutrisi
        </span>
        <strong id="mixer-state">
         Menunggu
        </strong>
       </div>
       <div class="reading">
        <span>
         Sensor NPK Tanah
        </span>
        <strong id="global-npk-state">
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
<div class="atan-growth-settings" style="display:flex;align-items:end;gap:12px;flex-wrap:wrap;margin:16px 0;padding:16px;border-radius:16px;background:#f0f6eb">
  <label style="font-size:12px;font-weight:700">Tanggal tanam cabai<br><input type="date" id="atan-planting-date" style="margin-top:7px;border:1px solid #bdd2be;border-radius:10px;padding:10px;background:white;max-width:100%"></label>
  <button type="button" class="btn dark" id="atan-save-planting-date">Simpan tanggal tanam</button>
  <span id="atan-growth-status" style="font-size:12px;color:#4a6956" aria-live="polite">Memuat fase pertumbuhan...</span>
</div>
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
        <div id="atan-nutrient-cost" class="panel" style="margin:16px 0;background:#f4f8ef">
          <span class="eyebrow">COST / PUPUK A + B + AIR + LISTRIK</span>
          <h3>Rekap Bahan Nutrisi & Listrik</h3>
          <p class="sub">Resep adalah perkiraan. Biaya pupuk dan air dicatat saat batch benar-benar dibuat; energi berasal dari aktivitas relay ESP32.</p>
          <div class="grid3" style="margin:14px 0">
            <div class="mini"><span>Resep per batch (estimasi)</span><strong id="nc-recipe">—</strong></div>
            <div class="mini"><span>Batch tercatat hari ini</span><strong id="nc-batches">—</strong></div>
            <div class="mini"><span>Pupuk hari ini (A+B)</span><strong id="nc-fertilizer">—</strong></div>
            <div class="mini"><span>Air batch hari ini</span><strong id="nc-water">—</strong></div>
            <div class="mini"><span>Listrik hari ini</span><strong id="nc-electricity">—</strong></div>
            <div class="mini"><span>Total biaya tercatat hari ini</span><strong id="nc-total">—</strong></div>
          </div>
          <p id="nc-info" class="footnote">Menunggu API biaya Laravel.</p>
          <a href="/#fertilizer-section" class="btn dark">Atur Pupuk A/B & Air ↗</a>
        </div>
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
  <div class="sectionhead" style="flex-wrap:wrap;gap:12px">
    <div>
      <span class="eyebrow">TIME SERIES / SENSOR LOG</span>
      <h3>Riwayat Pembacaan Sensor &amp; Biaya</h3>
      <p class="sub">100 telemetry terbaru dari MySQL. Arsip tidak dihapus saat perangkat offline. Biaya merupakan akumulasi hingga waktu pembacaan, bukan biaya per sampel.</p>
    </div>
    <span class="pill" id="sensor-log-count">Memuat arsip...</span>
  </div>
  <div class="atan-history-tools">
    <label>Dari tanggal <input id="atan-csv-from" type="date"></label>
    <label>Sampai tanggal <input id="atan-csv-to" type="date"></label>
    <button type="button" class="btn dark" id="atan-download-db-csv">↓ Download CSV</button>
    <button type="button" class="btn light" id="atan-reload-db-history">↻ Perbarui</button>
  </div>
  <p class="footnote" id="atan-history-info" aria-live="polite">Memuat riwayat database...</p>
  <div class="sensor-table-wrap">
    <table class="sensor-table" style="min-width:1900px">
      <thead><tr>
        <th>Waktu (Laravel)</th><th>Soil A %</th><th>Soil B %</th><th>Soil C %</th>
        <th>Soil ADC A/B/C</th><th>Suhu Udara °C</th><th>RH %</th><th>Suhu Air °C</th>
        <th>pH</th><th>EC mS/cm</th><th>TDS ppm</th><th>N / P / K global</th>
        <th>Air batch kumulatif L</th><th>Biaya air batch Rp</th><th>Pupuk A Rp</th><th>Pupuk B Rp</th>
        <th>Listrik relay kWh</th><th>Biaya listrik relay Rp</th><th>Pompa air belum terukur (kejadian)</th><th>PZEM V</th><th>PZEM A</th><th>PZEM W</th><th>PZEM meter kWh</th><th>PZEM kumulatif kWh</th><th>Biaya listrik PZEM Rp</th>
</tr></thead>
      <tbody id="sensor-log-body"><tr><td colspan="19">Memuat riwayat...</td></tr></tbody>
    </table>
  </div>
  <p class="footnote">Nilai Soil % dan EC kosong sampai kalibrasi/perangkat EC tersedia. Air dan pupuk menunjukkan batch yang dicatat, bukan konsumsi terukur. Listrik adalah estimasi dari relay dengan daya diketahui; pompa air utama belum memiliki angka watt.</p>
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
            ["Vegetatif Awal", 0, 30, "/img/vegetatif.png", "Pembentukan daun, batang, akar awal; status divalidasi lewat pengamatan tanaman.", 0, 0, 0],
            ["Vegetatif Akhir", 31, 60, "/img/vegetatif.png", "Pertumbuhan vegetatif lanjut serta persiapan generatif.", 0, 0, 0],
            ["Pembungaan", 61, 90, "/img/pembungaan.png", "Pemunculan bunga; observasi lapangan diperlukan untuk memastikan fase.", 0, 0, 0],
            ["Pembuahan / Panen", 91, 99999, "/img/panen.png", "Perkembangan buah dan panen berulang; umur hanya panduan.", 0, 0, 0]
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

// Diagnostik global dari endpoint /api/telemetry/latest (bukan persentase).
let soilAdcByZone = { A: null, B: null, C: null };
let globalNpk = { n: null, p: null, k: null };

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
        [`🌱`, 'Soil Moisture (belum aktif)', '—']
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
                <small>${isValidNumber(sensor.soil) ? sensorText(sensor.soil, '%', 1) : (isValidNumber(soilAdcByZone[label]) ? soilAdcByZone[label] + ' ADC (mentah)' : '—')}</small>
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
        if (soilLabel) soilLabel.textContent = 'Soil Moisture (belum aktif)';
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
        ['Kelembapan media tanam (terkalibrasi)', '—'],
        ['Soil (ADC mentah)', sensorText(soilAdcByZone[label], ' ADC')],
        ['Suhu udara (global)', sensorText(sensorSeed.temp, ' °C', 1)],
        ['Kelembapan udara (global)', sensorText(sensorSeed.humidity, ' %', 1)],
        ['Suhu air (global)', sensorText(sensorSeed.waterTemp, ' °C', 1)],
        ['Laju aliran', sensorText(sensor.flow, ' L/menit', 1)],
        ['Nitrogen (N) global / register mentah', sensorText(globalNpk.n, ' raw')],
        ['Fosfor (P) global / register mentah', sensorText(globalNpk.p, ' raw')],
        ['Kalium (K) global / register mentah', sensorText(globalNpk.k, ' raw')],
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
    if ($('global-npk-state')) $('global-npk-state').textContent =
        ['n','p','k'].map(k => sensorText(globalNpk[k])).join(' / ') + ' (global)';
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
    
    $('automatic-age-label').textContent = plantStartDate
        ? `Hari ke-${age} · ${stage[0]}`
        : 'Tanggal tanam belum diatur';
    $('current-period').textContent =
        `Hari ${age} · rentang fase ${stage[1]}–${stage[2]}`;
    $('current-stage').textContent = !plantStartDate ? 'Tanggal tanam belum diatur' : (stage[0]);$('current-explanation').textContent = !plantStartDate ? 'Simpan tanggal tanam agar fase dihitung berdasarkan umur kalender.' : stage[4];
    
    // Perbaikan rendering gambar dengan penanganan error gambar
    const imagePath = stage[3];
    $('current-art').innerHTML = `
        <img src="${imagePath}" 
             alt="${stage[0]}" 
             class="h-28 w-auto max-w-full object-contain mx-auto block"
             onerror="this.onerror=null; console.error('Gagal memuat gambar:', '${imagePath}');">
    `;
    
    $('days-left').textContent =
        `Fase kalender; pengamatan lapang wajib`;
    $('stage-label').textContent = stage[0];

    // Angka biaya akan diisi ulang oleh renderAutomaticCost() dari API.
    $('n-index').textContent = sensorText(globalNpk.n);
    $('p-index').textContent = sensorText(globalNpk.p);
    $('k-index').textContent = sensorText(globalNpk.k);$('stage-requirement').innerHTML = [
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
const DEVICE_STATUS_INTERVAL_MS = 2000;
let deviceOnline = false;
let lastHeartbeatAt = null;
const SENSOR_INTERVAL_MS = 5000;
const SENSOR_HISTORY_LIMIT = 100; // hanya jendela browser, arsip resmi ada di MySQL
let liveSensorConnected = false;
let sensorRecords = [];
let lastSensorTimestamp = null;
let lastValidTelemetryAt = 0;
const SENSOR_STALE_AFTER_MS = 20000; // toleransi HTTP/laju sensor; status offline tetap via heartbeat


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
    if (window.atanMonitoringPaused) return;
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
    return liveSensorConnected ? 'Data Aktual ESP32-S3' : (lastSensorTimestamp ? 'Data terakhir / tidak live' : (deviceOnline ? 'Sensor Belum Tersedia' : 'Perangkat Offline'));
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
    // Kontrak raw diagnostics dan NPK global tidak boleh dianggap data per zona.
    const raw = data.diagnostic || {};
    const soilRaw = Array.isArray(raw.soil_adc) ? raw.soil_adc : [];
    const npkRaw = data.npk || {};
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
        ) || soilRaw.some(isValidNumber) ||
        ['n', 'p', 'k'].some(k => isValidNumber(npkRaw[k]));

    if (!hasMeasurement) {
        throw new Error('Belum ada nilai sensor aktual dalam payload.');
    }

    keys.forEach((key) => {
        sensorSeed[key] = isValidNumber(data[key]) ? data[key] : null;
    });
    ['A','B','C'].forEach((code, index) => {
        soilAdcByZone[code] = isValidNumber(soilRaw[index]) ? soilRaw[index] : null;
    });
    ['n','p','k'].forEach(k => {
        globalNpk[k] = isValidNumber(npkRaw[k]) ? npkRaw[k] : null;
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
            soilAdc: soilAdcByZone[getBlocks()[i].code] ?? null,
            temp: sensorSeed.temp,
            humidity: sensorSeed.humidity,
            waterTemp: sensorSeed.waterTemp,
            ph: sensorSeed.ph,
            ec: sensorSeed.ec,
            tds: sensorSeed.tds,
            n: globalNpk.n, p: globalNpk.p, k: globalNpk.k,
            flow: item.flow,
            valve: item.valve === true ? 'ON' : item.valve === false ? 'OFF' : '—',
            pump: item.pump === true ? 'ON' : item.pump === false ? 'OFF' : '—',
            mixer: item.mixer === true ? 'ON' : item.mixer === false ? 'OFF' : '—'
        });
    });

    // Circular window: catatan paling tua otomatis tersingkir.
    sensorRecords = sensorRecords.slice(-SENSOR_HISTORY_LIMIT);
}

// Riwayat resmi dirender dari database, bukan dari cache sensorRecords browser.
function renderSensorRecords() { /* Tampilan dikelola atanLoadDatabaseHistory(). */ }

function refreshLiveSensorDisplay() {
    if (!$('metrics') || !$('dashboard').classList.contains('active')) {
        renderDeviceConnection();
        return;
    }

    liveSensorConnected = !!lastSensorTimestamp && deviceOnline && (Date.now()-lastSensorTimestamp < SENSOR_STALE_AFTER_MS);
    // Re-render hanya nilai sensor dan zona, bukan keseluruhan dashboard.
    const metricValues = [
        sensorText(sensorSeed.temp, '°C', 1),
        sensorText(sensorSeed.humidity, '%'),
        sensorText(sensorSeed.waterTemp, '°C', 1),
        sensorText(sensorSeed.ph),
        sensorText(sensorSeed.ec, ' mS/cm'),
        '—'
    ];

    const soilLabel = $('metrics')?.querySelectorAll('.metric')[5]?.querySelector('label');
    if (soilLabel) soilLabel.textContent = 'Soil Moisture (belum aktif)';

    $('metrics').querySelectorAll('.metric').forEach((card, index) => {
        const value = card.querySelector('strong');
        const source = card.querySelector('small');
        if (value) value.textContent = metricValues[index];
        if (source) source.textContent = '● ' + sensorSourceLabel();
    });

    zoneSensors.forEach((item, i) => {
        const small = $('zone-' + getBlocks()[i].code)?.querySelector('small');
        if (small) small.textContent = isValidNumber(item.soil)
            ? sensorText(item.soil, '%', 1)
            : (isValidNumber(soilAdcByZone[getBlocks()[i].code])
                ? soilAdcByZone[getBlocks()[i].code] + ' ADC (mentah)' : '—');
    });

    selectZone(zone);
    ['n','p','k'].forEach((k) => {
        const node = $(k + '-index');
        if (node) node.textContent = sensorText(globalNpk[k]);
    });
    renderDeviceConnection();
    renderSensorRecords();
    renderHistory();
    updateDecisionExplanation();
}

// Tidak ada input manual; polling berjalan setiap 5 detik.
// Polling tidak pernah menghasilkan nilai palsu ketika perangkat offline.
async function updateSensorsAutomatically() {
    if (window.atanMonitoringPaused) return;
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
        // Pertahankan snapshot terakhir; status sumber menandai data tidak lagi live.
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

let plantStartDate = null; // sumber tanggal tanam: MySQL melalui /api/growth/current
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
    if (!plantStartDate) return 0;
    const start = new Date(plantStartDate + 'T00:00:00');
    const today = new Date(localDateString() + 'T00:00:00');
    const elapsed = Math.floor((today - start) / 86400000);
    return Math.max(0, elapsed);
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
// Ringkasan biaya diisi hanya dari data backend, bukan angka default/simulasi.
let atanCostLatest = null;
let atanForecast30 = null;
const costMoney = v => 'Rp ' + Number(v || 0).toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 6});
const costNum = v => Number(v || 0);
function calculateDailyCosts() { return atanCostLatest?.today || null; }
function renderPeriodCosts() {
    const target = $('cost-period-grid');
    if (!target) return;
    if (!atanCostLatest) {
        target.innerHTML = '<p class="sub">Menunggu data biaya dari Laravel...</p>';
        return;
    }
    const cards = [
        ['Hari Ini', atanCostLatest.today],
        ['Bulan Ini (tercatat)', atanCostLatest.month],
        ['Proyeksi 30 Hari', atanForecast30 || null]
    ];
    target.innerHTML = cards.map(([label, period]) => {
        if (!period) return `<article class="rounded-2xl border border-emerald-100 bg-[#f8faf3] p-5"><h4>${label}</h4><strong>—</strong><small>Belum ada dasar proyeksi yang tervalidasi</small></article>`;
        return `<article class="rounded-2xl border border-emerald-100 bg-[#f8faf3] p-5">
          <h4 class="font-bold text-emerald-900">${label}</h4>
          <small>Air ${costMoney(period.water)} · Pupuk ${costMoney(period.fertilizer)} · Listrik ${costMoney(period.electricity)}</small>
          <strong class="mt-3 block text-xl text-emerald-950">${costMoney(period.total)}</strong>
          <small>${period.batches} batch · ${period.events} aktivitas relay</small>
        </article>`;
    }).join('');
}
function renderAutomaticCost() {
    const target = $('automatic-cost-breakdown');
    if (!target) return;
    const today = atanCostLatest?.today;
    if (!today) {
        target.innerHTML = ['💧 Air','🧪 Pupuk A + B','⚡ Listrik'].map(label =>
            `<article><h4>${label}</h4><strong>—</strong><small>Menunggu data Laravel</small></article>`).join('');
        return;
    }
    const rows = [
       ['💧 Air (batch)', today.water, 'Volume air resep dicatat saat batch dibuat'],
       ['🧪 Pupuk A + B', today.fertilizer, 'Biaya bahan pada batch yang dicatat'],
       ['⚡ Listrik (PZEM)', today.electricity, 'Energi dari PZEM; tarif Rp1.444,70/kWh; tidak dijumlah dengan estimasi relay']
    ];
    target.innerHTML = rows.map(([label,value,note]) => `<article><h4>${label}</h4><span>Biaya hari ini</span><strong>${costMoney(value)}</strong><small>${note}</small></article>`).join('');
    if ($('phase-cost')) $('phase-cost').textContent = costMoney(today.total);
    if ($('phase-water')) $('phase-water').textContent = atanCostLatest.today.batches ? today.waterLiters.toLocaleString('id-ID',{maximumFractionDigits:3}) + ' L (batch)' : '—';
    if ($('phase-fert')) $('phase-fert').textContent = '—';
    if ($('total-cost')) $('total-cost').textContent = '—';
    renderPeriodCosts();
}
// Biaya pupuk dan air dari event relay TIDAK ditambahkan lagi jika batch sudah
// mencatat bahan-bahan yang sama; ini mencegah double-count.
async function atanRefreshCosts() {
    if (window.atanMonitoringPaused) return;
    try {
        const responses = await Promise.all([
            fetch('/api/nutrient/summary', {cache:'no-store'}),
            fetch('/api/cost/summary', {cache:'no-store'}),
            fetch('/api/energy/summary', {cache:'no-store'}),
            fetch('/api/finance/forecast', {cache:'no-store'})
        ]);
        if (responses.some(r => !r.ok)) throw new Error('HTTP ' + responses.map(r=>r.status).join('/'));
        const [nutrient, electrical, energy, forecast] = await Promise.all(responses.map(r=>r.json()));
        atanForecast30 = forecast.ready ? { ...forecast.forecast, batches: forecast.observed_batches || 0, events: 0 } : null;
        const period = key => {
            const batch = nutrient[key] || {}, relay = electrical[key] || {};
            const pzem = energy[key] || {};
            const a=costNum(batch.fertilizer_a_rp), b=costNum(batch.fertilizer_b_rp);
            const fertilizer=a+b, water=costNum(batch.water_rp), electricity=costNum(pzem.rp);
            return {a,b,fertilizer,water,electricity,total:fertilizer+water+electricity,
                batches:costNum(batch.batches),events:costNum(relay.events),waterLiters:costNum(batch.water_l),
                kwh:costNum(pzem.kwh),meterReadings:costNum(pzem.readings)};
        };
        atanCostLatest={today:period('today'),month:period('month'),all:period('all')};
        const t=atanCostLatest.today, r=nutrient.recipe_estimate_per_batch;
        const set=(id,value)=>{const e=$(id);if(e)e.textContent=value};
        set('nc-recipe',r?costMoney(r.total_rp):'Belum ada resep');
        set('nc-batches',String(t.batches));
        set('nc-fertilizer',costMoney(t.fertilizer));
        set('nc-water',costMoney(t.water));
        set('nc-electricity',t.meterReadings ? costMoney(t.electricity)+' / '+t.kwh.toFixed(6)+' kWh' : 'Menunggu PZEM');
        set('nc-total',costMoney(t.total));
        set('nc-info',t.meterReadings ? 'Air dan pupuk = batch tercatat; listrik = PZEM (hanya beban yang melewati meter). Estimasi relay tidak dijumlah ulang.' : 'Belum ada bacaan PZEM. Total biaya saat ini hanya mencakup bahan yang tercatat; listrik belum terukur.');
        renderAutomaticCost();
    } catch(e) {
        atanCostLatest=null;atanForecast30=null;
        const info=$('nc-info');if(info)info.textContent='API biaya belum dapat dibaca: '+e.message;
        renderAutomaticCost();
    }
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
        $('decision-heading').textContent = 'Menunggu kalibrasi Soil';
        $('decision-reason').textContent =
            'Suhu dan ADC Soil sudah bisa dipantau, tetapi aturan irigasi menunggu kelembapan tanah (%) terkalibrasi. Tidak ada perintah pompa otomatis.';
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
    $('decision-heading').textContent = 'Analisis Zona ' + zone;
    $('decision-reason').textContent = message.join(' ');
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
    // Tombol reset tampilan tidak mengubah tanggal tanam tersimpan di MySQL.
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
// Mengunduh data yang tersimpan pada tabel Riwayat Pembacaan Sensor.
// CSV memakai ; sebagai pemisah agar Excel regional Indonesia membaca kolom terpisah.
function downloadLegacyMemoryCSV_UNUSED() {
    if (!sensorRecords.length) {
        window.alert('Belum ada riwayat pembacaan sensor untuk diunduh.');
        return;
    }

    const headings = [
        'Waktu Pembacaan', 'Sumber Data', 'Zona', 'Soil Moisture (%)',
        'Soil ADC (mentah)', 'Suhu Udara (°C)', 'Kelembapan Udara (%)',
        'Suhu Air (°C)', 'pH', 'EC (mS/cm)', 'TDS (ppm)',
        'Nitrogen Global (raw)', 'Fosfor Global (raw)', 'Kalium Global (raw)',
        'Aliran (L/menit)', 'Valve', 'Pompa', 'Mixer'
    ];

    const formatDate = (timestamp) => {
        const date = new Date(timestamp);
        if (Number.isNaN(date.getTime())) return '';
        const pad = x => String(x).padStart(2, '0');
        return `${pad(date.getDate())}/${pad(date.getMonth() + 1)}/${date.getFullYear()} ` +
               `${pad(date.getHours())}:${pad(date.getMinutes())}:${pad(date.getSeconds())}`;
    };

    const safeCell = (value) => {
        if (value === null || value === undefined ||
            (typeof value === 'number' && !Number.isFinite(value)) || value === '—') return '';
        // Angka memakai koma desimal agar cocok dengan Excel regional Indonesia.
        if (typeof value === 'number') return String(value).replace('.', ',');
        let text = String(value).replace(/\r?\n/g, ' ').trim();
        // Hindari interpretasi nilai teks dari sensor sebagai rumus spreadsheet.
        if (/^[=+@\-\t\r]/.test(text)) text = "'" + text;
        return text;
    };
    const csvEscape = value => '"' + safeCell(value).replace(/"/g, '""') + '"';
    const records = [...sensorRecords].sort((a, b) => new Date(a.timestamp) - new Date(b.timestamp));
    const rows = records.map(item => [
        formatDate(item.timestamp), item.source, item.zone,
        item.soil, item.soilAdc, item.temp, item.humidity, item.waterTemp,
        item.ph, item.ec, item.tds, item.n, item.p, item.k,
        item.flow, item.valve, item.pump, item.mixer
    ]);

    // Baris sep=; membantu Excel mengenali delimiter tanpa wizard impor.
    const csv = '\uFEFFsep=;\r\n' + [headings, ...rows]
        .map(row => row.map(csvEscape).join(';'))
        .join('\r\n') + '\r\n';
    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    const now = new Date();
    const datePart = [now.getFullYear(),
        String(now.getMonth()+1).padStart(2, '0'),
        String(now.getDate()).padStart(2, '0')].join('-');
    link.href = url;
    link.download = `ATAN_Riwayat_Sensor_${datePart}.csv`;
    document.body.appendChild(link);
    link.click();
    link.remove();
    setTimeout(() => URL.revokeObjectURL(url), 1000);
}

function exportHistoryCSV() {
    const headings = [
        'Waktu', 'Sumber', 'Blok', 'Soil (%)', 'Soil ADC mentah', 'Suhu (C)',
        'RH (%)', 'pH', 'EC (mS/cm)', 'Flow (L/min)', 'Valve'
    ];
    const rows = sensorRecords.map(item => [
        new Date(item.timestamp).toISOString(), item.source, item.zone,
        item.soil, item.soilAdc, item.temp, item.humidity, item.ph, item.ec,
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


<script>
// Monitor diagnostik langsung dari Laravel; status ESP32 tetap di-handle heartbeat.
(async function atanRawDiagnostics() {
  const el=document.getElementById('atan-raw-diagnostic');
  if(!el) return;
  const fmt=(n,unit='') => typeof n==='number' && Number.isFinite(n) ? String(n)+unit : '—';
  const add=(name,value)=>{const div=document.createElement('div');div.className='mini';
    const title=document.createElement('span');title.textContent=name;
    const v=document.createElement('strong');v.textContent=value;
    div.append(title,v);el.append(div);};
  async function refresh(){try{
    const r=await fetch('/api/telemetry/latest',{cache:'no-store'});
    if(!r.ok)throw new Error('HTTP '+r.status);
    const data=await r.json();
    const d=data.diagnostic||{}, n=data.npk||{};
    el.replaceChildren();
    const soils=Array.isArray(d.soil_adc)?d.soil_adc:[];
    ['A','B','C'].forEach((z,i)=>add('Soil '+z+' (ADC mentah)',fmt(soils[i])));
    add('pH (ADC mentah)',fmt(d.ph_adc));
    add('pH GPIO (V)',fmt(d.ph_voltage,' V'));
    add('TDS (ADC mentah)',fmt(d.tds_adc));
    add('TDS GPIO (V)',fmt(d.tds_voltage,' V'));
    add('N global (mg/kg raw)',fmt(n.n));
    add('P global (mg/kg raw)',fmt(n.p));
    add('K global (mg/kg raw)',fmt(n.k));
  } catch(e){el.replaceChildren(); add('Status diagnostik','Gagal mengambil API: '+e.message);}}
  await refresh();setInterval(refresh,5000);
})();
</script>
<script>document.addEventListener("DOMContentLoaded",()=>{atanRefreshCosts();setInterval(atanRefreshCosts,5000);});
// Fase pertumbuhan resmi disimpan di Laravel/MySQL, bukan localStorage.
async function atanLoadGrowth() {
    const status = document.getElementById('atan-growth-status');
    try {
        const response = await fetch('/api/growth/current', {cache:'no-store'});
        if (!response.ok) throw new Error('HTTP ' + response.status);
        const data = await response.json();
        plantStartDate = data.planting_date || null;
        document.getElementById('atan-planting-date').value = plantStartDate || '';
        status.textContent = plantStartDate ? 'Fase: ' + data.phase.name + ' · hari ke-' + data.age_days : 'Masukkan tanggal tanam';
        refreshForecast();
    } catch(e) {
        status.textContent = 'Data fase tidak dapat dimuat: ' + e.message;
    }
}
document.getElementById('atan-save-planting-date').addEventListener('click', async () => {
    const input = document.getElementById('atan-planting-date');
    const status = document.getElementById('atan-growth-status');
    if (!input.value) {status.textContent='Pilih tanggal tanam terlebih dahulu.';return;}
    try {
        const response = await fetch('/api/growth/planting-date', {
            method:'POST', headers:{'Content-Type':'application/json','Accept':'application/json'},
            body:JSON.stringify({planting_date:input.value})
        });
        const data = await response.json();
        if (!response.ok) throw Error(data.message || 'HTTP ' + response.status);
        plantStartDate = data.planting_date;
        status.textContent = 'Tersimpan · ' + data.phase.name + ' · hari ke-' + data.age_days;
        refreshForecast();
    } catch(e) { status.textContent='Gagal menyimpan: ' + e.message; }
});
atanLoadGrowth();
</script>
<style>
.atan-history-tools{display:flex;flex-wrap:wrap;align-items:end;gap:12px;margin:12px 0}
.atan-history-tools label{display:flex;flex-direction:column;gap:5px;font-size:11px;font-weight:800;color:#42694d}
.atan-history-tools input{border:1px solid #d8e7d6;border-radius:10px;padding:10px;background:#fffefa;color:#245743;min-width:148px}
#sensor-log-body tr:nth-child(even){background:#f7faf5}
#sensor-log-body td{font-variant-numeric:tabular-nums}
</style>
<script>
(function () {
 const table=document.getElementById('sensor-log-body');
 if(!table)return;
 const from=document.getElementById('atan-csv-from');
 const to=document.getElementById('atan-csv-to');
 const info=document.getElementById('atan-history-info');
 const count=document.getElementById('sensor-log-count');
 const pad=x=>String(x).padStart(2,'0');
 const localDay=d=>[d.getFullYear(),pad(d.getMonth()+1),pad(d.getDate())].join('-');
 const today=new Date(); to.value=localDay(today);
 from.value=localDay(new Date(today.getFullYear(),today.getMonth(),1));
 let busy=false;
 const show=v=>(v===null||v===undefined||v==='')?'—':String(v);
 const dec=(v,n=2)=>v===null||v===undefined||v===''?'—':Number(v).toLocaleString('id-ID',{maximumFractionDigits:n});
 const td=(tr,v)=>{const e=document.createElement('td');e.textContent=v;tr.appendChild(e);};
 async function load(){
   if(window.atanMonitoringPaused)return;
   if(busy)return;busy=true;
   try{
    const response=await fetch('/api/telemetry/history',{cache:'no-store',headers:{Accept:'application/json'}});
    if(!response.ok)throw new Error('HTTP '+response.status);
    const data=await response.json();
    const rows=Array.isArray(data.rows)?data.rows:[];
    const frag=document.createDocumentFragment();
    for(const r of rows){
      const tr=document.createElement('tr');
      const localDate=r.created_at?new Date(r.created_at):null;
      const values=[
        localDate&&!isNaN(localDate)?localDate.toLocaleString('id-ID'):show(r.created_at),
        dec(r.soil_a,1),dec(r.soil_b,1),dec(r.soil_c,1),
        [r.soil_adc_a,r.soil_adc_b,r.soil_adc_c].map(show).join(' / '),
        dec(r.air_temp,1),dec(r.air_humidity,1),dec(r.water_temp,1),
        dec(r.ph),dec(r.ec),dec(r.tds),
        [r.npk_n,r.npk_p,r.npk_k].map(show).join(' / '),
        dec(r.water_batch_l,4),dec(r.water_batch_rp,4),
        dec(r.fertilizer_a_rp,4),dec(r.fertilizer_b_rp,4),
        dec(r.energy_kwh,8),dec(r.electricity_rp,6),show(r.unmetered_pump_events),
        dec(r.pzem_voltage_v,2),dec(r.pzem_current_a,3),dec(r.pzem_power_w,2),
        dec(r.pzem_meter_total_kwh,6),dec(r.pzem_consumption_kwh,6),dec(r.pzem_electricity_rp,4)
      ];
      values.forEach(v=>td(tr,v));frag.appendChild(tr);
    }
    if(!rows.length){const tr=document.createElement('tr');const c=document.createElement('td');c.colSpan=25;c.textContent='Belum ada data telemetry yang tersimpan di MySQL.';tr.appendChild(c);frag.appendChild(tr)}
    table.replaceChildren(frag);
    count.textContent=rows.length+' terbaru / '+data.total_saved+' tersimpan';
    info.textContent='Arsip MySQL • 100 terbaru • biaya pupuk dan air = batch; listrik PZEM dan relay terpisah • riwayat tidak terhapus saat offline';
   }catch(e){
    // Saat Laravel terganggu, jangan hapus riwayat yang masih terlihat.
    info.textContent='Gagal menyegarkan arsip ('+e.message+'). Riwayat terakhir di layar tetap ditampilkan.';
   }finally{busy=false}
 }
 document.getElementById('atan-reload-db-history').addEventListener('click',load);
 document.getElementById('atan-download-db-csv').addEventListener('click',()=>{
    if(!from.value||!to.value||from.value>to.value){info.textContent='Isi rentang tanggal dengan benar.';return;}
    const diff=(new Date(to.value+'T00:00:00')-new Date(from.value+'T00:00:00'))/86400000;
    if(diff>366){info.textContent='Maksimal 366 hari dalam satu CSV. Pilih rentang lebih pendek.';return;}
    window.location.href='/api/telemetry/export?from='+encodeURIComponent(from.value)+'&to='+encodeURIComponent(to.value);
 });
 load();setInterval(load,15000);
})();
</script>
<script>
window.atanMonitoringPaused=false;
(function(){ const b=document.getElementById('atan-monitor-toggle'); if(!b)return;
 b.addEventListener('click',()=>{window.atanMonitoringPaused=!window.atanMonitoringPaused;
 b.textContent=window.atanMonitoringPaused?'Monitoring: OFF':'Monitoring: ON';
 b.setAttribute('aria-pressed',String(!window.atanMonitoringPaused));
 const n=document.getElementById('atan-monitor-note');if(n)n.textContent=window.atanMonitoringPaused?'Refresh halaman dijeda; ESP32 dan blower tetap bekerja':'Monitoring browser aktif';
 if(!window.atanMonitoringPaused){updateDeviceConnection();updateSensorsAutomatically();atanRefreshCosts();}
 });})();
</script></body>
</html>
