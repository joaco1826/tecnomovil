<?php
/**
 * Created by PhpStorm.
 * User: MID-LeidyN
 * Date: 15/05/2017
 * Time: 12:10 PM
 */

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PaginationController
{
    public function __invoke(Request $request)
    {
        $order = $request->order;
        $pmin = $request->pmin;
        $pmax = $request->pmax;
        $label = $request->label;
        $size = $request->size;
        $brand = $request->brand;
        $productos = DB::table('products');
        if (count($size) > 0) {
            $productos->join('products_sizes', 'products.id', 'products_sizes.products_id');
        }
        if (count($label) > 0) {
            $productos->join('products_labels', 'products.id', 'products_labels.products_id');
        }
        $productos->where(['status' => 'activo']);
        if (count($brand) > 0) {
            $productos->whereIn('brand_id', $brand);
        }
        if (count($size) > 0) {
            $productos->whereIn('products_sizes.sizes_id', $size);
        }
        if (count($label) > 0) {
            $productos->whereIn('products_labels.labels_id', $label);
        }
        $productos->whereBetween('price', [$pmin, $pmax]);
        $productos->groupBy('products.id');
        if ($order == 1) {
            $productos->orderBy('price');
        } elseif ($order == 2) {
            $productos->orderByDesc('price');
        } elseif ($order == 3) {
            $productos->orderBy('name');
        }

        return response(json_encode($productos->paginate(12)), 200)->header('Content-Type', 'text/json');

    }

    public function nuevo(Request $request)
    {
        $date = Carbon::now()->subDays(15)->toDateString();
        $hoy = Carbon::now()->toDateString();
        $order = $request->order;
        $pmin = $request->pmin;
        $pmax = $request->pmax;
        $label = $request->label;
        $size = $request->size;
        $brand = $request->brand;
        $productos = DB::table('products');
        if (count($size) > 0) {
            $productos->join('products_sizes', 'products.id', 'products_sizes.products_id');
        }
        if (count($label) > 0) {
            $productos->join('products_labels', 'products.id', 'products_labels.products_id');
        }
        $productos->where('status', 'activo');
        if ($request->id > 0) {
            $productos->where('category_id', $request->id);
        }
        if (count($brand) > 0) {
            $productos->whereIn('brand_id', $brand);
        }
        if (count($size) > 0) {
            $productos->whereIn('products_sizes.sizes_id', $size);
        }
        if (count($label) > 0) {
            $productos->whereIn('products_labels.labels_id', $label);
        }
        $productos->whereBetween('price', [$pmin, $pmax]);
        $productos->whereBetween('created_at', [$date, $hoy]);
        $productos->groupBy('products.id');
        if ($order == 1) {
            $productos->orderBy('price');
        } elseif ($order == 2) {
            $productos->orderByDesc('price');
        } elseif ($order == 3) {
            $productos->orderBy('name');
        }


        return response(json_encode($productos->paginate(12)), 200)->header('Content-Type', 'text/json');

    }

    public function sale(Request $request)
    {
        $order = $request->order;
        $pmin = $request->pmin;
        $pmax = $request->pmax;
        $label = $request->label;
        $size = $request->size;
        $brand = $request->brand;
        $productos = DB::table('products');
        if (count($size) > 0) {
            $productos->join('products_sizes', 'products.id', 'products_sizes.products_id');
        }
        if (count($label) > 0) {
            $productos->join('products_labels', 'products.id', 'products_labels.products_id');
        }
        $productos->where('status', 'activo');
        $productos->where('discount', '>', 0);
        if ($request->id > 0) {
            $productos->where('category_id', $request->id);
        }
        if (count($brand) > 0) {
            $productos->whereIn('brand_id', $brand);
        }
        if (count($size) > 0) {
            $productos->whereIn('products_sizes.sizes_id', $size);
        }
        if (count($label) > 0) {
            $productos->whereIn('products_labels.labels_id', $label);
        }
        $productos->whereBetween('price', [$pmin, $pmax]);
        $productos->groupBy('products.id');
        if ($order == 1) {
            $productos->orderBy('price');
        } elseif ($order == 2) {
            $productos->orderByDesc('price');
        } elseif ($order == 3) {
            $productos->orderBy('name');
        }

        return response(json_encode($productos->paginate(12)), 200)->header('Content-Type', 'text/json');

    }
}