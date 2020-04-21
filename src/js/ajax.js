// Task Management System AJAX Script

// Wait for DOM
$(document).ready(function() {

	// Show loading indicator
	$(document.body).ajaxStart(function() {
		$(document.body).append('<img id="spinner" src="../../../js/spinner.gif" />');
	}).ajaxStop(function() {
		$('#spinner').remove();
	});
	
	
	// Filter buttons for time-based filtering of list views
	$("#_help-show-all").click(function(){
		$("#content").load('index.unfiltered.inc.php');
		
		$("#_help-show-all").addClass("active");
		$("#_help-show-1").removeClass("active");
		$("#_help-show-2").removeClass("active");
		$("#_help-show-3").removeClass("active");
		$("#_help-show-4").removeClass("active");
		$("#_help-show-5").removeClass("active");
	});
	
	// Show 1st semester
	$("#_help-show-1").click(function(){
		$("#content").load('index.filtered.inc.php?period=1');
		
		$("#_help-show-all").removeClass("active");
		$("#_help-show-1").addClass("active");
		$("#_help-show-2").removeClass("active");
		$("#_help-show-3").removeClass("active");
		$("#_help-show-4").removeClass("active");
		$("#_help-show-5").removeClass("active");
	});
	
	// Show Christmas break
	$("#_help-show-2").click(function(){
		$("#content").load('index.filtered.inc.php?period=2');
		
		$("#_help-show-all").removeClass("active");
		$("#_help-show-1").removeClass("active");
		$("#_help-show-2").addClass("active");
		$("#_help-show-3").removeClass("active");
		$("#_help-show-4").removeClass("active");
		$("#_help-show-5").removeClass("active");
	});
	
	// Show 2nd semester
	$("#_help-show-3").click(function(){
		$("#content").load('index.filtered.inc.php?period=3');
		
		$("#_help-show-all").removeClass("active");
		$("#_help-show-1").removeClass("active");
		$("#_help-show-2").removeClass("active");
		$("#_help-show-3").addClass("active");
		$("#_help-show-4").removeClass("active");
		$("#_help-show-5").removeClass("active");
	});
	
	// Show Easter break
	$("#_help-show-4").click(function(){
		$("#content").load('index.filtered.inc.php?period=4');
		
		$("#_help-show-all").removeClass("active");
		$("#_help-show-1").removeClass("active");
		$("#_help-show-2").removeClass("active");
		$("#_help-show-3").removeClass("active");
		$("#_help-show-4").addClass("active");
		$("#_help-show-5").removeClass("active");
	});
	
	// Show 3rd semester
	$("#_help-show-5").click(function(){
		$("#content").load('index.filtered.inc.php?period=5');
		
		$("#_help-show-all").removeClass("active");
		$("#_help-show-1").removeClass("active");
		$("#_help-show-2").removeClass("active");
		$("#_help-show-3").removeClass("active");
		$("#_help-show-4").removeClass("active");
		$("#_help-show-5").addClass("active");
	});
	
	
	// Filter buttons for detailed information
	$("#_help-show-overview").addClass("active");
 	$("#details").hide();
 	$("#assigned-staff").hide();
 	$("#assigned-modules").hide();
 	$("#assigned-admin-tasks").hide();
 	$("#assigned-research-duties").hide();
 	
 	// Show overview
 	$("#_help-show-overview").click(function(){
 		$("#_help-show-overview").addClass("active");
 		$("#_help-show-details").removeClass("active");
 		$("#_help-show-assigned-staff").removeClass("active");
 		$("#_help-show-assigned-modules").removeClass("active");
 		$("#_help-show-assigned-admin-tasks").removeClass("active");
 		$("#_help-show-assigned-research-duties").removeClass("active");
 		
 		$("#overview").show();
 		$("#details").hide();
 		$("#assigned-staff").hide();
 		$("#assigned-modules").hide();
 		$("#assigned-admin-tasks").hide();
 		$("#assigned-research-duties").hide();
 	});
 	
 	// Show details
 	$("#_help-show-details").click(function(){
 		$("#_help-show-overview").removeClass("active");
 		$("#_help-show-details").addClass("active");
 		$("#_help-show-assigned-staff").removeClass("active");
 		$("#_help-show-assigned-modules").removeClass("active");
 		$("#_help-show-assigned-admin-tasks").removeClass("active");
 		$("#_help-show-assigned-research-duties").removeClass("active");
 		
 		$("#overview").hide();
 		$("#details").show();
 		$("#assigned-staff").hide();
 		$("#assigned-modules").hide();
 		$("#assigned-admin-tasks").hide();
 		$("#assigned-research-duties").hide();
 	});
 	
 	// Show assigned staff
 	$("#_help-show-assigned-staff").click(function(){
 		$("#_help-show-overview").removeClass("active");
 		$("#_help-show-details").removeClass("active");
 		$("#_help-show-assigned-staff").addClass("active");
 		$("#_help-show-assigned-modules").removeClass("active");
 		$("#_help-show-assigned-admin-tasks").removeClass("active");
 		$("#_help-show-assigned-research-duties").removeClass("active");
 		
 		$("#overview").hide();
 		$("#details").hide();
 		$("#assigned-staff").show();
 		$("#assigned-modules").hide();
 		$("#assigned-admin-tasks").hide();
 		$("#assigned-research-duties").hide();
 	});
 	
 	// Show assigned modules
 	$("#_help-show-assigned-modules").click(function(){
 		$("#_help-show-overview").removeClass("active");
 		$("#_help-show-details").removeClass("active");
 		$("#_help-show-assigned-staff").removeClass("active");
 		$("#_help-show-assigned-modules").addClass("active");
 		$("#_help-show-assigned-admin-tasks").removeClass("active");
 		$("#_help-show-assigned-research-duties").removeClass("active");
 		
 		$("#overview").hide();
 		$("#details").hide();
 		$("#assigned-staff").hide();
 		$("#assigned-modules").show();
 		$("#assigned-admin-tasks").hide();
 		$("#assigned-research-duties").hide();
 	});
 	
 	// Show assigned admin tasks
 	$("#_help-show-assigned-admin-tasks").click(function(){
 		$("#_help-show-overview").removeClass("active");
 		$("#_help-show-details").removeClass("active");
 		$("#_help-show-assigned-staff").removeClass("active");
 		$("#_help-show-assigned-modules").removeClass("active");
 		$("#_help-show-assigned-admin-tasks").addClass("active");
 		$("#_help-show-assigned-research-duties").removeClass("active");
 		
 		$("#overview").hide();
 		$("#details").hide();
 		$("#assigned-staff").hide();
 		$("#assigned-modules").hide();
 		$("#assigned-admin-tasks").show();
 		$("#assigned-research-duties").hide();
 	});
 	
 	// Show assigned research duties
 	$("#_help-show-assigned-research-duties").click(function(){
 		$("#_help-show-overview").removeClass("active");
 		$("#_help-show-details").removeClass("active");
 		$("#_help-show-assigned-staff").removeClass("active");
 		$("#_help-show-assigned-modules").removeClass("active");
 		$("#_help-show-assigned-admin-tasks").removeClass("active");
 		$("#_help-show-assigned-research-duties").addClass("active");
 		
 		$("#overview").hide();
 		$("#details").hide();
 		$("#assigned-staff").hide();
 		$("#assigned-modules").hide();
 		$("#assigned-admin-tasks").hide();
 		$("#assigned-research-duties").show();
 	});

});


/* Dynamic page loading functions */

function xhr() {
	var xmlhttp
	
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		try {
			xmlhttp = new XMLHttpRequest();
		} catch (e) {
			xmlhttp=false;
		}
	} else {
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {
				xmlhttp = false;
			}
		}
	}
	return xmlhttp;
}


function ajaxShow(fragment_url, element_id, showLoadingPic) {
	showLoadingPic = showLoadingPic || false;
	var element = document.getElementById(element_id);

	var xmlhttp = xhr();
	if (showLoadingPic) {
		element.innerHTML = '<div style="padding-top:5px;margin:2px;;vertical-align:middle;text-align:center;width:99%;height:100%;"><img src="../js/spinner.gif" alf="Loading..." /></div>';
	}


	xmlhttp.open("POST", fragment_url, true);
	xmlhttp.setRequestHeader("Content-Type", "text/plain;charset=UTF-8");
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 ) {
			if( xmlhttp.status == 200 ) {
				element.innerHTML = xmlhttp.responseText;
				reevaluateScripts(element);
			} else {
				element.innerHTML = '<div style="padding:5px;margin:0px;vertical-align:middle;text-align:center;width:100%;height:100%;">Error while loading page</div>';
			}
		}
	}
	xmlhttp.send("");
} 


/* forcing all javascripts reevaluation after loading a page by AJAX*/
function reevaluateScripts(element) {
	var myScripts = element.getElementsByTagName("script");
	for (var i=0; i<myScripts.length; i++) {
		eval(myScripts[i].innerHTML);
	}
}
