@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <h2>Tambah Barang</h2>
    <form method="POST" action="{{ route('barang.store') }}">
        @csrf
        @include('barangs._form', ['barang' => null, 'submitLabel' => 'Simpan'])
    </form>
@endsection
