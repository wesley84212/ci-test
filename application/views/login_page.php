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
<title>測試-登入後頁面</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<?php
$this->jquery_loader->js_loader('add_report');
$this->jquery_loader->js_loader('logout');
$this->jquery_loader->css_loader('login_page');
?>
</head>

<body>
   <div id="banner">
       <div id="info">歡迎<span id="user"><?php echo ($this->session->userinfo['name']) ?></span>
       <button type="submit" class="btn btn-primary" id="logout">登出</button>
    </div>
       <select id="report_list">
       <option>請選擇</option>
       <?php 
        $html='';
           foreach($field as $value){
            echo '<option>'.$value.'</option>';
           }
       ?>
        </select>
</div>

<div id="report_detail">
<textarea id="input_text" rows="4" cols="50"></textarea>
</div>
<button type="submit" class="btn btn-primary" id="save" data-toggle="modal" data-target="#inset_report">新增</button>
<button type="submit" class="btn btn-primary" id="update">修改</button>
<button type="submit" class="btn btn-primary" id="delete">刪除</button>
<!--inset report Modal -->
<div class="modal fade" id="inset_report" taindex="-1" role="dialog" aria-labelledby="inset_report_label" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inset_report_label">新增</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <input tabindex="2" id="report_name" name="name" type="text" placeholder="請輸入名稱" class="form-control input-md" value="" required="">
                    </div>
                    <div class="form-group">
                        請輸入內容
                    <textarea id="report_text" rows="4" cols="50"></textarea>
                    </div>
                    <div class="form-group" id="reg_error">
                    </div>
                </div>
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="insert">送出</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>
<script>
var base_url = "<?php echo base_url(); ?>";
</script>