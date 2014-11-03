@extends('layouts.default')

@section('content')
<div class="portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-play font-green-sharp"></i>
								<span class="caption-subject font-green-sharp ">Select Energy Plus Simulation </span>
								<span class="caption-helper">show data for the instance...</span>
							</div>
						</div>
						<div class="portlet-body">
							{{ Form::open(array('route' => 'results-instance','method'=>'get')) }}
							<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Instance</label>
															<div class="col-md-9">

																<select class="select2_category form-control" data-placeholder="Choose a Category" name="instance_id">
																	@foreach ($instances as $instance)
															 <option value="{{ $instance['idInstance'] }}"> {{ $instance['idInstance'] }} {{ $instance["name"] }}</option>
																	@endforeach
																</select>
															</div>
														</div>
													</div>
							
						
							<div class="col-md-6 ">
									<img src="{{ URL::asset('assets/images/bar-graph-clipart.png')  }}" alt="Smiley face" height="250" >
							</div>
							</div>
						     <div class="row">
						     	<div class="col-md-4">
						     		{{ Form::submit('Show Data', ['class' => 'btn green btn-block']) }}
						     	</div>
									<div class="col-md-4 ">
						         
						         	</div>
						         	<div class="col-md-4">
						     	</div>
						    	 {{ Form::close() }}
						    </div>
						</div>
	</div>
				

@stop
															 
    
			