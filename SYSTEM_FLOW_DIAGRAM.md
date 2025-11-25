# ARTKUNO Web Portal - Diagram Alur Sistem

```mermaid
graph TD
    Start[ARTKUNO Web Portal] --> Public[Halaman Publik]
    
    Public --> Info[Informasi & Berita<br/>Barang Antik]
    Public --> Gallery[Galeri Barang Antik]
    Public --> Article[Artikel & Tips Koleksi]
    Public --> Login[Login/Register]
    
    Login --> RoleCheck{Pilih Role}
    
    RoleCheck --> Buyer[BUYER/PEMBELI]
    RoleCheck --> Seller[SELLER/PENJUAL]
    RoleCheck --> Admin[ADMIN]
    
    %% BUYER FLOW
    Buyer --> BuyerDash[Dashboard Pembeli]
    BuyerDash --> Browse[Browse Lelang Aktif]
    BuyerDash --> BidHistory[Riwayat Bid]
    BuyerDash --> Watchlist[Watchlist/Favorit]
    
    Browse --> ItemDetail[Detail Barang]
    ItemDetail --> PlaceBid[Pasang Bid]
    PlaceBid --> Payment[Pembayaran<br/>jika Menang]
    Payment --> BuyerComplete[Transaksi Selesai]
    
    %% SELLER FLOW
    Seller --> SellerDash[Dashboard Penjual]
    SellerDash --> AddItem[Tambah Barang<br/>untuk Dilelang]
    SellerDash --> ManageItem[Kelola Barang]
    SellerDash --> SalesReport[Laporan Penjualan]
    
    AddItem --> Verification[Verifikasi Admin]
    Verification --> Approved{Disetujui?}
    Approved -->|Ya| LiveAuction[Lelang Aktif]
    Approved -->|Tidak| Rejected[Ditolak & Revisi]
    Rejected --> AddItem
    
    LiveAuction --> AuctionEnd[Lelang Berakhir]
    AuctionEnd --> Winner{Ada Pemenang?}
    Winner -->|Ya| SellerPayout[Terima Pembayaran]
    Winner -->|Tidak| Relisted[Dapat Dilelang Ulang]
    
    %% ADMIN FLOW
    Admin --> AdminDash[Dashboard Admin]
    AdminDash --> VerifyItems[Verifikasi Barang]
    AdminDash --> UserManage[Kelola User]
    AdminDash --> AuctionManage[Kelola Lelang]
    AdminDash --> Reports[Laporan & Statistik]
    AdminDash --> Content[Kelola Konten Berita]
    
    VerifyItems --> CheckAuth[Cek Keaslian<br/>& Dokumentasi]
    CheckAuth --> ApproveReject[Setujui/Tolak]
    
    UserManage --> BanUser[Ban/Suspend User]
    UserManage --> VerifyUser[Verifikasi Identitas]
    
    AuctionManage --> SetRules[Atur Aturan Lelang]
    AuctionManage --> MonitorBid[Monitor Aktivitas Bid]
    AuctionManage --> ResolveDispute[Selesaikan Sengketa]
```

## 📋 Penjelasan Alur Sistem

### 🌐 **Halaman Publik**
- Informasi & Berita seputar barang antik
- Galeri barang antik untuk eksplorasi
- Artikel & tips koleksi
- Login/Register untuk akses lebih lanjut

### 👤 **Role User & Dashboard**

#### **1. BUYER (PEMBELI)** 
- **Dashboard**: Melihat ringkasan aktivitas
- **Browse**: Menelusuri lelang barang antik yang aktif
- **Riwayat Bid**: Melihat riwayat penawaran yang pernah dilakukan
- **Watchlist**: Menyimpan barang favorit untuk dipantau
- **Detail Barang**: Melihat informasi lengkap barang (foto, deskripsi, harga awal, dll)
- **Pasang Bid**: Melakukan penawaran/bid pada barang
- **Pembayaran**: Melakukan transaksi pembayaran jika memenangkan lelang
- **Transaksi Selesai**: Konfirmasi pembelian barang

#### **2. SELLER (PENJUAL)**
- **Dashboard**: Ringkasan penjualan dan produk
- **Tambah Barang**: Mengunggah barang baru untuk dilelang
- **Kelola Barang**: Mengelola barang yang sedang/telah dilelang
- **Laporan Penjualan**: Melihat statistik dan laporan penjualan

**Alur Verifikasi:**
1. Penjual submit barang → Verifikasi Admin
2. Admin cek keaslian & dokumentasi
3. Jika disetujui → Lelang Aktif
4. Jika ditolak → Penjual bisa revisi & submit ulang

**Alur Lelang:**
1. Lelang Aktif berjalan
2. Lelang Berakhir → Ada pemenang?
3. Jika Ya → Penjual terima pembayaran
4. Jika Tidak → Barang bisa dilelang ulang

#### **3. ADMIN**
- **Dashboard**: Kontrol panel utama admin
- **Verifikasi Barang**: Memeriksa keaslian & dokumentasi barang baru
- **Kelola User**: Mengelola user (ban, suspend, verifikasi identitas)
- **Kelola Lelang**: Mengatur aturan lelang, monitor bid, selesaikan sengketa
- **Laporan & Statistik**: Melihat data dan analisis platform
- **Kelola Konten Berita**: Mengelola artikel dan berita

## 🔄 **Alur Interaksi Utama**

### Buyer Placement:
```
Login → Pilih Role (Buyer) → Dashboard Pembeli
→ Browse/Watchlist → Detail Barang → Bid
→ Menang? → Pembayaran → Selesai
```

### Seller Placement:
```
Login → Pilih Role (Seller) → Dashboard Penjual
→ Tambah Barang → Verifikasi Admin → Disetujui?
→ Jika Ya: Lelang Aktif → Lelang Selesai → Terima Pembayaran
→ Jika Tidak: Revisi & Submit Ulang
```

### Admin Management:
```
Login → Pilih Role (Admin) → Dashboard Admin
→ Verifikasi/Kelola User/Kelola Lelang/Laporan/Konten
```

## 📊 **Fitur Inti yang Perlu Dikembangkan**

- [ ] Sistem autentikasi dengan 3 role (Buyer, Seller, Admin)
- [ ] Halaman publik dengan info, galeri, artikel
- [ ] Sistem lelang/bidding
- [ ] Verifikasi barang oleh admin
- [ ] Sistem pembayaran
- [ ] Dashboard untuk setiap role
- [ ] Sistem notifikasi untuk setiap role
- [ ] Laporan dan statistik
- [ ] Manajemen user (ban, suspend, verifikasi)
- [ ] Kelola konten berita/artikel
