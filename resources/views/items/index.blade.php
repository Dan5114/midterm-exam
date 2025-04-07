@extends('layouts.app')

@section('title', 'Items')

@section('content')
    <h1>Items</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{ isset($item) ? 'Edit Item' : 'Add Item' }}
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(isset($item))
                        <form action="{{ route('items.update', $item->id) }}" method="POST">
                        @method('PUT')
                    @else
                        <form action="{{ route('items.store') }}" method="POST">
                    @endif
                        @csrf
                        <div>
                            <label class="form-label">Select Category:</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ 
                                        (isset($item) && $item->category_id == $category->id) || 
                                        old('category_id') == $category->id ? 'selected' : '' 
                                    }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="form-label">Item Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ isset($item) ? $item->name : old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="form-label">Qty:</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" 
                                name="quantity" value="{{ isset($item) ? $item->quantity : old('quantity', 0) }}" required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="form-label">Price:</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                name="price" value="{{ isset($item) ? $item->price : old('price', 0) }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div style="text-align: center; margin-top: 15px;">
                            <button type="submit" class="btn btn-primary" style="background-color: green; border-color: green;">Submit</button>
                            @if(isset($item))
                                <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div style="margin-bottom: 10px;">
                <a href="{{ route('items.index') }}" class="btn" style="border: 1px solid blue; color: blue; background-color: white; border-radius: 15px;">Add Item</a>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $it)
                        <tr>
                            <td>{{ $it->category->name }}</td>
                            <td>{{ $it->name }}</td>
                            <td>{{ $it->quantity }}</td>
                            <td>{{ number_format($it->price, 2) }}</td>
                            <td>{{ number_format($it->quantity * $it->price, 2) }}</td>
                            <td>
                                <div style="display: flex; gap: 5px;">
                                    <a href="{{ route('items.edit', $it->id) }}" class="btn" style="border: 1px solid blue; color: blue; background-color: white; border-radius: 15px; padding: 2px 10px;">Edit</a>
                                    <form action="{{ route('items.destroy', $it->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="border: 1px solid red; color: red; background-color: white; border-radius: 15px; padding: 2px 10px;" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No items found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection