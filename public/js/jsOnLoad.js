window.addEventListener('load', function() {
  $("#sideMenuBtn").click(function() {
    $(this).hide();
  });
  $("#closeSideMenuBtn").click(function() {
    $("#sideMenuBtn").show();
  });

  if ($('#fullCalendar').length) {

    jQuery.getScript("/myMvc/public/js/fullcalendar-2.6.0/lib/moment.min.js", function() {
      jQuery.getScript("/myMvc/public/js/fullcalendar-2.6.0/fullcalendar.min.js", function() {
        //css 
        var myStylesLocation = "/myMvc/public/js/fullcalendar-2.6.0/fullcalendar.min.css";
        $.get(myStylesLocation, function(css) {
          $('<style type="text/css"></style>')
            .html(css)
            .appendTo("head");
        });

        $('#fullCalendar').fullCalendar({
          events: '/myMvc/public/ctrlPublic/getDataForAjax/calendar/loadEventsForCalendar',
          eventDataTransform: function(rawEventData) {
            return {
              id: rawEventData.id,
              title: rawEventData.title,
              start: rawEventData.start,
              end: rawEventData.end,
              url: rawEventData.url
            };
          }
        });
      });
    });








  }

});