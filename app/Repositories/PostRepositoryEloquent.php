<?php

namespace Intrasocial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Intrasocial\Repositories\PostRepository;
use Intrasocial\Entities\Post;
use Intrasocial\Validators\PostValidator;
//bibliotecas de imagem
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace Intrasocial\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    public function saveImage($img, $name){
      //criar o diretório se ele não existir
      $upload =  $img->storeAs('images/posts/', $name);
    }

    public function deleteImage($id){
      $post = $this->find($id);
      Storage::disk('public')->delete('images/posts/'. $post->img);
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PostValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
