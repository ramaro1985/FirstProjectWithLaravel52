<style>
    hr {
        width: 100%;
        margin-bottom: 0px;
        border-color: #D5D5D5;
        border-bottom: 1px solid #D5D5D5;
    }

    textarea.form-control {
        height: 170px;
    }

    .form-control {
        border-radius: 0;
    }

    label {
        padding-right: 15px
    }

    .comillas {
        color: black;
        font-weight: bold;
    }

    .zoom {

        /* Aumentamos la anchura y altura durante 2 segundos */

        transition: width 2s, height 2s, transform 2s;

        -moz-transition: width 2s, height 2s, -moz-transform 2s;

        -webkit-transition: width 2s, height 2s, -webkit-transform 2s;

        -o-transition: width 2s, height 2s, -o-transform 2s;

    }

    .zoom:hover {

        /* tranformamos el elemento al pasar el mouse por encima al doble de

           su tamaño con scale(2). */

        transform: scale(2);

        -moz-transform: scale(2); /* Firefox */

        -webkit-transform: scale(2); /* Chrome - Safari */

        -o-transform: scale(2); /* Opera */

    }

    hr {
        width: 100%;
        margin-bottom: 0px;
        border-color: #D5D5D5;
        border-bottom: 1px solid #D5D5D5;
    }

    textarea.form-control {
        height: 100px;
    }

    .form-control {
        border-radius: 0;
    }

    label {
        padding-right: 0px;
    }

    #contactfront_userType label {
        padding-right: 18px;
        padding-left: 10px !important;
    }

    .asterik {
        margin-left: -3px;
        color: red;
    }

    .no_padding {
        padding-left: 0px;
        padding-right: 0px;
    }

    .rest_form div {
        margin-top: 10px;
    }

    .tab_borders {
        background-color: transparent !important;
    }

</style>
<header>
    @if(Auth::user())
        <nav class="navbar navbar-fixed-top visible-lg visible-md"
             style="background-color: black;min-height: 18px; margin-bottom: 0px; position: relative">
            <div class="container">
                <div class="row">
                    <div class="col-xs-11 col-xs-offset-1 col-md-10 col-md-offset-2 col-sm-6 col-sm-offset-6">
                        <ul class="nav navbar-nav navbar-right small"
                            style="margin-bottom: 0px;padding-top: 3px;padding-right: 6px;">
                            <label style="text-decoration: none; color: white;margin-bottom: 0px">Welcome, {{route('dashboard')}} </label>
                            <a href="{{route('account.get')}}" class=""
                               style="text-decoration: none; color: white;">&nbsp;&nbsp;&nbsp;My Account&nbsp;&nbsp;</a>
                            <span class="divider-vertical"></span>
                            <a href="{{route('logout')}}" class=""
                               style="text-decoration: none; color: white;padding-left: 7px;">Sing Out
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    @else
        <nav class="navbar navbar-fixed-top"
             style="background-color: black;min-height: 18px; margin-bottom: 0px; position: relative">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-md-offset-6">
                        <div class="col-xs-11 col-xs-offset-1 col-md-10 col-md-offset-2 col-sm-6 col-sm-offset-6 no_padding">
                            <ul class="nav navbar-nav small" style="padding-top: 4px;">
                                <a href="{{route('frontend.loguin',['header_id'=>2])}}" class="text-uppercase"
                                   style="text-decoration: none; color: white;">Sign In</a>
                                <span class="divider-vertical"></span>
                                <a href="{{route('frontend.loguin',['header_id'=>2])}}" class="text-uppercase"
                                   style="text-decoration: none; color: white;"> Sign Up</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    @endif
    @if($header_id == 1)
        <div class="container-fluid visible-lg visible-md">
            <form id="form_find_work" action="" method="POST">
                <div class="row">
                    <div class="col-xs-12 col-md-12 no_padding">
                        <div class="col-xs-12 col-md-6 no_padding ">
                            <div id="panel_buy" class="panel">
                                <div class="grises">
                                    <img class="img-responsive hover" id="house" style="width: 100%;"
                                         src="{{ URL::to('src/images/home/house1.jpg') }}" alt=""/>
                                </div>
                                <div class="col-xs-12 col-md-7 div_logo">
                                    <div id="link_menu" class="col-xs-2 col-md-2">
                                        <span id="showslidepanel" class="menu_icon"></span>
                                    </div>
                                    <div class="col-xs-10 col-md-10 text-center">
                                        <img class="logo col-xs-12 col-md-12"
                                             src="{{ URL::to('src/images/home/logo-met.png') }} ">
                                    </div>
                                </div>
                                <div class="col-md-5 div_form_in_header left">
                                    <h1 class="text-right text-uppercase bold_text">works</h1>

                                    <div class="btn-group-vertical btn-group-lg" style="width: 100%">
                                        <div class="dropdown">
                                            <a id="find_service_btn" role="button" href="#"
                                               class="btn btn-default dropdown-toggle panel_button btn-lg"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <small name="service" class="pull-left">any service</small>
                                                <input class="service_value" type="hidden" name="service" value="all"/>
                                                <span class="caret"></span>
                                                <input type="hidden" id="service_val" value="0">
                                            </a>
                                            <ul class="dropdown-menu service_dropdown sell pre-scrollable"
                                                aria-labelledby="service_btn">
                                                <li>
                                                    <a id='all' href='javascript:void(0)'
                                                       onclick='javascript:ChangeDropDownValue(this)'>Any service</a>
                                                </li>
                                                @foreach($services as $service)
                                                    <li><a id="{{$service->id}}"
                                                           href="javascript:void(0)">{{$service->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="dropdown">
                                            <input type="text" id="zipcode_input" name="zipcode"
                                                   class="btn btn-default panel_button btn-lg dropdown_input"
                                                   style="float:left;width:100%;text-align: left !important;padding: 12.5px 16px;font-size: 110%"
                                                   placeholder="Price init"/>
                                        </div>
                                        <div class="dropdown">
                                            <a id="clear_filter"
                                               style="float:right;width:49%;text-align: center !important;padding: 10px 0px;"
                                               class="btn btn-default panel_button btn-lg text-center  text-uppercase panel_right_different">
                                                <small>Clear Filter</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="slidepanel">
                                    <div class="col-xs-12 col-md-12" style="padding: 15px 15px;">
                                        <span id="hideslidepanel" class="menu_icon_slide pull-right"></span>
                                    </div>
                                    <div class="list-group col-xs-12 first_list no_padding">
                                        <a href="#" data-toggle="modal" data-target="#myModalService" id="servicesPanel"
                                           class="list-group-item">Services</a>
                                        <a href="#item" data-toggle="modal" data-target="#myModalQuote"
                                           class="list-group-item">Quote</a>
                                        <a href="#item" data-toggle="modal" data-target="#myModalCarrer"
                                           class="list-group-item">Career</a>
                                        <a href="#" data-toggle="modal" data-target="#myModalContact"
                                           class="list-group-item">Contact Us</a>
                                        <a href="#" data-toggle="modal" data-target="#myModalAbout"
                                           class="list-group-item">About
                                            Authentic Metals, LLC</a>
                                        <a href="#" class="list-group-item">Sign In</a>
                                        <a href="#" class="list-group-item">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 no_padding">
                            <div id="panel_sell" class="panel">
                                <div class="grises">
                                    <img class="img-responsive hover" id="latter" style="width: 100%;"
                                         src="{{ URL::to('src/images/home/latter1.jpg') }}" alt=""/>
                                </div>
                                <div class="col-md-5 div_form_in_header right">
                                    <h1 class="text-left text-uppercase bold_text">done</h1>

                                    <div class="btn-group-vertical btn-group-lg" style="width: 100%">
                                        <div class="dropdown">
                                            <input type="text" id="feet" name="feet" href="#"
                                                   class="btn btn-default panel_button btn-lg dropdown_input"
                                                   placeholder="Feets"
                                                   style="float:left;width:100%;text-align: left !important;padding: 12.5px 16px;font-size: 110%"/>

                                        </div>
                                        <div class="dropdown">
                                            <input type="text" id="price_end" name="price_end"
                                                   style="float:right;width:100%;text-align: left !important;padding: 12.5px 16px;font-size: 110%"
                                                   class="btn btn-default panel_button btn-lg dropdown_input"
                                                   placeholder="Price end"/>
                                        </div>
                                        <div class="dropdown">
                                            <a id="list"
                                               style="float:left;width:49%;text-align: center !important;padding: 10px 0px;"
                                               class="btn btn-default panel_button btn-lg text-center  text-uppercase panel_right_different">
                                                <small>List my work</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @else

    @endif
</header>
<div class="modal fade" id="myModalService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 800px !important;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><img class="logo col-xs-3 col-md-3" style="margin-top: -12px !important;"
                                             src="{{ URL::to('src/images/home/logo-met.png') }}">

                    <p id="texttitle">Authentic Metals, LLC</p></h4>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-top: 5px">
                    <div class="container">
                        <div class="col-md-12 text-left"
                             style="padding-left: 20px; !important;padding-right: 20px;!important;">
                            <p style="font-size: 16px;font-weight: 700">Services</p>

                            <p style="font-size: 16px;font-weight: 700">Text about services</p>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="tabbable">
                                    <div class="col-md-8 text-left">
                                        <ul class="nav nav-tabs" style="margin-bottom: 0px !important;">
                                            @foreach($services as $service)
                                                <li id="{{$service->id}}" class="active"><a aria-expanded="false"
                                                                                            href="#{{$service->id}}"
                                                                                            data-toggle="tab">{{$service->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <div id="myTabContent" class="tab-content tab_borders">
                                            <div class="tab-pane fade active in" id="1">
                                                <p id="texttitle">Fence</p></h4>
                                            </div>
                                            <div class="tab-pane fade in" id="2">
                                                <p id="texttitle">222</p></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalQuote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><img class="logo col-xs-3 col-md-3"
                                             src="{{ URL::to('src/images/home/logo-met.png') }} ">

                    <p id="texttitle">Authentic Metals, LLC</p></h4>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-top: 5px">
                    <div class="container">
                        <div class="col-md-12 text-left"
                             style="padding-left: 20px; !important;padding-right: 20px;!important;">
                            <p style="font-size: 16px;font-weight: 700">Request your quote !</p>
                        </div>
                        <div class="row">
                            <div class="col-md-5 text-left"
                                 style="padding-left: 32px !important;padding-right: 20px;!important;">
                                <div class="form-group">
                                    <div class="alert hide" id="succes_messQuote"
                                         style="background-color: #0cffdd">
                                        <button type="button" class="close"
                                                data-dismiss="alert">&times;</button>

                                        <strong>Succes!</strong> Your message has been submited
                                        succesfully....
                                    </div>
                                </div>
                                <form action="{{route('post.contactus')}}" id="quote" name="quote"
                                      method="post">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 text-left">
                                            <div class="" style="margin-bottom: 10px">
                                                <input class="form-control name" type="text" name="nameQuote"
                                                       id="nameQuote"
                                                       value="{{ Request::old('nameQuote') }}"
                                                       placeholder="Your Name(*)">
                                            </div>
                                            <div class="" style="margin-bottom: 10px">
                                                <input class="form-control last_nameQuote" type="text"
                                                       name="last_nameQuote"
                                                       id="last_nameQuote"
                                                       value="{{ Request::old('last_nameQuote') }}"
                                                       placeholder="Your Last Name(*)">
                                            </div>
                                            <div class="" style="margin-bottom: 10px">
                                                <input class="form-control emailQuote" type="text" name="emailQuote"
                                                       id="emailQuote"
                                                       value="{{ Request::old('emailQuote') }}"
                                                       placeholder="Your Email(*)">
                                            </div>
                                            <div class="" style="margin-bottom: 10px">
                                                <input class="form-control phoneQuote" type="text" name="phoneQuote"
                                                       id="phoneQuote"
                                                       value="{{ Request::old('phoneQuote') }}"
                                                       placeholder="Your Phone">
                                            </div>
                                            <div class="" style="margin-bottom: 10px">
                                                <label for="radio">What product do you need ?(*)</label>
                                                @foreach($services as $service)
                                                    <div class="radio" id="radio">
                                                        <label><input type="radio" name="serviceTipe" id="serviceTipe"
                                                                      @if($service->id==1) checked="checked"
                                                                      @endif     value="{{$service->id}}">{{$service->name}}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <div class="" style="margin-bottom: 10px">
                                                <input class="form-control feetQuote" type="text" name="feetQuote"
                                                       id="feetQuote"
                                                       value="{{ Request::old('feet') }}"
                                                       placeholder="How many feet do you have ?(*)">
                                            </div>
                                            <div class="" style="margin-bottom: 10px">
                                                        <textarea name="messageQuote" id="messageQuote" cols="30"
                                                                  rows="5"
                                                                  placeholder="Comment"
                                                                  class="form-control" data-toggle="popover"
                                                                  title="Comment"
                                                                  data-content="Comment(*)"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row hide" id="loadingOffQuote"
                                                 style="margin-left: 2px">
                                                <img id="loading"
                                                     src="{{ URL::to('src/images/loading.gif') }}"
                                                     style="font-size:12px;  border: 0 none;" class="">
                                                &nbsp; Sending
                                                Message...
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-left"
                                             style="margin-top: 10px;">
                                            <a id="btnsavecontinueQuote" class="btn btn-primary"
                                               style="background-color: #cb2020;border-color:transparent;color: white;border-radius: 0px;padding: 6px;width: 100%;  margin-bottom: 15px;">
                                                SEND
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalCarrer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><img class="logo col-xs-3 col-md-3"
                                             src="{{ URL::to('src/images/home/logo-met.png') }} ">

                    <p id="texttitle">Authentic Metals, LLC</p></h4>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-top: 5px">
                    <div class="container">
                        <div class="col-md-12 text-left"
                             style="padding-left: 20px; !important;padding-right: 20px;!important;">
                            <p style="font-size: 16px;font-weight: 700">Worker Application </p>
                        </div>
                        <div class="row">
                            <div class="col-md-5 text-left"
                                 style="padding-left: 32px !important;padding-right: 20px;!important;">
                                <div class="form-group">
                                    <div class="alert hide" id="succes_messCarrer"
                                         style="background-color: #0cffdd">
                                        <button type="button" class="close"
                                                data-dismiss="alert">&times;</button>

                                        <strong>Succes!</strong> Your message has been submited
                                        succesfully....
                                    </div>
                                </div>
                                <form action="{{route('post.contactus')}}" id="carrer" name="carrer"
                                      method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 text-left">
                                            <div class="" style="margin-bottom: 10px">
                                                <input class="form-control name" type="text" name="nameCarrer"
                                                       id="nameCarrer"
                                                       value="{{ Request::old('nameCarrer') }}"
                                                       placeholder="Your Name(*)">
                                            </div>
                                            <div class="" style="margin-bottom: 10px">
                                                <input class="form-control last_nameCarrer" type="text"
                                                       name="last_nameCarrer"
                                                       id="last_nameCarrer"
                                                       value="{{ Request::old('last_nameCarrer') }}"
                                                       placeholder="Your Last Name(*)">
                                            </div>
                                            <div class="" style="margin-bottom: 10px">
                                                <input class="form-control emailCarrer" type="text" name="emaiCarrer"
                                                       id="emailCarrer"
                                                       value="{{ Request::old('emailCarrer') }}"
                                                       placeholder="Your Email(*)">
                                            </div>
                                            <div class="" style="margin-bottom: 10px">
                                                <input class="form-control phoneCarrer" type="text" name="phoneCarrer"
                                                       id="phoneCarrer"
                                                       value="{{ Request::old('phoneCarrer') }}"
                                                       placeholder="Your Phone">
                                            </div>
                                            <div class="" style="margin-bottom: 10px">
                                                        <textarea name="messageCarrer" id="messageCarrer" cols="30"
                                                                  rows="5"
                                                                  placeholder="Comment"
                                                                  class="form-control" data-toggle="popover"
                                                                  title="Comment"
                                                                  data-content="Comment(*)"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row hide" id="loadingOffCarrer"
                                                 style="margin-left: 2px">
                                                <img id="loading"
                                                     src="{{ URL::to('src/images/loading.gif') }}"
                                                     style="font-size:12px;  border: 0 none;" class="">
                                                &nbsp; Sending
                                                Message...
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-left"
                                             style="margin-top: 10px;">
                                            <a id="btnsavecontinueCarrer" class="btn btn-primary"
                                               style="background-color: #cb2020;border-color:transparent;color: white;border-radius: 0px;padding: 6px;width: 100%;  margin-bottom: 15px;">
                                                SEND
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalAbout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><img class="logo col-xs-3 col-md-3"
                                             src="{{ URL::to('src/images/home/logo-met.png') }} ">

                    <p id="texttitle">Authentic Metals, LLC</p></h4>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-top: 5px">
                    <div class="container">
                        <div class="col-md-12 text-left"
                             style="padding-left: 20px; !important;padding-right: 20px;!important;">
                            <p style="font-size: 16px;font-weight: 700">About Authentic Metals, LLC</p>
                        </div>
                        <div class="col-md-6 col-xs-6 text-left"
                             style="padding-left: 20px; !important;padding-right: 20px; !important;">

                            <p>
                                <span class="comillas">Juan Ramon Porras</span>, copper Cuban sculptor opens in 2005 his
                                own company "Hands on Copper",
                                developing different artworks as sculptures and paintings on copper.
                            </p>

                            <p>
                                <span class="comillas">In 2007</span>, under the same name as the company begins to
                                perform other work for both
                                commercial and residential customers.
                            </p>

                            <p>
                                <span class="comillas">In 2010</span>, on the successes achieved in the years of work
                                the Company <span class="comillas">"Authentic Metals, LLC"</span> where until now the
                                range of work being created
                                covering is immense.
                            </p>

                            <p>
                                Jobs that <span class="comillas">"Authentic Metals, LLC"</span> performs throughout
                                Florida are different types of metals such as:
                            </p>

                            <div class="row">
                                <div class="col-md-6 col-xs-6 text-left">
                                    <ul class="list-unstyled" style="margin-left: 15px">
                                        <li><span class="comillas">» </span>Bronze</li>
                                        <li><span class="comillas">» </span>Copper</li>
                                        <li><span class="comillas">» </span>Calvan</li>
                                        <li><span class="comillas">» </span>Aluminum</li>
                                        <li><span class="comillas">» </span>stainless steel</li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-xs-6 text-rigth">
                                    <img class="logo col-xs-8 col-md-8 zoom"
                                         src="{{ URL::to('src/images/home/about_us.jpg') }} ">
                                </div>
                            </div>
                            <p>
                                The company specializes for his works of great recognition and quality as they are in
                                the manufacturing and installation of gutter, fence, railing, hand railing, gates and
                                beautiful art in copper.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 800px !important;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><img class="col-xs-3 col-md-3" style="margin-top: -12px !important;"
                                             src="{{ URL::to('src/images/home/logo-met.png') }} ">

                    <p id="texttitle">Authentic Metals, LLC</p></h4>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-top: 5px">
                    <div class="col-md-6 text-left"
                         style="padding-left: 12px !important;padding-right: 20px;!important;">
                        <p style="font-size: 16px;font-weight: 700">Contact Us</p>
                    </div>
                    <div class="col-md-5 text-left"
                         style="padding-left: 12px !important;padding-right: 20px;!important;">
                        <div class="form-group">
                            <div class="alert hide" id="succes_mess"
                                 style="background-color: #0cffdd">
                                <button type="button" class="close"
                                        data-dismiss="alert">&times;</button>

                                <strong>Succes!</strong> Your message has been submited
                                succesfully....
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 5px">
                        <div class="col-md-6 text-left" style="margin-left: 12px !important">
                            <ul class="list-unstyled">
                                <li><span class="comillas">54 North West Drive,Miami Fl 33126</span></li>
                                <li><span class="comillas">CALL: (305)-525-2761</span></li>
                                <li><span class="comillas">OFFICE: (786)-317-1435</span></li>
                                <li><span class="comillas">EMAIL: authenticmetals@yahoo.com</span></li>
                            </ul>
                            <div id="map-canvas"
                                 style="height: 285px; margin-top: 10px">
                            </div>
                        </div>
                        <div class="col-md-5 text-left no_padding">
                            <form action="{{route('post.contactus')}}" id="send_message" name="send_message"
                                  method="post">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 text-left">
                                        <div class="" style="margin-bottom: 10px">
                                            <input class="form-control name" type="text" name="name"
                                                   id="name"
                                                   value="{{ Request::old('name') }}"
                                                   placeholder="Your Name(*)">
                                        </div>
                                        <div class="" style="margin-bottom: 10px">
                                            <input class="form-control last_name" type="text"
                                                   name="last_name"
                                                   id="last_name"
                                                   value="{{ Request::old('last_name') }}"
                                                   placeholder="Your Last Name(*)">
                                        </div>
                                        <div class="" style="margin-bottom: 10px">
                                            <input class="form-control email" type="text" name="email"
                                                   id="email"
                                                   value="{{ Request::old('email') }}"
                                                   placeholder="Your Email(*)">
                                        </div>
                                        <div class="" style="margin-bottom: 10px">
                                            <input class="form-control phone" type="text" name="phone"
                                                   id="phone"
                                                   value="{{ Request::old('phone') }}"
                                                   placeholder="Your Phone">
                                        </div>
                                        <div class="" style="margin-bottom: 10px">
                                            <select name="contacttime" id="contacttime" class="form-control">
                                                <option value="Any Time">Contact Time</option>
                                                @foreach($hours as $hour)
                                                    <option value="{{$hour}}">{{$hour}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="" style="margin-bottom: 10px">
                                                        <textarea name="message" id="message" cols="30" rows="5"
                                                                  placeholder="Your Message Here"
                                                                  class="form-control" data-toggle="popover"
                                                                  title="Message"
                                                                  data-content="Your Post Here(*)"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row hide" id="loadingOff"
                                             style="margin-left: 2px">
                                            <img id="loading"
                                                 src="{{ URL::to('src/images/loading.gif') }}"
                                                 style="font-size:12px;  border: 0 none;" class="">
                                            &nbsp; Sending
                                            Message...
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-left"
                                         style="margin-top: 10px;">
                                        <a id="btnsavecontinueMessage" class="btn btn-primary"
                                           style="background-color: #cb2020;border-color:transparent;color: white;border-radius: 0px;padding: 6px;width: 100%;  margin-bottom: 15px;">
                                            SEND
                                        </a>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ Session::token() }}" name="_token">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var form = null;
    var url_message = '{{route('post.contactus')}}';
    var token = '{{Session::token()}}';
    function geocodeAddress(geocoder, resultsMap)
    {
        var address = '54 North West Drive,Miami Fl 33126';
        geocoder.geocode({'address': address}, function (results, status)
        {
            if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
    jQuery(document).ready(function ()
    {

        jQuery("#panel_sell").mouseover(function ()
        {
            form = jQuery("#form_sell_header");
        });
        jQuery("#panel_buy").mouseover(function ()
        {
            form = jQuery("#form_buy_header");
        });
        jQuery("#showslidepanel").on("click", function ()
        {
            jQuery(".slidepanel").show().stop().animate({
                left: "0%"
            }, 500, "linear");
            jQuery(this).hide();
        });
        jQuery("#clear_filter").on("click", function ()
        {
            jQuery("#form_find_work").find('input').val('');
            jQuery('#service_value').val('all');
            jQuery('#service_val').val(0);
            jQuery("#form_find_work").find(".dropdown-toggle").find("small").text('Any service');
        })
        jQuery("#hideslidepanel").on("click", function ()
        {
            jQuery(".slidepanel").stop().animate({
                left: "-200px"
            }, 500, "linear", function ()
            {
                jQuery(this).hide();
                jQuery("#showslidepanel").fadeIn("fast");
            });
        });
        jQuery(".service_value").val("all");
        jQuery(".service_dropdown li a").click(function ()
        {

            form = (jQuery(this).parents(".service_dropdown").hasClass("sell")) ? jQuery("#form_find_work") : jQuery("#form_buy_header");
            ChangeDropDownValue(this);
            jQuery(form).find(".service_value").val(jQuery(this).attr("id"));
            var service_val = jQuery(this).attr('id');

            if (form.attr('id') == 'form_sell_header') {
                jQuery('#service_val').val(service_val);
            }

        });
        jQuery("#myModalContact").on("shown.bs.modal", function ()
        {
            var map = new google.maps.Map(document.getElementById('map-canvas'), {
                zoom: 16,
                center: {lat: -34.397, lng: 150.644}
            });
            var geocoder = new google.maps.Geocoder();
            geocodeAddress(geocoder, map);
        });
        jQuery('#btnsavecontinueMessage').on('click', function ()
        {
            var bValid = true;
            bValid = bValid && checkSelected(jQuery('#name'));
            bValid = bValid && checkSelected(jQuery('#last_name'))
            bValid = bValid && checkSelected(jQuery('#email'));
            bValid = bValid && checkRegexp(jQuery('#email'), /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            bValid = bValid && checkIsNum(jQuery('#phone'));
            bValid = bValid && checkLength(jQuery('#message'), 1, 240);
            if (bValid) {
                disableForm(jQuery('#send_message'));
                jQuery("#loadingOff").removeClass("hide");
                jQuery("#succes_mess").addClass("hide");

                jQuery.ajax({
                    method: 'POST',
                    url: url_message,
                    data: {
                        name: jQuery('#name').val(),
                        last_name: jQuery('#last_name').val(),
                        email: jQuery('#email').val(),
                        phone: jQuery('#phone').val(),
                        contacttime: jQuery('#contacttime').val(),
                        message: jQuery('#message').val(),
                        id_messagetipes: 1,
                        _token: token
                    }
                })
                        .done(function (response)
                        {
                            if (response['response']) {
                                jQuery("#loadingOff").addClass("hide");
                                jQuery("#succes_mess").removeClass("hide");
                                resetForm(jQuery('#send_message'));
                                enableForm(jQuery('#send_message'));
                            }
                            else {
                            }
                        });
            }
        });
        jQuery('#btnsavecontinueQuote').on('click', function ()
        {
            var bValid = true;
            var bValid1 = false;
            bValid = bValid && checkSelected(jQuery('#nameQuote'));
            bValid = bValid && checkSelected(jQuery('#last_nameQuote'))
            bValid = bValid && checkSelected(jQuery('#emailQuote'));
            bValid = bValid && checkRegexp(jQuery('#emailQuote'), /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            bValid = bValid && checkIsNum(jQuery('#phoneQuote'));
            bValid = bValid && checkSelected(jQuery('#feetQuote'));
            bValid = bValid && checkIsNum(jQuery('#feetQuote'));
            bValid = bValid && checkLength(jQuery('#messageQuote'), 1, 240);

            if (bValid) {
                disableForm(jQuery('#quote'));
                jQuery("#loadingOffQuote").removeClass("hide");
                jQuery("#succes_messQuote").addClass("hide");

                jQuery.ajax({
                    method: 'POST',
                    url: url_message,
                    data: {
                        name: jQuery('#nameQuote').val(),
                        last_name: jQuery('#last_nameQuote').val(),
                        email: jQuery('#emailQuote').val(),
                        phone: jQuery('#phoneQuote').val(),
                        id_service: jQuery('#serviceTipe').val(),
                        feet: jQuery('#feetQuote').val(),
                        message: jQuery('#messageQuote').val(),
                        id_messagetipes: 2,
                        _token: token
                    }
                })
                        .done(function (response)
                        {
                            if (response['response']) {
                                jQuery("#loadingOffQuote").addClass("hide");
                                jQuery("#succes_messQuote").removeClass("hide");
                                resetForm(jQuery('#quote'));
                                enableForm(jQuery('#quote'));
                            }
                            else {
                            }
                        });
            }
        });
        jQuery('#btnsavecontinueCarrer').on('click', function ()
        {
            var bValid = true;
            var bValid1 = false;
            bValid = bValid && checkSelected(jQuery('#nameCarrer'));
            bValid = bValid && checkSelected(jQuery('#last_nameCarrer'))
            bValid = bValid && checkSelected(jQuery('#emailCarrer'));
            bValid = bValid && checkRegexp(jQuery('#emailCarrer'), /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            bValid = bValid && checkIsNum(jQuery('#phoneCarrer'));
            bValid = bValid && checkLength(jQuery('#messageCarrer'), 1, 240);
            if (bValid) {
                disableForm(jQuery('#carrer'));
                jQuery("#loadingOffCarrer").removeClass("hide");
                jQuery("#succes_messCarrer").addClass("hide");
                jQuery.ajax({
                    method: 'POST',
                    url: url_message,
                    data: {
                        name: jQuery('#nameCarrer').val(),
                        last_name: jQuery('#last_nameCarrer').val(),
                        email: jQuery('#emailCarrer').val(),
                        phone: jQuery('#phoneCarrer').val(),
                        message: jQuery('#messageCarrer').val(),
                        id_messagetipes: 3,
                        _token: token
                    }
                })
                        .done(function (response)
                        {
                            if (response['response']) {
                                jQuery("#loadingOffCarrer").addClass("hide");
                                jQuery("#succes_messCarrer").removeClass("hide");
                                resetForm(jQuery('#carrer'));
                                enableForm(jQuery('#carrer'));
                            }
                            else {
                            }
                        });
            }
        });

    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap" async defer></script>




