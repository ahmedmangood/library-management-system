<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function frontCategory()
    {
        $categories = Category::all();

        return view('category', ['categories' => $categories]);
    }

    public function showBooksInCategory($categoryID) {

        $category = Category::find($categoryID);

        $books = $category->books;

        return view('booksincategory', compact('category', 'books'));
    } 
    public function frontAuthor()
    {
        $authors = Author::all();

        return view('authorCard', compact('authors'));
    }
    
    public function booksInAuthors($author_id) {
        $authorsBooks = Book::find($author_id);
        $books = $authorsBooks->books;
        return view('authorsBooks', compact('authors', 'books'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('term');
        $categoryName = $request->input('category');

        $books = Book::query()
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('author', function ($query) use ($searchTerm) {
                            $query->where('author_name', 'like', '%' . $searchTerm . '%');
                        });
            })
            ->when($categoryName, function ($query, $categoryName) {
                $query->whereHas('categories', function ($query) use ($categoryName) {
                    $query->where('name', $categoryName);
                });
            })->get();

        $orderBy = $request->input('order_by');
        if ($orderBy === 'latest') {
            $books = $books->sortByDesc('created_at');
        } elseif ($orderBy === 'name') {
            $books = $books->sortBy('title');
        }
        return view('book.search', compact('books'));
    }

}