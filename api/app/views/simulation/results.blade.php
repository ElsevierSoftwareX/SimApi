@extends('layouts.default_chart')

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
							<div id="warming" style="width: 150px; height: 200px; margin: 0 auto"></div>	
							<div id="bigContainer" style="width: 820px; height: 300px; margin: 0 auto; display: none">
								<div id="containers" style="width: 400px; height: 300px; float:left;"></div>	
								<div id="Energycontainers" style="width: 400px; height: 300px;float: right"></div>	
							</div>
							{{--
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
						</div>--}}
	</div>

<script>
var Objects = [], i;
var firstItem = null;
var flaq = false;
var ajaxInterval = null;
ajaxInterval = window.setInterval(function() {
	$.ajax({
		url: '/getsimlastdata/' + {{ $instance_id }},
		success: function (json) {
			for(i = 0; i < json.length; i++)
			{				
				if(firstItem == null)
				{
					firstItem = json[i];
				}
				else if(i == 0)
				{
					if(firstItem != null && firstItem["id"] == json[i]["id"])
					{
						flaq = true;
						clearInterval(ajaxInterval); // stop the interval						
						console.log("json[0]: "+json[i]["id"]+" = firstItem: "+firstItem["id"]);
						console.log("flaq = "+flaq);
					}
					firstItem = json[0];
				}
				Objects.push(json[i]);
			}
			{{--console.log("Response as JS Object:") --}}
			console.log(json);
		}
	{{--});

	.done(function(response) {
		var rows = response.data;
		console.log(rows);
		for(var i = 0; i < rows.length; i++) {
			var object = {
				"Data1": rows[i].Data1
			};
			$('sample1').dataTable().fnAddData(object);
		}
		--}}
	});
}, 1000); 
	
</script>


@stop
															 
    
			