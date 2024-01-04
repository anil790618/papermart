                var editSpecification = ' <label>Select Product Specifiction<span class="text-danger"> *</span></label> <div class="row ml-3"><div class="col-5"><table class="table table-responsive-sm  size-7"> <thead ><th class="p-0">Specification</th>  <th class="p-0">Category Includes</th> <th class="p-0">Required</th>  </thead> <tbody>';
               editSpecification+= ' <tr><td class="p-0">Sub Category</td> <td class="p-0"><input type="checkbox" value="sub_category"  name="product_specification[]" class="mr-3" ';

                if(myArray.includes("sub_category") == true) { editSpecification+=' checked '; }
               editSpecification+= '> </td><td class="p-0"><input type="checkbox" value="sub_category"  name="required[]" class="mr-3"';

                if(requiredarray.includes("sub_category") == true) { editSpecification+=' checked '; }
                editSpecification+= '> </td><td class="p-0"><input type="checkbox" value="sub_category"  name="required[]" class="mr-3"';
                
               editSpecification+= '  <div class="col-3"> <input type="checkbox" value="quantity_type"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("quantity_type") == true) { editSpecification+=' checked '; }
               editSpecification+= ' > Quantity Type </div>';
               editSpecification+= ' <div class="col-3"> <input type="checkbox" value="quantity"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("quantity") == true) { editSpecification+=' checked '; }
               editSpecification+= '> Quantity </div>';
               editSpecification+= '<div class="col-3"> <input type="checkbox" value="quantity_uom"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("quantity_uom") == true) { editSpecification+=' checked '; }
               editSpecification+= ' > Quantity UOM </div>';
               editSpecification+= ' <div class="col-3"> <input type="checkbox" value="product_form"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("product_form") == true) { editSpecification+=' checked '; }
               editSpecification+= ' > Product Form  </div>';
               editSpecification+= ' <div class="col-3"><input type="checkbox" value="rate"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("rate") == true) { editSpecification+=' checked '; }
               editSpecification+= '> Rate </div>';
               editSpecification+= ' <div class="col-3"> <input type="checkbox" value="mill_name"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("mill_name") == true) { editSpecification+=' checked '; }
               editSpecification+= ' > Mill Name   </div>';
               editSpecification+= ' <div class="col-3"> <input type="checkbox" value="bf"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("bf") == true) { editSpecification+=' checked '; }
               editSpecification+= '> BF </div>';
               editSpecification+= ' <div class="col-3"> <input type="checkbox" value="type"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("type") == true) { editSpecification+=' checked '; }
               editSpecification+= '> Type</div>';
               editSpecification+= ' <div class="col-3"> <input type="checkbox" value="shade" name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("shade") == true) { editSpecification+=' checked '; }
               editSpecification+= '>Shade</div>';
               editSpecification+= ' <div class="col-3"> <input type="checkbox" value="gsm"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("gsm") == true) { editSpecification+=' checked '; }
               editSpecification+= '> GSM</div>';
               editSpecification+= ' <div class="col-3"> <input type="checkbox" value="size"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("size") == true) { editSpecification+=' checked '; }
               editSpecification+= '> size</div>';
               editSpecification+= ' <div class="col-3"> <input type="checkbox" value="size_uom" name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("size_uom") == true) { editSpecification+=' checked '; }
               editSpecification+= '> size UOM </div> ';                                                                 
               editSpecification+= ' <div class="col-3"> <input type="checkbox" value="pulp"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("pulp") == true) { editSpecification+=' checked '; }
               editSpecification+= '> Pulp</div>';
               editSpecification+= ' <div class="col-3">  <input type="checkbox" value="brightness"  name="u_product_specification[]" class="mr-3" ';

                if(myArray.includes("brightness") == true) { editSpecification+=' checked '; }
               editSpecification+= '> Brightness </div> </div>';

                                   