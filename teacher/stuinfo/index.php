<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/aaa/V/img/logo.png">
<link rel="stylesheet" href="../../V/css/style.css"/>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/flick/jquery-ui.css">
<link href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../V/js/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript" src="../../teacher/api/teacher.js"></script>
<script type="text/javascript" src="../../V/js/aj-address.js"></script>

<title>簡易登入/註冊系統</title>

</head>

<body>



<?php
include('../../top.php');
    if(!isset($_SESSION['user_id'])){ //因為需要用到JS所以不能放在head之前
      echo "<script>$('body').html('');alert('請先登入系統！');window.location.href='/aaa/register/'</script>";
    }
?>

<div class="contact" >

<button id="Btaddone" class="btstyle">新增一筆</button>

    <div class="tabledata">
         <table id ="table_s"  >
            <thead>
                 <tr>             
                        <th >使用者帳號</th>
                        <th >使用者密碼</th>
                        <th >姓名</th>
                        <th >身分</th>
                        <th >手機</th>    
                        <th >email</th>
                        <th >最後登入時間</th>
                        <th >刪除</th>
				</tr>
          </thead>

           <tbody>
                    <?php
                include('../../M/db.php');

                $get_pic_sql = " SELECT * FROM `member` " ;
             
                $get_pic_qry = mysql_query($get_pic_sql, $link) or die(mysql_error());
                $total_fields=mysql_num_fields($get_pic_qry);// 取得欄位數
                $total_records=mysql_num_rows($get_pic_qry); // 取得記錄筆數
                //$total_id=array();
                //$count_id=0;
                for ($i=0;$i<$total_records;$i++) {
                $row = mysql_fetch_assoc($get_pic_qry);

                //$total_id[$count_id]=$row['ID'];
                //$count_id++;

                echo '
                        <tr>
                            <td>'.$row['user_id'].'</td>
                            <td>'.$row['user_pw'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>';       	         
					              if($row['identify']=="A"){
					                echo '管理員';
					              }else if($row['identify']=="M"){
					                 echo '會員';
					              }       
	                 echo' </td>
                            <td>'.$row['phone'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['recent_login_time'].'</td>
                            <td><button onclick="delCheck()"><a href=../api/delete.php?ID='.$row['ID'].' >刪除</a></button></td>
                        </tr>';

                 }
                //將陣列以欄位名索引<td>'.$row['class'].'</td>
                ?>
           </tbody>
    </table>

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
    			<th>身份:</th>
   				 <td> <select id="identify"><option value="A">管理員</option>
                                          <option value="M">會員</option></select></td>
   			</tr> 
        <tr>
          <th>手機:</th>
           <td><input type="text"  id="phone"  placeholder="09xx-xxxxxx"></td>
        </tr>       
        <tr>
          <th>e-mail:</th>
           <td><input type="text"  id="email"  ></td>
        </tr>
			</table>
		</form>
	</div>




</div>


<?php
include('../../footer.php');
?>



</body>
</html>