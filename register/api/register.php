<?php
	  
include('../../M/db.php');
session_start();

$action="";

if(isset($_POST["action"])){
	$action =  $_POST["action"];
}else{
	$action="";
}

switch($_POST["action"]){
      
      case "logout" :      
	   session_unset();
	   session_destroy();
	   echo "success";
	   //header("location: after_header.php?no_redir=yes"); //轉址
	   exit();
	  break;



	case "t_addone":
	    
	   $user_id 	=$_POST['user_id'];
       $user_pw		=$_POST['user_pw'];
	   $name   		=$_POST['name'];
	   $phone		=$_POST['phone'];
	   $email		=$_POST['email'];
	   $identify	=$_POST['identify'];

	   // echo "link-->".$link;
		//echo "iD-->".$user_id;   //ID
		$query = "SELECT `user_id` FROM `member` WHERE `user_id`='".$user_id."';";
		//echo "query-->".$query;      //印出
    	$query  = mysql_query($query);
    	$result = mysql_num_rows($query);

		//echo "有幾個-->".$result;   //重複幾個
	   //exit;
		if((int)$result>0){
			echo "repeat"; //重複了
		}else{

			echo "add";

			$sql="INSERT INTO member(user_id,user_pw,identify,name,phone,email)
			VALUES('".$user_id."','".$user_pw."','".$identify."','".$name."','".$phone."','".$email."')";

			mysql_query($sql);

		}
		


	break;

	case "s_addone":
	    
	   $user_id 	=$_POST['user_id'];
       $user_pw		=$_POST['user_pw'];
	   $name   		=$_POST['name'];
	   $identify	=$_POST['identify'];
	   $phone		=$_POST['phone'];
	   $email   	=$_POST['email'];


	   // echo "link-->".$link;
		//echo "iD-->".$user_id;   //ID
		$query = "SELECT `user_id` FROM `member` WHERE `user_id`='".$user_id."';";
		//echo "query-->".$query;      //印出
    	$query  = mysql_query($query);
    	$result = mysql_num_rows($query);

		//echo "有幾個-->".$result;   //重複幾個
	   //exit;
		if((int)$result>0){
			echo "repeat"; //重複了
		}else{

			echo "add";

			$sql="INSERT INTO member(user_id,user_pw,identify,name,phone,email)
			VALUES('".$user_id."','".$user_pw."','".$identify."','".$name."','".$phone."','".$email."')";

			mysql_query($sql);

		}

	break;

	 case "login_check" :

      $loginid=$_POST["loginid"];
      $loginpw=$_POST["loginpw"];
      //print_r('loginid-->'.$loginid.'/');  //顯示登入ID
      //print_r('loginpw-->'.$loginpw.'/');  //顯示登入PW
      //登入check
      $sql= "select * from `member` where `user_id`='".$loginid."' and `user_pw`='".$loginpw."'";
      $result= mysql_query($sql,$link) or die (mysql_error());



	  $row = mysql_fetch_array($result);
  		//更新最後登入time
      $sql = "UPDATE `member` SET `recent_login_time` = NOW() WHERE `user_id` = '".$loginid."'";
      mysql_query($sql, $link) or die(mysql_error());

	  if(mysql_num_rows($result) !==0){

	     //session_start();
	      $_SESSION['user_id']	=$row['user_id'];    	//userid
	      $_SESSION['user_pw']	=$row['user_pw'];    	//userpw
	      $_SESSION['name']		=$row['name'];    		//姓名
	      $_SESSION['identify'] =$row['identify'];		//身分 (T/S)
		  $_SESSION['phone']	=$row['phone'];  		//電話
		  $_SESSION['email']  	=$row['email'];			//email
          
          

		  if($row['identify']=="A"){

		     echo "A"; //管理員


          }
		  else {
		     echo "M"; //會員
		  }
	  }
	  else{
	      echo "NO";
	  }

     break;



}







?>