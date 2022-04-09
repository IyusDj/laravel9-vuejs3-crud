<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // API
    public function index()
    {   
        // Get products
        $products = Product::all();
        return response()->json([
            'message' => 'Success view data products',
            'products' => $products
        ], 200);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'description'   => 'required',
            'photo'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type'          => 'required',
            'quantity'      => 'required',
            'price'         => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create products
        try {
            $product = new Product();  
            
            // Handling file image
            if($request->hasFile('photo')) {
                //upload image versi 1
                // $file = $request->file('photo');
                // $file_name = time() . '_' . $file->getClientOriginalName();                
                // $file_path = $request->file('photo')->storeAs('uploads', $file_name, 'public');
                // $product->photo = '/storage/' . $file_path;

                //upload image versi 2
                $file = $request->file('photo');
                $file->storeAs('uploads', $file->hashName());
                $product->photo = $file->hashName();
            } 
            else {
                $product->photo = "images.png";
            }

            $product->name = $request->name;
            $product->description = $request->description;
            $product->type = $request->type;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->save();

            $response = [
                'message'   => 'Product success created',
                'data'      => $product
            ];       

            return response()->json($response, response::HTTP_CREATED);

        } catch (QueryException $e) {
            return response()->json([
                'message'   => "Failed " . $e->errorInfo,
                response::HTTP_NOT_FOUND
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // Get products by Id
        $product = Product::findOrFail($id);
        $response = [
            'message'   => 'Detail of Product Resource',
            'data'      => $product
        ];
        
        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // Validate form
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'description'   => 'required',
            // 'photo'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type'          => 'required',
            'quantity'      => 'required',
            'price'         => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }        
        
        $product = Product::findOrFail($id);

        // Check image not empty
        if($request->hasFile('photo')) {
            // Upload new image versi 1
            // $file = $request->file('photo');
            // $file_name = time() . '_' . $file->getClientOriginalName();
            
            // Upload new image versi 2
            // $file = $request->file('photo');
            // $file->storeAs('uploads', $file->hashName());
            // $product->photo = $file->hashName();

            $file = $request->file('photo');
            $file->storeAs('uploads/', $file->hashName());

            // Delete old image
            Storage::delete('uploads/' . $product->photo);

            // Update product with photo
            $product->update([
                'name'          => $request->name,
                'description'   => $request->description,
                'photo'         => $request->file('photo')->hashName(),
                'type'          => $request->type,
                'quantity'      => $request->quantity,
                'price'         => $request->price,                
            ]);
        } else {
            // Update product without photo
            $product = Product::find($id);
            $product->update([
                'name'          => $request->name,
                'description'   => $request->description,
                'type'          => $request->type,
                'quantity'      => $request->quantity,
                'price'         => $request->price,   
            ]);
        }        
        
        $response = [
            'message'   => 'Product success updated',
            'data'      => $product
        ];  
        return response()->json($response, response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        try {
            // Delete photo
            Storage::delete('uploads/' . $product->photo);
            
            // Delete product
            $product->delete();

            $response = [
                'message'   => 'product deleted',
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch (QueryException $e) {
            return response()->json([
                'message'   => "Failed " . $e->errorInfo
            ]);
        }
    }
}
