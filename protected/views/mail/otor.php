<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Laporan Otorisasi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
      p {
          font-family: sans-serif;
      }
    .tableData tbody tr:nth-child(odd) {
        background-color: #ccc;
    }   
    table.main {
        min-width: 800px;        
    }
    @media (max-width: 980px) {
        table.main {
            min-width: 600px;
        }
    }
    @media (max-width: 640px) {
        table.main {
            min-width: 400px;
        }
    }
    
  </style>
</head>
    
<body style="margin: 0; padding: 0;">
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td>
       <table class="main" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
         <td>
             <table align="center" cellpadding="0" cellspacing="0" width="100%">
                 <tr>
                     <td style="text-align: right">
                     <span style="font-size: 14px;"><i><?php echo date("Y").'/'.date("m").'/'.date("d");?></i></span>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <span style="font-size: 16px;"><i>Laporan Proses Otorisasi</i></span>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <span style="font-size: 24px;color: green;"><b>Daftar Nasabah Ditolak</b></span>
                         <hr></hr>
                     </td>
                 </tr>
             </table>          
         </td>
        </tr>
        <tr>
         <td bgcolor="#ffffff">
             <p>Berikut adalah nama nasabah ditolak :</p>
             <table class="tableData" width="100%" style="border:1px solid #A7C942;">
                 <thead>
                 <tr style="background-color:#A7C942;">                                              
                     <td>No</td>
                     <td>Nama</td>
                     <td>No KK</td>
                     <td>Alamat</td>
                 </tr>
                </thead>
                 <tbody>
                 <tr>
                     <td>1</td>
                     <td>Wayan</td>
                     <td>35151</td>
                     <td>Desa Pirto</td>
                 </tr>
                 <tr>
                     <td>1</td>
                     <td>Wayan</td>
                     <td>35151</td>
                     <td>Desa Pirto</td>
                 </tr>
                 <tr>
                     <td>1</td>
                     <td>Wayan</td>
                     <td>35151</td>
                     <td>Desa Pirto</td>
                 </tr>
                </tbody>
             </table>             
             <p>
             Otorisasi dilakukan oleh : Saya
             </p>
         </td>
        </tr>
        <tr>
         <td>
             <p>
             Demikian Pemberitahuan ini kami sampaikan. <br />
             Terima Kasih.
             </p>
         </td>
        </tr>
       </table>
   </td>
  </tr>
 </table>
</body>
    
    
    
</html>