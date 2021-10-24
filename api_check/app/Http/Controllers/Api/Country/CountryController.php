<?php

namespace App\Http\Controllers\Api\Country;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Models\Models\CountryModel;

use Validator;

class CountryController extends Controller
{
    public function country(){
      try {
        $user = auth() -> userOrFail();
      } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
        return response()->json(['error' => true, $e->getMessage()], 401);
      }
      return response()->json(CountryModel::get(), 200);
    }

    public function countryById($id){
        try {
          $user = auth() -> userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
          return response()->json(['error' => true, $e->getMessage()], 401);
        }
        $country = CountryModel::find($id);
        if($country === null){
          return response()->json(['error' => true, 'message' => 'Country not found'], 404);
        }
        return response()->json($country, 200);
    }

    public function countrySave(Request $req){
        try {
          $user = auth() -> userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
          return response()->json(['error' => true, $e->getMessage()], 401);
        }
        $rules = [
          'iso' => 'required|min:2|max:2',
          'name' => 'required|min:3|notNull',
          'name_en' => 'required|min:3|notNull'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
          return response()->json($validator->errors(), 400);
        }
        $country = CountryModel::create($req->all());
        return response()->json($country, 201);
    }

    public function countryEdit(Request $req, $id){
        try {
          $user = auth() -> userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
          return response()->json(['error' => true, $e->getMessage()], 401);
        }
        $country = CountryModel::find($id);
        if($country === null){
          return response()->json(['error' => true, 'message' => 'Country not found'], 404);
        }
        $rules = [
          'iso' => 'required|min:2|max:2',
          'name' => 'required|min:3|notNull',
          'name_en' => 'required|min:3|notNull'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
          return response()->json($validator->errors(), 400);
        }
        $country->update($req->all());
        return response()->json($country, 200);
    }

    public function countryDelete(Request $req, $id){
        try {
          $user = auth() -> userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
          return response()->json(['error' => true, $e->getMessage()], 401);
        }
        $country = CountryModel::find($id);
        if($country === null){
          return response()->json(['error' => true, 'message' => 'Country not found'], 404);
        }
        $country->delete();
        return response()->json('', 204);
    }
}
