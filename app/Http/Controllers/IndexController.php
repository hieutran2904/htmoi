<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Category;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home()
    {
        $movie_hot = Movie::where('movie_hot', '1')->orderBy('updated_at', 'desc')->get();
        $movie_hot_sidebar = Movie::where('movie_hot', '1')->orderBy('updated_at', 'desc')->take(20)->get();
        $category = Category::where('status', '1')->orderBy('id', 'desc')->get();
        $genre = Genre::where('status', '1')->orderBy('id', 'desc')->get();
        $country = Country::where('status', '1')->orderBy('id', 'desc')->get();
        $category_home = Category::with('movies')->where('status', '1')->orderBy('id', 'desc')->get();
        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'movie_hot', 'movie_hot_sidebar'));
    }
    public function category($slug)
    {
        $category = Category::where('status', '1')->orderBy('id', 'desc')->get();
        $movie_hot_sidebar = Movie::where('movie_hot', '1')->orderBy('updated_at', 'desc')->take(20)->get();
        $genre = Genre::where('status', '1')->orderBy('id', 'desc')->get();
        $country = Country::where('status', '1')->orderBy('id', 'desc')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('updated_at', 'desc')->paginate(32);
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'movie_hot_sidebar'));
    }
    public function genre($slug)
    {
        $category = Category::where('status', '1')->orderBy('id', 'desc')->get();
        $movie_hot_sidebar = Movie::where('movie_hot', '1')->orderBy('updated_at', 'desc')->take(20)->get();
        $genre = Genre::where('status', '1')->orderBy('id', 'desc')->get();
        $country = Country::where('status', '1')->orderBy('id', 'desc')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $movie = Movie::where('genre_id', $genre_slug->id)->orderBy('updated_at', 'desc')->paginate(32);
        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie', 'movie_hot_sidebar'));
    }
    public function country($slug)
    {
        $category = Category::where('status', '1')->orderBy('id', 'desc')->get();
        $movie_hot_sidebar = Movie::where('movie_hot', '1')->orderBy('updated_at', 'desc')->take(20)->get();
        $genre = Genre::where('status', '1')->orderBy('id', 'desc')->get();
        $country = Country::where('status', '1')->orderBy('id', 'desc')->get();
        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id', $country_slug->id)->orderBy('updated_at', 'desc')->paginate(32);
        return view('pages.country', compact('category', 'genre', 'country', 'country_slug', 'movie', 'movie_hot_sidebar'));
    }
    public function movie($slug)
    {
        $category = Category::where('status', '1')->orderBy('id', 'desc')->get();
        $movie_hot_sidebar = Movie::where('movie_hot', '1')->orderBy('updated_at', 'desc')->take(20)->get();
        $genre = Genre::where('status', '1')->orderBy('id', 'desc')->get();
        $country = Country::where('status', '1')->orderBy('id', 'desc')->get();
        $movie = Movie::with('category', 'genre', 'country')->where('slug', $slug)->where('status', '1')->first();
        $episode_one = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'asc')->first();
        $movie_related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category_id)
            ->where('status', '1')->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->limit(4)->get();
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'asc')->get();
        //count movie episode
        $count_episode = Episode::where('movie_id', $movie->id)->count();

        return view('pages.movie', compact('category', 'genre', 'country', 'movie', 'movie_related', 'movie_hot_sidebar', 'episode', 'episode_one', 'count_episode'));
    }
    public function watch($slug, $episode)
    {
        if (isset($episode)) {
            $tapphim = substr($episode, 4, 2);
        } else {
            $tapphim = 1;
        }
        // dd($tapphim);
        $category = Category::where('status', '1')->orderBy('id', 'desc')->get();
        $movie_hot_sidebar = Movie::where('movie_hot', '1')->orderBy('updated_at', 'desc')->take(20)->get();
        $genre = Genre::where('status', '1')->orderBy('id', 'desc')->get();
        $country = Country::where('status', '1')->orderBy('id', 'desc')->get();
        $movie = Movie::with('category', 'genre', 'country', 'episode')->where('slug', $slug)->where('status', '1')->first();
        $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        $movie_related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category_id)
            ->where('status', '1')->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->limit(4)->get();
        return view('pages.watch', compact('category', 'genre', 'country', 'movie', 'movie_hot_sidebar', 'episode', 'tapphim', 'movie_related'));
    }
    public function episode()
    {
        return view('pages.episode');
    }
    public function year($year)
    {
        $category = Category::where('status', '1')->orderBy('id', 'desc')->get();
        $movie_hot_sidebar = Movie::where('movie_hot', '1')->orderBy('updated_at', 'desc')->take(20)->get();
        $genre = Genre::where('status', '1')->orderBy('id', 'desc')->get();
        $country = Country::where('status', '1')->orderBy('id', 'desc')->get();
        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('updated_at', 'desc')->paginate(32);
        return view('pages.year', compact('category', 'genre', 'country', 'movie', 'year', 'movie_hot_sidebar'));
    }
    public function tags($tag)
    {
        $movie_hot_sidebar = Movie::where('movie_hot', '1')->orderBy('updated_at', 'desc')->take(20)->get();
        $category = Category::where('status', '1')->orderBy('id', 'desc')->get();
        $genre = Genre::where('status', '1')->orderBy('id', 'desc')->get();
        $country = Country::where('status', '1')->orderBy('id', 'desc')->get();
        $tag = $tag;
        $movie = Movie::where('tags', 'LIKE', '%' . $tag . '%')->orderBy('updated_at', 'desc')->paginate(32);
        return view('pages.tag', compact('category', 'genre', 'country', 'movie', 'tag', 'movie_hot_sidebar'));
    }

    public function searchFilm()
    {
        if (isset($_GET['search-film'])) {
            $search = $_GET['search-film'];
            $category = Category::where('status', '1')->orderBy('id', 'desc')->get();
            $movie_hot_sidebar = Movie::where('movie_hot', '1')->orderBy('updated_at', 'desc')->take(20)->get();
            $genre = Genre::where('status', '1')->orderBy('id', 'desc')->get();
            $country = Country::where('status', '1')->orderBy('id', 'desc')->get();
            $movie = Movie::where('title', 'LIKE', '%' . $search . '%')->orderBy('updated_at', 'desc')->paginate(32);
            return view('pages.search', compact('category', 'genre', 'country', 'search', 'movie', 'movie_hot_sidebar'));
        } else {
            return redirect()->to('/');
        }
    }
}
