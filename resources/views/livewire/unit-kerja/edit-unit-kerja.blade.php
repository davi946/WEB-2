<div class="container mx-auto max-w-lg">
    <h1 class="text-2xl font-bold mb-6">Edit Unit Kerja</h1>

    <form wire:submit.prevent="save">
        @csrf

        <div class="mb-4">
            <label for="kode" class="block mb-1 font-semibold">Kode</label>
            <input 
                type="text" 
                id="kode" 
                wire:model.defer="kode" 
                class="w-full px-3 py-2 border border-gray-300 rounded"
                placeholder="Masukkan kode unit kerja"
            >
            @error('kode') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div class="mb-6">
            <label for="nama" class="block mb-1 font-semibold">Nama</label>
            <input 
                type="text" 
                id="nama" 
                wire:model.defer="nama" 
                class="w-full px-3 py-2 border border-gray-300 rounded"
                placeholder="Masukkan nama unit kerja"
            >
            @error('nama') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('unit-kerja.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold px-4 py-2 rounded">
                Batal
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
