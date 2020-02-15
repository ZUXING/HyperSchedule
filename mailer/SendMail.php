<?php
  require 'class.phpmailer.php';
  $mail = new PHPMailer(true); //建立邮件发送类
  $mail->CharSet = "UTF-8";//设置信息的编码类型
  $address = "1992599855@qq.com";//收件人地址
  $mail->IsSMTP(); // 使用SMTP方式发送
  $mail->Host = "smtp.qq.com"; //使用QQ邮箱服务器
  $mail->SMTPAuth = true; // 启用SMTP验证功能
  $mail->Username = "2037337979@qq.com"; //你的QQ服务器邮箱账号
  $mail->Password = "SnowStar"; // QQ邮箱密码
  $mail->Port = 25;//邮箱服务器端口号
  $mail->From = "2037337979@qq.com"; //邮件发送者email地址

  $mail->FromName = "测试邮件";//发件人名称
  $mail->AddAddress("$address", "ZUXING"); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
  //$mail->AddAttachment("D:\abc.txt"); // 添加附件(注意：路径不能有中文)
  $mail->IsHTML(true);//是否使用HTML格式
  $mail->Subject = "测试测试"; //邮件标题
  $mail->Body = "新年快乐"; //邮件内容，上面设置HTML，则可以是HTML
  if (!$mail->Send()) {
   echo "邮件发送失败. <p>";
   echo "错误原因: " . $mail->ErrorInfo;
   exit;
  }
?>