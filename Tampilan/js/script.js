//responseText:
//0 = file upload error
//1 = file upload success
//2 = database insert done
	
$(document).ready(function() {
	$('#formprofil').ajaxForm({
		beforeSend:function(){
			$("#uploadbar").show();
		},
		uploadProgress:function(event,position,total,percentComplete){
			$(".progress-bar").width(percentComplete+'%'); //dynamically change the progress bar width
			$(".sr-only").html(percentComplete+'%');//show the percentage number
		},
		success:function(){
			$("#uploadbar").hide(); //hide progress bar on success of upload
		},
		complete:function(response){
			if(response.responseText == 1){//Upload Gagal
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Upload gagal. Pastikan file yang diupload merupakan file gambar (.jpg,.jpeg,.png,.gif) dan dengan ukuran tidak lebih dari 3 MB</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
				//display error if response is 0
			}
			else if(response.responseText == 2)//Simpan sukses
			{
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-success alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Simpan berhasil!</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else{
				$("#image").show;
				$("#image").attr("src",response.responseText);
				$("#hidpath").val(response.responseText);
				//show the image after success
			}
		}
	});
	
	
	//set the progress bar to be hidden on loading
	$("#uploadbar").hide();
});