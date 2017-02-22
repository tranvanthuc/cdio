
$("#flash_msg, #errors_msg").delay(3000).fadeOut();

function confirmMsg(msg)
{
	return window.confirm(msg);
}