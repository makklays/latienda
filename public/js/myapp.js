
//alert('ssssssssss');

//
//$(document).ready(function() {
    /*if ($(window).scrollTop() > 1300) {
        //
        alert('mmm-mmm');
        $('.section_new').addClass('section_new_animate');
    } else {
        //
        //$('.section_new').removeClass('').addClass('');
    }*/
//});

/** {{{
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2013 Ariel Flesler - aflesler<a>gmail<d>com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * @author Ariel Flesler
 * @version 2.1.2
 */
;(function(f){"use strict";"function"===typeof define&&define.amd?define(["jquery"],f):"undefined"!==typeof module&&module.exports?module.exports=f(require("jquery")):f(jQuery)})(function($){"use strict";function n(a){return!a.nodeName||-1!==$.inArray(a.nodeName.toLowerCase(),["iframe","#document","html","body"])}function h(a){return $.isFunction(a)||$.isPlainObject(a)?a:{top:a,left:a}}var p=$.scrollTo=function(a,d,b){return $(window).scrollTo(a,d,b)};p.defaults={axis:"xy",duration:0,limit:!0};$.fn.scrollTo=function(a,d,b){"object"=== typeof d&&(b=d,d=0);"function"===typeof b&&(b={onAfter:b});"max"===a&&(a=9E9);b=$.extend({},p.defaults,b);d=d||b.duration;var u=b.queue&&1<b.axis.length;u&&(d/=2);b.offset=h(b.offset);b.over=h(b.over);return this.each(function(){function k(a){var k=$.extend({},b,{queue:!0,duration:d,complete:a&&function(){a.call(q,e,b)}});r.animate(f,k)}if(null!==a){var l=n(this),q=l?this.contentWindow||window:this,r=$(q),e=a,f={},t;switch(typeof e){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(e)){e= h(e);break}e=l?$(e):$(e,q);case "object":if(e.length===0)return;if(e.is||e.style)t=(e=$(e)).offset()}var v=$.isFunction(b.offset)&&b.offset(q,e)||b.offset;$.each(b.axis.split(""),function(a,c){var d="x"===c?"Left":"Top",m=d.toLowerCase(),g="scroll"+d,h=r[g](),n=p.max(q,c);t?(f[g]=t[m]+(l?0:h-r.offset()[m]),b.margin&&(f[g]-=parseInt(e.css("margin"+d),10)||0,f[g]-=parseInt(e.css("border"+d+"Width"),10)||0),f[g]+=v[m]||0,b.over[m]&&(f[g]+=e["x"===c?"width":"height"]()*b.over[m])):(d=e[m],f[g]=d.slice&& "%"===d.slice(-1)?parseFloat(d)/100*n:d);b.limit&&/^\d+$/.test(f[g])&&(f[g]=0>=f[g]?0:Math.min(f[g],n));!a&&1<b.axis.length&&(h===f[g]?f={}:u&&(k(b.onAfterFirst),f={}))});k(b.onAfter)}})};p.max=function(a,d){var b="x"===d?"Width":"Height",h="scroll"+b;if(!n(a))return a[h]-$(a)[b.toLowerCase()]();var b="client"+b,k=a.ownerDocument||a.document,l=k.documentElement,k=k.body;return Math.max(l[h],k[h])-Math.min(l[b],k[b])};$.Tween.propHooks.scrollLeft=$.Tween.propHooks.scrollTop={get:function(a){return $(a.elem)[a.prop]()}, set:function(a){var d=this.get(a);if(a.options.interrupt&&a._last&&a._last!==d)return $(a.elem).stop();var b=Math.round(a.now);d!==b&&($(a.elem)[a.prop](b),a._last=this.get(a))}};return p});
/*}}}*/

$(document).ready(function() {
    /*{{{ Scroll to top */
    (function () {
        var settings = {
            text: 'To Top',
            min: 200,
            inDelay: 600,
            outDelay: 400,
            containerID: 'toTop',
            containerHoverID: 'toTopHover',
            scrollSpeed: 400,
            easingType: 'linear'
        };

        var toTopHidden = true;
        var toTop = $('#' + settings.containerID);

        toTop.click(function (e) {
            e.preventDefault();
            $.scrollTo(0, settings.scrollSpeed, {easing: settings.easingType});
        });

        $(window).scroll(function () {
            var sd = $(this).scrollTop();
            if (sd > settings.min && toTopHidden) {
                toTop.fadeIn(settings.inDelay);
                toTopHidden = false;
            } else if (sd <= settings.min && !toTopHidden) {
                toTop.fadeOut(settings.outDelay);
                toTopHidden = true;
            }
        });
    })();
    /*}}}*/


    // открываем модальное окно
    $('#id_order_development').on('click', function () {
        $("#id_frmSentOrder").css('display', 'block');
        $('#id_frmResult').css('display','none');
        $('#myInput').modal('show');
    });

    // закрываем модальное окно
    $('#id_frmResult_close').on('click', function() {
        $('#myInput').modal('hide');
    });

    // при клике на checkbox
    $('#id_soglasen').on('click', function(){
        $('#id_err_soglasen').remove();
    });

    // указываем фокус
    $('#id_frmSentOrder_phone').on('focus', function(){
        $(this).css('border-color', '#ced4da');
        $(this).next().remove();
        return false;
    });

    // отправляем данные из модального окна
    $("#id_frmSentOrder").submit(function() {
        event.preventDefault();
        var form = $(this);
        $.ajax({
            url: 'call-development-post',
            dataType: 'json',
            data: form.serialize(),
            type: "POST",
            success: function(response) {
                if(response.success) {
                    form.css('display', 'none');
                    $('#id_frmResult').css('display','block');
                } else if(response.error) {
                    location.href = '/' + response.lang + '/black-list';
                } else if(response.errors) {
                    $.each(response.errors, function( index, value ) {
                        if (index == 'phone') {
                            $("input[name='" + index + "']").next().remove();
                            $("input[name='" + index + "']").css('border-color', 'red');
                            $("input[name='" + index + "']").parent().append('<div style="color:red; font-size:12px;">' + value[0] + '</div>');
                        }
                        if (index == 'soglasen') {
                            $('#id_err_soglasen').remove();
                            $("input[name='" + index + "']").parent().append('<div id="id_err_soglasen" style="color:red; font-size:12px;">' + value[0] + '</div>');
                        }
                    });
                }
            },
            error: function(xhr, textStatus, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
                console.log(textStatus);
            }
        });
        return false;
    });

    // оставляем куку с датой принятия кук
    $('#id_accept').on('click', function() {
        document.cookie = "date=<?=date('d.m.Y H:i:s')?>";
        console.log('The cookie "date" exists (ES5)');
        $('#id_div_accept').css('display', 'none');
    });

    // проверяем принята ли кука
    if (document.cookie.split(';').filter(function(item) {
        return item.trim().indexOf('date=') == 0
    }).length) {
        console.log('The cookie "date" exists (ES5)');
        $('#id_div_accept').css('display', 'none');
    }
});

/* Open when someone clicks on the span element */
function openNav() {
    document.getElementById("myNav").style.height = "100%";
}
/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}
function show_mmovil() {
    if ($('#id_mmovil').css('display') == 'none') {
        $('#id_mmovil').css('display', 'block');
    } else {
        $('#id_mmovil').css('display', 'none');
    }
    return false;
}
