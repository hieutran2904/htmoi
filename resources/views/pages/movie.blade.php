@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a
                                        href="{{ route('category', $movie->category->slug) }}">{{ $movie->category->title }}</a>
                                    » <span><a
                                            href="{{ route('country', $movie->country->slug) }}">{{ $movie->country->title }}</a>
                                        » <span class="breadcrumb_last"
                                            aria-current="page">{{ $movie->title }}</span></span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">

                    <div class="halim-movie-wrapper">
                        <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div>
                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                <img class="movie-thumb" src="{{ asset('uploads/movie/' . $movie->image) }}"
                                    alt="{{ $movie->title }}">
                                @if ($count_episode > 0)
                                    <div class="bwa-content">
                                        <div class="loader"></div>
                                        <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $episode_one->episode) }}"
                                            class="bwac-btn">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                @endif
                                @if ($movie->trailer != null)
                                    <a href="#watch_trailer" style="display: block"
                                        class="btn btn-primary watch_trailer">Xem Trailer</a>
                                @endif
                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $movie->title }}
                                </h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->title_other }}</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                            @if ($movie->resolution == 1)
                                                <span>HD</span>
                                            @elseif($movie->resolution == 2)
                                                <span>HDCam</span>
                                            @elseif($movie->resolution == 3)
                                                <span>Cam</span>
                                            @elseif($movie->resolution == 4)
                                                <span>FullHD</span>
                                            @elseif($movie->resolution == 5)
                                                <span>Trailer</span>
                                            @else
                                                <span>SD</span>
                                            @endif
                                        </span><span class="episode">
                                            @if ($movie->vietsub == 1)
                                                <span>Thuyết minh</span>
                                            @else
                                                <span>Phụ đề</span>
                                            @endif
                                        </span></li>
                                    <li class="list-info-group-item"><span>Điểm IMDb</span> : <span
                                            class="imdb">7.2</span></li>
                                    <li class="list-info-group-item"><span>Thời lượng</span> : {{ $movie->duration }}</li>
                                    @if ($movie->episode_number > 1)
                                        <li class="list-info-group-item"><span>Tập phim</span> : {{ $count_episode }} /
                                            {{ $movie->episode_number }} -
                                            @if ($count_episode == $movie->episode_number)
                                                <span class="label label-success">Hoàn thành</span>
                                            @else
                                                <span class="label label-danger">Đang cập nhật</span>
                                            @endif
                                        </li>
                                    @endif
                                    @if ($movie->season > 0)
                                        <li class="list-info-group-item"><span>Season</span> : {{ $movie->season }}
                                        </li>
                                    @endif
                                    <li class="list-info-group-item"><span>Thể loại</span> : <a
                                            href="{{ route('genre', $movie->genre->slug) }}"
                                            rel="category tag">{{ $movie->genre->title }}</a></li>
                                    <li class="list-info-group-item"><span>Danh mục</span> : <a
                                            href="{{ route('category', $movie->category->slug) }}"
                                            rel="tag">{{ $movie->category->title }}</a></li>
                                    <li class="list-info-group-item"><span>Quốc gia</span> : <a
                                            href="{{ route('country', $movie->country->slug) }}"
                                            rel="tag">{{ $movie->country->title }}</a></li>
                                    @if ($movie->episode_number > 1 && $count_episode > 0)
                                        <li class="list-info-group-item"><span>Tập phim</span> :
                                            @foreach ($episode as $ep)
                                                <a class="btn btn-danger"
                                                    href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $ep->episode) }}"
                                                    rel="tag">
                                                    {{ $ep->episode }}
                                                </a>
                                            @endforeach
                                        </li>
                                    @endif
                                </ul>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                {{ $movie->description }}
                            </article>
                        </div>
                    </div>
                    @if ($movie->trailer != null)
                        <div class="section-bar clearfix">
                            <h2 class="section-title"><span style="color:#ffed4d">Trailer phim</span></h2>
                        </div>
                        <div class="entry-content htmlwrap clearfix">
                            <div class="video-item halim-entry-box">
                                <article id="watch_trailer" class="item-content">
                                    <iframe width="100%" height="500px"
                                        src="https://www.youtube.com/embed/{{ $movie->trailer }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </article>
                            </div>
                        </div>
                    @endif
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Tags phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                @if ($movie->tags != null)
                                    @php
                                        $tags = explode(',', $movie->tags);
                                    @endphp
                                    @foreach ($tags as $tag)
                                        <a href="{{ route('tags', $tag) }}" rel="tag">{{ $tag }}</a>
                                    @endforeach
                                @else
                                    <a href="#" rel="tag">Phim này chưa có tags</a>
                                @endif
                            </article>
                        </div>
                    </div>

                    {{-- comment facebook --}}
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        @php
                            $current_url = Request::url();
                        @endphp
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                <div class="fb-comments" data-href="{{ $current_url }}" data-width="100%"
                                    data-numposts="10"></div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
            {{-- related movie --}}
            @include('pages.include.related')
        </main>
        {{-- sidebar --}}
        @include('pages.include.sidebar')
    </div>
@endsection
