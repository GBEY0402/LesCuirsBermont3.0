var itemsCommande = [];
var items = [];

function addRow() {
         
    var table = document.getElementById("myTableData");

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    
    row.insertCell(0).innerHTML= '<input type="hidden" name="maxLineCount" value =' + rowCount + '>';
    row.insertCell(1).innerHTML= '<input type="text" name="'+ rowCount + '_code' + '" value= "' + code.options[code.value].text + '" readonly>';
    row.insertCell(2).innerHTML= '<input type="text" name="'+ rowCount + '_pointure' + '" value= "' + pointure.value + '" readonly>';
    row.insertCell(3).innerHTML= '<input type="text" name="'+ rowCount + '_quantite' + '" value= "' + quantite.value + '" readonly>';
    row.insertCell(4).innerHTML= '<input type="button" value = "Retirer" class="btn btn-danger" onClick="Javacsript:deleteRow(this)">';
}

function deleteRow(obj) {
     
    var index = obj.parentNode.parentNode.rowIndex;
    var table = document.getElementById("myTableData");
    table.deleteRow(index);
   
}

function addTable() {
     
    var myTableDiv = document.getElementById("myDynamicTable");
     
    var table = document.createElement('TABLE');
    table.border='1';
   
    var tableBody = document.createElement('TBODY');
    table.appendChild(tableBody);
     
    for (var i=0; i<3; i++){
       var tr = document.createElement('TR');
       tableBody.appendChild(tr);
      
       for (var j=0; j<4; j++){
           var td = document.createElement('TD');
           td.width='75';
           td.appendChild(document.createTextNode("Cell " + i + "," + j));
           tr.appendChild(td);
       }
    }
    myTableDiv.appendChild(table);
   
}

function load() {
   
    console.log("Page load finished");

}
