

/* ============ TITLE TOOLTIP TOOGLE ============== */
	
$(function () 
{
	$('[data-toggle="tooltip"]').tooltip();
});


/*
	============================

	VALIDATE LOGIN FORM
	
	============================
*/

function validateLogInForm() 
{
	var username_input = document.forms["login-form"]["username"].value;
	var password_input = document.forms["login-form"]["password"].value;

	if (username_input == "" && password_input == "") 
    {
    	document.getElementById('required_username').style.display = 'initial';
    	document.getElementById('required_password').style.display = 'initial';
    	return false;
    }
    
    if (username_input == "") 
   	{
    	document.getElementById('required_username').style.display = 'initial';
    	return false;
    }
    if(password_input == "")
    {
    	document.getElementById('required_password').style.display = 'initial';
        return false;
    }
}


/*
    ======================================
    
    TOGGLE BOOKINGS TABS IN DASHBOARD PAGE

    ========================================
*/

function openTab(evt, tabName) 
{
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    
    for (i = 0; i < tabcontent.length; i++) 
    {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) 
    {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    
    document.getElementById(tabName).style.display = "table";
    evt.currentTarget.className += " active";
}
