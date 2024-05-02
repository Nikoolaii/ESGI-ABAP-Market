<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqAnswer;
use App\Models\Categorie;

class ContactController extends Controller
{
    public function index()
    {   

        $questions = Faq::paginate(6);
        $answers = FaqAnswer::all();
        $categories = Faq::get(['category']);

        return view('contact.index', [
            'categories' => $categories,
            'questions' => $questions,
            'answers' => $answers
        ]);
    }

    public function show($id )
    {   
        $question = Faq::find($id);
        $answers = FaqAnswer::all()->where('faq_id', $id);

        return view('contact.show', [
            'question' => $question,
            'answers' => $answers
        ]);
    }
}
