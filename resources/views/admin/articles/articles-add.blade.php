
</br></br>
 <div class="container">
{!! Form::open(['url' => (isset($module->id)) ? route('article-show.update',['id'=>$module->id]) : 
 route('article-show.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}


		
{!! Form::close() !!}	
</div>



