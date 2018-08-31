 <!DOCTYPE html>
<html>
<body>
<?php
//<form method="post">
ob_start();
echo $_GET['url'];
$purl = ob_get_contents();
ob_end_clean();
ob_start();
echo $_GET['sp'];
$psp = ob_get_contents();
ob_end_clean();
ob_start();
echo $_GET['sv'];
$psv = ob_get_contents();
ob_end_clean();
ob_start();
echo $_GET['sig'];
$psig = ob_get_contents();
ob_end_clean();
//echo "$purl&sp=$psp&sv=$psv&sig=$psig";
if (isset($_POST['button']))
    {
         //shell_exec('curl -d "{ "aprove":"aproved" }" -XPOST $purl');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"$purl&sp=$psp&sv=$psv&sig=$psig");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{ aprove\":\"aproved\"");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);
echo $server_output;
// Further processing ...
//if ($server_output == "OK") { ... } else { ... };
}
?>

<form method="post">
    <p>
        <form method="post">
    <p>
        <button name="button" style="background-color:#556270;border:1px solid #000000;border-radius:8px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:50px;font-weight:bold;line-height:80px;text-align:center;text-decoration:none;width:400px;-webkit-text-size-adjust:none;mso-hide:all;"  >Aprovar</button>
    </p>
    </form>
<input type="text" name="Comments" /><br>
</body>
</html> 
