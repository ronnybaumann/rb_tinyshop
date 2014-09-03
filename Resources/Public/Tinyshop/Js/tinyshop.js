$(document).ready(function() {
	if($('.tx-tinyshop .differShipping .differShippingAddress').size() > 0) {
		if($('.tx-tinyshop .differShipping .differShippingAddress').prop('checked')) {
			$('.tx-tinyshop .shippingAddress').slideDown(200);
		}
		
		$('.tx-tinyshop .differShipping .differShippingAddress').change(function(){
			if($('.tx-tinyshop .differShipping .differShippingAddress').prop('checked')) {
				$('.tx-tinyshop .shippingAddress').slideDown(200);
			}
			else {
				$('.tx-tinyshop .shippingAddress').slideUp(200);
			}
		});
	}
});