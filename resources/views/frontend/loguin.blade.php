@extends('layouts.master')
@section('title')
    Authentic Metals, LLC
@endsection
@section('content')
    @include('includes.header')
    <div class="container-fluid">
        <div class="container">
            <div class="row" style="margin-top: 30px;margin-bottom: 30px">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 no_padding">
                        <a href="javascript:void(0);" style="font-size:80%;font-weight: bold;border-radius: 0px"
                           class="btn btn-lg btn-block text-uppercase panel_left_different">
                            We are 100% free!<span style="color: #000000"> Curious why?</span>
                        </a>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center login-form-container">
                    <div class="tabbable">
                        <ul class="nav nav-tabs" style="margin-bottom: 0px !important;">
                            <li id="SignIn_tab" class="active"><a aria-expanded="false" href="#SignIn"
                                                                  data-toggle="tab">Sign In</a></li>
                            <li id="SignUp_tab"><a aria-expanded="false" href="#SignUp" data-toggle="tab">Sign Up</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content tab_borders">
                            <div class="tab-pane fade active in" id="SignIn">
                                <fieldset>
                                    <form action="{{ route('signin') }}" method="post" id="form_signin">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}"
                                             style="margin-bottom: 10px">
                                            <div class="col-sm-12 col-md-12">
                                                <input class="form-control" type="text" name="email" id="email"
                                                       value="{{ Request::old('email') }}" placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                            <div class="col-sm-12 col-md-12"
                                                 style="margin-top: 10px !important;margin-bottom: 10px !important;">
                                                <input class="form-control" type="password" name="password"
                                                       id="password"
                                                       value="{{ Request::old('password')}}" placeholder="Password">
                                            </div>
                                        </div>
                                        @include('includes.message')
                                        <div class="form-group">
                                            <div class="col-sm-3 col-md-3 text-left" style="margin-bottom: 10px">
                                                <input type="hidden" value="0" id="invalid"/>
                                                <button type="submit" id="submit_signin" name="submit_signin"
                                                        class="btn btn-block panel_left_different">
                                                    Enter
                                                </button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    </form>
                                </fieldset>
                            </div>
                            <div class="tab-pane fade in" id="SignUp">
                                <fieldset>
                                    <form action="{{ route('signup') }}" method="post" id="form_SignUp">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}"
                                             style="margin-bottom: 10px">
                                            <div class="col-sm-12 col-md-12">
                                                <input class="form-control emailUp" type="text" name="email" id="email"
                                                       value="{{ Request::old('email') }}" placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <div class="col-sm-12 col-md-12" style="margin-top: 10px !important;">
                                                <input class="form-control nameUp" type="text" name="name" id="name"
                                                       value="{{ Request::old('name') }}" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                            <div class="col-sm-12 col-md-12"
                                                 style="margin-top: 10px !important;margin-bottom: 10px !important;">
                                                <input class="form-control passwordUp" type="password" name="password"
                                                       id="password"
                                                       value="{{ Request::old('password') }}" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                            <div class="col-sm-12 col-md-12"
                                                 style="margin-top: 2px !important;margin-bottom: 10px !important;">
                                                <input class="form-control" type="password" name="password_confirm"
                                                       id="password_confirm"
                                                       value="{{ Request::old('password_confirm') }}"
                                                       placeholder="Password confirm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3 col-md-3 text-left" style="margin-bottom: 10px">
                                                <input type="hidden" value="0" id="invalid"/>
                                                <a id="submit-reg" name="submit-reg"
                                                   class="btn btn-block panel_left_different">
                                                    Register
                                                </a>
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 no_padding" style="margin-top: 15px;">
                <img src="{{ URL::to('src/images/shadow.png') }}">
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        jQuery(document).ready(function ()
        {
            jQuery('#submit-reg').on('click', function ()
            {
                var bValid = true;
                bValid = bValid && checkRegexp(jQuery('.emailUp'), /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
                bValid = bValid && checkLength(jQuery('.nameUp'), 1, 240);
                bValid = bValid && checkLength(jQuery('.passwordUp'), 6, 120);
                bValid = bValid && checkPassword(jQuery('.passwordUp'), jQuery('#password_confirm'));
                if (bValid) {
                    jQuery('#form_SignUp').submit();
                }
            });
        })
    </script>
@endsection