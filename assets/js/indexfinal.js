$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});
function validate() {
  if (document.getElementById('password1').value !== document.getElementById('password2').value){
    document.getElementById('password2').style.cssText = 'border: 1px solid red';
  }
  else{
    isValid = (document.getElementById('password1').value === document.getElementById('password2').value);
    document.getElementById('signupbtn').disabled = !isValid;
    document.getElementById('password2').style.cssText = 'border: 1px solid #a0b3b0';
  }
}

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(700);
  
});