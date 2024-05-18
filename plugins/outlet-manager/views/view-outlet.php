<div class="d-flex justify-content-between">
<h4 class="fs-5 p-2"> <?=$outlet->outlet?></h4>
<div>
<a type="button" href="<?=ROOT.'/'.$vars['admin_route'].'/'.$vars['plugin_route'];?>" class="btn btn-primary btn-sm">Home</a>
</div>

</div>
<div class="alert alert-light">
<h4 class="alert-heading">Description</h4>
        <?=$outlet->description?>
    </div>

  

<div class="card" >
<div class="card-header">
    Details
  </div>
  <ul class="list-group list-group-flush">
   
    <li class="list-group-item"> <div class="d-flex justify-content-between">
  <div>Update</div>
  <div><?= $outlet->date_updated?></div>

 </div></li>
    
  </ul>
</div>

<div class="card">
 
 
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    

    <table class="table caption-top">
    <caption>Reports</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
  </div>
</div>