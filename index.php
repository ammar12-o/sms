<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat app</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function aj() {
        var req = new XMLHttpRequest();  // Correct spelling
        req.onreadystatechange = function () {
            if (req.readyState == 4 && req.status == 200) {  // Correct spelling and case
                document.getElementById('chat').innerHTML = req.responseText;  // Correct spelling
            }
        }
        req.open('GET', 'chat.php', true);
        req.send();
    }
    setInterval(function () {
        aj();
    }, 1000);
</script>

</head>
<body onload="aj();">
    <div id="container">
        <div id="chatbox">
            <div id="chat"></div>
          
        </div>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="enter your name">
            <textarea name="msg" placeholder="enter your message"></textarea>
            <input type="submit" name="submit" value="send">
        </form>
        <?php
        if(isset($_POST['submit'])){
            $n = $_POST['name'];
            $m = $_POST['msg'];
            $insert = "insert into chat  (name , msg) values ('$n','$m')";
            $run_insert = mysqli_query($con, $insert);
       
        header('location: index.php');
    }
        ?>
    </div>



</body>
</html>