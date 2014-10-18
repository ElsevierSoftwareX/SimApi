@extends('layouts.default')

@section('content')

    
	
    {{ Form::open(array('url' => route('new-instance', $user), 'method' => 'POST')) }}
     <ul>

     <li>
         {{ Form::label('name','Instance name:') }}
         {{ Form::text('name') }}
		 
		 @if ($errors->has('name'))
		 {{  $errors->first('name') }}
		 @endif
     </li>
       
     <li>  
         {{ Form::submit('Next') }}
     </li>
    </ul>
    {{ Form::close() }}
@stop