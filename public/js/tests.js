
$(document).ready(function() {

    // click on image
    $('.ch-block').on('click', function () {
        var choi = $(this).attr('choo');
        var lang = $('meta[charset="utf-8"]').attr('lang');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // alert('/' + lang + '/test-data/' + choi);

        // sent data to site
        $.ajax({
            type: "POST",
            url: '/' + lang + '/test-data/' + choi,
            //data: {choice: choi, param:"valu"},
            beforeSend: function () {
                // preloader
                $('#id-loader-test').css('display', 'block');
            },
            complete: function () {
                // complete
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Error
                alert('Error!');
                console.log(textStatus, errorThrown);
            },
            success: function (response) {
                // success
                //alert(response.result);
                location.href = '/'+lang+'/test-result';
            },
            dataType: 'json'
        });

        return false;
    });
});
