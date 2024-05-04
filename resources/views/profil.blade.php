@extends('layouts.app')

@section('content')
    <h1 class="text-center">Profil</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-4 shadow-md">
            <h2 class="text-center">User info</h2>
            <table class="table-auto w-full">
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
            </table>
        </div>
        <div class="bg-white p-4 shadow-md">
            <h2 class="text-center">Change password</h2>
            <form action="{{ route('profil.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">New password</label>
                    <input type="password" name="password" id="password" class="form-control mt-1 block w-full"
                           required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm new
                        password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="form-control mt-1 block w-full" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </form>
        </div>

    </div>
@endsection
