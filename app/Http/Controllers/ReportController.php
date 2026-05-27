<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index(Request $request)
{
    $sort = $request->input('sort');
    if($sort != 'asc' && $sort != 'desc' ){
        $sort = 'desc';
    }

    $status = $request->input('status');
    $validate = $request->validate([
        'status' => "exists:statuses,id"
    ]);
    
    if($validate){
        $reports = Report::where('status_id', $status)
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', $sort)
            ->paginate(8);
    } else {
        $reports = Report::where('user_id', Auth::user()->id)
            ->orderBy('created_at', $sort)
            ->paginate(8);
    }

    $statuses = Status::all();

    return view('reports.index', compact('reports','statuses','sort','status'));
}

    public function destroy(Report $report){
        if (Auth::user()->id === $report->user_id) {
            $report->delete();
            return redirect()->back();
        } 
        else {
            abort(403, 'У вас нет прав на редактирование этой записи');
            }
        }


    public function store(Request $request, Report $report){
        $data = $request->validate([
            'number' => 'string',
            'description' => 'string',
            'path_img' => 'image |mimes:jpeg,png,jpg,gif|max:2048'        
        ]);

        // $imageName = time() . '.' . $request['path_img']->extension();
        // $request['path_img']->move(public_path('images'), $imageName);

        $imageName = Storage::disk('public')->put('reports', $request->file('path_img'));

        $data['user_id'] = Auth::user()->id;
        $data['status_id'] = 1;
        $data['path_img'] = $imageName;

        $report->create($data);
        return redirect()->route('report.index')->with('success', 'Заявление успешно отправлено.');
    } 

    public function edit(Report $report){
        if (Auth::user()->id === $report->user_id) {
        return view('reports.edit', compact('report'));
    } 
    else {
        abort(403, 'У вас нет прав на редактирование этой записи');
        }
    }

    public function update(Request $request, Report $report){
        if (Auth::user()->id === $report->user_id) {
            return view('reports.edit', compact('report'));
        } 
        else {
            abort(403, 'У вас нет прав на редактирование этой записи');
            }
        $data = $request->validate([
            'number' => 'string | required',
            'description' => 'string | required',        
        ]);

        $report->update($data);
        return redirect()->back();
    }

    public function statusUpdate(Request $request, Report $report)
        {
            if ($report->status_id !== 1) {
                return redirect()->back()->with('error', 'Нельзя изменить статус обработанной заявки');
            }
            $request->validate([
                'status_id' => 'required|exists:statuses,id',
            ]);
            $report->update($request->only(['status_id']));
            return redirect()->back();
        }
}