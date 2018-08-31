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
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			 
			<button type="button" class="btn btn-primary btn-lg">
				Button
			</button>
			<p>
				Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
			</p>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html> 
