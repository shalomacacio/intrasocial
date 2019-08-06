<div class="post-popup job_post">
    <div class="post-project">
      <h3>Publicação</h3>
      <div class="post-project-fields">
      <form action="{{ route('posts.store') }}" method="POST">
        @csrf
          <div class="row">
            <div class="col-lg-12">
              <div class="inp-field">
                <select  id="setor_id"  name="setor_id"  required >
                  <option value="1">Todos</option>
                  <option value="2">Somente Meu Setor</option>
                </select>
              </div>
            </div>
            <div class="col-lg-12">
              <textarea name="description" placeholder="Descrição"></textarea>
            </div>
            <input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id}}">
            <div class="col-lg-12">
              <ul>
                <li><button class="active" type="submit" >Postar</button></li>
                <li><a href="#" title="">Cancelar</a></li>
              </ul>
            </div>
          </div>
        </form>
      </div><!--post-project-fields end-->
      <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div><!--post-project end-->
  </div><!--post-project-popup end-->
