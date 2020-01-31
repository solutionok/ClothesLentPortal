<header id="header">
    <div class="navbar-holder">
        <!-- if you want to customize the nav, just add class and call it on css -->
        <div class="top-header">
            <div class="mx-1254 clearfix">
                @if(unserialize($configuration->social_media_links)['facebook'] != '' || unserialize($configuration->social_media_links)['instagram'] != '' || unserialize($configuration->social_media_links)['twitter'] != '')
                    <div class="pull-left">
                        <ul>
                            <li><p>Follow us</p></li>
                            @if(unserialize($configuration->social_media_links)['facebook'] != '')
                                <li>
                                    <a href="{!! unserialize($configuration->social_media_links)['facebook'] !!}" target="_blank">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endif
                            @if(unserialize($configuration->social_media_links)['twitter'] != '')
                                <li>
                                    <a href="{!! unserialize($configuration->social_media_links)['twitter'] !!}" target="_blank">
                                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endif
                            @if(unserialize($configuration->social_media_links)['instagram'] != '')
                                <li>
                                    <a href="{!! unserialize($configuration->social_media_links)['instagram'] !!}" target="_blank">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
                <div class="pull-right">
                    <ul>
                        @if(Auth::check())
                        <li id="msg-display" style=""><a href="{!!URL('messages')!!}">
                                <i style="font-size: 14px;" class="fa fa-envelope" aria-hidden="true">
                                    <span style="display: none;
                                    border-radius: 5px;
                                    padding: 4px;
                                    background-color: red;
                                    font-size: 12px" id="msg-count"></span>
                                </i>

                            </a>
                        </li>
                        <li id="noti-display" style=""><a href="{!!URL('notification')!!}">
                                <i style="font-size: 14px;" class="fa fa-bell" aria-hidden="true">
                                <span style="display: none;
                                border-radius: 5px;
                                padding: 4px;
                                background-color: red;
                                font-size: 12px" id="noti-count"></span>
                                </i>

                            </a>
                        </li>
                        @endif
                        @if(Auth::check() && !Auth::user()->isAdmin())
                            <li><a href="{!!URL('profile')!!}"><i class="fa fa-user-o" aria-hidden="true"></i>My account</a></li>
                        @endif
                        <li><a href="{!!URL('my-cart')!!}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>my cart </a></li>
                        @if(Auth::check() && !Auth::user()->isAdmin())
                            <li><a href="{!!URL('my-wishlist')!!}"><i class="fa fa-heart-o" aria-hidden="true"></i>my wishlist</a></li>
                        @endif
                        @if(Auth::check() && !Auth::user()->isAdmin())
                            <li><a href="{!!URL('logout')!!}"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <nav role="navigation" class="navbar navbar-default navbar_default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="mx-1254">
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{!!URL('/')!!}" class="navbar-brand logo">
                        <img src="{!!asset($configuration->logo)!!}">
                    </a>
                </div>
                <!-- Collection of nav links, forms, and other content for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navbar_right">
                        <li class="{!! Request::segment(1) == NULL ? 'active' : '' !!}">
                            <a href="{!!URL('/')!!}" class="hvr-underline-from-center">Home</a>
                        </li>
                        <li class="{!! Request::segment(1) == 'about' ? 'active' : '' !!}">
                            <a href="{!!URL('about')!!}" class="hvr-underline-from-center">about</a>
                        </li>
                        <li class="{!! Request::segment(1) == 'garments' ? 'active' : '' !!}">
                            <a href="{!!URL('garments')!!}" class="hvr-underline-from-center">garments</a>
                        </li>
                        <!--li class="{!! Request::segment(1) == 'blogs' ? 'active' : '' !!}">
                            <a href="{!!URL('news')!!}" class="hvr-underline-from-center">IN THE NEWS</a>
                        </li-->
                        <li class="{!! Request::segment(1) == 'contact-us' ? 'active' : '' !!}">
                            <a href="{!!URL('contact-us')!!}" class="hvr-underline-from-center">contact us</a>
                        </li>
                        <li class="{!! Request::segment(1) == 'shipping-calculator' ? 'active' : '' !!}">
                            <a href="{!!URL('shipping-calculator')!!}" class="hvr-underline-from-center">shipping calculator</a>
                        </li>
                        @if(Auth::check() && Auth::user()->isAdmin() || !Auth::check())
                            <li>
                                <a href="#login" class="login popup-with-form">Login</a>
                            </li>
                        @endif

                        @if(Auth::check() && Auth::user())
                            <input type="hidden" id="firebase_id" value={!!(Auth::user()->firebase_id)!!} />
                        @else
                            <input type="hidden" id="firebase_id" value="" />
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>



<script type="text/javascript">

    setInterval(function(){

        displayMessages();
        displayNotification();

    },10000);

    function displayMessages () {

        count = 0;
        firebase.database().ref().child('Chat').on('child_added', function (data) {
            data.forEach(function (dt) {

                var firebaseID = $("#firebase_id").val();

                if (firebaseID == dt.key) {

                    let v = dt.val();
                    let k = Object.keys(v)[0];

//                    console.log(k);

                    isSeen = v[k].seen;
//                    console.log("header console", isSeen);
                    if (isSeen) {
//                        $("#noti-display").hide();
                    } else {
                        count++;
//                        $("#noti-display").show();
                    }


                }

            });

            if(count) {
                $("#msg-count").show();
                $("#msg-count").html(count);
            }
        });
    }

    function displayNotification () {

        $.ajax({
            'url': "<?php echo URL('/notification/getCount'); ?>",
            'method': 'get',
            success: function (data) {

                if(data.count) {
                    $("#noti-count").show();
                    $("#noti-count").html(data.count);
                } else {
                    $("#noti-count").hide();
                }

            },
        });

    }

</script>
