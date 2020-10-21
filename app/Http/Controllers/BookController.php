<?php
/**
 * @since       v0.1.0
 * @package     Dev-PHP
 * @author      Andre Board <dre.board@gmail.com>
 * @version     v1.0
 * @access      public
 * @see         https://github.com/dreboard/books
 */

namespace App\Http\Controllers;

use Facades\App\Services\BookService;
use Illuminate\Http\Request;


/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    public function __construct()
    {

    }


    /**
     * Load the welcome page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getBooks()
    {
        return view('welcome');
    }

    /**
     * Search the google api for book title
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function searchBooks(Request $request)
    {
        $books = BookService::searchBooks($request->input('search'));
        return view('welcome', ['books' => $books, 'search' => $request->input('search')]);
    }

    /**
     * Get a book by ISBN
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getBook(string $id, $search)
    {
        $book = BookService::getById($id);
        return view('book', ['book' => $book, 'search' => $search]);
    }


    public function saveBook(string $isbn){
        /*
         * $book = new Book;
           $flight->isbn = $request->isbn;
           $book->save();
         * */
    }

    public function findAllBooks(){
        /*
         * $result = DB::table('book_user')
            ->select('*')
            ->where('user_id', '=', Auth::id())
            ->where('book_id', '=', 1)
            ->get();
           return view('found', ['book' => $book]);
         * */
    }

}
