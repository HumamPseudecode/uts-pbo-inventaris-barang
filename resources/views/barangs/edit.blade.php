@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
    <h2>Edit Barang</h2>
    <form method="POST" action="{{ route('barang.update', $barang['kode']) }}">
        @csrf
        @method('PUT')
        @include('barangs._form', ['barang' => $barang, 'submitLabel' => 'Perbarui'])
    </form>
@endsection
