<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Grab;

class GetMenuController extends Controller
{
    public function index()
    {
        $data = Grab::select('dbo.items.*', 'dbo.sub_categories.name as division_name')
        ->leftJoin('dbo.sub_categories', 'dbo.items.subcategory_id', '=', 'dbo.sub_categories.id')
        ->orderBy('dbo.items.subcategory_id', 'asc')->paginate(15);

        if (!$data) {
            return false;
        }
        return view('products.index', compact('data'));
    }

    public function create()
    {
        $category = Grab::select('dbo.items.subcategory_id as division_id', 'dbo.sub_categories.name as division_name')
        ->leftJoin('dbo.sub_categories', 'dbo.items.subcategory_id', '=', 'dbo.sub_categories.id')
        ->orderBy('dbo.items.subcategory_id', 'asc')->distinct()->get();

        return view('products.create', compact('category'));
    }

    public function store(Request $request): RedirectResponse
    {
        $product = Grab::create([
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

    public function edit($id)
    {
        $item = Grab::find($id);
        return view('products.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Grab::find($id);

        $item->id = $request->id;
        $item->name = $request->name;
        $item->available_status = $request->available_status;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->photos = $request->photos;
        $item->barcode = $request->barcode;
        $item->max_stock = $request->max_stock;
        $item->max_count = $request->max_count;

        $item->save();

        return redirect()
            ->route('products.index')
            ->with('message', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $item = Grab::find($id);

        $item->delete();

        return redirect()
            ->route('products.index')
            ->with('message', 'Product deleted successfully');
    }

    public function getMenu(Request $request)
    {
        $merchantID = env('GRAB_MERCHANT_ID', '');
        $partnerMerchantID = env('GRAB_PARTNER_ID', '');

        $alcohol = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20200610034750011166')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($alcohol as $photos1) {
            $photos1['photos'] = explode(" ", $photos1['photos']);
        }

        $frozen = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629082832016723')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($frozen as $photos2) {
            $photos2['photos'] = explode(" ", $photos2['photos']);
        }

        $health = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083236010281')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($health as $photos3) {
            $photos3['photos'] = explode(" ", $photos3['photos']);
        }

        $chips = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083554015180')
            ->where('subcategories_id', 'IDITEDP20220701085346014231')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($chips as $photos4) {
            $photos4['photos'] = explode(" ", $photos4['photos']);
        }

        $candy = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083554015180')
            ->where('subcategories_id', 'IDITEDP20220701085648019022')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($candy as $photos5) {
            $photos5['photos'] = explode(" ", $photos5['photos']);
        }

        $ice = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083554015180')
            ->where('subcategories_id', 'IDITEDP20220701085757015076')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($ice as $photos6) {
            $photos6['photos'] = explode(" ", $photos6['photos']);
        }

        $peanuts = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083554015180')
            ->where('subcategories_id', 'IDITEDP20220701085852012532')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($peanuts as $photos7) {
            $photos7['photos'] = explode(" ", $photos7['photos']);
        }

        $traditional = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083554015180')
            ->where('subcategories_id', 'IDITEDP20220701085959013246')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($traditional as $photos8) {
            $photos8['photos'] = explode(" ", $photos8['photos']);
        }

        $dried = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083635011784')
            ->where('subcategories_id', 'IDITEDP20220701090459016004')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($dried as $photos9) {
            $photos9['photos'] = explode(" ", $photos9['photos']);
        }

        $noodle = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083635011784')
            ->where('subcategories_id', 'IDITEDP20220701090649012562')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($noodle as $photos10) {
            $photos10['photos'] = explode(" ", $photos10['photos']);
        }

        $oils = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083635011784')
            ->where('subcategories_id', 'IDITEDP20220701091011014270')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($oils as $photos11) {
            $photos11['photos'] = explode(" ", $photos11['photos']);
        }

        $rice = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083635011784')
            ->where('subcategories_id', 'IDITEDP20220701091254019744')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($rice as $photos12) {
            $photos12['photos'] = explode(" ", $photos12['photos']);
        }

        $sauces = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083635011784')
            ->where('subcategories_id', 'IDITEDP20220701091351019779')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($sauces as $photos13) {
            $photos13['photos'] = explode(" ", $photos13['photos']);
        }

        $spices = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083635011784')
            ->where('subcategories_id', 'IDITEDP20220701091508010209')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($spices as $photos14) {
            $photos14['photos'] = explode(" ", $photos14['photos']);
        }

        $sugar = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083635011784')
            ->where('subcategories_id', 'IDITEDP20220701091611019834')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($sugar as $photos15) {
            $photos15['photos'] = explode(" ", $photos15['photos']);
        }

        $seeds = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083635011784')
            ->where('subcategories_id', 'IDITEDP20230516111303013926')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($seeds as $photos14) {
            $photos14['photos'] = explode(" ", $photos14['photos']);
        }

        $others = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083803015272')
            ->where('subcategories_id', 'IDITEDP20221116101254014717')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($others as $photos15) {
            $photos15['photos'] = explode(" ", $photos15['photos']);
        }

        $others2 = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629083803015272')
            ->where('subcategories_id', 'IDITEDP20221116101332019648')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($others2 as $photos16) {
            $photos16['photos'] = explode(" ", $photos16['photos']);
        }

        $mom = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084125010672')
            ->where('subcategories_id', 'IDITEDP20220701084139010514')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($mom as $photos17) {
            $photos17['photos'] = explode(" ", $photos17['photos']);
        }

        $beverages = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084347011754')
            ->where('subcategories_id', 'IDITEDP20220718100055018223')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($beverages as $photos18) {
            $photos18['photos'] = explode(" ", $photos18['photos']);
        }

        $beverages2 = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084347011754')
            ->where('subcategories_id', 'IDITEDP20230213070339012880')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($beverages2 as $photos19) {
            $photos19['photos'] = explode(" ", $photos19['photos']);
        }

        $bakery = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084424012073')
            ->where('subcategories_id', 'IDITEDP20220701085513018279')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($bakery as $photos20) {
            $photos20['photos'] = explode(" ", $photos20['photos']);
        }

        $bakery2 = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084424012073')
            ->where('subcategories_id', 'IDITEDP20220701085628017532')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($bakery2 as $photos21) {
            $photos21['photos'] = explode(" ", $photos21['photos']);
        }

        $dairy = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084534013268')
            ->where('subcategories_id', 'IDITEDP20220701090049019477')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($dairy as $photos22) {
            $photos22['photos'] = explode(" ", $photos22['photos']);
        }

        $dairy2 = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084534013268')
            ->where('subcategories_id', 'IDITEDP20220701090257019878')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($dairy2 as $photos23) {
            $photos23['photos'] = explode(" ", $photos23['photos']);
        }

        $eggs = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084534013268')
            ->where('subcategories_id', 'IDITEDP20220701085930014940')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($eggs as $photos24) {
            $photos24['photos'] = explode(" ", $photos24['photos']);
        }

        $fruit = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084603017236')
            ->where('subcategories_id', 'IDITEDP20220701091747019463')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($fruit as $photos25) {
            $photos25['photos'] = explode(" ", $photos25['photos']);
        }

        $tofu = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084603017236')
            ->where('subcategories_id', 'IDITEDP20220701092018013176')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($tofu as $photos26) {
            $photos26['photos'] = explode(" ", $photos26['photos']);
        }

        $vegetable = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629084603017236')
            ->where('subcategories_id', 'IDITEDP20220701092135010576')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($vegetable as $photos27) {
            $photos27['photos'] = explode(" ", $photos27['photos']);
        }

        $instant = Grab::select(
            DB::raw('dbo.items.id AS ID'),
            'dbo.items.name',
            'dbo.items.availableStatus',
            'dbo.items.description',
            'dbo.items.price',
            'dbo.items.photos',
            'dbo.items.specialType',
            'dbo.items.barcode',
            'dbo.items.maxStock',
            'dbo.items.maxCount',
            'dbo.items.sellingTimeID'
        )
            ->where('categories_id', 'IDITEDP20220629090006013664')
            ->where('subcategories_id', 'IDITEDP20221116101053019742')->orderBy('categories_id', 'asc')->orderBy('subcategories_id', 'asc')->get();

        foreach ($instant as $photos28) {
            $photos28['photos'] = explode(" ", $photos28['photos']);
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
                    'id' => 'SELL01',
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
                // 18+ & 21+ Products
                [
                    'id' => 'IDITEDP20200610034750011166',
                    'name' => '18+ & 21+ Products',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220310094423015254',
                            'name' => 'Alcohol (21+)',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $alcohol
                        ]
                    ]
                ],
                // Frozen & Meat
                [
                    'id' => 'IDITEDP20220629082832016723',
                    'name' => 'Frozen & Meat',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701091225011414',
                            'name' => 'Ready to Cook & Eat',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $frozen
                        ]
                    ]
                ],
                // Health & Personal Care
                [
                    'id' => 'IDITEDP20220629083236010281',
                    'name' => 'Health & Personal Care',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701092521017633',
                            'name' => 'Medicine',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $health
                        ]
                    ]
                ],
                // Snacks & Ice Cream
                [
                    'id' => 'IDITEDP20220629083554015180',
                    'name' => 'Snacks & Ice Cream',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701085346014231',
                            'name' => 'Chips & Crackers',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $chips
                        ],
                        [
                            'id' => 'IDITEDP20220701085648019022',
                            'name' => 'Chocolates & Candies',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $candy
                        ],
                        [
                            'id' => 'IDITEDP20220701085757015076',
                            'name' => 'Ice Cream & Dessert',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $ice
                        ],
                        [
                            'id' => 'IDITEDP20220701085852012532',
                            'name' => 'Peanuts & Dry Snacks',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $peanuts
                        ],
                        [
                            'id' => 'IDITEDP20220701085959013246',
                            'name' => 'Traditional Snacks',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $traditional
                        ]
                    ]
                ],
                // Staples & Cooking
                [
                    'id' => 'IDITEDP20220629083635011784',
                    'name' => 'Snacks & Ice Cream',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701090459016004',
                            'name' => 'Dried Food',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $dried
                        ],
                        [
                            'id' => 'IDITEDP20220701090649012562',
                            'name' => 'Noodle & Pasta',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $noodle
                        ],
                        [
                            'id' => 'IDITEDP20220701091011014270',
                            'name' => 'Oils & Vinegars',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $oils
                        ],
                        [
                            'id' => 'IDITEDP20220701091254019744',
                            'name' => 'Rice',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $rice
                        ],
                        [
                            'id' => 'IDITEDP20220701091351019779',
                            'name' => 'Sauces & Ketchups',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $sauces
                        ],
                        [
                            'id' => 'IDITEDP20220701091508010209',
                            'name' => 'Spices & Seasonings',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $spices
                        ],
                        [
                            'id' => 'IDITEDP20220701091611019834',
                            'name' => 'Sugar & Salt',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $sugar
                        ],
                        [
                            'id' => 'IDITEDP20230516111303013926',
                            'name' => 'Grains & Seeds',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $seeds
                        ]
                    ]
                ],
                // Others
                [
                    'id' => 'IDITEDP20220629083803015272',
                    'name' => 'Others',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20221116101254014717',
                            'name' => 'Other Needs',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $others
                        ],
                        [
                            'id' => 'IDITEDP20221116101332019648',
                            'name' => 'Shopping Bags & Packaging',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $others2
                        ]
                    ]
                ],
                // Mom & Baby
                [
                    'id' => 'IDITEDP20220629084125010672',
                    'name' => 'Mom & Baby',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701084139010514',
                            'name' => 'Baby Food & Milk',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $mom
                        ]
                    ]
                ],
                // Beverages
                [
                    'id' => 'IDITEDP20220629084347011754',
                    'name' => 'Beverages',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220718100055018223',
                            'name' => 'Tea Bag/Powder',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $beverages
                        ],
                        [
                            'id' => 'IDITEDP20230213070339012880',
                            'name' => 'Ready to Drinks',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $beverages2
                        ]
                    ]
                ],
                // Breakfast & Bakery
                [
                    'id' => 'IDITEDP20220629084424012073',
                    'name' => 'Breakfast & Bakery',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701085513018279',
                            'name' => 'Cereal & Granola',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $bakery
                        ],
                        [
                            'id' => 'IDITEDP20220701085628017532',
                            'name' => 'Spreads',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $bakery2
                        ]
                    ]
                ],
                // Dairy & Eggs
                [
                    'id' => 'IDITEDP20220629084534013268',
                    'name' => 'Dairy & Eggs',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701085930014940',
                            'name' => 'Eggs',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $eggs
                        ],
                        [
                            'id' => 'IDITEDP20220701090049019477',
                            'name' => 'Fresh Milk',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $dairy
                        ],
                        [
                            'id' => 'IDITEDP20220701090257019878',
                            'name' => 'Powdered Milk',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $dairy2
                        ]
                    ]
                ],
                // Fruit & Vegetable
                [
                    'id' => 'IDITEDP20220629084603017236',
                    'name' => 'Fruit & Vegetable',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20220701091747019463',
                            'name' => 'Fruits',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $fruit
                        ],
                        [
                            'id' => 'IDITEDP20220701092018013176',
                            'name' => 'Tofu & Tempe',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $tofu
                        ],
                        [
                            'id' => 'IDITEDP20220701092135010576',
                            'name' => 'Vegetables',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $vegetable
                        ]
                    ]
                ],
                // Instant Food
                [
                    'id' => 'IDITEDP20220629090006013664',
                    'name' => 'Instant Food',
                    'availableStatus' => 'AVAILABLE',
                    'sellingTimeID' => 'SELL01',
                    'subCategories' => [
                        [
                            'id' => 'IDITEDP20221116101053019742',
                            'name' => 'Canned Food',
                            'availableStatus' => 'AVAILABLE',
                            'sellingTimeID' => 'SELL01',
                            'dbo.items' => $instant
                        ]
                    ]
                ],
            ]
        ];

        return $response;
    }
}
