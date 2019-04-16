// $(function () {
//   $('[data-toggle="popover"]').popover()
  
//   $(".delete").click(doIt);

  
  
//   function doIt() {
	  
// 	  var cid = this.id; // HTML nodes have an id field that we can use to know exactly which delete button was clicked	  
// 	  alert("CID: " + cid);
	  
// 	  var btn = $(this); // btn is now a jquery object constructed from the HTML node
// 	  alert("BTN: " + btn.html())  // jquery objects have useful methods like html, which fetches the inner HTML of the tag
	
// 		// Rather than have the browser hyperlink to the script, we call the script asynchronously using the jQuery ajax method	
// 		var myurl = "delete_course.php?cid="+cid;  
// 		$.ajax({
// 				url: myurl, 
// 				success: function(data){
// 					btn.parent().parent().remove();
// 					alert(data);
// 				}
// 		}); 
//   }
// });

$(function() {

  $(".login").click(validate);

	function validate() {
		alert("Validate started");

		var myurl = "login_validate.php";
		$.ajax({
			url: myurl,
			success: function(data){
				alert("Successful validation");
					}
				});
	}
});
