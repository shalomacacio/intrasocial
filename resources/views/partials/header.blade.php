<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
            <a href="{{route('intrasocial')}}" title=""><img src="storage/images/logo.png" alt=""></a>
            </div><!--logo end-->
            <div class="search-bar">

            </div><!--search-bar end-->
            <nav>
                <ul>
                    <li>
                    <a href="{{ route('intrasocial')}}" title="">
                            <span><img src="storage/images/icon1.png" alt=""></span>
                            Rede Social
                        </a>
                    </li>
                    <li>
                        <a href="#" title="">
                            <span><img src="storage/images/icon2.png" alt=""></span>
                            Portal RH
                        </a>
                    </li>
                    <li>
                        <a href="#" title="">
                            <span><img src="storage/images/icon3.png" alt=""></span>
                            Ouvidoria
                        </a>
                    </li>

                    <li>
                        <a href="#" title="" class="not-box-open">
                            <span><img src="storage/images/icon7.png" alt=""></span>
                            Notification
                        </a>
                        <div class="notification-box">
                            <div class="nt-title">
                                <h4>Setting</h4>
                                <a href="#" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="storage/images/resources/ny-img1.png" alt="">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="storage/images/resources/ny-img2.png" alt="">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="storage/images/resources/ny-img3.png" alt="">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="storage/images/resources/ny-img2.png" alt="">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="view-all-nots">
                                      <a href="#" title="">Todas as Notificações</a>
                                  </div>
                            </div><!--nott-list end-->
                        </div><!--notification-box end-->
                    </li>
                </ul>
            </nav><!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div><!--menu-btn end-->
            <div class="user-account">
                <div class="user-info">
                    <img src="storage/images/resources/users/{{ Auth::user()->id }}/P.png" alt="">
                    @auth
                    <a href="#">{{ Auth::user()->name }}</a>
                    @endauth
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss">
                    <h3>Configurações</h3>
                    <ul class="us-links">
                        <li><a href="profile-account-setting.html" title="">Meus Dados</a></li>
                        <li><a href="#" title="">Minhas Postagens</a></li>
                    </ul>
                  <h3 class="tc"><a href="{{ route('logout') }}" title="">Sair</a></h3>
                </div><!--user-account-settingss end-->
            </div>
        </div><!--header-data end-->
    </div>
</header><!--header end-->
