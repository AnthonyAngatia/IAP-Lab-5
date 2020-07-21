<?php

namespace App\Http\Controllers;

use App\Car;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    //
    public function addReview()
    {
        //Add Review
        $review = new Review();
        $review->review = request('review');
        $review->car_id = request('car_id');
        $review->save();

        return redirect('/car');
    }
    /**
     * param id is the car_id
     * returns reviews associated with a particaular car
     */
    public function particularCarReviews($id)
    {
        $reviews = DB::table('reviews')->where('car_id', $id);
        print_r($reviews);
        error_log($reviews);
        //Should return to postman
        return $reviews;
    }
    /**
     * param id is the review id
     * returns cardetails of a particular review
     */
    public function particularCarDetails($id)
    {
        $car_id = DB::table('reviews')->where('id', $id)->pluck('car_id');
        $car = DB::table('cars')->where('id', $car_id);
        error_log($car);
        return $car;
    }
}
