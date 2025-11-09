<style>
    /* === Tema Mewah & Elegan === */
    body {
        background: linear-gradient(135deg, #e6ecff 0%, #f9f9ff 100%);
        font-family: "Poppins", sans-serif;
    }

    .card {
        border-radius: 1.25rem !important;
        overflow: hidden;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        background: rgba(255, 255, 255, 0.85);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border: none;
        background: linear-gradient(90deg, #0d6efd, #4e9eff);
        color: #fff !important;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .card-title i {
        color: #ffc107;
    }

    .btn-light {
        background-color: #fff;
        border: none;
        color: #0d6efd;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-light:hover {
        background-color: #e7f0ff;
        color: #084298;
    }

    .card-body dl dt {
        font-weight: 500;
        color: #6c757d;
    }

    .card-body dl dd {
        color: #212529;
    }

    .badge {
        padding: 0.6em 1em;
        font-size: 0.9rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .border.rounded.p-3.bg-light {
        background-color: #f8f9fa !important;
        border: 1px solid #dee2e6 !important;
        border-radius: 0.75rem !important;
    }

    img.rounded.shadow {
        border: 3px solid #fff;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    img.rounded.shadow:hover {
        transform: scale(1.03);
    }

    .btn-outline-danger, .btn-outline-primary {
        border-width: 2px;
        font-weight: 500;
        transition: all 0.3s ease;
        border-radius: 50px;
        padding: 0.4rem 1rem;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: #fff;
    }

    .alert {
        border-radius: 1rem;
        background: linear-gradient(135deg, #ffe8e8, #fff4f4);
        border: 1px solid #f5c2c7;
    }

    .alert i {
        color: #dc3545;
    }

    /* Animasi lembut */
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
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
