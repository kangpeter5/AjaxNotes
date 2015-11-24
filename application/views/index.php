<!DOCTYPE html>
<html>
<head>
	<title>AJAX Notes</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="/assets/notes.css">
	<script>
		function addListeners(){
          $('.deleteForm, .updateForm').submit(function(){
            $.post($(this).attr('action'), $(this).serialize(), function(res){
              $('#note').html(res);
              addListeners();
            })
            return false;
          });
        }
​
        $(document).ready(function(){
          $('form').on('submit',function(e){
            $.post($(this).attr('action'), $(this).serialize(), function(res){
              $('#note').html(res);
              $("input[name='title']").val('');
              addListeners();
            });
            return false;
          });
​
          $('body').on('click', '.description', function(){
            $(this).replaceWith("<textarea name='content' cols='30' rows='10'>" + $(this).html() + "</textarea>");
            $('textarea').val($.trim($('textarea').val()));
          })
​
          $('body').on('change', 'textarea', function(){
            $(this).parent().submit();
            $(this).focus();
          })
        })
	</script>
</head>
<body>
	<h1>Notes</h1>
	<div id="note">
		<?php require('partial.php'); ?>
	</div>
	<form id="newNoteForm" action="/notes/create" method="post">
		<input type="text" name="title" placeholder="insert note title here...">
		<input type="submit" value="create">
	</form>
</body>
</html>