<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos;
use Illuminate\Support\Facades\Storage;
use DB;

class VideoController extends Controller
{
    public function getVideos() {
        $videos = DB::select('select * from videos');
        return view('welcome', ['videos' => $videos]);
    }

    public function getVideoById($id){
        $video = DB::table('videos')->where('id', $id)->first();

        if($video == null){
            return response()->json(['message', 'Data not found']);
        }

        return response()->json(['data' => $video]);
    }

    public function create(Request $req){
        $this->validate($req, [
            'title' => 'required',
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm|max:999999',
        ]);
        
        $video = new Videos();

        $videoName = time().'_'.$req->file('video')->getClientOriginalName();
        $videoPath = $req->file('video')->move(public_path('/videos/'), $videoName);

        $video->title = $req->title;
        $video->file_path = '/videos/'.$videoName;
        $video->save();

        return redirect()->back()->with('success', 'Video has been uploaded!');
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'title' => 'required',
            'video' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm|max:999999',
        ]);

        $video = Videos::findOrFail($id);
        $video->title = $req->title;

        if ($req->hasFile('video')) {
            Storage::disk('public')->delete($video->file_path);

            $videoName = time().'_'.$req->file('video')->getClientOriginalName();
            $videoPath = $req->file('video')->move(public_path('/videos/'), $videoName);
            $video->file_path = '/videos/'.$videoName;
        }

        $video->save();

        return redirect()->back()->with('success', 'Video has been updated!');
    }

    public function delete($id){
        $video = Videos::findOrFail($id);
        Storage::disk('public')->delete($video->file_path);
        $video->delete();

        return redirect()->back()->with('success', 'Video has been deleted.');
    }
}
