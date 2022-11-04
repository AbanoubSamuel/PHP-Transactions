<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $word = new Word();
        $words = $word->get();
        return view("searchWords")->with('words', $words); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (count($request->all()) > 0) {
            $validatedData = $request->validate([
                'autocomplete_text' => 'required|max:255',
            ]);

            $word = new Word();
            $word->word = $request->autocomplete_text;

            // Saving to database;
            if ($word->save()) {
                $data = [
                    'success' => 'Word saved. (تم حفظ الكلمة بنجاح !)',
                ];
                return $data;
            } else {
                $data = [
                    'error' => 'Word NOT saved! (لم يتم حفظ الكلمة بنجاح !)',
                    'success' => false,
                ];
                return $data;
            }
        } else {
            $data = [
                'error' => 'Word NOT saved! (لم يتم حفظ الكلمة بنجاح !)',
                'success' => false,
            ];
            return $data;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        //
    }
}
