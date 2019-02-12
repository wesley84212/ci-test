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
                    $('#reg_error').html(data);
                }
            }
        })
    });
});