<h1 class="text-center">Profil</h1>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="bg-white p-4 shadow-md">
        <h2 class="text-center">Informasi Akun</h2>
        <table class="table-auto w-full">
            <tr>
                <td>Nama</td>
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
        <h2 class="text-center">Ubah Password</h2>
        <form action="{{ route('profil.update') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                <input type="password" name="password" id="password" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input mt-1 block w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </form>
    </div>
</div>
