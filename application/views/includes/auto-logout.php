<?php if ($this->session->userdata('logged_in')) { ?>
	<script type="text/javascript">
	//check if logged in
	function checkIfLoggedIn() {
		window.location.href = "<?php echo base_url(); ?>logout";
	}

	inactivityTimeout = false;
	resetTimeout();

	function resetTimeout() {
		clearTimeout(inactivityTimeout);
		inactivityTimeout = setTimeout(checkIfLoggedIn, 1000 * 900); //load every 1 hour
	}
	window.onmousemove = resetTimeout;

	</script>
<?php } ?>