<div id="signup" class="white-popup-block mfp-hide registration-popup" style="background-image: url('{!!asset('user-interface')!!}/img/pop-bg.jpg');">
    <div class="text-center">
        <div class="title-holder">
            <h3>sign up</h3>
        </div>
        <form id="registration-form">
            <div class="form-group">
                <input type="text" class="form-control register-value" name="first_name" placeholder="FIRST NAME" id="r_first_name">
                <span class="register-error errors" id="register_first_name"></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control register-value" name="last_name" placeholder="LAST NAME" id="r_last_name">
                <span class="register-error errors" id="register_last_name"></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control register-value" name="email" placeholder="EMAIL ADDRESS" id="r_email">
                <span class="register-error errors" id="register_email"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control register-value" name="password" placeholder="PASSWORD" id="r_password">
                <span class="register-error errors" id="register_password"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control register-value" name="password_confirmation" placeholder="CONFIRM PASSWORD">
                <span class="register-error errors" id="register_password_confirmation"></span>
            </div>
            
            <div class="form-group">
                <input type="checkbox" required class="" name="terms_condition"> I agree to all <a target="_blank" href="{!!URL('terms-and-conditions')!!}">Terms and Conditions</a> and <a target="_blank" href="{!!URL('privacy-policy')!!}">Privacy Policy</a><br>
                <span class="register-error errors" id="register_terms_condition"></span>
            </div>
            <button type="submit" class="btn btn-default pop-btn">sign up</button>
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
            <a href="#login" class="popup-with-form">Login</a> | 
            <a href="#forgot-password" class="popup-with-form">Forgot Password?</a>
        </div>
    </div>
</div>