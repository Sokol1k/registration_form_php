<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Database;

class ModelParticipants extends Model
{
    public static function isEmailExists($email)
    {
        $where = "email = :email";
        return Database::select("users", ["email" => $email], ["id"], $where);
    }

    public static function userСount()
    {
        $result = Database::select("users", [], null);
        return $result[0]['count'];
    }

    public static function savePhoto($path, $file)
    {
        if (!is_dir($path)) {
            mkdir($path);
        }

        $maxSize = 70;
        $quality = 75;

        if ($file['photo']['type'] == 'image/jpeg')
            $source = imagecreatefromjpeg($file['photo']['tmp_name']);
        else if ($file['photo']['type'] == 'image/png')
            $source = imagecreatefrompng($file['photo']['tmp_name']);
        else if ($file['photo']['type'] == 'image/gif')
            $source = imagecreatefromgif($file['photo']['tmp_name']);
        else
            return false;

        $wSource = imagesx($source);
        $hSource = imagesy($source);

        if ($wSource > $maxSize) { 
            $ratio = $wSource / $maxSize;
            $wDest = round($wSource / $ratio);
            $hDest = round($hSource / $ratio);
            $dest = imagecreatetruecolor($wDest, $hDest);
            imagecopyresampled($dest, $source, 0, 0, 0, 0, $wDest, $hDest, $wSource, $hSource);
            imagejpeg($dest, $path . $file['photo']['name'], $quality);
            imagedestroy($dest);
            imagedestroy($source);
        } else {
            imagejpeg($source, $path . $file['photo']['name'], $quality);
            imagedestroy($source);
        }
    }
}
