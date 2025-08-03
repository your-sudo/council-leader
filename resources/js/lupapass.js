
        // function createParticle() {
        //     const particle = document.createElement('div');
        //     particle.className = 'particle';
        //     particle.style.left = Math.random() * 100 + '%';
        //     particle.style.animationDelay = Math.random() * 8 + 's';
        //     document.querySelector('.bg-shapes').appendChild(particle);
        //     setTimeout(() => { particle.remove(); }, 8000);
        // }
        // setInterval(createParticle, 1500);

        // const newPasswordInput = document.getElementById('newPassword');
        // const passwordStrength = document.getElementById('passwordStrength');
        // const strengthFill = document.getElementById('strengthFill');
        // const confirmPasswordInput = document.getElementById('confirmPassword');
        // const form = document.getElementById('resetForm');
        // const submitBtn = document.getElementById('submitBtn');
        // const messageContainer = document.getElementById('messageContainer');

        // newPasswordInput.addEventListener('input', function() {
        //     const password = this.value;
        //     passwordStrength.classList.toggle('visible', password.length > 0);
        //     updateStrengthIndicator(calculatePasswordStrength(password));
        // });

        // function calculatePasswordStrength(password) {
        //     let score = 0;
        //     if (password.length >= 8) score++;
        //     if (/[a-z]/.test(password)) score++;
        //     if (/[A-Z]/.test(password)) score++;
        //     if (/[0-9]/.test(password)) score++;
        //     if (/[^A-Za-z0-9]/.test(password)) score++;
        //     return score;
        // }

        // function updateStrengthIndicator(strength) {
        //     strengthFill.className = 'strength-fill';
        //     if (strength <= 2) strengthFill.classList.add('strength-weak');
        //     else if (strength === 3) strengthFill.classList.add('strength-fair');
        //     else if (strength === 4) strengthFill.classList.add('strength-good');
        //     else strengthFill.classList.add('strength-strong');
        // }

        // confirmPasswordInput.addEventListener('input', function() {
        //     const newPassword = newPasswordInput.value;
        //     this.style.borderColor = '';
        //     this.style.background = '';
        //     if (this.value && newPassword !== this.value) {
        //         this.style.borderColor = '#ef4444';
        //         this.style.background = '#fef2f2';
        //     } else if (this.value && newPassword === this.value) {
        //         this.style.borderColor = '#10b981';
        //         this.style.background = '#f0fdf4';
        //     }
        // });

        // form.addEventListener('submit', function(e) {
        //     e.preventDefault();
            
        //     const newPassword = newPasswordInput.value;
        //     const confirmPassword = confirmPasswordInput.value;
            
        //     if (newPassword !== confirmPassword) {
        //         showMessage('Password tidak cocok', 'error');
        //         return;
        //     }
        //     if (newPassword.length < 8) {
        //         showMessage('Password minimal harus 8 karakter', 'error');
        //         return;
        //     }
            
        //     submitBtn.classList.add('loading');
        //     submitBtn.disabled = true;
            
        //     setTimeout(() => {
        //         submitBtn.classList.remove('loading');
        //         submitBtn.disabled = false;
        //         showMessage('Password berhasil diatur ulang! Silahkan kembali ke halaman login...', 'success');
        //         form.style.opacity = '0.7';
        //         form.style.pointerEvents = 'none';
                
        //         setTimeout(() => {
        //             // window.location.href = '/login';
        //         }, 2000);
        //     }, 2000);
        // });

        // function showMessage(text, type) {
        //     messageContainer.innerHTML = '';
        //     const messageDiv = document.createElement('div');
        //     messageDiv.className = `message ${type}-message show`;
        //     messageDiv.textContent = text;
        //     messageContainer.appendChild(messageDiv);
            
        //     if (type === 'error') {
        //         setTimeout(() => {
        //             messageDiv.style.animation = 'fadeOut 0.4s ease-out forwards';
        //             setTimeout(() => messageDiv.remove(), 400);
        //         }, 4000);
        //     }
        // }

        // document.querySelectorAll('.form-input').forEach(input => {
        //     input.addEventListener('focus', function() { this.parentElement.style.transform = 'scale(1.02)'; });
        //     input.addEventListener('blur', function() { this.parentElement.style.transform = 'scale(1)'; });
        // });