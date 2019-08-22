  <div class="chatbox-list">
		<div class="chatbox">
			<div class="chat-mg">
				<a href="#" title=""><img src="storage/images/usr-img1.png" alt=""></a>
				<span>3</span>
      </div>

			<div class="conversation-box">
				<div class="con-title mg-3">
					<div class="chat-user-info">
						<img src="images/resources/us-img1.png" alt="">
						<h3>Gabriel Augusto <span class="status-info"></span></h3>
					</div>
          <div class="st-icons">
						<a href="#" title=""><i class="la la-cog"></i></a>
						<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
						<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
          </div>
				</div>

        <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">

          <div class="chat-msg">
						<p>Teste envio.</p>
						<span>Sat, Aug 23, 1:10 PM</span>
					</div>
					<div class="date-nd">
						<span>Sunday, August 24</span>
          </div>

					<div class="chat-msg st2">
						<p>Resposta.</p>
						<span>5 minutes ago</span>
          </div>

					<div class="chat-msg">
						<p>Teste envio</p>
						<span>Sat, Aug 23, 1:10 PM</span>
          </div>

				</div><!--chat-list end-->

        <div class="typing-msg">
          {{-- <form action="{{ route('messages.store') }}" method="POST"> --}}
            <div class="chat_box" id="chatbox" >
            @csrf
              <textarea class="input_message " placeholder="Type a message here" id="message" name="message"></textarea>
              <input type="text" class="input_name" id="user_id" name="user_id" value="{{Auth::user()->id}}" >
              <button type="submit" class="btn btn-primary input_send "><i class="la la-smile-o">Enviar</i></button>
            </div>
						{{-- </form> --}}
						<ul class="ft-options">
							<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
							<li><a href="#" title=""><i class="la la-camera"></i></a></li>
							<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
						</ul>
					</div><!--typing-msg end-->
				</div><!--chat-history end-->
      </div>
{{--
			<div class="chatbox">
				<div class="chat-mg">
					<a href="#" title=""><img src="images/resources/usr-img2.png" alt=""></a>
				</div>
				<div class="conversation-box">
					<div class="con-title mg-3">
						<div class="chat-user-info">
							<img src="images/resources/us-img1.png" alt="">
							<h3>John Doe <span class="status-info"></span></h3>
						</div>
						<div class="st-icons">
							<a href="#" title=""><i class="la la-cog"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
						</div>
					</div>
					<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
						<div class="chat-msg">
							<p>teste de mensagem</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
						<div class="date-nd">
							<span>Sunday, August 24</span>
						</div>
						<div class="chat-msg st2">
							<p>O que eu digitei.</p>
							<span>5 minutes ago</span>
						</div>
						<div class="chat-msg">
							<p>Lorena esta prenha.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
					</div><!--chat-list end-->
					<div class="typing-msg">
						<form>
							<textarea placeholder="Type a message here"></textarea>
							<button type="submit"><i class="fa fa-send"></i></button>
						</form>
						<ul class="ft-options">
							<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
							<li><a href="#" title=""><i class="la la-camera"></i></a></li>
							<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
						</ul>
					</div><!--typing-msg end-->
				</div><!--chat-history end-->
      </div> --}}

			<div class="chatbox">

				<div class="chat-mg bx" id="chat-mg"/>
					<a href="#" title=""><img src="storage/images/chat.png" alt=""></a>
					<span>{{ count($messages) }}</span>
        </div>

				<div class="conversation-box">
					<div class="con-title">
						<h3>Messages</h3>
						<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
          </div>

					<div class="chat-list">
            @foreach( $messages as $message )
            <div class="chat-link">
						<div class="conv-list ">
							<div class="usrr-pic">

              <img src="storage/images/users/{{ $message->user->id }}/avatar_p.{{ $message->user->img_path }}" alt="">
								<span class="active-status activee"></span>
							</div>
							<div class="usy-info">
								<h3>{{$message->user->name}}</h3>
								<span>{{$message->message}} <img src="images/smley.png" alt=""></span>
							</div>
							<div class="ct-time">
								<span>1:55 PM</span>
							</div>
							<span class="msg-numbers">2</span>
            </div>
          </div>

            @endforeach
          </div><!--chat-list end-->

				</div><!--conversation-box end-->
			</div>
		</div><!--chatbox-list end-->
