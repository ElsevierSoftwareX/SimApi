@extends('layouts.default')

@section('content')
<div class="portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-play font-green-sharp"></i>
								<span class="caption-subject font-green-sharp ">Energy Plus Simulation {{ $instance }}</span>
								<span class="caption-helper">results</span>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
							{{ Form::open(array('url' => $instance.'/show-results/','method' => 'get')) }}
	
								<div class="col-md-8">
									<div class="col-md-4">
														<div class="form-group">
															<label class="control-label col-md-3">Step</label>
															<div class="col-md-9">
															<select class="select2_category form-control" data-placeholder="Choose a Category" name="resolution">		
															 <option value="1" @if($resolution==1) 
															 					selected 
															 				   @endif> 15 minutes</option>
															 <option value="2" @if($resolution == 2) 
															 					selected 
															 					@endif> 30 minutes</option>
															 <option value="4" @if($resolution == 4) 
															 					selected 
															 					@endif> 60 minutes</option>
																</select>
															</div>
														</div>
													</div>
									
									<div class="col-md-4">
													<div class="form-group">
															<label class="control-label col-md-3">Group</label>
															<div class="col-md-9">
															<select class="select2_category form-control" data-placeholder="Choose a Category" name="group">		
															 <option value="24" @if($group==24)
															 					selected 
															 				   @endif> 1 Day</option>
															 <option value="48"@if($group==48)
															 					selected 
															 				   @endif> 2 Days</option>
															 <option value="168"@if($group==168)
															 					selected 
															 				   @endif> 7 Days</option>
																</select>
															</div>
														</div>
									</div>

									<div class="col-md-4">
										<input type="hidden" name="instance_id" value="{{ $instance }}">
									{{ Form::submit('Refresh', ['class' => 'btn green btn-block']) }}
									</div>
									</div>
								{{ Form::close() }}
								</div>
													
								
								
							
							</br></br>
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th>
									Day
								</th>
								<th>
									Hour
								</th>
								<th>
									 Time Step
								</th>
								<th>
									 PV Prod
								</th>
								<th>
									 Building kWh
								</th>
								<th>
									 Kitchen/Living Temp
								</th>
								<th>
									 Outdoor Temp
								</th>
								
							</tr>
							</thead>
							<tbody>
							@foreach($results as $result)
							<tr class="odd gradeX">

								<td>
									{{ $result->Day }}
								</td>
								<td>
									{{ $result->Hour }}
								</td>
								<td>
									{{ $result->Time }}
									 
								</td>
								<td>
									 {{ $result->PVProd }}
									
								</td>
								
								<td>
									 {{ $result->BuildingConsumption  }}
								</td>
								<td>
									{{  $result->KitchenT}}
									 
								</td>
								<td>
									{{  $result->Outdoor }}
									 
								</td>
							</tr>
							@endforeach
							</tbody>
							</table>
						</div>
	</div>
				

@stop
															 
    
			