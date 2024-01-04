
$(document).on("click", ".client_detail", function (e) {
    var id = $(this).attr('tag');
    var name = $(this).attr('cname');
    var phone = $(this).attr('cphone');

    $('#customer_id').val(id);
    $('#customer_name').val(name);
    $('#customer_mobile').val(phone);
    $('#clientdetail').val(name);

    $('.suggestionAra.client').html('');

});

$(document).on('keyup', '.list-product', function () {
    word = $(this).val() || '';
    tag = $(this).attr("tag") || '';
    category = $('#category').val();
    if (word != '') {
        $(' #product_id').val('');
        searchList(word, tag, category);
    }
    else {
        $('.suggestionAra.product').html('');
    }
})

function searchList(word = '', tag = '') {
    $.post(base_url + 'get-searchproducts', { search: word, category: category }, function (data) {
        if (data) {


            arr = JSON.parse(data);

            productdate = '';
            if (arr.success == true) {
                list = arr.list;
                productdate = '<ul>';
                for (ii in list) {
                    productdate += '<li class="selThisCnItem product_detail" tag="' + list[ii].id + '" producttag = "' + tag + '" name="' + list[ii].product_name + '" maxqty="' + list[ii].minimum_stock + '" specification="' + arr.specification + '" >' + list[ii].product_name + ' <br></li>';
                }
                productdate += '</ul>';
            }
            else {
                productdate += '<ul><li class="selThisCnItem " >No Data</li></ul>';
            }
            $(' .suggestionAra.product').html(productdate);
            const jsonString = JSON.stringify(arr.quality);

            $(' #pquality').val(jsonString);

            const sub_category = JSON.stringify(arr.sub_category);

            $(' #sub_category').val(sub_category);

            $(' #product_id').val('');
        }
    })
}

$(document).on("click", ".product_detail", function (e) {
    $('.list_type_description').html('');
    var id = $(this).attr('tag');
    var name = $(this).attr('name');
    var maxqty = $(this).attr('maxqty');
    var tag = $(this).attr('producttag');
    var specification = $(this).attr('specification');
    var pquality = $('#pquality').val();
    var sub_category = $('#sub_category').val();
    var subcatid = $('#subcatid').val();
    // alert(pquality);

    if (specification != '') {

        addSpecification(specification, '1', pquality, sub_category, subcatid);
    }
    $(' .e_qty').html('');
    $(' .qtyvalidation').val('');

    $(' #product_id').val(id);
    $(' .list-product').val(name);
    $(' .qtyvalidation').attr('maxqty', maxqty);
    $(' .suggestionAra.product').html('');



});

$(document).on("change", ".ratecat", function (e) {

    $('.list_type_description').html('');
var utype = $('#utype').val();
    var id = $(this).val();

    $.post(base_url + 'get-searchbycategory', { id: id }, function (data) {
        if (data) { 
            console.log(data);
            arr = JSON.parse(data); 
            if (arr.success == true) {
                var pquality = '';
                var sub_category = '';
                var brand = '';
                if (arr.quality) {
                    var pquality = JSON.stringify(arr.quality);
                    $(' #pquality').val(pquality);
                }
                else {
                    $(' #pquality').val(pquality);
                }

                if (arr.sub_category) {
                    var sub_category = JSON.stringify(arr.sub_category);

                    $('#sub_category').val(sub_category);

                }
                else {

                    $('#sub_category').val(sub_category);
                }

                if (arr.brand) {
                    var brand = JSON.stringify(arr.brand);
                    $(' #brand').val(brand);
                }
                else {
                    $(' #brand').val(brand);
                }


                var specification = arr.specification;
                $(' #specification').val(specification);

                if (specification != '') {

                    addSpecification(specification, '1', pquality, sub_category, '0');

                }
            }

        }
    })

});

function addSpecification(specification = '', tag = '', pquality = '', sub_category = '', subcatid = '') {
    var str_array = specification.split(',');
    var otherdata = '';
    var sizedropdown = '';
    var quantitydropdown = '';
    var minquantitydropdown = '';
    var post_type = $('#post_type').val();
    var brand = $('#brand').val();
    var dtype = $('#dtype').val();
    var utype = $('#utype').val();
    var cat = $("#category option:selected").text();
    var catv = $("#category option:selected").val();
// alert(catv+"Dtype is "+dtype) ;
    if (tag == 1) {
        otherdata += '<div class="from-section product' + tag + '"> <div class="from-header">  <h6 class="from-heading">Product Info</h6> <div class="append-productspecification" tag="' + tag + '">  <a href="javascript:void(0)" class="badge light badge-success size-7  " >Add Product</a>  </div></div> <div class=" size-4"> <div class="form-row">';
        // $('#specification').val(specification);
    }
    else {

        otherdata += '<div class="from-section product' + tag + '"> <div class="from-header">  <h6 class="from-heading">Product Info</h6> <div class="cancel-productspecification" tag="' + tag + '">  <a href="javascript:void(0)" class="badge light badge-danger size-7  " ><i class="fa fa-times"></i></a>  </div></div> <div class=" size-4"> <div class="form-row">';
    }
    for (var i = 0; i < str_array.length; i++) {

        str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
        if (str_array[i] == 'quantity_uom') { }
        else if (str_array[i] == 'quantity') {
            if (dtype == '2' || utype == '1' || utype=='3' || utype=='4' ) {
                if (cat == 'Packaging Board' || cat == 'Coated Papers/boards') {
                    quantitydropdown = '<div class="form-group mb-0  col-md-5 mt-3  " id="specquantity_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="quantity_uom' + tag + '" name="quantity_uom[]"  >  <option value="Kg">Kg</option>  </select>   </div></div>'
                }
                else { quantitydropdown = '<div class="form-group mb-0  col-md-5 mt-3" id="specquantity_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="quantity_uom' + tag + '" name="quantity_uom[]"  >  <option value="Kg">Kg</option></select>   </div></div>' }

                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="form-row"><div class="form-group mb-0  col-md-7" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>' + quantitydropdown + '</div></div>';
            } 
        }
        else if(str_array[i] == 'min_quantity_per_gsm'){
            if ( utype !='2') {
            // if (dtype == '2' || utype == '1' || utype=='3'|| utype=='4') {
                if (cat == 'Packaging Board' || cat == 'Coated Papers/boards') {
                    minquantitydropdown = '<div class="form-group mb-0  col-md-5 mt-3  " id="specquantity_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="min_quantity_uom' + tag + '" name="min_quantity_uom[]"  >  <option value="Kg">Kg</option>  </select>   </div></div>'
                }
                else { minquantitydropdown = '<div class="form-group mb-0  col-md-5 mt-3" id="specquantity_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="min_quantity_uom' + tag + '" name="min_quantity_uom[]"  >  <option value="Kg">Kg</option></select>   </div></div>' }

                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="form-row"><div class="form-group mb-0  col-md-7" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>' + minquantitydropdown + '</div></div>';
            }  
        }
        else if(str_array[i] == 'min_quantity_uom'){

        }
        else if(str_array[i] == 'min_quantity_pertruck'){
            if ( utype!='2') {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="form-row"><div class="form-group mb-0  col-md-7" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>' + minquantitydropdown + '</div></div>';
            }
            
        }
        else if (str_array[i] == 'quality') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option> ';



            if (pquality) {
                arr = JSON.parse(pquality);
                for (ii in arr) {
                    otherdata += '<option value="' + arr[ii].product_quality + '" >' + arr[ii].product_quality + '</option>';
                }
            }
            otherdata += '</select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'sub_category') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class=" responsivespec form-control seleinput" id="' + str_array[i] + tag + '" tag="' + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option> ';
            if (sub_category) {
                arr1 = JSON.parse(sub_category);

                for (ii1 in arr1) {
                    otherdata += '<option value="' + arr1[ii1].id + '" ';

                    // if(arr1[ii1].id == subcatid){
                    // otherdata+= 'selected';     
                    // }

                    otherdata += '>' + arr1[ii1].product_category + '</option>';
                }
            }

            otherdata += '</select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext ">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'brand_name') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  tag="' + tag + '" class="' + str_array[i] + ' form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option> ';

            if (brand) {
                // br = brand;
                br = JSON.parse(brand); 
                for (ii1 in br) {
                    otherdata += '<option value="' + br[ii1].id + '" ';
                    // if(br[ii1].id == pid && tag==1){
                    // otherdata+= ' selected';     
                    // }
                    otherdata += '>' + br[ii1].product_name + '</option>';
                }
            }

            otherdata += '</select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext ">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }

        else if (str_array[i] == 'size_uom') {

        }
        else if (str_array[i] == 'size') {
            if (dtype ==  2 || utype==4) {
                if (catv == '9') {
                    otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="form-row"><div class="form-group mb-0  col-md-12" id="specsize_uom' + tag + '"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom' + tag + '" name="size_uom[]" >  <option value="">Choose..</option>  <option value="A3">A3</option><option value="A4">A4</option><option value="A5">A5</option></select>  <label  for="size_uom' + tag + '" class="labeltext">Size</label></div></div></div></div>';

                }
                else if (catv == '2') {
                    // otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="form-row"><div class="form-group mb-0  col-md-8" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="size_length'+tag+'" name="size_length[]"  > <label  for="size_length'+tag+'" class="labeltext">Size</label>  </div> </div><div class="form-group mb-0  col-md-4 mt-3" id="specsize_uom'+tag+'"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom'+tag+'" name="size_uom[]" >  <option value="">Choose..</option> <option value="inch">inch</option><option value="cm">cm</option></select>  </div></div></div></div>'; 

                }
                else {
                    otherdata += '<div class="form-group mb-0  col-md-3  spec_size" id="spec' + str_array[i] + tag + '"><div class="form-row"><div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="size_length' + tag + '" name="size_length[]"  > <label  for="size_length' + tag + '" class="labeltext">Length</label>  </div> </div><div class="form-group mb-0  col-md-2 mt-4"><div class="field "> X  </div> </div><div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field"> <input type="text" class=" " placeholder="' + str_array[i] + '" id="size_width' + tag + '" name="size_width[]"  > <label for="size_width' + tag + '" class="labeltext">width</label> </div>   </div><div class="form-group mb-0  col-md-4 mt-3" id="specsize_uom' + tag + '"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom' + tag + '" name="size_uom[]" >  <option value="">Choose..</option> <option value="inch">inch</option><option value="cm">cm</option></select>  </div></div></div></div>';

                }

            }
        }


        else if (str_array[i] == 'product_form') {
            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="0">Loose</option><option value="1">Compressed</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'quantity_type') {
            if (dtype == '2' || utype == '1') {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput q21" onchange="uploadsizelistmodal(this.value)"  id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="1">Godown</option><option value="2">Truck Load</option><option value="3">Part Load</option><option value="0">NA</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }else if(utype=='3'){
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  onchange="changeOfferTypefun(this.value)" class="form-control seleinput q01" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="2">Truck Load</option><option value="3">Part Load</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }else{
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select onchange="changeOfferTypefun(this.value)"  class="form-control seleinput q0" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="1">Godown</option><option value="2">Truck Load</option><option value="3">Part Load</option> </select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
        }
        else if (str_array[i] == 'pulp') {


            if (cat == 'Speciality  papers') {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="Virgin">Virgin</option><option value="Recycle">Recycle</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
            else { otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="Virgin">Virgin</option><option value="Agro">Agro</option><option value="Recycle">Recycle</option><option value="Any">Any</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>'; }


        }
        else if (str_array[i] == 'color') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput ' + str_array[i] + '" tag="' + tag + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option>  <option value="White">Brown</option><option value="Brown">Non-Brown</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'type') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option>  <option value="Agro based">Agro based</option><option value="Semi-Kraft">Semi-Kraft</option><option value="Kraft">Kraft</option><option value="Waste based">Waste based</option><option value="Virgin">Virgin</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'shade') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option>  <option value="White">White</option><option value="Offwhite">Offwhite</option><option value="NS">NS</option><option value="GY">GY</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'ss_nss') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="SS">SS</option><option value="NSS">NSS</option></select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'tear') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><label for="' + str_array[i] + tag + '" class=" labeltext">' + str_array[i].replace(/_/g, " ") + '</label><div class="form-row" ><div class="form-group mb-0 col-5" ><div class="field"><input  id="' + str_array[i] + tag + '" name="md[]"></div></div><div class="form-group mb-0 col-1" >MD</div><div class="form-group mb-0 col-5" ><div class="field"><input id="' + str_array[i] + tag + '" name="cd[]"></div></div><div class="form-group mb-0 col-1" >CD</div></div> </div>';

        }
        else if (str_array[i] == 'coating') {

            if (cat == 'Paper for food packaging') {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option>  <option value="PE">PE</option> <option value="Aqueous" >Aqueous </option> </select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
            else {

                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option>  <option value="Gloss">Gloss</option><option value="Matt">Matt</option><option value="Silk">Silk</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
        }
        else if (str_array[i] == 'gsm') {

            if (cat == 'Photocopier Paper') {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option>  <option value="70">70</option><option value="75">75</option><option value="80">80</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
            else {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
        }
        else if (str_array[i] == 'packing_per_ream') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="100">100</option><option value="200">200</option><option value="250">250</option><option value="500">500</option><option value="0">NA</option></select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'rate') {


            if (post_type == '2') {
                otherdata += '<div class="form-group mb-0  col-md-3" id="specnormalrate' + tag + '"><div class="field"> <input type="text" class=" " placeholder="Normal Rate" id="normalrate' + tag + '" name="normalrate[]"  > <label for="normalrate' + tag + '" class="selectlabel labelup labeltext">Normal Rate</label></div></div><div class="form-group mb-0  col-md-3" id="specsaudarate' + tag + '"><div class="field"> <input type="text" class=" " placeholder="Sauda Rate" id="saudarate' + tag + '" name="saudarate[]"><label for="saudarate' + tag + '" class="selectlabel labelup labeltext">Sauda Rate</label> </div> </div>';
            }
            else {
                if (utype == '1') {
                    otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
                }
                else {
                    if (dtype == '1') {
                        otherdata += '<div class="form-group mb-0  col-md-3" id="speccashrate' + tag + '"><div class="field"> <input type="text" class=" " placeholder="Cash Rate" id="cashrate' + tag + '" name="cashrate[]"  > <label for="cashrate' + tag + '" class="selectlabel labelup labeltext">Cash Rate/Kg (Same Day)</label></div></div><div class="form-group mb-0  col-md-3" id="speccreditrate' + tag + '"><div class="field"> <input type="text" class=" " placeholder="Credit Rate" id="creditrate' + tag + '" name="creditrate[]"><label for="creditrate' + tag + '" class="selectlabel labelup labeltext">Credit Rate/Kg (Upto 30 Day) </label> </div> </div>';
                    }
                }
            }
        }
        else if (str_array[i] == 'mill_name') {
            if (utype == 3) {

             }
            else {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
        }
        else if (str_array[i] == 'truck_ratio') { 
            
            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '" > <option value="1">100% Corrugation 1st</option><option value="2">90% Corrugation 1st, 10% Corr 2nd</option><option value="3">80% Corrugation 1st, 20% Corr 2nd</option><option value="4">70% Corrugation 1st, 30% Corr 2nd </option><option value="5">70% Corrugation 1st, 15-25% Corr 2nd,5% Mill board,Duplex,Grey board etc </option><option value="6">65-70% Corrugation 1st, 25-35% Corr 2nd,5% Mill board,Duplex,Grey board etc</option> <option value="7">Grey board</option>  </select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'bundle_weight') { 
            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '" > <option value="30">30Kg</option><option value="100">100Kg</option><option value="500">500Kg</option><option value="700">700Kg</option> <option value="1000">1000Kg</option> <option value="0">Any</option></select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            otherdata += '<input type="hidden" name="admin_approved" id="admin_approved" value="1">';
        }
        else if (str_array[i] == 'valid_from') { 
            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="datetime-local" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'white_quality_table') {

            otherdata += '<div class="form-group mb-0  col-md-12" id="spec' + str_array[i] + tag + '"> <div class="  mb-0  col-md-10" id="specsub_category1">  <table id="wastepapertable" style="" ><tr><th colspan="3" class="text-center"><h4>Quality Table</h4></th></tr><tr><th></th><th>ON-Report</th><th>NON-Report</th></tr><tr>\
            <th>Scan</th>\
            <td><input type="text" class="tableinput" name="w_scan_on"></td>\
            <td><input type="text" class="tableinput" name="w_scan_non"></td>\
        </tr>\
        <tr>\
            <th>Colour</th>\
            <td><input type="text" class="tableinput" name="w_color_on"></td>\
            <td><input type="text" class="tableinput" name="w_color_non"></td>\
        </tr>\
        <tr>\
            <th>Copy</th>\
            <td><input type="text" class="tableinput" name="w_copy_on"></td>\
            <td><input type="text" class="tableinput" name="w_copy_non"></td>\
        </tr>\
        <tr>\
            <th>Record</th>\
            <td><input type="text" class="tableinput" name="w_record_on"></td>\
            <td><input type="text" class="tableinput" name="w_record_non"></td>\
        </tr>\
        <tr>\
            <th>Shorted Book</th>\
            <td><input type="text" class="tableinput" name="w_short_on"></td>\
            <td><input type="text" class="tableinput" name="w_short_non"></td>\
        </tr>\
        <tr>\
            <th>White Cutting 1st Brightness 80% plus</th>\
            <td><input type="text" class="tableinput" name="w_whitecutting_on"></td>\
            <td><input type="text" class="tableinput" name="w_whitecutting_non"></td>\
        </tr>\
        <tr>\
            <th>White Pepsi</th>\
            <td><input type="text" class="tableinput" name="w_pepsi_on"></td>\
            <td><input type="text" class="tableinput" name="w_pepsi_non"></td>\
        </tr>\
        <tr>\
            <th>White Board</th>\
            <td><input type="text" class="tableinput" name="w_board_on"></td>\
            <td><input type="text" class="tableinput" name="w_board_non"></td>\
        </tr>\
        <tr>\
            <th>Old Book</th>\
            <td><input type="text" class="tableinput" name="w_book_on"></td>\
            <td><input type="text" class="tableinput" name="w_book_non"></td>\
        </tr>\
        <tr>\
            <th>Rulled Cutting</th>\
            <td><input type="text" class="tableinput" name="w_rulled_on"></td>\
            <td><input type="text" class="tableinput" name="w_rulled_non"></td>\
        </tr>\
        <tr>\
            <th>Tick Mark Pepsi</th>\
            <td><input type="text" class="tableinput" name="w_tick_on"></td>\
            <td><input type="text" class="tableinput" name="w_tick_non"></td>\
        </tr>\
    </table>\
   </div></div>';
        }
        else if (str_array[i] == 'kraft_quality_table') {

            otherdata += '<div class="form-group mb-0  col-md-12" id="spec' + str_array[i] + tag + '"> <div class="  mb-0  col-md-10" id="specsub_category1">  <table id="wastepapertable" style="" ><tr><th colspan="3" class="text-center"><h4>Quality Table</h4></th></tr><tr><th></th><th>ON-Report</th><th>NON-Report</th></tr><tr>\
            <th>Corrugation Ist</th>\
            <td><input type="text" class="tableinput" name="k_corr1_on"></td>\
            <td><input type="text" class="tableinput" name="k_corr1_non"></td>\
        </tr>\
        <tr>\
            <th>Corrugation IInd</th>\
            <td><input type="text" class="tableinput" name="k_corr2_on"></td>\
            <td><input type="text" class="tableinput" name="k_corr2_non"></td>\
        </tr>\
        <tr>\
            <th>Dye Cutting</th>\
            <td><input type="text" class="tableinput" name="k_dye_on"></td>\
            <td><input type="text" class="tableinput" name="k_dye_non"></td>\
        </tr>\
        <tr>\
            <th>Grey Board</th>\
            <td><input type="text" class="tableinput" name="k_grey_on"></td>\
            <td><input type="text" class="tableinput" name="k_grey_non"></td>\
        </tr>\
        <tr>\
            <th>Duplex</th>\
            <td><input type="text" class="tableinput" name="k_duplex_on"></td>\
            <td><input type="text" class="tableinput" name="k_duplex_non"></td>\
        </tr>\
        <tr>\
            <th>Mill Board</th>\
            <td><input type="text" class="tableinput" name="k_mill_on"></td>\
            <td><input type="text" class="tableinput" name="k_mill_non"></td>\
        </tr>\
        <tr>\
            <th>Core Pipe</th>\
            <td><input type="text" class="tableinput" name="k_core_on"></td>\
            <td><input type="text" class="tableinput" name="k_core_non"></td>\
        </tr>\
    </table>\
   </div></div>';
        }
        else 
        {
            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }



    }

    if (post_type == '2') {
        if (cat == 'Packaging Board' || cat == 'Coated Papers/boards') {
            quantitydropdown = '<div class="form-group mb-0  col-md-5 mt-3  " id="specminqty_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="minqty_uom' + tag + '" name="minqty_uom[]"  > <option value="">Choose..</option> <option value="Kg">Kg</option><option value="MT">MT</option><option value="Packets">Packets</option><option value="Reels">Reels</option></select>   </div></div>'
        }
        else {quantitydropdown = '<div class="form-group mb-0  col-md-5 mt-3" id="specminqty_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="minqty_uom' + tag + '" name="minqty_uom[]"  > <option value="">Choose..</option>  <option value="Kg">Kg</option><option value="MT">MT</option><option value="Reams">Reams</option><option value="Reels">Reels</option></select>   </div></div>' }

        otherdata += '<div class="form-group mb-0  col-md-3" id="specmin_qty' + tag + '"><div class="form-row"><div class="form-group mb-0  col-md-7" id="specmin_qty' + tag + '"><div class="field">  <input type="text" class=" " placeholder="Minimum Quantity" id="min_qty' + tag + '" name="min_qty[]"  > <label for="min_qty' + tag + '" class="labeltext">Minimum Quantity</label></div></div>' + quantitydropdown + '</div></div>';

    }
    otherdata += '<input type="hidden" class=" " value="' + tag + '" name="rowcount[]"  > ';
    otherdata += '</div></div> </div>';
    var deckle = $('#deckle').val();
    if (deckle == 1) {
        $('.list_type_description').append('<div class=" col-9" >' + otherdata + '  </div> <div class=" col-3" ><div class="col-12 bg-light  p-2 productsizelist' + tag + '">  <div class="card-header">  <h6 class="">Product Specification</h6> <div class="pull-right float-end ">  <ul class="nav nav_filter ">   <li class="nav-item text-end"> <a href="javascript:void(0)" class="btn btn-primary mb-2 addlistsize " producttag="' + tag + '" tag="1">Add </a> </li>  </ul> </div> </div> <table id="specification_table" class="table table-responsive tabledata size-6"> <thead> <tr>  <th>Size (in inch)</th> <th>Quantity</th>  <th></th>  </tr> </thead> <tbody class="responsivespecification' + tag + '">  <tr class="specificationrow' + tag + '" > <td> <input type="text" class="form-control"  name = "listsize' + tag + '[]" id="listsize" required></td>  <td><input type="text" class="form-control"  name = "listquantity' + tag + '[]" id="listquantity" required></td>   <td></td> </tr> </tbody> </table><input type="hidden" name = "listtag" value="' + tag + '">  </div>  </div>');
    }
    else {
        $('.list_type_description').append(otherdata);
    }
    tag++;
    $('.append-productspecification').attr('tag', tag);
}

$(document).on('click', '.addlistsize', function (e) {
    var producttag = $(this).attr('producttag') * 1;
    var tag = $(this).attr('tag') * 1;
    var next = tag + 1;

    var rdata = '<tr class="specificationrow' + next + '"><td><input type="text" class="form-control" name = "listsize' + producttag + '[]" id="size"></td><td><input type="text" class="form-control" name = "listquantity' + producttag + '[]" id="listquantity"></td> <td><a class="removespecification m-0" tag="' + next + '" type="button" style="color:red; text-align:right; font-size:20px"><i class="fa fa-close"></i></a></td></tr>';

    $('.responsivespecification' + producttag).append(rdata);
    $('.addlistsize').attr("tag", next);

});

function getproductdata(tag, pid) {
    
    $.post(base_url + 'get-pdata', { pid: pid }, function (data) {
        if (data) {
            arr = JSON.parse(data);
            spec = arr['specarray'];
            var str_array = spec.split(',');

            for (var i = 0; i < str_array.length; i++) {

                $('#' + str_array[i] + tag).val(arr[str_array[i]]);

            }
            $('#sub_category' + tag).val(arr['sub_category']);
            $('#brand_name' + tag).val(pid);
            // resdata=$('#resdata'+tag).val();
            // if(resdata==''){
            var id = arr['sub_category'];

            checkresponsivespec(tag, id, pid);


            // }


        }
    })

}

$(document).on("change", ".brand_name", function (e) {
    var tag = $(this).attr('tag');
    var pid = $(this).val();
    // alert(tag);
    // alert(pid);
    getproductdata(tag, pid);

});


$(document).on("change", ".responsivespec", function (e) {
    //debugger;
    var tag = $(this).attr('tag');
    var id = $(this).val();
    var pid = 0;
    console.log(tag +" "+ id)
    checkresponsivespec(tag, id, pid)
});


function checkresponsivespec(tag, id, pid) {
    $('#sub_category' + tag).val(id);
    $.post(base_url + 'get-qualityspec', { id: id }, function (data) {
        if (data) {
            var cat = $("#product_category option:selected").text();
            arr = JSON.parse(data);
            console.log(arr);
            cdata = '';
            var branddata = '<option value="" >Choose..</option>';
            var qualitydata = '<option value="" >Choose..</option>';
            if (arr.success == true) {

                brand = arr.brand;

                for (ii in brand) {
                    branddata += '<option value="' + brand[ii].id + '" ';
                    if (pid == brand[ii].id) { branddata += 'selected'; }
                    branddata += ' > ' + brand[ii].product_name + '</option>';

                }

                $('#brand_name' + tag).html(branddata);

                quality = arr.quality;

                for (ii in quality) {
                    qualitydata += '<option value="' + quality[ii].id + '" ';
                    if (pid == quality[ii].id) { qualitydata += 'selected'; }
                    qualitydata += ' > ' + quality[ii].product_quality + '</option>';

                }

                $('#quality' + tag).html(qualitydata);

                specification = arr.specification;
                console.log("spec"+ specification)
                var pquality = $('#pquality').val();
                var sub_category = $('#sub_category').val();
                var subcatid = id;
                var catspecification = $('#specification').val();
                // addSpecification(specification , tag , pquality, sub_category, subcatid);
                var str_array = catspecification.split(',');
                for (var i = 0; i < str_array.length; i++) {
                    var td = specification.includes(str_array[i]); 
                    if (td == true) {
                        console.log('#spec' + str_array[i] + tag)
                        $('#spec' + str_array[i] + tag).css('display', '');
                    }
                    else {
                        $('#spec' + str_array[i] + tag).css('display', 'none');
                    }
                }
                // let text = "Hello world, welcome to the universe.";
                // let result = text.includes("world");

            }
        }
    })
}

$(document).on("click", ".append-productspecification", function (e) {
    var tag = $('.append-productspecification').attr('tag');
    var specification = $('#specification').val();
    var pquality = $('#pquality').val();
    var sub_category = $('#sub_category').val();
    var subcatid = $('#subcatid').val();
    if (specification != '') {
        addSpecification(specification, tag, pquality, sub_category, subcatid);
    }
});

$(document).on("click", ".cancel-productspecification", function (e) {

    var tag = $(this).attr('tag');

    $('.product' + tag).remove();

    var deckle = $('#deckle').val();
    if (deckle == 1) {
        $('.productsizelist' + tag).remove();
    }
});

$(document).on("submit", "#add_list_form", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    $('.sublist').attr("disabled", "true");
    console.log(new FormData(this));
    $.ajax({
        type: "POST",
        url: base_url + "submit-list",
        data: new FormData(this),

        success: function (jsonData) {
            // alert(jsonData);
            console.log(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) {
                if (jsonData['product_location'] != '') {
                    $('#product_location').siblings(".wizard-form-error").slideDown();
                    $('.e_product_location').html(jsonData['product_location']);
                }
                else {
                    $('#product_location').siblings(".wizard-form-error").slideUp();
                    $('.e_product_location').html('');
                }

                if (jsonData['pterm'] != '') {
                    $('#pterm').siblings(".wizard-form-error").slideDown();
                    $('.e_pterm').html(jsonData['pterm']);
                }
                else {
                    $('#pterm').siblings(".wizard-form-error").slideUp();
                    $('.e_pterm').html('');
                }

                if (jsonData['ddays'] != '') {
                    $('#ddays').siblings(".wizard-form-error").slideDown();
                    $('.e_ddays').html(jsonData['ddays']);
                }
                else {
                    $('#ddays').siblings(".wizard-form-error").slideUp();
                    $('.e_ddays').html('');
                }

            }
            else {
                if (jsonData['success'] == 'true') {


                    $('#add_list_form').trigger('reset');
                    swal("Success", jsonData['message'], "success");
                    $('.e_product_id').html('');
                    $('.e_waste_product_type').html('');
                    $('.e_product_quality').html('');
                    $('.e_qty').html('');
                    $('.e_buying_rate').html('');
                    $('.e_product_location').html('');
                    $('.e_pterm').html('');
                    $('.e_ddays').html('');
                    var id = jsonData['id'];
                    var newUrl = base_url + "view-list/" + id;
                    changeURL(newUrl, "Paper View List ");
                    getViewList(id);
                }


            }
            $('.sublist').attr("disabled", false);
        },
        cache: false,
        contentType: false,
        processData: false
    });
});


$(document).on("submit", "#submit_response_form", function (e) {

    e.preventDefault();
    e.stopImmediatePropagation();
    console.log('run');
    let formresponse = new FormData(this);
    let vid = $("#lt_id").attr('lt_id');
    // alert(vid);
    let size = `size${vid}`;
    let sizevalue =document.getElementById(size).value;
    // let sizevalue="X";
    
    // console.log(sizevalue)
    $.ajax({
        type: "POST", 
        url: base_url + "check-upload-list/"+vid,
        data:{}, 
        success: function (jsonData1) {  
          
            var jsonData2 = JSON.parse(jsonData1); 
            // alert("data : "+jsonData2);
            if (jsonData2 == 0 ) {
                if (sizevalue.trim() =="X") {
                    alert("please Upload size list");
                    
                }
            } else {
                 $.ajax({
            type: "POST", 
            url: base_url + "submit-response",
            data: formresponse, 
            success: function (jsonData) {  
              
                var jsonData = JSON.parse(jsonData); 
                if (jsonData['success'] == 'true') { 
                    $('#submit_response_form').trigger('reset');
                    swal("Success", jsonData['message'], "success");
                    $('.responsedata').html('<div class="table-responsive"><table class="table shadow-hover"><tbody><tr> <td> <p class="text-black mb-1 font-w600">Quantity </p></td> <td> <p class="text-black mb-1 font-w600">Rate</p> </td><td> <p class="text-black mb-1 font-w600">Description</p> </td><td> <p class="text-black mb-1 font-w600">Status</p> </td><td> <p class="text-black mb-1 font-w600">Action</p> </td></tr> <tr> <td> ' + jsonData['quantity'] + ' </td> <td>  ' + jsonData['rate'] + '  </td> <td>  ' + jsonData['description'] + '  </td>  <td> Pending  </td><td>  <a class="viewList" href="javascript:void(0)" tag="' + jsonData['id'] + '"><span class="badge light badge-warning badge-text-size"><i class="fa fa-times"></i></span></a><?php }?></td>   </tr> </tbody> </table> </div>');
    
                    location.reload();
    
                }
    
                if (jsonData['success'] == 'false') {
    
    
                    swal("Error", jsonData['message'], "error");
    
                }
    
    
    
            },
            cache: false,
            contentType: false,
            processData: false
        });
            }
             
        }
    });
    // if(sizevalue.trim() =="X" || sizevalue.trim()=="x"){
        // console.log("X is vlaue")
        // 

    // }else{

        // $.ajax({
        //     type: "POST", 
        //     url: base_url + "submit-response",
        //     data: new FormData(this), 
        //     success: function (jsonData) {  
              
        //         var jsonData = JSON.parse(jsonData); 
        //         if (jsonData['success'] == 'true') { 
        //             $('#submit_response_form').trigger('reset');
        //             swal("Success", jsonData['message'], "success");
        //             $('.responsedata').html('<div class="table-responsive"><table class="table shadow-hover"><tbody><tr> <td> <p class="text-black mb-1 font-w600">Quantity </p></td> <td> <p class="text-black mb-1 font-w600">Rate</p> </td><td> <p class="text-black mb-1 font-w600">Description</p> </td><td> <p class="text-black mb-1 font-w600">Status</p> </td><td> <p class="text-black mb-1 font-w600">Action</p> </td></tr> <tr> <td> ' + jsonData['quantity'] + ' </td> <td>  ' + jsonData['rate'] + '  </td> <td>  ' + jsonData['description'] + '  </td>  <td> Pending  </td><td>  <a class="viewList" href="javascript:void(0)" tag="' + jsonData['id'] + '"><span class="badge light badge-warning badge-text-size"><i class="fa fa-times"></i></span></a><?php }?></td>   </tr> </tbody> </table> </div>');
    
        //             location.reload();
    
        //         }
    
        //         if (jsonData['success'] == 'false') {
    
    
        //             swal("Error", jsonData['message'], "error");
    
        //         }
    
    
    
        //     },
        //     cache: false,
        //     contentType: false,
        //     proceef    essData: false
        // });

    // }
        
   
   
});



$(document).on('click', '.addResponse', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    swal({
        title: "Are You Sure !!",
        text: "You want to Add this in Response !!",
        type: "info",
        showCancelButton: !0,
        closeOnConfirm: !1,
        showLoaderOnConfirm: !0
    }).then((result) => {
        if (result.value) {
            var id = $(this).attr('tag');

            $.ajax({
                url: base_url + 'add-response',
                type: 'POST',
                data: { id: id },
                success: function (data) {

                    var data = JSON.parse(data);
                    if (data['success'] == 'true') {

                        swal("Success", data['message'], "success");

                    }
                    else {
                        swal("Success", data['message'], "error");
                    }
                }
            });
        }


    })

});


$(document).on('click', '.approveList', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    swal({
        title: "Are You Sure !!",
        text: "You want to Approve this list Request !!",
        type: "info",
        showCancelButton: !0,
        closeOnConfirm: !1,
        showLoaderOnConfirm: !0
    }).then((result) => {
        if (result.value) {
            var id = $(this).attr('tag');

            $.ajax({
                url: base_url + 'approve-list',
                type: 'POST',
                data: { id: id },
                success: function (data) {
                    //alert(data);
                    var data = JSON.parse(data);
                    if (data['success'] == 'true') {

                        swal("Success", data['message'], "success");
                        $('.statusList').html('<a  href="javascript:void(0)" ><span class="badge light badge-success badge-text-size">Approved</span></a>');
                    }
                    else {
                        swal("Success", data['message'], "error");
                    }
                }
            });
        }


    })

});

$(document).on('click', '.disapproveList', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    swal({
        title: "Are You Sure !!",
        text: "You want to Reject this Response Request  !!",
        type: "info",
        showCancelButton: !0,
        closeOnConfirm: !1,
        showLoaderOnConfirm: !0
    }).then((result) => {
        if (result.value) {
            var id = $(this).attr('tag');

            $.ajax({
                url: base_url + 'reject-response',
                type: 'POST',
                data: { id: id },
                success: function (data) {

                    var data = JSON.parse(data);
                    if (data['success'] == 'true') {

                        swal("Success", data['message'], "success");
                        $('.statusList' + id).html('<a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a>');
                    }
                    else {
                        swal("Success", data['message'], "error");
                    }
                }
            });
        }


    })

});

// ===========================================
$(document).on('click', '.counteroffer', function (e) {

    var id = $(this).attr('tag');
    var cid = $(this).attr('counter');

    $.ajax({
        type: "POST",
        url: base_url + "get-counteroffer",
        data: { id: id, cid: cid },

        success: function (jsonData) {

            var jsonData = JSON.parse(jsonData);

            if (jsonData['success'] == 'true') {
                var specification = jsonData.specification;
                list = jsonData.list;
                counterdata = '';
                counterdata += '<table style="width:100%" class="  tabledata size-6" style=" max-width: 900px; overflow-x: auto;"><thead>';
                var str_array = specification.split(',');

                for (var i = 0; i < str_array.length; i++) {

                    var data = str_array[i];
                    if (data == 'quantity_type') { }
                    else if (data == 'product_form') { }
                    else if (data == 'rate') { counterdata += '<th class="labeltext font-w600"> Original price</th>'; }
                    else { counterdata += '<th class="labeltext font-w600">' + str_array[i].replace(/_/g, " ") + '</th>'; }
                }
                counterdata += '<th >Request Qty</th>';
                counterdata += '<th > Request Rate</th>';
                counterdata += '<th >Counter Qty</th>';
                // counterdata += '<th style="width:10px"></th>';
                counterdata += '<th > Counter Rate</th>';
                for (ii in list) { 
                    if (list[ii].response_counter_status==1) {
                        counterdata += '<th > Response  Rate</th>';
                        counterdata += '<th > Response Qty</th>';
                    }
                }
                
                counterdata += '</thead><tbody>';
                for (ii in list) { 
                    counterdata += '<tr>';
                    var str_array = specification.split(',');

                    for (var i = 0; i < str_array.length; i++) {
                        var data = str_array[i];
                        console.log(data);
                        if (data == 'quantity_type') { }
                        else if (data == 'product_form') { }
                       
                        else if (data == 'sub_category') { counterdata += '<td >' + list[ii]['cname'] + '</td>'; }
                        else if (data == 'brand_name') { counterdata += '<td >' + list[ii]['bname'] + '</td>'; }
                        else { counterdata += '<td >' + list[ii][data] + '</td>'; }
                    }
                    counterdata += '<td > ' + list[ii].rqty + '</td>';
                   
                    counterdata += '<td > <input type="hidden" class="form-control" name="rrate[]" value="' + list[ii].rrate + '"> ' + list[ii].rrate + '</td>';
                    counterdata += '<input type="hidden" value="' + list[ii].id + '" name="rsid[] " >';
                    if (list[ii].cqty) { counterdata += '<td > ' + list[ii].cqty + '</td>' ;  } else { counterdata += '<td > <input type="text" class="form-control" name="cqty[]" >'; }
                    if (list[ii].crate) { counterdata += '<td > ' + list[ii].crate + '</td>'; } else { counterdata += '<td > <input type="text" class="form-control"  name="crate[]" required> </td></td>'; }
                    if (list[ii].response_counter_status==1) {
                        if (list[ii].response_cqty) { counterdata += '<td > ' + list[ii].response_cqty + '</td>'; } else { counterdata += '<td > <input type="text" class="form-control"  name="response_cqty[]" required> </td></td>'; }
                    if (list[ii].response_crate) { counterdata += '<td > ' + list[ii].response_crate + '</td>'; } else { counterdata += '<td > <input type="text" class="form-control"  name="response_crate[]" required> </td></td>'; }
                    }
                   

                    counterdata += '</tr>';
                }
                counterdata += '</tbody></table>';

                $('.counterdata').html(counterdata);

                if (list[ii].cqty) {

                    $('.counterfooter').css('display', 'none');
                }
                else { $('.counterfooter').css('display', ''); }





            }
        },

    });

    $('#responseid').val(id);
    $('#counterofferModal').modal('show');

});



$(document).on("submit", "#add_counteroffer_form", function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();

    $.ajax({
        type: "POST",
        url: base_url + "submit-counteroffer",
        data: new FormData(this),

        success: function (jsonData) {
            console.log(jsonData)

            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) {
                if (jsonData['success'] == 'true') {

                    $('#add_counteroffer_form').trigger('reset');
                    swal("Success", jsonData['message'], "success");
                    $('.close').trigger('click');
                }

                if (jsonData['success'] == 'false') {


                    swal("Error", jsonData['message'], "error");

                }


                // if (jsonData['quantity'] !='') 
                // {

                //    $('.e_quantity').html(jsonData['quantity']);
                // }
                // else
                // {

                //    $('.e_quantity').html('');
                // }
                // if (jsonData['delivery_type'] !='')  { $('.e_delivery_type').html(jsonData['delivery_type']); }
                // else { $('.e_delivery_type').html(''); }


                // if (jsonData['buying_rate'] !='')  { $('.e_buying_rate').html(jsonData['buying_rate']);   }
                // else  { $('.e_buying_rate').html(''); }


            }
            else {
                if (jsonData['success'] == 'true') {

                    $('#add_counteroffer_form').trigger('reset');
                    swal("Success", jsonData['message'], "success");
                    $('.close').trigger('click');
                }

                if (jsonData['success'] == 'false') {


                    swal("Error", jsonData['message'], "error");

                }


            }
            location.reload();

        },
        cache: false,
        contentType: false,
        processData: false
    });
});


$(document).on('click', '.approvecounteroffer', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    swal({
        title: "Are You Sure !!",
        text: "You want to Approve this Counter Response !!",
        type: "info",
        showCancelButton: !0,
        closeOnConfirm: !1,
        showLoaderOnConfirm: !0
    }).then((result) => {
        if (result.value) {
            var id = $(this).attr('tag');

            $.ajax({
                url: base_url + 'approve-counteroffer',
                type: 'POST',
                data: { id: id },
                success: function (data) {
                    //alert(data);
                    var data = JSON.parse(data);
                    if (data['success'] == 'true') {

                        swal("Success", data['message'], "success");
                        $('.active-status').html('<a  href="javascript:void(0)" ><span class="badge light badge-success badge-text-size">Accepted</span></a>');
                            location.reload();
                    }
                    else {
                        swal("Success", data['message'], "error");
                    }
                }
            });
        }


    })

});

$(document).on('click', '.cancelcounteroffer', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    swal({
        title: "Are You Sure !!",
        text: "You want to Reject this Counter Response !!",
        type: "info",
        showCancelButton: !0,
        closeOnConfirm: !1,
        showLoaderOnConfirm: !0
    }).then((result) => {
        if (result.value) {
            var id = $(this).attr('tag');

            $.ajax({
                url: base_url + 'reject-counteroffer',
                type: 'POST',
                data: { id: id },
                success: function (data) {
                    //alert(data);
                    var data = JSON.parse(data);
                    if (data['success'] == 'true') {

                        swal("Success", data['message'], "success");
                        $('.active-status').html('<a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a>');
                    }
                    else {
                        swal("Success", data['message'], "error");
                    }
                }
            });
        }


    })

});


$(document).on('click', '.cancelListResponse', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    swal({
        title: "Are You Sure !!",
        text: "You want to cancel  the list Response Sent !!",
        type: "info",
        showCancelButton: !0,
        closeOnConfirm: !1,
        showLoaderOnConfirm: !0
    }).then((result) => {
        if (result.value) {
            var id = $(this).attr('tag');

            $.ajax({
                url: base_url + 'cancel-listresponse',
                type: 'POST',
                data: { id: id },
                success: function (data) {
                    //alert(data);
                    var data = JSON.parse(data);
                    if (data['success'] == 'true') {

                        swal("Success", data['message'], "success");
                        $('.active-status-response').html('<a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Cancelled</span></a>');
                    }
                    else {
                        swal("Success", data['message'], "error");
                    }
                }
            });
        }


    })

});

function getResponseSpecification(rid = '') {
    $.post(base_url + 'get-responsespecification', { rid: rid }, function (data) {
        if (data) {

            arr = JSON.parse(data);
            cdata = '';
            if (arr.success == true) {
                var specification = arr.specification;
                list = arr.list;
                cdata += '<tr>';
                var str_array = specification.split(',');
                var strlen = str_array.length;

                $('#desc' + rid).attr('colspan', strlen - 2);
                for (var i = 0; i < str_array.length; i++) {
                    var data = str_array[i];
                    if (data == 'quantity_type') { }
                    else if (data == 'product_form') { }
                    else if (data == 'rate') { }
                    else { cdata += '<th class="labeltext font-w600">' + str_array[i].replace(/_/g, " ") + '</th>'; }
                }

                cdata += '<th > Final Quantity</th>'; 
                cdata += '<th > Final Rate</th>'; 
                cdata += '</tr>';
                for (ii in list) {
                    cdata += '<tr>';
                    var str_array = specification.split(',');
                    for (var i = 0; i < str_array.length; i++) {
                        var data = str_array[i];
                        if (data == 'quantity_type') { }
                        else if (data == 'product_form') { }
                        else if (data == 'rate') { }
                        else if (data == 'sub_category') { cdata += '<td >' + list[ii]['cname'] + '</td>'; }

                        else if (data == 'brand_name') { cdata += '<td >' + list[ii]['bname'] + '</td>'; }
                        else { cdata += '<td >' + list[ii][data] + '</td>'; }
                    }

                    cdata += '<td > ' + list[ii].rqty + '</td>'; 
                    cdata += '<td > ' + list[ii].rrate + '</td>'; 
                    cdata += '</tr>';
                }

            }
            $('.specification' + rid).html(cdata);

        }
    })
}

$(document).on('click', '.view-specdetail', function (e) {
    var id = $(this).attr('tag');
    //$('.specification'+id).css('display','');
    if ($('.specification' + id).css('display') === 'none') {

        $('.specification' + id).css('display', 'contents');
    } else if ($('.specification' + id).css('display') === 'contents') {

        $('.specification' + id).css('display', 'none');
    }

});

function getResponsedata(rid = '') {
    $.post(base_url + 'get-responsedata', { rid: rid }, function (data) {
        if (data) {
            arr = JSON.parse(data); 
            let papercat = arr.id.category;
            cdata = '<td></td><td >Response </td>';
            if (arr.success == true) {
                var specification = arr.specification;
                var required = arr['id'].required;
                var cat = $("#catname").val();
                var userType = $("#userType").val();
                console.log("user type id : "+ cat);
                listspecdata = arr.listspecdata;
                var str_array = specification.split(',');
                var req_array = required.split(',');
                for (var i = 0; i < str_array.length; i++) {
                    var data = str_array[i]; 
                    req = '';
                    if(req_array.includes(data)){
                        req = 'required';
                    }

                    if (data == 'sub_category') { cdata += '<td >' + listspecdata['product_category'] + ' <input type="hidden" value="' + listspecdata[data] + '" name="' + data + '[]"></td>'; }
                    // else if(data == 'quantity_uom'){cdata+= '<td >'+listspecdata[data]+'</td>'; }
                    // else if(data == 'size_uom'){cdata+= '<td >'+listspecdata[data]+'</td>'; }
                    else if (data == 'quantity_uom') {
                        if (listspecdata[data] == 0 || listspecdata[data] == '') {
                            cdata += '<td >  <select  class="form-control seleinput " id="' + data + listspecdata['id'] + '" name="' + data + '[]" '+req+'>  <option value="">Choose..</option>  <option value="Kg">Kg</option><option value="MT">MT</option><option value="Reams">Reams</option><option value="Reels">Reels</option></select></td>';
                        }
                        else {
                            cdata += ' <input type="hidden" value="' + listspecdata[data] + '" name="' + data + '[]">';
                        }
                    }
                    else if (data == 'size_uom') {
                        if(papercat == 9){
                            cdata +='<td></td>';
                        }else{
                            if (listspecdata[data] == 0 || listspecdata[data] == '') {
                                cdata += '<td >  <select  class="form-control seleinput " id="' + data + listspecdata['id'] + '" name="' + data + '[]" '+req+' >  <option value="">Choose..</option> <option value="inch">inch</option><option value="cm">cm</option></select></td>';
                            }
                            else {
                                cdata += '<td >' + listspecdata[data] + ' <input type="hidden" value="' + listspecdata[data] + '" name="' + data + '[]"></td>';
                            }
                        }
                        
                    }
                    else if (str_array[i] == 'size') {
                        if(papercat == 9){
                            cdata +='<td id="lt_id" lt_id="'+listspecdata['id']+'"> <select  class="form-control seleinput " name="' + data + '[]" id="' + data + listspecdata['id'] + '" >  <option value="">Choose..</option> <option value="a3">A3</option><option value="a4">A4</option><option value="a5">A5</option></select></td>';
                        }else{
                            cdata += '<td id="lt_id" lt_id="'+listspecdata['id']+'"> <input type="text" class="form-control '+req+'" name="' + data + '[]" id="' + data + listspecdata['id'] + '" value="' + listspecdata[data] + '" placeholder="' + data.replace(/_/g, " ") + '" ></td>';

                        } 
                    }
                    else if (str_array[i] == 'packing_per_ream') {
                        if(papercat == 9){
                            cdata +='<td> <select  class="form-control seleinput " name="' + data + '[]" id="' + data + listspecdata['id'] + '" >  <option value="">Choose..</option> <option value="100">100</option><option value="250">250</option><option value="500">500</option></select></td>';
                        }else{
                            cdata += '<td > <input type="text" class="form-control" name="' + data + '[]" id="' + data + listspecdata['id'] + '" value="' + listspecdata[data] + '" placeholder="' + data.replace(/_/g, " ") + '"></td>';

                        } 
                    }
                    
                    else if (data == 'quantity_type') {
                        cdata += '<td ><div class="field drop-select mt-3">  <select  class="form-control seleinput  qty" id="' + data + listspecdata['id'] + '" name="' + data + '[]" >  <option value="1" ';
                        if (listspecdata[data] == '1') { cdata += 'selected'; }else{cdata+="disabled"}
                        cdata += '>Godown</option><option value="2" ';
                        if (listspecdata[data] == '2') { cdata += 'selected'; }else{cdata+="disabled"}
                        cdata += '>Truck Load</option><option value="3" ';
                        if (listspecdata[data] == '3') { cdata += 'selected'; }else{cdata+="disabled"}
                        cdata += '>Part Load</option><option value="0" ';
                        if (listspecdata[data] == '0') { cdata += 'selected'; }else{cdata+="disabled"}
                        cdata += '>NA</option></select> </div> </td>';
                    }
                    else if(data == 'quantity')
                    {
                         
                        cdata += '<td  class="quantity_s"> <input type="text" class="form-control '+req+'" name="' + data + '[]" id="' + data + listspecdata['id'] + '" value="' + listspecdata[data] + '" placeholder="' + data.replace(/_/g, " ") + '" ></td>';
                       
                    }
                    // else if(data == 'quantity_uom' )
                    // {}
                    else if( data == 'min_quantity_uom')
                    { }
                    else if( data == 'product_form')
                    { }
                    else if( data == 'mill_name')
                    {cdata += '<td > <input type="text" class="form-control" name="' + data + '[]" id="' + data + listspecdata['id'] + '" value="' + listspecdata[data] + '" placeholder="' + data.replace(/_/g, " ") + '" readonly></td>'; }

                    else if (data == 'product_form') {
                        cdata += '<td ><div class="field drop-select mt-3">  <select  class="form-control seleinput" id="' + data + listspecdata['id'] + '" name="' + data + '[]" '+req+'>  <option value="">Choose..</option> <option value="0" ';
                        if (listspecdata[data] == '0') { cdata += 'selected'; }
                        cdata += '>Loose</option><option value="1" ';
                        if (listspecdata[data] == '1') { cdata += 'selected'; }
                        cdata += '>Compressed</option></select> </div> </td>';
                    }

                    else if (data == 'rate') {
                        cdata += '<td > <input type="text" class="form-control" name="' + data + '[]" id="' + data + listspecdata['id'] + '" value="' + listspecdata[data] + '" placeholder="' + data.replace(/_/g, " ") + '"></td>';
                    }
                    else if (data == 'brand_name') {
                        cdata += '<td ><div class="form-group mb-0  col-md-12 mt-3 " ><div class="field drop-select">  <select   class=" ' + str_array[i] + ' form-control seleinput" id="' + data + listspecdata['id'] + '" tag="' + listspecdata['id'] + '"  name="' + str_array[i] + '[]" '+req+'> <option value="" >Choose..</option> ';

                        br = arr.list;
                        for (ii1 in br) {
                            cdata += '<option value="' + br[ii1].id + '" ';
                            if (br[ii1].id == listspecdata[data]) {

                                cdata += 'selected ';
                            }
                            cdata += '>' + br[ii1].product_name + '</option>';
                        }
                        cdata += '</select></div></div></td >';
                    }
                    else if (data == 'pulp') {
                        cdata += '<td ><div class="form-group mb-0  col-md-12 mt-3" ><div class="field drop-select">  <select  class="form-control seleinput" id="' + data + listspecdata['id'] + '" name="' + data + '[]" >  <option value="">Choose..</option> <option value="Virgin">Virgin</option><option value="Agro">Agro</option><option value="Recycle">Recycle</option><option value="Any">Any</option></select>   </div></div></td >';

                    }
                    else if (data == 'color') {
                        cdata += '<td ><div class="form-group mb-0  col-md-12 mt-3" ><div class="field drop-select">  <select  class="form-control seleinput" id="' + data + listspecdata['id'] + '" name="' + data + '[]" > <option value="">Choose..</option>  <option value="White">Brown</option><option value="Brown">Non-Brown</option></select>   </div></div></td >';
                    }
                    else if (data == 'shade') {
                        cdata += '<td ><div class="form-group mb-0  col-md-12 mt-3" ><div class="field drop-select">  <select  class="form-control seleinput" id="' + data + listspecdata['id'] + '" tag="' + listspecdata['id'] + '" name="' + data + '[]" > <option value="">Choose..</option>  <option value="White">White</option><option value="Offwhite">Offwhite</option><option value="NS">NS</option><option value="GY">GY</option></select>   </div></div></td >';
                    }
                    
                    else { 
                        cdata += '<td > <input type="text" class="form-control" name="' + data + '[]" id="' + data + listspecdata['id'] + '" value="' + listspecdata[data] + '" placeholder="' + data.replace(/_/g, " ") + '"></td>';
                     }
                }
                // cdata+= '<td > <input type="number" class="form-control" name="cashrate[]" id="cashrate'+listspecdata['id']+'" value="'+listspecdata['cashrate']+'" placeholder="Rate" min="1" step=".01"> </td><td > <input type="number" class="form-control" name="creditrate[]" id="creditrate'+listspecdata['id']+'" value="'+listspecdata['creditrate']+'" placeholder="Rate" min="1" step=".01">  <input type="hidden" value="'+listspecdata['id']+'" name="specification_id[]"></td>';


                if (cat == 'Waste Paper') {
                    // cdata +='<td ><select  class="form-control seleinput rateuomchange" id="rate_uom'+listspecdata['id']+'" name="rate_uom[]"  ><option value="Normal Rate" Selected>Normal Rate</option></select> </td><td > <input type="text" class="form-control " placeholder="Rate" id="rate'+listspecdata['id']+'" name="rate[]"  > <input type="hidden" value="'+listspecdata['id']+'" name="specification_id[]"></td>';
                    cdata += '<td class="tst2"><select  class="form-control seleinput rateuomchange" id="rate_uom' + listspecdata['id'] + '" name="rate_uom[]"  ><option value="Normal Rate" Selected>Normal Rate</option></select> </td>';
                    cdata += '<td > <input type="text" class="form-control " placeholder="Rate" id="rate' + listspecdata['id'] + '" name="rate[]"  > <input type="hidden" value="' + listspecdata['id'] + '" name="specification_id[]"></td>';
                }
                else {
                    cdata += '  <td class="tst1"> <input type="test" class="form-control " value="' + listspecdata['creditrate'] + '" id="creditrate' + listspecdata['id'] + '" name="creditrate[]"   ></td>  <input type="hidden" value="' + listspecdata['id'] + '" name="specification_id[]"></td >';
                    if (userType==3) {
                        cdata += '<td class="tst1"> <input type="test" class="form-control " placeholder="freight rate" id="freight_rate' + listspecdata['id'] + '" name="freight_rate[]"   > </td >'; 
                    }
                }



            }
            $('.resinput' + rid).html(cdata);
            $('.dataclub' + rid).html(cdata);
            for (var i = 0; i < str_array.length; i++) {
                if (str_array[i] == 'rate') {
                    if (cat == 'Waste Paper') { $('#' + str_array[i] + listspecdata['id']).val(listspecdata[str_array[i]]); }
                    else { $('#' + str_array[i] + listspecdata['id']).val(listspecdata['cashrate']); } // cash price
                }
                else {
                    $('#' + str_array[i] + listspecdata['id']).val(listspecdata[str_array[i]]);
                }
            }
            $('#pulp' + listspecdata['id']).val(listspecdata['pulp']);
            $('#color' + listspecdata['id']).val(listspecdata['color']);
            $('#shade' + listspecdata['id']).val(listspecdata['shade']);
            getresponsivesadedd(listspecdata['color'], listspecdata['id'], listspecdata['shade']);
        }
    })
}

$(document).on('change', '.checked_item', function(){
    tag = $(this).attr("tag") || '';
    if($(this).is(":checked"))
    { 
        $('.resinput'+tag+' .required').attr("required", "required")
    }
    else
    {
        $('.resinput'+tag+' .required').removeAttr("required")
    }
})

$(document).on('change', '.color', function (e) {
    var id = $(this).attr('tag');
    var value = $(this).val();
    //$('.specification'+id).css('display','');
    getresponsivesadedd(value, id, 0);


});

function getresponsivesadedd(value = '', id = '', shade = '') {
    if (value == 'White') {

        $('#shade' + id).html('<option value="White">White</option><option value="OffWhite">OffWhite</option><option value="Pink">Pink</option><option value="Yellow">Yellow</option><option value="Blue">Blue</option><option value="Green">Green</option>');
    } else if (value == 'Brown') {

        $('#shade' + id).html('<option value="NS">NS</option><option value="GY">GY</option>');
    }
    else {
        $('#shade' + id).html('<option value="White">White</option><option value="OffWhite">OffWhite</option><option value="NS">NS</option><option value="GY">GY</option>');
    }
    if (shade != 0) {
        $('#shade' + id).val(shade);
    }
}

$(document).on('change', '#rates_offered', function (e) {

    var value = $(this).val();
    if (value == 'Ex-mill') {
        $("#deert").attr("selected", false);
        $("#millt").attr("selected", true);
        $("#zetot").addClass("d-none");
        $("#millt").removeClass("d-none");
        $("#deert").addClass("d-none");
    } else if (value == 'Ex-Godown') {
        // $("#zetot").attr("selected", true);
        $("#zetot").removeClass("d-none");
        $("#millt").addClass("d-none");
        $("#deert").addClass("d-none");
    }else if (value == 'FOR') {
        $("#zetot").attr("selected", false);
        $("#deert").attr("selected", true);
        $("#deert").removeClass("d-none");
        $("#zetot").addClass("d-none");
        $("#millt").addClass("d-none");
    }else{
        $("#zetot").addClass("d-none");
        $("#millt").addClass("d-none");
        $("#deert").addClass("d-none");
    }

});

function getResponsedatadiv(rid = '') {
    $.post(base_url + 'get-responsedata', { rid: rid }, function (data) {
        if (data) {
            arr = JSON.parse(data);
            listspecdata = arr.listspecdata;
            if (arr.quality) { var pquality = JSON.stringify(arr.quality); }
            if (arr.sub_category) { var sub_category = JSON.stringify(arr.sub_category); }
            if (arr.brand) { var brand = JSON.stringify(arr.brand); }
            if (arr.listspecdata) { var listspecdata = JSON.stringify(arr.listspecdata); }

            var specification = arr.specification;
            $(' #specification').val(specification);
            listspecdata = arr.listspecdata;
            if (specification != '') {

                responsespecification(specification, listspecdata['id'], pquality, sub_category, listspecdata['sub_category'], listspecdata, brand);

            }
        }
    });
}


function responsespecification(specification = '', tag = '', pquality = '', sub_category = '', subcatid = '', listspecdata = '', brand = '',) {
    var str_array = specification.split(',');
    var otherdata = '';
    var sizedropdown = '';
    var quantitydropdown = '';
    var post_type = $('#post_type').val();
    var dtype = $('#dtype').val();
    var utype = $('#utype').val();
    var cat = $("#catname").val();


    otherdata += '<div class="from-section product' + tag + '"> <div class="from-header">  <h6 class="from-heading">Response Data</h6> </div> <div class=" size-4"> <div class="form-row">  <input type="hidden" value="' + listspecdata['id'] + '" name="specification_id[]"> ';

    for (var i = 0; i < str_array.length; i++) {
        str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
        console.log(str_array[i]);
        if (str_array[i] == 'quantity_uom') { }
        else if (str_array[i] == 'quantity') {
            if (cat == 'Packaging Board' || cat == 'Coated Papers/boards') {
                quantitydropdown = '<div class="form-group mb-0  col-md-5 mt-3   " id="specquantity_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="quantity_uom' + tag + '" name="quantity_uom[]"  > <option value="">Choose..</option> <option value="Kg">Kg</option><option value="MT">MT</option><option value="Packets">Packets</option><option value="Reels">Reels</option></select>   </div></div>'
            }
            else { quantitydropdown = '<div class="form-group mb-0  col-md-5 mt-3 " id="specquantity_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="quantity_uom' + tag + '" name="quantity_uom[]"  > <option value="">Choose..</option>  <option value="Kg">Kg</option><option value="MT">MT</option><option value="Reams">Reams</option><option value="Reels">Reels</option></select>   </div></div>' }

            otherdata += '<div class="form-group mb-0  col-md-3 " id="spec' + str_array[i] + tag + '"><div class="form-row"><div class="form-group mb-0  col-md-7 quantity_size" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>' + quantitydropdown + '</div></div>';

        }
      
       
        else if (str_array[i] == 'quality') {

            otherdata += '<div class="form-group mb-0  col-md-3 " id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option> ';



            if (pquality) {
                arr = JSON.parse(pquality);
                for (ii in arr) {
                    otherdata += '<option value="' + arr[ii].product_quality + '" >' + arr[ii].product_quality + '</option>';
                }
            }
            otherdata += '</select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'sub_category') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class=" responsivespec form-control seleinput" id="' + str_array[i] + tag + '" tag="' + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option> ';
            if (sub_category) {
                arr1 = JSON.parse(sub_category);

                for (ii1 in arr1) {
                    otherdata += '<option value="' + arr1[ii1].id + '" ';

                    // if(arr1[ii1].id == subcatid){
                    // otherdata+= 'selected';     
                    // }

                    otherdata += '>' + arr1[ii1].product_category + '</option>';
                }
            }

            otherdata += '</select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext ">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'brand_name') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  tag="' + tag + '" class="' + str_array[i] + ' form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option> ';

            if (brand) {
                // br = brand;
                br = JSON.parse(brand);

                for (ii1 in br) {
                    otherdata += '<option value="' + br[ii1].id + '" ';
                    // if(br[ii1].id == pid && tag==1){
                    // otherdata+= ' selected';     
                    // }
                    otherdata += '>' + br[ii1].product_name + '</option>';
                }
            }

            otherdata += '</select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext ">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }

        else if (str_array[i] == 'size_uom') {

        }
        else if (str_array[i] == 'size') {

            if (cat == 'Photocopier Paper') {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="form-row"><div class="form-group mb-0  col-md-12" id="specsize_uom' + tag + '"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom' + tag + '" name="size_uom[]" >  <option value="">Choose..</option>  <option value="A3">A3</option><option value="A4">A4</option><option value="A5">A5</option></select>  <label  for="size_uom' + tag + '" class="labeltext">Size</label></div></div></div></div>';

            }
            else if (cat == 'Kraft Paper') {
                // otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="form-row"><div class="form-group mb-0  col-md-8" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" value="'+listspecdata['size_length']+'" id="size_length'+tag+'" name="size_length[]"  > <label  for="size_length'+tag+'" class="labeltext">Size</label>  </div> </div><div class="form-group mb-0  col-md-4 mt-3" id="specsize_uom'+tag+'"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom'+tag+'" name="size_uom[]" >  <option value="">Choose..</option> <option value="inch">inch</option><option value="cm">cm</option></select>  </div></div></div></div>'; 

            }
            else {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="form-row"><div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="size_length' + tag + '" name="size_length[]"  value="' + listspecdata['size_length'] + '"> <label  for="size_length' + tag + '" class="labeltext">Length</label>  </div> </div><div class="form-group mb-0  col-md-2 mt-4"><div class="field "> X  </div> </div><div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field"> <input type="text" class=" " placeholder="' + str_array[i] + '" id="size_width' + tag + '" name="size_width[]" value="' + listspecdata['size_width'] + '" > <label for="size_width' + tag + '" class="labeltext">width</label> </div>   </div><div class="form-group mb-0  col-md-4 mt-3" id="specsize_uom' + tag + '"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom' + tag + '" name="size_uom[]" >  <option value="">Choose..</option> <option value="inch">inch</option><option value="cm">cm</option></select>  </div></div></div></div>';

            }
        }


        else if (str_array[i] == 'product_form') {
            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="0">Loose</option><option value="1">Compressed</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'quantity_type') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput qty1" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="1">Godown</option><option value="2">Truck Load</option><option value="3">Part Load</option><option value="0">NA</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';

        }
        else if (str_array[i] == 'pulp') {


            if (cat == 'Speciality  papers') {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="Virgin">Virgin</option><option value="Recycle">Recycle</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
            else { otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="Virgin">Virgin</option><option value="Agro">Agro</option><option value="Recycle">Recycle</option><option value="Any">Any</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>'; }


        }
        else if (str_array[i] == 'color') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput ' + str_array[i] + '" tag="' + tag + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option>  <option value="White">Brown</option><option value="Brown">Non-Brown</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'type') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option>  <option value="Agro based">Agro based</option><option value="Semi-Kraft">Semi-Kraft</option><option value="Kraft">Kraft</option><option value="Waste based">Waste based</option><option value="Virgin">Virgin</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'shade') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option>  <option value="White">White</option><option value="Offwhite">Offwhite</option><option value="NS">NS</option><option value="GY">GY</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'ss_nss') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option> <option value="SS">SS</option><option value="NSS">NSS</option></select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'tear') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><label for="' + str_array[i] + tag + '" class=" labeltext">' + str_array[i].replace(/_/g, " ") + '</label><div class="form-row" ><div class="form-group mb-0 col-5" ><div class="field"><input  id="' + str_array[i] + tag + '" name="tear[]"></div></div><div class="form-group mb-0 col-1" >MD</div><div class="form-group mb-0 col-5" ><div class="field"><input id="' + str_array[i] + tag + '" name="cd[]"></div></div><div class="form-group mb-0 col-1" >CD</div></div> </div>';

        }
        else if (str_array[i] == 'coating') {

            if (cat == 'Paper for food packaging') {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option>  <option value="PE">PE</option> <option value="Aqueous" >Aqueous </option> </select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
            else {

                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="">Choose..</option>  <option value="Gloss">Gloss</option><option value="Matt">Matt</option><option value="Silk">Silk</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
        }
        else if (str_array[i] == 'gsm') {

            if (cat == 'Photocopier Paper') {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" >  <option value="">Choose..</option>  <option value="70">70</option><option value="75">75</option><option value="80">80</option></select>   <label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
            else {
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
            }
        }
        else if (str_array[i] == 'packing_per_ream') {

            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field drop-select">  <select  class="form-control seleinput" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]" > <option value="100">100</option><option value="250">250</option><option value="500">500</option></select><label for="' + str_array[i] + tag + '" class="selectlabel labelup labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }
        else if (str_array[i] == 'rate') {

            if (cat == 'Waste Paper') {
                ratedropdown = '<div class="form-group mb-0  col-md-5 mt-3  " id="specrate_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput rateuomchange" id="rate_uom' + tag + '" name="rate_uom[]"  ><option value="Normal Rate" Selected>Normal Rate</option></select></div></div>';
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="form-row">' + ratedropdown + '<div class="form-group mb-0  col-md-7" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div></div></div>';
            }
            else {
                ratedropdown = '<div class="form-group mb-0  col-md-5 mt-3" id="specrate_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput rateuomchange" id="rate_uom' + tag + '" name="rate_uom[]"  > <option value="Cash Rate" ratetag="' + listspecdata['cashrate'] + '" idtag="' + tag + '">Cash Rate</option><option value="Credit Rate" Selected ratetag="' + listspecdata['creditrate'] + '" idtag="' + tag + '">Credit Rate</option></select></div></div>'
                otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="form-row">' + ratedropdown + '<div class="form-group mb-0  col-md-7" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div></div></div>';
            }


        }
      
        else {
            otherdata += '<div class="form-group mb-0  col-md-3" id="spec' + str_array[i] + tag + '"><div class="field">  <input type="text" class=" " placeholder="' + str_array[i] + '" id="' + str_array[i] + tag + '" name="' + str_array[i] + '[]"  > <label for="' + str_array[i] + tag + '" class="labeltext">' + str_array[i].replace(/_/g, " ") + '</label></div></div>';
        }



    }

    if (post_type == '2') {
        if (cat == 'Packaging Board' || cat == 'Coated Papers/boards') {
            quantitydropdown = '<div class="form-group mb-0  col-md-5 mt-3  " id="specminqty_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="minqty_uom' + tag + '" name="minqty_uom[]"  > <option value="">Choose..</option> <option value="Kg">Kg</option><option value="MT">MT</option><option value="Packets">Packets</option><option value="Reels">Reels</option></select>   </div></div>'
        }
        else { quantitydropdown = '<div class="form-group mb-0  col-md-5 mt-3" id="specminqty_uom' + tag + '"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="minqty_uom' + tag + '" name="minqty_uom[]"  > <option value="">Choose..</option>  <option value="Kg">Kg</option><option value="MT">MT</option><option value="Reams">Reams</option><option value="Reels">Reels</option></select>   </div></div>' }

        otherdata += '<div class="form-group mb-0  col-md-3" id="specmin_qty' + tag + '"><div class="form-row"><div class="form-group mb-0  col-md-7" id="specmin_qty' + tag + '"><div class="field">  <input type="text" class=" " placeholder="Minimum Quantity" id="min_qty' + tag + '" name="min_qty[]"  > <label for="min_qty' + tag + '" class="labeltext">Minimum Quantity</label></div></div>' + quantitydropdown + '</div></div>';

    }
    otherdata += '<input type="hidden" class=" " value="' + tag + '" name="rowcount[]"  > ';
    otherdata += '</div></div> </div>';


    $('.resdatadivdata').append(otherdata);
    for (var i = 0; i < str_array.length; i++) {
        if (str_array[i] == 'rate') {
            if (cat == 'Waste Paper') { $('#' + str_array[i] + tag).val(listspecdata[str_array[i]]); }
            else { $('#' + str_array[i] + tag).val(listspecdata['creditrate']); }
        }
        else {
            $('#' + str_array[i] + tag).val(listspecdata[str_array[i]]);
        }
    }
    tag++;
    $('.append-productspecification').attr('tag', tag);

}

$(document).on('change', '.rateuomchange', function (e) {
    var rate = $(".rateuomchange option:selected").attr("ratetag");
    var id = $(".rateuomchange option:selected").attr("idtag");
    $('#rate' + id).val(rate);
});

$(document).on('click', '.productSize', function () {
    var id = $(this).attr('tag');
    products = '';
    // <a  class="btn btn-danger close" data-bs-dismiss="modal"><i class="fa fa-close"></i></a>
    // $.post(base_url + "get-millspecification/" + id, { page: "view-product" }, function (data) {
    // });
    var listspecification = $('#listspecification').val();
    listspecification = JSON.parse(listspecification);
    for (ii in listspecification) {
        products += '<option value="' + listspecification[ii]['id'] + '" ';

        products += ' > BF :  ' + listspecification[ii]['bf'] + '; GSM :  ' + listspecification[ii]['gsm'] + '; Type :  ' + listspecification[ii]['type'] + '</option>';

    }
    $('.counterdata').html(`<div class="col-12 bg-light  p-2 ">  <div class="card-header"><h6 class="">Product Specification</h6> <div class="pull-right float-end ">  <ul class="nav nav_filter ">   <li class="nav-item text-end"> <a href="javascript:void(0)" class="btn btn-primary mb-2 addorderspecification " tag="1">Add </a> </li>  </ul> </div> </div>
     <table id="specification_table" class="table table-responsive tabledata size-6">
     <thead> 
     <tr>
     <th>Product</th>  <th>Size </th> <th>Quantity</th>   </tr> 
     </thead> 
     <tbody class="responsivespecification ">  <tr class="specificationrow1" >
      <td><select class="form-control"  name = "product[]" id="size" required>${products}</select></td>
      <td ><div class="d-flex"> <input type="text" class="form-control"  name = "size[]" id="size" required><select class="form-select" name='size_uom[]' >
    <option value="in">In</option>
    <option value="cm">Cm</option>
  </select></div></td> 
   <td class="d-flex"><div class="d-flex"><input type="text" class="form-control" onchange="Addquantityfun(this.value)"  name = "quantity[]" id="quantity" required><select class="form-select" name='quantity_uom[]'>
  <option value="kg">Kg</option>
  <option value="rims">Rims</option>
</select></div></td> 
<td class=""> </td> </tr> < </tbody> <tr><td>Total Quantity : <span id='totalqty'></span> </td></tr></table> </div>`);

    $('#viewProductDescriptionModal').modal('show');

});

  function Addquantityfun(value){
    v = Number(value);
    let nv = 0; 
        nv+=v;
    // console.log(nv);
    let n= Number($('#totalqty').html())
    $('#totalqty').html(n+nv)
}



// ===========================================
$(document).on('click', '.viewsizelist', function (e) {

    var listid = $(this).attr('tag');
    var userid = $(this).attr('userid');

    $.ajax({
        type: "POST",
        url: base_url + "get-sizelist",
        data: { listid: listid, userid: userid },

        success: function (jsonData) {

            var jsonData = JSON.parse(jsonData);
            console.log(jsonData);

            if (jsonData['success'] == 'true') {
                list = jsonData.list;
                sizelistdata = '';
                var count = 1;
                for (ii in list) {
                    sizelistdata += '<tr>';

                    sizelistdata += '<td > ' + count + '</td>';
                    sizelistdata += '<td > BF : ' + list[ii].bf + '; GSM : ' + list[ii].gsm + '; Type: ' + list[ii].type + '</td>';
                    sizelistdata += '<td > ' + list[ii].size + '</td><td > ' + list[ii].quantity + '</td>';

                    sizelistdata += '<td style="width:120px"><input  name="id[]" form="avail_size_function" value="' + list[ii].id + '" type="hidden"><input class="form-control"  name="avail_size[]" form="avail_size_function" value="'+ list[ii].avail_size + '" type="text"></td></tr>';
                    count++;
                }
                if (userid!=3) {
                    sizelistdata += '<td colspan="4"></td><td style="width:120px"><button class="btn btn-primary" type="submit" form="avail_size_function"   >Submit</button></td></tr>';
                }
                $('.sizelistdata').html(sizelistdata);
            }
        },
    });
    $('#sizelistModal').modal('show');
});
// ===========================================
$(document).on('click', '.sendListResponse', function (e) {
    e.preventDefault();
    let id = $(this).attr('tag');
    let title = $(this).attr('title');
    let subcat = $(this).attr('subcat');
    let added_by = $(this).attr('addedby');
    // alert(subcat);
    $("#r-id").val(id);
    $("#titlev").val(title); 
    if(added_by==3 || subcat==28 || subcat == 29){
        const checkedValue = getCheckedValues();
        var checkedValues = '"' + checkedValue + '"';
        var newUrl = base_url + "send-listresponse/" + id;
        changeURL(newUrl, "Paper Send List Response");
        location.reload()
        getSendListResponse(id, checkedValues);
    }else{
        $.ajax({
            type: "get",
            url: base_url + "checkUserListId?id=" + id+"&title="+title,
            data: {},
            success: function (jsonData) {
                console.log(jsonData);
                var jd = JSON.parse(jsonData);
                if (added_by!=3||subcat!=28||subcat!=29) {
                    
                }
                if (jd.is_empty == 0) {
                    $('#userlist_request_modal').modal('show');
                } else {
                    let rid = jd.id;
                   
                    if (jd.title == 'response') {
                        const checkedValue = getCheckedValues();
                        var checkedValues = '"' + checkedValue + '"';
                        var newUrl = base_url + "send-listresponse/" + rid;
                        changeURL(newUrl, "Paper Send List Response");
                        location.reload()
                        getSendListResponse(id, checkedValues);
                    }
                    if(jd.title=='view'){
                        var id = $(this).attr('tag');
                        var newUrl = base_url + "view-listproduct/" + rid;
                        changeURL(newUrl, "Paper View List Product");
                        location.reload() 
                        getViewListProduct(id);
                    }
                }
            }
        })
    }
   
});
$(document).on('click', '.viewresponselist', function (e) {
    e.preventDefault();
    let id = $(this).attr('tag');
    let title = $(this).attr('title');
    let subcat = $(this).attr('subcat');
    let added_by = $(this).attr('addedby');
    $("#r-id").val(id);
    $("#titlev").val(title);

    if(added_by==3 || subcat==28 || subcat == 29){
        const checkedValue = getCheckedValues();
        var checkedValues = '"' + checkedValue + '"';
        var newUrl = base_url + "view-listproduct/" + id;
        changeURL(newUrl, "Paper View List Product");
        location.reload()
        getSendListResponse(id, checkedValues);
    }else{
        $.ajax({
            type: "get",
            url: base_url + "checkUserListId?id=" + id+"&title="+title,
            data: {},
            success: function (jsonData) {
                console.log(jsonData);
                var jd = JSON.parse(jsonData);
                if (jd.is_empty == 0) {
                    $('#userlist_request_modal').modal('show');
                } else {
                    let rid = jd.id;
                   
                    if (jd.title == 'response') {
                        const checkedValue = getCheckedValues();
                        var checkedValues = '"' + checkedValue + '"';
                        var newUrl = base_url + "send-listresponse/" + rid;
                        changeURL(newUrl, "Paper Send List Response");
                        location.reload()
                        getSendListResponse(id, checkedValues);
                    }
                    if(jd.title=='view'){
                        var id = $(this).attr('tag');
                        var newUrl = base_url + "view-listproduct/" + rid;
                        changeURL(newUrl, "Paper View List Product");
                        location.reload() 
                        getViewListProduct(id);
                    }
                }
            }
        })
    }
   
});

$(document).on("change", "#deliverylocation", function (e) {
    e.preventDefault();
    let v = $(this).val();
    // alert(1)
    if (v == 1) {
        $('#dpin').removeClass('d-none');

    } else {
        $('#dpin').addClass('d-none');
    }

    // if((v==2)||(v==3)||(v==4)||(v==5)){
    //     $('#dpin').addClass('d-none');
    //     let weight=` <option value="2000">Upto 1 Tons</option>
    //     <option value="3300">1 Ton to 3 Tons</option>
    //     <option value="1.10">Above 3Tons</option>`;
    //     $('#d_weight').html(weight)
    // }
    // if((v==6)||(v==7)||(v==8)||(v==9) ||(v==10) ||(v==11)||(v==12)){
    //     $('#dpin').addClass('d-none');
    //     let weight=`<option value="3000">Upto 1 Tons</option>
    //     <option value="4000">1 Ton to 3.2 Tons</option>
    //     <option value="1.25">Above 3.2 Tons</option>`;
    //     $('#d_weight').html(weight)
    // }
    // if((v==13)){
    //     $('#dpin').addClass('d-none');
    //     let weight=` <option value="2000">Upto 4 Tons</option>
    //     <option value="600">Above 4 Tons</option> `;
    //     $('#d_weight').html(weight)
    // }
});
// $(document).on("change", "#d_weight", function(e) { 
//     let vl = $(this).val();
//     // alert(vl>2);
//     if(vl>2){ $(".enterweight").addClass('d-none');}else{
//         $(".enterweight").removeClass('d-none');
//     }
// });


$(document).on("submit", "#response_location_terms", function (e) {
    e.preventDefault();

    let d_location=$('#deliverylocation').val();
    let payment_term=$('#payment_terms').val();
    if(d_location=="14"){
        // alert("contact to customer care");
        $('#userlist_request_modal').modal('hide');
        $('#customercaremodal').modal('show');
        // return false;
    }


    $.ajax({
        type: "POST",
        url: base_url + "submit-response_location_terms",
        data: new FormData(this),
        success: function (jsonData) {
            console.log(jsonData); 
            var jd = JSON.parse(jsonData);
            if (jd.success == 'true') {
                let rid = jd.id;
                $('#userlist_request_modal').modal('hide');
                $('#response_location_terms').trigger('reset');
                if (jd.title == 'response') {
                    const checkedValue = getCheckedValues();
                    var checkedValues = '"' + checkedValue + '"';
                    var newUrl = base_url + "send-listresponse/" + rid;
                    changeURL(newUrl, "Paper Send List Response");
                    location.reload()
                    getSendListResponse(id, checkedValues);
                }
                if(jd.title=='view'){
                    var id = $(this).attr('tag');
                    var newUrl = base_url + "view-listproduct/" + rid;
                    changeURL(newUrl, "Paper View List Product");
                    location.reload() 
                    getViewListProduct(id);
                }
                location.reload()
            }


        },
        cache: false,
        contentType: false,
        processData: false
    });
});

$(document).on("submit", "#offerlimitUpdateform", function (e) {
    e.preventDefault();
    // alert("submit button clicked");
    $.ajax({
        type: "POST",
        url: base_url + "updateofferlimittime",
        data: new FormData(this),
        success: function (jsonData) {
            console.log(jsonData); 
            // console.log(jsonData)
            var jd = JSON.parse(jsonData);
            if (jd.status == 'true') {
                let rid = jd.id;
                $('#updateValidityModal').modal('hide');
                $('#offerlimitUpdateform').trigger('reset');
               
                location.reload()
            }


        },
        cache: false,
        contentType: false,
        processData: false
    });
});


// $(document).on("click","#availsizebutton",function(){
//     alert();
// })

// $("#availsizebutton").on("click", function(e) {
//     e.preventDefault();
//     // Serialize the form data
//     var formData = $("#avail_size_function").serialize();
//     console.log('click');
//     console.log(formData);
//     // Send the data using AJAX
//     // $.ajax({
//     //     type: "POST",
//     //     url: "process.php",
//     //     data: formData,
//     //     success: function(response) {
//     //         $("#result").html(response);
//     //     }
//     // });
// });
$(document).on("submit", "#avail_size_function", function (e) {
    e.preventDefault();

    console.log("table data");

    let data = new FormData(this); 
    console.log(data);
    // alert("submit button clicked");
    $.ajax({
        type: "POST",
        url: base_url + "avail_size_from",
        data: new FormData(this),
        success: function (jsonData) {
            // console.log(jsonData); 
            // console.log(jsonData)
            var jd = JSON.parse(jsonData);
            if (jd.status == 'true') { 
                $('#updateValidityModal').modal('hide');
                $('#offerlimitUpdateform').trigger('reset');
               
                location.reload()
            }


        },
        cache: false,
        contentType: false,
        processData: false
    });
});

$(document).on("submit", "#updatesizeform", function (e) {
    e.preventDefault(); 
    $.ajax({
        type: "POST",
        url: base_url + "updatesizeform",
        data: new FormData(this),
        success: function (jsonData) {
            console.log(jsonData);
            // alert(jsonData);
            console.log(jsonData)
            var jd = JSON.parse(jsonData);
            if (jd.status == 'true') {
                let rid = jd.id;
                $('#updateproductsize').modal('hide');
                $('#updatesizeform').trigger('reset');
               
                location.reload()
            }


        },
        cache: false,
        contentType: false,
        processData: false
    });
});


function mynotificationfun(url,by){
    let id = url.slice(17, 20);  
    let newurl =  url.slice(0, 16); 
    if(newurl=='view-listproduct'){
        let title = 'view';
        $("#r-id").val(id);
        $("#titlev").val(title);
        $.ajax({
            type: "get",
            url: base_url + "checkUserListId?id=" + id+"&title="+title,
            data: {},
            success: function (jsonData) {
                console.log(jsonData);
                var jd = JSON.parse(jsonData);
                if (jd.is_empty == 0 && by != 3) {
                    $('#userlist_request_modal').modal('show');
                } else {
                    let rid = jd.id;
                   
                    if(jd.title=='view'){
                        var id = $(this).attr('tag');
                        var newUrl = base_url + "view-listproduct/" + rid;
                        changeURL(newUrl, "Paper View List Product");
                        location.reload() 
                        getViewListProduct(id);
                    }
                }
                //$('select').selectpicker('deselectAll')
               // $("select").selectpicker("refresh");
                
            }
        })

    }else{
        window.location = base_url+url;
    }
   
}

$(document).on('click', '.showCounterPedingPopup', function () { 
    alert('pending')
 });
 

 function advancePaymentRequest(id,oid){
    // alert(id);
    $.ajax({
        type: "get",
        url: base_url +"advancePaymentRequest?id="+id+"&oid="+oid,
        data:{},
        success: function (jsonData) {
            console.log(jsonData);
            // alert(jsonData);
            // alert(jsonData);
            // console.log(jsonData)
            var jd = JSON.parse(jsonData);
            console.log(jd)
            if (jd.success == 'true') {
                alert(jd.message); 
                location.reload()
            }


        },
        cache: false,
        contentType: false,
        processData: false
    });

 }

 function askforcredit(id,oid){
    // alert(id +" "+oid);
    $.ajax({
        type: "get",
        url: base_url +"creditPaymentRequest?id="+id+"&oid="+oid,
        data:{},
        success: function (jsonData) {
            console.log(jsonData);
            // alert(jsonData);
            // alert(jsonData);
            // console.log(jsonData)
            var jd = JSON.parse(jsonData);
            console.log(jd)
            if (jd.success == 'true') {
                alert(jd.message); 
                location.reload()
            }


        },
        cache: false,
        contentType: false,
        processData: false
    });

 }


 
//  var url = base_url+"/update_wastpaper_price";
$(document).on("submit", "#update_wastpaper_price", function(e) {
    e.preventDefault(); 
    console.log('button clicked');
    var url = base_url+"/submit-list";
    formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: url,
        data: formData, 
        processData: false,
        contentType: false,
        beforeSend: function(){
            $('.addUser_btn').attr("disabled", "true");
        },
        success: function(data) {
            
            var arr = JSON.parse(data);
            console.log(arr);
            if (arr.success == 'true') {  
                // alert(arr.message);
                toastr.success(arr.data['message']); 
                setTimeout(location.reload(), 3000);
            } else if (arr.success == false) {
                error = arr.data['message'] || 'Something went wrong'; 
                toastr.error(error);
            }
            $('.addUser_btn').attr("disabled", false);
        }
    });
});

$(document).on('click', '.apprived_wastepapersale', function (e) {
    e.preventDefault();
    let id = $(this).attr('tag');  
    alert(id);
    $.ajax({
        type: "get",
        url: base_url + "apprived_wastepapersale?id=" + id,
        data: {},
        success: function (jsonData) {
            var arr = JSON.parse(data);
            console.log(arr);
            if (arr.success == 'true') {  
                // alert(arr.message);
                toastr.success(arr.data['message']); 
                setTimeout(location.reload(), 3000);
            } else if (arr.success == false) {
                error = arr.data['message'] || 'Something went wrong'; 
                toastr.error(error);
            }
            $('.addUser_btn').attr("disabled", false);
        }
    })
   
});

function changeOfferTypefun(val){
    // alert(val);
    if (val == 2 || val == 3) {
        let op =`<option value="Ex-mill"> Ex-mill</option>`;
        let opl =`  <option value="1" class='' id='millt'>Mill Transport</option>`;
        let millt = `<input type="text" class='tableinput' name='product_location' placeholder="Enter Location" >  <label class="" for="product_location"><b> Location</b></label>`;
        $('.spec_size').hide();
        $('.quantity_size').hide();
        $('#rates_offered').html(op);
        $('#delivery_type').html(opl);
        // $('#product_location_feild').html(millt);
    }
    if (val == 1) {
        let op =`<option value="Ex-Godown"> Ex-Godown</option>`;
        let opl =`<option value="0" class='' id='zetot'>Zeto Transport</option>`;
        $('#rates_offered').html(op);
        $('#delivery_type').html(opl);
        $('.spec_size').show();
        $('.quantity_size').show();
    }
}
function uploadsizelistmodal(val){
    // alert(val);
    if (val == 2 || val == 3) {
        let op =`<option value="Ex-mill"> Ex-mill</option>`;
        let opl =`  <option value="1" class='' id='millt'>Mill Transport</option>`;
        let millt = `<input type="text" class='tableinput' name='product_location' placeholder="Enter Location" >  <label class="" for="product_location"><b> Location</b></label>`;
        $('.spec_size').hide();
        $('.quantity_size').hide();
        $('#rates_offered').html(op);
        $('#delivery_type').html(opl);
        $('#product_location_feild').html(millt);
    }
    if (val == 1) { 
        $('#deckle').val('2');
        $('#uploadlist-form').removeClass('d-none');
    }else{
        $('#uploadlist-form').addClass('d-none');

    }
}


$(document).on('click', '.confrimcounterresponse_r', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to Conform Counter Response !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag'); 
            // alert(id)
                 $.ajax({
                     url: base_url + 'confirmcounterresponse_r',
                     type: 'POST',
                     data: { id: id },
                     success: function (data) { 
                         var data = JSON.parse(data);
                         if (data['success'] == 'true') { 
                            swal("Success", data['message'], "success"); 
                            location.reload();
                         }
                         else {
                             swal("Success", data['message'], "error");
                         }

            }
        });
     }
    

     })
     
});

$(document).on('click', '.counterofferresponse', function (e) { 
    var id = $(this).attr('tag');
    var cid = $(this).attr('counter'); 
    $.ajax({
        type: "POST",
        url: base_url + "get-counterofferresponse",
        data: { id: id, cid: cid },

        success: function (jsonData) {

            var jsonData = JSON.parse(jsonData);
console.log(jsonData);
            if (jsonData['success'] == 'true') {
                var specification = jsonData.specification;
                var r_id = jsonData.responsedata;
                list = jsonData.list;
                counterdata = '';
                counterdata += '<table style="width:100%" class="  tabledata size-6" style=" max-width: 900px; overflow-x: auto;"><thead>';
                var str_array = specification.split(',');

                for (var i = 0; i < str_array.length; i++) {

                    var data = str_array[i];
                    if (data == 'quantity_type') { }
                    else if (data == 'product_form') { }
                    else if (data == 'rate') { counterdata += '<th class="labeltext font-w600"> Original price</th>'; }
                    else { counterdata += '<th class="labeltext font-w600">' + str_array[i].replace(/_/g, " ") + '</th>'; }
                }
                counterdata += '<th >Request Qty</th>';
                counterdata += '<th > Request Rate</th>';
                counterdata += '<th >Counter Qty</th>'; 
                counterdata += '<th > Counter Rate</th>'; 
                counterdata += '<th > Response Qty</th>';
                counterdata += '<th > Response Rate</th>';
                counterdata += '</thead><tbody>';
                for (ii in list) { 
                    counterdata += '<tr>';
                    var str_array = specification.split(',');

                    for (var i = 0; i < str_array.length; i++) {
                        var data = str_array[i];
                        console.log(data);
                        if (data == 'quantity_type') { }
                        else if (data == 'product_form') { }
                       
                        else if (data == 'sub_category') { counterdata += '<td >' + list[ii]['cname'] + '</td>'; }
                        else if (data == 'brand_name') { counterdata += '<td >' + list[ii]['bname'] + '</td>'; }
                        else { counterdata += '<td >' + list[ii][data] + '</td>'; }
                    }
                    counterdata += '<td > ' + list[ii].rqty + '</td>';
                   
                    counterdata += '<td > <input type="hidden" class="form-control" name="rrate[]" value="' + list[ii].rrate + '"> ' + list[ii].rrate + '</td>';
                    counterdata += '<input type="hidden" value="' + list[ii].id + '" name="rsid[] " >';
                    if (list[ii].cqty) { 
                        counterdata += '<td > ' + list[ii].cqty + '</td>' ; 
                        
                    } else { 
                        counterdata += '<td > <input type="text" class="form-control" name="cqty[]" >'; 
                       
                    }
                    if (list[ii].crate) { counterdata += '<td > ' + list[ii].crate + '</td>'; } else { counterdata += '<td > <input type="text" class="form-control"  name="crate[]" required> </td></td>';  
                }
                    counterdata += ' <input type="hidden" class="form-control" name="counterid[]"  value="'+list[ii].counterid+'"> <input type="hidden" class="form-control" name="rlistid"  value="'+r_id.list_id+'">'; 
                    counterdata += '<td > <input type="text" class="form-control" name="rcqty[]"  value="'+list[ii].response_cqty+'"></td>'; 
                    counterdata += '<td > <input type="text" class="form-control" name="rcrate[]" value="'+list[ii].response_crate+'"></td>'; 

                    counterdata += '</tr>';
                }
                counterdata += '</tbody></table>';
                if (list[ii].response_cqty) {
                    $('.counterrfooter').css('display', 'none');
                }

                $('.counterdatar').html(counterdata);

                if (list[ii].cqty) {

                    $('.counterrfooter').css('display', 'block');
                }
                else { $('.counterrfooter').css('display', 'block'); }





            }
        },

    });

    $('#responseid').val(id);
    $('#counterofferModal').modal('show');

});

$(document).on('click', '.productSize_buyer', function () {
    var id = $(this).attr('tag');
    // alert(id);
    products = '';
    // <a  class="btn btn-danger close" data-bs-dismiss="modal"><i class="fa fa-close"></i></a>
    // $.post(base_url + "get-millspecification/" + id, { page: "view-product" }, function (data) {
    // });
    var listspecification = $('#listspecification').val();
    listspecification = JSON.parse(listspecification);
   
    for (ii in listspecification) {
        products += '<option value="' + listspecification[ii]['id'] + '" ';

        products += ' > BF :  ' + listspecification[ii]['bf'] + '; GSM :  ' + listspecification[ii]['gsm'] + '; Type :  ' + listspecification[ii]['type'] + '</option>';

    }
    // console.log(products);

    $.ajax({
        type: "POST",
        url: base_url+"Check-sizespecification",
        data: {id:id}, 
        success: function (jsonData) { 
               var jsonData = JSON.parse(jsonData).productspecification;
               if (jsonData) {
                console.log(jsonData); 
               let countersize=`<div class="col-12 bg-light  p-2 ">  <div class="card-header"><h6 class="">Product Specification</h6> </div>
                 <table style="width:100%" id="specification_table" class="table table-responsive tabledata size-6">
                 <thead> <tr>   <th  style="width:50%">Product</th>  <th style="width:50%">Size </th> <th style="width:50%">Quantity</th></tr> </thead> 
                 <tbody class="responsivespecification ">`;
                 jsonData.forEach(jdata => {
                    countersize +=`<tr class="specificationrow1" > 
                    <td >${jdata.product} </td> 
                 <td class="d-flex">${jdata.size} ${jdata.size_uom}<select class="form-select" style='border:none' name='size_uom[]' >
                 <option value="in">In</option>
                 <option value="cm">Cm</option>
               </select></td> 
              <td class="">${jdata.quantity} ${jdata.quantity_uom} <select style='border:none' class="form-select" name='quantity_uom[]'>
              <option value="kg">Kg</option>
              <option value="rims">Rims</option>
            </select></td> </tr> `;
                });
                 $('.counterfootersize').hide();
            countersize +=` </tbody>  </table> </div>`;

            $('.counterdatasize').html(countersize);
            }else{
                $('#listproduct_id').val(id);
                $('.counterfootersize').show();
                $('.counterdatasize').html(`<div class="col-12 bg-light  p-2 ">  <div class="card-header"><h6 class="">Product Specification</h6> <div class="pull-right float-end ">  <ul class="nav nav_filter ">   <li class="nav-item text-end"> <a href="javascript:void(0)" class="btn btn-primary mb-2 addorderspecification " tag="1">Add </a> </li>  </ul> </div> </div>
                 <table id="specification_table" class="table table-responsive tabledata size-6">
                 <thead> 
                 <tr>
                 <th>Product</th>  <th>Size </th> <th>Quantity</th>   </tr> 
                 </thead> 
                 <tbody class="responsivespecification ">  <tr class="specificationrow1" >
                  <td><select class="form-control"  name = "product[]" id="size" >${products}</select></td>
                  <td ><div class="d-flex"> <input type="text" class="form-control"  name = "size[]" id="size" required><select class="form-select" name='size_uom[]' >
                <option value="in">In</option>
                <option value="cm">Cm</option>
              </select></div></td> 
               <td class="d-flex"><div class="d-flex"><input type="text" class="form-control" onchange="Addquantityfun(this.value)"  name = "quantity[]" id="quantity" required><select class="form-select" name='quantity_uom[]'>
              <option value="kg">Kg</option>
              <option value="rims">Rims</option>
            </select></div></td> 
            <td class=""> </td> </tr> < </tbody> <tr><td>Total Quantity : <span id='totalqty'></span> </td></tr></table> </div>`);
            
            }
           
           
        } 
     });
   
    $('#viewProductDescriptionModal').modal('show');

});

$(document).on("submit", "#add_orderspecification_form", function(e) {
    var lid = $('#listproduct_id').val();
    // alert(lid);
     e.preventDefault();  
     e.stopImmediatePropagation();
    
     $.ajax({
           type: "POST",
           url: base_url+"submit-orderspecification",
           data: new FormData(this),
          
           success: function (jsonData) {
             // alert(jsonData);
             
              var jsonData = JSON.parse(jsonData);
              if (jsonData['error'] == true) 
                 {
                    if (jsonData['purchase_date'] !='') 
                    {
                       $('.e_purchase_date').html(jsonData['purchase_date']);
                    }
                    else
                    {
                       $('.e_purchase_date').html('');
                    }
  
                    
                   
                 }
                 else
                 {
                    if(jsonData['success'] == 'true')
                    { 
                       
  
                       $('#add_orderspecification_form').trigger('reset');
                        swal("Success", jsonData['message'], "success");
                       $('.statusdata').html('');
                        $('.close').trigger('click');
                        location.reload();
                    }
                   
                    
                 }
              
           },
           cache: false,
           contentType: false,
           processData: false
        });
  });