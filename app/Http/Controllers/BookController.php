<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Book;

class BookController extends Controller
{
    // Display all books with filtering
    public function index(Request $request)
    {
        $books = Book::query();

        if ($request->status) {
            $books->where('status', $request->status);
        }

        if ($request->year) {
            $books->where('published_year', $request->year);
        }

        $books = $books->paginate(10);

        return Inertia::render('Books/Index', [
            'books' => $books,
            'filters' => $request->only(['status', 'year']),
        ]);
    }

    // Display details of a single book
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return Inertia::render('Books/Show', [
            'book' => $book,
        ]);
    }

    // Show the form to create a new book
    public function create()
    {
        return Inertia::render('Books/Create');
    }

    // Store a new book
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'status' => ['required', Rule::in(['available', 'borrowed', 'reserved'])],
        ]);

        Book::create($request->all());

        return redirect()->route('books.index');
    }

    // Show the form to edit an existing book
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return Inertia::render('Books/Edit', [
            'book' => $book,
        ]);
    }

    // Update an existing book
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'status' => ['required', Rule::in(['available', 'borrowed', 'reserved'])],
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index');
    }

    // Soft-delete (archive) a book
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete(); // This soft-deletes the book

        return redirect()->route('books.index');
    }
}
