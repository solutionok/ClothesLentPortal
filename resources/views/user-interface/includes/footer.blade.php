<footer class="footer">
    <div class="mx-1254">
        <div class="clearfix">
        
            <div class="col-md-5">
                <h5>About</h5>
                <p>This online service provides an opportunity for women to rent and display quality suits and garments for business, special occasions or events at an affordable price.</p>
                @if(unserialize($configuration->social_media_links)['facebook'] != '' || unserialize($configuration->social_media_links)['instagram'] != '' || unserialize($configuration->social_media_links)['twitter'] != '')
                    <ul class="footer-about-holder">
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
                @endif
            </div>
            <div class="col-md-2">
                <h5>site map</h5>
                <ul class="footer-site-map-holder">
                    <li><a href="{!!URL('/')!!}">Home</a></li>
                    <li><a href="{!!URL('about')!!}">About</a></li>
                    <li><a href="{!!URL('garments')!!}">Garments</a></li>
                    <!--li><a href="{!!URL('news')!!}">In The News</a></li-->
                    <li><a href="{!!URL('contact-us')!!}">Contact us</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5>Support</h5>
                <ul class="footer-support-holder">
                    <li><a href="{!!URL('terms-and-conditions')!!}"><b>Terms and Conditions</b></a></li>
                    <li><a href="{!!URL('privacy-policy')!!}"><b>Privacy Policy</b></a></li>
                    <li><a href="{!!URL('return-policy')!!}">Return Policy</a></li>
                    <li><a href="{!!URL('faq')!!}">FAQ</a></li>
                    @if(Auth::check() && Auth::user()->isAdmin() || !Auth::check())
                        <li><a href="#login" class="login popup-with-form" id="login-trigger">Login</a></li>
                        <li><a href="#signup" class="login popup-with-form">Sign up</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Contact informations</h5>
                <ul class="footer-contact-holder">
                    <li>
                        <a href="tel:1 (833) 7368">
                            <span>
                                <img src="{!!asset('user-interface')!!}/img/phone.png">
                            </span>

                            1 (833) 7368 <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1 (833) RENT

                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{$configuration->email}}">
                            <span>
                                <img src="{!!asset('user-interface')!!}/img/envelope.png">
                            </span>
                            {{$configuration->email}}
                        </a>
                    </li>
                    <li>
                        <a href="{!!URL('/')!!}">
                            <img src="{!!asset($configuration->logo_footer)!!}">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright text-center">
            <p>© <?php echo date('Y') ?> {{ $configuration->copyright }}</p>
        </div>
    </div>
</footer>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126224054-1"></script>
<script>

    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-126224054-1');

</script>