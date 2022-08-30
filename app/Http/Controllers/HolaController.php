<?php
namespace App\Http\Controllers;


class HolaController extends Controller{
    // public function __invoke(string $name)
    // {
    //     return "Hola {$name}";
    // }
    public function saludo(string $name): string {
        return view("saludo", compact("name"));
    }
}
