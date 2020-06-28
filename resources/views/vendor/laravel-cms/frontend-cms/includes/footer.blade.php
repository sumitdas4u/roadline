
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
                        <h3>Tel: <a href="tel:+91-33-39147200">+91-33-39147200</a></h3>
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
                            @foreach ( $menus as $item)
                                <li class="{{$helper->activeMenuClass($item, $page, 'active')}}"><a href="{{ $helper->url($item)  }}" id="drop{{$item->id}}">{{ $item->menu_title ?? $item->title }}</a></li>
                            @endforeach

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
            <div class="container"><span>  {!! $helper->s('page_footer') !!}</span><big>Design &amp; Developed by <a href="https://keylines.net/" target="_blank">Keyline</a></big></div>
            <div class="clear"></div>
        </div>

    </footer>
</div>

