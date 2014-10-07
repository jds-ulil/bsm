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
             <table class="tableData" width="100%">
                 <thead>
                 <tr>                                              
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">Nama Nasabah:</td>
                     <td><?php echo Yii::app()->numberFormatter->formatDate($model_tolak->tanggal_tolak); ?></td>
                 </tr>
                </thead>
                 <tbody>
                 <tr>
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">Segmen:</td>
                     <td><?php echo $model_proposal->rSeg->nama; ?></td>
                 </tr>
                 <tr>
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">Plafon:</td>
                     <td><?php echo Yii::app()->numberFormatter->formatCurrency($model_proposal->plafon,'Rp '); ?></td>
                 </tr>                 
                 <tr>
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">Alasan Ditolak:</td>
                     <td><?php echo $model_tolak->alasan_ditolak; ?></td>
                 </tr>                                          
                 <tr>
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">NIP Marketing:</td>
                     <td><?php echo $model_marketing->NIP; ?></td>
                 </tr>                                          
                 <tr>
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">Nama Marketing:</td>
                     <td><?php echo $model_marketing->nama; ?></td>
                 </tr>                                          
                 <tr>
                     <td class="tableName" style="width: 30%;text-align: right; padding-right: 5px; ">NO HP Marketing:</td>
                     <td><?php echo $model_marketing->no_handphone; ?></td>
                 </tr>                                          
                </tbody>
             </table>                      
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