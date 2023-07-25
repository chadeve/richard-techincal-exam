<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Artist;
use Carbon\Carbon;
use League\Csv\Reader;
use Faker\Factory as Faker;


class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $csvData = Storage::get('Data.csv');
        $csv = Reader::createFromString($csvData, 'r');
        $existingArtistNames = [];
        foreach ($csv as $record) {
            $artistName = $record[0];
            if (!in_array($artistName, $existingArtistNames)) {
                $code = strtoupper(substr($artistName, 0, 3));

                Artist::create([
                    'name' => $artistName,
                    'code' => $code . $faker->unique()->numberBetween(1000, 9999),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $existingArtistNames[] = $artistName;
            }
        }
    }
}
