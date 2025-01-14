<?php
	wp_enqueue_media();

	$placehold = "Option 1
Option 2
Option 3";
?>

<div class="wrap jp-help-top">
	<h2 class=""><img src="<?php echo plugins_url( '../images/help.svg', __FILE__ ); ?>" width="30" alt=""><?php echo esc_html( get_admin_page_title() ); ?></h2>
</div>

<?php
$lang = Job_Postings::$lang;


if ( ! isset( $_REQUEST['settings-updated'] ) )
	$_REQUEST['settings-updated'] = 'false';

?>

<div class="wrap jobs_plugin_settings">

	<?php if ( 'false' !== sanitize_text_field($_REQUEST['settings-updated']) ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Settings updated', 'job-postings' ); ?></strong></p></div>
	<?php endif; ?>

	<div class="job_tabs">



		<div id="jobs_help" class="job_tab_content clearfix">
			<div class="wrap jp-help-wrap">

				<h2><?php echo _x('Shortcodes', 'job-settings', 'job-postings') ?></h2>
				<p><?php echo _x('Place this shortcode on the page, where you want to show your job postings or ui elements.', 'job-settings', 'job-postings') ?></p>

				<h3><?php echo _x('Jobs listing:', 'job-settings', 'job-postings') ?> (default)</h3>
				<p>
					<code>[job-postings]</code>
				</p>

				<h3><?php echo _x('Parameters:', 'job-settings', 'job-postings') ?></h3>
				<p>
					<code>[job-postings
						category="1,2"
						showcategory="false|true"
						aligncategory="left|center|right"
						hide_empty="true|false"
						show_count="false|true"
						show_filters="false|true"
						limit="number"
						posts_per_page="number"
						hide_past="false|true"
						]</code>
				</p>
				<ul>
					<li><b>category</b> - With this parameter you can show only job posting from defined categories. Add multiple categories separated by coma. If this parameter used, all others are ignored.</li>
					<li><b>showcategory</b> - With this parameter you can show category filter above the job posts listing  (Default: false).</li>
					<li><b>aligncategory</b> - Category filter alignment (Default: left).</li>
					<li><b>hide_empty</b> - To show or hide empty categories (Default: true).</li>
					<li><b>show_count</b> - To show/hide count of job postings in each category.</li>
					<li><b>show_filters</b> - To show/hide filters (categories and search field). This parameter overwrites all other and can be configured ftom "Settings > Styles"</li>
					<li><b>limit</b> - To limit the output of job posts. If limit is used, filters and pagination are disabled</li>
					<li><b>posts_per_page</b> - To limit the output of job posts per page.</li>
					<li><b>hide_past</b> - To exclude job postings which "Valid Through" date is past.</li>
					<li><b>orderby</b> - Choose the field to sort the job postings by (Default: date).</li>
					<li><b>order</b> - Select between ascending "ASC" and descending "DESC" (Default: DESC).</li>
				
				</ul>
				<br>

				<h3><?php echo _x('Jobs single:', 'job-settings', 'job-postings') ?> (default)</h3>
				<p>
					<code>[job-single id="JOB_ID"]</code>
				</p>
				<ul>
					<li><b>id</b> - ID of the job to show.</li>
				</ul>
				<br>


				<h3><?php echo _x('Categories', 'job-settings', 'job-postings') ?></h3>
				<p>
					<code>[job-categories]</code>
				</p>
				<br>

				<h3><?php echo _x('Categories tree', 'job-settings', 'job-postings') ?></h3>
				<p>
					<code>[job-categories-tree show_count="false|true"]</code>
				</p>
				<ul>
					<li><b>show_count</b> - To show/hide count of job postings in each category.</li>
				</ul>
				<br>


				<h3><?php echo _x('Search', 'job-settings', 'job-postings') ?></h3>
				<p>
					<code>[job-search]</code>
				</p>
				<br>

				<h3>PHP</h3>
				<p>
					<b><?php echo _x('To show jobs list somewhere in your template, use function below:', 'job-settings', 'job-postings') ?></b> <br>
					<code>&lt;?php if(function_exists('jobs_list')) jobs_list(); ?&gt;</code>
				</p>
				<br>



				<?php
					$metrics_shareable 	= get_option('jobs_metrics_shareable');
					$analytics = 'Enabled';

					if ( !$metrics_shareable || $metrics_shareable == 'no' ) {
						$analytics = 'Disabled';
					}
				?>
				<h3 id="anonymous_metrics">Jobs for WordPress Analytics (Status: <span class="anonymous_metrics_status"><?php echo $analytics; ?></span>)</h3>

				<?php
					if ( !$metrics_shareable || $metrics_shareable == 'no' ) {
						echo __( '<a href="#agree" class="jobs-metrics-agree insettings">I agree to share anonymous data</a>', 'job-posting' );
					}else{
						echo __( '<a href="#agree" class="jobs-metrics-cancel insettings">Stop sharing</a>', 'job-posting' );
					}
				?>
				<p>
					<b><?php echo _x('What info we collect with analytics:', 'job-postings') ?></b> <br>
					<ul>
						<li>Plugin version</li>
						<li>Type of web server</li>
						<li>PHP Version</li>
						<li>WordPress Version</li>
						<li>Used theme</li>
						<li>Domain name</li>
						<li>Language</li>
						<li>Multisite enabled or not</li>
						<li>Ammount of published job postings</li>
					</ul>
				</p>
				<br>


				<h3><?php echo _x('FAQ', 'job-settings', 'job-postings') ?></h3>
				<div class="toggle">
					<a class="trigger" href="#">
						<img src="<?php echo plugins_url( '../images/sort-down.svg', __FILE__ ); ?>" width="12" alt="">
						<?php echo _x('Where can I change the date format?', 'job-settings', 'job-postings') ?>
					</a>
					<div class="toggle-box" style="display: none;">
						<?php echo _x('The date format of the field is taken from the WordPress settings page', 'job-settings', 'job-postings') ?><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-date.png', __FILE__ ); ?>" alt=""><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-date-settings.png', __FILE__ ); ?>" alt="">
					</div>
				</div>

				<div class="toggle">
					<a class="trigger" href="#">
						<img src="<?php echo plugins_url( '../images/sort-down.svg', __FILE__ ); ?>" width="12" alt="">
						<?php echo _x('How can I change a field title?', 'job-settings', 'job-postings') ?>
					</a>
					<div class="toggle-box" style="display: none;">
						<?php echo _x("Every field has a \"gear\" icon in the top right corner, it opens the field's settings, where you can input your custom title", 'job-settings', 'job-postings') ?><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-field-settings.png', __FILE__ ); ?>" alt="">
					</div>
				</div>

				<div class="toggle">
					<a class="trigger" href="#">
						<img src="<?php echo plugins_url( '../images/sort-down.svg', __FILE__ ); ?>" width="12" alt="">
						<?php echo _x('How can I hide/remove a title from appearing on the front-end?', 'job-settings', 'job-postings') ?>
					</a>
					<div class="toggle-box" style="display: none;">
						<?php echo _x('Every field has a "gear" icon in the top right corner, it opens a field settings, where you can hide a title by selecting a option', 'job-settings', 'job-postings') ?><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-field-settings.png', __FILE__ ); ?>" alt="">
					</div>
				</div>

				<div class="toggle">
					<a class="trigger" href="#">
						<img src="<?php echo plugins_url( '../images/sort-down.svg', __FILE__ ); ?>" width="12" alt="">
						<?php echo _x('I want to hide/remove some fields, how can I do this?', 'job-settings', 'job-postings') ?>
					</a>
					<div class="toggle-box" style="display: none;">
						<?php echo _x('Every field has a "trash can" icon in the top right corner, by clicking it, the field is moved to the "Inactive widgets" section. You can also just drag and drop any field there. This will prevent it from appearing on the front-end.', 'job-settings', 'job-postings') ?><br><br>
						<?php echo _x('If a field is empty, it will also not appear on the front-end.', 'job-settings', 'job-postings') ?><br><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-date.png', __FILE__ ); ?>" alt=""><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-inactive.png', __FILE__ ); ?>" alt="">
					</div>
				</div>

				<div class="toggle">
					<a class="trigger" href="#">
						<img src="<?php echo plugins_url( '../images/sort-down.svg', __FILE__ ); ?>" width="12" alt="">
						<?php echo _x('How can I edit the "Thank you" message?', 'job-settings', 'job-postings') ?>
					</a>
					<div class="toggle-box" style="display: none;">
						<?php echo _x('The notification message can be edited on the job edit page, under the "Settings" tab', 'job-settings', 'job-postings') ?><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-job-settings.png', __FILE__ ); ?>" alt="">
					</div>
				</div>

				<div class="toggle">
					<a class="trigger" href="#">
						<img src="<?php echo plugins_url( '../images/sort-down.svg', __FILE__ ); ?>" width="12" alt="">
						<?php echo _x('How can I change the e-mail address of the person, who receives confirmation emails?', 'job-settings', 'job-postings') ?>
					</a>
					<div class="toggle-box" style="display: none;">
						<?php echo _x('The confirmation e-mail address can be edited on the job edit page, under the "Settings" tab.', 'job-settings', 'job-postings') ?><br>
						<?php echo _x('By default, the recipient is the site admin.', 'job-settings', 'job-postings') ?><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-job-settings.png', __FILE__ ); ?>" alt="">
					</div>
				</div>

				<div class="toggle">
					<a class="trigger" href="#">
						<img src="<?php echo plugins_url( '../images/sort-down.svg', __FILE__ ); ?>" width="12" alt="">
						<?php echo _x('Where are all the entries saved?', 'job-settings', 'job-postings') ?>
					</a>
					<div class="toggle-box" style="display: none;">
						<?php echo _x('All of the entries are saved in the "Job entries" subpage.', 'job-settings', 'job-postings') ?><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-submits.png', __FILE__ ); ?>" alt="">
					</div>
				</div>

				<div class="toggle">
					<a class="trigger" href="#">
						<img src="<?php echo plugins_url( '../images/sort-down.svg', __FILE__ ); ?>" width="12" alt="">
						<?php echo _x('I have so much entries already, how can I navigate easier there?', 'job-settings', 'job-postings') ?>
					</a>
					<div class="toggle-box" style="display: none;">
						<?php echo _x('You can filter the entries by position.', 'job-settings', 'job-postings') ?><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-filter.png', __FILE__ ); ?>" alt="">
						<br><br>
						<?php echo _x('You also can search entries by name, email or phone number.', 'job-settings', 'job-postings') ?><br>
						<img class="box-img" src="<?php echo plugins_url( 'faq/faq-search.png', __FILE__ ); ?>" alt="">
					</div>
				</div>

				<div class="toggle">
					<a class="trigger" href="#">
						<img src="<?php echo plugins_url( '../images/sort-down.svg', __FILE__ ); ?>" width="12" alt="">
						<?php echo _x('How can I personalize the PDF?', 'job-settings', 'job-postings') ?>
					</a>
					<div class="toggle-box" style="display: none;">
						<?php echo _x('You can add your logo in the "Settings" section under "Global options".', 'job-settings', 'job-postings') ?>
					</div>
				</div>

				<div class="toggle">
					<a class="trigger" href="#">
						<img src="<?php echo plugins_url( '../images/sort-down.svg', __FILE__ ); ?>" width="12" alt="">
						<?php echo _x('How can I add Structured Data to the fields?', 'job-settings', 'job-postings') ?>
					</a>
					<div class="toggle-box" style="display: none;">
						<?php echo _x("You don't have to, we already took care of structured data and added it in the right place.", 'job-settings', 'job-postings') ?><br>
						<?php echo _x('To test it, use this <a href="https://search.google.com/structured-data/testing-tool/" target="_blank">tool</a> and paste there a job url from your site there.', 'job-settings', 'job-postings') ?>
					</div>
				</div>




			</div>
		</div>
	</div>


	<div class="wrap jobs_plugin_ads">
		<a href="https://www.blueglass.ee/en/" target="_blank"><img src="<?php echo plugins_url( '../images/blueglass.jpg', __FILE__ ); ?>" alt="Plugin developed by Blueglass"></a>
		
		<a href="https://www.cloudways.com/en/?id=151244&amp;a_bid=0826cd57" target="_top"><img src="//www.cloudways.com/affiliate/accounts/default1/banners/0826cd57.jpg" alt="The Ultimate Managed Hosting Platform" title="The Ultimate Managed Hosting Platform" width="300" height="250" /></a><img style="border:0" src="https://www.cloudways.com/affiliate/scripts/imp.php?id=151244&amp;a_bid=0826cd57" width="1" height="1" alt="" />

		<a href="https://www.cloudways.com/en/woocommerce-hosting.php?id=151244&amp;a_bid=ed78b3a7" target="_top"><img src="//www.cloudways.com/affiliate/accounts/default1/banners/ed78b3a7.jpg" alt="Load WooCommerce Stores in 249ms!" title="Load WooCommerce Stores in 249ms!" width="300" height="600" /></a><img style="border:0" src="https://www.cloudways.com/affiliate/scripts/imp.php?id=151244&amp;a_bid=ed78b3a7" width="1" height="1" alt="" />


	</div>

</div>
