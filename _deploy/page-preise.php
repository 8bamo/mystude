<?php
/*
 * Template Name: Preise & Betreuung
 * Self-contained dark/neon template matching the mystu front page.
 */
defined('ABSPATH') || exit;

$contact_url = 'mailto:hi@mystu.de?subject=' . rawurlencode('Projektanfrage Website & Shop');
$packages = [
    [
        'index' => '01',
        'eyebrow' => 'Für Selbstständige',
        'name' => 'Landingpage',
        'setup' => 'ab 1.490 €',
        'monthly' => '149 €',
        'intro' => 'Eine fokussierte Seite, die erklärt, überzeugt und Anfragen sammelt.',
        'features' => ['Individuelles One-Page-Design', 'Kontaktformular & klare CTAs', 'Mobil optimiert', 'Hosting, Updates & Monitoring', 'Bis zu 30 Min. Änderungen / Monat'],
    ],
    [
        'index' => '02',
        'eyebrow' => 'Für wachsende Teams',
        'name' => 'Business Website',
        'setup' => 'ab 3.900 €',
        'monthly' => '349 €',
        'intro' => 'Für Unternehmen, die mehr erzählen, gefunden werden und regelmäßig weiterentwickeln wollen.',
        'features' => ['Bis zu 7 individuelle Seiten', 'CMS für Inhalte & Referenzen', 'SEO-Grundsetup & Analytics', 'Cookie- & Formular-Setup', 'Bis zu 2 Std. Betreuung / Monat'],
        'popular' => true,
    ],
    [
        'index' => '03',
        'eyebrow' => 'Für Marken mit Produkten',
        'name' => 'Shop',
        'setup' => 'ab 6.900 €',
        'monthly' => '599 €',
        'intro' => 'Ein Shop, der nicht wie ein Baukasten aussieht und mit deinem Sortiment Schritt hält.',
        'features' => ['Shopify oder WooCommerce Setup', 'Produkt-, Zahlungs- & Versandlogik', 'Bis zu 20 Produkte zum Start', 'E-Mail- & Conversion-Basis', 'Bis zu 4 Std. Betreuung / Monat'],
    ],
    [
        'index' => '04',
        'eyebrow' => 'Für komplexe Vorhaben',
        'name' => 'Individuell',
        'setup' => 'auf Anfrage',
        'monthly' => 'ab 990 €',
        'intro' => 'Logins, Portale, Schnittstellen oder mehrere Teams: Wir planen das System mit dir.',
        'features' => ['Kundenbereiche & Login', 'Individuelle Funktionen & Integrationen', 'Mehrsprachigkeit & Rollen', 'Priorisierter Support', 'Betreuung nach Service-Level'],
    ],
];

$logo_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 178.6 51.7">'
    .'<path fill="#C9FF2E" d="M49,20v19.1h-8.1v-16.5c0-4.3-2.2-6.7-5.9-6.7s-6.3,2.3-6.3,6.8v16.4h-8.1v-16.5c0-4.3-2.2-6.7-5.9-6.7s-6.4,2.3-6.4,6.8v16.4H.4V9.1h7.9v3.5c2.1-3.2,5.4-4.3,8.8-4.3s7.9,2,9.9,5.1c2.3-3.8,6.3-5.1,10.2-5.1,7.1,0,11.8,4.7,11.8,11.7Z"/>'
    .'<path fill="#F4F5F1" d="M63.5,51.6h-8.9l10.5-18.9-12.9-23.6h9.2l8.2,15.4,8-15.4h8.9l-23,42.5Z"/>'
    .'<path fill="#F4F5F1" d="M111.8,17.4c-2.4-1.2-6.2-2.4-9.6-2.4-3.1,0-4.6,1.1-4.6,2.7s2.2,2.2,4.9,2.6l2.7.4c6.5,1,10.1,3.9,10.1,9s-5.1,10.2-13.8,10.2-9.4-.8-13.4-3.5l3.2-6.1c2.6,1.7,5.7,2.9,10.2,2.9s5.5-1.1,5.5-2.8-1.5-2.3-5-2.8l-2.4-.3c-6.9-1-10.4-4-10.4-9.1s4.8-9.8,12.7-9.8,8.5.9,12.5,2.8l-2.7,6.3Z"/>'
    .'<path fill="#F4F5F1" d="M143.2,16.2h-10.9v11c0,3.7,2,5.1,4.5,5.1s4-1,5.6-2l3,6.3c-2.6,1.8-5.7,3.2-9.9,3.2-7.4,0-11.2-4.2-11.2-12v-11.6h-5.8v-7.2h5.8V.1h8.1v8.9h10.9v7.2Z"/>'
    .'<path fill="#F4F5F1" d="M178.2,26.3c0,9.5-6.7,13.6-14.2,13.6s-14.2-4.1-14.2-13.6V9.1h8.1v16.5c0,4.8,2.6,6.8,6.1,6.8s6.1-2,6.1-6.8V9.1h8.1v17.2Z"/></svg>';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta name="description" content="Transparente Preise für Websites, Shops und laufende Betreuung von mystu."/>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@400;700;800;900&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<?php wp_head(); ?>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--ac:#C9FF2E;--ac-d:#a8e000;--w:#F4F5F1;--b:#0A0A0A;--g1:#101110;--g2:#161816;--mu:rgba(244,245,241,.78);--mu2:rgba(244,245,241,.55);--ln:rgba(244,245,241,.12);--fD:'Big Shoulders Display',sans-serif;--fB:'Barlow',sans-serif;--pad:clamp(20px,5vw,72px)}
html{scroll-behavior:smooth;overflow-x:hidden}body.mystu-pricing{background:var(--b);color:var(--w);font-family:var(--fB);font-weight:400;overflow-x:hidden;-webkit-font-smoothing:antialiased}body.mystu-pricing a{color:inherit;text-decoration:none}body.mystu-pricing ::selection{background:var(--ac);color:var(--b)}
.skip{position:fixed;left:16px;top:-80px;z-index:9999;background:var(--ac);color:var(--b)!important;padding:12px 18px;font-weight:600}.skip:focus{top:16px}
#prog{position:fixed;left:0;top:0;width:0;height:2px;background:var(--ac);z-index:700}
.mnav{position:fixed;inset:0 0 auto;z-index:500;display:flex;align-items:center;justify-content:space-between;padding:24px var(--pad);border-bottom:1px solid transparent;transition:.35s}.mnav.stuck{padding:14px var(--pad);background:rgba(10,10,10,.88);backdrop-filter:blur(14px);border-color:var(--ln)}.mnav-logo svg{display:block;width:auto;height:18px}.mnav-r{display:flex;align-items:center;gap:34px}.mnav-r a{font-size:.72rem;font-weight:500;letter-spacing:.14em;text-transform:uppercase;color:var(--mu);transition:color .3s}.mnav-r a:hover,.mnav-r a[aria-current="page"]{color:var(--ac)}.mnav-cta{background:var(--ac);color:var(--b)!important;padding:10px 22px;font-family:var(--fD);font-weight:800!important}.mnav-burger{display:none;background:none;border:0;padding:8px}.mnav-burger span{display:block;width:22px;height:2px;margin:5px;background:var(--w);transition:.3s}.mnav-burger.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}.mnav-burger.open span:nth-child(2){opacity:0}.mnav-burger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
.mob-menu{position:fixed;inset:0;z-index:450;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:28px;background:var(--b);opacity:0;visibility:hidden;transition:.35s}.mob-menu.open{opacity:1;visibility:visible}.mob-menu a{font-family:var(--fD);font-size:clamp(2.8rem,12vw,5rem);font-weight:900;text-transform:uppercase}.mob-menu .ac{color:var(--ac)}
.hero{position:relative;min-height:100svh;display:flex;align-items:flex-end;padding:150px var(--pad) clamp(64px,8vw,100px);border-bottom:1px solid var(--ln);overflow:hidden}.hero::after{content:'';position:absolute;right:-10%;top:-18%;width:min(760px,65vw);aspect-ratio:1;border-radius:50%;background:radial-gradient(circle,rgba(201,255,46,.11),transparent 68%);filter:blur(90px);pointer-events:none}.hero-inner{position:relative;z-index:1;width:100%}.eyebrow{display:flex;align-items:center;gap:14px;color:var(--ac);font-size:.68rem;font-weight:600;letter-spacing:.3em;text-transform:uppercase}.eyebrow::before{content:'';width:34px;height:1px;background:var(--ac)}.hero h1{max-width:12ch;margin-top:28px;font-family:var(--fD);font-size:clamp(4.2rem,11vw,11rem);font-weight:900;line-height:.83;letter-spacing:-.025em;text-transform:uppercase}.hero h1 span{color:var(--ac)}.hero-bottom{display:flex;align-items:flex-end;justify-content:space-between;gap:40px;margin-top:clamp(36px,6vw,64px)}.hero-copy{max-width:37ch;color:var(--mu);font-size:clamp(1rem,1.5vw,1.2rem);font-weight:300;line-height:1.7}.hero-copy b{color:var(--w)}.actions{display:flex;flex-wrap:wrap;gap:12px}.btn{display:inline-flex;min-height:52px;align-items:center;justify-content:center;padding:14px 28px;border:1px solid var(--ln);font-family:var(--fD);font-size:1rem;font-weight:800;letter-spacing:.08em;text-transform:uppercase;transition:.3s}.btn.primary{background:var(--ac);border-color:var(--ac);color:var(--b)}.btn:hover{transform:translateY(-3px);border-color:var(--w)}.btn.primary:hover{background:var(--w);border-color:var(--w)}
.sec{padding:clamp(80px,12vw,160px) var(--pad)}.sec-head{display:flex;align-items:flex-end;justify-content:space-between;gap:40px;margin-bottom:clamp(42px,6vw,76px)}.sec-title{margin-top:18px;font-family:var(--fD);font-size:clamp(3rem,7vw,7rem);font-weight:900;line-height:.86;letter-spacing:-.02em;text-transform:uppercase}.sec-title span{color:var(--ac)}.sec-note{max-width:45ch;color:var(--mu);font-size:.9rem;line-height:1.75}
.packages{border-top:1px solid var(--ln)}.package{position:relative;display:grid;grid-template-columns:80px minmax(220px,.8fr) 1.25fr minmax(210px,.65fr);gap:clamp(20px,4vw,64px);align-items:start;padding:clamp(38px,5vw,64px) 0;border-bottom:1px solid var(--ln);transition:background .35s,padding .5s}.package:hover{background:var(--g1);padding-inline:clamp(14px,2vw,28px)}.package-index{font-family:var(--fD);font-size:.8rem;font-weight:700;letter-spacing:.18em;color:var(--mu2)}.package-kicker{font-size:.62rem;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--ac)}.package-name{margin-top:12px;font-family:var(--fD);font-size:clamp(2.7rem,5vw,5.5rem);font-weight:900;line-height:.86;text-transform:uppercase}.popular{display:inline-block;margin-top:14px;padding:5px 11px;border:1px solid var(--ac);color:var(--ac);font-size:.56rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase}.package-intro{max-width:42ch;color:var(--mu);font-size:.92rem;line-height:1.75}.features{display:grid;grid-template-columns:1fr 1fr;gap:10px 24px;margin-top:24px;list-style:none}.features li{display:flex;gap:9px;color:var(--mu);font-size:.78rem;line-height:1.5}.features li::before{content:'—';color:var(--ac)}.prices{border-left:1px solid var(--ln);padding-left:clamp(20px,3vw,42px)}.price-label{display:block;color:var(--mu2);font-size:.58rem;font-weight:600;letter-spacing:.18em;text-transform:uppercase}.price{display:block;margin:8px 0 22px;font-family:var(--fD);font-size:clamp(1.8rem,3vw,3rem);font-weight:800;line-height:1}.monthly{color:var(--ac)}.monthly small{font-family:var(--fB);font-size:.72rem;color:var(--mu);font-weight:400}.package .btn{width:100%;margin-top:6px}
.care{border-block:1px solid var(--ln);background:var(--g1)}.care-grid{display:grid;grid-template-columns:.85fr 1.15fr;gap:clamp(50px,8vw,120px);align-items:start}.care-list{border-top:1px solid var(--ln)}.care-item{display:grid;grid-template-columns:54px 1fr;gap:20px;padding:30px 0;border-bottom:1px solid var(--ln)}.care-num{font-family:var(--fD);font-size:.8rem;color:var(--ac);letter-spacing:.15em}.care-item h3{font-family:var(--fD);font-size:clamp(1.8rem,3vw,3rem);font-weight:800;text-transform:uppercase}.care-item p{max-width:48ch;margin-top:8px;color:var(--mu);font-size:.86rem;line-height:1.7}
.final{text-align:center}.final .eyebrow{justify-content:center}.final h2{max-width:11ch;margin:28px auto 24px;font-family:var(--fD);font-size:clamp(3.6rem,9vw,9rem);font-weight:900;line-height:.84;text-transform:uppercase}.final h2 span{color:var(--ac)}.final p{max-width:48ch;margin:0 auto 34px;color:var(--mu);line-height:1.75}.final .actions{justify-content:center}
.mfoot{padding:58px var(--pad) 34px;border-top:1px solid var(--ln);background:#060606}.mfoot-top{display:flex;align-items:flex-end;justify-content:space-between;gap:30px;padding-bottom:34px;border-bottom:1px solid var(--ln)}.mfoot-logo svg{height:28px;width:auto}.mfoot p{max-width:34ch;margin-top:14px;color:var(--mu2);font-size:.76rem;line-height:1.65}.mfoot-links{display:flex;flex-wrap:wrap;gap:24px;font-size:.67rem;letter-spacing:.12em;text-transform:uppercase;color:var(--mu)}.mfoot-copy{margin-top:26px!important;font-size:.65rem!important}
.rv{opacity:0;transform:translateY(34px);transition:opacity .8s cubic-bezier(.16,1,.3,1),transform .8s cubic-bezier(.16,1,.3,1)}.rv.vis{opacity:1;transform:none}
@media(max-width:1180px){.mnav-r{display:none}.mnav-burger{display:block;position:relative;z-index:520}.hero-bottom{align-items:flex-start;flex-direction:column}}
@media(max-width:980px){.package{grid-template-columns:54px 1fr 1fr}.prices{grid-column:2/-1;border-left:0;border-top:1px solid var(--ln);padding:24px 0 0;display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;align-items:end}.package-copy{grid-column:3}.care-grid{grid-template-columns:1fr}.sec-head{align-items:flex-start;flex-direction:column}}
@media(max-width:700px){.hero{padding-top:120px}.sec-head{gap:20px}.package{grid-template-columns:38px 1fr}.package-copy{grid-column:2}.prices{grid-column:2;grid-template-columns:1fr 1fr}.prices .btn{grid-column:1/-1}.features{grid-template-columns:1fr}.mfoot-top{align-items:flex-start;flex-direction:column}.mfoot-links{gap:16px}}
</style>
</head>
<body <?php body_class('mystu-pricing'); ?>>
<?php wp_body_open(); ?>
<a class="skip" href="#main">Zum Inhalt springen</a><div id="prog"></div>
<nav class="mnav" id="mnav">
  <a href="<?php echo esc_url(home_url('/')); ?>" class="mnav-logo" aria-label="mystu Startseite"><?php echo $logo_svg; ?></a>
  <div class="mnav-r"><a href="<?php echo esc_url(home_url('/#leistungen')); ?>">Leistungen</a><a href="<?php echo esc_url(home_url('/#referenzen')); ?>">Referenzen</a><a href="<?php echo esc_url(home_url('/preise/')); ?>" aria-current="page">Preise</a><a href="<?php echo esc_url(home_url('/#kontakt')); ?>" class="mnav-cta">Projekt starten</a></div>
  <button class="mnav-burger" id="nav-toggle" type="button" aria-label="Menü öffnen" aria-expanded="false" aria-controls="mob-menu"><span></span><span></span><span></span></button>
</nav>
<div class="mob-menu" id="mob-menu"><a href="<?php echo esc_url(home_url('/')); ?>">Start</a><a href="#pakete" class="ac">Pakete</a><a href="<?php echo esc_url(home_url('/#kontakt')); ?>">Kontakt</a></div>

<main id="main">
  <section class="hero">
    <div class="hero-inner">
      <p class="eyebrow">Websites, Shops & Betreuung</p>
      <h1>Klare Preise.<br><span>Weiter gedacht.</span></h1>
      <div class="hero-bottom"><p class="hero-copy">Du kaufst nicht nur eine Website. Du bekommst einen Auftritt, der gepflegt wird, mit deinem Geschäft wächst und <b>einen Ansprechpartner behält.</b></p><div class="actions"><a class="btn primary" href="#pakete">Preise ansehen</a><a class="btn" href="<?php echo esc_url($contact_url); ?>">Projekt besprechen</a></div></div>
    </div>
  </section>

  <section class="sec" id="pakete">
    <div class="sec-head rv"><div><p class="eyebrow">Vier sinnvolle Stufen</p><h2 class="sec-title">Mehr Vorhaben.<br><span>Mehr Service.</span></h2></div><p class="sec-note">Alle Preise sind Netto-„ab“-Preise. Der konkrete Umfang wird vor dem Start klar festgelegt – ohne Überraschungen.</p></div>
    <div class="packages">
      <?php foreach ($packages as $package): ?>
      <article class="package rv">
        <span class="package-index"><?php echo esc_html($package['index']); ?></span>
        <div><p class="package-kicker"><?php echo esc_html($package['eyebrow']); ?></p><h3 class="package-name"><?php echo esc_html($package['name']); ?></h3><?php if (!empty($package['popular'])): ?><span class="popular">Beliebt</span><?php endif; ?></div>
        <div class="package-copy"><p class="package-intro"><?php echo esc_html($package['intro']); ?></p><ul class="features"><?php foreach ($package['features'] as $feature): ?><li><?php echo esc_html($feature); ?></li><?php endforeach; ?></ul></div>
        <div class="prices"><div><span class="price-label">Einmaliger Aufbau</span><strong class="price"><?php echo esc_html($package['setup']); ?></strong></div><div><span class="price-label">Laufende Betreuung</span><strong class="price monthly"><?php echo esc_html($package['monthly']); ?><small> / Monat</small></strong></div><a class="btn" href="<?php echo esc_url($contact_url); ?>"><?php echo $package['name'] === 'Individuell' ? 'Vorhaben besprechen' : 'Paket anfragen'; ?></a></div>
      </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="sec care">
    <div class="care-grid"><div class="rv"><p class="eyebrow">Laufende Betreuung</p><h2 class="sec-title">Kein Launch.<br><span>Keine Funkstille.</span></h2></div><div class="care-list rv"><article class="care-item"><span class="care-num">01</span><div><h3>Sicher & aktuell</h3><p>Technik, Backups und Sicherheitsupdates werden nicht zum offenen To-do.</p></div></article><article class="care-item"><span class="care-num">02</span><div><h3>Inhaltlich lebendig</h3><p>Neue Angebote, Aktionen oder Seiten sind im monatlichen Service eingeplant.</p></div></article><article class="care-item"><span class="care-num">03</span><div><h3>Mitwachsend</h3><p>Wenn aus der Landingpage ein Shop wird, bauen wir auf einem sauberen Fundament weiter.</p></div></article></div></div>
  </section>

  <section class="sec final rv"><p class="eyebrow">Dein nächster Schritt</p><h2>Was soll dein Geschäft <span>online können?</span></h2><p>Wir sagen dir offen, welches Paket sinnvoll ist – oder warum dein Vorhaben ein individuelles Angebot braucht.</p><div class="actions"><a class="btn primary" href="<?php echo esc_url($contact_url); ?>">Projekt anfragen</a><a class="btn" href="<?php echo esc_url(home_url('/')); ?>">Zur Startseite</a></div></section>
</main>

<footer class="mfoot"><div class="mfoot-top"><div class="mfoot-logo"><?php echo $logo_svg; ?><p>Webdesign, Shops und digitale Produkte aus Stuttgart.</p></div><nav class="mfoot-links" aria-label="Footer"><a href="<?php echo esc_url(home_url('/impressum/')); ?>">Impressum</a><a href="<?php echo esc_url(home_url('/datenschutz/')); ?>">Datenschutz</a><a href="<?php echo esc_url(home_url('/agb/')); ?>">AGB</a></nav></div><p class="mfoot-copy">© <?php echo esc_html(date('Y')); ?> mystu.de</p></footer>
<?php wp_footer(); ?>
<script>
(function(){
  var nav=document.getElementById('mnav'),bar=document.getElementById('prog'),toggle=document.getElementById('nav-toggle'),menu=document.getElementById('mob-menu');
  function onScroll(){var y=window.scrollY,h=document.documentElement.scrollHeight-window.innerHeight;nav.classList.toggle('stuck',y>24);bar.style.width=(h>0?y/h*100:0)+'%'}
  window.addEventListener('scroll',onScroll,{passive:true});onScroll();
  toggle.addEventListener('click',function(){var open=menu.classList.toggle('open');toggle.classList.toggle('open',open);toggle.setAttribute('aria-expanded',open?'true':'false');document.body.style.overflow=open?'hidden':''});
  menu.querySelectorAll('a').forEach(function(a){a.addEventListener('click',function(){menu.classList.remove('open');toggle.classList.remove('open');toggle.setAttribute('aria-expanded','false');document.body.style.overflow=''})});
  if('IntersectionObserver' in window){var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('vis');io.unobserve(e.target)}})},{threshold:.12});document.querySelectorAll('.rv').forEach(function(el){io.observe(el)})}else{document.querySelectorAll('.rv').forEach(function(el){el.classList.add('vis')})}
})();
</script>
</body></html>
