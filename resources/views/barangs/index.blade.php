@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
    <div class="toolbar">
        <h2>Daftar Barang</h2>
        <a class="button" href="{{ route('barang.create') }}">Tambah Barang</a>
    </div>

    <form method="GET" action="{{ route('barang.index') }}" style="margin-bottom:16px">
        <label for="q">Cari kode, nama, kategori, atau lokasi</label>
        <input id="q" name="q" value="{{ $keyword ?? '' }}" placeholder="Masukkan kata kunci">
    </form>

    @if (count($barangs) > 0)
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang['kode'] }}</td>
                        <td>{{ $barang['nama'] }}</td>
                        <td>{{ $barang['kategori'] }}</td>
                        <td>{{ $barang['lokasi'] }}</td>
                        <td>{{ $barang['jumlah'] }}</td>
                        <td>{{ $barang['kondisi'] }}</td>
                        <td>
                            <a class="button secondary" href="{{ route('barang.show', $barang['kode']) }}">Detail</a>
                            <a class="button" href="{{ route('barang.edit', $barang['kode']) }}">Edit</a>
                            <form class="inline" method="POST" action="{{ route('barang.destroy', $barang['kode']) }}"
                                  onsubmit="return confirm('Hapus barang {{ $barang['nama'] }}?');">
                                @csrf
                                @method('DELETE')
                                <button class="danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada data barang atau pencarian tidak menemukan hasil.</p>
    @endif
@endsection
