  <div class="comment-sec">
    <ul>
      <li>
        <div class="comment-list">
          <div class="bg-img">
            <img src="storage/images/resources/users/{{$coment->user->id}}/P.png" alt="">
          </div>
          <div class="comment">
            <div class="ed-opts">
              <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
              <ul class="ed-options ">
                <form action="{{ route('coments.destroy', $coment->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn " onclick="return confirm('Deseja excluir este comentário?')" type="submit">Excluir</button>
                </form>
              </ul>
            </div><!--comment-list end-opts -->
            <h3>{{$coment->user->name}}</h3>
            <span>{{$coment->tempo}}</span>
            <p>{{$coment->description}}</p>
          </div>
        </div><!--comment-list end-->
      </li>
    </ul>
  </div><!--comment-sec end-->
