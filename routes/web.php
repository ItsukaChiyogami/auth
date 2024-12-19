<?php

use Illuminate\Support\Facades\Route;
use App\Models\Profile;
use App\Models\Book;
use App\Models\Jurnal;
use App\Models\FYP;
use App\Models\CD;
use App\Models\Newspapers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Halaman Utama / Welcome
Route::get('/', function () {
    $query = request()->input('query');
    
    // Ambil data berdasarkan query pencarian
    $profiles = Profile::where('name', 'like', '%' . $query . '%')
        ->orWhere('username', 'like', '%' . $query . '%')
        ->orWhere('email', 'like', '%' . $query . '%')
        ->get();

    $books = Book::where('Judul_Buku', 'like', '%' . $query . '%')
        ->orWhere('Penulis', 'like', '%' . $query . '%')
        ->orWhere('Penerbit', 'like', '%' . $query . '%')
        ->get();

    $jurnals = Jurnal::where('Judul_Jurnal', 'like', '%' . $query . '%')
        ->orWhere('Penulis', 'like', '%' . $query . '%')
        ->orWhere('Penerbit', 'like', '%' . $query . '%')
        ->get();

    $fyps = FYP::where('Judul_FYP', 'like', '%' . $query . '%')->get();
    $cds = CD::where('Judul_CD', 'like', '%' . $query . '%')->orWhere('Genre', 'like', '%' . $query . '%')->get();
    $newspapers = Newspapers::where('Judul_Newspapers', 'like', '%' . $query . '%')->orWhere('Isi', 'like', '%' . $query . '%')->get();

    return view('welcome', compact('profiles', 'books', 'fyps', 'cds', 'newspapers', 'jurnals'));
});

// Halaman Login
Route::get('/login', function () {
    return view('login');
});

// Proses Login
Route::post('/login', function (Request $request) {
    $name = $request->input('name');
    $password = $request->input('password');

    $user = User::where('name', $name)->first();

    if ($user && Hash::check($password, $user->password)) {
        return redirect('/edit'); // Redirect ke halaman edit
    } else {
        return back()->with('error', 'Name atau password salah!');
    }
});

// Halaman Edit (CRUD semua data)
Route::get('/edit', function () {
    // Ambil semua data dari model yang ada
    $profiles = Profile::all();
    $books = Book::all();
    $jurnals = Jurnal::all();
    $fyps = FYP::all();
    $cds = CD::all();
    $newspapers = Newspapers::all();

    return view('edit', compact('profiles', 'books', 'jurnals', 'fyps', 'cds', 'newspapers'));
});

// Create data
Route::post('/edit', function (Request $request) {
    $model = $request->input('model'); // Model yang ingin disubmit (misalnya 'profile', 'book', dll)
    
    if ($model == 'profile') {
        Profile::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
        ]);
    } elseif ($model == 'book') {
        Book::create([
            'Judul_Buku' => $request->input('Judul_Buku'),
            'Penulis' => $request->input('Penulis'),
            'Penerbit' => $request->input('Penerbit'),
        ]);
    } elseif ($model == 'jurnal') {
        Jurnal::create([
            'Judul_Jurnal' => $request->input('Judul_Jurnal'),
            'Penulis' => $request->input('Penulis'),
            'Penerbit' => $request->input('Penerbit'),
        ]);
    } elseif ($model == 'fyp') {
        FYP::create([
            'Judul_FYP' => $request->input('Judul_FYP'),
        ]);
    } elseif ($model == 'cd') {
        CD::create([
            'Judul_CD' => $request->input('Judul_CD'),
            'Genre' => $request->input('Genre'),
        ]);
    } elseif ($model == 'newspaper') {
        Newspapers::create([
            'Judul_Newspapers' => $request->input('Judul_Newspapers'),
            'Isi' => $request->input('Isi'),
        ]);
    }

    return redirect('/edit');
});

// Update data
Route::put('/edit/{model}/{id}', function (Request $request, $model, $id) {
    if ($model == 'profile') {
        $profile = Profile::find($id);
        $profile->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
        ]);
    } elseif ($model == 'book') {
        $book = Book::find($id);
        $book->update([
            'Judul_Buku' => $request->input('Judul_Buku'),
            'Penulis' => $request->input('Penulis'),
            'Penerbit' => $request->input('Penerbit'),
        ]);
    } elseif ($model == 'jurnal') {
        $jurnal = Jurnal::find($id);
        $jurnal->update([
            'Judul_Jurnal' => $request->input('Judul_Jurnal'),
            'Penulis' => $request->input('Penulis'),
            'Penerbit' => $request->input('Penerbit'),
        ]);
    } elseif ($model == 'fyp') {
        $fyp = FYP::find($id);
        $fyp->update([
            'Judul_FYP' => $request->input('Judul_FYP'),
        ]);
    } elseif ($model == 'cd') {
        $cd = CD::find($id);
        $cd->update([
            'Judul_CD' => $request->input('Judul_CD'),
            'Genre' => $request->input('Genre'),
        ]);
    } elseif ($model == 'newspaper') {
        $newspaper = Newspapers::find($id);
        $newspaper->update([
            'Judul_Newspapers' => $request->input('Judul_Newspapers'),
            'Isi' => $request->input('Isi'),
        ]);
    }

    return redirect('/edit');
});

// Delete data
Route::delete('/edit/{model}/{id}', function ($model, $id) {
    if ($model == 'profile') {
        Profile::find($id)->delete();
    } elseif ($model == 'book') {
        Book::find($id)->delete();
    } elseif ($model == 'jurnal') {
        Jurnal::find($id)->delete();
    } elseif ($model == 'fyp') {
        FYP::find($id)->delete();
    } elseif ($model == 'cd') {
        CD::find($id)->delete();
    } elseif ($model == 'newspaper') {
        Newspapers::find($id)->delete();
    }

    return redirect('/edit');
});

use App\Http\Controllers\AuthController;

// Route untuk menampilkan form register
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');