var node = "39675"; //default
var garystr21 = ["95481", "109106"]; // electricity, heating

for (index = 0; index < garystr21.length; ++index) {
  console.log(garystr21[index]);
}

$(function() {

      // for (index = 0; index < garystr21.length; ++index) { 	node = garystr21[index]; }
      var datapage = "http://userpage.fu-berlin.de/uas/ems/data.php?node=" + node + "&unit=0";
      var a = [];
      var data39675;

      $.getJSON(datapage, function(data) {

        console.log(data);

        for (i = 0; i < data.Datapoint.length; i++) {
          // console.log("Item: " + i + ", Timestamp: " + data.Datapoint[i].Timestamp + ", Value: " + data.Datapoint[i].Value); console.log("[" + data.Datapoint[i].Timestamp + "," + data.Datapoint[i].Value + "]");
          a.push(data.Datapoint[i].Timestamp * 1000, data.Datapoint[i].Value / 1000000);
          // console.log(a[i]);
        }

        data39675 = _.chunk(a, 2)
        console.log(data39675);

      });

      function doPlot(position) {

        var data1 = [{
          data: data39675,
          label: "ELT Mittelspannung Dahlem gesamt",
          color: "#CC0000",
          points: {
            fillColor: "#CC0000",
            show: true
          },
          lines: {
            show: true,
            fill: true,
            fillColor: 'rgba(204,0,0,0.4)'
          }
        }];

        $.plot("#placeholder", data1, {
          xaxes: [{
            mode: "time",
            timeformat: "%m/%d",
            tickSize: [
              2, "day"
            ],
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          }],
          yaxes: [{
            axisLabel: "Electic Power [MW]",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 5,
            min: 0
          }],
          legend: {
            position: "sw"
          },
          series: {
            lines: {
              show: true
            },
            points: {
              radius: 1,
              show: true,
              fill: false
            }
          },
          grid: {
            clickable: true,
            hoverable: true,
            borderWidth: 3,
            mouseActiveRadius: 50,
            axisMargin: 20
          }
        });

      }

      $("button").click(function() {

        doPlot($(this).text());
      });
  });
