<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
     public function index()
     {
         $response = Http::get('https://newsapi.org/v2/everything?q=tesla&from=2024-01-23&sortBy=publishedAt&apiKey=563b76068a86434e9c23931d9d52068f');
         $articles = $response->json()['articles'];
     
         $authorsResponse = Http::get('https://randomuser.me/api/?results=' . count($articles));
         $authors = $authorsResponse->json()['results'];
     
         foreach ($articles as $key => $article) {
             $articles[$key]['author'] = [
                 'name' => $authors[$key]['name']['first'] . ' ' . $authors[$key]['name']['last'],
                 'picture' => $authors[$key]['picture']['thumbnail']
             ];
         }
     
         $currentPage = request()->has('page') ? request('page') : 1;
         $perPage = 10; // Show 10 articles per page
         $currentItems = array_slice($articles, $perPage * ($currentPage - 1), $perPage);
     
         $articlesPaginated = new \Illuminate\Pagination\LengthAwarePaginator($currentItems, count($articles), $perPage, $currentPage);
     
         return view('home', compact('articlesPaginated'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
