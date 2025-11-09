<div>
    {{-- Hidden inputs untuk data chart --}}
    <input type="hidden" id="totalPemasukan" value="{{ $totalPemasukan }}">
    <input type="hidden" id="totalPengeluaran" value="{{ $totalPengeluaran }}">
    <input type="hidden" id="saldoAkhir" value="{{ $saldoAkhir }}">

    {{-- Statistik Data dengan Design Ultra Modern --}}
    <div class="row mb-5">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="stat-card card-income-glass position-relative overflow-hidden">
                <div class="card-blur-bg"></div>
                <div class="card-content position-relative">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper me-3">
                            <i class="bi bi-arrow-down-circle"></i>
                            <div class="pulse-effect"></div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="card-label mb-1">TOTAL PEMASUKAN</h6>
                            <h3 class="card-value mb-0" id="displayPemasukan">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h3>
                            <div class="card-footer mt-2">
                                <span class="trend-badge success">
                                    <i class="bi bi-graph-up-arrow me-1"></i>
                                    {{ $totalPemasukan > 0 ? number_format(($totalPemasukan/($totalPemasukan+$totalPengeluaran))*100, 1) : 0 }}%
                                </span>
                                <small class="ms-2">Seluruh pemasukan</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="floating-shapes">
                    <div class="shape shape-1"></div>
                    <div class="shape shape-2"></div>
                    <div class="shape shape-3"></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="stat-card card-expense-glass position-relative overflow-hidden">
                <div class="card-blur-bg"></div>
                <div class="card-content position-relative">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper me-3">
                            <i class="bi bi-arrow-up-circle"></i>
                            <div class="pulse-effect"></div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="card-label mb-1">TOTAL PENGELUARAN</h6>
                            <h3 class="card-value mb-0" id="displayPengeluaran">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h3>
                            <div class="card-footer mt-2">
                                <span class="trend-badge danger">
                                    <i class="bi bi-graph-up-arrow me-1"></i>
                                    {{ $totalPengeluaran > 0 ? number_format(($totalPengeluaran/($totalPemasukan+$totalPengeluaran))*100, 1) : 0 }}%
                                </span>
                                <small class="ms-2">Seluruh pengeluaran</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="floating-shapes">
                    <div class="shape shape-1"></div>
                    <div class="shape shape-2"></div>
                    <div class="shape shape-3"></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="stat-card card-balance-glass position-relative overflow-hidden">
                <div class="card-blur-bg"></div>
                <div class="card-content position-relative">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper me-3">
                            <i class="bi bi-wallet2"></i>
                            <div class="pulse-effect"></div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="card-label mb-1">SALDO AKHIR</h6>
                            <h3 class="card-value mb-0" id="displaySaldo">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</h3>
                            <div class="card-footer mt-2">
                                <span class="trend-badge {{ $saldoAkhir >= 0 ? 'success' : 'danger' }}">
                                    <i class="bi bi-{{ $saldoAkhir >= 0 ? 'trending-up' : 'trending-down' }} me-1"></i>
                                    {{ $totalPemasukan > 0 ? number_format(($saldoAkhir/$totalPemasukan)*100, 1) : 0 }}%
                                </span>
                                <small class="ms-2">Saldo saat ini</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="floating-shapes">
                    <div class="shape shape-1"></div>
                    <div class="shape shape-2"></div>
                    <div class="shape shape-3"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Charts Section dengan Glassmorphism --}}
    <div class="row mb-4">
        <div class="col-xl-6 col-lg-12 mb-4">
            <div class="glass-card chart-container-hover">
                <div class="chart-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="chart-title">
                            <i class="bi bi-pie-chart-fill me-2"></i>
                            <span class="title-text">Rasio Keuangan</span>
                        </h5>
                        <div class="chart-actions">
                            <button class="btn-chart-action" title="Refresh">
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>
                        </div>
                    </div>
                    <p class="chart-subtitle">Distribusi Pemasukan vs Pengeluaran</p>
                </div>
                <div id="incomeExpenseChart" class="chart-wrapper"></div>
            </div>
        </div>
        
        <div class="col-xl-6 col-lg-12 mb-4">
            <div class="glass-card chart-container-hover">
                <div class="chart-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="chart-title">
                            <i class="bi bi-graph-up-arrow me-2"></i>
                            <span class="title-text">Tren Saldo</span>
                        </h5>
                        <div class="chart-actions">
                            <button class="btn-chart-action" title="Refresh">
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>
                        </div>
                    </div>
                    <p class="chart-subtitle">Perkembangan saldo 3 bulan terakhir</p>
                </div>
                <div id="balanceTrendChart" class="chart-wrapper"></div>
            </div>
        </div>
    </div>

    {{-- Action Bar dengan Design Modern --}}
    <div class="glass-card action-bar mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="search-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" 
                           class="search-input" 
                           placeholder="Cari berdasarkan deskripsi atau jumlah..." 
                           wire:model.live="search">
                    <div class="search-focus-line"></div>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn-primary-glow" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="bi bi-plus-circle me-2"></i>
                    <span>Tambah Catatan</span>
                    <div class="btn-glow-effect"></div>
                </button>
            </div>
        </div>
    </div>

    {{-- Tabel Data Keuangan dengan Design Premium --}}
    <div class="glass-card table-container">
        <div class="table-responsive">
            <table class="table table-modern">
                <thead class="table-header-glow">
                    <tr>
                        <th width="50" class="text-center">#</th>
                        <th width="120">Tanggal</th>
                        <th width="120">Tipe</th>
                        <th width="150" class="text-end">Jumlah</th>
                        <th>Deskripsi</th>
                        <th width="100" class="text-center">Cover</th>
                        <th width="200" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($records as $index => $record)
                    <tr class="table-row-hover">
                        <td class="text-center serial-number">{{ $records->firstItem() + $index }}</td>
                        <td>
                            <div class="date-cell">
                                <div class="date-day">{{ $record->date->format('d') }}</div>
                                <div class="date-month-year">
                                    <div class="date-month">{{ $record->date->format('M') }}</div>
                                    <div class="date-year">{{ $record->date->format('Y') }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="type-badge type-{{ $record->type }}">
                                <i class="bi bi-arrow-{{ $record->type === 'pemasukan' ? 'down' : 'up' }}-circle me-1"></i>
                                {{ ucfirst($record->type) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="amount-cell {{ $record->type === 'pemasukan' ? 'income' : 'expense' }}">
                                <div class="amount-value">Rp {{ number_format($record->amount, 0, ',', '.') }}</div>
                            </div>
                        </td>
                        <td>
                            <div class="description-cell">
                                <div class="description-text" title="{{ strip_tags($record->description) }}">
                                    {!! Str::limit(strip_tags($record->description), 60) !!}
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            @if($record->cover)
                                <div class="cover-thumbnail">
                                    <img src="{{ Storage::url($record->cover) }}" alt="Cover" 
                                         class="cover-image">
                                    <div class="cover-overlay">
                                        <i class="bi bi-eye"></i>
                                    </div>
                                </div>
                            @else
                                <span class="no-cover">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="action-buttons">
                                {{-- Detail Button --}}
                                <a href="{{ route('app.financial.detail', ['financialRecord' => $record->id]) }}" 
                                   class="btn-action btn-info" 
                                   title="Detail"
                                   data-bs-toggle="tooltip">
                                    <i class="bi bi-eye"></i>
                                </a>
                                
                                {{-- Edit Button --}}
                                <button wire:click="edit({{ $record->id }})" 
                                        class="btn-action btn-warning" 
                                        title="Edit"
                                        data-bs-toggle="tooltip">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                
                                {{-- Cover Button --}}
                                <button wire:click="showEditCoverModal({{ $record->id }})" 
                                        class="btn-action btn-dark" 
                                        title="Ubah Cover"
                                        data-bs-toggle="tooltip">
                                    <i class="bi bi-image"></i>
                                </button>
                                
                                {{-- Delete Button --}}
                                <button wire:click="deleteConfirm({{ $record->id }})" 
                                        class="btn-action btn-danger" 
                                        title="Hapus"
                                        data-bs-toggle="tooltip">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center empty-state">
                            <div class="empty-icon">
                                <i class="bi bi-inbox"></i>
                            </div>
                            <h5 class="empty-title">Belum ada catatan keuangan</h5>
                            <p class="empty-subtitle">Mulai dengan menambahkan catatan keuangan pertama Anda</p>
                            <button class="btn-primary-glow mt-3" data-bs-toggle="modal" data-bs-target="#addModal">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Catatan Pertama
                            </button>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination Modern --}}
        @if($records->hasPages())
        <div class="table-footer">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="pagination-info">
                        Menampilkan <strong>{{ $records->firstItem() }}</strong> - <strong>{{ $records->lastItem() }}</strong> 
                        dari <strong>{{ $records->total() }}</strong> data
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pagination-modern">
                        {{ $records->links() }}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    {{-- Include Modals --}}
    @include('components.modals.financial-records.add')
    @include('components.modals.financial-records.edit')
    @include('components.modals.financial-records.delete')
    @include('components.modals.financial-records.edit-cover')

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --warning-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        /* Stat Cards Modern */
        .stat-card {
            border-radius: 20px;
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            background: var(--glass-bg);
            box-shadow: var(--glass-shadow);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
        }

        .card-income-glass { background: linear-gradient(135deg, rgba(40, 167, 69, 0.9) 0%, rgba(32, 201, 151, 0.9) 100%); }
        .card-expense-glass { background: linear-gradient(135deg, rgba(220, 53, 69, 0.9) 0%, rgba(232, 62, 140, 0.9) 100%); }
        .card-balance-glass { background: linear-gradient(135deg, rgba(0, 123, 255, 0.9) 0%, rgba(111, 66, 193, 0.9) 100%); }

        .stat-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .card-blur-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            filter: blur(10px);
            z-index: 1;
        }

        .card-content {
            z-index: 2;
            position: relative;
        }

        .icon-wrapper {
            position: relative;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .icon-wrapper i {
            font-size: 1.8rem;
            color: white;
        }

        .pulse-effect {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: translate(-50%, -50%) scale(0.8); opacity: 1; }
            100% { transform: translate(-50%, -50%) scale(1.2); opacity: 0; }
        }

        .card-label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.5rem;
        }

        .card-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .trend-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        .trend-badge.success { background: rgba(255, 255, 255, 0.3); color: white; }
        .trend-badge.danger { background: rgba(255, 255, 255, 0.3); color: white; }

        .floating-shapes .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .shape-1 { width: 80px; height: 80px; top: -20px; right: -20px; }
        .shape-2 { width: 40px; height: 40px; bottom: 20px; right: 30px; }
        .shape-3 { width: 60px; height: 60px; bottom: -10px; left: -10px; }

        /* Glass Cards */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--glass-shadow);
            overflow: hidden;
        }

        .chart-container-hover {
            transition: all 0.3s ease;
        }

        .chart-container-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .chart-header {
            padding: 1.5rem 1.5rem 0;
        }

        .chart-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .chart-subtitle {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .chart-wrapper {
            padding: 1rem;
            min-height: 300px;
        }

        /* Action Bar */
        .action-bar {
            padding: 1.5rem;
        }

        .search-container {
            position: relative;
            max-width: 500px;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 2;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border: 1px solid var(--glass-border);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        .btn-primary-glow {
            position: relative;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-primary-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 123, 255, 0.3);
        }

        .btn-glow-effect {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .btn-primary-glow:hover .btn-glow-effect {
            left: 100%;
        }

        /* Modern Table */
        .table-modern {
            --bs-table-bg: transparent;
            margin-bottom: 0;
        }

        .table-header-glow {
            background: linear-gradient(135deg, rgba(0, 123, 255, 0.1) 0%, rgba(111, 66, 193, 0.1) 100%);
            backdrop-filter: blur(10px);
        }

        .table-header-glow th {
            border: none;
            padding: 1rem 0.75rem;
            font-weight: 600;
            color: #2c3e50;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .table-row-hover {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .table-row-hover:hover {
            background: rgba(0, 123, 255, 0.05);
            transform: scale(1.01);
        }

        .serial-number {
            font-weight: 600;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .date-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .date-day {
            font-size: 1.5rem;
            font-weight: 700;
            color: #007bff;
        }

        .date-month-year {
            display: flex;
            flex-direction: column;
        }

        .date-month {
            font-size: 0.8rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .date-year {
            font-size: 0.7rem;
            color: #6c757d;
        }

        .type-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .type-pemasukan {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }

        .type-pengeluaran {
            background: linear-gradient(135deg, #dc3545, #e83e8c);
            color: white;
        }

        .amount-cell {
            padding: 0.5rem 0;
        }

        .amount-value {
            font-weight: 700;
            font-size: 1rem;
        }

        .amount-cell.income .amount-value { color: #28a745; }
        .amount-cell.expense .amount-value { color: #dc3545; }

        .description-cell {
            max-width: 200px;
        }

        .description-text {
            line-height: 1.4;
            color: #2c3e50;
        }

        .cover-thumbnail {
            position: relative;
            width: 50px;
            height: 50px;
            margin: 0 auto;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
        }

        .cover-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .cover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .cover-thumbnail:hover .cover-overlay {
            opacity: 1;
        }

        .cover-thumbnail:hover .cover-image {
            transform: scale(1.1);
        }

        .cover-overlay i {
            color: white;
            font-size: 1.2rem;
        }

        .no-cover {
            color: #6c757d;
            font-style: italic;
        }

        .action-buttons {
            display: flex;
            gap: 0.3rem;
            justify-content: center;
        }

        .btn-action {
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-info { background: linear-gradient(135deg, #17a2b8, #138496); }
        .btn-warning { background: linear-gradient(135deg, #ffc107, #e0a800); }
        .btn-dark { background: linear-gradient(135deg, #343a40, #23272b); }
        .btn-danger { background: linear-gradient(135deg, #dc3545, #c82333); }

        /* Empty State */
        .empty-state {
            padding: 3rem 1rem;
        }

        .empty-icon {
            font-size: 4rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .empty-title {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .empty-subtitle {
            color: #6c757d;
            margin-bottom: 1rem;
        }

        /* Table Footer */
        .table-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--glass-border);
            background: rgba(255, 255, 255, 0.05);
        }

        .pagination-info {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .pagination-modern .pagination {
            justify-content: end;
            margin-bottom: 0;
        }

        .pagination-modern .page-link {
            border: 1px solid var(--glass-border);
            background: rgba(255, 255, 255, 0.9);
            color: #007bff;
            margin: 0 2px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .pagination-modern .page-link:hover {
            background: #007bff;
            color: white;
            transform: translateY(-2px);
        }

        .pagination-modern .page-item.active .page-link {
            background: #007bff;
            border-color: #007bff;
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .stat-card {
                margin-bottom: 1rem;
            }
            
            .card-value {
                font-size: 1.2rem;
            }
            
            .action-buttons {
                flex-wrap: wrap;
                gap: 0.2rem;
            }
            
            .btn-action {
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Format large numbers for display
            function formatLargeNumber(value) {
                if (value >= 1000000000000) {
                    return 'Rp ' + (value / 1000000000000).toFixed(1) + 'T';
                } else if (value >= 1000000000) {
                    return 'Rp ' + (value / 1000000000).toFixed(1) + 'M';
                } else if (value >= 1000000) {
                    return 'Rp ' + (value / 1000000).toFixed(1) + 'Jt';
                } else {
                    return 'Rp ' + value.toLocaleString('id-ID');
                }
            }

            // Update displayed values
            const totalPemasukan = parseFloat(document.getElementById('totalPemasukan')?.value) || 0;
            const totalPengeluaran = parseFloat(document.getElementById('totalPengeluaran')?.value) || 0;
            const saldoAkhir = parseFloat(document.getElementById('saldoAkhir')?.value) || 0;

            document.getElementById('displayPemasukan').textContent = formatLargeNumber(totalPemasukan);
            document.getElementById('displayPengeluaran').textContent = formatLargeNumber(totalPengeluaran);
            document.getElementById('displaySaldo').textContent = formatLargeNumber(saldoAkhir);

            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</div>