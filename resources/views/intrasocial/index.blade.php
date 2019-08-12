@extends('layouts.social')

@section('content')
<div class="col-lg-6 col-md-8 no-pd">
    <div class="main-ws-sec">

      <div class="post-topbar">
        <div class="user-picy">
          <img src="storage/images/users/{{Auth::user()->id}}/avatar_m.{{Auth::user()->img_path}}" alt="">
        </div>
        <div class="post-st">
          <ul>
            <li><a class="post-jb active" href="#" title="">Criar Publicação</a></li>
          </ul>
        </div><!--post-st end-->
      </div><!--post-topbar end-->

      @foreach ($posts as $post)
        @include('partials.post')
      @endforeach

    </div><!--main-ws-sec end-->
  </div>

@include('partials.post_form')
@include('partials.edit_form')

@endsection
