<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah Ruang</h1>

  

    <form wire:submit.prevent="save" class="space-y-4">
        <flux:input type="text" id="kode" wire:model.defer="kode" label="Kode Ruang" placeholder="Masukkan Kode Ruang" required />
        <flux:input type="text" id="nama" wire:model.defer="nama" label="Nama Ruang" placeholder="Masukkan Nama Ruang" required />
        
        <flux:select id="status" wire:model.defer="status" label="Status Ruang" required>
            <flux:select.option value="">-- Status Ruangan --</flux:select.option>
            <flux:select.option value="Tersedia">Tersedia</flux:select.option>
            <flux:select.option value="Tidak Tersedia">Tidak Tersedia</flux:select.option>
            <flux:select.option value="Dibooking">Dibooking</flux:select.option>
            <flux:select.option value="Maintenance">Maintenance</flux:select.option>
        </flux:select>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('ruang.index') }}"
               class="bg-gray-500 text-white px-3 py-2 rounded hover:bg-gray-600">
                Batal
            </a>
            <flux:button type="submit" variant="primary">Save</flux:button>
        </div>
    </form>
</div>
