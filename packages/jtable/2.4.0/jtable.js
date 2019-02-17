var jtable_global_config = {
    columnResizable: false,
    columnSelectable: false,
    paging: true,
    pageSize: 10,
    pageSizes: [10, 25, 50, 75, 100],
    sorting: true,
    multiSorting: true,
    messages: {
        serverCommunicationError: '連線時發生錯誤，請洽系統管理員',
        loadingMessage: '載入中...',
        noDataAvailable: '查無資料',
        addNewRecord: '新增',
        editRecord: '修改',
        areYouSure: '請確認',
        deleteConfirmation: '是否刪除？',
        save: '儲存',
        saving: '儲存中...',
        cancel: '取消',
        deleteText: '刪除',
        deleting: '刪除中...',
        error: '錯誤',
        close: '關閉',
        cannotLoadOptionsFor: '欄位無法載入 {0}',
        pagingInfo: '目前記錄: {0} 至 {1}, 總筆數: {2}',
        pageSizeChangeLabel: '每頁顯示筆數',
        gotoPageLabel: '跳至',
        canNotDeletedRecords: '無法刪除 {0} 至 {1} 的資料',
        deleteProggress: '正在刪除 {0} 至 {1} 的資料...'
    }
};

var jtable_child_config = $.extend({}, jtable_global_config);
jtable_child_config.paging = true;
jtable_child_config.sorting = true;

$.fn.initial_jtable = function(options) {
    var empty_callback = (function() {
        return {};
    });

    options = options || {};
    options.config = options.config || empty_callback;
    options.filter = options.filter || empty_callback;
    options.text = options.text || '';
    options.autoload = options.autoload === false ? false : true;

    var target = this;
    this.data('target', target);
    this.data('parameters_callback', options.filter);

    if ($.trim($(target).html()) !== '') {
        $(target).jtable('destroy');
    }

    $.fn.jtable_load = function() {
        $(this.data('target')).jtable('load', get_parameters(this));
    };

    $.fn.jtable_footer = function(columns) {
        var $jtable_content = $(this.data('target')).find('table.jtable');
        $jtable_content.find('tfoot').remove();

        columns = columns || [];
        var td_html = '';
        $.each(columns, function(i, value) {
            td_html += '<td>' + value + '</td>';
        });
        $jtable_content.append('<tfoot><tr>' + td_html + '</tr></tfoot>');
    };

    $.fn.jtable_selected_rows = function(options) {
        options = options || {};

        var $selectedRows = $(this.data('target')).jtable('selectedRows');

        var selected_records = [];
        $selectedRows.each(function() {
            var record = $(this).data('record');

            if (options.get_array) {
                selected_records.push(record[options.get_array]);
            } else if (options.get_object && options.get_object.length) {
                var wanted_fields = {};
                $.each(options.get_object, function(i, field) {
                    wanted_fields[field] = record[field];
                });
                selected_records.push(wanted_fields);
            } else {
                selected_records.push(record);
            }
        });
        return selected_records;
    };

    jtable_global_config.title = options.text;

    var jtable_config = $.extend({}, jtable_global_config, options.config());
    jtable_add_text_to_buttons(jtable_config, options.text);

    var formCreated = null;
    if (jtable_config.formCreated) {
        formCreated = jtable_config.formCreated;
    }

    var formCreatedWrapper = function(event, data) {
        if (formCreated) {
            formCreated(event, data);
        }

        if (data.formType === 'create') {
            $('.jtable-dialog-form .create-required').closest('.jtable-input-field-container').find('.jtable-input-label').append('<font color="red">*</font>');
        } else if (data.formType === 'edit') {
            $('.jtable-dialog-form .edit-required').closest('.jtable-input-field-container').find('.jtable-input-label').append('<font color="red">*</font>');
        }

        $('.jtable-dialog-form .required').closest('.jtable-input-field-container').find('.jtable-input-label').append('<font color="red">*</font>');
    };
    jtable_config.formCreated = formCreatedWrapper;

    $(target).jtable(jtable_config);

    if (options.autoload) {
        $(target).jtable('load', get_parameters(this));
    }

    function get_parameters(target) {
        return target.data('parameters_callback')();
    }
};

function jtable_add_text_to_buttons(config, text) {
    config.messages.addNewRecord += text;
    config.messages.editRecord += text;
    config.messages.deleteText += text;
}

$.fn.initial_jtable_child = function(options) {
    var empty_callback = (function() {
        return {};
    });

    options = options || {};
    options.config = options.config || empty_callback;
    options.filter = options.filter || empty_callback;
    options.text = options.text || '';
    options.icon = options.icon || '';
    options.icon_text = options.icon_text || '';
    options.autoload = options.autoload === false ? false : true;

    var target = this;
    var $icon = $(bootstrap.icon({icon: options.icon, text: options.icon_text}));
    $icon.click(function(e) {
        e.stopPropagation();
        var $icon_closest_tr = $icon.closest('tr');
        options.config = apply_jtable_child_config(options.config());
        options.config.title = get_text_of_column_header();
        jtable_add_text_to_buttons(options.config(), options.text);
        toggle_child_row($(target), $icon_closest_tr, options.config());
    });
    return $icon;

    function apply_jtable_child_config(jtable_custom_config) {
        return $.extend({}, jtable_child_config, jtable_custom_config);
    }

    function get_text_of_column_header() {
        return $icon.closest('table').find('th').eq(get_clicked_td_index()).text();
    }

    function get_clicked_td_index() {
        return $icon.closest('td').index();
    }

    function toggle_child_row($target, $closest_tr, child_config) {
        if (is_clicked_same_icon($closest_tr) && $target.jtable('isChildRowOpen', $closest_tr)) {
            $closest_tr.data('detail-index', '');
            $target.jtable('closeChildTable', $closest_tr);
        } else {
            $closest_tr.data('detail-index', get_clicked_td_index());
            $target.jtable('openChildTable', $closest_tr, child_config, get_child_data);
        }

        function is_clicked_same_icon($closest_tr) {
            return $closest_tr.data('detail-index') === get_clicked_td_index();
        }

        function get_child_data(data) {
            data.childTable.jtable('load', options.filter());
        }
    }
};
