
$(document).ready(function() {

	var accountstatus = $('#approved').val();
	if(accountstatus == 0){
		var approvaltag = getCookie("approval");
		 if(approvaltag == ''){
		  	$("#welcomeForm").modal('show');
		  	document.cookie = "approval=notified";
		  	
		  }
			// $("#welcomeForm").modal('show');

			function getCookie(cname) {

		  let name = cname + "=";
		  let ca = document.cookie.split(';');
		  for(let i = 0; i < ca.length; i++) {
		    let c = ca[i];
		    while (c.charAt(0) == ' ') {
		      c = c.substring(1);
		    }
		    if (c.indexOf(name) == 0) {
		      return c.substring(name.length, c.length);
		    }
		  }
		  return "";
		}
	}


 $(document).on('click', '.logout', function () {
     	
      document.cookie = "approval= ";

   });
	

});





















