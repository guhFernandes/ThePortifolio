<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function create (Request $request) {

    }

    public function getAboutAll () {
        return About::all();
    }

    public function getAbout (Request $request) {
        return About::find($request->id);
    }

    public function updateAbout (Request $request) {

    }

    public function deleteAbout (Request $request) {

    }

    public function search(Request $request) {

    }
}
