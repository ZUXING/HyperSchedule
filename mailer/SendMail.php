<?php
  require 'class.phpmailer.php';
  $mail = new PHPMailer(true); //�����ʼ�������
  $mail->CharSet = "UTF-8";//������Ϣ�ı�������
  $address = "1992599855@qq.com";//�ռ��˵�ַ
  $mail->IsSMTP(); // ʹ��SMTP��ʽ����
  $mail->Host = "smtp.qq.com"; //ʹ��QQ���������
  $mail->SMTPAuth = true; // ����SMTP��֤����
  $mail->Username = "2037337979@qq.com"; //���QQ�����������˺�
  $mail->Password = "SnowStar"; // QQ��������
  $mail->Port = 25;//����������˿ں�
  $mail->From = "2037337979@qq.com"; //�ʼ�������email��ַ

  $mail->FromName = "�����ʼ�";//����������
  $mail->AddAddress("$address", "ZUXING"); //�ռ��˵�ַ�������滻���κ���Ҫ�����ʼ���email����,��ʽ��AddAddress("�ռ���email","�ռ�������")
  //$mail->AddAttachment("D:\abc.txt"); // ��Ӹ���(ע�⣺·������������)
  $mail->IsHTML(true);//�Ƿ�ʹ��HTML��ʽ
  $mail->Subject = "���Բ���"; //�ʼ�����
  $mail->Body = "�������"; //�ʼ����ݣ���������HTML���������HTML
  if (!$mail->Send()) {
   echo "�ʼ�����ʧ��. <p>";
   echo "����ԭ��: " . $mail->ErrorInfo;
   exit;
  }
?>