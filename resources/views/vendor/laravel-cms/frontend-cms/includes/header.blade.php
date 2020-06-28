<header >
    <div class="container">
        <div class="logo-box">


                <a  href="{{ route('LaravelCmsPages.index', [], true ) }}"
                   title="{{$helper->s('site_name')}}">
                    <img src="{{ $helper->s('top_logo') ?? 'images/Loadline-logo.svg' }}"
                         class="top-logo" />
                      </a>
        </div>
        <div class="menu-box">
            <div class="menu-box-top">
                <aside><ul>
                        <li><a href="{{ route('login') }}">LOGIN</a></li><li><a href="{{ route('register') }}">REGISTER</a></li></ul></aside>
                <figure>     {!! $helper->s('page_top') !!}</figure>
            </div>
            <div class="clear"></div>

            <div class="menu2"><nav>
                    <div class="nav">
                        <ul>
                            @foreach ( $menus as $item)
                            <li class="{{$helper->activeMenuClass($item, $page, 'active')}}"><a href="{{ $helper->url($item)  }}" id="drop{{$item->id}}">{{ $item->menu_title ?? $item->title }}</a></li>
                            @endforeach
                        </ul>

                    </div>
                </nav></div>



        </div>
    </div>
</header>
@if ( isset($file_data->main_banner) )
<div class="banner-box"  style="min-height:100px; background-image: url({{$helper->imageUrl($file_data->main_banner, '2000') }});">
    <div  class="container">
        <div class="box876">


            <h3>{{$page->title}}</h3>
            <p>    {!! $page->sub_content !!}</p>




        </div>


    </div>



</div>
@endif




