/**
  Bootstrap Alerts -
  Function Name - showalert()
  Inputs - message,alerttype
  Example - showalert("Invalid Login","alert-error")
  Types of alerts -- "alert-error","alert-success","alert-info"
  Required - You only need to add a alert_placeholder div in your html page wherever you want to display these alerts "<div id="alert_placeholder"></div>"
  Written On - 14-Jun-2013

  Fade out .fadeIn(500).delay(2000).fadeOut(500
  Slide up .fadeTo(2000, 500).slideUp(500
**/

function showalert() {
    console.log(alerttype);
    var htm = '<div id="alertdiv" class="alert ' + alerttype + '"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+message+'</strong></div>';
    $('#alert_placeholder').append(htm)

    $("#alert_placeholder").fadeIn(500).delay(2000).fadeOut(500, function(){
               $("#alert_placeholder").alert('close');
               $("#alertdiv").remove();
                });

  }

//Wait for jQuery to be loaded
function defer(method) {
      if (window.jQuery)
          method();
      else
          setTimeout(function() { defer(method) }, 50);
  }

window.onload=defer(showalert);
