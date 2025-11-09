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
    /* Luxury Add Modal Styles - Enhanced */
    .luxury-add-modal {
        background: linear-gradient(165deg, 
            rgba(255, 255, 255, 0.98) 0%, 
            rgba(240, 253, 250, 0.95) 100%);
        backdrop-filter: blur(40px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 24px;
        box-shadow: 
            0 35px 100px rgba(16, 185, 129, 0.25),
            0 10px 40px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.9),
            inset 0 -1px 0 rgba(16, 185, 129, 0.1);
        position: relative;
        overflow: hidden;
    }

    /* Animated Background - Enhanced */
    .animated-bg-add {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
        z-index: 1;
    }

    .floating-orb-add {
        position: absolute;
        border-radius: 50%;
        filter: blur(50px);
        opacity: 0.5;
        animation: floatAdd 8s ease-in-out infinite;
    }

    .orb-1 {
        width: 220px;
        height: 220px;
        background: linear-gradient(135deg, #10b981, #059669);
        top: -110px;
        right: -110px;
        animation-delay: 0s;
    }

    .orb-2 {
        width: 160px;
        height: 160px;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        bottom: -80px;
        left: -80px;
        animation-delay: 2s;
    }

    .orb-3 {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        top: 30%;
        left: 15%;
        animation-delay: 4s;
    }

    .light-streak {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(16, 185, 129, 0.8), 
            transparent);
        animation: streakMove 4s ease-in-out infinite;
    }

    @keyframes floatAdd {
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

    @keyframes streakMove {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Header Styles - Enhanced */
    .modal-header-add-luxury {
        background: linear-gradient(135deg, 
            rgba(16, 185, 129, 0.95) 0%, 
            rgba(5, 150, 105, 0.9) 100%);
        padding: 2.5rem 2.5rem 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.4);
        position: relative;
        z-index: 2;
        backdrop-filter: blur(20px);
    }

    .header-glow-add {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: linear-gradient(180deg, 
            rgba(255, 255, 255, 0.3) 0%, 
            transparent 50%,
            rgba(16, 185, 129, 0.1) 100%);
        pointer-events: none;
    }

    .header-content-add {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .header-icon-add {
        position: relative;
    }

    .icon-circle-add {
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

    .icon-circle-add:hover {
        transform: scale(1.05) rotate(5deg);
        box-shadow: 
            0 12px 40px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .icon-circle-add i {
        font-size: 2.2rem;
        color: white;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .icon-pulse-add {
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        border: 2px solid rgba(255, 255, 255, 0.8);
        border-radius: 28px;
        animation: pulseAdd 2.5s ease-out infinite;
    }

    @keyframes pulseAdd {
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

    .modal-title-add-luxury {
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

    .modal-subtitle-add {
        color: rgba(255, 255, 255, 0.95);
        margin: 0.5rem 0 0 0;
        font-size: 1.05rem;
        font-weight: 500;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .btn-close-add-luxury {
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

    .btn-close-add-luxury:hover {
        background: rgba(255, 255, 255, 0.35);
        transform: rotate(90deg) scale(1.15);
        box-shadow: 
            0 8px 30px rgba(0, 0, 0, 0.25),
            0 0 0 2px rgba(255, 255, 255, 0.5);
    }

    /* Body Styles - Enhanced */
    .modal-body-add-luxury {
        padding: 2.5rem;
        position: relative;
        z-index: 2;
    }

    .form-grid-add {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.75rem;
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

    .form-label-add i {
        color: #10b981;
        font-size: 1.15rem;
        margin-right: 0.5rem;
        text-shadow: 0 2px 4px rgba(16, 185, 129, 0.3);
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
        padding: 16px 20px;
        border: 2px solid rgba(16, 185, 129, 0.25);
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

    .form-select-add:focus {
        outline: none;
        border-color: #10b981;
        box-shadow: 
            0 0 0 4px rgba(16, 185, 129, 0.15),
            0 10px 40px rgba(16, 185, 129, 0.25);
        background: rgba(255, 255, 255, 0.98);
        transform: translateY(-3px);
    }

    .select-arrow-add {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #10b981;
        pointer-events: none;
        font-size: 1.3rem;
        transition: all 0.4s ease;
        text-shadow: 0 2px 4px rgba(16, 185, 129, 0.3);
    }

    .select-container-add:focus-within .select-arrow-add {
        transform: translateY(-50%) rotate(180deg);
        color: #059669;
    }

    .select-glow-add {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 16px;
        background: linear-gradient(135deg, 
            rgba(16, 185, 129, 0.15) 0%, 
            rgba(34, 197, 94, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .select-container-add:focus-within .select-glow-add {
        opacity: 1;
    }

    /* Input Styles - Enhanced */
    .input-container-add {
        position: relative;
    }

    .form-input-add {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid rgba(16, 185, 129, 0.25);
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

    .form-input-add:focus {
        outline: none;
        border-color: #10b981;
        box-shadow: 
            0 0 0 4px rgba(16, 185, 129, 0.15),
            0 10px 40px rgba(16, 185, 129, 0.25);
        background: rgba(255, 255, 255, 0.98);
        transform: translateY(-3px);
    }

    .input-icon-add {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #10b981;
        pointer-events: none;
        font-size: 1.3rem;
        text-shadow: 0 2px 4px rgba(16, 185, 129, 0.3);
    }

    .input-glow-add {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 16px;
        background: linear-gradient(135deg, 
            rgba(16, 185, 129, 0.15) 0%, 
            rgba(34, 197, 94, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .input-container-add:focus-within .input-glow-add,
    .amount-container-add:focus-within .input-glow-add {
        opacity: 1;
    }

    /* Amount Input - Enhanced */
    .amount-container-add {
        position: relative;
        display: flex;
        align-items: center;
    }

    .currency-prefix-add {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #059669;
        font-weight: 800;
        font-size: 1.2rem;
        z-index: 2;
        text-shadow: 0 2px 4px rgba(5, 150, 105, 0.3);
    }

    .amount-input-add {
        padding-left: 65px !important;
        font-size: 1.15rem;
        font-weight: 700;
        color: #059669;
    }

    /* Trix Editor - Enhanced */
    .editor-container-add {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 
            0 4px 20px rgba(0, 0, 0, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .trix-editor-add {
        border: 2px solid rgba(16, 185, 129, 0.25) !important;
        border-radius: 16px !important;
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(20px);
        min-height: 160px;
        padding: 1.5rem !important;
        font-size: 1rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        color: #1e293b;
    }

    .trix-editor-add:focus {
        border-color: #10b981 !important;
        box-shadow: 
            0 0 0 4px rgba(16, 185, 129, 0.15),
            0 10px 40px rgba(16, 185, 129, 0.25) !important;
        background: rgba(255, 255, 255, 0.98) !important;
        transform: translateY(-3px);
    }

    .editor-glow-add {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 16px;
        background: linear-gradient(135deg, 
            rgba(16, 185, 129, 0.15) 0%, 
            rgba(34, 197, 94, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .editor-container-add:focus-within .editor-glow-add {
        opacity: 1;
    }

    /* Cover Upload - Enhanced */
    .cover-upload-container {
        border-radius: 16px;
        overflow: hidden;
    }

    .cover-preview-add {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 
            0 20px 60px rgba(0, 0, 0, 0.25),
            0 8px 30px rgba(16, 185, 129, 0.3);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .cover-preview-add:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 
            0 30px 80px rgba(0, 0, 0, 0.35),
            0 15px 40px rgba(16, 185, 129, 0.4);
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
        background: linear-gradient(135deg, 
            rgba(16, 185, 129, 0.9) 0%, 
            rgba(5, 150, 105, 0.9) 100%);
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
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(20px);
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 25px;
        padding: 12px 24px;
        color: white;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-remove-image:hover {
        background: rgba(255, 255, 255, 0.35);
        transform: scale(1.1);
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.3);
    }

    .upload-placeholder {
        border: 2px dashed rgba(16, 185, 129, 0.4);
        border-radius: 16px;
        padding: 3.5rem 2rem;
        text-align: center;
        background: rgba(240, 253, 250, 0.8);
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        backdrop-filter: blur(10px);
    }

    .upload-placeholder:hover {
        border-color: #10b981;
        background: rgba(16, 185, 129, 0.1);
        transform: translateY(-3px);
        box-shadow: 
            0 10px 40px rgba(16, 185, 129, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .upload-icon {
        font-size: 3.5rem;
        color: #10b981;
        margin-bottom: 1.25rem;
        text-shadow: 0 4px 8px rgba(16, 185, 129, 0.3);
    }

    .upload-text h6 {
        color: #1e293b;
        font-weight: 700;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    .upload-text p {
        color: #64748b;
        margin: 0;
        font-size: 0.92rem;
        font-weight: 500;
    }

    /* Error Messages - Enhanced */
    .error-message-add {
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

    .error-message-add i {
        font-size: 1rem;
        margin-right: 0.5rem;
    }

    /* Footer Styles - Enhanced */
    .modal-footer-add-luxury {
        padding: 2rem 2.5rem;
        background: linear-gradient(180deg, 
            rgba(240, 253, 250, 0.95) 0%, 
            rgba(255, 255, 255, 0.95) 100%);
        border-top: 1px solid rgba(226, 232, 240, 0.8);
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        position: relative;
        z-index: 2;
        backdrop-filter: blur(20px);
    }

    .footer-glow-add {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(16, 185, 129, 0.6), 
            transparent);
        animation: footerGlowAdd 3s ease-in-out infinite;
    }

    @keyframes footerGlowAdd {
        0%, 100% { opacity: 0.6; }
        50% { opacity: 1; }
    }

    /* Button Styles - Enhanced */
    .btn-add-luxury {
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

    .btn-content-add {
        display: flex;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .btn-cancel-add {
        background: linear-gradient(135deg, 
            rgba(107, 114, 128, 0.95) 0%, 
            rgba(75, 85, 99, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.4);
        box-shadow: 
            0 8px 30px rgba(107, 114, 128, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
    }

    .btn-cancel-add:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 
            0 15px 50px rgba(107, 114, 128, 0.6),
            0 0 0 2px rgba(255, 255, 255, 0.8),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .btn-primary-add {
        background: linear-gradient(135deg, 
            rgba(16, 185, 129, 0.95) 0%, 
            rgba(5, 150, 105, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.5);
        box-shadow: 
            0 8px 30px rgba(16, 185, 129, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
    }

    .btn-primary-add:hover:not(:disabled) {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 
            0 15px 50px rgba(16, 185, 129, 0.6),
            0 0 0 2px rgba(255, 255, 255, 0.8),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .btn-primary-add:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none !important;
    }

    .btn-glow-add {
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

    .btn-add-luxury:hover .btn-glow-add {
        left: 100%;
    }

    .btn-shine-add {
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
        animation: shineAdd 4s ease-in-out infinite;
    }

    @keyframes shineAdd {
        0% { transform: rotate(45deg) translateX(-100%); }
        100% { transform: rotate(45deg) translateX(100%); }
    }

    .spinner-add {
        animation: spin 1s linear infinite;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-grid-add {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .modal-header-add-luxury {
            padding: 2rem 1.5rem 1.5rem;
        }
        
        .modal-body-add-luxury {
            padding: 2rem 1.5rem;
        }
        
        .modal-footer-add-luxury {
            padding: 1.5rem;
            flex-direction: column;
        }
        
        .btn-add-luxury {
            width: 100%;
            padding: 16px 24px;
        }
        
        .header-content-add {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .icon-circle-add {
            width: 65px;
            height: 65px;
        }
        
        .icon-circle-add i {
            font-size: 1.8rem;
        }

        .modal-title-add-luxury {
            font-size: 1.6rem;
        }

        .upload-placeholder {
            padding: 2.5rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .luxury-add-modal {
            border-radius: 20px;
            margin: 1rem;
        }
        
        .modal-body-add-luxury {
            padding: 1.5rem;
        }
        
        .form-input-add,
        .form-select-add {
            padding: 14px 16px;
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