// ============================================================
// SCRIPT.JS - WEBSITE PEMINJAMAN RUANGAN KAMPUS
// ============================================================

document.addEventListener('DOMContentLoaded', function() {
    
    // =========================================================
    // 1. VALIDASI FORM TAMBAH PEMINJAMAN (USER)
    // =========================================================
    const formPeminjaman = document.querySelector('form[action*="simpan_peminjaman"]');
    if (formPeminjaman) {
        formPeminjaman.addEventListener('submit', function(e) {
            const nama = this.querySelector('input[name="nama"]');
            const nim = this.querySelector('input[name="nim"]');
            const tanggal = this.querySelector('input[name="tanggal"]');
            const mulai = this.querySelector('input[name="mulai"]');
            const selesai = this.querySelector('input[name="selesai"]');
            const keperluan = this.querySelector('textarea[name="keperluan"]');
            
            let errors = [];
            
            // Validasi Nama (minimal 3 karakter)
            if (nama && nama.value.trim().length < 3) {
                errors.push('Nama minimal 3 karakter');
                nama.style.borderColor = '#ef4444';
            } else if (nama) {
                nama.style.borderColor = '';
            }
            
            // Validasi NIM (harus angka, minimal 8 digit)
            if (nim) {
                const nimValue = nim.value.trim();
                if (!/^\d{8,}$/.test(nimValue)) {
                    errors.push('NIM harus berupa angka minimal 8 digit');
                    nim.style.borderColor = '#ef4444';
                } else {
                    nim.style.borderColor = '';
                }
            }
            
            // Validasi Jam Mulai < Jam Selesai
            if (mulai && selesai) {
                if (mulai.value && selesai.value && mulai.value >= selesai.value) {
                    errors.push('Jam selesai harus lebih lambat dari jam mulai');
                    mulai.style.borderColor = '#ef4444';
                    selesai.style.borderColor = '#ef4444';
                } else {
                    mulai.style.borderColor = '';
                    selesai.style.borderColor = '';
                }
            }
            
            // Validasi Keperluan (minimal 5 karakter)
            if (keperluan && keperluan.value.trim().length < 5) {
                errors.push('Keperluan minimal 5 karakter');
                keperluan.style.borderColor = '#ef4444';
            } else if (keperluan) {
                keperluan.style.borderColor = '';
            }
            
            if (errors.length > 0) {
                e.preventDefault();
                alert('❌ Mohon perbaiki data berikut:\n\n- ' + errors.join('\n- '));
            }
        });
        
        // Reset border error saat user mengetik
        formPeminjaman.querySelectorAll('input, textarea, select').forEach(el => {
            el.addEventListener('input', function() {
                this.style.borderColor = '';
            });
            el.addEventListener('change', function() {
                this.style.borderColor = '';
            });
        });
    }
    
    // =========================================================
    // 2. KONFIRMASI HAPUS (USER & ADMIN)
    // =========================================================
    const deleteLinks = document.querySelectorAll('a[href*="hapus"], a[onclick*="confirm"]');
    deleteLinks.forEach(link => {
        // Hapus onclick bawaan jika ada, kita handle dengan JS modern
        if (link.getAttribute('onclick')) {
            const originalConfirm = link.getAttribute('onclick');
            link.removeAttribute('onclick');
            
            link.addEventListener('click', function(e) {
                if (!confirm('⚠️ Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.')) {
                    e.preventDefault();
                }
            });
        } else {
            // Tambahkan konfirmasi jika belum ada
            link.addEventListener('click', function(e) {
                if (!confirm('⚠️ Apakah Anda yakin ingin menghapus data ini?')) {
                    e.preventDefault();
                }
            });
        }
    });
    
    // =========================================================
    // 3. KONFIRMASI SETUJU / TOLAK (ADMIN)
    // =========================================================
    const approveLinks = document.querySelectorAll('a[href*="setujui"]');
    approveLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!confirm('✅ Konfirmasi persetujuan peminjaman ini?')) {
                e.preventDefault();
            }
        });
    });
    
    const rejectLinks = document.querySelectorAll('a[href*="tolak"]');
    rejectLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!confirm('❌ Konfirmasi penolakan peminjaman ini?')) {
                e.preventDefault();
            }
        });
    });
    
    // =========================================================
    // 4. VALIDASI LOGIN (ADMIN)
    // =========================================================
    const loginForm = document.querySelector('form[method="POST"]');
    if (loginForm && window.location.pathname.includes('login.php')) {
        loginForm.addEventListener('submit', function(e) {
            const username = this.querySelector('input[name="username"]');
            const password = this.querySelector('input[name="password"]');
            
            if (!username.value.trim() || !password.value.trim()) {
                e.preventDefault();
                alert('⚠️ Harap isi username dan password!');
            }
        });
    }
    
    // =========================================================
    // 5. AUTO FOCUS INPUT PERTAMA
    // =========================================================
    const firstInput = document.querySelector('input:not([type="hidden"]):not([type="submit"]), textarea, select');
    if (firstInput) {
        // Jangan fokus jika di halaman login (biarkan username yang focus)
        if (!window.location.pathname.includes('login.php')) {
            firstInput.focus();
        }
    }
    
    // =========================================================
    // 6. TOOLTIP / INFO
    // =========================================================
    document.querySelectorAll('[data-tooltip]').forEach(el => {
        el.addEventListener('mouseenter', function(e) {
            const tip = document.createElement('div');
            tip.className = 'tooltip-custom';
            tip.textContent = this.getAttribute('data-tooltip');
            tip.style.cssText = `
                position: fixed;
                background: #2d1b4e;
                color: white;
                padding: 6px 14px;
                border-radius: 8px;
                font-size: 13px;
                font-weight: 500;
                pointer-events: none;
                z-index: 9999;
                box-shadow: 0 4px 16px rgba(0,0,0,0.15);
                max-width: 260px;
                white-space: nowrap;
            `;
            document.body.appendChild(tip);
            
            const rect = this.getBoundingClientRect();
            tip.style.left = (rect.left + rect.width/2 - tip.offsetWidth/2) + 'px';
            tip.style.top = (rect.top - tip.offsetHeight - 10) + 'px';
            
            this._tooltipEl = tip;
        });
        
        el.addEventListener('mouseleave', function() {
            if (this._tooltipEl) {
                this._tooltipEl.remove();
                this._tooltipEl = null;
            }
        });
    });
    
    // =========================================================
    // 7. ANIMASI MUNCUL (fade in)
    // =========================================================
    const containers = document.querySelectorAll('.container, .login-box');
    containers.forEach((container, index) => {
        container.style.opacity = '0';
        container.style.transform = 'translateY(16px)';
        container.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        
        setTimeout(() => {
            container.style.opacity = '1';
            container.style.transform = 'translateY(0)';
        }, 100 + (index * 80));
    });
    
    // =========================================================
    // 8. AUTO CLOSE ALERT / NOTIF
    // =========================================================
    const alerts = document.querySelectorAll('.alert-auto');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.4s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 4000);
    });
    
    console.log('✅ Website Peminjaman Ruangan Kampus siap digunakan!');
});