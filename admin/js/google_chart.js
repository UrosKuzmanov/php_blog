
/*let xhr= new XMLHttpRequest()
xhr.open('GET','../functions/google_chart_response.php')
xhr.responseType='json'
xhr.send()
xhr.onload=function(){
    let chart_data=xhr.response
    console.log(chart_data)
    
    google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Data', 'Count'],
            ['Posts', chart_data["posts"]],
            ['Users', chart_data["users"]],
            ['Categories', chart_data["categ"]],
            ['Comments', chart_data["comments"]],
            
            
        ]);
    
        var options = {
            chart: {
                title: '',
                subtitle: '',
            }
        };
    
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
    
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
}*/



async function chart(){
    try{
        let response=await fetch('../functions/google_chart_response.php')
        if(!response.ok){
            throw new Error('Error while reading data.')
        }
        let chart_data= await response.json()

        google.charts.load('current', { 'packages': ['bar'] });
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Data', 'Count'],
                ['Posts', chart_data["posts"]],
                ['Users', chart_data["users"]],
                ['Categories', chart_data["categ"]],
                ['Comments', chart_data["comments"]],
                
                
            ]);
        
            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                }
            };
        
            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }


    }catch(err){
        console.log('Fetch problem: '+err.message)
    }
}
chart()

