<?php

namespace App\Controllers;
use Core\View;
use App\Models\sumbang;
class Jenis extends \Core\Controller
{
    public function index()
    {
        $result = sumbang::getName();
        $data = sumbang::getSumbangan();
        View::renderTemplate("jenis/index.html", [
            'judul' => 'List Sumbangan COVID-19',
            'barang' => $result,
            'data' => $data,
            'nav' => FALSE,
            'name'=> 'all'
        ]);

    }
    public function filter()
    {
        if(!isset($_GET['submit'])) return;
        $result = sumbang::getName();
        $data = sumbang::getFilterSumbangan($_GET['submit']);
        View::renderTemplate("jenis/index.html", [
            'judul' => 'List Sumbangan ' . $_GET['submit'] . ' COVID-19',
            'barang' => $result,
            'data' => $data,
            'nav' => FALSE,
            'name' => $_GET['submit']
        ]);

    }
}