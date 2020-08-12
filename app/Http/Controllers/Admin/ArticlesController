<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//use Corp\Http\Requests\ArticleRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ArticlesRepository;

use Gate;

//use Corp\Category;
use App\Article;


class ArticlesController extends AdminController
{
    
     public function __construct(ArticlesRepository $a_rep) {
	
	
		/*
		if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
			abort(403);
		}
		*/
		$this->a_rep = $a_rep;
		
		$this->template = 'index';
		//$this->template = config('settings.theme').'.admin.articles';
		
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	   
   
		
		 $this->title = 'Блог';
		$this->keywords = 'String';
		$this->meta_desc = 'String';
		$articles = $this->getArticles();
		//dd($articles);
		$articles = $this->getArticles($cat_alias=false);
			$content = view('admin.articles.show')->with(['articles'=>$articles])->render();
			$this->vars['content']= $content;
			//$this->vars = array_add($this->vars,'content', $content);
			return $this->renderOutput(); 
			
		        //return view($this->template)->with($this->vars);
			 

	}
	 public function articlesadd(Article $article){
		 $content = view('admin.articles.add')->with(['module'=>$article])->render();
		 $this->vars['content']= $content;
		 return $this->renderOutput(); 
	 
     }
        
        
   
    
    
     public function getArticles()
    {
        //
        
        return $this->a_rep->get();
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if(Gate::denies('save', new \Corp\Article)) {
			abort(403);
		}
		
		$this->title = "Добавить новый материал";
		
		$categories = Category::select(['title','alias','parent_id','id'])->get();
		
		$lists = array();
		
		foreach($categories as $category) {
			if($category->parent_id == 0) {
				$lists[$category->title] = array();
			}
			else {
				$lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;    
			}
		}
		
		$this->content = view(config('settings.theme').'.admin.articles_create_content')->with('categories', $lists)->render();
		
		return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	
      	if(Gate::denies('add-article')) {
				echo 18;exit();
			return redirect()->back()->with(['message'=>'У Вас нет прав']);
		}
    	echo 17;exit();
		$result = $this->a_rep->addArticle($request);
		
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/admin')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
		
		  $content = view('admin.articles.edit')->with(['module'=>$article])->render();
	      $this->vars['content']= $content;
		
		return $this->renderOutput();
        //
        //$article = Article::where('alias', $alias);
        /*
        if(Gate::denies('edit', new Article)) {
			abort(403);
		}
		
		$article->img = json_decode($article->img);
		
		
		$categories = Category::select(['title','alias','parent_id','id'])->get();
		
		$lists = array();
		
		foreach($categories as $category) {
			if($category->parent_id == 0) {
				$lists[$category->title] = array();
			}
			else {
				$lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;    
			}
		}
		
		$this->title = 'Реадактирование материала - '. $article->title;
		*/
	
		
		
    }

       public function update(Request $request,Article $article)
    {
		$result = $this->a_rep->update($request,$article);
		
			if(Gate::allows('update-article',$article)) {
			$article->name = $data['name'];
	    	$article->img = $data['img'];
	    	$article->text = $data['text'];
	    	
	    	$res = $user->articles()->save($article);
	        
	       
			return redirect()->back()->with('message','Материал обновлен');
		}
		
		return redirect()->route('articles.edit', $article)->with(['message'=>'Успешно обновлен']);

		
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     //   articles -> Article  


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        
        $result = $this->a_rep->deleteArticle($article);
		
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/admin')->with($result);
        
        
    }
}
