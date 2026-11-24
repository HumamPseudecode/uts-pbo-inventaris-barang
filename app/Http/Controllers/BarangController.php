<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barangs = $this->getBarangs();
        $keywordInput = $request->query('q');
        $keywordInput = \is_string($keywordInput) ? trim($keywordInput) : '';

        if ($keywordInput !== '') {
            $keyword = mb_strtolower($keywordInput);
            $barangs = array_values(array_filter($barangs, function ($item) use ($keyword) {
                return str_contains(mb_strtolower($item['kode']), $keyword)
                    || str_contains(mb_strtolower($item['nama']), $keyword)
                    || str_contains(mb_strtolower($item['kategori']), $keyword)
                    || str_contains(mb_strtolower($item['lokasi']), $keyword);
            }));
        }

        return view('barangs.index', [
            'barangs' => $barangs,
            'keyword' => $keywordInput,
        ]);
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateBarang($request);
        $barangs = $this->getBarangs();

        $kodeSudahAda = collect($barangs)->contains(fn ($item) => $item['kode'] === $validated['kode']);
        if ($kodeSudahAda) {
            return back()->withInput()->with('error', 'Kode barang sudah digunakan.');
        }

        $barangs[] = $validated;
        session(['barangs' => $barangs]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(string $kode)
    {
        $barang = $this->findBarang($kode);

        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan.');
        }

        return view('barangs.show', ['barang' => $barang]);
    }

    public function edit(string $kode)
    {
        $barang = $this->findBarang($kode);

        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan.');
        }

        return view('barangs.edit', ['barang' => $barang]);
    }

    public function update(Request $request, string $kode)
    {
        $validated = $this->validateBarang($request);
        $barangs = $this->getBarangs();

        foreach ($barangs as $index => $item) {
            if ($item['kode'] === $kode) {
                if ($validated['kode'] !== $kode) {
                    $kodeLain = collect($barangs)->contains(fn ($other) => $other['kode'] === $validated['kode']);
                    if ($kodeLain) {
                        return back()->withInput()->with('error', 'Kode barang sudah digunakan.');
                    }
                }

                $barangs[$index] = $validated;
                session(['barangs' => $barangs]);

                return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
            }
        }

        return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan.');
    }

    public function destroy(string $kode)
    {
        $barangs = $this->getBarangs();
        $filtered = array_values(array_filter(
            $barangs,
            fn ($item) => $item['kode'] !== $kode
        ));

        if (\count($filtered) === \count($barangs)) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan.');
        }

        session(['barangs' => $filtered]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }

    private function getBarangs(): array
    {
        return session('barangs', []);
    }

    private function findBarang(string $kode): ?array
    {
        foreach ($this->getBarangs() as $barang) {
            if ($barang['kode'] === $kode) {
                return $barang;
            }
        }

        return null;
    }

    private function validateBarang(Request $request): array
    {
        $validated = $request->validate([
            'kode' => ['required', 'string', 'max:20'],
            'nama' => ['required', 'string', 'max:100'],
            'kategori' => ['required', 'string', 'max:100'],
            'lokasi' => ['required', 'string', 'max:100'],
            'jumlah' => ['required', 'integer', 'min:0'],
            'kondisi' => ['required', 'string', 'max:50'],
        ]);

        $validated['kode'] = trim($validated['kode']);

        return $validated;
    }
}
