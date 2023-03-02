<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AboutController extends Controller
{
    public function create (Request $request) {
        
        if ($request->hasFile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $filename . "_" . time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);

        }else {
            $nameStore = "noImagem.png";
        }
        
        $db = new About;
        $db->description = $request->description;
        $db->patch = 'senai/' . $nameStore;
        $db->save();

        return view('dashboard', ['x'=>"", 'msg'=>"Cadastrado com sucesso!"]);
    }

    public function getAboutAll() {
        return view('dashboard',['x'=>"list", 'type'=>"about", 'list'=> About::all()]);
    }

    public function getAbout (Request $request) {
        return view('editAbout', ['list'=> About::find($request->id)]);
    }

    public function updateAbout (Request $request) {

        if ($request->hasFile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $filename . "_" . time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
            $nameStore = 'senai/' . $nameStore;

        }else {
            $nameStore = $request->patch;
        }

        $db = About::find($request->id);
        $db->description = $request->description;
        $db->patch = $nameStore;
        $db->save();
        return $this->getAboutAll();
    }

    public function deleteAbout (Request $request) {
        $db = About::find($request->id);
        $db->delete();
        return $this->getAboutAll();
    }

    public function search(Request $request) {
        $db = About::where('description', 'LIKE', '%' . $request->search. '%')
                ->get();
        return view('dashboard',['x'=>"list", 'type'=>'about', 'list'=>$db]);
    }
}
