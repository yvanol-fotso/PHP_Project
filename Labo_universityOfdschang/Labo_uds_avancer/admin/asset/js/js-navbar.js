function showResponsiveMenu() {   
	var menu = document.getElementById("topnav_responsive_menu");   
	var icon = document.getElementById("topnav_hamburger_icon");   
	var root = document.getElementById("root");   
	if (menu.className === "") {     
		menu.className = "open";     
		icon.className = "open";     
		root.style.overflowY = "hidden";   
	} else {     
		menu.className = "";                         i
		con.className = "";     
		root.style.overflowY = "";   
	} 
}
