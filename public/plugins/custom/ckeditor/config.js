/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
	config.toolbar = [
		{ name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'Paste FromWord', '-', 'Undo', 'Redo'] },
		{ name: 'editing', items: ['Scayt'] },
		{ name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
		{
			name: 'insert', items: ['Image', 'Table', 'HorizontalRule',
			'SpecialChar']
		},
		{ name: 'tools', items: ['Maximize'] },
		{ name: 'document', items: ['Source'] },
		'/',
		{ name: 'basicstyles', items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat'] },
		{
			name: 'paragraph', items: ['NumberedList', 'BulletedList',
			'Outdent', 'Indent', '-', 'Blockquote']
		},
		{ name: 'styles', items: ['Styles', 'Format'] },
		{ name: 'about', items: ['About'] },
	];
	config.removeButtons = 'Save,NewPage,ExportPdf,Print,Templates,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,Underline,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,Language,BidiRtl,BidiLtr,Smiley,PageBreak,Iframe,Font,FontSize,BGColor,TextColor,ShowBlocks';
};
