<?php
function sms($authkey,$message,$senderID,$number)
{
	$url = "http://mysms.sms7.biz/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authkey."&message=".urlencode($message)."&senderId=".$senderID."&routeId=1&mobileNos=".$number."&smsContentType=english";
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$output=curl_exec($ch);
	curl_close($ch);
}
