<?php
//    if (isset($_SESSION['id']))
// 	{
// 		  $uname=$_SESSION['uname'];
// }
		if (!empty($_COOKIE['UserName']))
		{
			$uname=$_COOKIE['UserName'];
			$upass=$_COOKIE['UserPass'];
		}

?>
当前
用户名：<?php echo $uname; ?><br />
密码：<?php echo $upass; ?><br />
<a href="<?php echo site_url('user/change')?>">修改密码</a> <br />