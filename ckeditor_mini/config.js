/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */



CKEDITOR.editorConfig = function( config )
{
	config.toolbar = 'sagar';	
	config.enterMode=CKEDITOR.ENTER_BR;
	config.shiftEnterMode=CKEDITOR.ENTER_P;
 
	config.toolbar_sagar =
	[
		
		{ name: 'clipboard', items : ['Copy','Paste','PasteText'] }, { name: 'links', items : [ 'Link','Unlink','Anchor' ] }, 
		 { name: 'paragraph', items : [ 'BulletedList']},
		{ name: 'paragraph', items: ['JustifyLeft','JustifyBlock' ] },
		{ name: 'styles', items : ['Font','FontSize' ] },  
		{ name: 'colors', items : [ 'TextColor','BGColor' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },  
	
		
		
		
	
	];
};