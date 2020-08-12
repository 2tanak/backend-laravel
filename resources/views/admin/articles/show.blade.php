
</br></br>

<br><br><br>
<div class="container">

@if($articles)
	<div style="border:1px solid red;">
<ul>
	@foreach($articles as $item)

     <li>
	 {{$item->text}}
	 <p><a href="{{ route('show') }}">создать</a>&nbsp&nbsp&nbsp&nbsp<a href="{{ route('articles.edit', $item) }}">изменить</a>&nbsp&nbsp&nbsp&nbsp
	 
	 
	   @if(isset($item->id))
	  
	{!! Form::open(['url' => route('articles.destroy',$item),'class'=>'form-horizontal','method'=>'POST']) !!}
      {{ method_field('DELETE') }}
	  {!! Form::button('<span class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true">удалить</span>', ['class' => '','type'=>'submit']) !!}
	  {{ csrf_field() }}

	{!! Form::close() !!}
   @endif
	
	 
	 
	 
	 
	 </p>
	 
	 </li>
<br></br>
    @endforeach
	</ul>
	 </div>
@endif


</div>












