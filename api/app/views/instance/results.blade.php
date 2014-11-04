@extends('layouts.default')

@section('content')
<div class="row">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-sharp"></i>
								<span class="caption-subject font-green-sharp ">Kitchen/Living - [Temperature/Timestep]</span>
								<span class="caption-helper"></span>
							</div>
							
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="../../assets/admin/layout/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-share font-red-sunglo"></i>
								<span class="caption-subject font-red-sunglo ">Energy Consumption - [kWh/Timestep]</span>
								<span class="caption-helper"></span>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_activities_loading">
								<img src="../../assets/admin/layout/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_activities_content" class="display-none">
								<div id="site_activities" style="height: 228px;">
								</div>
							</div>
							<div style="margin: 20px 0 10px 30px">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-success">
										Low Peak: </span>
										<h3>{{ $minenergy }} kWh</h3>

									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-info">
										PV kWh: </span>
										<h3>{{ $maxenergypv }} kWh</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-danger">
										Peak:: </span>
										<h3>{{ $maxenergyc }} kWh</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-warning">
										Total: </span>
										<h3>{{ $totalcon }} kWh</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
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
							{{ Form::open(array('url' => '/show-results/','method' => 'get')) }}
	
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
															 <option value="3" @if($resolution == 3) 
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
															 <option value="1" @if($group==1)
															 					selected 
															 				   @endif> 1 Day</option>
															 <option value="2"@if($group==2)
															 					selected 
															 				   @endif> 2 Days</option>
															 <option value="3"@if($group==3)
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
									Hour
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
															 
    
			