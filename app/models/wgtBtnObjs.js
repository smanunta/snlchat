//-----------------------------------------------------------------------------------------------------------------------------------
//this file includes the objects that will be available for widgets. this will widgets that can go on top of a widget or on the bottom
//-----------------------------------------------------------------------------------------------------------------------------------

var wgtExit = {
    wgt: "", //wgt object
    createBtn: function(){
      newBtn = document.createElement("button");
      newBtn.setAttribute("class", "btnExit");
      newBtn.setAttribute("data-wgtID",this.wgt.widget_id);
      newBtn.innerHTML = "<span class='glyphicon glyphicon-remove-sign'' aria-hidden='true''></span>";
      newBtn.addEventListener("click", this.btnAction);
      new_header.appendChild(newBtn);
    },
  
    btnAction:function(){
      $(this).parents(".wgtWrapper").remove();
      //ajax function to get the JSON
      xmlHttp.open('GET', '../CrtlWidget/wgtBtnClose/', false);
      xmlHttp.onreadystatechange = function ()
        {
          if(xmlHttp.readyState==4)
            {
              if(xmlHttp.status==200)
              {
                Response = xmlHttp.responseText; 
                
                //console.log(Response);
              }
            }
        }
    }
}

var wgtSaveNote = {
  
}

var wgtResize = {
  wgt: "", //wgt object
  createBtn:function(){
      newBtn = document.createElement("button");
      newBtn.setAttribute("class", "btnExit");
      newBtn.setAttribute("data-wgtID",this.wgt.widget_id);
      newBtn.innerHTML = "<span class='glyphicon glyphicon-plus-sign'' aria-hidden='true''></span>";
      newBtn.addEventListener("click", this.btnAction);
      new_header.appendChild(newBtn);
  },
  btnAction:function(){
    if($(this).parents(".wgtWrapper").hasClass("col-md-4"))
      {
        $(this).parents(".wgtWrapper").removeClass("col-md-4").addClass("col-md-8");
      }else if ($(this).parents(".wgtWrapper").hasClass("col-md-8")) {
        $(this).parents(".wgtWrapper").removeClass("col-md-8").addClass("col-md-12");
      }else if ($(this).parents(".wgtWrapper").hasClass("col-md-12")) {
        $(this).parents(".wgtWrapper").removeClass("col-md-12").addClass("col-md-4");
      }

    }
}