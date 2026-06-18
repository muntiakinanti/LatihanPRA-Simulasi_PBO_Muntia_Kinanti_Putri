<?php
// 1. Load semua file class
require_once 'tiket.php';
require_once 'TiketRegular.php';
require_once 'TiketIMAX.php';
require_once 'TiketVelvet.php';

// 2. Konfigurasi Koneksi Database (PDO) - Dinamis dari MySQL
$host     = 'localhost';
$db_name  = 'db_latihan_pbo_ti-1d_muntia_kinanti_putri'; 
$username = 'root'; 
$password = '';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Ambil data terpusat dari tabel_tiket
    $query = "SELECT * FROM tabel_tiket ORDER BY jenis_studio, id_tiket ASC";
    $stmt = $pdo->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Mapping data baris database menjadi kumpulan Objek OOP secara Polimorfik
    $daftar_tiket = [];
    foreach ($rows as $row) {
        if ($row['jenis_studio'] === 'Regular') {
            $daftar_tiket[] = new TiketRegular(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                $row['tipe_audio'], $row['lokasi_baris']
            );
        } elseif ($row['jenis_studio'] === 'IMAX') {
            $daftar_tiket[] = new TiketIMAX(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                $row['tipe_audio'], $row['lokasi_baris'], $row['kacamata_3d_id'], $row['efek_gerak_fitur']
            );
        } elseif ($row['jenis_studio'] === 'Velvet') {
            $daftar_tiket[] = new TiketVelvet(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                $row['tipe_audio'], $row['lokasi_baris'], $row['bantal_selimut_pack'], $row['layanan_butler']
            );
        }
    }
    
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV Simulation - Pra-UAS PBO</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-zinc-950 text-zinc-100 font-sans antialiased">

    <header class="bg-zinc-900 border-b border-zinc-800 sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl px-6 py-4 mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <span class="text-2xl font-black tracking-wider text-red-600">CGV</span>
                <span class="text-xs bg-zinc-800 text-zinc-400 px-2 py-1 rounded font-mono uppercase tracking-widest">Real DB Connected</span>
            </div>
            <nav class="text-sm font-medium text-zinc-400 flex gap-6">
                <span class="text-red-500 border-b-2 border-red-500 pb-1">Now Showing</span>
                <span class="text-zinc-500">Total Data: <?= count($daftar_tiket) ?></span>
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10">
        
        <div class="mb-12 bg-gradient-to-r from-red-900/40 to-zinc-900 p-8 rounded-2xl border border-red-900/30 shadow-2xl">
            <h1 class="text-3xl font-extrabold mb-2 tracking-tight">Pra-Simulasi E-Ticket System</h1>
            <p class="text-zinc-400 text-sm max-w-xl">Sistem manajemen tiket berbasis Object-Oriented Programming (PHP). Memetakan relasi objek dari database secara dinamis dengan visualisasi layout premium.</p>
        </div>

        <?php 
        $categories = [
            'Regular' => ['bg' => 'bg-blue-500/10 text-blue-400 border-blue-500/20', 'label' => 'Standard Studio', 'class' => 'TiketRegular'],
            'IMAX' => ['bg' => 'bg-amber-500/10 text-amber-400 border-amber-500/20', 'label' => 'Immersive Experience', 'class' => 'TiketIMAX'],
            'Velvet' => ['bg' => 'bg-purple-500/10 text-purple-400 border-purple-500/20', 'label' => 'First Class Luxury', 'class' => 'TiketVelvet']
        ];

        foreach ($categories as $studio_name => $meta): 
        ?>
            <section class="mb-16">
                <div class="flex items-baseline gap-3 mb-6 border-b border-zinc-800 pb-3">
                    <h2 class="text-2xl font-bold tracking-tight text-zinc-100"><?= $studio_name ?> Class</h2>
                    <span class="text-xs px-2.5 py-0.5 rounded-full border <?= $meta['bg'] ?> font-medium"><?= $meta['label'] ?></span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php 
                    $has_data = false;
                    foreach ($daftar_tiket as $tiket): 
                        // Filter dinamis menggunakan blueprint Class untuk pengelompokan studio
                        if ($tiket instanceof $meta['class']):
                            $has_data = true;
                    ?>
                        <div class="bg-zinc-900 rounded-xl overflow-hidden border border-zinc-800 hover:border-zinc-700 transition-all duration-300 shadow-md flex flex-col justify-between">
                            
                            <div class="p-6">
                                <div class="flex justify-between items-start gap-4 mb-4">
                                    <div>
                                        <span class="text-xs font-mono tracking-widest text-zinc-500 block mb-1">ID TICKET: #<?= $tiket->getIdTiket() ?></span>
                                        <h3 class="text-xl font-bold text-zinc-100 tracking-tight leading-snug line-clamp-2 h-14"><?= $tiket->getNamaFilm() ?></h3>
                                    </div>
                                    <span class="text-xs font-semibold bg-zinc-800 text-zinc-300 px-2 py-1 rounded shadow-sm shrink-0">
                                        <?= date('H:i', strtotime($tiket->getJadwalTayang())) ?> WIB
                                    </span>
                                </div>

                                <div class="grid grid-cols-2 gap-y-2 gap-x-4 text-xs font-medium text-zinc-400 border-t border-b border-zinc-800/60 py-3 my-4">
                                    <div>📅 Tanggal: <span class="text-zinc-200"><?= date('d M Y', strtotime($tiket->getJadwalTayang())) ?></span></div>
                                    <div>🎟️ Jumlah: <span class="text-zinc-200"><?= $tiket->getJumlahKursi() ?> Kursi</span></div>
                                    <div class="col-span-2">💰 Harga Dasar: <span class="text-zinc-200">Rp <?= number_format($tiket->getHargaDasarTiket(), 0, ',', '.') ?></span></div>
                                </div>

                                <div class="bg-zinc-950/80 rounded-lg p-4 text-xs font-mono text-zinc-300 space-y-1.5 border border-zinc-800/40 min-h-[90px]">
                                    <?php $tiket->tampilkanInfoFasilitas(); ?>
                                </div>
                            </div>

                            <div class="px-6 py-4 bg-zinc-900/60 border-t border-zinc-800/80 flex justify-between items-center">
                                <span class="text-xs uppercase tracking-wider text-zinc-500 font-bold">Total Pembayaran</span>
                                <span class="text-lg font-black text-red-500">
                                    Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?>
                                </span>
                            </div>

                        </div>
                    <?php 
                        endif; 
                    endforeach; 
                    if (!$has_data):
                        echo "<p class='text-sm text-zinc-500 col-span-3 italic'>Tidak ada data pesanan pada studio ini.</p>";
                    endif;
                    ?>
                </div>
            </section>
        <?php endforeach; ?>

    </main>

    <footer class="bg-zinc-900 text-zinc-600 text-xs text-center py-6 border-t border-zinc-800 font-mono mt-20">
        &copy; 2026 CGV Cinema System - Praktikum Pemrograman Berorientasi Objek.
    </footer>

</body>
</html>