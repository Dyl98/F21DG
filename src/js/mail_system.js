/*
        This function keep the mail system enabled or disabled
        depending on user choice.
*/

function setMailSystemState(val)
{
	if (val == "True") {
		if (window.document.getElementById('mailSwitch') != undefined) {
			(window.document.getElementById('mailSwitch')).checked = false;
		}
	}else if (val == "False") {
		if (window.document.getElementById('mailSwitch') != undefined) {
			(window.document.getElementById('mailSwitch')).checked = true;
		}
	}
}
