<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $product, $total_page;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->product->getResults($request->all(), $this->total_page);

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = kebab_case($request->name);//formata removendo espaços e caracteres especiais
            $extension = $request->file('image')->extension();

            $name_file = "{$name}.{$extension}";
            $data['image'] = $name_file;

            $upload = $request->file('image')->storeAs('products', $name_file);

            if (!$upload) {
                return response()->json(['error' => 'Fail upload'], 500);
            }
        }
        $product = $this->product->create($data);

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->with('category')->find($id);

        if (!$product) {
            return response()->json('error', 404);
        }

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = $this->product->find($id);
        $data = $request->all();

        if (!$product) {
            return response()->json('error', 404);
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if ($product->image) {
                if (Storage::exists("products/{$product->image}")) {
                    Storage::delete("products/{$product->image}");
                }
            }

            $name = kebab_case($request->name);//formata removendo espaços e caracteres especiais
            $extension = $request->file('image')->extension();

            $name_file = "{$name}.{$extension}";
            $data['image'] = $name_file;

            $upload = $request->file('image')->storeAs('products', $name_file);

            if (!$upload) {
                return response()->json(['error' => 'Fail upload'], 500);
            }
        }

        $product->update($data);

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);

        if (!$product) {
            return response()->json('error', 404);
        }

        if ($product->image) {
            if (Storage::exists("products/{$product->image}")) {
                Storage::delete("products/{$product->image}");
            }
        }

        $product->delete($id);

        return response()->json('success', 204);
    }
}
