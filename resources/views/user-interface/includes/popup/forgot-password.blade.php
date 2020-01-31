<div id="forgot-password" class="white-popup-block mfp-hide registration-popup" style="background-image: url('{!!asset('user-interface')!!}/img/pop-bg.jpg');">
    <div class="text-center">
        <div class="title-holder">
            <h3>forgot password?</h3>
            <p>Enter email address below and we’ll send you password reset instructions on your email.</p>
        </div>
        <form id="forgot-password-form">
            <div class="form-group">
                <input type="text" class="form-control" name="email" id="forgot-password-value" placeholder="EMAIL ADDRESS">
                <span class="forgot-password-error errors" id="forgot_password_email"></span>
            </div>
            <button type="submit" class="btn btn-default pop-btn">submit</button>
            {!! csrf_field() !!}
        </form>
        <div class="registration-link">
            <p>Already have an account?
            <a href="#login" class="popup-with-form">Login</a>
            </p>
        </div>
    </div>
</div>