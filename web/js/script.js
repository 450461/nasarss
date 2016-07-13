function insertCmt($id) {
					$.ajax({
						type: "post",
						url: "/comment/create",
						datatype: "text",
						data: 	"&user="+$('#user').val()+
								"&id="+$id+
								"&note="+$('#note').val(),
						success: function(data){						
							document.getElementById("cmtDiv").innerHTML=data;							
							document.getElementById("user").value='';							
							document.getElementById("note").value='';							
						}
					});					
}

function deleteItem($id) {
					$.ajax({
						type: "post",
						url: "/nasarss/delete",
						datatype: "text",
						data: 	"&id="+$id,
						success: function(data){			
							document.getElementById("table").innerHTML=data;							
						}
					});		
}

function sync() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","/nasarss/synchronize",false);
	xmlhttp.send();					
}