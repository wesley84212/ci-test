$(document).ready(function () 
{

    $('#report_list').change(function()
    {
        var report_name =$('#report_list').val();
        var owner = $('#user').text();
        if(report_name==='請選擇'){
        }else{
        $.ajax({
            url:base_url+'add_report/get_report_detail',
            type :'POST',
            datatype:'json',
            data : {
                'report_name' : report_name,
                'owner' : owner
            },
            success :function(data){
                $('#input_text').val(data);
            },
        });
        }
    });

    $('#update').click(function()
    {
        update_report();
    });

    $('#insert').click(function()
    {
        insert_report();
    });

});

function update_report()
{
    var update_data = $('#input_text').val();
    var report_name =$('#report_list').val();
    var owner = $('#user').text();

    $.ajax({
        url:base_url+'add_report/update_report',
        type :'POST',
        datatype:'json',
        data : {
            'report_name' : report_name,
            'owner' : owner,
            'content' :update_data
        },
        success : function (data){
            if(data==='success'){
                alert('修改成功')
            }
        }
    });
};

function insert_report ()
{
    var report_name = $('#report_name').val();
    var report_text =$('#report_text').val();
    var owner = $('#user').text();

    $.ajax({
        url : base_url+'add_report/insert_report',
        type:'POST',
        datatype:'json',
        data : {
            'name' : report_name,
            'content':report_text,
            'owner' : owner,
            'active' :1
        },
        success : function (data){
            if(data==='success'){
                alert('新增成功')
                location.reload();
            }
        }
    });
}