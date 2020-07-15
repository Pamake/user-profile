<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\MailboxMailJob;
use App\Mail\MailboxMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\User;
use PhpParser\Node\Expr\Array_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MailboxController extends Controller
{

    public function create()
    {
        $user = $this->getAuthUser();
        return view('admin.base.Mailbox',compact('user'));
    }

    public function send(Request $request)
    {
        request()->validate([
            'category' => 'required',
            'message' => 'required'
        ]);
        if (request()->filled('email')) {
            request()->validate([
                'email' => 'required'
            ]);
        }

        if ($request->category == 'all') {
            $students = User::all();
            //$students = User::where('role', backpack_user()->id)->get();
            foreach ($students as $student) {
                $emails [] = $student->email;
            }
        } else if (!empty($request->email)) {
            $emails [] = $request->email;
        }

        if (!empty($emails)) {
            $message = request()->message;
            foreach ($emails as $email) {
                $mail = (new MailboxMail($message))->delay(Carbon::now()->addSeconds(3));
                $mail->subject = ($request->subject) ? $request->subject : 'Important Notice from ' . config('app.name');
                MailboxMailJob::dispatch($email, $mail);
//                sleep(1);
            }
            $message = 'Email(s) has been sent successfully.';
            return redirect('/admin/mailbox')->with('message', $message);

        } else {
            return redirect('/admin/mailbox')->withErrors(['emailError' => 'No email sent.']);
        }
    }

    public function userEmail(User $user)
    {
        return view('admin.base.Mailbox', compact('user'));
    }

    public function getAuthUser ()
    {
        return Auth::user();
    }

}
