<?php

	/*
	 My own form error function

	Form::macro('errorMsg', function($field){//yay! we don't have to pass $errors anymore
			$errors = Session::get('errors');

			if($errors && $errors->has($field)){//make sure $errors is not null
					$msg = $errors->first($field);
					return "<p class=\"help-block\">$msg</p>";
			}
			return '';
	});
	*/
