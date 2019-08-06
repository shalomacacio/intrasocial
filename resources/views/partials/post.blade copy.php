<div class="posts-section">
    <div class="post-bar">
      <div class="post_topbar">

        <div class="usy-dt">
          <img src="storage/images/resources/us-pic.png" alt="">
          <div class="usy-name">
            <h3>{{ $post->user->name }}</h3>
            <span><img src="storage/images/clock.png" alt="">{{ $post->tempo }}</span>
          </div>
        </div>

        <div class="ed-opts">
          <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
          <ul class="ed-options ">
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
      </div>
      <div class="job-status-bar">
        <ul class="like-com">
          <li><a href="#" title="" class="com"><img src="storage/images/com.png" alt=""> Commentarios 15</a></li>
        </ul>
      </div>
    </div><!--post-bar end-->
    <div class="process-comm">
      <a href="#" title=""><img src="images/process-icon.png" alt=""></a>
    </div><!--process-comm end-->
    @include('partials.post_coment')
  </div><!--posts-section end-->
