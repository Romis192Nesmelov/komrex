window.allMonths = ['Янв.', 'Фев.', 'Март', 'Апр.', 'Май', 'Июнь', 'Июль', 'Авг.', 'Сент.', 'Окт.', 'Нояб.', 'Декаб.'];
window.statisticsData = [];
$(document).ready(function () {
    // Phone mask
    $.mask.definitions['n'] = "[7-8]";
    $('input[name=phone]').mask("+n(999)999-99-99");

    CKEDITOR.replaceClass = 'ckeditor';
    $('.styled').uniform();

    const messageModal = $('#message-modal');

    // Single picker
    // $('.daterange-single').daterangepicker({
    //     singleDatePicker: true,
    //     locale: {
    //         format: 'DD/MM/YYYY'
    //     }
    // });

    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            targets: [5]
        }],
        order: [],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Фильтр:</span> _INPUT_',
            lengthMenu: '<span>Показывать:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' },
            emptyTable: 'Нет данных',
            info: 'Показано с _START_ по _END_ из _TOTAL_',
            infoEmpty: 'Показано с 0 по 0 из 0',
            infoFiltered:   '(Фильтровать от _MAX_ общего числа)',
            thousands:      ',',
            loadingRecords: 'Загрузка...',
            zeroRecords:    'Нет данных',
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

    // Basic datatable
    const dTable = $('.datatable-basic').DataTable();

    // Alternative pagination
    // $('.datatable-pagination').DataTable({
    //     pagingType: "simple",
    //     language: {
    //         paginate: {'next': 'Next &rarr;', 'previous': '&larr; Prev'}
    //     }
    // });

    // Preview upload image
    $('input[type=file]').change(function () {
        let input = $(this)[0],
            parent = $(this).parents('.edit-image-preview'),
            imagePreview = parent.find('img');

        if (input.files[0].type.match('image.*')) {
            let reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.attr('src', e.target.result);
                if (!imagePreview.is(':visible')) imagePreview.fadeIn();
            };
            reader.readAsDataURL(input.files[0]);
        } else if (parent.hasClass('file-advanced')) {
            imagePreview.attr('src', '');
            imagePreview.fadeOut();
        } else {
            imagePreview.attr('src', '/images/placeholder.jpg');
        }
    });

    // Click to delete items
    window.deleteId = null;
    window.deleteRow = null;

    // Change pagination on data-tables
    $('table.datatable-basic').on('draw.dt', function () {
        bindDelete();
        bindFancybox();
    });
    bindDelete();

    // Click YES on delete modal
    $('.delete-yes').click(function () {
        let deleteModal = $(this).parents('.modal');
        deleteModal.modal('hide');
        addLoader();

        $.post(deleteModal.attr('del_function'), {
            '_token': $('input[name=_token]').val(),
            'id': window.deleteId,
        }, function (data) {
            // dTable.row(window.deleteRow).remove();
            window.deleteRow.remove();
            // dTable.draw();
            bindDelete();
            removeLoader();
            messageModal.find('h4').html(data.message);
            messageModal.modal('show');
        });
    });
    bindFancybox();

});

const bindFancybox = () => {
    // Fancybox init
    $('.fancybox').fancybox({
        'autoScale': true,
        'touch': false,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 500,
        'speedOut': 300,
        'autoDimensions': true,
        'centerOnScroll': true
    });
}

const bindDelete = () => {
    let deleteIcon = $('.glyphicon-remove-circle');
    deleteIcon.unbind();
    deleteIcon.click(function () {
        let deleteModal = $('#' + $(this).attr('modal-data')),
            inputId = deleteModal.find('input[name=id]');

        window.deleteId = $(this).attr('del-data');
        window.deleteRow = $(this).parents('tr');

        if (inputId.length) inputId.val(window.deleteId);

        deleteModal.modal('show');
    });
}

// function translit(text, engToRus) {
//     var rus = "щ ш ч ц ю я ё ж ъ ы э а б в г д е з и й к л м н о п р с т у ф х ь".split(/ +/g),
//         eng = "shh sh ch cz yu ya yo zh `` y' e` a b v g d e z i j k l m n o p r s t u f x `".split(/ +/g);
//
//     var x;
//     for(x=0;x<rus.length; x++) {
//         text = text.split(engToRus ? eng[x] : rus[x]).join(engToRus ? rus[x] : eng[x]);
//         text = text.split(engToRus ? eng[x].toUpperCase() : rus[x].toUpperCase()).join(engToRus ? rus[x].toUpperCase() : eng[x].toUpperCase());
//     }
//     return text;
// }
