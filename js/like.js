function like_add(gra_id) {
	$.post('ajax/like_add.php',{gra_id:gra_id},function(data) {
		if (data == 'success') {
			like_get(gra_id);

		} else {
			$('#graphic_'+gra_id+'_likes').text('data');
			alert(data);
		}
	});
}

function like_get(gra_id) {
	$.post('ajax/like_get.php', {gra_id:gra_id},function(data) {
		$('#graphic_'+gra_id+'_likes').text(data);
	});
}


function delete_graphic(gra_id) {
	$.post('ajax/delete_graphic.php',{gra_id:gra_id},function(data) {
		if (data == 'success') {
			delete_get(gra_id);

		} else {
			alert(data);
		}
	});
}

function delete_get(gra_id) {
	$.post('ajax/delete_get.php', {gra_id:gra_id},function(data) {
		$('#graphic_'+gra_id+'_likes').text(data);
	});
}
