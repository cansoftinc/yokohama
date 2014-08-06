// JavaScript Document
function LoginValidate(formLogin)
{
		for(i=0;i<formLogin.length;i++)
		{
			if(formLogin.elements[i].value == "")
			{
				document.getElementById('error').innerHTML="<br><span class='error'>Fill All fields Please</span>";
				setFocus();
				return false;
				
			}
		}//end for loop
		
		return true;
		
}//end function

function setFocus()
{
	document.LoginForm.username.focus();	
}

function ConfirmApprove()
{
	if(confirm("Are You sure ? "))
	{
		return true;	
	}
	else
	{
		return false;	
	}
}

function formatx(x) {

var i, txt = x.value, out ,j = 1, res;


for (i = (txt.length - 1);i>=0;i--) txt = txt.replace(',','');

out = '';
res = '';

for (i = (txt.length - 1);i>=0;i--) { out += txt.charAt(i); if ( ( (j % 3) == 0 ) && (txt.length > j) ) out += ','; j++; }

for (i = (out.length - 1);i>=0;i--) res += out.charAt(i);

x.value = res;

}//end function format number in text box

function showModal(){
console.log("-----test---");
	$('#uploadModal').modal('show',function(){
	console.log("-----test---");
	});
}
function resetModal() {
	var v = $("#picname").html();
	console.log("reset image"+v);
	$('#imagelabel').val(v);
	$('#imagename').attr({
		"src" : "pics/" + $("#picname").html(),
		"alt" : $("#picname").html(),
		"width" : "250px",
		"height" : "300px"
	});
}
$(document).ready(function(){

	$('#uploadModalbtn').click(showModal);

	$('#file').live('change', function() {
		$("#preview").html('');
		$("#preview").html('<img src="img/loader.gif" alt="Loading...">');
		$("#imageform").ajaxForm({
			target : '#preview'
		}).submit();
	});
	$('#saveButton').click(resetModal);
});