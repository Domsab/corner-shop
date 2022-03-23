<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Products;
use App\Models\Attributes;
use Illuminate\Http\Request;
use App\Models\ProductAttributes;
use App\Http\Controllers\BaseController;

class ProductAttributesController extends BaseController
{
        /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadAttributes()
    {
        $attributes = Attributes::all();

        return response()->json($attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function productAttributes(Request $request)
    {
        $product = Products::findOrFail($request->id);

        return response()->json($product->attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadValues(Request $request)
    {
        $attribute = Attributes::findOrFail($request->id);

        return response()->json($attribute->values);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAttribute(Request $request)
    {
        $productAttribute = ProductAttributes::create($request->data);

        if ($productAttribute) {
            return response()->json(['message' => 'Product attribute added successfully.']);
        } else {
            return response()->json(['message' => 'Something went wrong while submitting product attribute.']);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAttribute(Request $request)
    {
        $productAttribute = ProductAttributes::findOrFail($request->id);
        $productAttribute->delete();

        return response()->json(['status' => 'success', 'message' => 'Product attribute deleted successfully.']);
    }
}
