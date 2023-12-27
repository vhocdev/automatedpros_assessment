<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class AssessmentController extends Controller
{
    public function correctCode(Request $request){
        
        $userId = $request->input('user_id');
        $query = $request->input('query');

        $status = 'active';
        $model = Restaurant::where('restaurants.user_id', $userId)
            ->where(function ($custquery) use ($query) {
                $custquery->where('name', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%')
                    ->orWhere('location', 'like', '%'.$query.'%');
            })
        ->where('status', $status)
        ->orderBy('created_at', 'DESC')
        ->paginate(10);

        return $model;
    }

    public function saveImage(Request $request){
        return $request->all();
    }
}
