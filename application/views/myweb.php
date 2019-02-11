<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html lang="en">

<head>
<title>測試頁面</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<?php
$this->jquery_loader->package('jquery');
$this->jquery_loader->js_loader('myweb');
?>
</head>

<body>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-4"><h3>登入</h3>
			<div class="panel-body">
                <form accept-charset="UTF-8" role="form" action="<?php echo base_url('login/get_user/'); ?>" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input tabindex="2" id="textinput" name="name" type="text" placeholder="請輸入帳號" class="form-control input-md" value="" required="">
                        </div>
                        <div class="form-group">
                            <input tabindex="3" id="textinput" name="password" type="password" placeholder="請輸入密碼" class="form-control input-md" required="">
                        </div>
                        <div class="form-group">
                                                    </div>
                        <button class="btn btn-lg btn-secondary btn-block" type="submit" value="Login">登入</button>
                    </fieldset>
                </form>
		</div>
  		</div>
		</div>
	</div>
</div>
</body>
</html>

<script>
var base_url = "<?php echo base_url(); ?>";
</script>