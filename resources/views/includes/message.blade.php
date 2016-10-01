@if(count($errors) > 0)
    <div class="form-group">
        <div class="col-sm-12 col-md-12 error"
             style="margin-top: 10px !important;margin-bottom: 10px !important;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if(Session::has('message'))
    <div class="form-group">
        <div class="col-sm-12 col-md-12 @if(Session::has('message')==1) error @else success @endif">
            {{Session::get('message')}}
        </div>
    </div>
@endif