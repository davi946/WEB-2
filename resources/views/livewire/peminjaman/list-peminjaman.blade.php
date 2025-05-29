<div class="container mx-auto px-4 mt-4">
    <h2 class="text-2xl font-bold mb-4 text-white">Daftar Peminjaman</h2>

    <a href="{{ url('/peminjaman/tambah') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-3 inline-block font-semibold text-sm">
        + Tambah Peminjaman
    </a>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse mt-4 text-center">
            <thead>
                <tr class="bg-green-800 text-white uppercase text-sm font-semibold">
                    <th class="py-3 px-4 border border-white-600">Ruang</th>
                    <th class="py-3 px-4 border border-white-600">Pegawai</th>
                    <th class="py-3 px-4 border border-white-600">Tanggal</th>
                    <th class="py-3 px-4 border border-white-600">Jam Mulai</th>
                    <th class="py-3 px-4 border border-white-600">Jam Akhir</th>
                    <th class="py-3 px-4 border border-white-600">Keterangan</th>
                    <th class="py-3 px-4 border border-white-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamans as $index => $p)
                    <tr class="{{ $index % 2 === 0 ? 'bg-gray-900' : 'bg-gray-800' }} text-white">
                        <td class="py-2 px-4 border border-white-700">{{ $p->ruang->nama ?? $p->ruang_id }}</td>
                        <td class="py-2 px-4 border border-white-700">{{ $p->pegawai->nama ?? $p->pegawai_id }}</td>
                        <td class="py-2 px-4 border border-white-700">{{ \Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') }}</td>
                        <td class="py-2 px-4 border border-white-700">{{ \Carbon\Carbon::parse($p->jam_mulai)->format('H:i') }}</td>
                        <td class="py-2 px-4 border border-white-700">{{ \Carbon\Carbon::parse($p->jam_akhir)->format('H:i') }}</td>
                        <td class="py-2 px-4 border border-white-700 text-left">{{ $p->keterangan }}</td>
                        <td class="py-2 px-4 border border-white-700">
                            <div class="flex justify-center gap-2">
                                <a href="{{ url('/peminjaman/edit/' . $p->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-3 py-1 rounded text-sm">
                                    Edit
                                </a>
                                <button 
                                    wire:click="hapus({{ $p->id }})"
                                    onclick="return confirm('Yakin ingin menghapus peminjaman ini?')" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm"
                                >
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-white-400">
                            Belum ada data peminjaman
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>