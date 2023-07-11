@extends('layouts.app')

@section('content')
    <div class="container">
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
                    <div class="card-header">Manage Episode</div>
                    <div class="card-body">
                        @if (!isset($episode))
                            {!! Form::open(['route' => 'episode.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::model($episode, ['route' => ['episode.update', $episode->id], 'method' => 'PUT']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('movie', 'Choose Movie') !!}
                            {!! Form::select(
                                'movie_id',
                                ['0' => '---choose movie---', 'movie' => $movie],
                                isset($episode) ? $episode->movie_id : '',
                                [
                                    'class' => 'form-control select_movie',
                                ],
                            ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('linkphim', 'Link Movie') !!}
                            {!! Form::text('linkphim', isset($episode) ? $episode->linkphim : null, [
                                'class' => 'form-control',
                                'placeholder' => 'Link movie...',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('episode', 'Episode Movie') !!}
                            @if (!isset($episode))
                                <select name="episode" class="form-control" id="episode">
                                </select>
                            @else
                                {!! Form::text('episode', $episode->episode, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Episode movie...',
                                    'readonly' => 'readonly',
                                ]) !!}
                            @endif
                        </div>
                        {{-- <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], isset($episode) ? $episode->status : '1', [
                                'class' => 'form-control',
                                'placeholder' => 'Status...',
                                'id' => 'status',
                            ]) !!}
                        </div> --}}

                        @if (!isset($episode))
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
                    <th scope="col">Image Movie</th>
                    <th scope="col">Movie Name</th>
                    <th scope="col">Link Film</th>
                    <th scope="col">Episode</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_episode as $key => $eachEpisode)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td><img width="100px" src="{{ asset('uploads/movie/' . $eachEpisode->movie->image) }}" alt=""></td>
                        <td>{{ $eachEpisode->movie->title }}</td>
                        <td>{!! $eachEpisode->linkphim !!}</td>
                        <td>{{ $eachEpisode->episode }}</td>
                        {{-- <td>
                            @if ($eachepisode->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $eachepisode->slug }}</td> --}}
                        <td>
                            <a href="{{ route('episode.edit', $eachEpisode->id) }}"
                                class="btn btn-warning d-inline-block">Edit</a>
                            {!! Form::open([
                                'route' => ['episode.destroy', $eachEpisode->id],
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
