# 📁 Contoh Kode Praktik Hari 4 - Blade Templating & XSS Prevention

## Struktur File

```
hari-4-blade-xss/
├── app/
│   └── Http/Controllers/
│       ├── DemoBladeController.php      # Demo Blade Templating
│       └── XSSLabController.php         # Lab XSS Vulnerable & Secure
│
├── app/Models/
│   └── XssLabComment.php                # Model untuk demo Stored XSS
│                                        # Tabel: xss_lab_comments
│
├── database/migrations/
│   └── create_comments_table.php        # Tabel xss_lab_comments (BUKAN comments!)
│
├── resources/views/
│   ├── components/                      # Blade Components
│   │   ├── alert.blade.php
│   │   ├── card.blade.php
│   │   ├── badge.blade.php
│   │   └── ticket-card.blade.php
│   │
│   ├── demo-blade/                      # Demo Blade Templating
│   │   ├── index.blade.php              # Menu demo
│   │   ├── directives.blade.php         # Control flow & loops
│   │   ├── components.blade.php         # Demo components
│   │   ├── includes.blade.php           # Demo include & each
│   │   └── stacks.blade.php             # Demo stacks & push
│   │
│   ├── xss-lab/                         # Lab XSS
│   │   ├── index.blade.php              # Menu lab
│   │   ├── vulnerable/                  # Halaman VULNERABLE
│   │   │   ├── reflected.blade.php
│   │   │   ├── stored.blade.php
│   │   │   └── dom-based.blade.php
│   │   └── secure/                      # Halaman SECURE
│   │       ├── reflected.blade.php
│   │       ├── stored.blade.php
│   │       └── dom-based.blade.php
│   │
│   └── partials/
│       └── ticket-row.blade.php         # Untuk demo @each
│
└── routes/
    └── web.php                          # Routes untuk demo
```

## ⚠️ PENTING: Perbedaan Tabel Comments

Ada **2 tabel terpisah** untuk comments:

| Tabel | Model | Digunakan Untuk | Auth? |
|-------|-------|-----------------|-------|
| `xss_lab_comments` | `XssLabComment` | Demo XSS (Hari 4) | ❌ Tidak (pakai `author_name`) |
| `comments` | `Comment` | Ticket Comments (Hari 5) | ✅ Ya (pakai `user_id`) |

**Alasan dipisah:**
1. XSS Lab tidak memerlukan authentication
2. XSS Lab bisa di-reset tanpa mempengaruhi data real
3. Struktur berbeda (`author_name` vs `user_id`)

## Cara Implementasi

1. Copy semua file ke proyek Laravel
2. Jalankan migration: `php artisan migrate`
3. Akses `/demo-blade` untuk demo Blade Templating
4. Akses `/xss-lab` untuk Lab XSS

## ⚠️ PERINGATAN

Halaman vulnerable HANYA untuk pembelajaran. JANGAN PERNAH deploy ke production!
