Vothumb
=======

CakePHP Thumbs UP/DOWN rating plugin

Usage:
after install the plugin, you should call the Vothumb helper in your controller

<pre>Public $helpers=array('Vothumb.Vothumb') ;</pre>

Then you can use the helper to vote your items like this :

<pre>echo $this->Vothumb->vote('Model-Name','ItemID') ;</pre>
