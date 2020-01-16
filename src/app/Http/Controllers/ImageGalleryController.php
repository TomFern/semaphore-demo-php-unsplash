<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crew\Unsplash as Unsplash;

Unsplash\HttpClient::init(
    [
        'applicationId' => config('app.unsplash.applicationId'),
        'secret'        => config('app.unsplash.secret'),
        'utmSource'     => config('app.unsplash.source')
    ]
);

class ImageGalleryController extends Controller
{
    public function index()
    {

        return $this->showGallery('cats', 10, 'landscape');
    }

    public function search(Request $request)
    {

        return $this->showGallery($request->search, $request->count, $request->orientation);
    }

    private function showGallery($search, $count, $orientation)
    {

        $page = 1;
        $collections = "";

        $results = Unsplash\Search::photos($search, $page, $count, $orientation, $collections);
        $images = $results->getResults();
        return view('image-gallery', compact('images', 'search', 'count', 'orientation'));
    }
}
