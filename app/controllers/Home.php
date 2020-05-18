<?php
 
namespace App\Controllers;
use Core\View;
 
class Home extends \Core\Controller
{
    public function index()
    {
        // View::render("home/index.php", [
        //     'name' => 'Dave',
        //     'colours' => ['red', 'green', 'blue']
        // ]);
        View::renderTemplate("home/index.html", [
            'name' => 'Dave',
            'colours' => ['red', 'green', 'blue']
        ]);
    }
}
