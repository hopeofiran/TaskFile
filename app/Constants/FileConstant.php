<?php

namespace App\Constants;

class FileConstant
{
    const TYPE_IMAGE    = "Image";
    const TYPE_VIDEO    = "Video";
    const TYPE_DOCUMENT = "Document";
    const TYPE_AUDIO    = "Audio";
    const TYPE_UNKNOWN  = "Unknown";
    const TYPES         = [
        self::TYPE_IMAGE,
        self::TYPE_VIDEO,
        self::TYPE_DOCUMENT,
        self::TYPE_AUDIO,
        self::TYPE_UNKNOWN,
    ];
}
