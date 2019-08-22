<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Intrasocial') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/line-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/social.css') }}" rel="stylesheet">
</head>


<body>
	<div class="wrapper">
    @include('partials.header')
    <main>
        <div class="main-section">
          <div class="container">
              <div class="main-section-data">
                  <div class="row">
                      @include('partials.left-sidebar')
                        @yield('content')
                      @include('partials.right-sidebar')
                  </div>
              </div>
          </div>
        </div>
    </main>
	</div><!--theme-layout end-->

<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('js/social.js') }}" ></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.js') }}" ></script>
{{-- jquery.mCustomScrollbar --}}
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
  <script>

    $.ajaxSetup({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
      });

    // Ativar o registro do pusher - não inclua isso na produção
    Pusher.logToConsole = true;

    var pusher = new Pusher('5ad38734c8feabdd6844', {
      cluster: 'mt1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');

    // escuta mensagens do servidor
    channel.bind('my-event', function(data) {
      // alert(JSON.stringify(data));
      ajaxCall('messages/store', data);
    });

    // verifique se o usuário está inscrito no canal acima
    channel.bind('pusher:subscription_succeeded', function(members) {
        console.log('successfully subscribed!');
    });

    //Enviar requisição AJAX para o arquivo PHP no servidor
    function ajaxCall(ajax_url, ajax_data) {
        $.ajax({
            type: "POST",
            url: ajax_url,
            //dataType: "json",
            data: ajax_data,
            success: function(response) {
                console.log(response);
            },
            error: function(msg) {}
        });
    }

    function ajaxMsg() {
        $.ajax({
            type: "POST",
            url: '/sendMessage',
            dataType: "json",
            data: {message: $("#message").val(), user_id: $("#user_id").val() },
            success: function(data) {
                alert(data);
            },
            error: function(msg) {
              console.log(msg);
            }
        });
    }

    // Trigger  para quando teclar Enter
    $.fn.enterKey = function(fnc) {
        return this.each(function() {
            $(this).keypress(function(ev) {
                var keycode = (ev.keyCode ? ev.keyCode : ev.which);
                if (keycode == '13') {
                    fnc.call(this, ev);
                }
            });
        });
    }
    // Enviar a mensagem entrar pelo usuário
    $('body').on('click', '.chat_box .input_send', function(e) {
        e.preventDefault();
        var message = $('.chat_box .input_message').val();
        var name = $('.chat_box .input_name').val();

        // Validate Name field
        if (name === '') {
            bootbox.alert('<br /><p class = "bg-danger">Please enter a Name.</p>');
        }
      else if (message !== '') {
            // Define ajax data
            var chat_message = {
                name: $('.chat_box .input_name').val(),
                message: '<strong>' + $('.chat_box .input_name').val() + '</strong>: ' + message
            }
            //console.log(chat_message);
            //  Enviar a mensagem para o servidor que passa File Url e o nome e a mensagem da pessoa do chat
            // ajaxCall('http://phpstack-71265-406587.cloudwaysapps.com/message_relay.php', chat_message);
              ajaxMsg();
            // Limpe o campo de entrada de mensagens
            $('.chat_box .input_message').val('');
            // Mostra uma imagem de carregamento durante o envio
            $('.input_send_holder').html('<input type = "submit" value = "Send" class = "btn btn-primary btn-block" disabled /> &nbsp;<img     src = "loading.gif" />');
        }
    });
    // Enviar a mensagem quando a tecla enter for clicada
    $('.chat_box .input_message').enterKey(function(e) {
        e.preventDefault();
        $('.chat_box .input_send').click();
    });

    $("#chat-list").on("click", function () {
      alert("teste local");
      $(".conversation-box").toggleClass("active");
      return false;
    });

    $("#chat-link").on("click", function () {
      alert($(this));
      $(this).next(".conversation-box").toggleClass("active");
      return false;
    });
  </script>
</body>
</html>
