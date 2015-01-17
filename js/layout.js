(function( $ ){
	var initLayout = function() {
		$( '#template_bgcolor' ).ColorPicker({
			color: '#0000ff',
			onShow: function ( colpkr ) {
				$( colpkr ).fadeIn( 500 );
				return false;
			},
			onHide: function ( colpkr ) {
				$( colpkr ).fadeOut( 500 );
				return false;
			},
			onChange: function ( hsb, hex, rgb ) {
				$( '#template_bgcolor' ).val( '#' + hex );
			}
		});
		
		$( '#template_hbgcolor' ).ColorPicker({
			color: '#0000ff',
			onShow: function ( colpkr ) {
				$( colpkr ).fadeIn( 500 );
				return false;
			},
			onHide: function ( colpkr ) {
				$( colpkr ).fadeOut( 500 );
				return false;
			},
			onChange: function ( hsb, hex, rgb ) {
				$( '#template_hbgcolor' ).val( '#' + hex );
			}
		});
		
		$( '#template_ftcolor' ).ColorPicker({
			color: '#0000ff',
			onShow: function ( colpkr ) {
				$( colpkr ).fadeIn( 500 );
				return false;
			},
			onHide: function ( colpkr ) {
				$( colpkr ).fadeOut( 500 );
				return false;
			},
			onChange: function ( hsb, hex, rgb ) {
				$( '#template_ftcolor' ).val( '#' + hex );
			}
		});
		
		$( '#template_fthcolor' ).ColorPicker({
			color: '#0000ff',
			onShow: function ( colpkr ) {
				$( colpkr ).fadeIn( 500 );
				return false;
			},
			onHide: function (colpkr) {
				$( colpkr ).fadeOut(500);
				return false;
			},
			onChange: function ( hsb, hex, rgb ) {
				$( '#template_fthcolor' ).val( '#' + hex );
			}
		});
	}
	EYE.register( initLayout, 'init' );
})( jQuery )