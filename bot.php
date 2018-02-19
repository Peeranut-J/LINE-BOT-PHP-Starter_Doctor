<?php
$access_token = 'YyUblgp0oX5FHC+FyUZNIBqtbEyL6Gy+553qbnn47vheHJdea8tjEnYZ2FPO2gCxxtkHSTderuTtDApHC6EZEeb/It0yyE9/QzWQ609ZEqkqFI0shz8X0wf2tWbk8eNpnCcZhzah9G5aKmEyEOqVGQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			if($text ==  'ขอดูข้อมูลผู้ป่วย') {
			$messages = [
				'type' => 'text',
				'text' => '-data excel-'
			];
			} else if($text == 'กรอกผลการตรวจวินิจฉัย') {
			$messages = [
				'type' => 'text',
				'text' => '-google form-'
			];
			} else if($text == 'coming soon...') {
			$messages = [
				'type' => 'text',
				'text' => 'coming soon...'
			];
			} 
			 else if($text == 'ขอทราบวิธีการใช้โปรแกรม') {
			$messages = [
				'type' => 'text',
				'text' => 'ในการใช้งาน Glau. Checker Doctor bot นั้น มีวิธีใช้งาน ดังนี้                                     1.หากต้องการตรวจสอบข้อมูลผู้ป่วย กรุณากดที่ "ขอดูข้อมูลผู้ป่วย"                                                                                       2. หากต้องการกรอกผลการตรวจวินิจฉัย กรุณากดที่ "กรอกผลการตรวจวินิจฉัย" '
			];
			} else {
			$messages = [
				'type' => 'text',
				'text' => 'หากมีคำถาม หรือต้องการใช้บริการอะไร กรุณากดปุ่มใน App Menu ขอบคุณครับ'
			];
			}

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
		
	}
}
echo "OK";