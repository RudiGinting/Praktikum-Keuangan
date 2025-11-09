{{-- resources/views/components/modals/financial-records/delete.blade.php --}}

<div 
    class="modal fade" 
    id="deleteModal"
    tabindex="-1" 
    aria-labelledby="deleteModalLabel" 
    aria-hidden="true" 
    wire:ignore.self>
    
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content luxury-delete-modal">
            {{-- Background Effects --}}
            <div class="modal-bg-effects">
                <div class="floating-orb danger-orb-1"></div>
                <div class="floating-orb danger-orb-2"></div>
                <div class="danger-glow"></div>
            </div>

            {{-- Modal Header --}}
            <div class="modal-header-luxury-delete">
                <div class="header-glow-danger"></div>
                <div class="header-content-delete">
                    <div class="header-icon-danger">
                        <div class="danger-icon-circle">
                            <i class="bi bi-trash-fill"></i>
                            <div class="icon-pulse-danger"></div>
                        </div>
                    </div>
                    <div class="header-text-delete">
                        <h5 class="modal-title-luxury-delete">Hapus Data Keuangan</h5>
                        <p class="modal-subtitle-delete">Tindakan ini tidak dapat dibatalkan</p>
                    </div>
                </div>
                <button type="button" class="btn-close-luxury-delete" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body-luxury-delete">
                <div class="warning-content">
                    <div class="warning-icon">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>
                    <h4 class="warning-title">Konfirmasi Penghapusan</h4>
                    <p class="warning-message">
                        Apakah Anda yakin ingin menghapus catatan keuangan ini?
                    </p>
                    <div class="warning-details">
                        <div class="detail-item">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Data yang telah dihapus tidak dapat dikembalikan</span>
                        </div>
                        <div class="detail-item">
                            <i class="bi bi-image-fill"></i>
                            <span>File cover/gambar juga akan dihapus permanen</span>
                        </div>
                        <div class="detail-item">
                            <i class="bi bi-graph-down"></i>
                            <span>Statistik keuangan akan diperbarui</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Footer --}}
            <div class="modal-footer-luxury-delete">
                <div class="footer-glow-danger"></div>
                <button type="button" class="btn-luxury-delete btn-cancel-delete" data-bs-dismiss="modal">
                    <div class="btn-content">
                        <i class="bi bi-x-circle-fill me-2"></i>
                        <span>Batalkan</span>
                    </div>
                    <div class="btn-glow"></div>
                </button>
                
                {{-- Tombol Hapus - Fungsi tetap sama --}}
                <button 
                    type="button" 
                    class="btn-luxury-delete btn-confirm-delete" 
                    wire:click="delete"
                    wire:loading.attr="disabled">
                    <div class="btn-content">
                        <span wire:loading.remove wire:target="delete">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <span>Ya, Hapus Data</span>
                        </span>
                        <span wire:loading wire:target="delete">
                            <i class="bi bi-arrow-repeat spinner-delete me-2"></i>
                            <span>Menghapus...</span>
                        </span>
                    </div>
                    <div class="btn-glow"></div>
                    <div class="btn-shine-danger"></div>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Luxury Delete Modal Design */
    .luxury-delete-modal {
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.95) 0%, 
            rgba(255, 255, 255, 0.98) 100%);
        backdrop-filter: blur(60px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 28px;
        box-shadow: 
            0 35px 80px rgba(220, 53, 69, 0.25),
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
        opacity: 0.4;
        animation: float-danger 6s ease-in-out infinite;
    }

    .danger-orb-1 {
        width: 180px;
        height: 180px;
        background: linear-gradient(45deg, #dc3545, #e83e8c);
        top: -90px;
        right: -90px;
        animation-delay: 0s;
    }

    .danger-orb-2 {
        width: 120px;
        height: 120px;
        background: linear-gradient(45deg, #fd7e14, #dc3545);
        bottom: -60px;
        left: -60px;
        animation-delay: 3s;
    }

    .danger-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(220, 53, 69, 0.6), 
            transparent);
        animation: beamMoveDanger 3s ease-in-out infinite;
    }

    @keyframes float-danger {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-15px) scale(1.1); }
    }

    @keyframes beamMoveDanger {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Header */
    .modal-header-luxury-delete {
        background: linear-gradient(135deg, 
            rgba(220, 53, 69, 0.9) 0%, 
            rgba(232, 62, 140, 0.9) 100%);
        padding: 2.5rem 2.5rem 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
        z-index: 2;
    }

    .header-glow-danger {
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

    .header-content-delete {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .header-icon-danger {
        position: relative;
    }

    .danger-icon-circle {
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(20px);
        box-shadow: 0 8px 32px rgba(220, 53, 69, 0.3);
    }

    .danger-icon-circle i {
        font-size: 2rem;
        color: white;
    }

    .icon-pulse-danger {
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border: 2px solid rgba(255, 255, 255, 0.6);
        border-radius: 25px;
        animation: pulse-danger 2s ease-out infinite;
    }

    @keyframes pulse-danger {
        0% { transform: scale(1); opacity: 1; }
        100% { transform: scale(1.2); opacity: 0; }
    }

    .modal-title-luxury-delete {
        color: white;
        font-weight: 800;
        font-size: 1.8rem;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .modal-subtitle-delete {
        color: rgba(255, 255, 255, 0.9);
        margin: 0.5rem 0 0 0;
        font-size: 1rem;
        font-weight: 500;
    }

    .btn-close-luxury-delete {
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

    .btn-close-luxury-delete:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg) scale(1.1);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    }

    /* Body */
    .modal-body-luxury-delete {
        padding: 2.5rem;
        position: relative;
        z-index: 2;
    }

    .warning-content {
        text-align: center;
    }

    .warning-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #fee, #fdd);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        border: 3px solid #f8d7da;
        box-shadow: 0 8px 25px rgba(220, 53, 69, 0.2);
    }

    .warning-icon i {
        font-size: 2.5rem;
        color: #dc3545;
    }

    .warning-title {
        color: #2d3748;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .warning-message {
        color: #6c757d;
        font-size: 1.1rem;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .warning-details {
        background: rgba(248, 215, 218, 0.3);
        border: 1px solid rgba(220, 53, 69, 0.2);
        border-radius: 16px;
        padding: 1.5rem;
        backdrop-filter: blur(10px);
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        color: #856404;
        font-size: 0.9rem;
    }

    .detail-item:last-child {
        margin-bottom: 0;
    }

    .detail-item i {
        color: #dc3545;
        font-size: 1rem;
    }

    /* Footer */
    .modal-footer-luxury-delete {
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

    .footer-glow-danger {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(220, 53, 69, 0.5), 
            transparent);
    }

    /* Buttons */
    .btn-luxury-delete {
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

    .btn-cancel-delete {
        background: linear-gradient(135deg, 
            rgba(108, 117, 125, 0.9) 0%, 
            rgba(73, 80, 87, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 20px rgba(108, 117, 125, 0.3);
    }

    .btn-cancel-delete:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(108, 117, 125, 0.4);
    }

    .btn-confirm-delete {
        background: linear-gradient(135deg, 
            rgba(220, 53, 69, 0.9) 0%, 
            rgba(232, 62, 140, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 4px 25px rgba(220, 53, 69, 0.4);
    }

    .btn-confirm-delete:hover:not(:disabled) {
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(220, 53, 69, 0.6);
    }

    .btn-confirm-delete:disabled {
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

    .btn-luxury-delete:hover .btn-glow {
        left: 100%;
    }

    .btn-shine-danger {
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
        animation: shine-danger 3s ease-in-out infinite;
    }

    @keyframes shine-danger {
        0% { transform: rotate(45deg) translateX(-100%); }
        100% { transform: rotate(45deg) translateX(100%); }
    }

    .spinner-delete {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .modal-header-luxury-delete {
            padding: 2rem 1.5rem 1.5rem;
        }
        
        .modal-body-luxury-delete {
            padding: 2rem 1.5rem;
        }
        
        .modal-footer-luxury-delete {
            padding: 1.5rem;
            flex-direction: column;
        }
        
        .btn-luxury-delete {
            width: 100%;
        }
        
        .header-content-delete {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .danger-icon-circle {
            width: 60px;
            height: 60px;
        }
        
        .danger-icon-circle i {
            font-size: 1.5rem;
        }
        
        .warning-icon {
            width: 70px;
            height: 70px;
        }
        
        .warning-icon i {
            font-size: 2rem;
        }
    }
</style>