jQuery(function($){

	$(".twitter-feed").tweet({
	  join_text: "auto",
	  username: "686project",
	  avatar_size: 48,
	  count: 6,
	  auto_join_text_default: "",
	  auto_join_text_ed: "",
	  auto_join_text_ing: "",
	  auto_join_text_reply: "",
	  auto_join_text_url: "",
	  loading_text: "loading tweets..."
	});
	
	$('.flickr-feed').jflickrfeed({
		limit: 8,
		feedapi: 'photos_faves.gne',
		qstrings: {
			id: '52407899@N00'
		},
		itemTemplate: 
		'<li>' +
			'<a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a>' +
		'</li>'
	});

});