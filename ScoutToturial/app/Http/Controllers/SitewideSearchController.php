<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class SitewideSearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->search;

        $files = File::allFiles(app()->basePath().'/app/Models');

        collect($files)->map(function(SplFileInfo $file){
            $filename = $file->getRelativePathname();
            if(substr($filename,-4) !== '.php'){
                return null;
            }
            return substr($filename,0,-4);
        });
    }
}
