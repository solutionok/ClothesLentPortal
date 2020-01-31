@extends('admin-interface.layout')
@section('title','Login')
@section('class','body-full-height')
@section('content')
    <div class="login-container lightmode">
        <div class="login-box animated fadeInDown">
            <div class="login-body">
                <div class="login-title"><strong>Log In</strong> to your account</div>
                <form action="{!! URL('admin/login') !!}" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="email" class="form-control" value="{!! old('email') !!}" placeholder="E-mail"/>
                            <span class="help-block" style="color:red">{!! $errors->first('email') !!}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            <span class="help-block" style="color:red">{!! $errors->first('password') !!}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="{!! URL('admin/forgot-password') !!}" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    @if(Request::has('URI'))
                        <input type="hidden" value="{!! Request::input('URI') !!}" name="uri">
                    @endif
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