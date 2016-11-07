var postId = 0;
var postBodyElement = null;
$('.post').find('.interaction').find('.edit').on('click',function(event){
		event.preventDefault();

		postBodyElement = event.target.parentNode.parentNode.childNodes[1];
		var post = postBodyElement.textContent;
		postId = event.target.parentNode.parentNode.dataset['postid'];
		
		$('#postBody').val(post);
		$('#myModal').modal();
	});
$('#modal_save').on('click', function(){
	$.ajax({
		method: 'POST',
		url: urlEdit,
		data: {
			'body': $('#postBody').val(),
			'postId': postId,
			'_token': token}
	}).done(function(msg){
		$(postBodyElement).text(msg['edited_post']);
		//alert(msg['edited_post']);
		$('#myModal').modal('hide');
	});

});
$('.like').on('click', function(event){
	event.preventDefault();
	postId = event.target.parentNode.parentNode.dataset['postid'];
	var isLike = true;
	$.ajax({
		method: 'POST',
		url: urlLike,
		data: {
			'isLike': isLike,
			'postId': postId,
			'_token': token
		}

	}).done(function(msg){
		//change the page
		event.target.innerText = msg['likeStatus'];
	})
	console.log(event);
})
