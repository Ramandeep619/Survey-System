<div class="page-bar">
        <ul class="page-breadcrumb">
                <li>
                        <i class="icon-layers"></i>
                        Surveys
                        <i class="fa fa-angle-right"></i>
                </li>
                <li>
                        <a href="#">Listing</a>
                        <i class="fa fa-angle-right"></i>
                </li>
        </ul>
        <div class="page-toolbar">
			<div class="btn-group pull-right">
				<?php echo $this->Html->link('Add', array('controller' => 'Surveys', 'action' => 'add'), array('class' => 'btn btn-fit-height grey-salt')); ?>
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
									<i class="icon-layers"></i>Surveys
								</div>
								
							</div>
							<div class="portlet-body">
								<div class="table-scrollable">
									<table class="table" id="tableUsers">
            <thead>
                <tr>
                    <th>S.No</th> 
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php          
                $Serial = 1;
                $Listing = "";
                if (!empty($surveys)) {
                    foreach ($surveys as $survey) { 
                        $Listing .= '<tr class="gradeU">';
                        $Listing .= '<td>' . $Serial++ . '</td>';
                        $Listing .= '<td> ' . $survey->title . '</td>';
                        $Listing .= '<td > ' . $this->Html->link('<i class="glyphicon glyphicon-remove"></i>', array('action' => 'delete', $survey->id), array('escape' => false)). '</td>';
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
