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


class ForController extends AdminController
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
    	   
    echo 800;exit();
		
	
			 

	}
        
        
    }
    
 

