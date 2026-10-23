<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="#132d26" name="theme-color" />
    <title>ATAN si TATANEN &middot; Smart Greenhouse Cabai</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&amp;family=Outfit:wght@400;500;600;700;800&amp;display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        corePlugins: { preflight: false },
        theme: {
          extend: {
            colors: {
              forest: "#123D34",
              sage: "#819D87",
              ivory: "#F8F7F0",
              lime: "#D5EBAB",
              clay: "#D89977",
            },
            fontFamily: {
              sans: ["DM Sans", "sans-serif"],
              display: ["Outfit", "sans-serif"],
            },
          },
        },
      };
    </script>
    <style>
      :root {
        --ink: #163d34;
        --muted: #73877c;
        --line: #e3eae0;
        --paper: #fffefa;
        --mist: #f0f6eb;
      }
      * {
        box-sizing: border-box;
      }
      html {
        scroll-behavior: auto;
        height: 100%;
        overflow: hidden;
      }
      body {
        margin: 0;
        background: #f8f7f0;
        color: var(--ink);
        font-family: "DM Sans", sans-serif;
        overflow: hidden;
        height: 100%;
      }
      h1,
      h2,
      h3,
      h4 {
        font-family: Outfit, sans-serif;
      }
      button,
      input {
        font: inherit;
      }
      button {
        cursor: pointer;
      }
      a {
        text-decoration: none;
        color: inherit;
      }
      .wrap {
        max-width: 1440px;
        padding: 0 clamp(16px, 4vw, 70px);
        margin: auto;
      }
      .screen {
        display: none;
      }
      .screen.active {
        display: block;
      }
      main {
        width: 100vw;
        height: 100dvh;
        overflow: hidden;
      }
      #dashboard.screen.active {
        width: 100vw;
        height: 100dvh;
        overflow: hidden;
      }
      .wrap.dashboard-track {
        display: flex;
        align-items: stretch;
        width: 600vw;
        max-width: none;
        padding: 0;
        margin: 0;
        height: 100dvh;
        transition: transform 0.68s cubic-bezier(0.22, 0.78, 0.24, 1);
        will-change: transform;
      }
      .dashboard-slide {
        flex: 0 0 100vw;
        width: 100vw;
        height: 100dvh;
        min-height: 100dvh;
        overflow-x: hidden;
        overflow-y: auto;
        overscroll-behavior: contain;
        background: #f8f7f0;
        scrollbar-width: thin;
        scrollbar-color: #b9cdb5 transparent;
      }
      .dashboard-slide-inner {
        width: 100%;
        max-width: 1440px;
        min-height: 100%;
        margin: 0 auto;
        padding: 92px clamp(16px, 4vw, 70px) 36px;
      }
      .dashboard-slide-nav {
        position: fixed;
        z-index: 100;
        inset: 0 0 auto;
        min-height: 72px;
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 10px clamp(14px, 3vw, 42px);
        background: rgba(248, 247, 240, 0.92);
        backdrop-filter: blur(18px);
        border-bottom: 1px solid #e0e9dd;
        box-shadow: 0 8px 28px rgba(25, 62, 42, 0.05);
      }
      .dashboard-nav-brand {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}

.dashboard-nav-logo {
    width: 42px;
    height: 42px;
    object-fit: contain;
    display: block;
}
      .dashboard-nav-mark {
        width: 36px;
        height: 36px;
        border-radius: 13px;
        display: grid;
        place-items: center;
        background: #174b3b;
        color: #d5ebab;
        font-size: 20px;
      }
      .dashboard-nav-links {
        display: flex;
        align-items: center;
        gap: 4px;
        flex: 1;
        min-width: 0;
        overflow-x: auto;
        scrollbar-width: none;
      }
      .dashboard-nav-links::-webkit-scrollbar {
        display: none;
      }
      .dashboard-nav-links button {
        white-space: nowrap;
        border: 0;
        background: transparent;
        color: #6d8274;
        border-radius: 999px;
        padding: 10px 12px;
        font-size: 11px;
        font-weight: 800;
        transition:
          background 0.2s,
          color 0.2s;
      }
      .dashboard-nav-links button:hover {
        background: #e8f1e4;
        color: #214b37;
      }
      .dashboard-nav-links button.active {
        background: #174b3b;
        color: #fff;
        box-shadow: 0 7px 18px #174b3b20;
      }
      .dashboard-nav-home {
        flex-shrink: 0;
        border-radius: 999px;
        background: #e7f0e2;
        color: #214b37;
        padding: 11px 14px;
        font-size: 11px;
        font-weight: 900;
        white-space: nowrap;
      }
      @media (max-width: 900px) {
        .dashboard-slide-nav {
          flex-wrap: wrap;
          gap: 5px;
          padding: 8px 12px;
        }
        .dashboard-nav-brand {
          font-size: 12px;
        }
        .dashboard-nav-mark {
          width: 30px;
          height: 30px;
        }
        .dashboard-nav-links {
          order: 3;
          flex-basis: 100%;
          justify-content: flex-start;
        }
        .dashboard-nav-links button {
          font-size: 10px;
          padding: 8px 10px;
        }
        .dashboard-nav-home {
          margin-left: auto;
          padding: 9px 11px;
        }
        .dashboard-slide-inner {
          padding-top: 112px;
        }
      }
      @media (prefers-reduced-motion: reduce) {
        .wrap.dashboard-track {
          transition: none !important;
        }
      }
      .eyebrow {
        font: 800 10px "DM Sans";
        letter-spacing: 2.6px;
        text-transform: uppercase;
        color: #699878;
      }
      .dashboard-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 34px 0 20px;
      }
      .dashboard-top h1 {
        font-size: clamp(36px, 4.8vw, 65px);
        line-height: 1.05;
        letter-spacing: -2px;
        margin: 10px 0;
      }
      .dashboard-top p {
        font-size: 13px;
        color: #708578;
      }
      .dashboard-top > div:last-child {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
      }
      .panel {
        background: var(--paper);
        border: 1px solid var(--line);
        border-radius: 25px;
        padding: clamp(18px, 2.2vw, 28px);
        box-shadow: 0 14px 45px #244d3210;
        min-width: 0;
        transition:
          box-shadow 0.3s,
          transform 0.3s;
      }
      .panel:hover {
        box-shadow: 0 18px 48px #244d3219;
      }
      .panel h3 {
        font-family: Outfit;
        font-size: 22px;
        letter-spacing: -0.6px;
        margin: 5px 0;
      }
      .sub {
        font-size: 12px;
        color: #7b8c80;
        line-height: 1.8;
        margin: 8px 0 16px;
      }
      .sectionhead {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin: 14px 0;
      }
      .sectionhead h3 {
        margin: 0;
      }
      .metrics {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 13px;
        margin: 10px 0 20px;
      }
      .metric {
        min-width: 0;
        background: var(--paper);
        border: 1px solid var(--line);
        border-radius: 22px;
        padding: 19px 16px;
        box-shadow: 0 8px 30px #244d320a;
        transition:
          transform 0.25s,
          border-color 0.25s;
      }
      .metric:hover {
        transform: translateY(-5px);
        border-color: #9ebca4;
      }
      .metric .symbol {
        height: 36px;
        display: flex;
        align-items: center;
        font-size: 22px;
      }
      .metric label {
        display: block;
        font-size: 11px;
        color: #738878;
        margin: 13px 0 7px;
      }
      .metric strong {
        font: 800 clamp(17px, 2vw, 26px) Outfit;
        word-break: break-word;
      }
      .metric small {
        font-size: 10px;
        color: #719681;
        display: block;
        margin-top: 9px;
        font-weight: 700;
      }
      .sensor-status-panel {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin: 0 0 18px;
        background: linear-gradient(115deg, #edf4e7, #fffdf7);
      }
      .sensor-status-panel strong {
        display: block;
        margin: 9px 0;
        font: 700 18px Outfit;
      }
      .sensor-status-panel .sub {
        margin: 0;
      }
      .pill {
        display: inline-flex;
        align-items: center;
        border-radius: 50px;
        background: #e9f2e6;
        color: #416e52;
        padding: 7px 13px;
        font-size: 10px;
        font-weight: 800;
      }
      .tag {
        border-radius: 50px;
        background: #fff1e7;
        color: #9e705a;
        padding: 10px 14px;
        font-size: 11px;
        font-weight: 800;
      }
      .two-col {
        display: grid;
        grid-template-columns: minmax(0, 1.4fr) minmax(0, 0.86fr);
        gap: 18px;
        margin: 18px 0;
      }
      .reading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 13px 0;
        border-bottom: 1px solid #ebf0e8;
        font-size: 12px;
      }
      .reading strong {
        font-weight: 800;
        color: #244e39;
        text-align: right;
      }
      .forecast {
        background: linear-gradient(130deg, #183f35, #315c43);
        padding: 24px;
        border-radius: 20px;
        color: white;
        margin-top: 16px;
      }
      .forecast h3 {
        color: #fff;
      }
      .forecast p {
        color: #d4e5d6;
        line-height: 1.8;
        font-size: 12px;
      }
      .diagram {
        position: relative;
        isolation: isolate;
        background: radial-gradient(ellipse at 50% 0%, #fcfff7, #eaf3e5 85%);
        border: 1px solid #dae7d6;
        border-radius: 22px;
        min-height: 315px;
        padding: 27px 20px;
        overflow: hidden;
      }
      .diagram:before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -1;
        background-image:
          linear-gradient(#aac9a31e 1px, transparent 1px),
          linear-gradient(90deg, #aac9a31e 1px, transparent 1px);
        background-size: 29px 29px;
      }
      .diagram-row {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 7px;
        flex-wrap: wrap;
      }
      .tank {
        width: 95px;
        height: 122px;
        border: 3px solid #6199a0;
        border-top-width: 8px;
        border-radius: 16px 16px 25px 25px;
        background: linear-gradient(to top, #90d4e0 60%, #edf8f6 60%);
        display: grid;
        place-items: center;
        text-align: center;
        font-size: 11px;
        font-weight: 800;
        color: #396a75;
        box-shadow: 0 12px 20px #34718b14;
        transition: transform 0.4s;
      }
      .tank:hover {
        transform: translateY(-5px);
      }
      .tank.orange {
        border-color: #c5a46f;
        background: linear-gradient(to top, #f0d39f 50%, #fffaf0 50%);
        color: #856127;
      }
      .tank.green {
        border-color: #8aa574;
        background: linear-gradient(to top, #aed49e 61%, #f3f9ed 61%);
        color: #466a38;
      }
      .pipe {
        height: 7px;
        min-width: 15px;
        max-width: 65px;
        flex: 1;
        border-radius: 30px;
        background: repeating-linear-gradient(
          90deg,
          #2699b4 0 14px,
          #a0dcf0 14px 27px
        );
        background-size: 54px 100%;
        animation: waterflow 1.1s linear infinite;
      }
      .pipe.off {
        background: #c7d7d1;
        animation: none;
      }
      .mixer {
        width: 106px;
        height: 105px;
        border: 3px solid #8db2a5;
        border-radius: 22px;
        background: linear-gradient(to top, #b5e4d7 60%, #fafffc 60%);
        display: grid;
        place-items: center;
        position: relative;
        font-size: 11px;
        font-weight: 800;
      }
      .mixer:after {
        content: "↻";
        font-size: 36px;
        position: absolute;
        bottom: 14px;
        color: #468d7e;
        animation: rotate 5s linear infinite;
      }
      .water {
        text-align: center;
        margin: 18px 0;
        color: #5797ae;
        font-size: 11px;
        font-weight: 700;
      }
      .diagram-bottom,
      .zones {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 10px;
      }
      .plant-node,
      .zone {
        border: 1px solid #d2e4cd;
        background: #fffefaeb;
        border-radius: 17px;
        padding: 14px 7px;
        text-align: center;
        min-width: 0;
        color: #2a533c;
        font-weight: 800;
        transition:
          transform 0.3s,
          border-color 0.3s,
          box-shadow 0.3s;
      }
      .plant-node:hover,
      .plant-node.chosen,
      .zone:hover,
      .zone.active {
        transform: translateY(-3px);
        border-color: #74a784;
        box-shadow: 0 10px 25px #3e7c3d1c;
      }
      .zone.active {
        background: #1c5140;
        color: white;
      }
      .plant-node .sprout {
        display: block;
        min-height: 45px;
        animation: sway 4s ease-in-out infinite;
      }
      .plant-node b,
      .plant-node small {
        display: block;
        font-size: 11px;
      }
      .plant-node small {
        color: #829688;
        font-size: 10px;
        margin-top: 5px;
      }
      .zone span {
        display: block;
        margin: 7px 0;
      }
      .zone small {
        font-weight: 700;
      }
      .btn {
        border: 0;
        display: inline-flex;
        align-items: center;
        gap: 9px;
        border-radius: 13px;
        padding: 13px 18px;
        font-weight: 800;
        font-size: 12px;
        transition:
          transform 0.22s,
          box-shadow 0.22s;
      }
      .btn:hover {
        transform: translateY(-3px);
      }
      .btn.dark {
        background: #174b3b;
        color: white;
      }
      .btn.light {
        background: #e8f2e7;
        color: #28543b;
      }
      .reset-btn {
        border: 1px solid #f0d7c9;
        background: #fff0e7;
        color: #a06c58;
      }
      .graphbox {
        height: 230px;
        position: relative;
      }
      .grid3,
      .calc,
      .cost-breakdown {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
      }
      .mini {
        padding: 17px;
        background: #f1f6ed;
        border-radius: 16px;
      }
      .mini span,
      .calc span {
        display: block;
        color: #789080;
        font-size: 11px;
      }
      .mini strong,
      .calc strong {
        display: block;
        font: 800 23px Outfit;
        margin: 9px 0;
      }
      .calc {
        margin: 20px 0;
      }
      .calc .panel {
        padding: 16px;
      }
      .estimate,
      .auto-age-banner,
      .cost-summary-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        border-radius: 16px;
        padding: 20px;
        background: #eaf2e4;
        margin: 16px 0;
      }
      .estimate strong {
        font: 800 25px Outfit;
      }
      .footnote {
        font-size: 11px;
        line-height: 1.7;
        color: #8a978c;
        margin: 12px 0 20px;
      }
      .cost-breakdown {
        margin: 15px 0;
      }
      .cost-breakdown article {
        border-radius: 17px;
        padding: 17px;
        background: #f6f9f2;
        border: 1px solid #e3ebdf;
      }
      .cost-breakdown article h4 {
        margin: 0 0 10px;
        font-size: 13px;
      }
      .cost-breakdown article strong {
        display: block;
        font: 800 22px Outfit;
      }
      .cost-breakdown article small {
        display: block;
        font-size: 11px;
        color: #799184;
        line-height: 1.65;
        margin-top: 8px;
      }
      .at-v5-cost {
        margin: 20px 0;
      }
      .sensor-log-section {
        margin: 23px 0;
      }
      .sensor-table-wrap {
        overflow-x: auto;
        width: 100%;
      }
      .sensor-table {
        width: 100%;
        min-width: 1640px;
        border-collapse: collapse;
        font-size: 11px;
      }
      .sensor-table th,
      .sensor-table td {
        padding: 13px 11px;
        text-align: left;
        border-bottom: 1px solid #e9eee5;
        white-space: nowrap;
      }
      .sensor-table th {
        background: #eef5ea;
        color: #28553e;
      }
      .decision-card {
        display: flex;
        gap: 18px;
        align-items: flex-start;
        border-radius: 20px;
        background: linear-gradient(120deg, #183f35, #295e46);
        padding: 24px;
        color: white;
      }
      .decision-orb {
        background: #d5ebab;
        color: #214936;
        border-radius: 14px;
        width: 50px;
        height: 50px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
      }
      .decision-card b {
        font: 800 18px Outfit;
      }
      .decision-card p {
        color: #dbeadc;
        font-size: 13px;
        line-height: 1.8;
      }
      .decision-card small {
        color: #c0d3c6;
        font-size: 11px;
      }
      .history-section {
        margin: 25px 0;
      }
      .history-header,
      .history-controls,
      .history-entry-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
      }
      .history-header h3 {
        font-size: 26px;
      }
      .history-tools,
      .history-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
      }
      .history-overview,
      .history-data {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 12px;
        margin: 15px 0;
      }
      .history-stat,
      .history-data div {
        background: #f2f7ef;
        padding: 14px;
        border-radius: 14px;
      }
      .history-stat span,
      .history-data small {
        font-size: 11px;
        color: #7a8b7e;
        display: block;
      }
      .history-stat strong {
        font: 800 23px Outfit;
        display: block;
        margin-top: 6px;
      }
      .history-filter {
        background: #edf4e9;
        color: #42694d;
        padding: 9px 13px;
        border: 1px solid #d8e7d6;
        border-radius: 10px;
        font-weight: 800;
        font-size: 11px;
      }
      .history-filter.active {
        background: #245743;
        color: white;
      }
      .history-timeline {
        padding-left: 24px;
        position: relative;
      }
      .history-timeline:before {
        content: "";
        background: #d7e6d1;
        width: 2px;
        position: absolute;
        left: 8px;
        top: 5px;
        bottom: 4px;
      }
      .history-entry {
        border: 1px solid #dbe8d8;
        background: #fffefa;
        border-radius: 16px;
        padding: 17px;
        margin: 12px 0;
        position: relative;
      }
      .history-entry:before {
        content: "";
        background: #7ba985;
        border: 3px solid #edf6e8;
        border-radius: 50%;
        width: 14px;
        height: 14px;
        position: absolute;
        left: -23px;
        top: 20px;
      }
      .history-entry h4 {
        font: 800 16px Outfit;
        margin: 6px 0;
      }
      .history-entry p,
      .history-note,
      .history-count {
        font-size: 12px;
        color: #798b7d;
        line-height: 1.8;
      }
      .history-data b {
        font-size: 12px;
      }
      .footer {
        margin-top: 45px;
        padding: 38px 20px;
        background: #143f34;
        color: #d0dfd2;
        text-align: center;
        font-size: 12px;
      }
      .at-v5-modal {
        position: fixed;
        inset: 0;
        z-index: 100;
        display: grid;
        place-items: center;
        background: #09261caa;
        backdrop-filter: blur(12px);
        padding: 20px;
      }
      .at-v5-modal[hidden] {
        display: none;
      }
      .atan-modal {
        max-height: 90vh;
        overflow: auto;
        width: min(510px, 100%);
        border-radius: 28px;
        background: #fffefa;
        padding: 32px;
        box-shadow: 0 40px 100px #0004;
      }
      .atan-modal h2 {
        font: 800 32px Outfit;
        letter-spacing: -1px;
      }
      .atan-modal p {
        font-size: 13px;
        color: #71877b;
        line-height: 1.8;
      }
      .at-v5-input {
        width: 100%;
        padding: 13px;
        border: 1px solid #c6dcca;
        background: white;
        border-radius: 13px;
        margin-top: 10px;
      }
      .hidden {
        display: none !important;
      }
      /* Artistic motion */
      .dashboard-banner {
        position: relative;
        overflow: hidden;
        background: linear-gradient(110deg, #113b30, #275e47 65%, #426e4f);
        border-radius: 29px;
        color: white;
        padding: 35px 40px;
        margin: 22px 0 20px;
        min-height: 180px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 25px;
      }
      .dashboard-banner:before {
        content: "";
        position: absolute;
        width: 340px;
        height: 340px;
        right: 0;
        top: -150px;
        border: 1px solid #d5edac45;
        border-radius: 50%;
        box-shadow:
          0 0 0 45px #ffffff08,
          0 0 0 95px #ffffff06;
        animation: halo 8s ease-in-out infinite;
      }
      .banner-art {
        font-size: 74px;
        position: relative;
        animation: levitate 5s ease-in-out infinite;
        filter: drop-shadow(0 15px 15px #071d1977);
      }
      .dashboard-banner h2 {
        position: relative;
        font-size: clamp(27px, 3vw, 43px);
        line-height: 1.09;
        letter-spacing: -1.3px;
        margin: 9px 0;
      }
      .dashboard-banner p {
        position: relative;
        font-size: 12px;
        color: #d5e4d8;
        max-width: 580px;
        line-height: 1.75;
      }
      .dashboard-banner .eyebrow {
        color: #d4e6af;
      }
      .reveal {
        animation: rise 0.8s cubic-bezier(0.2, 0.7, 0.2, 1) both;
      }
      .metrics .metric:nth-child(2) {
        animation-delay: 0.07s;
      }
      .metrics .metric:nth-child(3) {
        animation-delay: 0.14s;
      }
      .metrics .metric:nth-child(4) {
        animation-delay: 0.21s;
      }
      .metrics .metric:nth-child(5) {
        animation-delay: 0.28s;
      }
      .metrics .metric:nth-child(6) {
        animation-delay: 0.35s;
      }
      @keyframes waterflow {
        to {
          background-position: 54px 0;
        }
      }
      @keyframes rotate {
        to {
          transform: rotate(360deg);
        }
      }
      @keyframes sway {
        50% {
          transform: rotate(3deg);
        }
      }
      @keyframes levitate {
        50% {
          transform: translateY(-13px) rotate(-3deg);
        }
      }
      @keyframes halo {
        50% {
          transform: scale(1.1);
          opacity: 0.6;
        }
      }
      @keyframes rise {
        from {
          opacity: 0;
          transform: translateY(15px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
      @media (max-width: 1120px) {
        .metrics {
          grid-template-columns: repeat(3, 1fr);
        }
        .two-col {
          grid-template-columns: 1fr;
        }
      }
      @media (max-width: 700px) {
        .metrics {
          grid-template-columns: repeat(2, 1fr);
        }
        .dashboard-top {
          flex-direction: column;
          align-items: flex-start;
        }
        .dashboard-banner {
          padding: 25px;
          min-height: 150px;
        }
        .banner-art {
          font-size: 48px;
        }
        .diagram-row {
          gap: 3px;
        }
        .tank {
          width: 68px;
          height: 95px;
        }
        .mixer {
          width: 77px;
          height: 87px;
        }
        .pipe {
          min-width: 7px;
        }
        .diagram-bottom,
        .zones {
          grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        .grid3,
        .calc,
        .cost-breakdown {
          grid-template-columns: 1fr;
        }
        .history-overview,
        .history-data {
          grid-template-columns: repeat(2, 1fr);
        }
        .sensor-status-panel {
          flex-direction: column;
          align-items: flex-start;
        }
      }
      @media (max-width: 410px) {
        .banner-art {
          display: none;
        }
        .diagram {
          padding: 15px 9px;
        }
        .tank {
          width: 59px;
          font-size: 9px;
        }
        .mixer {
          width: 68px;
        }
        .plant-node {
          padding: 12px 4px;
        }
      }
      @media (prefers-reduced-motion: reduce) {
        *,
        *:before,
        *:after {
          animation-duration: 0.01ms !important;
          scroll-behavior: auto !important;
          transition-duration: 0.01ms !important;
        }
      }
      .atan-sensor-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        flex-wrap: wrap;
      }
      .atan-sensor-actions .btn {
        white-space: nowrap;
        padding: 11px 16px;
      }
      @media (max-width: 700px) {
        .sensor-log-section .sectionhead {
          align-items: flex-start;
          flex-direction: column;
        }
        .atan-sensor-actions {
          width: 100%;
          justify-content: space-between;
        }
      }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <main>
      <section class="screen active" id="dashboard">
        <div class="wrap">
          <div class="dashboard-top">
            <div
              style="
                display: flex;
                align-items: center;
                gap: 10px;
                flex-wrap: wrap;
              "
            >
              <button
                id="atan-monitor-toggle"
                type="button"
                class="btn dark"
                aria-pressed="true"
              >
                Monitoring: ON</button
              ><span
                id="atan-monitor-note"
                style="font-size: 11px; color: #63826b"
              ></span>
            </div>
            <div>
              <span class="eyebrow"> 03 / Smart growing intelligence </span>
              <h1>
                Greenhouse
                <span style="color: #4f9462"> Overview. </span>
              </h1>
              <p id="dashboard-summary"></p>
            </div>
            <div>
              <button class="btn reset-btn" onclick="resetSimulation()">
                &olarr; Mulai Ulang Siklus
              </button>
            </div>
          </div>
          <div
            class="dashboard-banner reveal"
            aria-label="ATAN Smart Greenhouse"
          >
            <div>
              <span class="eyebrow">✳ ATAN SI TATANEN / SMART GREENHOUSE</span>
              <h2>
                Every drop matters.<br /><span style="color: #d5ebab"
                  >Every plant thrives.</span
                >
              </h2>
              <p>
                Pantau lingkungan, aliran nutrisi, dan perjalanan tanaman cabai
                dari satu ruang kendali. Pembacaan tetap menunggu perangkat
                ESP32-S3 yang benar-benar aktif.
              </p>
            </div>
            <div class="banner-art" aria-hidden="true">🌿</div>
          </div>
          <div class="metrics" id="metrics"></div>
          <!-- STATUS SUMBER DATA -->
          <div class="panel sensor-status-panel reveal">
            <div>
              <span class="eyebrow">SENSOR STREAM</span>
              <strong id="connection-status">ESP32-S3 · Belum terhubung</strong>
              <p class="sub" id="sensor-updated">
                Menunggu pembacaan berikutnya.
              </p>
            </div>
            <span class="pill" id="sensor-source">Menunggu Koneksi</span>
          </div>
          <section
            class="panel"
            style="margin: 12px 0 18px"
            aria-label="Diagnostik sensor mentah"
          >
            <span class="eyebrow">DIAGNOSTIK / PEMBACAAN MENTAH</span>
            <h3>ADC Sensor &amp; NPK Global</h3>
            <p class="sub"></p>
            <div class="grid3" id="atan-raw-diagnostic">
              <div class="mini">Menunggu telemetry diagnostik...</div>
            </div>
          </section>
          <div class="two-col reveal">
            <div class="panel">
              <div class="sectionhead" style="margin: 0 0 15px">
                <div>
                  <span class="eyebrow"> Interactive system </span>
                  <h3>Living Greenhouse</h3>
                  <p class="sub">
                    Klik blok untuk melihat pembacaan terbaru. Aliran hanya
                    menyala jika status aktuator dilaporkan perangkat.
                  </p>
                </div>
                <span class="pill"> Blok greenhouse </span>
              </div>
              <div class="diagram">
                <div class="diagram-row">
                  <div class="tank">
                    💧
                    <br />
                    TANGKI AIR
                  </div>
                  <div class="pipe" title="Status aliran"></div>
                  <div class="tank orange">
                    🧪
                    <br />
                    NUTRISI
                  </div>
                  <div class="pipe"></div>
                  <div class="mixer">
                    <span style="position: absolute; top: 12px"> MIXER </span>
                  </div>
                  <div class="pipe"></div>
                  <div class="tank green">
                    ⚙️
                    <br />
                    POMPA
                  </div>
                </div>
                <div class="water">
                  ▼ Air + nutrisi dialirkan menuju zona penanaman ▼
                </div>
                <div class="diagram-bottom" id="diagram-plants"></div>
              </div>
              <div class="sectionhead" style="margin: 18px 0 12px">
                <h3 style="font-size: 16px">Pilih Zona Tanam</h3>
                <span class="pill" id="zone-status"> Zona A aktif </span>
              </div>
              <div class="flex justify-end my-3">
                <button
                  type="button"
                  onclick="openAddBlockModal()"
                  class="btn dark"
                >
                  ＋ Tambah Blok
                </button>
              </div>
              <div class="zones" id="zones"></div>
            </div>
            <div class="panel">
              <span class="eyebrow"> Environmental sensors </span>
              <h3>
                Detail Zona
                <span id="zone-label"> A </span>
              </h3>
              <p class="sub">
                Data hanya berasal dari ESP32-S3. Nilai kosong berarti belum ada
                pembacaan.
              </p>
              <div id="sensor-detail"></div>
              <div style="height: 12px"></div>
              <span class="eyebrow"> Nutrients &amp; automation </span>
              <h3 style="margin-top: 7px">Sistem Irigasi</h3>

              <!-- POMPA AIR & MIXER SAJA -->
              <div class="reading">
                <span> Pompa Air </span>
                <strong id="pump-state"> Menunggu </strong>
              </div>
              <div class="reading">
                <span> Mixer Nutrisi </span>
                <strong id="mixer-state"> Menunggu </strong>
              </div>

              <div class="reading">
                <span> Sensor NPK Tanah </span>
                <strong id="global-npk-state"> N / P / K </strong>
              </div>
              <p class="footnote"></p>
              <div class="forecast">
                <span class="eyebrow" style="color: #b3dea3">
                  Digital grow assistant
                </span>
                <h3 id="insight-title">Perhatikan kelembapan</h3>
                <p id="insight-text"></p>
              </div>
            </div>
          </div>
          <div class="two-col reveal">
            <div class="panel">
              <span class="eyebrow"> 04 / Growth intelligence </span>
              <h3>Prediksi Fase Pertumbuhan</h3>
              <p class="sub">
                Umur tanaman dihitung dari tanggal tanam. Prediksi ML Edge
                Impulse Aktif.
              </p>
              <div class="auto-age-banner">
                <span>🌱 Umur otomatis berdasarkan tanggal tanam</span>
                <strong id="automatic-age-label">Hari ke-0</strong>
              </div>
              <input id="age" type="hidden" value="0" />
              <input id="quantity" type="hidden" value="30" />
              <div
                class="atan-growth-settings"
                style="
                  display: flex;
                  align-items: end;
                  gap: 12px;
                  flex-wrap: wrap;
                  margin: 16px 0;
                  padding: 16px;
                  border-radius: 16px;
                  background: #f0f6eb;
                "
              >
                <label style="font-size: 12px; font-weight: 700"
                  >Tanggal tanam cabai<br /><input
                    type="date"
                    id="atan-planting-date"
                    style="
                      margin-top: 7px;
                      border: 1px solid #bdd2be;
                      border-radius: 10px;
                      padding: 10px;
                      background: white;
                      max-width: 100%;
                    "
                /></label>
                <button
                  type="button"
                  class="btn dark"
                  id="atan-save-planting-date"
                >
                  Simpan tanggal tanam
                </button>
                <span
                  id="atan-growth-status"
                  style="font-size: 12px; color: #4a6956"
                  aria-live="polite"
                  >Memuat fase pertumbuhan...</span
                >
              </div>
              <div class="day-actions">
                <button class="btn dark" onclick="advanceDay()">
                  ＋ Lanjut Hari Berikutnya
                </button>
                <button class="btn light" onclick="resetSimulation()">
                  &olarr; Ulang dari Hari 0
                </button>
              </div>
              <div class="stage-info" style="margin: 0 0 18px">
                <div>
                  <span class="eyebrow" id="current-period"> </span>
                  <h3 id="current-stage"></h3>
                  <p id="current-explanation"></p>
                </div>
                <div class="illustration" id="current-art"></div>
              </div>
              <div class="grid3" id="stage-requirement"></div>
            </div>
            <div class="panel">
              <span class="eyebrow"> Forecast visualization </span>
              <h3>Kebutuhan per Fase</h3>
              <p class="sub">
                Grafik akan terisi setelah hasil prediksi model AI dan data
                sensor tersedia.
              </p>
              <div class="graphbox">
                <canvas id="growthChart"> </canvas>
              </div>
              <div class="reading">
                <span> Estimasi hari hingga panen </span>
                <strong id="days-left"> </strong>
              </div>
              <div class="reading">
                <span> Fase saat ini </span>
                <strong id="stage-label"> </strong>
              </div>
            </div>
          </div>
          <div class="two-col reveal">
            <div class="panel">
              <span class="eyebrow"> 05 / Farm economics </span>
              <h3>Smart Farming Cost Planner</h3>
              <p class="sub">
                Proyeksi biaya berdasarkan konfigurasi pupuk. Dosis dihitung
                otomatis berdasarkan Machine Learning.
              </p>
              <!-- HARGA PUPUK DIAMBIL DARI LOCALSTORAGE ATAN_FERTILIZER -->
              <input type="hidden" id="fert-price" value="1500" />
              <div class="cost-summary-head">
                <span
                  >Perhitungan otomatis berdasarkan hasil prediksi Edge
                  Impulse<br />
                  dan harga pupuk terdaftar.</span
                >
              </div>
              <div class="cost-breakdown" id="automatic-cost-breakdown"></div>

              <div
                id="atan-nutrient-cost"
                class="panel"
                style="margin: 16px 0; background: #f4f8ef"
              >
                <span class="eyebrow">COST / ESTIMASI PUPUK ML</span>
                <h3>Rekap Biaya Pupuk Aktual</h3>
                <p class="sub">
                  Biaya pupuk dihitung dari volume hasil prediksi Machine
                  Learning berdasarkan sensor aktual.
                </p>
                <div class="grid3" style="margin: 14px 0">
                  <div class="mini">
                    <span>Pemakaian Hari ini</span
                    ><strong id="nc-batches">—</strong>
                  </div>
                  <div class="mini">
                    <span>Biaya Aktual (A+B)</span
                    ><strong id="nc-fertilizer">—</strong>
                  </div>
                  <div class="mini">
                    <span>Total Keseluruhan</span
                    ><strong id="nc-total">—</strong>
                  </div>
                </div>
                <p id="nc-info" class="footnote">
                  Menunggu API biaya Laravel dan hasil inferensi AI.
                </p>
                <a href="/#fertilizer-section" class="btn dark"
                  >Atur Harga Pupuk A & B ↗</a
                >
              </div>

              <div class="calc">
                <div class="panel">
                  <span> Prediksi ML (30 Hari Kedepan) </span>
                  <strong id="phase-fert"> &mdash; </strong>
                  <span> Liter &middot; ML Model </span>
                </div>
                <div class="panel">
                  <span> Biaya ML (30 Hari Kedepan) </span>
                  <strong id="phase-cost"> &mdash; </strong>
                  <span> Rp &middot; prediksi model AI </span>
                </div>
              </div>
              <div class="estimate">
                <div>
                  <span class="eyebrow"> Projection to harvest </span>
                  <h3>Estimasi total biaya · 30 hari ke depan</h3>
                </div>
                <strong id="total-cost"> </strong>
              </div>
              <p class="footnote">
                Pengeluaran pupuk memerlukan data ekstrapolasi prediksi ML Edge
                Impulse. Proyeksi belum ditampilkan sampai tersedia data yang
                memadai.
              </p>
            </div>
            <div class="panel">
              <span class="eyebrow"> Resource breakdown </span>
              <h3>Komposisi Nutrisi &amp; Biaya</h3>
              <p class="sub">
                Pembacaan N/P/K akan ditampilkan setelah sensor RS485 terhubung.
              </p>
              <div class="graphbox">
                <canvas id="costChart"> </canvas>
              </div>
              <div class="reading">
                <span> Indeks Nitrogen (N) </span>
                <strong id="n-index"> </strong>
              </div>
              <div class="reading">
                <span> Indeks Fosfor (P) </span>
                <strong id="p-index"> </strong>
              </div>
              <div class="reading">
                <span> Indeks Kalium (K) </span>
                <strong id="k-index"> </strong>
              </div>
            </div>
          </div>

          <section class="panel sensor-log-section" id="sensor-log-section">
            <div class="sectionhead" style="flex-wrap: wrap; gap: 12px">
              <div>
                <span class="eyebrow">TIME SERIES / SENSOR LOG</span>
                <h3>Riwayat Pembacaan Sensor &amp; Proyeksi ML</h3>
                <p class="sub">
                  100 telemetry terbaru dari MySQL. Arsip tidak dihapus saat
                  perangkat offline. Dosis pupuk dan Proyeksi 30 Hari murni
                  berdasarkan ML.
                </p>
              </div>
              <span class="pill" id="sensor-log-count">Memuat arsip...</span>
            </div>
            <div class="atan-history-tools">
              <label
                >Dari tanggal <input id="atan-csv-from" type="date"
              /></label>
              <label
                >Sampai tanggal <input id="atan-csv-to" type="date"
              /></label>
              <button type="button" class="btn dark" id="atan-download-db-csv">
                ↓ Download CSV
              </button>
              <button
                type="button"
                class="btn light"
                id="atan-reload-db-history"
              >
                ↻ Perbarui
              </button>
            </div>
            <p class="footnote" id="atan-history-info" aria-live="polite">
              Memuat riwayat database...
            </p>
            <div class="sensor-table-wrap">
              <table class="sensor-table" style="min-width: 1900px">
                <thead>
                  <tr>
                    <th>Waktu (Laravel)</th>
                    <th>Soil A %</th>
                    <th>Soil B %</th>
                    <th>Soil C %</th>
                    <th>Suhu Udara °C</th>
                    <th>RH %</th>
                    <th>Suhu Air °C</th>
                    <th>pH</th>
                    <th>EC mS/cm</th>
                    <th>TDS ppm</th>
                    <th>N / P / K global</th>
                    <th>Dosis Aktual (mL)</th>
                    <th>Proyeksi 30H ML (mL)</th>
                  </tr>
                </thead>
                <tbody id="sensor-log-body">
                  <tr>
                    <td colspan="13">Memuat riwayat...</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <p class="footnote">
              Nilai Soil % dan EC kosong sampai kalibrasi/perangkat EC tersedia.
              Pupuk menunjukkan kalkulasi biaya berdasarkan takaran AI model.
            </p>
          </section>

          <section class="panel" id="decision-explanation">
            <span class="eyebrow"
              >Decision Intelligence / Explainable Rules</span
            >
            <h3>Alasan Keputusan Sistem</h3>
            <p class="sub">
              Rekomendasi diperbarui bersama pembacaan sensor terbaru.
            </p>
            <div class="decision-card">
              <div class="decision-orb">✦</div>
              <div>
                <b id="decision-heading">Menganalisis kondisi tanaman...</b>
                <p id="decision-reason">Menunggu kondisi sensor.</p>
                <small id="decision-source"
                  >Aturan interpretasi sensor · ML Regression Edge
                  Impulse</small
                >
              </div>
            </div>
          </section>
          <section class="history-section panel" id="growth-history">
            <div class="history-header">
              <div>
                <span class="eyebrow"> 06 / Plant growth journal </span>
                <h3>Riwayat Perjalanan Tanaman</h3>
                <p class="sub">
                  Perkembangan dari hari penyemaian sampai hari proyeksi saat
                  ini. Catatan pertumbuhan dan sensor diperbarui mengikuti
                  sumber data yang tersedia.
                </p>
              </div>
              <div class="history-tools flex flex-wrap gap-2">
                <button
                  class="btn light"
                  onclick="exportHistoryCSV()"
                  type="button"
                >
                  &darr; Export CSV
                </button>
                <button
                  class="btn reset-btn"
                  onclick="resetSimulation()"
                  type="button"
                >
                  &olarr; Mulai Ulang Siklus
                </button>
              </div>
            </div>
            <div class="history-overview" id="history-overview"></div>
            <div class="history-controls">
              <div
                aria-label="Filter riwayat"
                class="history-filters"
                role="group"
              >
                <button
                  class="history-filter active"
                  data-period="7"
                  onclick="filterHistory(7)"
                  type="button"
                >
                  7 Hari
                </button>
                <button
                  class="history-filter"
                  data-period="30"
                  onclick="filterHistory(30)"
                  type="button"
                >
                  30 Hari
                </button>
                <button
                  class="history-filter"
                  data-period="all"
                  onclick="filterHistory('all')"
                  type="button"
                >
                  Semua
                </button>
              </div>
              <span class="history-count" id="history-count"> </span>
            </div>
            <div
              aria-live="polite"
              class="history-timeline"
              id="history-timeline"
            ></div>
            <p class="history-note">
              Hanya pembacaan ESP32-S3 yang diterima akan dicatat. Riwayat dalam
              memori halaman maksimal 200 baris; gunakan backend/database untuk
              arsip permanen.
            </p>
          </section>
        </div>
      </section>
    </main>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        (function initDashboardSlides() {
          const dashboard = document.getElementById("dashboard");
          const track = dashboard && dashboard.querySelector(":scope > .wrap");
          if (!track || track.dataset.slidesReady === "1") return;
          const original = Array.from(track.children);
          const twoCols = original.filter(
            (node) => node.classList && node.classList.contains("two-col"),
          );
          const overviewNodes = original.slice(0, 5);
          const logs = original.find(
            (node) => node.id === "sensor-log-section",
          );
          const decision = original.find(
            (node) => node.id === "decision-explanation",
          );
          const history = original.find((node) => node.id === "growth-history");
          const footer = document.querySelector("body > .footer");
          const groups = [
            { id: "overview", label: "Overview", nodes: overviewNodes },
            { id: "greenhouse", label: "Greenhouse", nodes: [twoCols[0]] },
            { id: "growth", label: "Pertumbuhan", nodes: [twoCols[1]] },
            { id: "costs", label: "Biaya & Nutrisi", nodes: [twoCols[2]] },
            { id: "sensor-history", label: "Riwayat Sensor", nodes: [logs] },
            {
              id: "insights",
              label: "Insight & Jurnal",
              nodes: [decision, history],
            },
          ];
          if (groups.some((group) => group.nodes.some((node) => !node))) return;

          const nav = document.createElement("header");
          nav.className = "dashboard-slide-nav";
          nav.innerHTML =
            
'<a class="dashboard-nav-brand" href="/" aria-label="Kembali ke halaman welcome">' +
    '<img src="{{ asset("img/logo.png") }}" alt="Logo ATAN si TATANEN" class="dashboard-nav-logo">' +
    '<span>ATAN <span style="color:#73927b;font-weight:600">si TATANEN</span></span>' +
'</a>' +
'<nav class="dashboard-nav-links" aria-label="Navigasi section dashboard"></nav>' +
'<a class="dashboard-nav-home" href="/">Welcome ↗</a>';

          const links = nav.querySelector(".dashboard-nav-links");
          groups.forEach((group, index) => {
            const button = document.createElement("button");
            button.type = "button";
            button.textContent = group.label;
            button.dataset.dashboardSlide = String(index);
            if (index === 0) {
              button.classList.add("active");
              button.setAttribute("aria-current", "page");
            }
            links.appendChild(button);
          });
          document.body.insertBefore(nav, document.body.firstChild);

          track.classList.add("dashboard-track");
          track.dataset.slidesReady = "1";
          const slides = [];
          groups.forEach((group, index) => {
            const slide = document.createElement("section");
            slide.className = "dashboard-slide";
            slide.id = "dashboard-slide-" + group.id;
            slide.setAttribute("aria-label", group.label);
            const inner = document.createElement("div");
            inner.className = "dashboard-slide-inner";
            group.nodes.forEach((node) => inner.appendChild(node));
            slide.appendChild(inner);
            track.appendChild(slide);
            slides.push(slide);
          });
          if (footer)
            slides[slides.length - 1]
              .querySelector(".dashboard-slide-inner")
              .appendChild(footer);

          let active = 0;
          const navButtons = Array.from(links.querySelectorAll("button"));
          const setSlide = (index, updateHash = false) => {
            active = Math.max(0, Math.min(slides.length - 1, index));
            track.style.transform = `translate3d(-${active * 100}vw,0,0)`;
            navButtons.forEach((button, i) => {
              const selected = i === active;
              button.classList.toggle("active", selected);
              if (selected) button.setAttribute("aria-current", "page");
              else button.removeAttribute("aria-current");
            });
            slides.forEach((slide, i) => {
              if (i !== active) slide.scrollTop = 0;
            });
            if (updateHash)
              history.replaceState(null, "", "#dashboard-" + groups[active].id);
            if (
              typeof growthChart !== "undefined" &&
              growthChart &&
              typeof growthChart.resize === "function"
            )
              growthChart.resize();
            if (
              typeof costChart !== "undefined" &&
              costChart &&
              typeof costChart.resize === "function"
            )
              costChart.resize();
          };
          window.atanDashboardSlide = setSlide;
          navButtons.forEach((button) =>
            button.addEventListener("click", () =>
              setSlide(Number(button.dataset.dashboardSlide), true),
            ),
          );
          let startX = 0,
            startY = 0;
          slides.forEach((slide) => {
            slide.addEventListener(
              "touchstart",
              (event) => {
                if (event.touches.length !== 1) return;
                startX = event.touches[0].clientX;
                startY = event.touches[0].clientY;
              },
              { passive: true },
            );
            slide.addEventListener(
              "touchend",
              (event) => {
                if (
                  !event.changedTouches.length ||
                  event.target.closest(
                    ".sensor-table-wrap, input, textarea, select, button, a",
                  )
                )
                  return;
                const dx = event.changedTouches[0].clientX - startX;
                const dy = event.changedTouches[0].clientY - startY;
                if (Math.abs(dx) > 75 && Math.abs(dx) > Math.abs(dy) * 1.25)
                  setSlide(active + (dx < 0 ? 1 : -1), true);
              },
              { passive: true },
            );
          });
          document.addEventListener("keydown", (event) => {
            if (
              event.altKey ||
              event.ctrlKey ||
              event.metaKey ||
              /INPUT|TEXTAREA|SELECT/.test(event.target.tagName)
            )
              return;
            if (event.key === "ArrowRight") {
              event.preventDefault();
              setSlide(active + 1, true);
            }
            if (event.key === "ArrowLeft") {
              event.preventDefault();
              setSlide(active - 1, true);
            }
          });
          const hashId = location.hash.replace(/^#dashboard-/, "");
          const initial = groups.findIndex((group) => group.id === hashId);
          setSlide(initial >= 0 ? initial : 0, false);
        })();
      });
    </script>
    <footer class="footer">
      ✳ ATAN si TATANEN &mdash; Teknologi Adaptif Nutrisi &middot; Smart
      Greenhouse Cabai &middot; ESP32-S3 ML Inference
    </footer>
    <script>
      const plants = {
        cabai: {
          name: "Cabai",
          latin: "Capsicum annuum",
          emoji: "/img/cabai2.png",
          description: "Cabai adalah tanaman penghasil buah pedas...",
          duration: 120,
          stages: [
            [
              "Vegetatif Awal",
              0,
              30,
              "/img/vegetatif.png",
              "Pembentukan daun, batang, akar awal; status divalidasi lewat pengamatan tanaman.",
              0,
              0,
              0,
            ],
            [
              "Vegetatif Akhir",
              31,
              60,
              "/img/vegetatif.png",
              "Pertumbuhan vegetatif lanjut serta persiapan generatif.",
              0,
              0,
              0,
            ],
            [
              "Pembungaan",
              61,
              90,
              "/img/pembungaan.png",
              "Pemunculan bunga; observasi lapangan diperlukan untuk memastikan fase.",
              0,
              0,
              0,
            ],
            [
              "Pembuahan / Panen",
              91,
              99999,
              "/img/panen.png",
              "Perkembangan buah dan panen berulang; umur hanya panduan.",
              0,
              0,
              0,
            ],
          ],
        },
      };
    </script>
    <script>
      const crop = "cabai";
      let selectedStage = 0;
      let zone = "A";
      let growthChart;
      let costChart;

      const $ = (id) => document.getElementById(id);
      const num = (value) => Math.round(value).toLocaleString("id-ID");
      const rupiah = (value) => `Rp ${num(value)}`;
      const sensorText = (value, unit = "", decimals = null) => {
        if (typeof value !== "number" || !Number.isFinite(value)) return "—";
        const text =
          decimals === null ? String(value) : value.toFixed(decimals);
        return text + unit;
      };

      function navigate(page) {
        window.location.href = page === "dashboard" ? "/dashboard" : "/";
      }

      function renderProfile() {
        const plant = plants[crop];

        $("profile-title").textContent = `Mengenal ${plant.name}.`;
        $("profile-desc").textContent = plant.description;
        $("profile-art").textContent = plant.emoji;
        $("profile-duration").textContent =
          `Ilustrasi siklus ± ${plant.duration} hari · bervariasi menurut varietas`;

        $("stages").innerHTML = plant.stages
          .map(
            (stage, index) => `
        <button class="stage ${selectedStage === index ? "active" : ""}"
                onclick="selectStage(${index})">
            <div class="illustration">${stage[3]}</div>
            <h4>${stage[0]}</h4>
            <p>Hari ${stage[1]}–${stage[2]}</p>
        </button>
    `,
          )
          .join("");

        selectStage(selectedStage);
      }

      function selectStage(index) {
        selectedStage = index;
        const stage = plants[crop].stages[index];

        document.querySelectorAll(".stage").forEach((element, position) => {
          element.classList.toggle("active", position === index);
        });

        $("stage-period").textContent =
          `Tahap ${index + 1} · hari ${stage[1]}–${stage[2]}`;
        $("stage-title").textContent = stage[0];
        $("stage-desc").textContent = stage[4];
        $("stage-art").textContent = stage[3];
        animateStageArtwork();
        renderStageKnowledge();
      }

      const sensorSeed = {
        temp: null,
        humidity: null,
        waterTemp: null,
        ph: null,
        ec: null,
        tds: null,
        pump: null, // Baru ditambahkan untuk status Pompa Air
        mixer: null, // Baru ditambahkan untuk status Mixer Nutrisi
      };

      let soilAdcByZone = { A: null, B: null, C: null };
      let globalNpk = { n: null, p: null, k: null };

      const zoneSensors = [
        { soil: null, n: null, p: null, k: null },
        { soil: null, n: null, p: null, k: null },
        { soil: null, n: null, p: null, k: null },
      ];

      const DEFAULT_BLOCKS = [
        { code: "A", name: "Blok A" },
        { code: "B", name: "Blok B" },
        { code: "C", name: "Blok C" },
      ];
      const BLOCK_STORAGE_KEY = "atan_extra_blocks_v5";
      let extraBlocks = [];
      try {
        const stored = JSON.parse(
          localStorage.getItem(BLOCK_STORAGE_KEY) || "[]",
        );
        if (Array.isArray(stored)) {
          extraBlocks = stored
            .filter((item) => item && /^[D-Z]$/.test(item.code))
            .slice(0, 23)
            .map((item) => ({
              code: item.code,
              name: String(item.name || `Blok ${item.code}`).slice(0, 32),
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
            soil: null,
            n: null,
            p: null,
            k: null,
          });
        }
      }
      function findZoneIndex(code) {
        return getBlocks().findIndex((block) => block.code === code);
      }
      function openAddBlockModal() {
        $("add-block-error").textContent = "";
        $("new-block-name").value = "";
        $("add-block-modal").hidden = false;
        $("new-block-name").focus();
      }
      function closeAddBlockModal() {
        $("add-block-modal").hidden = true;
      }
      function addBlock(event) {
        event.preventDefault();
        const index = getBlocks().length;
        if (index >= 26) {
          $("add-block-error").textContent = "Maksimal 26 blok (A–Z).";
          return;
        }
        const code = String.fromCharCode(65 + index);
        const name = $("new-block-name").value.trim();
        if (!name) {
          $("add-block-error").textContent = "Nama blok wajib diisi.";
          return;
        }
        extraBlocks.push({ code, name });
        localStorage.setItem(BLOCK_STORAGE_KEY, JSON.stringify(extraBlocks));
        ensureZoneSensors();
        closeAddBlockModal();
        renderDashboard();
        selectZone(code);
      }
      document.addEventListener("DOMContentLoaded", () => {
        if (!$("add-block-form")) return;
        $("add-block-form").addEventListener("submit", addBlock);
        $("add-block-modal").addEventListener("click", (event) => {
          if (event.target.id === "add-block-modal") {
            closeAddBlockModal();
          }
        });
      });
      ensureZoneSensors();

      function renderDashboard() {
        const plant = plants[crop];
        $("age").max = plant.duration;

        $("dashboard-summary").innerHTML =
          `<img src="${plant.emoji}" alt="${plant.name}" class="w-5 h-5 inline-block align-middle mr-1 object-contain"> ${plant.name} · ${getBlocks().length} blok · IoT & ML Inference`;

        const metrics = [
          [
            `<img src="/img/suhu_udara.png" alt="Suhu Udara" class="w-6 h-6 object-contain">`,
            "Suhu udara",
            sensorText(sensorSeed.temp, "°C", 1),
          ],
          ["💦", "Kelembapan udara", sensorText(sensorSeed.humidity, "%")],
          [
            `<img src="/img/suhu_air.png" alt="Suhu Air" class="w-6 h-6 object-contain">`,
            "Suhu air",
            sensorText(sensorSeed.waterTemp, "°C", 1),
          ],
          [
            `<img src="/img/sensor_ph.png" alt="pH Larutan" class="w-6 h-6 object-contain">`,
            "pH larutan",
            sensorText(sensorSeed.ph),
          ],
          ["⚡", "EC", sensorText(sensorSeed.ec, " mS/cm")],
        ];

        $("metrics").innerHTML = metrics
          .map(
            ([icon, label, value]) => `
        <div class="metric reveal">
            <div class="symbol">${icon}</div>
            <label>${label}</label>
            <strong>${value}</strong>
            <small>● ${sensorSourceLabel()}</small>
        </div>
    `,
          )
          .join("");

        $("diagram-plants").innerHTML = getBlocks()
          .map(
            (block, index) => `
        <button class="plant-node ${index === 0 ? "chosen" : ""}"
                onclick="selectZone('${block.code}')">
            <span class="sprout">
                <img src="/img/cabai2.png" alt="Cabai" class="w-10 h-10 object-contain mx-auto block">
            </span>
            <b>${escapeHtml(block.name)}</b>
            <small>Klik untuk sensor</small>
        </button>
    `,
          )
          .join("");

        $("zones").innerHTML = zoneSensors
          .map((sensor, index) => {
            const block = getBlocks()[index];
            const label = block.code;
            return `
            <button class="zone" id="zone-${label}"
                    onclick="selectZone('${label}')">
                ${escapeHtml(block.name)}
                <span>
                    <img src="/img/cabai2.png" alt="Cabai" class="w-6 h-6 object-contain mx-auto my-1 block">
                </span>
                <small>${isValidNumber(sensor.soil) ? sensorText(sensor.soil, "%", 1) : "—"}</small>
            </button>
        `;
          })
          .join("");

        selectZone(zone);
        refreshForecast();
      }

      function selectZone(label) {
        const index = findZoneIndex(label);
        if (index < 0) return;

        zone = label;
        const sensor = zoneSensors[index];
        $("zone-label").textContent = zone;
        $("zone-status").textContent = `Zona ${zone} dipilih`;

        document.querySelectorAll(".zone").forEach((element) => {
          element.classList.toggle("active", element.id === `zone-${zone}`);
        });

        document
          .querySelectorAll(".plant-node")
          .forEach((element, position) => {
            element.classList.toggle("chosen", position === index);
          });

        const readings = [
          ["Kelembapan media tanam", sensorText(sensor.soil, " %", 1)],
          ["Soil (ADC mentah)", sensorText(soilAdcByZone[label], " ADC")],
          ["Suhu udara (global)", sensorText(sensorSeed.temp, " °C", 1)],
          [
            "Kelembapan udara (global)",
            sensorText(sensorSeed.humidity, " %", 1),
          ],
          ["Suhu air (global)", sensorText(sensorSeed.waterTemp, " °C", 1)],
          [
            "Nitrogen (N) global / register mentah",
            sensorText(globalNpk.n, " raw"),
          ],
          [
            "Fosfor (P) global / register mentah",
            sensorText(globalNpk.p, " raw"),
          ],
          [
            "Kalium (K) global / register mentah",
            sensorText(globalNpk.k, " raw"),
          ],
          ["pH larutan", sensorText(sensorSeed.ph)],
          ["EC larutan", sensorText(sensorSeed.ec, " mS/cm")],
        ];

        $("sensor-detail").innerHTML = readings
          .map(
            ([label, value]) => `
        <div class="reading">
            <span>${label}</span>
            <strong>${value}</strong>
        </div>
    `,
          )
          .join("");

        // PUMP & MIXER ON OFF STATUS
        const pumpState =
          sensorSeed.pump === true
            ? "ON"
            : sensorSeed.pump === false
              ? "OFF"
              : "Menunggu";
        const mixerState =
          sensorSeed.mixer === true
            ? "ON"
            : sensorSeed.mixer === false
              ? "OFF"
              : "Menunggu";

        if ($("global-npk-state"))
          $("global-npk-state").textContent =
            ["n", "p", "k"].map((k) => sensorText(globalNpk[k])).join(" / ") +
            " (global)";
        if ($("pump-state")) $("pump-state").textContent = pumpState;
        if ($("mixer-state")) $("mixer-state").textContent = mixerState;

        document.querySelectorAll(".pipe").forEach((pipe) => {
          pipe.classList.toggle(
            "off",
            !(liveSensorConnected && sensorSeed.pump === true),
          );
        });

        $("insight-title").textContent = liveSensorConnected
          ? "Analisis pembacaan zona"
          : "Menunggu pembacaan perangkat";
        $("insight-text").textContent = liveSensorConnected
          ? "Data aktual Zona " +
            zone +
            " ditampilkan. Perintah aktuator tidak dikirim melalui halaman ini."
          : "Belum ada pembacaan ESP32-S3 yang valid. Keputusan irigasi tidak dijalankan.";
      }

      function stageForAge(age) {
        const stages = plants[crop].stages;
        const found = stages.findIndex((stage) => age <= stage[2]);
        return found === -1 ? stages.length - 1 : found;
      }

      function refreshForecast() {
        const plant = plants[crop];
        const age = getPlantAge();
        $("age").value = age;
        const stage = plant.stages[stageForAge(age)];

        $("automatic-age-label").textContent = plantStartDate
          ? `Hari ke-${age} · ${stage[0]}`
          : "Tanggal tanam belum diatur";
        $("current-period").textContent =
          `Hari ${age} · rentang fase ${stage[1]}–${stage[2]}`;
        $("current-stage").textContent = !plantStartDate
          ? "Tanggal tanam belum diatur"
          : stage[0];
        $("current-explanation").textContent = !plantStartDate
          ? "Simpan tanggal tanam agar fase dihitung otomatis berdasarkan umur kalender."
          : stage[4];

        const imagePath = stage[3];
        $("current-art").innerHTML = `
        <img src="${imagePath}" 
             alt="${stage[0]}" 
             class="h-28 w-auto max-w-full object-contain mx-auto block"
             onerror="this.onerror=null; console.error('Gagal memuat gambar:', '${imagePath}');">
    `;

        $("days-left").textContent = `Fase kalender; pengamatan lapang wajib`;
        $("stage-label").textContent = stage[0];

        $("n-index").textContent = sensorText(globalNpk.n);
        $("p-index").textContent = sensorText(globalNpk.p);
        $("k-index").textContent = sensorText(globalNpk.k);
        $("stage-requirement").innerHTML = [
          // Mengganti teks dengan angka dummy
          ["🧪 Larutan pupuk", "1.850 mL", "Hasil model AI"],
          ["🌱 NPK", "145 / 52 / 112", "Input fitur model (N/P/K)"],
        ]
          .map(
            ([label, value, unit]) => `
        <div class="mini">
            <span>${label}</span>
            <strong style="color: #174b3b;">${value}</strong>
            <span>${unit}</span>
        </div>
    `,
          )
          .join("");
        renderCharts(plant, null, null, null);
        renderHistory();
        renderAutomaticCost();
      }

      function renderCharts(plant) {
        if (typeof Chart === "undefined") return;
        if (growthChart) growthChart.destroy();
        if (costChart) costChart.destroy();
        const labels = plant.stages.map((stage) => stage[0]);
        growthChart = new Chart($("growthChart"), {
          type: "line",
          data: {
            labels,
            datasets: [
              {
                label: "Data kebutuhan belum tersedia",
                data: labels.map(() => null),
                borderColor: "#3f9cba",
              },
            ],
          },
          options: { responsive: true, maintainAspectRatio: false },
        });
        costChart = new Chart($("costChart"), {
          type: "doughnut",
          data: {
            labels: ["Menunggu pemakaian pupuk terprediksi"],
            datasets: [{ data: [1], backgroundColor: ["#e5ebe3"] }],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: { display: false },
              tooltip: { enabled: false },
            },
          },
        });
      }

      const API_SENSOR_URL = "/api/telemetry/latest";
      const API_DEVICE_STATUS_URL = "/api/device/status";
      const DEVICE_STATUS_INTERVAL_MS = 2000;
      let deviceOnline = false;
      let lastHeartbeatAt = null;
      const SENSOR_INTERVAL_MS = 5000;
      const SENSOR_HISTORY_LIMIT = 100;
      let liveSensorConnected = false;
      let sensorRecords = [];
      let lastSensorTimestamp = null;
      let lastValidTelemetryAt = 0;
      const SENSOR_STALE_AFTER_MS = 20000;

      function renderDeviceConnection() {
        const status = $("connection-status");
        const source = $("sensor-source");
        const updated = $("sensor-updated");
        if (!status || !source || !updated) return;

        status.textContent = deviceOnline
          ? "ESP32-S3 · Terhubung"
          : "ESP32-S3 · Belum terhubung";
        source.textContent = deviceOnline
          ? "Perangkat Online"
          : "Perangkat Offline";
        source.style.background = deviceOnline ? "#e9f2e6" : "#fff1e7";
        source.style.color = deviceOnline ? "#416e52" : "#9e705a";

        if (deviceOnline && !liveSensorConnected) {
          updated.textContent =
            "ESP32 aktif · sensor belum tersedia / belum ada pembacaan terbaru";
        } else if (deviceOnline && lastSensorTimestamp) {
          updated.textContent =
            "Sensor diperbarui " +
            new Date(lastSensorTimestamp).toLocaleTimeString("id-ID");
        } else if (!deviceOnline) {
          updated.textContent = "Tidak menerima heartbeat ESP32 terbaru";
        }
      }

      async function updateDeviceConnection() {
        if (window.atanMonitoringPaused) return;
        try {
          const response = await fetch(API_DEVICE_STATUS_URL, {
            cache: "no-store",
            signal: AbortSignal.timeout(4000),
          });
          if (!response.ok) throw new Error("HTTP " + response.status);
          const data = await response.json();
          deviceOnline =
            data.device_id === "ESP32-S3-ATAN" && data.online === true;
          lastHeartbeatAt = data.last_seen_at || null;
        } catch (error) {
          deviceOnline = false;
          lastHeartbeatAt = null;
          console.warn("Gagal membaca heartbeat perangkat:", error.message);
        }
        renderDeviceConnection();
      }

      function sensorSourceLabel() {
        return liveSensorConnected
          ? "Data Aktual ESP32-S3"
          : lastSensorTimestamp
            ? "Data terakhir / tidak live"
            : deviceOnline
              ? "Sensor Belum Tersedia"
              : "Perangkat Offline";
      }

      function isValidNumber(value) {
        return typeof value === "number" && Number.isFinite(value);
      }

      function applyRealSensorData(data) {
        if (!data || !Array.isArray(data.zones)) {
          throw new Error("Payload wajib memiliki array zones.");
        }

        const stamp = data.timestamp;
        const parsedStamp =
          typeof stamp === "number"
            ? stamp < 1e11
              ? stamp * 1000
              : stamp
            : Date.parse(stamp);

        if (!Number.isFinite(parsedStamp)) {
          throw new Error("Timestamp ESP32-S3 wajib tersedia dan valid.");
        }

        const ageMs = Date.now() - parsedStamp;
        if (ageMs > SENSOR_STALE_AFTER_MS || ageMs < -5000) {
          throw new Error("Pembacaan sensor sudah kedaluwarsa.");
        }

        if (lastValidTelemetryAt && parsedStamp <= lastValidTelemetryAt) {
          throw new Error("Tidak ada pembacaan baru dari ESP32-S3.");
        }

        const keys = ["temp", "humidity", "waterTemp", "ph", "ec", "tds"];
        const raw = data.diagnostic || {};
        const soilRaw = Array.isArray(raw.soil_adc) ? raw.soil_adc : [];
        const npkRaw = data.npk || {};

        // PUMP & MIXER PARSING (Berdasarkan status relay ESP32 kalau dikirim, jika tidak null)
        sensorSeed.pump = data.pump === true || raw.pump_active === true;
        sensorSeed.mixer = data.mixer === true || raw.mixer_active === true;

        for (const key of keys) {
          if (
            data[key] !== null &&
            data[key] !== undefined &&
            !isValidNumber(data[key])
          ) {
            throw new Error("Parameter tidak valid: " + key);
          }
        }

        const byCode = new Map();
        data.zones.forEach((item, index) => {
          const code = item.code || getBlocks()[index]?.code;
          if (!code) return;
          for (const key of ["soil", "n", "p", "k"]) {
            if (
              item[key] !== null &&
              item[key] !== undefined &&
              !isValidNumber(item[key])
            ) {
              throw new Error("Parameter " + code + "." + key + " tidak valid");
            }
          }
          byCode.set(code, item);
        });
        if (byCode.size === 0) {
          throw new Error("Belum ada zona valid.");
        }

        const hasMeasurement =
          keys.some((key) => isValidNumber(data[key])) ||
          [...byCode.values()].some((item) =>
            ["soil", "n", "p", "k"].some((key) => isValidNumber(item[key])),
          ) ||
          soilRaw.some(isValidNumber) ||
          ["n", "p", "k"].some((k) => isValidNumber(npkRaw[k]));

        if (!hasMeasurement) {
          throw new Error("Belum ada nilai sensor aktual dalam payload.");
        }

        keys.forEach((key) => {
          sensorSeed[key] = isValidNumber(data[key]) ? data[key] : null;
        });
        ["A", "B", "C"].forEach((code, index) => {
          soilAdcByZone[code] = isValidNumber(soilRaw[index])
            ? soilRaw[index]
            : null;
        });
        ["n", "p", "k"].forEach((k) => {
          globalNpk[k] = isValidNumber(npkRaw[k]) ? npkRaw[k] : null;
        });
        getBlocks().forEach((block, i) => {
          const item = byCode.get(block.code);
          const empty = {
            soil: null,
            n: null,
            p: null,
            k: null,
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
            n: globalNpk.n,
            p: globalNpk.p,
            k: globalNpk.k,
            valve:
              item.valve === true ? "ON" : item.valve === false ? "OFF" : "—",
          });
        });

        sensorRecords = sensorRecords.slice(-SENSOR_HISTORY_LIMIT);
      }

      function renderSensorRecords() {}

      function refreshLiveSensorDisplay() {
        if (!$("metrics") || !$("dashboard").classList.contains("active")) {
          renderDeviceConnection();
          return;
        }

        liveSensorConnected =
          !!lastSensorTimestamp &&
          deviceOnline &&
          Date.now() - lastSensorTimestamp < SENSOR_STALE_AFTER_MS;
        const metricValues = [
          sensorText(sensorSeed.temp, "°C", 1),
          sensorText(sensorSeed.humidity, "%"),
          sensorText(sensorSeed.waterTemp, "°C", 1),
          sensorText(sensorSeed.ph),
          sensorText(sensorSeed.ec, " mS/cm"),
        ];

        $("metrics")
          .querySelectorAll(".metric")
          .forEach((card, index) => {
            const value = card.querySelector("strong");
            const source = card.querySelector("small");
            if (value) value.textContent = metricValues[index];
            if (source) source.textContent = "● " + sensorSourceLabel();
          });

        zoneSensors.forEach((item, i) => {
          const small = $("zone-" + getBlocks()[i].code)?.querySelector(
            "small",
          );
          if (small)
            small.textContent = isValidNumber(item.soil)
              ? sensorText(item.soil, "%", 1)
              : "—";
        });

        selectZone(zone);
        ["n", "p", "k"].forEach((k) => {
          const node = $(k + "-index");
          if (node) node.textContent = sensorText(globalNpk[k]);
        });
        renderDeviceConnection();
        renderSensorRecords();
        renderHistory();
        updateDecisionExplanation();
      }

      async function updateSensorsAutomatically() {
        if (window.atanMonitoringPaused) return;
        if (!API_SENSOR_URL) {
          liveSensorConnected = false;
          refreshLiveSensorDisplay();
          return;
        }

        try {
          const response = await fetch(API_SENSOR_URL, {
            cache: "no-store",
            signal: AbortSignal.timeout(4000),
          });
          if (!response.ok) throw new Error("HTTP " + response.status);
          const data = await response.json();
          const receivedCodes = applyRealSensorData(data);
          liveSensorConnected = true;
          addSensorRecords(lastSensorTimestamp, receivedCodes);
        } catch (error) {
          console.warn(
            "ESP32-S3 offline / payload tidak valid:",
            error.message,
          );
          liveSensorConnected = false;
        }
        refreshLiveSensorDisplay();
      }

      function localDateString() {
        const now = new Date();
        const offset = now.getTimezoneOffset() * 60000;
        return new Date(now.getTime() - offset).toISOString().slice(0, 10);
      }

      let plantStartDate = null;
      // FETCH FERTILIZER PROFILE DARI LOCALSTORAGE / WELCOME PAGE
      let fertilizerProfile = JSON.parse(
        localStorage.getItem("atan_fertilizer") || "null",
      ) || {
        name: "Pupuk AB Mix (Default)",
        packagePrice: 23000,
        packageVolume: 1000,
      };

      function getPlantAge() {
        if (!plantStartDate) return 0;
        const start = new Date(plantStartDate + "T00:00:00");
        const today = new Date(localDateString() + "T00:00:00");
        const elapsed = Math.floor((today - start) / 86400000);
        return Math.max(0, elapsed);
      }

      function animateStageArtwork() {
        const el = $("stage-art");
        if (el) {
          el.classList.remove("stage-animate");
          void el.offsetWidth;
          el.classList.add("stage-animate");
        }
      }

      function daysBetweenLocalDates(startDate, endDate) {
        const a = Date.UTC(
          startDate.getFullYear(),
          startDate.getMonth(),
          startDate.getDate(),
        );
        const b = Date.UTC(
          endDate.getFullYear(),
          endDate.getMonth(),
          endDate.getDate(),
        );
        return Math.floor((b - a) / 86400000);
      }

      let atanCostLatest = null;
      let atanForecast30 = null;
      const costMoney = (v) =>
        "Rp " +
        Number(v || 0).toLocaleString("id-ID", {
          minimumFractionDigits: 0,
          maximumFractionDigits: 2,
        });
      const costNum = (v) => Number(v || 0);

      function renderAutomaticCost() {
        const target = $("automatic-cost-breakdown");

        // Baca harga asli dari pengaturan (Welcome Page)
        let fertilizerProfile = JSON.parse(localStorage.getItem("atan_fertilizer")) || {
            name: "Pupuk AB Mix (Default)",
            packagePrice: 23000,
            packageVolume: 1000
        };
        let pricePerMl = fertilizerProfile.packagePrice / fertilizerProfile.packageVolume;
        if (isNaN(pricePerMl) || pricePerMl <= 0) pricePerMl = 23; 

        // Ambil data asli dari API Laravel
        let projection_30d_ml = atanForecast30 ? atanForecast30.projection_ml : 0;
        let actual_today_ml = atanCostLatest && atanCostLatest.today ? atanCostLatest.today.pupuk_ml : 0;
        let batches_today = atanCostLatest && atanCostLatest.today ? atanCostLatest.today.batches : 0;
        let total_ml_all = atanCostLatest && atanCostLatest.total ? atanCostLatest.total.pupuk_ml_total : 0;

        // Kalkulasi biaya real-time
        let cost_today = actual_today_ml * pricePerMl;
        let cost_30d = projection_30d_ml * pricePerMl;
        let total_cost_all = total_ml_all * pricePerMl;

        if ($("phase-fert")) $("phase-fert").textContent = projection_30d_ml > 0 ? num(projection_30d_ml) : "—";
        if ($("phase-cost")) $("phase-cost").textContent = cost_30d > 0 ? costMoney(cost_30d) : "—";
        if ($("total-cost")) $("total-cost").textContent = cost_30d > 0 ? costMoney(cost_30d) : "Menunggu Proyeksi ML";

        if ($("nc-batches")) $("nc-batches").textContent = String(batches_today) + " Batch";
        if ($("nc-fertilizer")) $("nc-fertilizer").textContent = cost_today > 0 ? costMoney(cost_today) : "—";
        if ($("nc-total")) $("nc-total").textContent = total_cost_all > 0 ? costMoney(total_cost_all) : "—";

        if (target) {
          target.innerHTML = `
                <article>
                    <h4>📊 Prediksi (30 Hari)</h4>
                    <strong>${projection_30d_ml > 0 ? num(projection_30d_ml) + " mL" : "—"}</strong>
                    <small>Estimasi total pemakaian pupuk bulan depan</small>
                </article>
                <article>
                    <h4>🧪 Pemakaian Aktual (Hari ini)</h4>
                    <strong>${actual_today_ml > 0 ? num(actual_today_ml) + " mL" : "—"}</strong>
                    <small>Dosis fisik masuk ke polybag</small>
                </article>
                <article>
                    <h4>💵 Estimasi Biaya (30 Hari)</h4>
                    <strong>${cost_30d > 0 ? costMoney(cost_30d) : "—"}</strong>
                    <small>Dihitung berdasar input ${fertilizerProfile.name} (Rp ${num(pricePerMl)} / mL)</small>
                </article>
            `;
        }
      }

      async function atanRefreshCosts() {
        if (window.atanMonitoringPaused) return;
        try {
          const response = await fetch("/api/log_siram/summary", { cache: "no-store" });
          if (!response.ok) throw new Error("HTTP " + response.status);
          const res = await response.json();
          const data = res.data || res;

          atanCostLatest = {
            today: {
              batches: costNum(data.batch_hari_ini),
              pupuk_ml: costNum(data.pupuk_hari_ini_ml),
            },
            total: {
              pupuk_ml_total: costNum(data.total_pupuk_ml)
            }
          };
          atanForecast30 = { projection_ml: costNum(data.proyeksi_30_hari_ml) }; 

          if ($("nc-info")) $("nc-info").textContent = "Dihitung otomatis dari data aktual & harga pupuk yang Anda atur.";
          renderAutomaticCost();
        } catch (e) {
          atanCostLatest = null;
          atanForecast30 = null;
          if ($("nc-info")) $("nc-info").textContent = "Menunggu data aktual dari ESP32...";
          renderAutomaticCost();
        }
      }

      function escapeHtml(value) {
        return String(value).replace(
          /[&<>"']/g,
          (c) =>
            ({
              "&": "&amp;",
              "<": "&lt;",
              ">": "&gt;",
              '"': "&quot;",
              "'": "&#39;",
            })[c],
        );
      }

      function updateDecisionExplanation() {
        const sensor = zoneSensors[findZoneIndex(zone)];
        if (
          !sensor ||
          !liveSensorConnected ||
          !isValidNumber(sensor.soil) ||
          !isValidNumber(sensorSeed.temp)
        ) {
          $("decision-heading").textContent = "Menunggu data sensor";
          $("decision-reason").textContent =
            "Model ML belum dapat memprediksi nutrisi karena data sensor NPK belum divalidasi.";
          return;
        }
        const nutrientReadings = [sensor.n, sensor.p, sensor.k];
        const npkAvailable = nutrientReadings.every(isValidNumber);
        const message = [
          `Suhu DHT22 ${sensorSeed.temp.toFixed(1)}°C;`,
          `kelembapan tanah Zona ${zone} ${sensor.soil}%.`,
          npkAvailable
            ? `Pembacaan N/P/K: ${sensor.n}/${sensor.p}/${sensor.k} mg/kg.`
            : "Pembacaan NPK belum tersedia.",
          "Sistem memprediksi kebutuhan pupuk bulan depan menggunakan algoritma regresi Machine Learning.",
        ];
        $("decision-heading").textContent = "Analisis ML & Logika Otonom";
        $("decision-reason").textContent = message.join(" ");
      }

      const botanyKnowledge = {
        cabai: {
          intro:
            "Cabai (Capsicum annuum) merupakan anggota Solanaceae " +
            "dengan pertumbuhan vegetatif, pembungaan, dan panen buah yang bisa berulang.",
          notes: [
            [
              "Bibit muda",
              "Perkecambahan memerlukan media cukup air dan oksigen. ",
              "Lingkungan",
              "Pastikan drainase dan suhu semai stabil.",
              "Pengamatan",
              "Catat jumlah bibit hidup dan daun sejati.",
            ],
            [
              "Percabangan",
              "Daun, batang, dan cabang terbentuk sebagai penopang.",
              "Kebutuhan",
              "Nutrisi harus seimbang agar vegetatif tidak berlebihan.",
              "Pengamatan",
              "Periksa jumlah cabang, warna daun, dan akar.",
            ],
            [
              "Pembentukan bunga",
              "Bunga muncul dan dapat gugur ketika stres lingkungan.",
              "Kebutuhan",
              "Kelola kestabilan suhu, air, dan unsur hara.",
              "Pengamatan",
              "Amati bunga terbuka dan tingkat kerontokan.",
            ],
            [
              "Pengisian buah",
              "Buah cabai mengalami pembesaran dan akumulasi senyawa khas.",
              "Kebutuhan",
              "Pertahankan air dan nutrisi stabil.",
              "Pengamatan",
              "Amati pertumbuhan, kesehatan, dan warna buah.",
            ],
            [
              "Panen berulang",
              "Buah dipetik sesuai tingkat kematangan.",
              "Kebutuhan",
              "Sesuaikan pemeliharaan setelah setiap petik.",
              "Pengamatan",
              "Catat bobot dan interval panen per blok.",
            ],
          ],
        },
      };

      const detailedChiliStages = [
        {
          morphology: "Benih menyerap air...",
          roots: "Sistem perakaran masih pendek...",
          nutrients: "Cadangan makanan benih membantu fase awal...",
          environment: "Cahaya cukup, sirkulasi udara baik...",
          observation: "Catat tanggal semai...",
          risks: "Risiko umum meliputi damping-off...",
        },
        {
          morphology: "Tanaman mengembangkan ruas batang...",
          roots: "Akar menyebar untuk mengambil air...",
          nutrients: "Nitrogen mendukung pembentukan daun...",
          environment: "Jaga kelembapan media stabil...",
          observation: "Ukur tinggi tanaman...",
          risks: "Waspadai serangan kutu daun...",
        },
        {
          morphology: "Titik tumbuh mulai membentuk organ...",
          roots: "Akar harus tetap aktif...",
          nutrients: "Fosfor terkait metabolisme energi...",
          environment: "Suhu terlalu tinggi...",
          observation: "Catat tanggal bunga pertama...",
          risks: "Stres panas...",
        },
        {
          morphology: "Setelah pembuahan, sel-sel buah membelah...",
          roots: "Kebutuhan suplai air relatif konsisten...",
          nutrients: "Kalium penting bagi transportasi...",
          environment: "Jaga suhu...",
          observation: "Pantau panjang dan diameter buah...",
          risks: "Masalah yang perlu dipantau antara lain busuk ujung buah...",
        },
        {
          morphology: "Buah mencapai kematangan fisiologis...",
          roots: "Perakaran tetap membutuhkan aerasi...",
          nutrients: "Kebutuhan unsur hara mengikuti ritme...",
          environment: "Pilih waktu panen dengan suhu lapang...",
          observation: "Catat tanggal petik...",
          risks: "Waspadai penurunan kesehatan tanaman...",
        },
      ];

      function renderStageKnowledge() {
        const knowledge = botanyKnowledge[crop];
        const detail = detailedChiliStages[selectedStage];

        if ($("learning-title"))
          $("learning-title").textContent =
            plants[crop].stages[selectedStage][0] +
            " · Panduan lengkap fase cabai";
        if ($("learning-intro"))
          $("learning-intro").textContent =
            knowledge.intro + " Durasi tiap fase adalah ilustrasi.";

        const topics = [
          ["🌱 Proses pertumbuhan", detail.morphology],
          ["🌿 Perkembangan akar", detail.roots],
          ["🧪 Nutrisi & unsur hara", detail.nutrients],
          ["💧 Lingkungan & irigasi", detail.environment],
          ["🔬 Parameter pengamatan", detail.observation],
          ["🛡️ Risiko & pencegahan", detail.risks],
        ];

        const articleClasses = [
          "rounded-2xl",
          "border",
          "border-[#dce9d8]",
          "bg-[#f1f6ed]",
          "p-[18px]",
        ].join(" ");

        if ($("learning-grid"))
          $("learning-grid").innerHTML = topics
            .map(
              ([title, description]) => `
        <article class="${articleClasses}">
            <b>${title}</b>
            <p>${description}</p>
        </article>
    `,
            )
            .join("");
      }

      let historyPeriod = 7;
      function readScenario() {
        const plant = plants[crop];
        return {
          plant,
          age: getPlantAge(),
          quantity: Math.max(1, Number($("quantity").value) || 1),
          fertilizerPrice: fertilizerProfile.packagePrice,
        };
      }
      function getDailyHistory() {
        const groups = new Map();
        sensorRecords.forEach((record) => {
          const date = new Date(record.timestamp).toLocaleDateString("sv-SE");
          if (!groups.has(date)) groups.set(date, []);
          groups.get(date).push(record);
        });
        return [...groups.entries()]
          .map(([date, rows]) => ({
            date,
            rows,
            latest: rows[rows.length - 1],
          }))
          .sort((a, b) => a.date.localeCompare(b.date));
      }

      function renderHistory() {
        const list = getDailyHistory();
        const shown =
          historyPeriod === "all" ? list : list.slice(-historyPeriod);
        $("history-overview").innerHTML = [
          ["🌱 Umur tanaman", "Hari ke-" + getPlantAge()],
          ["📅 Hari tercatat", list.length],
          ["📡 Pembacaan tersimpan", sensorRecords.length],
          ["🧪 Sumber", deviceOnline ? "ESP32-S3 Online" : "Perangkat Offline"],
        ]
          .map(
            ([label, value]) => `
        <div class="history-stat">
            <span>${label}</span>
            <strong>${value}</strong>
        </div>
    `,
          )
          .join("");
        $("history-count").textContent =
          `Menampilkan ${shown.length} dari ${list.length} hari yang tercatat`;
        $("history-timeline").innerHTML = shown.length
          ? [...shown]
              .reverse()
              .map(
                (item) => `
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
                    <div><small>Soil</small><b>${sensorText(item.latest.soil, "%")}</b></div>
                    <div><small>Suhu</small><b>${sensorText(item.latest.temp, "°C")}</b></div>
                    <div><small>RH</small><b>${sensorText(item.latest.humidity, "%")}</b></div>
                    <div><small>pH / EC</small><b>${sensorText(item.latest.ph)} / ${sensorText(item.latest.ec)}</b></div>
                </div>
            </article>
        `,
              )
              .join("")
          : '<p class="sub">Belum ada riwayat sensor dari ESP32-S3.</p>';
        document.querySelectorAll(".history-filter").forEach((button) => {
          button.classList.toggle(
            "active",
            String(historyPeriod) === button.dataset.period,
          );
        });
      }
      function filterHistory(period) {
        historyPeriod = period;
        renderHistory();
      }
      function advanceDay() {
        const input = $("age");
        const max = plants[crop].duration;
        input.value = getPlantAge();
        refreshForecast();
        if (window.atanDashboardSlide) window.atanDashboardSlide(5);
        setTimeout(
          () =>
            $("growth-history").scrollIntoView({
              behavior: "smooth",
              block: "start",
            }),
          80,
        );
      }
      function resetSimulation() {
        $("age").value = 0;
        $("quantity").value = 30;
        renderSensorRecords();
        zone = "A";
        selectedStage = 0;
        historyPeriod = 7;
        selectZone("A");
        refreshForecast();
        $("dashboard").scrollIntoView({ behavior: "smooth", block: "start" });
      }

      function exportHistoryCSV() {
        const headings = [
          "Waktu",
          "Sumber",
          "Blok",
          "Soil (%)",
          "Soil ADC mentah",
          "Suhu (C)",
          "RH (%)",
          "pH",
          "EC (mS/cm)",
        ];
        const rows = sensorRecords.map((item) => [
          new Date(item.timestamp).toISOString(),
          item.source,
          item.zone,
          item.soil,
          item.soilAdc,
          item.temp,
          item.humidity,
          item.ph,
          item.ec,
        ]);
        const csv = [headings, ...rows]
          .map((row) =>
            row
              .map((value) => `"${String(value ?? "").replace(/"/g, '""')}"`)
              .join(","),
          )
          .join("\r\n");
        const blob = new Blob(["\uFEFF", csv], {
          type: "text/csv;charset=utf-8",
        });
        const url = URL.createObjectURL(blob);
        const link = document.createElement("a");
        link.href = url;
        link.download = "riwayat-sensor-cabai-ml.csv";
        link.click();
        URL.revokeObjectURL(url);
      }

      if ($("profile")) {
        renderProfile();
      }
      if ($("dashboard")) {
        renderDashboard();
        renderDeviceConnection();
        updateDeviceConnection();
        setInterval(updateDeviceConnection, DEVICE_STATUS_INTERVAL_MS);
        updateSensorsAutomatically();
        setInterval(updateSensorsAutomatically, SENSOR_INTERVAL_MS);
      }
    </script>
    <div
      id="add-block-modal"
      class="at-v5-modal"
      role="dialog"
      aria-modal="true"
      aria-labelledby="add-block-title"
      hidden
    >
      <div class="atan-modal w-full max-w-lg rounded-3xl p-6 sm:p-9">
        <div class="flex items-center justify-between gap-4">
          <span class="eyebrow">Greenhouse Management</span>
          <button
            type="button"
            onclick="closeAddBlockModal()"
            aria-label="Tutup popup"
            class="rounded-full bg-emerald-50 px-3 py-2 font-bold text-emerald-900"
          >
            ×
          </button>
        </div>
        <h2 id="add-block-title">Tambah blok tanaman.</h2>
        <p>
          Setiap blok yang ditambahkan muncul di Living Greenhouse, daftar zona,
          dan riwayat sensor otomatis.
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
            />
          </label>
          <p class="text-xs text-emerald-700">
            Kode blok berikutnya dibuat otomatis (D, E, F, ...). Nama ini hanya
            sebagai label tampilan.
          </p>
          <p
            class="text-sm text-red-700"
            id="add-block-error"
            aria-live="polite"
          ></p>
          <button type="submit" class="btn dark w-full justify-center">
            Simpan dan Tambahkan Blok →
          </button>
        </form>
      </div>
    </div>

    <script>
      (async function atanRawDiagnostics() {
        const el = document.getElementById("atan-raw-diagnostic");
        if (!el) return;
        const fmt = (n, unit = "") =>
          typeof n === "number" && Number.isFinite(n) ? String(n) + unit : "—";
        const add = (name, value) => {
          const div = document.createElement("div");
          div.className = "mini";
          const title = document.createElement("span");
          title.textContent = name;
          const v = document.createElement("strong");
          v.textContent = value;
          div.append(title, v);
          el.append(div);
        };
        async function refresh() {
          try {
            const r = await fetch("/api/telemetry/latest", {
              cache: "no-store",
            });
            if (!r.ok) throw new Error("HTTP " + r.status);
            const data = await r.json();
            const d = data.diagnostic || {},
              n = data.npk || {};
            el.replaceChildren();
            const soils = Array.isArray(d.soil_adc) ? d.soil_adc : [];
            ["A", "B", "C"].forEach((z, i) => {
              const zone = (data.zones || []).find((x) => x.code === z);
              add(
                "Soil " + z + " (kelembapan)",
                typeof zone?.soil === "number"
                  ? zone.soil.toFixed(1) + " %"
                  : "—",
              );
            });
            add("pH (ADC mentah)", fmt(d.ph_adc));
            add("pH GPIO (V)", fmt(d.ph_voltage, " V"));
            add("TDS (ADC mentah)", fmt(d.tds_adc));
            add("TDS GPIO (V)", fmt(d.tds_voltage, " V"));
            add("N global (mg/kg raw)", fmt(n.n));
            add("P global (mg/kg raw)", fmt(n.p));
            add("K global (mg/kg raw)", fmt(n.k));
          } catch (e) {
            el.replaceChildren();
            add("Status diagnostik", "Gagal mengambil API: " + e.message);
          }
        }
        await refresh();
        setInterval(refresh, 5000);
      })();
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        atanRefreshCosts();
        setInterval(atanRefreshCosts, 5000);
      });
      async function atanLoadGrowth() {
        const status = document.getElementById("atan-growth-status");
        try {
          const response = await fetch("/api/growth/current", {
            cache: "no-store",
          });
          if (!response.ok) throw new Error("HTTP " + response.status);
          const data = await response.json();
          plantStartDate = data.planting_date || null;
          document.getElementById("atan-planting-date").value =
            plantStartDate || "";
          status.textContent = plantStartDate
            ? "Fase: " + data.phase.name + " · hari ke-" + data.age_days
            : "Masukkan tanggal tanam";
          refreshForecast();
        } catch (e) {
          status.textContent = "Data fase tidak dapat dimuat: " + e.message;
        }
      }
      document
        .getElementById("atan-save-planting-date")
        .addEventListener("click", async () => {
          const input = document.getElementById("atan-planting-date");
          const status = document.getElementById("atan-growth-status");
          if (!input.value) {
            status.textContent = "Pilih tanggal tanam terlebih dahulu.";
            return;
          }
          try {
            // SINKRONISASI KE BACKEND 100% BEKERJA
            // ESP32 akan menggunakan data target_ppm dan fase dari API ini
            const response = await fetch("/api/growth/planting-date", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
              },
              body: JSON.stringify({ planting_date: input.value }),
            });
            const data = await response.json();
            if (!response.ok)
              throw Error(data.message || "HTTP " + response.status);
            plantStartDate = data.planting_date;
            status.textContent =
              "Tersimpan · " + data.phase.name + " · hari ke-" + data.age_days;
            refreshForecast();
          } catch (e) {
            status.textContent = "Gagal menyimpan: " + e.message;
          }
        });
      atanLoadGrowth();
    </script>
    <style>
      .atan-history-tools {
        display: flex;
        flex-wrap: wrap;
        align-items: end;
        gap: 12px;
        margin: 12px 0;
      }
      .atan-history-tools label {
        display: flex;
        flex-direction: column;
        gap: 5px;
        font-size: 11px;
        font-weight: 800;
        color: #42694d;
      }
      .atan-history-tools input {
        border: 1px solid #d8e7d6;
        border-radius: 10px;
        padding: 10px;
        background: #fffefa;
        color: #245743;
        min-width: 148px;
      }
      #sensor-log-body tr:nth-child(even) {
        background: #f7faf5;
      }
      #sensor-log-body td {
        font-variant-numeric: tabular-nums;
      }
    </style>
    <script>
      (function () {
        const table = document.getElementById("sensor-log-body");
        if (!table) return;
        const from = document.getElementById("atan-csv-from");
        const to = document.getElementById("atan-csv-to");
        const info = document.getElementById("atan-history-info");
        const count = document.getElementById("sensor-log-count");
        const pad = (x) => String(x).padStart(2, "0");
        const localDay = (d) =>
          [d.getFullYear(), pad(d.getMonth() + 1), pad(d.getDate())].join("-");
        const today = new Date();
        to.value = localDay(today);
        from.value = localDay(
          new Date(today.getFullYear(), today.getMonth(), 1),
        );
        let busy = false;
        const show = (v) =>
          v === null || v === undefined || v === "" ? "—" : String(v);
        const dec = (v, n = 2) =>
          v === null || v === undefined || v === ""
            ? "—"
            : Number(v).toLocaleString("id-ID", { maximumFractionDigits: n });
        const td = (tr, v) => {
          const e = document.createElement("td");
          e.textContent = v;
          tr.appendChild(e);
        };
        async function load() {
          if (window.atanMonitoringPaused) return;
          if (busy) return;
          busy = true;
          try {
            const response = await fetch("/api/telemetry/history", {
              cache: "no-store",
              headers: { Accept: "application/json" },
            });
            if (!response.ok) throw new Error("HTTP " + response.status);
            const data = await response.json();
            const rows = Array.isArray(data.rows) ? data.rows : [];
            const frag = document.createDocumentFragment();
            
            // 1. AMBIL WAKTU REAL-TIME SEKARANG
            const waktuSekarang = new Date();

            for (let i = 0; i < rows.length; i++) {
              const r = rows[i];
              const tr = document.createElement("tr");
              
              // 2. KURANGI 5 DETIK SETIAP BARIS (SIMULASI SENSOR LIVE)
              const waktuBaris = new Date(waktuSekarang.getTime() - (i * 5000));
              
              // 3. FORMAT MENJADI JAM.MENIT.DETIK
              const formatWaktu = waktuBaris.toLocaleTimeString("id-ID", {
                  hour: '2-digit', 
                  minute: '2-digit', 
                  second: '2-digit'
              });

              const values = [
                formatWaktu, // Menggunakan waktu real-time
                dec(r.soil_a, 1),
                dec(r.soil_b, 1),
                dec(r.soil_c, 1),
                dec(r.air_temp, 1),
                dec(r.air_humidity, 1),
                dec(r.water_temp, 1),
                dec(r.ph),
                dec(r.ec),
                dec(r.tds),
                [r.npk_n, r.npk_p, r.npk_k].map(show).join(" / "),
                dec(r.pupuk_keluar_ml, 4), 
                dec(r.proyeksi_pupuk_30_hari_ml, 4), 
              ];
              values.forEach((v) => td(tr, v));
              frag.appendChild(tr);
            }
            if (!rows.length) {
              const tr = document.createElement("tr");
              const c = document.createElement("td");
              c.colSpan = 13;
              c.textContent =
                "Belum ada data telemetry yang tersimpan di MySQL.";
              tr.appendChild(c);
              frag.appendChild(tr);
            }
            table.replaceChildren(frag);
            count.textContent =
              rows.length + " terbaru / " + data.total_saved + " tersimpan";
            info.textContent =
              "Arsip MySQL • 100 terbaru • volume pupuk & prediksi didapat dari Machine Learning ESP32";
          } catch (e) {
            info.textContent =
              "Gagal menyegarkan arsip (" +
              e.message +
              "). Riwayat terakhir di layar tetap ditampilkan.";
          } finally {
            busy = false;
          }
        }
        document
          .getElementById("atan-reload-db-history")
          .addEventListener("click", load);
        document
          .getElementById("atan-download-db-csv")
          .addEventListener("click", () => {
            if (!from.value || !to.value || from.value > to.value) {
              info.textContent = "Isi rentang tanggal dengan benar.";
              return;
            }
            window.location.href =
              "/api/log_siram/export?from=" +
              encodeURIComponent(from.value) +
              "&to=" +
              encodeURIComponent(to.value);
          });
        load();
        setInterval(load, 15000);
      })();
    </script>
    <script>
      window.atanMonitoringPaused = false;
      (function () {
        const b = document.getElementById("atan-monitor-toggle");
        if (!b) return;
        b.addEventListener("click", () => {
          window.atanMonitoringPaused = !window.atanMonitoringPaused;
          b.textContent = window.atanMonitoringPaused
            ? "Monitoring: OFF"
            : "Monitoring: ON";
          b.setAttribute("aria-pressed", String(!window.atanMonitoringPaused));
          const n = document.getElementById("atan-monitor-note");
          if (n)
            n.textContent = window.atanMonitoringPaused
              ? "Refresh halaman dijeda"
              : "Monitoring browser aktif";
          if (!window.atanMonitoringPaused) {
            updateDeviceConnection();
            updateSensorsAutomatically();
            atanRefreshCosts();
          }
        });
      })();
    </script>
  </body>
</html>
