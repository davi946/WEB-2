<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah Pegawai</h1>

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label for="nip" class="block font-semibold">NIP</label>
            <input type="text" id="nip" wire:model="nip" class="w-full border px-4 py-2 rounded" maxlength="10">
            @error('nip') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="nama" class="block font-semibold">Nama</label>
            <input type="text" id="nama" wire:model="nama" class="w-full border px-4 py-2 rounded" maxlength="50">
            @error('nama') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
        
          <flux:select class="block font-semibold" id="unit_kerja_id" wire:model.defer="unit_kerja_id" label="Unit Kerja" required>
    <flux:select.option value="">-- Pilih Unit Kerja --</flux:select.option>
    @foreach ($unitKerjas as $unit)
        <flux:select.option value="{{ $unit->id }}">{{ $unit->nama }}</flux:select.option>
    @endforeach
</flux:select>
            @error('unit_kerja_id') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan
            </button>
            <a href="{{ route('pegawai.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Batal
            </a>
        </div>
    </form>
</div>
