<script>
    $('#done').slideDown('slow').delay(1500).slideUp(1000);
</script>
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= site_url("assets/sneat") ?>/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= site_url("assets/sneat") ?>/assets/vendor/libs/popper/popper.js"></script>
<script src="<?= site_url("assets/sneat") ?>/assets/vendor/js/bootstrap.js"></script>
<script src="<?= site_url("assets/sneat") ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="<?= site_url("assets/sneat") ?>/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= site_url("assets/sneat") ?>/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="<?= site_url("assets/sneat") ?>/assets/js/main.js"></script>

<!-- Page JS -->
<script src="<?= site_url("assets/sneat") ?>/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- <script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
			tinycomments_mode: 'embedded',
			tinycomments_author: 'Author name',
			mergetags_list: [{
					value: 'First.Name',
					title: 'First Name'
				},
				{
					value: 'Email',
					title: 'Email'
				},
			],
			ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
		});
	</script> -->