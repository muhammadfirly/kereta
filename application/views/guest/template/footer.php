<!-- jQuery (harus sebelum Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

<!-- Custom JS -->
<script>
    $(document).ready(function() {
        $('#select_gerbong').on('change', function() {
            cekGerbong();
        });
    });

    $('#bagian_a').hide();
    $('#bagian_b').hide();

    function cekGerbong() {
        var gambar = $('#img_gerbong');
        var gerbong = $('#select_gerbong').val();

        console.log("Gerbong terpilih: " + gerbong);

        if (gerbong === "1") {
            gambar.attr('src', '<?= base_url('assets/gerbong/gerbong1.png') ?>');
        } else if (gerbong === "2") {
            gambar.attr('src', '<?= base_url('assets/gerbong/gerbong2.png') ?>');
        } else if (gerbong === "3") {
            gambar.attr('src', '<?= base_url('assets/gerbong/gerbong3.png') ?>');
        }
    }

    function cekBagian() {
        var bagian = $('#bagian');
        var bagian_a = $('#bagian_a');
        var bagian_b = $('#bagian_b');

        if (bagian.val() === "a") {
            bagian_a.show();
            bagian_b.hide();
        } else if (bagian.val() === "b") {
            bagian_b.show();
            bagian_a.hide();
        }
    }
</script>

<script>
    $(document).ready(function() {
        $("a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top - 80
                }, 800, function() {
                    window.location.hash = hash;
                });
            }
        });
    });
</script>
</body>

</html>