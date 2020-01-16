/*
        This function keep the helping system enabled or disabled
        depending on user choice.
*/

function setSystemState(val) {
	if (val == "True") {
		if (window.document.getElementById('helpSwitch') != undefined) {
			(window.document.getElementById('helpSwitch')).checked = false;
		}
        $(function() { $.tooltip.block() });
	}else if (val == "False") {
		if (window.document.getElementById('helpSwitch') != undefined) {
			(window.document.getElementById('helpSwitch')).checked = true;
		}
		$(function() { $.tooltip.unblock() });
	}
}


/*
        This function return an help text (HTML string) giving an id.
*/

function getHelpText(id) {
	var helpText = "";
	switch(id) {
		case "_helpLoginUsername":
			helpText = "Enter your MACS username here.";
			break;
		case "_helpLoginPassword":
			helpText = "Enter your MACS password here.";
			break;
		case "_helpLogin":
			helpText = "Login to access the system.";
			break;
		
		case "_helpBack":
			helpText = "Return to data listing for selected category.";
			break;
		case "_helpAdd":
			helpText = "Add new entry to database in selected category.";
			break;
		case "_helpRemove":
			helpText = "Remove selected item from all areas of database";
			break;
		
		case "_helpLogout":
			helpText = "Logout of entire system.";
			break;
		
		case "_helpGraphs":
			helpText = "Show overview graphs for all data in system.";
			break;
		case "_helpStaff":
			helpText = "Show information for all staff members in system.";
			break;
		case "_helpModules":
			helpText = "Show information for all current modules in system.";
			break;
		case "_helpAdmin":
			helpText = "Show information for all admin tasks in system.";
			break;
		case "_helpResearch":
			helpText = "Show information for all research duties in system.";
			break;
		
		case "_help-show-all":
			helpText = "Show data for full academic year.";
			break;
		case "_help-show-1":
			helpText = "Show data for 1st semester.";
			break;
		case "_help-show-2":
			helpText = "Show data for Christmas break.";
			break;
		case "_help-show-3":
			helpText = "Show data for 2nd semester.";
			break;
		case "_help-show-4":
			helpText = "Show data for Easter break.";
			break;
		case "_help-show-5":
			helpText = "Show data for 3rd semester.";
			break;
		
		case "_help-show-overview":
			helpText = "Show overview for selected item.";
			break;
		case "_help-show-details":
			helpText = "Show all details for selected item.";
			break;
		case "_help-show-assigned-staff":
			helpText = "Show all staff members assigned to selected item.";
			break;
		case "_help-show-assigned-modules":
			helpText = "Show all modules assigned to selected staff member.";
			break;
		case "_help-show-assigned-admin-tasks":
			helpText = "Show all admin tasks assigned to selected staff member.";
			break;
		case "_help-show-assigned-research-duties":
			helpText = "Show all research duties assigned to selected staff member.";
			break;
		case "_helpStaffBar":
			helpText = "Brown: Modules<br />Red: Admin Tasks<br />Orange: Research Duties";
			break;
		case "_helpChangePwd":
			helpText = "Click here to change your current password.";
			break;

		default:
			helpText = "Uh oh. No help text for this item.";
			break;
	}
	return helpText;
}
