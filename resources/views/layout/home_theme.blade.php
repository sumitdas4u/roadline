<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
<head>
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

    {{-- Fonts --}}


    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('layout.home_resources.css') as $style)
        <link href="{{   asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach
    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach


    {{-- Includable CSS --}}
    @yield('styles')






</head>
<body class="transition2 ">
<div class="home_page">
<header >
    <div class="container">
        <div class="logo-box"><a href="#"><img src="images/Loadline-logo.svg" alt=""></a></div>
        <div class="menu-box">
            <div class="menu-box-top">
                <aside><ul>
                        <li><a href="{{ route('login') }}">LOGIN</a></li><li><a href="{{ route('register') }}">REGISTER</a></li></ul></aside>
                <figure><ul>
                        <li><a href="#" target="_blank"><img src="images/facebook.png"></a></li>
                        <li><a href="#" target="_blank"><img src="images/t.png"></a></li>
                        <li><a href="#" target="_blank"><img src="images/in.png"></a></li>
                        <li><a href="#" target="_blank"><img src="images/y.png"></a></li>
                    </ul></figure>
            </div>
            <div class="clear"></div>
            <div class="menu2"><nav>
                    <div class="nav">
                        <ul>
                            <li class="active"><a href="#">HOME</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Refer and Earn</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="{{ route('register-owner') }}">Fleet Owners</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>

                    </div>
                </nav></div>
        </div>
    </div>
</header>
</div>
@yield('content')
<div class="home_page">
<footer>
    <div class="container">
        <div class="footer-box">
            <div class="footer-box-left">
                <span><a href="#"><img src="images/footer-logo.png" alt=""></a></span>
                <small>
                    <p>Load Bhawan, B-21,<br>
                        Qutab Institutional Area,<br>
                        Kolkata - 700016 </p>
                    <h3>Tel: <a href="tel:+91-33-39147200" >+91-33-39147200</a></h3>
                    <h4>Fax: +91-33-26853956</h4>
                    <ul>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </small>
            </div>
            <div class="footer-box-mid">

                <aside>
                    <ul>
                        <li  class="active"><a href="#" >HOME</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Refer and Earn</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Fleet Owners</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </aside>
                <figure>
                    <ul>
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="#">Privacy and Policy</a></li>
                        <li><a href="#">Online payment terms</a></li>
                        <li><a href="#">RTO Forms Download</a></li>
                    </ul>
                </figure>

            </div>
            <div class="footer-box-right">

                <h2>Subcrive Newsletter</h2>
                <aside><input type="text" placeholder="Your Name"></aside>
                <aside><input type="email" placeholder="Your email ID"></aside>
                <small><input type="submit" class="submit2" value="SUBMIT"></small>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="footer-box2">
        <div class="container"><span>All right reserved: LOADLINE © 2020</span><big>Design & Developed by <a href="https://keylines.net/" target="_blank">Keyline</a></big></div>
        <div class="clear"></div>
    </div>

</footer>
</div>




{{-- Global Theme JS Bundle (used by all pages)  --}}
@foreach(config('layout.home_resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach

{{-- Includable JS --}}
@yield('scripts')

</body>
</html>
