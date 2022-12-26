<?php

namespace App\Http\Controllers;

use App\Market;
use App\Product;
use App\Category;
use App\Application;
use App\SubCategory;
use App\Presentation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class MarketController extends Controller
{
    public function content()
    {
        return view('administrator.market.content');
    }

    public function create()
    {
        $categories = Category::all();        
        return view('administrator.market.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image')) 
            $data['image'] = $request->file('image')->store('images/market', 'custom');

        $market = Market::create($data);   
        
        if($request->input('categories')){
            $categories = $market->categories;
            $market->categories()->wherePivotNotIn('category_id', $request->input('categories'))->detach();
            foreach ($request->input('categories') as $category_id) {
                if(! in_array($category_id, $categories->pluck('id')->toArray()))
                    $market->categories()->attach($category_id);
            }
        }else{
            $market->categories()->detach();
        }
        
        return redirect()->route('market.content.edit', ['id' => $market->id])->with('mensaje', 'Mercado creado');
    }

    public function edit($id)
    {   
        $categories = Category::all(); 
        $market     = Market::findOrFail($id);
        return view('administrator.market.edit', compact('market', 'categories'));
    }

    public function update(Request $request)
    {   
        $data = $request->all();        
        $market = Market::find($request->input('id'));

        if($request->hasFile('image')){
            if (Storage::disk('custom')->exists($market->image))
                    Storage::disk('custom')->delete($market->image);
            
            $data['image'] = $request->file('image')->store('images/market', 'custom');
        }

        $market->update($data);        
                
        if($request->input('categories')){
            $categories = $market->categories;
            $market->categories()->wherePivotNotIn('category_id', $request->input('categories'))->detach();
            foreach ($request->input('categories') as $category_id) {
                if(! in_array($category_id, $categories->pluck('id')->toArray()))
                    $market->categories()->attach($category_id);
            }
        }else{
            $market->categories()->detach();
        }

        return back()->with('mensaje', 'Mercado editado correctamente');
    }

    public function destroy($id)
    {
        $element = Market::find($id);
        if (Storage::disk('custom')->exists($element->image)) 
            Storage::disk('custom')->url($element->image);

        $element->delete();
        return response()->json([], 200);
        
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        $elements = Market::orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->addColumn('image', function($element) {
            return '<img src="'.Storage::disk('custom')->url($element->image).'" class="img-fluid">';
        })
        ->addColumn('content', function($element) {
            return $element->content;
        })
        ->addColumn('actions', function($element) {
            return '<a href="'.route('market.content.edit', ["id" => $element->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content', 'image'])
        ->make(true);
    }
}
