<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Description of FileUploader
 *
 * @author guervyl
 */
class FileUploader {
    private $webPath;


    public function __construct($webPath) {
        $this->webPath = $webPath;
    }
    
    public function upload(UploadedFile $uf, $extra = "") {
        $slash = "";
        
        if(!empty($extra)){
            $slash = "/";
        }
        
        $fileName = \md5(\uniqid()).".".$uf->guessExtension();
        
        $uf->move($this->webPath."/".$extra, $fileName);
        
        return $extra.$slash.$fileName;
    }
}
