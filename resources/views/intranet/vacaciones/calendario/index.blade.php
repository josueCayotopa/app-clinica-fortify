

<divc class="card-body mt-5">
  <div id='calendar' style="padding: 20px"></div>
</divc>

<script src="
https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js

"></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
      const calendarEl = document.getElementById('calendar');
      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        events: @json($events)
      });
      calendar.render();
    });

  </script>

