@extends('layouts.app')

@section('content')
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="mb-4 p-2">
            <h1>Discounts</h1>
            <p class="text-gray-500">All discounts</p>
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Go back</a>
            <a href="{{ route('discounts.create') }}" class="btn btn-primary mx-1">Create Discount</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Code</th>
                <th>Discount</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($discounts as $discount)
                <tr @if($discount->expires_at->isPast()) class="table-danger" @endif>
                    <td>{{ $discount->code }}</td>
                    <td>{{ $discount->value }}</td>
                    <td>{{ $discount->created_at }}</td>
                    <td>{{ $discount->expires_at }}</td>
                    <td>
                        <a href="{{ route('discounts.edit', $discount->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST"
                              style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
