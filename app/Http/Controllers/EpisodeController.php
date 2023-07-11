<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Movie;
use Carbon\Carbon;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movie = Movie::where('status', '1')->orderBy('id', 'desc')->pluck('title', 'id');
        $list_episode = Episode::with('movie')->orderBy('id', 'DESC')->get();
        return view('admincp.episode.form', compact('list_episode', 'movie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $episode = new Episode();
        $episode->movie_id = $data['movie_id'];
        $episode->linkphim = $data['linkphim'];
        $episode->episode = $data['episode'];
        $episode->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->save();
        return redirect()->route('episode.create')->with('success', 'Episode created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $episode = Episode::find($id);
        $movie = Movie::where('status', '1')->orderBy('id', 'desc')->pluck('title', 'id');
        $list_episode = Episode::with('movie')->orderBy('id', 'DESC')->get();
        return view('admincp.episode.form', compact('list_episode', 'movie', 'episode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $episode = Episode::find($id);
        $episode->movie_id = $data['movie_id'];
        $episode->linkphim = $data['linkphim'];
        $episode->episode = $data['episode'];
        $episode->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->save();
        return redirect()->route('episode.create')->with('success', 'Episode updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $episode = Episode::find($id);
        $episode->delete();
        return redirect()->route('episode.create')->with('success', 'Episode deleted successfully!');
    }
}
