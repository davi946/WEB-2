<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Peminjaman</h1>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-4">
        <div>
            <label for="ruang_id" class="block font-semibold">Ruang</label>
            <select wire:model="ruang_id" id="ruang_id" class="w-full border px-4 py-2 rounded">
                <option value="">-- Pilih Ruang --</option>
                @foreach($ruangs as $ruang)
                    <option value="{{ $ruang->id }}">{{ $ruang->nama }}</option>
                @endforeach
            </select>
            @error('ruang_id') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="pegawai_id" class="block font-semibold">Pegawai</label>
            <select wire:model="pegawai_id" id="pegawai_id" class="w-full border px-4 py-2 rounded">
                <option value="">-- Pilih Pegawai --</option>
                @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                @endforeach
            </select>
            @error('pegawai_id') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="tanggal" class="block font-semibold">Tanggal</label>
            <input type="date" id="tanggal" wire:model="tanggal" class="w-full border px-4 py-2 rounded">
            @error('tanggal') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="jam_mulai" class="block font-semibold">Jam Mulai</label>
                <input type="time" id="jam_mulai" wire:model="jam_mulai" class="w-full border px-4 py-2 rounded">
                @error('jam_mulai') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="jam_akhir" class="block font-semibold">Jam Akhir</label>
                <input type="time" id="jam_akhir" wire:model="jam_akhir" class="w-full border px-4 py-2 rounded">
                @error('jam_akhir') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label for="keterangan" class="block font-semibold">Keterangan</label>
            <textarea id="keterangan" wire:model="keterangan" rows="3" class="w-full border px-4 py-2 rounded"></textarea>
            @error('keterangan') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Update
            </button>
            <a href="{{ url('/peminjaman') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Batal
            </a>
        </div>
    </form>
</div>
