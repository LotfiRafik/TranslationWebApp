    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <input type="date" id="date1" />
    <input type="date" id="date2" />
  <button id="submit" onclick="drawChart()">Voir Statistiques</button> 


    <div id="curve_chart" style="width: 900px; height: 500px"></div>


 
    
    
    
    
    
    
    
    
    <script>
     // google.charts.load('current', {'packages':['corechart']});
      //google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.DataTable();
        data.addColumn('string','date');
        data.addColumn('number','Nombre Traductions');
        $.ajax({
            method: "POST",
            url: "./?p=nbTraduction",
            data : {
              "date1" : $("#date1").val(),
              "date2" :  $("#date2").val()
            }
            success: function (res) {
              var data = JSON.parse(res);
              console.log(data);
              dates = res.dates;
              nb = res.nb;
              for(i=0;i<dates;i++)
              {
                date = dates[i].toString();
                nbTraduction = parseInt(nb[i]);
                data.addRow([date,nbTraduction]);
              }
          }
          })
        var options = {
          title: 'Nombre de traductions',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

      //  var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        //chart.draw(data, options);
      }
    </script>