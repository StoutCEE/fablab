window.new_student = '<tr>\
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
window.new_staff = '<tr>\
		<td>Department</td>\
		<td><select name="department">\
			<option>----</option>\
			<option value="ENGR_TECH">Engineering and Technology</option>\
			<option value="MATH_CS">Mathematics, Statistics and Computer Science</option>\
			<option value="CHEM_PHYS">Chemistry and Physics</option>\
			<option value="OTHER">Other</option>\
		</select></td>\
	</tr>';

function user_specific() {
	
	var user_category = document.getElementsByName("category")[0].value;
	
	if (user_category == "Student") {
		document.getElementById("user_specific").innerHTML = new_student;
	} else if (user_category == "Faculty" || user_category == "Staff"){
		document.getElementById("user_specific").innerHTML = new_staff;
	} else {
		document.getElementById("user_specific").innerHTML = "";
	}
}