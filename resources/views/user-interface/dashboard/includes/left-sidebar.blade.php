<div class="col-md-3">

    <div id="show_map" class="white-popup-block mfp-hide"
         style="background-image: url('{!!asset('user-interface')!!}/img/pop-bg.jpg');">
        <div id="map"></div>
    </div>
    <div class="page-sidebar">
        <div class="profile-picture-holder">
            <a href="{!!URL('/profile')!!}" class="profile-url">
                <img class="display-image" src="{!!asset(Auth::user()->profile_picture)!!}">
            </a>
        </div>
        <a href="{!!URL('/profile')!!}" class="profile-name display-name profile-url">{!!App\User::displayName(Auth::user()->id)!!}</a>
        <a href="{!!URL('for-rent/post-an-item')!!}" class="postItemLink">POST AN ITEM</a>
        <a href="{!!URL('logout')!!}" class="logoutLink">LOGOUT</a>
        <ul>
            <li class="{!! Request::segment(1) == 'profile' ? 'active' : '' !!}">
                <a href="{!!URL('profile')!!}">Profile</a>
            </li>
            <li class="{!! Request::segment(1) == 'notification' ? 'active' : '' !!}">
                <a href="{!!URL('notification')!!}">notification</a>
            </li>
            <li class="{!! Request::segment(1) == 'rented' ? 'active' : '' !!}">
                <a href="{!!URL('rented')!!}">Rented</a>
            </li>
            <li class="{!! Request::segment(1) == 'for-rent' ? 'active' : '' !!}">
                <a href="{!!URL('for-rent')!!}">for rent</a>
            </li>
            {{--<li class="{!! Request::segment(1) == 'paid' ? 'active' : '' !!}">
                <a href="{!!URL('paid')!!}">paid</a>
            </li>--}}
            <li class="{!! Request::segment(1) == 'messages' ? 'active' : '' !!}">
                <a href="{!!URL('messages')!!}">messages</a>
            </li>
            <li class="{!! Request::segment(1) == 'transaction' ? 'active' : '' !!}">
                <a href="{!!URL('transaction')!!}">transaction</a>
            </li>

            <li class="{!! Request::segment(1) == 'Cleaners' ? 'active' : '' !!}">
                <a class="btn__block popup-with-form" href="#show_map">cleaners near me</a>
            </li>
            <!-- THIS IS THE BUTTON FOR TESTING UPS API -->
            <!-- <li>
                <a href="{!!URL('test-blade')!!}">UPS TEST BLADE</a>
            </li> -->            
        </ul>
    </div>
</div>