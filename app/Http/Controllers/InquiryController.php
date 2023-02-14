<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index() {
      $inquiries = Inquiry::all()->sortByDesc('created_at');

      return view('inquiries', [
        'inquiries' => $inquiries,
      ]);
    }

    public function filter(Request $request) {
      $status = $request->input('status');
      if($status == 'all') {
        $inquiries = Inquiry::all()->sortByDesc('created_at');
      } else {
        $inquiries = Inquiry::all()->where('status', $status)->sortByDesc('created_at');
      }


      error_log($status);

      return view('inquiries', [
        'inquiries' => $inquiries,
        'status' => $status
      ]);
    }


    public function show($id) {
      $inquiry = Inquiry::find($id);

      return view('inquiryDetails', ['inquiry' => $inquiry]);
    }

    public function destroy($id) {
      $inquiry = Inquiry::findOrFail($id);
      $inquiry->delete();

      return redirect('/inquiries');
    }

    public function update($id) {
      $inquiry = Inquiry::findOrFail($id);
      $inquiry->status = request('status');
      $inquiry->memo = request('memo');

      $inquiry->save();

      return redirect('/inquiries');
    }
}
