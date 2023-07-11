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
                    <div class="card-header">Manage Country</div>
                    <div class="card-body">
                        @if (!isset($country))
                            {!! Form::open(['route' => 'country.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::model($country, ['route' => ['country.update', $country->id], 'method' => 'PUT']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', isset($country) ? $country->title : null, [
                                'class' => 'form-control',
                                'placeholder' => 'Country title...',
                                'id' => 'slug',
                                'onkeyup' => 'ChangeToSlug()'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', isset($country) ? $country->slug : null, [
                                'class' => 'form-control',
                                'placeholder' => 'Slug...',
                                'id' => 'convert_slug',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', isset($country) ? $country->description : null, [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Description...',
                                'id' => 'description',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], isset($country) ? $country->status : '1', [
                                'class' => 'form-control',
                                'placeholder' => 'Status...',
                                'id' => 'status',
                            ]) !!}
                        </div>
                        
                        @if (!isset($country))
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
                    <th scope="col">Country Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $key => $eachCountry)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $eachCountry->title }}</td>
                        <td>{{ $eachCountry->description }}</td>
                        <td>
                            @if ($eachCountry->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $eachCountry->slug }}</td>
                        <td>
                            <a href="{{ route('country.edit', $eachCountry->id) }}"
                                class="btn btn-warning d-inline-block">Edit</a>
                            {!! Form::open([
                                'route' => ['country.destroy', $eachCountry->id],
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
