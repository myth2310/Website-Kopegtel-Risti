<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select('SELECT * FROM products ORDER BY created_at DESC');
        $data['result'] = $result;
        
        return view('admin.product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productForm', [
            'method'=> "POST",
            'action'=> "store",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:2048,jpeg,png,jpg', 
        ], 
        [
            "name.required" => "Please enter product name",
            "description.required" => "Please enter description",
            "image.required" => "Please insert image",
        ]);

        if ($request->file('image')){
            $image = $request->file('image')->store("/images/product");
        } 

        $product = product::create([
            'name' => $request["name"],
            'description' => $request["description"],
            'image' => $image,
        ]);

        return redirect('/product') -> with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =  product:: find($id);

        return view('admin.productForm', [
            'method'=> "PUT",
            'action'=> "/product/update/{$id}",
            'product'=> $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = product::find($id);
        $validator = $request -> validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:2048,jpeg,png,jpg',    
        ], 
        [
            "name.required" => "Please enter product name",
            "description.required" => "Please enter description",
        ]);
        
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'image|file|max:2048,jpeg,png,jpg',
            ]);
            Storage::delete($product->image);
            $path = $request->file('image')->store('images/product');
            $product->image = $path;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        return redirect('/product') -> with('success', "Data berhasil diubah!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        Storage::delete($product->image);

        $product = product::destroy($id);
        return back() -> with('success', "Data berhasil dihapus!"); 
    }
}
