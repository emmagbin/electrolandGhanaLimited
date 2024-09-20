
<div class="divider">
    <div class="divider-content " style = "color: #7fb4de"><b><i class="icon icon-line-chart"></i> Insights &amp Analytics For (2024)</b></div>
</div>
<div class = "row">

<div class = "col-lg-12">

<div class="row gutter-xs">
    <div class="col-xs-6 col-md-3">
        <div class="card">
            <div class="card-values">
                <div class="p-x">
                    <small>Total Submissions - YTD <i class = "icon icon-paper-plane" style = "color: #7fb4de"></i></small>
                    <h3 class="card-title fw-l"><?php echo $getdashboarddata[0]['submitted'] ?></h3>
                </div>
            </div>
            <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(127, 180, 222, 0.03)", "borderColor": "#7fb4de", "data": [25250, 23370, 25568, 28961, 26762, 30072, 25135]}]' data-scales='{"yAxes": [{ "ticks": {"max": 32327}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="card">
            <div class="card-values">
                <div class="p-x">
                    <small>Total Number Of Winners - YTD <i class = "icon icon-sort-numeric-asc" style = "color: #7fb4de"></i></small>
                    <h3 class="card-title fw-l"><?php echo $getdashboarddata[0]['wins'] ?></h3>
                </div>
            </div>
            <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(127, 180, 222, 0.03)", "borderColor": "#7fb4de", "data": [8796, 11317, 8678, 9452, 8453, 11853, 9945]}]' data-scales='{"yAxes": [{ "ticks": {"max": 12742}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="card">
            <div class="card-values">
                <div class="p-x">
                    <small>Total Number Of Claimed Prizes <i class = "icon icon-close" style = "color: #7fb4de"></i></small>
                    <h3 class="card-title fw-l"><?php echo $getdashboarddata[0]['redeemed'] ?></h3>
                </div>
            </div>
            <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(127, 180, 222, 0.03)", "borderColor": "#7fb4de", "data": [116196, 145160, 124419, 147004, 134740, 120846, 137225]}]' data-scales='{"yAxes": [{ "ticks": {"max": 158029}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="card">
            <div class="card-values">
                <div class="p-x">
                    <small>Total Number Of MSISDNS <i class = "icon icon-question" style = "color: #7fb4de"></i></small>
                    <h3 class="card-title fw-l"><?php echo $getdashboarddata[0]['msisdn'] ?></h3>
                </div>
            </div>
            <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(127, 180, 222, 0.03)", "borderColor": "#7fb4de", "data": [13590442, 12362934, 13639564, 13055677, 12915203, 11009940, 11542408]}]' data-scales='{"yAxes": [{ "ticks": {"max": 14662531}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row gutter-xs">

    <div class="col-xs-12 col-md-12">
        <div class="card" >
            <div class="card-body" >
                <h6 class="card-title"> Distribution</h6>
            </div>
            <div class="card-body">
                <div class="card-chart">
                  
                    <div class="col-md-12">
                    <span class="pull-left"><b><u>Usage Trend Analysis</u></b></span><br><br>
                        <canvas data-chart="bar" data-animation="false" data-labels='["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]' data-values='[{"label": "Total Submissions", "backgroundColor": "#808080", "borderColor": "#808080", 

                        "data": [
                        <?php echo $Graph[0]['count'] ?>, 
                        <?php echo $Graph[1]['count'] ?>, 
                        <?php echo $Graph[2]['count'] ?>, 
                        <?php echo $Graph[3]['count'] ?>, 
                        <?php echo $Graph[4]['count'] ?>, 
                        <?php echo $Graph[5]['count'] ?>, 
                        <?php echo $Graph[6]['count'] ?>, 
                        <?php echo $Graph[7]['count'] ?>, 
                        <?php echo $Graph[8]['count'] ?>, 
                        <?php echo $Graph[9]['count'] ?>, 
                        <?php echo $Graph[10]['count'] ?>, 
                        <?php echo $Graph[11]['count'] ?>]}]' data-tooltips='{"mode": "label"}' height = "60" ></canvas></div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row gutter-xs">

  
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-middle media-left">
                        <div class="media-chart">
                            <canvas data-chart="doughnut" data-animation="false" data-labels='["Resolved", "Unresolved"]' data-values='[{"backgroundColor": ["#7fb4de", "maroon"], "data": [879, 77]}]' data-hide='["legend", "scalesX", "scalesY", "tooltips"]' height="64" width="64"></canvas>
                        </div>
                    </div>
                    <div class="media-middle media-body">
                        <h2 class="media-heading">
                            <span class="fw-l"><b><?php echo $avg_daily_entries[0]['average_daily_entries'] ?> </b></span>

                        </h2>
                        <small>Average Daily Submissions</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><hr>

</div>
</div>
