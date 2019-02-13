$(document).ready(function(){

	$('#contact3-form').submit(function(e){

		e.preventDefault();
		save($(this));

	});

	function save(data)
	{

		$.ajax(
			{
	
				type: "POST",
				url: "/emails/create",
				data: data.serialize()
	
			}).done(function(){
	
					let link = document.createElement('a');
					link.href = '/ebooks/ebook_1.pdf';
					link.download = 'ebook_1.pdf';
					link.click();
	
			}).fail(function(){
	
					console.log("ERRO ......");
	
			});//end $.ajax

		
	

	}//END save








});//END ready