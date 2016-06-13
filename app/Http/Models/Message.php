<?php

namespace App\Http\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function send_message($sender_uid, $recipient_uid, $title, $content)
    {
        if (!$sender_uid OR !$recipient_uid OR !$content OR !$title) {
            return false;
        }

        $recipient_uids = explode(';', $recipient_uid);

        if ($message_id = DB::table('messages')->insert(array(
            'title' => $title,
            'content' => htmlspecialchars($content),
            'sender_uid' => intval($sender_uid),
            'recipient_uid' => serialize($recipient_uids),
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ))
        ) {
            //逐个发送通知
            foreach ($recipient_uids as $key => $uid) {
                model('Notification')->send($sender_uid, $uid, $title, $content);
            }
        }

        return $message_id;
    }
}
