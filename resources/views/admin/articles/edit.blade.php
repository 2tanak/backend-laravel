<br><br><br>


 <div class="container">
{!! Form::open(['url' => (isset($module->id)) ? route('articles.update',$module) : 
 route('articles.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

	<div class="form-group">
    <label>Название:</label>
    {!! Form::text('title',isset($module->title) ? $module->title  : old('title'), ['placeholder'=>'Введите название','class'=>'form-control','required autofocus']) !!}
	@if ($errors->has('title'))
             <span class="help-block">
                  <strong style='color:#a94442'>{{ $errors->first('title') }}</strong>
                       </span>
               @endif
			  </div> 
<div class="form-group">
    <label>текст:</label>
{!! Form::textarea('text', isset($module->text) ? $module->text : old('text'), ['class' => 'form-control','placeholder'=>'','required autofocus']) !!}
</div>
			   
@if(isset($module->id))
			{!! Form::hidden('$id',$module->id) !!}
<input type="hidden" name="_method" value="PUT">		
		@endif
		
		<div class="form-group">
			{!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}			
		</div>	   
								

		
{!! Form::close() !!}	
</div>