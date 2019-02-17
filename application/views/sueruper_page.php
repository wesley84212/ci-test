<style>
#info{
    float:right;
}
</style>

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
<?php
$this->jquery_loader->js_loader('logout');
$this->jquery_loader->css_loader('login_page');
?>
</head>

<body>
   <div id="banner">
       <div id="info">歡迎<span id="user"><?php echo ($this->session->userinfo['name']) ?></span>
       <button type="submit" class="btn btn-primary" id="logout">登出</button>
    </div>
</div>

</body>

</html>
<script>
var base_url = "<?php echo base_url(); ?>";
</script>