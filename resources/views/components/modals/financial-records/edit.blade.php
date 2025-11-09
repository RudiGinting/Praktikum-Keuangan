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
    /* Luxury Edit Modal Design - Enhanced */
    .luxury-modal {
        background: linear-gradient(165deg, 
            rgba(255, 255, 255, 0.98) 0%, 
            rgba(248, 250, 255, 0.95) 100%);
        backdrop-filter: blur(40px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 24px;
        box-shadow: 
            0 35px 100px rgba(59, 130, 246, 0.25),
            0 10px 40px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.9),
            inset 0 -1px 0 rgba(59, 130, 246, 0.1);
        position: relative;
        overflow: hidden;
    }

    /* Background Effects - Enhanced */
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
        filter: blur(50px);
        opacity: 0.5;
        animation: floatOrb 8s ease-in-out infinite;
    }

    .orb-1 {
        width: 220px;
        height: 220px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        top: -110px;
        right: -110px;
        animation-delay: 0s;
    }

    .orb-2 {
        width: 160px;
        height: 160px;
        background: linear-gradient(135deg, #06b6d4, #10b981);
        bottom: -80px;
        left: -80px;
        animation-delay: 2s;
    }

    .orb-3 {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #f59e0b, #ef4444);
        top: 30%;
        left: 10%;
        animation-delay: 4s;
    }

    .light-beam {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(59, 130, 246, 0.8), 
            transparent);
        animation: beamMove 4s ease-in-out infinite;
    }

    @keyframes floatOrb {
        0%, 100% { 
            transform: translateY(0px) rotate(0deg) scale(1); 
        }
        33% { 
            transform: translateY(-20px) rotate(120deg) scale(1.1); 
        }
        66% { 
            transform: translateY(10px) rotate(240deg) scale(0.9); 
        }
    }

    @keyframes beamMove {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Header - Enhanced */
    .modal-header-luxury {
        background: linear-gradient(135deg, 
            rgba(59, 130, 246, 0.95) 0%, 
            rgba(139, 92, 246, 0.9) 100%);
        padding: 2.5rem 2.5rem 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.4);
        position: relative;
        z-index: 2;
        backdrop-filter: blur(20px);
    }

    .header-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: linear-gradient(180deg, 
            rgba(255, 255, 255, 0.3) 0%, 
            transparent 50%,
            rgba(59, 130, 246, 0.1) 100%);
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
        width: 75px;
        height: 75px;
        background: rgba(255, 255, 255, 0.25);
        border: 2px solid rgba(255, 255, 255, 0.5);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(20px);
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
        transition: all 0.3s ease;
    }

    .icon-circle:hover {
        transform: scale(1.05) rotate(5deg);
        box-shadow: 
            0 12px 40px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .icon-circle i {
        font-size: 2.2rem;
        color: white;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .icon-pulse {
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        border: 2px solid rgba(255, 255, 255, 0.8);
        border-radius: 28px;
        animation: pulseGlow 2.5s ease-out infinite;
    }

    @keyframes pulseGlow {
        0% { 
            transform: scale(1); 
            opacity: 1; 
            border-width: 2px;
        }
        100% { 
            transform: scale(1.3); 
            opacity: 0; 
            border-width: 1px;
        }
    }

    .modal-title-luxury {
        color: white;
        font-weight: 800;
        font-size: 1.9rem;
        margin: 0;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        background: linear-gradient(135deg, #fff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .modal-subtitle-luxury {
        color: rgba(255, 255, 255, 0.95);
        margin: 0.5rem 0 0 0;
        font-size: 1.05rem;
        font-weight: 500;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .btn-close-luxury {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: rgba(255, 255, 255, 0.25);
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 14px;
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        backdrop-filter: blur(20px);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 3;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-close-luxury:hover {
        background: rgba(255, 255, 255, 0.35);
        transform: rotate(90deg) scale(1.15);
        box-shadow: 
            0 8px 30px rgba(0, 0, 0, 0.25),
            0 0 0 2px rgba(255, 255, 255, 0.5);
    }

    /* Body - Enhanced */
    .modal-body-luxury {
        padding: 2.5rem;
        position: relative;
        z-index: 2;
    }

    .form-grid-luxury {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.75rem;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    /* Form Groups - Enhanced */
    .form-group-luxury {
        position: relative;
    }

    .form-label-luxury {
        display: flex;
        align-items: center;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.85rem;
        font-size: 0.92rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: linear-gradient(135deg, #475569, #334155);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .form-label-luxury i {
        color: #3b82f6;
        font-size: 1.15rem;
        margin-right: 0.5rem;
        text-shadow: 0 2px 4px rgba(59, 130, 246, 0.3);
    }

    .required-star {
        color: #ef4444;
        margin-left: 4px;
        font-weight: 800;
    }

    /* Select Styles - Enhanced */
    .select-container-luxury {
        position: relative;
    }

    .form-select-luxury {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid rgba(59, 130, 246, 0.25);
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        font-size: 1rem;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        appearance: none;
        cursor: pointer;
        box-shadow: 
            0 4px 20px rgba(0, 0, 0, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        color: #1e293b;
    }

    .form-select-luxury:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 
            0 0 0 4px rgba(59, 130, 246, 0.15),
            0 10px 40px rgba(59, 130, 246, 0.25);
        background: rgba(255, 255, 255, 0.98);
        transform: translateY(-3px);
    }

    .select-arrow-luxury {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #3b82f6;
        pointer-events: none;
        font-size: 1.3rem;
        transition: all 0.4s ease;
        text-shadow: 0 2px 4px rgba(59, 130, 246, 0.3);
    }

    .select-container-luxury:focus-within .select-arrow-luxury {
        transform: translateY(-50%) rotate(180deg);
        color: #1d4ed8;
    }

    .select-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 16px;
        background: linear-gradient(135deg, 
            rgba(59, 130, 246, 0.15) 0%, 
            rgba(139, 92, 246, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .select-container-luxury:focus-within .select-glow {
        opacity: 1;
    }

    /* Input Styles - Enhanced */
    .date-input-container {
        position: relative;
    }

    .form-input-luxury {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid rgba(59, 130, 246, 0.25);
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        font-size: 1rem;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 
            0 4px 20px rgba(0, 0, 0, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        color: #1e293b;
    }

    .form-input-luxury:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 
            0 0 0 4px rgba(59, 130, 246, 0.15),
            0 10px 40px rgba(59, 130, 246, 0.25);
        background: rgba(255, 255, 255, 0.98);
        transform: translateY(-3px);
    }

    .input-icon-luxury {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #3b82f6;
        pointer-events: none;
        font-size: 1.3rem;
        text-shadow: 0 2px 4px rgba(59, 130, 246, 0.3);
    }

    .input-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 16px;
        background: linear-gradient(135deg, 
            rgba(59, 130, 246, 0.15) 0%, 
            rgba(139, 92, 246, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .date-input-container:focus-within .input-glow,
    .amount-container-luxury:focus-within .input-glow {
        opacity: 1;
    }

    /* Amount Input - Enhanced */
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
        color: #10b981;
        font-weight: 800;
        font-size: 1.2rem;
        z-index: 2;
        text-shadow: 0 2px 4px rgba(16, 185, 129, 0.3);
    }

    .amount-input {
        padding-left: 65px !important;
        font-size: 1.15rem;
        font-weight: 700;
        color: #059669;
    }

    /* Trix Editor - Enhanced */
    .editor-container-luxury {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 
            0 4px 20px rgba(0, 0, 0, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .trix-editor-luxury {
        border: 2px solid rgba(59, 130, 246, 0.25) !important;
        border-radius: 16px !important;
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(20px);
        min-height: 160px;
        padding: 1.5rem !important;
        font-size: 1rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        color: #1e293b;
    }

    .trix-editor-luxury:focus {
        border-color: #3b82f6 !important;
        box-shadow: 
            0 0 0 4px rgba(59, 130, 246, 0.15),
            0 10px 40px rgba(59, 130, 246, 0.25) !important;
        background: rgba(255, 255, 255, 0.98) !important;
        transform: translateY(-3px);
    }

    .editor-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 16px;
        background: linear-gradient(135deg, 
            rgba(59, 130, 246, 0.15) 0%, 
            rgba(139, 92, 246, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .editor-container-luxury:focus-within .editor-glow {
        opacity: 1;
    }

    /* Current Cover - Enhanced */
    .current-cover-luxury {
        text-align: center;
    }

    .cover-image-container {
        position: relative;
        display: inline-block;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 
            0 20px 60px rgba(0, 0, 0, 0.25),
            0 8px 30px rgba(59, 130, 246, 0.3);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .cover-image-container:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 
            0 30px 80px rgba(0, 0, 0, 0.35),
            0 15px 40px rgba(59, 130, 246, 0.4);
    }

    .cover-image-luxury {
        width: 280px;
        height: 200px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .cover-overlay-luxury {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, 
            rgba(59, 130, 246, 0.9) 0%, 
            rgba(139, 92, 246, 0.9) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.4s ease;
    }

    .cover-image-container:hover .cover-overlay-luxury {
        opacity: 1;
    }

    .cover-image-container:hover .cover-image-luxury {
        transform: scale(1.1);
    }

    .cover-badge {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(20px);
        padding: 12px 24px;
        border-radius: 25px;
        color: white;
        font-weight: 700;
        border: 2px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .cover-info {
        margin-top: 1.25rem;
    }

    .cover-note {
        color: #64748b;
        font-size: 0.92rem;
        margin: 0;
        font-weight: 500;
    }

    /* Error Messages - Enhanced */
    .error-message-luxury {
        color: #ef4444;
        font-size: 0.88rem;
        margin-top: 0.75rem;
        display: flex;
        align-items: center;
        font-weight: 600;
        background: rgba(239, 68, 68, 0.1);
        padding: 0.75rem 1rem;
        border-radius: 12px;
        border-left: 4px solid #ef4444;
    }

    .error-message-luxury i {
        font-size: 1rem;
        margin-right: 0.5rem;
    }

    /* Footer - Enhanced */
    .modal-footer-luxury {
        padding: 2rem 2.5rem;
        background: linear-gradient(180deg, 
            rgba(248, 250, 252, 0.95) 0%, 
            rgba(255, 255, 255, 0.95) 100%);
        border-top: 1px solid rgba(226, 232, 240, 0.8);
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        position: relative;
        z-index: 2;
        backdrop-filter: blur(20px);
    }

    .footer-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(59, 130, 246, 0.6), 
            transparent);
        animation: footerGlow 3s ease-in-out infinite;
    }

    @keyframes footerGlow {
        0%, 100% { opacity: 0.6; }
        50% { opacity: 1; }
    }

    /* Buttons - Enhanced */
    .btn-luxury {
        position: relative;
        padding: 18px 36px;
        border: none;
        border-radius: 18px;
        font-weight: 800;
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        overflow: hidden;
        backdrop-filter: blur(20px);
        cursor: pointer;
        min-width: 160px;
        justify-content: center;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-content {
        display: flex;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .btn-primary-luxury {
        background: linear-gradient(135deg, 
            rgba(59, 130, 246, 0.95) 0%, 
            rgba(139, 92, 246, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.5);
        box-shadow: 
            0 8px 30px rgba(59, 130, 246, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
    }

    .btn-primary-luxury:hover:not(:disabled) {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 
            0 15px 50px rgba(59, 130, 246, 0.6),
            0 0 0 2px rgba(255, 255, 255, 0.8),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
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
            rgba(255, 255, 255, 0.6), 
            transparent);
        transition: left 0.8s ease;
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
            rgba(255, 255, 255, 0.2), 
            transparent);
        transform: rotate(45deg);
        animation: shine 4s ease-in-out infinite;
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
            padding: 16px 24px;
        }
        
        .header-content {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .icon-circle {
            width: 65px;
            height: 65px;
        }
        
        .icon-circle i {
            font-size: 1.8rem;
        }

        .modal-title-luxury {
            font-size: 1.6rem;
        }

        .cover-image-luxury {
            width: 100%;
            max-width: 250px;
            height: 180px;
        }
    }

    @media (max-width: 480px) {
        .luxury-modal {
            border-radius: 20px;
            margin: 1rem;
        }
        
        .modal-body-luxury {
            padding: 1.5rem;
        }
        
        .form-input-luxury,
        .form-select-luxury {
            padding: 14px 16px;
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