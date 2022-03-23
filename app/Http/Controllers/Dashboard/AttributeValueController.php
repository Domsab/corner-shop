<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\AttributeValues;
use App\Http\Controllers\Controller;
use App\Interfaces\AttributeRepositoryInterface;

class AttributeValueController extends Controller
{
    protected $attributeRepository;

    public function __construct(AttributeRepositoryInterface $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function getValues(Request $request)
    {
        $attributeId = $request->input('id');
        $attribute = $this->attributeRepository->findAttributeById($attributeId);

        $values = $attribute->values;

        return response()->json($values);
    }

    public function addValues(Request $request)
    {
        $value = new AttributeValues();
        $value->attribute_id = $request->input('attribute_id');
        $value->value = $request->input('value');
        $value->price = $request->input('price');
        $value->save();

        return response()->json($value);
    }

    public function updateValues(Request $request)
    {
        $attributeValue = AttributeValues::findOrFail($request->input('valueId'));
        $attributeValue->attribute_id = $request->input('attribute_id');
        $attributeValue->value = $request->input('value');
        $attributeValue->price = $request->input('price');
        $attributeValue->save();

        return response()->json($attributeValue);
    }

    public function deleteValues(Request $request)
    {
        $attributeValue = AttributeValues::findOrFail($request->input('id'));
        $attributeValue->delete();

        return response()->json(['status' => 'success', 'message' => 'Attribute value deleted successfully.']);
    }
}
