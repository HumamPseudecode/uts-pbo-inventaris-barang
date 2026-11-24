<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BarangTest extends TestCase
{
    public function test_root_redirects_to_barang_index(): void
    {
        $response = $this->get('/');

        $response->assertRedirect(route('barang.index'));
    }

    public function test_barang_crud_flow_uses_session(): void
    {
        $this->get(route('barang.index'))->assertOk();
        $this->get(route('barang.create'))->assertOk();

        $this->post(route('barang.store'), [
            'kode' => 'INV-001',
            'nama' => 'Laptop',
            'kategori' => 'Elektronik',
            'lokasi' => 'Lab 3',
            'jumlah' => 5,
            'kondisi' => 'Baik',
        ])->assertRedirect(route('barang.index'));

        $this->get(route('barang.show', 'INV-001'))->assertOk();
        $this->get(route('barang.edit', 'INV-001'))->assertOk();

        $this->put(route('barang.update', 'INV-001'), [
            'kode' => 'INV-001',
            'nama' => 'Laptop Update',
            'kategori' => 'Elektronik',
            'lokasi' => 'Lab 4',
            'jumlah' => 4,
            'kondisi' => 'Baik',
        ])->assertRedirect(route('barang.index'));

        $this->delete(route('barang.destroy', 'INV-001'))
            ->assertRedirect(route('barang.index'));
    }
}
