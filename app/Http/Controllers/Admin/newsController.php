<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\news;
use Validator;
use DataTables;


class newsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            $data =  news::all();
            return DataTables::of($data)
                ->addColumn('News / Blogs', function ($data) { 
                $url= asset('uploads/vegeFoodsPhoto/'.$data->news_photo);
                return '<img src="'.$url.'" border="0" width="100" height="150" class="img-rounded" align="center" />';
            })
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit" id="'.$data->id.'" class="editPromo btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="deletePromo btn btn-danger btn-sm">Delete</button>';
                    return $button;
            })
            ->rawColumns(['News / Blogs','action'])
            ->make(true);
        }
        return view('admin.news');
    }

    public function addNews(Request $request, news $news) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'newsPhoto' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0])->withInput();
        }

        $news->title = $request->title;
        $news->description = $request->description;
        if ($request->hasfile('newsPhoto')) {
            $file = $request->file('newsPhoto');
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads/vegeFoodsPhoto/', $filename);
            $news->news_photo = $filename;
        }
        $news->save();
        return redirect()->route('adminNews')->with('success', 'News / Blogs added.');
    }
}
