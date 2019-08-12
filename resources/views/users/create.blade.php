<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mallory Social</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('social/css/line-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('social/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/social.css') }}" rel="stylesheet">
</head>


<body>


  <div class="wrapper">
    <main>
      <div class="main-section">
        <div class="container">
          <div class="main-section-data">
            <div class="row">
              <div class="col-lg-6 col-md-12 ">
                <div class="main-left-sidebar no-margin">
                  <div class="user-data full-width">
                    <div class="user-profile">
                      <div class="username-dt">
                        <div class="usr-pic">
                          <img src="../storage/images/users/avatar.png" alt="">
                        </div>
                      </div><!--username-dt end-->
                      <div class="user-specs">

                        <div class="paddy">
                            <div class="filter-dd">
                                <form  method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" >
                                    @csrf

                                  <div class="filter-ttl">
                                    <h3>Nome</h3>
                                    <input type="text" name="name" id="name" placeholder="Fulano da Silva">
                                  </div>

                                  <div class="filter-ttl">
                                    <h3>Foto</h3>
                                    <input type="file"  id="img_path" name="img_path" placeholder="Imagem">
                                  </div>

                                  <div class="filter-ttl">
                                    <h3>Email</h3>
                                    <input type="text" name="email" id="email" placeholder="fulano@mallory.com.br">
                                  </div>

                                  <div class="filter-ttl">
                                    <h3>Senha</h3>
                                    <input type="password" id="password" name="password" >
                                  </div>

                                  <button class="btn btn-primary btn-block" type="submit">Cadastrar Usuário</button>
                              </form>
                            </div>
                        </div>
                      </div>
                    </div><!--user-profile end-->
                      <ul class="user-fw-status">
                        <li>
                          <a href="#" title="">Esqueci minha senha</a>
                        </li>
                      </ul>
                  </div><!--user-data end-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	</div><!--theme-layout end-->


<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
