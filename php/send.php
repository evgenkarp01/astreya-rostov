<?php
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	require_once($_SERVER['DOCUMENT_ROOT'].'/lib/phpmailer/src/Exception.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/lib/phpmailer/src/PHPMailer.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/lib/phpmailer/src/SMTP.php');

$mail = new PHPMailer;
	$sendto   = "evgenkarp01@ya.ru";
	$usermail = "noreply@bosch-rostov.ru";
    $mail->setFrom($usermail, 'Обработчик почты motors.bosch-rostov.ru');
    $mail->addAddress($sendto,'Landing Page Bosch');
    $mail->addReplyTo($sendto,'Landing Page Bosch');


     $mail->isHTML(true);   


		$siteName = "Landing Page Bosch";
		$siteUrl = "motors.bosch-rostov.ru";
		$subject  = "Новое сообщение - с сайта motors.bosch-rostov.ru";
		$thema = "Модальное окно/сообщение";
		$resultat = "Мы свяжемся с вами в ближайшее время";
		$colorBg = '#419CD4';



		$msg ="";
		$msg .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$msg .= '<html xmlns="http://www.w3.org/1999/xhtml>';
		$msg .= '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$msg .= '<title>HTML LETTER</title>';
		$msg .= '<style type="text/css">';
		$msg .= '@media only screen and (min-device-width: 601px) {.content {width: 600px !important;}}
		.button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
		.button a {color: #ffffff!important; text-decoration: none;}
		.button a:hover {text-decoration: underline;}';
		$msg .= '@media only screen and (max-width: 550px), screen and (max-device-width: 550px) {.buttonwrapper {background-color: transparent!important;}
		.button a {background-color: #e05443; padding: 15px 15px 13px!important; display: block!important;}'; $msg .= '</style></head>';
		$msg .= '<body yahoo bgcolor="#f6f8f1" style="margin: 0; padding: 0; min-width: 100%; background-color: #f6f8f1;">';
		$msg .= '<!--[if (gte mso 9)|(IE)]>';
		$msg .= '<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">';
		$msg .= '<tr> <td><![endif]-->';
		$msg .= '<table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 600px;">';
		$msg .= '<tr><td bgcolor="'.$colorBg.'" style="padding: 40px 30px 20px 30px;">';
		$msg .= '<!--LOGO--><table width="100" align="left" border="0" cellpadding="0" cellspacing="0"><tr><td height="70" style="padding: 0 20px 20px 0;">';
		$msg .= '<!--ТУТ ССЫЛКА НА ЛОГО--><img src="http://'.$siteUrl.'/img/logo.png" width="100"  border="0" alt="" / ></td></tr></table><!--END-LOGO-->';
		$msg .= '<!--[if (gte mso 9)|(IE)]><table width="425" align="left" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->';
		$msg .= '<table class="col425" align="left" border="0" cellpadding="0" style="width: 100%; max-width: 300px;">';
		$msg .= '<tr><td height="70"><table width="100%" border="0" cellspacing="0">';
		$msg .= '<tr><td style="padding: 0 0 0 3px; font-size: 20px; color: #ffffff; font-family: sans-serif; letter-spacing: 5px; font-weight: bold;">Сообщение с сайта</td></tr>';
		$msg .= '<tr><td class="h1" style="padding: 5px 0 0 0; font-size: 26px; line-height: 28px; font-weight: bold; color: #153643; font-family: sans-serif;">'.$siteName.'</td></tr></table></td></tr></table>';
		$msg .= '<!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr>';
		$msg .= '<!--ТЕЛО ПИСЬМА--><tr><td class="content" bgcolor="#ffffff" style="width: 100%; max-width: 600px; padding: 30px 30px 30px 30px; border-bottom: 1px solid #f2eeed;"><table width="100%" border="0" cellspacing="0" cellpadding="0">';
		$msg .= '<!--ВСТУПЛЕНИЕ--><tr><td style="color: #153643; font-family: sans-serif; padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;">'.$thema.'</td></tr><!--/ВСТУПЛЕНИЕ-->';
		$msg .= '<!--НАЧАЛО--><tr><td style="color: #153643; font-family: sans-serif; font-size: 16px; line-height: 22px;">';
		
		
		if(isset($_POST['name'])){
			$name = htmlspecialchars($_POST['name']);
			$name = trim($name);
            $name = strip_tags($name);
			$msg .= "<p><strong>Имя клиента:</strong> ".$name."</p>\r\n";
		}else if(isset($_POST['name_footer'])){
			$name = htmlspecialchars($_POST['name_footer']);
			$name = trim($name);
            $name = strip_tags($name);
			$msg .= "<p><strong>Имя клиента:</strong> ".$name."</p>\r\n";
		}
		
		if(isset($_POST['phone'])){
			$phone = htmlspecialchars($_POST['phone']);
			$phone = trim($phone);
            $phone = strip_tags($phone);
			$msg .= "<p><strong>Контактрый телефон:</strong> ".$phone."</p>\r\n";
		}else if(isset($_POST['phone_footer'])){
			$phone = htmlspecialchars($_POST['phone_footer']);
			$phone = trim($phone);
            $phone = strip_tags($phone);
			$msg .= "<p><strong>Контактрый телефон:</strong> ".$phone."</p>\r\n";
		}

        if(isset($_POST['message_footer'])){
			$content  = nl2br($_POST['message_footer']);
			$content = strip_tags($content);
			$content = htmlspecialchars($content);
			$content = trim($content);
			$msg .= "<p><strong>Содержимое:</strong> ".$content."</p>\r\n";
		}
			
		
		
		$msg .='<!--КНОПКА Button--><table class="buttonwrapper" bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0"><tr><td class="button" height="45" style="text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;"><!--ТЕКСТ И ССЫЛКА КНОПКИ--><a style="color: #ffffff; text-decoration: none;" href="http:'.$siteUrl.'">Перейти на сайт</a></td></tr></table><!--/Button--></td></tr><!--/НАЧАЛО-->';
		$msg .= '<tr><td style="color: #153643; font-family: sans-serif; font-size: 12px; line-height: 22px;"><p><br /><br /><br /><hr>Отличного дня!<br /><strong>Обработчик</strong></p></td></tr><!--/ОКОНЧАНИЕ ПИСЬМА--></table></td></tr>';
		$msg .= '<!--Footer--><tr><td class="footer" bgcolor="'.$colorBg.'" style="padding: 20px 30px 15px 30px;">';
		$msg .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		$msg .= '<tr><td align="center" style="font-family: sans-serif; font-size: 12px; color: #ffffff;">&reg;Все права защищены!<br/><a href="'.$siteUrl.'" style="color: #ffffff; text-decoration: underline;">'.$siteUrl.'</a></td></tr>';
		$msg .= '<tr><td align="center" style="padding: 20px 0 0 0;"><table border="0" cellspacing="0" cellpadding="0"><tr>';
		$msg .= '</tr></table></td></tr></table><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></body></html>';
        $mail->CharSet = 'UTF-8';
		$mail->Subject = $subject;
	    $mail->Body = $msg;

        if($mail->send()) {
            echo "<div id='contact_successfully'>".$resultat."</div>";
        } else {
			echo "Ошибка при передаче данных";
		}


?>