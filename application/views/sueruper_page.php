<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<html lang="en">

<head>
<title>測試-管理介面</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/packages/jquery-ui/1.11.2/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/packages/jtable/2.4.0/themes/lightcolor/gray/jtable.min.css">
    <script src="<?php echo base_url(); ?>/packages/jquery-ui/1.11.2/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>/packages/jtable/2.4.0/jquery.jtable.min.js"></script>
    <script src="<?php echo base_url(); ?>/packages/jtable/2.4.0/jtable.js"></script>
<?php
$this->jquery_loader->js_loader('logout');
$this->jquery_loader->css_loader('login_page');
$this->jquery_loader->js_loader('super_user');
?>
</head>

<body>
   <div id="banner">
       <div id="info">歡迎<span id="user"><?php echo ($this->session->userinfo['name']) ?></span></div>
       <button type="submit" class="btn btn-primary" id="logout">登出</button>
    </div>
</div>

<div id="jtable_content"></div>
</body>

</html>
<script>
var base_url = "<?php echo base_url(); ?>";
</script>