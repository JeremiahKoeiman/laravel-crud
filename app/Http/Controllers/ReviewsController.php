<?php

namespace App\Http\Controllers;

use App\Review;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewsStoreRequest;
use App\Http\Requests\ReviewsUpdateRequest;

class ReviewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create reviews', ['only'=> ['create', 'store']]);
        $this->middleware('permission:edit reviews', ['only'=> ['edit', 'update']]);
        $this->middleware('permission:delete reviews', ['only'=> ['delete', 'destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all products

        $reviews = Review::all();
        //return a view and send the variable $products with it.
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('reviews.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewsStoreRequest $request)
    {
        //create new Product
        $review = new Review();
        $review->title = $request->title;
        $review->user_id = Auth::user()->id;
        $review->product_id = $request->product_id;
        $review->body = $request->body;
        $review->rating = $request->rating;
        //save review in Database (execute inserts)
        $review->save();

        return redirect()->route('reviews.index')->with('message', 'Review aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $products = Product::all();
        return view('reviews.edit', compact('review', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewsUpdateRequest $request, review $review)
    {
        //
        $review->title = $request->title;
        $review->username = $request->username;
        $review->body = $request->body;
        $review->rating = $request->rating;
        //save review in database (execute update)
        $review->save();

        return redirect()->route('reviews.index')->with('message', 'Review gewijzigd.');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function delete(Review $review)
    {
        return view('reviews.delete', compact('review'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Review $review
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('message', 'Review verwijderd.');
    }
}
