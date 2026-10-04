<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Somalia EAC Affairs — Coming Soon</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Inter, Segoe UI, Arial, sans-serif; background: #072a56; color: #fff; min-height: 100vh; display: grid; place-items: center; overflow: hidden; }
        .bg { position: fixed; inset: 0; background: radial-gradient(circle at 80% 20%, #418FDE55, transparent 30%), radial-gradient(circle at 20% 90%, #D4A01733, transparent 35%); }
        .wrap { position: relative; width: min(920px, calc(100% - 32px)); text-align: center; }
        .mark { width: 96px; height: 96px; margin: auto; object-fit: contain; filter: drop-shadow(0 8px 24px rgba(0,0,0,.25)); }
        .kicker { margin-top: 28px; text-transform: uppercase; letter-spacing: .2em; color: #D4A017; font-size: 12px; font-weight: 800; }
        h1 { font-size: clamp(42px, 7vw, 84px); line-height: 1; margin: 14px 0 18px; }
        p { font-size: 18px; line-height: 1.7; color: #d5e6f6; max-width: 680px; margin: 0 auto; }
        .count { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; max-width: 650px; margin: 38px auto; }
        .box { background: #ffffff0d; border: 1px solid #ffffff1d; border-radius: 16px; padding: 22px 10px; backdrop-filter: blur(8px); }
        .box b { display: block; font-size: 37px; }
        .box span { font-size: 11px; text-transform: uppercase; letter-spacing: .12em; color: #9fb4c8; }
        .foot { margin-top: 32px; font-size: 13px; color: #7f9ab0; }
        .line { width: 90px; height: 4px; background: #D4A017; margin: 28px auto; border-radius: 9px; }
        @media (max-width: 560px) { .count { grid-template-columns: repeat(2, 1fr); } h1 { font-size: 50px; } }
    </style>
</head>
<body>
    <div class="bg"></div>
    <main class="wrap">
        <img class="mark" src="somalia-emblem.png" alt="Coat of arms of the Federal Republic of Somalia" width="96" height="73">
        <div class="kicker">Federal Republic of Somalia · EAC Affairs</div>
        <h1>A new national EAC gateway is coming.</h1>
        <div class="line"></div>
        <p>We are preparing a modern public platform for Somalia's East African Community integration, trade information, citizen services, opportunities and official resources.</p>
        <div class="count">
            <div class="box"><b id="d">10</b><span>Days</span></div>
            <div class="box"><b id="h">00</b><span>Hours</span></div>
            <div class="box"><b id="m">00</b><span>Minutes</span></div>
            <div class="box"><b id="s">00</b><span>Seconds</span></div>
        </div>
        <div class="foot">Target deployment: 10 October 2026 · 09:00 EAT</div>
    </main>
    <script>
        const launch = new Date('2026-10-10T09:00:00+03:00');
        function tick() {
            let x = Math.max(0, launch - new Date());
            const d = Math.floor(x / 86400000); x %= 86400000;
            const h = Math.floor(x / 3600000); x %= 3600000;
            const m = Math.floor(x / 60000);
            const s = Math.floor((x % 60000) / 1000);
            document.querySelector('#d').textContent = String(d).padStart(2, '0');
            document.querySelector('#h').textContent = String(h).padStart(2, '0');
            document.querySelector('#m').textContent = String(m).padStart(2, '0');
            document.querySelector('#s').textContent = String(s).padStart(2, '0');
        }
        tick();
        setInterval(tick, 1000);
    </script>
</body>
</html>
