<div class="form-grid">
    <div class="field">
        <label for="kode">Kode</label>
        <input id="kode" name="kode" value="{{ old('kode', $barang['kode'] ?? '') }}" required maxlength="20">
    </div>
    <div class="field">
        <label for="nama">Nama Barang</label>
        <input id="nama" name="nama" value="{{ old('nama', $barang['nama'] ?? '') }}" required maxlength="100">
    </div>
    <div class="field">
        <label for="kategori">Kategori</label>
        <input id="kategori" name="kategori" value="{{ old('kategori', $barang['kategori'] ?? '') }}" required maxlength="100">
    </div>
    <div class="field">
        <label for="lokasi">Lokasi</label>
        <input id="lokasi" name="lokasi" value="{{ old('lokasi', $barang['lokasi'] ?? '') }}" required maxlength="100">
    </div>
    <div class="field">
        <label for="jumlah">Jumlah</label>
        <input id="jumlah" name="jumlah" type="number" min="0" value="{{ old('jumlah', $barang['jumlah'] ?? 0) }}" required>
    </div>
    <div class="field">
        <label for="kondisi">Kondisi</label>
        <select id="kondisi" name="kondisi" required>
            @foreach (['Baik', 'Rusak Ringan', 'Rusak Berat'] as $kondisi)
                <option value="{{ $kondisi }}"
                    {{ old('kondisi', $barang['kondisi'] ?? '') === $kondisi ? 'selected' : '' }}>
                    {{ $kondisi }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<p>
    <button type="submit">{{ $submitLabel }}</button>
    <a class="button secondary" href="{{ route('barang.index') }}">Batal</a>
</p>
