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
        if(!is_array($recipient_uid))
        {
            $recipient_uids = explode(',', $recipient_uid);
        }
        else
        {
            $recipient_uids = $recipient_uid;
        }


        if ($message_id = DB::table('messages')->insertGetId(array(
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content),
            'sender_uid' => intval($sender_uid),
            'recipient_uid' => serialize($recipient_uids),
            'add_time' => date('Y-m-d H:i:s', time()),
        ))
        ) {
            //发送通知
            //model('Notification')->send_all($sender_uid, $recipient_uids, $title, $content);
        }

        return $message_id;
    }

    function get_message_list()
    {
        $db = DB::table('messages');

        $result = $db->get();

        return $result;
    }

    function delete_message_by_id($id)
    {
        DB::table('messages')->where('id', $id)->delete();

        return true;
    }
}
