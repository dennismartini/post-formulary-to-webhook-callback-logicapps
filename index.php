 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Area de aprovação!</title>
    <meta name="author" content="LayoutIt!">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
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
//echo 'Aprovado'
// Further processing ...
//if ($server_output == "OK") { ... } else { ... };
}
?>
O Usuário <?php echo $_GET['usuario']; ?>  esta solicitando a execução de um script, se encontra no seu e-mail para avaliação.
<form  method="post">
<p>
<button id="button" name="button" class="btn btn-primary btn-lg">
Aprovar
</button>
</p>
</form>
<!--
<form action="script.html" method="post">
    <p>
        <button name="button" style="background-color:#556270;border:1px solid #000000;border-radius:8px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:50px;font-weight:bold;line-height:80px;text-align:center;text-decoration:none;width:400px;-webkit-text-size-adjust:none;mso-hide:all;"  >Aprovar</button>
    </p>
</form>
-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html> 
