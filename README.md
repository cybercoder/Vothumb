Vothumb
=======

CakePHP Thumbs UP/DOWN rating plugin

Usage:
after install the plugin, you should call the Vothumb helper in your controller

[code]Public $helpers=array('Vothumb.Vothumb') ;[/code]

Then you can use the helper to vote your items like this :

[code]echo $this->Vothumb->vote('Model-Name','ItemID') ;[/code]
