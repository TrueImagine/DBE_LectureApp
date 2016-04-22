//loginscript.js

$(document).ready(function() {
	$('#registerform').ajaxForm({
		complete:function(response){
			if(response.responseText == 2)//Captcha salah
			{
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Kode captcha tidak valid</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else if(response.responseText == 1)//Akun sudah ada
			{
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Account Anda Sudah Terdaftar!</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else if(response.responseText == 3)//sukses
			{
				alert('Account Berhasil Dibuat!'); 
				window.location='../index.php';
			}
		}
	});
	
	$('#lupaform').ajaxForm({
		complete:function(response){
			if(response.responseText == 1)//email/password salah
			{
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Email / Tanggal Lahir Anda Salah!</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else if(response.responseText == 2)//Captcha salah
			{
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Kode captcha tidak valid</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else if(response.responseText == 3)//sukses
			{
				alert('Password Berhasil Direset!'); 
				window.location='../index.php';
			}
		}
	});
	$("#pesan").hide();
});