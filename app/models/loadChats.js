var createChatEnviornment = {
  chatId: "",
  chatName: "",
  chatData: "", //this will be set if the chat is found and has data
  lastChatContactId: 0, // this will be used to identify the time the user made first contact
  $this: $(this),

  init: function(chatId, chatName)
  {
    this.chatId = chatId;
    this.chatName = chatName;

    if ($('.wgtWrapper').length > 0) {
      $(".wgtWrapper").fadeOut(function() {
        clearInterval(activeChatInterval);

        $(".wgtWrapper").remove();

        if ($this[0].checkIfChatExist()) //if true
        {
          if ($this[0].loadTheContainer()) //if true
          {
            if ($this[0].loadTheChatView()) {

            }
          }
        } else {
          console.log("checkIfChatExist has failed ...since it does not exist open New");
          $this[0].enterNewChatRoom();
        }

      });
    } else {

      if (this.checkIfChatExist()) //if true
      {
        if (this.loadTheContainer()) //if true
        {
          if (this.loadTheChatView()) {

          }
        }
      } else {
        console.log("checkIfChatExist has failed ...since it does not exist open New");
        this.enterNewChatRoom();
      }
    }
  },

  //check to see if the chat id and chat name exist in the open chats
  checkIfChatExist: function() {
    //console.log("checkIfChatExist running");
    //console.log(this.chatId + this.chatName);


    //DUMMY DATA 
    if (wsData.open_chat === "no currently Opened chats") {
      //console.log("yes");
      wsData.open_chat = [{
        bgimg: "none",
        chat_id: "00999",
        chat_name: "snl",
        created: "2016-03-24 12:11:56",
        creator_user_id: "19",
        id: "1",
        opened_date: "2016-03-11",
        user_id: "19"
      }];
      //console.log(wsData.open_chat);

    }

    wsData.open_chat.forEach(function(openChatData) {
      if (this.chatId == openChatData.chat_id && this.chatName == openChatData.chat_name) {
        this.chatData = openChatData;
      } else {

      }
    }, this);
    if (this.chatData !== "") {
      console.log(this.chatData);
      return true;
    } else {
      return false;
    }
  },

  //load the container for the chat and apply necessary classes to it 
  //load the BG here
  loadTheContainer: function()
  {

    $("body").css({
      "background": "url(" + imgFolderLoc + this.chatData.bgimg + ".jpg) no-repeat center center scroll",
      "background-attachment": "fixed",
      " min-height": "100%",
      "background-size": "cover"
    });

    var new_wrapper = document.createElement('div'); //CREATES THE MAIN WRAPPER
    new_wrapper.setAttribute('class', this.chatData.chat_name + " wgtWrapper"); //MAIN WRAPPER WILL HAVE 2 CHILDS 1 MAIN_SEC 1 HEADER
    var new_header = document.createElement('div');
    new_header.setAttribute('class', 'wgtHeader text-right'); //HEADER WILL INCLUDE WIDGET OPTIONS EX. EXIT
    var new_main_sec = document.createElement('div');
    new_main_sec.setAttribute('class', 'main_sec'); //MAIN_SEC WILL INCLUDE MAIN DATA
    new_wrapper.appendChild(new_header);
    new_wrapper.appendChild(new_main_sec);

    $('#main_content').append(new_wrapper);
    console.log("loadTheContainer has loaded and is working");
    return true;
  },

  //this will be the actual chat BOX and features for the selected chat
  loadTheChatView: function() {
    console.log("loadTheChatView running");
    $this = $(this);
    $(".wgtWrapper").load("/snlchat/app/views/workspaceViews/themes/viewModules/chatMod1.php", function() {
      console.log("the chat view has finished loading");

      $("#main_content #sendChatLine").click(function() {
        $this[0].sendChatLine();
        console.log("sendchatlinebtn was pressed");
      });

      $('#newChatLine').keypress(function(e) {
        if (e.which == 13) {
          $("#sendChatLine").trigger("click");
          return false; //<---- Add this line
        }
      });

      $this[0].getChatLines();

      return true;
    });


  },

  getChatLines: function() {
    console.log("getChatLines running");

    var formData = {
      'chatName': this.chatName,
      'chatId': this.chatId,
      'timestamp': this.lastChatContactId
    };

    $.ajax({
      type: "POST",
      url: "../CrtlWorkspace/getChatLines/",
      data: formData, // serializes the form's elements.
      success: function(data) {
        // alert(data); // show response from the php script.
        var $chatLines = JSON.parse(data);
        console.log($chatLines);
        //foreach line print and append to #chatText
        $chatLines.forEach(function($line) {
            console.log($line.msg_id);
          if($line.user_id == wsData.userData.user_id)
            {
             console.log("usrnames match");
             var $linePrep = "<div class='chatline me'>";
             $linePrep = $linePrep + "<div>Me: </div>";
             $linePrep = $linePrep + "<div>" + $line.msg + "</div>";
             $linePrep = $linePrep + "<div class='time'>" + $line.timestamp + "</div>";
             $linePrep = $linePrep + "</div>"
           } else {
             var $linePrep = "<div class='chatline notme'>";
             $linePrep = $linePrep + "<div>" + $line.first + " " + $line.last + ": </div>";
             $linePrep = $linePrep + "<div>" + $line.msg + "</div>";
             $linePrep = $linePrep + "<div class='time'>" + $line.timestamp + "</div>";
             $linePrep = $linePrep + "</div>";
           }
          

          //console.log($this[0].lastChatContact);
          $this[0].lastChatContactId = $line.msg_id;

          $("#chatText").append($linePrep);
          
          $(function() {
            var chatBox = $('#chatText');
            var height = chatBox[0].scrollHeight;
            chatBox.scrollTop(height);
          });
        });



        activeChatInterval = setInterval(function() {
          $this[0].getRestChatLines();
        }, 2000);
      }
    });
  },

  sendChatLine: function() {
    console.log("sendChatLine running");
    //console.log(this.chatData.user_id);
    var formData = {
      'chatName': this.chatName,
      'chatId': this.chatId,
      'timestamp': Date.now(),
      'msg': $("#newChatLine").val(),
      'user_id': this.chatData.user_id
    };

    $.ajax({
      type: "POST",
      url: "../CrtlWorkspace/sendChatLine/",
      data: formData, // serializes the form's elements.
      success: function(data) {
        //alert(data); // show response from the php script.
        console.log("the sendchatline returned: " + data);
        $("#newChatLine").val("");
      }
    });
  },

  getRestChatLines: function() {
    console.log("getRestChatLines running");

    var formData = {
      'chatName': this.chatName,
      'chatId': this.chatId,
      'lastChatContactId': this.lastChatContactId
    };

    $.ajax({
      type: "POST",
      url: "../CrtlWorkspace/getRestChatLines/",
      data: formData, // serializes the form's elements.
      success: function(data) {
        //alert(data); // show response from the php script.
        var $chatLines = JSON.parse(data);
        console.log($chatLines);
        //foreach line print and append to #chatText
        $chatLines.forEach(function($line) {
          if($line.user_id == wsData.userData.user_id)
            {
             console.log("usrnames match");
             var $linePrep = "<div class='chatline me'>";
             $linePrep = $linePrep + "<div>Me: </div>";
             $linePrep = $linePrep + "<div>" + $line.msg + "</div>";
             $linePrep = $linePrep + "<div class='time'>" + $line.timestamp + "</div>";
             $linePrep = $linePrep + "</div>"
           } else {
             var $linePrep = "<div class='chatline notme'>";
             $linePrep = $linePrep + "<div>" + $line.first + " " + $line.last + ": </div>";
             $linePrep = $linePrep + "<div>" + $line.msg + "</div>";
             $linePrep = $linePrep + "<div class='time'>" + $line.timestamp + "</div>";
             $linePrep = $linePrep + "</div>";
           }

          $this[0].lastChatContactId = $line.msg_id;

          $("#chatText").append($linePrep);

          $(function() {
            var chatBox = $('#chatText');
            var height = chatBox[0].scrollHeight;
            chatBox.scrollTop(height);
          });
        });
      }
    });
  },

  enterNewChatRoom: function() {

    var formData = {
      'chatId': this.chatId,
    };

    $.ajax({
      type: "POST",
      url: "../CrtlWorkspace/enterChatRoom/",
      data: formData, // serializes the form's elements.
      chatId: this.chatId,
      chatName: this.chatName,
      success: function(data) {
        //location.reload();
          var appendToMenu = "<li class='menuOption'><a data-chat-id='" + this.chatId + "' data-chat-name='" + this.chatName + "' class='sideNavLink'>" + this.chatName + "</a></li>";
          $("#sideMenu #activeChats").append(appendToMenu);

          //also add entry in wsData.open_chats
          $.ajax({
             type: "GET",
             url: '../CrtlWorkspace/dataInJsonFormatForJs/',
             success: function(data)
             {
                 loadWorkspaceJSONData(data); // show response from the php script.
             }
           });

          //add the new onclick functionaloty to the new object
          $(".sideNavLink").click(function() {
            console.log("sideNavLink has been clicked");
            var chatId = $(this).attr("data-chat-id");
            var chatName = $(this).attr("data-chat-name");
            var openChat = createChatEnviornment.init(chatId, chatName);

          });
      }
    });
  }
  
}//createChatEnviornment object end


var createChatRoom = {


  newChatBgimg: "",
  newChatRoomName: "",

  init: function() {
    var formData = {
      'newChatBgimg': this.newChatBgimg,
      'newChatRoomName': this.newChatRoomName
    };

    $.ajax({
      type: "POST",
      url: "../CrtlWorkspace/createNewChatRoom/",
      data: formData, // serializes the form's elements.
      success: function(data) {
        //alert(data); // show response from the php script.
        if (data) {
          $('#myModal .modal-body').append("your room has been created!!");
        } else {
          $('#myModal .modal-body').append("There was a problem creating your room");
        }

      }
    });
  }

}