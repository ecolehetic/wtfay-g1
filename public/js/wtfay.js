$('.index a').on('click',function(e){
	e.preventDefault();
	$.ajax({
		url:$(this).attr('href')
	})
	.success(function(data){
		$('.users').html(data);
	})
});

$('.users').on('click','a',function(e){
	e.preventDefault();
	$.ajax({
		url:$(this).attr('href')
	})
	.success(function(data){
		$('section + section').html(data);
	})
});
$('input[name="name"]').on('keyup',function(e){
	var $parent=$(this).parent('form');
	$.ajax({
		url:$parent.attr('action'),
		method:$parent.attr('method'),
		data:$parent.serialize()
	})
	.success(function(data){
		$('.users').html(data);
	})
})