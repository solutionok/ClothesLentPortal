@extends('admin-interface.layout')
@section('title','Reset Password')
@section('class','body-full-height')
@section('content')
    <div class="login-container lightmode">
        <div class="login-box animated fadeInDown">
            <div class="login-body">
                <div class="login-title"><strong>Reset Password</strong> to secure your account</div>
                <form action="{!! URL('admin/reset-password') !!}" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" value="{!! old('password') !!}" class="form-control" placeholder="New Password"/>
                            <span class="help-block" style="color:red">{{ $errors->first('password') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password_confirmation" value="{!! old('password_confirmation') !!}" class="form-control" placeholder="Confirm New Password"/>
                            <span class="help-block" style="color:red">{{ $errors->first('password_confirmation') }}</span>
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
                    <input type="hidden" value="{!! $id !!}" name="id">
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