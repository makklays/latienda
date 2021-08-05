<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8" lang="{{ app()->getLocale() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $seo->title }}</title>

    <meta name="description" content="{{ $seo->description }}" />
    <meta name="keywords" content="{{ $seo->keywords }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="author" content="Latienda" />

    <link rel="shortcut icon" href="<?=config('app.url')?>/latienda.png" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/prism.css?'.time()) }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/bootstrap4/css/bootstrap.min.css?'.time()) }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/fontawesome5/css/all.css?'.time()) }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/jquery.fancybox.min.css?'.time()) }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/jquery-ui.css?'.time()) }}" />
    <!-- link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/main10.css?'.time()) }}" / -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/dashboard.css?'.time()) }}" />

    <script type="text/javascript" src='<?=config('app.url')?>/js/jquery-3.4.0.min.js'></script>
    <script type="text/javascript" src='<?=config('app.url')?>/css/bootstrap4/js/bootstrap.min.js'></script>
    <script type="text/javascript" src='<?=config('app.url')?>/js/jquery.fancybox.min.js'></script>
    <script type="text/javascript" src="<?=config('app.url')?>/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?=config('app.url')?>/js/myapp.js"></script>
    <script type="text/javascript" src="<?=config('app.url')?>/js/prism.js" ></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
<main role="main">

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ route('da_admin', app()->getLocale()) }}">Latienda</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form action="{{ route('adm_search', [app()->getLocale()]) }}" method="GET" class="form-inline" >
            <div class="form-group">
                <input name="search" style="width:1300px;" class="form-control form-control-dark" type="text" placeholder="{{ trans('admin.Search') }}" aria-label="Search" />
            </div>
            <input type="submit" value="{{ trans('admin.Search') }}" class="btn btn-success" />
        </form>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('logout', app()->getLocale()) }}">{{ trans('admin.Logout') }}</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ in_array(\Route::current()->getName(), ['da_admin']) ? 'active' : '' }}" href="{{ route('da_admin', app()->getLocale()) }}">
                                <span class="fa fa-home"></span>
                                {{ trans('admin.Dashboard') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ in_array(\Route::current()->getName(), ['adm_category','adm_category_add','adm_category_edit','adm_category_show','adm_category_delete']) ? 'active' : '' }}" href="{{ route('adm_category', app()->getLocale()) }}">
                                <span class="fa fa-server"></span>
                                {{ trans('admin.Categories') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ in_array(\Route::current()->getName(), ['adm_product','adm_product_add','adm_product_edit','adm_product_show','adm_product_delete']) ? 'active' : '' }}" href="{{ route('adm_product', app()->getLocale()) }}">
                                <span class="fa fa-shopping-basket"></span>
                                {{ trans('admin.Products') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ in_array(\Route::current()->getName(), ['adm_customers','adm_customer_add','adm_customer_edit','adm_customer_show','adm_customer_delete']) ? 'active' : '' }}" href="{{ route('adm_customers', app()->getLocale()) }}">
                                <span class="fa fa-users"></span>
                                {{ trans('admin.Customers') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ in_array(\Route::current()->getName(), ['adm_orders','adm_order_add','adm_order_edit','adm_order_show','adm_order_delete']) ? 'active' : '' }}" href="{{ route('adm_orders', app()->getLocale()) }}">
                                <span class="fa fa-file-invoice"></span>
                                {{ trans('admin.Orders') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ in_array(\Route::current()->getName(), ['adm_report_all', 'adm_report']) ? 'active' : '' }}" href="{{ route('adm_report_all', app()->getLocale()) }}">
                                <span class="fa fa-chart-bar"></span>
                                {{ trans('admin.Reports') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ in_array(\Route::current()->getName(), ['adm_articles','adm_article_add','adm_article_show','adm_article_edit','']) ? 'active' : '' }}" href="{{ route('adm_articles', app()->getLocale()) }}">
                                <span class="fa fa-file-alt"></span>
                                {{ trans('admin.Articles') }}
                            </a>
                        </li>
                        <!--li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="fa fa-layer-group"></span>
                                {{ trans('admin.Integrations') }}
                            </a>
                        </li-->
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>{{ trans('admin.Saved_reports') }}</span>
                        <a class="d-flex align-items-center text-muted" href="{{ route('adm_report_all', app()->getLocale()) }}" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span> {{ trans('admin.all') }}
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adm_report', app()->getLocale()) }}">
                                <span class="fa fa-calendar-day"></span>
                                {{ trans('admin.Current_month') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adm_report', app()->getLocale()) }}">
                                <span class="fa fa-calendar-day"></span>
                                {{ trans('admin.Last_quarter') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adm_report', app()->getLocale()) }}">
                                <span class="fa fa-calendar-day"></span>
                                {{ trans('admin.Last_year') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adm_report', app()->getLocale()) }}">
                                <span class="fa fa-calendar-day"></span>
                                {{ trans('admin.All_period') }}
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>{{ trans('admin.To_latienda') }}</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('/', app()->getLocale()) }}">
                                <span class="fa fa-calendar-day"></span>
                                {{ trans('admin.To_latienda') }}
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>{{ trans('admin.Language') }}</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="" style="padding: .5rem 1rem .5rem 1rem;" href="{{ route('da_admin', ['locale' => 'en']) }}">
                                {{ trans('admin.EN') }}
                            </a> |
                            <a class="" style="padding: .5rem 1rem .5rem 1rem;" href="{{ route('da_admin', ['locale' => 'es']) }}">
                                {{ trans('admin.ES') }}
                            </a> |
                            <a class="" style="padding: .5rem 1rem .5rem 1rem;" href="{{ route('da_admin', ['locale' => 'ru']) }}">
                                {{ trans('admin.RU') }}
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

                @include('partials.flash')
                @yield('content')

            </main>
        </div>
    </div>

    <!--div class="container-fluid" style="">

        <div class="row">
            <div class="col-md-2">

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>

            </div>
            <div class="col-md-10">

                @include('partials.flash')
                @yield('content')

            </div>
        </div>
    </div-->

</main>
</body>
</html>
