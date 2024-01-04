window.onpopstate = function(e) { // executed when using the back button for example
   var curl = location.href; 
   var rurl = curl.replace(base_url, "");
   var burl = rurl.split("/");  
 
   if(typeof burl[1] === "undefined")
   {
      if(rurl == "dashboard"){getDashboard();}
      if(rurl == "customer"){getCustomer();}
      if(rurl == "product-category"){getProductCategory();}
      if(rurl == "product-type"){getProductType();}
      
   }
   else if(typeof burl[1] !== "undefined")
   {   
      // if(burl[0] == "editcustomer"){getEditCustomer(burl[1]);}
     
   }
   else if(typeof burl[2] !== "undefined")
   {   

   }
}