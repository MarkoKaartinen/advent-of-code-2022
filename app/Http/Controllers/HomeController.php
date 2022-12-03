<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class HomeController extends Controller
{
    public function __invoke()
    {
        $filesystem = new Filesystem;
        $files = $filesystem->files(base_path('app/Days'));
        $days = [];
        foreach ($files as $file){
            $days[] = str_replace('Day', '', $file->getFilenameWithoutExtension());
        }
        return view('home', compact('days'));
    }
}
