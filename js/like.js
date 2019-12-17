function like_add(gra_id) {
	$.post('ajax/like_add.php',{gra_id:gra_id},function(data) {

		$('.graphic_'+gra_id+'_likes').toggleClass("far fas");

	});
}
