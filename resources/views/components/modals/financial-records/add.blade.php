{{-- resources/views/components/modals/financial-records/add.blade.php --}}

<form wire:submit.prevent="create">
    <div class="modal fade" tabindex="-1" id="addModal" wire:ignore.self data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content luxury-add-modal">
                {{-- Animated Background --}}
                <div class="animated-bg-add">
                    <div class="floating-orb-add orb-1"></div>
                    <div class="floating-orb-add orb-2"></div>
                    <div class="floating-orb-add orb-3"></div>
                    <div class="light-streak"></div>
                </div>

                {{-- Modal Header --}}
                <div class="modal-header-add-luxury">
                    <div class="header-glow-add"></div>
                    <div class="header-content-add">
                        <div class="header-icon-add">
                            <div class="icon-circle-add">
                                <i class="bi bi-plus-circle-fill"></i>
                                <div class="icon-pulse-add"></div>
                            </div>
                        </div>
                        <div class="header-text-add">
                            <h5 class="modal-title-add-luxury">Tambah Catatan Keuangan</h5>
                            <p class="modal-subtitle-add">Mulai catat transaksi keuangan Anda</p>
                        </div>
                    </div>
                    <button type="button" class="btn-close-add-luxury" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                {{-- Modal Body --}}
                <div class="modal-body-add-luxury">
                    <div class="form-grid-add">
                        {{-- Tipe Transaksi --}}
                        <div class="form-group-add">
                            <label class="form-label-add">
                                <i class="bi bi-tag-fill me-2"></i>
                                <span>Tipe Transaksi</span>
                                <span class="required-star">*</span>
                            </label>
                            <div class="select-container-add">
                                <select class="form-select-add" wire:model="type" required>
                                    <option value="">Pilih Tipe</option>
                                    <option value="pemasukan">💰 Pemasukan</option>
                                    <option value="pengeluaran">💸 Pengeluaran</option>
                                </select>
                                <div class="select-arrow-add">
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                                <div class="select-glow-add"></div>
                            </div>
                            @error('type')
                                <div class="error-message-add">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Tanggal Transaksi --}}
                        <div class="form-group-add">
                            <label class="form-label-add">
                                <i class="bi bi-calendar2-date-fill me-2"></i>
                                <span>Tanggal</span>
                                <span class="required-star">*</span>
                            </label>
                            <div class="input-container-add">
                                <input type="date" class="form-input-add" wire:model="date" required
                                       max="{{ now()->format('Y-m-d') }}">
                                <div class="input-icon-add">
                                    <i class="bi bi-calendar2-check-fill"></i>
                                </div>
                                <div class="input-glow-add"></div>
                            </div>
                            @error('date')
                                <div class="error-message-add">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Jumlah Uang --}}
                        <div class="form-group-add full-width">
                            <label class="form-label-add">
                                <i class="bi bi-currency-exchange me-2"></i>
                                <span>Jumlah (Rp)</span>
                                <span class="required-star">*</span>
                            </label>
                            <div class="amount-container-add">
                                <div class="currency-prefix-add">
                                    <span>Rp</span>
                                </div>
                                <input type="number" class="form-input-add amount-input-add" wire:model="amount" 
                                       placeholder="Contoh: 500000" min="1" step="1" required>
                                <div class="input-glow-add"></div>
                            </div>
                            @error('amount')
                                <div class="error-message-add">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Deskripsi dengan Trix Editor --}}
                        <div class="form-group-add full-width">
                            <label class="form-label-add">
                                <i class="bi bi-card-text me-2"></i>
                                <span>Deskripsi / Keterangan</span>
                                <span class="required-star">*</span>
                            </label>
                            <div class="editor-container-add" wire:ignore>
                                <input id="description" type="hidden" name="description" wire:model="description">
                                <trix-editor input="description" 
                                            class="trix-editor-add"
                                            placeholder="Tulis deskripsi transaksi di sini..."></trix-editor>
                                <div class="editor-glow-add"></div>
                            </div>
                            @error('description')
                                <div class="error-message-add">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Unggah Gambar Cover --}}
                        <div class="form-group-add full-width">
                            <label class="form-label-add">
                                <i class="bi bi-image me-2"></i>
                                <span>Gambar Bukti (Opsional)</span>
                            </label>
                            <div class="cover-upload-container">
                                @if ($cover)
                                    <div class="cover-preview-add">
                                        <img src="{{ $cover->temporaryUrl() }}" 
                                             class="preview-image">
                                        <div class="preview-overlay">
                                            <button type="button" class="btn-remove-image" 
                                                    wire:click="$set('cover', null)">
                                                <i class="bi bi-x-circle-fill"></i>
                                                <span>Hapus Gambar</span>
                                            </button>
                                        </div>
                                    </div>
                                @else
                                    <div class="upload-placeholder" onclick="document.getElementById('coverInput').click()">
                                        <div class="upload-icon">
                                            <i class="bi bi-cloud-arrow-up-fill"></i>
                                        </div>
                                        <div class="upload-text">
                                            <h6>Klik untuk mengunggah gambar bukti</h6>
                                            <p>Format: JPG, PNG, GIF. Maksimal 2MB</p>
                                        </div>
                                        <input class="form-control" type="file" wire:model="cover" 
                                               accept="image/*" style="display: none;" id="coverInput">
                                    </div>
                                @endif
                            </div>
                            @error('cover')
                                <div class="error-message-add">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Modal Footer --}}
                <div class="modal-footer-add-luxury">
                    <div class="footer-glow-add"></div>
                    {{-- Tombol Batal --}}
                    <button type="button" class="btn-add-luxury btn-cancel-add" data-bs-dismiss="modal">
                        <div class="btn-content-add">
                            <i class="bi bi-x-circle-fill me-2"></i>
                            <span>Batal</span>
                        </div>
                        <div class="btn-glow-add"></div>
                    </button>

                    {{-- Tombol Simpan - FUNGSI TETAP SAMA --}}
                    <button type="submit" class="btn-add-luxury btn-primary-add" wire:loading.attr="disabled">
                        <div class="btn-content-add">
                            <span wire:loading.remove>
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Simpan Catatan</span>
                            </span>
                            <span wire:loading>
                                <i class="bi bi-arrow-repeat spinner-add me-2"></i>
                                <span>Menyimpan...</span>
                            </span>
                        </div>
                        <div class="btn-glow-add"></div>
                        <div class="btn-shine-add"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
    /* Clean & Minimalist Add Modal Style */
    .luxury-add-modal {
        background-color: #f8fafc; /* Solid light gray background */
        border: 1px solid #e2e8f0;
        border-radius: 16px; /* Smaller radius */
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        position: relative;
        overflow: hidden;
    }

    /* Remove animated background effects */
    .animated-bg-add {
        display: none;
    }

    /* Header Styles - Enhanced */
    .modal-header-add-luxury {
        background: #ffffff;
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e2e8f0;
        position: relative;
        z-index: 2;
    }

    .header-glow-add {
        display: none;
    }

    .header-content-add {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .header-icon-add {
        position: relative;
    }

    .icon-circle-add {
        width: 52px;
        height: 52px;
        background: #eff6ff; /* Light blue */
        border: 1px solid #dbeafe;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .icon-circle-add:hover {
        background: #dbeafe;
    }

    .icon-circle-add i {
        font-size: 1.5rem;
        color: #2563eb; /* Primary blue */
    }

    .icon-pulse-add {
        display: none;
    }

    .modal-title-add-luxury {
        color: #1e293b; /* Dark slate */
        font-weight: 700;
        font-size: 1.25rem;
        margin: 0;
    }

    .modal-subtitle-add {
        color: #64748b; /* Medium gray */
        margin: 0.25rem 0 0 0;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .btn-close-add-luxury {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: transparent;
        border: none;
        border-radius: 8px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        transition: all 0.2s ease;
        z-index: 3;
    }

    .btn-close-add-luxury:hover {
        background: #f1f5f9;
        color: #1e293b;
        transform: none;
        box-shadow: none;
    }

    /* Body Styles - Enhanced */
    .modal-body-add-luxury {
        padding: 2rem;
        position: relative;
        z-index: 2;
    }

    .form-grid-add {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    /* Form Groups - Enhanced */
    .form-group-add {
        position: relative;
    }

    .form-label-add {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: #334155;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .form-label-add i {
        color: #64748b;
        font-size: 1rem;
        margin-right: 0.5rem;
    }

    .required-star {
        color: #ef4444;
        margin-left: 4px;
        font-weight: 800;
    }

    /* Select Styles - Enhanced */
    .select-container-add {
        position: relative;
    }

    .form-select-add {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        background-color: #ffffff;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.2s ease;
        appearance: none;
        cursor: pointer;
        color: #334155;
    }

    .form-select-add:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        transform: none;
    }

    .select-arrow-add {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        pointer-events: none;
        font-size: 1rem;
        transition: all 0.2s ease;
    }

    .select-container-add:focus-within .select-arrow-add {
        transform: translateY(-50%) rotate(180deg);
        color: #2563eb;
    }

    .select-glow-add {
        display: none;
    }

    /* Input Styles - Enhanced */
    .input-container-add {
        position: relative;
    }

    .form-input-add {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        background-color: #ffffff;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.2s ease;
        color: #334155;
    }

    .form-input-add:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        transform: none;
    }

    .input-icon-add {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        pointer-events: none;
        font-size: 1rem;
    }

    .input-glow-add {
        display: none;
    }

    /* Amount Input - Enhanced */
    .amount-container-add {
        position: relative;
        display: flex;
        align-items: center;
    }

    .currency-prefix-add {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        font-weight: 600;
        font-size: 0.95rem;
        z-index: 2;
    }

    .amount-input-add {
        padding-left: 50px !important;
        font-weight: 600;
        color: #1e293b;
    }

    /* Trix Editor - Enhanced */
    .editor-container-add {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
    }

    .trix-editor-add {
        border: 1px solid #cbd5e1 !important;
        border-radius: 8px !important;
        background: #ffffff !important;
        min-height: 140px;
        padding: 1rem !important;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        color: #334155;
    }

    .trix-editor-add:focus {
        border-color: #2563eb !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2) !important;
        transform: none;
    }

    .editor-glow-add {
        display: none;
    }

    /* Cover Upload - Enhanced */
    .cover-upload-container {
        border-radius: 8px;
        overflow: hidden;
    }

    .cover-preview-add {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .cover-preview-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
    }

    .preview-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .preview-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(29, 78, 216, 0.8); /* Dark blue overlay */
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.4s ease;
    }

    .cover-preview-add:hover .preview-overlay {
        opacity: 1;
    }

    .cover-preview-add:hover .preview-image {
        transform: scale(1.1);
    }

    .btn-remove-image {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 999px;
        padding: 8px 16px;
        color: white;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-remove-image:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.05);
    }

    .upload-placeholder {
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        padding: 2.5rem 2rem;
        text-align: center;
        background: #ffffff;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .upload-placeholder:hover {
        border-color: #2563eb;
        background: #eff6ff;
    }

    .upload-icon {
        font-size: 2.5rem;
        color: #2563eb;
        margin-bottom: 1rem;
    }

    .upload-text h6 {
        color: #374151;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .upload-text p {
        color: #64748b;
        margin: 0;
        font-size: 0.875rem;
        font-weight: 500;
    }

    /* Error Messages - Enhanced */
    .error-message-add {
        color: #ef4444;
        font-size: 0.88rem;
        margin-top: 0.75rem;
        display: flex;
        align-items: center;
        font-weight: 500;
        background: rgba(239, 68, 68, 0.1);
        padding: 0.6rem 1rem;
        border-radius: 12px;
        border-left: 4px solid #ef4444;
    }

    .error-message-add i {
        font-size: 1rem;
        margin-right: 0.5rem;
    }

    /* Footer Styles - Enhanced */
    .modal-footer-add-luxury {
        padding: 1.5rem 2rem;
        background: #f1f5f9;
        border-top: 1px solid #e2e8f0;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        position: relative;
        z-index: 2;
    }

    .footer-glow-add {
        display: none;
    }

    /* Button Styles - Enhanced */
    .btn-add-luxury {
        position: relative;
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        transition: all 0.2s ease;
        overflow: hidden;
        cursor: pointer;
        min-width: 120px;
        justify-content: center;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .btn-content-add {
        display: flex;
        align-items: center;
    }

    .btn-cancel-add {
        background: #ffffff;
        color: #475569;
        border: 1px solid #cbd5e1;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .btn-cancel-add:hover {
        background-color: #f8fafc;
        transform: none;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .btn-primary-add {
        background: #2563eb; /* Primary Blue */
        color: white;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .btn-primary-add:hover:not(:disabled) {
        background: #1d4ed8; /* Darker Blue */
        transform: none;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .btn-primary-add:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none !important;
    }

    .btn-glow-add {
        display: none;
    }

    .btn-shine-add {
        display: none;
    }

    .spinner-add {
        animation: spin 1s linear infinite;
    }

    /* Responsive */
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @media (max-width: 768px) {
        .form-grid-add {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .modal-header-add-luxury {
            padding: 1.5rem;
        }
        
        .modal-body-add-luxury {
            padding: 1.5rem;
        }
        
        .modal-footer-add-luxury {
            padding: 1.5rem;
            flex-direction: column;
        }
        
        .btn-add-luxury {
            width: 100%;
            padding: 14px 24px;
        }
        
        .header-content-add {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .icon-circle-add {
            width: 48px;
            height: 48px;
        }
        
        .icon-circle-add i {
            font-size: 1.4rem;
        }

        .modal-title-add-luxury {
            font-size: 1.15rem;
        }

        .upload-placeholder {
            padding: 2.5rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .luxury-add-modal { /* Renamed from .luxury-add-modal */
            border-radius: 12px;
            margin: 1rem;
        }
        
        .modal-body-add-luxury {
            padding: 1.25rem;
        }
        
        .form-input-add,
        .form-select-add {
            padding: 12px 14px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Trix Editor configuration
        const trixEditor = document.querySelector('trix-editor');
        if (trixEditor) {
            trixEditor.addEventListener('trix-change', function(event) {
                @this.set('description', event.target.innerHTML);
            });

            // Hide file tools in Trix toolbar
            document.addEventListener('trix-initialize', function(event) {
                const fileTools = event.target.toolbarElement.querySelector('[data-trix-button-group="file-tools"]');
                if (fileTools) {
                    fileTools.style.display = 'none';
                }
            });
        }
    });
</script>