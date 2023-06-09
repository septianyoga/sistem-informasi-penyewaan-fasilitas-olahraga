<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    /* .fc-event-title-container {
        background-color: red !important;
        text-align: center;
    }

    .fc-event-title-container:hover {
        background-color: black !important;
    }

    .fc-event-title {
        color: black;
        font-weight: bold !important;
        font-size: 3rem !important;
    }

    .fc-day-past {
        background-color: azure !important;
    } */
</style>
<main>
    <!--? Blog Area Start-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle ">
                        <h3><b><a href="<?= base_url('fasilitas/' . $fasilitas['id_fasilitas']) ?>"><i class="bi bi-chevron-left"></i> Kembali</a></b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <h1 class="ml-4">Pilih Jam Tanggal Penyewaan</h1>
                            </div>
                            <div class="blog_details">
                                <div class="col-lg-12">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </article>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Blog Area End -->
    <!-- Want To work End -->
    <!-- Want To work 01-->

    <!-- Want To work End -->
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            businessHours: true,
            events: [
                <?php foreach ($pesanan as $value) { ?> {
                        title: 'Booked',
                        start: '<?= strval($value['tanggal']) ?>'
                    },
                <?php } ?>
            ],
            dateClick: function(info) {
                tgl = info.dateStr;
                tgl = tgl.split('T');
                jamaja = tgl[1].split('+')
                jambulat = jamaja[0].split(':')
                jam = tgl[0] + ' ' + jambulat[0] + ':00:00';
                if ("<?= date('Y-m-d H:i:s') ?>" > jam) {
                    // alert('<?= date('Y-m-d H:i:s') ?> ' + tgl[0] + ' ' + jamaja[0]);
                    Swal.fire(
                        'Opsss...',
                        'Jam sudah melewati saat ini.',
                        'warning'
                    )
                } else {
                    Swal.fire({
                        title: 'Yakin ingin melakukan sewa di tanggal ' + jam + '?',
                        text: "Anda dapat membatalkan pesanan kapan saja!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Tentu!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('<form action="<?= base_url('/detail_pemesanan') ?>" method="post"><input type="hidden" name="id_penyewa" value="<?= session()->get('id') ?>"></input><input type="hidden" name="id_fasilitas" value="<?= $fasilitas['id_fasilitas'] ?>"></input><input type="hidden" name="tanggal" value="' + jam + '"></input><input type="hidden" name="nominal" value="<?= $fasilitas['harga'] ?>"></input></form>').appendTo('body').submit().remove();
                            // $.ajax({
                            //     url: '<?= base_url('sewa/booking') ?>',
                            //     type: 'POST',
                            //     data: {
                            //         id_penyewa: <?= session()->get('id') ?>,
                            //         id_fasilitas: <?= $fasilitas['id_fasilitas'] ?>,
                            //         tanggal: jam,
                            //         nominal: <?= $fasilitas['harga'] ?>
                            //     },
                            //     success: function(result) {
                            //         // alert(result)
                            //         Swal.fire(
                            //             'Berhasil!',
                            //             'Booking anda telah di buat.',
                            //             'success'
                            //         )
                            //         setTimeout(() => document.location.href = '<?= base_url('/metode_pembayaran/') ?>' + result, 3000);
                            //         // setTimeout(alert('halo'), 5000);
                            //     }
                            // })

                        }
                    })


                }
            },

        });

        calendar.render();
    });
</script>