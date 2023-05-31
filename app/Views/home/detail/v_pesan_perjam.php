<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    .fc-event-title-container {
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
    }
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
            events: [{
                title: 'lsdflksdjf',
                start: '2023-05-31 07:00:00'
            }],
            dateClick: function(info) {
                tgl = info.dateStr;
                jam = tgl.split('T');
                jamaja = jam[1].split('+')

                alert('clicked ' + jam[0] + jamaja[0]);
            },

        });

        calendar.render();
    });
</script>