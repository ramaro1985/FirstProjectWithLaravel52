@extends('layouts.master')
@section('title')
    {{ trans('en.account') }}
@endsection
@section('content')
    @include('includes.message')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>{{ trans('en.your_account') }}</h3></header>
            <form action="{{route('account.save')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">{{ trans('en.name') }}</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                </div>

                <div class="form-group">
                    <label for="name">{{ trans('en.name') }}</label>
                    <input type="password" name="password" id="password" class="form-control"
                           value="{{$user->password}}">
                </div>
                <div class="form-group">
                    <label for="image">{{ trans('en.image_only') }}</label>
                    <input type="file" name="image" class="form-control" id="image"
                           style="height: auto !important; margin-bottom: 10px">
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 text-left" style="margin-bottom: 10px ;padding-left: 0px !important; ">
                        <button type="submit" class="btn btn-block panel_left_different">{{ trans('en.save_account') }}</button>
                    </div>
                </div>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    @if(Storage::disk('local')->has($user->name.'-'.$user->id.'.jpg'))
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <img src="{{route('account.name',['filename'=>$user->name.'-'.$user->id.'.jpg'])}}" alt=""
                     class="img-responsive">
            </div>
        </section>
    @endif
@endsection