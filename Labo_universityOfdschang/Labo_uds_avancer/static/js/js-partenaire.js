window.onload = listPartenaire();


      
            function listPartenaire(execute = 10){

               var xhttp = new XMLHttpRequest();
                var url = "function/another-index.php";
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {
                     document.getElementById('member-ship').innerHTML = this.response;
                     // alert(this.response); //debogage
                    return true;
                  }
                };
               xhttp.open("POST", url, true);
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var parameters = "value=" + execute;
               xhttp.send(parameters);
            }