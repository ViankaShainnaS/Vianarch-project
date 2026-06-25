<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Products;
use App\Models\Order;
use App\Models\Tasklist;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Log;


class UserController extends Controller
{

    public function __construct()
    {
        // Cumaan method profile-related yang butuh login
        $this->middleware('auth')->only([
            'showProfile',
            'updateProfile',
            'finished',
            'progress',
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('register');
    }

    public function logincheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Berhasil login!');
        }

        return back()->with('error', 'Email atau password salah!');
    }


        public function registerCheck(Request $request)
        {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $passwordConfirm = $request->input('password_confirmation');

            // Jika username sudah dipakai
            if (User::where('name', $name)->exists()) {
                return back()->with('error', 'nama sudah digunakan!');
            }

            // Jika email sudah terdaftar
            if (User::where('email', $email)->exists()) {
                return back()->with('error', 'Email sudah terdaftar!');
            }

            // Jika password kurang dari 6 karakter
            if (strlen($password) < 6) {
                return back()->with('error', 'Password minimal 6 karakter!');
            }

            $validation = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:5'
            ]);

            $user = USER::Create($validation);
            Auth::login($user);

            return redirect()->route('login');
        }

        public function goDashboard()
    
        {
        $finishedOrders = Order::whereRaw("TRIM(status) = 'finished'")->get();
        $progressedOrders = Order::whereRaw("TRIM(status) = 'progress'")
        ->with(['tasklists' => function ($query) {
            $query->where('is_done', false);
        }])
        // ->whereHas('tasklists', function ($query) {
        //     $query->where('is_done', false)->latest('created_at');
        // })
        ->get();
        $products = Products::All();
        Order::whereRaw("TRIM(status) = 'finished'")->update([
            'finished_at' => now()
        ]);


        if(Auth::check() && Auth::user()->usertype == 'admin')
        {
        return view('admin.dashboard', compact('finishedOrders', 'progressedOrders'));
        }
        else
        {
            return view('welcome', compact('products'));
        }
    }

            public function showProfile()
        {
            $user = Auth::user();

            if (! $user) {
                return redirect()->route('login')->with('error', 'User tidak ditemukan.');
            }

            if ($user->usertype == 'admin') {
                return view('admin.profileAdmin', compact('user'))->with('error', 'Access denied.');
            }

            return view('user.profile', compact('user'));

        }

        public function updateProfile(Request $request)
            {
                $authUser = Auth::user();
                if (! $authUser) {
                    return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
                }


                $validated = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email',
                    'mobile' => 'nullable|string|max:20',
                    'address' => 'nullable|string|max:255',
                    'gender' => 'nullable|string',
                    'birthdate' => 'nullable|date',
                ]);

                // Ambil model User yang sebenarnya dari database
                $user = User::find($authUser->id);
                if (! $user) {
                    return back()->with('error', 'User tidak ditemukan.');
                }

                $user->update($validated);
                return redirect()->route('profile')->with('success', 'Profile updated successfully!');
        }

        public function deleteAccount($id)
        {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('dashboard')->with('success', 'User deleted successfully!');
        }
        public function detailProgress($id)
        {
            $user = Auth::user();
            //order buat munculin semua tasklist yang belum maupun udah done, buat nampilin di details progress
            $order = $user
                ->orders()
                ->whereRaw("TRIM(status) = 'progress'")
                ->with('tasklists')
                ->findOrFail($id);

            //tasklist buat munculin tasklist yang belum done aja, buat nampilin di details progress
            $tasklists = $order->tasklists()
                ->where('is_done', false)
                ->oldest('id')
                ->get();

            return view('user.details-progress', compact('order', 'user', 'tasklists'));
        }

        public function detailsFinished($id){
            $user = Auth::user();
            //order buat munculin semua tasklist yang belum maupun udah done, buat nampilin di details progress
            $order = $user
                ->orders()
                ->whereRaw("TRIM(status) = 'finished'")
                ->with('tasklists')
                ->findOrFail($id);

            //tasklist buat munculin tasklist yang belum done aja, buat nampilin di details progress
            $tasklists = $order->tasklists()
                ->where('is_done', false)
                ->oldest('id')
                ->get();

            return view('user.detail-finished', compact('order', 'user', 'tasklists'));
        }

}
