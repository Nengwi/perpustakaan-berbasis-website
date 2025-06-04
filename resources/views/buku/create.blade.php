
<x-app-layout> 
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Tambah Buku</h2>
    </x-slot>

    <div class="p-4">
        <form action="{{ route('buku.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label>Judul</label>
                <input type="text" name="judul" class="w-full border p-2" value="{{ old('judul') }}">
                @error('judul') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>

            <div>
                <label>Pengarang</label>
                <input type="text" name="pengarang" class="w-full border p-2" value="{{ old('pengarang') }}">
                @error('pengarang') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>

            <div>
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="w-full border p-2" value="{{ old('penerbit') }}">
                @error('penerbit') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>

            <div>
                <label>Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="w-full border p-2" value="{{ old('tahun_terbit') }}">
                @error('tahun_terbit') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>

            <div>
                <label>Stok</label>
                <input type="number" name="stok" class="w-full border p-2" value="{{ old('stok', 0) }}">
                @error('stok') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>

            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('buku.index') }}" class="text-gray-500 ml-2">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
