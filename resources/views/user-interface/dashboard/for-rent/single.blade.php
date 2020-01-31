@extends('user-interface.layout')
@section('title',App\User::displayName(Auth::user()->id))
@section('content')
    <div class="dashboard renting-inner">
        <div class="section-1">
            <div class="mx-1254 clearfix">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{!!URL('/')!!}">Home</a></li>
                        <li><a href="{!!URL('rented')!!}">Rented</a></li>
                        <li><span>RENT DETAIL </span></li>
                    </ul>
                </div>
                <div class="dashboard-container clearfix">
                    @include('user-interface.dashboard.includes.left-sidebar')
                    <div class="col-md-9">
                        <div class="page-content">
                            <div class="page-content-header clearfix">
                                <div class="header-left">
                                    <h3>Rented</h3>
                                </div>

                            </div>
                            <div class="product-inner-holder">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="img-holder">
                                            <img src="{!!asset($product->picture)!!}">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="item-description">
                                        <h5>{{$product->name}}</h5>
                                        <?php
                                        $product_review_avg = \App\Models\ProductUserReview::where('product_id', $product->id)->avg('rating');

                                        $product_review_avg = round($product_review_avg);

                                        $without_fill_start = 5 - $product_review_avg;

                                        $product_review = \App\Models\ProductUserReview::where('product_id', $product->id)->with(['user_detail' => function ($query) {
                                            $query->select("id", "contact_number", "location", "body_type", "first_name", "last_name", "profile_picture", "profile_picture_custom_size");
                                        }])->get();

                                        ?>
                                        <div class="star">
                                            <ul>
                                                @for($i=0;$i<$product_review_avg;$i++)
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                @endfor

                                                @for($j=0;$j<$without_fill_start;$j++)
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                @endfor
                                            </ul>
                                            <p class="toggle-title clicked"
                                               style="cursor:pointer">{{count($product_review)}} REVIEWS</p>
                                            <div class="toggle-details" style="display:none">
                                                <table class="table-bordered table-striped table-condensed cf">
                                                    <thead class="cf">
                                                    <tr>
                                                        <th>Index #</th>
                                                        <th>User</th>
                                                        <th>Title</th>
                                                        <th>Message</th>
                                                        <th>Rating</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(count($product_review)>0)
                                                        @foreach($product_review as $key=>$value)
                                                            <tr>
                                                                <td>{{$key+1}}</td>
                                                                <td>{{$value->user_detail->first_name}} {{$value->user_detail->last_name}}</td>
                                                                <td>{{$value->title}}</td>
                                                                <td>{{$value->comment}}</td>
                                                                <td><ul>
                                                                    @for($i = 0; $i < $value->rating; $i++)
                                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                    @endfor
                                                                    </ul>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="5">No Review Available</td>


                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-3">SEASON</strong>
                                            <div class="col-md-8">
                                                <p>{{$product->season}}</p>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-3">SIZE</strong>
                                            <div class="col-md-8">
                                                <p>{{$product->size}}</p>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-3">COLOR</strong>
                                            <div class="col-md-8">
                                                <p>{{$product->color}}</p>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-3">PRICE</strong>
                                            <div class="col-md-8">
                                                <p>$ {{$product->price}}/day</p>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-3">DESCRIPTION</strong>
                                            <div class="col-md-9">
                                                <p>{{$product->description}}</p>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-3">DATE POSTED</strong>
                                            <div class="col-md-9">
                                                <p>{{date('m/d/Y', strtotime($product->created_at))}}</p>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="clearfix profile-inner-holder">
                                            <div class="profile-image">
                                                <img src="{!!asset($owner->profile_picture)!!}">
                                            </div>
                                            <div class="profile-name">
                                                <a href="{!!URL('profile/profile-personal-info/'.Crypt::encrypt($owner->id))!!}">{{$owner->first_name}} {{$owner->last_name}}</a>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-3">CONTACT#</strong>
                                            <div class="col-md-9">
                                                <p>{{$owner->contact_number}}</p>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-3">LOCATION</strong>
                                            <div class="col-md-9">
                                                <p>{{$owner->location}}</p>
                                            </div>
                                        </div>
                                        <div class="clearfix list-description">
                                            <strong class="col-md-3">BODY TYPE</strong>
                                            <div class="col-md-9">
                                                <img src="{!!asset('user-interface/img/body-type-new-'.$owner->body_type.'.png')!!}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('js')
    @include('user-interface.cart.includes.js')
    <script>


        $(document).on("submit", "#submit_review", function () {
            // Set form data
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url': "{!!URL('rented/submit-review')!!}",
                'method': 'post',
                'dataType': 'json',
                'data': formData,
                'processData': false,
                'contentType': false,
                success: function (data) {
                    $(".rent-error").empty();
                    if (data.result == 'success') {
                        $(".display-name").text(data.name);
                        location.reload();
                    }
                    else {
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        $.each(data.errors, function (key, value) {
                            if (value != "") {
                                $("#rent_" + key).text(value);
                            }
                        });
                        $(".toggle-title").addClass('clicked');
                        $(".toggle-details").show();
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

        $("body").delegate(".cancel-booking", "click", function (e) {
            e.preventDefault();
            var location = $(this).data("location");
            swal({
                title: "Are you sure you want to cancel this booking?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        'url': location,
                        'method': 'get',
                        'dataType': 'json',
                        success: function (data) {
                            if (data.result == 'success') {
                                window.location.reload();
                            }
                            else {
                                swal("Action failed", "Please check your inputs or connection and try again.", "error");
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
                }
                else {
                    swal.close()
                }
            });
        });

        $("body").delegate(".acknowledgement", "click", function (e) {
            e.preventDefault();
            var selector = $(this);
            var location = selector.data("location");
            var merchant = selector.data("info");

            var bp = merchant.first_name + " " + merchant.last_name;

            var content = "<div><p style='text-align: left'>By checking this box, I acknowledge that: <br>" +
                "<ul style='text-align: left'>" +
                "<li style='margin: 10px 0;'>RentaSuit.ca is not an agent of <b>" + bp + "</b></li>" +
                "<li style='margin-bottom: 10px;'><b>" + bp + "</b> has provided fair consideration for the payment I am making</li>" +
                "<li style='margin-bottom: 10px;'>I authorize RentaSuit to charge my payment method, and release payment to <b>" + bp + "</b></li>" +
                "<li style='margin-bottom: 10px;'>Once RentaSuit  releases payment to <b>" + bp + "</b> on my behalf, this amount cannot be recovered by RentaSuit</li>" +

                "</ul>" +
                "</p></div>";

            swal({
                title: bp,
                text: content,
                html: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                customClass: 'swal-wide',
                confirmButtonText: "Yes, I acknowledge!",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    setTimeout(function () {
                        window.location = location;
                    }, 800);
                }
                else {
                    swal.close();
                }
            });
        });


    </script>
@stop