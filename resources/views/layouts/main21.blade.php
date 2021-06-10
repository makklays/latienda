<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--script async src="https://www.googletagmanager.com/gtag/js?id=UA-164972795-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-164972795-1');
    </script-->

    <meta charset="utf-8" lang="{{ app()->getLocale() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $seo->title }}</title>

    <meta name="description" content="{{ $seo->description }}" />
    <meta name="keywords" content="{{ $seo->keywords }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="author" content="Latienda" />

    <meta property="og:title"       content="{{ $seo->title }}" />
    <meta property="og:description" content="{{ $seo->description }}" />
    <meta property="og:type"        content="website" />
    <meta property="og:url"         content="{{ url()->current() }}" />
    <meta property="og:image"       content="<?= isset($seo->img) && !empty($seo->img) ? $seo->img : config('app.url').'/img/latienda.png' ?>" />

    <?php if (isset($seo->show_urls) && $seo->show_urls == 1): ?>
        <link rel="alternate" hreflang="de" href="<?=$seo->request_scheme?>://<?=$seo->server_name?>/de/<?=$seo->short_url?>" />
        <link rel="alternate" hreflang="ru" href="<?=$seo->request_scheme?>://<?=$seo->server_name?>/ru/<?=$seo->short_url?>" />
        <link rel="alternate" hreflang="es" href="<?=$seo->request_scheme?>://<?=$seo->server_name?>/es/<?=$seo->short_url?>" />
        <link rel="alternate" hreflang="fr" href="<?=$seo->request_scheme?>://<?=$seo->server_name?>/fr/<?=$seo->short_url?>" />
        <link rel="alternate" hreflang="en" href="<?=$seo->request_scheme?>://<?=$seo->server_name?>/en/<?=$seo->short_url?>" />
    <?php endif; ?>

    <link rel="shortcut icon" href="<?=config('app.url')?>/latienda.png" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/prism.css?'.time()) }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/bootstrap4/css/bootstrap.min.css?'.time()) }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/fontawesome5/css/all.css?'.time()) }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/jquery.fancybox.min.css?'.time()) }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/jquery-ui.css?'.time()) }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/main10.css?'.time()) }}" />

    <script type="text/javascript" src='<?=config('app.url')?>/js/jquery-3.4.0.min.js'></script>
    <script type="text/javascript" src='<?=config('app.url')?>/css/bootstrap4/js/bootstrap.min.js'></script>
    <script type="text/javascript" src='<?=config('app.url')?>/js/jquery.fancybox.min.js'></script>
    <script type="text/javascript" src="<?=config('app.url')?>/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?=config('app.url')?>/js/myapp.js"></script>
    <script type="text/javascript" src="<?=config('app.url')?>/js/prism.js" ></script>
</head>
<body>
<main role="main">

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="{{ route('about', app()->getLocale()) }}" class="block">{{ trans('main.about') }}</a>
            <a href="{{ route('categories', app()->getLocale()) }}" class="block">{{ trans('main.categories') }}</a>
            <a href="{{ route('delivery', app()->getLocale()) }}" class="block">{{ trans('main.delivery') }}</a>
            <a href="{{ route('contacts', app()->getLocale()) }}" class="block">{{ trans('main.contacts') }}</a>
            <br/>
            <a href="{{ route('login', app()->getLocale()) }}" class="block">{{ trans('main.Sign In') }}</a>
            <a href="{{ route('register', app()->getLocale()) }}" class="block">{{ trans('main.Sign Up') }}</a>
        </div>
    </div>

    <nav class="navbar navbar-expand fixed-top">
        <a class="navbar-brand" href="{{ route('/', app()->getLocale()) }}" style="font-size:21px;">
            <img src="<?=config('app.url')?>/latienda.png" height="30" class="d-inline-block align-top" alt="">
            Latienda
        </a>
        <span class="mob_menu_text" style="color:#FFF;">
            <a href="tel:+34643630023" style="color:#FFF; padding-right:20px; text-decoration:none;">+34643630023</a>
        </span>
        <div class="mob_menu" onclick="openNav();">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ \Route::current()->getName() == 'about' ? 'active' : '' }}">
                    <a class="nav-link dev-navbar-link px-3" href="{{ route('about', app()->getLocale()) }}">
                        {{ trans('main.about') }}
                    </a>
                </li>
                <li class="nav-item {{ in_array(\Route::current()->getName(), ['categories', 'category']) ? 'active' : '' }}">
                    <a class="nav-link dev-navbar-link px-3" href="{{ route('categories', app()->getLocale()) }}">
                        {{ trans('main.categories') }}
                    </a>
                </li>
                <li class="nav-item {{ \Route::current()->getName() == 'delivery' ? 'active' : '' }}">
                    <a class="nav-link dev-navbar-link px-3" href="{{ route('delivery', app()->getLocale()) }}">
                        {{ trans('main.delivery') }}
                    </a>
                </li>
                <li class="nav-item {{ \Route::current()->getName() == 'contacts' ? 'active' : '' }}">
                    <a class="nav-link dev-navbar-link px-3" href="{{ route('contacts', app()->getLocale()) }}">
                        {{ trans('main.contacts') }}
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>

                <a href="{{ route('cart', app()->getLocale()) }}"><!--{{ trans('main.cart') }}--> <span class="badge badge-pill badge-success">{{ \Illuminate\Support\Facades\Cookie::get('count_order_items') ? \Illuminate\Support\Facades\Cookie::get('count_order_items') : '0' }}</span></a> &nbsp;&nbsp;
                <?php if (!empty(\Auth::user()->email)): ?>
                    <a href="{{ route('da_home', app()->getLocale()) }}">{{ \Auth::user()->name }}</a> &nbsp;&nbsp;
                    <a href="{{ route('logout', app()->getLocale()) }}">{{ trans('main.Logout') }}</a> &nbsp;&nbsp;
                <?php else: ?>
                    <a href="{{ route('login', app()->getLocale()) }}">{{ trans('main.Sign In') }}</a> &nbsp;&nbsp;
                    <a href="{{ route('register', app()->getLocale()) }}">{{ trans('main.Sign Up') }}</a> &nbsp;&nbsp;
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?=config('app.url')?>/img/flags/{{ app()->getLocale() }}.png" style="width:21px;" alt="EN" title="EN" />
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="width:70px !important; min-width:10px;">

                        <?php if ( in_array(\Route::current()->getName(), ['category', 'product']) && $slug = request()->segment(3)): ?>
                        <?php if (app()->getLocale() != 'es'): ?>
                        <a href="{{ route( \Route::current()->getName(), ['es', $slug]) }}" class="dropdown-item green-bk"><img src="<?=config('app.url')?>/img/flags/es.png" class="mlimg" alt="ES" title="ES" /></a>
                        <?php endif; ?>
                        <?php if (app()->getLocale() != 'en'): ?>
                        <a href="{{ route( \Route::current()->getName(), ['en', $slug]) }}" class="dropdown-item green-bk"><img src="<?=config('app.url')?>/img/flags/en.png" class="mlimg" alt="EN" title="EN" /></a>
                        <?php endif; ?>
                        <?php if (app()->getLocale() != 'ru'): ?>
                        <a href="{{ route( \Route::current()->getName(), ['ru', $slug]) }}" class="dropdown-item green-bk"><img src="<?=config('app.url')?>/img/flags/ru.png" class="mlimg" alt="RU" title="RU" /></a>
                        <?php endif; ?>
                        <?php if (app()->getLocale() != 'de'): ?>
                        <a href="{{ route( \Route::current()->getName(), ['de', $slug]) }}" class="dropdown-item green-bk"><img src="<?=config('app.url')?>/img/flags/de.png" class="mlimg" alt="DE" title="DE" /></a>
                        <?php endif; ?>
                        <?php if (app()->getLocale() != 'fr'): ?>
                        <a href="{{ route( \Route::current()->getName(), ['fr', $slug]) }}" class="dropdown-item green-bk"><img src="<?=config('app.url')?>/img/flags/fr.png" class="mlimg" alt="FR" title="FR" /></a>
                        <?php endif; ?>
                        <?php else: ?>
                        <?php if (app()->getLocale() != 'es'): ?>
                        <a href="{{ route( \Route::current()->getName(), 'es') }}" class="dropdown-item green-bk"><img src="<?=config('app.url')?>/img/flags/es.png" class="mlimg" alt="ES" title="ES" /></a>
                        <?php endif; ?>
                        <?php if (app()->getLocale() != 'en'): ?>
                        <a href="{{ route( \Route::current()->getName(), 'en') }}" class="dropdown-item green-bk"><img src="<?=config('app.url')?>/img/flags/en.png" class="mlimg" alt="EN" title="EN" /></a>
                        <?php endif; ?>
                        <?php if (app()->getLocale() != 'ru'): ?>
                        <a href="{{ route( \Route::current()->getName(), 'ru') }}" class="dropdown-item green-bk"><img src="<?=config('app.url')?>/img/flags/ru.png" class="mlimg" alt="RU" title="RU" /></a>
                        <?php endif; ?>
                        <?php if (app()->getLocale() != 'de'): ?>
                        <a href="{{ route( \Route::current()->getName(), 'de') }}" class="dropdown-item green-bk"><img src="<?=config('app.url')?>/img/flags/de.png" class="mlimg" alt="DE" title="DE" /></a>
                        <?php endif; ?>
                        <?php if (app()->getLocale() != 'fr'): ?>
                        <a href="{{ route( \Route::current()->getName(), 'fr') }}" class="dropdown-item green-bk"><img src="<?=config('app.url')?>/img/flags/fr.png" class="mlimg" alt="FR" title="FR" /></a>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
            <span class="navbar-text" style="color:#FFF; margin-left: 20px;">
                <a href="tel:+34643630023" style="color:#FFF; padding-right:20px; text-decoration:none;">+34643630023</a>
            </span>
        </div>
    </nav>

    <div class="container" style="padding: 70px 0 0 0;">
        @include('partials.flash')
        @yield('content')
    </div>
</main>

<footer style="background-color:#333333;">
    <div class="container">
        <div class="row" style="padding:40px 0 0 0;">
            <div class="col-md-4 col-sm-6 col-12">
                <h4 class="wtc">{{ trans('main.Company') }}</h4>
                <div><a href="{{ route('about', app()->getLocale()) }}" class="a-green">{{ trans('main.about') }}</a></div>
                <div><a href="{{ route('delivery', app()->getLocale()) }}" class="a-green">{{ trans('main.delivery') }}</a></div>
                <div><a href="{{ route('contacts', app()->getLocale()) }}" class="a-green">{{ trans('main.contacts') }}</a></div>
                <div style="padding:20px 0 0 0;">
                <!--h4 class="wtc">{{ trans('main.Lang') }}</h4-->
                <!--
                    <a href="{{ route('/', 'es') }}"><img src="<?=config('app.url')?>/img/flags/es.png" style="width:20px;" alt="ES" title="ES" /></a> &nbsp;
                    <a href="{{ route('/', 'en') }}"><img src="<?=config('app.url')?>/img/flags/en.png" style="width:20px;" alt="EN" title="EN" /></a> &nbsp;
                    <a href="{{ route('/', 'ru') }}"><img src="<?=config('app.url')?>/img/flags/ru.png" style="width:20px;" alt="RU" title="RU" /></a> &nbsp;
                    <a href="{{ route('/', 'de') }}"><img src="<?=config('app.url')?>/img/flags/de.png" style="width:20px;" alt="DE" title="DE" /></a> &nbsp;
                    <a href="{{ route('/', 'fr') }}"><img src="<?=config('app.url')?>/img/flags/fr.png" style="width:20px;" alt="FR" title="FR" /></a> &nbsp;
                    -->
                </div>
                <br/>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <h4 class="wtc">{{ trans('main.categories') }}</h4>
                <?php $categories = \App\Models\Api\Category::query()->where(['is_active'=>1,'parent_id'=>0])->get(); ?>
                <?php foreach($categories as $item): ?>
                <div><a href="{{ route('category', ['locale' => app()->getLocale(), 'path' => $item->slug]) }}" class="a-green">{{ $item->title }}</a></div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <h4 class="wtc">{{ trans('main.Information') }}</h4>

                <div><a href="{{ route('blog', app()->getLocale()) }}" class="a-green">{{ trans('main.blog') }}</a></div>

                <div><a href="<?=config('app.url')?>/sitemap.xml" class="a-green">Sitemap</a></div>
                <br/>
            </div>
            <div class="col-md-12">
                <p class="wtc">&copy; latienda <?=date('Y')?></p>
            </div>
        </div>
    </div>
</footer>

<div style="margin: auto; overflow: hidden;">
    <a id="toTop" href="javascript:;" style="display: inline;">
        <span id="toTopHover"></span>
        <img alt="To Top" src="/img/to-top.png" width="50" height="50">
    </a>
</div>

</body>
</html>
