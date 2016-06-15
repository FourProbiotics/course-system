<?php

namespace App\Http\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * 发送通知
     *
     * @param $sender_uid   发送用户id
     * @param $recipient_uid    接收用户id
     * @param $title        标题
     * @param $content    内容
     */
    public function send($sender_uid, $recipient_uid, $title, $content)
    {
        if (!$recipient_uid) {
            return false;
        }

        if ($notification_id = DB::table('notification')->insertGetId(array(
            'sender_uid' => intval($sender_uid),
            'recipient_uid' => intval($recipient_uid),
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content),
            'add_time' => date('Y-m-d H:i:s', time()),
            'read_flag' => 0
        ))
        ) {
            return $notification_id;
        }
        return false;
    }

    public function send_all($sender_uid, $recipient_uids, $title, $content)
    {
        if (!is_array($recipient_uids)) {
            return false;
        }

        foreach ($recipient_uids as $key => $val)
        {
            if(!$this->send($sender_uid, $val, $title, $content))
            {
                //return false;
            }
        }

        return true;
    }

    /**
     *
     * 阅读段信息
     * @param int $notification_id 信息id
     *
     * @return array信息内容数组
     */
    public function read_notification($notification_id, $uid = null)
    {
        $notification_ids = explode(',', $notification_id);

        array_walk_recursive($notification_ids, 'intval_string');

        if ($notification_ids) {
            foreach ($notification_ids as $key => $val) {
                if (!is_numeric($val)) {
                    return false;
                }

                $notification_ids[$key] = intval($val);
            }
            DB::table('notification')
                ->where('recipient_uid', intval($uid))
                ->whereIn('notification_id', $notification_ids)
                ->update(array(
                    'read_flag' => 1
                ));

            return true;
        }
    }

    function get_notification_list($recipient_uid, $read_flag = null, $limit = null)
    {
        if (!$recipient_uid) {
            return false;
        }

        $db = DB::table('notification')->where('recipient_uid', intval($recipient_uid));

        if ($read_flag) {
            $db = $db->where('read_flag', intval($read_flag));
        }

        $result = $db->get();

        return $result;
    }

    public function get_notification_by_id($notification_id, $recipient_uid = null)
    {
        if ($notification = $this->get_notification_by_ids(array(
            $notification_id
        ), $recipient_uid)
        ) {
            return $notification[$notification_id];
        }
    }

    public function get_notification_by_ids($notification_ids, $recipient_uid = null)
    {
        if (!is_array($notification_ids)) {
            return false;
        }

        array_walk_recursive($notification_ids, 'intval_string');

        $db = DB::table('notification')->whereIn('id', $notification_ids);

        if ($recipient_uid) {
            $db = $db->where('recipient_uid', intval($recipient_uid));
        }

        if (!$notification = $db->get()) {
            return false;
        }

        foreach ($notification as $key => $val) {
            $val->recipient_user_info = model('account')->get_user_info_by_uid($val->recipient_uid);
            $val->sender_user_info = model('account')->get_user_info_by_uid($val->sender_uid);
            $notification_data[$val->id] = $val;
        }

        foreach ($notification_ids as $id) {
            $data[$id] = $notification_data[$id];
        }

        return $data;
    }
}
