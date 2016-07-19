window.addEventListener('load', function() {
  wgtOpenedData = JSON.parse(wgtFuncs.wgtGetOpenedWgts()); // turns JSON data from php into javascript parsed JSON.. this includes the data for all the widgets 
  
  console.log(wgtOpenedData); // the user has open at the beginnning of the program
  
  wgtOpenedData.forEach(function(wgtData) // Here we run a foreach function to gto through every widget that is opened and we run the function
    { // wgtRunModelNView which runs AJAX to run the MODEL and VIEW for the wgt.. then we append the content to the container
      //grabs each JSON obj which includes the users opened widgets onload
      htmlOutput = wgtFuncs.wgtRunModelNView(wgtData.name);

      wgtFuncs.wgtLookNFunc(wgtData);
      $('#main_content div .main_sec:last').append(htmlOutput);
      //$('#main_content div .wgtHeader:last').append(objJSON.name);
      // Now we need to grab the html output and put it in the code
    });

  wgtName = $('.wgtOption').each(function(i, obj) {
    console.log($(this).attr("data-widget"));
    var wgtName = $(this).attr("data-widget");
    $(this).click(function() {
      newWgt = wgtFuncs;
      newWgt.wgtOpenNew(wgtName);
    });

  });


});