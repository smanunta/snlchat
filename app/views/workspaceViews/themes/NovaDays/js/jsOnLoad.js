window.addEventListener('load', function() {
  
  
  $.ajax({
           type: "GET",
           url: '../CrtlWorkspace/dataInJsonFormatForJs/',
           success: function(data)
           {
               loadWorkspaceJSONData(data); // show response from the php script.
           }
         });
   
  
  $(".sideNavLink").click(function() {
      console.log("sideNavLink has been clicked");    
      var chatId = $(this).attr("data-chat-id");
      var chatName = $(this).attr("data-chat-name");
      var openChat = createChatEnviornment.init(chatId, chatName);
      
    });
   
  $("#createChatRoomBtn").click(function() {
    var newChat = createChatRoom;
    if($("#newChatBgimg").val() !== "" && $("#newChatRoomName").val() !== "" )
      {
        newChat.newChatBgimg = $("#newChatBgimg").val();
        newChat.newChatRoomName = $("#newChatRoomName").val();
        newChat.init();
      }
    
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

imgFolderLoc = "../../app/models/userUploadedImages/";

function loadWorkspaceJSONData(data)
{
  wsData =JSON.parse(data);
  console.log(wsData);
}