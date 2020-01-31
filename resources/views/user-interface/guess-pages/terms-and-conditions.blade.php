@extends('user-interface.layout')
@section('title' , $page_content->section_first[0]->content)
@section('content')

    <div class="contact">
        <div class="section-1" style="background-image: url('{!!asset('user-interface')!!}/img/contact-bg.png');">
            <div class="mx-1254 clearfix">

                <div class="contact-holder clearfix">
                    <div class="col-md-offset-1 col-md-10">
                        @include('user-interface.guess-pages.terms-and-conditions-content');
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop