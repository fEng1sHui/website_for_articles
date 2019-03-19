var articleId = 0;
var articleTitleElement = null;
var articleBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function(event) {
	event.preventDefault();

	articleTitleElement = event.target.parentNode.parentNode.childNodes[1];
	var articleTitle = articleTitleElement.textContent;

	articleBodyElement = event.target.parentNode.parentNode.childNodes[3];
	var articleBody = articleBodyElement.textContent;

	articleId = event.target.parentNode.parentNode.dataset['articleid'];

	$('#article-title').val(articleTitle);
	$('#article-body').val(articleBody);
	$('#edit-modal').modal();
});

$('#modal-save').on('click', function() {
	$.ajax({
		method: 'POST',
		url: url,
		data: { body: $('#article-body').val(), title: $('#article-title').val(), articleId: articleId, _token: token}
	})
	.done(function (msg) {
		$(articleTitleElement).text(msg['new_title']);
		$(articleBodyElement).text(msg['new_body']);
		$('#edit-modal').modal('hide');
	});
});