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
		
		{ name: 'clipboard', items : ['Source','Cut','Copy','Paste','PasteText','PasteFromWord' ] }, { name: 'links', items : [ 'Link','Unlink','Anchor'] }, 
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
		{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule'] }, '/',
              
		{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },  
		{ name: 'colors', items : [ 'TextColor','BGColor' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },  
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll'] },
		{ name: 'paragraph', items: ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
		
		{ name: 'bullet', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','Blockquote']},
		{name: "others", items: ['Smiley','SpecialChar','PageBreak','Iframe']},
		
		
		{ name: 'tools', items : [ 'Maximize' ] }
	];
};