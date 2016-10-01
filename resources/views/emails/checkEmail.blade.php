@extends('layouts.master')
@section('title')
    {{ trans('en.confirmation') }}
@endsection
@section('content')
    <div class="container">
        <nav class="navbar header_nav">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="navbar-header col-md-12 col-sm-12 col-xs-12 no_padding">
                        <div class="col-md-7 col-xs-12 col-sm-12 no_padding">

                            <div>
                                <p></p>
                            </div>
                            <div>
                                <p>
                                    Hi <span>{{ $user->name }}</span>, {{ trans('en.confirmation') }}
                                </p>

                                <p>{{ trans('en.check_email') }}</p>
                            </div>
                            <div>
                                <input type="hidden" id="user_id" value="{{ $user->id }}">
                                <button id="confirm" type="submit" class="btn btn-primary btn-danger"
                                        style="border-radius: 0">{{ trans('en.confirm_account') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <script>
        var token = '{{Session::token()}}';
        var url = '{{route('signup')}}';
    </script>
    <script type="text/javascript">

        jQuery(document).ready(function ()
        {

            jQuery('#confirm').click(function ()
            {
                jQuery.ajax({
                    method: 'POST',
                    url: url,
                    data: {user_id: jQuery('#user_id').val(), _token: token}
                })
                        .done(function (msg)
                        {
                            window.location = "{{ route('dashboard') }}";
                        });
            });
        })
    </script>
@endsection



