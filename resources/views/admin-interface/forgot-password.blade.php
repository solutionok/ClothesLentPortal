@extends('admin-interface.layout')
@section('title','Forgot Password')
@section('class','body-full-height')
@section('content')
    <div class="login-container lightmode">
        <div class="login-box animated fadeInDown">
            <div class="login-body">
                <div class="login-title"><strong>Forgot Password</strong> to retrieve account</div>
                <form action="{!! URL('admin/forgot-password') !!}" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="email" value="{!! old('email') !!}" class="form-control" placeholder="E-mail"/>
                            <span class="help-block" style="color:red">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="{!! URL('admin') !!}" class="btn btn-link btn-block">Return to login page</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Submit</button>
                        </div>
                    </div>
                    {!! csrf_field() !!}
                </form>
            </div>
            <div class="login-footer">
                <div class="pull-left">
                    {{ $configuration->copyright }}
                </div>                    
            </div>
        </div>            
    </div>
@stop