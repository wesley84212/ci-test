$(document).ready(function () {
    $('#register').click(function () {
        var username = $('#reg_account').val();
        var password = $('#reg_password').val();
        var email = $('#reg_email').val();
        var reg_array = {
            'name': username,
            'password': password,
            'email': email
        };
        $.ajax({
            url: base_url + 'login/register',
            type: 'post',
            datatype: 'string',
            data: reg_array,
            success: function (data) {
                if (data === 'success') {
                    alert('註冊成功');
                    $('#registered').modal('hide');
                } else {
                    alert(data);
                }
            },
            complete: function () {
                var html = '';
                html += '<div class="form-group">';
                html += '<input tabindex="2" id="reg_account" name="name" type="text" placeholder="請輸入帳號" class="form-control input-md" value="" required="">';
                html += '</div>';
                html += '<div class="form-group">';
                html += '<input tabindex="3" id="reg_password" name="password" type="password" placeholder="請輸入密碼" class="form-control input-md" required="">';
                html += '</div>';
                html += '<div class="form-group">';
                html += '<input tabindex="3" id="reg_email" name="email" type="email" placeholder="請輸入聯絡信箱" class="form-control input-md" required="">';
                html += '</div>';
                html += '<div class="form-group" id="reg_error">';
                html += '</div>';
                $('.modal-body').html(html);
            }
        })
    });
});