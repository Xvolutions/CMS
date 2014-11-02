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
    public function upload($request, $folder, &$fileName, &$originalFileName, &$size, &$type)
    {
        $status = true;
        foreach ($request->files as $uploadedFile)
        {
            $type = $uploadedFile->guessClientExtension();
            $originalFileName = $uploadedFile->getClientOriginalName();
            $fileName = md5(time()) . '.' . $type;
            $size = filesize($uploadedFile);
            $uploadedFile->move($folder, $fileName);
        }
        return $status;
    }

}
