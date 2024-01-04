
$(document).on("click", ".client_detail", function(e) {
   var id           = $(this).attr('tag');
   var name           = $(this).attr('cname');
   var phone           = $(this).attr('cphone');

   $('#customer_id').val(id);
   $('#customer_name').val(name);
   $('#customer_mobile').val(phone);
   $('#clientdetail').val(name);

   $('.suggestionAra.client').html('');

});

$(document).on('keyup', '.list-product', function(){
    word   = $(this).val() || ''; 
    tag = $(this).attr("tag") || '';
    category = $('#category').val() ;
   if(word !=''){
     $(' #product_id').val('');
     searchList(word, tag, category);
  }
  else{
   $(' .suggestionAra.product').html('');
  }
})

function searchList(word='', tag='')
{ 
    $.post(base_url+'get-searchproducts', {search:word,category:category}, function(data){ 
      if(data){
        
       
        arr = JSON.parse(data);

        productdate = '';
        if(arr.success == true)
        {
            list = arr.list;
            productdate = '<ul>';
            for(ii in list)
            { 
                productdate+= '<li class="selThisCnItem product_detail" tag="'+list[ii].id+'" producttag = "'+tag+'" name="'+list[ii].product_name+'" maxqty="'+list[ii].minimum_stock+'" specification="'+arr.specification+'" >'+list[ii].product_name+' <br></li>';
            }
            productdate+= '</ul>';
        } 
        else{
            productdate+= '<ul><li class="selThisCnItem " >No Data</li></ul>';
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

$(document).on("click", ".product_detail", function(e) {
    $('.list_type_description').html('');
   var id                       = $(this).attr('tag');
   var name                     = $(this).attr('name');
   var maxqty                   = $(this).attr('maxqty');
   var tag                      = $(this).attr('producttag');
   var specification            = $(this).attr('specification');
   var pquality                 = $('#pquality').val();
   var sub_category             = $('#sub_category').val();
   var subcatid = $('#subcatid').val();
  // alert(pquality);

    if(specification !=''){
    
     addSpecification(specification , '1', pquality, sub_category, subcatid );
    }
   $(' .e_qty').html( '' );
   $(' .qtyvalidation').val('');

   $(' #product_id').val(id);
   $(' .list-product').val(name);
   $(' .qtyvalidation').attr('maxqty', maxqty); 
   $(' .suggestionAra.product').html('');



});

$(document).on("change", ".ratecat", function(e) {
  
    $('.list_type_description').html('');

   var id                       = $(this).val();

    $.post(base_url+'get-searchbycategory', {id:id}, function(data){ 
      if(data){
        arr = JSON.parse(data);
  
        if(arr.success == true)
        {
            var pquality = '';
            var sub_category = '';
            var brand = '';
            if(arr.quality){
                const pquality = JSON.stringify(arr.quality);
                $(' #pquality').val(pquality);
            }
            else{
                 $(' #pquality').val(pquality);
            }
            
            if(arr.sub_category){
                const sub_category = JSON.stringify(arr.sub_category);
                $(' #sub_category').val(sub_category);
            }
            else{
                $(' #sub_category').val(sub_category);
            }

            if(arr.brand){
                const brand = JSON.stringify(arr.brand);
                $(' #brand').val(brand);
            }
            else{
                $(' #brand').val(brand);
            }
            

            var specification            = arr.specification;
            $(' #specification').val(specification);

            if(specification !=''){
            
             addSpecification(specification , '1', pquality, sub_category, '0' );
            }
        } 
        
      }
    })
    
});

function addSpecification(specification='', tag='', pquality='', sub_category='', subcatid='')
{   
    var str_array = specification.split(',');
    var otherdata = '';
    var sizedropdown = '';
    var quantitydropdown = '';
    var post_type = $('#post_type').val();
    var brand = $('#brand').val();
    
    var cat  = $("#category option:selected").text();
       
    if(tag == 1 ){
        otherdata+='<div class="from-section product'+tag+'"> <div class="from-header">  <h6 class="from-heading">Product Info</h6> <div class="append-productspecification" tag="'+tag+'">  <a href="javascript:void(0)" class="badge light badge-success size-7  " >Add Product</a>  </div></div> <div class=" size-4"> <div class="form-row">'; 
        // $('#specification').val(specification);
    }
    else{
       
        otherdata+='<div class="from-section product'+tag+'"> <div class="from-header">  <h6 class="from-heading">Product Info</h6> <div class="cancel-productspecification" tag="'+tag+'">  <a href="javascript:void(0)" class="badge light badge-danger size-7  " ><i class="fa fa-times"></i></a>  </div></div> <div class=" size-4"> <div class="form-row">'; 
    }
    // otherdata+='<table id="producttype_tbale" class="table table-responsive-md tabledata size-6" ><thead>';
    // for(var i = 0; i < str_array.length; i++) {
    //      str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
    //      otherdata+='<th class="labeltext" >'+str_array[i].replace(/_/g," ")+'</th>';
    // }
    // otherdata+='</thead><tbody>';
    //  for(var i = 0; i < str_array.length; i++) {
       
    //    str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
    //     if(str_array[i] == 'quantity_uom') { }
    //     else if(str_array[i] == 'quantity') {
            
    //         if(cat == 'Packaging Board'  || cat == 'Coated Papers/boards' ){
    //             quantitydropdown ='<div class="form-group mb-0  col-md-5 mt-3  " id="specquantity_uom'+tag+'"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="quantity_uom'+tag+'" name="quantity_uom[]"  > <option value="">Choose..</option> <option value="Kg">Kg</option><option value="MT">MT</option><option value="Packets">Packets</option><option value="Reals">Reals</option></select>   </div></div>'
    //         }
    //         else { quantitydropdown ='<div class="form-group mb-0  col-md-5 mt-3" id="specquantity_uom'+tag+'"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="quantity_uom'+tag+'" name="quantity_uom[]"  > <option value="">Choose..</option>  <option value="Kg">Kg</option><option value="MT">MT</option><option value="Reams">Reams</option><option value="Reals">Reals</option></select>   </div></div>'}

    //         otherdata+='<td class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="form-row"><div class="form-group mb-0  col-md-7" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]"  > </div></div>'+quantitydropdown+'</div></td>';
    //     }
    //     else if (str_array[i] == 'quality'){
           
    //         otherdata+= '<td class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option> ';

           
         
    //         if(pquality){
    //              arr = JSON.parse(pquality);
    //           for(ii in arr)
    //             { 
    //                 otherdata+= '<option value="'+arr[ii].product_quality+'" >'+arr[ii].product_quality+'</option>';
    //             }  
    //         }   
    //         otherdata+='</select><label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></td>';
    //     }
    //     else if (str_array[i] == 'sub_category'){
           
    //         otherdata+= '<td class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class=" responsivespec form-control seleinput" id="'+str_array[i]+tag+'" tag="'+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option> ';
    //         if(sub_category){
    //             arr1 = JSON.parse(sub_category);
            
    //             for(ii1 in arr1)
    //             { 
    //                 otherdata+= '<option value="'+arr1[ii1].id+'" ';

    //                 // if(arr1[ii1].id == subcatid){
    //                 // otherdata+= 'selected';     
    //                 // }
                    
    //                otherdata+=   '>'+arr1[ii1].product_category+'</option>';
    //             }
    //         }
            
    //         otherdata+='</select></div></td>';
    //     }
    //     else if (str_array[i] == 'brand_name'){
           
    //         otherdata+= '<td class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  tag="'+tag+'" class="'+str_array[i]+' form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option> ';
           
    //         if(brand){
    //             // br = brand;
    //              br = JSON.parse(brand);
                 
    //             for(ii1 in br)
    //             { 
    //                 otherdata+= '<option value="'+br[ii1].id+'" ';
    //                     // if(br[ii1].id == pid && tag==1){
    //                     // otherdata+= ' selected';     
    //                     // }
    //                otherdata+=   '>'+br[ii1].product_name+'</option>';
    //             } 
    //         }
           
    //         otherdata+='</select></div></td>';
    //     }

    //     else if(str_array[i] == 'size_uom') { 
           
    //        }
    //     else if(str_array[i] == 'size') {
    //          if(cat == 'Photocopier Paper'){
    //              otherdata+='<td class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="form-row"><div class="form-group mb-0  col-md-12 mt-3" id="specsize_uom'+tag+'"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom'+tag+'" name="size_uom[]" >  <option value="">Choose..</option>  <option value="A3">A3</option><option value="A4">A4</option><option value="A5">A5</option></select>  </div></div></div></td>'; 
              
    //         }
    //         else if(cat == 'Kraft Paper'){
    //              otherdata+='<td class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="form-row"><div class="form-group mb-0  col-md-8" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="size_length'+tag+'" name="size_length[]"  > </div> </div><div class="form-group mb-0  col-md-4 mt-3" id="specsize_uom'+tag+'"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom'+tag+'" name="size_uom[]" >  <option value="">Choose..</option> <option value="inch">inch</option><option value="cm">cm</option></select>  </div></div></div></td>'; 
              
    //         }
    //         else{
    //              otherdata+='<td class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="form-row"><div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="size_length'+tag+'" name="size_length[]"  > </div> </div><div class="form-group mb-0  col-md-2 mt-4"><div class="field "> X  </div> </div><div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field"> <input type="text" class=" " placeholder="'+str_array[i]+'" id="size_width'+tag+'" name="size_width[]"  >  </div>   </div><div class="form-group mb-0  col-md-4 mt-3" id="specsize_uom'+tag+'"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom'+tag+'" name="size_uom[]" >  <option value="">Choose..</option> <option value="inch">inch</option><option value="cm">cm</option></select>  </div></div></div></td>'; 
              
    //         }
           
    //     }

       

    //     else if(str_array[i] == 'product_form') { 
    //         otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option> <option value="0">Loose</option><option value="1">Compressed</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';}
    //      else if(str_array[i] == 'quantity_type') { 
    //         otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option> <option value="1">Godown</option><option value="2">Truck Load</option><option value="3">Part Load</option><option value="0">NA</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';}
    //      else if(str_array[i] == 'pulp') {
                  
                   
    //               if(cat == 'Speciality  papers'){ 
    //                otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option> <option value="Virgin">Virgin</option><option value="Recycle">Recycle</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
    //                 }
    //               else{  otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option> <option value="Virgin">Virgin</option><option value="Agro">Agro</option><option value="Recycle">Recycle</option><option value="Any">Any</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>'; }

                   
    //               }
    //             else if(str_array[i] == 'color') {
                   
    //                  otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput '+str_array[i]+'" tag="'+tag+'" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option>  <option value="White">White</option><option value="Brown">Brown</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
    //            }
    //            else if(str_array[i] == 'shade') {
                   
    //                  otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option>  <option value="White">White</option><option value="Offwhite">Offwhite</option><option value="NS">NS</option><option value="GY">GY</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
    //            }
    //            else if(str_array[i] == 'ss_nss') {
                   
    //                  otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option> <option value="SS">SS</option><option value="NSS">NSS</option></select><label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
    //            }
    //            else if(str_array[i] == 'tear') {
                  
    //                 otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><label for="'+str_array[i]+tag+'" class=" labeltext">'+str_array[i].replace(/_/g," ")+'</label><div class="form-row" ><div class="form-group mb-0 col-5" ><div class="field"><input  id="'+str_array[i]+tag+'" name="md[]"></div></div><div class="form-group mb-0 col-1" >MD</div><div class="form-group mb-0 col-5" ><div class="field"><input id="'+str_array[i]+tag+'" name="cd[]"></div></div><div class="form-group mb-0 col-1" >CD</div></div> </div>'; 

    //            }
    //            else if(str_array[i] == 'coating') {
                   
    //               if(cat == 'Paper for food packaging'){
    //                  otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option>  <option value="PE">PE</option> <option value="Aqueous" >Aqueous </option> </select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
    //               }
    //               else{

    //                    otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option>  <option value="Gloss">Gloss</option><option value="Matt">Matt</option><option value="Silk">Silk</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
    //               }
    //            }
    //             else if(str_array[i] == 'gsm') {
                   
    //               if(cat == 'Photocopier Paper'){
    //                  otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option>  <option value="70">70</option><option value="75">75</option><option value="80">80</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
    //               }
    //               else{
    //                    otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]"  > <label for="'+str_array[i]+tag+'" class="labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
    //               }
    //            }
    //            else if(str_array[i] == 'packing_per_ream') {
                   
    //                  otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="100">100</option><option value="250">250</option><option value="500">500</option></select><label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
    //            }
    //     else{
    //         otherdata+='<td class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]"  ></div></td>';
    //     }


       
    // }

    // otherdata+='</tbody</table>';
    for(var i = 0; i < str_array.length; i++) {
       
       str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
        if(str_array[i] == 'quantity_uom') { }
        else if(str_array[i] == 'quantity') {
            
            if(cat == 'Packaging Board'  || cat == 'Coated Papers/boards' ){
                quantitydropdown ='<div class="form-group mb-0  col-md-5 mt-3  " id="specquantity_uom'+tag+'"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="quantity_uom'+tag+'" name="quantity_uom[]"  > <option value="">Choose..</option> <option value="Kg">Kg</option><option value="MT">MT</option><option value="Packets">Packets</option><option value="Reals">Reals</option></select>   </div></div>'
            }
            else { quantitydropdown ='<div class="form-group mb-0  col-md-5 mt-3" id="specquantity_uom'+tag+'"><div class="field mt-1 drop-select">  <select  class="form-control seleinput" id="quantity_uom'+tag+'" name="quantity_uom[]"  > <option value="">Choose..</option>  <option value="Kg">Kg</option><option value="MT">MT</option><option value="Reams">Reams</option><option value="Reals">Reals</option></select>   </div></div>'}

            otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="form-row"><div class="form-group mb-0  col-md-7" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]"  > <label for="'+str_array[i]+tag+'" class="labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>'+quantitydropdown+'</div></div>';
        }
        else if (str_array[i] == 'quality'){
           
            otherdata+= '<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option> ';

           
         
            if(pquality){
                 arr = JSON.parse(pquality);
              for(ii in arr)
                { 
                    otherdata+= '<option value="'+arr[ii].product_quality+'" >'+arr[ii].product_quality+'</option>';
                }  
            }   
            otherdata+='</select><label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
        }
        else if (str_array[i] == 'sub_category'){
           
            otherdata+= '<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class=" responsivespec form-control seleinput" id="'+str_array[i]+tag+'" tag="'+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option> ';
            if(sub_category){
                arr1 = JSON.parse(sub_category);
            
                for(ii1 in arr1)
                { 
                    otherdata+= '<option value="'+arr1[ii1].id+'" ';

                    // if(arr1[ii1].id == subcatid){
                    // otherdata+= 'selected';     
                    // }
                    
                   otherdata+=   '>'+arr1[ii1].product_category+'</option>';
                }
            }
            
            otherdata+='</select><label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext ">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
        }
        else if (str_array[i] == 'brand_name'){
           
            otherdata+= '<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  tag="'+tag+'" class="'+str_array[i]+' form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option> ';
           
            if(brand){
                // br = brand;
                 br = JSON.parse(brand);
                 
                for(ii1 in br)
                { 
                    otherdata+= '<option value="'+br[ii1].id+'" ';
                        // if(br[ii1].id == pid && tag==1){
                        // otherdata+= ' selected';     
                        // }
                   otherdata+=   '>'+br[ii1].product_name+'</option>';
                } 
            }
           
            otherdata+='</select><label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext ">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
        }

        else if(str_array[i] == 'size_uom') { 
           
           }
        else if(str_array[i] == 'size') {
             if(cat == 'Photocopier Paper'){
                 otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="form-row"><div class="form-group mb-0  col-md-12 mt-3" id="specsize_uom'+tag+'"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom'+tag+'" name="size_uom[]" >  <option value="">Choose..</option>  <option value="A3">A3</option><option value="A4">A4</option><option value="A5">A5</option></select>  <label  for="size_uom'+tag+'" class="labeltext">Size</label></div></div></div></div>'; 
              
            }
            else if(cat == 'Kraft Paper'){
                 otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="form-row"><div class="form-group mb-0  col-md-8" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="size_length'+tag+'" name="size_length[]"  > <label  for="size_length'+tag+'" class="labeltext">Size</label>  </div> </div><div class="form-group mb-0  col-md-4 mt-3" id="specsize_uom'+tag+'"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom'+tag+'" name="size_uom[]" >  <option value="">Choose..</option> <option value="inch">inch</option><option value="cm">cm</option></select>  </div></div></div></div>'; 
              
            }
            else{
                 otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="form-row"><div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="size_length'+tag+'" name="size_length[]"  > <label  for="size_length'+tag+'" class="labeltext">Length</label>  </div> </div><div class="form-group mb-0  col-md-2 mt-4"><div class="field "> X  </div> </div><div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field"> <input type="text" class=" " placeholder="'+str_array[i]+'" id="size_width'+tag+'" name="size_width[]"  > <label for="size_width'+tag+'" class="labeltext">width</label> </div>   </div><div class="form-group mb-0  col-md-4 mt-3" id="specsize_uom'+tag+'"><div class="field drop-select mt-1">  <select  class="form-control seleinput " id="size_uom'+tag+'" name="size_uom[]" >  <option value="">Choose..</option> <option value="inch">inch</option><option value="cm">cm</option></select>  </div></div></div></div>'; 
              
            }
           
        }

       

        else if(str_array[i] == 'product_form') { 
            otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option> <option value="0">Loose</option><option value="1">Compressed</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';}
         else if(str_array[i] == 'quantity_type') { 
            otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option> <option value="1">Godown</option><option value="2">Truck Load</option><option value="3">Part Load</option><option value="0">NA</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';}
         else if(str_array[i] == 'pulp') {
                  
                   
                  if(cat == 'Speciality  papers'){ 
                   otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option> <option value="Virgin">Virgin</option><option value="Recycle">Recycle</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
                    }
                  else{  otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option> <option value="Virgin">Virgin</option><option value="Agro">Agro</option><option value="Recycle">Recycle</option><option value="Any">Any</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>'; }

                   
                  }
                else if(str_array[i] == 'color') {
                   
                     otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput '+str_array[i]+'" tag="'+tag+'" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option>  <option value="White">White</option><option value="Brown">Brown</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
               }
               else if(str_array[i] == 'shade') {
                   
                     otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option>  <option value="White">White</option><option value="Offwhite">Offwhite</option><option value="NS">NS</option><option value="GY">GY</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
               }
               else if(str_array[i] == 'ss_nss') {
                   
                     otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option> <option value="SS">SS</option><option value="NSS">NSS</option></select><label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
               }
               else if(str_array[i] == 'tear') {
                  
                    otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><label for="'+str_array[i]+tag+'" class=" labeltext">'+str_array[i].replace(/_/g," ")+'</label><div class="form-row" ><div class="form-group mb-0 col-5" ><div class="field"><input  id="'+str_array[i]+tag+'" name="md[]"></div></div><div class="form-group mb-0 col-1" >MD</div><div class="form-group mb-0 col-5" ><div class="field"><input id="'+str_array[i]+tag+'" name="cd[]"></div></div><div class="form-group mb-0 col-1" >CD</div></div> </div>'; 

               }
               else if(str_array[i] == 'coating') {
                   
                  if(cat == 'Paper for food packaging'){
                     otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option>  <option value="PE">PE</option> <option value="Aqueous" >Aqueous </option> </select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
                  }
                  else{

                       otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="">Choose..</option>  <option value="Gloss">Gloss</option><option value="Matt">Matt</option><option value="Silk">Silk</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
                  }
               }
                else if(str_array[i] == 'gsm') {
                   
                  if(cat == 'Photocopier Paper'){
                     otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" >  <option value="">Choose..</option>  <option value="70">70</option><option value="75">75</option><option value="80">80</option></select>   <label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
                  }
                  else{
                       otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]"  > <label for="'+str_array[i]+tag+'" class="labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
                  }
               }
               else if(str_array[i] == 'packing_per_ream') {
                   
                     otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]" > <option value="100">100</option><option value="250">250</option><option value="500">500</option></select><label for="'+str_array[i]+tag+'" class="selectlabel labelup labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
               }
        else{
            otherdata+='<div class="form-group mb-0  col-md-3" id="spec'+str_array[i]+tag+'"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="'+str_array[i]+tag+'" name="'+str_array[i]+'[]"  > <label for="'+str_array[i]+tag+'" class="labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
        }


       
    }

    if(post_type == '2'){
              otherdata+='<div class="form-group mb-0  col-md-3" id="specpost_type'+tag+'"><div class="field">  <input type="text" class=" " placeholder="Minimum Qty" id="min_qty'+tag+'" name="min_qty"  > <label for="min_qty'+tag+'" class="labeltext">Minimum Quantity</label></div></div>';
        }
    otherdata+='<input type="hidden" class=" " value="'+tag+'" name="rowcount[]"  > ';
    otherdata+='</div></div> </div>';
    
    $('.list_type_description').append(otherdata);
            
    tag++;
    $('.append-productspecification').attr('tag', tag);
}

function getproductdata(tag,pid)
{  
    $.post(base_url+'get-pdata', {pid:pid}, function(data){ 
      if(data){
        arr = JSON.parse(data);
        spec = arr['specarray'];
        var str_array = spec.split(',');
       
        for(var i = 0; i < str_array.length; i++) {
           
            $('#'+str_array[i]+tag).val(arr[str_array[i]]);

        }
        $('#sub_category'+tag).val(arr['sub_category']);
        $('#brand_name'+tag).val(pid);
        // resdata=$('#resdata'+tag).val();
        // if(resdata==''){
          var id = arr['sub_category'];
 
            checkresponsivespec(tag, id, pid);
            
           
        // }
   
       
      }
    })
    
}

$(document).on("change", ".brand_name", function(e) {
    var tag = $(this).attr('tag');
    var pid = $(this).val();
    // alert(tag);
    // alert(pid);
     getproductdata(tag,pid);
   
});


$(document).on("change", ".responsivespec", function(e) {
    //debugger;
    var tag = $(this).attr('tag');
    var id = $(this).val();
    var pid = 0 ;
    checkresponsivespec(tag, id, pid)
});


function checkresponsivespec(tag, id, pid){
      $('#sub_category'+tag).val(id);
     $.post(base_url+'get-qualityspec', {id:id}, function(data){ 
      if(data)
      {
        var cat  = $("#product_category option:selected").text();
        arr = JSON.parse(data);
        cdata = '';
        var branddata = '<option value="" >Choose..</option>';
        if(arr.success == true)
        {

            brand = arr.brand;
           
            for(ii in brand)
            {  
                branddata+= '<option value="'+brand[ii].id+'" ';
                if(pid == brand[ii].id){  branddata+='selected'; }
                 branddata+= ' > '+brand[ii].product_name+'</option>';
                
            }

            $('#brand_name'+tag).html(branddata);

            specification = arr.specification;
            var pquality  = $('#pquality').val();
            var sub_category  = $('#sub_category').val();
            var subcatid = id;
            var catspecification = $('#specification').val();
            // addSpecification(specification , tag , pquality, sub_category, subcatid);
            var str_array = catspecification.split(',');
            for(var i = 0; i < str_array.length; i++) {
                var td = specification.includes( str_array[i]);
               
                if(td == true){
                    $('#spec'+str_array[i]+tag).css('display','');
                }
                else{
                    $('#spec'+str_array[i]+tag).css('display','none');
                }
            }
            // let text = "Hello world, welcome to the universe.";
            // let result = text.includes("world");
          
        } 
      }
   })
}

$(document).on("click", ".append-productspecification", function(e) {
    var tag= $('.append-productspecification').attr('tag');
    var specification = $('#specification').val();
    var pquality  = $('#pquality').val();
     var sub_category             = $('#sub_category').val();
      var subcatid = $('#subcatid').val();
    if(specification !=''){
        addSpecification(specification , tag, pquality,sub_category,subcatid);
    }
});

$(document).on("click", ".cancel-productspecification", function(e) {
    var tag= $('.cancel-productspecification').attr('tag');
    $('.product'+tag).remove();
});

$(document).on("submit", "#add_list_form", function(e) {
  
   e.preventDefault();  
   e.stopImmediatePropagation();
  
   $.ajax({
         type: "POST",
         url: base_url+"submit-list",
         data: new FormData(this),
        
         success: function (jsonData) {
             // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  
                  if (jsonData['product_id'] !='') 
                  {
                     $('#product_id').siblings(".wizard-form-error").slideDown();
                     $('.e_product_id').html(jsonData['product_id']);
                  }
                  else
                  {
                     $('#product_id').siblings(".wizard-form-error").slideUp();
                     $('.e_product_id').html('');
                  }

                  if (jsonData['waste_product_type'] !='') 
                  {
                     $('#waste_product_type').siblings(".wizard-form-error").slideDown();
                     $('.e_waste_product_type').html(jsonData['waste_product_type']);
                  }
                  else
                  {
                     $('#waste_product_type').siblings(".wizard-form-error").slideUp();
                     $('.e_waste_product_type').html('');
                  }

                  if (jsonData['product_quality'] !='') 
                  {
                     $('#product_quality').siblings(".wizard-form-error").slideDown();
                     $('.e_product_quality').html(jsonData['product_quality']);
                  }
                  else
                  {
                     $('#product_quality').siblings(".wizard-form-error").slideUp();
                     $('.e_product_quality').html('');
                  }
                  
                  if (jsonData['qty'] !='') 
                  {
                     $('#qty').siblings(".wizard-form-error").slideDown();
                     $('.e_qty').html(jsonData['qty']);
                  }
                  else
                  {
                     $('#qty').siblings(".wizard-form-error").slideUp();
                     $('.e_qty').html('');
                  }

                  if (jsonData['buying_rate'] !='') 
                  {
                     $('#buying_rate').siblings(".wizard-form-error").slideDown();
                     $('.e_buying_rate').html(jsonData['buying_rate']);
                  }
                  else
                  {
                     $('#buying_rate').siblings(".wizard-form-error").slideUp();
                     $('.e_buying_rate').html('');
                  }

                  if (jsonData['product_location'] !='') 
                  {
                     $('#product_location').siblings(".wizard-form-error").slideDown();
                     $('.e_product_location').html(jsonData['product_location']);
                  }
                  else
                  {
                     $('#product_location').siblings(".wizard-form-error").slideUp();
                     $('.e_product_location').html('');
                  }

                  if (jsonData['pterm'] !='') 
                  {
                     $('#pterm').siblings(".wizard-form-error").slideDown();
                     $('.e_pterm').html(jsonData['pterm']);
                  }
                  else
                  {
                     $('#pterm').siblings(".wizard-form-error").slideUp();
                     $('.e_pterm').html('');
                  }

                  if (jsonData['ddays'] !='') 
                  {
                     $('#ddays').siblings(".wizard-form-error").slideDown();
                     $('.e_ddays').html(jsonData['ddays']);
                  }
                  else
                  {
                     $('#ddays').siblings(".wizard-form-error").slideUp();
                     $('.e_ddays').html('');
                  }
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     

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
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on("submit", "#submit_response_form", function(e) {
   
   e.preventDefault();  
   e.stopImmediatePropagation();
  
   $.ajax({
         type: "POST",
         url: base_url+"submit-response",
         data: new FormData(this),
        
         success: function (jsonData) {
           //alert(jsonData);
            var jsonData = JSON.parse(jsonData);
           
                  if(jsonData['success'] == 'true')
                  { 
                     
                     $('#submit_response_form').trigger('reset');
                     swal("Success", jsonData['message'], "success");
                     $('.responsedata').html('<div class="table-responsive"><table class="table shadow-hover"><tbody><tr> <td> <p class="text-black mb-1 font-w600">Quantity </p></td> <td> <p class="text-black mb-1 font-w600">Rate</p> </td><td> <p class="text-black mb-1 font-w600">Description</p> </td><td> <p class="text-black mb-1 font-w600">Status</p> </td><td> <p class="text-black mb-1 font-w600">Action</p> </td></tr> <tr> <td> '+jsonData['quantity']+' </td> <td>  '+jsonData['rate']+'  </td> <td>  '+jsonData['description']+'  </td>  <td> Pending  </td><td>  <a class="viewList" href="javascript:void(0)" tag="'+jsonData['id']+'"><span class="badge light badge-warning badge-text-size"><i class="fa fa-times"></i></span></a><?php }?></td>   </tr> </tbody> </table> </div>');

                     location.reload();
                     
                  }

                  if(jsonData['success'] == 'false')
                  { 
                     
                    
                      swal("Error", jsonData['message'], "error");
                     
                  }
                 
                 
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});



$(document).on('click', '.addResponse', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to Add this in Response !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
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
      swal({ title: "Are You Sure !!", 
        text: "You want to Approve this list Request !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
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
      swal({ title: "Are You Sure !!", 
        text: "You want to Reject this Response Request  !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
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
                            $('.statusList'+id).html('<a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a>');
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
         url: base_url+"get-counteroffer",
         data: { id: id , cid:cid },
        
         success: function (jsonData) {
          
            var jsonData = JSON.parse(jsonData);
          
                  if(jsonData['success'] == 'true')
                  { 
                      var specification = jsonData.specification;
                            list = jsonData.list;
                            counterdata='';
                            counterdata+='<table style="width:100%" class="  tabledata size-6" style=" max-width: 900px; overflow-x: auto;"><thead>';
                                 var str_array = specification.split(',');
                                 
                                 for(var i = 0; i < str_array.length; i++) {    

                                    var data = str_array[i];
                                    if(data == 'quantity_type'){}
                                    else if(data == 'product_form'){}
                                    else{  counterdata+= '<th class="labeltext font-w600">'+str_array[i].replace(/_/g," ")+'</th>';}
                              }
                                counterdata+= '<th >Request Qty</th>';
                                counterdata+= '<th > Request Rate</th>';
                                 counterdata+= '<th >Counter Qty</th>';
                                counterdata+= '<th > Counter Rate</th>';
                                  counterdata+='</thead><tbody>';
                            for(ii in list)
                            {    counterdata+='<tr>';
                                 var str_array = specification.split(',');
                                 for(var i = 0; i < str_array.length; i++) {
                                    var data = str_array[i];
                                    if(data == 'quantity_type'){}
                                    else if(data == 'product_form'){}
                                    else if(data == 'sub_category'){ counterdata+= '<td >'+list[ii]['cname']+'</td>';}
                                    else if(data == 'brand_name'){ counterdata+= '<td >'+list[ii]['bname']+'</td>';}
                                    else{  counterdata+= '<td >'+list[ii][data]+'</td>';}
                              }
                                counterdata+= '<td > '+list[ii].rqty+'</td>';
                                counterdata+= '<td > '+list[ii].rrate+'</td>';
                                 counterdata+= '<input type="hidden" value="'+list[ii].id+'" name="rsid[] " >';
                               if(list[ii].cqty){ counterdata+= '<td > '+list[ii].cqty+'</td>';} else { counterdata+= '<td > <input type="text" class="form-control" name="cqty[]" required> </td>'; }
                                if(list[ii].crate){ counterdata+= '<td > '+list[ii].crate+'</td>';} else { counterdata+= '<td > <input type="text" class="form-control" name="crate[]" required></td>'; }
                               
                                  counterdata+='</tr>';
                            }
                            counterdata+='</tbody></table>';
                        
                         $('.counterdata').html(counterdata);
                        
                         if(list[ii].cqty ){
                        
                          $('.counterfooter').css('display','none'); }
                         else {   $('.counterfooter').css('display','');  }



        
                     
                  }
         },
       
      });

   $('#responseid').val(id);
   $('#counterofferModal').modal('show');
  
});



$(document).on("submit", "#add_counteroffer_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
  
   $.ajax({
         type: "POST",
         url: base_url+"submit-counteroffer",
         data: new FormData(this),
        
         success: function (jsonData) {
           
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  
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
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     
                     $('#add_counteroffer_form').trigger('reset');
                     swal("Success", jsonData['message'], "success");
                    $('.close').trigger('click');
                  }

                  if(jsonData['success'] == 'false')
                  { 
                     
                    
                      swal("Error", jsonData['message'], "error");
                     
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on('click', '.approvecounteroffer', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to Approve this Counter Response !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
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
      swal({ title: "Are You Sure !!", 
        text: "You want to Reject this Counter Response !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
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
      swal({ title: "Are You Sure !!", 
        text: "You want to cancel  the list Response Sent !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
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

function getResponseSpecification(rid='')
{ 
    $.post(base_url+'get-responsespecification', {rid:rid}, function(data){ 
      if(data){
       
        arr = JSON.parse(data);
        cdata = '';
        if(arr.success == true)
        { var specification = arr.specification;
            list = arr.list;
            cdata+='<tr>';
            var str_array = specification.split(',');
            var strlen = str_array.length;
           
            $('#desc'+rid).attr('colspan', strlen-2);
                 for(var i = 0; i < str_array.length; i++) {
                    var data = str_array[i];
                    if(data == 'quantity_type'){}
                    else if(data == 'product_form'){}
                    else if(data == 'rate'){}
                    else{  cdata+= '<th class="labeltext font-w600">'+str_array[i].replace(/_/g," ")+'</th>';}
              }
               
                cdata+= '<th > Final Rate</th>';
                  cdata+='</tr>';
            for(ii in list)
            {    cdata+='<tr>';
                 var str_array = specification.split(',');
                 for(var i = 0; i < str_array.length; i++) {
                    var data = str_array[i];
                    if(data == 'quantity_type'){}
                    else if(data == 'product_form'){}
                    else if(data == 'rate'){}
                    else if(data == 'sub_category'){ cdata+= '<td >'+list[ii]['cname']+'</td>'; }

                    else if(data == 'brand_name'){ cdata+= '<td >'+list[ii]['bname'] +'</td>'; }
                    else{  cdata+= '<td >'+list[ii][data]+'</td>'; }
              }
                
                cdata+= '<td > '+list[ii].rrate+'</td>';
                  cdata+='</tr>';
            }
           
        } 
         $('.specification'+rid).html(cdata);
        
      }
    })
}

$(document).on('click', '.view-specdetail', function (e) {
var id = $(this).attr('tag');
//$('.specification'+id).css('display','');
if ($('.specification'+id).css('display') === 'none') {
      
      $('.specification'+id).css('display', 'contents');
    } else if ($('.specification'+id).css('display') === 'contents') {
      
      $('.specification'+id).css('display', 'none');
    }

    });

function getResponsedata(rid='')
{ 
    $.post(base_url+'get-responsedata', {rid:rid}, function(data){ 
      if(data){
      
        arr = JSON.parse(data);
        cdata = '<td >Response</td>';
        if(arr.success == true)
        { var specification = arr.specification;
          
            listspecdata =  arr.listspecdata;
            var str_array = specification.split(',');
            for(var i = 0; i < str_array.length; i++) {
                var data = str_array[i];
                 if(data == 'sub_category'){ cdata+= '<td >'+listspecdata['product_category']+' <input type="hidden" value="'+listspecdata[data]+'" name="'+data+'[]"></td>'; }
                // else if(data == 'quantity_uom'){cdata+= '<td >'+listspecdata[data]+'</td>'; }
                // else if(data == 'size_uom'){cdata+= '<td >'+listspecdata[data]+'</td>'; }
                else if(data == 'size' || data == 'size_uom' || data == 'quantity_uom'  ){cdata+= '<td >'+listspecdata[data]+' <input type="hidden" value="'+listspecdata[data]+'" name="'+data+'[]"></td>'; }

                else if(data == 'quantity_type'  ){cdata+= '<td ><div class="field drop-select mt-3">  <select  class="form-control seleinput" id="'+data+listspecdata['id']+'" name="'+data+'[]" >  <option value="">Choose..</option> <option value="1" ';
                if(listspecdata[data] == '1'  ){cdata+= 'selected'; }
                cdata+=  '>Godown</option><option value="2" ';
                if(listspecdata[data] == '2'  ){cdata+= 'selected'; }
                cdata+= '>Truck Load</option><option value="3" ';
                if(listspecdata[data] == '3'  ){cdata+= 'selected'; }
                cdata+= '>Part Load</option><option value="0" ';
                if(listspecdata[data] == '0'  ){cdata+= 'selected'; }
                cdata+= '>NA</option></select> </div> </td>'; }

                 else if(data == 'product_form'  ){cdata+= '<td ><div class="field drop-select mt-3">  <select  class="form-control seleinput" id="'+data+listspecdata['id']+'" name="'+data+'[]" >  <option value="">Choose..</option> <option value="0" ';
                if(listspecdata[data] == '0'  ){cdata+= 'selected'; }
                cdata+=  '>Loose</option><option value="1" ';
                if(listspecdata[data] == '1'  ){cdata+= 'selected'; }
                cdata+= '>Compressed</option></select> </div> </td>'; }

                else if(data == 'rate'){ }
                else if(data == 'brand_name')
                {
                    cdata+='<td ><div class="form-group mb-0  col-md-12 mt-3 " ><div class="field drop-select">  <select   class=" '+str_array[i]+' form-control seleinput" id="'+data+listspecdata['id']+'" tag="'+listspecdata['id']+'"  name="'+str_array[i]+'[]" > <option value="" >Choose..</option> ';
                 
                    br = arr.list;
                    for(ii1 in br)
                    { 
                        cdata+= '<option value="'+br[ii1].id+'" ';
                        if(br[ii1].id == listspecdata[data]){

                            cdata+= 'selected '; 
                        }
                       cdata+=   '>'+br[ii1].product_name+'</option>';
                    }
                    cdata+='</select></div></div></td >'; 
                }
                else if(data == 'pulp')
                {
                    cdata+='<td ><div class="form-group mb-0  col-md-12 mt-3" ><div class="field drop-select">  <select  class="form-control seleinput" id="'+data+listspecdata['id']+'" name="'+data+'[]" >  <option value="">Choose..</option> <option value="Virgin">Virgin</option><option value="Agro">Agro</option><option value="Recycle">Recycle</option><option value="Any">Any</option></select>   </div></div></td >'; 

                }
                else if(data == 'color')
                {
                    cdata+='<td ><div class="form-group mb-0  col-md-12 mt-3" ><div class="field drop-select">  <select  class="form-control seleinput" id="'+data+listspecdata['id']+'" name="'+data+'[]" > <option value="">Choose..</option>  <option value="White">White</option><option value="Brown">Brown</option></select>   </div></div></td >'; 
                }
                else if(data == 'shade')
                {
                    cdata+='<td ><div class="form-group mb-0  col-md-12 mt-3" ><div class="field drop-select">  <select  class="form-control seleinput" id="'+data+listspecdata['id']+'" tag="'+listspecdata['id']+'" name="'+data+'[]" > <option value="">Choose..</option>  <option value="White">White</option><option value="Offwhite">Offwhite</option><option value="NS">NS</option><option value="GY">GY</option></select>   </div></div></td >'; 
                }

                else{  cdata+= '<td > <input type="text" class="form-control" name="'+data+'[]" id="'+data+listspecdata['id']+'" value="'+listspecdata[data]+'" placeholder="'+data.replace(/_/g," ")+'"></td>';}
            }
            cdata+= '<td > <input type="number" class="form-control" name="rate[]" id="rate'+listspecdata['id']+'" value="'+listspecdata['rate']+'" placeholder="Rate" min="1" step=".01">  <input type="hidden" value="'+listspecdata['id']+'" name="specification_id[]"></td>';

        } 
        $('.resinput'+rid).html(cdata);
        $('#pulp'+listspecdata['id']).val(listspecdata['pulp']);
        $('#color'+listspecdata['id']).val(listspecdata['color']);
        $('#shade'+listspecdata['id']).val(listspecdata['shade']);
        getresponsivesadedd(listspecdata['color'] , listspecdata['id'], listspecdata['shade']);    
      }
    })
}

$(document).on('change', '.color', function (e) {
var id = $(this).attr('tag');
var value = $(this).val();
//$('.specification'+id).css('display','');
getresponsivesadedd(value, id, 0);


});

function getresponsivesadedd(value='', id='', shade='')
{ 
    if (value == 'White') {
      
      $('#shade'+id).html('<option value="White">White</option><option value="OffWhite">OffWhite</option><option value="Pink">Pink</option><option value="Yellow">Yellow</option><option value="Blue">Blue</option><option value="Green">Green</option>');
    } else if (value == 'Brown') {
      
      $('#shade'+id).html('<option value="NS">NS</option><option value="GY">GY</option>');
    }
    else{
        $('#shade'+id).html('<option value="White">White</option><option value="OffWhite">OffWhite</option><option value="NS">NS</option><option value="GY">GY</option>');
    }
    if (shade != 0) {
     $('#shade'+id).val(shade);}
}