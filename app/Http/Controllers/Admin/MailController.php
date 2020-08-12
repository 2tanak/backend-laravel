<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//use Corp\Http\Requests\ArticleRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;



class MailController extends AdminController
{
    
   public function __construct() {
	
	
		
	}
 
    public function index()
    {
		//echo 200;exit();
 $data = ['name'=>'dddddddddddddddddddddd','text'=>'kanalkanal'];
 $body = 'Вы зарегестрировались на сайте Вам необходимо активировать акаунт по ссылке';

    $this->mymail($data,$body);
   
		
	echo 550; exit();
			 

	}
	protected function mymail($data,$body){
		//echo 15;exit();
		$data['email']='2tanak@mail.ru';
		   $result = Mail::send('site.email',['data'=>$data,'body'=>$body], function($message) use ($data) {
				$mail_admin = env('MAIL_ADMIN');
				//echo $mail_admin;exit();
				$message->from('ya.serzh222@yandex.ru', 'имя отправителя');
				$message->to($data['email'],'Mr. Admin')->subject('subject');
			});
			return true;
			}
}
