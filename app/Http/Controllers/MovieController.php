<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
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
        $category = Category::where('status', '1')->orderBy('id', 'desc')->pluck('title', 'id');
        $country = Country::where('status', '1')->orderBy('id', 'desc')->pluck('title', 'id');
        $genre = Genre::where('status', '1')->orderBy('id', 'desc')->pluck('title', 'id');
        $list_genre = Genre::where('status', '1')->orderBy('id', 'desc')->get();
        $list = Movie::with('category', 'country', 'genre')->orderBy('id', 'DESC')->get();

        // json file movie
        $path = public_path() . "/json/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        File::put($path . 'movies.json', json_encode($list));

        return view('admincp.movie.form', compact('list', 'category', 'country', 'genre', 'list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->trailer = $data['trailer'];
        $movie->episode_number = $data['episode_number'];
        $movie->tags = $data['tags'];
        $movie->title_other = $data['title_other'];
        $movie->description = $data['description'];
        $movie->movie_hot = $data['movie_hot'];
        $movie->resolution = $data['resolution'];
        $movie->vietsub = $data['vietsub'];
        $movie->status = $data['status'];
        $movie->slug = $data['slug'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->duration = $data['duration'];
        $movie->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        //save image
        $get_image = $request->file('image');
        $path = 'uploads/movie/';
        if ($get_image) {
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->route('movie.create')->with('success', 'Movie created successfully!');
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
        $movie = Movie::find($id);
        $list = Movie::with('category', 'country', 'genre')->orderBy('id', 'DESC')->get();
        $category = Category::where('status', '1')->orderBy('id', 'desc')->pluck('title', 'id');
        $country = Country::where('status', '1')->orderBy('id', 'desc')->pluck('title', 'id');
        $genre = Genre::where('status', '1')->orderBy('id', 'desc')->pluck('title', 'id');
        return view('admincp.movie.form', compact('list', 'movie', 'category', 'country', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->trailer = $data['trailer'];
        $movie->episode_number = $data['episode_number'];
        $movie->tags = $data['tags'];
        $movie->title_other = $data['title_other'];
        $movie->description = $data['description'];
        $movie->movie_hot = $data['movie_hot'];
        $movie->resolution = $data['resolution'];
        $movie->vietsub = $data['vietsub'];
        $movie->status = $data['status'];
        $movie->slug = $data['slug'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->duration = $data['duration'];
        $movie->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        //save image
        $get_image = $request->file('image');
        $path = 'uploads/movie/';
        if ($get_image) {
            if (file_exists($path . $movie->image)) {
                unlink($path . $movie->image);
            }
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->route('movie.edit', $id)->with('success', 'Movie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $path = 'uploads/movie/';
        $movie = Movie::find($id);
        if (file_exists($path . $movie->image)) {
            unlink($path . $movie->image);
        }
        $movie->delete();
        return redirect()->route('movie.create')->with('success', 'Movie deleted successfully!');
    }

    public function updateYearFilm(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->year = $data['year'];
        $movie->save();
        return response()->json(['success' => 'Year Firm updated successfully!']);
    }
    public function updateTopView(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->topview = $data['topview'];
        $movie->save();
        return response()->json(['success' => 'Top View updated successfully!']);
    }
    public function updateSeason(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->season = $data['season'];
        $movie->save();
        return response()->json(['success' => 'Season updated successfully!']);
    }

    public function filterTopView(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', $data['value'])->orderBy('updated_at', 'DESC')->take(20)->get();
        $output = '';
        foreach ($movie as $key => $eachMovie) {
            if ($eachMovie->resolution == 1) $text = 'HD';
            elseif ($eachMovie->resolution == 2) $text = 'HDCam';
            elseif ($eachMovie->resolution == 3) $text = 'Cam';
            elseif ($eachMovie->resolution == 4) $text = 'FullHD';
            elseif ($eachMovie->resolution == 5) $text = 'Trailer';
            else $text = 'SD';
            $output .= '<div class="item post-37176">
            <a href="' . route('movie', $eachMovie->slug) . '" title="' . $eachMovie->title . '">
                <div class="item-link">
                    <img src="' . asset('uploads/movie/' . $eachMovie->image) . '" class="lazy post-thumb"
                        alt="' . $eachMovie->title . '" title="' . $eachMovie->title . '" />
                    <span class="is_trailer">' . $text . '</span>
                </div>
                <p class="title">' . $eachMovie->title . '</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                </span>
            </div>
        </div>';
        }
        echo $output;
    }

    public function getEpisode()
    {
        $movie_id = $_GET['movie_id'];
        $movie = Movie::find($movie_id);
        for ($i = 1; $i <= $movie->episode_number; $i++) {
            echo '<option value="' . $i . '">Tập ' . $i . '</option>';
        }
    }
}
