<?php

namespace App\Jobs;

use App\Mail\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $to;
    private $user;
    private $lang;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to, $user, $lang = 'en')
    {
        $this->to = $to;
        $this->user = $user;
        $this->lang = $lang;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->to)
            ->locale($this->lang)
            ->cc('alexander@makklays.com.ua')
            ->bcc('alexander@makklays.com.ua')
            ->send(new VerifyEmail($this->user));
    }
}
