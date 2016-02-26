var itemsCommande = [];
var items = [];

function addRow() {
         
    var produitCode = document.getElementById("code");
    var itemPointure = document.getElementById("pointure");
    var itemQuantite = document.getElementById("quantite");
    var table = document.getElementById("myTableData");

    items.push(produitCode);
    items.push(itemPointure);
    items.push(itemQuantite);
    itemsCommande.push(items);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    
    row.insertCell(0).innerHTML= '<input type="button" value = "Retirer" onClick="Javacsript:deleteRow(this)">';
    row.insertCell(1).innerHTML= code.options[code.value].text;
    row.insertCell(2).innerHTML= pointure.value;
    row.insertCell(3).innerHTML= quantite.value;

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
