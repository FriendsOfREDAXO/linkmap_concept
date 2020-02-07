var linkmap_concept = {
	
	inputId : 0,

	init: function()
    {
		this.initLinkmap();
		this.initAjax();
	},

    initLinkmap: function()
    {
		window.openLinkMap = function(id, param){
			linkmap_concept.inputId = id;
			$('.rex-widget').addClass('is-visible');
			return false;
		}
		$('.widget-close').click(function(){
			$('.rex-widget').removeClass('is-visible');
		});
		$('#filter-tag').keyup(function(){
			
			var searchTag = $(this).val().toLowerCase();
			
			$('.widget-link').each(function(){
				if( $(this).data('tag').toLowerCase().indexOf(searchTag) !== -1 ){
					$(this).removeClass('is-hidden');
				}
				else{
					$(this).addClass('is-hidden');
				}
			});
		});
		
		$('.dialog-close').click(function(){
			$('.rex-dialog').removeClass('is-visible');
		});
	},
	
	initAjax : function(){
		
		$('.linkmap-button-back,.linkmap-category').unbind();
		$('.linkmap-button-back,.linkmap-category').click(function(){
			
			var categoryId = $(this).data('id');
			
			$.ajax({
				url: 'index.php?page=structure&rex-api-call=LinkmapConceptApi',
				type: 'POST',
				data: {
					id : categoryId
				},
				error: function(jqXHR, textStatus, errorThrown) {
						// console.log(JSON.stringify(jqXHR));
						// console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				 }
			}).done(function(result) {
				
				$('.widget-linkmap').fadeOut(
					function(){
						$('.widget-linkmap').html(result)
						$('.widget-linkmap').fadeIn();
						linkmap_concept.initAjax();
					}
				);
			});
		});
		
		$('.linkmap-article').unbind();
		$('.linkmap-article').click(function(){
			$('#'+linkmap_concept.inputId).val($(this).data('id'));
			$('#'+linkmap_concept.inputId+'_NAME').val($(this).data('name'));
			$('.widget-close').click();
		});
		
		// $('.linkmap-button-back').unbind();
		// $('.linkmap-button-back').click(function(){
			// $('.linkmap-category.is-active .linkmap-category-children').remove();
			// $('.linkmap-category.is-active').removeClass('is-active');
			// $('.linkmap-category.move-left').removeClass('move-left');
		// });
	}

};

$(document).ready(function() {
	linkmap_concept.init();
});
