												
												<?php
													$row = getProject('pending');
													$countR = 1;
													if ($row == "no data") {
														echo "";
													}else{
														while ($rowVal = $row->fetch_assoc()) {
												?>
												<tr>
													<th><?php echo $countR;?></th>
													<td><?php echo $rowVal['project_name'];?></td>
		    										<td><?php echo substr($rowVal['project_description'], 0, 20);?>...</td>
		    										<td><?php echo substr($rowVal['project_software'], 0, 20);?>...</td>
		    										<td>
		    											<div class="cell-image-list">
		    												<?php
		    													$imgArr = explode(',', $rowVal['project_dir']);

		    													for ($i=0; $i < count($imgArr); $i++) { 
		    													?>
		    														<div class="cell-img" style="background-image: url(<?php echo "../asset/img/".$imgArr[$i];?>);"></div>
		    												<?php
		    													}
		    												?>
		    												<!-- <div class="cell-img"></div> -->
		    											</div>
		    										</td>
													<td class="text-center">
														<button class="btn btn-success btn-sm px-1 approveProject" data-id="<?php echo($rowVal['id'])?>"><i class="fas fa-check"></i></button>
														<button class="btn btn-danger btn-sm px-2 rejectProject"  data-id="<?php echo($rowVal['id'])?>"><i class="fas fa-times"></i></button>
													</td>
													<td class="d-flex justify-content-around border-0">
														<a href="#" class="badge badge-primary preview-project"><i class="fas fa-link"></i> Preview</a>
													</td>
												</tr>
												<?php
													$countR = $countR+1;
														}
													}
												?>