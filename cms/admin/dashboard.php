<?php session_start();
//error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Citizen Connect || Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body class="">
	<!-- [ Pre-loader ] start -->
<?php include('include/sidebar.php');?>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<?php include('include/header.php');?>
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
                    <!-- Latest Customers end -->
                    <div style="display:flex;flex-wrap: wrap; justify-content:center">
    
    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    <!-- <canvas id="myChart2" style="width:100%;max-width:600px"></canvas> -->
</div>
        <!-- [ Main Content ] end -->
    </div>
</div>



<script type="importmap">
        {
          "imports": {
            "@google/generative-ai": "https://esm.run/@google/generative-ai"
          }
        }
</script>


      <script type="module">
        import { GoogleGenerativeAI } from "@google/generative-ai";

        import { HarmBlockThreshold, HarmCategory } from "@google/generative-ai";

// ...

const safetySettings = [
  {
    category: HarmCategory.HARM_CATEGORY_HATE_SPEECH,
    threshold: HarmBlockThreshold.BLOCK_ONLY_HIGH,
  },
];
  
        // Fetch your API_KEY
        const API_KEY = "AIzaSyDG57x3SIh78Ip5-BuUoKASc5loOdqv2nI";
  
        // Access your API key (see "Set up your API key" above)
        const genAI = new GoogleGenerativeAI(API_KEY);
  

async function run(query,num_rows) {
  // For text-only input, use the gemini-pro model
  const model = genAI.getGenerativeModel({ model: "gemini-pro",safetySettings});
  

  const prompt = query

  const result = await model.generateContent(prompt);
  const response = await result.response;
  const text = response.text();

  console.log(text);

  const xValues = ["Low Priority", "High Priority"];
const yValues = [num_rows - parseInt(text),parseInt(text)];
const barColors = [
  "#00aba9",
  "#b91d47"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Priority Analysis of Message"
    }
  }
});
}

// run();

function Cal_sentiment(){
    let promt =""
    let fetch_data = ""
    let i=0
        fetch('api/allcomplain.php').then(function(resposne){
            return resposne.json()
        }).then(function(data){
            
            for(i;i<data[0].length;i++){
                fetch_data = fetch_data + data[0][i] + " ";
            }
            // console.log(fetch_data);


            prompt = `below i am giving you sentences that start with special token that is [START] and end with special token that is [END] and i want  that you only tell me the number of high priority work.  ${fetch_data} and in response i only want number as output so give me answer according to that.`

            // console.log(prompt);

            run(prompt,data[1])
        })
    }

    Cal_sentiment()
      </script>
















    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-main.js"></script>
</body>

</html>
<?php } ?>