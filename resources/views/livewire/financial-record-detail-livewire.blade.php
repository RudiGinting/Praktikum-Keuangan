<style>
    /* === Tema Elegan & Mewah V2 === */
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #eef2f7 100%);
        font-family: "Poppins", sans-serif;
        color: #4a5568; /* Dark Gray for text */
    }

    .card {
        border-radius: 1.5rem !important;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.6) !important;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(15px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        border: none;
        background: #ffffff;
        border-bottom: 1px solid #e2e8f0 !important;
        color: #2d3748 !important;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .card-title i {
        color: #4299e1; /* Soft Blue */
    }

    .btn-light {
        background-color: #edf2f7;
        border: 1px solid #e2e8f0;
        color: #4a5568;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-light:hover {
        background-color: #e2e8f0;
        color: #2d3748;
        border-color: #cbd5e1;
        transform: translateY(-2px);
    }

    .card-body dl dt {
        font-weight: 500;
        color: #718096; /* Medium Gray */
    }

    .card-body dl dd {
        color: #2d3748; /* Darker Gray */
    }

    .badge {
        padding: 0.6em 1em;
        font-size: 0.9rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .badge.bg-success {
        background: linear-gradient(135deg, #48bb78, #38a169) !important;
        color: #fff !important;
    }

    .badge.bg-danger {
        background: linear-gradient(135deg, #f56565, #e53e3e) !important;
        color: #fff !important;
    }

    .border.rounded.p-3.bg-light {
        background-color: #f7fafc !important;
        border: 1px solid #edf2f7 !important;
        border-radius: 1rem !important;
        color: #4a5568;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.04);
    }

    img.rounded.shadow {
        border: 4px solid #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    img.rounded.shadow:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .alert {
        border-radius: 1rem;
        background: linear-gradient(135deg, #fff5f5, #fed7d7);
        border: 1px solid #fbb6b6;
        color: #9b2c2c;
    }

    .alert i {
        color: #e53e3e;
    }

    .alert .btn-primary {
        background-color: #e53e3e;
        border-color: #c53030;
    }

    .alert .btn-primary:hover {
        background-color: #c53030;
        border-color: #9b2c2c;
    }

    .card-header.bg-light.py-3.text-primary {
        background-color: #f7fafc !important;
        color: #4299e1 !important;
        border-bottom: 1px solid #e2e8f0 !important;
        border-radius: 1rem 1rem 0 0;
    }

    .card.border-0.shadow-sm {
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05) !important;
        border-radius: 1rem;
    }

    /* Animasi lembut */
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="container fade-in">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-file-text me-2"></i>Detail Catatan Keuangan
                        </h5>
                        <a href="{{ route('app.home') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body p-4">
                    @if ($record)
                        <div class="row">
                            {{-- Informasi Transaksi --}}
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-light py-3 text-primary">
                                        <h6 class="mb-0">
                                            <i class="bi bi-info-circle me-2"></i>Informasi Transaksi
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4">Tanggal</dt>
                                            <dd class="col-sm-8 fw-bold">{{ $record->date->format('d F Y') }}</dd>

                                            <dt class="col-sm-4">Tipe</dt>
                                            <dd class="col-sm-8">
                                                @if ($record->type == 'pemasukan')
                                                    <span class="badge bg-success rounded-pill shadow-sm">
                                                        <i class="bi bi-arrow-down-circle me-1"></i>Pemasukan
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger rounded-pill shadow-sm">
                                                        <i class="bi bi-arrow-up-circle me-1"></i>Pengeluaran
                                                    </span>
                                                @endif
                                            </dd>

                                            <dt class="col-sm-4">Jumlah</dt>
                                            <dd class="col-sm-8 fw-bold fs-4 {{ $record->type == 'pemasukan' ? 'text-success' : 'text-danger' }}">
                                                Rp {{ number_format($record->amount, 0, ',', '.') }}
                                            </dd>

                                            <dt class="col-sm-4">Deskripsi</dt>
                                            <dd class="col-sm-8">
                                                <div class="border rounded p-3 bg-light">
                                                    {!! $record->description !!}
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                            {{-- Bukti Cover --}}
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light py-3 text-primary">
                                        <h6 class="mb-0">
                                            <i class="bi bi-image me-2"></i>Bukti (Cover)
                                        </h6>
                                    </div>
                                    <div class="card-body text-center">
                                        @if ($record->cover)
                                            <div class="mb-4">
                                                <img src="{{ Storage::url($record->cover) }}" 
                                                     alt="Cover Bukti" 
                                                     class="img-fluid rounded shadow" 
                                                     style="max-height: 300px; max-width: 100%;">
                                            </div>
                                            <!-- <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                <button 
                                                    wire:click="deleteCover" 
                                                    wire:confirm="Anda yakin ingin menghapus cover ini?"
                                                    class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash me-1"></i> Hapus Cover
                                                </button>
                                                <button 
                                                    wire:click="showEditCoverModal({{ $record->id }})"
                                                    class="btn btn-outline-primary btn-sm">
                                                    <i class="bi bi-image me-1"></i> Ubah Cover
                                                </button>
                                            </div> -->
                                        @else
                                            <div class="text-center text-muted py-5">
                                                <i class="bi bi-image display-1 opacity-25 mb-3"></i>
                                                <p class="mb-3 fs-5">Tidak ada bukti gambar.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <div class="d-flex justify-content-center gap-3">
                                    <!-- tombol aksi jika ada -->
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger text-center py-4">
                            <i class="bi bi-exclamation-triangle display-4 mb-3"></i>
                            <h5>Gagal memuat data catatan</h5>
                            <p class="mb-0">Catatan tidak ditemukan atau telah dihapus</p>
                            <a href="{{ route('app.home') }}" class="btn btn-primary mt-3">
                                <i class="bi bi-arrow-left me-1"></i> Kembali ke Home
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
