									<li>
										<div class="smart-timeline-icon">
											<i class="fa fa-text"></i>
										</div>
										<div class="smart-timeline-time">
											<small>{{$item->printCreatedAt()}}</small>
										</div>
										<div class="smart-timeline-content">
											<div class="row">
												<div style="display: inline-block; margin-right: 8px;">
			
												</div>
												<div style="display: inline-block;">
												<p>
												<strong class="txt-color-greenDark">{{$item->name}}</strong>
												</p>

												<p>
												{{$item->printFullSummary()}}
												</p>
																							
												<br>
												<a href="{{route('item.show', ['item' => $item])}}" class="btn btn-default">Tarkastele</a>

												</div>
											</div>
										</div>
									</li>
									<hr>