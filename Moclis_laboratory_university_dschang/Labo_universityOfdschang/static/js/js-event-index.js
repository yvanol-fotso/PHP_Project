window.onload = listEvenPass(); 
window.onload = listEvenCome();

             // var execute = 1;


            function listEvenPass(execute = 2){

               var xhttp = new XMLHttpRequest();
                var url = "function/another-index.php";
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {
                     document.getElementById('inputEventPass').innerHTML = this.response;
                     // alert(this.response); //debogage
                    return true;
                  }
                };
               xhttp.open("POST", url, true);
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var parameters = "value=" + execute;
               xhttp.send(parameters);
            }


             function listEvenCome(execute = 3){

               var xhttp = new XMLHttpRequest();
                var url = "function/another-index.php";
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {
                     document.getElementById('inputEventCome').innerHTML = this.response;
                     // alert(this.response); //debogage
                    return true;
                  }
                };
               xhttp.open("POST", url, true);
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var parameters = "value=" + execute;
               xhttp.send(parameters);
            }

            