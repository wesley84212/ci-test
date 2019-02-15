
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html lang="en">

<head>
<title>測試頁面</title>
<meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
<?php
$this->jquery_loader->js_loader('myweb');
$this->jquery_loader->css_loader('myweb');
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
                            <input tabindex="2" id="account" name="name" type="text" placeholder="請輸入帳號" class="form-control input-md" value="" required="">
                        </div>
                        <div class="form-group">
                            <input tabindex="3" id="password" name="password" type="password" placeholder="請輸入密碼" class="form-control input-md" required="">
                        </div>
                        <div class="form-group" id="error_msg">
                        </div>
                        <button class="btn btn-lg btn-secondary btn-block" type="submit" value="Login" >登入</button>
                    </fieldset>
                </form>
                        <button type="button" class="btn btn-lg btn-secondary btn-block" data-toggle="modal" data-target="#registered">註冊</button>
  		    </div>
		</div>
	</div>
</div>

<!--registered Modal -->
<div class="modal fade" id="registered" taindex="-1" role="dialog" aria-labelledby="registered_label" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registered_label">註冊</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <input tabindex="2" id="reg_account" name="name" type="text" placeholder="請輸入帳號" class="form-control input-md" value="" required="">
                    </div>
                    <div class="form-group">
                            <input tabindex="3" id="reg_password" name="password" type="password" placeholder="請輸入密碼" class="form-control input-md" required="">
                    </div>
                    <div class="form-group">
                            <input tabindex="3" id="reg_email" name="email" type="email" placeholder="請輸入聯絡信箱" class="form-control input-md" required="">
                    </div>
                    <div class="form-group" id="reg_error">
                    </div>
                </div>
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="register">送出</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script>
var base_url = "<?php echo base_url(); ?>";
</script>
