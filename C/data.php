<?php
	  
include('../M/db.php');
session_start();

$action="";

if(isset($_POST["action"])){
	$action =  $_POST["action"];
}else{
	$action="";
}

switch($_POST["action"]){
      



	case "changeinfo":
	   $type = $_POST["type"];
		//include('../M/db.php');	
		switch ($type) {
		
			case "t_info":
			   $name   		=$_POST['name'];
			   $phone  		=$_POST['phone'];
			   $email		=$_POST['email'];

			  

				mysql_query("UPDATE `member`    SET `name` 			= '".$name."',
													`phone` 		= '".$phone."',
													`email` 		= '".$email."',	
													`update_time` 	= NOW()
													WHERE `user_id` = '".$_SESSION['user_id']."'",$link) or die(mysql_error());
				if(mysql_error()){
					exit('{"Error":"Error"}');
				}else{
					exit('{"Success":"Success"}');
				}
  	 		break;

  	 		case "s_info":
			   $name   		=$_POST['name'];
			   $phone  		=$_POST['phone'];
			   $email		=$_POST['email'];
			   
			  
				mysql_query("UPDATE `member`    SET `name` 			= '".$name."',
													`phone` 		= '".$phone."',
													`email` 		= '".$email."',	
													`update_time` 	= NOW()
													WHERE `user_id` = '".$_SESSION['user_id']."'",$link) or die(mysql_error());
				if(mysql_error()){
					exit('{"Error":"Error"}');
				}else{
					exit('{"Success":"Success"}');
				}
  	 		break;
  	 		
  	 		case "pw":
					$oldpw = $_POST['oldpw'];
					$newpw = $_POST['newpw'];
			  

				mysql_query("UPDATE `member` SET `user_pw` 	    = '".$newpw."',
													`update_time` 	= NOW()
													WHERE `user_id` = '".$_SESSION['user_id']."'",$link) or die(mysql_error());
				if(mysql_error()){
					exit('{"Error":"Error"}');
				}else{
					exit('{"Success":"Success"}');
				}
  	 		break;



        }


}




?>