<div id="reset-password" class="white-popup-block mfp-hide registration-popup" style="background-image: url('{!!asset('user-interface')!!}/img/pop-bg.jpg');">
    <div class="text-center">
        <div class="title-holder">
            <h3>reset password?</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae natus veniam optio eligendi repellat ducimus doloribus soluta debitis autem nostrum illum saepe in quasi eum, dolorem sit dolores molestiae. Corporis?</p>
        </div>
        <form id="reset-password-form">
            <div class="form-group">
                <input type="password" class="form-control reset-password-value" name="password" placeholder="Enter Password">
                <span class="reset-password-error errors" id="reset_password_password"></span>
                <input type="password" class="form-control reset-password-value" name="password_confirmation" placeholder="Repeat Password">
                <span class="reset-password-error errors" id="reset_password_password_confirmation"></span>
            </div>
            <button type="submit" class="btn btn-default pop-btn">submit</button>
            <input type="hidden" name="id" value="{{$id}}">
            {!! csrf_field() !!}
        </form>
    </div>
</div>
<a href="#reset-password" class="popup-with-form" id="reset-password-trigger-popup"></a>