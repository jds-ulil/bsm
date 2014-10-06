<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Laporan Input Nasabah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
      p {
          font-family: sans-serif;
      }
    .tableData tbody tr:nth-child(odd) {
/*        background-color: #ccc;*/
    }   
    table.main {
        min-width: 800px;        
    }    
  </style>
</head>
    
<body style="margin: 0; padding: 0;">
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td>
       <table class="main" align="center" border="0" cellpadding="0" cellspacing="0">       
         <td bgcolor="#ffffff">
             <p>Asalamualaikum wr wb,</p>
             <p>Bapak /Ibu, berikut pengajuan nasabah ditolak baru pada KCP  <?php echo vC::APP_nama_KCP; ?>,dengan data sebagai berikut :</p>
             <table class="tableData" width="100%">
                 <thead>
                 <tr>                                              
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">Tanggal Tolak:</td>
                     <td><?php echo $tolak->tanggal_tolak; ?></td>
                 </tr>
                </thead>
                 <tbody>
                 <tr>
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">Nama Nasabah:</td>
                     <td><?php echo $tolak->nama_nasabah; ?></td>
                 </tr>
                 <tr>
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">Alasan Ditolak:</td>
                     <td><?php echo $tolak->alasan_ditolak; ?></td>
                 </tr>                 
                 <tr>
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">Tahap penolakan:</td>
                     <td><?php echo $tolak->tahap_penolakan; ?></td>
                 </tr>                                          
                </tbody>
             </table>             
             <p>
             Demikian yang dapat disampaikan. Semoga pemberitahuan ini bermanfaat dan dapat dipergunakan demi kemajuan 
             PT Bank Syariah Mandiri.
             </p>
             <p>
                 Wassalamualaikum Wr Wb
             </p>
         </td>
        </tr>
        <tr>        
        </tr>
       </table>
   </td>
  </tr>
 </table>
</body>
    
    
    
</html>