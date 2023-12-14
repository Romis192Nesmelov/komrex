<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komrex {{ trans('admin.admin_page').'. '.trans('admin_menu.'.end($breadcrumbs)['key']) }}</title>
    @include('blocks.favicon_block')
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/datatables.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/bootstrap-switch.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/colors.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    <!-- /core JS files -->

{{--    <script type="text/javascript" src="{{ asset('js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('js/plugins/forms/inputs/typeahead/handlebars.min.js') }}"></script>--}}

    <script type="text/javascript" src="{{ asset('js/admin/datatables.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/admin/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/daterangepicker.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/admin/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/styling/bootstrap-switch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/styling/bootstrap-toggle.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/admin.js') }}"></script>
</head>

<body>
@csrf
<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @include('admin.blocks.dropdown_menu_item_block',[
                'menuName' => auth()->user()->email,
                'menu' => [['href' => route('logout'), 'icon' => 'icon-switch2', 'text' => trans('admin.exit')]]
            ])
        </ul>

    </div>
</div>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

<!-- Page content -->
<div class="page-content">

<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <div class="media-body">
                        <div class="text-size-mini text-muted">
                            <i class="glyphicon glyphicon-user text-size-small"></i>
                            {{ trans('admin.welcome') }}<br>{{ auth()->user()->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    @foreach ($menu as $k => $item)
                        @if (!$item['hidden'])
                            <li {{ ($item['key'] == $menu_key) || (isset($parent_key) && $item['key'] == $parent_key) ? 'class=active' : '' }}>
                                <a href="{{ route('admin.'.$item['key']) }}"><i class="{{ $item['icon'] }}"></i> <span>{{ trans('admin_menu.'.$item['key']) }}</span></a>
                                @if (isset($submenu) && ($item['key'] == $menu_key || $item['key'] == $parent_key))
                                    <ul>
                                        @foreach ($submenu as $subItem)
                                            <li {{ (request('id') && $subItem['id'] == request('id')) || (request('parent_id') && $subItem['id'] == request('parent_id')) || (isset($current_sub_item) && $subItem['id'] == $current_sub_item) ? 'class=active' : '' }}>
                                                <a href="{{ route('admin.'.$parent_key,['id' => $subItem['id']]) }}">{{ ($subItem['name'] ?? $subItem['head']) }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
<!-- /main sidebar -->

<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if ($loop->first)
                            <i class="icon-home2"></i>
                            <span class="text-semibold">
                                  @include('admin.blocks.breadcrumb_name_block')
                            </span>
                        @else
                            @include('admin.blocks.breadcrumb_name_block')
                        @endif
                        @if (!$loop->last)
                            <i class="icon-arrow-right7"></i>
                        @endif
                    @endforeach
                 </h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    <li>
                        <a href="{{ isset($breadcrumb['params']) ? route('admin.'.$breadcrumb['key'],$breadcrumb['params']) : route('admin.'.$breadcrumb['key']) }}">
                            @include('admin.blocks.breadcrumb_name_block')
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">@yield('content')</div>
    <!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->
@include('blocks.message_modal_block')
</body>
</html>
