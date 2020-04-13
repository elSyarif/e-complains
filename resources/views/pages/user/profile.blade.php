@extends('layouts.global')

@section('content')
<!-- Main Content -->
			<!-- Container -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="col-md-12 pa-0">
                        <div class="profile-cover-wrap overlay-wrap">

							<div class="bg-overlay bg-trans-dark-60"></div>
							<div class="container-fluid profile-cover-content py-50">
								<div class="hk-row">
									<div class="col-lg-6">
										<div class="media align-items-center">
											<div class="media-img-wrap  d-flex">
												<div class="avatar">
													<img src="{{ asset('theme') }}/dist/img/{{ Auth::user()->avatar }}" alt="user" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="text-white text-capitalize display-6 mb-5 font-weight-400">{{ Auth::user()->name }}</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        {{--  <div class="profile-tab bg-white shadow-bottom">
							<div class="container-fluid">
								<ul class="nav nav-light nav-tabs" role="tablist">
									<li class="nav-item">
										<a href="#" class="d-flex h-60p align-items-center nav-link active">Feed</a>
									</li>
									<li class="nav-item">
										<a href="#" class="d-flex h-60p align-items-center nav-link">Projects</a>
									</li>
									<li class="nav-item">
										<a href="#" class="d-flex h-60p align-items-center nav-link">Groups</a>
									</li>
									<li class="nav-item">
										<a href="#" class="d-flex h-60p align-items-center nav-link">Photos</a>
									</li>
								</ul>
							</div>
						</div>  --}}
						<div class="tab-content mt-sm-60 mt-30">
							<div class="tab-pane fade show active" role="tabpanel">
								<div class="container-fluid">
									<div class="hk-row">
										<div class="col-lg-6">
											<div class="card card-profile-feed">
                                                <div class="card-header card-header-action">
													<div class="media align-items-center">
														<div class="media-img-wrap d-flex mr-10">
															<div class="avatar avatar-sm">
												<div class="font-14 text-white"><span class="mr-5"><span class="font-weight-500 pr-5">124</span><span class="mr-5">Followers</span></span><span><span class="font-weight-500 pr-5">45</span><span>Following</span></span></div>
																<img src="{{ asset('theme') }}/dist/img/{{  Auth::user()->avatar }}" alt="user" class="avatar-img rounded-circle">
															</div>
														</div>
														<div class="media-body">
															<div class="text-capitalize font-weight-500 text-dark">Angelic Lauver</div>
															<div class="font-13">Business Manager</div>
														</div>
													</div>
													<div class="d-flex align-items-center card-action-wrap">
														<div class="inline-block dropdown">
															<a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-settings"></i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#">Action</a>
																<a class="dropdown-item" href="#">Another action</a>
																<a class="dropdown-item" href="#">Something else here</a>
																<div class="dropdown-divider"></div>
																<a class="dropdown-item" href="#">Separated link</a>
															</div>
														</div>
													</div>
												</div>
												<div class="row text-center">
													<div class="col-4 border-right pr-0">
														<div class="pa-15">
															<span class="d-block display-6 text-dark mb-5">154</span>
															<span class="d-block text-capitalize font-14">photos</span>
														</div>
													</div>
													<div class="col-4 border-right px-0">
														<div class="pa-15">
															<span class="d-block display-6 text-dark mb-5">65</span>
															<span class="d-block text-capitalize font-14">followers</span>
														</div>
													</div>
													<div class="col-4 pl-0">
														<div class="pa-15">
															<span class="d-block display-6 text-dark mb-5">433</span>
															<span class="d-block text-capitalize font-14">views</span>
														</div>
													</div>
												</div>
												<ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><span><i class="ion ion-md-calendar font-18 text-light-20 mr-10"></i><span>Went to:</span></span><span class="ml-5 text-dark">Oh, Canada</span></li>
                                                    <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Worked at:</span></span><span class="ml-5 text-dark">Companey</span></li>
                                                    <li class="list-group-item"><span><i class="ion ion-md-home font-18 text-light-20 mr-10"></i><span>Lives in:</span></span><span class="ml-5 text-dark">San Francisco, CA</span></li>
                                                    <li class="list-group-item"><span><i class="ion ion-md-pin font-18 text-light-20 mr-10"></i><span>From:</span></span><span class="ml-5 text-dark">Settle, WA</span></li>
                                                </ul>
											 </div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
        <!-- /Main Content -->
@endsection
