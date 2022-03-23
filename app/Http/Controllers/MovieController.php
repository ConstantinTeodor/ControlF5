<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Entities\User;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class MovieController extends Controller
{
    public function index()
    {
        $movies = Movies::where('status', 1)
                       ->where('rating', '>', 5)
                       ->get();
        return json_encode($movies);
    }

    public function create()
    {
        return view('movies');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'rating' => 'required',
            'description' => 'required',
            'imagine' => 'required',
        ]);

        /**Check the validation becomes fails or not
         */
        if ($validator->fails()) {
            /**Return error message
             */
            return response()->json([ 'error'=> $validator->errors() ]);
        }
        else {
            $movies = new Movies;
            $movies->name = $request['name'];
            $movies->rating = $request['rating'];
            $movies->description = $request['description'];
            $movies->imagine = $request['imagine'];
            $movies->save();

            return json_encode($movies);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Movies::findOrFail($id);
        $product->delete();
        return response()->json('Movie deleted!');
    }
}
