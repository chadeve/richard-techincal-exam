@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

   
    <p>Total Albums Sold: {{ $totalAlbumsSold }}</p>

   
    <p>Combined Album Sales: {{ $combinedAlbumSales }}</p>


    <p>Top Selling Artist: {{ $topSellingArtist->name }} ({{ $topSellingArtist->albums_count }} albums sold)</p>

    <form action="{{ route('dashboard') }}" method="GET">
        <label for="search_artist">Search Artist:</label>
        <input type="text" name="search_artist" id="search_artist" value="{{ request('search_artist') }}">
        <button type="submit">Search</button>
    </form>
    @if ($filteredAlbums)
        <h2>Albums by {{ request('search_artist') }}</h2>
        <ul>
            @foreach ($filteredAlbums as $album)
                <li>{{ $album->name }} - Sales: {{ $album->sales }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection