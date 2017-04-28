console.log("SANITY CHECK");
var express = require("express"),
  bodyParser = require("body-parser");

// app entry point
var app = express();

app.use(express.static("public"));

app.use(bodyParser.urlencoded({
  extended: true
}));


app.get("/", function(req, res) {

  res.sendFile("index.html", {
    root: __dirname
  });

});

app.listen(process.env.PORT || 3000, function() {

  console.log("Unicorn Mobile, LLC is listening at http://localhost:3000/");

});
