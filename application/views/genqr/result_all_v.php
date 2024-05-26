<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result All QR Codes</title>
    <style>
        img {
            left: 50px;
        }

        .imgA1 {
            max-width: 100%;
            height: auto; 
            position: relative;
            width: 80%;
            z-index: 3;
        }

        .imgB1 {
            position: absolute;
            z-index: 3;
            top: 40%;
            left:69%;
            width: 15%
        }

        @media only screen and (max-width: 480px) {
            .imgB1 {
                top: 30%;
                left:72%;
            }
        }

        .down {
            display: block;
            position: relative;
            
            margin-top: 1%;
        }

        .button-container {
            display: flex;
           
        }

        .btn-download {
            background-color: #007bff; /* Warna biru untuk tombol download */
            border-color: #007bff;
        }

        .btn-send {
            background-color: #28a745; /* Warna hijau untuk tombol kirim */
            border-color: #28a745;
        }

        .ticket-container {
            position: relative;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php if (!empty($mahasiswa)): ?>
        <div class="button-container">
            <button onclick="downloadAllImages()" class="down btn btn-gradient-info">Download Semua</button>
            <button onclick="sendAllEmails()" class="down btn btn-gradient-success">Kirim Semua</button>
        </div>
        <ul>
            <?php foreach ($mahasiswa as $mhs): ?>
                <li>
                    <div class="ticket-container">
                        <p>NIM: <?= $mhs->nim; ?></p>
                        <img class="img-responsive imgA1" src="<?= base_url('./assets/images/ticket/tiket.jpg'); ?>" />
                        <img class="img-responsive imgB1" src="<?= base_url('uploads/qr_image/' . $mhs->nim . 'code.png'); ?>" data-nim="<?= $mhs->nim; ?>" alt="QR Code">
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No data available.</p>
    <?php endif; ?>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.min.js"></script>

    <script>
    function downloadAllImages() {
        var images = document.querySelectorAll('.imgB1');
        images.forEach(function(imgB) {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');

            var imgA = imgB.previousElementSibling;
            var widthA = imgA.naturalWidth;
            var heightA = imgA.naturalHeight;

            var widthB = 220;
            var heightB = 220;

            canvas.width = widthA; 
            canvas.height = heightA; 

            ctx.drawImage(imgA, 0, 0);

            var qrX = 1010; 
        var qrY = 128;
            ctx.drawImage(imgB, qrX, qrY, widthB, heightB); 

            var dataURL = canvas.toDataURL('image/png');

            var link = document.createElement('a');
            link.download = imgB.getAttribute('data-nim') + '.png';
            link.href = dataURL;

            // Kirim NIM bersama dengan data gambar
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("EmailController/save_image"); ?>',
                data: { image: dataURL, nim: imgB.getAttribute('data-nim') },
                success: function(response) {
                    // Handle response if needed
                }
            });

            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    }

    function sendAllEmails() {
        downloadAllImages();

        // Panggil AJAX untuk memanggil fungsi di Controller yang akan mengirim email
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('send_image_emails'); ?>',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Email berhasil dikirim ke semua mahasiswa!',
                });
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat mengirim email.',
                });
            }
        });
    }
    </script>
</body>
<html>