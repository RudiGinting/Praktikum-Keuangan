<div>
    {{-- Hidden inputs untuk data chart --}}
    <input type="hidden" id="totalPemasukan" value="{{ $totalPemasukan }}">
    <input type="hidden" id="totalPengeluaran" value="{{ $totalPengeluaran }}">
    <input type="hidden" id="saldoAkhir" value="{{ $saldoAkhir }}">

    {{-- Statistik Data dengan Design yang Lebih Bersih --}}
    <div class="row mb-5">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="stat-card card-income position-relative overflow-hidden">
                <div class="card-content">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper me-3">
                            <i class="bi bi-arrow-down-circle"></i>
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
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="stat-card card-expense position-relative overflow-hidden">
                <div class="card-content">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper me-3">
                            <i class="bi bi-arrow-up-circle"></i>
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
            </div>
        </div>
        
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="stat-card card-balance position-relative overflow-hidden">
                <div class="card-content">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper me-3">
                            <i class="bi bi-wallet2"></i>
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
            </div>
        </div>
    </div>

    {{-- Charts Section dengan Desain Lebih Bersih --}}
    <div class="row mb-4">
        <div class="col-xl-6 col-lg-12 mb-4">
            <div class="chart-card">
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
            <div class="chart-card">
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

    {{-- Action Bar dengan Desain Minimalis --}}
    <div class="action-bar mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="search-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" 
                           class="search-input" 
                           placeholder="Cari berdasarkan deskripsi atau jumlah..." 
                           wire:model.live="search">
                </div>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="bi bi-plus-circle me-2"></i>
                    <span>Tambah Catatan</span>
                </button>
            </div>
        </div>
    </div>

    {{-- Tabel Data Keuangan dengan Desain Lebih Bersih --}}
    <div class="table-card">
        <div class="table-responsive">
            <table class="table table-modern">
                <thead class="table-header">
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
                    <tr class="table-row">
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
                            <button class="btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addModal">
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
        /* Stat Cards Modern */
        .stat-card {
            border-radius: 12px;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
            padding: 1.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card-income { border-left: 4px solid #28a745; }
        .card-expense { border-left: 4px solid #dc3545; }
        .card-balance { border-left: 4px solid #007bff; }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-income .icon-wrapper { background: rgba(40, 167, 69, 0.1); }
        .card-expense .icon-wrapper { background: rgba(220, 53, 69, 0.1); }
        .card-balance .icon-wrapper { background: rgba(0, 123, 255, 0.1); }

        .icon-wrapper i {
            font-size: 1.5rem;
        }

        .card-income .icon-wrapper i { color: #28a745; }
        .card-expense .icon-wrapper i { color: #dc3545; }
        .card-balance .icon-wrapper i { color: #007bff; }

        .card-label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }

        .card-value {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .trend-badge {
            padding: 0.25rem 0.6rem;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .trend-badge.success { background: rgba(40, 167, 69, 0.1); color: #28a745; }
        .trend-badge.danger { background: rgba(220, 53, 69, 0.1); color: #dc3545; }

        .card-footer small {
            color: #6c757d;
            font-size: 0.75rem;
        }

        /* Chart Cards */
        .chart-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .chart-card:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        .chart-header {
            padding: 1.25rem 1.5rem 0;
        }

        .chart-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 0.25rem;
            font-size: 1.1rem;
        }

        .chart-subtitle {
            color: #6c757d;
            font-size: 0.85rem;
            margin-bottom: 0;
        }

        .chart-wrapper {
            padding: 1rem;
            min-height: 280px;
        }

        .btn-chart-action {
            background: transparent;
            border: none;
            color: #6c757d;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-chart-action:hover {
            background: rgba(0, 0, 0, 0.05);
            color: #2c3e50;
        }

        /* Action Bar */
        .action-bar {
            padding: 1.25rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .search-container {
            position: relative;
            max-width: 500px;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 2;
        }

        .search-input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background: white;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .search-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        .btn-primary {
            background: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-primary:hover {
            background: #0069d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }

        /* Modern Table */
        .table-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .table-modern {
            --bs-table-bg: transparent;
            margin-bottom: 0;
        }

        .table-header {
            background: #f8f9fa;
        }

        .table-header th {
            border: none;
            padding: 1rem 0.75rem;
            font-weight: 600;
            color: #2c3e50;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e9ecef;
        }

        .table-row {
            transition: all 0.2s ease;
            border-bottom: 1px solid #f1f3f4;
        }

        .table-row:hover {
            background: #f8f9fa;
        }

        .serial-number {
            font-weight: 600;
            color: #6c757d;
            font-size: 0.85rem;
        }

        .date-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .date-day {
            font-size: 1.3rem;
            font-weight: 700;
            color: #007bff;
        }

        .date-month-year {
            display: flex;
            flex-direction: column;
        }

        .date-month {
            font-size: 0.75rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .date-year {
            font-size: 0.7rem;
            color: #6c757d;
        }

        .type-badge {
            padding: 0.35rem 0.7rem;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .type-pemasukan {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.2);
        }

        .type-pengeluaran {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .amount-cell {
            padding: 0.5rem 0;
        }

        .amount-value {
            font-weight: 700;
            font-size: 0.9rem;
        }

        .amount-cell.income .amount-value { color: #28a745; }
        .amount-cell.expense .amount-value { color: #dc3545; }

        .description-cell {
            max-width: 200px;
        }

        .description-text {
            line-height: 1.4;
            color: #2c3e50;
            font-size: 0.9rem;
        }

        .cover-thumbnail {
            position: relative;
            width: 45px;
            height: 45px;
            margin: 0 auto;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            border: 1px solid #e9ecef;
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
            font-size: 1rem;
        }

        .no-cover {
            color: #6c757d;
            font-style: italic;
            font-size: 0.85rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.3rem;
            justify-content: center;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
        }

        .btn-info { background: #17a2b8; }
        .btn-warning { background: #ffc107; }
        .btn-dark { background: #343a40; }
        .btn-danger { background: #dc3545; }

        /* Empty State */
        .empty-state {
            padding: 2.5rem 1rem;
        }

        .empty-icon {
            font-size: 3rem;
            color: #adb5bd;
            margin-bottom: 1rem;
        }

        .empty-title {
            color: #495057;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .empty-subtitle {
            color: #6c757d;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        /* Table Footer */
        .table-footer {
            padding: 1.25rem;
            border-top: 1px solid #e9ecef;
            background: #f8f9fa;
        }

        .pagination-info {
            color: #6c757d;
            font-size: 0.85rem;
        }

        .pagination-modern .pagination {
            justify-content: end;
            margin-bottom: 0;
        }

        .pagination-modern .page-link {
            border: 1px solid #dee2e6;
            background: white;
            color: #007bff;
            margin: 0 2px;
            border-radius: 6px;
            transition: all 0.2s ease;
            font-size: 0.85rem;
            padding: 0.4rem 0.75rem;
        }

        .pagination-modern .page-link:hover {
            background: #007bff;
            color: white;
            border-color: #007bff;
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
                padding: 1.25rem;
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
                font-size: 0.75rem;
            }
            
            .chart-header {
                padding: 1rem 1rem 0;
            }
            
            .action-bar {
                padding: 1rem;
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