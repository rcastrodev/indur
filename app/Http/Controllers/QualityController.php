<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyInfoRequest;
use App\Http\Requests\CompanySliderRequest;

class QualityController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'calidad')->first();
    }


    public function content()
    {
        $page = $this->page;
        $section2   = $page->sections()->where('name', 'section_2')->first()->contents()->first();
        return view('administrator.quality.content', compact('section2'));
    }
    

    public function storeSlider(CompanySliderRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/quality','custom');
        
        Content::create($data);
        return back();
    }

    public function updateSlider(CompanySliderRequest $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','custom');
        }        
        $element->update($data);
        return back();
    }

    public function storeRecorrido(Request $request)
    {
        $data = $request->all();     
        if($request->hasFile('image'))            
            $data['image'] = $request->file('image')->store('images/quality','custom');
        
        Content::create($data);
        return back();
    }

    public function updateRecorrido(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','custom');
        }      
        $element->update($data);
        return back();
    }

    public function updateInfo(CompanyInfoRequest $request)
    {
        $data = $request->all();
        $element = Content::find($request->input('id'));
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','custom');
        }
   
        $element->update($data);
        return back();
    }


    public function destroy($id)
    {
        $element = Content::find($id);
        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }

    public function sliderGetList()
    {
        $sectionSlider = $this->page
            ->sections()
            ->where('name', 'section_1')
            ->first();

        $sliders = $sectionSlider->contents()->orderBy('order', 'ASC');

        return DataTables::of($sliders)
        ->editColumn('image', function($element){
            if (Storage::disk('custom')->exists($element->image))
                return '<img src="'.Storage::disk('custom')->url($element->image).'" class="img-fluid">';
        })
        ->editColumn('content_1', function($slider){
            return $slider->content_1;
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_1', 'image'])
        ->make(true);
    }

    public function getRecorridos()
    {
        $elements = Content::where('section_id', 12)->orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->editColumn('content_1', function($element){
            return $element->content_1;
        })
        ->editColumn('image', function($element){
            if (Storage::disk('custom')->exists($element->image))
                return '<img src="'.Storage::disk('custom')->url($element->image).'" class="img-fluid">';
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-recorrido" onclick="findContent2('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_1', 'image'])
        ->make(true);
    }

    public function getDescargables()
    {
        $elements = Content::where('section_id', 13)->orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-descargables" onclick="findContent3('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_1'])
        ->make(true);
    }
}
