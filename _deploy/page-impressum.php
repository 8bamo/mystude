<?php
/**
 * Template Name: Impressum
 * Self-contained Impressum page matching the dark front-page style.
 */
defined('ABSPATH') || exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Impressum — mystu</title>
<?php wp_head(); ?>
<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
:root{
  --ac:#C9FF2E;--ac-d:#a8e000;--w:#F4F5F1;--b:#0A0A0A;--g1:#101110;--g2:#161816;
  --mu:rgba(244,245,241,1);--mu2:rgba(244,245,241,.65);--ln:rgba(244,245,241,.10);
  --fD:'Big Shoulders Display',sans-serif;--fB:'Barlow',sans-serif;--pad:clamp(20px,5vw,72px);
}
html{scroll-behavior:smooth;overflow-x:hidden}
body.mystu-impr{background:var(--b);color:var(--w);font-family:var(--fB);font-weight:400;overflow-x:hidden;-webkit-font-smoothing:antialiased}
body.mystu-impr a{color:inherit;text-decoration:none}
body.mystu-impr ::selection{background:var(--ac);color:var(--b)}

/* NAV */
.mnav{position:fixed;top:0;left:0;right:0;z-index:500;display:flex;align-items:center;justify-content:space-between;padding:24px var(--pad);transition:padding .4s,background .4s,border-color .4s;border-bottom:1px solid transparent}
.mnav.stuck{padding:14px var(--pad);background:rgba(10,10,10,.85);backdrop-filter:blur(14px);border-color:var(--ln)}
.mnav-logo svg{height:18px;width:auto;display:block}
.mnav-r{display:flex;align-items:center;gap:34px}
.mnav-r a{font-size:.72rem;font-weight:500;letter-spacing:.14em;text-transform:uppercase;color:var(--mu2);transition:color .3s;text-decoration:none}
.mnav-r a:hover{color:var(--w)}
.mnav-cta{color:var(--b)!important;background:var(--ac);padding:9px 22px;font-family:var(--fD);font-weight:700;letter-spacing:.08em;transition:background .3s,transform .3s}
.mnav-cta:hover{background:var(--ac-d);transform:translateY(-1px)}
.mnav-burger{display:none;flex-direction:column;gap:5px;cursor:pointer;background:none;border:none}
.mnav-burger span{display:block;width:22px;height:2px;background:var(--w);transition:transform .35s,opacity .35s}
.mnav-burger.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}
.mnav-burger.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.mnav-burger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
.mob-menu{position:fixed;inset:0;background:var(--b);z-index:490;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:28px;transform:translateY(-100%);transition:transform .4s cubic-bezier(.16,1,.3,1);pointer-events:none}
.mob-menu.open{transform:none;pointer-events:all}
.mob-link{font-family:var(--fD);font-size:2.4rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--w);text-decoration:none}
.mob-cta{background:var(--ac);color:var(--b)!important;padding:12px 32px;font-size:1.6rem}

/* PAGE */
.impr-hero{padding:clamp(120px,16vw,180px) var(--pad) clamp(40px,6vw,72px);border-bottom:1px solid var(--ln)}
.impr-hero-label{font-size:.6rem;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:var(--ac);margin-bottom:18px}
.impr-hero h1{font-family:var(--fD);font-size:clamp(3.5rem,9vw,8rem);font-weight:800;line-height:.9;letter-spacing:.02em;text-transform:uppercase}

.impr-body{max-width:720px;margin:0 auto;padding:clamp(48px,8vw,96px) var(--pad)}

.impr-section{margin-bottom:48px}
.impr-section:last-child{margin-bottom:0}
.impr-section h2{font-family:var(--fD);font-size:clamp(1.4rem,3vw,2.2rem);font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-bottom:18px;color:var(--ac)}
.impr-section p,.impr-section address{font-size:.95rem;font-weight:300;line-height:1.8;color:var(--mu2);font-style:normal}
.impr-section p+p{margin-top:10px}
.impr-section a{color:var(--ac);text-decoration:underline;text-underline-offset:3px}
.impr-section a:hover{color:var(--w)}
.impr-divider{border:none;border-top:1px solid var(--ln);margin:48px 0}

/* FOOTER */
.mfoot{border-top:1px solid var(--ln);padding:clamp(24px,4vw,40px) var(--pad)}
.mfoot-bot{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px}
.mfoot-copy{font-size:.65rem;font-weight:300;color:var(--mu2);letter-spacing:.04em}
.mfoot-copy a{color:var(--mu2);text-decoration:underline;text-underline-offset:3px}
.mfoot-made{font-size:.65rem;font-weight:300;color:var(--mu2)}
.mfoot-made span{color:var(--ac)}

@media(max-width:768px){
  .mnav-r a:not(.mnav-cta){display:none}
  .mnav-burger{display:flex}
  .mfoot-bot{flex-direction:column;text-align:center;gap:6px}
}
</style>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700;800;900&family=Barlow:wght@300;400;500&display=swap" rel="stylesheet"/>
</head>
<body class="mystu-impr">
<?php wp_body_open(); ?>

<?php
$logo_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 178.6 51.7">'
  .'<path fill="#C9FF2E" d="M49,20v19.1h-8.1v-16.5c0-4.3-2.2-6.7-5.9-6.7s-6.3,2.3-6.3,6.8v16.4h-8.1v-16.5c0-4.3-2.2-6.7-5.9-6.7s-6.4,2.3-6.4,6.8v16.4H.4V9.1h7.9v3.5c2.1-3.2,5.4-4.3,8.8-4.3s7.9,2,9.9,5.1c2.3-3.8,6.3-5.1,10.2-5.1,7.1,0,11.8,4.7,11.8,11.7Z"/>'
  .'<path fill="#F4F5F1" d="M63.5,51.6h-8.9l10.5-18.9-12.9-23.6h9.2l8.2,15.4,8-15.4h8.9l-23,42.5Z"/>'
  .'<path fill="#F4F5F1" d="M111.8,17.4c-2.4-1.2-6.2-2.4-9.6-2.4-3.1,0-4.6,1.1-4.6,2.7s2.2,2.2,4.9,2.6l2.7.4c6.5,1,10.1,3.9,10.1,9s-5.1,10.2-13.8,10.2-9.4-.8-13.4-3.5l3.2-6.1c2.6,1.7,5.7,2.9,10.2,2.9s5.5-1.1,5.5-2.8-1.5-2.3-5-2.8l-2.4-.3c-6.9-1-10.4-4-10.4-9.1s4.8-9.8,12.7-9.8,8.5.9,12.5,2.8l-2.7,6.3Z"/>'
  .'<path fill="#F4F5F1" d="M143.2,16.2h-10.9v11c0,3.7,2,5.1,4.5,5.1s4-1,5.6-2l3,6.3c-2.6,1.8-5.7,3.2-9.9,3.2-7.4,0-11.2-4.2-11.2-12v-11.6h-5.8v-7.2h5.8V.1h8.1v8.9h10.9v7.2Z"/>'
  .'<path fill="#F4F5F1" d="M178.2,26.3c0,9.5-6.7,13.6-14.2,13.6s-14.2-4.1-14.2-13.6V9.1h8.1v16.5c0,4.8,2.6,6.8,6.1,6.8s6.1-2,6.1-6.8V9.1h8.1v17.2Z"/></svg>';
$home = esc_url(home_url('/'));
?>

<nav class="mnav" id="mnav">
  <a href="<?php echo $home; ?>" class="mnav-logo" aria-label="mystu"><?php echo $logo_svg; ?></a>
  <div class="mnav-r">
    <a href="<?php echo $home; ?>#leistungen">Leistungen</a>
    <a href="<?php echo $home; ?>#referenzen">Referenzen</a>
    <a href="<?php echo $home; ?>#warum">Warum</a>
    <a href="<?php echo esc_url(home_url('/preise/')); ?>">Preise</a>
    <a href="<?php echo $home; ?>#kontakt" class="mnav-cta">Projekt starten</a>
  </div>
  <button class="mnav-burger" aria-label="Menü öffnen"><span></span><span></span><span></span></button>
</nav>

<div class="mob-menu" id="mob-menu" aria-hidden="true">
  <a href="<?php echo $home; ?>#leistungen" class="mob-link">Leistungen</a>
  <a href="<?php echo $home; ?>#referenzen" class="mob-link">Referenzen</a>
  <a href="<?php echo $home; ?>#warum" class="mob-link">Warum</a>
  <a href="<?php echo esc_url(home_url('/preise/')); ?>" class="mob-link">Preise</a>
  <a href="<?php echo $home; ?>#kontakt" class="mob-cta mob-link">Projekt starten</a>
</div>

<main>
  <div class="impr-hero">
    <p class="impr-hero-label">Rechtliches</p>
    <h1>Impressum</h1>
  </div>

  <div class="impr-body">

    <div class="impr-section">
      <h2>Angaben gemäß § 5 TMG</h2>
      <address>
        mystu Michele Taormina, Yusuf Ahmed GbR<br/>
        Augsburger Str. 599<br/>
        70329 Stuttgart<br/>
        Deutschland
      </address>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>Kontakt</h2>
      <p>Telefon: <a href="tel:+4917656061226">017656061226</a></p>
      <p>E-Mail: <a href="mailto:hi@mystu.de">hi@mystu.de</a></p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>Vertretungsberechtigte Personen</h2>
      <p>Michele Taormina und Yusuf Ahmed</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>Umsatzsteuer-ID</h2>
      <p>Umsatzsteuer-Identifikationsnummer gemäß § 27a Umsatzsteuergesetz:</p>
      <p>DE360415684</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>Streitschlichtung</h2>
      <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit: <a href="https://ec.europa.eu/consumers/odr/" target="_blank" rel="noopener">ec.europa.eu/consumers/odr</a></p>
      <p>Wir sind nicht bereit und nicht verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>Produktsicherheit (GPSR)</h2>
      <p>Verantwortliche Person gemäß GPSR-Verordnung:</p>
      <p>mystu Taormina, Ahmed GbR<br/>Augsburger Str. 599, 70329 Stuttgart</p>
    </div>

  </div>
</main>

<footer class="mfoot">
  <div class="mfoot-bot">
    <p class="mfoot-copy">&copy; <?php echo date('Y'); ?> mystu — Alle Rechte vorbehalten. <a href="<?php echo esc_url(home_url('/datenschutz/')); ?>">Datenschutz</a> &middot; <a href="<?php echo esc_url(home_url('/agb/')); ?>">AGB</a> &middot; <a href="#" class="mystu-cookie-settings">Cookie-Einstellungen</a></p>
    <p class="mfoot-made">Made in Stuttgart von <span>Yusuf &amp; Michele</span></p>
  </div>
</footer>

<script>
(function(){
  var nav=document.getElementById('mnav');
  addEventListener('scroll',function(){
    if(nav) nav.classList.toggle('stuck',scrollY>50);
  });
  var burger=document.querySelector('.mnav-burger');
  var menu=document.getElementById('mob-menu');
  if(!burger||!menu) return;
  function toggleMenu(open){
    burger.classList.toggle('open',open);
    menu.classList.toggle('open',open);
    menu.setAttribute('aria-hidden',open?'false':'true');
    document.body.style.overflow=open?'hidden':'';
  }
  burger.addEventListener('click',function(){toggleMenu(!menu.classList.contains('open'))});
  menu.querySelectorAll('.mob-link').forEach(function(a){
    a.addEventListener('click',function(){toggleMenu(false)});
  });
  document.addEventListener('keydown',function(e){if(e.key==='Escape')toggleMenu(false)});
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
