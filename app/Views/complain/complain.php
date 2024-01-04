<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-div">
                <div class="table-header-div">
                    <h4 class="tabel-title"><?php if ($dashboard_type == 2) {
                        echo "Complains";
                    } else {
                        echo "Complains";
                    } ?></h4>
                    <div class="tabel-link-btn">
		               <ul class="nav nav_filter "> 
		                </ul> 
		            </div>
                </div>
                <div class="tabel-body-div">
                    <div class="table-responsive overflow-hidden">
                    	<div  id="table">
                    		<table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
			                <thead>
			                    <th>S.No</th>
			                    <th>List Number</th>
			                    <th>List Date</th> 
			                    <th>Product Category</th>
			                    <th>Complaint  </th>
			                    <th>Complaint Date </th>
			                    <th>Images</th> 
			                    <th>Action</th>
			                </thead>
			               <tbody>
			            <?php // print_r($query[0]);
               if ($query) {
                   $i = 1;
                   foreach ($query as $value) { ?>
			                    <tr id="row<?= $value["id"] ?>">
                        <td class="row-id" ><?php if (
                            $value["updates"] ?? 0 == 1 && $dashboard_type == 2
                        ) {
                            echo $i;
                        } else {
                             ?>
                                <?php if ($value["updates"] ?? 0 == 1) {
                                    echo '<i class="fa fa-circle text-danger mr-1"></i>' .
                                        $i;
                                } else {
                                    echo $i;
                                } ?>
                                <?php
                        } ?>
                            </td>
                            <td class="logged-in"> <?= $value["list_id"] ?? 0 ?></td>
                            <td> <?= $value["order_date"] ?> </td>
                            <td> </td>
                            <td> <?= $value["complain_issue"] ?? "" ?> </td>
                            <td> <?= $value["updated_at"] ?? "" ?> </td>
                            <td>
                                <?php
                                $image = $value["complain_image"];
                                $img = explode(",", $image);
                                foreach ($img as $key => $imgvalue) { ?> 
                                <img style="width:100px" src="<?= base_url() ?>/public/complaint_images/<?= $imgvalue ??'' ?>" >
                                <?php }
                                ?>
                            </td>  
                            <td>
                                <?php
                                $complain_status= $value["complain_status"]; 
                                if ($complain_status==1) {
                                    ?>
                                    <h5 class='text-success'>Resolve</h5> 
                                    <?php   
                                }elseif($complain_status ==2){
                                ?>
                                <h5 class='text-danger'>Rejected</h5>
                                <span style='text-warp:blance'><?=$value["complain_reject_reason"]?></span> 
                                <?php
                                }else{
                                ?>
                                <a class="complaintResolve" title="Accept  Details"  href="javascript:void(0)" tag="<?= $value["id"] ?>"><span class="badge light badge-success badge-text-size"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022"/>
                                    </svg></span>
                                </a>
                                <a class="complaintReject" title="Reject Details"  href="javascript:void(0)" tag="<?= $value["id"] ?>"><span class="badge light badge-danger badge-text-size"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                    </svg></span>
                                </a>
                                <?php
                                }
                                ?>
                               
                            </td>
                        </tr>
			                <?php $i++;}
               } else {
                    ?>
			                <tr>
			                    <td colspan="8">No Data</td>
			                </tr>
			                <?php
               } ?>
			        </tbody>
			             </table>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="conplaintModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="complainForm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Reason</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="opsId" name='id'>
                <textarea class="form-control" id="complain_rej_reason" name='complain_rej_reason' id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
            </div>
        </div>
    </form>
  </div>
</div>