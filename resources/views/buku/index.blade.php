<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Daftar Buku</h2>
    </x-slot>

    <div class="p-4">
        <a href="{{ route('buku.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Buku</a>
        @if(session('success'))
            <div class="text-green-600 mt-2">{{ session('success') }}</div>
        @endif
        <table class="w-full mt-4 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Judul</th>
                    <th class="p-2 border">Pengarang</th>
                    <th class="p-2 border">Penerbit</th>
                    <th class="p-2 border">Tahun</th>
                    <th class="p-2 border">Stok</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukus as $buku)
                <tr>
                    <td class="border p-2">{{ $buku->judul }}</td>
                    <td class="border p-2">{{ $buku->pengarang }}</td>
                    <td class="border p-2">{{ $buku->penerbit }}</td>
                    <td class="border p-2">{{ $buku->tahun_terbit }}</td>
                    <td class="border p-2">{{ $buku->stok }}</td>
                    <td class="border p-2">
                        <a href="{{ route('buku.edit', $buku) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('buku.destroy', $buku) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="text-red-500 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
