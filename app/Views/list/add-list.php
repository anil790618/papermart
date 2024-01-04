<div class="">
    <div class="from-div-area">

        <div class="card-header p-0">
            <h4 class="card-title m-2 form-main-title">
                <?php if($dashboard_type == 2){ echo ' Add Requirements For buying '; } else { echo 'Add List for selling  '; }?>
                <?=$product['product_name'] ?? ''?> <br><small><?php if($dashboard_type == 2){ echo ' Enter the product requirement'; } else { echo 'Enter the product Details'; }?> </small>
            </h4>
            <div class="pull-right float-end ">
                <ul class="nav nav_filter ">
                    <li class="nav-item text-end">
                        <a href="javascript:void(0)" class="addpurchase-text nav-list">Back</a>
                    </li>
                </ul>
            </div>
        </div>
        <input type="hidden" id="dtype" value="<?=$dashboard_type;?>">
        <input type="hidden" id="utype" value="<?=$user_type;?>">
        <form class="" id="add_list_form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="list_type" id="list_type" value="<?=$dashboard_type?>">
            <input type="hidden" name="category_id" id="category_id" value="<?=$product['product_category'] ?? ''?>">
            <input type="hidden" id="pdata" value='<?=json_encode($product);?>'>
            <input type="hidden" id="subcatid" value="<?=$subcatid;?>">
            <input type="hidden" name="pid" id="pid" value="<?=$product['id'] ?? ''?>">
            <div class="from-section ">
                <div class=" size-4">
                    <div class="form-row">
                        <div class="col-12 from-header mb-3">
                            <h6 class="from-heading">Listing Details</h6>
                        </div>
                        <?php 
                    if($listcount)
                    {
                          $total_list =  $listcount + 1;
                          $total_list = sprintf('%04d', $total_list);
                          $total_list = 'LO-'.$total_list;
                    } 
                    else{ 
                          $total_list =  1;
                          $total_list = sprintf('%04d', $total_list);
                          $total_list = 'LO-'.$total_list;
                        }
                    ?>

                        <div class="form-group mb-0  col-md-3">
                            <div class="purchase-div">
                                <label> List Number </label><span class="text-danger">*</span>
                                <input type="text" class="form-control" name="list_number" id="list_number"
                                    placeholder="Product Name" value="<?= $total_list?>" readonly>
                            </div>
                            <span class="text-danger size-7 e_list_number"></span>
                        </div>


                        <div class="form-group col-md-3">
                            <label>Product Category</label><span class="text-danger">*</span>
                            <select class="form-control ratecat" id="category" name="category">
                                <option value="">Choose....</option>
                                <?php 
                                if ($category)  
                                { 
                                    if ($user_type==3 && $dashboard_type == 2) {
                                        ?>
                                <option value="1">Waste Paper</option>
                                <?php
                                    }else{
                                        foreach ($category as $value)  
                                        { 
                                        ?>

                                <option value="<?=$value['id']?>" <?php if($catdata){ if($value['id']==$catdata['id']){
                                    echo 'selected' ;} }?> >
                                    <?=$value['product_category']?>
                                </option>
                                <?php }
                                    }
                                    
                                }?>
                            </select>
                            <span class="text-danger size-7 e_product_category"></span>
                        </div>
                        <?php if($dashboard_type == 1 && ($user_type== 3   || $user_type== 4)){ ?>
                        <div class="col-3 p-2 ">
                            <label>Validity</label>
                            <input type="datetime-local" name="validity" class="form-control" required>
                            <span class="size-7 e_validity text-danger"></span>
                        </div>
                        <div class="col-3 p-2 ">
                            <label>Rates offered<span class="text-danger"> *</span></label>
                            <select name="rates_offered" id="rates_offered" class="form-control">
                                <option value="">Select Rates offered</option>
                                <option value="Ex-mill"> Ex-mill</option>
                                <option value="Ex-Godown"> Ex-Godown</option>
                                <!-- <option value="FOR"> FOR</option> -->
                            </select>
                            <span class="size-7 e_rates_offered text-danger"></span>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>

            <input type="hidden" id="pquality" name="pquality" value='<?=json_encode($pquality ?? '') ;?>'>
            <input type="hidden" id="sub_category" name="sub_category" value='<?=json_encode($subcategory ?? '') ;?>'>
            <input type="hidden" id="brand" name="brand" value='<?=json_encode($brand  ?? '');?>'>
            <input type="hidden" id="specification" name="specification" value='<?=($catdata[' product_specification']
                ?? '' );?>'>

            <div class=" list_type_description">
            </div>
            <div class='card d-none' id='uploadlist-form'>
                <div class="col-12 bg-light  p-2 ">
                    <div class="card-header">
                        <h6 class="">Product Specification</h6>
                        <div class="pull-right float-end ">
                            <ul class="nav nav_filter ">
                                <li class="nav-item text-end"> <a href="javascript:void(0)"
                                        class="btn btn-primary mb-2 addorderspecification_godown " tag="1">Add </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <table id="specification_table" class="table table-responsive tabledata size-6">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Size <span class="text-danger">*</span></th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="responsivespecification ">
                            <tr class="specificationrow1">
                                <td><select class="form-control" name="product[]" id="size">
                                        <option value="">BF : ; GSM : ; Type : </option>
                                    </select></td>
                                <td>
                                    <div class="d-flex"><input type="hidden" class="form-control" name="deckle"
                                            id="deckle"> <input type="text" class="form-control" name="size_list[]"
                                            id="size"><select class="form-select" name='size_uom[]'>
                                            <option value="in">In</option>
                                            <option value="cm">Cm</option>
                                        </select></div>
                                </td>
                                <td class="d-flex">
                                    <div class="d-flex"><input type="text" class="form-control"
                                            onchange="Addquantityfun(this.value)" name="quantity_list[]"
                                            id="quantity"><select class="form-select" name='quantity_uom[]'>
                                            <option value="kg">Kg</option>
                                            <option value="rims">Rims</option>
                                        </select></div>
                                </td>
                                <td class=""> </td>
                            </tr>
                            < </tbody>
                                <tr>
                                    <td>Total Quantity : <span id='totalqty'></span> </td>
                                </tr>
                                <tr>Note * : use x for size width and height eg.(4x3)</tr>
                    </table>
                </div>
            </div>
            <div class="">
                <div class="from-section size-4">
                    <div class="form-row">
                        <div class="col-12 from-header mb-3">
                            <h6 class="from-heading">Delivery Details</h6>

                        </div>
                        <div class="form-group mb-0  col-md-3">
                            <label>Delivery Type </label><span class="text-danger">*</span>
                            <?php
                            if ($user_type==3 && $dashboard_type == 2) {
                                ?>
                            <select class="form-control" name="delivery_type" tag="1" id="delivery_type">
                                <option value="2" class='d-none' id='deert'>Doorstep Delivery</option>
                            </select>
                            <?php
                                }else{
                                    ?>
                            <select class="form-control" name="delivery_type" tag="1" id="delivery_type">
                                <option value="">Select Delivery Type</option>
                                <option value="0" class='' id='zetot'>Zeto Transport</option>
                                <option value="1" class='' id='millt'>Mill Transport</option>
                                <option value="2" class='d-none' id='deert'>Doorstep Delivery</option>
                            </select>
                            <?php
                                } 
                                ?>
                            <span class="text-danger size-7 e_pterm1"></span>

                        </div> 
                        <div class="form-group mb-0  col-md-3">
                            <div class="field" id="product_location_feild"> 
                                <?php 
                                    if ($user_type == 3) {
                                    ?>
                                <input type="text" class='tableinput' name='product_location'
                                    value="<?=$memberDetail['company_name']??''?>, <?=$memberDetail['address']??''?>, <?=$memberDetail['city']??''?>, <?=$memberDetail['state']??''?> <?=$memberDetail['pin_code']??''?>">
                                <?php
                                    }elseif($user_type==2 && $dashboard_type == 2){
                                        ?>
                                   <input type="text" class='tableinput' name='product_location'   placeholder="Enter Location">
                                <?php
                                    } else{ 
                                        ?>
                                <select class="form-control" name="product_location" tag="1" id="product_location">
                                    <option value="">Choose Location</option>
                                    <option value="1">Alipur/kheda</option>
                                    <option value="2">Nangloi</option>
                                </select>
                                <?php 
                                    }
                                        ?>

                                <label for="product_location"> Location</label>
                            </div>
                            <span class="text-danger size-7 e_product_location"></span>

                        </div>
 
                        <div class="form-group mb-0  col-md-3">
                            <label>Payment Terms</label><span class="text-danger">*</span>

                            <select class="form-control" name="pterm" tag="1" id="pterm">
                                <option value="0">Both</option>
                                <!-- <option value="">Choose Payment Term</option> -->

                                <option value="1">Same Day</option>
                                <option value="2">30 Days</option>

                            </select>
                            <span class="text-danger size-7 e_pterm"></span>
                        </div>
                        <?php
                                    if ($user_type!=3 || $dashboard_type != 2) {
                                    ?>
                        <div class="form-group mb-0  col-md-3">
                            <div class="field">

                                <input type="text" class="" name="ddays" tag="1" id="ddays"
                                    placeholder="Eg. 1,2,3 or 2-4,5-10">
                                <label for="ddays">Delivery Days<span class="text-danger">*</span></label>
                            </div>
                            <span class="text-danger size-7 e_ddays"></span>
                        </div>
                        <?php
                                    }  
                                        ?>
                    </div>
                </div>
            </div>
            <div class="">

                <div class="from-section size-4">
                    <div class="form-row">
                        <div class="form-group mb-2  col-md-12">
                            <div class="textarea-dec">
                                <label class="from-heading">Description</label>
                                <!-- <span class="textarea-input">Minimum 350 words</span> -->
                                <textarea type="text" rows="4" cols="5" class="form-control p-0 prodec"
                                    name="description" placeholder="Minimum 350 words"></textarea>
                            </div>
                        </div>
                    </div>





                </div>
                <div class="from-submit">
                    <button type="submit" class="subbtn sublist ">Submit</button>
                </div>
            </div>
        </form>

    </div>

</div>

<script src="<?=base_url()?>/public/public/js/plugins-init/pickadate-init.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        var pquality = $('#pquality').val() ?? '';
        var sub_category = $('#sub_category').val() ?? '';
        var specification = $('#specification').val() ?? '';
        var subcatid = $('#subcatid').val() ?? '';
        var pid = $('#pid').val() ?? '';
        if (specification != '') {
            addSpecification(specification, '1', pquality, sub_category, subcatid);
        }
        if (pid != '') {

            getproductdata('1', pid);
        }
        if (subcatid > 0) {

            checkresponsivespec(1, subcatid, pid)
        }
    });


</script>