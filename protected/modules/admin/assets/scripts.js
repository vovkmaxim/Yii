$(function () {

    tinyMCE.init({
        selector: "textarea.content-block"
    });
    // Side Bar Toggle
    $('.hide-sidebar').click(function () {
        $('#sidebar').hide('fast', function () {
            $('#content').removeClass('span9');
            $('#content').addClass('span12');
            $('.hide-sidebar').hide();
            $('.show-sidebar').show();
        });
    });

    $('.show-sidebar').click(function () {
        $('#content').removeClass('span12');
        $('#content').addClass('span9');
        $('.show-sidebar').hide();
        $('.hide-sidebar').show();
        $('#sidebar').show('fast');
    });

    var fixHelper = function (e, ui) {
        ui.children().each(function () {
            $(this).width($(this).width());
        });
        return ui;
    };

    $(".jobs tbody").sortable({
        helper: fixHelper,
        update: function (event, ui) {
            var order = $(this).sortable("serialize");
            $.ajax({
                url: '/admin/jobs/saveorder?' + order,
                data: {order: order},
                success: function (result) {
                }
            })
        }
    }).disableSelection();

    $(".projects tbody").sortable({
        helper: fixHelper,
        update: function (event, ui) {
            var order = $(this).sortable("serialize");
            $.ajax({
                url: '/admin/projects/saveorder?' + order,
                data: {order: order},
                success: function (result) {
                }
            })
        }
    }).disableSelection();


    $('body').on('click', '.add-pic', function (e) {
        e.preventDefault();
        $('.pics').append('<div><input type="file" name="img[]" /></div>');
        return false;
    })
    $('body').on('click', '.preview .delete-preview', function (e) {
        e.preventDefault();
        var _this = $(this);
        var deleteId = $(this).attr('id');
        $.ajax({
            url: '/admin/projects/deletepreview',
            data: {id: deleteId},
            type: 'post',
            success: function (result) {
                _this.parent().remove();
            }
        })
        return false;
    })

    $('body').on('click', '.preview .delete-pic', function (e) {
        e.preventDefault();
        var _this = $(this);
        var deleteId = $(this).attr('id');
        $.ajax({
            url: '/admin/projects/deletepic',
            data: {pic_id: deleteId},
            type: 'post',
            success: function (result) {
                _this.parent().remove();
            }
        })
        return false;
    })
    $('body').on('click', '.multi-switch', function(e) {
        e.preventDefault();
        var select = $(this).parent().find('select');
        if (select.attr('multiple') !== undefined) {
            select.removeAttr('multiple');
        } else {
            select.attr('multiple', 'multiple');
        }

        return false;
    })
});