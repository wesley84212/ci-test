$(function () {
    $('#jtable_content').initial_jtable({
        text: '目前使用者',
        defaultSorting: 'ID DESC',
        config: get_custom_config
    });

    $('#LoadRecordsButton').click(function (e) {
        e.preventDefault();
        $('#jtable_content').jtable_load();
    });

    function get_custom_config() {
        return {
            actions: {
                listAction: base_url + 'super_user/get_user_list/',
                updateAction: base_url + 'super_user/update_user/',
                deleteAction: base_url + 'super_user/delete_user/'
            },
            fields: {
                token: {
                    title: 'token',
                    key: true,
                    create: false,
                    edit: false,
                    list: false,
                    width: '2%'
                },
                name: {
                    title: 'Name',
                    width: '40%'
                },
                password: {
                    title: 'password',
                    width: '20%'
                },
                email: {
                    title: 'email',
                    width: '30%'
                },
                perm: {
                    title: 'Permission',
                    width: '30%',
                }
            }
        };
    }
});