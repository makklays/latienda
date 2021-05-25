@extends('layouts.main21')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/', app()->getLocale()) }}" class="a-green"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ trans('main.contacts') }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br/><h1 class="text-center text-design2">{{ trans('main.contacts') }}</h1> <br/>
        </div>
    </div>

    <script>
        var map;
        function initMap() {
            // The location of Uluru
            var latienda = {lat: 50.450, lng: 30.523};
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 50.450, lng: 30.523},
                zoom: 5
            });
            var image = {
                url: 'http://latienda/latienda.png',
                //size: new google.maps.Size(40, 42),
                //origin: new google.maps.Point(0, 0),
                //anchor: new google.maps.Point(13, 44),
                draggable: true,
                scaledSize: new google.maps.Size(25, 25)
            };
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({
                position: latienda,
                animation: google.maps.Animation.DROP,
                map: map,
                //icon: image,
                title: 'Latienda'
            });

            var contentString = '<div id="content">'+
                '<h5>Latienda</h5>'+
                '<p><?=trans('main.')?></p>'+
                '<div id="bodyContent">'+
                '<p><address>'+
                '<b><?=trans('main.mysite_contacts')?></b><br/>'+
                '<abbr title="<?=trans('main.contacts_skype')?>"><?=trans('main.contacts_skype')?>:</abbr> latienda <br/>'+
                '<abbr title="<?=trans('main.contacts_mob')?>"><?=trans('main.contacts_mob')?>:</abbr> +38 (098) 870 5397 <br/>'+
                '<a href="mailto:office@latienda" class="a-green">office@latienda</a> <br/>'+
                '</address>'+
                '<address>'+
                '<b><?=trans('main.Times_working')?></b> <br/>'+
                "<span><?=trans('main.mon_fri')?></span> <br/>"+
                '<span><?=trans('main.sur_sun')?></span>'+
                '</address></p>'+
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
            /*marker.addListener('click', toggleBounce);
            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }*/
        }
    </script>
    <?php
    $local = app()->getLocale();
    if ($local != 'ch' && $local != 'ua') {
        $lang = app()->getLocale();
    } else if ($local == 'ua') {
        $lang = 'uk';
    } else {
        $lang = 'zh-TW';
    }
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARJ6syX24A-hsZMsKFIufHeQYCgevlv4Q&callback=initMap&language=<?=$lang?>" async defer></script>

@endsection
