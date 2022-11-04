<?php

namespace App\Http\Controllers;

use App\Models\WordDictionary;

class WordDictionaryController extends Controller
{
    public function index()
    {
        $wordDictionary = new WordDictionary();
        return $wordDictionary->get();
    }

    public function search(string $keyword)
    {
        $wordDictionary = new WordDictionary();
        $wordDictionary = $wordDictionary->where('word', 'like', '%' . $keyword . '%');
        $words =  $wordDictionary->get();

        $suggestionList = "";

        if($words->count() > 0) {
            $suggestionList .= '<ul id="suggestion-list">';

            foreach($words as $word){
                $suggestionList = $suggestionList . '<li onClick="selectWord(\'' . $word->word . '\')">';
                $suggestionList = $suggestionList . $word->word;
                $suggestionList = $suggestionList . '</li>';             
            }

            $suggestionList = $suggestionList . '</ul>';
        }

        return $suggestionList;
    }

}
