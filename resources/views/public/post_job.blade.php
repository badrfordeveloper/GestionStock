@extends('layouts.public')

@section('content')

		<!-- Title Start -->
		<div class="title-bar">			
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ol class="title-bar-text">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Post a Job</li>
						</ol>
					</div>		
				</div>		
			</div>		
		</div>
		<!-- Title Start -->
		<!-- Body Start -->	
		<main class="browse-section">				
			<div class="container">
				<div class="row">
					<div class="col-md-8">						
						<div class="main-heading bids_heading">
							<h2>Post a Job</h2>
							<div class="line-shape1">
								<img src="images/line.svg" alt="">
							</div>
						</div>
						<div class="post501">
							<form>	
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="label15">Job Name*</label>
											<input type="text" class="job-input" placeholder="Job Name Here">
										</div>
										<div class="form-group">
											<label class="label15">Job Description*</label>
											<textarea class="textarea_input" placeholder="Type Description"></textarea>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="requires">
											What are the job requirements
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="label15">Job Type*</label>
											<div class="ui fluid search selection dropdown skills-search">
												<input name="tags" type="hidden" value="">
												<i class="dropdown icon"></i>
												<input class="search" autocomplete="off" tabindex="0">
												<span class="sizer" style=""></span>
												<div class="default text">Select a job</div>
												<div class="menu transition hidden" tabindex="-1">
													<div class="item selected" data-value="Job1">Job Type 01</div>										
													<div class="item" data-value="Job2">Job Type 02</div>										
													<div class="item" data-value="Job3">Job Type 03</div>										
													<div class="item" data-value="Job4">Job Type 04</div>										
													<div class="item" data-value="Job5">Job Type 05</div>										
													<div class="item" data-value="Job6">Job Type 06</div>										
													<div class="item" data-value="Job7">Job Type 07</div>										
													<div class="item" data-value="Job8">Job Type 08</div>										
													<div class="item" data-value="Job9">Job Type 09</div>										
													<div class="item" data-value="Job10">Job Type 10</div>										
													<div class="item" data-value="Job11">Job Type 11</div>										
													<div class="item" data-value="Job12">Job Type 12</div>										
													<div class="item" data-value="Job13">Job Type 13</div>										
													<div class="item" data-value="Job14">Job Type 14</div>										
													<div class="item" data-value="Job15">Job Type 15</div>										
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="label15">Job Category*</label>
											<div class="ui fluid search selection dropdown skills-search">
												<input name="tags" type="hidden" value="">
												<i class="dropdown icon"></i>
												<input class="search" autocomplete="off" tabindex="0">
												<span class="sizer" style=""></span>
												<div class="default text">Select Category</div>
												<div class="menu transition hidden" tabindex="-1">
													<div class="item selected" data-value="Job1">Category 01</div>										
													<div class="item" data-value="Category2">Category 02</div>										
													<div class="item" data-value="Category3">Category 03</div>										
													<div class="item" data-value="Category4">Category 04</div>										
													<div class="item" data-value="Category5">Category 05</div>										
													<div class="item" data-value="Category6">Category 06</div>										
													<div class="item" data-value="Category7">Category 07</div>										
													<div class="item" data-value="Category8">Category 08</div>										
													<div class="item" data-value="Category9">Category 09</div>										
													<div class="item" data-value="Category10">Category 10</div>										
													<div class="item" data-value="Category11">Category 11</div>										
													<div class="item" data-value="Category12">Category 12</div>										
													<div class="item" data-value="Category13">Category 13</div>										
													<div class="item" data-value="Category14">Category 14</div>										
													<div class="item" data-value="Category15">Category 15</div>										
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="label15">Availability*</label>
											<div class="ui fluid search selection dropdown skills-search">
												<input name="tags" type="hidden" value="">
												<i class="dropdown icon"></i>
												<input class="search" autocomplete="off" tabindex="0">
												<span class="sizer" style=""></span>
												<div class="default text">I’m not sure</div>
												<div class="menu transition hidden" tabindex="-1">
													<div class="item selected" data-value="Availability1">Full Time</div>										
													<div class="item selected" data-value="Availability2">Part Time</div>									
													<div class="item selected" data-value="Availability3">Not Available</div>																			
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="label15">Experience Level*</label>
											<div class="ui fluid search selection dropdown skills-search">
												<input name="tags" type="hidden" value="">
												<i class="dropdown icon"></i>
												<input class="search" autocomplete="off" tabindex="0">
												<span class="sizer" style=""></span>
												<div class="default text">Select Experience Level</div>
												<div class="menu transition hidden" tabindex="-1">
													<div class="item" data-value="level1">level 01</div>										
													<div class="item" data-value="level2">level 02</div>										
													<div class="item" data-value="level3">level 03</div>										
													<div class="item" data-value="level4">level 04</div>										
													<div class="item" data-value="level5">level 05</div>										
													<div class="item" data-value="level6">level 06</div>										
													<div class="item" data-value="level7">level 07</div>										
													<div class="item" data-value="level8">level 08</div>										
													<div class="item" data-value="level9">level 09</div>										
													<div class="item" data-value="level10">level 10</div>																										
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="label15">Salary Min*</label>
											<div class="smm_input">
												<input type="text" class="job-input" placeholder="Min">
												<div class="mix_max">Usd</div>															
											</div>															
										</div>															
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="label15">Salary Max*</label>
											<div class="smm_input">
												<input type="text" class="job-input" placeholder="Max">
												<div class="mix_max">Usd</div>															
											</div>															
										</div>															
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="label15">Location*</label>
											<div class="smm_input">
												<input type="text" class="job-input" placeholder="Type Address">
												<div class="loc_icon"><i class="fas fa-map-marker-alt"></i></div>															
											</div>															
										</div>															
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="label15">Languages*</label>
											<div class="ui fluid search selection dropdown skills-search">
												<input name="tags" type="hidden" value="">
												<i class="dropdown icon"></i>
												<input class="search" autocomplete="off" tabindex="0">
												<span class="sizer" style=""></span>
												<div class="default text">Select Language</div>
												<div class="menu transition hidden" tabindex="-1">
													<div class="item" data-value="lang1">English</div>										
													<div class="item" data-value="lang2">Hindi</div>										
													<div class="item" data-value="lang3">Punjabi</div>										
													<div class="item" data-value="lang4">Bengali</div>										
													<div class="item" data-value="lang5">Portuguese</div>										
													<div class="item" data-value="lang6">Russian</div>										
													<div class="item" data-value="lang7">Japanese</div>										
													<div class="item" data-value="lang8">Telugu</div>										
													<div class="item" data-value="lang9">French</div>										
													<div class="item" data-value="lang10">German</div>																										
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label class="label15">Skills*</label>
											<div class="ui fluid multiple search selection dropdown skills-search">
												<input name="tags" type="hidden" value="">
												<i class="dropdown icon"></i>
												<input class="search" autocomplete="off" tabindex="0"><span class="sizer" style=""></span><div class="default text">Skills</div>
												<div class="menu transition hidden" tabindex="-1">
													<div class="item selected" data-value="angular">Angular</div>
													<div class="item" data-value="css">CSS</div>
													<div class="item" data-value="design">Graphic Design</div>
													<div class="item" data-value="ember">Ember</div>
													<div class="item" data-value="html">HTML</div>
													<div class="item" data-value="ia">Information Architecture</div>
													<div class="item" data-value="javascript">Javascript</div>
													<div class="item" data-value="mech">Mechanical Engineering</div>
													<div class="item" data-value="meteor">Meteor</div>
													<div class="item" data-value="node">NodeJS</div>
													<div class="item" data-value="plumbing">Plumbing</div>
													<div class="item" data-value="python">Python</div>
													<div class="item" data-value="rails">Rails</div>
													<div class="item" data-value="react">React</div>
													<div class="item" data-value="repair">Kitchen Repair</div>
													<div class="item" data-value="ruby">Ruby</div>
													<div class="item" data-value="ui">UI Design</div>
													<div class="item" data-value="ux">User Experience</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label class="label15">Upload Files*</label>
											<div class="image-upload-wrap1">
												<input class="file-upload-input1" id="file2" type="file" onchange="readURL(this);" accept="image/*">
												<div class="drag-text1">
													Upload Files
												</div>																	
											</div>
											<p class="upload_dt">Images, Pdf and MS Word Filess</p>
										</div>
									</div>
									<div class="col-lg-12">
										<button class="post_jp_btn" type="submit">Post a Job</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-4">
						<div class="main-heading bids_heading pjfaq80">
							<h2>FAQ</h2>
						</div>
						<div class="jp_faq">
							<div class="jp_faq_item">
								<h4>01. Is there a fee to post a job?</h4>
								<p>There are pricing plans monthly and yearly for jobs on Jobby. It is a paid service that we offer bith for the employer and the freelancer.</p>
							</div>
							<div class="jp_faq_item">
								<h4>02. How do I find freelancers for my job?</h4>
								<p>Posting a job on Jobby will get your job in front of the most qualified freelancers and agencies. You will then get applications for the job with the applicant’s details and reasons why they are the best fit for the job. You can also search for freelancers and invite them to apply.</p>
							</div>
							<div class="jp_faq_item">
								<h4>03. How do I pay freelancers and agencies?</h4>
								<p>You’re free to pay your freelancer and agencies. you can pay automatically for their work through Paypal, Payoneer, or  (which allows you to pay via credit card, debit card).</p>
							</div>
						</div>
					</div>																																						
				</div>
			</div>					
		</main>
		<!-- Body End -->

@endsection