<div class="max-w-full mx-auto p-6 rounded-lg shadow-md">
  <h1 class="text-2xl font-bold mb-6">Form Tambah Peminjaman</h1>
 

  <form wire:submit.prevent="simpan" class="space-y-5 w-full">
    <div>
     <flux:select id="ruang_id" wire:model.defer="ruang_id" label="Ruang" required>
    <flux:select.option value="">-- Pilih Ruang --</flux:select.option>
    @foreach ($ruangs as $r)
        <flux:select.option value="{{ $r->id }}">{{ $r->nama }}</flux:select.option>
    @endforeach
</flux:select>
      @error('ruang_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
      <flux:select id="pegawai_id" wire:model.defer="pegawai_id" label="Pegawai" required>
    <flux:select.option value="">-- Pilih Pegawai --</flux:select.option>
    @foreach ($pegawais as $p)
        <flux:select.option value="{{ $p->id }}">{{ $p->nama }}</flux:select.option>
    @endforeach
</flux:select>
      @error('pegawai_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
      <label for="tanggal" class="block font-semibold">Tanggal</label>
      <input type="date" wire:model="tanggal" id="tanggal"
        class="block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm
               focus:border-green-600 focus:ring focus:ring-green-200 focus:ring-opacity-50" />
      @error('tanggal') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label for="jam_mulai" class="block font-semibold">Jam Mulai</label>
        <input type="time" wire:model="jam_mulai" id="jam_mulai"
          class="block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm
                 focus:border-green-600 focus:ring focus:ring-green-200 focus:ring-opacity-50" />
        @error('jam_mulai') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
      </div>

      <div>
        <label for="jam_akhir" class="block font-semibold">Jam Akhir</label>
        <input type="time" wire:model="jam_akhir" id="jam_akhir"
          class="block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm
                 focus:border-green-600 focus:ring focus:ring-green-200 focus:ring-opacity-50" />
        @error('jam_akhir') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
      </div>
    </div>

    <div>
      <label for="keterangan" class="block font-semibold">Keterangan</label>
      <textarea wire:model="keterangan" id="keterangan" rows="3"
        class="block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm
               focus:border-green-600 focus:ring focus:ring-green-200 focus:ring-opacity-50"></textarea>
      @error('keterangan') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-end gap-2">
      <a href="{{ route('peminjaman.index') }}"
         class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm font-semibold">
        Batal
      </a>
      <button type="submit"
              class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm font-semibold">
        Simpan
      </button>
    </div>
  </form>
</div>
