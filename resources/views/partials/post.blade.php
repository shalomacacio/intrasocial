<div class="posts-section">
    <div class="post-bar">
      <div class="post_topbar">
        <div class="usy-dt">
          <img src="storage/images/resources/us-pic.png" alt="">
          <div class="usy-name">
            <h3>{{ $post->user->name }}</h3>
            <span><img src="images/clock.png" alt="">{{ $post->created_at }}</span>
          </div>
        </div>

        <div class="ed-opts">
          <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
          <ul class="ed-options">
            <li><a href="#" title="">Editar</a></li>
            <li><a href="#" title="">Excluir</a></li>
          </ul>
        </div>

      </div>
      <div class="epi-sec">
        <ul class="bk-links">
          <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
          <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
        </ul>
      </div>
      <div class="job_descp">
        <h3>Senior Wordpress Developer</h3>
        <ul class="job-dt">
          <li><a href="#" title="">Full Time</a></li>
          <li><span>$30 / hr</span></li>
        </ul>
        <p>{{ $post->description }}</p>
      </div>
      <div class="job-status-bar">
        <ul class="like-com">
          <li>
            <a href="#"><i class="la la-heart"></i> Like</a>
            <img src="images/liked-img.png" alt="">
            <span>25</span>
          </li>
          <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
        </ul>
        <a><i class="la la-eye"></i>Views 50</a>
      </div>
    </div><!--post-bar end-->
    <div class="process-comm">
      <a href="#" title=""><img src="images/process-icon.png" alt=""></a>
    </div><!--process-comm end-->
  </div><!--posts-section end-->
