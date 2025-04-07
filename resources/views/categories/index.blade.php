@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{ isset($category) ? 'Edit Category' : 'Add Category' }}
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(isset($category))
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @method('PUT')
                    @else
                        <form action="{{ route('categories.store') }}" method="POST">
                    @endif
                        @csrf
                        <div>
                            <label class="form-label">Category Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ isset($category) ? $category->name : old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="form-label">Description:</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" 
                                name="description" value="{{ isset($category) ? $category->description : old('description') }}">
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div style="text-align: center; margin-top: 15px;">
                            <button type="submit" class="btn btn-primary" style="background-color: green; border-color: green;">Submit</button>
                            @if(isset($category))
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div style="margin-bottom: 10px;">
                <a href="{{ route('categories.index') }}" class="btn" style="border: 1px solid blue; color: blue; background-color: white; border-radius: 15px;">Add Category</a>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                        <tr>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->description }}</td>
                            <td>
                                <div style="display: flex; gap: 5px;">
                                    <a href="{{ route('categories.edit', $cat->id) }}" class="btn" style="border: 1px solid blue; color: blue; background-color: white; border-radius: 15px; padding: 2px 10px;">Edit</a>
                                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="border: 1px solid red; color: red; background-color: white; border-radius: 15px; padding: 2px 10px;" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No categories found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection