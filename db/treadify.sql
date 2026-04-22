-- Database: treadify
-- Tabel untuk custom clothing e-commerce

CREATE TABLE IF NOT EXISTS pesanan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    nomor_hp VARCHAR(15) NOT NULL,
    jenis_kain VARCHAR(50) NOT NULL,
    lingkar_dada INT NOT NULL,
    lingkar_pinggang INT NOT NULL,
    lingkar_bahu INT NOT NULL,
    panjang_lengan INT NOT NULL,
    lingkar_paha INT NOT NULL,
    panjang_celana INT NOT NULL,
    panjang_baju INT NOT NULL,
    harga_estimasi DECIMAL(10, 2) NOT NULL,
    catatan TEXT,
    status VARCHAR(20) DEFAULT 'pending',
    tanggal_pemesanan TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel untuk harga berdasarkan jenis kain
CREATE TABLE IF NOT EXISTS harga_kain (
    id INT PRIMARY KEY AUTO_INCREMENT,
    jenis_kain VARCHAR(50) UNIQUE NOT NULL,
    harga_dasar DECIMAL(10, 2) NOT NULL,
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data harga kain
INSERT INTO harga_kain (jenis_kain, harga_dasar, deskripsi) VALUES
('Katun', 150000, 'Kain katun berkualitas premium, nyaman dan breathable'),
('Linen', 200000, 'Kain linen alami, elegan dan tahan lama'),
('Sutra', 350000, 'Kain sutra murni, mewah dan berkilau'),
('Drill', 180000, 'Kain drill tebal, cocok untuk celana'),
('Denim', 220000, 'Denim berkualitas tinggi, trendy dan durable');
