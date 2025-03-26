document.getElementById('avatarInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('avatarPreview');
            preview.style.display = 'block';
            preview.src = e.target.result;
            preview.style.maxWidth = '150px';
            preview.style.borderRadius = '8px';
            document.querySelector('.upload-text').textContent = '点击更换头像';
        }
        reader.readAsDataURL(file);
    }
});