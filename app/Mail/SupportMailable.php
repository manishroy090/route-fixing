<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }    

    public function build()
    {
        $data_array = $this->data;

        $email = config('mail.from.address');
        $from_name = config('mail.from.name');
        $subject = $data_array['subject'];

        if($data_array['status'] == 'Open'){
            if($data_array['to'] == 'to_support'){
                $email_view_file = 'mail.supportemail';
            } else {
                $email_view_file = 'mail.customer_supportemail';
            }    
        } else {
            if($data_array['to'] == 'to_support_reply'){
                $email_view_file = 'mail.reply_supportemail';
            } else {
                $email_view_file = 'mail.reply_customer_supportemail';
            }
        }
        

        $message = $this->from($email,$from_name)
            ->subject($subject)
            ->view($email_view_file)
            ->with('data', $data_array);

        foreach ($data_array['attachment_files'] as $attachment_file){
            $attachment_file_url = public_path("support/".$attachment_file['name']);
            if($attachment_file['name'] != '' && file_exists($attachment_file_url)){
                $message->attach($attachment_file_url);
            }
        }

        return $message;

    }
}
