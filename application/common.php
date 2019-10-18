<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use PHPMailer\PHPMailer\PHPMailer;
// 应用公共文件
function  sendEmail($sjr,$title,$content){
	// var_dump($sjr);exit;
	try{
		$mail = new PHPMailer(true);
		$mail->IsSMTP();       // 设定使用SMTP服务，SMTP简单邮件传输协议

		$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
		$mail->SMTPAuth = true; //开启认证
		$mail->Port = 25;       // SMTP服务器的端口号
		$mail->Host = "smtp.163.com"; // SMTP 服务器
		$mail->Username = "15057219085@163.com";   //SMTP服务器用户名，邮箱号
		$mail->Password = "1994fcc1123";          //SMTP服务器密码 授权码
		//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could not execute: /var/qmail/bin/sendmail ”的错误提示

		$mail->AddReplyTo("15057219085@163.com","这里输入回复邮件内容");//回复地址（收件人回复。发件人可以看到回复信息）  第一个参数是发件人邮箱，第二个为快捷回复的内容
		$mail->FromName = "enen"; //发件人的名称
		$mail->From = "15057219085@163.com"; //发件人邮箱

		$to = $sjr;              //收件人地址
		$mail->AddAddress($to);
		$mail->Subject = $title; //邮件标题
		$mail->Body = $content;  //邮件内容
		$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
		$mail->WordWrap = 80; // 设置每行字符串的长度
		//$mail->AddAttachment("f:/test.png"); //可以添加附件
		$mail->IsHTML(true);

		$mail->Send(); //发送邮件
		return true;
	}catch(phpmailerException $e){
		return  false;
	}
}