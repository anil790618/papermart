<?php
use App\Models\Main_model;
$this->main_model=new Main_model();
$location = $this->main_model->getAllRowsData( "freight_list",  "*", "id>0");


?>
<div class="footer">
	        <div class="copyright">
	            <p>Copyright © Designed &amp; Developed by <a href="http://maxmites.com/" target="_blank">Maxmites</a> 2023</p>
	        </div>
    	</div>  
   </div>
<input type="hidden" id="approved" value="<?=$appproved?>">
        <!-- Welcome Form Modal -->
       <div class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="welcomeForm">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php if($memberDetail['is_active']??'' == 0 ){ echo 'Complete'; } else { echo 'Update'; } ?> Profile</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         

                          <?php if($memberDetail['is_active']??'' == 0 ){ echo '<h4 >To explore more detailed , best and userfriendly experience complete your work profile.</h4>'; } 
                         else { echo 'Your Account Registration On ZETO is under Approval. <br><br> <small> Thanks for signing up for an account. We are reviewing your account and will inform you within 2 working days.</small>'; } ?> 
                         
                    </div>
                    <div class="modal-footer">
                       
                        <button type="button" class="btn btn-primary nav-workprofile" ><?php if($memberDetail['is_active']??'' == 0 ){ echo 'Complete'; } else { echo 'Update'; } ?> Profile</button>
                    </div>
                </div>
            </div>
        </div>


         <div class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="registeredServicesModal">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Work Profile  </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <?php if($memberDetail['is_active']??'' == 0 ){ echo 'Your profile is not created.<br>Create your work profile for Buying/selling.'; } 
                         else { echo 'Your Account Registration On ZETO is under Approval. <br><br> <small> Thanks for signing up for an account. We are reviewing your account and will inform you within 2 working days.</small>'; } ?> 
                    </div>
                    <div class="modal-footer">
                       
                        <button type="button" class="btn btn-primary nav-workprofile" tag="<?=$_SERVER['REQUEST_URI']?>"> <?php if($memberDetail['is_active']??'' == 0 ){ echo 'Complete'; } else { echo 'Update'; } ?> Profile</button>
                    </div>
                </div>
            </div>
        </div>
        
<!-- Modal -->

</body>

<div class="modal fade" id="userlist_request_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="exampleModalLabel">Add Delivery location and payment terms</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pt-2">
          <form id='response_location_terms'>
              <input type="hidden" class="form-control" id="r-id" name="r-id">
              <input type="hidden" class="form-control" id="titlev" name="title">
              <!-- <input type="hidden" class="form-control" id="subcat" name="subcat"> -->
              <div class="controller">
                <div class="row">
                <div class="col-sm-12">
                         <div class="mb-3">
                            <label for="location" class="form-label">Delivery Location</label><br>
                            <select class="form-select form-control " id='deliverylocation' name='delivery_locations'  required>
                                <option value=''>Choose Delivery Location </option> 
                                <option value="1">Delhi</option>
                                <option value="2">Noida</option>
                                <option value="3">Kundli</option>
                                <option value="4">Sahibabad</option>
                                <option value="5">tronica City</option>
                                <option value="6">Faridabad</option>
                                <option value="7">Gurgaon</option>
                                <option value="8">Manesar</option>
                                <option value="9">Noida-2</option>
                                <option value="10">Jhajjar</option>
                                <option value="11">Bahadurgarh</option>
                                <option value="12">Ballabgarh</option>
                                <option value="13">Local Shipment</option>
                                <option value="14">Other</option>
                                 
                            </select>
                        </div>
                     </div>
                    <div class="col-sm-12 d-none dpin" id="dpin"> 
                        <div class="mb-3">
                            <label for="location" class="form-label">Pincode</label> 
                            <input list="del_location" class='' name="d_pincode" id="d_pincode"> 
                            <datalist id="del_location"> 
                               <?php
                                    if($location){
                                        foreach ($location as $key => $p) { 
                                            ?>
                                            <option value="<?=$p['pincode']?>"><?=$p['pincode']?></option>
                                            <?php
                                        }
                                    } 
                                    ?>
                            </datalist>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="location" class="form-label"> Payment Terms</label><br>
                            <select class="form-select form-control" id='payment_terms' name='payment_terms' aria-label="Default select example" required>
                                <option value=''>Choose Payment Terms</option> 
                                <option value="0">Advance</option>
                                <option value="1">On Delivery</option>
                                <option value="2">50% Advance & 50% On Delivery </option>
                                <option value="3">15 Day </option>
                                <option value="4">30 Day</option> 
                            </select>
                        </div>
                    </div> 
                </div>
              </div> 
            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
    
    </div>
  </div>
</div>
<?php
foreach ($javascript as $val)
{
    ?>
    <script type="text/javascript" src="<?=base_url('/'.$val)?>"></script>
    <?php
}
?>
<script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
<script>
    // new google.translate.TranslateElement('google_element'); 
    function loadGoogleTranslate(){
        new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,hi',
      }, 'google_element');
    }
   
</script>
<script>
        // Function to calculate the current IST time in the required format
        function getCurrentIndianTime() {
            const now = new Date();
            const offset = now.getTimezoneOffset(); // Get the current time zone offset in minutes
            const istOffset = -330; // IST has an offset of -330 minutes (5 hours and 30 minutes behind UTC)
            const istTime = new Date(now.getTime() + (offset + istOffset) * 60000); // Calculate IST time
            const istTimeString = istTime.toISOString().slice(0, -1); // Format as 'yyyy-mm-ddThh:mm'

            return istTimeString;
        }

        // Set the default value of the input field to the current IST time
        document.getElementById('indianDateTime').value = getCurrentIndianTime(); 
    
    </script>
</html>
