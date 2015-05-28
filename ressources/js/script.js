function getAllMessages(){
	$.ajax({
                type: 'post',
                url: 'model/getMessage.php',
                dataType: "html",
                success: function (response) {
                    $('#msg-list').html(response);

                },
		        error: function (d) {
		        	alert('error');
		        }   
	});
};

(function(){
    getAllMessages();
    setTimeout(arguments.callee, 4000);
})();
	
