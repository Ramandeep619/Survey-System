<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersQuestion[]|\Cake\Collection\CollectionInterface $usersQuestions
 */
?>
<div class="page-bar">
        <ul class="page-breadcrumb">
                <li>
                        <i class="fa fa-user"></i>
                        User Questions
                        <i class="fa fa-angle-right"></i>
                </li>
                <li>
                        <a href="#">Listing</a>
                        <i class="fa fa-angle-right"></i>
                </li>
        </ul>
        
					
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
									<i class="fa fa-cogs"></i>User Questions List
								</div>
								
							</div>
							<div class="portlet-body">
								<div class="table-scrollable">
									<table class="table" id="tableUsers">
            <thead>
                <tr>
                    <th>S.No</th> 
                    <th>User</th>
                    <th>Question</th>                    
                    <th>Actual Answer</th>
                    <th>Given Answer</th>
                    <!-- <th>Answer Result</th> -->
                </tr>
            </thead>
            <tbody>
                <?php          
                $Serial = 1;
                $Listing = "";
                if (is_array($usersQuestions)) {
                    foreach ($usersQuestions as $usersQuestion) { 
                        $Listing .= '<tr class="gradeU">';
                        $Listing .= '<td>' . $Serial++ . '</td>';
                        $Listing .= '<td> ' . $usersQuestion['user']['username'] . '</td>';
						$Listing .= '<td> ' . $usersQuestion['question']['question'] . '</td>';

                        if($usersQuestion['question']['answer_type'] == 1) {
							$answer = $usersQuestion['question']['answer_manual'];
						} else if($usersQuestion['question']['answer_type'] == 3) {
							$answer = $usersQuestion['question']['answer_manual'];
						} else if($usersQuestion['question']['answer_type'] == 4) {
                            $answer = $usersQuestion['question']['answer_option'];
                            $str_arr = explode (",", $answer); 
                            $checkstring="";
                            foreach($str_arr as $key=>$value)
                            {
                               $checkstring.= $usersQuestion['question']['answer_'.trim($value)] .", ";
                            } 
                            $checkstring = rtrim($checkstring, ', ');
                            $answer = $checkstring;
						} else {
							$answer = $usersQuestion['question']['answer_'.$question->answer_option];
                        }
                        
                        $Listing .= '<td> ' . $answer . '</td>';
                        $Listing .= '<td> ' . $usersQuestion['answer'] . '</td>';            

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
