<?php

namespace App\Controllers;

use Core\View;
use app\models\sumbang;
class Sumbangan extends \Core\Controller
{
    public function index()
    {
        $result = sumbang::getName();
        View::renderTemplate("sumbangan/index.html", [
            'judul' => 'Donasi COVID-19',
            'jenis' => $result
        ]);
    }

    public function inputdata()
    {   
        $note = "";
        $barang = $_POST['jenis_sumbangan'];
        $jumlah = $_POST['jumlah'];
        if(!isset($_POST['submit'])) return;
        
        foreach($jumlah as $jm){
            if($jm == "" || $jm == 0 ) $note = "Tolong isi Jumlah Donasi anda";
        }
        foreach($barang as $brg){
            if($brg == "") $note = "Tolong Jenis Sumbangan anda";
        }
        if($_POST['name'] == "") $note = "Tolong isi nama anda";
        if($note != ""){
            $result = sumbang::getName();
            View::renderTemplate("sumbangan/index.html", [
            'judul' => 'Sumbangan COVID-19',
            'jenis' => $result,
            'alert' => $note
        ]);
        return;
        }

        if(!isset($_POST['submit'])) return;

        $p_id = sumbang::setUser( $_POST['name'], $_POST['gender'] );

        
        $iter = 0;

        foreach($barang as $brg){
            $j_id = sumbang::isThere($brg);

            if( $j_id >= 1){
                $done = sumbang::setSumbangan($p_id,$j_id,$jumlah[$iter]);
            }
            else{
                $j_id = sumbang::setJS($brg);
                $done = sumbang::setSumbangan($p_id, $j_id[0], $jumlah[$iter]);
            }
            $iter++;
        }
        $result = sumbang::getName();
        View::renderTemplate("sumbangan/index.html", [
            'judul' => 'Donasi COVID-19',
            'jenis' => $result,
            'note' => 'Terima kasih, Sumbangan anda telah berhasil dimasukkan',
        ]);

    }
}
