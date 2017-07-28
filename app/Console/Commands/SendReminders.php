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

        foreach($reminders as $reminder){
            Mail::queue('emails.reminders',[$reminder],function($m) use($reminder){
                $m->from('no-reply@databoksi.codefortanzania.org');
                $m->to($reminder->email)->subject('Your '.$reminder->duration.' Document Upload Reminder'); 
            });
        }
    }
}
