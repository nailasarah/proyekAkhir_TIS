<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KaryaNusantara - E-Commerce UMKM Premium</title>
    
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        warkom: {
                            navy: '#0c1938',
                            navyLight: '#16284f',
                            orange: '#f97316',
                            amber: '#f59e0b',
                            bg: '#f8fafc',
                            card: '#ffffff'
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f5f9;
        }
        /* Custom scrollbars */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        .orange-glow {
            box-shadow: 0 0 15px rgba(249, 115, 22, 0.15);
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen bg-[#070d1e] flex flex-col">

    <!-- SPLASH AUTH SCREEN WRAPPER -->
    <div id="authSplashWrapper" class="hidden min-h-screen w-full flex items-center justify-center p-4 bg-[#070d1e] relative overflow-hidden">
        <!-- Glowing Warm Circles -->
        <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-orange-600/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute -bottom-40 -right-40 w-[500px] h-[500px] bg-amber-500/10 rounded-full blur-[120px] pointer-events-none"></div>
        <!-- Decorative subtle grid -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-[0.15] pointer-events-none"></div>
        
        <!-- ----------------- SECTION: LOGIN SCREEN ----------------- -->
        <div id="page-login" class="page-view hidden w-full max-w-md bg-[#0c1938]/85 backdrop-blur-md border border-slate-700/60 p-8 rounded-2xl shadow-2xl z-10 transition-all duration-300">
            <div class="flex items-center gap-2.5 justify-center mb-6">
                <div class="w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center font-bold text-lg text-white shadow-md">
                    <i class="fa-solid fa-store"></i>
                </div>
                <div class="text-left">
                    <span class="font-extrabold text-base tracking-tight uppercase block leading-none text-white">KARYANUSANTARA</span>
                    <span class="text-[9px] text-orange-400 font-semibold tracking-wider uppercase">UMKM E-Commerce</span>
                </div>
            </div>
            
            <div class="text-left mb-6">
                <h3 class="font-extrabold text-base uppercase tracking-tight text-white mb-1">Masuk ke Akun</h3>
                <p class="text-[11px] text-slate-400">Silakan masuk menggunakan akun Anda untuk mengelola transaksi atau berbelanja produk lokal.</p>
            </div>

            <form onsubmit="handleLoginSubmit(event)" class="space-y-4">
                <div>
                    <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Email Kredensial</label>
                    <input type="email" id="loginEmailInput" required placeholder="Masukkan alamat email Anda" class="w-full bg-[#16284f] text-slate-100 border border-slate-700 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all placeholder-slate-400">
                </div>
                <div>
                    <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Password</label>
                    <input type="password" id="loginPasswordInput" required placeholder="Masukkan kata sandi" class="w-full bg-[#16284f] text-slate-100 border border-slate-700 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all placeholder-slate-400">
                </div>
                <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs py-3 rounded-xl shadow-lg shadow-orange-500/20 hover:shadow-orange-500/40 transition-all duration-300">
                    Masuk Sekarang
                </button>
            </form>

            <div class="mt-6 pt-5 border-t border-slate-700/60 text-center">
                <p class="text-xs text-slate-400">Belum memiliki akun? <a href="#" onclick="navigateTo('register')" class="text-orange-400 font-bold hover:underline">Daftar sekarang</a></p>
            </div>
        </div>

        <!-- ----------------- SECTION: REGISTER SCREEN ----------------- -->
        <div id="page-register" class="page-view hidden w-full max-w-md bg-[#0c1938]/85 backdrop-blur-md border border-slate-700/60 p-8 rounded-2xl shadow-2xl z-10 transition-all duration-300">
            <div class="flex items-center gap-2.5 justify-center mb-6">
                <div class="w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center font-bold text-lg text-white shadow-md">
                    <i class="fa-solid fa-store"></i>
                </div>
                <div class="text-left">
                    <span class="font-extrabold text-base tracking-tight uppercase block leading-none text-white">KARYANUSANTARA</span>
                    <span class="text-[9px] text-orange-400 font-semibold tracking-wider uppercase">UMKM E-Commerce</span>
                </div>
            </div>
            
            <div class="text-left mb-6">
                <h3 class="font-extrabold text-base uppercase tracking-tight text-white mb-1">Daftar Akun Baru</h3>
                <p class="text-[11px] text-slate-400">Registrasi akun gratis untuk mulai mengelola atau memesan kerajinan nusantara.</p>
            </div>

            <form onsubmit="handleRegisterSubmit(event)" class="space-y-3.5">
                <div>
                    <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nama Lengkap</label>
                    <input type="text" id="regNameInput" required placeholder="Contoh: Susi Susanti" class="w-full bg-[#16284f] text-slate-100 border border-slate-700 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all placeholder-slate-400">
                </div>
                <div>
                    <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Alamat Email</label>
                    <input type="email" id="regEmailInput" required placeholder="Contoh: susi@email.com" class="w-full bg-[#16284f] text-slate-100 border border-slate-700 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all placeholder-slate-400">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Daftar Sebagai</label>
                        <select id="regRoleInput" class="w-full bg-[#16284f] text-slate-100 border border-slate-700 rounded-xl px-3 py-3 text-[11px] focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
                            <option value="customer" class="bg-[#0c1938]">Customer / Pembeli</option>
                            <option value="manager" class="bg-[#0c1938]">Manager Toko</option>
                            <option value="admin" class="bg-[#0c1938]">Admin Toko</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nomor Telepon</label>
                        <input type="text" id="regPhoneInput" placeholder="Contoh: 08123456789" class="w-full bg-[#16284f] text-slate-100 border border-slate-700 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all placeholder-slate-400">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Password</label>
                        <input type="password" id="regPasswordInput" required placeholder="Min. 6 karakter" class="w-full bg-[#16284f] text-slate-100 border border-slate-700 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all placeholder-slate-400">
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Konfirmasi</label>
                        <input type="password" id="regPasswordConfirmInput" required placeholder="Ulangi password" class="w-full bg-[#16284f] text-slate-100 border border-slate-700 rounded-xl px-4 py-3 text-xs focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all placeholder-slate-400">
                    </div>
                </div>
                <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs py-3 rounded-xl shadow-lg shadow-orange-500/20 hover:shadow-orange-500/40 transition-all duration-300 mt-2">
                    Daftar Sekarang
                </button>
            </form>

            <div class="mt-6 pt-5 border-t border-slate-700/60 text-center">
                <p class="text-xs text-slate-400">Sudah memiliki akun? <a href="#" onclick="navigateTo('login')" class="text-orange-400 font-bold hover:underline">Masuk sekarang</a></p>
            </div>
        </div>
    </div>

    <!-- MAIN APP LAYOUT (HEADER, NAV, CATALOG, FOOTER) -->
    <div id="appLayout" class="hidden flex-col min-h-screen bg-[#f1f5f9]">

        <!-- ----------------- HEADER & BRANDING (WARKOM STYLE) ----------------- -->
        <header class="bg-[#0c1938] text-white sticky top-0 z-40 shadow-md">
        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between gap-4">
            
            <!-- Logo & Brand (Poppins Bold Uppercase - Warkom Style) -->
            <a href="#" onclick="navigateTo('home')" class="flex items-center gap-2.5 shrink-0 group">
                <div class="w-10 h-10 rounded-lg bg-orange-500 flex items-center justify-center font-bold text-lg text-white shadow-md transition-all group-hover:scale-105 group-hover:rotate-3">
                    <i class="fa-solid fa-store"></i>
                </div>
                <div>
                    <span class="font-extrabold text-lg tracking-tight uppercase block leading-none text-white">KARYANUSANTARA</span>
                    <span class="text-[9.5px] text-orange-400 font-semibold tracking-wider uppercase">UMKM E-Commerce</span>
                </div>
            </a>

            <!-- Central Pill Search Bar (Warkom Style) -->
            <div class="hidden md:flex flex-1 max-w-lg relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </span>
                <input 
                    type="text" 
                    id="globalSearchInput"
                    placeholder="Cari produk UMKM di sini..." 
                    class="w-full bg-[#16284f] text-slate-200 placeholder-slate-400 text-xs rounded-full pl-10 pr-4 py-2 border border-slate-700/60 focus:outline-none focus:border-orange-500 focus:bg-[#1b2f5c] transition"
                    oninput="handleSearch(this.value)"
                >
            </div>

            <!-- Header Actions: Cart & Auth Buttons -->
            <div class="flex items-center gap-4 shrink-0">
                
                <!-- Dynamic Cart Icon (Warkom Style) -->
                <button onclick="toggleCartDrawer()" class="relative p-2.5 hover:bg-slate-800/50 rounded-full transition" title="Buka Keranjang">
                    <i class="fa-solid fa-cart-shopping text-sm text-slate-200"></i>
                    <span id="cartBadgeCount" class="absolute top-0.5 right-0.5 w-4 h-4 bg-orange-500 text-[9px] font-bold text-white rounded-full flex items-center justify-center">0</span>
                </button>

                <!-- Auth Buttons (Login / Register / Profile) -->
                <div class="flex items-center gap-2" id="headerAuthArea">
                    <!-- Loaded dynamically via JS -->
                </div>
            </div>

        </div>
    </header>

    <!-- ----------------- DYNAMIC NAVBAR SUBBAR (Warkom Routing) ----------------- -->
    <nav class="bg-white border-b border-slate-200 sticky top-16 z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between">
            <div class="flex overflow-x-auto" id="mainNavigationLinks">
                <!-- Nav items populated dynamically -->
            </div>
            
            <!-- Quick Database Connection Badge -->
            <div class="flex items-center gap-2 text-slate-500 text-[11px] font-semibold pr-2">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Server Status: Online</span>
            </div>
        </div>
    </nav>

    <!-- ----------------- MAIN LAYOUT ----------------- -->
    <main class="flex-grow max-w-7xl w-full mx-auto p-4 flex flex-col gap-6">

        <!-- ----------------- SECTION: HOME (STOREFRONT & CATALOG) ----------------- -->
        <div id="page-home" class="page-view flex flex-col gap-6">
            
            <!-- HERO BANNER CAROUSEL (WARKOM STYLE) -->
            <div class="relative w-full h-[260px] bg-slate-950 rounded-2xl overflow-hidden shadow-lg orange-glow">
                
                <!-- Slide 1: Welcome -->
                <div class="home-slide absolute inset-0 opacity-100 transition-all duration-1000 flex items-center">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1588854337236-6889d631faa8?auto=format&fit=crop&w=1200&q=80'); opacity: 0.2;"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/80 to-transparent"></div>
                    <div class="relative z-10 px-8 sm:px-12 max-w-xl">
                        <span class="bg-orange-500/20 text-orange-400 text-[10px] font-bold tracking-widest uppercase px-3 py-1 rounded-full border border-orange-500/30">Produk Pilihan Lokal</span>
                        <h1 class="text-2xl sm:text-4xl font-extrabold text-white mt-3 leading-tight uppercase">Batik & Kriya Nusantara</h1>
                        <p class="text-xs text-slate-300 mt-2.5">Temukan produk kerajinan tangan, tenun, dan batik premium buatan seniman lokal Indonesia dengan harga terbaik.</p>
                        <button onclick="scrollToCatalog()" class="mt-5 bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-5 py-2.5 rounded-lg shadow-lg hover:shadow-orange-500/25 transition">
                            Belanja Sekarang <i class="fa-solid fa-chevron-right ml-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Slide 2: Spices & Coffee -->
                <div class="home-slide absolute inset-0 opacity-0 transition-all duration-1000 flex items-center">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1600132806370-bf17e65e942f?auto=format&fit=crop&w=1200&q=80'); opacity: 0.2;"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/80 to-transparent"></div>
                    <div class="relative z-10 px-8 sm:px-12 max-w-xl">
                        <span class="bg-amber-500/20 text-amber-400 text-[10px] font-bold tracking-widest uppercase px-3 py-1 rounded-full border border-amber-500/30">Kuliner & Herbal</span>
                        <h1 class="text-2xl sm:text-4xl font-extrabold text-white mt-3 leading-tight uppercase">Kopi & Rempah Asli</h1>
                        <p class="text-xs text-slate-300 mt-2.5">Koleksi kopi robusta Toraja, rendang olahan, sambal tradisional, dan jahe merah bubuk organik khas Indonesia.</p>
                        <button onclick="scrollToCatalog()" class="mt-5 bg-amber-500 hover:bg-amber-600 text-white font-semibold text-xs px-5 py-2.5 rounded-lg shadow-lg hover:shadow-amber-500/25 transition">
                            Lihat Produk <i class="fa-solid fa-chevron-right ml-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Controls -->
                <div class="absolute bottom-4 right-8 z-20 flex gap-2">
                    <button onclick="prevHomeSlide()" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-slate-700 text-white flex items-center justify-center transition border border-slate-700/50"><i class="fa-solid fa-chevron-left text-xs"></i></button>
                    <button onclick="nextHomeSlide()" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-slate-700 text-white flex items-center justify-center transition border border-slate-700/50"><i class="fa-solid fa-chevron-right text-xs"></i></button>
                </div>
            </div>

            <!-- TWO COLUMN STOREFRONT: CATEGORIES SIDEBAR + PRODUCTS GRID -->
            <div id="catalog-section" class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                
                <!-- SIDEBAR CATEGORIES (Warkom Style) -->
                <div class="lg:col-span-1 space-y-4">
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4">
                        <h2 class="font-bold text-xs text-slate-800 uppercase tracking-tight mb-3 border-b border-slate-100 pb-2">Kategori Produk</h2>
                        <div class="flex flex-col gap-1" id="categoryFilterSidebar">
                            <!-- Populated via JS -->
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4">
                        <h2 class="font-bold text-xs text-slate-800 uppercase tracking-tight mb-3 border-b border-slate-100 pb-2">Filter Berdasarkan Tag</h2>
                        <div class="flex flex-wrap gap-1.5" id="tagFilterSidebar">
                            <!-- Populated via JS -->
                        </div>
                    </div>
                </div>

                <!-- PRODUCTS GRID -->
                <div class="lg:col-span-3 space-y-4">
                    <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3">
                        <span class="text-xs font-semibold text-slate-600" id="productCountText">Menampilkan semua produk</span>
                        <div class="flex items-center gap-2">
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Urutkan</label>
                            <select id="sortByPrice" class="border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs bg-white focus:outline-none focus:border-orange-500" onchange="renderProducts()">
                                <option value="default">Relevansi</option>
                                <option value="low">Harga Terendah</option>
                                <option value="high">Harga Tertinggi</option>
                            </select>
                        </div>
                    </div>

                    <!-- Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6" id="productsCatalogGrid">
                        <!-- Populated via JS -->
                    </div>
                </div>
            </div>

        </div>



        <!-- ----------------- SECTION: USER/ADMIN DASHBOARD ----------------- -->
        <div id="page-dashboard" class="page-view hidden flex flex-col gap-6">
            
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="font-extrabold text-base text-slate-800 uppercase tracking-tight">Dashboard Kontrol Akun</h3>
                    <p class="text-xs text-slate-500 mt-1">Masuk sebagai: <span id="dashUserEmail" class="font-semibold text-slate-700">email@toko.com</span> (<span id="dashUserRole" class="font-bold text-orange-500 uppercase">Admin</span>)</p>
                </div>
                <div class="flex items-center gap-3">
                    <button onclick="navigateTo('home')" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs px-4 py-2.5 rounded-lg border border-slate-200 transition">
                        <i class="fa-solid fa-store mr-1"></i> Buka Katalog Belanja
                    </button>
                </div>
            </div>

            <!-- METRIC CARDS -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Total Transaksi</span>
                        <p class="text-2xl font-black text-slate-800 mt-1" id="dashTotalOrdersCount">0</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center text-orange-500 text-lg shadow-inner"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                </div>
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider" id="dashTotalIncomeLabel">Total Pembelian</span>
                        <p class="text-2xl font-black text-slate-800 mt-1" id="dashTotalIncomePrice">Rp0</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-500 text-lg shadow-inner"><i class="fa-solid fa-wallet"></i></div>
                </div>
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Role Otorisasi</span>
                        <p class="text-xs font-bold text-slate-800 mt-2" id="dashAuthorizationBadge">Akses: Terbatas</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-500 text-lg shadow-inner"><i class="fa-solid fa-shield-halved"></i></div>
                </div>
            </div>

            <!-- TABLE OF ORDERS IN DASHBOARD (CRUD - Tahap 2.a) -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex flex-col gap-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-3 gap-2">
                    <h3 class="font-bold text-xs text-slate-800 uppercase tracking-tight flex items-center gap-1.5">
                        <i class="fa-solid fa-list-check text-orange-500"></i> Kelola Modul Pemesanan (Order)
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="navigateTo('order-new')" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-[11px] px-3.5 py-1.5 rounded-lg shadow transition flex items-center gap-1">
                            <i class="fa-solid fa-plus"></i> Buat Order Baru
                        </button>
                    </div>
                </div>

                <!-- Search & Filters -->
                <div class="flex flex-col sm:flex-row gap-3 bg-slate-50 p-3 rounded-lg border border-slate-200">
                    <div class="flex-1 relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400"><i class="fa-solid fa-magnifying-glass text-xs"></i></span>
                        <input type="text" id="dashboardSearchOrderInput" placeholder="Cari Kode Order..." class="w-full bg-white text-xs border border-slate-200 rounded-lg pl-8 pr-4 py-2 focus:outline-none focus:border-orange-500" oninput="loadDashboardOrders()">
                    </div>
                    <select id="dashboardFilterStatus" class="border border-slate-200 rounded-lg px-3 py-2 text-xs bg-white focus:outline-none focus:border-orange-500" onchange="loadDashboardOrders()">
                        <option value="all">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto border border-slate-150 rounded-lg">
                    <table class="w-full text-xs text-left text-slate-700" id="dashboardOrdersTable">
                        <thead class="bg-slate-50 text-[10px] font-bold text-slate-500 uppercase border-b border-slate-150">
                            <tr>
                                <th class="px-4 py-3">Kode Order</th>
                                <th class="px-4 py-3">Waktu Order</th>
                                <th class="px-4 py-3">Alamat Kirim</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Total Belanja</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Populated via JS -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TABLE OF PRODUCTS IN DASHBOARD (CRUD for Admin) -->
            <div id="dashboardProductsCard" class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex flex-col gap-4 hidden">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-3 gap-2">
                    <h3 class="font-bold text-xs text-slate-800 uppercase tracking-tight flex items-center gap-1.5">
                        <i class="fa-solid fa-gifts text-orange-500"></i> Kelola Modul Produk (Product)
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="navigateTo('product-new')" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-[11px] px-3.5 py-1.5 rounded-lg shadow transition flex items-center gap-1">
                            <i class="fa-solid fa-plus"></i> Tambah Produk Baru
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto border border-slate-150 rounded-lg">
                    <table class="w-full text-xs text-left text-slate-700" id="dashboardProductsTable">
                        <thead class="bg-slate-50 text-[10px] font-bold text-slate-500 uppercase border-b border-slate-150">
                            <tr>
                                <th class="px-4 py-3">Nama Produk</th>
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3">Harga</th>
                                <th class="px-4 py-3">Stok</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Populated via JS -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- ----------------- SECTION: ORDER DETAILS VIEW (Tahap 2.b) ----------------- -->
        <div id="page-order-detail" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('dashboard')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Detail Lengkap Data Pemesanan</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-6 rounded-xl border border-slate-150" id="orderDetailContent">
                    <!-- Populated dynamically via JS -->
                </div>
            </div>
        </div>

        <!-- ----------------- SECTION: CREATE ORDER FORM (Tahap 2.c) ----------------- -->
        <div id="page-order-new" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('dashboard')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Buat Data Order Baru</h3>
                </div>

                <form onsubmit="handleCreateOrderSubmit(event)" class="max-w-xl space-y-4">
                    <!-- User dropdown selection (only visible if admin/manager - Tahap 2.g) -->
                    <div id="orderFormUserSelectContainer" class="hidden">
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Pilih User Pembuat (Admin/Manager Only)</label>
                        <select id="orderFormUserId" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                            <!-- Populated with users list -->
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Pilih Produk</label>
                            <select id="orderFormProductId" required class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                                <!-- Populated with products list -->
                            </select>
                        </div>
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Jumlah</label>
                            <input type="number" id="orderFormQuantity" required min="1" value="1" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Alamat Pengiriman Lengkap</label>
                        <textarea id="orderFormAddress" rows="3" required placeholder="Jl. Raya Kemerdekaan No. 12, Surabaya" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white"></textarea>
                    </div>
                    
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Catatan Tambahan</label>
                        <input type="text" id="orderFormNotes" placeholder="Harap bungkus plastik tebal / titipkan satpam" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                            Simpan Order
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ----------------- SECTION: EDIT ORDER / UPDATE STATUS (Tahap 2.d) ----------------- -->
        <div id="page-order-edit" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('dashboard')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Ubah Status Alur Transaksi</h3>
                </div>

                <form onsubmit="handleEditOrderStatusSubmit(event)" class="max-w-md space-y-4">
                    <input type="hidden" id="editOrderStatusOrderId">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Kode Order</label>
                        <input type="text" id="editOrderStatusOrderCode" readonly class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs bg-slate-100 text-slate-500">
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Status Order Saat Ini</label>
                        <select id="editOrderStatusSelect" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing (Diproses)</option>
                            <option value="shipped">Shipped (Dikirim)</option>
                            <option value="delivered">Delivered (Selesai)</option>
                            <option value="cancelled">Cancelled (Batal)</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                        Simpan Perubahan Status
                    </button>
                </form>
            </div>
        </div>

        <!-- ----------------- SECTION: CREATE PRODUCT FORM (Admin Only) ----------------- -->
        <div id="page-product-new" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('dashboard')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Tambah Produk Baru</h3>
                </div>

                <form onsubmit="handleCreateProductSubmit(event)" class="max-w-xl space-y-4">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nama Produk</label>
                        <input type="text" id="productFormName" required placeholder="Contoh: Kopi Gayo Premium" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Kategori</label>
                        <select id="productFormCategoryId" required class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                            <!-- Populated with categories list -->
                        </select>
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Deskripsi Produk</label>
                        <textarea id="productFormDescription" rows="3" placeholder="Tuliskan deskripsi produk yang menarik..." class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Harga Produk (Rp)</label>
                            <input type="number" id="productFormPrice" required min="0" placeholder="15000" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Stok Awal</label>
                            <input type="number" id="productFormStock" required min="0" placeholder="50" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Status Keaktifan</label>
                        <select id="productFormStatus" required class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                            <option value="active">Active (Tampil di Toko)</option>
                            <option value="inactive">Inactive (Disembunyikan)</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1.5">Pilih Tag / Label Produk</label>
                        <div id="productFormTagsContainer" class="flex flex-wrap gap-2.5 bg-slate-50 p-3 rounded-lg border border-slate-200">
                            <!-- Populated via JS -->
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                            Simpan Produk Baru
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ----------------- SECTION: EDIT PRODUCT FORM (Admin Only) ----------------- -->
        <div id="page-product-edit" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('dashboard')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Ubah Data Produk</h3>
                </div>

                <form onsubmit="handleEditProductSubmit(event)" class="max-w-xl space-y-4">
                    <input type="hidden" id="editProductFormId">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nama Produk</label>
                        <input type="text" id="editProductFormName" required placeholder="Contoh: Kopi Gayo Premium" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Kategori</label>
                        <select id="editProductFormCategoryId" required class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                            <!-- Populated with categories list -->
                        </select>
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Deskripsi Produk</label>
                        <textarea id="editProductFormDescription" rows="3" placeholder="Tuliskan deskripsi produk..." class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Harga Produk (Rp)</label>
                            <input type="number" id="editProductFormPrice" required min="0" placeholder="15000" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Stok</label>
                            <input type="number" id="editProductFormStock" required min="0" placeholder="50" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Status Keaktifan</label>
                        <select id="editProductFormStatus" required class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                            <option value="active">Active (Tampil di Toko)</option>
                            <option value="inactive">Inactive (Disembunyikan)</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1.5">Pilih Tag / Label Produk</label>
                        <div id="editProductFormTagsContainer" class="flex flex-wrap gap-2.5 bg-slate-50 p-3 rounded-lg border border-slate-200">
                            <!-- Populated via JS -->
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <button type="submit" class="bg-[#0c1938] hover:bg-[#16284f] text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                            Simpan Perubahan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ----------------- SECTION: USER PROFILE (Logged-in User Profile) ----------------- -->
        <div id="page-profile" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col md:flex-row gap-6">
                <div class="md:w-1/3 flex flex-col items-center justify-center p-6 bg-slate-50 border border-slate-200 rounded-2xl">
                    <div class="w-24 h-24 rounded-full bg-[#0c1938] text-white flex items-center justify-center text-4xl font-bold shadow-md relative">
                        <i class="fa-solid fa-user"></i>
                        <span id="profileAvatarBadge" class="absolute bottom-0 right-0 w-6 h-6 rounded-full bg-orange-500 border-2 border-white flex items-center justify-center text-[10px]"><i class="fa-solid fa-shield"></i></span>
                    </div>
                    <h3 id="profileName" class="font-extrabold text-base text-slate-800 uppercase mt-4 text-center">Nama Pengguna</h3>
                    <span id="profileRoleBadge" class="text-[9px] bg-orange-500 text-white font-bold px-3 py-1 rounded-full uppercase tracking-wider mt-2">CUSTOMER</span>
                    <p class="text-[10px] text-slate-400 font-semibold mt-1">Status Keanggotaan: Aktif</p>
                </div>
                
                <div class="md:w-2/3 space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <h4 class="font-bold text-xs text-slate-800 uppercase tracking-tight flex items-center gap-1.5">
                            <i class="fa-solid fa-address-card text-orange-500"></i> Detail Informasi Profil
                        </h4>
                        <button onclick="editMyProfile()" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-[11px] px-3.5 py-1.5 rounded-lg shadow transition flex items-center gap-1">
                            <i class="fa-solid fa-user-pen"></i> Lengkapi / Edit Profil
                        </button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <span class="text-[9px] uppercase font-bold text-slate-400 block">Email Pengguna</span>
                            <p id="profileEmail" class="text-xs text-slate-700 font-medium">email@website.com</p>
                        </div>
                        <div>
                            <span class="text-[9px] uppercase font-bold text-slate-400 block">Nomor Telepon</span>
                            <p id="profilePhone" class="text-xs text-slate-700 font-medium">081234567890</p>
                        </div>
                        <div>
                            <span class="text-[9px] uppercase font-bold text-slate-400 block">Jenis Kelamin</span>
                            <p id="profileGender" class="text-xs text-slate-700 font-medium">-</p>
                        </div>
                        <div>
                            <span class="text-[9px] uppercase font-bold text-slate-400 block">Tanggal Lahir</span>
                            <p id="profileBirthDate" class="text-xs text-slate-700 font-medium">-</p>
                        </div>
                        <div class="sm:col-span-2">
                            <span class="text-[9px] uppercase font-bold text-slate-400 block">Alamat Rumah</span>
                            <p id="profileAddress" class="text-xs text-slate-700 font-medium">-</p>
                        </div>
                        <div>
                            <span class="text-[9px] uppercase font-bold text-slate-400 block">Kota</span>
                            <p id="profileCity" class="text-xs text-slate-700 font-medium">-</p>
                        </div>
                        <div>
                            <span class="text-[9px] uppercase font-bold text-slate-400 block">Provinsi / Kode Pos</span>
                            <p id="profileProvincePostal" class="text-xs text-slate-700 font-medium">-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ----------------- SECTION: EDIT USER PROFILE FORM ----------------- -->
        <div id="page-profile-edit" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('profile')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Lengkapi / Ubah Profil Saya</h3>
                </div>

                <form onsubmit="handleEditProfileSubmit(event)" class="max-w-xl space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Tanggal Lahir</label>
                            <input type="date" id="profileFormBirthDate" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Jenis Kelamin</label>
                            <select id="profileFormGender" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                                <option value="male">Laki-Laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Alamat Rumah Lengkap</label>
                        <textarea id="profileFormAddress" rows="2" placeholder="Jl. Diponegoro No.17" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white"></textarea>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div class="col-span-1">
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Kota</label>
                            <input type="text" id="profileFormCity" placeholder="Malang" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                        <div class="col-span-1">
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Provinsi</label>
                            <input type="text" id="profileFormProvince" placeholder="Jawa Timur" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                        <div class="col-span-1">
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Kode Pos</label>
                            <input type="text" id="profileFormPostalCode" placeholder="65145" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                            Simpan Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ----------------- SECTION: USER MANAGEMENT (ADMIN ONLY) ----------------- -->
        <div id="page-users-list" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex flex-col gap-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-3 gap-2">
                    <h3 class="font-bold text-xs text-slate-800 uppercase tracking-tight flex items-center gap-1.5">
                        <i class="fa-solid fa-users text-orange-500"></i> Kelola Pengguna (User Management)
                    </h3>
                    <button onclick="navigateTo('user-new')" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-[11px] px-3.5 py-1.5 rounded-lg shadow transition flex items-center gap-1">
                        <i class="fa-solid fa-user-plus"></i> Tambah User Baru
                    </button>
                </div>

                <div class="overflow-x-auto border border-slate-150 rounded-lg">
                    <table class="w-full text-xs text-left text-slate-700" id="dashboardUsersTable">
                        <thead class="bg-slate-50 text-[10px] font-bold text-slate-500 uppercase border-b border-slate-150">
                            <tr>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Role</th>
                                <th class="px-4 py-3">Telepon</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Populated via JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ----------------- SECTION: CREATE USER FORM (ADMIN ONLY) ----------------- -->
        <div id="page-user-new" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('users-list')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Tambah User Baru</h3>
                </div>

                <form onsubmit="handleCreateUserSubmit(event)" class="max-w-xl space-y-4">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nama Lengkap</label>
                        <input type="text" id="userFormName" required placeholder="Andi Saputra" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Alamat Email</label>
                        <input type="email" id="userFormEmail" required placeholder="andi@email.com" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Password</label>
                            <input type="password" id="userFormPassword" required placeholder="Min. 6 karakter" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Pilih Role</label>
                            <select id="userFormRole" required class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                                <option value="customer">Customer</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nomor Telepon</label>
                        <input type="text" id="userFormPhone" placeholder="081234567890" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                            Simpan Pengguna Baru
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ----------------- SECTION: EDIT USER FORM (ADMIN ONLY) ----------------- -->
        <div id="page-user-edit" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('users-list')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Ubah Data Pengguna</h3>
                </div>

                <form onsubmit="handleEditUserSubmit(event)" class="max-w-xl space-y-4">
                    <input type="hidden" id="editUserFormId">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nama Lengkap</label>
                        <input type="text" id="editUserFormName" required placeholder="Andi Saputra" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Alamat Email</label>
                        <input type="email" id="editUserFormEmail" required placeholder="andi@email.com" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Password Baru (Opsional)</label>
                            <input type="password" id="editUserFormPassword" placeholder="Kosongkan jika tidak diubah" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                        </div>
                        <div>
                            <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Pilih Role</label>
                            <select id="editUserFormRole" required class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                                <option value="customer">Customer</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nomor Telepon</label>
                        <input type="text" id="editUserFormPhone" placeholder="081234567890" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                            Simpan Perubahan Pengguna
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ----------------- SECTION: USER DETAIL VIEW (ADMIN ONLY) ----------------- -->
        <div id="page-user-detail" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('users-list')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Detail Lengkap Data Pengguna</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-6 rounded-xl border border-slate-150" id="userDetailContent">
                    <!-- Populated dynamically via JS -->
                </div>
            </div>
        </div>

        <!-- ----------------- SECTION: CATEGORIES MANAGEMENT (ADMIN ONLY) ----------------- -->
        <div id="page-categories-list" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex flex-col gap-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-3 gap-2">
                    <h3 class="font-bold text-xs text-slate-800 uppercase tracking-tight flex items-center gap-1.5">
                        <i class="fa-solid fa-tags text-orange-500"></i> Kelola Kategori (Categories Management)
                    </h3>
                    <button onclick="navigateTo('category-new')" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-[11px] px-3.5 py-1.5 rounded-lg shadow transition flex items-center gap-1">
                        <i class="fa-solid fa-plus"></i> Tambah Kategori
                    </button>
                </div>

                <div class="overflow-x-auto border border-slate-150 rounded-lg">
                    <table class="w-full text-xs text-left text-slate-700" id="dashboardCategoriesTable">
                        <thead class="bg-slate-50 text-[10px] font-bold text-slate-500 uppercase border-b border-slate-150">
                            <tr>
                                <th class="px-4 py-3">Nama Kategori</th>
                                <th class="px-4 py-3">Slug</th>
                                <th class="px-4 py-3">Deskripsi</th>
                                <th class="px-4 py-3">Jumlah Produk</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Populated via JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ----------------- SECTION: CREATE CATEGORY FORM (ADMIN ONLY) ----------------- -->
        <div id="page-category-new" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('categories-list')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Tambah Kategori Baru</h3>
                </div>

                <form onsubmit="handleCreateCategorySubmit(event)" class="max-w-xl space-y-4">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nama Kategori</label>
                        <input type="text" id="categoryFormName" required placeholder="Contoh: Kerajinan Kayu" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Deskripsi</label>
                        <textarea id="categoryFormDescription" rows="3" placeholder="Deskripsikan kategori ini..." class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white"></textarea>
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Status</label>
                        <select id="categoryFormStatus" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                            Simpan Kategori Baru
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ----------------- SECTION: EDIT CATEGORY FORM (ADMIN ONLY) ----------------- -->
        <div id="page-category-edit" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('categories-list')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Ubah Data Kategori</h3>
                </div>

                <form onsubmit="handleEditCategorySubmit(event)" class="max-w-xl space-y-4">
                    <input type="hidden" id="editCategoryFormId">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nama Kategori</label>
                        <input type="text" id="editCategoryFormName" required placeholder="Contoh: Kerajinan Kayu" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Deskripsi</label>
                        <textarea id="editCategoryFormDescription" rows="3" placeholder="Deskripsikan kategori..." class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white"></textarea>
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Status</label>
                        <select id="editCategoryFormStatus" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                            Simpan Perubahan Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ----------------- SECTION: TAGS MANAGEMENT (ADMIN ONLY) ----------------- -->
        <div id="page-tags-list" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex flex-col gap-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-3 gap-2">
                    <h3 class="font-bold text-xs text-slate-800 uppercase tracking-tight flex items-center gap-1.5">
                        <i class="fa-solid fa-hashtag text-orange-500"></i> Kelola Tag (Tags Management)
                    </h3>
                    <button onclick="navigateTo('tag-new')" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-[11px] px-3.5 py-1.5 rounded-lg shadow transition flex items-center gap-1">
                        <i class="fa-solid fa-plus"></i> Tambah Tag
                    </button>
                </div>

                <div class="overflow-x-auto border border-slate-150 rounded-lg max-w-lg">
                    <table class="w-full text-xs text-left text-slate-700" id="dashboardTagsTable">
                        <thead class="bg-slate-50 text-[10px] font-bold text-slate-500 uppercase border-b border-slate-150">
                            <tr>
                                <th class="px-4 py-3">Nama Tag</th>
                                <th class="px-4 py-3">Slug</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Populated via JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ----------------- SECTION: CREATE TAG FORM (ADMIN ONLY) ----------------- -->
        <div id="page-tag-new" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('tags-list')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Tambah Tag Baru</h3>
                </div>

                <form onsubmit="handleCreateTagSubmit(event)" class="max-w-md space-y-4">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nama Tag</label>
                        <input type="text" id="tagFormName" required placeholder="Contoh: Terlaris" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                            Simpan Tag Baru
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ----------------- SECTION: EDIT TAG FORM (ADMIN ONLY) ----------------- -->
        <div id="page-tag-edit" class="page-view hidden flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-5">
                    <button onclick="navigateTo('tags-list')" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-500 transition"><i class="fa-solid fa-arrow-left"></i></button>
                    <h3 class="font-extrabold text-sm uppercase tracking-tight text-slate-700">Ubah Data Tag</h3>
                </div>

                <form onsubmit="handleEditTagSubmit(event)" class="max-w-md space-y-4">
                    <input type="hidden" id="editTagFormId">
                    <div>
                        <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Nama Tag</label>
                        <input type="text" id="editTagFormName" required placeholder="Contoh: Terlaris" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs px-6 py-2.5 rounded-lg shadow transition">
                            Simpan Perubahan Tag
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <!-- ----------------- CART SLIDE-IN DRAWER (WARKOM STYLE) ----------------- -->
    <div id="cartDrawerBackdrop" onclick="toggleCartDrawer()" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden transition-all duration-300"></div>
    <div id="cartDrawer" class="fixed top-0 right-0 h-full w-full max-w-md bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
        <!-- Drawer Header -->
        <div class="bg-[#0c1938] text-white p-4 flex items-center justify-between">
            <span class="font-bold text-sm uppercase tracking-wider"><i class="fa-solid fa-cart-shopping text-orange-500 mr-2"></i> Keranjang Belanja</span>
            <button onclick="toggleCartDrawer()" class="w-8 h-8 rounded-full hover:bg-slate-800 text-white flex items-center justify-center transition"><i class="fa-solid fa-xmark"></i></button>
        </div>
        
        <!-- Drawer Body -->
        <div class="flex-grow p-4 overflow-y-auto space-y-4" id="cartDrawerItems">
            <!-- Populated via JS -->
        </div>

        <!-- Drawer Footer -->
        <div class="p-4 border-t border-slate-200 bg-slate-50 space-y-4">
            <div class="flex items-center justify-between text-slate-800">
                <span class="text-xs font-semibold">Total Pembayaran</span>
                <span class="font-bold text-base text-orange-600 animate-pulse" id="cartTotalSumText">Rp0</span>
            </div>
            
            <div id="checkoutFormArea" class="hidden space-y-3 pt-3 border-t border-slate-200">
                <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block">Alamat Pengiriman Lengkap</label>
                <textarea id="checkoutAddressInput" rows="2" placeholder="Tulis alamat pengiriman..." class="w-full border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-orange-500 bg-white"></textarea>
                <label class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block">Catatan Pesanan (Opsional)</label>
                <input type="text" id="checkoutNotesInput" placeholder="Packing rapi..." class="w-full border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-orange-500 bg-white">
            </div>

            <button onclick="handleCheckoutClick()" id="checkoutButton" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs py-3 rounded-lg shadow transition flex items-center justify-center gap-2">
                Checkout Pesanan <i class="fa-solid fa-credit-card"></i>
            </button>
        </div>
    </div>

    <!-- ----------------- DETAILED PRODUCT MODAL ----------------- -->
    <div id="productDetailModal" onclick="closeProductModal()" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div onclick="event.stopPropagation()" class="bg-white rounded-2xl max-w-lg w-full overflow-hidden shadow-2xl border border-slate-100 flex flex-col">
            <div class="relative h-48 bg-[#0c1938] flex items-center justify-center overflow-hidden">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=800&q=80'); opacity: 0.15;"></div>
                <div class="absolute top-4 right-4 z-10">
                    <button onclick="closeProductModal()" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-slate-700 text-white flex items-center justify-center transition border border-slate-700/50"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="relative text-center p-4 text-white">
                    <span id="modalProductCategory" class="bg-orange-500/20 text-orange-400 text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full border border-orange-500/20">KATEGORI</span>
                    <h3 id="modalProductName" class="text-lg font-extrabold uppercase mt-2">Nama Produk</h3>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider block">Deskripsi Produk</span>
                    <p id="modalProductDesc" class="text-xs text-slate-600 mt-1 leading-relaxed">Penjelasan produk lengkap.</p>
                </div>
                <div id="modalProductTagsContainer" class="hidden">
                    <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider block">Tag / Label</span>
                    <div id="modalProductTags" class="flex flex-wrap gap-1 mt-1"></div>
                </div>
                <div class="grid grid-cols-2 gap-4 border-t border-b border-slate-100 py-3">
                    <div>
                        <span class="text-[9px] uppercase font-bold text-slate-400 block">Harga Satuan</span>
                        <p id="modalProductPrice" class="font-bold text-base text-orange-500 mt-0.5">Rp0</p>
                    </div>
                    <div>
                        <span class="text-[9px] uppercase font-bold text-slate-400 block">Stok Tersedia</span>
                        <p id="modalProductStock" class="text-xs text-slate-700 font-semibold mt-0.5">0 unit</p>
                    </div>
                </div>
                
                <!-- Simulated Buyer Reviews (Warkom style) -->
                <div>
                    <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider block">Ulasan Pelanggan</span>
                    <div class="mt-2 space-y-2 max-h-24 overflow-y-auto pr-1">
                        <div class="bg-slate-50 p-2 rounded border border-slate-100 text-[11px]">
                            <div class="flex items-center justify-between"><span class="font-bold text-slate-700">Rudi Hermawan</span><span class="text-amber-500"><i class="fa-solid fa-star text-[9px]"></i> 5/5</span></div>
                            <p class="text-slate-500 italic mt-0.5">"Barang sangat bagus, packing rapi, dan cepat sampai."</p>
                        </div>
                    </div>
                </div>

                <div class="pt-2 flex gap-2">
                    <button id="modalProductAddBtn" class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs py-2.5 rounded-lg shadow transition flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-cart-plus"></i> Tambah Ke Keranjang
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------- FOOTER ----------------- -->
    <footer class="bg-slate-900 border-t border-slate-800 py-6 text-center text-xs text-slate-500 mt-12 shrink-0">
        <p>&copy; 2026 KaryaNusantara - Universitas Brawijaya. Built for Teknologi Integrasi Sistem B.</p>
    </footer>
    </div> <!-- /#appLayout -->

    <!-- ----------------- JAVASCRIPT APP ENGINE ----------------- -->
    <script>
        // Data queries from PHP
        let categories = {!! json_encode($categories) !!};
        let products = {!! json_encode($products) !!};
        let tagsData = {!! json_encode($tags) !!};
        let usersData = {!! json_encode($users) !!};
        let userProfilesData = {!! json_encode($userProfiles) !!};
        let ordersData = {!! json_encode($orders) !!};

        // ----------------- CLIENT-SIDE STATE MANAGEMENT -----------------
        let currentRoute = 'home';
        let searchQuery = '';
        let activeCategorySlug = 'all';
        let activeTagSlug = 'all';
        let shoppingCart = [];
        
        // Auth state read from localStorage
        let jwtToken = localStorage.getItem('token') || null;
        let loggedInUser = null;
        try {
            loggedInUser = JSON.parse(localStorage.getItem('user')) || null;
        } catch(e) {
            loggedInUser = null;
        }

        // ----------------- HERO BANNER CAROUSEL -----------------
        let currentHomeSlide = 0;
        const homeSlides = document.querySelectorAll('.home-slide');
        function showHomeSlide(idx) {
            homeSlides.forEach((s) => {
                s.classList.remove('opacity-100', 'z-10');
                s.classList.add('opacity-0', 'z-0');
            });
            homeSlides[idx].classList.remove('opacity-0', 'z-0');
            homeSlides[idx].classList.add('opacity-100', 'z-10');
        }
        function nextHomeSlide() {
            currentHomeSlide = (currentHomeSlide + 1) % homeSlides.length;
            showHomeSlide(currentHomeSlide);
        }
        function prevHomeSlide() {
            currentHomeSlide = (currentHomeSlide - 1 + homeSlides.length) % homeSlides.length;
            showHomeSlide(currentHomeSlide);
        }
        setInterval(nextHomeSlide, 6500);

        // ----------------- SPA ROUTING (KaryaNusantara Style Navigation) -----------------
        function navigateTo(route) {
            // Guard clauses based on auth state
            if (!jwtToken) {
                // If not logged in, they can ONLY visit login or register
                if (route !== 'login' && route !== 'register') {
                    showToastNotification('Silakan login terlebih dahulu untuk mengakses sistem.');
                    navigateTo('login');
                    return;
                }
            } else {
                // If logged in, they cannot visit login or register
                if (route === 'login' || route === 'register') {
                    navigateTo('home');
                    return;
                }
            }

            // Role guards for admin & manager pages
            const adminManagerRoutes = ['product-new', 'product-edit'];
            const adminOnlyRoutes = ['users-list', 'user-new', 'user-edit', 'user-detail', 'categories-list', 'category-new', 'category-edit', 'tags-list', 'tag-new', 'tag-edit'];
            
            if (jwtToken && loggedInUser) {
                if (adminOnlyRoutes.includes(route) && loggedInUser.role !== 'admin') {
                    showToastNotification('Akses ditolak: Hanya Admin yang dapat mengakses halaman ini.');
                    navigateTo('dashboard');
                    return;
                }
                if (adminManagerRoutes.includes(route) && loggedInUser.role !== 'admin' && loggedInUser.role !== 'manager') {
                    showToastNotification('Akses ditolak: Hanya Admin dan Manager yang dapat mengakses halaman ini.');
                    navigateTo('dashboard');
                    return;
                }
            }

            currentRoute = route;

            // Toggle layouts based on route
            if (route === 'login' || route === 'register') {
                document.getElementById('authSplashWrapper').classList.remove('hidden');
                document.getElementById('appLayout').classList.add('hidden');
            } else {
                document.getElementById('authSplashWrapper').classList.add('hidden');
                document.getElementById('appLayout').classList.remove('hidden');
            }

            // Hide all pages
            document.querySelectorAll('.page-view').forEach(view => {
                view.classList.add('hidden');
            });

            // Show current route view
            const activePage = document.getElementById(`page-${route}`);
            if (activePage) {
                activePage.classList.remove('hidden');
            }

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Refresh UI components
            renderNavbar();
            renderHeaderAuth();

            if (route === 'dashboard') {
                loadDashboardStats();
                loadDashboardOrders();
                
                const prodCard = document.getElementById('dashboardProductsCard');
                if (loggedInUser && (loggedInUser.role === 'admin' || loggedInUser.role === 'manager')) {
                    prodCard.classList.remove('hidden');
                    loadDashboardProducts();
                } else {
                    prodCard.classList.add('hidden');
                }
            } else if (route === 'profile') {
                loadMyProfile();
            } else if (route === 'users-list') {
                loadUsersList();
            } else if (route === 'categories-list') {
                loadCategoriesList();
            } else if (route === 'tags-list') {
                loadTagsList();
            } else if (route === 'product-new') {
                populateProductCategoriesDropdown('productFormCategoryId');
                populateProductTagsCheckboxes('productFormTagsContainer', []);
            }
        }

        function scrollToCatalog() {
            navigateTo('home');
            setTimeout(() => {
                document.getElementById('catalog-section').scrollIntoView({ behavior: 'smooth' });
            }, 100);
        }

        // Render top header links
        function renderHeaderAuth() {
            const authArea = document.getElementById('headerAuthArea');
            authArea.innerHTML = '';

            if (jwtToken && loggedInUser) {
                authArea.innerHTML = `
                    <div class="flex items-center gap-2">
                        <span class="hidden sm:inline text-xs font-semibold text-slate-200">Hi, ${loggedInUser.name.split(' ')[0]}</span>
                        <span class="text-[9px] bg-orange-500 text-white font-bold px-2 py-0.5 rounded uppercase">${loggedInUser.role}</span>
                        <button onclick="handleLogout()" class="text-xs bg-slate-800 hover:bg-slate-700 px-3 py-1.5 rounded-full border border-slate-700 font-semibold text-orange-400 transition ml-1">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </div>
                `;
            } else {
                authArea.innerHTML = `
                    <button onclick="navigateTo('login')" class="text-xs font-semibold text-slate-300 hover:text-white px-3 py-1.5 transition">Masuk</button>
                    <button onclick="navigateTo('register')" class="text-xs font-semibold bg-orange-500 hover:bg-orange-600 text-white px-4 py-1.5 rounded-full shadow transition">Daftar</button>
                `;
            }
        }

        // Render Navbar Links Dynamically based on role (Tahap 3.c)
        function renderNavbar() {
            const nav = document.getElementById('mainNavigationLinks');
            nav.innerHTML = '';

            const createNavLink = (routeTarget, icon, label) => {
                const isActive = currentRoute === routeTarget;
                const activeClasses = 'border-orange-500 text-orange-600 font-semibold';
                const inactiveClasses = 'border-transparent text-slate-500 hover:text-slate-700';
                
                return `
                    <button onclick="navigateTo('${routeTarget}')" class="px-5 py-3.5 border-b-2 ${isActive ? activeClasses : inactiveClasses} text-xs transition whitespace-nowrap flex items-center gap-2">
                        <i class="${icon}"></i> ${label}
                    </button>
                `;
            };

            // Public links
            nav.innerHTML += createNavLink('home', 'fa-solid fa-store', 'Katalog UMKM');

            // Role-based Nav items (Tahap 3.c)
            if (jwtToken && loggedInUser) {
                nav.innerHTML += createNavLink('dashboard', 'fa-solid fa-table-list', 'Kelola Pesanan');
                nav.innerHTML += createNavLink('profile', 'fa-solid fa-user', 'Profil Saya');
                
                if (loggedInUser.role === 'admin') {
                    nav.innerHTML += createNavLink('users-list', 'fa-solid fa-users', 'Kelola User');
                    nav.innerHTML += createNavLink('categories-list', 'fa-solid fa-tags', 'Kelola Kategori');
                    nav.innerHTML += createNavLink('tags-list', 'fa-solid fa-hashtag', 'Kelola Tag');
                }
            }
        }

        // ----------------- AUTH SUBMISSIONS (REAL BACKEND INTEGRATION - 3.a & 3.b) -----------------
        function autofillLogin(email, password) {
            document.getElementById('loginEmailInput').value = email;
            document.getElementById('loginPasswordInput').value = password;
            showToastNotification(`Mengisi otomatis kredensial untuk: ${email}`);
        }

        async function handleLoginSubmit(e) {
            e.preventDefault();
            const email = document.getElementById('loginEmailInput').value;
            const password = document.getElementById('loginPasswordInput').value;

            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ email, password })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    // Save JWT token (Tahap 3.a)
                    localStorage.setItem('token', res.token);
                    localStorage.setItem('user', JSON.stringify(res.user));
                    
                    jwtToken = res.token;
                    loggedInUser = res.user;

                    showToastNotification('Login Berhasil! Selamat Datang.');
                    
                    // Populate order creation User dropdown if admin/manager
                    if (loggedInUser.role === 'admin' || loggedInUser.role === 'manager') {
                        populateUserFormDropdown();
                    }

                    navigateTo('dashboard');
                } else {
                    showToastNotification(res.message || 'Login gagal, periksa email & password.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Koneksi ke backend Laravel bermasalah.');
            }
        }

        async function handleRegisterSubmit(e) {
            e.preventDefault();
            const name = document.getElementById('regNameInput').value;
            const email = document.getElementById('regEmailInput').value;
            const role = document.getElementById('regRoleInput').value;
            const phone = document.getElementById('regPhoneInput').value;
            const password = document.getElementById('regPasswordInput').value;
            const password_confirmation = document.getElementById('regPasswordConfirmInput').value;

            if (password !== password_confirmation) {
                showToastNotification('Konfirmasi password tidak cocok.');
                return;
            }

            try {
                const response = await fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ name, email, role, phone, password, password_confirmation })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    // Automatically log in (Tahap 3.b)
                    localStorage.setItem('token', res.token);
                    localStorage.setItem('user', JSON.stringify(res.user));
                    
                    jwtToken = res.token;
                    loggedInUser = res.user;

                    showToastNotification('Registrasi & Login Berhasil!');
                    navigateTo('dashboard');
                } else {
                    showToastNotification(res.message || 'Registrasi gagal.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal registrasi akun.');
            }
        }

        function handleLogout() {
            // Call logout in background
            if (jwtToken) {
                fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${jwtToken}`,
                        'Accept': 'application/json'
                    }
                }).catch(e => console.log('Session ended.'));
            }

            localStorage.removeItem('token');
            localStorage.removeItem('user');
            jwtToken = null;
            loggedInUser = null;
            shoppingCart = [];
            updateCartBadge();

            showToastNotification('Anda telah keluar.');
            navigateTo('home');
        }

        // Populate User Form Dropdown for admins creating orders
        function populateUserFormDropdown() {
            const select = document.getElementById('orderFormUserId');
            if (select) {
                select.innerHTML = '';
                usersData.forEach(u => {
                    select.innerHTML += `<option value="${u.id}">${u.name} (${u.email} - Role: ${u.role})</option>`;
                });
            }
        }

        // ----------------- E-COMMERCE PRODUCTS CATALOG -----------------
        function filterCategory(slug) {
            activeCategorySlug = slug;
            
            // Highlight active side link
            document.querySelectorAll('#categoryFilterSidebar button').forEach(b => {
                b.classList.remove('bg-orange-50', 'text-orange-600', 'border-orange-500', 'font-semibold');
                b.classList.add('text-slate-600', 'hover:bg-slate-50', 'border-transparent');
            });
            document.getElementById(`cat-btn-${slug}`).classList.add('bg-orange-50', 'text-orange-600', 'border-orange-500', 'font-semibold');
            document.getElementById(`cat-btn-${slug}`).classList.remove('text-slate-600', 'hover:bg-slate-50', 'border-transparent');

            renderProducts();
        }

        function handleSearch(val) {
            searchQuery = val.toLowerCase();
            renderProducts();
        }

        function renderProducts() {
            const grid = document.getElementById('productsCatalogGrid');
            grid.innerHTML = '';

            let filtered = products;

            // Apply category filter
            if (activeCategorySlug !== 'all') {
                const cat = categories.find(c => c.slug === activeCategorySlug);
                if (cat) {
                    filtered = products.filter(p => p.category_id === cat.id);
                }
            }

            // Apply tag filter
            if (activeTagSlug !== 'all') {
                filtered = filtered.filter(p => p.tags && p.tags.some(t => t.slug === activeTagSlug));
            }

            // Apply search query
            if (searchQuery) {
                filtered = filtered.filter(p => 
                    p.name.toLowerCase().includes(searchQuery) || 
                    p.description.toLowerCase().includes(searchQuery) ||
                    (p.tags && p.tags.some(t => t.name.toLowerCase().includes(searchQuery)))
                );
            }

            // Apply Sort
            const sortBy = document.getElementById('sortByPrice').value;
            if (sortBy === 'low') {
                filtered.sort((a, b) => Number(a.price) - Number(b.price));
            } else if (sortBy === 'high') {
                filtered.sort((a, b) => Number(b.price) - Number(a.price));
            }

            document.getElementById('productCountText').innerText = `Menampilkan ${filtered.length} produk`;

            if (filtered.length === 0) {
                grid.innerHTML = `<div class="col-span-3 text-center py-12 text-slate-400 italic">Produk tidak tersedia.</div>`;
                return;
            }

            filtered.forEach(p => {
                const price = Number(p.price);
                const card = document.createElement('div');
                card.className = 'bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition duration-300 flex flex-col justify-between';
                
                // Color banner based on category
                let bannerColor = 'bg-[#16284f]';
                if (p.category_id === 1) bannerColor = 'bg-emerald-900';
                else if (p.category_id === 2) bannerColor = 'bg-amber-900';
                
                card.innerHTML = `
                    <div>
                        <div class="h-28 ${bannerColor} flex items-center justify-center text-white relative">
                            <span class="absolute top-2.5 left-2.5 bg-orange-500 text-white text-[8px] font-bold tracking-widest px-2 py-0.5 rounded-full uppercase">UMKM Lokal</span>
                            <i class="fa-solid fa-gifts text-2xl opacity-35"></i>
                        </div>
                        <div class="p-4 space-y-1.5 flex flex-col justify-between h-[calc(100%-7rem)]">
                            <div>
                                <h4 class="font-bold text-xs text-slate-800 line-clamp-1 uppercase">${p.name}</h4>
                                <p class="text-[11px] text-slate-500 line-clamp-2 h-8 mt-1">${p.description}</p>
                                <div class="flex flex-wrap gap-1 mt-2 mb-2">
                                    ${p.tags ? p.tags.map(t => `<span class="bg-amber-50/80 text-amber-700 text-[8.5px] font-bold px-2 py-0.5 rounded-full uppercase border border-amber-200/50">#${t.name}</span>`).join('') : ''}
                                </div>
                            </div>
                            <div class="flex items-center justify-between text-xs pt-2 border-t border-slate-50">
                                <span class="font-bold text-orange-600">Rp ${price.toLocaleString('id-ID')}</span>
                                <span class="text-[10px] text-slate-500 font-medium">Stok: ${p.stock}</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0 flex gap-2">
                        <button onclick="openProductModal(${p.id})" class="flex-1 border border-slate-200 hover:bg-slate-50 text-[10.5px] font-semibold text-slate-700 py-1.5 rounded-lg transition">Detail</button>
                        <button onclick="addToCart(${p.id})" class="bg-orange-500 hover:bg-orange-600 text-white text-[10.5px] font-bold py-1.5 px-3 rounded-lg transition"><i class="fa-solid fa-cart-plus"></i></button>
                    </div>
                `;
                grid.appendChild(card);
            });
        }

        // Render side category list
        function renderCategorySidebar() {
            const container = document.getElementById('categoryFilterSidebar');
            container.innerHTML = `
                <button onclick="filterCategory('all')" id="cat-btn-all" class="w-full text-left px-3 py-2 text-xs rounded-lg border flex items-center justify-between bg-orange-50 text-orange-600 border-orange-500 font-semibold transition">
                    <span>Semua Kategori</span>
                    <span class="text-[10px] bg-orange-100 text-orange-800 px-1.5 py-0.5 rounded-full font-bold">${products.length}</span>
                </button>
            `;

            categories.forEach(c => {
                const count = products.filter(p => p.category_id === c.id).length;
                container.innerHTML += `
                    <button onclick="filterCategory('${c.slug}')" id="cat-btn-${c.slug}" class="w-full text-left px-3 py-2 text-xs rounded-lg border border-transparent text-slate-600 hover:bg-slate-50 flex items-center justify-between transition">
                        <span class="truncate pr-1">${c.name}</span>
                        <span class="text-[10px] bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded-full font-bold">${count}</span>
                    </button>
                `;
            });
        }

        // Render side tag list
        function renderTagSidebar() {
            const container = document.getElementById('tagFilterSidebar');
            if (!container) return;
            container.innerHTML = '';

            const isAllActive = activeTagSlug === 'all';
            const allBtnClass = isAllActive 
                ? 'bg-amber-500 text-white border-amber-500 font-bold shadow-sm' 
                : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100';

            container.innerHTML += `
                <button onclick="filterTag('all')" class="px-2.5 py-1 text-[10px] rounded-full border transition uppercase font-semibold ${allBtnClass}">
                    Semua
                </button>
            `;

            tagsData.forEach(t => {
                const isActive = activeTagSlug === t.slug;
                const btnClass = isActive 
                    ? 'bg-amber-500 text-white border-amber-500 font-bold shadow-sm' 
                    : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100';
                
                const count = products.filter(p => p.tags && p.tags.some(tag => tag.id === t.id)).length;
                
                container.innerHTML += `
                    <button onclick="filterTag('${t.slug}')" class="px-2.5 py-1 text-[10px] rounded-full border transition uppercase font-semibold ${btnClass}">
                        ${t.name} (${count})
                    </button>
                `;
            });
        }

        function filterTag(slug) {
            activeTagSlug = slug;
            renderTagSidebar();
            renderProducts();
        }

        // Helper to populate checkboxes in Product forms
        function populateProductTagsCheckboxes(containerId, selectedTagIds = []) {
            const container = document.getElementById(containerId);
            if (!container) return;
            container.innerHTML = '';

            if (tagsData.length === 0) {
                container.innerHTML = `<span class="text-xs text-slate-400 italic">Tidak ada data tag. Buat tag terlebih dahulu di menu Kelola Tag.</span>`;
                return;
            }

            tagsData.forEach(t => {
                const isChecked = selectedTagIds.includes(t.id) ? 'checked' : '';
                container.innerHTML += `
                    <label class="inline-flex items-center gap-1.5 cursor-pointer text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-lg px-2.5 py-1.5 hover:bg-slate-50 shadow-sm">
                        <input type="checkbox" value="${t.id}" name="product_tags" ${isChecked} class="rounded border-slate-300 text-orange-500 focus:ring-orange-500">
                        <span>#${t.name}</span>
                    </label>
                `;
            });
        }

        // ----------------- DETAILED PRODUCT MODAL -----------------
        function openProductModal(id) {
            const p = products.find(x => x.id === id);
            if (!p) return;

            const catName = categories.find(c => c.id === p.category_id)?.name || 'Kategori';
            document.getElementById('modalProductCategory').innerText = catName;
            document.getElementById('modalProductName').innerText = p.name;
            document.getElementById('modalProductDesc').innerText = p.description;
            document.getElementById('modalProductPrice').innerText = 'Rp ' + Number(p.price).toLocaleString('id-ID');
            document.getElementById('modalProductStock').innerText = p.stock + ' unit';

            // Populate tags in modal
            const tagsCont = document.getElementById('modalProductTagsContainer');
            const tagsDiv = document.getElementById('modalProductTags');
            if (tagsCont && tagsDiv) {
                if (p.tags && p.tags.length > 0) {
                    tagsCont.classList.remove('hidden');
                    tagsDiv.innerHTML = p.tags.map(t => `<span class="bg-amber-50 text-amber-700 text-[10px] font-bold px-2.5 py-0.5 rounded-full border border-amber-200">#${t.name}</span>`).join('');
                } else {
                    tagsCont.classList.add('hidden');
                    tagsDiv.innerHTML = '';
                }
            }
            
            const btn = document.getElementById('modalProductAddBtn');
            btn.onclick = () => {
                addToCart(p.id);
                closeProductModal();
            };

            document.getElementById('productDetailModal').classList.remove('hidden');
        }

        function closeProductModal() {
            document.getElementById('productDetailModal').classList.add('hidden');
        }

        // ----------------- SHOPPING CART & CHECKOUT DRAWER -----------------
        function toggleCartDrawer() {
            const backdrop = document.getElementById('cartDrawerBackdrop');
            const drawer = document.getElementById('cartDrawer');

            if (drawer.classList.contains('translate-x-full')) {
                // Open
                backdrop.classList.remove('hidden');
                drawer.classList.remove('translate-x-full');
                renderCartDrawer();
            } else {
                // Close
                backdrop.classList.add('hidden');
                drawer.classList.add('translate-x-full');
            }
        }

        function updateCartBadge() {
            const totalItems = shoppingCart.reduce((sum, item) => sum + item.qty, 0);
            document.getElementById('cartBadgeCount').innerText = totalItems;
        }

        function addToCart(id) {
            const p = products.find(x => x.id === id);
            if (!p) return;

            const existingIdx = shoppingCart.findIndex(item => item.id === id);
            if (existingIdx !== -1) {
                shoppingCart[existingIdx].qty++;
            } else {
                shoppingCart.push({ id: p.id, name: p.name, price: Number(p.price), qty: 1 });
            }

            updateCartBadge();
            showToastNotification('Produk berhasil ditambahkan ke keranjang.');
        }

        function changeCartQty(id, delta) {
            const idx = shoppingCart.findIndex(item => item.id === id);
            if (idx === -1) return;

            shoppingCart[idx].qty += delta;
            if (shoppingCart[idx].qty <= 0) {
                shoppingCart.splice(idx, 1);
            }

            updateCartBadge();
            renderCartDrawer();
        }

        function renderCartDrawer() {
            const list = document.getElementById('cartDrawerItems');
            list.innerHTML = '';

            let totalSum = 0;

            if (shoppingCart.length === 0) {
                list.innerHTML = `<div class="text-center py-12 text-slate-400 italic">Keranjang kosong.</div>`;
                document.getElementById('cartTotalSumText').innerText = 'Rp 0';
                document.getElementById('checkoutFormArea').classList.add('hidden');
                return;
            }

            shoppingCart.forEach(item => {
                const subtotal = item.price * item.qty;
                totalSum += subtotal;

                const row = document.createElement('div');
                row.className = 'bg-slate-50 border border-slate-200 rounded-lg p-3 flex items-center justify-between gap-4';
                row.innerHTML = `
                    <div class="flex-1">
                        <span class="font-semibold text-xs text-slate-800 uppercase block truncate max-w-[200px]">${item.name}</span>
                        <span class="text-[10px] text-slate-500 block">Rp ${item.price.toLocaleString('id-ID')} / unit</span>
                        <span class="text-xs font-bold text-orange-600 block mt-0.5">Rp ${subtotal.toLocaleString('id-ID')}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button onclick="changeCartQty(${item.id}, -1)" class="w-6 h-6 rounded bg-slate-200 hover:bg-slate-300 text-xs font-bold flex items-center justify-center">-</button>
                        <span class="text-xs font-bold w-4 text-center">${item.qty}</span>
                        <button onclick="changeCartQty(${item.id}, 1)" class="w-6 h-6 rounded bg-slate-200 hover:bg-slate-300 text-xs font-bold flex items-center justify-center">+</button>
                    </div>
                `;
                list.appendChild(row);
            });

            document.getElementById('cartTotalSumText').innerText = 'Rp ' + totalSum.toLocaleString('id-ID');
            
            // Show checkout inputs if logged in
            if (jwtToken) {
                document.getElementById('checkoutFormArea').classList.remove('hidden');
            } else {
                document.getElementById('checkoutFormArea').classList.add('hidden');
            }
        }

        // Checkout order submission (Real POST request - Tahap 2.c)
        async function handleCheckoutClick() {
            if (!jwtToken) {
                showToastNotification('Silakan login terlebih dahulu untuk melakukan transaksi!');
                toggleCartDrawer();
                navigateTo('login');
                return;
            }

            const address = document.getElementById('checkoutAddressInput').value;
            const notes = document.getElementById('checkoutNotesInput').value;

            if (!address) {
                showToastNotification('Harap isi alamat pengiriman lengkap Anda.');
                return;
            }

            if (shoppingCart.length === 0) {
                showToastNotification('Keranjang belanja Anda kosong.');
                return;
            }

            const btn = document.getElementById('checkoutButton');
            btn.disabled = true;
            btn.innerText = 'Mengirim Pesanan...';

            try {
                // Send post request to POST /api/orders (Tahap 2.c & Tahap 3.e JWT interceptor simulated here)
                const response = await fetch('/api/orders', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify({
                        user_id: loggedInUser.id,
                        shipping_address: address,
                        notes: notes,
                        items: shoppingCart.map(item => ({ product_id: item.id, quantity: item.qty }))
                    })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('Checkout Berhasil! Pesanan diproses.');
                    
                    // Empty local cart
                    shoppingCart = [];
                    updateCartBadge();
                    toggleCartDrawer();

                    // Empty inputs
                    document.getElementById('checkoutAddressInput').value = '';
                    document.getElementById('checkoutNotesInput').value = '';

                    // Redirect to orders management
                    navigateTo('dashboard');
                } else {
                    showToastNotification(res.message || 'Checkout gagal.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Kesalahan jaringan saat melakukan checkout.');
            } finally {
                btn.disabled = false;
                btn.innerText = 'Checkout Pesanan';
            }
        }

        // ----------------- DASHBOARD MANAGEMENT & CRUD (Tahap 2) -----------------
        function loadDashboardStats() {
            if (!loggedInUser) return;
            
            document.getElementById('dashUserEmail').innerText = loggedInUser.email;
            document.getElementById('dashUserRole').innerText = loggedInUser.role;

            const badge = document.getElementById('dashAuthorizationBadge');
            const incomeLabel = document.getElementById('dashTotalIncomeLabel');
            
            if (loggedInUser.role === 'admin') {
                badge.innerText = 'Akses Penuh (CRUD + Hapus)';
                badge.className = 'text-xs font-bold text-red-600 mt-2';
                if (incomeLabel) incomeLabel.innerText = 'Total Penjualan';
            } else if (loggedInUser.role === 'manager') {
                badge.innerText = 'Akses Kelola Status & Tambah';
                badge.className = 'text-xs font-bold text-blue-600 mt-2';
                if (incomeLabel) incomeLabel.innerText = 'Total Penjualan';
            } else {
                badge.innerText = 'Akses Pesan & Lihat Saja';
                badge.className = 'text-xs font-bold text-emerald-600 mt-2';
                if (incomeLabel) incomeLabel.innerText = 'Total Pembelian';
            }

            // Set up order creation userId dropdown
            const uSelectContainer = document.getElementById('orderFormUserSelectContainer');
            if (loggedInUser.role === 'admin' || loggedInUser.role === 'manager') {
                uSelectContainer.classList.remove('hidden');
                populateUserFormDropdown();
            } else {
                uSelectContainer.classList.add('hidden');
            }
        }

        // Read Orders list (GET /api/orders - Tahap 2.a)
        async function loadDashboardOrders() {
            if (!jwtToken) return;

            const tbody = document.querySelector('#dashboardOrdersTable tbody');
            tbody.innerHTML = `<tr><td colspan="6" class="px-4 py-8 text-center text-slate-400 italic">Memuat data order...</td></tr>`;

            const searchVal = document.getElementById('dashboardSearchOrderInput').value.toLowerCase();
            const filterVal = document.getElementById('dashboardFilterStatus').value;

            try {
                // Fetch list from backend Laravel (Tahap 2.a & 3.e with JWT)
                const response = await fetch('/api/orders', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    let orders = res.data || [];

                    // Apply client-side search & status filtering
                    if (searchVal) {
                        orders = orders.filter(o => o.order_code.toLowerCase().includes(searchVal) || (o.shipping_address && o.shipping_address.toLowerCase().includes(searchVal)));
                    }

                    if (filterVal !== 'all') {
                        orders = orders.filter(o => o.status === filterVal);
                    }

                    // Render Stats Metrics
                    document.getElementById('dashTotalOrdersCount').innerText = orders.length;
                    const sumTotal = orders.reduce((sum, o) => sum + Number(o.total_price), 0);
                    document.getElementById('dashTotalIncomePrice').innerText = 'Rp ' + sumTotal.toLocaleString('id-ID');

                    // Render Table rows
                    tbody.innerHTML = '';
                    if (orders.length === 0) {
                        tbody.innerHTML = `<tr><td colspan="6" class="px-4 py-8 text-center text-slate-400 italic">Tidak ada data order.</td></tr>`;
                        return;
                    }

                    orders.forEach(o => {
                        let statusColor = 'bg-amber-100 text-amber-800';
                        if (o.status === 'processing') statusColor = 'bg-blue-100 text-blue-800';
                        else if (o.status === 'shipped') statusColor = 'bg-indigo-100 text-indigo-800';
                        else if (o.status === 'delivered') statusColor = 'bg-emerald-100 text-emerald-800';
                        else if (o.status === 'cancelled') statusColor = 'bg-red-100 text-red-800';

                        const formattedPrice = 'Rp ' + Number(o.total_price).toLocaleString('id-ID');
                        const orderDate = new Date(o.created_at).toLocaleDateString('id-ID', { hour: '2-digit', minute: '2-digit' });

                        // Role authorization buttons (Tahap 2.g)
                        let actionButtons = `
                            <button onclick="viewOrderDetail(${o.id})" class="text-blue-600 hover:text-blue-800 font-bold mr-3.5"><i class="fa-solid fa-eye"></i> Detail</button>
                        `;

                        // Admin & manager can edit order status (Tahap 2.d & 2.g)
                        if (loggedInUser.role === 'admin' || loggedInUser.role === 'manager') {
                            actionButtons += `
                                <button onclick="editOrderStatus(${o.id}, '${o.order_code}', '${o.status}')" class="text-amber-600 hover:text-amber-800 font-bold mr-3.5"><i class="fa-solid fa-pen-to-square"></i> Status</button>
                            `;
                        }

                        // Admin only can delete order (Tahap 2.e & 2.g)
                        if (loggedInUser.role === 'admin') {
                            actionButtons += `
                                <button onclick="deleteOrder(${o.id})" class="text-red-600 hover:text-red-800 font-bold"><i class="fa-solid fa-trash"></i> Hapus</button>
                            `;
                        }

                        const tr = document.createElement('tr');
                        tr.className = 'hover:bg-slate-50 transition border-b border-slate-100';
                        tr.innerHTML = `
                            <td class="px-4 py-3 font-mono font-bold text-slate-700">${o.order_code}</td>
                            <td class="px-4 py-3">${orderDate}</td>
                            <td class="px-4 py-3 truncate max-w-[200px]">${o.shipping_address || 'Tidak ada alamat'}</td>
                            <td class="px-4 py-3"><span class="px-2.5 py-0.5 rounded-full text-[9px] font-extrabold uppercase ${statusColor}">${o.status}</span></td>
                            <td class="px-4 py-3 font-bold">${formattedPrice}</td>
                            <td class="px-4 py-3 text-right font-medium">${actionButtons}</td>
                        `;
                        tbody.appendChild(tr);
                    });

                } else {
                    tbody.innerHTML = `<tr><td colspan="6" class="px-4 py-8 text-center text-red-500 font-medium">Gagal memuat: ${res.message}</td></tr>`;
                }
            } catch (err) {
                console.error(err);
                tbody.innerHTML = `<tr><td colspan="6" class="px-4 py-8 text-center text-red-500 font-medium">Error koneksi jaringan backend.</td></tr>`;
            }
        }

        // Show Single Order Details (GET /api/orders/{id} - Tahap 2.b)
        async function viewOrderDetail(id) {
            if (!jwtToken) return;

            const detailContainer = document.getElementById('orderDetailContent');
            detailContainer.innerHTML = `<div class="col-span-2 text-center py-10 text-slate-400">Mengambil detail order...</div>`;
            navigateTo('order-detail');

            try {
                // Fetch specific order details (Tahap 2.b)
                const response = await fetch(`/api/orders/${id}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    const o = res.data;
                    const formattedPrice = 'Rp ' + Number(o.total_price).toLocaleString('id-ID');
                    const orderDate = new Date(o.created_at).toLocaleString('id-ID');

                    // Rincian barang pesanan
                    let itemsHtml = '';
                    if (o.items && o.items.length > 0) {
                        itemsHtml = `
                            <div class="mt-5 border-t border-slate-200 pt-4 col-span-1 md:col-span-2">
                                <span class="text-[10px] uppercase font-bold text-slate-400 block mb-2 tracking-wider flex items-center gap-1.5"><i class="fa-solid fa-box text-orange-500"></i> Barang yang Dipesan</span>
                                <div class="overflow-x-auto border border-slate-200 rounded-xl shadow-inner bg-white">
                                    <table class="w-full text-xs text-left text-slate-700">
                                        <thead class="bg-slate-50 text-[10px] font-bold text-slate-500 uppercase border-b border-slate-200">
                                            <tr>
                                                <th class="px-4 py-3">Nama Produk</th>
                                                <th class="px-4 py-3 text-center">Jumlah</th>
                                                <th class="px-4 py-3 text-right">Harga Satuan</th>
                                                <th class="px-4 py-3 text-right">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-100">
                        `;
                        o.items.forEach(item => {
                            const itemName = item.product?.name || `Produk ID #${item.product_id}`;
                            const itemPrice = Number(item.price);
                            const itemQty = Number(item.quantity);
                            const itemSubtotal = itemPrice * itemQty;
                            
                            itemsHtml += `
                                <tr>
                                    <td class="px-4 py-3 font-bold text-slate-800 uppercase">${itemName}</td>
                                    <td class="px-4 py-3 text-center font-bold text-slate-600">${itemQty} unit</td>
                                    <td class="px-4 py-3 text-right">Rp ${itemPrice.toLocaleString('id-ID')}</td>
                                    <td class="px-4 py-3 text-right font-black text-orange-600">Rp ${itemSubtotal.toLocaleString('id-ID')}</td>
                                </tr>
                            `;
                        });
                        itemsHtml += `
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        `;
                    } else {
                        itemsHtml = `
                            <div class="mt-5 border-t border-slate-200 pt-4 col-span-1 md:col-span-2 text-center text-slate-400 italic">
                                Tidak ada data rincian barang untuk pesanan ini.
                            </div>
                        `;
                    }

                    detailContainer.innerHTML = `
                        <div class="space-y-4">
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Kode Transaksi</span>
                                <p class="text-sm font-mono font-bold text-slate-700">${o.order_code}</p>
                            </div>
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Identitas Pembeli</span>
                                <p class="text-xs font-semibold text-slate-800">${o.user?.name || 'User ID ' + o.user_id} (${o.user?.email || '-'})</p>
                            </div>
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Alamat Pengiriman</span>
                                <p class="text-xs text-slate-600">${o.shipping_address || 'Tidak ada alamat'}</p>
                            </div>
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Catatan Pesanan</span>
                                <p class="text-xs text-slate-600 italic">"${o.notes || 'Tidak ada catatan'}"</p>
                            </div>
                        </div>
                        <div class="space-y-4 border-t md:border-t-0 md:border-l border-slate-200 pt-4 md:pt-0 md:pl-6">
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Total Nilai Pembelian</span>
                                <p class="text-lg font-bold text-orange-500">${formattedPrice}</p>
                            </div>
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Status Saat Ini</span>
                                <span class="inline-block mt-1 px-3 py-1 rounded-full text-[9px] font-extrabold uppercase bg-slate-900 text-white">${o.status}</span>
                            </div>
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Tanggal Waktu Dibuat</span>
                                <p class="text-xs text-slate-500">${orderDate}</p>
                            </div>
                        </div>
                        ${itemsHtml}
                    `;
                } else {
                    detailContainer.innerHTML = `<div class="col-span-2 text-center text-red-500 py-10 font-bold">Gagal memuat detail: ${res.message}</div>`;
                }
            } catch (err) {
                console.error(err);
                detailContainer.innerHTML = `<div class="col-span-2 text-center text-red-500 py-10 font-bold">Kesalahan jaringan API.</div>`;
            }
        }

        // Create Order Submit (POST /api/orders - Tahap 2.c)
        async function handleCreateOrderSubmit(e) {
            e.preventDefault();

            const address = document.getElementById('orderFormAddress').value;
            const notes = document.getElementById('orderFormNotes').value;
            const productId = Number(document.getElementById('orderFormProductId').value);
            const quantity = Number(document.getElementById('orderFormQuantity').value);
            
            let userId = loggedInUser.id;
            // Admin/manager can assign orders to other users
            if (loggedInUser.role === 'admin' || loggedInUser.role === 'manager') {
                userId = Number(document.getElementById('orderFormUserId').value);
            }

            try {
                // Post request (Tahap 2.c)
                const response = await fetch('/api/orders', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify({
                        user_id: userId,
                        shipping_address: address,
                        notes: notes,
                        items: [{ product_id: productId, quantity: quantity }]
                    })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('Pesanan baru sukses disimpan!');
                    document.getElementById('orderFormAddress').value = '';
                    document.getElementById('orderFormNotes').value = '';
                    
                    navigateTo('dashboard');
                } else {
                    showToastNotification(res.message || 'Gagal menyimpan pesanan.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal menghubungi backend API.');
            }
        }

        // Edit Order Status Click (Tahap 2.d)
        function editOrderStatus(id, code, currentStatus) {
            document.getElementById('editOrderStatusOrderId').value = id;
            document.getElementById('editOrderStatusOrderCode').value = code;
            document.getElementById('editOrderStatusSelect').value = currentStatus;

            navigateTo('order-edit');
        }

        // Submit Status Update (PUT /api/orders/{id}/status - Tahap 2.d)
        async function handleEditOrderStatusSubmit(e) {
            e.preventDefault();

            const id = document.getElementById('editOrderStatusOrderId').value;
            const status = document.getElementById('editOrderStatusSelect').value;

            try {
                // Send PUT request to update status (Tahap 2.d)
                const response = await fetch(`/api/orders/${id}/status`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify({ status })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('Status pesanan berhasil diperbarui!');
                    navigateTo('dashboard');
                } else {
                    showToastNotification(res.message || 'Gagal memperbarui status.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Kesalahan jaringan backend.');
            }
        }

        // Delete Order (DELETE /api/orders/{id} - Tahap 2.e & 2.g)
        async function deleteOrder(id) {
            if (loggedInUser.role !== 'admin') {
                showToastNotification('Akses ditolak: Hanya Admin yang dapat menghapus data order!');
                return;
            }

            if (confirm('Apakah Anda yakin ingin menghapus data pemesanan ini secara permanen?')) {
                try {
                    // Send delete request (Tahap 2.e)
                    const response = await fetch(`/api/orders/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${jwtToken}`
                        }
                    });

                    const res = await response.json();
                    if (response.ok && res.status === 'success') {
                        showToastNotification('Data order berhasil dihapus!');
                        loadDashboardOrders();
                    } else {
                        showToastNotification(res.message || 'Gagal menghapus order.');
                    }
                } catch (err) {
                    console.error(err);
                    showToastNotification('Gagal menghubungi backend API.');
                }
            }
        }

        // ----------------- ADMIN PRODUCTS MANAGEMENT CRUD -----------------
        async function loadProductsFromBackend() {
            if (!jwtToken) return;
            try {
                const response = await fetch('/api/products', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });
                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    products = res.data || [];
                    renderCategorySidebar();
                    renderTagSidebar();
                    renderProducts();
                    populateOrderFormProductsDropdown();
                }
            } catch (err) {
                console.error('Gagal mengambil data produk terbaru dari backend:', err);
            }
        }

        async function loadDashboardProducts() {
            if (!jwtToken) return;

            const tbody = document.querySelector('#dashboardProductsTable tbody');
            tbody.innerHTML = `<tr><td colspan="6" class="px-4 py-8 text-center text-slate-400 italic">Memuat data produk...</td></tr>`;

            try {
                const response = await fetch('/api/products', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    products = res.data || [];
                    tbody.innerHTML = '';
                    if (products.length === 0) {
                        tbody.innerHTML = `<tr><td colspan="6" class="px-4 py-8 text-center text-slate-400 italic">Tidak ada data produk.</td></tr>`;
                        return;
                    }

                    products.forEach(p => {
                        const price = Number(p.price);
                        const formattedPrice = 'Rp ' + price.toLocaleString('id-ID');
                        const catName = p.category?.name || `Kategori ID #${p.category_id}`;
                        const statusColor = p.status === 'active' ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-200 text-slate-700';

                        let actionButtons = `
                            <button onclick="editProduct(${p.id})" class="text-amber-600 hover:text-amber-800 font-bold mr-3.5"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                        `;

                        if (loggedInUser.role === 'admin') {
                            actionButtons += `
                                <button onclick="deleteProduct(${p.id})" class="text-red-600 hover:text-red-800 font-bold"><i class="fa-solid fa-trash"></i> Hapus</button>
                            `;
                        }

                        const tr = document.createElement('tr');
                        tr.className = 'hover:bg-slate-50 transition border-b border-slate-100';
                        tr.innerHTML = `
                            <td class="px-4 py-3 font-bold text-slate-700 uppercase">${p.name}</td>
                            <td class="px-4 py-3">${catName}</td>
                            <td class="px-4 py-3 font-semibold text-orange-600">${formattedPrice}</td>
                            <td class="px-4 py-3 font-bold">${p.stock}</td>
                            <td class="px-4 py-3"><span class="px-2.5 py-0.5 rounded-full text-[9px] font-extrabold uppercase ${statusColor}">${p.status || 'active'}</span></td>
                            <td class="px-4 py-3 text-right font-medium">${actionButtons}</td>
                        `;
                        tbody.appendChild(tr);
                    });

                } else {
                    tbody.innerHTML = `<tr><td colspan="6" class="px-4 py-8 text-center text-red-500 font-medium">Gagal memuat produk: ${res.message}</td></tr>`;
                }
            } catch (err) {
                console.error(err);
                tbody.innerHTML = `<tr><td colspan="6" class="px-4 py-8 text-center text-red-500 font-medium">Error koneksi jaringan backend.</td></tr>`;
            }
        }

        function editProduct(id) {
            const p = products.find(x => x.id === id);
            if (!p) return;

            document.getElementById('editProductFormId').value = p.id;
            document.getElementById('editProductFormName').value = p.name;
            document.getElementById('editProductFormCategoryId').value = p.category_id;
            document.getElementById('editProductFormDescription').value = p.description || '';
            document.getElementById('editProductFormPrice').value = p.price;
            document.getElementById('editProductFormStock').value = p.stock;
            document.getElementById('editProductFormStatus').value = p.status || 'active';

            populateProductCategoriesDropdown('editProductFormCategoryId');
            populateProductTagsCheckboxes('editProductFormTagsContainer', p.tags ? p.tags.map(t => t.id) : []);
            navigateTo('product-edit');
        }

        async function deleteProduct(id) {
            if (loggedInUser.role !== 'admin') {
                showToastNotification('Akses ditolak: Hanya Admin yang dapat menghapus produk!');
                return;
            }

            if (confirm('Apakah Anda yakin ingin menghapus produk ini secara permanen?')) {
                try {
                    const response = await fetch(`/api/products/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${jwtToken}`
                        }
                    });

                    const res = await response.json();
                    if (response.ok && res.status === 'success') {
                        showToastNotification('Produk berhasil dihapus!');
                        await loadProductsFromBackend();
                        loadDashboardProducts();
                    } else {
                        showToastNotification(res.message || 'Gagal menghapus produk.');
                    }
                } catch (err) {
                    console.error(err);
                    showToastNotification('Gagal menghubungi backend API.');
                }
            }
        }

        async function handleCreateProductSubmit(e) {
            e.preventDefault();

            const category_id = Number(document.getElementById('productFormCategoryId').value);
            const name = document.getElementById('productFormName').value;
            const description = document.getElementById('productFormDescription').value;
            const price = Number(document.getElementById('productFormPrice').value);
            const stock = Number(document.getElementById('productFormStock').value);
            const status = document.getElementById('productFormStatus').value;

            // Get selected tag IDs from checkboxes
            const selectedTags = Array.from(document.querySelectorAll('#productFormTagsContainer input[name="product_tags"]:checked'))
                                      .map(cb => Number(cb.value));

            try {
                const response = await fetch('/api/products', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify({ category_id, name, description, price, stock, status, tags: selectedTags })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('Produk baru berhasil disimpan!');
                    document.getElementById('productFormName').value = '';
                    document.getElementById('productFormDescription').value = '';
                    document.getElementById('productFormPrice').value = '';
                    document.getElementById('productFormStock').value = '';
                    document.getElementById('productFormStatus').value = 'active';

                    await loadProductsFromBackend();
                    navigateTo('dashboard');
                } else {
                    showToastNotification(res.message || 'Gagal membuat produk.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal menghubungi backend API.');
            }
        }

        async function handleEditProductSubmit(e) {
            e.preventDefault();

            const id = document.getElementById('editProductFormId').value;
            const category_id = Number(document.getElementById('editProductFormCategoryId').value);
            const name = document.getElementById('editProductFormName').value;
            const description = document.getElementById('editProductFormDescription').value;
            const price = Number(document.getElementById('editProductFormPrice').value);
            const stock = Number(document.getElementById('editProductFormStock').value);
            const status = document.getElementById('editProductFormStatus').value;

            // Get selected tag IDs from checkboxes
            const selectedTags = Array.from(document.querySelectorAll('#editProductFormTagsContainer input[name="product_tags"]:checked'))
                                      .map(cb => Number(cb.value));

            try {
                const response = await fetch(`/api/products/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify({ category_id, name, description, price, stock, status, tags: selectedTags })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('Produk berhasil diperbarui!');
                    await loadProductsFromBackend();
                    navigateTo('dashboard');
                } else {
                    showToastNotification(res.message || 'Gagal memperbarui produk.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal menghubungi backend API.');
            }
        }

        function populateProductCategoriesDropdown(selectId) {
            const select = document.getElementById(selectId);
            if (select) {
                select.innerHTML = '';
                categories.forEach(c => {
                    select.innerHTML += `<option value="${c.id}">${c.name}</option>`;
                });
            }
        }

        function populateOrderFormProductsDropdown() {
            const select = document.getElementById('orderFormProductId');
            if (select) {
                select.innerHTML = '';
                products.forEach(p => {
                    select.innerHTML += `<option value="${p.id}">${p.name} (Harga: Rp ${Number(p.price).toLocaleString('id-ID')} | Stok: ${p.stock})</option>`;
                });
            }
        }

        // ----------------- GLOBAL JWT 401 INTERCEPTOR -----------------
        const originalFetch = window.fetch;
        window.fetch = async function(...args) {
            const response = await originalFetch(...args);
            const url = typeof args[0] === 'string' ? args[0] : args[0].url;
            if (response.status === 401 && !url.includes('/api/login') && !url.includes('/api/register')) {
                localStorage.removeItem('token');
                localStorage.removeItem('user');
                jwtToken = null;
                loggedInUser = null;
                showToastNotification('Sesi Anda telah berakhir atau token tidak valid. Silakan login kembali.');
                navigateTo('login');
            }
            return response;
        };

        // ----------------- USER PROFILE MANAGEMENT -----------------
        let myProfileData = null;
        async function loadMyProfile() {
            if (!jwtToken) return;
            try {
                const response = await fetch('/api/me', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });
                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    const u = res.data;
                    document.getElementById('profileName').innerText = u.name;
                    document.getElementById('profileEmail').innerText = u.email;
                    document.getElementById('profilePhone').innerText = u.phone || '-';
                    document.getElementById('profileRoleBadge').innerText = u.role;
                    
                    const profile = u.profile;
                    myProfileData = profile; // Save profile details
                    
                    if (profile) {
                        document.getElementById('profileGender').innerText = profile.gender === 'male' ? 'Laki-Laki' : (profile.gender === 'female' ? 'Perempuan' : '-');
                        document.getElementById('profileBirthDate').innerText = profile.birth_date ? new Date(profile.birth_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '-';
                        document.getElementById('profileAddress').innerText = profile.address || '-';
                        document.getElementById('profileCity').innerText = profile.city || '-';
                        document.getElementById('profileProvincePostal').innerText = `${profile.province || '-'} / ${profile.postal_code || '-'}`;
                    } else {
                        document.getElementById('profileGender').innerText = '- (Belum melengkapi)';
                        document.getElementById('profileBirthDate').innerText = '- (Belum melengkapi)';
                        document.getElementById('profileAddress').innerText = '- (Belum melengkapi)';
                        document.getElementById('profileCity').innerText = '- (Belum melengkapi)';
                        document.getElementById('profileProvincePostal').innerText = '- / -';
                    }
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal mengambil data profil.');
            }
        }

        function editMyProfile() {
            if (myProfileData) {
                document.getElementById('profileFormBirthDate').value = myProfileData.birth_date || '';
                document.getElementById('profileFormGender').value = myProfileData.gender || 'male';
                document.getElementById('profileFormAddress').value = myProfileData.address || '';
                document.getElementById('profileFormCity').value = myProfileData.city || '';
                document.getElementById('profileFormProvince').value = myProfileData.province || '';
                document.getElementById('profileFormPostalCode').value = myProfileData.postal_code || '';
            } else {
                document.getElementById('profileFormBirthDate').value = '';
                document.getElementById('profileFormGender').value = 'male';
                document.getElementById('profileFormAddress').value = '';
                document.getElementById('profileFormCity').value = '';
                document.getElementById('profileFormProvince').value = '';
                document.getElementById('profileFormPostalCode').value = '';
            }
            navigateTo('profile-edit');
        }

        async function handleEditProfileSubmit(e) {
            e.preventDefault();
            const birth_date = document.getElementById('profileFormBirthDate').value || null;
            const gender = document.getElementById('profileFormGender').value || null;
            const address = document.getElementById('profileFormAddress').value || null;
            const city = document.getElementById('profileFormCity').value || null;
            const province = document.getElementById('profileFormProvince').value || null;
            const postal_code = document.getElementById('profileFormPostalCode').value || null;

            const payload = {
                address,
                city,
                province,
                postal_code,
                birth_date,
                gender
            };

            const isUpdate = myProfileData !== null;
            const url = isUpdate ? `/api/user-profiles/${myProfileData.id}` : '/api/user-profiles';
            const method = isUpdate ? 'PUT' : 'POST';

            if (!isUpdate) {
                payload.user_id = loggedInUser.id;
            }

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify(payload)
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification(isUpdate ? 'Profil berhasil diperbarui!' : 'Profil berhasil dilengkapi!');
                    navigateTo('profile');
                } else {
                    showToastNotification(res.message || 'Gagal menyimpan data profil.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Kesalahan jaringan saat menyimpan profil.');
            }
        }

        // ----------------- USER MANAGEMENT CRUD (ADMIN ONLY) -----------------
        async function loadUsersList() {
            if (!jwtToken || loggedInUser.role !== 'admin') return;
            const tbody = document.querySelector('#dashboardUsersTable tbody');
            tbody.innerHTML = `<tr><td colspan="5" class="px-4 py-8 text-center text-slate-400 italic">Memuat data pengguna...</td></tr>`;

            try {
                const response = await fetch('/api/users', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });
                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    const users = res.data || [];
                    tbody.innerHTML = '';
                    if (users.length === 0) {
                        tbody.innerHTML = `<tr><td colspan="5" class="px-4 py-8 text-center text-slate-400 italic">Tidak ada data pengguna.</td></tr>`;
                        return;
                    }

                    users.forEach(u => {
                        let actionButtons = `
                            <button onclick="viewUserDetail(${u.id})" class="text-blue-600 hover:text-blue-800 font-bold mr-3.5"><i class="fa-solid fa-eye"></i> Detail</button>
                            <button onclick="editUser(${u.id})" class="text-amber-600 hover:text-amber-800 font-bold mr-3.5"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                            <button onclick="deleteUser(${u.id})" class="text-red-600 hover:text-red-800 font-bold"><i class="fa-solid fa-trash"></i> Hapus</button>
                        `;

                        const tr = document.createElement('tr');
                        tr.className = 'hover:bg-slate-50 transition border-b border-slate-100';
                        tr.innerHTML = `
                            <td class="px-4 py-3 font-bold text-slate-700">${u.name}</td>
                            <td class="px-4 py-3">${u.email}</td>
                            <td class="px-4 py-3"><span class="px-2.5 py-0.5 rounded-full text-[9px] font-extrabold uppercase ${u.role === 'admin' ? 'bg-red-100 text-red-800' : (u.role === 'manager' ? 'bg-blue-100 text-blue-800' : 'bg-emerald-100 text-emerald-800')}">${u.role}</span></td>
                            <td class="px-4 py-3">${u.phone || '-'}</td>
                            <td class="px-4 py-3 text-right font-medium">${actionButtons}</td>
                        `;
                        tbody.appendChild(tr);
                    });
                } else {
                    tbody.innerHTML = `<tr><td colspan="5" class="px-4 py-8 text-center text-red-500 font-medium">Gagal memuat: ${res.message}</td></tr>`;
                }
            } catch (err) {
                console.error(err);
                tbody.innerHTML = `<tr><td colspan="5" class="px-4 py-8 text-center text-red-500 font-medium">Error koneksi jaringan.</td></tr>`;
            }
        }

        async function viewUserDetail(id) {
            if (!jwtToken) return;
            const container = document.getElementById('userDetailContent');
            container.innerHTML = `<div class="col-span-2 text-center py-10 text-slate-400">Mengambil detail pengguna...</div>`;
            navigateTo('user-detail');

            try {
                const response = await fetch(`/api/users/${id}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });
                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    const u = res.data;
                    const profile = u.profile;
                    const orders = u.orders || [];

                    let ordersHtml = '';
                    if (orders.length > 0) {
                        ordersHtml = `
                            <div class="col-span-1 md:col-span-2 mt-4 border-t border-slate-200 pt-4">
                                <span class="text-[10px] uppercase font-bold text-slate-400 block mb-2 tracking-wider flex items-center gap-1.5"><i class="fa-solid fa-receipt text-orange-500"></i> Riwayat Transaksi Belanja</span>
                                <div class="overflow-x-auto border border-slate-200 rounded-xl bg-white">
                                    <table class="w-full text-xs text-left text-slate-700">
                                        <thead class="bg-slate-50 text-[10px] font-bold text-slate-500 uppercase border-b border-slate-200">
                                            <tr>
                                                <th class="px-4 py-2.5">Kode Order</th>
                                                <th class="px-4 py-2.5">Status</th>
                                                <th class="px-4 py-2.5 text-right">Total Belanja</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-100">
                        `;
                        orders.forEach(o => {
                            ordersHtml += `
                                <tr>
                                    <td class="px-4 py-2 font-mono font-bold text-slate-700">${o.order_code}</td>
                                    <td class="px-4 py-2 uppercase text-[9px] font-bold">${o.status}</td>
                                    <td class="px-4 py-2 text-right font-bold text-orange-600">Rp ${Number(o.total_price).toLocaleString('id-ID')}</td>
                                </tr>
                            `;
                        });
                        ordersHtml += `
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        `;
                    } else {
                        ordersHtml = `<div class="col-span-1 md:col-span-2 mt-4 border-t border-slate-200 pt-4 text-center text-slate-400 italic">Belum ada riwayat pesanan belanja.</div>`;
                    }

                    container.innerHTML = `
                        <div class="space-y-4">
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Nama Lengkap</span>
                                <p class="text-sm font-extrabold text-slate-800 uppercase">${u.name}</p>
                            </div>
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Email Pengguna</span>
                                <p class="text-xs font-semibold text-slate-700">${u.email}</p>
                            </div>
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Nomor Telepon</span>
                                <p class="text-xs font-semibold text-slate-700">${u.phone || '-'}</p>
                            </div>
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Role & Otoritas</span>
                                <span class="inline-block mt-1 px-3 py-1 rounded-full text-[9px] font-extrabold uppercase bg-[#0c1938] text-white">${u.role}</span>
                            </div>
                        </div>
                        <div class="space-y-4 border-t md:border-t-0 md:border-l border-slate-200 pt-4 md:pt-0 md:pl-6">
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Alamat Rumah</span>
                                <p class="text-xs text-slate-700">${profile?.address || '-'}</p>
                            </div>
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Kota / Provinsi</span>
                                <p class="text-xs text-slate-700">${profile?.city || '-'} / ${profile?.province || '-'}</p>
                            </div>
                            <div>
                                <span class="text-[9px] uppercase font-bold text-slate-400 block">Tanggal Lahir / Gender</span>
                                <p class="text-xs text-slate-700">${profile?.birth_date || '-'} / ${profile?.gender || '-'}</p>
                            </div>
                        </div>
                        ${ordersHtml}
                    `;
                } else {
                    container.innerHTML = `<div class="col-span-2 text-center text-red-500 py-10 font-bold">Gagal memuat detail user.</div>`;
                }
            } catch (err) {
                console.error(err);
                container.innerHTML = `<div class="col-span-2 text-center text-red-500 py-10 font-bold">Kesalahan jaringan API.</div>`;
            }
        }

        async function handleCreateUserSubmit(e) {
            e.preventDefault();
            const name = document.getElementById('userFormName').value;
            const email = document.getElementById('userFormEmail').value;
            const password = document.getElementById('userFormPassword').value;
            const role = document.getElementById('userFormRole').value;
            const phone = document.getElementById('userFormPhone').value;

            try {
                const response = await fetch('/api/users', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify({ name, email, password, role, phone })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('User baru berhasil dibuat!');
                    document.getElementById('userFormName').value = '';
                    document.getElementById('userFormEmail').value = '';
                    document.getElementById('userFormPassword').value = '';
                    document.getElementById('userFormPhone').value = '';
                    navigateTo('users-list');
                } else {
                    showToastNotification(res.message || 'Gagal membuat user.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal menghubungi backend API.');
            }
        }

        let editUserFormLoadedData = null;
        async function editUser(id) {
            if (!jwtToken) return;
            try {
                const response = await fetch(`/api/users/${id}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });
                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    editUserFormLoadedData = res.data;
                    document.getElementById('editUserFormId').value = res.data.id;
                    document.getElementById('editUserFormName').value = res.data.name;
                    document.getElementById('editUserFormEmail').value = res.data.email;
                    document.getElementById('editUserFormRole').value = res.data.role;
                    document.getElementById('editUserFormPhone').value = res.data.phone || '';
                    document.getElementById('editUserFormPassword').value = ''; // empty password by default

                    navigateTo('user-edit');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal mengambil data user.');
            }
        }

        async function handleEditUserSubmit(e) {
            e.preventDefault();
            const id = document.getElementById('editUserFormId').value;
            const name = document.getElementById('editUserFormName').value;
            const email = document.getElementById('editUserFormEmail').value;
            const password = document.getElementById('editUserFormPassword').value;
            const role = document.getElementById('editUserFormRole').value;
            const phone = document.getElementById('editUserFormPhone').value;

            const payload = { name, email, role, phone };
            if (password) {
                payload.password = password;
            }

            try {
                const response = await fetch(`/api/users/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify(payload)
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('Data user berhasil diperbarui!');
                    navigateTo('users-list');
                } else {
                    showToastNotification(res.message || 'Gagal memperbarui data user.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal menghubungi backend API.');
            }
        }

        async function deleteUser(id) {
            if (id === loggedInUser.id) {
                showToastNotification('Aksi ditolak: Anda tidak dapat menghapus diri sendiri!');
                return;
            }

            if (confirm('Apakah Anda yakin ingin menghapus user ini secara permanen dari sistem?')) {
                try {
                    const response = await fetch(`/api/users/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${jwtToken}`
                        }
                    });

                    const res = await response.json();
                    if (response.ok && res.status === 'success') {
                        showToastNotification('User berhasil dihapus!');
                        loadUsersList();
                    } else {
                        showToastNotification(res.message || 'Gagal menghapus user.');
                    }
                } catch (err) {
                    console.error(err);
                    showToastNotification('Gagal menghubungi backend API.');
                }
            }
        }

        // ----------------- CATEGORIES MANAGEMENT CRUD (ADMIN ONLY) -----------------
        async function loadCategoriesList() {
            if (!jwtToken) return;
            const tbody = document.querySelector('#dashboardCategoriesTable tbody');
            tbody.innerHTML = `<tr><td colspan="5" class="px-4 py-8 text-center text-slate-400 italic">Memuat data kategori...</td></tr>`;

            try {
                const response = await fetch('/api/categories', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });
                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    const cats = res.data || [];
                    categories = cats; // update local categories cache
                    tbody.innerHTML = '';
                    if (cats.length === 0) {
                        tbody.innerHTML = `<tr><td colspan="5" class="px-4 py-8 text-center text-slate-400 italic">Tidak ada data kategori.</td></tr>`;
                        return;
                    }

                    cats.forEach(c => {
                        let actionButtons = `
                            <button onclick="editCategory(${c.id})" class="text-amber-600 hover:text-amber-800 font-bold mr-3.5"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                            <button onclick="deleteCategory(${c.id})" class="text-red-600 hover:text-red-800 font-bold"><i class="fa-solid fa-trash"></i> Hapus</button>
                        `;

                        const tr = document.createElement('tr');
                        tr.className = 'hover:bg-slate-50 transition border-b border-slate-100';
                        tr.innerHTML = `
                            <td class="px-4 py-3 font-bold text-slate-700 uppercase">${c.name}</td>
                            <td class="px-4 py-3 font-mono text-slate-500">${c.slug}</td>
                            <td class="px-4 py-3">${c.description || '-'}</td>
                            <td class="px-4 py-3 font-bold">${c.products_count !== undefined ? c.products_count : 0}</td>
                            <td class="px-4 py-3 text-right font-medium">${actionButtons}</td>
                        `;
                        tbody.appendChild(tr);
                    });
                } else {
                    tbody.innerHTML = `<tr><td colspan="5" class="px-4 py-8 text-center text-red-500 font-medium">Gagal memuat: ${res.message}</td></tr>`;
                }
            } catch (err) {
                console.error(err);
                tbody.innerHTML = `<tr><td colspan="5" class="px-4 py-8 text-center text-red-500 font-medium">Error koneksi jaringan.</td></tr>`;
            }
        }

        async function handleCreateCategorySubmit(e) {
            e.preventDefault();
            const name = document.getElementById('categoryFormName').value;
            const description = document.getElementById('categoryFormDescription').value;
            const is_active = Number(document.getElementById('categoryFormStatus').value);

            try {
                const response = await fetch('/api/categories', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify({ name, description, is_active })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('Kategori baru berhasil dibuat!');
                    document.getElementById('categoryFormName').value = '';
                    document.getElementById('categoryFormDescription').value = '';
                    navigateTo('categories-list');
                } else {
                    showToastNotification(res.message || 'Gagal membuat kategori.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal menghubungi backend API.');
            }
        }

        async function editCategory(id) {
            if (!jwtToken) return;
            try {
                const response = await fetch(`/api/categories/${id}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });
                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    const c = res.data;
                    document.getElementById('editCategoryFormId').value = c.id;
                    document.getElementById('editCategoryFormName').value = c.name;
                    document.getElementById('editCategoryFormDescription').value = c.description || '';
                    document.getElementById('editCategoryFormStatus').value = c.is_active ? "1" : "0";

                    navigateTo('category-edit');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal mengambil data kategori.');
            }
        }

        async function handleEditCategorySubmit(e) {
            e.preventDefault();
            const id = document.getElementById('editCategoryFormId').value;
            const name = document.getElementById('editCategoryFormName').value;
            const description = document.getElementById('editCategoryFormDescription').value;
            const is_active = Number(document.getElementById('editCategoryFormStatus').value);

            try {
                const response = await fetch(`/api/categories/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify({ name, description, is_active })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('Kategori berhasil diperbarui!');
                    navigateTo('categories-list');
                } else {
                    showToastNotification(res.message || 'Gagal memperbarui kategori.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal menghubungi backend API.');
            }
        }

        async function deleteCategory(id) {
            if (confirm('Apakah Anda yakin ingin menghapus kategori ini secara permanen?')) {
                try {
                    const response = await fetch(`/api/categories/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${jwtToken}`
                        }
                    });

                    const res = await response.json();
                    if (response.ok && res.status === 'success') {
                        showToastNotification('Kategori berhasil dihapus!');
                        loadCategoriesList();
                    } else {
                        showToastNotification(res.message || 'Gagal menghapus kategori.');
                    }
                } catch (err) {
                    console.error(err);
                    showToastNotification('Gagal menghubungi backend API.');
                }
            }
        }

        // ----------------- TAGS MANAGEMENT CRUD (ADMIN ONLY) -----------------
        async function loadTagsList() {
            if (!jwtToken) return;
            const tbody = document.querySelector('#dashboardTagsTable tbody');
            tbody.innerHTML = `<tr><td colspan="3" class="px-4 py-8 text-center text-slate-400 italic">Memuat data tag...</td></tr>`;

            try {
                const response = await fetch('/api/tags', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });
                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    const tags = res.data || [];
                    tagsData = tags; // update local tags cache
                    tbody.innerHTML = '';
                    if (tags.length === 0) {
                        tbody.innerHTML = `<tr><td colspan="3" class="px-4 py-8 text-center text-slate-400 italic">Tidak ada data tag.</td></tr>`;
                        return;
                    }

                    tags.forEach(t => {
                        let actionButtons = `
                            <button onclick="editTag(${t.id})" class="text-amber-600 hover:text-amber-800 font-bold mr-3.5"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
                            <button onclick="deleteTag(${t.id})" class="text-red-600 hover:text-red-800 font-bold"><i class="fa-solid fa-trash"></i> Hapus</button>
                        `;

                        const tr = document.createElement('tr');
                        tr.className = 'hover:bg-slate-50 transition border-b border-slate-100';
                        tr.innerHTML = `
                            <td class="px-4 py-3 font-bold text-slate-700 uppercase">${t.name}</td>
                            <td class="px-4 py-3 font-mono text-slate-500">${t.slug}</td>
                            <td class="px-4 py-3 text-right font-medium">${actionButtons}</td>
                        `;
                        tbody.appendChild(tr);
                    });
                } else {
                    tbody.innerHTML = `<tr><td colspan="3" class="px-4 py-8 text-center text-red-500 font-medium">Gagal memuat: ${res.message}</td></tr>`;
                }
            } catch (err) {
                console.error(err);
                tbody.innerHTML = `<tr><td colspan="3" class="px-4 py-8 text-center text-red-500 font-medium">Error koneksi jaringan.</td></tr>`;
            }
        }

        async function handleCreateTagSubmit(e) {
            e.preventDefault();
            const name = document.getElementById('tagFormName').value;

            try {
                const response = await fetch('/api/tags', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify({ name })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('Tag baru berhasil dibuat!');
                    document.getElementById('tagFormName').value = '';
                    navigateTo('tags-list');
                } else {
                    showToastNotification(res.message || 'Gagal membuat tag.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal menghubungi backend API.');
            }
        }

        async function editTag(id) {
            if (!jwtToken) return;
            try {
                const response = await fetch(`/api/tags/${id}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    }
                });
                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    const t = res.data;
                    document.getElementById('editTagFormId').value = t.id;
                    document.getElementById('editTagFormName').value = t.name;

                    navigateTo('tag-edit');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal mengambil data tag.');
            }
        }

        async function handleEditTagSubmit(e) {
            e.preventDefault();
            const id = document.getElementById('editTagFormId').value;
            const name = document.getElementById('editTagFormName').value;

            try {
                const response = await fetch(`/api/tags/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${jwtToken}`
                    },
                    body: JSON.stringify({ name })
                });

                const res = await response.json();
                if (response.ok && res.status === 'success') {
                    showToastNotification('Tag berhasil diperbarui!');
                    navigateTo('tags-list');
                } else {
                    showToastNotification(res.message || 'Gagal memperbarui tag.');
                }
            } catch (err) {
                console.error(err);
                showToastNotification('Gagal menghubungi backend API.');
            }
        }

        async function deleteTag(id) {
            if (confirm('Apakah Anda yakin ingin menghapus tag ini secara permanen?')) {
                try {
                    const response = await fetch(`/api/tags/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': `Bearer ${jwtToken}`
                        }
                    });

                    const res = await response.json();
                    if (response.ok && res.status === 'success') {
                        showToastNotification('Tag berhasil dihapus!');
                        loadTagsList();
                    } else {
                        showToastNotification(res.message || 'Gagal menghapus tag.');
                    }
                } catch (err) {
                    console.error(err);
                    showToastNotification('Gagal menghubungi backend API.');
                }
            }
        }

        // ----------------- TOAST NOTIFICATIONS -----------------
        function showToastNotification(msg) {
            const notif = document.createElement('div');
            notif.className = 'fixed bottom-5 left-5 bg-slate-900 text-white text-xs px-5 py-3 rounded-lg shadow-lg z-50 flex items-center gap-2 transform translate-y-10 opacity-0 transition-all duration-300 border border-slate-800';
            notif.innerHTML = `<i class="fa-solid fa-circle-info text-orange-400"></i> ${msg}`;
            document.body.appendChild(notif);
            
            setTimeout(() => {
                notif.classList.remove('translate-y-10', 'opacity-0');
            }, 50);

            setTimeout(() => {
                notif.classList.add('translate-y-10', 'opacity-0');
                setTimeout(() => notif.remove(), 300);
            }, 3500);
        }

        // ----------------- APP INITIALIZATION -----------------
        renderNavbar();
        renderHeaderAuth();
        renderCategorySidebar();
        renderProducts();

        // Check initial routing based on login status
        if (jwtToken) {
            loadProductsFromBackend();
            navigateTo('home');
        } else {
            navigateTo('login');
        }
    </script>
</body>
</html>
