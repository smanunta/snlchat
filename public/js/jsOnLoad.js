window.addEventListener('load', function() {
  $("#openCloseSideMenuBtn").click(function() {
    if($(".sideMenu").hasClass("closed"))
      {
        $(".sideMenu").toggleClass("menuOpen");
        $(".sideMenu").removeClass("closed").addClass("opened");
        $("#openCloseSideMenuBtn span").removeClass("glyphicon-menu-right").addClass("glyphicon-menu-left");
      }
    else
        {
          $(".sideMenu").toggleClass("menuOpen");
          $(".sideMenu").removeClass("opened").addClass(" closed");
          $("#openCloseSideMenuBtn span").removeClass("glyphicon-menu-left").addClass("glyphicon-menu-right");
        }
  });
  
  
 
});
