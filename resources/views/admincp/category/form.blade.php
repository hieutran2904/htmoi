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
                    <div class="card-header">Manage Category</div>
                    <div class="card-body">
                        {{-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif --}}
                        @if (!isset($category))
                            {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'PUT']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', isset($category) ? $category->title : null, [
                                'class' => 'form-control',
                                'placeholder' => 'Category title...',
                                'id' => 'slug',
                                'onkeyup' => 'ChangeToSlug()'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', isset($category) ? $category->slug : null, [
                                'class' => 'form-control',
                                'placeholder' => 'Slug...',
                                'id' => 'convert_slug',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', isset($category) ? $category->description : null, [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Description...',
                                'id' => 'description',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], isset($category) ? $category->status : '1', [
                                'class' => 'form-control',
                                'placeholder' => 'Trạng thái...',
                                'id' => 'status',
                            ]) !!}
                        </div>
                        
                        @if (!isset($category))
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
                    <th scope="col">Category Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $key => $eachCategory)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $eachCategory->title }}</td>
                        <td>{{ $eachCategory->description }}</td>
                        <td>
                            @if ($eachCategory->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $eachCategory->slug }}</td>
                        <td>
                            <a href="{{ route('category.edit', $eachCategory->id) }}"
                                class="btn btn-warning d-inline-block">Edit</a>
                            {!! Form::open([
                                'route' => ['category.destroy', $eachCategory->id],
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
