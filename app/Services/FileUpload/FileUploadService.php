<?php


namespace App\Services\FileUpload;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{

    /**
     * @var
     */
    private $fileName, $disk;

    /**
     * @param UploadedFile $file
     * @param $path
     * @param null $oldFile
     * @return $this
     */
    public function handel(UploadedFile $file, $path, $oldFile = null)
    {
        if ($oldFile) {
            $this->delete($oldFile);
        }

        $this->setFileName($file->store($path, $this->getDisk()));

        return $this;
    }

    /**
     * @param $oldFile
     */
    public function delete($oldFile)
    {
        if (Storage::disk($this->getDisk())->exists($oldFile)) {
            Storage::disk($this->getDisk())->delete($oldFile);
        }
    }

    /**
     * @param $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function setDisk($disk)
    {
        $this->disk = $disk;

        return $this;
    }

    public function getDisk()
    {
        return $this->disk ?: 'public';
    }

}
