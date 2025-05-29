<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4 text-white">List Ruang</h1>

    <div class="flex justify-start mb-4">
        <a 
            href="{{ route('ruang.create') }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold text-sm"
        >
            Tambah Ruang
        </a>
    </div>

    @if (session('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse mt-4 text-center">
            <thead>
                <tr class="bg-green-800 text-white">
                    <th class="py-3 px-4 border border-white-600">ID</th>
                    <th class="py-3 px-4 border border-white-600">Kode</th>
                    <th class="py-3 px-4 border border-white-600">Nama</th>
                    <th class="py-3 px-4 border border-white-600">Status</th>
                    <th class="py-3 px-4 border border-white-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ruangs as $index => $ruang)
                    <tr class="{{ $index % 2 === 0 ? 'bg-gray-900' : 'bg-gray-800' }} text-white">
                        <td class="py-2 px-4 border border-white-700">{{ $ruang->id }}</td>
                        <td class="py-2 px-4 border border-white-700">{{ $ruang->kode }}</td>
                        <td class="py-2 px-4 border border-white-700">{{ $ruang->nama }}</td>
                        <td class="py-2 px-4 border border-white-700">{{ $ruang->status }}</td>
                        <td class="py-2 px-4 border border-white-700">
                            <div class="flex justify-center gap-2">
                                <a 
                                    href="{{ route('ruang.edit', $ruang) }}" 
                                    class="bg-blue-400 hover:bg-blue-500 text-black font-semibold px-3 py-1 rounded text-sm"
                                >
                                    Edit
                                </a>
                                <button 
                                    wire:click="delete({{ $ruang->id }})" 
                                    wire:confirm="Yakin ingin menghapus?"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm"
                                >
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
