<?php

namespace App\Http\Controllers;

use App\Presentation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;


class PresentationController extends Controller
{
    public function content()
    {
        return view('administrator.presentation.content');
    }

    public function store(Request $request)
    {
        $content = Presentation::create($request->all());
        return response()->json(['tableReload' => true],201);
    }

    public function update(Request $request)
    {
        Presentation::find($request->input('id'))->update($request->all());
        return response()->json([], 200);
    }

    public function findContent($id)
    {
        $content = Presentation::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroy($id)
    {
        Presentation::find($id)->delete();;
        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $elements = Presentation::all();
        return DataTables::of($elements)
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
}
