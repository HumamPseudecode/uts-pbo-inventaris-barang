<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventaris Barang')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; color: #1f2937; }
        header, footer { background: #1e3a5f; color: white; padding: 16px 24px; }
        nav a { color: white; margin-right: 16px; text-decoration: none; }
        main { max-width: 1100px; margin: 24px auto; background: white; padding: 24px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #d1d5db; padding: 10px; text-align: left; }
        th { background: #eef2f7; }
        .toolbar { display: flex; justify-content: space-between; margin-bottom: 16px; }
        .button, button { display: inline-block; padding: 8px 12px; border: 0; border-radius: 4px;
            background: #2563eb; color: white; text-decoration: none; cursor: pointer; }
        .button.secondary { background: #64748b; }
        .button.danger, button.danger { background: #dc2626; }
        .alert { padding: 12px; margin-bottom: 16px; border-radius: 4px; }
        .alert.success { background: #dcfce7; color: #166534; }
        .alert.error { background: #fee2e2; color: #991b1b; }
        form.inline { display: inline; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
        label { display: block; font-weight: bold; margin-bottom: 6px; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; }
        .field { margin-bottom: 4px; }
        .errors { color: #991b1b; }
        @media (max-width: 700px) { main { margin: 8px; padding: 12px; } .form-grid { grid-template-columns: 1fr; }
            table { display: block; overflow-x: auto; } }
    </style>
</head>
<body>
<header>
    <h1>Manajemen Inventaris Barang</h1>
    <nav>
        <a href="{{ route('barang.index') }}">Daftar Barang</a>
        <a href="{{ route('barang.create') }}">Tambah Barang</a>
    </nav>
</header>
<main>
    @if (session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert error">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert error">
            <strong>Periksa kembali input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content')
</main>
<footer>UTS Pemrograman Berorientasi Objek</footer>
</body>
</html>
