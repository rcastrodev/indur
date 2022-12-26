<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyInfoRequest;
use App\Http\Requests\CompanySliderRequest;

class SecurityController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'seguridad y medio ambiente')->first();
    }


    public function content()
    {
        $page = $this->page;
        $section2   = $page->sections()->where('name', 'section_2')->first()->contents()->first();
        $section4   = $page->sections()->where('name', 'section_4')->first()->contents()->first();
        return view('administrator.security.content', compact('section2', 'section4'));
    }
    

    public function storeSlider(CompanySliderRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/security','custom');
        
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
            
            $data['image'] = $request->file('image')->store('images/security','custom');
        }        
        $element->update($data);
        return back();
    }

    public function storeRecorrido(Request $request)
    {
        $data = $request->all();     
        if($request->hasFile('image'))            
            $data['image'] = $request->file('image')->store('images/security','custom');
        
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
            
            $data['image'] = $request->file('image')->store('images/security','custom');
        }      
        $element->update($data);
        return back();
    }

    public function storeArticulo(Request $request)
    {
        $data = $request->all();     
        if($request->hasFile('image'))            
            $data['image'] = $request->file('image')->store('images/security','custom');

        if($request->hasFile('image'))            
            $data['content_3'] = $request->file('content_3')->store('images/security','custom');
        
        Content::create($data);
        return back();
    }

    public function updateArticulo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/security','custom');
        }
        
        if($request->hasFile('content_3')){
            if(Storage::disk('custom')->exists($element->content_3))
                Storage::disk('custom')->delete($element->content_3);
            
            $data['content_3'] = $request->file('content_3')->store('images/security','custom');
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
            
            $data['image'] = $request->file('image')->store('images/security','custom');
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
        $elements = Content::where('section_id', 16)->orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-recorrido" onclick="findContent2('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_1', 'image'])
        ->make(true);
    }

    public function getDescargables()
    {
        $elements = Content::where('section_id', 18)->orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->editColumn('image', function($element){
            if (Storage::disk('custom')->exists($element->image))
                return '<img src="'.Storage::disk('custom')->url($element->image).'" class="img-fluid">';
        })
        ->editColumn('content_3', function($element){
            if (Storage::disk('custom')->exists($element->content_3))
                return '<img src="'.Storage::disk('custom')->url($element->content_3).'" class="img-fluid">';
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-descargables" onclick="findContent3('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_2', 'image', 'content_3'])
        ->make(true);
    }
}
