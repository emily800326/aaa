<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="../V/img/logo.png">
<link rel="stylesheet" href="../V/css/style.css"/>

<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/flick/jquery-ui.css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="api/register.js"></script></head>
<script type="text/javascript" src="../V/js/aj-address.js"></script>

<title>登入</title>

</head>

<body>

<?php

include("../top.php");

?>

<div class="contact">


	<div class="login-info">
		<div class="input">帳號：<input type ="text"     id="loginid"  /></input></div>
		<div class="input">密碼：<input type ="password" id="loginpw" /></input></div>
		<button id="submit" class="login-bt">登入</button>
		<button id="submit_add" class="login-bt">註冊</button>
	</div>


    
	<div id="addone" title="個人資料">
		<form  action="member_info.php" enctype="multipart/form-data" method="post" >
			<table>
            <tr>
    			<th>帳號:</th>
   				 <td><input type="text"  id="user_id" placeholder="4~10碼英文數字"></td>
   			</tr>
            <tr>
    			<th>密碼:</th>
   				 <td><input type="password"  id="user_pw" placeholder="6~10英文數字"></td>
   			</tr> 
   			<tr>
    			 <th>確認密碼:</th>
   				 <td><input type="password"  id="user_pw2" placeholder="再次輸入密碼"></td>
   			</tr> 
   			<tr>
    			<th>姓名:</th>
   				 <td><input type="text"  id="name"  ></td>
   			</tr>  		
   			<tr>
    			<th>電話:</th>
   				 <td><input type="text"  id="phone"  placeholder="09xx-xxxxxx"></td>
   			</tr>
            <tr>
    			<th>Email:</th>
   				 <td><input type="text"  id="email"  ></td>
   			</tr> 
 			

			</table>
		</form>
	</div>


</div>




<?php
include("../footer.php");
?>

</body>
</html>



