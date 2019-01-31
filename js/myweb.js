$(document).ready(function () {

    $('#enter').click(function () {

        $.ajax({
            url: base_url + 'login/get_user/',
            type: 'POST',
            data: {
                name: 'wesley',
                password: '0000'
            },
            success: function (data) {
                console.log(data);
            }
        });
    });
});