<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Application;
use App\SubCategory;
use App\Presentation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.product.content');
    }

    public function create()
    {
        $subCategories = SubCategory::all();        
        return view('administrator.product.create', compact('subCategories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('extra')) 
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');

        if($request->has('outstanding')) 
            $data['outstanding']  = 1;
        else
            $data['outstanding']  = 0;

        $product = Product::create($data);                    
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }
 
        return redirect()->route('product.content.edit', ['id' => $product->id])->with('mensaje', 'Producto creado');
    }

    public function edit($id)
    {   
        $subCategories = SubCategory::all(); 
        $product = Product::findOrFail($id);
        $applications   = Application::all();
        $presentations  = Presentation::all();
        return view('administrator.product.edit', compact('product', 'subCategories', 'applications', 'presentations'));
    }

    public function update(ProductRequest $request)
    {   
        $data = $request->all();

        if($request->has('outstanding')) 
            $data['outstanding']  = 1;
        else
            $data['outstanding']  = 0;
        
        $product = Product::find($request->input('id'));

        if($request->hasFile('extra')){
            if (Storage::disk('custom')->exists($product->extra))
                    Storage::disk('custom')->delete($product->extra);
            
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');
        }

        $product->update($data);        
                    
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }

        $applications = $product->applications;
        if($request->input('applications')){
            $product->applications()->wherePivotNotIn('application_id', $request->input('applications'))->detach();

            foreach ($request->input('applications') as $application_id) {
                if(! in_array($application_id, $applications->pluck('id')->toArray()))
                    $product->applications()->attach($application_id);
            }
        }else{
            $product->applications()->detach();
        }

        $presentations = $product->presentations;
        if ($request->has('presentations')) {
            if($request->input('presentations')){
                $product->presentations()->wherePivotNotIn('presentation_id', $request->input('presentations'))->detach();
    
                foreach ($request->input('presentations') as $presentation_id) {
                    if(! in_array($presentation_id, $presentations->pluck('id')->toArray()))
                        $product->presentations()->attach($presentation_id);
                }
            }
        }else{
            $product->presentations()->detach();
        }


        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        $products = Product::orderBy('order', 'ASC');
        return DataTables::of($products)
        ->addColumn('description', function($product) {
            return $product->description;
        })
        ->addColumn('subCategory', function($product) {
            return $product->subCategory->name;
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'description'])
        ->make(true);
    }
}
