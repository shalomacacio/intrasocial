<?php

namespace Intrasocial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Intrasocial\Repositories\UserRepository;
use Intrasocial\Entities\User;
use Intrasocial\Validators\UserValidator;
//bibliotecas de imagem
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace Intrasocial\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
      return User::class;
    }

    public function saveImage($img, $folder){

      //cria o diretório se ele não existir
      Storage::makeDirectory('images/users/'.$folder.'/');
      $extension = $img->extension();
      $name = "avatar";
      $path=  $img->storeAs('images/users/'.$folder, $name.'.'.$extension, 'public');
      // return dd($path); //"images/users/1/avatar.png"

      //resize
      $thumbnailpath = public_path('storage/images/users/'.$folder.'/'.$name.'.'.$extension );
      // return dd($thumbnailpath);
      $img = Image::make($thumbnailpath);
      $img->resize(100 , 100)->save(public_path('storage/images/users/'.$folder.'/avatar_g.'.$extension ));
      $img->resize(50 , 50)->save(public_path('storage/images/users/'.$folder.'/avatar_m.'.$extension ));
      $img->resize(30 , 30)->save(public_path('storage/images/users/'.$folder.'/avatar_p.'.$extension ));
    }

    public function deleteImage($id){
      $post = $this->find($id);
      Storage::disk('public')->delete('images/users/'. $post->img);
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
