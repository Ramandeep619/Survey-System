<div class="page-bar">
        <ul class="page-breadcrumb">
                <li>
                        <i class="fa fa-user"></i>
                        Users
                        <i class="fa fa-angle-right"></i>
                </li>
                <li>
                        <a href="#">Listing</a>
                        <i class="fa fa-angle-right"></i>
                </li>
        </ul>
        <div class="page-toolbar">
			<div class="btn-group pull-right">
				<?php echo $this->Html->link('Add', array('controller' => 'Users', 'action' => 'add'), array('class' => 'btn btn-fit-height grey-salt')); ?>
			</div>
		</div>
					
</div>
<div class='panel-body'><?php 
echo $this->Flash->render();
?></div>
<div class="contentpanel">   
    
    <br>
    <div class="row">
					<div class="col-md-12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box red">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>Users
								</div>
								
							</div>
							<div class="portlet-body">
								<div class="table-scrollable">
									<table class="table" id="tableUsers">
            <thead>
                <tr>
                    <th>S.No</th> 
                    <th>Username</th>
                    <th>Password</th>
                    <th>Created</th>
                    <th>Questions</th>
                </tr>
            </thead>
            <tbody>
                <?php          
                $Serial = 1;
                $Listing = "";
                if (is_array($users)) {
                    foreach ($users as $user) { 
                        $Listing .= '<tr class="gradeU">';
                        $Listing .= '<td>' . $Serial++ . '</td>';
                        $Listing .= '<td> ' . $user['username'] . '</td>';
						$Listing .= '<td> ' . $user['pass'] . '</td>';
                        $Listing .= '<td > ' . date_format($user['created'], "d-M-Y H:i A") . '</td>';
                        $Listing .= "<td><a href = '".$this->Url->build
                        (["controller" => "UsersSurveysquestions","action" => "index",$user->id]). "'>View</a></td>";
                        $Listing .= '</tr>';
                    }
                } else {
                    $Listing = "<tr><td></td><td>No Record to List</td><td></td><td></td><td></td></tr>";
                }
                echo $Listing;
                ?> 
            </tbody>
        </table>
								</div>
							</div>
						</div>
						<!-- END SAMPLE TABLE PORTLET-->
					</div>
					
				</div>
</div>
<?php
//echo $this->Html->script(array('businessunit'), array('block' => 'scriptBottom', 'inline' => false));
$this->Html->scriptStart(['block' => true]);
    echo "var bu_table = $('#tableUsers').dataTable({
        sPaginationType: 'full_numbers',
        aoColumnDefs: [
            {bSortable: false, aTargets: [3,-1]},
            {type: 'title-string', targets: 2 }
        ]
    });";
       
$this->Html->scriptEnd();
?>
