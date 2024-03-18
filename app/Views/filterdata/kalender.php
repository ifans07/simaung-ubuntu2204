<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <!-- full calendar -->
        <div class="mt-5">
            <div id="calendar"></div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [{
            'title': 'Belajar fullCalendar',
            'start': '2024-02-01',
            'description': 'full belajar seminggu'
            // 'end': '2024-02-14'
        }],
        eventContent: function(info) {
            let content = document.createElement('div')
            content.innerHTML = `<span>Description: ${info.event.extendedProps.description}</span>`;
            return {
                domNodes: [content]
            }
        }
    });
    calendar.render();
});
</script>

<?= $this->endSection() ?>