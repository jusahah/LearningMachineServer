									<li>
										<div class="smart-timeline-icon">
											<i class="fa fa-bar-chart-o"></i>
										</div>
										<div class="smart-timeline-time">
											<small>{{$item->printCreatedAt()}}</small>
										</div>
										<div class="smart-timeline-content">
											<div class="row">
												<div style="display: inline-block; margin-right: 8px;">
												<img src="data:image/png;base64,{{$item->itenable->thumbnail}}">
												</div>
												<div style="display: inline-block;">
												<p>
												<strong class="txt-color-greenDark">{{$item->name}}</strong>
												</p>

												<p>
												{{$item->printMediumSummary()}}
												</p>
																							
												<br>
												<a href="{{route('item.show', ['item' => $item])}}" class="btn btn-default">Tarkastele</a>
												</div>
											</div>
										</div>
									</li>
									<hr>