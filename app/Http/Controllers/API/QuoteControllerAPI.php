<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteUpdateRequest;
use App\Http\Resources\QuoteCollection;
use App\Http\Resources\QuoteShowResource;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteControllerAPI extends Controller
{
    public function index() {
        return QuoteCollection::collection(Quote::paginate(10));
    }
    
    public function show(Quote $quote) {
        return new QuoteShowResource($quote);
    }

    public function store(QuoteUpdateRequest $request) {
        $quote = new Quote;
        $quote->user_id = auth()->user()->id;
        $quote->author = $request->author;
        $quote->body = $request->body;
        $quote->save();

        return response([
            'data' => new QuoteShowResource($quote)
        ], 200);
    }
}
