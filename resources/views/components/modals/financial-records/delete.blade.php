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
    /* Luxury Delete Modal Design - Enhanced */
    .luxury-delete-modal {
        background: linear-gradient(165deg, 
            rgba(255, 255, 255, 0.98) 0%, 
            rgba(254, 242, 242, 0.95) 100%);
        backdrop-filter: blur(40px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 24px;
        box-shadow: 
            0 35px 100px rgba(239, 68, 68, 0.25),
            0 10px 40px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.9),
            inset 0 -1px 0 rgba(239, 68, 68, 0.1);
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
        animation: floatDanger 8s ease-in-out infinite;
    }

    .danger-orb-1 {
        width: 220px;
        height: 220px;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        top: -110px;
        right: -110px;
        animation-delay: 0s;
    }

    .danger-orb-2 {
        width: 160px;
        height: 160px;
        background: linear-gradient(135deg, #f97316, #ea580c);
        bottom: -80px;
        left: -80px;
        animation-delay: 2s;
    }

    .danger-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(239, 68, 68, 0.8), 
            transparent);
        animation: dangerBeam 4s ease-in-out infinite;
    }

    @keyframes floatDanger {
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

    @keyframes dangerBeam {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Header - Enhanced */
    .modal-header-luxury-delete {
        background: linear-gradient(135deg, 
            rgba(239, 68, 68, 0.95) 0%, 
            rgba(220, 38, 38, 0.9) 100%);
        padding: 2.5rem 2.5rem 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.4);
        position: relative;
        z-index: 2;
        backdrop-filter: blur(20px);
    }

    .header-glow-danger {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: linear-gradient(180deg, 
            rgba(255, 255, 255, 0.3) 0%, 
            transparent 50%,
            rgba(239, 68, 68, 0.1) 100%);
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

    .danger-icon-circle:hover {
        transform: scale(1.05) rotate(5deg);
        box-shadow: 
            0 12px 40px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .danger-icon-circle i {
        font-size: 2.2rem;
        color: white;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .icon-pulse-danger {
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        border: 2px solid rgba(255, 255, 255, 0.8);
        border-radius: 28px;
        animation: pulseDanger 2.5s ease-out infinite;
    }

    @keyframes pulseDanger {
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

    .modal-title-luxury-delete {
        color: white;
        font-weight: 800;
        font-size: 1.9rem;
        margin: 0;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        background: linear-gradient(135deg, #fff, #fecaca);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .modal-subtitle-delete {
        color: rgba(255, 255, 255, 0.95);
        margin: 0.5rem 0 0 0;
        font-size: 1.05rem;
        font-weight: 500;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .btn-close-luxury-delete {
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

    .btn-close-luxury-delete:hover {
        background: rgba(255, 255, 255, 0.35);
        transform: rotate(90deg) scale(1.15);
        box-shadow: 
            0 8px 30px rgba(0, 0, 0, 0.25),
            0 0 0 2px rgba(255, 255, 255, 0.5);
    }

    /* Body - Enhanced */
    .modal-body-luxury-delete {
        padding: 2.5rem;
        position: relative;
        z-index: 2;
    }

    .warning-content {
        text-align: center;
    }

    .warning-icon {
        width: 90px;
        height: 90px;
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        border: 3px solid #fecaca;
        box-shadow: 
            0 15px 40px rgba(239, 68, 68, 0.25),
            inset 0 2px 0 rgba(255, 255, 255, 0.8);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .warning-icon:hover {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 
            0 20px 50px rgba(239, 68, 68, 0.35),
            inset 0 2px 0 rgba(255, 255, 255, 0.9);
    }

    .warning-icon i {
        font-size: 2.8rem;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
    }

    .warning-title {
        color: #1e293b;
        font-weight: 800;
        font-size: 1.6rem;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .warning-message {
        color: #64748b;
        font-size: 1.1rem;
        margin-bottom: 2rem;
        line-height: 1.6;
        font-weight: 500;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    .warning-details {
        background: linear-gradient(145deg, #4a0404, #3b0707); /* Dark red gradient */
        border: 1px solid rgba(255, 107, 107, 0.2);
        border-radius: 16px; /* Larger radius */
        padding: 2rem;
        margin-top: 2.5rem;
        text-align: left; /* Align text to the left */
        box-shadow: 
            inset 0 2px 4px rgba(0, 0, 0, 0.4),
            0 10px 30px rgba(127, 29, 29, 0.3);
        transition: all 0.3s ease;
    }

    .warning-details:hover {
        transform: translateY(-3px);
        box-shadow: 
            inset 0 2px 4px rgba(0, 0, 0, 0.4),
            0 15px 40px rgba(127, 29, 29, 0.4);
        border-color: rgba(255, 107, 107, 0.3);
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 0.75rem;
        color: #fecaca; /* Light red text for contrast */
        font-size: 0.95rem;
        font-weight: 500; /* Medium weight */
        padding: 0.5rem 0;
        transition: all 0.3s ease;
    }

    .detail-item:last-child {
        margin-bottom: 0;
    }

    .detail-item:hover {
        color: #ffffff; /* White on hover */
        transform: translateX(5px);
    }

    /* Footer - Enhanced */
    .modal-footer-luxury-delete {
        padding: 2rem 2.5rem;
        background: linear-gradient(180deg, 
            rgba(254, 242, 242, 0.95) 0%, 
            rgba(255, 255, 255, 0.95) 100%);
        border-top: 1px solid rgba(254, 226, 226, 0.8);
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        position: relative;
        z-index: 2;
        backdrop-filter: blur(20px);
    }

    .footer-glow-danger {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(239, 68, 68, 0.6), 
            transparent);
        animation: footerGlowDanger 3s ease-in-out infinite;
    }

    @keyframes footerGlowDanger {
        0%, 100% { opacity: 0.6; }
        50% { opacity: 1; }
    }

    /* Buttons - Enhanced */
    .btn-luxury-delete {
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

    .btn-cancel-delete {
        background: linear-gradient(135deg, 
            rgba(107, 114, 128, 0.95) 0%, 
            rgba(75, 85, 99, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.4);
        box-shadow: 
            0 8px 30px rgba(107, 114, 128, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
    }

    .btn-cancel-delete:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 
            0 15px 50px rgba(107, 114, 128, 0.6),
            0 0 0 2px rgba(255, 255, 255, 0.8),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }

    .btn-confirm-delete {
        background: linear-gradient(135deg, 
            rgba(239, 68, 68, 0.95) 0%, 
            rgba(220, 38, 38, 0.9) 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.5);
        box-shadow: 
            0 8px 30px rgba(239, 68, 68, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
    }

    .btn-confirm-delete:hover:not(:disabled) {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 
            0 15px 50px rgba(239, 68, 68, 0.6),
            0 0 0 2px rgba(255, 255, 255, 0.8),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
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
            rgba(255, 255, 255, 0.6), 
            transparent);
        transition: left 0.8s ease;
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
            rgba(255, 255, 255, 0.2), 
            transparent);
        transform: rotate(45deg);
        animation: shineDanger 4s ease-in-out infinite;
    }

    @keyframes shineDanger {
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
            padding: 16px 24px;
        }
        
        .header-content-delete {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .danger-icon-circle {
            width: 65px;
            height: 65px;
        }
        
        .danger-icon-circle i {
            font-size: 1.8rem;
        }

        .modal-title-luxury-delete {
            font-size: 1.6rem;
        }

        .warning-icon {
            width: 80px;
            height: 80px;
        }

        .warning-icon i {
            font-size: 2.4rem;
        }

        .warning-title {
            font-size: 1.4rem;
        }
    }

    @media (max-width: 480px) {
        .luxury-delete-modal {
            border-radius: 20px;
            margin: 1rem;
        }
        
        .modal-body-luxury-delete {
            padding: 1.5rem;
        }
        
        .warning-details {
            padding: 1.25rem;
        }
        
        .detail-item {
            font-size: 0.85rem;
        }
    }
</style>