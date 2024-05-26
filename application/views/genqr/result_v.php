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
        top: 43%;
        left:68%;
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
    position: relative;
   left: -20px;
   margin-bottom: 15px;
}

.btn-download {
    background-color: #007bff; /* Warna biru untuk tombol download */
    border-color: #007bff;
}

.btn-send {
    background-color: #28a745; /* Warna hijau untuk tombol kirim */
    border-color: #28a745;
}


</style>

<div class="col-sm-12">
    <div class="button-container">
        <button onclick="downloadImages()" class="down btn btn-gradient-info">Download</button>
        <button onclick="sendEmail()" class="down btn btn-gradient-success">Kirim</button>
    </div>
    <img class="img-responsive imgA1" src="<?php echo base_url('./assets/images/ticket/tiket.jpg'); ?>" />
    <img class="img-responsive imgB1" src="<?php echo base_url('uploads/qr_image/') . $nim . 'code.png'; ?>" />
</div>

<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.min.js"></script>

<script>
    function downloadImages() {
        return new Promise((resolve, reject) => {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');

            var imgA = document.querySelector('.imgA1');
            var widthA = imgA.naturalWidth;
            var heightA = imgA.naturalHeight;

            var imgB = document.querySelector('.imgB1');
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
            link.download = '<?php echo $nim ?>.png';
            link.href = dataURL;

            // Kirim NIM bersama dengan data gambar
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("EmailController/save_image"); ?>',
                data: { image: dataURL, nim: '<?php echo $nim; ?>' },
                success: function(response) {
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    resolve(); // Resolve the promise when AJAX call and download are complete
                },
                error: function() {
                    reject(); // Reject the promise in case of error
                }
            });
        });
    }

    function sendEmail() {
        downloadImages()
            .then(() => {
                // Buat permintaan AJAX untuk mengirim email setelah gambar diunduh dan disimpan
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "<?php echo site_url('EmailController/send_image_email/'.$id_mahasiswa); ?>", true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText.includes('Email berhasil dikirim')) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Email berhasil dikirim!',
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Email gagal dikirim.',
                            });
                        }
                    }
                };
                xhr.send();
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat memproses gambar.',
                });
            });
    }
</script>


