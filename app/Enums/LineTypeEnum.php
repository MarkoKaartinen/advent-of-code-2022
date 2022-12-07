<?php
namespace App\Enums;

enum LineTypeEnum
{
    case COMMAND;
    case DIRECTORY;
    case FILE;
    case UNKNOWN;
}
