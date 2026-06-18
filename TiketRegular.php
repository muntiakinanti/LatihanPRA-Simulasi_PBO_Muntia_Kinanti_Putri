<?php
// TiketRegular.php
require_once 'tiket.php';

class TiketRegular extends Tiket {
    private ?string $tipe_audio;
    private ?string $lokasi_baris;

    public function __construct(int $id_tiket, string $nama_film, string $jadwal_tayang, int $jumlah_kursi, float $harga_dasar_tiket, ?string $tipe_audio, ?string $lokasi_baris) {
        // Memanggil constructor abstract class Tiket
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->tipe_audio = $tipe_audio;
        $this->lokasi_baris = $lokasi_baris;
    }

// [Tahap 5] Overriding hitungTotalHarga sesuai rumus Regular
    public function hitungTotalHarga(): float {
        return $this->harga_dasar_tiket * $this->jumlah_kursi;
    }
    
    public function tampilkanInfoFasilitas(): void {
        echo "=== FASILITAS STUDIO REGULAR ===<br>";
        echo "Tipe Audio   : " . ($this->tipe_audio ?? "Standard Stereo") . "<br>";
        echo "Lokasi Baris : " . ($this->lokasi_baris ?? "-") . "<br>";
    }
}
?>