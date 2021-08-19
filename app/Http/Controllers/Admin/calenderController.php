<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CrudEvents;
use Validator;

class calenderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if($request->ajax()) {  
            $data = CrudEvents::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'name', 'start', 'end']);
            return response()->json($data);
        }
        return view('admin.calender');
    }

    public function calenderCRUD(Request $request) {
        

        switch($request->type) {
            case 'create':
                $validator = Validator::make($request->all(), [
                    'eventName' => 'required',
                    'eventStart' => 'required',
                    'eventEnd' => 'required',
                ]);

                if ($validator->fails()) {
                    return $validator->messages()->all()[0];
                }

                $event = CrudEvents::create([
                    'name' => $request->eventName,
                    'start' => ($request->eventStart)." 00:00:00",
                    'end' => ($request->eventStart)." 23:59:59",
                ]);
 
              return response()->json($event);
            break;

            case 'delete':
                if (empty($request->id)) {
                    return "Invalid event ID";
                }
                $event = CrudEvents::find($request->id)->delete();
  
                return response()->json($event);
            break;

            case 'update':
                $validator = Validator::make($request->all(), [
                    'eventStart' => 'required',
                    'eventEnd' => 'required',
                    'eventID' => 'required',
                ]);

                if ($validator->fails()) {
                    return $validator->messages()->all()[0];
                }

                $event = CrudEvents::find($request->eventID)->update([
                    'start' => ($request->eventStart)." 00:00:00",
                    'end' => ($request->eventStart)." 23:59:59",
                ]);
 
                return response()->json($event);
            break;

            default;
                return "Invalid event type";
            break;
        }
    }
}
