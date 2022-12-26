<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Market;
use App\Content;
use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setDescription($this->data->description);

        /** Secciones de página */
        $sections = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get(); // sliders
        $section2  = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3s  = $sections->where('name', 'section_3')->first()->contents()->where('order', '<>', 'DD')->orderBy('order', 'ASC')->get();
        $section4  = $sections->where('name', 'section_4')->first()->contents()->first();
        $products = Product::where('outstanding', 1)->orderBy('order', 'ASC')->take(4)->get();
        return view('paginas.index', compact('section1s', 'section2', 'section3s', 'products', 'section4'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        SEO::setTitle('empresa');
        SEO::setDescription($this->data->description);
        /** Secciones de página */
        $sections   = $page->sections;
        $sliders    =  $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get(); //sliders
        $company    =  $sections->where('name', 'section_2')->first()->contents()->first(); // contenido empresa
        $section3s  = $sections->where('name', 'section_3')->first()->contents()->orderBy('order', 'ASC')->get();
        $section4  = $sections->where('name', 'section_4')->first()->contents()->first();
        $section5s  = $sections->where('name', 'section_5')->first()->contents()->orderBy('order', 'ASC')->get();
        return view('paginas.empresa', compact('sliders', 'company', 'section3s', 'section4', 'section5s'));
    }

    public function productos(Request $request)
    {
        if(! $request->get('b')){
            $categories = Category::orderBy('order', 'ASC')->get();
            $products = collect([]);
        }else{
            $products = Product::where('name', 'like', "%{$request->get('b')}%")->orderBy('order', 'ASC')->get(); 
            $categories = collect([]);
        }

        if (count($categories) or count($products)) {
            SEO::setTitle("productos");
            SEO::setDescription($this->data->description);   
        }
        
        return view('paginas.productos', compact('categories', 'products'));
    }
    
    public function categoria($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->subCategories;
        $categories = Category::orderBy('order', 'ASC')->get();
        
        return view('paginas.productos-por-categoria', compact('category', 'categories', 'products'));
    }

    public function subCategoria($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $products = $subCategory->products;
        $categories = Category::orderBy('order', 'ASC')->get();
        return view('paginas.productos-por-subcategoria', compact('subCategory', 'categories', 'products'));
    }

    public function producto(Request $request, Product $product)
    {
        $categories = Category::orderBy('order', 'ASC')->get();
        if ($product) {
            SEO::setTitle($product->name);
            SEO::setDescription($product->description);
        }
        $relatedProducts = $product->subCategory->products()->where('id', '<>', $product->id)->inRandomOrder()->get();
        if(count($relatedProducts) > 2)
            $relatedProducts = $relatedProducts->take(2);
            
        return view('paginas.producto', compact('product', 'categories', 'relatedProducts'));
    }

    public function mercados()
    {
        $mercados = Market::orderBy('order', 'ASC')->get();
        return view('paginas.mercados', compact('mercados'));
    }

    public function mercado(Market $market)
    {
        $mercado = $market;
        return view('paginas.mercado', compact('mercado'));
    }

    public function calidad()
    {
        $page = Page::where('name', 'calidad')->first();
        SEO::setTitle('calidad');
        SEO::setDescription($this->data->description);
        /** Secciones de página */
        $sections   = $page->sections;
        $sliders    =  $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get(); //sliders
        $section2    =  $sections->where('name', 'section_2')->first()->contents()->first(); // contenido empresa
        $section3s  = $sections->where('name', 'section_3')->first()->contents()->orderBy('order', 'ASC')->get();
        $section4s  = $sections->where('name', 'section_4')->first()->contents()->orderBy('order', 'ASC')->get();
        return view('paginas.calidad', compact('sliders', 'section2', 'section3s', 'section4s'));
    }

    public function seguridad()
    {
        $page = Page::where('name', 'seguridad y medio ambiente')->first();
        SEO::setTitle('seguridad y medio ambiente');
        SEO::setDescription($this->data->description);
        /** Secciones de página */
        $sections   = $page->sections;
        $sliders    =  $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get(); //sliders
        $section2    =  $sections->where('name', 'section_2')->first()->contents()->first(); // contenido empresa
        $section3s  = $sections->where('name', 'section_3')->first()->contents()->orderBy('order', 'ASC')->get();
        $section4  = $sections->where('name', 'section_4')->first()->contents()->first();
        $section5s  = $sections->where('name', 'section_5')->first()->contents()->orderBy('order', 'ASC')->get();
        return view('paginas.seguridad', compact('sliders', 'section2', 'section3s', 'section4', 'section5s'));
    }

    public function solicitudDePresupuesto()
    {
        $page = Page::where('name', 'solicitud de presupuesto')->first();
        SEO::setTitle("solicitud de presupuesto");
        SEO::setDescription($this->data->description);
        return view('paginas.cotizacion');
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto");
        SEO::setDescription($this->data->description);       
        return view('paginas.contacto');
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);  
        if (Storage::disk('custom')->exists($producto->extra)) {
            return Response::download($producto->extra);  
        }else{
            return back();
        }
    }

    public function descargable($id, $campo)
    {
        $content = Content::findOrFail(intval($id));
        if (Storage::disk('custom')->exists($content->$campo)) {
            return Response::download($content->$campo);  
        }else{
            return back();
        }
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->extra))
            Storage::disk('public')->delete($product->extra);

        $product->extra = null;
        $product->save();

        return response()->json([], 200);
    }
}
