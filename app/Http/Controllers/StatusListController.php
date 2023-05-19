<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Requests\StatusListRequest;

class StatusListController extends Controller
{
    public function viewStatusList(){
        $statuses = Status::all();
        return view('bootstrap_views.dashboards.adminstatuslist', compact('statuses'));
    }

    public function addStatus()
    {
        return view('bootstrap_views.dashboards.addstatus');
    }

    public function storeStatus(StatusListRequest $request)
    {
        $status = new Status();
        $status->status_type = $request->status;

        $status->save();
        return redirect()->route('view.status')->with('success', 'New Status Level Sucessfully added to the list!');
    }

    public function editStatus($status)
    {
        $editedStatus = Status::find($status);
        return view('bootstrap_views.dashboards.editstatus', compact('editedStatus'));
    }

    public function updateStatus(StatusListRequest $request, $status)
    {
        $status = Status::find($status);
        $status->status_type = $request->status;

        $status->save();
        return redirect()->route('view.status')->with('success', 'The Status Level is Sucessfully updated!');
    }

    public function destroyStatus(Status $status)
    {
        if ($status->delete()) {
            return ['success' => 'The Status level is successfuly deleted !!!'];
        } else {
            return ['error' => 'Somethign went wrong!!'];
        }
    }
}
