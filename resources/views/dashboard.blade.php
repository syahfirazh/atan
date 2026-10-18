<!DOCTYPE html>
<html lang="id">
 <head>
  <!--ATAN SI TATANEN — 1 FILE HTML | Semua HTML, CSS, dan JS ada di sini. Grafik Chart.js dan font diakses dari CDN saat internet tersedia.-->
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta content="#132d26" name="theme-color"/>
  <title>
   ATAN si TATANEN &middot; Grow With Intelligence
  </title>
  <link href="https://fonts.googleapis.com" rel="preconnect"/>
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&amp;family=Outfit:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
  <!-- Tailwind CSS utilities; CSS asli tetap menjaga identitas Living Greenhouse. -->
   <script src="https://cdn.tailwindcss.com"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js">
  </script>
  <style>
   /* =======================================================
   ATAN SI TATANEN - SELURUH STYLE / CSS
   Ubah tema, warna, animasi dan responsif di bagian ini.
   ======================================================= */

:root {
  --dark:#122d25;
  --forest:#1c4b37;
  --green:#387f55;
  --mint:#cfe7cb;
  --cream:#f8f7ef;
  --stroke:#dce6d8;
  --muted:#718174;
  --gold:#ddaa58
}
* {
  box-sizing:border-box
}
html {
  scroll-behavior:smooth
}
body {
  margin:0;
  background:var(--cream);
  color:var(--dark);
  font-family:'DM Sans',sans-serif
}
h1,h2,h3,h4,.display {
  font-family:Outfit,sans-serif
}
button,input,select {
  font:inherit
}
button {
  cursor:pointer
}
a {
  color:inherit;
  text-decoration:none
}
header {
  height:80px;
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:0 max(5vw,24px);
  background:rgba(248,247,239,.92);
  backdrop-filter:blur(20px);
  position:sticky;
  top:0;
  z-index:50;
  border-bottom:1px solid #e3e9df
}
.brand {
  font-family:Outfit;
  font-weight:800;
  font-size:22px;
  letter-spacing:-1px;
  display:flex;
  align-items:center;
  gap:10px
}
.brandmark {
  width:37px;
  height:37px;
  background:var(--dark);
  color:#bde0a5;
  display:grid;
  place-items:center;
  border-radius:12px
}
.nav {
  display:flex;
  gap:25px;
  align-items:center;
  color:#5b7062;
  font-size:13px;
  font-weight:700
}
.tag {
  display:inline-flex;
  align-items:center;
  gap:7px;
  border:1px solid #c9d9cb;
  background:#ebf4e8;
  border-radius:30px;
  padding:8px 13px;
  color:#397650;
  font-size:11px;
  font-weight:800;
  letter-spacing:1px;
  text-transform:uppercase
}
.tag .dot {
  height:7px;
  width:7px;
  border-radius:50%;
  background:#5ea373
}
.wrap {
  max-width:1390px;
  margin:auto;
  padding:0 5vw
}
.screen {
  display:none
}
.screen.active {
  display:block
}
.hero {
  padding:74px 0 50px;
  min-height:485px;
  display:grid;
  grid-template-columns:1.05fr .95fr;
  gap:40px;
  align-items:center
}
.eyebrow {
  font-weight:800;
  letter-spacing:3px;
  font-size:11px;
  text-transform:uppercase;
  color:#5c9171
}
.hero h1 {
  font-size:clamp(50px,6vw,91px);
  line-height:1.01;
  letter-spacing:-4px;
  margin:20px 0;
  color:var(--dark)
}
.hero h1 i {
  color:#77a477;
  font-style:normal
}
.desc {
  font-size:16px;
  color:#647a69;
  line-height:1.85;
  max-width:590px
}
.hero-visual {
  min-height:380px;
  position:relative;
  display:grid;
  place-items:center
}
.orb {
  position:absolute;
  width:min(360px,83%);
  aspect-ratio:1;
  background:radial-gradient(circle,#e1efcf,#d7e8d1 61%,transparent 72%);
  border-radius:50%;
  animation:float 6s ease-in-out infinite
}
.huge-crop {
  position:relative;
  font-size:clamp(155px,22vw,310px);
  filter:drop-shadow(12px 25px 15px #547f4a2d);
  animation:float 5s ease-in-out infinite
}
.floating {
  position:absolute;
  z-index:2;
  background:#fffdf5;
  padding:12px 18px;
  border:1px solid #e0e8dd;
  border-radius:15px;
  box-shadow:0 18px 40px #254d2916;
  font-size:12px;
  font-weight:800
}
.floating.f1 {
  top:20%;
  left:2%
}
.floating.f2 {
  right:0;
  bottom:18%
}
.sectionhead {
  display:flex;
  align-items:end;
  justify-content:space-between;
  margin:28px 0 23px;
  gap:15px
}
.sectionhead h2 {
  font-size:clamp(29px,3.2vw,44px);
  letter-spacing:-1.6px;
  margin:6px 0 0
}
.sectionhead p {
  font-size:13px;
  color:var(--muted)
}
.crop-grid {
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:20px;
  margin-bottom:80px
}
.crop-card {
  border:1px solid #dce5d9;
  border-radius:25px;
  background:#fffef9;
  padding:22px;
  text-align:left;
  transition:.25s;
  overflow:hidden;
  position:relative
}
.crop-card:hover,.crop-card.selected {
  transform:translateY(-6px);
  border-color:#6caa72;
  box-shadow:0 18px 45px #1a47321b
}
.crop-art {
  height:185px;
  border-radius:18px;
  display:grid;
  place-items:center;
  font-size:118px;
  background:radial-gradient(circle,#ecf3d9,#e3ebdf 63%,#f4f5e9);
  transition:transform .3s
}
.crop-card:hover .crop-art {
  transform:scale(1.035)
}
.crop-card h3 {
  font-size:25px;
  margin:20px 0 4px
}
.crop-card p {
  color:#789080;
  font-size:13px;
  margin:0 0 18px;
  line-height:1.6
}
.cardbottom {
  display:flex;
  justify-content:space-between;
  align-items:center;
  border-top:1px solid var(--stroke);
  padding-top:15px;
  font-weight:800;
  font-size:12px
}
.arrow {
  width:34px;
  height:34px;
  border-radius:50%;
  background:#e4f0e1;
  display:grid;
  place-items:center
}
.page-hero {
  background:linear-gradient(130deg,#183f30,#0d261e);
  color:#fff;
  border-radius:28px;
  min-height:300px;
  display:grid;
  grid-template-columns:1.2fr .8fr;
  align-items:center;
  padding:42px 5vw;
  overflow:hidden;
  position:relative;
  margin-top:30px
}
.page-hero h1 {
  font-size:clamp(40px,5vw,65px);
  letter-spacing:-2px;
  line-height:1.05;
  margin:15px 0
}
.page-hero p {
  color:#b6d1c0;
  line-height:1.8;
  max-width:640px
}
.page-hero .art {
  font-size:220px;
  text-align:center;
  animation:float 5s ease-in-out infinite;
  filter:drop-shadow(15px 25px 20px #0005)
}
.btn {
  border:0;
  border-radius:13px;
  padding:14px 22px;
  font-weight:800;
  font-size:13px;
  display:inline-flex;
  align-items:center;
  gap:10px;
  transition:.2s
}
.btn:hover {
  transform:translateY(-2px)
}
.btn.primary {
  background:#a9d78d;
  color:#153325
}
.btn.dark {
  background:#204b37;
  color:white
}
.btn.light {
  background:#eef3e7;
  color:#2b5940
}
.stage-track {
  display:grid;
  grid-template-columns:repeat(5,1fr);
  gap:14px;
  margin:24px 0
}
.stage {
  background:#fffef9;
  border:1px solid var(--stroke);
  border-radius:20px;
  padding:18px;
  text-align:center;
  cursor:pointer;
  transition:.2s
}
.stage:hover,.stage.active {
  border-color:#7cb083;
  box-shadow:0 10px 28px #234d3017;
  transform:translateY(-4px)
}
.stage .illustration {
  height:94px;
  display:grid;
  place-items:center;
  font-size:66px
}
.stage h4 {
  margin:8px 0 5px;
  font-size:16px
}
.stage p {
  font-size:12px;
  color:var(--muted);
  margin:0
}
.panel {
  background:#fffefb;
  border:1px solid var(--stroke);
  border-radius:23px;
  padding:25px;
  box-shadow:0 8px 35px #1d4a2f08
}
.stage-info {
  display:grid;
  grid-template-columns:1fr auto;
  align-items:center;
  gap:20px;
  background:#eaf2e4;
  border-radius:21px;
  padding:25px;
  margin-bottom:32px
}
.stage-info h3 {
  margin:5px 0 9px
}
.stage-info p {
  margin:0;
  font-size:13px;
  line-height:1.8;
  color:#607566
}
.stage-info .illustration {
  font-size:90px
}
.actionbar {
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin:30px 0 75px;
  gap:15px
}
.dashboard-top {
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:20px;
  padding:36px 0 20px
}
.dashboard-top h1 {
  font-size:clamp(35px,4vw,53px);
  margin:8px 0 2px;
  letter-spacing:-2px
}
.dashboard-top p {
  font-size:13px;
  color:var(--muted)
}
.metrics {
  display:grid;
  grid-template-columns:repeat(6,1fr);
  gap:12px;
  margin:10px 0 18px
}
.metric {
  padding:19px;
  border:1px solid var(--stroke);
  border-radius:18px;
  background:#fffefa
}
.metric .symbol {
  font-size:22px
}
.metric label {
  display:block;
  color:#798a7c;
  font-size:11px;
  font-weight:700;
  margin:12px 0 7px
}
.metric strong {
  font:700 25px Outfit;
  letter-spacing:-1px
}
.metric small {
  display:block;
  font-size:10px;
  color:#418259;
  font-weight:700;
  margin-top:5px
}
.two-col {
  display:grid;
  grid-template-columns:1.45fr .85fr;
  gap:17px;
  margin:18px 0
}
.panel h3 {
  font-size:23px;
  letter-spacing:-.7px;
  margin:0 0 4px
}
.sub {
  font-size:12px;
  color:#889489;
  margin:0 0 20px;
  line-height:1.7
}
.diagram {
  background:radial-gradient(circle at 50% 35%,#f2f7e8,#e9f1e5 80%);
  border:1px solid #dfeada;
  border-radius:19px;
  min-height:300px;
  position:relative;
  padding:24px;
  overflow:hidden
}
.diagram::before {
  content:'';
  position:absolute;
  inset:0;
  background-image:linear-gradient(#acc9a420 1px,transparent 1px),linear-gradient(90deg,#acc9a420 1px,transparent 1px);
  background-size:32px 32px
}
.diagram-row {
  display:flex;
  align-items:center;
  gap:8px;
  position:relative;
  z-index:1;
  justify-content:center;
  flex-wrap:wrap
}
.tank {
  width:100px;
  height:130px;
  border:3px solid #498ba0;
  border-top:8px solid #498ba0;
  border-radius:15px 15px 25px 25px;
  background:linear-gradient(to top,#80cfe3 60%,#eaf8ed 60%);
  display:grid;
  place-items:center;
  position:relative;
  font-weight:800;
  font-size:12px;
  text-align:center;
  color:#285c73
}
.tank.orange {
  background:linear-gradient(to top,#efd097 52%,#fbf8ed 52%);
  border-color:#caab70;
  color:#86662b
}
.tank.green {
  background:linear-gradient(to top,#a8cf92 63%,#eff9ea 63%);
  border-color:#7a9c61;
  color:#426638
}
.pipe {
  height:7px;
  min-width:23px;
  flex:1;
  max-width:80px;
  border-radius:20px;
  background:repeating-linear-gradient(90deg,#278bc7 0 15px,#80cef1 15px 28px);
  background-size:56px 100%;
  animation:flow 1.15s linear infinite
}
.pipe.off {
  background:#becfcb;
  animation:none
}
.mixer {
  height:107px;
  width:118px;
  border:3px solid #7aa2a6;
  border-radius:23px;
  background:linear-gradient(to top,#b1e3df 60%,#fafffd 60%);
  display:grid;
  place-items:center;
  text-align:center;
  font-size:11px;
  font-weight:800;
  position:relative
}
.mixer:after {
  content:'↻';
  font-size:40px;
  position:absolute;
  color:#408c85;
  animation:spin 4s linear infinite;
  bottom:20px
}
.diagram-bottom {
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:12px;
  margin-top:30px;
  position:relative;
  z-index:1
}
.plant-node {
  border:1px solid #c6dec3;
  border-radius:17px;
  background:#fffefbdf;
  text-align:center;
  padding:12px 6px;
  cursor:pointer;
  transition:.2s
}
.plant-node:hover,.plant-node.chosen {
  border-color:#5b9866;
  transform:translateY(-3px);
  box-shadow:0 8px 25px #376d3f20
}
.plant-node .sprout {
  font-size:49px;
  display:block;
  animation:sway 4s ease-in-out infinite
}
.plant-node b {
  display:block;
  font-size:11px
}
.plant-node small {
  font-size:10px;
  color:#819284
}
.water {
  color:#3d93ba;
  font-size:11px;
  font-weight:700;
  margin:12px 0;
  text-align:center
}
.zones {
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:7px
}
.zone {
  padding:12px 4px;
  border:1px solid #dce9da;
  border-radius:13px;
  background:#f4f8ef;
  text-align:center;
  cursor:pointer;
  font-size:10px;
  font-weight:800
}
.zone.active {
  background:#2e6648;
  color:white
}
.zone span {
  display:block;
  font-size:19px;
  margin:5px 0
}
.reading {
  display:flex;
  justify-content:space-between;
  padding:13px 0;
  border-bottom:1px solid #edf1e9;
  font-size:13px
}
.reading strong {
  font-weight:800
}
.graphbox {
  height:230px;
  position:relative
}
.grid3 {
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:14px
}
.mini {
  background:#f1f6ed;
  border-radius:16px;
  padding:17px
}
.mini span {
  display:block;
  font-size:12px;
  color:#72907a
}
.mini strong {
  display:block;
  margin-top:7px;
  font-size:24px;
  font-family:Outfit
}
.forecast {
  background:linear-gradient(135deg,#163d2d,#254f3a);
  color:white;
  border-radius:22px;
  padding:25px
}
.forecast p {
  color:#b8d5c3;
  line-height:1.7;
  font-size:13px
}
.forecast h3 {
  margin:8px 0
}
.control {
  display:flex;
  gap:12px;
  align-items:center;
  flex-wrap:wrap;
  margin:15px 0 22px
}
.control label {
  font-size:12px;
  font-weight:800;
  color:#6b7e70
}
.control input,.control select {
  border:1px solid #d4e1d1;
  border-radius:11px;
  padding:11px;
  background:white;
  color:#233f2e;
  max-width:135px
}
.calc {
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:12px;
  margin:10px 0 18px
}
.calc .panel {
  padding:19px
}
.calc span {
  font-size:12px;
  color:#7b8c80
}
.calc strong {
  display:block;
  margin:10px 0;
  font:800 29px Outfit
}
.estimate {
  display:flex;
  gap:14px;
  align-items:center;
  justify-content:space-between;
  flex-wrap:wrap;
  padding:22px;
  border-radius:17px;
  background:#e9f1e3
}
.estimate h3 {
  margin:0;
  font-size:15px
}
.estimate strong {
  font:800 30px Outfit
}
.footnote {
  font-size:11px;
  color:#859184;
  line-height:1.7;
  margin:14px 0 35px
}
.pill {
  border-radius:20px;
  padding:6px 10px;
  font-size:10px;
  background:#eff4e9;
  color:#42835c;
  font-weight:800
}
.help {
  position:relative;
  border-bottom:1px dotted #999;
  cursor:help
}
.footer {
  padding:35px 5vw;
  background:#142e24;
  color:#aec9b6;
  font-size:12px;
  text-align:center;
  margin-top:65px
}
.hidden {
  display:none!important
}
@keyframes float {
  50% {
    transform:translateY(-13px)
  }
}
@keyframes flow {
  to {
    background-position:56px 0
  }
}
@keyframes spin {
  to {
    transform:rotate(360deg)
  }
}
@keyframes sway {
  50% {
    transform:rotate(4deg)
  }
}
@media(max-width:1050px) {
  .metrics {
    grid-template-columns:repeat(3,1fr)
  }
  .two-col {
    grid-template-columns:1fr
  }
  .hero {
    grid-template-columns:1fr 1fr
  }
  .zones {
    grid-template-columns:repeat(4,1fr)
  }
}
@media(max-width:700px) {
  header {
    height:68px
  }
  .nav a {
    display:none
  }
  .wrap {
    padding:0 20px
  }
  .hero {
    grid-template-columns:1fr;
    padding-top:42px
  }
  .hero-visual {
    min-height:250px
  }
  .hero h1 {
    letter-spacing:-2px
  }
  .huge-crop {
    font-size:160px
  }
  .crop-grid,.grid3,.calc {
    grid-template-columns:1fr
  }
  .crop-art {
    height:150px
  }
  .page-hero {
    grid-template-columns:1fr;
    padding:28px
  }
  .page-hero .art {
    font-size:115px
  }
  .stage-track {
    grid-template-columns:repeat(2,1fr)
  }
  .stage-info {
    grid-template-columns:1fr
  }
  .metrics {
    grid-template-columns:repeat(2,1fr)
  }
  .diagram {
    padding:10px
  }
  .tank {
    width:72px;
    height:96px
  }
  .mixer {
    height:85px;
    width:80px
  }
  .diagram-row {
    gap:3px
  }
  .pipe {
    min-width:10px
  }
  .dashboard-top {
    align-items:start;
    flex-direction:column
  }
  .zones {
    grid-template-columns:repeat(4,1fr)
  }
  .actionbar {
    flex-direction:column;
    align-items:stretch
  }
}


/* Daily history & simulation controls */
.reset-btn {
  background: #fff3ea;
  color: #a45136;
  border: 1px solid #e8beac;
}
.day-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin: 15px 0 20px;
}
.history-section {
  margin: 22px 0 76px;
}
.history-header {
  display: flex;
  align-items: start;
  justify-content: space-between;
  gap: 18px;
  flex-wrap: wrap;
}
.history-header h3 {
  font-size: clamp(24px, 3vw, 34px);
  margin: 8px 0 10px;
}
.history-header .sub {
  max-width: 740px;
}
.history-tools, .history-filters {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}
.history-overview {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 12px;
  margin: 18px 0 26px;
}
.history-stat {
  background: #f1f6ed;
  border: 1px solid #e0ebda;
  border-radius: 17px;
  padding: 16px;
}
.history-stat span {
  display: block;
  color: #66806d;
  font-size: 12px;
}
.history-stat strong {
  display: block;
  font: 700 25px Outfit, sans-serif;
  margin-top: 7px;
}
.history-controls {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 14px;
  margin-bottom: 16px;
}
.history-filter {
  border: 1px solid #d7e3d3;
  padding: 9px 16px;
  border-radius: 10px;
  background: #f6f8f2;
  font-weight: 700;
  font-size: 12px;
  color: #4c6954;
}
.history-filter.active {
  background: #255c40;
  color: white;
  border-color: #255c40;
}
.history-count, .history-note {
  color: #718174;
  font-size: 12px;
}
.history-timeline {
  position: relative;
  padding-left: 26px;
}
.history-timeline::before {
  content: '';
  position: absolute;
  left: 9px;
  top: 10px;
  bottom: 16px;
  width: 2px;
  background: #d8e6d3;
}
.history-entry {
  position: relative;
  background: #fffefb;
  border: 1px solid #dbe8d8;
  border-radius: 18px;
  padding: 18px;
  margin-bottom: 12px;
}
.history-entry::before {
  content: '';
  position: absolute;
  left: -24px;
  top: 24px;
  background: #5e9e69;
  border: 3px solid #e7f1e3;
  border-radius: 50%;
  width: 13px;
  height: 13px;
}
.history-entry-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
}
.history-entry h4 {
  margin: 4px 0;
  font-size: 19px;
}
.history-entry p {
  color: #698071;
  font-size: 12px;
  line-height: 1.6;
}
.history-data {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 10px;
  margin-top: 14px;
}
.history-data div {
  background: #f3f7ef;
  border-radius: 10px;
  padding: 10px;
}
.history-data small, .history-data b {
  display: block;
}
.history-data small {
  color: #718174;
  font-size: 10px;
  margin-bottom: 6px;
}
.history-data b {
  font-size: 13px;
}
.history-note {
  line-height: 1.7;
  margin-top: 18px;
}
@media (max-width: 850px) {
  .history-overview, .history-data {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}
@media (max-width: 480px) {
  .history-overview { grid-template-columns: repeat(2, minmax(0, 1fr)); }
  .history-data { grid-template-columns: repeat(2, minmax(0, 1fr)); }
  .history-entry { padding: 13px; }
}

/* =======================================================
   STREAM SENSOR & TABEL TIMESERIES
   CSS tambahan, tidak mengganti desain Living Greenhouse.
   ======================================================= */
.sensor-status-panel {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 16px;
  margin-bottom: 16px;
}
.sensor-status-panel strong {
  display: block;
  margin: 8px 0;
}
.sensor-status-panel .sub {
  margin: 0;
}
.sensor-log-section {
  margin: 26px 0;
}
.sensor-table-wrap {
  width: 100%;
  overflow-x: auto;
}
.sensor-table {
  width: 100%;
  min-width: 900px;
  border-collapse: collapse;
  font-size: 12px;
}
.sensor-table th,
.sensor-table td {
  padding: 12px 10px;
  border-bottom: 1px solid var(--stroke);
  text-align: left;
  white-space: nowrap;
}
.sensor-table th {
  color: var(--forest);
  background: #f1f6ed;
}
@media (max-width: 700px) {
  .sensor-status-panel {
    align-items: flex-start;
    flex-direction: column;
  }
}

  
/* ============================================================
   PENAMBAHAN V4: Popup dan panel analitik
   Seluruh CSS Living Greenhouse lama tetap dipertahankan.
   ============================================================ */
.atan-modal-layer {
  position: fixed;
  inset: 0;
  z-index: 200;
  display: grid;
  place-items: center;
  padding: 20px;
  overflow-y: auto;
  background: rgba(9, 31, 22, .64);
  backdrop-filter: blur(13px);
}
.atan-modal {
  width: min(760px, 100%);
  max-height: min(92vh, 860px);
  overflow-y: auto;
  border-radius: 32px;
  padding: clamp(25px, 5vw, 53px);
  background: #fffef9;
  box-shadow: 0 35px 100px #071d1690;
  animation: modalEnter .5s ease both;
}
@keyframes modalEnter {
  from { opacity: 0; transform: translateY(22px) scale(.97); }
  to { opacity: 1; transform: translateY(0) scale(1); }
}
.modal-headline {
  font: 800 17px Outfit, sans-serif;
  margin-bottom: 36px;
  color: #204b37;
}
.atan-modal h2 {
  font: 800 clamp(32px, 5vw, 54px)/1.08 Outfit, sans-serif;
  letter-spacing: -2px;
  margin: 12px 0;
}
.atan-modal h2 em { color: #6ca47a; font-style: normal; }
.atan-modal p { color: #6b8072; line-height: 1.7; font-size: 14px; }
.modal-crops { display: grid; grid-template-columns: repeat(3, 1fr); gap: 13px; margin-top: 28px; }
.modal-crop {
  padding: 21px 10px;
  border: 1px solid #dbe8d8;
  background: #f2f7eb;
  border-radius: 20px;
  text-align: center;
  transition: .2s;
}
.modal-crop:hover { transform: translateY(-4px); border-color: #75ad7c; background: #e9f4e2; }
.modal-crop span { display: block; font-size: 65px; margin-bottom: 12px; }
.modal-crop b { font-family: Outfit, sans-serif; }
.modal-crop small { display: block; margin-top: 5px; color: #789081; }
.modal-back { border: 0; background: transparent; color: #397650; font-weight: 700; padding: 0 0 23px; }
#fert-form { display: grid; gap: 17px; margin-top: 25px; }
#fert-form label { display: grid; gap: 8px; font-size: 12px; font-weight: 800; color: #355943; }
#fert-form input { width: 100%; padding: 14px; border-radius: 12px; border: 1px solid #cadaCA; background: white; }
#fert-form small { line-height: 1.7; color: #788d7f; }
.modal-fields { display: grid; grid-template-columns: repeat(2, 1fr); gap: 13px; }
.modal-submit { justify-content: center; }
.auto-age-banner, .cost-summary-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  flex-wrap: wrap;
  padding: 16px 20px;
  background: #eaf2e4;
  border-radius: 15px;
  margin: 14px 0 18px;
  color: #385b44;
  font-size: 13px;
}
.cost-breakdown { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 12px; margin: 18px 0; }
.cost-breakdown article { padding: 19px; border: 1px solid #e0eadb; border-radius: 18px; background: #f8faf3; }
.cost-breakdown article h4 { margin: 0 0 12px; }
.cost-breakdown article strong { display: block; font: 800 23px Outfit, sans-serif; }
.cost-breakdown article small { display: block; color: #789081; margin-top: 9px; line-height: 1.6; }
.decision-card { display: flex; gap: 22px; padding: 24px; border-radius: 19px; background: linear-gradient(125deg,#173e2e,#285a40); color: white; }
.decision-orb { flex-shrink: 0; display: grid; place-items: center; width: 50px; height: 50px; border-radius: 15px; background: #b9e29e; color: #1a412c; font-size: 25px; }
.decision-card b { font: 700 20px Outfit,sans-serif; }
.decision-card p { color: #d1e9d8; line-height: 1.8; }
.decision-card small { color: #aacbb8; }
#current-art, #stage-art { transition: transform .4s, opacity .4s; }
.stage-animate { animation: phasePop .5s ease; }
@keyframes phasePop { from { opacity: .35; transform: translateY(12px) scale(.75); } to { opacity: 1; transform: translateY(0) scale(1); } }
@media(max-width:700px) {
  .modal-crops, .cost-breakdown { grid-template-columns: 1fr; }
  .modal-crop { display: flex; align-items: center; gap: 15px; text-align: left; padding: 12px; }
  .modal-crop span { margin: 0; font-size: 38px; }
  .modal-fields { grid-template-columns: 1fr; }
}

/* Kartu materi pertumbuhan yang dipicu oleh fase terpilih */
.plant-learning { margin-bottom: 24px; }
.learning-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 14px;
  margin-top: 18px;
}
.learning-grid article {
  background: #f1f6ed;
  border: 1px solid #dce9d8;
  border-radius: 15px;
  padding: 18px;
  animation: phasePop .5s ease;
}
.learning-grid article b { color: #28553b; font: 800 15px Outfit, sans-serif; }
.learning-grid article p { color: #647d6c; font-size: 12px; line-height: 1.85; }
@media(max-width:700px) {
  .learning-grid { grid-template-columns: 1fr; }
}

/* ========================================================
   V5 — utilitas tambahan; tidak mengubah komponen asli
   ======================================================== */
.zones,
.diagram-bottom {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}
@media (max-width: 700px) {
    .zones,
    .diagram-bottom {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
@media (max-width: 420px) {
    .zones,
    .diagram-bottom {
        grid-template-columns: 1fr;
    }
}
.at-v5-cost {
    margin-top: 20px;
}
.at-v5-modal {
    position: fixed;
    inset: 0;
    z-index: 300;
    display: grid;
    place-items: center;
    padding: 20px;
    background: rgba(9, 31, 22, .66);
    backdrop-filter: blur(12px);
}
.at-v5-modal[hidden] {
    display: none;
}
.at-v5-input {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #cbdccc;
    border-radius: 12px;
    background: #fff;
    color: #173e2e;
}

</style>
 </head>
 <body>
  <!--HALAMAN WEBSITE: PILIH TANAMAN -> PROFIL -> DASHBOARD -> RIWAYAT-->
  
  <main>
   <section class="screen active" id="selection">
    <div class="wrap">
     <div class="hero">
      <div>
       <span class="eyebrow">
        ✦ Welcome to smarter farming
       </span>
       <h1>
        Grow better.
        <br/>
        <i>
         Grow smarter.
        </i>
       </h1>
       <p class="desc">
        Setiap tanaman punya cerita dan kebutuhan berbeda. Pilih tanamanmu, kenali setiap fase pertumbuhannya, lalu jelajahi simulasi greenhouse cerdas yang membantu merencanakan air dan nutrisi.
       </p>
       <span class="tag">
        🌱 Pilih tanaman untuk memulai perjalanan
       </span>
      </div>
      <div class="hero-visual">
       <div class="orb">
       </div>
       <span class="huge-crop">
        🌿
       </span>
       <div class="floating f1">
        ✺ Smart Growing
       </div>
       <div class="floating f2">
        💧 Precision Irrigation
       </div>
      </div>
     </div>
     <div class="sectionhead">
      <div>
       <span class="eyebrow">
        01 / Plant library
       </span>
       <h2>
        Apa yang ingin kamu tanam?
       </h2>
      </div>
      <p>
       3 pilihan tanaman &middot; 
      </p>
     </div>
     <div class="crop-grid" id="crop-cards">
     </div>
    </div>
   </section>
   <section class="screen" id="profile">
    <div class="wrap">
     <div class="page-hero">
      <div>
       <span class="eyebrow" style="color:#b1d59c">
        02 / Know your plant
       </span>
       <h1 id="profile-title">
       </h1>
       <p id="profile-desc">
       </p>
       <span class="pill" id="profile-duration">
       </span>
      </div>
      <div class="art" id="profile-art">
      </div>
     </div>
     <div class="sectionhead">
      <div>
       <span class="eyebrow">
        The growth journey
       </span>
       <h2>
        Perjalanan dari benih hingga panen.
       </h2>
      </div>
      <p>
       Pilih fase untuk mempelajari pertumbuhan
      </p>
     </div>
     <div class="stage-track" id="stages">
     </div>
     <div class="stage-info">
      <div>
       <span class="eyebrow" id="stage-period">
       </span>
       <h3 id="stage-title">
       </h3>
       <p id="stage-desc">
       </p>
      </div>
      <div class="illustration" id="stage-art">
      </div>
     </div>
     <!-- PROFIL AGRONOMI PER FASE: tidak mengubah timeline lama -->
      <div class="panel plant-learning" id="plant-learning">
        <span class="eyebrow">Plant Knowledge / Panduan Pertumbuhan</span>
        <h3 id="learning-title">Memahami kebutuhan tanaman</h3>
        <p id="learning-intro" class="sub"></p>
        <div class="learning-grid" id="learning-grid"></div>
      </div>
      <div class="actionbar">
      <button class="btn light" onclick="navigate('selection')">
       &larr; Pilih Tanaman Lain
      </button>
      <button class="btn dark" onclick="navigate('dashboard')">
       Mulai Analisis &rarr;
      </button>
     </div>
    </div>
   </section>
   <section class="screen" id="dashboard">
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
       <button class="btn light" onclick="navigate('selection')">
        &orarr; Ganti Tanaman
       </button>
       <button class="btn reset-btn" onclick="resetSimulation()">
        &olarr; Mulai Ulang Siklus
       </button>
       <span class="tag">
        ● Simulasi &middot; bukan realtime
       </span>
      </div>
     </div>
     <div class="metrics" id="metrics">
      </div>
      <!-- STATUS SUMBER DATA: otomatis / ESP32-S3 -->
      <div class="panel sensor-status-panel">
       <div>
        <span class="eyebrow">SENSOR STREAM</span>
        <strong id="connection-status">ESP32-S3 · Belum terhubung</strong>
        <p class="sub" id="sensor-updated">Menunggu pembacaan berikutnya.</p>
       </div>
       <span class="pill" id="sensor-source">Data contoh otomatis</span>
     </div>
     <div class="two-col">
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
          Klik tanaman untuk melihat pembacaan terbaru. Animasi aliran mengikuti status irigasi.
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
         <div class="pipe" title="Simulasi aliran">
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
                class="rounded-xl bg-emerald-800 px-4 py-2.5
                       text-sm font-bold text-white shadow-sm
                       transition hover:bg-emerald-700"
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
        Nilai sensor diperbarui otomatis dan mengikuti status koneksi perangkat.
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
     <div class="two-col">
      <div class="panel">
       <span class="eyebrow">
        04 / Growth intelligence
       </span>
       <h3>
        Prediksi Fase Pertumbuhan
       </h3>
       <p class="sub">
        Simulasi menggunakan umur tanaman. Model machine learning belum dihubungkan.
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
        Indeks relatif simulasi, bukan dosis agronomi tervalidasi.
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
     <div class="two-col">
      <div class="panel">
       <span class="eyebrow">
        05 / Farm economics
       </span>
       <h3>
        Smart Farming Cost Planner
       </h3>
       <p class="sub">
        Simulasi perkiraan biaya kebutuhan air dan larutan pupuk. Ubah asumsi harga agar sesuai kondisi petani.
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
                Nilai dihitung dari asumsi kebutuhan tiap fase.
            </p>
            <div
                id="cost-period-grid"
                class="grid grid-cols-1 gap-3 md:grid-cols-3"
            ></div>
        </div>
<div class="calc">
        <div class="panel">
         <span>
          Air sisa fase aktif
         </span>
         <strong id="phase-water">
          &mdash;
         </strong>
         <span>
          Liter &middot; estimasi simulasi
         </span>
        </div>
        <div class="panel">
         <span>
          Larutan pupuk sisa fase aktif
         </span>
         <strong id="phase-fert">
          &mdash;
         </strong>
         <span>
          Liter &middot; estimasi simulasi
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
          Rp &middot; estimasi simulasi
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
        Bukan rekomendasi dosis atau anggaran aktual. Termasuk estimasi listrik; belum termasuk tenaga kerja, media tanam, alat, kehilangan air, pajak, dan perawatan. Angka baseline air/pupuk per tanaman per hari hanyalah contoh untuk demonstrasi UI.
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
        Proporsi N/P/K berikut adalah indeks presentasi ilustratif; bukan persentase kandungan AB Mix atau dosis pupuk.
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
         <p class="sub">Terisi otomatis setiap pembaruan. Pembacaan ke-201 menggantikan data paling lama.</p>
        </div>
        <span class="pill" id="sensor-log-count">0 / 200</span>
       </div>
       <div class="sensor-table-wrap">
        <table class="sensor-table">
         <thead>
          <tr>
           <th>Waktu</th><th>Sumber</th><th>Zona</th>
           <th>Soil %</th><th>Suhu °C</th><th>RH %</th>
           <th>pH</th><th>EC</th><th>Flow L/min</th><th>Valve</th>
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
         Perkembangan dari hari penyemaian sampai hari simulasi saat ini. Catatan pertumbuhan dan sensor diperbarui mengikuti sumber data yang tersedia.
        </p>
       </div>
       <div class="history-tools">
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
      <p class="history-note">
       Catatan: nilai sensor harian adalah simulasi deterministik. Dosis pupuk, NPK, dan biaya hanya asumsi UI, tidak boleh digunakan langsung sebagai rekomendasi budidaya.
      </p>
     </section>
    </div>
   </section>
  </main>
  <footer class="footer">
   ✳ ATAN si TATANEN &mdash; Teknologi Adaptif Nutrisi &middot; Prototype experience /  &middot; IoT &amp; ML integration ready
  </footer>
    <!-- POPUP PEMILIHAN TANAMAN & KONFIGURASI PUPUK -->
  <div class="atan-modal-layer" id="atan-start-modal" role="dialog"
       aria-modal="true" aria-label="Pilih tanaman dan pupuk">
    <div class="atan-modal">
      <div class="modal-headline">✳ ATAN si TATANEN</div>
      <div id="crop-step">
        <span class="eyebrow">A NEW GROWING JOURNEY</span>
        <h2>Tanaman apa yang ingin<br><em>kamu kenali?</em></h2>
        <p>Pilih tanaman untuk menjelajahi profil, pertumbuhan,
           dan analisis greenhouse.</p>
        <div class="modal-crops" id="modal-crops"></div>
      </div>
      <div id="fert-step" class="hidden">
        <button class="modal-back" type="button" onclick="showCropStep()">← Ubah pilihan</button>
        <span class="eyebrow">SETUP NUTRIENT</span>
        <h2>Persiapkan <em>nutrisinya.</em></h2>
        <p>Harga pupuk diisi sekali untuk menghitung kebutuhan
           dan biaya secara otomatis.</p>
        <form id="fert-form" onsubmit="saveFertilizer(event)">
          <label>Nama pupuk
            <input id="fert-name" required maxlength="80" value="AB Mix" placeholder="Contoh: AB Mix">
          </label>
          <div class="modal-fields">
            <label>Harga per kemasan (Rp)
              <input id="fert-package-price" type="number" min="0" step="1" required value="45000">
            </label>
            <label>Isi kemasan (mL konsentrat)
              <input id="fert-package-volume" type="number" min="1" step="1" required value="1000">
            </label>
          </div>
          <small>Konversi biaya berdasarkan volume konsentrat pupuk,
                 bukan volume larutan hasil pengenceran.</small>
          <button class="btn dark modal-submit" type="submit">Lanjut ke Profil Tanaman →</button>
        </form>
      </div>
    </div>
  </div>

<script>
   // =======================================================
// DATA TANAMAN DAN FASE PERTUMBUHAN (DUMMY)
// Bagian ini nantinya dapat dihubungkan ke data IoT / ML.
// =======================================================

// Metadata tanaman dan fase pertumbuhan (contoh simulasi)
const plants = {
    "tomat": {
        "name": "Tomat",
        "latin": "Solanum lycopersicum",
        "emoji": "🍅",
        "description": "Tomat merupakan tanaman hortikultura penghasil buah yang melalui fase vegetatif, pembungaan, pembentukan buah, dan pematangan. Kebutuhan air serta nutrisinya berubah mengikuti perkembangan tanaman.",
        "duration": 110,
        "stages": [
            [
                "Persemaian",
                0,
                14,
                "🌱",
                "Benih berkecambah dan membentuk daun pertama. Fokus pada kelembapan media yang cukup, bukan tergenang.",
                2,
                1,
                1
            ],
            [
                "Vegetatif",
                15,
                35,
                "🌿",
                "Batang, akar, dan daun berkembang pesat. Pantau kelembapan, cahaya, serta pertumbuhan tajuk.",
                5,
                3,
                2
            ],
            [
                "Pembungaan",
                36,
                55,
                "🌼",
                "Bunga mulai terbentuk. Ketersediaan air dan nutrisi stabil membantu mendukung fase reproduktif.",
                6,
                5,
                5
            ],
            [
                "Pembuahan",
                56,
                85,
                "🍅",
                "Buah tumbuh dan membesar. Pengairan yang konsisten penting untuk menghindari fluktuasi kondisi tanaman.",
                8,
                6,
                7
            ],
            [
                "Panen",
                86,
                110,
                "🧺",
                "Buah matang bertahap dan siap dipetik sesuai kualitas yang diinginkan.",
                6,
                4,
                5
            ]
        ]
    },
    "cabai": {
        "name": "Cabai",
        "latin": "Capsicum annuum",
        "emoji": "🌶️",
        "description": "Cabai adalah tanaman penghasil buah pedas yang memerlukan pemantauan lingkungan serta nutrisi sejak pembentukan akar hingga masa panen yang dapat berlangsung berulang.",
        "duration": 120,
        "stages": [
            [
                "Persemaian",
                0,
                18,
                "🌱",
                "Benih berkembang menjadi bibit dan daun awal.",
                2,
                1,
                1
            ],
            [
                "Vegetatif",
                19,
                45,
                "🌿",
                "Tanaman membangun akar, batang, dan percabangan.",
                5,
                3,
                3
            ],
            [
                "Pembungaan",
                46,
                65,
                "🌼",
                "Muncul bunga sebagai awal perkembangan buah.",
                6,
                5,
                5
            ],
            [
                "Pembuahan",
                66,
                95,
                "🌶️",
                "Buah mulai terbentuk dan berkembang.",
                8,
                6,
                8
            ],
            [
                "Panen",
                96,
                120,
                "🧺",
                "Buah mencapai kematangan, panen dapat berlanjut setelah fase awal.",
                7,
                5,
                7
            ]
        ]
    },
    "melon": {
        "name": "Melon",
        "latin": "Cucumis melo",
        "emoji": "🍈",
        "description": "Melon adalah tanaman buah merambat yang membutuhkan pengelolaan air dan nutrisi cermat, terutama saat pembungaan, pembesaran buah, dan pematangan.",
        "duration": 85,
        "stages": [
            [
                "Persemaian",
                0,
                10,
                "🌱",
                "Benih mulai berkecambah dan bibit dipersiapkan.",
                2,
                1,
                1
            ],
            [
                "Vegetatif",
                11,
                28,
                "🌿",
                "Batang menjalar serta daun dan akar aktif berkembang.",
                5,
                3,
                3
            ],
            [
                "Pembungaan",
                29,
                43,
                "🌼",
                "Bunga muncul, selanjutnya berlangsung penyerbukan dan pembentukan bakal buah.",
                6,
                5,
                5
            ],
            [
                "Pembesaran Buah",
                44,
                70,
                "🍈",
                "Buah mengalami pembesaran. Kondisi air serta larutan nutrisi perlu dijaga stabil.",
                9,
                6,
                9
            ],
            [
                "Panen",
                71,
                85,
                "🧺",
                "Buah menuju kematangan dan dapat dipanen sesuai indikator varietas.",
                5,
                4,
                6
            ]
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
let crop = 'tomat';
let selectedStage = 0;
let zone = 'A';
let growthChart;
let costChart;

const $ = (id) => document.getElementById(id);
const num = (value) => Math.round(value).toLocaleString('id-ID');
const rupiah = (value) => `Rp ${num(value)}`;

// Navigasi antarlayar (pilih tanaman, profil, dashboard).
function navigate(page) {
    document.querySelectorAll('.screen').forEach((element) => {
        element.classList.toggle('active', element.id === page);
    });

    if (page === 'profile') {
        renderProfile();
    }

    if (page === 'dashboard') {
        renderDashboard();
    }

    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function setCrop(id, navigateToProfile = true) {
    if (!plants[id]) return;

    crop = id;
    selectedStage = 0;
    zone = 'A';
    if ($('age')) $('age').value = 0;

    if (navigateToProfile) {
        $('atan-start-modal').classList.remove('hidden');
        openFertStep(id);
    }
}

// =============================================
// HALAMAN PEMILIHAN DAN PROFIL TANAMAN
// =============================================
function renderCards() {
    $('crop-cards').innerHTML = Object.entries(plants).map(([id, plant]) => `
        <button class="crop-card" onclick="setCrop('${id}')">
            <div class="crop-art">${plant.emoji}</div>
            <h3>${plant.name}</h3>
            <p>
                <i>${plant.latin}</i><br>
                Kenali profil dan fase pertumbuhannya.
            </p>
            <div class="cardbottom">
                <span>± ${plant.duration} hari contoh siklus</span>
                <span class="arrow">↗</span>
            </div>
        </button>
    `).join('');
}

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
// SENSOR DUMMY — GANTI KE API IOT NANTI
// =============================================
const sensorSeed = {
    temp: 26.5,
    humidity: 72,
    waterTemp: 24.7,
    ph: 6.1,
    ec: 1.8,
    tds: 900
};

const zoneSensors = [
    { soil: 68, flow: 1.2, n: 110, p: 44, k: 172 },
    { soil: 56, flow: 0.9, n: 105, p: 40, k: 164 },
    { soil: 73, flow: 1.4, n: 120, p: 48, k: 181 }
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
        const index = zoneSensors.length;
        zoneSensors.push({
            soil: 62,
            flow: 0,
            n: 108 + index,
            p: 43,
            k: 169
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
    $('dashboard-summary').textContent =
        `${plant.emoji} ${plant.name} · ${getBlocks().length} blok · IoT & predictive insights`;

    const metrics = [
        ['🌡️', 'Suhu udara', `${sensorSeed.temp.toFixed(1)}°C`],
        ['💦', 'Kelembapan udara', `${sensorSeed.humidity}%`],
        ['🌡️', 'Suhu air', `${sensorSeed.waterTemp.toFixed(1)}°C`],
        ['⚗️', 'pH larutan', sensorSeed.ph],
        ['⚡', 'EC', `${sensorSeed.ec} mS/cm`],
        ['🧪', 'TDS', `${sensorSeed.tds} ppm`]
    ];

    $('metrics').innerHTML = metrics.map(([icon, label, value]) => `
        <div class="metric">
            <div class="symbol">${icon}</div>
            <label>${label}</label>
            <strong>${value}</strong>
            <small>● ${sensorSourceLabel()}</small>
        </div>
    `).join('');

    $('diagram-plants').innerHTML = getBlocks().map((block, index) => `
        <button class="plant-node ${index === 0 ? 'chosen' : ''}"
                onclick="selectZone('${block.code}')">
            <span class="sprout">${plant.emoji}</span>
            <b>${escapeHtml(block.name)}</b>
            <small>Klik untuk sensor</small>
        </button>
    `).join('');

    $('zones').innerHTML = zoneSensors.map((sensor, index) => {
        const block = getBlocks()[index];
        const label = block.code;
        return `
            <button class="zone" id="zone-${label}"
                    onclick="selectZone('${label}')">
                ${escapeHtml(block.name)}
                <span>${plant.emoji}</span>
                <small>${sensor.soil}%</small>
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
        ['Kelembapan media tanam', `${sensor.soil} %`],
        ['Laju aliran', `${sensor.flow.toFixed(1)} L/menit`],
        ['Nitrogen (N)', `${sensor.n} mg/kg`],
        ['Fosfor (P)', `${sensor.p} mg/kg`],
        ['Kalium (K)', `${sensor.k} mg/kg`],
        ['pH larutan', sensorSeed.ph],
        ['EC larutan', `${sensorSeed.ec} mS/cm`]
    ];

    $('sensor-detail').innerHTML = readings.map(([label, value]) => `
        <div class="reading">
            <span>${label}</span>
            <strong>${value}</strong>
        </div>
    `).join('');

    const dry = sensor.soil < 60;
    $('valve-state').textContent = dry ? 'ON' : 'OFF';
    if ($('pump-state')) $('pump-state').textContent = dry ? 'ON' : 'OFF';
    if ($('mixer-state')) $('mixer-state').textContent = 'STANDBY';
    document.querySelectorAll('.pipe').forEach((pipe) => {
        pipe.classList.toggle('off', !dry);
    });
    $('insight-title').textContent = dry
        ? 'Zona cenderung lebih kering'
        : 'Kelembapan terpantau';
    $('insight-text').textContent = dry
        ? `Zona ${label}: media ${sensor.soil}% berada di bawah ambang 60%. Valve dan pompa air direkomendasikan ON. Data berasal dari ${sensorSourceLabel()}.`
        : `Zona ${label}: media ${sensor.soil}% tidak melewati ambang kering 60%. Valve OFF. Keputusan ini merupakan aturan sederhana, bukan inferensi model ML.`;
}

// =============================================
// PREDIKSI ASUMSI DAN ESTIMASI BIAYA
// =============================================
function stageForAge(age) {
    const stages = plants[crop].stages;
    const found = stages.findIndex((stage) => age <= stage[2]);
    return found === -1 ? stages.length - 1 : found;
}

function refreshForecast() {
    if (!$('age')) return;

    const plant = plants[crop];
    const age = getPlantAge();
    $('age').value = age;
    $('automatic-age-label').textContent = `Hari ke-${age} · ${plant.stages[stageForAge(age)][0]}`;
    const quantity = Math.max(1, Math.min(100000, Number($('quantity').value) || 1));
    const waterPrice = Math.max(0, Number($('water-price').value) || 0);
    const fertilizerPrice = Math.max(0, Number($('fert-price').value) || 0);
    const index = stageForAge(age);
    const stage = plant.stages[index];

    const waterPerPlant = [0.11, 0.24, 0.32, 0.43, 0.29];
    const fertPerPlant = [0.008, 0.016, 0.024, 0.031, 0.017];
    const daysLeftInStage = Math.max(0, stage[2] - Math.max(age, stage[1]) + 1);
    const stageWater = quantity * waterPerPlant[index] * daysLeftInStage;
    const stageFertilizer = quantity * fertPerPlant[index] * daysLeftInStage;

    let remainingWater = 0;
    let remainingFertilizer = 0;

    plant.stages.forEach((item, phaseIndex) => {
        const days = Math.max(0, item[2] - Math.max(age, item[1]) + 1);
        remainingWater += days * quantity * waterPerPlant[phaseIndex];
        remainingFertilizer += days * quantity * fertPerPlant[phaseIndex];
    });

    $('current-period').textContent = `Hari ${age} · rentang fase ${stage[1]}–${stage[2]}`;
    $('current-stage').textContent = stage[0];
    $('current-explanation').textContent = stage[4];
    $('current-art').textContent = stage[3];
    $('days-left').textContent = `${Math.max(0, plant.duration - age)} hari`;
    $('stage-label').textContent = stage[0];
    $('phase-water').textContent = `${num(stageWater)} L`;
    $('phase-fert').textContent = `${stageFertilizer.toFixed(1)} L`;
    $('phase-cost').textContent = rupiah(
        stageWater * waterPrice + stageFertilizer * fertilizerPrice
    );
    $('total-cost').textContent = rupiah(
        remainingWater * waterPrice + remainingFertilizer * fertilizerPrice
    );

    const [n, phosphorus, k] = [stage[5], stage[6], stage[7]];
    const totalNPK = n + phosphorus + k;
    const proportion = (value) => (100 * value / totalNPK).toFixed(0);

    $('n-index').textContent = `${proportion(n)}%`;
    $('p-index').textContent = `${proportion(phosphorus)}%`;
    $('k-index').textContent = `${proportion(k)}%`;

    const requirements = [
        ['💧 Air', `${(waterPerPlant[index] * 1000).toFixed(0)} mL`, 'per tanaman / hari'],
        ['🧪 Larutan pupuk', `${(fertPerPlant[index] * 1000).toFixed(0)} mL`, 'per tanaman / hari'],
        ['🌱 Distribusi NPK', `${proportion(n)}/${proportion(phosphorus)}/${proportion(k)}`, 'indeks N/P/K relatif']
    ];

    $('stage-requirement').innerHTML = requirements.map(([label, value, unit]) => `
        <div class="mini">
            <span>${label}</span>
            <strong>${value}</strong>
            <span>${unit} · contoh</span>
        </div>
    `).join('');

    const dailyCosts = calculateDailyCosts(age);
    renderCharts(
        plant,
        dailyCosts.waterCost,
        dailyCosts.fertilizerCost,
        dailyCosts.electricityCost
    );
    renderHistory();
    renderAutomaticCost();
}

function renderCharts(plant, waterCost, fertilizerCost, electricityCost = 0) {
    if (typeof Chart === 'undefined') return;
    const labels = plant.stages.map((stage) => stage[0]);

    if (growthChart) growthChart.destroy();
    growthChart = new Chart($('growthChart'), {
        type: 'line',
        data: {
            labels,
            datasets: [
                {
                    label: 'Indeks air',
                    data: [22, 55, 72, 100, 65],
                    borderColor: '#3f9cba',
                    backgroundColor: '#3f9cba25',
                    fill: true,
                    tension: 0.36
                },
                {
                    label: 'Indeks nutrisi',
                    data: [20, 51, 77, 100, 62],
                    borderColor: '#6b9c55',
                    backgroundColor: '#6b9c5522',
                    fill: true,
                    tension: 0.36
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } },
            scales: {
                y: {
                    min: 0,
                    max: 110,
                    title: { display: true, text: 'Indeks ilustratif' }
                }
            }
        }
    });

    if (costChart) costChart.destroy();
    costChart = new Chart($('costChart'), {
        type: 'doughnut',
        data: {
            labels: ['Air', 'Pupuk', 'Listrik'],
            datasets: [{
                data: [waterCost, fertilizerCost, electricityCost],
                backgroundColor: ['#7dc0dc', '#76a86d', '#ddaa58'],
                borderWidth: 0
            }]
        },
        options: {
            cutout: '70%',
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });
}

// =======================================================
// OTOMASI SENSOR: TITIK INTEGRASI IoT ESP32-S3
// =======================================================
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
const API_SENSOR_URL = '';
const SENSOR_INTERVAL_MS = 5000;
const SENSOR_HISTORY_LIMIT = 200;
let liveSensorConnected = false;
let sensorRecords = [];
let sensorTick = 0;

function sensorSourceLabel() {
    return liveSensorConnected ? 'ESP32-S3' : 'Data contoh otomatis';
}

function clampSensor(value, low, high) {
    return Math.min(high, Math.max(low, value));
}

function isValidNumber(value) {
    return typeof value === 'number' && Number.isFinite(value);
}

// Data contoh bergerak sendiri hingga endpoint benar-benar tersedia.
function generateSensorExample() {
    sensorTick += 1;
    const t = sensorTick;

    sensorSeed.temp = +(26.3 + 1.7 * Math.sin(t / 7)).toFixed(1);
    sensorSeed.humidity = Math.round(70 + 6 * Math.cos(t / 8));
    sensorSeed.waterTemp = +(24.5 + 0.7 * Math.sin(t / 9)).toFixed(1);
    sensorSeed.ph = +(6.0 + 0.12 * Math.sin(t / 11)).toFixed(2);
    sensorSeed.ec = +(1.7 + 0.14 * Math.sin(t / 12)).toFixed(2);
    sensorSeed.tds = Math.round(sensorSeed.ec * 500);

    zoneSensors.forEach((item, i) => {
        item.soil = Math.round(
            clampSensor(63 + 15 * Math.sin(t / 6 + i * 1.5), 35, 90)
        );
        item.flow = item.soil < 60 ? +(0.7 + i * 0.15).toFixed(2) : 0;
    });
}

// Terima angka sensor hanya bila JSON memenuhi struktur dasar.
function applyRealSensorData(data) {
    if (!data || !Array.isArray(data.zones) || data.zones.length < 3) {
        throw new Error('Format payload sensor tidak sesuai');
    }

    const keys = ['temp', 'humidity', 'waterTemp', 'ph', 'ec', 'tds'];
    for (const key of keys) {
        if (!isValidNumber(data[key])) {
            throw new Error('Nilai tidak valid: ' + key);
        }
    }

    for (const item of data.zones.slice(0, 3)) {
        for (const key of ['soil', 'flow', 'n', 'p', 'k']) {
            if (!isValidNumber(item[key])) {
                throw new Error('Nilai zona tidak valid: ' + key);
            }
        }
    }

    keys.forEach((key) => {
        sensorSeed[key] = data[key];
    });

    data.zones.slice(0, getBlocks().length).forEach((item, i) => {
        Object.assign(zoneSensors[i], item);
    });
}

function addSensorRecords(timestamp) {
    zoneSensors.forEach((item, i) => {
        sensorRecords.push({
            timestamp,
            source: sensorSourceLabel(),
            zone: getBlocks()[i].code,
            soil: item.soil,
            temp: sensorSeed.temp,
            humidity: sensorSeed.humidity,
            ph: sensorSeed.ph,
            ec: sensorSeed.ec,
            flow: item.flow,
            valve: item.soil < 60 ? 'ON' : 'OFF'
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
            record.ph,
            record.ec,
            record.flow,
            record.valve
        ];
        for (const value of values) {
            const td = document.createElement('td');
            td.textContent = String(value);
            tr.appendChild(td);
        }
        fragment.appendChild(tr);
    }
    table.appendChild(fragment);
}

function refreshLiveSensorDisplay() {
    if (!$('metrics') || !$('dashboard').classList.contains('active')) {
        return;
    }

    // Re-render hanya nilai sensor dan zona, bukan keseluruhan dashboard.
    const metricValues = [
        sensorSeed.temp.toFixed(1) + '°C',
        sensorSeed.humidity + '%',
        sensorSeed.waterTemp.toFixed(1) + '°C',
        sensorSeed.ph,
        sensorSeed.ec + ' mS/cm',
        sensorSeed.tds + ' ppm'
    ];

    $('metrics').querySelectorAll('.metric').forEach((card, index) => {
        const value = card.querySelector('strong');
        const source = card.querySelector('small');
        if (value) value.textContent = metricValues[index];
        if (source) source.textContent = '● ' + sensorSourceLabel();
    });

    zoneSensors.forEach((item, i) => {
        const small = $('zone-' + getBlocks()[i].code)?.querySelector('small');
        if (small) small.textContent = item.soil + '%';
    });

    selectZone(zone);
    $('connection-status').textContent = liveSensorConnected
        ? 'ESP32-S3 · Terhubung'
        : 'ESP32-S3 · Belum terhubung';
    $('sensor-source').textContent = sensorSourceLabel();
    $('sensor-updated').textContent =
        'Pembaruan terakhir ' + new Date().toLocaleTimeString('id-ID');
    renderSensorRecords();
    updateDecisionExplanation();
}

// Tidak ada input manual; polling berjalan setiap 5 detik.
async function updateSensorsAutomatically() {
    let connected = false;

    if (API_SENSOR_URL) {
        try {
            const response = await fetch(API_SENSOR_URL, {
                cache: 'no-store',
                signal: AbortSignal.timeout(3000)
            });
            if (!response.ok) throw new Error('HTTP ' + response.status);
            const data = await response.json();
            applyRealSensorData(data);
            connected = true;
        } catch (error) {
            console.warn('ESP32 tidak tersedia:', error.message);
        }
    }

    liveSensorConnected = connected;
    if (!connected) generateSensorExample();
    addSensorRecords(Date.now());
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

function showCropStep() {
    $('crop-step').classList.remove('hidden');
    $('fert-step').classList.add('hidden');
}

function openFertStep(id) {
    crop = id;
    $('crop-step').classList.add('hidden');
    $('fert-step').classList.remove('hidden');
}

function saveFertilizer(event) {
    event.preventDefault();
    fertilizerProfile = {
        name: $('fert-name').value.trim(),
        packagePrice: Math.max(0, Number($('fert-package-price').value)),
        packageVolume: Math.max(1, Number($('fert-package-volume').value))
    };
    localStorage.setItem('atan_fertilizer', JSON.stringify(fertilizerProfile));
    plantStartDate = localDateString();
    localStorage.setItem('atan_start_date', plantStartDate);
    $('atan-start-modal').classList.add('hidden');
    navigate('profile');
}

function animateStageArtwork() {
    const el = $('stage-art');
    el.classList.remove('stage-animate');
    void el.offsetWidth;
    el.classList.add('stage-animate');
}

function initializeWelcome() {
    $('modal-crops').innerHTML = Object.entries(plants)
        .map(([id, plant]) => `
            <button class="modal-crop" type="button"
                    onclick="openFertStep('${id}')">
                <span>${plant.emoji}</span>
                <div><b>${plant.name}</b>
                <small>${plant.latin}</small></div>
            </button>
        `).join('');
    $('fert-name').value = fertilizerProfile.name;
    $('fert-package-price').value = fertilizerProfile.packagePrice;
    $('fert-package-volume').value = fertilizerProfile.packageVolume;
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
function costForCalendarPeriod(start, end) {
    const plantedAt = new Date(plantStartDate + 'T00:00:00');
    const totals = {
        waterCost: 0,
        fertilizerCost: 0,
        electricityCost: 0
    };
    const cursor = new Date(start);
    while (cursor < end) {
        const plantAge = daysBetweenLocalDates(plantedAt, cursor);
        if (plantAge >= 0 && plantAge <= plants[crop].duration) {
            const result = calculateDailyCosts(plantAge);
            totals.waterCost += result.waterCost;
            totals.fertilizerCost += result.fertilizerCost;
            totals.electricityCost += result.electricityCost;
        }
        cursor.setDate(cursor.getDate() + 1);
    }
    return totals;
}
function renderPeriodCosts() {
    const target = $('cost-period-grid');
    if (!target) return;

    const now = new Date();
    const startToday = new Date(
        now.getFullYear(), now.getMonth(), now.getDate()
    );
    const firstThisMonth = new Date(
        now.getFullYear(), now.getMonth(), 1
    );
    const firstNextMonth = new Date(
        now.getFullYear(), now.getMonth() + 1, 1
    );
    const firstMonthAfter = new Date(
        now.getFullYear(), now.getMonth() + 2, 1
    );
    const endToday = new Date(startToday);
    endToday.setDate(endToday.getDate() + 1);

    const periods = [
        {
            label: 'Hari Ini',
            detail: 'Estimasi kebutuhan hari ini',
            start: startToday,
            end: endToday
        },
        {
            label: 'Bulan Ini',
            detail: 'Proyeksi sepanjang bulan berjalan',
            start: firstThisMonth,
            end: firstNextMonth
        },
        {
            label: 'Bulan Depan',
            detail: 'Proyeksi bulan kalender berikutnya',
            start: firstNextMonth,
            end: firstMonthAfter
        }
    ];

    target.innerHTML = periods.map((period) => {
        const costs = costForCalendarPeriod(period.start, period.end);
        const total = costs.waterCost +
            costs.fertilizerCost + costs.electricityCost;
        return `
            <article class="rounded-2xl border border-emerald-100
                            bg-[#f8faf3] p-5">
                <p class="text-xs font-bold uppercase tracking-wider
                          text-emerald-700">
                    ${period.label}
                </p>
                <h4 class="mt-2 text-2xl font-extrabold text-emerald-950">
                    ${rupiah(total)}
                </h4>
                <p class="mt-1 text-xs text-slate-500">
                    ${period.detail}
                </p>
                <div class="mt-4 space-y-3 border-t border-emerald-100 pt-4">
                    <div class="flex justify-between gap-2 text-sm">
                        <span>💧 Air</span>
                        <b>${rupiah(costs.waterCost)}</b>
                    </div>
                    <div class="flex justify-between gap-2 text-sm">
                        <span>🧪 Pupuk</span>
                        <b>${rupiah(costs.fertilizerCost)}</b>
                    </div>
                    <div class="flex justify-between gap-2 text-sm">
                        <span>⚡ Listrik</span>
                        <b>${rupiah(costs.electricityCost)}</b>
                    </div>
                </div>
            </article>
        `;
    }).join('');
}

function calculateDailyCosts(day) {
    const phase = stageForAge(day);
    const plantCount = 30;
    const dailyWater = [0.11, 0.24, 0.32, 0.43, 0.29];
    const liters = day === 0 ? 0 : plantCount * dailyWater[phase];
    const concentrateMl = day === 0 ? 0 :
        plantCount * RESOURCE_CONFIG.fertilizerConcentrateMl[phase];
    const electricityKwh = day === 0 ? 0 :
        RESOURCE_CONFIG.dailyElectricalWatts / 1000 *
        RESOURCE_CONFIG.dailyElectricalHours;
    return {
        liters,
        concentrateMl,
        electricityKwh,
        waterCost: liters * RESOURCE_CONFIG.waterPricePerLiter,
        fertilizerCost: concentrateMl / fertilizerProfile.packageVolume *
            fertilizerProfile.packagePrice,
        electricityCost: electricityKwh * RESOURCE_CONFIG.electricityPricePerKwh
    };
}

function renderAutomaticCost() {
    const age = getPlantAge();
    const today = calculateDailyCosts(age);
    let future = {waterCost: 0, fertilizerCost: 0, electricityCost: 0};
    for (let day = age + 1; day <= Math.min(age + 30, plants[crop].duration); day++) {
        const cost = calculateDailyCosts(day);
        future.waterCost += cost.waterCost;
        future.fertilizerCost += cost.fertilizerCost;
        future.electricityCost += cost.electricityCost;
    }
    const cards = [
        ['💧 Air', 'waterCost', `${today.liters.toFixed(2)} L hari ini`],
        ['🧪 Pupuk · ' + fertilizerProfile.name, 'fertilizerCost',
            `${today.concentrateMl.toFixed(1)} mL konsentrat hari ini`],
        ['⚡ Listrik', 'electricityCost',
            `${today.electricityKwh.toFixed(3)} kWh hari ini`]
    ];
    $('automatic-cost-breakdown').innerHTML = cards.map(([label, key, detail]) => `
        <article>
            <h4>${escapeHtml(label)}</h4>
            <span>Biaya hari ini</span>
            <strong>${rupiah(today[key])}</strong>
            <small>${detail}</small>
            <hr style="border:0;border-top:1px solid #dfebda;margin:13px 0">
            <span>Perkiraan 30 hari ke depan</span>
            <strong>${rupiah(future[key])}</strong>
        </article>
    `).join('');
    // Sinkronisasi dua kartu lama dengan total tiga komponen
    const existingToday = today.waterCost + today.fertilizerCost + today.electricityCost;
    $('phase-cost').textContent = rupiah(existingToday);
    $('total-cost').textContent = rupiah(
        future.waterCost + future.fertilizerCost + future.electricityCost
    );
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
    const hot = sensorSeed.temp >= 32;
    const dry = sensor.soil < 60;
    const total = sensor.n + sensor.p + sensor.k;
    const highNutrients = total >= 300;
    const waterAction = dry ? 'pompa air dan valve perlu ON' :
        'pompa air dan valve bisa OFF';
    const nutrientAction = highNutrients ?
        'penambahan pupuk ditunda karena pembacaan NPK relatif tinggi' :
        'kadar NPK perlu ditinjau sebelum pemberian pupuk';
    const climateAction = hot ?
        'suhu tinggi: evaluasi ventilasi atau blower' :
        'suhu belum mencapai ambang ventilasi 32°C';
    $('decision-heading').textContent =
        `${dry ? 'Prioritas irigasi' : 'Kondisi kelembapan cukup'} · Zona ${zone}`;
    $('decision-reason').textContent =
        `Suhu DHT22 ${sensorSeed.temp.toFixed(1)}°C dan kelembapan ` +
        `media ${sensor.soil}% (${dry ? 'kering' : 'cukup'}). ` +
        `Indikasi total NPK ${total} mg/kg. Oleh sebab itu ${waterAction}; ` +
        `${nutrientAction}. Selain itu, ${climateAction}. ` +
        `Aliran yang terbaca ${sensor.flow.toFixed(2)} L/menit. ` +
        `Semua keputusan adalah rekomendasi, bukan instruksi ` +
        `yang otomatis dikirim ke perangkat.`;
    $('decision-source').textContent =
        `${sensorSourceLabel()} · aturan keputusan transparan, ` +
        `bukan hasil pelatihan model Decision Tree`;
}

// ===========================================================
// REFERENSI EDUKASI: penjelasan per fase dan per jenis tanaman
// ===========================================================
const botanyKnowledge = {
    tomat: {
        intro: 'Tomat (Solanum lycopersicum) merupakan tanaman Solanaceae. ' +
            'Pertumbuhannya dipengaruhi varietas, cahaya, suhu, aerasi akar, ' +
            'air, dan komposisi nutrisi. Lama fase di bawah hanya kisaran pembelajaran.',
        notes: [
            ['Perkecambahan', 'Benih menyerap air, kulit biji pecah, lalu radikula muncul. ' +
                'Media harus lembap tetapi memiliki cukup oksigen agar akar muda tidak mudah busuk.',
             'Lingkungan', 'Pantau kelembapan semai, suhu media, dan sirkulasi. ' +
                'Bibit yang terlalu basah rentan rebah semai.',
             'Pengamatan', 'Catat kemunculan kecambah, daun lembaga, dan daun sejati.'],
            ['Pembentukan tajuk', 'Daun aktif berfotosintesis, batang memanjang, ' +
                'dan akar berkembang untuk memasok air serta unsur mineral.',
             'Kebutuhan', 'Nitrogen penting bagi pertumbuhan vegetatif, ' +
                'namun kelebihan dapat menyebabkan tanaman terlalu rimbun.',
             'Pengamatan', 'Pantau warna daun, internodus, kesehatan akar, ' +
                'dan kelembapan tiap blok secara terpisah.'],
            ['Inisiasi bunga', 'Transisi ke reproduksi dimulai ketika ' +
                'tandan bunga terbentuk. Stres air dan suhu ekstrem berpotensi ' +
                'mengganggu pembentukan maupun keberhasilan bunga.',
             'Kebutuhan', 'Jaga pasokan air stabil serta kecukupan fosfor, ' +
                'kalium, dan unsur mikro tanpa mengabaikan keseimbangan keseluruhan.',
             'Pengamatan', 'Catat jumlah tandan bunga, kerontokan, ' +
                'dan kondisi mikroklimat greenhouse.'],
            ['Pertumbuhan buah', 'Setelah penyerbukan, buah melakukan pembelahan ' +
                'dan pembesaran sel. Perubahan pasokan air yang tajam dapat ' +
                'mengganggu kualitas hasil.',
             'Kebutuhan', 'Kalium berperan dalam perpindahan hasil fotosintesis. ' +
                'Kalsium dan kestabilan transpirasi juga penting bagi mutu buah.',
             'Pengamatan', 'Pantau ukuran buah, keseragaman per blok, ' +
                'gejala gangguan fisiologis, dan fluktuasi EC.'],
            ['Kematangan', 'Warna dan tekstur berubah seiring pematangan; ' +
                'panen dapat dilakukan bertahap bergantung varietas dan tujuan pemasaran.',
             'Kebutuhan', 'Hindari perubahan pasokan air mendadak. ' +
                'Sesuaikan pemeliharaan dengan kondisi buah nyata.',
             'Pengamatan', 'Catat jumlah buah, bobot panen, mutu, dan penggunaan input.']
        ]
    },
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
    },
    melon: {
        intro: 'Melon (Cucumis melo) adalah tanaman Cucurbitaceae ' +
            'yang merambat dan memerlukan pemantauan ketat ketika buah berkembang.',
        notes: [
            ['Penyemaian', 'Akar kecambah tumbuh cepat dalam media ' +
                'yang aerasi dan kelembapannya terjaga.',
             'Lingkungan', 'Jaga media hangat dan hindari genangan.',
             'Pengamatan', 'Amati kecambah dan daun awal.'],
            ['Pertumbuhan sulur', 'Tanaman membentuk ruas, daun, ' +
                'serta sulur; tajuk menentukan kapasitas fotosintesis.',
             'Kebutuhan', 'Perhatikan cahaya, ruang, dan nutrisi.',
             'Pengamatan', 'Catat panjang sulur, daun, dan kondisi akar.'],
            ['Penyerbukan', 'Bunga jantan dan betina berkembang. ' +
                'Penyerbukan yang berhasil memulai pembentukan bakal buah.',
             'Kebutuhan', 'Jaga iklim tidak ekstrem selama pembungaan.',
             'Pengamatan', 'Amati kemunculan bunga dan keberhasilan buah.'],
            ['Pengisian buah', 'Buah membesar dan mengakumulasi gula. ' +
                'Pasokan air perlu seimbang agar kualitas stabil.',
             'Kebutuhan', 'Kelola EC dan kebutuhan kalium sesuai pengamatan.',
             'Pengamatan', 'Catat ukuran buah, jaring kulit, dan pertumbuhan.'],
            ['Pematangan', 'Kematangan dinilai dari karakter varietas ' +
                'seperti aroma, warna kulit, umur, dan tingkat kemanisan.',
             'Kebutuhan', 'Jangan menentukan pengairan hanya berdasarkan usia.',
             'Pengamatan', 'Pantau karakter buah dan hasil panen.']
        ]
    }
};

function renderStageKnowledge() {
    const knowledge = botanyKnowledge[crop];
    const values = knowledge.notes[selectedStage];
    $('learning-title').textContent =
        plants[crop].stages[selectedStage][0] + ' · Pengetahuan fase';
    $('learning-intro').textContent = knowledge.intro;
    $('learning-grid').innerHTML = [
        ['🌱 Proses biologis', values[0] + ': ' + values[1]],
        ['💧 Kebutuhan lingkungan', values[2] + ': ' + values[3]],
        ['🔬 Hal yang diamati', values[4] + ': ' + values[5]]
    ].map(([title, description]) => `
        <article><b>${title}</b><p>${description}</p></article>
    `).join('');
}

// Inisialisasi halaman pertama.
initializeWelcome();
renderCards();
updateSensorsAutomatically();
setInterval(updateSensorsAutomatically, SENSOR_INTERVAL_MS);

// =============================================
// SIMULATION JOURNAL
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
function getDailyHistory() {
    const scenario = readScenario();
    const dailyWater = [0.11, 0.24, 0.32, 0.43, 0.29];
    const dailyFertilizer = [0.008, 0.016, 0.024, 0.031, 0.017];
    const result = [];
    let cumulativeCost = 0;
    let cumulativeWater = 0;
    let cumulativeFertilizer = 0;
    for (let day = 0; day <= scenario.age; day += 1) {
        const stageIndex = stageForAge(day);
        const stage = scenario.plant.stages[stageIndex];
        // Hari 0 = awal penyemaian. Belum ada pemakaian yang dihitung.
        const water = day === 0 ? 0 : dailyWater[stageIndex] * scenario.quantity;
        const fertilizer = day === 0 ? 0 : dailyFertilizer[stageIndex] * scenario.quantity;
        const dailyCost = water * scenario.waterPrice + fertilizer * scenario.fertilizerPrice;
        cumulativeWater += water;
        cumulativeFertilizer += fertilizer;
        cumulativeCost += dailyCost;
        // Deret deterministik, bukan hasil pembacaan sensor asli.
        const soil = Math.round(66 + 8 * Math.sin(day * 0.41 + stageIndex));
        const temperature = 25.5 + 1.5 * Math.sin(day * 0.27);
        const humidity = Math.round(71 + 5 * Math.cos(day * 0.23));
        result.push({
            day,
            stage: stage[0],
            icon: stage[3],
            description: stage[4],
            soil,
            temperature: temperature.toFixed(1),
            humidity,
            ph: (6.0 + 0.15 * Math.sin(day * 0.21)).toFixed(2),
            ec: (1.6 + 0.18 * Math.cos(day * 0.19)).toFixed(2),
            water,
            fertilizer,
            dailyCost,
            cumulativeWater,
            cumulativeFertilizer,
            cumulativeCost,
            npk: [stage[5], stage[6], stage[7]].join(' / ')
        });
    }
    return result;
}
function renderHistory() {
    const list = getDailyHistory();
    const latest = list[list.length - 1];
    const shown = historyPeriod === 'all' ? list : list.slice(-historyPeriod);
    $('history-overview').innerHTML = [
        ['🌱 Umur tanaman', `Hari ke-${latest.day}`],
        ['💧 Total air', `${latest.cumulativeWater.toFixed(1)} L`],
        ['🧪 Total larutan pupuk', `${latest.cumulativeFertilizer.toFixed(2)} L`],
        ['💰 Estimasi biaya berjalan', rupiah(latest.cumulativeCost)]
    ].map(([label, value]) => `
    <div class="history-stat">
      <span>${label}</span>
      <strong>${value}</strong>
    </div>
  `).join('');
    $('history-count').textContent = `Menampilkan ${shown.length} dari ${list.length} hari (terbaru dahulu)`;
    $('history-timeline').innerHTML = [...shown].reverse().map((item) => `
    <article class="history-entry">
      <div class="history-entry-header">
        <div>
          <span class="eyebrow">HARI ${item.day} · ${item.stage}</span>
          <h4>${item.icon} ${item.day === 0 ? 'Awal penyemaian' : 'Perkembangan hari ke-' + item.day}</h4>
        </div>
        <span class="pill">Data dummy</span>
      </div>
      <p>${item.description}</p>
      <div class="history-data">
        <div><small>Kelembapan media</small><b>${item.soil}%</b></div>
        <div><small>Suhu udara</small><b>${item.temperature}°C</b></div>
        <div><small>Kelembapan udara</small><b>${item.humidity}%</b></div>
        <div><small>pH / EC</small><b>${item.ph} / ${item.ec} mS/cm</b></div>
        <div><small>Air hari ini</small><b>${item.water.toFixed(2)} L</b></div>
        <div><small>Larutan pupuk hari ini</small><b>${item.fertilizer.toFixed(3)} L</b></div>
        <div><small>Indeks N / P / K</small><b>${item.npk}</b></div>
        <div><small>Biaya hari ini</small><b>${rupiah(item.dailyCost)}</b></div>
      </div>
    </article>
  `).join('');
    document.querySelectorAll('.history-filter').forEach((button) => {
        button.classList.toggle('active', String(historyPeriod) === button.dataset.period);
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
    // Semua state simulasi frontend kembali ke awal.
    plantStartDate = localDateString();
    localStorage.setItem('atan_start_date', plantStartDate);
    $('age').value = 0;
    $('quantity').value = 30;
    $('water-price').value = 15;
    $('fert-price').value = 1500;
    sensorRecords = [];
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
        'Hari', 'Fase', 'Kelembapan Media (%)', 'Suhu Udara (C)',
        'Kelembapan Udara (%)', 'pH', 'EC (mS/cm)', 'Air (L)',
        'Larutan Pupuk (L)', 'Indeks NPK', 'Biaya Harian (Rp)',
        'Biaya Kumulatif (Rp)', 'Sumber'
    ];
    const rows = getDailyHistory().map((item) => [
        item.day, item.stage, item.soil, item.temperature, item.humidity,
        item.ph, item.ec, item.water.toFixed(3), item.fertilizer.toFixed(3),
        item.npk, item.dailyCost.toFixed(2), item.cumulativeCost.toFixed(2),
        'DUMMY'
    ]);
    const csv = [headings, ...rows]
        .map((row) => row.map((value) => `"${String(value).replace(/"/g, '""')}"`).join(','))
        .join('\r\n');
    const blob = new Blob(['\uFEFF', csv], { type: 'text/csv;charset=utf-8' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = `riwayat-${crop}-simulasi.csv`;
    link.click();
    URL.revokeObjectURL(url);
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

