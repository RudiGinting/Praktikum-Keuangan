<form wire:submit.prevent="updateCover">
    <div class="modal fade" tabindex="-1" id="editCoverModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Cover Bukti Keuangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    {{-- DEBUG SECTION - Tambahkan ini untuk troubleshooting --}}
                    @env('local')
                    <div class="alert alert-info small mb-3">
                        <strong>Debug Info:</strong><br>
                        EditCover Value: "{{ $editCover ?? 'NULL' }}"<br>
                        @if($editCover)
                            Storage Exists: {{ Storage::disk('public')->exists($editCover) ? 'YES' : 'NO' }}<br>
                            Full Path: {{ storage_path('app/public/' . $editCover) }}
                        @endif
                    </div>
                    @endenv

                    {{-- TAMPILAN COVER SAAT INI --}}
                    <div class="mb-3">
                        <label class="form-label">Cover Saat Ini:</label>
                        
                        @if ($editCover)
                            @if(Storage::disk('public')->exists($editCover))
                                <div class="text-center">
                                    <img src="{{ Storage::url($editCover) }}" 
                                         alt="Cover Bukti Saat Ini" 
                                         style="max-width: 200px; max-height: 200px; object-fit: contain;" 
                                         class="img-thumbnail mb-2">
                                    <div class="text-success small">✓ Gambar berhasil dimuat</div>
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    <strong>⚠️ File tidak ditemukan!</strong><br>
                                    <small>Path: {{ $editCover }}</small>
                                </div>
                            @endif
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-image me-2"></i>Belum ada bukti gambar yang diunggah untuk catatan ini.
                            </div>
                        @endif
                    </div>
                    
                    {{-- INPUT GAMBAR BARU --}}
                    <div class="mb-3">
                        <label for="newCover" class="form-label">
                            Pilih Gambar Baru (Max 2MB) 
                            <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" 
                               type="file" 
                               id="newCover" 
                               wire:model="cover" 
                               accept="image/*"
                               required>
                        
                        @error('cover')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror

                        {{-- PRATINJAU GAMBAR BARU --}}
                        @if ($cover)
                            <div class="mt-3">
                                <label class="form-label small">Pratinjau Gambar Baru:</label>
                                <div class="text-center">
                                    <div wire:loading wire:target="cover" class="text-info">
                                        <i class="fas fa-spinner fa-spin me-2"></i>Mengunggah...
                                    </div>
                                    <img src="{{ $cover->temporaryUrl() }}" 
                                         style="max-width: 150px; max-height: 150px; object-fit: contain;" 
                                         class="img-thumbnail" 
                                         wire:loading.remove 
                                         wire:target="cover">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" 
                            class="btn btn-secondary" 
                            data-bs-dismiss="modal" 
                            wire:click="resetInput">
                        <i class="fas fa-times me-1"></i>Batal
                    </button>
                    <button type="submit" 
                            class="btn btn-primary" 
                            wire:loading.attr="disabled"
                            {{ !$cover ? 'disabled' : '' }}>
                        <span wire:loading.remove wire:target="updateCover">
                            <i class="fas fa-save me-1"></i>Simpan Cover Baru
                        </span>
                        <span wire:loading wire:target="updateCover">
                            <i class="fas fa-spinner fa-spin me-1"></i>Menyimpan...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>