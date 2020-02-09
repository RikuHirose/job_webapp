<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyApplyMailable extends Mailable
{
    use Queueable, SerializesModels;

    private $application;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view         = 'emails.company.apply';
        $subject      = '【'.config('app.name').'】求人応募の通知';

        return $this->view($view, [
            'company' => $this->application->company,
            'job'     => $this->application->job,
            'user'    => $this->application->user,
        ])->subject($subject);
    }
}
