@extends('layouts.master')
@section('content')
    @if (Hash::check('Passw5', Auth::user()->password))

        {{ trans('en.password_match') }}
    @endif
    @include('includes.message')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say ?</h3></header>
            <form action="{{route('post.create')}}" method="post">
                <div class="form-group">
                    <textarea name="body" id="body" cols="30" rows="5" placeholder="Your Post Here"
                              class="form-control" data-toggle="popover" title="What do you have to say ?"
                              data-content="Your Post Here"></textarea>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 text-left" style="margin-top: 10px ;padding-left: 0px !important; ">
                        <button type="submit" class="btn btn-block panel_left_different">Create Post</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>

            @foreach($posts as $post)
                <article class="post">
                    <p id="bodypost{{$post->id}}">{{$post->body}}</p>

                    <div class="info">
                        Posted by {{$post->user->name}} on {{$post->created_at}}
                    </div>
                    <div class="interaction">
                        <a href="#"
                           class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a>
                        |
                        <a href="#"
                           class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
                        @if(Auth::user()==$post->user)
                            | <a post-id="{{ $post->id }}"
                                 post-body="{{ $post->body }}"
                                 data-toggle="modal"
                                 data-target="#myModalEdit"
                                 class="edit"
                                 id="linkEdit{{ $post->id }}">
                                <small>Edit</small>
                            </a> |
                            <a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a>
                        @endif
                        | <a class="info{{ $post->id }}" style="color: red; text-decoration:none; ">
                        </a>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="comment_body" id="comment_body" post_id="{{$post->id}}"
                               class="form-control comment_body" placeholder="Your comment here">
                    </div>
                    <div class="comment_content" id="comment_content{{ $post->id }}">
                        @foreach($post->comments as $comment)
                            <div class="row" id="comments_post" style="margin-top: 5px">
                                <div class="col-md-2" style="padding-right: 2px">
                                    @if(Storage::disk('local')->has($comment->user->id.'.jpg'))
                                        <img class="img-responsive"
                                             src="{{route('account.name',['filename'=>$comment->user->id.'.jpg'])}}">
                                    @else
                                        <img class="img-responsive"
                                             src="{{route('account.name',['no_profile.jpg'])}}">
                                    @endif
                                </div>
                                <div class="col-md-10 no_padding">
                                    <p class="info">{{$comment->body}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <section class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="pagination">
                {!! $posts->links() !!}
            </div>
        </div>
    </section>
    <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                                 <textarea name="edit-post" id="edit-post" cols="30" rows="5"
                                           placeholder="Your Post Here"
                                           class="form-control"></textarea>
                        </div>
                        <input type="hidden" name="post-id" id="post-id">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div id="error"></div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <button type="button" class="btn btn-default close-btn" data-dismiss="modal">Close
                            </button>
                            <button type="button" class="btn btn-primary post-edit-send" id="post-edit-send">Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var token = '{{Session::token()}}';
        var url = '{{route('post.edit')}}';
        var urlLike = '{{ route('like') }}';
        var urlCommnet = '{{route('post.comment')}}';
        jQuery(document).ready(function () {

            jQuery('.edit').click(function () {
                jQuery('#edit-post').val(jQuery(this).attr('post-body'));
                jQuery('#post-id').val(jQuery(this).attr('post-id'));
            });

            jQuery('.post-edit-send').on('click', function () {
                var bValid = true;
                bValid = bValid && checkLength(jQuery('#edit-post'), 1, 240);
                if (bValid) {
                    jQuery.ajax({
                        method: 'POST',
                        url: url,
                        data: {body: jQuery('#edit-post').val(), id: jQuery('#post-id').val(), _token: token}
                    })
                            .done(function (msg) {
                                jQuery(this).attr('post-body');
                                jQuery('#bodypost' + jQuery('#post-id').val()).html(msg['new_body']);
                                jQuery('#linkEdit' + jQuery('#post-id').val()).attr('post-body', msg['new_body']);
                                jQuery('.info' + jQuery('#post-id').val()).html(msg['msg']);
                                jQuery('#myModalEdit').modal('hide');
                            });
                }
            });

            jQuery('#myModalEdit').find('textarea').each(function () {
                jQuery(this).focusout(function () {
                    jQuery(this).popover('destroy');
                });
            });

            jQuery('.like').on('click', function (event) {
                event.preventDefault();
                postId = event.target.parentNode.parentNode.dataset['postid'];
                var isLike = event.target.previousElementSibling == null;
                jQuery.ajax({
                    method: 'POST',
                    url: urlLike,
                    data: {isLike: isLike, postId: postId, _token: token}
                })
                        .done(function () {
                            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
                            if (isLike) {
                                event.target.nextElementSibling.innerText = 'Dislike';
                            } else {
                                event.target.previousElementSibling.innerText = 'Like';
                            }
                        });
            });

            $('.comment_body').keydown(function (e) {
                if (e.keyCode == 13) {
                    var bValid = true;
                    bValid = bValid && checkLength(jQuery(this), 1, 240);
                    var post_id = jQuery(this).attr('post_id');
                    var body = jQuery(this).val();
                    var route_exist = '{{route('account.name',['filename'=>Auth::user()->id.'.jpg'])}}';
                    var open_row = '<div class="row" id="comments_post" style="margin-top: 5px">';
                    var open_col = '<div class="col-md-2" style="padding-right: 2px">';

                    var img_exis = "<img class='img-responsive' src="+"'"+ route_exist + "'"+">";
                    var img_not_exis = '<img class="img-responsive" src="">';

                    var close_div = '</div>';

                    var abre_inf = '<p class="info">';
                    var cierra_inf = '</p>';


                    if (bValid) {
                        jQuery.ajax({
                            method: 'POST',
                            url: urlCommnet,
                            data: {body: body, post_id: post_id, _token: token}
                        })
                                .done(function (imgage_url) {
                                    var comment_content = open_row + open_col
                                                    @if(Storage::disk('local')->has(Auth::user()->id.'.jpg'))  +
                                                    img +
                                                    @else
                                                 img_not_exis
                                            @endif;

                                    jQuery('#comment_content' + post_id).append(comment_content);
                                });
                    }
                }
            })
        })
    </script>
@endsection
