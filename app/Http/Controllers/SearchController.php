<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\BookRepository;

class SearchController extends Controller
{

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function search(Request $request):JsonResponse
    {
        $searchResult = $this->bookRepository->search($request->searchParams);

        return response()->json([ 'searchResult' => $searchResult ],Response::HTTP_OK);
    }
}
