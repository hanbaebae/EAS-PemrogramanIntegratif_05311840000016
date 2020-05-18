<?php
 
namespace App\Models;
 
use Core\Model;
use PDO;
use PDOException;
 
class Sumbang extends Model
{
 
    public static function getName()
    {

        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT `barang` FROM `jenis_sumbangan` ORDER BY `barang`');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function setUser($name, $gender)
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO `penyumbang`(`name`, `gender`) VALUES ('". $name ."', ". $gender .")");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $db->lastinsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function isThere($barang)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT `id` FROM `jenis_sumbangan` WHERE `barang`='". $barang ."' LIMIT 1");
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if($results < 1) return FALSE;
            return $results["id"];

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function setJS($barang)
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO `jenis_sumbangan`(`barang`) VALUES ('".$barang."')");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $db->lastinsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function setSumbangan($p_id,$j_id,$jumlah)
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO `sumbangan`(`p_id`, `j_id`, `jumlah`) VALUES ('".$p_id."' ,'".$j_id."','".$jumlah."')");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getSumbangan()
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT (@cnt := @cnt + 1) AS nomer, b.name, c.barang j_id, a.jumlah, b.gender 
            FROM `sumbangan` a
            CROSS JOIN (SELECT @cnt := 0) AS dummy
            INNER JOIN penyumbang b ON b.id = a.p_id
            INNER JOIN jenis_sumbangan c ON c.id=a.j_id
            WHERE 1");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public static function getFilterSumbangan($name)
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT (@cnt := @cnt + 1) AS nomer, b.name, c.barang j_id, a.jumlah, b.gender
            FROM `sumbangan` a
            CROSS JOIN (SELECT @cnt := 0) AS dummy
            INNER JOIN penyumbang b ON b.id = a.p_id
            INNER JOIN jenis_sumbangan c ON c.id=a.j_id
            WHERE c.name= '".$name."'");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
