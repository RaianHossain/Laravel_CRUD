<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use PDF;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.products.index', ['products'=> $products]);
    }

    public function create()
    {
        return view('backend.products.create');
    }

    public function store(Request $request)
    {
        try {
            // $request->validate([
            //     'title' => 'required|min:3|max:50|unique:categories,title',
            //     // 'title' => ['required', 'min:3', Rule::unique('categories', 'title')],
            //     'description' => ['required', 'min:10'],
            // ]);
            // $imageName = request()->file('image')->store('storage/app/public/images');
            // dd($imageName);
            $request->validate([
                'title'=> 'required|min:3|max:50|unique:categories,title',
                'description' => 'required|min:10',
                'price' => 'required',
                'qty' => 'required',
                'unit' => 'required',
                
            ]);
            Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'qty' => $request->qty,
                'unit' => $request->unit
            ]);

            // $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('products.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function show(Product $product)
    {
        return view('backend.products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('backend.products.edit', [
            'product' => $product
        ]);
    }


    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'title'=> 'required|min:3|max:50|unique:products,title,'.$product->id,
                'description' => 'required|min:10',
                'price' => 'required',
                'qty' => 'required|numeric',
                'unit' => 'required',
                
            ]);

            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'qty' => $request->qty,
                'unit' => $request->unit
                
            ]);

            // $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('products.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function showTrashed()
    {
        $products = Product::onlyTrashed()->get();
        return view('backend.products.trash', ['products'=>$products]);
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('products.trash')->withMessage('Successfully Restored');
    }

    public function delete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        return redirect()->route('products.trash')->withMessage('Permanently deleted');

    }

    public function downloadPdf()
    {
        $products = Product::all();
        $pdf = PDF::loadView('backend.products.pdf',['products'=>$products]);
        return $pdf->download('data.pdf');
    }
}
