<?= $this->extend('layout/frontend_template') ?>
<?= $this->section('style') ?>
<style>
    .rating-container {
        margin-bottom: 20px;
    }

    .star-rating {
        direction: rtl;
        display: inline-block;
        font-size: 30px;
        unicode-bidi: bidi-override;
        margin-top: 10px;
    }

    .star-rating input[type="radio"] {
        display: none;
    }

    .star-rating label {
        color: #ccc;
        cursor: pointer;
        padding: 0 5px;
        transition: color 0.2s;
    }

    .star-rating input[type="radio"]:checked~label {
        color: #ffca28;
    }

    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #ffca28;
    }

    .comment-container {
        margin-bottom: 20px;

    }

    #komentar {
        width: 100%;
        height: 140px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .btn-submit {
        padding: 10px 20px;
        background-color: #ffca28;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        color: white;

    }

    .btn-submit:hover {
        background-color: #f8c200;
    }

    .rating-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .rating-wrapper {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .star-rating {
        display: flex;
        direction: rtl;
        /* Tetap gunakan RTL agar bintang diklik dari kiri ke kanan */
        font-size: 30px;
        unicode-bidi: bidi-override;
    }

    .star-rating input[type="radio"] {
        display: none;
    }

    .star-rating label {
        color: #ccc;
        cursor: pointer;
        padding: 0 5px;
        transition: color 0.2s;
    }

    .star-rating input[type="radio"]:checked~label {
        color: #ffca28;
    }

    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #ffca28;
    }

    .rating-text {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        text-align: left;
        /* Pastikan teks rata kiri */
    }

    /*upload foto dan video */
    .upload-container {
        margin-top: 15px;
    }

    .preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .upload-box {
        width: 420px;
        height: 200px;
        border: 2px dashed #ddd;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        font-size: 40px;
        color: #bbb;
        border-radius: 5px;
        background: #f9f9f9;
    }

    .upload-box:hover {
        border-color: #ffca28;
        color: #ffca28;
    }

    /* Posisi item  */
    .preview-item {
        position: relative;
        display: inline-block;
    }

    /* Ukuran Image */
    .preview-item img {
        max-width: 300px;
        /* Atur lebar maksimum gambar */
        max-height: 100px;
        /* Atur tinggi maksimum gambar */
        object-fit: cover;
        /* Memastikan gambar tidak terdistorsi */
    }

    /* Ukuran Video */
    .preview-item video {
        max-width: 100px;
        /* Atur lebar maksimum video */
        max-height: 100px;
        /* Atur tinggi maksimum video */
        object-fit: cover;
        /* Memastikan video tidak terdistorsi */
        border: 1px solid #ccc;
        /* Tambahkan border jika perlu */
    }


    .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background: red;
        color: white;
        font-size: 14px;
        border: none;
        cursor: pointer;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 style="margin-top: 8%;">Beri Penilaian</h1>
    <form action="<?= base_url('pendaftaran/prosesNilai') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="pendaftaran_id" value="<?= esc($pendaftaran_id) ?>">
        <br>
        <div class="rating-container">
            <label for="rating">Rating Kualitas Pelayanan</label>
            <div class="rating-wrapper">
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5" required>
                    <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>

                    <input type="radio" id="star4" name="rating" value="4" required>
                    <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>

                    <input type="radio" id="star3" name="rating" value="3" required>
                    <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>

                    <input type="radio" id="star2" name="rating" value="2" required>
                    <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>

                    <input type="radio" id="star1" name="rating" value="1" required>
                    <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                </div>
                <span id="rating-text" class="rating-text">Pilih rating</span>
            </div>
        </div>

        <!-- Input Foto -->
        <div class="upload-container">
            <label>Unggah Foto (Maks 5)</label>
            <div id="foto-preview-container" class="preview-container">
                <label class="upload-box">
                    <input type="file" id="foto-input" hidden name="foto[]" accept="image/png, image/jpeg" multiple>
                    <i class="fas fa-camera"></i>
                </label>
            </div>
        </div>

        <!-- Input Video -->
        <div class="upload-container">
            <label>Unggah Video (Maks 1)</label>
            <div id="video-preview-container" class="preview-container">
                <label class="upload-box">
                    <input type="file" id="video-input" name="video" accept="video/mp4, video/quicktime" hidden>
                    <i class="fas fa-video"></i>
                </label>
            </div>
        </div>

        <div class="comment-container">
            <label for="komentar">Komentar:</label>
            <textarea name="komentar" id="komentar" placeholder="Berikan komentar atau saran untuk kami" maxlength="255"></textarea>
        </div>

        <button type="submit" class="btn-submit">Kirim Penilaian</button>
    </form>
</div>

<!-- Upload Foto dan Video -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const stars = document.querySelectorAll('.star-rating input');
        const ratingText = document.getElementById('rating-text');

        const descriptions = {
            "1": "Sangat kurang memuaskan",
            "2": "Kurang memuaskan",
            "3": "Cukup memuaskan",
            "4": "Memuaskan",
            "5": "Sangat memuaskan"
        };

        stars.forEach(star => {
            star.addEventListener('change', function() {
                ratingText.textContent = descriptions[this.value];
            });
        });

        // Upload Foto
        const fotoInput = document.getElementById("foto-input");
        const fotoContainer = document.getElementById("foto-preview-container");
        let fotoFiles = [];

        fotoInput.addEventListener("change", function(event) {
            const files = Array.from(event.target.files);
            if (fotoFiles.length + files.length > 5) {
                alert("Maksimal 5 foto!");
                return;
            }

            files.forEach((file) => {
                if (fotoFiles.length < 5) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewItem = document.createElement("div");
                        previewItem.classList.add("preview-item");
                        previewItem.innerHTML = `
                            <img src="${e.target.result}" alt="Preview Foto">
                            <button class="remove-btn">&times;</button>
                        `;
                        fotoContainer.insertBefore(previewItem, fotoContainer.querySelector(".upload-box"));

                        // Hapus foto saat tombol x diklik
                        previewItem.querySelector(".remove-btn").addEventListener("click", function() {
                            fotoFiles = fotoFiles.filter((f) => f !== file);
                            previewItem.remove();
                            if (fotoFiles.length === 0) fotoInput.value = ""; // Reset input jika kosong
                        });
                    };
                    reader.readAsDataURL(file);
                    fotoFiles.push(file);
                }
            });
        });

        // Upload Video
        const videoInput = document.getElementById("video-input");
        const videoContainer = document.getElementById("video-preview-container");
        let videoFile = null;

        videoInput.addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (!file) return;
            if (videoFile) {
                alert("Maksimal hanya 1 video!");
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const previewItem = document.createElement("div");
                previewItem.classList.add("preview-item");
                previewItem.innerHTML = `
                    <video controls><source src="${e.target.result}" type="${file.type}"></video>
                    <button class="remove-btn">&times;</button>
                `;
                videoContainer.insertBefore(previewItem, videoContainer.querySelector(".upload-box"));

                // Hapus video saat tombol x diklik
                previewItem.querySelector(".remove-btn").addEventListener("click", function() {
                    videoFile = null;
                    previewItem.remove();
                    videoInput.value = ""; // Reset input jika kosong
                });
            };
            reader.readAsDataURL(file);
            videoFile = file;
        });

        // Validasi sebelum submit
        document.querySelector("form").addEventListener("submit", function(event) {
            const rating = document.querySelector('input[name="rating"]:checked');
            const komentar = document.getElementById("komentar").value.trim();

            if (!rating) {
                alert("Silakan pilih rating sebelum mengirim.");
                event.preventDefault();
                return;
            }

            if (!komentar) {
                alert("Silakan isi komentar sebelum mengirim.");
                event.preventDefault();
                return;
            }

            if (fotoFiles.length === 0) {
                alert("Minimal 1 foto wajib diunggah.");
                event.preventDefault();
                return;
            }

            if (!videoFile) {
                alert("Video wajib diunggah.");
                event.preventDefault();
                return;
            }
        });
    });
</script>

<?= $this->endSection() ?>