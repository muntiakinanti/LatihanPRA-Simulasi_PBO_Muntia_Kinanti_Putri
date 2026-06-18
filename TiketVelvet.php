<?php
// TiketVelvet.php
require_once 'tiket.php';

class TiketVelvet extends Tiket {
    private ?string $tipe_audio;
    private ?string $lokasi_baris;
    private ?string $bantal_selimut_pack;
    private ?string $layanan_butler;

    public function __construct(int $id_tiket, string $nama_film, string $jadwal_tayang, int $jumlah_kursi, float $harga_dasar_tiket, ?string $tipe_audio, ?string $lokasi_baris, ?string $bantal_selimut_pack, ?string $layanan_butler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->tipe_audio = $tipe_audio;
        $this->lokasi_baris = $lokasi_baris;
        $this->bantal_selimut_pack = $bantal_selimut_pack;
        $this->layanan_butler = $layanan_butler;
    }

// [Tahap 5] Overriding hitungTotalHarga sesuai rumus Velvet (Surcharge 50% / * 1.50)
    public function hitungTotalHarga(): float {
        return ($this->harga_dasar_tiket * $this->jumlah_kursi) * 1.50;
    }

    public function tampilkanInfoFasilitas(): void {
        echo "=== FASILITAS STUDIO VELVET ===<br>";
        echo "Tipe Audio       : " . ($this->tipe_audio ?? "DTS:X Premium") . "<br>";
        echo "Lokasi Baris     : " . ($this->lokasi_baris ?? "-") . "<br>";
        echo "Paket Bedding    : " . ($this->bantal_selimut_pack ?? "Standard Pillow Pack") . "<br>";
        echo "Layanan Butler   : " . ($this->layanan_butler ?? "Tidak Ada") . "<br>";
    }
}
?>