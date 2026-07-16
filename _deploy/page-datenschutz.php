<?php
/**
 * Template Name: Datenschutz
 * Self-contained Datenschutz page matching the dark front-page style.
 */
defined('ABSPATH') || exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Datenschutzerklärung — mystu</title>
<meta name="robots" content="noindex,follow"/>
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
.impr-hero h1{font-family:var(--fD);font-size:clamp(3rem,8vw,7rem);font-weight:800;line-height:.9;letter-spacing:.02em;text-transform:uppercase}

.impr-body{max-width:760px;margin:0 auto;padding:clamp(48px,8vw,96px) var(--pad)}

.impr-section{margin-bottom:44px}
.impr-section:last-child{margin-bottom:0}
.impr-section h2{font-family:var(--fD);font-size:clamp(1.3rem,2.6vw,1.9rem);font-weight:700;letter-spacing:.05em;text-transform:uppercase;margin-bottom:16px;color:var(--ac)}
.impr-section h3{font-family:var(--fB);font-size:1rem;font-weight:600;letter-spacing:.02em;margin:22px 0 8px;color:var(--w)}
.impr-section p,.impr-section address,.impr-section li{font-size:.95rem;font-weight:300;line-height:1.8;color:var(--mu2);font-style:normal}
.impr-section p+p{margin-top:10px}
.impr-section ul{margin:8px 0 0 20px}
.impr-section li{margin-bottom:4px}
.impr-section a{color:var(--ac);text-decoration:underline;text-underline-offset:3px}
.impr-section a:hover{color:var(--w)}
.impr-divider{border:none;border-top:1px solid var(--ln);margin:44px 0}

/* FOOTER */
.mfoot{border-top:1px solid var(--ln);padding:clamp(24px,4vw,40px) var(--pad)}
.mfoot-bot{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px}
.mfoot-copy{font-size:.65rem;font-weight:300;color:var(--mu2);letter-spacing:.04em}
.mfoot-copy a{color:var(--mu2);text-decoration:underline;text-underline-offset:3px}
.mfoot-copy a:hover{color:var(--ac)}
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
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700;800;900&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet"/>
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
    <h1>Datenschutz</h1>
  </div>

  <div class="impr-body">

    <div class="impr-section">
      <h2>1. Verantwortlicher</h2>
      <p>Verantwortlicher im Sinne der Datenschutz-Grundverordnung (DSGVO) ist:</p>
      <address>
        mystu Michele Taormina, Yusuf Ahmed GbR<br/>
        Augsburger Str. 599<br/>
        70329 Stuttgart<br/>
        Deutschland<br/><br/>
        Telefon: <a href="tel:+4917656061226">017656061226</a><br/>
        E-Mail: <a href="mailto:hi@mystu.de">hi@mystu.de</a>
      </address>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>2. Allgemeines zur Datenverarbeitung</h2>
      <p>Wir verarbeiten personenbezogene Daten unserer Nutzer grundsätzlich nur, soweit dies zur Bereitstellung einer funktionsfähigen Website sowie unserer Inhalte und Leistungen erforderlich ist. Die Verarbeitung erfolgt regelmäßig nur nach Einwilligung der Nutzer (Art. 6 Abs. 1 lit. a DSGVO) oder soweit die Verarbeitung durch gesetzliche Vorschriften gestattet ist – insbesondere zur Vertragserfüllung (Art. 6 Abs. 1 lit. b DSGVO) oder zur Wahrung berechtigter Interessen (Art. 6 Abs. 1 lit. f DSGVO).</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>3. Hosting &amp; Server-Logfiles</h2>
      <p>Unsere Website wird bei einem externen Dienstleister (Hoster) betrieben. Die personenbezogenen Daten, die auf dieser Website erfasst werden, werden auf den Servern des Hosters gespeichert. Der Server befindet sich in Deutschland.</p>
      <p>Bei jedem Aufruf der Website erfasst unser System automatisiert Daten und Informationen des aufrufenden Geräts in sogenannten Server-Logfiles. Erfasst werden:</p>
      <ul>
        <li>die IP-Adresse des anfragenden Geräts,</li>
        <li>Datum und Uhrzeit des Zugriffs,</li>
        <li>die aufgerufene Seite/Datei sowie übertragene Datenmenge,</li>
        <li>Meldung über erfolgreichen Abruf (Statuscode),</li>
        <li>verwendeter Browser-Typ und Version sowie das Betriebssystem,</li>
        <li>die zuvor besuchte Seite (Referrer).</li>
      </ul>
      <p>Rechtsgrundlage ist unser berechtigtes Interesse an der technisch fehlerfreien Darstellung und der Sicherheit unserer Website (Art. 6 Abs. 1 lit. f DSGVO). Die Logfiles werden zur Gewährleistung der Sicherheit für eine begrenzte Zeit gespeichert und anschließend gelöscht.</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>4. SSL-/TLS-Verschlüsselung</h2>
      <p>Diese Seite nutzt aus Sicherheitsgründen und zum Schutz der Übertragung vertraulicher Inhalte eine SSL- bzw. TLS-Verschlüsselung. Eine verschlüsselte Verbindung erkennen Sie daran, dass die Adresszeile des Browsers von „http://“ auf „https://“ wechselt.</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>5. Cookies &amp; Einwilligung</h2>
      <p>Unsere Website verwendet Cookies. Cookies sind kleine Textdateien, die auf Ihrem Endgerät gespeichert werden. Wir setzen zum einen technisch notwendige Cookies ein, die für den Betrieb der Website erforderlich sind (Rechtsgrundlage: berechtigtes Interesse, Art. 6 Abs. 1 lit. f DSGVO bzw. § 25 Abs. 2 TDDDG).</p>
      <p>Zum anderen setzen wir nur mit Ihrer Einwilligung Cookies und Dienste zu Analysezwecken ein (Google Analytics, siehe Ziff. 7). Diese werden erst geladen, nachdem Sie im Cookie-Banner auf „Alle akzeptieren“ geklickt haben (Rechtsgrundlage: Einwilligung, Art. 6 Abs. 1 lit. a DSGVO, § 25 Abs. 1 TDDDG).</p>
      <p>Ihre Auswahl wird in einem Cookie (<em>mystu_consent</em>) gespeichert. Sie können Ihre Einwilligung jederzeit mit Wirkung für die Zukunft widerrufen oder anpassen, indem Sie unten im Footer auf <a href="#" class="mystu-cookie-settings">„Cookie-Einstellungen“</a> klicken.</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>6. Kontaktaufnahme</h2>
      <p>Wenn Sie uns über das Kontaktformular, das Collab-Formular oder per E-Mail kontaktieren, verarbeiten wir die von Ihnen mitgeteilten Daten (z. B. Name, E-Mail-Adresse, Projektangaben und Ihre Nachricht), um Ihre Anfrage zu bearbeiten und zu beantworten.</p>
      <p>Die über das Formular übermittelten Daten werden per E-Mail an uns (hi@mystu.de) gesendet. Rechtsgrundlage ist Art. 6 Abs. 1 lit. b DSGVO (Anbahnung bzw. Erfüllung eines Vertrags), sofern Ihre Anfrage auf den Abschluss eines Vertrags gerichtet ist, andernfalls unser berechtigtes Interesse an der Beantwortung der Anfrage (Art. 6 Abs. 1 lit. f DSGVO). Zum Schutz vor automatisiertem Versand (Spam) verwenden wir eine einfache Rechenaufgabe; dabei werden keine Daten an Dritte übermittelt.</p>
      <p>Ihre Daten werden gelöscht, sobald sie für die Erreichung des Zwecks ihrer Erhebung nicht mehr erforderlich sind und keine gesetzlichen Aufbewahrungsfristen entgegenstehen.</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>7. Google Analytics</h2>
      <p>Diese Website nutzt – nur nach Ihrer Einwilligung – Google Analytics, einen Webanalysedienst der Google Ireland Limited, Gordon House, Barrow Street, Dublin 4, Irland („Google“). Google Analytics verwendet Cookies, die eine Analyse der Benutzung der Website ermöglichen (Mess-ID: G-TYTYZM3434).</p>
      <p>Wir haben die IP-Anonymisierung aktiviert (<em>anonymize_ip</em>), sodass Ihre IP-Adresse von Google innerhalb der EU/des EWR vor der Übermittlung gekürzt wird. Google Analytics wird ausschließlich geladen, wenn Sie im Cookie-Banner eingewilligt haben. Rechtsgrundlage ist Ihre Einwilligung (Art. 6 Abs. 1 lit. a DSGVO, § 25 Abs. 1 TDDDG).</p>
      <p>Eine Übermittlung von Daten in die USA kann nicht ausgeschlossen werden. Google ist unter dem EU-US Data Privacy Framework zertifiziert. Sie können Ihre Einwilligung jederzeit über die <a href="#" class="mystu-cookie-settings">Cookie-Einstellungen</a> widerrufen. Weitere Informationen finden Sie in der Datenschutzerklärung von Google: <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">policies.google.com/privacy</a>.</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>8. Google Fonts</h2>
      <p>Zur einheitlichen Darstellung von Schriftarten nutzt diese Website Schriftarten von Google (Google Fonts), bereitgestellt durch die Google Ireland Limited. Beim Aufruf einer Seite lädt Ihr Browser die benötigten Schriften, um Texte korrekt anzuzeigen. Dabei wird Ihre IP-Adresse an Google übertragen. Rechtsgrundlage ist unser berechtigtes Interesse an einer ansprechenden und einheitlichen Darstellung unseres Online-Angebots (Art. 6 Abs. 1 lit. f DSGVO). Weitere Informationen: <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">policies.google.com/privacy</a>.</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>9. Terminbuchung über Calendly</h2>
      <p>Für die Vereinbarung von Terminen binden wir den Dienst Calendly der Calendly LLC, 271 17th St NW, Atlanta, Georgia 30363, USA, ein. Wenn Sie die Terminbuchung nutzen, werden die von Ihnen eingegebenen Daten (z. B. Name, E-Mail-Adresse, Terminwunsch) durch Calendly verarbeitet. Dabei können Daten in die USA übertragen werden. Rechtsgrundlage ist Art. 6 Abs. 1 lit. b DSGVO (Durchführung vorvertraglicher Maßnahmen) bzw. unser berechtigtes Interesse an einer einfachen Terminvereinbarung (Art. 6 Abs. 1 lit. f DSGVO). Weitere Informationen: <a href="https://calendly.com/de/privacy" target="_blank" rel="noopener">calendly.com/de/privacy</a>.</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>10. Ihre Rechte</h2>
      <p>Sie haben gegenüber uns folgende Rechte hinsichtlich der Sie betreffenden personenbezogenen Daten:</p>
      <ul>
        <li>Recht auf Auskunft (Art. 15 DSGVO),</li>
        <li>Recht auf Berichtigung (Art. 16 DSGVO),</li>
        <li>Recht auf Löschung (Art. 17 DSGVO),</li>
        <li>Recht auf Einschränkung der Verarbeitung (Art. 18 DSGVO),</li>
        <li>Recht auf Datenübertragbarkeit (Art. 20 DSGVO),</li>
        <li>Recht auf Widerspruch gegen die Verarbeitung (Art. 21 DSGVO),</li>
        <li>Recht auf Widerruf einer erteilten Einwilligung mit Wirkung für die Zukunft (Art. 7 Abs. 3 DSGVO).</li>
      </ul>
      <p>Zur Ausübung Ihrer Rechte genügt eine formlose Nachricht an <a href="mailto:hi@mystu.de">hi@mystu.de</a>.</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>11. Beschwerderecht bei der Aufsichtsbehörde</h2>
      <p>Unbeschadet eines anderweitigen verwaltungsrechtlichen oder gerichtlichen Rechtsbehelfs steht Ihnen ein Beschwerderecht bei einer Aufsichtsbehörde zu. Für uns zuständig ist der Landesbeauftragte für den Datenschutz und die Informationsfreiheit Baden-Württemberg, Lautenschlagerstraße 20, 70173 Stuttgart (<a href="https://www.baden-wuerttemberg.datenschutz.de" target="_blank" rel="noopener">baden-wuerttemberg.datenschutz.de</a>).</p>
    </div>

    <hr class="impr-divider"/>

    <div class="impr-section">
      <h2>12. Aktualität</h2>
      <p>Diese Datenschutzerklärung ist aktuell gültig. Durch die Weiterentwicklung unserer Website oder aufgrund geänderter gesetzlicher bzw. behördlicher Vorgaben kann es notwendig werden, diese Datenschutzerklärung zu ändern.</p>
      <p>Stand: <?php echo date('m/Y'); ?></p>
    </div>

  </div>
</main>

<footer class="mfoot">
  <div class="mfoot-bot">
    <p class="mfoot-copy">&copy; <?php echo date('Y'); ?> mystu &mdash; Alle Rechte vorbehalten. <a href="<?php echo esc_url(home_url('/impressum/')); ?>">Impressum</a> &middot; <a href="<?php echo esc_url(home_url('/agb/')); ?>">AGB</a> &middot; <a href="#" class="mystu-cookie-settings">Cookie-Einstellungen</a></p>
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
