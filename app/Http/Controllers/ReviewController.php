<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    public function ReviewGuide(Request $request, $id)
    {
        $review = new Review();
        $review->guide_id = $id;
        $review->comment = $request->comment;
        $review->stars = $request->stars;
        $review->user_id = auth()->user()->id;
        $review->save();
        return response()->json($review);
    }
      
           

        
    }
   
        
