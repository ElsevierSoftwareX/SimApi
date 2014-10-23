@extends('layouts.default')

@section('content')
<div class="portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-play font-green-sharp"></i>
								<span class="caption-subject font-green-sharp ">Real Time Simulation {{ $instance_id }}</span>
								<span class="caption-helper">results</span>
							</div>
						</div>
						<div class="portlet-body">

							<div class="table-toolbar">
								<div class="btn-group">
									<button id="sample_editable_1_new" class="btn green">
									Add New <i class="fa fa-plus"></i>
									</button>
								</div>
								<div class="btn-group pull-right">
									<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
											Print </a>
										</li>
										<li>
											<a href="#">
											Save as PDF </a>
										</li>
										<li>
											<a href="#">
											Export to Excel </a>
										</li>
									</ul>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
								</th>
								<th>
									 Timestep
								</th>
								<th>
									 Outdoor Temp
								</th>
								<th>
									 Storage Tank Temp
								</th>
								<th>
									 Bedroom Temp
								</th>
								<th>
									 Electricity Consumption kWh
								</th>
								
							</tr>
							</thead>
							<tbody>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									NULL
									 
								</td>
								<td>
									 NULL
									
								</td>
								<td>
									NULL
									 
								</td>
								<td>
									 NULL
								</td>
								<td class="center">
									NULL
									 
								</td>
							</tr>
							</tbody>
							</table>
						</div>
	</div>

<script>

window.setInterval(function() {
	$.ajax({
		url: '/getlastdata/' + {{ $instance_id }},
	}).done(function(response) {
		var rows = response.data;
		console.log(rows);
		//for(var i = 0; i < rows.length; i++) {
		//	var object = {
		//		"Data1": rows[i].Data1
		//	};
			//$('sample1').dataTable().fnAddData(object);
		//}
		
	});
}, 5000);
	
</script>
@stop
															 
    
			