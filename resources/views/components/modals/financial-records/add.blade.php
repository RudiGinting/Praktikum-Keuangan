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
    /* Luxury Add Modal Styles */
    .luxury-add-modal {
        background: linear-gradient(165deg, 
            rgba(255, 255, 255, 0.98) 0%, 
            rgba(250, 250, 255, 0.95) 100%);
        backdrop-filter: blur(40px);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 32px;
        box-shadow: 
            0 40px 120px rgba(0, 123, 255, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.9),
            inset 0 -1px 0 rgba(0, 123, 255, 0.1);
        position: relative;
        overflow: hidden;
    }

    /* Animated Background */
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
        filter: blur(40px);
        opacity: 0.4;
        animation: floatAdd 8s ease-in-out infinite;
    }

    .orb-1 {
        width: 200px;
        height: 200px;
        background: linear-gradient(45deg, #007bff, #0056b3);
        top: -100px;
        right: -100px;
        animation-delay: 0s;
    }

    .orb-2 {
        width: 150px;
        height: 150px;
        background: linear-gradient(45deg, #28a745, #20c997);
        bottom: -75px;
        left: -75px;
        animation-delay: 2s;
    }

    .orb-3 {
        width: 100px;
        height: 100px;
        background: linear-gradient(45deg, #6f42c1, #e83e8c);
        top: 50%;
        left: 10%;
        animation-delay: 4s;
    }

    .light-streak {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(0, 123, 255, 0.6), 
            transparent);
        animation: streakMove 4s ease-in-out infinite;
    }

    @keyframes floatAdd {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    @keyframes streakMove {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Header Styles */
    .modal-header-add-luxury {
        background: linear-gradient(135deg, 
            rgba(0, 123, 255, 0.95) 0%, 
            rgba(111, 66, 193, 0.9) 100%);
        padding: 2.5rem 2.5rem 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
        z-index: 2;
    }

    .header-glow-add {
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
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(20px);
        box-shadow: 0 8px 32px rgba(0, 123, 255, 0.3);
    }

    .icon-circle-add i {
        font-size: 2rem;
        color: white;
    }

    .icon-pulse-add {
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border: 2px solid rgba(255, 255, 255, 0.6);
        border-radius: 25px;
        animation: pulseAdd 2s ease-out infinite;
    }

    @keyframes pulseAdd {
        0% { transform: scale(1); opacity: 1; }
        100% { transform: scale(1.2); opacity: 0; }
    }

    .modal-title-add-luxury {
        color: white;
        font-weight: 800;
        font-size: 1.8rem;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .modal-subtitle-add {
        color: rgba(255, 255, 255, 0.9);
        margin: 0.5rem 0 0 0;
        font-size: 1rem;
        font-weight: 500;
    }

    .btn-close-add-luxury {
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

    .btn-close-add-luxury:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg) scale(1.1);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    }

    /* Body Styles */
    .modal-body-add-luxury {
        padding: 2.5rem;
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

    /* Form Groups */
    .form-group-add {
        position: relative;
    }

    .form-label-add {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-label-add i {
        color: #007bff;
        font-size: 1rem;
    }

    .required-star {
        color: #e53e3e;
        margin-left: 4px;
    }

    /* Select Styles */
    .select-container-add {
        position: relative;
    }

    .form-select-add {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid rgba(0, 123, 255, 0.2);
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
        appearance: none;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .form-select-add:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 
            0 0 0 4px rgba(0, 123, 255, 0.1),
            0 8px 30px rgba(0, 123, 255, 0.2);
        background: rgba(255, 255, 255, 0.95);
        transform: translateY(-2px);
    }

    .select-arrow-add {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #007bff;
        pointer-events: none;
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }

    .select-container-add:focus-within .select-arrow-add {
        transform: translateY(-50%) rotate(180deg);
    }

    .select-glow-add {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 14px;
        background: linear-gradient(135deg, 
            rgba(0, 123, 255, 0.1) 0%, 
            transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .select-container-add:focus-within .select-glow-add {
        opacity: 1;
    }

    /* Input Styles */
    .input-container-add {
        position: relative;
    }

    .form-input-add {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid rgba(0, 123, 255, 0.2);
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .form-input-add:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 
            0 0 0 4px rgba(0, 123, 255, 0.1),
            0 8px 30px rgba(0, 123, 255, 0.2);
        background: rgba(255, 255, 255, 0.95);
        transform: translateY(-2px);
    }

    .input-icon-add {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #007bff;
        pointer-events: none;
        font-size: 1.1rem;
    }

    .input-glow-add {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 14px;
        background: linear-gradient(135deg, 
            rgba(0, 123, 255, 0.1) 0%, 
            transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .input-container-add:focus-within .input-glow-add,
    .amount-container-add:focus-within .input-glow-add {
        opacity: 1;
    }

    /* Amount Input */
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
        color: #28a745;
        font-weight: 700;
        font-size: 1rem;
        z-index: 2;
    }

    .amount-input-add {
        padding-left: 55px !important;
        font-size: 1.05rem;
        font-weight: 600;
    }

    /* Trix Editor */
    .editor-container-add {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .trix-editor-add {
        border: 2px solid rgba(0, 123, 255, 0.2) !important;
        border-radius: 14px !important;
        background: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(20px);
        min-height: 140px;
        padding: 1.25rem !important;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .trix-editor-add:focus {
        border-color: #007bff !important;
        box-shadow: 
            0 0 0 4px rgba(0, 123, 255, 0.1),
            0 8px 30px rgba(0, 123, 255, 0.2) !important;
        background: rgba(255, 255, 255, 0.95) !important;
        transform: translateY(-2px);
    }

    .editor-glow-add {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 14px;
        background: linear-gradient(135deg, 
            rgba(0, 123, 255, 0.1) 0%, 
            transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .editor-container-add:focus-within .editor-glow-add {
        opacity: 1;
    }

    /* Cover Upload */
    .cover-upload-container {
        border-radius: 14px;
        overflow: hidden;
    }

    .cover-preview-add {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .preview-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .preview-overlay {
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
        transition: opacity 0.3s ease;
    }

    .cover-preview-add:hover .preview-overlay {
        opacity: 1;
    }

    .btn-remove-image {
        background: rgba(220, 53, 69, 0.9);
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        color: white;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-remove-image:hover {
        background: rgba(220, 53, 69, 1);
        transform: scale(1.05);
    }

    .upload-placeholder {
        border: 2px dashed rgba(0, 123, 255, 0.3);
        border-radius: 14px;
        padding: 3rem 2rem;
        text-align: center;
        background: rgba(248, 249, 250, 0.8);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .upload-placeholder:hover {
        border-color: #007bff;
        background: rgba(0, 123, 255, 0.05);
        transform: translateY(-2px);
    }

    .upload-icon {
        font-size: 3rem;
        color: #007bff;
        margin-bottom: 1rem;
    }

    .upload-text h6 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .upload-text p {
        color: #6c757d;
        margin: 0;
        font-size: 0.9rem;
    }

    /* Error Messages */
    .error-message-add {
        color: #e53e3e;
        font-size: 0.8rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        font-weight: 500;
    }

    .error-message-add i {
        font-size: 0.9rem;
    }

    /* Footer Styles */
    .modal-footer-add-luxury {
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

    .footer-glow-add {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(0, 123, 255, 0.5), 
            transparent);
    }

    /* Button Styles */
    .btn-add-luxury {
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

    .btn-content-add {
        display: flex;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .btn-cancel-add {
        background: linear-gradient(135deg, 
            rgba(108, 117, 125, 0.9) 0%, 
            rgba(73, 80, 87, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 20px rgba(108, 117, 125, 0.3);
    }

    .btn-cancel-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(108, 117, 125, 0.4);
    }

    .btn-primary-add {
        background: linear-gradient(135deg, 
            rgba(0, 123, 255, 0.9) 0%, 
            rgba(111, 66, 193, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 4px 25px rgba(0, 123, 255, 0.4);
    }

    .btn-primary-add:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 12px 40px rgba(0, 123, 255, 0.6);
    }

    .btn-primary-add:disabled {
        opacity: 0.6;
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
            rgba(255, 255, 255, 0.4), 
            transparent);
        transition: left 0.6s ease;
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
            rgba(255, 255, 255, 0.1), 
            transparent);
        transform: rotate(45deg);
        animation: shineAdd 3s ease-in-out infinite;
    }

    @keyframes shineAdd {
        0% { transform: rotate(45deg) translateX(-100%); }
        100% { transform: rotate(45deg) translateX(100%); }
    }

    .spinner-add {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-grid-add {
            grid-template-columns: 1fr;
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
        }
        
        .header-content-add {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .icon-circle-add {
            width: 60px;
            height: 60px;
        }
        
        .icon-circle-add i {
            font-size: 1.5rem;
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