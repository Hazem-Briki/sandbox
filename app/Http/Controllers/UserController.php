<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    public function data()
    {
        // Fetch the first 20 questions by their question_number
        $exams = Exam::orderBy('question_number')->take(20)->get();
    
        // Shuffle the exams
        $shuffledExams = $exams->shuffle();
    
        // Paginate the shuffled exams manually
        $perPage = 5;
        $page = request()->get('page', 1);
        $offset = ($page - 1) * $perPage;
        $currentPageExams = $shuffledExams->slice($offset, $perPage)->values();
    
        $paginatedExams = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentPageExams,
            $shuffledExams->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    
        return view('data-engineer', ['exams' => $paginatedExams]);
    }
    
    

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'you are now logged out');
    }

    public function showCorrectHomepage()
    {
        if (auth()->check()) {
            return view('homepage-feed');
        } else {
            return view('homepage');
        }
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'you have successfully logged in');
        } else {
            return redirect('/')->with('failure', 'Invalid login');
        }
    }
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('success', 'thank you for creating an account');
    }
}
