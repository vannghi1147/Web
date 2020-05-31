// JavaScript Document
function loadfck(name,width,height,toolbar){
	var FCKitem = new FCKeditor(name) ;
	FCKitem.BasePath = "../fckeditor/" ;
	FCKitem.Width = width + "px" ;
	FCKitem.Height = height + "px" ;
	FCKitem.ToolbarSet = toolbar;
	FCKitem.ReplaceTextarea() ;
}
