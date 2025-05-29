<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Pegawai</h1>

    <form wire:submit.prevent="update" class="space-y-4">
        <div>
            <label for="nip" class="block font-semibold">NIP</label>
            <input type="text" id="nip" wire:model="nip" class="w-full border px-4 py-2 rounded">
            @error('nip') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="nama" class="block font-semibold">Nama</label>
            <input type="text" id="nama" wire:model="nama" class="w-full border px-4 py-2 rounded">
            @error('nama') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="unit_kerja_id" class="block font-semibold">Unit Kerja</label>
            <select id="unit_kerja_id" wire:model="unit_kerja_id" class="w-full border px-4 py-2 rounded">
                <option value="">-- Pilih Unit Kerja --</option>
                @foreach ($unitKerjas as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->nama }}</option>
                @endforeach
            </select>
            @error('unit_kerja_id') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>
            <a href="{{ route('pegawai.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Batal
            </a>
        </div>
    </form>
</div>
