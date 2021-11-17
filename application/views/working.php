 <table class="table table-hover table-stripped datatable table-sm" id="tableExport1" style="width:100%">
       <thead class="bg-dark text-white">
            <tr>
                 <th>Schedule Date</th>
                 <th>Parameters</th>
                <th>Duration</th>
              <th>Maintance Date</th>
              <th>Start Time</th>
              <th>Start Time</th>
              <th>Solution</th>
              <th>Machine Status</th>  
            </tr>
        </thead>
        <tbody>
          
           <?php 
           //print_r($schedules);
           foreach ($working as $key):
           ?>

           <tr>
                 <td><?php Echo $key['SDate'];?></td>
                  <td><?php Echo $key['ParamName'];?></td>
                <td><?php Echo $key['DurName'];?></td>
                <td><?php Echo $key['Date'];?></td>
               <td><?php Echo $key['StartTime'];?></td>
               <td><?php Echo $key['EndTime'];?></td>
                <td><?php Echo $key['Solution'];?></td>
               <td><?php Echo $key['Status'];?></td>
            </tr>
             <?php endforeach; ?>
  </tbody>
  </table>