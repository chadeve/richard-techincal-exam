<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;
use App\Models\Album;
use App\Models\Artist;
use Carbon\Carbon;
use Faker\Factory as Faker;

class AlbumsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $csvData = Storage::get('Data.csv');
        $csv = Reader::createFromString($csvData, 'r');

        $csv->setHeaderOffset(0);

   
        foreach ($csv as $record) {
            $artistName = $record['Artist'];
            $albumName = $record['Album'];
            $sales = $record['2022 Sales'];
            $dateRelease = Carbon::createFromFormat('ymd', $record['Date Released'])->toDateString();
            $lastUpdate = Carbon::createFromFormat('ymd', $record['Last Update'])->toDateString();

         
            $artist = Artist::where('name', $artistName)->first();

        
            Album::create([
                'artist_id' => $artist->id,
                'name' => $albumName,
                'sales' => $sales,
                'date_release' => $dateRelease,
                'created_at' => Carbon::now(),
                'updated_at' => $lastUpdate,
            ]);
        }
    }
}