/**
 *	Allow only numbers in a text field
 *	Trys to ignore deletes, returns and arrows
 *
 *	@access	public
 *	@param	object	evt	the event object passed
 *	@return	bool	
 */
function isNumberKey( evt ){
	
    //var charCode = (evt.which) ? evt.which : event.keyCode;
    var charCode = (evt.which) ? evt.which : 31;
    if( charCode > 31 && ( charCode < 48 || charCode > 57 ) && charCode != 63272 && charCode != 63234 && charCode != 63235 && charCode != 63232 && charCode != 63234 ){
       	return false;
	}
	return true;
	
} // END FUNCTION isNumberKey

	
/**
 *	Initialises the javascript system
 */
if( document.getElementById && jQuery ){
	
	$('#guests, #key').keypress( function( e ){
		return isNumberKey( e );
	});
	
	if( $('body').attr( 'id' ) != 'error' ){
		
		$('#guests').focus( function( e ){
			$('#guests-help').removeClass('hide');
		});
	
		$('#guests').blur( function( e ){
			$('#guests-help').addClass('hide');
		});
	
		$('#key').focus( function( e ){
			$('#key-help').removeClass('hide');
		});
	
		$('#key').blur( function( e ){
			$('#key-help').addClass('hide');
		});
	
	}
	
	$('#attending, #not-attending').change( function( e ){
		
		if( $('#not-attending').attr( 'checked' ) == true ){
			
			$('#guests-wrapper').css( 'opacity', 0.5 );
			$('#guests').attr( 'disabled', true );
			
		}else{
			
			$('#guests-wrapper').css( 'opacity', 1 );
			$('#guests').attr( 'disabled', false );
			
		}
		
	});
	
}