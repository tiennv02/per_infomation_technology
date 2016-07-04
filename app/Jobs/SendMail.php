<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Http\Objects\ObjectSendMail;
use Request;
use Illuminate\Contracts\Mail\Mailer;

class SendMail extends Job
{

    /**
     * ObjectSendMail Object.
     *
     * @var App\Http\Objects\ObjectSendMail
     */
    protected $objectSendMail;

    /**
     * Create a new SendMailCommand instance.
     *
     * @param  App\Http\Objects\ObjectSendMail $objectSendMail .
     * @return void
     */
    public function __construct(ObjectSendMail $objectSendMail)
    {
        $this->objectSendMail = $objectSendMail;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $data = [
            'title' => $this->objectSendMail->getContent(),
            'intro' => trans('front/verify.email-intro'),
            'link' => trans('front/verify.email-link'),
            'confirmation_code' => ''
        ];

        $mailer->send('emails.auth.verify', $data, function ($message) {
            $message->to($this->objectSendMail->getEmail(), $this->objectSendMail->getUsername())
                ->subject($this->objectSendMail->getTitle());
        });
    }
}
