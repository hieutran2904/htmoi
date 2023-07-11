@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        {{-- <div class="col-xs-12 carausel-sliderWidget">
        <section id="halim-advanced-widget-4">
            <div class="section-heading">
                <a href="danhmuc.php" title="Phim Chiếu Rạp">
                    <span class="h-text">Phim Chiếu Rạp</span>
                </a>
                <ul class="heading-nav pull-right hidden-xs">
                    <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12"
                        data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span>
                    </li>
                </ul>
            </div>
            <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
                <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                    <div class="halim-item">
                        <a class="halim-thumb" href="{{ route('movie') }}" title="GÓA PHỤ ĐEN">
                            <figure><img class="lazy img-responsive"
                                    src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg"
                                    alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                            <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                                    aria-hidden="true"></i>Vietsub</span>
                            <div class="icon_overlay"></div>
                            <div class="halim-post-title-box">
                                <div class="halim-post-title ">
                                    <p class="entry-title">GÓA PHỤ ĐEN</p>
                                    <p class="original_title">Black Widow</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </article>
            </div>
        </section>
        <div class="clearfix"></div>
    </div> --}}
        <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
                <h3 class="section-title"><span>PHIM HOT</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                @foreach ($movie_hot as $key => $eachMovie)
                    <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie', $eachMovie->slug) }}"
                                title="{{ $eachMovie->title }}">
                                <figure><img class="lazy img-responsive"
                                        src="{{ asset('uploads/movie/' . $eachMovie->image) }}"
                                        alt="{{ $eachMovie->title }}" title="{{ $eachMovie->title }}"></figure>
                                <span class="status">
                                    @if ($eachMovie->season > 0)
                                        <span>Season {{ $eachMovie->season }}</span>
                                    @else
                                        @if ($eachMovie->resolution == 1)
                                            <span>HD</span>
                                        @elseif($eachMovie->resolution == 2)
                                            <span>HDCam</span>
                                        @elseif($eachMovie->resolution == 3)
                                            <span>Cam</span>
                                        @elseif($eachMovie->resolution == 4)
                                            <span>FullHD</span>
                                        @elseif($eachMovie->resolution == 5)
                                            <span>Trailer</span>
                                        @else
                                            <span>SD</span>
                                        @endif
                                    @endif
                                </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                    @if ($eachMovie->vietsub == 1)
                                        <span>Thuyết minh</span>
                                    @else
                                        <span>Phụ đề</span>
                                    @endif
                                </span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{ $eachMovie->title }}</p>
                                        <p class="original_title">{{ $eachMovie->title_other }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
            <script>
                jQuery(document).ready(function($) {
                    var owl = $('#halim_related_movies-2');
                    owl.owlCarousel({
                        loop: true,
                        margin: 4,
                        autoplay: true,
                        autoplayTimeout: 4000,
                        autoplayHoverPause: true,
                        nav: true,
                        navText: ['<i class="hl-down-open rotate-left"></i>',
                            '<i class="hl-down-open rotate-right"></i>'
                        ],
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 2
                            },
                            480: {
                                items: 3
                            },
                            600: {
                                items: 5
                            },
                            1000: {
                                items: 6
                            }
                        }
                    })
                });
            </script>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            @foreach ($category_home as $key => $categoryHome)
                <section id="halim-advanced-widget-2">
                    <div class="section-heading">
                        <a href="{{ route('category', $categoryHome->slug) }}" title="{{ $categoryHome->title }}">
                            <span class="h-text">{{ $categoryHome->title }}</span>
                        </a>
                    </div>
                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                        @foreach ($categoryHome->movies->take(12) as $key => $movie)
                            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $movie->slug) }}">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('uploads/movie/' . $movie->image) }}"
                                                alt="{{ $movie->title }}" title="{{ $movie->title }}">
                                        </figure>
                                        <span class="status">TẬP 15</span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>
                                            @if ($movie->vietsub == 1)
                                                <span>Thuyết minh</span>
                                            @else
                                                <span>Phụ đề</span>
                                            @endif
                                        </span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $movie->title }}</p>
                                                <p class="original_title text-warning">{{ $movie->title_other }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
                <div class="clearfix"></div>
            @endforeach
        </main>
        {{-- sidebar --}}
        @include('pages.include.sidebar')
    </div>
@endsection
