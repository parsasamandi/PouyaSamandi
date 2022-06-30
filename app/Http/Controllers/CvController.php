<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Refree;
use App\Models\Skill;
use Illuminate\Http\Request;

class CvController extends Controller
{
    // Show
    public function show() {

        $vars['experiences'] = Experience::all();           
        $vars['skills'] = Skill::all();   
        $vars['refrees'] = Refree::all(); 

        return view('cv', $vars);
    }
    
}
