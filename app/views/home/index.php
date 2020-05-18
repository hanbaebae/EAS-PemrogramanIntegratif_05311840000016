<?php
 
namespace App\Controllers;
use Core\View;
 
class Home extends \Core\Controller
{
    public function index()
    {
        View::renderTemplate("home/index.html", [
            'name' => '',
            'colours' => ['red', 'green', 'blue']
        ]);
    }
}
