(function($) {
    $(document).ready(function(){
		
		// Clone inputs
		$('#addNewTask').on('click', function(e){
			e.preventDefault();
			var regex = /^(.*)(\d)+$/i;
			var cloneIndex = $('.clone-task').length;
			$('#task-0').clone()
				.appendTo('#tasks')
				.attr('id', "task-" +  cloneIndex)
				.find('*').each(function() {
					var id = this.id || "";
					var match = id.match(regex) || [];
					if (match.length == 3) {
						this.id = match[1] + (cloneIndex);
					}
				})
				.find('.task-unit').val('').end()
				.find('.task-rate').val('').end()
				.find('.task-name').val('').end();
			cloneIndex++;
			return false;
		});
		
		// Remove inputs
		$('#tasks').on('click', 'a.remove', function(e){
			e.preventDefault();
			var parent = $(this).parents('.clone-task'),
				cloneIndex = $('.clone-task').length,
				total = $('#taskTotalInput').val();
			if(cloneIndex > 1){
				var rate = parseInt($('.task-rate', parent).val()),
					unit = parseInt($('.task-unit', parent).val()),
					combined = rate * unit;
				total = total - combined;
				if(total > 0){
					$('#taskTotal').html(total);
					$('#taskTotalInput').val(total);
				}
				parent.remove();
			}
			return false;
		});
		
		// Calculate total
		$('#tasks, #taxHolder').on('keyup keypress blur change', 'input', function(){
			var total = 0,
				tax;
			tax = $('#taxInput').val();
			$('.clone-task').each(function(){
				var rate = parseInt($('.task-rate', this).val()),
					unit = parseInt($('.task-unit', this).val()),
					combined = rate * unit;
				if(combined > 0){
					total = total + combined;
				}
			});
			$('#taskSubtotal').html(total);
			$('#taskSubtotalInput').val(total);
			
			tax = Math.round(((tax / 100) * total) + total);
			$('#taskTotal').html(tax);
			$('#taskTotalInput').val(tax);
		});
		
    })
})(jQuery);