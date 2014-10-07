var cell1Content = "<h3>Horse Back Riding</h3><p>100 acres of horse trails.Packed Lunches.</p>";
var cell2Content = "<h3>Gardening</h3><p>The kids will really dig, excuse the pun, learning to plant vegetables.</p>";
var cell3Content = "<h3>Petting Zoo</h3><p>Every kind of animal you can imagine on the farm.</p>";
var cell4Content = "<h3>Family Fun</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>";

var myArray = new Array();
myArray[0] = new Person(8, "<div class='scrollingTableCell' ><div class='scrollingTableCellContent'>" + cell1Content + "</div></div>");
myArray[1] = new Person(12, "<div class='scrollingTableCell' ><div class='scrollingTableCellContent'>" + cell2Content + "</div></div>");
myArray[2] = new Person(345, "<div class='scrollingTableCell' ><div class='scrollingTableCellContent'>" + cell3Content + "</div></div>");
myArray[3] = new Person(66, "<div class='scrollingTableCell' ><div class='scrollingTableCellContent'>" + cell4Content + "</div></div>");
