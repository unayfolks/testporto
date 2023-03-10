<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BooksController extends Controller
{
    public function insert(Request $request)
    {
        $lg = DB::table('books')->insert([
            'title'=>$request->title,
            'artist'=>$request->artist,
            'lyric'=>$request->lyric
        ]);

        return response()->json($lg);
    }
    public function get()
    {
        $jk = DB::table('books')->get();

        return response()->json($jk);
    }
    public function getdetail($id)
    {
        // return $id;
        $re = DB::table('books')->where('id', $id)->get();

        return response()->json($re);
    }
}
