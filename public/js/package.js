

$(document).ready(function() {

    $('.btn-package').on('click', function () {

        var id_package = $(this).attr('id-package');
        var lang = $('meta[charset="utf-8"]').attr('lang');
        //alert('click by package = ' + id_package);

        location.href = '/' + lang + '/package/' + id_package;

        return false;
    });

});
