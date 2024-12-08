<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
    {
        // Insert sample books data
        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'description' => 'A novel about the American dream, set in the 1920s.',
            'published_year' => 1925,
            'status' => 'available',
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'description' => 'A gripping story of racial injustice in the American South.',
            'published_year' => 1960,
            'status' => 'borrowed',
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'description' => 'A dystopian novel exploring government surveillance and totalitarianism.',
            'published_year' => 1949,
            'status' => 'reserved',
        ]);

        Book::create([
            'title' => 'Moby Dick',
            'author' => 'Herman Melville',
            'description' => 'A whaling voyage that explores themes of obsession and revenge.',
            'published_year' => 1851,
            'status' => 'available',
        ]);

        Book::create([
            'title' => 'The Catcher in the Rye',
            'author' => 'J.D. Salinger',
            'description' => 'The story of a disillusioned teenage boy, Holden Caulfield.',
            'published_year' => 1951,
            'status' => 'borrowed',
        ]);

        Book::create([
            'title' => 'Pride and Prejudice',
            'author' => 'Jane Austen',
            'description' => 'A romantic novel that also critiques societal norms and class disparities.',
            'published_year' => 1813,
            'status' => 'reserved',
        ]);
    }
}
