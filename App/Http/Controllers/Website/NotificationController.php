<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Submission;
class NotificationController extends Controller
{
    public static function subscribe(Request $request)
	{
		$validatedData = $request->validate([
			'email' => 'required|email',
		]);
		$subscriber = Subscription::where('email', $validatedData['email'])->first();
		if ($subscriber == null) {
			$subscription = new Subscription;
			$subscription->locale = app()->getLocale();
			$subscription->email = $validatedData['email'];
			$subscription->save();
			return response()->json(trans('website.successfuly_subscribed'));
		}
		return response()->json(trans('website.allready_subscribed'));
	}

    public static function submission(Request $request)
	{
	

		$validated = $request->validate([
			'name_surname' => 'required',
			'sub_section' => 'required',
			'letter' => 'required',
		]);

		$values = request()->all();
		if ($request->identity != 1) {
			$values['user_id'] = trans('website.unknown');
			$values['name'] = trans('website.unknown');
		}
		$values['additional'] = getAdditional($values, config('submissionAttr.additional'));
		$submission = Submission::create($values);

		return redirect()->back()->with([
			'message' => trans('website.submission_sent'),
		]);
	}
}
