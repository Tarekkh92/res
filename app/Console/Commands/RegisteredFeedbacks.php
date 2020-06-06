<?php

namespace Servicio\Console\Commands;
use Illuminate\Console\Command;
use Servicio\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;
use DB;



class RegisteredFeedbacks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:feedbacks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send feedbacks mail to admin daily';

   
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
        $feedbacks = DB::table('feedbacks')->select(DB::raw('*'))
        ->whereRaw('Date(created_at) = CURDATE()')->get();
        
        Mail::to('asics17g@gmail.com')->send(new SendMailable($feedbacks));
    }
}
