function user_specific() {
	
	var user_category = document.getElementsByName("category")[0].value;
	
	if (user_category == "Student") { document.getElementById("user_specific").innerHTML = add_user_student; } else if (user_category == "Faculty" || user_category == "Staff"){
		document.getElementById("user_specific").innerHTML = add_user_staff;
	} else {
		document.getElementById("user_specific").innerHTML = "";
	}
}

function group_specific() {
	
	var user_category = document.getElementsByName("category")[0].value;
	
	if (user_category == "Lab") {
		document.getElementById("group_specific").innerHTML = add_group_lab;
	} else if (user_category == "Student Organization"){
		document.getElementById("group_specific").innerHTML = add_group_org;
	} else {
		document.getElementById("group_specific").innerHTML = "";
	}
}



window.add_user_student = '<tr>\
		<td>Major</td>\
		<td><select name="major">\
			<option>----</option>\
			<option value="CEE">Computer Engineering</option>\
			<option value="ET">Engineering Technology</option>\
			<option value="PLE">Plastics Engineering</option>\
			<option value="MECH">Mechanical Engineering</option>\
			<option value="MFGE">Manufacturing Engineering</option>\
			<option value="Other">Undeclared/Other</option>\
		</select></td>\
	</tr><tr>\
		<td>Class</td>\
		<td><select name="classification">\
			<option>----</option>\
			<option>Freshman</option>\
			<option>Sophomore</option>\
			<option>Junior</option>\
			<option>Senior</option>\
			<option>Graduate Student</option>\
			<option>Foreign Exchange</option>\
		</select></td>\
	</tr>';
window.add_user_staff = '<tr>\
		<td>Department</td>\
		<td><select name="department">\
			<option>----</option>\
			<option value="ENGR_TECH">Engineering and Technology</option>\
			<option value="MATH_CS">Mathematics, Statistics and Computer Science</option>\
			<option value="CHEM_PHYS">Chemistry and Physics</option>\
			<option value="OTHER">Other</option>\
		</select></td>\
	</tr>';


window.add_group_lab = '<tr>\
		<td>Department</td>\
		<td><select name="department">\
			<option>----</option>\
			<option value="ENGR_TECH">Engineering and Technology</option>\
			<option value="MATH_CS">Mathematics, Statistics and Computer Science</option>\
			<option value="CHEM_PHYS">Chemistry and Physics</option>\
			<option value="OTHER">Other</option>\
		</select></td>\
	</tr><tr>\
		<td>Location</td>\
		<td><input type="text" name="location"  required></input></td>\
	</tr>';
window.add_group_org = '<tr>\
		<td>Organization Email</td>\
		<td><input type="email" name="email"  required></input></td>\
	</tr><tr>\
		<td>OrgSync URL</td>\
		<td><input type="url" name="orgsync"  required></input></td>\
	</tr><tr>\
		<td>Website</td>\
		<td><input type="url" name="website"  required></input></td>\
	</tr>';


//DROPDOWN TEST SECTION

/* When the user clicks on the button, JAVASCRIPT
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

//HTML
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>

//CSS
/* Dropdown Button */
.dropbtn {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
    background-color: #2980B9;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
