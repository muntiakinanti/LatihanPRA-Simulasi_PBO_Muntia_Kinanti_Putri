<?php
// tiket.php

abstract class Tiket {
    // Properti Terenkapsulasi (protected)
    protected int $id_tiket;
    protected string $nama_film;
    protected string $jadwal_tayang; // Menggunakan string untuk format DATETIME MySQL
    protected int $jumlah_kursi;
    protected float $harga_dasar_tiket;

    // Constructor untuk inisialisasi data dari database
    public function __construct(int $id_tiket, string $nama_film, string $jadwal_tayang, int $jumlah_kursi, float $harga_dasar_tiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->harga_dasar_tiket = $harga_dasar_tiket;
    }

    // Metode Abstrak (Wajib dideklarasikan tanpa body)
    abstract public function hitungTotalHarga(): float;
    abstract public function tampilkanInfoFasilitas(): void;

    // Getter untuk akses data secara aman jika diperlukan
    public function getIdTiket(): int { return $this->id_tiket; }
    public function getNamaFilm(): string { return $this->nama_film; }
    public function getJadwalTayang(): string { return $this->jadwal_tayang; }
    public function getJumlahKursi(): int { return $this->jumlah_kursi; }
    public function getHargaDasarTiket(): float { return $this->harga_dasar_tiket; }
}
?>