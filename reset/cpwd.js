function validatePassword() {
var cpwd,pwd,output = true;

cpwd = document.frmChange.cpwd;
pwd = document.frmChange.pwd;

if(pwd.value == cpwd.value) {
	output = true;
}
if(cpwd.value != pwd.value) {
	cpwd.value="";
	cpwd.focus();
	document.getElementById("cpwd").innerHTML = "Password not Match!";
	output = false;
} 	
return output;
}
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}