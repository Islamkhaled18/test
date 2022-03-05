<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;
use App\Traits\CategoryApiResponseTrait;

class CategoryController extends Controller
{
    use CategoryApiResponseTrait;

    public function index(){

        $categories = CategoryResource::collection(Category::get());
        return $this->CategoryApiResponse($categories,'ok',200);

    }//end of index

    public function show($id){

        $category = Category::findOrFail($id);

        return $this->CategoryApiResponse(new CategoryResource($category),'ok',200);

    }//end of show
}
