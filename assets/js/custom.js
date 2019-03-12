//Call ajax funcation every second to check for new messages
setInterval(function(){ajax(),user_online();},1000);

//Js for login box
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

//Calling scroll function on every page reload
scroll();

//Check for new messages to generate notification
var old_count = 0;

function notify()
{
    $.ajax({
        url:"notify.php",
        success: function(data){
            if(data > old_count)
            {
                scroll();
                notifyMe();
                old_count = data ; 
            }
        }
    })
}

$("#text_box").on( 'keyup' , function(e){
  console.log(this.val);
  if( e.keyCode === 13)
  {
    $("#send_btn").click(); 
  }
});

//Genrate notification
function notifyMe() {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check if the user is okay to get some notification
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
  var options = {
        body: "New message is added",
        icon: "assets/images/bell-icon.png",
        dir : "ltr"
    };
  var notification = new Notification("Talk !t",options);
  }

  // Otherwise, we need to ask the user for permission
  // Note, Chrome does not implement the permission static property
  // So we have to check for NOT 'denied' instead of 'default'
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      // Whatever the user answers, we make sure we store the information
      if (!('permission' in Notification)) {
        Notification.permission = permission;
      }

      // If the user is okay, let's create a notification
      if (permission === "granted") {
        var options = {
              body: "New message is added",
              icon: "assets/images/bell-icon.png",
              dir : "ltr"
          };
        var notification = new Notification("Tik_talk",options);
      }
    });
  }

  // At last, if the user already denied any notification, and you
  // want to be respectful there is no need to bother them any more.
}

//Scroll to end of div
function scroll()
{
	$("#chat_messages").animate({ duration: 1,scrollTop: $('#chat_messages').prop("scrollHeight")});
}

//Load messages to div
function ajax()
{   
	// scroll();    
	$.ajax({url: "load_messages.php", success: function(result)
    {	
    		notify();
        user_status();
        $("#chat_messages").html(result);

    }});

}

ajax();

function user_online()
{   
  // scroll();    
  $.ajax({url: "online_user.php", success: function(result)
    { 

    }});
}

function user_status()
{   
  // scroll();    
  $.ajax({url: "get_user_status.php", success: function(result)
    { 
        $("#chat_members").html(result);
    }});

}

//Add messages to database
function add_msg() {
    // get values
    var msg_form_box = $(".msg_form_box").val();
 
	  console.log(msg_form_box);

    // Add record
    $.post("add_msg.php", {
        msg_form_box: msg_form_box,
    }, function (data, status) {
    	$(".msg_form_box").val('');
    	ajax();
    	scroll();
    });
}
    
$(".upload-button").on('click', function() {
               $(".file_upload").click();
            });

$("#file").change(function(){
        myFunction();
    });
    
    function myFunction() {
      
      var fd = new FormData();

      var files = $('#file')[0].files[0];

      fd.append('file',files);

      $.ajax({
          url:'image_upload.php',
          type:'post',
          data:fd,
          contentType: false,
          processData: false,
          success:function(response){
              ajax();
              scroll();
          }
      });
  }


function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}