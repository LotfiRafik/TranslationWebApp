    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    
      <input type="date" id="date1"  />
      <input type="date" id="date2" />
      <button  id="submit" >Voir Statistiques</button> <br>

    <div id="line_chart" style="width: 900px; height: 500px">
    </div><br>
    <div id="histo_chart" style="width: 900px; height: 500px">
    </div>

 
    
    
    
    <script>
        $(document).ready(function(){
          function loadGapi()
          {
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
          }
        $("#submit").click(loadGapi);
        function drawChart() {     
        var chartData = new google.visualization.DataTable();
        chartData.addColumn('string','date');
        chartData.addColumn('number','Nombre Traductions');
        $.ajax({
            method: "POST",
            url: "admin.php?p=nbTraduction",
            data : {
              date1 : $('#date1').val(),
              date2 :  $('#date2').val()
            },
            success: function (res) {
              var ajaxData = JSON.parse(res);
              var i=0;var nbtotal = 0;
              for(i=0;i<ajaxData.length;i++)
              {
                date = ajaxData[i]['date_d'].toString();
                nbTraduction = parseInt(ajaxData[i]['nb']);
                nbtotal += nbTraduction;
                chartData.addRow([date,nbTraduction]);
              }
              var options = {
                title: 'Nombre de traductions',
                legend: { position: 'bottom' }
              };
              var line_chart = new google.visualization.LineChart(document.getElementById('line_chart'));
              var histo_chart = new google.visualization.ColumnChart(document.getElementById('histo_chart'));
              line_chart.draw(chartData, options);
              histo_chart.draw(chartData, options);

              $('#line_chart').prepend(`<h3>Nombre totale de traduction : ${nbtotal}</h3>`);
          }
          })

  
      }
    })

    </script>