<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Models\Reminder;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending document upload email reminders to user.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Sending email
        $reminders = Reminder::all();
        $days_to_send = 0;
        $send = false;

        foreach($reminders as $reminder){
            // Checking for days to send
            if($reminder->duration == "Daily"){
                if($reminder->days_to_send == 0){
                    $send = true;
                    $days_to_send = 0;
                }
            }
            else if($reminder->duration == "Weekly"){
                if($reminder->days_to_send == 0){
                    $send = true;
                    $days_to_send = 7;
                }
                else{
                    $days_to_send = $reminder->days_to_send - 1;
                }
            }
            else if($reminder->duration == "Monthly"){
                if($reminder->days_to_send == 0){
                    $send = true;
                    $days_to_send = 30;
                }
                else{
                    $days_to_send = $reminder->days_to_send - 1;
                }
            }
            else if($reminder->duration == "Yearly"){
                if($reminder->days_to_send == 0){
                    $send = true;
                    $days_to_send = 365;
                }
                else{
                    $days_to_send = $reminder->days_to_send - 1;
                }
            }

            // Adding to queue
            if($send){
                Mail::queue('emails.reminders',[$reminder],function($m) use($reminder){
                    $m->from('no-reply@databoksi.codefortanzania.org');
                    $m->to($reminder->email)->subject('Your '.$reminder->duration.' Document Upload Reminder'); 
                });
            }

            // Update reminder days to send
            $reminder = Reminder::find($reminder->id);
            $reminder->days_to_send = $days_to_send;
            $reminder->save();

            $send = false;
        }
    }
}
