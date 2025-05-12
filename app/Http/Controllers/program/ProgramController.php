<?php

namespace App\Http\Controllers\program;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('front.program.index', compact('programs'));
    }
    public function show($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();

        $relatedPrograms = Program::where('id', '!=', $program->id)
            ->latest();
        
        return view('front.program.show', compact('program', 'relatedPrograms'));
    }
}