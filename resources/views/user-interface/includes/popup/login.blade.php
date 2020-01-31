<div id="login" class="white-popup-block mfp-hide registration-popup" style="background-image: url('{!!asset('user-interface')!!}/img/pop-bg.jpg');">
    <div class="text-center">
        <div class="title-holder">
            <h3>LOGIN</h3>
        </div>
        @if(Session::has('error_msg') && Session::get('error_msg')!="")
        <div class="alert alert-danger">
        <?php echo Session::get('error_msg');?>
        </div>
        @endif
        <form id="login-form">
            <div class="form-group">
                <input type="text" class="form-control login-value" name="email" placeholder="EMAIL ADDRESS" id="l_email">
                <span class="login-error errors" id="login_email"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control login-value" name="password" placeholder="PASSWORD" id="l_password">
                <span class="login-error errors" id="login_password"></span>
            </div>
            <button type="submit" class="btn btn-default pop-btn">Login</button>
            @if(Request::has('URI'))
                <input type="hidden" value="{!! Request::input('URI') !!}" name="uri" id="redirect_url">
            @else
            <input type="hidden" value="" name="uri" id="redirect_url">
            @endif
            {!! csrf_field() !!}
        </form>
        <div class="separator">or</div>
        <div class="social-link">
            <ul>
                <li>
                    {{--<a href="{{URL('facebook')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
                    <a data-location="{!! URL('facebook') !!}" class="facebook" title="Facebook" ><i class="fa fa-facebook" aria-hidden="true"></i></a>

                </li>
            </ul>
        </div>
        <div class="registration-link">
            <a href="#signup" class="popup-with-form">Sign Up</a> | 
            <a href="#forgot-password" class="popup-with-form">Forgot Password?</a>
        </div>
    </div>
</div>
