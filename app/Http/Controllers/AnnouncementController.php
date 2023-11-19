<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index(Request $request){

        if ($request->filled('search'))
        {
            $pagination = false;
            $searchQuery = $request->input('search');
            $announcement = Announcement::where('title', 'LIKE', "%$searchQuery%")
                            ->orWhere('content', 'LIKE', "%$searchQuery%")
                            ->get();
        }
        else
        {
            $pagination = true;
            $announcement = Announcement::paginate(5);
        }
        return view('pages.admin.announcement.index',[
            'announcement' => $announcement,
            'pagination' => $pagination
        ]);



    }

    public function store(Request $request){

        $announcement = new Announcement();
    	$announcement -> title = $request->title;
    	$announcement -> content = $request->content;
        $announcement -> date = $request->date;
    	$announcement -> time = $request->time;
        $announcement -> duration = $request->duration;
    	$announcement->save();

         return redirect()->back()->with('success', 'Announcement Saved!');
    }


    public function update(Request $request, $id)
    {

        Announcement::whereId($id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'time' => $request->input('time'),
            'date' => $request->input('date'),
            'duration' => $request->input('duration'),
        ]);
        return redirect()->back()->with('success', 'Announcement updated successfully');
    }

    public function destroy(Request $request)
    {
        $announcement = Announcement::findorFail($request->id);
        if($announcement){

            $announcement->delete();
        }
        return redirect()->back()->with('err', 'Announcement Successfully Deleted!');
    }


    //FOR THE CUSTOMER VIEW
    public function customer_index(){


        $pagination = true;
        $announcement = Announcement::orderBy('created_at', 'desc')->paginate(2);

        return view('pages.customer.announcement',[
            'announcement' => $announcement,
            'pagination' => $pagination
        ]);

    }
}
