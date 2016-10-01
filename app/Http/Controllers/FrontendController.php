<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services;
use App\Messages;
use App\Fileentry;

class FrontendController extends Controller
{
  public function index()
  {
    $services = Services::all();
    $hoursOpen = Array();
    $hoursOpen["1:00 am"] = "1:00 am";
    $hoursOpen["1:30 am"] = "1:30 am";
    $hoursOpen["2:00 am"] = "2:00 am";
    $hoursOpen["2:30 am"] = "2:30 am";
    $hoursOpen["3:00 am"] = "3:00 am";
    $hoursOpen["3:30 am"] = "3:30 am";
    $hoursOpen["4:00 am"] = "4:00 am";
    $hoursOpen["4:30 am"] = "4:30 am";
    $hoursOpen["5:00 am"] = "5:00 am";
    $hoursOpen["5:30 am"] = "5:30 am";
    $hoursOpen["6:00 am"] = "6:00 am";
    $hoursOpen["6:30 am"] = "6:30 am";
    $hoursOpen["7:00 am"] = "7:00 am";
    $hoursOpen["7:30 am"] = "7:30 am";
    $hoursOpen["8:00 am"] = "8:00 am";
    $hoursOpen["8:30 am"] = "8:30 am";
    $hoursOpen["9:00 am"] = "9:00 am";
    $hoursOpen["9:30 am"] = "9:30 am";
    $hoursOpen["10:00 am"] = "10:00 am";
    $hoursOpen["10:30 am"] = "10:30 am";
    $hoursOpen["11:00 am"] = "11:00 am";
    $hoursOpen["11:30 am"] = "12:30 am";
    $hoursOpen["12:00 am"] = "12:00 am";
    $hoursOpen["12:30 am"] = "12:30 am";

    return view('frontend/welcome', ['services' => $services, 'hours' => $hoursOpen, 'header_id' => 1]);
  }

  public function postContactUs(Request $request)
  {

    $obj_message = new Messages();
    $obj_message->name = $request['name'];
    $obj_message->last_name = $request['last_name'];
    $obj_message->email = $request['email'];
    $obj_message->phone = $request['phone'];
    if ($request['id_messagetipes'] == 1) {
      $obj_message->contacttime = $request['contacttime'];
    } else if ($request['id_messagetipes'] == 2) {
      $obj_message->feet = $request['feet'];
      $obj_message->id_service = $request['id_service'];
    }
    $obj_message->message = $request['message'];
    $obj_message->id_messagetipes = $request['id_messagetipes'];
    $obj_message->save();

    return response()->json(['response' => true]);
  }

  public function getLoguin($header_id)
  {
    return view('frontend/loguin', ['header_id' => $header_id]);
  }
}
