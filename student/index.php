<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/aaa/V/img/logo.png">
<link rel="stylesheet" href="../V/css/style.css"/>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/flick/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>


<title>簡易登入/註冊系統</title>

</head>

<body>



<?php
include('../top.php');
    if(!isset($_SESSION['user_id'])){ //因為需要用到JS所以不能放在head之前
      echo "<script>$('body').html('');alert('請先登入系統！');window.location.href='/aaa/register/'</script>";
    }
?>


<div class="contact">
studenttttttttttttttttttttt

</div>


<?php
include('../footer.php');
?>



</body>
</html>