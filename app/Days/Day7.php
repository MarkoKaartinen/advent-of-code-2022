<?php
namespace App\Days;

use App\Enums\LineTypeEnum;
use App\Helpers\DayConstructor;
use App\Interfaces\DayInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Day7 implements DayInterface
{
    public Collection $lines;
    public Collection $files;
    public int $totalDiskSpace = 70000000;
    public int $dirMaxSize = 100000;
    public int $neededSpace = 30000000;

    public function __construct($lines = null)
    {
        $this->lines = DayConstructor::construct($lines, 7);
    }

    public function part1(): int
    {
        $folderSizes = $this->getFolderSizes();
        $dirSizes = 0;
        foreach ($folderSizes as $folderSize){
            if($folderSize <= $this->dirMaxSize){
                $dirSizes += $folderSize;
            }
        }
        return $dirSizes;
    }

    public function part2(): int
    {
        $folderSizes = $this->getFolderSizes();
        $wholeSize = $folderSizes["/"];
        $currentUnUsedSpace = $this->totalDiskSpace-$wholeSize;
        $needsToBeDeletedAtLeast = $this->neededSpace-$currentUnUsedSpace;
        $suitableDeletableDirs = [];
        foreach ($folderSizes as $folderSize){
            if($folderSize >= $needsToBeDeletedAtLeast){
                $suitableDeletableDirs[] = $folderSize;
            }
        }
        $suitableDeletableDirs = collect($suitableDeletableDirs);
        return $suitableDeletableDirs->min();
    }

    private function getFolderSizes()
    {
        $curPath = '';
        $files = [];
        $folders = [];
        foreach ($this->lines as $line){
            $lineType = $this->figureOutLineType($line);
            if($lineType == LineTypeEnum::DIRECTORY){
                $folders[] = $curPath . Str::of($line)->explode(' ')->get(1);
            }
            if($lineType == LineTypeEnum::FILE){
                $fileInfo = Str::of($line)->explode(' ');
                $files[$curPath][] = [
                    'file' => $fileInfo->get(1),
                    'size' => $fileInfo->get(0),
                ];
            }
            if($lineType == LineTypeEnum::COMMAND){
                if($this->getCommand($line) == 'cd'){
                    $dir = $this->getDirFromCD($line);
                    if($dir == '..'){
                        $allButLast = Str::of($curPath)->replace('/', ' ')->trim()->explode(' ');
                        $allButLast->pop();
                        $curPath = '/'.$allButLast->implode('/');
                    }else if($dir == '/'){
                        $curPath = '/';
                    }else{
                        $curPath .= $dir;
                    }
                    if($curPath != '' && $curPath != '/'){
                        $curPath .= '/';
                    }
                }
            }
        }
        $files = collect($files);
        $this->files = $files;
        $folderSizes = [];
        foreach ($folders as $folder){
            $dirSize = 0;
            $dirSize += $this->getFileSizes($folder);
            $folderSizes[$folder] = $dirSize;
        }
        $folderSizes["/"] = $this->getFileSizes("/");
        return $folderSizes;
    }

    private function getFileSizes($folder){
        $size = 0;
        $files = $this->files->filter(function($value, $key) use ($folder){
            return Str::of($key)->startsWith($folder);
        });
        foreach ($files as $contents) {
            foreach ($contents as $file){
                $size += $file['size'];
            }
        }
        return $size;
    }

    private function getDirFromCD($line)
    {
        return Str::of($line)->explode(' ')->get(2);
    }

    private function getCommand($line)
    {
        return Str::of($line)->explode(' ')->get(1);
    }

    private function figureOutLineType(string $line): LineTypeEnum
    {
        $line = Str::of($line);
        if(is_numeric($line->explode(' ')->first())){
            return LineTypeEnum::FILE;
        }
        if($line->startsWith('$')){
            return LineTypeEnum::COMMAND;
        }
        if($line->startsWith('dir')){
            return LineTypeEnum::DIRECTORY;
        }
        return LineTypeEnum::UNKNOWN;
    }
}
