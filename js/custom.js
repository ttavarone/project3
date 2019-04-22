$(function () {
  $('[data-toggle="popover"]').popover();
  $('.back').click(goBack);
  
  $(".deleteu").click(deleteUser);
  $(".deletec").click(deleteCourse);
  $(".backbtn").click(goBack);

  $(".pwd").blur(checkPwd);

  
  
  
  function deleteUser() {
	  
	  var uid = this.id; // HTML nodes have an id field that we can use to know exactly which delete button was clicked	  
	  //alert("UID: " + uid);
	  
	  var btn = $(this); // btn is now a jquery object constructed from the HTML node
	  //alert("BTN: " + btn.html());  // jquery objects have useful methods like html, which fetches the inner HTML of the tag
	
		// Rather than have the browser hyperlink to the script, we call the script asynchronously using the jQuery ajax method	
		var myurl = "delete_user.php?uid="+uid;  
		$.ajax({
				url: myurl, 
				success: function(data){
					if (confirm('Are you sure you want to delete this user?')) {
						btn.parent().remove();
					} else {
						// does nothing
					}
				}
		}); 
  }

  function deleteCourse() {
  	
  	var cid = this.id; // HTML nodes have an id field that we can use to know exactly which delete button was clicked	  
	  //alert("CID: " + cid);
	  
	  var btn = $(this); // btn is now a jquery object constructed from the HTML node
	  //alert("BTN: " + btn.html()); // jquery objects have useful methods like html, which fetches the inner HTML of the tag
	
		// Rather than have the browser hyperlink to the script, we call the script asynchronously using the jQuery ajax method	
		var myurl = "delete_course.php?cid="+cid;
		
		$.ajax({
				url: myurl, 
				success: function(data){
					if (confirm('Are you sure you want to delete this course?')) {
						btn.parent().remove();
					} else {
						//does nothing
					}
				}
		});
		 
  }

  // var alert = "<div></div>"
		// 			alert.class("alert alert-info").attr("role", "alert").text("Successfully deleted.");
		// 			$("h2").append(alert);

  function goBack() {
  	var btn = $(this);

  	$.ajax({
  		success: function(){
  			window.history.back();
  		}
  	});
  }

  function checkPwd(){
  	$("#pwd").val();
  }
});
