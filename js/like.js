function like_add(gra_id) {
	$.post('ajax/like_add.php',{gra_id:gra_id},function(data) {

		$('#graphic_'+gra_id+'_likes').toggleClass("far fas");

		if (data == 'success') {
			like_get(gra_id);

		}
	});
}

function like_get(gra_id) {
	$.post('ajax/like_get.php', {gra_id:gra_id},function(data) {
		$('#graphic_'+gra_id+'_likes').text(data);
	});
}
