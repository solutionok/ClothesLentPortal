@extends('user-interface.layout')
@section('title' , $page_content->section_first[0]->content)
@section('content')

    <div class="contact">
        <div class="section-1" style="background-image: url('{!!asset('user-interface')!!}/img/contact-bg.png');">
            <div class="mx-1254 clearfix">

                <div class="contact-holder clearfix">
                    <div class="col-md-offset-1 col-md-10 tcNpp">
                        @include('user-interface.guess-pages.terms-and-conditions-content');
                    </div>
                </div>
                <hr>
                <div class="contact-holder clearfix">
                    <div class="col-md-offset-1 col-md-10 tcNpp">
                        @include('user-interface.guess-pages.privacy-policy-content');
                    </div>
                </div>

                <div class="clearfix">
                    <a href="{!! URL('garments') !!}" style="background:#d4ad53;color:#fff; margin: 20px 100px; float: right"
                       class="btn btn-sm with-background">I ACCEPT</a>
                </div>

            </div>
        </div>
    </div>

@stop