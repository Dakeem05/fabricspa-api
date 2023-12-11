<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\V1\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function setFeatures (Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric',
            'contents' => 'array|required',
            'contents.*' => 'required|string',
        ];

        $validation = Validator::make($request->all(), $rules);
        if ( $validation->fails() ) {
            return ApiResponse::validationError([
                    "message" => $validation->errors()->first()
            ]);
        }

        $contents = [];
        $validatedData = $request->all();
        foreach ($validatedData['contents'] as $content) {
            $contents[] = $content;
        }

        // $feature =
    }
}
