<?php


namespace App\Service;


use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploaderHelper
{
    const OFFRE_IMAGE = 'offre_image';

    private $uploadsPath;

    public function __construct(String $uploadsPath)
    {
        $this->$uploadsPath = $uploadsPath;
    }


    public function uploadOffreImage(File $file): string
    {
        $destination = $this->uploadsPath.self::OFFRE_IMAGE;

        if ($file instanceof UploadedFile) {
            $originalFilename = $file->getClientOriginalName();
        } else {
            $originalFilename = $file->getFilename();
        }


        $newFilename = Urlizer::urlize(pathinfo($originalFilename, PATHINFO_FILENAME)).'-'.uniqid().'.'.$file->guessExtension();


        $file->move(
            $destination,
            $newFilename
        );

        return $newFilename;
    }
}