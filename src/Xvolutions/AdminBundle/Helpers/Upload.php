<?php

namespace Xvolutions\AdminBundle\Helpers;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Description of Upload
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 * @date 14/08/2014
 */
class Upload
{

    /**
     * This function is responsible to deal with the uploaded file
     * 
     * @param type $request
     * @param type $folder The destination folder
     * @param string $fileName The new generated name
     * @param type $size Size of the uploaded file
     */
    public function upload($request, $folder, &$fileName, &$size)
    {
        foreach ($request->files as $uploadedFile)
        {
            $fileName = md5(time()) . '.' . $uploadedFile["fileName"]->guessClientExtension();
            $size = filesize($uploadedFile["fileName"]);
            $uploadedFile["fileName"]->move($folder, $fileName);
        }
    }

}
