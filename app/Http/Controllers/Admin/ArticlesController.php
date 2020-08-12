<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\ArticlesRepository;


use App\Article;
use App\User;

use Auth;
use Intervention\Image\Facades\Image as ImageInt;


class ArticlesController extends AdminController
{
    
     public function __construct(ArticlesRepository $a_rep) {
	 $this->a_rep = $a_rep;
	 $this->template = 'index';
	}
    
    
    public function index()
    {
		
		$this->title = 'Блог';
		$this->keywords = 'String';
		$this->meta_desc = 'String';

		$articles = $this->a_rep->get();
		return response()->json($articles);	
    }
	
	public function one(Article $article){
		return response()->json($article);	
    }
        
	
     public function store(Request $request)
    {
		//работа с изображением
	 $name_img = '';
      if(isset($request->image ) && count($_FILES) <= 0){
				 $name_img = $request->image;
			  }
		 
		if(count($_FILES) > 0){
		$file = $request->file('image');
		$extension = $request->file('image')->getClientOriginalExtension();
        
		$mime = $request->file('image')->getMimeType();
		$name =  $this->getFileName() . ".".$extension;
        $path = public_path().'/upload/'.$name;

	    $destinationPath = $path;
        $img = ImageInt::make($file->getRealPath());
								 

        $img->resize(500, 500, function ($constraint) {
        $constraint->aspectRatio();})->save($destinationPath);
		$name_img = $name;
		 
		}
		 
		
		
		
		//сохранение
		$article = new Article;
		$article->title = $request->title;
		$article->text = $request->description;
		$article->img = $name_img;
        $article->save();
		
	     return 'ok';
	   
    }



   public function update(Request $request,Article $article)
    {
	//работа с изображением
		$name_img = '';
      if(isset($request->image ) && count($_FILES) <= 0){
				 $name_img = $request->image;
			  }
		 
		if(count($_FILES) > 0){
		$file = $request->file('image');
		$extension = $request->file('image')->getClientOriginalExtension();

		$mime = $request->file('image')->getMimeType();
		$name =  $this->getFileName() . ".".$extension;
        $path = public_path().'/upload/'.$name;

	    $destinationPath = $path;
        $img = ImageInt::make($file->getRealPath());
								 

        $img->resize(500, 500, function ($constraint) {
        $constraint->aspectRatio();})->save($destinationPath);
		$name_img = $name;
		 
		}
		 
		 //сохранение
	    $article = Article::find($article->id);
        $article->title = $request->title;
	    $article->img = $name_img;
	    $article->text = $request->description;
	    $res = $article->save();
		return 'ok';
		
         }
		 
	
	//функция создания уникального название для картинки
	function getFileName(){
     $char = ['a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J','k','K',
                   'l','L','m','M','n','N','o','O','p','P','q','Q','r','R','s','S','t','T','u','U','v','V',
                   'w','W','x','X','y','Y','z','Z'];
     $rename = array_rand($char, 7);
	 $str = "";
	 foreach($rename as $k => $v){
	 	$str .= $k . "" . $v;
	 }
	 $hash = hash("sha256", $str);
	 $hash = substr($hash, 5,10);
	 $uniq = md5(uniqid(rand(),1));
	 $uniq = substr($uniq, 0,4);
	 $newname = $hash  . $uniq;

     return $newname;
  }
  

    public function destroy(Article $article)
    {
        //
        if($article->delete()) {
					return 'ok';

		}
		
		
        
    }
}
