<?php

function is_administrator($name = 'Samuel', $value = 'Clemens') {
	if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
		return true;
	} else {
		return false;
	}
}