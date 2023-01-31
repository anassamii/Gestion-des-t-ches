function myFunction() {
	var input, filter, table, tr,td,td1,td2,td3, i, txtValue,txtValue1,txtValue2,txtValue3;
	input = document.getElementById("myInput");
	filter = input.value.toUpperCase();
	table = document.getElementById("myTable");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		td1 = tr[i].getElementsByTagName("td")[1];
		td2 = tr[i].getElementsByTagName("td")[2];
		td3 = tr[i].getElementsByTagName("td")[3];
		if (td||td1||td2||td3) {
			txtValue = td.textContent || td.innerText;
			txtValue1 = td1.textContent || td1.innerText;
			txtValue2 = td2.textContent || td2.innerText;
			txtValue3 = td3.textContent || td3.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1||txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1||txtValue3.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			}else{
				tr[i].style.display = "none";
			}
		}       
	}
}

function sortTable() {
	
	var a=document.getElementById("tri_liste").value;
	
	if(a=="Tâches"){
		
		var table, tr, td, i, txtValue;
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			tr[i].style.display = "";      
		}
		
	}else if(a=="Accomplies"){
		
		var table, tr, td, i, txtValue;
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[3];
			if (td) {
				myCheckbox = td.getElementsByTagName("input")[0];
				if (myCheckbox && myCheckbox.checked) {
				  tr[i].style.display = "";
				} else {
				  tr[i].style.display = "none";
				}
			}       
		}
			
	}else if(a=="Valides"){
			
		var table, tr, td, i, txtValue;
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[3];
			if (td) {
				myCheckbox = td.getElementsByTagName("input")[0];
				if (myCheckbox && myCheckbox.checked) {
				  tr[i].style.display = "none";
				} else {
				  tr[i].style.display = "";
				}
			}       
		}
		
	}else{				
		alert("Erreur lors du tri");
	}
}

