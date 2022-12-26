<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyInfoRequest;
use App\Http\Requests\CompanySliderRequest;

class CompanyController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'empresa')->first();
    }


    public function content()
    {
        $page = Page::where('name', 'empresa')->first();
        $section2   = $page->sections()->where('name', 'section_2')->first()->contents()->first();
        $section4   = $page->sections()->where('name', 'section_4')->first()->contents()->first();
        $section5s   = $page->sections()->where('name', 'section_5')->first()->contents()->orderBy('order', 'ASC')->get();
        return view('administrator.company.content', compact('section2', 'section4', 'section5s'));
    }
    

    public function storeSlider(CompanySliderRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/company','custom');
        
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
            
            $data['image'] = $request->file('image')->store('images/company','custom');
        }        
        $element->update($data);
        return back();
    }

    public function storeRecorrido(Request $request)
    {
        $data = $request->all();        
        Content::create($data);
        return back();
    }

    public function updateRecorrido(CompanySliderRequest $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();      
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
            
            $data['image'] = $request->file('image')->store('images/company','custom');
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
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_2', function($slider){
            return $slider->content_2;
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }

    public function getRecorridos()
    {
        $elements = Content::where('section_id', 7)->orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->editColumn('content_2', function($element){
            return $element->content_2;
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-recorrido" onclick="findContent2('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_2'])
        ->make(true);
    }
}
