<div class="posts-section">
    <div class="post-bar">


<div class="posty">
    <div class="post-bar no-margin">
      <div class="post_topbar">
        <div class="usy-dt">
          <img src="storage/images/resources/users/{{Auth::user()->id}}/M.png" alt="">
          <div class="usy-name">
          <h3>{{$post->user->name}}</h3>
          </div>
        </div>
        <div class="ed-opts">
          <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
          <ul class="ed-options">
              <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn " onclick="return confirm('Deseja excluir esta publicação?')" type="submit">Excluir</button>
              </form>
          </ul>
        </div>
      </div>
      <div class="job_descp">
          <p>{{ $post->description }}</p>
          <img class="img-fluid" src="storage/images/posts/{{$post->img}}" width="476" alt="">
      </div>
      <div class="job-status-bar">
        <ul class="like-com">
            <li><a href="#" title="" class="com"><img src="storage/images/com.png" alt=""> Like </a></li>
          <li><a href="#" title="" class="com"><img src="storage/images/com.png" alt=""> Comment {{count($post->coments)}} </a></li>
        </ul>
        {{-- <a><i class="la la-eye"></i>Views 50</a> --}}
      </div>
    </div><!--post-bar end-->
    <div class="comment-section">
      @foreach ($post->coments as $coment)
        @include('partials.post_coment')
      @endforeach

      <div class="post-comment">
        <div class="cm_img">
          <img src="storage/images/resources/bg-img4.png" alt="">
        </div>
        <div class="comment_box">
          <form action="{{ route('coments.store')}}" method="post">
            @csrf'
            <input type="text" name="description" id="description" placeholder="Comentário">
            <input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id}}">
            <input id="post_id" name="post_id" type="hidden" value="{{$post->id}}">
            <button type="submit">Enviar</button>
          </form>
        </div>
      </div><!--post-comment end-->

    </div><!--comment-section end-->
  </div><!--posty end-->
    </div>
</div>

