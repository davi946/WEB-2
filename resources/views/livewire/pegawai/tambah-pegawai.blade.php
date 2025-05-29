<div class="container mt-4">
    <h4>{{ $isEdit ? 'Edit' : 'Tambah' }} Pegawai</h4>

    <form wire:submit.prevent="simpan">
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" id="nip" wire:model="nip" class="form-control">
            @error('nip') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" wire:model="nama" class="form-control">
            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="unit_kerja_id" class="form-label">Unit Kerja</label>
            <select id="unit_kerja_id" wire:model="unit_kerja_id" class="form-control">
                <option value="">- Pilih Unit Kerja -</option>
                @foreach($unitKerjas as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update' : 'Simpan' }}</button>
        <a href="/pegawai" class="btn btn-secondary">Kembali</a>
    </form>
</div>
