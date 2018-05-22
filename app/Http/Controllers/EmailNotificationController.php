<?php

namespace App\Http\Controllers;

use App\EmailNotification;
use App\Mail\NotificationWarned;
use App\Recipient;
use App\Working as Working;
use Carbon\Carbon as Carbon;
use Mail;
use Illuminate\Support\Facades\Log;


class EmailNotificationController extends Controller
{
    /**
     * If email notification enabled in control panel and the last notification email was sent at least five minutes ago,
     * So you can send email notification - $return true
     * @return bool
     */
    public function can_send()
    {
        if($email_notification_on = Working::first()->email_notification_on == 1) {
            $last_email_notification_time_send = EmailNotification::where('id', 1)->first()->updated_at;
            $next_email_notification_time_can_send = Carbon::now();
            $total_duration = $next_email_notification_time_can_send->diffInMinutes($last_email_notification_time_send);
            if($total_duration >= 5) {
                EmailNotification::where('id', 1)->update(['updated_at' => Carbon::now()]);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param $notification
     * @return String
     */
    public function send_email_notification($notification)
    {
        if($this->can_send()){
            $addressees = Recipient::all();
            if(count($addressees) >= 1){
                foreach ($addressees as $recipient){
                    Mail::to($recipient->email)->send(new NotificationWarned($notification));
                    Log::info('Send email notification for: '.$recipient->email);
                }
                return 'Send';
            } else {
                return 'Not send';
            }
        } else {
            return 'Not Send';
        }
    }
}
