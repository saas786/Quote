<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <?php include("layout/header.php"); ?>

		<section id="mainContainer">

			<div class="container">
				
				<div class="inner">
				
					<div class="page-header">
						<h1><i class="fa fa-file-text-o"></i> Quote Builder</h1>
					</div><!-- /.page-header -->
					
					<form action="pdf/makePDF.php" method="post" target="_blank" id="quoteBuilder" role="form">
						
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<input type="text" name="quoteTitle" class="form-control" placeholder="Quote Title" />
								</div><!-- /.form-group -->
							</div><!-- /.col-xs-6 -->
							<div class="col-xs-6">
								<div class="form-group">
									<input type="text" name="quoteNumber" class="form-control" placeholder="Quote Number" />
								</div><!-- /.form-group -->
							</div><!-- /.col-xs-6 -->
						</div><!-- /.row -->

						<div class="row">

							<div class="col-xs-12 col-sm-6">

								<h4>Prepared By</h4>

								<div class="form-group">
									<input type="text" name="companyName" class="form-control" placeholder="Company Name" />
								</div><!-- /.form-group -->

								<div class="form-group">
									<input type="text" name="email" class="form-control" placeholder="Email" />
								</div><!-- /.form-group -->

								<div class="form-group">
									<input type="text" name="phone" class="form-control" placeholder="Phone" />
								</div><!-- /.form-group -->

								<div class="form-group">
									<input type="text" name="bankAccountNumber" class="form-control" placeholder="Bank Account Number" />
								</div><!-- /.form-group -->

							</div><!-- /.col-xs-12 col-sm-6 -->

							<div class="col-xs-12 col-sm-6">

								<h4>Prepared For</h4>

								<div class="form-group">
									<div class="row">
										<div class="col-xs-6">
											<input type="text" name="clientFirstName" class="form-control" placeholder="First Name" />
										</div><!-- /.col-xs-6 -->
										<div class="col-xs-6">
											<input type="text" name="clientLastName" class="form-control" placeholder="Last Name" />
										</div><!-- /.col-xs-6 -->
									</div><!-- /.row -->
								</div><!-- /.form-group -->

								<div class="form-group">
									<input type="text" class="form-control" name="clientEmail" placeholder="Email" />
								</div><!-- /.form-group -->

								<div class="form-group">
									<input type="text" class="form-control" name="clientPhone" placeholder="Phone" />
								</div><!-- /.form-group -->

								<div class="form-group">
									<input type="text" class="form-control" name="clientCompany" placeholder="Company" />
								</div><!-- /.form-group -->

								<div class="form-group">
									<textarea class="form-control" name="clientAddress" placeholder="Address" ></textarea>
								</div><!-- /.form-group -->

							</div><!-- /.col-xs-12 col-sm-6 -->

						</div><!-- /.row -->

						<h4>Project Requirements</h4>
						
						<div class="row hidden-xs">
							<div class="col-xs-12 col-sm-7 col-md-9">
								<p><strong>Name</strong></p>
							</div><!-- /.col-xs-12 col-sm-9 -->
							<div class="col-xs-12 col-sm-2 col-md-1">
								<p><strong>Unit</strong></p>
							</div><!-- /.col-xs-12 col-sm-2 col-md-1 -->
							<div class="col-xs-12 col-sm-2 col-md-1">
								<p><strong>Rate</strong></p>
							</div><!-- /.col-xs-12 col-sm-2 col-md-1 -->
						</div><!-- /.row -->

						<div class="row">

							<section id="tasks">

								<div id="task-0" class="form-group clearfix clone-task">

									<div class="col-xs-12 col-sm-7 col-md-9">
										<label class="visible-xs">Task</label>
										<input type="text" name="task[]" class="form-control task-name" placeholder="Task" />
									</div><!-- /.col-xs-12 col-sm-9 -->

									<div class="col-xs-12 col-sm-2 col-md-1">
										<label class="visible-xs">Unit</label>
										<input type="number" name="task[]" class="form-control task-unit" placeholder="0" />
									</div><!-- /.col-xs-12 col-sm-2 col-md-1 -->

									<div class="col-xs-12 col-sm-2 col-md-1">
										<label class="visible-xs">Rate</label>
										<input type="number" name="task[]" class="form-control task-rate" placeholder="0" />
									</div><!-- /.col-xs-12 col-sm-2 col-md-1 -->

									<div class="col-xs-12 col-sm-1">
										<a href="#" class="btn btn-danger btn-block remove"><i class="fa fa-times"></i></a><!-- /.btn btn-danger btn-block remove -->
									</div><!-- /.col-xs-12 col-sm-1 -->

								</div><!-- /#task-0 .form-group clearfix clone-task -->

							</section><!-- /#tasks -->

							<div class="col-xs-12 col-sm-offset-9 col-sm-3">
								<a id="addNewTask" href="#" class="btn btn-default btn-block">Add New Task</a><!-- /.btn btn-danger btn-block -->
							</div><!-- /.col-xs-12 col-sm-offset-9 col-sm-3 -->

						</div><!-- /.row -->

						<div class="clearfix">
							<h5 class="pull-right">Total: <strong>$<span id="taskTotal">0</span></strong></h5>
							<input type="hidden" id="taskTotalInput" name="taskTotalInput" value="0" />
						</div><!-- /.clearfix -->
						
						<hr />
						
						<div class="clearfix">
							<input type="submit" class="btn btn-lg btn-primary pull-right" value="Generate PDF" />
						</div><!-- /.clearfix -->

					</form><!-- /#quoteBuilder -->
					
				</div><!-- /.inner -->

			</div><!-- /.container -->

		</section><!-- /#mainContainer -->

        <?php include("layout/footer.php"); ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>