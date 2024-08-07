<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;
use App\Models\SubCategories;
use App\Models\Menu;
use App\Http\Controllers\GrabController;

class GetMenuController extends Controller
{
    public function upload(Request $request)
    {
        $path = $request->file('photos')->store('public');

        try {
            $result = Menu::create([
                'name'   => $request->name,
                'photos' => stripslashes($path),
            ]);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
        }

        return response()->json($result);
    }

    public function getCategoryName(Request $request)
    {
        $query = '';
        if ($request->has('query')) {
            $query = $request->get('query');
        }

        $category = Product::select('name', 'subcategory_id')
        ->where('is_uploaded', false)
        ->where('name', 'like', '%'.$query.'%')
        ->orderBy('subcategory_id', 'asc')->get();

        return response()->json(['data' => $category]);
    }

    public function getMenu(Request $request)
    {
        $merchantID = env('GRAB_MERCHANT_ID', '');
        $partnerMerchantID = env('GRAB_PARTNER_ID', '');

        $product1 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701090158016840')->get();

        foreach ($product1 as $photos1) {
            $photos1['photos'] = explode(" ", $photos1['photos']);
        }

        $product2 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701090257019878')->get();

        foreach ($product2 as $photos2) {
            $photos2['photos'] = explode(" ", $photos2['photos']);
        }

        $product3 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701090415011865')->get();

        foreach ($product3 as $photos3) {
            $photos3['photos'] = explode(" ", $photos3['photos']);
        }

        $product4 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701083705017959')->get();

        foreach ($product4 as $photos4) {
            $photos4['photos'] = explode(" ", $photos4['photos']);
        }

        $product5 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701093341012249')->get();

        foreach ($product5 as $photos5) {
            $photos5['photos'] = explode(" ", $photos5['photos']);
        }

        $product6 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220624101850015344')->get();

        foreach ($product6 as $photos6) {
            $photos6['photos'] = explode(" ", $photos6['photos']);
        }

        $product7 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220628040345016882')->get();

        foreach ($product7 as $photos7) {
            $photos7['photos'] = explode(" ", $photos7['photos']);
        }

        $product8 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701075259015832')->get();

        foreach ($product8 as $photos8) {
            $photos8['photos'] = explode(" ", $photos8['photos']);
        }

        $product9 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701075355015961')->get();

        foreach ($product9 as $photos9) {
            $photos9['photos'] = explode(" ", $photos9['photos']);
        }

        $product10 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20221117105322019076')->get();

        foreach ($product10 as $photos10) {
            $photos10['photos'] = explode(" ", $photos10['photos']);
        }

        $product11 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20230213070339012880')->get();

        foreach ($product11 as $photos11) {
            $photos11['photos'] = explode(" ", $photos11['photos']);
        }

        $product12 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701085003010752')->get();

        foreach ($product12 as $photos12) {
            $photos12['photos'] = explode(" ", $photos12['photos']);
        }

        $product13 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701085140011948')->get();

        foreach ($product13 as $photos13) {
            $photos13['photos'] = explode(" ", $photos13['photos']);
        }

        $product14 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220718100055018223')->get();

        foreach ($product14 as $photos14) {
            $photos14['photos'] = explode(" ", $photos14['photos']);
        }

        $product15 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20221124075441013532')->get();

        foreach ($product15 as $photos15) {
            $photos15['photos'] = explode(" ", $photos15['photos']);
        }

        $product16 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701084252017470')->get();

        foreach ($product16 as $photos16) {
            $photos16['photos'] = explode(" ", $photos16['photos']);
        }

        $product17 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701084359011762')->get();

        foreach ($product17 as $photos17) {
            $photos17['photos'] = explode(" ", $photos17['photos']);
        }

        $product18 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20221116105510012838')->get();

        foreach ($product18 as $photos18) {
            $photos18['photos'] = explode(" ", $photos18['photos']);
        }

        $product19 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701075656011287')->get();

        foreach ($product19 as $photos19) {
            $photos19['photos'] = explode(" ", $photos19['photos']);
        }

        $product20 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701082353019729')->get();

        foreach ($product20 as $photos20) {
            $photos20['photos'] = explode(" ", $photos20['photos']);
        }

        $product21 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701082514017402')->get();

        foreach ($product21 as $photos21) {
            $photos21['photos'] = explode(" ", $photos21['photos']);
        }

        $product22 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220718100335014612')->get();

        foreach ($product22 as $photos22) {
            $photos22['photos'] = explode(" ", $photos22['photos']);
        }

        $product23 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20221116100938014539')->get();

        foreach ($product23 as $photos23) {
            $photos23['photos'] = explode(" ", $photos23['photos']);
        }

        $product24 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20221116105644011766')->get();

        foreach ($product24 as $photos24) {
            $photos24['photos'] = explode(" ", $photos24['photos']);
        }

        $product25 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701092125012893')->get();

        foreach ($product25 as $photos25) {
            $photos25['photos'] = explode(" ", $photos25['photos']);
        }

        $product26 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701092157018805')->get();

        foreach ($product26 as $photos26) {
            $photos26['photos'] = explode(" ", $photos26['photos']);
        }

        $product27 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701092226010300')->get();

        foreach ($product27 as $photos27) {
            $photos27['photos'] = explode(" ", $photos27['photos']);
        }

        $product28 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701092410012356')->get();

        foreach ($product28 as $photos28) {
            $photos28['photos'] = explode(" ", $photos28['photos']);
        }

        $product29 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701092451011525')->get();

        foreach ($product29 as $photos29) {
            $photos29['photos'] = explode(" ", $photos29['photos']);
        }

        $product30 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701092521017633')->get();

        foreach ($product30 as $photos30) {
            $photos30['photos'] = explode(" ", $photos30['photos']);
        }

        $product31 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701092617015134')->get();

        foreach ($product31 as $photos31) {
            $photos31['photos'] = explode(" ", $photos31['photos']);
        }

        $product32 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701092813016034')->get();

        foreach ($product32 as $photos32) {
            $photos32['photos'] = explode(" ", $photos32['photos']);
        }

        $product33 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701092843018450')->get();

        foreach ($product33 as $photos33) {
            $photos33['photos'] = explode(" ", $photos33['photos']);
        }

        $product34 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20221116101536012800')->get();

        foreach ($product34 as $photos34) {
            $photos34['photos'] = explode(" ", $photos34['photos']);
        }

        $product35 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20230816145908018461')->get();

        foreach ($product35 as $photos35) {
            $photos35['photos'] = explode(" ", $photos35['photos']);
        }

        $product36 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20230816145950014931')->get();

        foreach ($product36 as $photos36) {
            $photos36['photos'] = explode(" ", $photos36['photos']);
        }

        $product37 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20221118021553017516')->get();

        foreach ($product37 as $photos37) {
            $photos37['photos'] = explode(" ", $photos37['photos']);
        }

        $product38 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20200910103539010383')->get();

        foreach ($product38 as $photos38) {
            $photos38['photos'] = explode(" ", $photos38['photos']);
        }

        $product39 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20200910103554016788')->get();

        foreach ($product39 as $photos39) {
            $photos39['photos'] = explode(" ", $photos39['photos']);
        }

        $product40 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20221116094633018288')->get();

        foreach ($product40 as $photos40) {
            $photos40['photos'] = explode(" ", $photos40['photos']);
        }

        $product41 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701085150011522')->get();

        foreach ($product41 as $photos41) {
            $photos41['photos'] = explode(" ", $photos41['photos']);
        }

        $product42 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701085648019022')->get();

        foreach ($product42 as $photos42) {
            $photos42['photos'] = explode(" ", $photos42['photos']);
        }

        $product43 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701085852012532')->get();

        foreach ($product43 as $photos43) {
            $photos43['photos'] = explode(" ", $photos43['photos']);
        }

        $product44 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701085959013246')->get();

        foreach ($product44 as $photos44) {
            $photos44['photos'] = explode(" ", $photos44['photos']);
        }

        $product45 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701090142018422')->get();

        foreach ($product45 as $photos45) {
            $photos45['photos'] = explode(" ", $photos45['photos']);
        }

        $product46 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701091011014270')->get();

        foreach ($product46 as $photos46) {
            $photos46['photos'] = explode(" ", $photos46['photos']);
        }

        $product47 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701091254019744')->get();

        foreach ($product47 as $photos47) {
            $photos47['photos'] = explode(" ", $photos47['photos']);
        }

        $product48 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701091508010209')->get();

        foreach ($product48 as $photos48) {
            $photos48['photos'] = explode(" ", $photos48['photos']);
        }

        $product49 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701091611019834')->get();

        foreach ($product49 as $photos49) {
            $photos49['photos'] = explode(" ", $photos49['photos']);
        }

        $product50 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701085331016255')->get();

        foreach ($product50 as $photos50) {
            $photos50['photos'] = explode(" ", $photos50['photos']);
        }

        $product51 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20221116101332019648')->get();

        foreach ($product51 as $photos51) {
            $photos51['photos'] = explode(" ", $photos51['photos']);
        }

        $product52 = Product::leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.subcategory_code')
        ->select(
            DB::raw('products.product_code AS ID'),
            DB::raw('products.product_name AS name'),
            DB::raw('products.available_status AS availableStatus'),
            DB::raw('products.product_description AS description'),
            DB::raw('products.product_price AS price'),
            DB::raw('products.product_photos AS photos'),
            DB::raw('products.special_type AS specialType'),
            'products.barcode',
            DB::raw('products.max_stock AS maxStock'),
            DB::raw('products.max_count AS maxCount'),
            DB::raw('products.selling_time_id AS sellingTimeID'),
        )
        ->where('sub_categories.subcategory_code', 'IDITEDP20220701090715018191')->get();

        foreach ($product52 as $photos52) {
            $photos52['photos'] = explode(" ", $photos52['photos']);
        }

        $response = [
            'merchantID' => $merchantID,
            'partnerMerchantID' => $partnerMerchantID,
            'currency' => [
                'code' => 'IDR',
                'symbol' => 'Rp',
                'exponent' => 0
            ],
            'sellingTimes' => [
                [
                    'startTime' => '2022-03-01 08:00:00',
                    'endTime' => '2025-01-21 16:00:00',
                    'id' => 'IDSLT202405230901596724',
                    'name' => 'Normal',
                    'serviceHours' => [
                        'mon' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                ]
                            ]
                        ],
                        'tue' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                ]
                            ]
                        ],
                        'wed' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                ]
                            ]
                        ],
                        'thu' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                ]
                            ]
                        ],
                        'fri' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                ]
                            ]
                        ],
                        'sat' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                ]
                            ]
                        ],
                        'sun' => [
                            'openPeriodType' => 'OpenPeriod',
                            'periods' => [
                                [
                                    'startTime' => '08:00',
                                    'endTime' => '16:00'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'categories' => [
                // Dairy & Eggs
                [
                    'id' => 'IDITEDP20220629084534013268',
                    'name' => 'Dairy & Eggs',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        // Alternatives Milk
                        [
                            'id' => 'IDITEDP20220701090158016840',
                            'name' => 'Alternatives Milk',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product1
                        ],
                        // Powdered Milk
                        [
                            'id' => 'IDITEDP20220701090257019878',
                            'name' => 'Powdered Milk',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product2
                        ],
                        // Yogurt & Pudding
                        [
                            'id' => 'IDITEDP20220701090415011865',
                            'name' => 'Yogurt & Pudding',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product3
                        ],
                    ]
                ],
                // Instant Food
                [
                    'id' => 'IDITEDP20220629090006013664',
                    'name' => 'Instant Food',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701083705017959',
                            'name' => 'Instant Noodles',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product4
                        ],
                        [
                            'id' => 'IDITEDP20220701093341012249',
                            'name' => 'Other Instant Food',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product5
                        ]
                    ]
                ],
                // Hobby & Lifestyle
                [
                    'id' => 'IDITEDP20220624101542016503',
                    'name' => 'Hobby & Lifestyle',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220624101850015344',
                            'name' => 'Hobby & Toys',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product6
                        ],
                        [
                            'id' => 'IDITEDP20220628040345016882',
                            'name' => 'Fashion.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product7
                        ],
                        [
                            'id' => 'IDITEDP20220701075259015832',
                            'name' => 'Cat Food',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product8
                        ],
                        [
                            'id' => 'IDITEDP20220701075355015961',
                            'name' => 'Dog Food',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product9
                        ],
                        [
                            'id' => 'IDITEDP20221117105322019076',
                            'name' => 'Automotive.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product10
                        ]
                    ]
                ],
                // Beverages
                [
                    'id' => 'IDITEDP20220629084347011754',
                    'name' => 'Beverages',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20230213070339012880',
                            'name' => 'Ready to Drinks',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product11
                        ],
                        [
                            'id' => 'IDITEDP20220701085003010752',
                            'name' => 'Syrup.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product12
                        ],
                        [
                            'id' => 'IDITEDP20220701085140011948',
                            'name' => 'Water.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product13
                        ],
                        [
                            'id' => 'IDITEDP20220718100055018223',
                            'name' => 'Tea Bag/Powder',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product14
                        ],
                        [
                            'id' => 'IDITEDP20221124075441013532',
                            'name' => 'Juices & Healthy Drinks.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product15
                        ]
                    ]
                ],
                // Mom & Baby
                [
                    'id' => 'IDITEDP20220629084125010672',
                    'name' => 'Mom & Baby',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701084252017470',
                            'name' => 'Baby Bath & Body Care',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product16
                        ],
                        [
                            'id' => 'IDITEDP20220701084359011762',
                            'name' => 'Diapers & Wipes.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product17
                        ],
                        [
                            'id' => 'IDITEDP20221116105510012838',
                            'name' => 'Baby Equipment.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product18
                        ]
                    ]
                ],
                // Home Care
                [
                    'id' => 'IDITEDP20220629083338019599',
                    'name' => 'Home Care',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701075656011287',
                            'name' => 'Home Cleaning.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product19
                        ],
                        [
                            'id' => 'IDITEDP20220701082353019729',
                            'name' => 'Home Supplies & Accessories',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product20
                        ],
                        [
                            'id' => 'IDITEDP20220701082514017402',
                            'name' => 'Laundry Needs',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product21
                        ],
                        [
                            'id' => 'IDITEDP20220718100335014612',
                            'name' => 'Tissue',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product22
                        ],
                        [
                            'id' => 'IDITEDP20221116100938014539',
                            'name' => 'Home Tools and Improvement',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product23
                        ],
                        [
                            'id' => 'IDITEDP20221116105644011766',
                            'name' => 'Other Home Care.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product24
                        ]
                    ]
                ],
                // Health & Personal Care
                [
                    'id' => 'IDITEDP20220629083236010281',
                    'name' => 'Health & Personal Care',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701092125012893',
                            'name' => 'Body Care.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product25
                        ],
                        [
                            'id' => 'IDITEDP20220701092157018805',
                            'name' => 'Face Care',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product26
                        ],
                        [
                            'id' => 'IDITEDP20220701092226010300',
                            'name' => 'First Aid & Other Health',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product27
                        ],
                        [
                            'id' => 'IDITEDP20220701092410012356',
                            'name' => 'Hair Care.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product28
                        ],
                        [
                            'id' => 'IDITEDP20220701092451011525',
                            'name' => 'Masker & Sanitizers',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product29
                        ],
                        [
                            'id' => 'IDITEDP20220701092521017633',
                            'name' => 'Medicine',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product30
                        ],
                        [
                            'id' => 'IDITEDP20220701092617015134',
                            'name' => 'Men\'s Grooming.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product31
                        ],
                        [
                            'id' => 'IDITEDP20220701092813016034',
                            'name' => 'Oral Care.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product32
                        ],
                        [
                            'id' => 'IDITEDP20220701092843018450',
                            'name' => 'Sanitary Goods',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product33
                        ],
                        [
                            'id' => 'IDITEDP20221116101536012800',
                            'name' => 'Bath & Soap',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product34
                        ],
                        [
                            'id' => 'IDITEDP20230816145908018461',
                            'name' => 'Perfume',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product35
                        ],
                        [
                            'id' => 'IDITEDP20230816145950014931',
                            'name' => 'Facial Cotton and Tissue',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product36
                        ],
                        [
                            'id' => 'IDITEDP20221118021553017516',
                            'name' => 'Others Health',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product37
                        ]
                    ]
                ],
                // Electronics
                [
                    'id' => 'IDITEDP20200910103436017166',
                    'name' => 'Electronics',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20200910103539010383',
                            'name' => 'Lamps',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product38
                        ],
                        [
                            'id' => 'IDITEDP20200910103554016788',
                            'name' => 'Other Electronics & Accessories',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product39
                        ],
                        [
                            'id' => 'IDITEDP20221116094633018288',
                            'name' => 'Handphone & Accessories',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product40
                        ],
                    ]
                ],
                // Snacks & Ice Cream
                [
                    'id' => 'IDITEDP20220629083554015180',
                    'name' => 'Snacks & Ice Cream',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701085150011522',
                            'name' => 'Biscuit, Wafer & Cookies',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product41
                        ],
                        [
                            'id' => 'IDITEDP20220701085648019022',
                            'name' => 'Chocolates & Candies.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product42
                        ],
                        [
                            'id' => 'IDITEDP20220701085852012532',
                            'name' => 'Peanuts & Dry Snacks.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product43
                        ],
                        [
                            'id' => 'IDITEDP20220701085959013246',
                            'name' => 'Traditional Snacks',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product44
                        ]
                    ]
                ],
                // Staples & Cooking
                [
                    'id' => 'IDITEDP20220629083635011784',
                    'name' => 'Staples & Cooking',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701090142018422',
                            'name' => 'Baking.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product45
                        ],
                        [
                            'id' => 'IDITEDP20220701091011014270',
                            'name' => 'Oils & Vinegars.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product46
                        ],
                        [
                            'id' => 'IDITEDP20220701091254019744',
                            'name' => 'Rice.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product47
                        ],
                        [
                            'id' => 'IDITEDP20220701091508010209',
                            'name' => 'Spices & Seasonings.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product48
                        ],
                        [
                            'id' => 'IDITEDP20220701091611019834',
                            'name' => 'Sugar & Salt.',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product49
                        ]
                    ]
                ],
                // Breakfast & Bakery
                [
                    'id' => 'IDITEDP20220629084424012073',
                    'name' => 'Breakfast & Bakery',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701085331016255',
                            'name' => 'Breads & Pastry',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product50
                        ]
                    ]
                ],
                // Others
                [
                    'id' => 'IDITEDP20220629083803015272',
                    'name' => 'Others',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20221116101332019648',
                            'name' => 'Shopping Bags & Packaging',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product51
                        ]
                    ]
                ],
                // Frozen & Meat
                [
                    'id' => 'IDITEDP20220629082832016723',
                    'name' => 'Frozen & Meat',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'IDSLT202405230901596724',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701090715018191',
                            'name' => 'Frozen Fruits & Vegetables',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'IDSLT202405230901596724',
                            'items' => $product52
                        ]
                    ]
                ],
            ]
        ];

        return $response;
    }
}
