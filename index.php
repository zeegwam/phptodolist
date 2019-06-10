<?php
//start a session
session_start();
//session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Todo App </title>
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lobster" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<div id="myDIV" class="header">
  <form method="POST" action="index1.php">
  <h1 style="margin:5px">My Bucket List</h1>
  <input type="text"  name="list" id="myInput" placeholder="Add more...">
  <span onclick="newElement()" class="addBtn">Add</span>
  </form>
  
</div>
<?php 
if($_POST){
$something = $_POST['list'];
 if(isset($_SESSION['items'])){
   $_SESSION['items'][] = $something;
 }else{
  $_SESSION['items'] = [];
 }
 var_dump($_SESSION);
}

?>
<ul id="myUL">
  <li>Hit the gym</li>
</ul>

<script>
  // Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}
// Add a line through when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);


// Create a list when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}


</script>

</body>
</html>

