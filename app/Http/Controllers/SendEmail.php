<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public static function send(Request $request){
        
        $receiver   = $request['email'];
        $subject    =   "Sample Email";
        $content    =   '<div style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff;border-radius: 8px; 
                        box-shadow:  0 2px 10px rgba(0,0,0,0.1); overflow: hidden;">
                        <div style="background-color: #007bff; padding: 20px; text-align: center; color: #ffffff;">
                        <h1 style="margin: 0; font-size: 24px;">Good morning, Email Testing! ---- Dihayco, Sheinalie V. </h1>
                        </div>';
        $name       =   "MIIT BSIT4";

        try{
            Mail::html($content, function ($message) use ($receiver, $name, $subject){
                $message
                ->to($receiver, $name)
                ->subject($subject);
            });

            return[
                "success" => true,
                "message" => "Email sent successfully"
            ];
        }
        catch (\Exception $e){
            return [
                "success" => false,
                "message" => $e->getMessage()
            ];
        }
    }
}
