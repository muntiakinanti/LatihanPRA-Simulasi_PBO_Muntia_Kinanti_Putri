<?php
// TiketIMAX.php
require_once 'tiket.php';

class TiketIMAX extends Tiket {
    private ?string $tipe_audio;
    private ?string $lokasi_baris;
    private ?string $kacamata_3d_id;
    private ?string $efek_gerak_fitur;

    public function __construct(int $id_tiket, string $nama_film, string $jadwal_tayang, int $jumlah_kursi, float $harga_dasar_tiket, ?string $tipe_audio, ?string $lokasi_baris, ?string $kacamata_3d_id, ?string $efek_gerak_fitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $harga_dasar_tiket);
        $this->tipe_audio = $tipe_audio;
        $this->lokasi_baris = $lokasi_baris;
        $this->kacamata_3d_id = $kacamata_3d_id;
        $this->efek_gerak_fitur = $efek_gerak_fitur;
    }

// [Tahap 5] Overriding hitungTotalHarga sesuai rumus IMAX (+35000 flat)
    public function hitungTotalHarga(): float {
        return ($this->harga_dasar_tiket * $this->jumlah_kursi) + 35000;
    }

    public function tampilkanInfoFasilitas(): void {
        echo "=== FASILITAS STUDIO IMAX ===<br>";
        echo "Tipe Audio       : " . ($this->tipe_audio ?? "Dolby Atmos") . "<br>";
        echo "Lokasi Baris     : " . ($this->lokasi_baris ?? "-") . "<br>";
        echo "ID Kacamata 3D   : " . ($this->kacamata_3d_id ?? "Tidak Termasuk") . "<br>";
        echo "Fitur Efek Gerak : " . ($this->efek_gerak_fitur ?? "Tidak Ada") . "<br>";
    }
}
?>