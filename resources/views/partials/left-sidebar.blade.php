<div class="col-lg-3 col-md-4 pd-left-none no-pd">
    <div class="main-left-sidebar no-margin">
      <div class="user-data full-width">
        <div class="user-profile">
          <div class="username-dt">
            <div class="usr-pic">
              <img src="storage/images/users/{{Auth::user()->id}}/avatar_g.{{Auth::user()->img_path}}" alt="">
            </div>
          </div><!--username-dt end-->
          <div class="user-specs">
            <h3>
              @auth
                {{ Auth::user()->name }}
              @endauth
            </h3>
            <span> Auxiliar Administrativo </span>
          </div>
        </div><!--user-profile end-->
        <ul class="user-fw-status">
          <li>
            <a href="#" title="">Ver Perfil</a>
          </li>
        </ul>
      </div><!--user-data end-->
    </div><!--main-left-sidebar end-->
    <div class="widget suggestions full-width">
        <div class="sd-title">
          <h3>Minhas Atividades</h3>
          <i class="la la-ellipsis-v"></i>
        </div><!--sd-title end-->
        <div class="suggestions-list">


          <div class="suggestion-usd">
            <img src="images/resources/s3.png" alt="">
            <div class="sgt-text">
              <h4>Poonam</h4>
              <span>Analista de RH</span>
            </div>
            <span><i class="la la-plus"></i></span>
          </div>


          <div class="view-more">
            <a href="#" title="">Veja Mais</a>
          </div>
        </div><!--suggestions-list end-->
      </div>
  </div>
