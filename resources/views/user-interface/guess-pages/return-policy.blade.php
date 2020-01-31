@extends('user-interface.layout')
@section('title' , $page_content->section_first[0]->content)
@section('content')


    <div class="contact">
        <div class="section-1" style="background-image: url('{!!asset('user-interface')!!}/img/contact-bg.png');">
            <div class="mx-1254 clearfix">

                <div class="contact-holder clearfix">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Return Policy</h3>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="policy">
                                    <li>We are confident in the RENT A SUIT experience. However, if the Item received by the Lessee is damaged, or if the Item does not look like the picture displayed on the Platform the Lessee should complete the appropriate form on the Platform and return the Item to the Business Partner. Upon submitting the appropriate forms Lessee shall receive the refund of the Rental Period Fees (if applicable). Rent a Suit Fees shall not be refunded.</li>
                                    <li>Lessee may submit a complaint and ask for a refund within twenty-four (24) hours after receipt
                                        of the Items, otherwise the Items is considered as flawless.</li>
                                    {{--<li>UNDER CANCELLATION SELECTION in PROFILE- CHANGE TEXT TO: Aggressive – bookings may be canceled without penalty more than ten (10) days before the beginning of the Rental Period;</li>--}}
                                    {{--<li>Moderate - bookings may be canceled without penalty more than six (6) days before the--}}
                                    {{--beginning of the Rental Period</li>--}}
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop