<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html lang="en">

<head>
	<title>前端版面測試</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
<?php
$this->jquery_loader->package('jquery');
$this->jquery_loader->css('main');
?>
</head>
<body>
	<input type="button" id='enter' value="送出">
</body>
</html>