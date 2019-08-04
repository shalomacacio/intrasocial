@extends('layouts.social')

@section('content')
<div class="col-lg-6 col-md-8 no-pd">
    <div class="main-ws-sec">

      <div class="post-topbar">
        <div class="user-picy">
          <img src="storage/images/resources/user-pic.png" alt="">
        </div>
        <div class="post-st">
          <ul>
            <li><a class="post-jb active" href="#" title="">Criar Publicação</a></li>
          </ul>
        </div><!--post-st end-->
      </div><!--post-topbar end-->

      @include('partials.post')
    </div><!--main-ws-sec end-->
  </div>

@include('partials.post_form')

@endsection
