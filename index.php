<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
    } else {
        echo "Please fill out the form and submit it.";
    }
?>
<!DOCTYPE html>
<head>
<title>Markdown rended via Github API</title>
  <link rel="stylesheet" href="github-markdown.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="reamMd.0.0.2.js"></script>
<style>
* {
  box-sizing: border-box;
}

body { 
  background-color: #010409;
  color: white;
  font-family: Arial;
  padding: 10px;
}

.header {
  padding: 30px;
  text-align: center;
  background: #0d1117;
}

.header h1 {
  font-size: 50px;
}
.center {
  margin-left: auto;
  margin-right: auto;
  width: 80%;
  border: 2px solid white;
  border-radius: 5px;
  padding: 10px;

}
.card {
  background-color: #0d1117;
  padding: 20px;
  margin-top: 20px;
}


.markdown-body {
  box-sizing: border-box;
  min-width: 200px;
  max-width: 980px;
  margin: 0 auto;
  padding: 45px;
}
.markdown-body h3 {
  color: white;
}
@media (max-width: 767px) {
  .markdown-body {
    padding: 15px;
  }
}
code,
pre {
  position: relative;
}

code,
pre {
  display: block;
  padding: 20px;
  color: white/*#555755*/;
  white-space: pre;
  text-wrap: wrap;
}
span.command-copy, span.copyClipboard {
  position: absolute;
  top: 1px;
  right: 5px;
  opacity: .7;
  font-size: 20px;
  color: #555755;

}
span.command-copy:hover, span.copyClipboard:hover {
  cursor: pointer;
  color: white;
  opacity: 1;
}
pre>code>span.command-copy {
  display:none;
}
code {
  display: inline-block;
}
code>span.command-copy {
  display: none;
}
.IMPORTANT {
  border-left: 6px solid #8856e5 !important;
  color: #8856e5 !important;
}
.IMPORTANT::before{
  font-family: "Font Awesome 5 Free";
  content: "\f05a";
  display: inline-block;
  padding-right: 3px;
  vertical-align: middle;
  font-weight:900;
}
.CAUTION {
  border-left: 6px solid #db3632 !important;
  color: #db3632 !important;
}
.CAUTION::before{
  font-family: "Font Awesome 5 Free";
  content: "\f071";
  display: inline-block;
  padding-right: 3px;
  vertical-align: middle;
  font-weight:900;
}
textarea {
  width: 80%;
  height: 250px;
  margin: 0;
}
</style>
</head>
<body>
<div class="header">
  <h1>reaMd.js</h1>
  <h2>Markdown rended via Github API</h2>
</div>

<form action="form.php" method="post">
    <label for="text">Enter markdown formatted text:</label>
    <textarea type="text" id="text" name="text"></textarea><br><br>
    <input type="submit" value="Submit">
</form>

<div class="card">
  <div id="output" class="markdown-body">
  <?php
  if (Isset($text)) {
  echo $text;
  }
  ?>
  </div>
</div>

<script>
// Call the function 
const data = document.getElementById("output").innerHTML;
reaMd(data, "output");
</script>
