
function Person(id, name) {
	this.id = id;
	this.name = name;
}

Person.prototype.name = "";
Person.prototype.id = "";

function Item(options) {
	//  defaults
	this.key = options.key;

}

function Factory() {
}

Factory.prototype.Class = Item;
Factory.prototype.createClass = function(options) {
	if (options.ClassType === "TableA") {
		this.Class = TableA;
	} else if (options.ClassType === "TableX") {
		this.Class = TableX;
	} else {
		this.Class = Item;
	}
	return new this.Class(options);
};

function TableX(options) {
	//alert("make tableX");
	//var tableHeader = new TableHeader();
	//this.tableHeader = tableHeader.createHeader(options.tableHeader);

	var trows = new TableRow();
	this.tableRows = trows.createRow(options.tableData);

	var tableTable = new TableTable();
	this.tableHTML = tableTable.createTableTable( this.tableRows);

}

function TableTable() {
}

TableTable.prototype.createTableTable = function( rows) {
	var html = "<table class='tableX' border='0' >";
	html +=  rows;
	html += "</table>";
	return html;
}
function TableHeader() {
}

TableHeader.prototype.createHeader = function(data) {
	var content = "<div class ='tableXHead' ><tr   ><th   >" + data + "</th></tr></div>";
	return content
}
function TableRow() {
}

TableRow.prototype.createRow = function(data) {
	var cellContent = "<div   >";
	var tableData = new TableData();
	for (var i = 0; i < data.length; i++) {
		cellContent += "<tr  onclick='rowSelectedAtIndex(this)' >";
		var person = data[i];
		var display = person.name;
		// L E F T   O F F   H E R E  : how can I abstract out this Person class
		// or send it as a parameter somehow.

		cellContent += tableData.createCell(display);
		cellContent += "</tr>";
		
		
	}
	//add filler row for scrolling user friendliness.
	cellContent +="<tr class='tableXFillerRow'><td></td></tr>";
	cellContent += "</div>";
	return cellContent;
}
function TableData() {
}

TableData.prototype.createCell = function(data) {
	var cellContent = "<td   >" + data + "</td>";
	return cellContent;
}

