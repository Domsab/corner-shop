<?php

namespace App\Http\Controllers\Dashboard;
use App\Traits\UploadAble;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\ProductImages;

class ProductImageController extends Controller
{
    use UploadAble;

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function upload(Request $request)
    {
        $product = $this->productRepository->findProductById($request->product_id);

        if ($request->has('image')) {

            $image = $this->uploadOne($request->image, 'products');

            $productImage = new ProductImages([
                'full'      =>  $image,
            ]);

            $product->images()->save($productImage);
        }

        return response()->json(['status' => 'Success']);
    }

    public function delete($id)
    {
        $image = ProductImages::findOrFail($id);

        if ($image->full != '') {
            $this->deleteOne($image->full);
        }
        $image->delete();

        return redirect()->back();
    }
}
