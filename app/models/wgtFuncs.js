// var xmlHttp = new XMLHttpRequest();  NOT NEEDED SINCE IT IS STARTED ON MODFUNCS.JS


/*  
 ***********************************************************************************************
 *
 *this object includes functions to manipulate widgets 
 *Like pulling widget data, creating widget encasings, and posting the wgt to page
 *
 ***********************************************************************************************
 */

var wgtFuncs = {

  /*  
   ***********************************************************************************************
   *
   *this function uses ajax to load JSON data from the file CrtlWidget.php using the method getJSON
   *
   ***********************************************************************************************
   */
  wgtGetOpenedWgts: function() {
    //ajax function to get the JSON
    xmlHttp.open('GET', './CrtlWidget/getJSON', false);
    xmlHttp.onreadystatechange = function() {
      if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
          Response = xmlHttp.responseText;

        }
      }
    }
    xmlHttp.send(null);
    return Response;
  },

  /*  
   ***********************************************************************************************
   *
   *this function uses ajax to load the VIEW of the widget from their specific file 
   *these files are under views/widgets and are loaded by using the name to match the 
   *file in the views folder
   ***********************************************************************************************
   */


  wgtRunModelNView: function(wgtName) {
    xmlHttp.open('GET', './CrtlWidget/wgtRunModelNView/' + wgtName + '/', false);
    xmlHttp.onreadystatechange = function() {
      if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
          Response = xmlHttp.responseText;
          //console.log(Response);
        }
      }
    }
    xmlHttp.send(null);
    return Response;
  },

  /*  
   ***********************************************************************************************
   *
   *this function CREATES the widget box or container for the widget being opened 
   *this process looks at the parameter for the specific widget stored in the DB
   *mainly looks at the classes and buttons used by the widget
   *
   ***********************************************************************************************
   */
  wgtLookNFunc: function(wgtParams) {

    new_wrapper = document.createElement('div'); //CREATES THE MAIN WRAPPER
    new_wrapper.setAttribute('class', wgtParams.classes + " wgtWrapper"); //MAIN WRAPPER WILL HAVE 2 CHILDS 1 MAIN_SEC 1 HEADER
    new_header = document.createElement('div');
    new_header.setAttribute('class', 'wgtHeader text-right'); //HEADER WILL INCLUDE WIDGET OPTIONS EX. EXIT
    new_main_sec = document.createElement('div');
    new_main_sec.setAttribute('class', 'main_sec'); //MAIN_SEC WILL INCLUDE MAIN DATA
    new_wrapper.appendChild(new_header);
    new_wrapper.appendChild(new_main_sec);

    //applicableBtns  =  //this should get the btn objs that apply to the widget and return an array with the objs
    if (wgtParams.wgtBtnObjs) {
      //console.log(wgtParams.wgtBtnObjs);  //displays in the log all the btns loading 
      //get the string and explode into array
      wgtBtnObjs = wgtParams.wgtBtnObjs.split(" "); //here we are splitting the string into arrays to get all the applicable btns to add to this wgt
      //for each through the array and intatiate and add the btns
      wgtBtnObjs.forEach(function(btnObj) {
        //console.log(btnObj);
        //console.log(wgtExit);
        try {
          if (typeof window[btnObj].createBtn === "function") {
            objInstantiate = window[btnObj]; //instatiate an obj fromm the wgtBtnObjs.js
            objInstantiate.wgt = wgtParams;
            objInstantiate.createBtn();
          } else {
            console.log("function does not exist");
          }
        } catch (err) {
          console.log("this ERROR is showing becuase the button name it's using from the DB does not have a proper object created in the wgtBtnObjs.js...the error is : " + err);
        }

      });
    }

    $('#main_content').append(new_wrapper);

  },

  /*  
   ***********************************************************************************************
   *
   *this function Opens a new widget
   *
   *
   *
   ***********************************************************************************************
   */
  wgtOpenNew: function(wgtName) { //wgtName comes from the menuy HTML
    wgtData = JSON.parse(this.getJsonForSingleWgt(wgtName));
    output = this.wgtRunModelNView(wgtData.name);
    this.wgtLookNFunc(wgtData);

    $('#main_content div .main_sec:last').append(output);
    window[wgtName]();
  },



  getJsonForSingleWgt: function(wgtName) {
    //ajax function to get the JSON
    xmlHttp.open('GET', './CrtlWidget/getJsonForSingleWgt/' + wgtName + '/', false);
    xmlHttp.onreadystatechange = function() {
      if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
          Response = xmlHttp.responseText;

        }
      }
    }
    xmlHttp.send(null);
    return Response;
  }
}

function wgtCreateWidgetFiles() //uses the wgt name that is passed by the open new obj func
{

  $("#submitNewWidget").click(function(event) {
    //alert("this has been clicked");

    //select the input boxes and put the data into VARS
    newWgtName = $("#newWgtName").val();
    newWgtBtns = $("#newWgtBtns").val();
    newWgtBtns = newWgtBtns.split(" ");
    newWgtBtns = newWgtBtns.join("--");
    newWgtClasses = $("#newWgtClasses").val();
    classesEncap = newWgtClasses.split(" "); //makes classes encap an array 
    classesEncap = classesEncap.join("--");



    xmlHttp.open('GET', './CrtlWidget/wgtCreateWidgetFiles/' + newWgtName + '/' + newWgtBtns + '/' + classesEncap + '/', false);
    xmlHttp.onreadystatechange = function() {
      if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
          Response = xmlHttp.responseText;
        }
      }
    }
    xmlHttp.send(null);
    return Response;
  });
}



/*  
 ***********************************************************************************************
 *
 *this function CREATES the POST that are stored in the DB 
 *this process looks at the parameters entered and will use AJAX POST for regiular text and
 *call the loadImageSelector function to load the MODAL with the image selector
 *
 ***********************************************************************************************
 */

function wgtPosts() {

  //load the image selector since it is needed here
  modalFuncs.modOpenNew("modImageSelector");
  

  $("#submitNewPost").click(function(event) {
    
    var formData = {
            'newPostTitle'              : $("#post_title").val(),
            'newPostContent'             : $("#post_content").val() ,
            'newPostImg'    : $("#imgSelected").val(),
            'newPostType'       : $("#post_type").val()
        };

    $.ajax({
           type: "POST",
           url: './CrtlWidget/wgtCreatePosts/',
           data: formData, // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });
  });
}

/*  
 ***********************************************************************************************
 *
 *this function CREATES the CALENDAR EVENT that are stored in the DB 
 *this process looks at the parameters entered and will use AJAX POST for regiular text and
 *call the loadImageSelector function to load the MODAL with the image selector
 *
 ***********************************************************************************************
 */ 

function wgtCreateEvent() {

  //load the image selector since it is needed here
  //modalFuncs.modOpenNew("modImageSelector");
  

  $("#submitNewEvent").click(function(event) {
    
    var formData = {
    'newEventTitle': $("#event_title").val(),
    'newEventDescription': $("#event_description").val(),
    'newEventLocation': $("#event_location").val(),
    'newEventContact': $("#event_contact").val(),
    'newEventUrl': $("#event_url").val(),
    'newEventStart': $("#event_start").val(),
    'newEventEnd': $("#event_end").val()
  };

    $.ajax({
           type: "POST",
           url: './CrtlWidget/wgtCreateEvent/',
           data: formData, // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });
  });
}

function wgtAppOptions()
{
  $("#updateAppOptions").click(function()
  {
    var formData = {
      'appName': $("#appName").val(),
      'themeInUse': $("#themeInUse").val(),
      'workspaceTheme': $("#workspaceTheme").val()
      
    };

    $.ajax({
      type: "POST",
      url: "./CrtlWidget/wgtUpdateAppOptions/",
      data: formData, // serializes the form's elements.
      success: function(data) {
        //alert(data); // show response from the php script.
        console.log("the wgtUpdateAppOptions returned: " + data);
      }
    });
  });
  
  
}