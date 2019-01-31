<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html lang="en">

<head>
<title>測試頁面</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
<?php
$this->jquery_loader->package('jquery');
$this->jquery_loader->js('myweb');
?>
</head>
<body>
	<input type="button" id='enter' value="送出">
</body>
</html>
<script>
var base_url = "<?php echo base_url(); ?>";
</script>