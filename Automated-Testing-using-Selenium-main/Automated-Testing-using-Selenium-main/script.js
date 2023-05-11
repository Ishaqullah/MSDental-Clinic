function checkFileType(input) {
  if (!input.value.endsWith(".txt")) {
    alert("Invalid file type. Only text files (.txt) are allowed.");
    input.value = "";
  }
}

var colors = [
  "one",
  "two",
  "three",
  "four",
  "five",
  "six",
  "seven",
  "eight",
  "nine",
  "ten",
  "eleven",
  "twelve",
  "thirteen",
  "fourteen",
];
var TROW = "tr",
  TDATA = "td";
function barChart(data) {
  var chart = document.createElement("div");

  var barchart = document.createElement("table");

  var titlerow = document.createElement(TROW);

  var titledata = document.createElement(TDATA);

  titlerow.appendChild(titledata);
  barchart.appendChild(titlerow);
  chart.appendChild(barchart);

  var barrow = document.createElement(TROW);
  var j = 0;

  for (var i = 0; i < data.length; i++) {
    if (i % 13 == 0) j = 0;

    barrow.setAttribute("class", "bars");
    var bardata = document.createElement(TDATA);
    var bar = document.createElement("div");
    bar.setAttribute("id", i);
    if (i > 13) {
      bar.setAttribute("class", colors[j]);
      j++;
    } else {
      bar.setAttribute("class", colors[i]);
    }
    bar.style.height = data[i] + "px";
    bardata.innerText = data[i];
    bardata.appendChild(bar);
    barrow.appendChild(bardata);
  }

  var legendrow = document.createElement(TROW);
  var legend = document.createElement(TDATA);
  legend.setAttribute("class", "legend");
  legend.setAttribute("colspan", data.length);

  for (var i = 0; i < data.length; i++) {
    var legbox = document.createElement("span");
    legbox.setAttribute("class", "legbox");
    var barname = document.createElement("span");
    barname.setAttribute("class", colors[i] + " xaxisname");
    legbox.appendChild(barname);
  }
  barrow.appendChild(legend);
  barchart.appendChild(barrow);
  barchart.appendChild(legendrow);
  chart.appendChild(barchart);
  for (var i = 0; i < 1; i++)
    document.getElementsByClassName("chart")[i].innerHTML = chart.outerHTML;
}
var countChart = 0;
var modBarChart = (data, index) => {
  var st = Date.now();
  var chart = document.createElement("div");

  var barchart = document.createElement("table");

  var titlerow = document.createElement(TROW);

  var titledata = document.createElement(TDATA);

  titlerow.appendChild(titledata);
  barchart.appendChild(titlerow);
  chart.appendChild(barchart);

  var barrow = document.createElement(TROW);
  var j = 0;

  for (var i = 0; i < data.length; i++) {
    if (i % 13 == 0) j = 0;

    barrow.setAttribute("class", "bars");
    var bardata = document.createElement(TDATA);
    var bar = document.createElement("div");
    if (i > 13) {
      bar.setAttribute("class", colors[j]);
      j++;
    } else {
      bar.setAttribute("class", colors[i]);
    }
    if (index == 9) bar.style.height = data[i] * 30 + "px";
    else bar.style.height = data[i] + "px";
    bardata.innerText = data[i];
    bardata.appendChild(bar);
    barrow.appendChild(bardata);
  }

  var legendrow = document.createElement(TROW);
  var legend = document.createElement(TDATA);
  legend.setAttribute("class", "legend");
  legend.setAttribute("colspan", data.length);

  for (var i = 0; i < data.length; i++) {
    var legbox = document.createElement("span");
    legbox.setAttribute("class", "legbox");
    var barname = document.createElement("span");
    barname.setAttribute("class", colors[i] + " xaxisname");
    legbox.appendChild(barname);
  }
  barrow.appendChild(legend);
  barchart.appendChild(barrow);
  barchart.appendChild(legendrow);
  chart.appendChild(barchart);
  document.getElementsByClassName("chart")[index].innerHTML = chart.outerHTML;
  var en = Date.now();
  countChart += countChart * (en - st);
};
var countCount1 = 0;
var countModBarChart = (data, index) => {
  var s = Date.now();
  var chart = document.createElement("div");

  var barchart = document.createElement("table");

  var titlerow = document.createElement(TROW);

  var titledata = document.createElement(TDATA);

  titlerow.appendChild(titledata);
  barchart.appendChild(titlerow);
  chart.appendChild(barchart);

  var barrow = document.createElement(TROW);
  var j = 0;

  for (var i = 0; i < data.length; i++) {
    if (i % 13 == 0) j = 0;

    barrow.setAttribute("class", "bars");
    var bardata = document.createElement(TDATA);
    var bar = document.createElement("div");
    if (i > 13) {
      bar.setAttribute("class", colors[j]);
      j++;
    } else {
      bar.setAttribute("class", colors[i]);
    }
    bar.style.height = (data[i] + 1) * 7 + "px";
    bardata.innerText = data[i];
    bardata.appendChild(bar);
    barrow.appendChild(bardata);
  }

  var legendrow = document.createElement(TROW);
  var legend = document.createElement(TDATA);
  legend.setAttribute("class", "legend");
  legend.setAttribute("colspan", data.length);

  for (var i = 0; i < data.length; i++) {
    var legbox = document.createElement("span");
    legbox.setAttribute("class", "legbox");
    var barname = document.createElement("span");
    barname.setAttribute("class", colors[i] + " xaxisname");
    legbox.appendChild(barname);
  }
  barrow.appendChild(legend);
  barchart.appendChild(barrow);
  barchart.appendChild(legendrow);
  chart.appendChild(barchart);
  document.getElementsByClassName("chart")[index].innerHTML = chart.outerHTML;
  var e = Date.now();
  countCount1 += countCount1 * (e - s);
};

var defaultArr = [82, 23, 75, 53, 32, 24];

barChart(defaultArr);
var myFile = document.getElementById("formFile");
var arrFromFile;
var data;
myFile.addEventListener("change", function () {
  var file = myFile.files.item(0);
  var fileReader = new FileReader();
  fileReader.onload = function () {
    arrFromFile = JSON.parse(fileReader.result);
    data = arrFromFile.split(",");
    console.log(data);
    check = true;
    for (var i = 0; i < data.length; i++) {
      if (isNaN(data[i])) {
        alert("Invalid data in file to be sorted!");
        check = false;
        break;
      }
    }
    if (check) barChart(data);
  };
  if (check) fileReader.readAsText(file);
});

var start, end, time;
var check = true;
var count = 0;

let sortBarChart = async (data, sortID) => {
  if (sortID == 1) {
    count = 0;
    insertionSort(data);
  }
};

var insertionSort = async (data) => {
  start = Date.now();
  var key, j;
  for (var i = 1; i < data.length; i++) {
    key = data[i];
    j = i - 1;
    while (j >= 0 && Number(data[j]) > key) {
      data[j + 1] = data[j];
      modBarChart(data, 0);
      j--;
    }
    data[j + 1] = key;
    modBarChart(data, 0);
  }
  modBarChart(data, 0);
  end = Date.now();
  time = end - start;
  time = time / 1000;
  time = time - count * (150 / 1000);
  time = time - countChart;
  time = time.toPrecision(5);
  document.getElementById("insertionTime").innerHTML =
    String(time) + " seconds";
};

let insBtn = document.getElementById("ins-btn");

insBtn.addEventListener("click", () => {
  if (data) {
    sortBarChart(data, 1);
  }
});
