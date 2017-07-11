
if (!!window.EventSource) {
  var source = new EventSource('get_chat.php');
} else {
  // Result to xhr polling :(
}
