@extends('layouts.default')

@section('content')
<div class="portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-play font-green-sharp"></i>
								<span class="caption-subject font-green-sharp ">Begin the Energy Plus Simulation </span>
								<span class="caption-helper">choose the instance...</span>
							</div>
						</div>
						<div class="portlet-body">
							{{ Form::open(array('route' => 'postandsetbegin')) }}
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
							</div>
							<div class="row">
								<div class="col-md-6">
									</br>
									</br>
									<label class="col-md-12 control-label">Storage Tank Temperature SetPoint</label>
								</br>
									
									<div class="form-group">
										
										<div class="col-md-12">
											<div class="noUi-control noUi-danger" id="slider_2">
											</div>
											<div class="input-group input-medium margin-top-20">
												<input id="slider_2_input_start" type="text" class="form-control" name="TSetHea">
												<span class="input-group-addon">
												to </span>
												<input id="slider_2_input_end" type="text" class="form-control" name="TSetCoo">
											</div>
										</div>
								</div>
							</div>
							<div class="col-md-6 ">
									<img src="{{ URL::asset('assets/images/heating_setpoint_web.png')  }}" alt="Smiley face" height="250" >
							</div>
							</div>
						     <div class="row">
						     	<div class="col-md-4">
						     		{{ Form::submit('Begin Simulation', ['class' => 'btn green btn-block']) }}
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
															 
    
			