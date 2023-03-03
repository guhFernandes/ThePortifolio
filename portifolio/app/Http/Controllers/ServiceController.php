<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
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

        $db = new Service;
        $db->title = $request->title;
        $db->description = $request->description;
        $db->icon = 'senai/' . $nameStore;
        $db->save();

        return view('dashboard', ['x' => "", 'msg' => "Cadastrado com sucesso!"]);
    }

    public function getServiceAll()
    {
        return view('dashboard', ['x' => "list", 'type' => "service", 'list' => Service::all()]);
    }

    public function getService(Request $request)
    {
        return view('editService', ['list' => Service::find($request->id)]);
    }

    public function updateService(Request $request)
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

        $db = Service::find($request->id);
        $db->title = $request->title;
        $db->description = $request->description;
        $db->icon = $nameStore;
        $db->save();
        return $this->getServiceAll();
    }

    public function deleteService(Request $request)
    {
        $db = Service::find($request->id);
        $db->delete();
        return $this->getServiceAll();
    }

    public function search(Request $request)
    {
        $db = Service::where('description', 'LIKE', '%' . $request->search . '%')
            ->get();
        return view('dashboard', ['x' => "list", 'type' => 'service', 'list' => $db]);
    }
}
