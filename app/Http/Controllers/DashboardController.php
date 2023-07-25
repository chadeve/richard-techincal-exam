<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Album;

class DashboardController extends Controller
{
    public function index()
    {
        try {
           
            $totalAlbumsSold = Album::sum('sales');
            $combinedAlbumSales = Album::sum('sales');
            $topSellingArtist = Artist::withCount('albums')->orderByDesc('albums_count')->first();
            $searchedArtist = request('search_artist');

           
            $filteredAlbums = ($searchedArtist)
                ? Album::whereHas('artist', function ($query) use ($searchedArtist) {
                    $query->where('name', 'like', "%{$searchedArtist}%");
                })->get()
                : null;

            
            return view('home', compact('totalAlbumsSold', 'combinedAlbumSales', 'topSellingArtist', 'filteredAlbums'));
        } catch (\Exception $e) {
            
            \Log::error('Error in DashboardController: ' . $e->getMessage());

            
            return redirect()->back()->with('error', 'An error occurred while loading the dashboard.');
        }
    }
}
