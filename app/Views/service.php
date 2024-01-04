	<div class="content-body">
		<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Service</h4>
                            <div class="pull-right float-end ">
				                <ul class="nav nav_filter ">
				                    <li class="nav-item text-end">
				                       <a href="<?=base_url('equipment');?>" class="btn btn-secondary mb-2">Bcak</a>
				                       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  	<div class="modal-dialog">
											    <div class="modal-content">
											      	<div class="modal-header">
												        <h4 class="modal-title card-title" id="exampleModalLabel">Add Equipment</h4>
											      	</div>
											       	<form id="equipment_from" method="post">
												      	<div class="modal-body">
										       				<div class="mb-2">
										       					<label>Name</label>
										       					<input type="text" name="name"  class="form-control">
										       					<span class="e_name text-danger d-none"></span>
										       				</div>
										       				<div class="mb-2">
										       					<label>Price</label>
										       					<input type="text" name="price" class="form-control">
										       					<span class="e_price text-danger d-none"></span>
										       				</div>
										       				<div class="mb-2">
										       					<label>Service Date</label>
										       					<input type="date" name="service_date" class="form-control">
										       					<span class="e_service_date text-danger d-none"></span>
										       				</div>
												      	</div>
												      	<div class="modal-footer">
													        <button type="button" id="close_modal" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
													        <button type="submit" class="btn btn-primary">Submit</button>
												      	</div>
											      	</form>
											    </div>
										  	</div>
										</div>
				                    </li>
				                </ul>
				            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            	<!-- <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                                	<div class="dataTables_length" id="example3_length">
									    <label>
									        Show 
									        <div class="dropdown bootstrap-select">
									            <select name="example3_length" aria-controls="example3" class="" tabindex="-98">
									                <option value="10">10</option>
									                <option value="25">25</option>
									                <option value="50">50</option>
									                <option value="100">100</option>
									            </select>
									            <button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="10">
									                <div class="filter-option">
									                    <div class="filter-option-inner">
									                        <div class="filter-option-inner-inner">10</div>
									                    </div>
									                </div>
									            </button>
									            <div class="dropdown-menu " role="combobox">
									                <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
									                    <ul class="dropdown-menu inner show"></ul>
									                </div>
									            </div>
									        </div>
									        entries
									    </label>
									</div>
									<div id="example3_filter" class="dataTables_filter " >
										<label>Search:<input type="search" class="" placeholder="" aria-controls="example3"></label>
									</div>
								</div> -->
								<table id="example3" class="display min-w850 table table-sm">
					                <thead>
					                    <tr class="p-2">
					                        <th>S.No</th>
					                        <th>Name</th>
					                        <th>Service Date</th>
					                        <th>Last Service Date</th>
					                        <th>Status</th>
					                    </tr>
					                </thead>
					                <tbody>
							            <?php
							            if ($query) 
							            {
							                $i = 1;
							                foreach ($query as $value) 
							                {
							                    ?>
							                    <tr>
							                        <td><?=$i++;?></td>
							                        <td><?=$value['name'];?></td>
							                        <td><?=($value['next_service_date'])?$value['next_service_date']:$value['date'];?></td>
							                        <td><?=($value['next_service_date'])?$value['date']:'';?></td>
							                        <td>
							                        	<?php
							                        	if ($value['status'] == 0) 
							                        	{
							                        		$status   = "Pending";
							                        		$addClass = "text-warning";
							                        		$modal    = 'data-bs-toggle="modal" data-bs-target="#service_modal"';
							                        		$style    = "";
							                        	}
							                        	elseif ($value['status'] == 1)
							                        	{
							                        		$status   = "Done";
							                        		$addClass = "text-primary";
							                        		$modal    = '';
							                        		$style    = 'cursor:text;';
							                        	}
							                        	?>
							                        	<a style="<?=$style?>" href="javascript:void(0)"<?=$modal?> class="<?=$addClass?> btn-xs sharp" ><?=$status?></a>
							                        </td>                                               
							                    </tr>
							                    <?php
							                }
							                ?>
							                </table>
							                <?php
							            }
							            else
							            {
							                ?>
							                <tr>
							                    <td colspan="10">No Data</td>
							                </tr>
							                <?php
							            }
							            ?>
						        </tbody>
                            </div>
                        </div>
							<div class="modal fade" id="service_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  	<div class="modal-dialog">
								    <div class="modal-content">
								      	<div class="modal-header">
								        	<h3 class="modal-title" id="exampleModalLabel">Modal title</h3>
								      	</div>
								      	<form id="service_form">
									      	<div class="modal-body">
							       				<div class="mb-2">
							       					<label>Next Service Date<span class="text-danger"> *</span></label>
							       					<input type="date" name="next_service_date" id="next_service_date" class="form-control">
							       					<input type="hidden" name="id" value="<?=$id;?>">
							       					<input type="hidden" name="service_date" value="<?php if(isset($value['date'])){echo ($value['next_service_date'])?$value['next_service_date']:$value['date'];}?>">
							       					<span class="e_next_service_date text-danger d-none"></span>
							       				</div>
									      	</div>
									      	<div class="modal-footer">
									        	<button type="button" class="btn btn-secondary" id="close_service_modal" data-bs-dismiss="modal">Close</button>
									        	<button type="submit" class="btn btn-primary">Save changes</button>
									      	</div>
									    </form>
								    </div>
							  	</div>
                        	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
foreach ($javascript as $value)
{
	?>
	<script type="text/javascript" src="<?=$value?>"></script>
	<?php
}
?>

<script>
	$(function() 
	{
		$('#service_form').on('submit',function(e) 
		{
			e.preventDefault();
			$.ajax({
				url:"<?=base_url('update-service')?>",
				type:"post",
				data:$("#service_form").serialize(),
				dataType:"json",
				success:function(data)
				{
					if (data =="success") 
					{
						toastr.success("Service Data Update is successfully");
						$('#service_modal').modal("hide");
						window.location.reload();
					}
					if (data.next_service_date !='') 
					{
						$('.e_next_service_date').removeClass('d-none');
						$('.e_next_service_date').html(data.next_service_date);
					}
					else
					{
						$('.e_next_service_date').addClass('d-none');
						$('.e_next_service_date').html(" ");
					}
				}			
			})
		});
	});
</script>
</html>