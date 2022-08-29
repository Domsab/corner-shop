<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CollectionRepositoryInterface;

class CollectionController extends BaseController
{
    protected $collectionRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CollectionRepositoryInterface $collectionRepository)
    {
        $this->collectionRepository = $collectionRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $collections = $this->collectionRepository->listCollections();

        return $this->responseJson($collections);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $collection = $this->collectionRepository->findCollectionById($id);

        return $this->responseJson($collection);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        =>  'required',
            'description' =>  'required',
        ]);

        $params = $request->except('_token');

        $collection = $this->collectionRepository->createCollection($params);

        if (!$collection) {
            return $this->responseJson($request->all(), 404,'Error occurred while creating collection.', true);
        }

        $collections = $this->collectionRepository->listCollections();

        return $this->responseJson($collections, 200, 'Collection added successfully.', false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id'          => 'required',
            'name'        => 'required',
            'description' => 'required',
        ]);

        $params = $request->except('_token');

        $collection = $this->collectionRepository->updateCollection($params);

        if (!$collection) {
            return $this->responseJson($request->all(), 404,'Error occurred while updating collection.', true);
        }

        $collections = $this->collectionRepository->listCollections();

        return $this->responseJson($collections, 200, 'Category updated successfully.', false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $collection = $this->collectionRepository->deleteCollection($id);

        if (!$collection) {
            return $this->responseJson(['id' => $id], 404,'Error occurred while deleting collection.', true);
        }

        $collections = $this->collectionRepository->listCollections();

        return $this->responseJson($collections, 200, 'collection deleted successfully', false);
    }
}
