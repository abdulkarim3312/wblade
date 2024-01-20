<?php

namespace App\Http\Controllers\Front;

use App\Helpers\UploadHelper;
use App\Models\User;
use App\Models\UserTraining;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Providers\RouteServiceProvider;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    //Google Login
    public function redirectToSocial($service)
    {
        return Socialite::driver($service)->redirect();
    }

    //Google callback  
    public function handleSocialCallback($service)
    {
        try {
            $user = Socialite::driver($service)->user();
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong !!');
            return redirect()->route('home');
        }
        $this->_registerorLoginUser($user);
        return redirect(RouteServiceProvider::HOME);
    }


    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->terms = 1;
            $user->registered_by = 'google';
            $user->user_type = 'customer';
            $user->status = 'active';
            $user->payment_method_status = 'inactive';
            $user->registered_at = now();
            //process profile
            $fileContents = file_get_contents($data->avatar);
            $filename = $data->id . '.jpg';
            Storage::disk('public')->put('upload/avatar_images/' . $filename, $fileContents);
            $user->avatar = $filename;

            $user->save();
            $user->attachRole('customer');
        }
        Auth::login($user);
    }

    public function passwordUpdate()
    {
        $trainings = UserTraining::with('training', 'training.videos', 'trainingExam', 'trainingExam.questions')->where('user_id', auth()->user()->id)->get();
        $purchaseTrainingCategories = $this->purchaseTrainingCategories($trainings);
        return view('frontend.users.password_update', compact('purchaseTrainingCategories'));
    }

    public function storePasswordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => ['required', 'confirmed', Password::min(6)]
        ]);
        $user = User::select('id', 'password')->where('id', auth()->user()->id)->first();

        $checkPassword = Hash::check($request->old_password, $user->password);
        if ($checkPassword) {
            $user->password = Hash::make($request->password);
            $user->save();
            session()->flash('success_message', "Password updated successfully");
            return redirect()->back();
        }
        session()->flash('error_message', "Password do not match");
        return redirect()->back();
    }

    public function userDashboard()
    {
        return view('frontend.users.dashboard');
    }

    public function customerProfile()
    {
        if (is_null($this->user) || !$this->user->hasRole('customer')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $orders = Order::with('user')->where('user_id', $this->user->id)->whereIn('order_status', ['accepted', 'delivered', 'canceled'])->orderBy('id', 'desc')->get();
        $user = User::find($this->user->id);
        return view('frontend.users.customer_profile', compact('orders', 'user'));
    }

    public function customerProfileUpdate(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole('customer')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $request->validate([
            'email'  => 'required|email|unique:users,email,' . $this->user->id,
            'name' => 'required|string|max:255',
        ]);

        $user = User::find($this->user->id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        session()->flash('success', 'Details has been updated successfully !!');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole(['customer'])) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $request->validate([
            'old_password'  => 'required|min:8',
            'password' => 'confirmed|min:8|different:old_password'
        ]);

        if (Hash::check($request->old_password, $this->user->password)) {
            $user = User::find($this->user->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['success' => true, 'message' => 'Password has been updated successfully !!'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Old Password is incorrect !!'], 200);
        }
    }
}
