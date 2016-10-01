<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Validator;
use App\Http\Controllers\MailController;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        if ($request['user_id'] && $request['user_id'] != null) {

            $user = User::find($request['user_id']);
            Auth::login($user);
            $user->active = true;
            $user->save();
            return response()->json(['msg' => true]);
        }
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:6'
        ]);

        $email = $request['email'];
        $name = $request['name'];
        $password = $request['password'];

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = bcrypt($password);

        $user->save();

        $request['subject'] = 'Regitration Confirm';
        $mail = new MailController();
        $sendConf = $mail->sendConfirmation($request);

        if ($sendConf) {
            return view('emails/checkEmail', ['user' => $user, 'sendEmail' => true]);
        }
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        } else {
            $message = "The email and password you entered don't match.";
            return redirect()->back()->with(['message' => $message, 'error' => 1]);
        }

    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getAccount()
    {
        $user = Auth::user();
        return view('backend/account', ['user' => $user]);
    }

    public function postEditAccount(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:120'
        ]);
        $message = "Account edit successfully!!";
        $user = Auth::user();
        $user->name = $request['name'];
        if ($user->password != $request['password']) {
            $user->password = bcrypt($request['password']);
        }
        $user->update();
        $file = $request->file('image');
        $fileName = $request['name'] . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($fileName, File::get($file));
        }
        return redirect()->route('account.get')->with(['message' => $message]);
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}