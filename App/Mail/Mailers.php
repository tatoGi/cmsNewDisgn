<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Emailers;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class Mailers extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
   
    public function __construct($data)
    {
        $this->data = $data; 
    }
    public function build()
    {

        return $this->view('admin.mail.index')->with([
			'data' => $this->data,
		]);
    }
}