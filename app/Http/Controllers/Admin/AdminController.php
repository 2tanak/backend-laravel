<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use Menu;

use Gate;

class AdminController extends \App\Http\Controllers\Controller
{
    //
    
    protected $p_rep;
    
    protected $a_rep;
    
    protected $user;
    
    protected $template;
    
    protected $content = FALSE;
    
    protected $title;
    
    protected $vars;
    
    public function __construct() {
		
		$this->user = Auth::user();
		
		if(!$this->user) {
			abort(403);
		}
	}
	
	public function renderOutput() {
		//echo 'renderOutput';exit();
		$this->vars['title']= $this->title;
		
		
		if($this->content) {
			$this->vars['content']= $this->content;
			
		}
		
		return view($this->template)->with($this->vars);
		
		
		
		
	}
	
	public function getMenu() {
		return Menu::make('adminMenu', function($menu) {
			
			
			if(Gate::allows('VIEW_ADMIN_ARTICLES')) {
				$menu->add('Статьи',array('route' => 'admin.articles.index'));
			
			}
			
			
			$menu->add('Портфолио',  array('route'  => 'admin.articles.index'));
			$menu->add('Меню',  array('route'  => 'admin.menus.index'));
			$menu->add('Пользователи',  array('route'  => 'admin.users.index'));
			$menu->add('Привилегии',  array('route'  => 'admin.permissions.index'));
			
			
		});
	}
	
	
}
