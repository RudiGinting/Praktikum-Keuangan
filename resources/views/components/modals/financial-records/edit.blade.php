<form wire:submit.prevent="update">
    <div class="modal fade" tabindex="-1" id="editModal" wire:ignore.self data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content luxury-modal">
                {{-- Modal Background Effects --}}
                <div class="modal-bg-effects">
                    <div class="floating-orb orb-1"></div>
                    <div class="floating-orb orb-2"></div>
                    <div class="floating-orb orb-3"></div>
                    <div class="light-beam"></div>
                </div>

                {{-- Modal Header --}}
                <div class="modal-header-luxury">
                    <div class="header-glow"></div>
                    <div class="header-content">
                        <div class="header-icon-wrapper">
                            <div class="icon-circle">
                                <i class="bi bi-pencil-square"></i>
                                <div class="icon-pulse"></div>
                            </div>
                        </div>
                        <div class="header-text">
                            <h5 class="modal-title-luxury">Edit Catatan Keuangan</h5>
                            <p class="modal-subtitle-luxury">Perbarui informasi transaksi finansial Anda</p>
                        </div>
                    </div>
                    <button type="button" class="btn-close-luxury" data-bs-dismiss="modal" wire:click="batal">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                {{-- Modal Body --}}
                <div class="modal-body-luxury">
                    <div class="form-grid-luxury">
                        {{-- Tipe Transaksi --}}
                        <div class="form-group-luxury">
                            <label class="form-label-luxury">
                                <i class="bi bi-tag-fill me-2"></i>
                                <span>Tipe Transaksi</span>
                                <span class="required-star">*</span>
                            </label>
                            <div class="select-container-luxury">
                                <select class="form-select-luxury" wire:model="type" required>
                                    <option value="pemasukan">💰 Pemasukan</option>
                                    <option value="pengeluaran">💸 Pengeluaran</option>
                                </select>
                                <div class="select-arrow-luxury">
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                                <div class="select-glow"></div>
                            </div>
                            @error('type')
                                <div class="error-message-luxury">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Tanggal Transaksi --}}
                        <div class="form-group-luxury">
                            <label class="form-label-luxury">
                                <i class="bi bi-calendar2-date-fill me-2"></i>
                                <span>Tanggal Transaksi</span>
                                <span class="required-star">*</span>
                            </label>
                            <div class="date-input-container">
                                <input type="date" class="form-input-luxury date-input" 
                                       wire:model="date" 
                                       max="{{ now()->format('Y-m-d') }}"
                                       required>
                                <div class="input-icon-luxury">
                                    <i class="bi bi-calendar2-check-fill"></i>
                                </div>
                                <div class="input-glow"></div>
                            </div>
                            @error('date')
                                <div class="error-message-luxury">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Jumlah Uang --}}
                        <div class="form-group-luxury full-width">
                            <label class="form-label-luxury">
                                <i class="bi bi-currency-exchange me-2"></i>
                                <span>Jumlah Transaksi</span>
                                <span class="required-star">*</span>
                            </label>
                            <div class="amount-container-luxury">
                                <div class="currency-prefix">
                                    <span>Rp</span>
                                </div>
                                <input type="number" 
                                       class="form-input-luxury amount-input" 
                                       wire:model="amount"
                                       placeholder="0"
                                       min="1" 
                                       step="1" 
                                       required>
                                <div class="input-glow"></div>
                            </div>
                            @error('amount')
                                <div class="error-message-luxury">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group-luxury full-width">
                            <label class="form-label-luxury">
                                <i class="bi bi-card-text me-2"></i>
                                <span>Deskripsi & Keterangan</span>
                                <span class="required-star">*</span>
                            </label>
                            <div class="editor-container-luxury" wire:ignore>
                                <input id="editDescription" type="hidden" name="description" wire:model="description">
                                <trix-editor input="editDescription" 
                                            class="trix-editor-luxury"
                                            placeholder="Tulis deskripsi lengkap transaksi Anda di sini..."></trix-editor>
                                <div class="editor-glow"></div>
                            </div>
                            @error('description')
                                <div class="error-message-luxury">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Current Cover --}}
                        @if ($editCover)
                            <div class="form-group-luxury full-width">
                                <label class="form-label-luxury">
                                    <i class="bi bi-image-fill me-2"></i>
                                    <span>Bukti Gambar Saat Ini</span>
                                </label>
                                <div class="current-cover-luxury">
                                    <div class="cover-image-container">
                                        <img src="{{ Storage::url($editCover) }}" 
                                             alt="Cover Bukti" 
                                             class="cover-image-luxury">
                                        <div class="cover-overlay-luxury">
                                            <div class="cover-badge">
                                                <i class="bi bi-check-circle-fill me-1"></i>
                                                Gambar Terpasang
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cover-info">
                                        <p class="cover-note">
                                            <i class="bi bi-info-circle-fill me-1"></i>
                                            Gunakan tombol "Ubah Cover" di tabel untuk mengganti gambar ini
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Modal Footer --}}
                <div class="modal-footer-luxury">
                    <div class="footer-glow"></div>
                    <button type="submit" class="btn-luxury btn-primary-luxury" wire:loading.attr="disabled">
                        <div class="btn-content">
                            <span wire:loading.remove>
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Perbarui Data</span>
                            </span>
                            <span wire:loading>
                                <i class="bi bi-arrow-repeat spinner-luxury me-2"></i>
                                <span>Memproses...</span>
                            </span>
                        </div>
                        <div class="btn-glow"></div>
                        <div class="btn-shine"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
    /* Luxury Modal Design */
    .luxury-modal {
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.95) 0%, 
            rgba(255, 255, 255, 0.98) 100%);
        backdrop-filter: blur(60px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 28px;
        box-shadow: 
            0 35px 80px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.8),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    /* Background Effects */
    .modal-bg-effects {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
        z-index: 1;
    }

    .floating-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(40px);
        opacity: 0.6;
        animation: float 6s ease-in-out infinite;
    }

    .orb-1 {
        width: 200px;
        height: 200px;
        background: linear-gradient(45deg, #667eea, #764ba2);
        top: -100px;
        right: -100px;
        animation-delay: 0s;
    }

    .orb-2 {
        width: 150px;
        height: 150px;
        background: linear-gradient(45deg, #f093fb, #f5576c);
        bottom: -75px;
        left: -75px;
        animation-delay: 2s;
    }

    .orb-3 {
        width: 100px;
        height: 100px;
        background: linear-gradient(45deg, #4facfe, #00f2fe);
        top: 50%;
        left: 50%;
        animation-delay: 4s;
    }

    .light-beam {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(255, 255, 255, 0.8), 
            transparent);
        animation: beamMove 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    @keyframes beamMove {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Header */
    .modal-header-luxury {
        background: linear-gradient(135deg, 
            rgba(102, 126, 234, 0.9) 0%, 
            rgba(118, 75, 162, 0.9) 100%);
        padding: 2.5rem 2.5rem 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
        z-index: 2;
    }

    .header-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: linear-gradient(180deg, 
            rgba(255, 255, 255, 0.2) 0%, 
            transparent 100%);
        pointer-events: none;
    }

    .header-content {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .header-icon-wrapper {
        position: relative;
    }

    .icon-circle {
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(20px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }

    .icon-circle i {
        font-size: 2rem;
        color: white;
    }

    .icon-pulse {
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border: 2px solid rgba(255, 255, 255, 0.6);
        border-radius: 25px;
        animation: pulse 2s ease-out infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        100% { transform: scale(1.2); opacity: 0; }
    }

    .modal-title-luxury {
        color: white;
        font-weight: 800;
        font-size: 1.8rem;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .modal-subtitle-luxury {
        color: rgba(255, 255, 255, 0.9);
        margin: 0.5rem 0 0 0;
        font-size: 1rem;
        font-weight: 500;
    }

    .btn-close-luxury {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        backdrop-filter: blur(20px);
        transition: all 0.3s ease;
        z-index: 3;
    }

    .btn-close-luxury:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg) scale(1.1);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    }

    /* Body */
    .modal-body-luxury {
        padding: 2.5rem;
        position: relative;
        z-index: 2;
    }

    .form-grid-luxury {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    /* Form Groups */
    .form-group-luxury {
        position: relative;
    }

    .form-label-luxury {
        display: flex;
        align-items: center;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1rem;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-label-luxury i {
        color: #667eea;
        font-size: 1.1rem;
    }

    .required-star {
        color: #e53e3e;
        margin-left: 4px;
    }

    /* Select Styles */
    .select-container-luxury {
        position: relative;
    }

    .form-select-luxury {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid rgba(102, 126, 234, 0.3);
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        font-size: 1rem;
        font-weight: 500;
        transition: all 0.3s ease;
        appearance: none;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .form-select-luxury:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 
            0 0 0 4px rgba(102, 126, 234, 0.1),
            0 8px 30px rgba(102, 126, 234, 0.2);
        background: rgba(255, 255, 255, 0.95);
        transform: translateY(-2px);
    }

    .select-arrow-luxury {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #667eea;
        pointer-events: none;
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .select-container-luxury:focus-within .select-arrow-luxury {
        transform: translateY(-50%) rotate(180deg);
    }

    .select-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 16px;
        background: linear-gradient(135deg, 
            rgba(102, 126, 234, 0.1) 0%, 
            transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .select-container-luxury:focus-within .select-glow {
        opacity: 1;
    }

    /* Date Input */
    .date-input-container {
        position: relative;
    }

    .date-input {
        cursor: pointer;
    }

    .date-input::-webkit-calendar-picker-indicator {
        background: transparent;
        bottom: 0;
        color: transparent;
        cursor: pointer;
        height: auto;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: auto;
    }

    .form-input-luxury {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid rgba(102, 126, 234, 0.3);
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        font-size: 1rem;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .form-input-luxury:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 
            0 0 0 4px rgba(102, 126, 234, 0.1),
            0 8px 30px rgba(102, 126, 234, 0.2);
        background: rgba(255, 255, 255, 0.95);
        transform: translateY(-2px);
    }

    .input-icon-luxury {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #667eea;
        pointer-events: none;
        font-size: 1.2rem;
    }

    .input-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 16px;
        background: linear-gradient(135deg, 
            rgba(102, 126, 234, 0.1) 0%, 
            transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .date-input-container:focus-within .input-glow,
    .amount-container-luxury:focus-within .input-glow {
        opacity: 1;
    }

    /* Amount Input */
    .amount-container-luxury {
        position: relative;
        display: flex;
        align-items: center;
    }

    .currency-prefix {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #28a745;
        font-weight: 700;
        font-size: 1.1rem;
        z-index: 2;
    }

    .amount-input {
        padding-left: 60px !important;
        font-size: 1.1rem;
        font-weight: 600;
    }

    /* Trix Editor */
    .editor-container-luxury {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .trix-editor-luxury {
        border: 2px solid rgba(102, 126, 234, 0.3) !important;
        border-radius: 16px !important;
        background: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(20px);
        min-height: 150px;
        padding: 1.5rem !important;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .trix-editor-luxury:focus {
        border-color: #667eea !important;
        box-shadow: 
            0 0 0 4px rgba(102, 126, 234, 0.1),
            0 8px 30px rgba(102, 126, 234, 0.2) !important;
        background: rgba(255, 255, 255, 0.95) !important;
        transform: translateY(-2px);
    }

    .editor-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 16px;
        background: linear-gradient(135deg, 
            rgba(102, 126, 234, 0.1) 0%, 
            transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .editor-container-luxury:focus-within .editor-glow {
        opacity: 1;
    }

    /* Current Cover */
    .current-cover-luxury {
        text-align: center;
    }

    .cover-image-container {
        position: relative;
        display: inline-block;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .cover-image-luxury {
        width: 250px;
        height: 180px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .cover-overlay-luxury {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, 
            rgba(102, 126, 234, 0.8) 0%, 
            rgba(118, 75, 162, 0.8) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .cover-image-container:hover .cover-overlay-luxury {
        opacity: 1;
    }

    .cover-image-container:hover .cover-image-luxury {
        transform: scale(1.05);
    }

    .cover-badge {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(20px);
        padding: 10px 20px;
        border-radius: 25px;
        color: white;
        font-weight: 600;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .cover-info {
        margin-top: 1rem;
    }

    .cover-note {
        color: #6c757d;
        font-size: 0.9rem;
        margin: 0;
    }

    /* Error Messages */
    .error-message-luxury {
        color: #e53e3e;
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        font-weight: 500;
    }

    .error-message-luxury i {
        font-size: 0.9rem;
    }

    /* Footer */
    .modal-footer-luxury {
        padding: 2rem 2.5rem;
        background: linear-gradient(180deg, 
            rgba(248, 249, 250, 0.9) 0%, 
            rgba(255, 255, 255, 0.9) 100%);
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        position: relative;
        z-index: 2;
    }

    .footer-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(102, 126, 234, 0.5), 
            transparent);
    }

    /* Buttons */
    .btn-luxury {
        position: relative;
        padding: 16px 32px;
        border: none;
        border-radius: 16px;
        font-weight: 700;
        font-size: 1rem;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        overflow: hidden;
        backdrop-filter: blur(20px);
        cursor: pointer;
        min-width: 140px;
        justify-content: center;
    }

    .btn-content {
        display: flex;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .btn-secondary-luxury {
        background: linear-gradient(135deg, 
            rgba(108, 117, 125, 0.9) 0%, 
            rgba(73, 80, 87, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 20px rgba(108, 117, 125, 0.3);
    }

    .btn-secondary-luxury:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(108, 117, 125, 0.4);
    }

    .btn-primary-luxury {
        background: linear-gradient(135deg, 
            rgba(102, 126, 234, 0.9) 0%, 
            rgba(118, 75, 162, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 4px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-primary-luxury:hover:not(:disabled) {
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(102, 126, 234, 0.6);
    }

    .btn-primary-luxury:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none !important;
    }

    .btn-glow {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(255, 255, 255, 0.4), 
            transparent);
        transition: left 0.6s ease;
    }

    .btn-luxury:hover .btn-glow {
        left: 100%;
    }

    .btn-shine {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, 
            transparent, 
            rgba(255, 255, 255, 0.1), 
            transparent);
        transform: rotate(45deg);
        animation: shine 3s ease-in-out infinite;
    }

    @keyframes shine {
        0% { transform: rotate(45deg) translateX(-100%); }
        100% { transform: rotate(45deg) translateX(100%); }
    }

    .spinner-luxury {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-grid-luxury {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .modal-header-luxury {
            padding: 2rem 1.5rem 1.5rem;
        }
        
        .modal-body-luxury {
            padding: 2rem 1.5rem;
        }
        
        .modal-footer-luxury {
            padding: 1.5rem;
            flex-direction: column;
        }
        
        .btn-luxury {
            width: 100%;
        }
        
        .header-content {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .icon-circle {
            width: 60px;
            height: 60px;
        }
        
        .icon-circle i {
            font-size: 1.5rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Trix Editor for edit modal
        const editTrixEditor = document.querySelector('#editModal trix-editor');
        if (editTrixEditor) {
            editTrixEditor.addEventListener('trix-change', function(event) {
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

        // Update Trix editor content when modal opens
        window.addEventListener('openModal', function(event) {
            if (event.detail[0].id === 'editModal') {
                setTimeout(() => {
                    const editor = document.querySelector('#editModal trix-editor');
                    const hiddenInput = document.querySelector('#editModal input[name="description"]');
                    if (editor && hiddenInput) {
                        editor.editor.loadHTML(hiddenInput.value);
                    }
                }, 100);
            }
        });

        // Ensure date input works properly
        const dateInput = document.querySelector('#editModal .date-input');
        if (dateInput) {
            dateInput.addEventListener('focus', function() {
                this.showPicker && this.showPicker();
            });
        }
    });
</script>