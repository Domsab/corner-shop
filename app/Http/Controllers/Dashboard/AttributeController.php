<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\AttributeRepositoryInterface;

class AttributeController extends BaseController
{
    protected $attributeRepository;

    public function __construct(AttributeRepositoryInterface $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function index()
    {
        $attributes = $this->attributeRepository->listAttributes();

        return $this->responseJson($attributes);
    }

    public function create()
    {
        # code...
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code'          =>  'required',
            'name'          =>  'required',
            'frontend_type' =>  'required'
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeRepository->createAttribute($params);

        if (!$attribute) {
            return $this->responseJson($request->all(), 404,'Error occurred while creating attribute.', true);
        }

        return $this->responseJson($attribute, 200, 'Attribute added successfully.', false);

    }

    public function edit($id)
    {
        $attribute = $this->attributeRepository->findAttributeById($id);

        return $this->responseJson($attribute);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'code'          =>  'required',
            'name'          =>  'required',
            'frontend_type' =>  'required'
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeRepository->updateAttribute($params);

        if (!$attribute) {
            return $this->responseJson($request->all(), 404,'Error occurred while updating attributes.', true);
        }
        return $this->responseJson($attribute, 200, 'Attribute updated successfully.', false);
    }

    public function delete($id)
    {
        $attribute = $this->attributeRepository->deleteAttribute($id);

        if (!$attribute) {
            return $this->responseJson(['id' => $id], 404,'Error occurred while deleting category.', true);
            // return $this->responseJson('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseJson([], 200, 'Category deleted successfully', false);
    }

}
