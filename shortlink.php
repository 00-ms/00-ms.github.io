<?php
function shortenURL($longURL) {
    $url = "https://klik.new-slunderghvip.my.id/add.php";
$data = "url=https://$longURL";
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_URL, $url);
        curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch2, CURLOPT_COOKIEJAR, getcwd()."/cok.txt");
        curl_setopt($ch2, CURLOPT_COOKIEFILE, getcwd()."/cok.txt");
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        $ress = curl_exec($ch2);
        curl_close($ch2);
        $exp = explode('"',$ress);
        return $exp[1];
        }
?>