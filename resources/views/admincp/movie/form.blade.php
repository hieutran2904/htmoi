@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Manage Movie</div>
                    <div class="card-body">
                        @if (!isset($movie))
                            {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::model($movie, [
                                'route' => ['movie.update', $movie->id],
                                'method' => 'PUT',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                        @endif
                        <div class="row border border-success">
                            <div class="form-group col-md-6">
                                {!! Form::label('title', 'Title') !!}
                                {!! Form::text('title', isset($movie) ? $movie->title : null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Movie title...',
                                    'id' => 'slug',
                                    'onkeyup' => 'ChangeToSlug()',
                                ]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('title_other', 'Title Other') !!}
                                {!! Form::text('title_other', isset($movie) ? $movie->title_other : null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Movie title other...',
                                ]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('slug', 'Slug') !!}
                                {!! Form::text('slug', isset($movie) ? $movie->slug : null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Slug...',
                                    'id' => 'convert_slug',
                                ]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Duration', 'Duration') !!}
                                {!! Form::text('duration', isset($movie) ? $movie->duration : null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'duration...',
                                ]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Trailer', 'Trailer') !!}
                                {!! Form::text('trailer', isset($movie) ? $movie->trailer : null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'trailer...',
                                ]) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('episode', 'Episode number') !!}
                                {!! Form::text('episode_number', isset($movie) ? $movie->episode_number : null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Episode number...',
                                ]) !!}
                            </div>
                        </div>
                        <div class="row my-2 border border-primary">
                            <div class="form-group col-md-4">
                                {!! Form::label('category', 'Category', []) !!}
                                {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '1', [
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('genre', 'Genre') !!}<br>
                                {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre_id : '1', [
                                    'class' => 'form-control',
                                ]) !!}
                                {{-- @foreach ($list_genre as $key => $gen)
                                    {!! Form::checkbox('genre[]', $gen->id) !!}
                                    {!! Form::label('genre', $gen->title, ['style'=>'margin-right:10px;']) !!}
                                @endforeach --}}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('country', 'Country') !!}
                                {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '1', [
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                        </div>
                        <div class="row border border-danger">
                            <div class="form-group col-md-4">
                                {!! Form::label('Movie hot', 'Movie hot') !!}
                                {!! Form::select('movie_hot', ['1' => 'Hot', '0' => 'Normal'], isset($movie) ? $movie->movie_hot : '0', [
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('resolution', 'Resolution') !!}
                                {!! Form::select(
                                    'resolution',
                                    ['1' => 'HD', '0' => 'SD', '2' => 'HDCam', '3' => 'Cam', '4' => 'FullHD', '5' => 'Trailer'],
                                    isset($movie) ? $movie->resolution : '1',
                                    [
                                        'class' => 'form-control',
                                    ],
                                ) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('VietSub', 'VietSub') !!}
                                {!! Form::select('vietsub', ['1' => 'Thuyết minh', '0' => 'Phụ đề'], isset($movie) ? $movie->vietsub : '0', [
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags', 'Tags Movie') !!}
                            {!! Form::text('tags', isset($movie) ? $movie->tags : null, [
                                'class' => 'form-control',
                                'placeholder' => 'Movie tags...',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : null, [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Description...',
                                'id' => 'description',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], isset($movie) ? $movie->status : '1', [
                                'class' => 'form-control',
                                'placeholder' => 'Status...',
                                'id' => 'status',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Image') !!}
                            {!! Form::file('image', [
                                'class' => 'form-control',
                            ]) !!}
                            @if (isset($movie))
                                <img width="100px" src="{{ asset('uploads/movie/' . $movie->image) }}" alt="">
                            @endif
                        </div>

                        @if (!isset($movie))
                            {!! Form::submit('Add', ['class' => 'btn btn-success mt-2']) !!}
                        @else
                            {!! Form::submit('Update', ['class' => 'btn btn-info mt-2']) !!}
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <table class="table" id="tablephim">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Movie Name</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Trailer</th>
                    <th scope="col">Category</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Country</th>
                    <th scope="col">Episode Number</th>
                    <th scope="col">Movie Hot</th>
                    <th scope="col">Resolution</th>
                    <th scope="col">VietSub</th>
                    <th scope="col">Status</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Year</th>
                    <th scope="col">Season</th>
                    <th scope="col">TopView</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $key => $eachMovie)
                    <tr>
                        <td scope="row">{{ ++$key }}</td>
                        <td><img width="100px" src="{{ asset('uploads/movie/' . $eachMovie->image) }}" alt=""></td>
                        <td>
                            {{ $eachMovie->title }}
                            <br>
                            <small>{{ $eachMovie->title_other }}</small>
                        </td>
                        <td>{{ $eachMovie->tags }}</td>
                        <td>
                            <a href="{{ $eachMovie->trailer }}" target="_blank">{{ $eachMovie->trailer }}</a>
                        </td>
                        <td>{{ $eachMovie->category->title }}</td>
                        <td>{{ $eachMovie->genre->title }}</td>
                        <td>{{ $eachMovie->country->title }}</td>
                        <td>{{ $eachMovie->episode_number }}</td>
                        {{-- <td>{{ $eachMovie->description }}</td> --}}
                        <td>
                            @if ($eachMovie->movie_hot == 1)
                                <span class="badge bg-danger">Hot</span>
                            @else
                                <span class="badge bg-warning">Normal</span>
                            @endif
                        </td>
                        <td>
                            @if ($eachMovie->resolution == 1)
                                <span class="badge bg-info">HD</span>
                            @elseif($eachMovie->resolution == 2)
                                <span class="badge bg-primary">HDCam</span>
                            @elseif($eachMovie->resolution == 3)
                                <span class="badge bg-secondary">Cam</span>
                            @elseif($eachMovie->resolution == 4)
                                <span class="badge bg-dark">FullHD</span>
                            @elseif($eachMovie->resolution == 5)
                                <span class="badge bg-success">Trailer</span>
                            @else
                                <span class="badge bg-warning">SD</span>
                            @endif
                        </td>
                        <td>
                            @if ($eachMovie->vietsub == 1)
                                <span class="badge bg-success">Thuyết minh</span>
                            @else
                                <span class="badge bg-danger">Phụ đề</span>
                            @endif
                        </td>
                        <td>
                            @if ($eachMovie->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $eachMovie->slug }}</td>
                        <td>{{ $eachMovie->duration }}</td>
                        <td>
                            {!! Form::selectYear('year', 1990, 2023, isset($eachMovie->year) ? $eachMovie->year : '', [
                                'class' => 'select-year',
                                'id' => $eachMovie->id,
                            ]) !!}
                        </td>
                        <td>
                            @php
                                $season = [];
                                for ($i = 1; $i <= 20; $i++) {
                                    $season[$i] = $i;
                                }
                            @endphp
                            {!! Form::selectRange('season', 0, 20, isset($eachMovie->season) ? $eachMovie->season : '', [
                                'class' => 'select-season',
                                'id' => $eachMovie->id,
                            ]) !!}
                        </td>
                        <td>
                            {!! Form::select(
                                'topview',
                                ['0' => 'Day', '1' => 'Week', '2' => 'Month'],
                                isset($eachMovie->topview) ? $eachMovie->topview : '',
                                [
                                    'class' => 'select-topview',
                                    'id' => $eachMovie->id,
                                ],
                            ) !!}
                        </td>
                        <td>
                            <a href="{{ route('movie.edit', $eachMovie->id) }}"
                                class="btn btn-warning d-inline-block">Edit</a>
                            {!! Form::open([
                                'route' => ['movie.destroy', $eachMovie->id],
                                'method' => 'DELETE',
                                'onsubmit' => 'return confirm("Are you sure?")',
                                'class' => 'd-inline-block',
                            ]) !!}
                            {!! Form::submit('Delete', [
                                'class' => 'btn btn-danger',
                            ]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
