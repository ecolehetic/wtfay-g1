$('.index a').on('click',function(e){
	e.preventDefault();
	var $this=$(this);
	if($this.hasClass('on')){
		$this.removeClass('on');
		$('.users').html('');
	}else{
		$.ajax({
			url:$this.attr('href')
		})
		.success(function(data){
			$('.users').html(data);
			$('.index a.on').removeClass('on');
			$this.addClass('on');
		});
	}
	
	
});

$('.users').on('click','a:first-of-type',function(e){
	e.preventDefault();
	$.ajax({
		url:$(this).attr('href')
	})
	.success(function(data){
		$('section + section').html(data);
	});
})
.on('click','.fav',function(e){
	e.preventDefault();
	var $this=$(this);
	$.getJSON($this.attr('href'))
	.success(function(data){
		if(data.status==false){
			$this.removeClass('on');
		}else{
			$this.addClass('on');
		}
	});
});



$('input[name="name"]').on('keyup',function(e){
	var $this=$(this);
	var $parent=$this.parent('form');
	var filter=$('.index a.on').data('filter');
	var name=$this.val();
	var datas={'name':name,'filter':filter};
	$.ajax({
		url:$parent.attr('action'),
		method:$parent.attr('method'),
		data:datas
	})
	.success(function(data){
		$('.users').html(data);
	})
})










