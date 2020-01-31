@extends('user-interface.layout')
@section('title' , $page_content->section_first[11]->content)
@section('content')
    <div class="contact">
        <div class="section-1" style="background-image: url('{!!asset('user-interface')!!}/img/contact-bg.png');">
            <div class="mx-1254 clearfix">
                <div class="header-title text-center">
                    <div class="bg">
                        {!! $page_content->section_first[0]->content !!}
                    </div>
                    <h2>{!! $page_content->section_first[1]->content !!}</h2>
                    <h1>{!! $page_content->section_first[2]->content !!}</h1>
                </div>
                <div class="contact-holder clearfix">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="left-container">
                                    <ul>
                                        <li>
                                            <div class="icon-holder">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <h4>{!! $page_content->section_first[3]->content !!}</h4>
                                            <p>{{$configuration->location}}</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="icon-holder">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <h4>{!! $page_content->section_first[4]->content !!}</h4>
                                            <a href="tel:{{$configuration->phone_number}}">{{$configuration->phone_number}}</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="icon-holder">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <h4>{!! $page_content->section_first[5]->content !!}</h4>
                                            <a href="mailto:{{$configuration->email}}">{{$configuration->email}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-holder">
                                    <form id="contact-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control contact-value" name="name" placeholder="{!! $page_content->section_first[6]->content !!}">
                                            <span class="contact-error errors" id="contact_name"></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control contact-value" name="email_address" placeholder="{!! $page_content->section_first[7]->content !!}">
                                            <span class="contact-error errors" id="contact_email_address"></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="select">
                                            <select class="form-control" id="subject-value" name="subject">
                                                <option value="none">Please select a subject category</option>
                                                @foreach(unserialize(base64_decode($page_content->section_first[8]->content)) as $value)
                                                <option value="{!!$value[0]['field_value']!!}">{!!$value[0]['field_value']!!}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <span class="contact-error errors" id="contact_subject"></span>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="textarea-control contact-value" rows="7" placeholder="{!! $page_content->section_first[9]->content !!}" name="message"></textarea>
                                            <span class="contact-error errors" id="contact_message"></span>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-default submit-btn">{!! $page_content->section_first[10]->content !!}</button>
                                        </div>
                                        {!! csrf_field() !!}
                                    </form>
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
    <script type="text/javascript">
        $(document).on("submit","#contact-form",function(){
            $.ajax({
                'url'      : "{!! URL('contact-us') !!}",
                'method'   : 'post',
                'dataType' : 'json',
                'data'     : $(this).serialize(),
                success    : function(data){
                    $(".contact-error").empty();
                    if(data.result == 'success'){
                        $(".contact-value").val("");
                        $("#subject-value").val("none");
                        swal("Good job!", "Message has been sent.", "success");
                    }
                    else{
                        swal("Action failed", "Please check your inputs or connection and try again.", "error");
                        $.each(data.errors,function(key,value){
                            if(value != ""){
                                $("#contact_"+key).text(value);
                            }
                        });
                    }
                },
                beforeSend : function(){
                    $('#loadingDiv').show()
                },
                complete   : function(){
                    $('#loadingDiv').hide();
                }
            });
            return false;
        });
    </script>
@stop