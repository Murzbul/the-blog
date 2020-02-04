<?php

namespace Blog\Payloads\Files;

use Illuminate\Http\UploadedFile;

interface FilesPayload
{
    public function file(): UploadedFile;
}
