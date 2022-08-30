<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\SendContactForm;
use App\Models\User;
use Illuminate\Contracts\View\View as View;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class ContactController extends Controller
{
    public function index():View
    {
        return view("contact.form");
    }

    public function send(ContactFormRequest $request)
    {
       try{
             //funcion dd para mostrar los datos que muestra request
            //dd($request->input());
            Mail::to(User::first())->send(
                new SendContactForm(
                    $request->input("subject"),
                    $request->input("message"),
                )
            );
            return back()
                ->with("success", "El mensaje se ha enviado correctamente.");
       } catch (\Exception $exception) {
            return back()
            ->with("error","Ha fallado el envio del mensaje: ". $exception->getMessage());
       }
    }
}
