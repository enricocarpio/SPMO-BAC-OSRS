<?php

namespace App\Mail;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $supplier;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    $password = $this->supplier->email.'_123456789';  

    $user = User::where('email',$this->supplier->email)->first();
    
    if(!$user)
    {
        $user =  User::create([
                    'email' => $this->supplier->email,
                    'name'  => $this->supplier->name,
                    'password' => Hash::make($password),
                    'supplier_id' => $this->supplier->id,
        ]);
    }
    
       
    return $this->markdown('emails.send.mail')
                ->with([
                    'user' => $this->supplier->email,
                    'password' => $password,
                ]);
    }
}
?>