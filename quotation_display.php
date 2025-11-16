<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Project Quotation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            margin: auto;
            width: 80%;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1, h2, h3 {
            text-align: center;
            color: #333;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3 {
            margin-bottom: 10px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
            font-weight: bold;
            padding: 10px;
            background-color: #f4f4f4;
        }
        .summary {
            text-align: right;
            font-size: 1.1rem;
            font-weight: bold;
        }
        .signature {
            margin-top: 40px;
        }
        .signature div {
            display: inline-block;
            width: 45%;
            text-align: center;
        }
        .signature div p {
            border-top: 1px solid #333;
            margin-top: 60px;
            padding-top: 5px;
        }
    </style>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

</head>
<body onload="start()">

<!-- <button class="download-button" onclick="saveAsPDF()">Save as PDF</button> -->

<script>
  
function start() {
   saveAsPDF();
//    reload();    
}

function reload() {
    window.location.replace("send_quote.php");
}

    function saveAsPDF() {
        const element = document.body;

        html2pdf().from(element).output('blob').then(blob => {
            const formData = new FormData();
            formData.append('pdf', blob, 'quotation.pdf');

            fetch('upload.php', {
                method: 'POST',
                body: formData
            }).then(response => response.text())
              .then(result => {
                //   alert('PDF saved to database successfully!');
                
    window.location.replace("send_quote.php");
                  console.log(result);
              }).catch(error => {
                  console.error('Error:', error);
              });
        });
    }

  

</script>
    <div class="container">
        <h1>NCC Construction Project Quotation</h1>
        <p>Date: <?php echo  date("Y / m / d") ; ?></p>
        <p>Quotation No.: <?php echo(rand(10000,100000));?></p>
  
        <div class="section">
            <h3>Client Information</h3>
            <p><strong>Name : </strong><?php echo $_SESSION['username']; ?></p>
            <p><strong>Address :</strong> <?php echo $_SESSION['address']; ?></p>
            <p><strong>Phone :</strong> <?php echo $_SESSION['mobile']; ?></p>
            <p><strong>Email :</strong> <?php echo $_SESSION['rec_mail']; ?></p>
        </div>

        <div class="section">
            <h3>Project Overview</h3>
            <p><strong>Project Name:</strong> <?php echo $_SESSION['proj_name']; ?></p>
            <p><strong>Location:</strong> <?php echo $_SESSION['proj_loc']; ?></p>
            <p><strong>Duration:</strong><?php echo $_SESSION['proj_dura']; ?></p>
            <p><strong>Land Size:</strong><?php echo $_SESSION['size']; ?></p>
        </div>

       

        <div class="section">
            <h3>Cost Breakdown</h3>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Total Cost</th>
                </tr>
                <tr>
                    <td>Material Cost</td>
                    <td>Rs.<?php echo $_SESSION['size'] * 8000 ?></td>
                </tr>
                <tr>
                    <td>Labor Cost</td>
                    <td>Rs.<?php echo $_SESSION['size'] * 1200 ?></td>
                </tr>
                <tr>
                    <td>Equipment & Machinery Cost</td>
                    <td>Rs.<?php echo $_SESSION['size'] * 800 ?></td>
                </tr>
                <tr>
                    <td>Miscellaneous Cost</td>
                    <td>Rs.<?php echo $_SESSION['size'] * 500 ?></td>
                </tr>
                <tr>
                    <td class="total">Subtotal</td>
                    <td>Rs.<?php echo $_SESSION['size'] *(500+800+1200+8000)  ?></td>
                </tr>
                <tr>
                    <td>Tax (10%)</td>
                    <td>Rs.<?php echo ($_SESSION['size'] *(500+800+1200+8000)) *0.1 ?></td>
                </tr>
                <tr>
                    <td class="summary">Total Cost</td>
                    <td class="summary">Rs.<?php echo ($_SESSION['size'] *(500+800+1200+8000)) *1.1 ?></td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h3>Payment Terms</h3>
            <p><strong>Initial Deposit:</strong> 20% of Total Cost (Rs.<?php echo ($_SESSION['size'] *(500+800+1200+8000)) *0.22 ?>) upon signing the contract.</p>
            <p><strong>Progress Payments:</strong> 50% of Total Cost (Rs.<?php echo ($_SESSION['size'] *(500+800+1200+8000)) *0.55 ?>) in monthly installments.</p>
            <p><strong>Final Payment:</strong> 30% of Total Cost (Rs.<?php echo ($_SESSION['size'] *(500+800+1200+8000)) *0.33 ?>) upon project completion.</p>
        </div>

        <div class="section">
            <h3>Terms and Conditions</h3>
            <p><strong>Validity:</strong> This quotation is valid for 14 days from the date of issue.</p>
            <p><strong>Exclusions:</strong> Any work not specified in the above description or changes in scope will be quoted separately.</p>
            <p><strong>Warranty:</strong> 1-year warranty on all workmanship and materials used.</p>
            <p><strong>Insurance:</strong> The client must provide site insurance before work begins.</p>
        </div>

        <div class="section">
            <h3>Important!!!</h3>
            <p><strong> This is is approximate quotation for you to get idea about the budget range.please contact our hotline to discuss briefly about the project and get the accurate quotation.<br> Thank You. </strong></p>
            
        </div>
    </div>
</body>
</html>
