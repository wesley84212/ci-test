$(document).ready(function () {

    $('#save').click(function () {
        $.ajax({
            url: base_url + 'add_report/clear_session',
            type: 'post',

            success: function () {
                alert('登出成功');
                window.location.href = base_url
            }
        })
    });
});