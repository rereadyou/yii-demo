<?php
/**
 *
 * 邮件发送， 封装好的类
 * @author weihan
 *
 */
class sendMail {
	private static $email = '';
	private static $content = '';
	
    /**
     * 邮件发送接口
     * @param mix $address	多个邮件地址，传递数组
     * @param string $subject	邮件标题
     * @param string $message	邮件内容
     * @param string $tpl	模板
     */
    public static function sendEmail($address, $subject, $message, $tpl = 'mymail') {
    	if (empty($address))
    		return ;
    	
        $mail = Yii::app()->mailer;
        $mail->IsSMTP(); // telling to send this mail using SMTP
        $mail->SetFrom($mail->Username, $mail->realname);
        $mail->AddReplyTo($mail->Username,$mail->realname);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->getView($tpl);

        if (is_array($address)) {
            foreach ($address as $v)
                $mail->AddAddress($address, $address);
        }else
            $mail->AddAddress($address, $address);

        if(!$mail->Send()) {
           echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
           echo "Message sent!";
        }
    }
}