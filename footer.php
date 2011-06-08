
<?php include('tmpl/main-bottom.php'); ?>
<?php include('tmpl/bottom.php'); ?>

<?php/* --- end of main layout --- */ ?>
	<a href="#top" id="gototop" class="no-click no-print">Top of Page</a>
	<a name="bottom" id="bottom"></a>
</div><?php /* wrapper */ ?>

</body>
	
<?php
	$outputbuffer = ob_get_contents();
	ob_end_clean();	

	include('tmpl/htmlhead.php');
	echo $outputbuffer;
?>	

</html>
