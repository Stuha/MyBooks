<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function all()
    {
        $allBooks = Book::paginate(10);

        return $allBooks;
    }

    public function find(int $id)
    {
        $book = Book::find($id);

        return $book;
    }

    public function create(mixed $data)
    {
        $book = new Book();
        $book->author_name = $data->author_name;
        $book->title = $data->title;
        $book->category_id = $data->category_id;
        $book->publish_at = $data->publish_at;
        $book->country = $data->country;
        $book->page_no = $data->page_no;

        $book->save();

        return $book;
    }

    public function update(mixed $data)
    {
        $book = Book::find($data->id)->updateOrCreate([
            'author_name' => $data->author_name,
            'title' => $data->title,
            'category_id' => $data->category_id,
            'publish_at' => $data->publish_at,
            'country' => $data->country,
            'page_no' => $data->page_no
        ]);

        return $book;
    }

    public function delete(int $id)
    {
        $this->find($id)->delete();
    }
}
