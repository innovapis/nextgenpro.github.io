<?php
include 'db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>chat box</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" media="all">
<script type="text/javascript">
  function ajax() {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
      if(req.readyState == 4 && req.status == 200){
        document.getElementById('chat').innerHTML = req.responseText;
      }
    }
    req.open('GET','chat.php',true);
    req.send();
  }
setInterval(function(){ajax()},1000);
</script>
    
  </head>
  <body onload="ajax();">
    <div id="container">
        <div id="chat_box">
         <div id="chat"></div>
    </div>
    <form method="post" action="index.php">
      <input type="text" name="Name" required placeholder="enter name"/>
      <textarea name="Massage" required placeholder="enter message"></textarea>
      <input type="submit" name="submit" value="Send it">   
    </form>

    <?php
      if(isset($_POST['submit'])){

        $name = $_POST['Name'];
        $massage = $_POST['Massage'];
        $query = "INSERT INTO chat (Name,Massage) values ('$name','$massage')";
        $run = $con->query($query);
        if($run){
          echo"<embed loop='false' src='chat.wav' hidden = 'true' autoplay='true'/>";
        }

      }

    ?>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
