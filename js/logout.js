$(document).ready(function () {

    $('#logout').click(function () {
        $.ajax({
            url: base_url + 'logout/clear_session',
            type: 'post',

            success: function () {
                alert('登出成功');
                window.location.href = base_url
            }
        })
    });
});