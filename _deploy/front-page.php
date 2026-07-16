<?php
/**
 * Front Page — mystu Webdesign-Agentur
 * Self-contained template: ships its own nav, styles and footer.
 * Does NOT load header.php / footer.php so the shared (light) layout
 * used by the other pages stays untouched.
 */
defined('ABSPATH') || exit;
$lead_sent  = isset($_GET['lead_sent']);
$lead_error = isset($_GET['lead_error']);
// Stateless math CAPTCHA token
$cap_n1    = wp_rand(2, 9);
$cap_n2    = wp_rand(1, $cap_n1 - 1);
$cap_token = hash_hmac('sha256', ($cap_n1 + $cap_n2), wp_salt('auth'));
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>"/>
<meta name="description" content="mystu – Webdesign-Agentur aus Stuttgart &amp; Ludwigsburg. Moderne Websites, Onlineshops &amp; Landingpages mit lokaler SEO. Festpreis, schnelle Umsetzung, persönlicher Kontakt."/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://mystu.de/"/>
<meta property="og:title" content="mystu. – Websites, die Kunden bringen"/>
<meta property="og:description" content="Webdesign-Agentur aus Stuttgart &amp; Ludwigsburg. Wir bauen Websites, Onlineshops &amp; Landingpages die online gefunden werden und Anfragen bringen."/>
<meta property="og:image" content="https://mystu.de/wp-content/themes/mystu/assets/og-image.jpg"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:locale" content="de_DE"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="mystu. – Websites, die Kunden bringen"/>
<meta name="twitter:description" content="Webdesign-Agentur aus Stuttgart &amp; Ludwigsburg."/>
<meta name="twitter:image" content="https://mystu.de/wp-content/themes/mystu/assets/og-image.jpg"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@400;700;800;900&family=Barlow:wght@300;400;500;600&display=swap"/>
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@400;700;800;900&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet" media="print" onload="this.media='all'"/>
<noscript><link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@400;700;800;900&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet"/></noscript>
<?php wp_head(); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "mystu",
  "description": "Webdesign-Agentur aus Stuttgart & Ludwigsburg. Wir bauen moderne Websites, Onlineshops und Landingpages – und sorgen mit lokaler SEO für mehr Kunden.",
  "url": "https://mystu.de",
  "email": "hi@mystu.de",
  "telephone": "+4915123456789",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Stuttgart",
    "addressRegion": "Baden-Württemberg",
    "addressCountry": "DE"
  },
  "areaServed": [
    {"@type": "City", "name": "Stuttgart"},
    {"@type": "City", "name": "Ludwigsburg"}
  ],
  "serviceType": ["Webdesign", "Onlineshop Entwicklung", "Landingpage", "Lokale SEO"],
  "priceRange": "$$",
  "openingHours": "Mo-Fr 09:00-18:00",
  "sameAs": ["https://mystu.de"]
}
</script>

<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
:root{
  --ac:#C9FF2E;--ac-d:#a8e000;--w:#F4F5F1;--b:#0A0A0A;--g1:#101110;--g2:#161816;
  --mu:rgba(244,245,241,1);--mu2:rgba(244,245,241,.75);--ln:rgba(244,245,241,.10);
  --fD:'Big Shoulders Display',sans-serif;--fB:'Barlow',sans-serif;--pad:clamp(20px,5vw,72px);
  --hand:url("data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20width='34'%20height='34'%20viewBox='0%200%2024%2024'%3E%3Cpath%20fill='%23C9FF2E'%20stroke='%230A0A0A'%20stroke-width='0.8'%20stroke-linejoin='round'%20d='M9%2011V4.5a1.5%201.5%200%200%201%203%200V10h.5V6a1.5%201.5%200%200%201%203%200v4.5h.5V8a1.5%201.5%200%200%201%203%200v7c0%203-2%205.5-5.5%205.5h-2c-2%200-3-1-4.5-3l-2.5-3.5a1.4%201.4%200%200%201%202.2-1.7L9%2014z'/%3E%3C/svg%3E") 13 4,auto;
}
html{scroll-behavior:smooth;overflow-x:hidden}
body.mystu-front{background:var(--b);color:var(--w);font-family:var(--fB);font-weight:400;overflow-x:hidden;-webkit-font-smoothing:antialiased;cursor:var(--hand)}
body.mystu-front a,body.mystu-front button{cursor:var(--hand)}
body.mystu-front a{color:inherit;text-decoration:none}
body.mystu-front img{display:block;width:100%}
body.mystu-front button{background:none;border:none;color:inherit}
body.mystu-front ::selection{background:var(--ac);color:var(--b)}

#prog{position:fixed;top:0;left:0;height:2px;background:var(--ac);z-index:600;width:0}

#loader{position:fixed;inset:0;background:var(--b);z-index:9000;display:flex;align-items:center;justify-content:center;transition:opacity .7s ease,visibility .7s ease}
#loader.out{opacity:0;visibility:hidden}
.ldr svg{height:clamp(30px,4.5vw,46px);width:auto;opacity:0;animation:ldrIn .6s cubic-bezier(.16,1,.3,1) .2s forwards}
.ldr-line{width:0;height:2px;background:var(--ac);margin-top:18px;animation:ldrLine .9s ease .55s forwards}
@keyframes ldrIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:none}}
@keyframes ldrLine{to{width:140px}}

.mnav{position:fixed;top:0;left:0;right:0;z-index:500;display:flex;align-items:center;justify-content:space-between;padding:24px var(--pad);transition:padding .4s,background .4s,border-color .4s;border-bottom:1px solid transparent}
.mnav.stuck{padding:14px var(--pad);background:rgba(10,10,10,.82);backdrop-filter:blur(14px);border-color:var(--ln)}
.mnav-logo svg{height:18px;width:auto;display:block}
.mnav-r{display:flex;align-items:center;gap:34px}
.mnav-r a{font-size:.72rem;font-weight:500;letter-spacing:.14em;text-transform:uppercase;color:var(--mu);transition:color .3s}
.mnav-r a:hover{color:var(--w)}
.mnav-cta{color:var(--b)!important;background:var(--ac);padding:9px 22px;font-family:var(--fD);font-weight:700;letter-spacing:.08em;transition:background .3s,transform .3s}
.mnav-cta:hover{background:var(--w);transform:translateY(-1px)}
.mnav-burger{display:none;flex-direction:column;gap:5px;cursor:pointer;z-index:601;position:relative}
.mnav-burger span{display:block;width:22px;height:2px;background:var(--w);transition:transform .35s,opacity .35s}
.mnav-burger.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}
.mnav-burger.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.mnav-burger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
.mob-menu{position:fixed;inset:0;background:var(--b);z-index:600;display:flex;flex-direction:column;justify-content:center;align-items:center;gap:clamp(24px,5vw,40px);opacity:0;visibility:hidden;transition:opacity .4s,visibility .4s}
.mob-menu.open{opacity:1;visibility:visible}
.mob-menu a{font-family:var(--fD);font-size:clamp(2.5rem,10vw,5rem);font-weight:900;letter-spacing:-.02em;text-transform:uppercase;color:var(--w);text-decoration:none;transition:color .3s}
.mob-menu a:hover{color:var(--ac)}
.mob-menu a.mob-cta{color:var(--ac)}
.mob-menu-foot{position:absolute;bottom:32px;font-size:.68rem;letter-spacing:.1em;text-transform:uppercase;color:var(--mu2)}

#hero{position:relative;min-height:100svh;display:flex;flex-direction:column;justify-content:center;padding:120px var(--pad) 48px;overflow:hidden}
.hero-glow{position:absolute;width:60vw;height:60vw;max-width:760px;max-height:760px;border-radius:50%;filter:blur(150px);background:radial-gradient(circle,rgba(201,255,46,.10) 0%,transparent 70%);top:-12%;right:-10%;pointer-events:none;animation:glow 9s ease-in-out infinite}
@keyframes glow{0%,100%{opacity:.6;transform:scale(1)}50%{opacity:1;transform:scale(1.1)}}
.hero-eyebrow{display:flex;align-items:center;gap:14px;font-size:.68rem;font-weight:600;letter-spacing:.32em;text-transform:uppercase;color:var(--ac);margin-bottom:clamp(24px,4vw,40px)}
.hero-eyebrow::before{content:'';width:34px;height:1px;background:var(--ac)}
.hero-h{font-family:var(--fD);font-weight:900;line-height:.86;letter-spacing:-.02em;font-size:clamp(56px,12vw,196px);text-transform:uppercase;max-width:14ch}
.hero-h .line{display:block;overflow:hidden}
.hero-h .line span{display:block;transform:translateY(106%);animation:lineUp 1s cubic-bezier(.16,1,.3,1) forwards}
.hero-h .line:nth-child(1) span{animation-delay:.5s}
.hero-h .line:nth-child(2) span{animation-delay:.62s}
.hero-h .ac{color:var(--ac)}
@keyframes lineUp{to{transform:none}}
.hero-bottom{display:flex;align-items:flex-end;justify-content:space-between;gap:40px;margin-top:clamp(36px,6vw,64px);opacity:0;animation:fadeUp .9s ease 1.05s forwards}
.hero-sub{font-size:clamp(.95rem,1.4vw,1.15rem);font-weight:300;line-height:1.7;color:var(--mu);max-width:34ch}
.hero-ctas{display:flex;flex-wrap:wrap;align-items:center;gap:14px;flex-shrink:0}
.hero-sub b{color:var(--w);font-weight:600}
.hero-cta{display:inline-flex;align-items:center;gap:12px;font-family:var(--fD);font-size:1.05rem;font-weight:800;letter-spacing:.06em;text-transform:uppercase;color:var(--b)!important;background:var(--ac);padding:16px 34px;flex-shrink:0;transition:background .3s,transform .3s}
.hero-cta:hover{background:var(--w)}
.hero-cta.ghost{background:transparent!important;color:var(--w)!important;border:1px solid rgba(244,245,241,.40)}
.hero-cta.ghost:hover{background:var(--w)!important;color:var(--b)!important;border-color:var(--w)}
.hero-cta svg{transition:transform .3s}
.hero-cta:hover svg{transform:translateX(5px)}
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:none}}


.rv{opacity:0;transform:translateY(38px);transition:opacity .9s cubic-bezier(.16,1,.3,1),transform .9s cubic-bezier(.16,1,.3,1)}
.rv.vis{opacity:1;transform:none}
.d1{transition-delay:.1s}.d2{transition-delay:.2s}.d3{transition-delay:.3s}

.sec{padding:clamp(80px,13vw,180px) var(--pad)}
.sec-head{display:flex;align-items:flex-end;justify-content:space-between;gap:30px;margin-bottom:clamp(40px,6vw,72px)}
.slabel{display:flex;align-items:center;gap:12px;font-size:.66rem;font-weight:600;letter-spacing:.3em;text-transform:uppercase;color:var(--ac);margin-bottom:18px}
.slabel::before{content:'';width:24px;height:1px;background:var(--ac)}
.sec-title{font-family:var(--fD);font-weight:900;line-height:.9;letter-spacing:-.02em;font-size:clamp(40px,6.5vw,96px);text-transform:uppercase}
.sec-title .ac{color:var(--ac)}
.sec-meta{font-size:.72rem;font-weight:500;letter-spacing:.18em;text-transform:uppercase;color:var(--mu2);text-align:right;white-space:nowrap}

/* Leistungen bento */
.sl-list{border-top:1px solid var(--ln)}
.sl-item{border-bottom:1px solid var(--ln);overflow:hidden;cursor:pointer}
.sl-item a{display:block;text-decoration:none;color:inherit}
.sl-head{display:flex;align-items:center;gap:clamp(20px,4vw,60px);padding:clamp(20px,3vw,32px) 0;transition:padding .6s cubic-bezier(.16,1,.3,1)}
.sl-item:hover .sl-head{padding:clamp(24px,3.5vw,40px) 0}
.sl-num{font-family:var(--fD);font-size:.78rem;font-weight:700;letter-spacing:.18em;color:var(--mu2);flex-shrink:0;width:48px;transition:color .35s}
.sl-item:hover .sl-num{color:var(--ac)}
.sl-title{font-family:var(--fD);font-size:clamp(2.8rem,7vw,8rem);font-weight:900;text-transform:uppercase;letter-spacing:-.03em;line-height:.88;flex:1;transition:transform .6s cubic-bezier(.16,1,.3,1),color .35s}
.sl-item:hover .sl-title{transform:translateX(12px);color:var(--ac)}
.sl-tag{font-size:.56rem;font-weight:600;letter-spacing:.24em;text-transform:uppercase;color:var(--ac);border:1px solid rgba(201,255,46,.3);padding:6px 14px;border-radius:100px;flex-shrink:0;opacity:0;transform:translateY(6px);transition:opacity .4s,transform .4s}
.sl-item:hover .sl-tag{opacity:1;transform:translateY(0)}
.sl-arr{width:52px;height:52px;border-radius:50%;border:1px solid var(--ln);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--w);transition:background .35s,border-color .35s,transform .5s cubic-bezier(.16,1,.3,1)}
.sl-item:hover .sl-arr{background:var(--ac);border-color:var(--ac);color:var(--b);transform:rotate(45deg)}
.sl-body{display:grid;grid-template-rows:0fr;transition:grid-template-rows .55s cubic-bezier(.16,1,.3,1)}
.sl-item:hover .sl-body{grid-template-rows:1fr}
.sl-inner{overflow:hidden}
.sl-detail{display:flex;align-items:flex-end;justify-content:space-between;gap:40px;padding:0 0 clamp(24px,3vw,40px) 0;padding-left:calc(48px + clamp(20px,4vw,60px))}
.sl-desc{font-size:clamp(.9rem,1.1vw,1.05rem);font-weight:300;line-height:1.8;color:var(--mu);max-width:48ch}
.sl-meta{font-size:.62rem;font-weight:500;letter-spacing:.2em;text-transform:uppercase;color:var(--mu2);text-align:right;white-space:nowrap;flex-shrink:0}
@media(max-width:760px){.sl-title{font-size:clamp(2.2rem,11vw,4rem)}.sl-detail{flex-direction:column;gap:16px;padding-left:0}.sl-tag{display:none}}

/* Warum */
#warum{border-top:1px solid var(--ln);padding:0}
#warum .sec-head{padding:clamp(48px,7vw,80px) var(--pad) 0}
.why-stack{}
.why-row{position:relative;overflow:hidden;border-bottom:1px solid var(--ln);padding:clamp(48px,7vw,80px) var(--pad);display:grid;grid-template-columns:1fr 1fr;align-items:center;gap:clamp(32px,5vw,80px);transition:background .5s}
.why-row:hover{background:var(--g1)}
.why-ghost{position:absolute;right:-0.05em;top:50%;transform:translateY(-50%);font-family:var(--fD);font-size:clamp(140px,22vw,280px);font-weight:900;line-height:1;color:transparent;-webkit-text-stroke:1px rgba(201,255,46,.10);pointer-events:none;user-select:none;transition:-webkit-text-stroke .5s,transform .7s cubic-bezier(.16,1,.3,1);letter-spacing:-.04em}
.why-row:hover .why-ghost{-webkit-text-stroke:1px rgba(201,255,46,.28);transform:translateY(-50%) translateX(-8px)}
.why-left{position:relative;z-index:1}
.why-index{font-family:var(--fD);font-size:.7rem;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:var(--ac);margin-bottom:20px;display:flex;align-items:center;gap:12px}
.why-index::before{content:'';width:32px;height:1px;background:var(--ac)}
.why-h{font-family:var(--fD);font-size:clamp(2rem,3.8vw,4rem);font-weight:900;text-transform:uppercase;letter-spacing:-.02em;line-height:.9;transition:transform .5s cubic-bezier(.16,1,.3,1)}
.why-row:hover .why-h{transform:translateX(8px)}
.why-right{position:relative;z-index:1;border-left:1px solid var(--ln);padding-left:clamp(24px,4vw,60px)}
.why-p{font-size:clamp(.9rem,1.1vw,1.05rem);font-weight:300;line-height:1.9;color:var(--mu)}
@media(max-width:760px){.why-row{grid-template-columns:1fr}.why-right{border-left:none;border-top:1px solid var(--ln);padding-left:0;padding-top:24px}.why-ghost{font-size:28vw}}

/* Referenzen */
#referenzen{border-top:1px solid var(--ln)}
.ref-item{display:grid;grid-template-columns:1.2fr .8fr;gap:clamp(40px,6vw,90px);align-items:center;padding:clamp(48px,6vw,80px) 0;border-bottom:1px solid var(--ln)}
.ref-item:last-child{border-bottom:none}
.ref-screen{position:relative;overflow:hidden;background:var(--g1);border:1px solid var(--ln);aspect-ratio:16/10}
.ref-screen img{width:100%;height:100%;object-fit:cover;object-position:top;transition:transform 6s ease,filter .4s}
.ref-screen:hover img{transform:translateY(-30%)}
.ref-screen::after{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(201,255,46,.05),transparent 60%);pointer-events:none}
.ref-tag{font-family:var(--fD);font-size:.6rem;font-weight:700;letter-spacing:.28em;text-transform:uppercase;color:var(--ac);margin-bottom:18px;display:flex;align-items:center;gap:10px}
.ref-tag::before{content:'';width:24px;height:1px;background:var(--ac)}
.ref-name{font-family:var(--fD);font-size:clamp(2.4rem,4.5vw,5rem);font-weight:900;text-transform:uppercase;letter-spacing:-.03em;line-height:.88;margin-bottom:20px}
.ref-desc{font-size:.95rem;font-weight:300;line-height:1.8;color:var(--mu);margin-bottom:28px;max-width:38ch}
.ref-chips{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:32px}
.ref-chip{font-size:.58rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:var(--mu2);border:1px solid var(--ln);padding:5px 12px}
.ref-link{display:inline-flex;align-items:center;gap:10px;font-family:var(--fD);font-size:.72rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--w);border-bottom:1px solid var(--ac);padding-bottom:4px;transition:color .3s,gap .3s}
.ref-link:hover{color:var(--ac);gap:16px}
@media(max-width:760px){.ref-item{grid-template-columns:1fr;gap:24px;padding:36px 0}}
.ref-divider{margin:clamp(40px,5vw,60px) 0 clamp(24px,3vw,36px);display:flex;align-items:center;gap:16px;font-size:.6rem;font-weight:600;letter-spacing:.28em;text-transform:uppercase;color:var(--mu2)}
.ref-divider::before,.ref-divider::after{content:'';flex:1;height:1px;background:var(--ln)}
.ref-mockups{display:grid;grid-template-columns:1fr 1fr;gap:clamp(16px,2.5vw,28px)}
.ref-mock{position:relative;overflow:hidden;background:var(--g1);border:1px solid var(--ln);transition:border-color .4s,transform .4s}
.ref-mock:hover{border-color:rgba(201,255,46,.3);transform:translateY(-4px)}
.ref-mock-frame{width:100%;aspect-ratio:16/10;overflow:hidden;position:relative}

.ref-mock-over{position:absolute;inset:0;background:linear-gradient(to top,rgba(10,10,10,.92) 0%,transparent 50%);display:flex;flex-direction:column;justify-content:flex-end;padding:clamp(16px,2vw,24px);opacity:0;transition:opacity .4s}
.ref-mock:hover .ref-mock-over{opacity:1}
.ref-mock-info{padding:clamp(14px,2vw,20px);border-top:1px solid var(--ln)}
.ref-mock-tag{font-size:.54rem;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--ac);margin-bottom:6px}
.ref-mock-name{font-family:var(--fD);font-size:clamp(1rem,1.8vw,1.4rem);font-weight:800;text-transform:uppercase;letter-spacing:-.01em}
.ref-mock-link{display:inline-flex;align-items:center;gap:8px;font-size:.6rem;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:var(--w);margin-top:8px;text-decoration:none;border-bottom:1px solid var(--ac);padding-bottom:2px;transition:color .3s}
.ref-mock-link:hover{color:var(--ac)}
@media(max-width:640px){
  .ref-mockups{grid-template-columns:1fr}
  .ref-mock-over{opacity:1;background:linear-gradient(to top,rgba(10,10,10,.88) 0%,transparent 55%)}
  .ref-mock:hover{transform:none}
  .ref-mock-name{font-size:1rem}
  .ref-mock-info{padding:12px 14px}
  .ref-mock-tag{font-size:.5rem}
}


/* Team */
#team{border-top:1px solid var(--ln)}
.team-intro{text-align:center;max-width:52ch;margin:0 auto clamp(60px,8vw,100px);padding-top:clamp(8px,2vw,16px)}
.team-intro-label{font-family:var(--fD);font-size:.7rem;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:var(--ac);margin-bottom:20px;display:flex;align-items:center;justify-content:center;gap:12px}
.team-intro-label::before,.team-intro-label::after{content:'';width:24px;height:1px;background:var(--ac)}
.team-intro-text{font-size:clamp(1.1rem,1.8vw,1.4rem);font-weight:300;line-height:1.7;color:var(--mu)}
.team-intro-text b{color:var(--w);font-weight:600}
.team-duo{display:grid;grid-template-columns:1fr 1fr;gap:clamp(16px,2.5vw,32px)}
.team-card{position:relative;overflow:hidden}
.team-img{width:100%;aspect-ratio:3/4;object-fit:cover;object-position:top;filter:grayscale(30%);transition:filter .6s,transform .6s cubic-bezier(.16,1,.3,1);display:block}
.team-card:hover .team-img{filter:grayscale(0%);transform:scale(1.03)}
.team-card-over{position:absolute;inset:0;background:linear-gradient(to top,rgba(10,10,10,.92) 0%,rgba(10,10,10,.2) 45%,transparent 70%);display:flex;flex-direction:column;justify-content:flex-end;padding:clamp(20px,3vw,36px)}
.team-card-role{font-family:var(--fD);font-size:.6rem;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:var(--ac);margin-bottom:10px}
.team-card-name{font-family:var(--fD);font-size:clamp(2.4rem,5vw,5.5rem);font-weight:900;text-transform:uppercase;letter-spacing:-.03em;line-height:.88;margin-bottom:14px;transition:transform .5s cubic-bezier(.16,1,.3,1)}
.team-card:hover .team-card-name{transform:translateY(-4px)}
.team-card-bio{font-size:.85rem;font-weight:300;line-height:1.7;color:rgba(244,245,241,.75);max-width:30ch;margin-bottom:18px;opacity:0;transform:translateY(12px);transition:opacity .5s,transform .5s cubic-bezier(.16,1,.3,1)}
.team-card:hover .team-card-bio{opacity:1;transform:translateY(0)}
.team-card-tags{display:flex;flex-wrap:wrap;gap:6px;opacity:0;transform:translateY(8px);transition:opacity .45s .05s,transform .45s .05s cubic-bezier(.16,1,.3,1)}
.team-card:hover .team-card-tags{opacity:1;transform:translateY(0)}
.team-tag{font-size:.52rem;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:var(--ac);border:1px solid rgba(201,255,46,.3);padding:4px 10px}
@media(max-width:640px){.team-duo{grid-template-columns:1fr}.team-card-bio{opacity:1;transform:none}.team-card-tags{opacity:1;transform:none}}

#kontakt{position:relative;overflow:hidden;border-top:1px solid var(--ln)}
.kt-glow{position:absolute;bottom:-30%;left:-10%;width:60vw;height:60vw;max-width:700px;border-radius:50%;filter:blur(150px);background:radial-gradient(circle,rgba(201,255,46,.09),transparent 70%);pointer-events:none}
.kt-grid{position:relative;z-index:1;display:grid;grid-template-columns:.7fr 1fr 1fr;gap:clamp(28px,4vw,56px);align-items:start}.kt-form{grid-column:2/-1}
.kt-title{font-family:var(--fD);font-weight:900;line-height:.88;letter-spacing:-.02em;font-size:clamp(52px,9vw,140px);text-transform:uppercase;margin-bottom:clamp(28px,4vw,44px)}
.kt-title .ac{color:var(--ac)}
.kt-text{font-size:1rem;font-weight:300;line-height:1.8;color:var(--mu);max-width:40ch;margin-bottom:40px}
.kt-links{display:flex;flex-direction:column;gap:16px}
.kt-link{display:inline-flex;align-items:center;gap:14px;font-size:1.05rem;font-weight:500;color:var(--w);width:fit-content;transition:color .3s}
.kt-link svg{color:var(--ac);flex-shrink:0}
.kt-link:hover{color:var(--ac)}
.kt-form{display:flex;flex-direction:column;gap:16px;background:var(--g1);border:1px solid var(--ln);padding:clamp(26px,4vw,40px)}
.kt-field{display:flex;flex-direction:column;gap:8px}
.kt-field label{font-size:.6rem;font-weight:600;letter-spacing:.24em;text-transform:uppercase;color:var(--mu)}
.kt-field input,.kt-field select,.kt-field textarea{font-family:var(--fB);font-size:.95rem;font-weight:300;color:var(--w);background:var(--g2);border:1px solid var(--ln);padding:13px 15px;transition:border-color .3s}
.kt-field input:focus,.kt-field select:focus,.kt-field textarea:focus{outline:none;border-color:var(--ac)}
.kt-field textarea{resize:vertical;min-height:110px}
.kt-field select{appearance:none;-webkit-appearance:none}
.kt-form button{font-family:var(--fD);font-size:1rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#0A0A0A!important;background:#C9FF2E!important;border:none;cursor:pointer;padding:15px;margin-top:4px;transition:background .3s,transform .3s}
.kt-form button:hover{background:#a8e000!important;transform:translateY(-2px)}
.kt-note{font-size:.66rem;font-weight:300;color:var(--mu2);line-height:1.6}
.kt-note a{color:var(--mu);text-decoration:underline;text-underline-offset:2px}
.kt-captcha input[type="number"]{-moz-appearance:textfield}
.kt-captcha input[type="number"]::-webkit-inner-spin-button{-webkit-appearance:none}
.kt-check{display:flex;align-items:flex-start;gap:10px;font-size:.78rem;font-weight:300;color:var(--mu);line-height:1.5;cursor:pointer}
.kt-check input[type="checkbox"]{width:16px;height:16px;min-width:16px;accent-color:var(--ac);margin-top:2px;cursor:pointer}
.kt-check a{color:var(--mu);text-decoration:underline;text-underline-offset:2px}
.kt-msg{padding:13px 16px;font-size:.85rem;font-weight:500;border:1px solid}
.kt-msg.ok{border-color:var(--ac);color:var(--ac);background:rgba(201,255,46,.06)}
.kt-msg.err{border-color:#ff6b5e;color:#ff8e84;background:rgba(255,107,94,.06)}
@media(max-width:1024px){.kt-grid{grid-template-columns:1fr 1fr;gap:36px}.kt-grid .rv:first-child{grid-column:1/-1}}@media(max-width:640px){.kt-grid{grid-template-columns:1fr;gap:40px}}

.mfoot{background:#060606;border-top:1px solid var(--ln);padding:clamp(48px,7vw,72px) var(--pad) 36px}
.mfoot-top{display:flex;justify-content:space-between;align-items:flex-end;gap:40px;flex-wrap:wrap;padding-bottom:36px;border-bottom:1px solid var(--ln);margin-bottom:28px}
.mfoot-logo svg{height:30px;width:auto;margin-bottom:14px}
.mfoot-desc{font-size:.8rem;font-weight:300;color:var(--mu);line-height:1.7;max-width:30ch}
.mfoot-bot{display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap}
.mfoot-copy,.mfoot-made{font-size:.68rem;color:var(--mu2);letter-spacing:.04em}
.mfoot-made span{color:var(--ac)}

@media(max-width:760px){
  .mnav-r a:not(.mnav-cta){display:none}
  .mnav-burger{display:flex}
  .hero-bottom{flex-direction:column;align-items:flex-start;gap:28px}
  .sec-head{flex-direction:column;align-items:flex-start;gap:10px}
  .sec-meta{text-align:left}
}
.ref-item,.ref-mock{cursor:pointer}.ref-mock-link{position:absolute;inset:0;z-index:5;display:flex;align-items:flex-end;padding:clamp(16px,2vw,24px);border:0!important}.ref-mock-link::after{content:"↗";margin-left:auto;font-size:1.2rem;color:var(--ac)}.ref-item:focus-within,.ref-mock:focus-within{outline:1px solid var(--ac);outline-offset:6px}
.calendly-wrap{display:flex;flex-direction:column;gap:clamp(20px,3vw,32px)}
.calendly-head{padding:0}
.calendly-title{font-family:var(--fD);font-size:clamp(1.8rem,3.5vw,3rem);font-weight:900;text-transform:uppercase;letter-spacing:-.02em;line-height:.9;margin:10px 0}
.calendly-sub{font-size:.88rem;line-height:1.75;color:var(--mu2)}
.calendly-sub strong{color:var(--ac)}
.calendly-inline-widget{border:1px solid var(--ln);background:var(--g1)}
</style>
</head>
<body <?php body_class('mystu-front'); ?>>
<?php wp_body_open(); ?>

<?php
$logo_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 178.6 51.7">'
  .'<path fill="#C9FF2E" d="M49,20v19.1h-8.1v-16.5c0-4.3-2.2-6.7-5.9-6.7s-6.3,2.3-6.3,6.8v16.4h-8.1v-16.5c0-4.3-2.2-6.7-5.9-6.7s-6.4,2.3-6.4,6.8v16.4H.4V9.1h7.9v3.5c2.1-3.2,5.4-4.3,8.8-4.3s7.9,2,9.9,5.1c2.3-3.8,6.3-5.1,10.2-5.1,7.1,0,11.8,4.7,11.8,11.7Z"/>'
  .'<path fill="#F4F5F1" d="M63.5,51.6h-8.9l10.5-18.9-12.9-23.6h9.2l8.2,15.4,8-15.4h8.9l-23,42.5Z"/>'
  .'<path fill="#F4F5F1" d="M111.8,17.4c-2.4-1.2-6.2-2.4-9.6-2.4-3.1,0-4.6,1.1-4.6,2.7s2.2,2.2,4.9,2.6l2.7.4c6.5,1,10.1,3.9,10.1,9s-5.1,10.2-13.8,10.2-9.4-.8-13.4-3.5l3.2-6.1c2.6,1.7,5.7,2.9,10.2,2.9s5.5-1.1,5.5-2.8-1.5-2.3-5-2.8l-2.4-.3c-6.9-1-10.4-4-10.4-9.1s4.8-9.8,12.7-9.8,8.5.9,12.5,2.8l-2.7,6.3Z"/>'
  .'<path fill="#F4F5F1" d="M143.2,16.2h-10.9v11c0,3.7,2,5.1,4.5,5.1s4-1,5.6-2l3,6.3c-2.6,1.8-5.7,3.2-9.9,3.2-7.4,0-11.2-4.2-11.2-12v-11.6h-5.8v-7.2h5.8V.1h8.1v8.9h10.9v7.2Z"/>'
  .'<path fill="#F4F5F1" d="M178.2,26.3c0,9.5-6.7,13.6-14.2,13.6s-14.2-4.1-14.2-13.6V9.1h8.1v16.5c0,4.8,2.6,6.8,6.1,6.8s6.1-2,6.1-6.8V9.1h8.1v17.2Z"/></svg>';
$home = esc_url(home_url('/'));
$arrow = '<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M4 12L12 4M12 4H5M12 4v7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>

<div id="prog"></div>

<div id="loader">
  <div class="ldr" style="display:flex;flex-direction:column;align-items:center"><?php echo $logo_svg; ?><div class="ldr-line"></div></div>
</div>

<nav class="mnav" id="mnav">
  <a href="<?php echo $home; ?>" class="mnav-logo" aria-label="mystu"><?php echo $logo_svg; ?></a>
  <div class="mnav-r">
    <a href="#leistungen">Leistungen</a>
    <a href="#referenzen">Referenzen</a>
    <a href="#warum">Warum</a><a href="/preise/">Preise</a>
    <a href="#kontakt" class="mnav-cta">Projekt starten</a>
  </div>
  <div class="mnav-burger"><span></span><span></span><span></span></div>
</nav>

<div class="mob-menu" id="mob-menu" aria-hidden="true">
  <a href="#leistungen" class="mob-link">Leistungen</a>
  <a href="#referenzen" class="mob-link">Referenzen</a>
  <a href="#warum" class="mob-link">Warum</a>
  <a href="/preise/" class="mob-link">Preise</a>
  <a href="#kontakt" class="mob-cta mob-link">Projekt starten</a>
  <div class="mob-menu-foot">hi@mystu.de</div>
</div>

<main>
<section id="hero">
  <div class="hero-glow"></div>
  <p class="hero-eyebrow">Webdesign-Agentur &middot; Raum Stuttgart &amp; Ludwigsburg</p>
  <h1 class="hero-h">
    <span class="line"><span>Mehr</span></span>
    <span class="line"><span class="ac">Kunden.</span></span>
  </h1>
  <div class="hero-bottom">
    <p class="hero-sub">Websites, die nicht nur gut aussehen &mdash; sondern <b>Anfragen bringen, Vertrauen aufbauen</b> und deinen Umsatz wachsen lassen.</p>
    <div class="hero-ctas">
      <a href="#kontakt" class="hero-cta">Projekt starten <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a><a href="/preise/" class="hero-cta ghost">Preise ansehen</a>
    </div>
  </div>
</section>

  

<section id="leistungen" class="sec">
  <div class="sec-head rv">
    <div><p class="slabel">Leistungen</p><h2 class="sec-title">Was wir<br/><span class="ac">bauen.</span></h2></div>
    <span class="sec-meta">Design · Entwicklung<br/>SEO · Betreuung</span>
  </div>
  <div class="sl-list">
    <div class="sl-item rv">
      <a href="#kontakt">
        <div class="sl-head">
          <span class="sl-num">01</span>
          <h3 class="sl-title">Websites</h3>
          <span class="sl-tag">Unternehmen</span>
          <span class="sl-arr"><?php echo $arrow; ?></span>
        </div>
        <div class="sl-body"><div class="sl-inner"><div class="sl-detail">
          <p class="sl-desc">Moderne Auftritte für KMU, Handwerk &amp; Dienstleister — klar strukturiert, schnell und so gebaut, dass aus Besuchern Anfragen werden.</p>
          <span class="sl-meta">Design<br/>Dev<br/>CMS</span>
        </div></div></div>
      </a>
    </div>
    <div class="sl-item rv d1">
      <a href="#kontakt">
        <div class="sl-head">
          <span class="sl-num">02</span>
          <h3 class="sl-title">Onlineshops</h3>
          <span class="sl-tag">E-Commerce</span>
          <span class="sl-arr"><?php echo $arrow; ?></span>
        </div>
        <div class="sl-body"><div class="sl-inner"><div class="sl-detail">
          <p class="sl-desc">Verkaufen rund um die Uhr — sauber umgesetzt mit Shopify &amp; Co. Vom Design bis zur Zahlungsanbindung.</p>
          <span class="sl-meta">Shopify<br/>Zahlung<br/>Design</span>
        </div></div></div>
      </a>
    </div>
    <div class="sl-item rv">
      <a href="#kontakt">
        <div class="sl-head">
          <span class="sl-num">03</span>
          <h3 class="sl-title">Landingpages</h3>
          <span class="sl-tag">Kampagne</span>
          <span class="sl-arr"><?php echo $arrow; ?></span>
        </div>
        <div class="sl-body"><div class="sl-inner"><div class="sl-detail">
          <p class="sl-desc">Fokussierte Seiten für Ads &amp; Aktionen, die gezielt Anfragen generieren — ohne Ablenkung, direkt zur Conversion.</p>
          <span class="sl-meta">Copy<br/>Tracking<br/>Ads</span>
        </div></div></div>
      </a>
    </div>
    <div class="sl-item rv d1">
      <a href="#kontakt">
        <div class="sl-head">
          <span class="sl-num">04</span>
          <h3 class="sl-title">Lokale SEO</h3>
          <span class="sl-tag">Sichtbarkeit</span>
          <span class="sl-arr"><?php echo $arrow; ?></span>
        </div>
        <div class="sl-body"><div class="sl-inner"><div class="sl-detail">
          <p class="sl-desc">Damit dich Kunden im Raum Stuttgart &amp; Ludwigsburg bei Google finden — und nicht die Konkurrenz. Technik, Inhalte und Google-Profil aus einer Hand.</p>
          <span class="sl-meta">Google<br/>Maps<br/>Technik</span>
        </div></div></div>
      </a>
    </div>
  </div>
</section>

<section id="referenzen" class="sec">
  <div class="sec-head rv">
    <div><p class="slabel">Referenzen</p><h2 class="sec-title">Unsere<br/><span class="ac">Arbeit.</span></h2></div>
    <span class="sec-meta">Live &amp; in Betrieb</span>
  </div>
  <div class="ref-list">
    <div class="ref-item rv">
      <div class="ref-screen">
        <picture><source srcset="/wp-content/themes/mystu/assets/mystuShop.webp" type="image/webp"/><img src="/wp-content/themes/mystu/assets/mystuShop.jpg" alt="mystu.shop Referenz" width="1440" height="900" loading="lazy"/></picture>
      </div>
      <div>
        <p class="ref-tag">Shopify · E-Commerce</p>
        <h3 class="ref-name">mystu<br/>Shop</h3>
        <p class="ref-desc">Exklusive Stuttgart Fanartikel — designed in Stuttgart, produziert auf Bestellung. Von Shirts über Hoodies bis zu Caps, alles mit Seele für den Kessel.</p>
        <div class="ref-chips">
          <span class="ref-chip">Shopify</span>
          <span class="ref-chip">Custom Theme</span>
          
          <span class="ref-chip">Stuttgart</span>
        </div>
        <a href="https://mystu.shop" target="_blank" rel="noopener" class="ref-link">Zum Shop <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </div>
    </div>
    <div class="ref-item rv">
      <div class="ref-screen">
        <picture><source srcset="/wp-content/themes/mystu/assets/anderthalbbar.webp" type="image/webp"/><img src="/wp-content/themes/mystu/assets/anderthalbbar.jpg" alt="anderthalb Bar Referenz" width="1440" height="900" loading="lazy"/></picture>
      </div>
      <div>
        <p class="ref-tag">Webdesign · Gastronomie</p>
        <h3 class="ref-name">anderthalb<br/>Bar</h3>
        <p class="ref-desc">Cocktailbar in Stuttgart-Mitte — Events, Live-Musik und DJ-Sets. Website mit Eventkalender, Buchungsformular und mobilem Design.</p>
        <div class="ref-chips">
          <span class="ref-chip">Webdesign</span>
          <span class="ref-chip">Gastronomie</span>
          <span class="ref-chip">Stuttgart</span>
        </div>
        <a href="https://anderthalb-bar.de" target="_blank" rel="noopener" class="ref-link">Zur Website <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </div>
    </div>
  </div>

  <div class="ref-divider">Mockup-Referenzen</div>

  <div class="ref-mockups">
    <div class="ref-mock rv">
      <div class="ref-mock-frame">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/handwerk-preview.png" alt="Vorschau der Handwerker-Webseite" loading="lazy" style="width:100%;height:100%;object-fit:cover;object-position:top;display:block"/>
      </div>
      <div class="ref-mock-info">
        <p class="ref-mock-tag">WordPress · Handwerk</p>
        <div class="ref-mock-name">Müller Bau</div>
      </div>
      <div class="ref-mock-over">
        <a href="<?php echo esc_url(home_url('/handwerker-webseite/')); ?>" target="_blank" rel="noopener" class="ref-mock-link" aria-label="Handwerker-Webseite in neuem Tab ansehen">Live ansehen →</a>
      </div>
    </div>
    <div class="ref-mock rv">
      <div class="ref-mock-frame">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/fahrschule-preview.png" alt="Vorschau des Fahrschul-Mockups" loading="lazy" style="width:100%;height:100%;object-fit:cover;object-position:top;display:block"/>
      </div>
      <div class="ref-mock-info">
        <p class="ref-mock-tag">Landingpage · Fahrschule</p>
        <div class="ref-mock-name">DriveNow</div>
      </div>
      <div class="ref-mock-over">
        <a href="<?php echo esc_url(home_url('/mockup-fahrschule/')); ?>" target="_blank" rel="noopener" class="ref-mock-link" aria-label="Fahrschul-Mockup in neuem Tab ansehen">Live ansehen →</a>
      </div>
    </div>
    <div class="ref-mock rv d1">
      <div class="ref-mock-frame">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/anwalt-preview.png" alt="Vorschau des Kanzlei-Mockups" loading="lazy" style="width:100%;height:100%;object-fit:cover;object-position:top;display:block"/>
      </div>
      <div class="ref-mock-info">
        <p class="ref-mock-tag">Landingpage · Kanzlei</p>
        <div class="ref-mock-name">Kanzlei Westend</div>
      </div>
      <div class="ref-mock-over">
        <a href="<?php echo esc_url(home_url('/mockup-anwalt/')); ?>" target="_blank" rel="noopener" class="ref-mock-link" aria-label="Kanzlei-Mockup in neuem Tab ansehen">Live ansehen →</a>
      </div>
    </div>
    <div class="ref-mock rv">
      <div class="ref-mock-frame">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/zahnarzt-preview.png" alt="Vorschau des Zahnarzt-Mockups" loading="lazy" style="width:100%;height:100%;object-fit:cover;object-position:top;display:block"/>
      </div>
      <div class="ref-mock-info">
        <p class="ref-mock-tag">WordPress · Zahnarzt</p>
        <div class="ref-mock-name">Dr. Klein</div>
      </div>
      <div class="ref-mock-over">
        <a href="<?php echo esc_url(home_url('/mockup-zahnarzt/')); ?>" target="_blank" rel="noopener" class="ref-mock-link" aria-label="Zahnarzt-Mockup in neuem Tab ansehen">Live ansehen →</a>
      </div>
    </div>
  </div>
</section>


<section id="warum" class="sec">
  <div class="sec-head rv">
    <div><p class="slabel">Warum mystu</p><h2 class="sec-title">Kein Bla,<br/><span class="ac">nur Ergebnis.</span></h2></div>
    <span class="sec-meta">Klein, schnell<br/>&amp; persönlich</span>
  </div>
  <div class="why-stack">
    <div class="why-row rv">
      <span class="why-ghost">01</span>
      <div class="why-left">
        <p class="why-index">01</p>
        <h3 class="why-h">Direkt mit<br/>dem Macher</h3>
      </div>
      <div class="why-right">
        <p class="why-p">Kein Account-Manager, keine Warteschleife. Du sprichst mit den Leuten, die deine Seite wirklich bauen — ohne Umwege, ohne Bullshit.</p>
      </div>
    </div>
    <div class="why-row rv d1">
      <span class="why-ghost">02</span>
      <div class="why-left">
        <p class="why-index">02</p>
        <h3 class="why-h">Antwort<br/>in 24h</h3>
      </div>
      <div class="why-right">
        <p class="why-p">Kurze Wege, schnelle Rückmeldung und eine ehrliche Einschätzung — bevor du dich auf irgendetwas festlegst.</p>
      </div>
    </div>
    <div class="why-row rv d2">
      <span class="why-ghost">03</span>
      <div class="why-left">
        <p class="why-index">03</p>
        <h3 class="why-h">Fair &amp;<br/>transparent</h3>
      </div>
      <div class="why-right">
        <p class="why-p">Festpreis statt böser Überraschungen. Du weißt vorher genau, was es kostet und was du dafür bekommst.</p>
      </div>
    </div>
  </div>
</section>

<section id="team" class="sec">
  <div class="team-intro rv">
    <p class="team-intro-label">Das Team</p>
    <p class="team-intro-text">Yusuf und Michele sind wie <b>Yin und Yang</b> — einer denkt in Pixeln, der andere in Code. Was rauskommt, wenn Design auf Entwicklung trifft? Websites, die aussehen wie Kunst und funktionieren wie eine Maschine.</p>
  </div>
  <div class="team-duo">
    <div class="team-card rv">
      <picture><source srcset="<?php echo get_template_directory_uri(); ?>/assets/michele.webp" type="image/webp"/><img class="team-img" src="<?php echo get_template_directory_uri(); ?>/assets/michele.jpg" alt="Michele – Designer bei mystu" width="600" height="800" loading="lazy"/></picture>
      <div class="team-card-over">
        <p class="team-card-role">Designer</p>
        <h3 class="team-card-name">Michele</h3>
        <p class="team-card-bio">Über 10 Jahre Erfahrung — von Websites bis Apps, von Flyern bis Branding. Und VfB-Fan seit Kindheit.</p>
        <div class="team-card-tags">
          <span class="team-tag">UI/UX</span>
          <span class="team-tag">App Design</span>
          <span class="team-tag">Print</span>
          <span class="team-tag">VfB ♥</span>
        </div>
      </div>
    </div>
    <div class="team-card rv d1">
      <picture><source srcset="<?php echo get_template_directory_uri(); ?>/assets/yusuf.webp" type="image/webp"/><img class="team-img" src="<?php echo get_template_directory_uri(); ?>/assets/yusuf.jpg" alt="Yusuf – Entwickler bei mystu" width="1200" height="1800" loading="lazy"/></picture>
      <div class="team-card-over">
        <p class="team-card-role">Entwickler</p>
        <h3 class="team-card-name">Yusuf</h3>
        <p class="team-card-bio">Über 10 Jahre Erfahrung — Typo3, Shopify, WordPress, KI. Egal was es ist, er fuchst sich rein und liefert.</p>
        <div class="team-card-tags">
          <span class="team-tag">WordPress</span>
          <span class="team-tag">Shopify</span>
          <span class="team-tag">Typo3</span>
          <span class="team-tag">KI</span>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="kontakt" class="sec">
  <div class="kt-glow"></div>
  <div class="kt-grid">
    <div class="rv">
      <p class="slabel">Kontakt</p>
      <h2 class="kt-title">Lass uns<br/><span class="ac">reden.</span></h2>
      <p class="kt-text">Erzähl uns kurz von deinem Vorhaben — wir melden uns innerhalb von 48 Stunden mit einer ehrlichen Einschätzung.</p>
      <div class="kt-links">
        <a class="kt-link" href="mailto:hi@mystu.de"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.6"/></svg>hi@mystu.de</a>
        <a class="kt-link" href="tel:+4915123456789"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M5 4h4l2 5-3 2a11 11 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>+49 151 2345 6789</a>
      </div>
    </div>

    <form class="kt-form rv d1" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
      <?php if ($lead_sent): ?><p class="kt-msg ok">Danke! Deine Anfrage ist angekommen — wir melden uns innerhalb von 48 Stunden.</p><?php endif; ?>
      <?php if ($lead_error): ?><p class="kt-msg err">Da ist etwas schiefgelaufen. Bitte prüfe deine Eingaben oder schreib uns direkt an hi@mystu.de.</p><?php endif; ?>
      <input type="hidden" name="action" value="mystu_lead_request"/>
      <?php wp_nonce_field('mystu_lead_request', 'mystu_lead_nonce'); ?>
      <div class="kt-field"><label for="kt-name">Name</label><input id="kt-name" name="name" type="text" required placeholder="Dein Name"/></div>
      <div class="kt-field"><label for="kt-mail">E-Mail</label><input id="kt-mail" name="email" type="email" required placeholder="dein@email.de"/></div>
      <div class="kt-field"><label for="kt-type">Was brauchst du?</label>
        <select id="kt-type" name="projekt">
          <option>Website</option><option>Onlineshop</option><option>Landingpage</option><option>SEO / Sichtbarkeit</option><option>Bin mir noch unsicher</option>
        </select>
      </div>
      <div class="kt-field"><label for="kt-msg">Nachricht</label><textarea id="kt-msg" name="nachricht" required placeholder="Erzähl uns kurz von deinem Projekt …"></textarea></div>
      <div class="kt-field kt-captcha">
        <label for="kt-cap">Sicherheitsfrage: Was ist <?php echo esc_html($cap_n1); ?> − <?php echo esc_html($cap_n2); ?>?</label>
        <input id="kt-cap" name="captcha_answer" type="number" required placeholder="Deine Antwort"/>
        <input type="hidden" name="captcha_token" value="<?php echo esc_attr($cap_token); ?>"/>
      </div>
      <label class="kt-check"><input type="checkbox" name="datenschutz" required/> Ich habe die <a href="<?php echo esc_url(home_url('/datenschutz/')); ?>">Datenschutzerklärung</a> gelesen und stimme der Verarbeitung meiner Daten zu.</label>
      <button type="submit">Anfrage senden</button>
      <p class="kt-note">Mit dem Absenden stimmst du der Verarbeitung deiner Daten zu. Siehe <a href="<?php echo esc_url(home_url('/datenschutz/')); ?>">Datenschutz</a> / <a href="<?php echo esc_url(home_url('/impressum/')); ?>">Impressum</a>.</p>
    </form>
  </div>

<div class="calendly-wrap rv d2">
  <div class="calendly-head">
    <p class="slabel">Oder direkt Termin buchen</p>
    <h3 class="calendly-title">Schnell & unkompliziert.</h3>
    <p class="calendly-sub">Wähle einen freien Slot — wir sind <strong>Mo–Fr ab 18 Uhr</strong> verfügbar.</p>
  </div>
  <div class="calendly-inline-widget" data-url="https://calendly.com/mystude?hide_gdpr_banner=1&background_color=101110&text_color=f4f5f1&primary_color=c9ff2e" style="min-width:280px;height:650px"></div>
</div>
</section>

</main>
<footer class="mfoot">
  <div class="mfoot-top">
    <div><a href="<?php echo $home; ?>" class="mfoot-logo" aria-label="mystu"><?php echo $logo_svg; ?></a><p class="mfoot-desc">Webdesign-Agentur aus dem Raum Stuttgart &amp; Ludwigsburg. Websites, die Kunden bringen.</p></div>
  </div>
  <div class="mfoot-bot">
    <p class="mfoot-copy">&copy; <?php echo date('Y'); ?> mystu — Alle Rechte vorbehalten. <a href="<?php echo esc_url(home_url('/impressum/')); ?>" style="color:inherit;text-decoration:underline;text-underline-offset:3px">Impressum</a> · <a href="<?php echo esc_url(home_url('/datenschutz/')); ?>" style="color:inherit;text-decoration:underline;text-underline-offset:3px">Datenschutz</a> · <a href="<?php echo esc_url(home_url('/agb/')); ?>" style="color:inherit;text-decoration:underline;text-underline-offset:3px">AGB</a> · <a href="#" class="mystu-cookie-settings" style="color:inherit;text-decoration:underline;text-underline-offset:3px">Cookie-Einstellungen</a></p>
    <p class="mfoot-made">Made in Stuttgart von <span>Yusuf &amp; Michele</span></p>
  </div>
</footer>

<script>
window.addEventListener('load',function(){setTimeout(function(){var l=document.getElementById('loader');if(l)l.classList.add('out')},1200)});
(function(){
  var nav=document.getElementById('mnav'),prog=document.getElementById('prog');
  addEventListener('scroll',function(){
    if(nav)nav.classList.toggle('stuck',scrollY>50);
    if(prog)prog.style.width=(scrollY/(document.body.scrollHeight-innerHeight)*100)+'%';
  });
})();
(function(){
  var obs=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('vis');obs.unobserve(e.target)}})},{threshold:.12});
  document.querySelectorAll('.rv').forEach(function(el){obs.observe(el)});
})();
(function(){
  var burger=document.querySelector('.mnav-burger');
  var menu=document.getElementById('mob-menu');
  if(!burger||!menu) return;
  function toggleMenu(open){
    burger.classList.toggle('open',open);
    menu.classList.toggle('open',open);
    menu.setAttribute('aria-hidden',open?'false':'true');
    document.body.style.overflow=open?'hidden':'';
  }
  burger.addEventListener('click',function(){
    toggleMenu(!menu.classList.contains('open'));
  });
  menu.querySelectorAll('.mob-link').forEach(function(a){
    a.addEventListener('click',function(){toggleMenu(false)});
  });
  document.addEventListener('keydown',function(e){
    if(e.key==='Escape') toggleMenu(false);
  });
})();
</script>

<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
<?php wp_footer(); ?>
</body>
</html>
