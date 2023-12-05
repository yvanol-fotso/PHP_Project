<?php 
require_once('include/header.php');
require_once('include/navbar.php');


require_once('class/Database.php');
?>


<div class="pub-principal">

   <?php 

     if (isset($_GET['article']) AND !empty($_GET['article'])) {

        $id = $_GET['article'];
        $sql =" SELECT * FROM article
                 LEFT JOIN user
                   ON article.id_user_post = user.id_user 
                 WHERE  id_arti = $id";
        $stmt = Database::getInstance()
                  ->getDb()
                  ->prepare($sql);
        $stmt->execute();
        $row =  $stmt->fetch(PDO::FETCH_ASSOC);

     }

   ?>
     <div class="listing-article">
     <div class="header-person">
       <p class="person-name" id="person-name">Publication De Mr :<font color="#09F"><?= $row['nom'] ;?> </font> at <?=$row['date'];?> </p>
       <p class="person-titre" id="person-titre">Titre:<?=$row['titre'];?></p>
       <p class="person-titre" id="person-titre">Auteur:<?=$row['auteurs'];?></p>
       <div class="person-lien" >Lien Vers Le journal :<a href="<?=$row['lien'];?> " class="lien-journal" id="lien-journal"><?=$row['lien'];?> </a> </div>
     </div>
 
     <div class="person-post">
       <p class="person-content-post"><u>Contenue: </u></p>
       <div  name="" class="pub-person-content" id="pub-person-content" > <?=$row['resume'];?> </div>
       
       <button class="back-to-post_"><a  href="espacepublication.php" class="back-to-post">Back to publication</a></button>
     </div>
 
     
   </div>   
    
 </div>
  
      <h1 class ="partie-commentaire">r&eacute;action &aacute; propos du post</h1>

     <div id="output"  onload="showCommentaire('base_commentaire/comment-list.php')">
      <!-- l'invocation de onload ici ne marche pas raison pour la quelle j'utilise l'object window en bas -->
      

     </div>
    

    
    <h1 class ="laisse-un-commentaire">r&eacute;agir</h1>

    <div class="comment-form-container">
        <!-- <form id="frm-comment"> -->
                 <div class="input-row">
                    <input type="hidden" name="comment_id" id="commentId"
                           placeholder="Name"  required="" /> 
                    <input  type="email" class="input-field"
                          name="name" id="name" placeholder="Email"  required="" />
                </div>
                <div class="input-row">
                    <textarea
                       name="comment"
                       type="text"
                       class="input-field"
                       id="comment"
                       cols=""
                       rows="3"
                       placeholder="Add a Comment"
                       required
                    ></textarea>
                </div>
                
                <div>
                    <button class="btn-submit" id="submitButton">Publish</button>
                    <div id="comment-message">Comments Added Successfully!</div>
                    <div id="comment-message2">Failed to add comments !!</div>
                </div>

        <!-- </form> -->
    </div>


     <?php 

     if (isset($_GET['article']) AND !empty($_GET['article'])) {

        $id = $_GET['article'];
        $sql =" SELECT * FROM article  WHERE  id_arti = $id";
        $stmt = Database::getInstance()
                  ->getDb()
                  ->prepare($sql);
        $stmt->execute();
        $row =  $stmt->fetch(PDO::FETCH_ASSOC);
     }

   ?>






<script type ="text/javascript">

            var totalLikes = 0;
            var totalUnlikes = 0;
           
document.getElementById('submitButton').addEventListener('click',function addCommentaire (commentId, name,comment) {
        
           commentId = document.getElementById('commentId').value;
           comment = document.getElementById('comment').value;
           name =document.getElementById('name').value;
           
            var url = "function/commentaireArticle.php";
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function ()
            {
                if (this.readyState == 4 && this.status == 200) {


                    if (xhttp.response =='')
                        {   document.getElementById('comment-message').style.display='inline-block';

                            document.getElementById('name').value = "";
                            document.getElementById('comment').value = "";
                            document.getElementById('commentId').value = "";
                            listComment();

                        } else
                        {
                            alert("Failed to add comments !");
                            // alert(<?=$_GET['article'];?>);
                            alert(xhttp.response);


                           
                          document.getElementById('comment-message2').style.display='inline-block';
                
                            return false;
                    }
                }
            };

            xhttp.open("POST", url, false);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var execute = 1;
            var parameters = "comment_id=" + commentId + "&name=" + name+"&comment="+comment +"&article="+<?=$_GET['article'];?> +"&value=" +execute;
            xhttp.send(parameters);


});


    
// document.addEvenetListener('DOMContentLoaded',post_artiId();
window.onload= listComment();


    function listComment() {

        var req = new XMLHttpRequest();
        var url = "function/commentaireArticle.php";
        
        req.onreadystatechange = function() {
            
                            
            if (this.readyState == 4 && this.status == 200)
            {
            // alert(this.response);
              
            var data =  JSON.parse(this.response); 

            var comments = "";
            var replies = "";
            var item = "";
            var parent = -1;
            var results = new Array();
            //  ici cette variable va permettre de garder le type list de la seconde liste es sa classe 
            var list1 =  document.createElement('ul');
            list1.className='outer-comment';

            var list =  document.createElement('ul');
            list.className='outer-comment';
            var  item = document.createElement('li');
            item.innerHTML=comments;
            for (var i = 0; (i < data.length); i++)
                            {
                                var commentId = data[i]['comment_id'];
                                parent = data[i]['parent_comment_id'];

                                var obj = getLikesUnlikes(commentId);
                                
                                if (parent == "0")
                                {
                                	if(data[i]['like_unlike'] >= 1) 
                                    {
                                        like_icon = "<img src='static/images/icon-like-unlike/like.png'  id='unlike_" + data[i]['comment_id'] + "' class='like-unlike'  onclick='likeOrDislike(" + data[i]['comment_id'] + ",-1)' />";
                                        like_icon += "<img style='display:none;' src='static/images/icon-like-unlike/unlike.png' id='like_" + data[i]['comment_id'] + "' class='like-unlike' onclick='likeOrDislike(" + data[i]['comment_id'] + ",1)' />";
                                    }
                                    else
                                    {
                                    	like_icon = "<img style='display:none;' src='static/images/icon-like-unlike/like.png'  id='unlike_" + data[i]['comment_id'] + "' class='like-unlike'  onclick='likeOrDislike(" + data[i]['comment_id'] + ",-1)' />";
                                        like_icon += "<img src='static/images/icon-like-unlike/unlike.png' id='like_" + data[i]['comment_id'] + "' class='like-unlike' onclick='likeOrDislike(" + data[i]['comment_id'] + ",1)' />";
                                        
                                    }
                                    
                                    comments = "\
                                        <div class='comment-row'>\
                                            <div class='comment-info'>\
                                                <span class='commet-row-label'>from</span>\
                                                <span class='posted-by'>" + data[i]['comment_sender_name'] + "</span>\
                                                <span class='commet-row-label'>at</span> \
                                                <span class='posted-at'>" + data[i]['date'] + "</span>\
                                            </div>\
                                            <div class='comment-text'>" + data[i]['comment'] + "</div>\
                                            <div>\
                                                <a class='btn-reply' onclick='postReply(" + commentId + ")'>Reply</a>\
                                            </div>\
                                            <div class='post-action'>\ " + like_icon + "&nbsp;\
                                                <span id='likes_" + commentId + "'> " + totalLikes + " likes </span>\
                                            </div>\
                                        </div>";

                                    var item = document.createElement('li');
                                    item.innerHTML = comments;
                                    list.append(item);
                                    var reply_list = document.createElement('ul');
                                    item.append(reply_list);
                                    listReplies(commentId, data, reply_list);
                                }
                            }
                            list1.append(list);
                            document.querySelector('#output').innerHTML= list1.innerHTML;
                
            }
        };
        req.open("POST", url, true);
        // req.send();
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var execute = 2;
        var parameters ="post_id=" + <?php echo $_GET['article'];?> +"&value=" +execute;
        req.send(parameters);
    }


    
function listReplies(commentId, data, list) {

for (var i = 0; (i < data.length); i++)
{

    var obj = getLikesUnlikes(data[i].comment_id);
    if (commentId == data[i].parent_comment_id)
    {
        if(data[i]['like_unlike'] >= 1) 
        {
            like_icon = "<img src='static/images/icon-like-unlike/like.png'  id='unlike_" + data[i]['comment_id'] + "' class='like-unlike'  onclick='likeOrDislike(" + data[i]['comment_id'] + ",-1)' />";
            like_icon += "<img style='display:none;' src='static/images/icon-like-unlike/unlike.png' id='like_" + data[i]['comment_id'] + "' class='like-unlike' onclick='likeOrDislike(" + data[i]['comment_id'] + ",1)' />";
            
        }
        else
        {
         like_icon = "<img style='display:none;' src='static/images/icon-like-unlike/like.png'  id='unlike_" + data[i]['comment_id'] + "' class='like-unlike'  onclick='likeOrDislike(" + data[i]['comment_id'] + ",-1)' />";
         like_icon += "<img src='static/images/icon-like-unlike/unlike.png' id='like_" + data[i]['comment_id'] + "' class='like-unlike' onclick='likeOrDislike(" + data[i]['comment_id'] + ",1)' />";
            
        }
        var comments = "\
                        <div class='comment-row'>\
                            <div class='comment-info'>\
                                <span class='commet-row-label'>from</span>\
                                <span class='posted-by'>" + data[i]['comment_sender_name'] + "</span>\
                                <span class='commet-row-label'>at</span> \
                                <span class='posted-at'>" + data[i]['date'] + "</span>\
                            </div>\
                            <div class='comment-text'>" + data[i]['comment'] + "</div>\
                            <div>\
                                <a class='btn-reply' onclick='postReply(" + data[i]['comment_id'] + ")'>Reply</a>\
                            </div>\
                            <div class='post-action'> " + like_icon + "&nbsp;\
                                <span id='likes_" + data[i]['comment_id'] + "'> " + totalLikes + " likes </span>\
                            </div>\
                        </div>";
                        
        var item = document.createElement('li');
        item.innerHTML = comments;
        var reply_list = document.createElement('ul');
        list.append(item);
        item.append(reply_list);
        listReplies(data[i].comment_id, data, reply_list);
    }
 }


}

//  repondre a un commentaire poster
           
 function postReply(commentId) {
      document.getElementById('commentId').value = commentId ;
      document.getElementById('name').focus();
}   
        
          // affichage de mes commentaire 
        //  window.onload=showCommentaire('base_commentaire/comment-list.php');
        //  equivalent encore
        //  document.addEvenetListener('DOMContentLoaded',showCommentaire('base_commentaire/comment-list.php'));


            function getLikesUnlikes(commentId)
            {   
                var xhttp = new XMLHttpRequest();
                var url = "function/commentaireArticle.php";
                
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {
                    totalLikes = this.responseText;
                  }
                }
               xhttp.open("POST", url, false);
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var execute = 3;
               var parameters = "comment_id=" + commentId +"&value=" +execute;
               xhttp.send(parameters);

            }


            function likeOrDislike(comment_id,like_unlike)
            {
                var xhttp = new XMLHttpRequest();
                var url = "function/commentaireArticle.php";
               
                xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200)
                  {

                    var resultat = JSON.parse(this.response)
                     document.getElementById('likes_'+comment_id).textContent = resultat +" likes";
                     if (like_unlike == 1) { 
                       document.getElementById('like_'+comment_id).style.display ='none';
                       document.getElementById('unlike_'+comment_id).style.display = 'initial';
                      }      

                     if (like_unlike == -1) {
                        document.getElementById('unlike_'+comment_id).style.display ='none';
                        document.getElementById('like_'+comment_id).style.display = 'initial';
                     }
                  }
              }
               xhttp.open("POST", url, true);
               xhttp. responseType ="json";
               xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               var execute = 4;
               var parameters = "comment_id=" + comment_id + "&like_unlike=" +like_unlike +"&value=" +execute;
               xhttp.send(parameters);

            }

    </script>
   



<?php  require_once('include/footer.php') ?>