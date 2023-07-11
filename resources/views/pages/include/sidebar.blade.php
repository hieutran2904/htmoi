{{-- <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top Trending</span>
                <ul class="halim-popular-tab" role="tablist">
                    <li role="presentation" class="active">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today"
                            href="#today">Day</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week"
                            hre>Week</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                            data-type="month">Month</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                    </li>
                </ul>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post today">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($movie_hot_sidebar as $eachMovie)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $eachMovie->slug) }}" title="{{ $eachMovie->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $eachMovie->image) }}" class="lazy post-thumb"
                                        alt="{{ $eachMovie->title }}" title="{{ $eachMovie->title }}" />
                                    <span class="is_trailer">
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
                                    </span>
                                </div>
                                <p class="title">{{ $eachMovie->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside> --}}
<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top View</span>
                <ul class="halim-popular-tab" id="pills-tab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#day"
                            role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#week"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#month"
                            role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"> --}}

        <div class="tab-content" id="pills-tabContent">
            <div id="halim-ajax-popular-post" class="popular-post show_default">
                <span id="show_default"></span>
            </div>
            <div class="tab-pane fade" id="day" role="tabpanel" aria-labelledby="pills-home-tab">
                <div id="halim-ajax-popular-post" class="popular-post">
                    <span id="show0"></span>
                </div>
            </div>
            <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div id="halim-ajax-popular-post" class="popular-post">
                    <span id="show1"></span>
                </div>
            </div>
            <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div id="halim-ajax-popular-post show2" class="popular-post">
                    <span id="show2"></span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</aside>
{{-- <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top Trending</span>
                <ul class="halim-popular-tab" role="tablist">
                    <li role="presentation" class="active">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today"
                            href="#today">Day</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week"
                            hre>Week</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                            data-type="month">Month</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                    </li>
                </ul>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post today">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($movie_hot_sidebar as $eachMovie)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $eachMovie->slug) }}" title="{{ $eachMovie->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $eachMovie->image) }}" class="lazy post-thumb"
                                        alt="{{ $eachMovie->title }}" title="{{ $eachMovie->title }}" />
                                    <span class="is_trailer">
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
                                    </span>
                                </div>
                                <p class="title">{{ $eachMovie->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside> --}}