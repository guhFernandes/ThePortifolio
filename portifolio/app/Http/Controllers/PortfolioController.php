<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function create(Request $request)
    {

        if ($request->hasFile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $filename . "_" . time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
        } else {
            $nameStore = "noImagem.png";
        }

        $db = new Portfolio;
        $db->title = $request->title;
        $db->description = $request->description;
        $db->type = $request->type;
        $db->url = $request->url;
        $db->patch = 'senai/' . $nameStore;
        $db->save();

        return view('dashboard', ['x' => "", 'msg' => "Cadastrado com sucesso!"]);
    }

    public function getPortfolioAll()
    {
        return view('dashboard', ['x' => "list", 'type' => "portfolio", 'list' => Portfolio::all()]);
    }

    public function getPortfolio(Request $request)
    {
        return view('editPortfolio', ['list' => Portfolio::find($request->id)]);
    }

    public function updatePortfolio(Request $request)
    {

        if ($request->hasFile('imagem')) {
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $filename . "_" . time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
            $nameStore = 'senai/' . $nameStore;
        } else {
            $nameStore = $request->patch;
        }
        $db = Portfolio::find($request->id);
        $db->title = $request->title;
        $db->description = $request->description;
        $db->type = $request->type;
        $db->url = $request->url;
        $db->patch = $nameStore;
        $db->save();
        
        return $this->getPortfolioAll();
    }

    public function deletePortfolio(Request $request)
    {
        $db = Portfolio::find($request->id);
        $db->delete();
        return $this->getPortfolioAll();
    }

    public function search(Request $request)
    {
        $db = Portfolio::where('description', 'LIKE', '%' . $request->search . '%')
            ->get();
        return view('dashboard', ['x' => "list", 'type' => 'portfolio', 'list' => $db]);
    }
}
