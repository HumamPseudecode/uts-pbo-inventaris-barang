@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <h2>Detail Barang</h2>
    <table>
        <tbody>
            <tr><th>Kode</th><td>{{ $barang['kode'] }}</td></tr>
            <tr><th>Nama Barang</th><td>{{ $barang['nama'] }}</td></tr>
            <tr><th>Kategori</th><td>{{ $barang['kategori'] }}</td></tr>
            <tr><th>Lokasi</th><td>{{ $barang['lokasi'] }}</td></tr>
            <tr><th>Jumlah</th><td>{{ $barang['jumlah'] }}</td></tr>
            <tr><th>Kondisi</th><td>{{ $barang['kondisi'] }}</td></tr>
        </tbody>
    </table>
    <p style="margin-top:16px">
        <a class="button" href="{{ route('barang.edit', $barang['kode']) }}">Edit</a>
        <a class="button secondary" href="{{ route('barang.index') }}">Kembali</a>
    </p>
@endsection
