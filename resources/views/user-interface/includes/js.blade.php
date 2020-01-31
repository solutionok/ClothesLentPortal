<script src="{!!asset('user-interface')!!}/js/vendor/jquery-1.11.2.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase-functions.js"></script>
<script>
    // Initialize Firebase
    /**/
    var config = {
     apiKey: "AIzaSyDWDzgrgR0TcumBarUFj0WRHGXu5QAVmEI",
     authDomain: "test-88278.firebaseapp.com",
     databaseURL: "https://test-88278.firebaseio.com",
     projectId: "test-88278",
     storageBucket: "",
     messagingSenderId: "318964308759"
     };
     var defaultApp =  firebase.initializeApp(config);
     console.log(defaultApp.name);
     console.log('fire base config');

    // var config = {
    //     apiKey: "AIzaSyCVsdZxrJ9ZGzpKombrJH2-pZGJgWUeSAc",
    //     authDomain: "rentsuite-chat.firebaseapp.com",
    //     databaseURL: "https://rentsuite-chat.firebaseio.com",
    //     projectId: "rentsuite-chat",
    //     storageBucket: "rentsuite-chat.appspot.com",
    //     messagingSenderId: "800937905251"
    // };
    var defaultApp = firebase.initializeApp(config);
    console.log(defaultApp.name);
    console.log('fire base config');
</script>
<script src="{!!asset('user-interface')!!}/js/vendor/bootstrap.min.js"></script>
<script defer src="{!!asset('user-interface')!!}/js/main.js"></script>
<script src="{!!asset('user-interface')!!}/js/jquery.magnific-popup.min.js"></script>
<script src="{!!asset('user-interface')!!}/js/jquery-ui.min.js"></script>
<script src="{!!asset('user-interface')!!}/js/daterangepicker.js"></script>
<script src="{!!asset('user-interface')!!}/js/moment.js"></script>
<script src="{!!asset('user-interface')!!}/js/jquery.raty.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="{!! asset('user-interface/js/jquery.bootstrap-responsive-tabs.js') !!}"></script>
<script defer src="{!!asset('js')!!}/sweetalert.min.js"></script>
<script src="{!!asset('js')!!}/jquery-ui.multidatespicker.js"></script>

{{--<script async src="Https://www.googletagmanager.com/gtag/js?id=UA-126224254-1"></script>--}}

@yield('js')
@if(Session::has('session_header'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("{!! Session::get('session_header') !!}", "{!! Session::get('session_content') !!}", "{!! Session::get('session_boolean') !!}");
        });
    </script>
@endif
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("click", ".login_modal", function () {
            redirect_url = $(this).attr('redirect_url');

            $("#redirect_url").val(redirect_url);
        });
        $('.popup-with-form').magnificPopup({
            type: 'inline',
            callbacks: {
                beforeOpen: function () {
                    $('#loadingDiv').show()
                },
                open: function () {
                    $('#loadingDiv').hide();
                },
                close: function () {
                    $(".register-value").val("");
                    $(".register-error").empty();
                    $(".login-value").val("");
                    $(".login-error").empty();
                    $("#forgot-password-value").val("");
                    $(".forgot-password-error").empty();
                    $(".reset-password-value").val("");
                    $(".reset-password-error").empty();
                }
            }
        });
    });
</script>
@if(Auth::check() && !Auth::user()->isAdmin())
    <script type="text/javascript">
        // Clean the url
        if (window.location.hash && window.location.hash == '#_=_') {
            if (window.history && history.pushState) {
                window.history.pushState("", document.title, window.location.pathname);
            } else {
                // Prevent scrolling by storing the page's current scroll offset
                var scroll = {
                    top: document.body.scrollTop,
                    left: document.body.scrollLeft
                };
                window.location.hash = '';
                // Restore the scroll offset, should be flicker free
                document.body.scrollTop = scroll.top;
                document.body.scrollLeft = scroll.left;
            }
        }
    </script>
@else
    <script type="text/javascript">

        $(document).on("submit", "#registration-form", function () {
            $.ajax({
                'url': "{!! URL('registration') !!}",
                'method': 'post',
                'dataType': 'json',
                'data': $(this).serialize(),
                success: function (data) {
                    $(".register-error").empty();
                    if (data.result == 'success') {

                        first_name = $("#r_first_name").val();
                        last_name = $("#r_last_name").val();
                        email = $("#r_email").val();
                        password = $("#r_password").val();

                        url = "<?php echo url('');?>/";
                        _token = $("input[name=_token]").val();

                        firebase.auth().signInWithEmailAndPassword(email, password).catch(function (error) {
                            // Handle Errors here.
                            var errorCode = error.code;
                            var errorMessage = error.message;

                            if (errorCode == "auth/user-not-found") {
                                create_user = firebase.auth().createUserWithEmailAndPassword(email, password).catch(function (error) {
                                    // Handle Errors here.
                                    var errorCode = error.code;
                                    var errorMessage = error.message;
//                                    alert("Error : " + errorMessage);
                                }).then(function (user) {

                                    if (user) {

                                        firebase.database().ref('Users/' + user.uid).set({
                                            device_token: '',
                                            name: first_name + ' ' + last_name,
                                            image: url + data.response.profile_picture
                                        });
                                        $.post(url + "update_firebase_id", {
                                            id: data.response.id,
                                            firebase_id: user.uid,
                                            _token: _token
                                        }, function (data) {
                                            console.log("data:" + data);
                                        });
                                    }

                                });
                            } else {
//                                alert("Error Login: " + errorMessage);
                            }

                        }).then(function (user) {

                            if (user) {
                                //alert("User Login Successfully.");
                                //console.log("Login:"+user.uid);
                                firebase.database().ref('Users/' + user.uid).set({
                                    device_token: '',
                                    name: first_name + ' ' + last_name,
                                    image: url + data.response.profile_picture
                                });

                                $.post(url + "update_firebase_id", {
                                    id: data.response.id,
                                    firebase_id: user.uid,
                                    _token: _token
                                }, function (data) {
                                    console.log("data:" + data);
                                });
                            }

                        });

                        swal("Good Job!", "An email has been sent to your registered email address.", "success");
                        $.magnificPopup.close();
                    }
                    else {
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        $.each(data.errors, function (key, value) {
                            if (value != "") {
                                $("#register_" + key).text(value);
                            }
                        });
                    }
                },
                beforeSend: function () {
                    $('#loadingDiv').show();
                },
                complete: function () {
                    $('#loadingDiv').hide();
                }
            });
            return false;
        });

        $(document).on("submit", "#newslatter", function () {
            $.ajax({
                'url': "{!! URL('add-news-latter') !!}",
                'method': 'post',
                'dataType': 'json',
                'data': $(this).serialize(),
                success: function (data) {
                    $(".login-error").empty();
                    if (data.result == 'success') {
                        $("#newslatter")[0].reset();

                        swal("Good Job!", "Thanks for added your email in News Latter.", "success");
                        $.magnificPopup.close();
                    }
                    else {
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        $.each(data.errors, function (key, value) {
                            if (value != "") {
                                $("#news_latter_" + key).text(value);
                            }
                        });
                    }
                },
                beforeSend: function () {
                    $('#loadingDiv').show();
                },
                complete: function () {
                    $('#loadingDiv').hide();
                }
            });
            return false;
        });

        $(document).on("submit", "#forgot-password-form", function () {
            $.ajax({
                'url': "{!! URL('forgot-password') !!}",
                'method': 'post',
                'dataType': 'json',
                'data': $(this).serialize(),
                success: function (data) {
                    $(".forgot-password-error").empty();
                    if (data.result == 'success') {
                        swal("Good job!", "An email has been sent to your registered email address.", "success");
                        $.magnificPopup.close();
                    } else if (data.result == 'social media') {
                        swal("Action failed", "The email is registered as a social media account.", "error");
                    }
                    else {
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        $.each(data.errors, function (key, value) {
                            if (value != "") {
                                $("#forgot_password_" + key).text(value);
                            }
                        });
                    }
                },
                beforeSend: function () {
                    $('#loadingDiv').show()
                },
                complete: function () {
                    $('#loadingDiv').hide();
                }
            });
            return false;
        });
        $(document).on("submit", "#login-form", function () {
            var onComplete = function (error) {
                if (error) {
                    console.log('Operation failed');
                } else {
                    console.log(' Operation completed');
                }
            };
            redirect = $(this).attr('redirect');
            $.ajax({
                'url': "{!! URL('login') !!}",
                'method': 'post',
                'dataType': 'json',
                'data': $(this).serialize(),
                success: function (data) {
                    $(".login-error").empty();
                    if (data.result == 'success') {


                        email = $("#l_email").val();
                        password = $("#l_password").val();
                        first_name = data.response.first_name;
                        last_name = data.response.last_name;
                        url = "<?php echo url('');?>/";
                        _token = $("input[name=_token]").val();
                        //firebase.auth().signOut();
                        firebase.auth().signInWithEmailAndPassword(email, password).catch(function (error) {
                            // Handle Errors here.
                            var errorCode = error.code;
                            var errorMessage = error.message;

                            if (errorCode == "auth/user-not-found") {
                                create_user = firebase.auth().createUserWithEmailAndPassword(email, password).catch(function (error) {
                                    // Handle Errors here.
                                    var errorCode = error.code;
                                    var errorMessage = error.message;
//                                    alert("Error : " + errorMessage);
                                }).then(function (user) {

                                    if (user) {
                                        //alert("User Registered Successfully.");
                                        console.log("Register:" + user.uid);

                                        firebase.database().ref('Users/' + user.uid).set({
                                            device_token: '',
                                            name: first_name + ' ' + last_name,
                                            image: url + data.response.profile_picture
                                        }, function (error) {
                                            if (error) {
                                                console.log('Operation failed');
                                            } else {
                                                $('#loadingDiv').hide();
                                                window.location.href = data.url;
                                            }
                                        });
                                        console.log('register record save');
                                        $.post(url + "update_firebase_id", {
                                            id: data.response.id,
                                            firebase_id: user.uid,
                                            _token: _token
                                        }, function (data) {
                                            console.log("data:" + data);
                                        });
                                    }

                                });
                            } else {
//                                alert("Error Login: " + errorMessage);
                            }

                        }).then(function (user) {

                            if (user) {
                                //alert("User Login Successfully.");
                                console.log("Login:" + user.uid);
                                firebase.database().ref('Users/' + user.uid).set({
                                    device_token: '',
                                    name: first_name + ' ' + last_name,
                                    image: url + data.response.profile_picture
                                }, function (error) {
                                    if (error) {
                                        console.log('Operation failed');
                                    } else {
                                        $('#loadingDiv').hide();
                                        window.location.href = data.url;
                                    }
                                });
                                console.log('login record save');
                                $.post(url + "update_firebase_id", {
                                    id: data.response.id,
                                    firebase_id: user.uid,
                                    _token: _token
                                }, function (data) {
                                    console.log("data:" + data);
                                });
                            }

                        });
                        //return false;
                        /*setTimeout(function(){
                         $('#loadingDiv').hide();
                         window.location.href = data.url;
                         },10000);*/

                    }
                    else if (data.result == 'invalid') {
                        swal("Error!", data.message, "error");
                        $('#loadingDiv').hide();
                    }
                    else {
                        $('#loadingDiv').hide();
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        $.each(data.errors, function (key, value) {
                            if (value != "") {
                                $("#login_" + key).text(value);
                            }
                        });
                    }
                },
                beforeSend: function () {
                    $('#loadingDiv').show();
                },
                complete: function () {
                    //$('#loadingDiv').hide();
                }
            });
            return false;
        });

        $("body").delegate(".facebook","click",function(e){

            e.preventDefault();
            var selector = $(this);
            var location = selector.data("location");

            var content = '<div class="row"> ' +
                '<span style="float: left;width: 15%">&nbsp;</span>' +
                '<input type="checkbox" name="agree" id="radio1" style="margin: 0; box-shadow: none; width: 5%; display: block; height: 15px; float: left;"> ' +
                '<label style="width: 80%; text-align: left; cursor:pointer" for="radio1">I agree to all <a target="_blank" href="{!!URL('terms-and-conditions')!!}">Terms and Conditions</a> and <a target="_blank" href="{!!URL('privacy-policy')!!}">Privacy Policy</a></label> ' +
                '</div> ';

            swal({
                title             : "",
                text              : content,
                type              : "warning",
                html              : true,
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                customClass       : 'swal-wide',
                confirmButtonText : "Accept",
                cancelButtonText  : "No",
                closeOnConfirm    : false,
                closeOnCancel     : false
            }, function(isConfirm){
                if(isConfirm){
                    checked = $("input:checkbox[name=agree]:checked").val() ? 1 : 0;

                    if(checked) {
                        setTimeout(function () {
                            window.location = location;
                        }, 800);
                    }
                }
                else{
                    swal.close();
                }
            });

        });
    </script>
    @if(Request::input('authenticate') == 'invalid' || Request::segment(1) == 'verify-registration')
        <script type="text/javascript">
            $(document).ready(function () {
                $("#login-trigger").click();
            });
        </script>
    @endif
    @if(isset($id))
        <script type="text/javascript">
            $(document).on("submit", "#reset-password-form", function () {
                $.ajax({
                    'url': "{!! URL('reset-password') !!}",
                    'method': 'post',
                    'dataType': 'json',
                    'data': $(this).serialize(),
                    success: function (data) {
                        $(".reset-password-error").empty();
                        if (data.result == 'success') {

                            firebase.auth().signInWithEmailAndPassword(data.user_detail.email, data.user_old_password).catch(function (error) {
                                var errorCode = error.code;
                                var errorMessage = error.message;
//                                alert("Error : " + errorMessage);
                            }).then(function (user) {
                                if (user) {
                                    var user = firebase.auth().currentUser;


                                    user.updatePassword(data.new_password).then(function () {
                                        // Update successful.
                                        //alert('firebase pasword change');
                                    }, function (error) {
                                        // An error happened.
                                    });
                                }
                            });


                            swal("Good job!", "Password has been changed.", "success");
                            $.magnificPopup.close();
                        } else {
                            swal("Action failed", "Please check your inputs or connection and try again.", "error");
                            $.each(data.errors, function (key, value) {
                                if (value != "") {
                                    $("#reset_password_" + key).text(value);
                                }
                            });
                        }
                    },
                    beforeSend: function () {
                        $('#loadingDiv').show()
                    },
                    complete: function () {
                        $('#loadingDiv').hide();
                    }
                });
                return false;
            });
            $(document).ready(function () {
                $("#reset-password-trigger-popup").click();
            });
        </script>
    @endif
@endif