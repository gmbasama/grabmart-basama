<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;

class ProductController extends Controller
{
  public function index()
  {
      $data = Product::select('products.*', 'sub_categories.subcategory_name')
      ->leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
      ->paginate(15);

      if (!$data) {
          return false;
      }
      return view('products.index', compact('data'));
  }

  public function create()
  {
      $category = Product::select('products.subcategory_id', 'sub_categories.subcategory_name')
      ->leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
      ->orderBy('products.subcategory_id', 'asc')->distinct()->get();

      return view('products.create', compact('category'));
  }

  public function store(Request $request): RedirectResponse
  {
      $product = Product::create([
          'id'                => $request->id,
          'name'              => $request->name,
          'available_status'  => $request->available_status,
          'description'       => $request->description,
          'price'             => $request->price,
          'photos'            => $request->photos,
          'special_type'      => $request->special_type,
          'taxable'           => false,
          'barcode'           => $request->barcode,
          'max_stock'         => $request->max_stock,
          'max_count'         => $request->max_count,
          'sold_by_weight'    => false,
          'selling_time_id'   => 'SELL01',
          'subcategory_id'    => $request->subcategory_id
      ]);

      return redirect()
          ->route('products.index')
          ->with('message', 'New product created successfully');
  }

  public function show(Request $request)
{
  $keyword = $request->keyword;

  $data = Product::select('products.*', 'sub_categories.subcategory_name as division_name')
      ->leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
      ->where('products.name','like','%'.$keyword.'%')
  ->paginate(15);

  return view('products.index', compact('data'));
}

  public function edit($id)
  {
      $item = Product::find($id);
      return view('products.edit', compact('item'));
  }

  public function update(Request $request, $id)
  {
      // dd($request);
      $item = Product::find($id);

      $item->id = $request->id;
      $item->name = $request->name;
      $item->availableStatus = $request->available_status;
      $item->description = $request->description;
      $item->price = $request->price;
      $item->photos = $request->photos;
      $item->barcode = $request->barcode;
      $item->maxStock = $request->max_stock;
      $item->maxCount = $request->max_count;

      $item->save();

      $update = new GrabController();
      $update->updateMenuRecord($request);

      return redirect()
          ->route('products.index')
          ->with('message', 'Product updated successfully');
  }

  public function destroy($id)
  {
      $item = Product::find($id);

      $item->delete();

      return redirect()
          ->route('products.index')
          ->with('message', 'Product deleted successfully');
  }
}
