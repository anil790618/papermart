

<div class="container-fluid">
	
    <div class="row">
        <div class="col-lg-12">
            <div class="table-div">
                <div class="table-header-div">
                    <h4 class="tabel-title">Transaction History</h4>
                   
                </div>
                <div class="tabel-body-div">
                    <div class="table-responsive overflow-hidden">
                    
                    	<div  id="table">
                    		<table id="producttype_tbale" class="table table-responsive-sm tabledata">
			                <tr >
			                	
			                    <th>S.No</th>
			                    <?php 
			                    if( $dashboard_type == 0){ echo '<th> Paid To </th><th>Recieve from </th>' ; }
							        else if( $dashboard_type == 1){echo '<th>Recieve from </th>' ; }
							        else if( $dashboard_type == 2){ echo '<th> Paid To </th>' ; }?>
			                    <th>Amount </th>
			                    <th>Added Date </th>
			                </tr>
			               
			            <?php
			            if ($query) 
			            {$i=1;
			                foreach ($query as $value)  
			                { 
			                    
			                    ?>
			                    <tr class="text-center">
			                        <td><?=$i?></td>
			                         <?php 
			                    if( $dashboard_type == 0){ echo '<td>'.$value['payname'].'  </td><td>'.$value['recievename'].'  </td>' ; $atextcolor = ''; $asymbol='';  }
							        else if( $dashboard_type == 1){echo '<td>'.$value['recievename'].' </td>' ; $atextcolor = 'text-success'; $asymbol='+'; }
							        else if( $dashboard_type == 2){ echo '<td>'.$value['payname'].' </td>' ; $atextcolor = 'text-danger'; $asymbol='-'; }?>
			                        <td class="<?=$atextcolor?>"><?=$asymbol?><?=$value['amount']?></td>
			                        <td><?=$value['added_date']?> </td>
			                    </tr>
			                <?php
			                $i++;
			                }
			               
			            }
			            else
			            {
			                ?>
			                <tr>
			                    <td colspan="4">No Data</td>
			                </tr>
			                <?php
			            }?>
			             </table>
                    	</div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

