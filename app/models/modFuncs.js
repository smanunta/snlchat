var xmlHttp = new XMLHttpRequest();

/*  
 ***********************************************************************************************
 *
 *this object will be used to manipulate MODALS for the page 
 *MODALs used will be using BOOTSTRAP 
 *
 *steps: var is assigned the obj modelfuncs to instantiate , run the mod open which will use a mod 
 *name that will be pulled from an html obj, 
 ***********************************************************************************************
 */


var modalFuncs = {
  
   modOpenNew: function(modName) { //wgtName comes from the menuy HTML
    modData = JSON.parse(this.getJsonForSingleMod(modName));
    output = this.modRunModelNView(modData.name);

    $('#modals_content').append(output);
     
    window[modName](); //if the modal requires javascript this call will load it as long as the name is the same as modName
  },
  
  getJsonForSingleMod: function(modName) {
    
    //ajax function to get the JSON
    xmlHttp.open('GET', './CrtlModals/getJsonForSingleMod/' + modName + '/', false);
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
  
  modRunModelNView: function(modName) {
    xmlHttp.open('GET', './CrtlModals/modRunModelNView/' + modName + '/', false);
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
  }
  
}

 function modImageSelector() {
    var imgLocation = "bob";
    
    $(".ImageChoice").click(function(){ //submit image choice will be the button in the modal
     
      //get the img location from the obj
      imgLocation = $(this).attr("data-imgtouse");
      
    });
    
    $("#submitImageChoice").click(function(){ //submit image choice will be the button in the modal
     
      //get the img location from the obj
      modalReturn =  imgLocation;
      $("#imgSelected").val(modalReturn);
      $('#myImageSelectorModal').modal('hide');
    });
    
   
    
    $("#submitNewImage").click(function(event) {
      dataToSend = new FormData();
      dataToSend.append("newImageToSubmit", $('#newImageToSubmit')[0].files[0]);

      $.ajax({
        url: "/myMvc/app/models/uploadFiles.php", // Url to which the request is send
        type: "POST", // Type of request to be send, called as method
        data: dataToSend, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false, // To send DOMDocument or non processed data file it is set to false
        success: function(data) // A function to be called if request succeeds
          {
            alert("thisn worked" + data);
            console.log(data);
          }
      });
    });
    
    
  }
  

//postImg = modalFuncs.modOpenNew("modImageSelector").modImageSelector();
//alert(postImg);


