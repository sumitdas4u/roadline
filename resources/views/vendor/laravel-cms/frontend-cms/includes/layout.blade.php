

<!doctype html>

<html lang="{{$helper->s('template.frontend_language')}}">
<head>
<title>    {{$page->meta_title ?? $page->title}}{{strlen($page->meta_title ?? $page->title) < 60 ? ' - ' . $helper->s('site_name') : ''}}</title>


    {{-- Meta Data --}}
    @if ( isset($page->meta_keywords) )
        <meta name="keywords" content="{{$page->meta_keywords}}" />
    @endif
    @if ( isset($page->meta_description) )
        <meta name="description" content="{{$page->meta_description}}" />
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    {{-- Favicon --}}
    <link rel="icon" href="{{ $helper->s('favicon_url') ?? asset('media/logos/favicon.ico')}}" />


    {{-- Fonts --}}

    @if ( $helper->s('page_head') )
        {!! $helper->s('page_head') !!}
    @endif
    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('layout.home_resources.css') as $style)
        <link href="{{   asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Includable CSS --}}
    @yield('styles')


</head>

<body class="transition2 cms-page {{$page->template_file}} slug-{{str_replace('.html', '', $page->slug) }}"
      id="cms-page-{{$page->id}}">

@include($helper->bladePath('includes.header'))

@yield('content')




@if ( $helper->s('page_bottom') )
    <div class="container">
        {!! $helper->s('page_bottom') !!}
    </div>
@endif
@include($helper->bladePath('includes.footer'))
</body>





{{-- Global Theme JS Bundle (used by all pages)  --}}
@foreach(config('layout.home_resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
<script src="{{ $helper->assetUrl('js/bottom.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.15.0/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

{{-- Includable JS --}}
@yield('scripts')

</body>
</html>


