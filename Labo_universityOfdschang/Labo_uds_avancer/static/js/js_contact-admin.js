
document.getElementById('send_admin').addEventListener('click',function contact_admin() {

	var nameSeneder = document.getElementById('FullName').value;
	var emailSeneder = document.getElementById('Email_sender').value;
	var messageSeneder = document.getElementById('message_sender').value;


	var xhttp = new XMLHttpRequest();
    var url ="function/another-index.php";

		 xhttp.onreadystatechange = function ()
		 {
			 if (this.readyState == 4 && this.status == 200) {
				  // alert(this.response);

				 var data =  JSON.parse(this.response);
		         
				    if (data['succes'] == -1)
					 { 
					    error_contact();						                   
					 }

					 if (data['succes']== 1 ){
						good_contact();			
				     }

			 }else{
			 	// alert("Failed to contact Us!");
			    return false;
			 }

		 }

		 xhttp.open("POST", url, true);
		 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 var execute = 8;	 
		 var parameters = "email=" +emailSeneder+ "&nom=" +nameSeneder+ "&message="+messageSeneder + "&value=" +execute;
		 xhttp.send(parameters);

});

function error_contact() {
	 document.getElementById('error_succes').style.display= 'inline-block';
	 document.getElementById('error_succes').textContent= 'Failed Please Try Aigain';
	 document.getElementById('error_succes').style.color= 'red';	
}

function good_contact() {
	 document.getElementById('error_succes').style.display= 'inline-block';
	 document.getElementById('error_succes').style.color= 'green';
     document.getElementById('FullName').value="";
     document.getElementById('Email_sender').value="";
     document.getElementById('message_sender').value="";
                 	
}