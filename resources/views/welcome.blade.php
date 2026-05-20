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

            <!-- Demo helper panel -->
            <div class="mt-6 p-4 bg-[#16284f]/40 border border-slate-700/40 rounded-xl">
                <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-2.5 text-center">Pintasan Akun Uji Coba</span>
                <div class="grid grid-cols-3 gap-2">
                    <button type="button" onclick="autofillLogin('admin@toko.com', 'password')" class="text-[10px] bg-[#0c1938] hover:bg-orange-500 hover:text-white text-slate-300 font-semibold py-2 px-1 rounded-lg transition border border-slate-700/60 flex flex-col items-center gap-0.5">
                        <span class="font-bold text-[9.5px]">Admin</span>
                        <span class="text-[7.5px] font-normal text-slate-400 hover:text-white/80">admin@toko.com</span>
                    </button>
                    <button type="button" onclick="autofillLogin('manager@toko.com', 'password')" class="text-[10px] bg-[#0c1938] hover:bg-orange-500 hover:text-white text-slate-300 font-semibold py-2 px-1 rounded-lg transition border border-slate-700/60 flex flex-col items-center gap-0.5">
                        <span class="font-bold text-[9.5px]">Manager</span>
                        <span class="text-[7.5px] font-normal text-slate-400 hover:text-white/80">manager@toko.com</span>
                    </button>
                    <button type="button" onclick="autofillLogin('budi@email.com', 'password')" class="text-[10px] bg-[#0c1938] hover:bg-orange-500 hover:text-white text-slate-300 font-semibold py-2 px-1 rounded-lg transition border border-slate-700/60 flex flex-col items-center gap-0.5">
                        <span class="font-bold text-[9.5px]">Customer</span>
                        <span class="text-[7.5px] font-normal text-slate-400 hover:text-white/80">budi@email.com</span>
                    </button>
                </div>
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
                        <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Total Pembelian</span>
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
                            Simpan Order (POST /api/orders)
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

        <!-- ----------------- SECTION: ER DATABASE RELATIONAL VISUALIZER ----------------- -->
        <div id="page-database-er" class="page-view hidden flex flex-col gap-6">
            
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-4 mb-6 gap-2">
                    <div>
                        <h2 class="font-bold text-sm text-slate-800 uppercase tracking-tight">Diagram Skema Relasi Database SQLite</h2>
                        <p class="text-xs text-slate-400 mt-1">Arahkan kursor ke kartu tabel untuk memperjelas alur foreign key.</p>
                    </div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider bg-slate-100 px-3 py-1.5 rounded-full flex items-center gap-1.5">
                        <i class="fa-solid fa-circle-nodes text-orange-500"></i> Relasi Skema Terintegrasi
                    </span>
                </div>

                <!-- Grid diagram cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Users -->
                    <div id="tb-users" onmouseenter="highlightRelation('users')" onmouseleave="clearRelationHighlight()" onclick="showDbSampleData('users')" class="db-er-card border border-slate-200 hover:border-orange-500 rounded-xl p-4 transition bg-white shadow-sm cursor-pointer">
                        <div class="flex items-center justify-between mb-3 border-b border-slate-100 pb-2">
                            <span class="font-bold text-xs text-slate-800 font-mono"><i class="fa-solid fa-table text-slate-400"></i> users</span>
                            <span class="text-[9px] bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded font-mono">1:1 / 1:N</span>
                        </div>
                        <ul class="font-mono text-[10.5px] text-slate-600 space-y-1">
                            <li class="font-semibold text-orange-600"><i class="fa-solid fa-key"></i> id <span class="text-slate-400 text-[9px]">(PK)</span></li>
                            <li><i class="fa-solid fa-envelope"></i> email</li>
                            <li><i class="fa-solid fa-lock"></i> password</li>
                            <li><i class="fa-solid fa-user-tag text-orange-500"></i> role</li>
                            <li><i class="fa-solid fa-phone"></i> phone</li>
                        </ul>
                    </div>

                    <!-- User Profiles -->
                    <div id="tb-user_profiles" onmouseenter="highlightRelation('user_profiles')" onmouseleave="clearRelationHighlight()" onclick="showDbSampleData('user_profiles')" class="db-er-card border border-slate-200 hover:border-orange-500 rounded-xl p-4 transition bg-white shadow-sm cursor-pointer">
                        <div class="flex items-center justify-between mb-3 border-b border-slate-100 pb-2">
                            <span class="font-bold text-xs text-slate-800 font-mono"><i class="fa-solid fa-table text-slate-400"></i> user_profiles</span>
                            <span class="text-[9px] bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded font-mono">1:1</span>
                        </div>
                        <ul class="font-mono text-[10.5px] text-slate-600 space-y-1">
                            <li class="font-semibold text-slate-400"><i class="fa-solid fa-key"></i> id <span class="text-[9px]">(PK)</span></li>
                            <li class="font-semibold text-blue-600"><i class="fa-solid fa-link"></i> user_id <span class="text-slate-400 text-[9px]">(FK -> users)</span></li>
                            <li><i class="fa-solid fa-map-marker-alt"></i> address</li>
                            <li><i class="fa-solid fa-city"></i> city</li>
                            <li><i class="fa-solid fa-map"></i> province</li>
                        </ul>
                    </div>

                    <!-- Orders -->
                    <div id="tb-orders" onmouseenter="highlightRelation('orders')" onmouseleave="clearRelationHighlight()" onclick="showDbSampleData('orders')" class="db-er-card border border-slate-200 hover:border-orange-500 rounded-xl p-4 transition bg-white shadow-sm cursor-pointer">
                        <div class="flex items-center justify-between mb-3 border-b border-slate-100 pb-2">
                            <span class="font-bold text-xs text-slate-800 font-mono"><i class="fa-solid fa-table text-slate-400"></i> orders</span>
                            <span class="text-[9px] bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded font-mono">1:N</span>
                        </div>
                        <ul class="font-mono text-[10.5px] text-slate-600 space-y-1">
                            <li class="font-semibold text-orange-600"><i class="fa-solid fa-key"></i> id <span class="text-slate-400 text-[9px]">(PK)</span></li>
                            <li class="font-semibold text-blue-600"><i class="fa-solid fa-link"></i> user_id <span class="text-slate-400 text-[9px]">(FK -> users)</span></li>
                            <li><i class="fa-solid fa-barcode"></i> order_code</li>
                            <li><i class="fa-solid fa-truck"></i> status</li>
                            <li><i class="fa-solid fa-money-bill"></i> total_price</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- TABLE DATAVIEWER -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex flex-col gap-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <h3 class="font-bold text-xs text-slate-800 uppercase tracking-tight flex items-center gap-1.5">
                        <i class="fa-solid fa-table-list text-orange-500"></i> Data SQLite: <span id="dbActiveTableName" class="font-mono text-orange-600 lowercase font-bold">users</span>
                    </h3>
                    <span class="text-[10px] text-slate-400">Klik kartu diagram di atas untuk berganti tabel data</span>
                </div>
                <div class="overflow-x-auto border border-slate-150 rounded-lg">
                    <table class="w-full text-left text-slate-700" id="dbDataViewerTable">
                        <thead class="bg-slate-50 text-[10px] font-bold text-slate-500 border-b border-slate-150">
                            <!-- JS -->
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- JS -->
                        </tbody>
                    </table>
                </div>
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
        const categories = {!! json_encode($categories) !!};
        const products = {!! json_encode($products) !!};
        const tagsData = {!! json_encode($tags) !!};
        const usersData = {!! json_encode($users) !!};
        const userProfilesData = {!! json_encode($userProfiles) !!};
        const ordersData = {!! json_encode($orders) !!};

        // ----------------- CLIENT-SIDE STATE MANAGEMENT -----------------
        let currentRoute = 'home';
        let searchQuery = '';
        let activeCategorySlug = 'all';
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
            }

            nav.innerHTML += createNavLink('database-er', 'fa-solid fa-database', 'Relasi Database SQLite');
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

            // Apply search query
            if (searchQuery) {
                filtered = filtered.filter(p => p.name.toLowerCase().includes(searchQuery) || p.description.toLowerCase().includes(searchQuery));
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
                        <div class="p-4 space-y-1.5">
                            <h4 class="font-bold text-xs text-slate-800 line-clamp-1 uppercase">${p.name}</h4>
                            <p class="text-[11px] text-slate-500 line-clamp-2 h-8">${p.description}</p>
                            <div class="flex items-center justify-between text-xs pt-1 border-t border-slate-50">
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
                        notes: notes
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
            if (loggedInUser.role === 'admin') {
                badge.innerText = 'Akses Penuh (CRUD + Hapus)';
                badge.className = 'text-xs font-bold text-red-600 mt-2';
            } else if (loggedInUser.role === 'manager') {
                badge.innerText = 'Akses Kelola Status & Tambah';
                badge.className = 'text-xs font-bold text-blue-600 mt-2';
            } else {
                badge.innerText = 'Akses Pesan & Lihat Saja';
                badge.className = 'text-xs font-bold text-emerald-600 mt-2';
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
                        notes: notes
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

        // ----------------- DATABASE SCHEMA ER VISUALIZER -----------------
        const erRelations = {
            'users': ['user_profiles', 'orders'],
            'user_profiles': ['users'],
            'orders': ['users']
        };

        function highlightRelation(table) {
            document.querySelectorAll('.db-er-card').forEach(c => {
                c.classList.add('opacity-40');
            });
            const mainCard = document.getElementById(`tb-${table}`);
            if (mainCard) {
                mainCard.classList.remove('opacity-40');
                mainCard.classList.add('border-orange-500', 'shadow-md');
            }

            const connected = erRelations[table] || [];
            connected.forEach(conn => {
                const cCard = document.getElementById(`tb-${conn}`);
                if (cCard) {
                    cCard.classList.remove('opacity-40');
                    cCard.classList.add('border-emerald-500', 'shadow-sm');
                }
            });
        }

        function clearRelationHighlight() {
            document.querySelectorAll('.db-er-card').forEach(c => {
                c.classList.remove('opacity-40', 'border-orange-500', 'border-emerald-500', 'shadow-md', 'shadow-sm');
            });
        }

        function showDbSampleData(table) {
            document.getElementById('dbActiveTableName').innerText = table;
            
            const tableElem = document.getElementById('dbDataViewerTable');
            const thead = tableElem.querySelector('thead');
            const tbody = tableElem.querySelector('tbody');

            thead.innerHTML = '';
            tbody.innerHTML = '';

            let data = [];
            let columns = [];

            if (table === 'users') {
                data = usersData;
                columns = ['id', 'name', 'email', 'role', 'phone'];
            } else if (table === 'user_profiles') {
                data = userProfilesData;
                columns = ['id', 'user_id', 'address', 'city', 'province'];
            } else if (table === 'orders') {
                data = ordersData;
                columns = ['id', 'order_code', 'status', 'total_price', 'shipping_address'];
            }

            // Render Header
            const hTr = document.createElement('tr');
            columns.forEach(col => {
                hTr.innerHTML += `<th class="px-4 py-3 font-semibold uppercase tracking-wider">${col}</th>`;
            });
            thead.appendChild(hTr);

            // Render Rows
            if (data.length === 0) {
                tbody.innerHTML = `<tr><td colspan="${columns.length}" class="px-4 py-6 text-center text-slate-400 italic">Tidak ada baris data.</td></tr>`;
                return;
            }

            data.forEach(row => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50 transition border-b border-slate-100';
                columns.forEach(col => {
                    let val = row[col];
                    if (col === 'total_price') {
                        val = 'Rp ' + Number(val).toLocaleString('id-ID');
                    }
                    tr.innerHTML += `<td class="px-4 py-3 font-mono text-[11px]">${val !== undefined && val !== null ? val : 'null'}</td>`;
                });
                tbody.appendChild(tr);
            });
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
        showDbSampleData('users');

        // Check initial routing based on login status
        if (jwtToken) {
            navigateTo('home');
        } else {
            navigateTo('login');
        }
    </script>
</body>
</html>
