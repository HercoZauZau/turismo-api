<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Destinos;
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
        $review->user_id = $request->user_id;
        $review->save();

        //count the number of reviews by guide
        $count = Review::where('guide_id', $id)->count();
        //sum all stars from reviews by guide
        $sum = Review::where('guide_id', $id)->sum('stars');
        //calculate the average
        $average = $sum / $count;
        //update guide's stars average with the average of all stars in reviews
        $guide = User::find($id);
        $guide->stars_avg = $average;
        $guide->save();

    

        return response()->json($review);
    }


    public function ReviewDestiny ($request, $id){
        $review = new Review();
        $review->destiny_id = $id;
        $review->comment = $request->comment;
        $review->stars = $request->stars;
        $review->user_id = $request->user_id;
        $review->save();

        //count the number of reviews by destiny
        $count = Review::where('destiny_id', $id)->count();
        //sum all stars from reviews by destiny
        $sum = Review::where('destiny_id', $id)->sum('stars');
        //calculate the average
        $average = $sum / $count;
        //update guide's stars average with the average of all stars in reviews
        $destiny = Destinos::find($id);
        $destiny->stars_avg = $average;
        $destiny->save();

    

        return response()->json($review);
    }
   //retrieve all reviews from a guide
    public function getReviews($id)
    {
        $reviews = Review::where('guide_id', $id)->get();
        return response()->json($reviews);
    }
}
   
        
