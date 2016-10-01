@extends('layouts.master')
@section('title')
    CONFIRM YOUR ACCOUNT
@endsection
@section('content')
    <style type="text/css">
        img {
            max-width: 100%;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            height: 100%;
            line-height: 1.6;
        }

        body {
            background-color: #f6f6f6;
        }

        @media only screen and (max-width: 640px) {
            h1 {
                font-weight: 600 !important;
                margin: 20px 0 5px !important;
            }

            h2 {
                font-weight: 600 !important;
                margin: 20px 0 5px !important;
            }

            h3 {
                font-weight: 600 !important;
                margin: 20px 0 5px !important;
            }

            h4 {
                font-weight: 600 !important;
                margin: 20px 0 5px !important;
            }

            h1 {
                font-size: 22px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            h3 {
                font-size: 16px !important;
            }

            .container {
                width: 100% !important;
            }

            .content {
                padding: 10px !important;
            }

            .content-wrap {
                padding: 10px !important;
            }

            .invoice {
                width: 100% !important;
            }
        }
    </style>
    <table class="body-wrap"
           style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background: #f6f6f6; margin: 0;">
        <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
            <td style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                valign="top"></td>
            <td class="container" width="600"
                style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                valign="top">
                <div class="content"
                     style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0"
                           style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background: #fff; margin: 0; border: 1px solid #e9e9e9;">
                        <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="alert alert-warning"
                                style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background: #FF9F00; margin: 0; padding: 20px;"
                                align="center" valign="top">
                                Mensaje recibido
                            </td>
                        </tr>
                        <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="content-wrap"
                                style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;"
                                valign="top">
                                <table width="100%" cellpadding="0" cellspacing="0"
                                       style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block"
                                            style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                            valign="top">
                                            <strong>De : </strong> {{ $email }}
                                        </td>
                                    </tr>
                                    <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block"
                                            style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                            valign="top">
                                            <strong>Asunto : </strong> {{ $subject }}
                                        </td>
                                    </tr>
                                    <tr style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block"
                                            style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                            valign="top">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="navbar-header col-md-12 col-sm-12 col-xs-12 no_padding">
                                                        <div class="col-md-7 col-xs-12 col-sm-12 no_padding"
                                                             style="padding-top: 8px">

                                                            <div style="margin-top: 25px;margin-bottom: 25px">
                                                                <p style="font-size: 16px; font-weight: bold">Thank you
                                                                    for
                                                                    registering with us</p>
                                                            </div>
                                                            <div style="margin-bottom: 25px">
                                                                <p>
                                                                    Hi <span style="color: red">{{ $name }}</span>,
                                                                    thanks for registering with
                                                                    us!
                                                                </p>
                                                            </div>
                                                            <div style="margin-bottom: 25px">
                                                                <button id="confirm" type="submit"
                                                                        class="btn btn-primary btn-danger"
                                                                        style="border-radius: 0">CONFIRM YOUR ACCOUNT
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                valign="top"></td>
        </tr>
        <input type="hidden" id="user_email" value="{{ $email }}">
    </table>
    </body>
    <script>
        var token = '{{Session::token()}}';
        var url = '{{route('signup')}}';
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function () {

            jQuery('#confirm').click(function () {
                alert('pp');
                jQuery.ajax({
                    method: 'POST',
                    url: url,
                    data: {user_email: jQuery('#user_email').val(), _token: token}
                })
                        .done(function (msg) {
                            window.location = "{{ route('dashboard') }}";
                        });
            });
        })
    </script>
@endsection

