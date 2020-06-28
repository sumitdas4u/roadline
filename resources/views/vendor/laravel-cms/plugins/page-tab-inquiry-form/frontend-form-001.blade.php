


<div class="clear"></div>
<div class="write-box">
    <form method="POST" action="{{route('LaravelCmsPluginInquiry.submitForm',null,false)}}" accept-charset="UTF-8"
          id="laravel-cms-inquiry-form">
        <input type="hidden" name="response_type" value="json" />

        <div class="container">
        <h2>WRITE TO US</h2>
        <div class="clear"></div>
        <div class="form-box-left">
            {!! $dynamic_inputs !!}
            {!! $gg_recaptcha !!}
        </div>
        <div class="form-box-mid"><textarea placeholder="Message"></textarea></div>
        <div class="form-box-right">
            <aside><input type="text" placeholder="Capcha"></aside>
            <figure><small><img src="images/capture.jpg" alt=""></small><big><a href="#"><img src="images/refresh-icon.png" alt=""></a></big></figure>
            <small><input type="submit" class="submit" value="SUBMIT NOW"></small>
        </div>
    </div>

    </form>
</div>
<div class="clear"></div>


{{--
    A javascript function submitInquiryForm() in the bottom.js will be invoked when the page is ready

    It's better to put the javascript here when develop your own plugin as the frontend bottom.js file are not controllable
--}}
