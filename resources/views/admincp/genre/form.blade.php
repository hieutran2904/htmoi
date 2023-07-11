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
                    <div class="card-header">Manage Genre</div>
                    <div class="card-body">
                        @if (!isset($genre))
                            {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::model($genre, ['route' => ['genre.update', $genre->id], 'method' => 'PUT']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', isset($genre) ? $genre->title : null, [
                                'class' => 'form-control',
                                'placeholder' => 'Genre title...',
                                'id' => 'slug',
                                'onkeyup' => 'ChangeToSlug()',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', isset($genre) ? $genre->slug : null, [
                                'class' => 'form-control',
                                'placeholder' => 'Slug...',
                                'id' => 'convert_slug',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', isset($genre) ? $genre->description : null, [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Description...',
                                'id' => 'description',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], isset($genre) ? $genre->status : '1', [
                                'class' => 'form-control',
                                'placeholder' => 'Status...',
                                'id' => 'status',
                            ]) !!}
                        </div>
                        
                        @if (!isset($genre))
                            {!! Form::submit('Add', ['class' => 'btn btn-success mt-2']) !!}
                        @else
                            {!! Form::submit('Update', ['class' => 'btn btn-info mt-2']) !!}
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Genre Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $key => $eachGenre)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $eachGenre->title }}</td>
                        <td>{{ $eachGenre->description }}</td>
                        <td>
                            @if ($eachGenre->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $eachGenre->slug }}</td>
                        <td>
                            <a href="{{ route('genre.edit', $eachGenre->id) }}"
                                class="btn btn-warning d-inline-block">Edit</a>
                            {!! Form::open([
                                'route' => ['genre.destroy', $eachGenre->id],
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
