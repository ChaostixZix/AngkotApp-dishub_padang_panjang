<?php

namespace App\Jobs;

use App\Mail\PesananMail;
use App\web\profilModel;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class sendPesananEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $details;

    public function __construct(array $details)
    {
        $this->details = $details;
    }

    private function profilModel()
    {
        return new profilModel();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emails = $this->profilModel()->getEmailsAdmin();
        $email = new PesananMail($this->details);
        foreach ($emails as $e)
        {
            Mail::to($e)->send($email);
        }

    }
}
