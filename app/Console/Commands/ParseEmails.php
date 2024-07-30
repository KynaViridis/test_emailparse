<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Html2Text\Html2Text;

class ParseEmails extends Command
{
    protected $signature = 'emails:parse';
    protected $description = 'Parse raw email content and extract plain text body';

    public function handle()
    {
        $emails = DB::table('successful_emails')->whereNull('raw_text')->get();

        foreach ($emails as $email) {
            $plainText = new Html2Text($email->email);
            $plainTextContent = $plainText->getText();
            
            DB::table('successful_emails')
                ->where('id', $email->id)
                ->update(['raw_text' => $plainTextContent]);
        }

        $this->info('Emails parsed successfully.');
    }
}
