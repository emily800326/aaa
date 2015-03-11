<?php
session_start();
     $d_user_id  ='';
     $d_user_pw  ='';
     $d_name='';
     $d_identify='';

if( isset($_SESSION['user_id']) )//登入
   { echo '<script type="text/javascript">
            $(document).ready(function (){
            	$("#Btlogin").hide();
            	$("#Btlogout").show();
            	$("#Btuserinfo").show();		
            })</script>';

		   if ($_SESSION['identify']=="A"){//管理員
		           echo '<script type="text/javascript">
		            $(document).ready(function (){
		            	$("#Btstuinfo").show();
		            })</script>';

		   }elseif ($_SESSION['identify']=="M") {//會員
		   	        echo '<script type="text/javascript">
		            $(document).ready(function (){
		                $("#Btstuinfo").hide();
		            })</script>'; 
           }

     $d_user_id  =$_SESSION['user_id'];
     $d_user_pw  =$_SESSION['user_pw'];
     $d_name	 =$_SESSION['name'];
     $d_identify =$_SESSION['identify'];
     
   }
    else //未登入
    	   { echo '<script type="text/javascript">
            $(document).ready(function (){
            	$("#Btlogin").show();
            	$("#Btlogout").hide();	
            	$("#Btuserinfo").hide();
            	$("#Btstuinfo").hide();
	
            })</script>';}


echo'
<script type="text/javascript">

$(document).ajaxError(function(e, jqxhr, settings, exception) {  

  if (jqxhr.readyState == 0 || jqxhr.status == 0) { 
               
    return;
  }  
});  

 $(document).ready(function (){

    
 	<!-- script-nav -->
	$("span.menu").click(function(){
		$("ul.navigatoin").slideToggle("slow" , function(){
		});
	});			

    <!-- logout -->
	$("#Btlogout").click(function(){
		
		$.ajax({
            url: "http://140.115.126.235/aaa/register/api/register.php",
            type: "post",
            datatype:"json",
            data:
		 {		    
		    action:"logout"
		 },
            
            error:function(xhr, ajaxOptions, thrownError){ 
            	 console.log(xhr.status);
                 },

            success: function(data) {
              if (data == "success") {
                alert("成功登出!歡迎再次登入!!!");
                location.href = "http://140.115.126.235/aaa/index.php";
              					     }
                                    }
          });
	});	
	
	


	})

</script>


<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="logo">
				<a href="/index.php"><img src="/aaa/V/img/logo.png" ></a>
			</div>
			<div class="webname">
				<font size="7"><b>簡易登入/註冊系統</b></font>
			</div>
				<div class="header-right">
					<div class="menu">
						<ul class="navigatoin">
						  <li><a href="/aaa/index.php" class="active">首頁</a></li>
						  <li><a href="/aaa/news">最新消息</a></li>
						  <li><a href="/aaa/student/task">產品介紹</a></li>
						  
						  <li><a href="/aaa/teacher/stuinfo" id="Btstuinfo">會員資料管理</a></li>
						  <li><a href="/aaa/userinfo" id="Btuserinfo">';echo"".$d_name."";echo'</a></li>
						  <li><a href="/aaa/register" class="active" id="Btlogin">登入</a></li>
						  <li><a class="active CursorPointer" id="Btlogout">登出</a></li>
						</ul>  
					</div>
				</div>					
		</div>
	</div>
</div>
	
<div class="line">
	<img src="/aaa/V/img/line.png"  />
	<div class="clearfix"> </div>
</div>
	

  ';


?>
